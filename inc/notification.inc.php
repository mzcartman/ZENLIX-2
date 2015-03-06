<?php
	//$base = dirname(dirname(__FILE__)); 
	
//include_once ($base .'/sys/class.phpmailer.php');

function send_notification($type, $ticket_id) {
    global $CONF, $CONF_MAIL, $dbConnection;
    
    //ВЕЗДЕ УДАЛИТЬ ИНИЦИАТОРА ЧТО БЫ ТОТ КТО ИНИЦИИРОВАЛ ДЕЙСТВИЕ НЕ ШЛО ПИСЬМО
    
    $stmt = $dbConnection->prepare('SELECT user_init_id,user_to_id,date_create,subj,msg, client_id, unit_id, status, hash_name, prio,last_update FROM tickets where id=:tid');
    $stmt->execute(array(':tid' => $ticket_id));
    $res_ticket = $stmt->fetch(PDO::FETCH_ASSOC);
    
    $user_to_id = $res_ticket['user_to_id'];
    $unit_to_id = $res_ticket['unit_id'];
    $user_init_id = $res_ticket['user_init_id'];
    
    if ($type == "ticket_create") {
        
        if ($user_to_id == 0) {
            
            //отправка всему отделу
            /* выбрать всех пользователей у кого статус активен и отдел равен N и в БД записать: id пользователей,$type,$ticket_id */
            
            $stmt = $dbConnection->prepare('SELECT id FROM users where find_in_set(:id,unit) and status=:n and is_client=0');
            $stmt->execute(array(':n' => '1', ':id' => $unit_to_id));
            $res1 = $stmt->fetchAll();
            $delivers_ids = array();
            foreach ($res1 as $qrow) {
                array_push($delivers_ids, $qrow['id']);
            }
            
            if (($key = array_search($user_init_id, $delivers_ids)) !== false) {
                unset($delivers_ids[$key]);
            }
            
            /*  ADD TO notification_msg_pool: uniq_id  */
            
            foreach ($delivers_ids as $uniq_id_row) {
                
                $u_hash = get_user_hash_by_id($uniq_id_row);
                $stmt_n = $dbConnection->prepare('insert into notification_msg_pool (delivers_id, type_op, ticket_id, dt) VALUES (:delivers_id, :type_op, :tid, :n)');
                $stmt_n->execute(array(':delivers_id' => $u_hash, ':type_op' => 'ticket_create', ':tid' => $ticket_id, ':n' => $CONF['now_dt']));
            }
            
            $res_str = implode(",", $delivers_ids);
            
            $stmt = $dbConnection->prepare('insert into news (date_op, msg, init_user_id, target_user, ticket_id) 
				 										   VALUES (:n, :msg, :init_user_id, :target_user,:ticket_id)');
            $stmt->execute(array(':msg' => $type, ':init_user_id' => $user_init_id, ':target_user' => $res_str, ':ticket_id' => $ticket_id, ':n' => $CONF['now_dt']));
            
            $stmt = $dbConnection->prepare('insert into notification_pool (delivers_id, type_op, ticket_id, dt) VALUES (:delivers_id, :type_op, :tid, :n)');
            $stmt->execute(array(':delivers_id' => $res_str, ':type_op' => $type, ':tid' => $ticket_id, ':n' => $CONF['now_dt']));
        } 
        else if ($user_to_id <> 0) {
            
            $su = array();
            $users = explode(",", $user_to_id);
            foreach ($users as $val) {
                $stmt = $dbConnection->prepare('SELECT unit FROM users where id=:n');
                $stmt->execute(array(':n' => $val));
                $res1 = $stmt->fetchAll();
                foreach ($res1 as $qrow) {
                    $user_units = $qrow['unit'];
                    $res_str = explode(",", $user_units);
                    foreach ($res_str as $vals) {
                        $stmt2 = $dbConnection->prepare('SELECT id FROM users where find_in_set(:id,unit) and (priv=2 OR priv=0) and is_client=0 and status!=2');
                        $stmt2->execute(array(':id' => $vals));
                        $res2 = $stmt2->fetchAll();
                        foreach ($res2 as $qrow2) {
                            array_push($su, $qrow2['id']);
                        }
                    }
                }
            }
            
            // array_merge($users,$su);
            $nr = array();
            $nr = array_unique(array_merge($users, $su));
            if (($key = array_search($user_init_id, $nr)) !== false) {
                unset($nr[$key]);
            }
            
            /*  ADD TO notification_msg_pool: uniq_id  */
            
            foreach ($nr as $uniq_id_row) {
                
                $u_hash = get_user_hash_by_id($uniq_id_row);
                $stmt_n = $dbConnection->prepare('insert into notification_msg_pool (delivers_id, type_op, ticket_id, dt) VALUES (:delivers_id, :type_op, :tid, :n)');
                $stmt_n->execute(array(':delivers_id' => $u_hash, ':type_op' => 'ticket_create', ':tid' => $ticket_id, ':n' => $CONF['now_dt']));
            }
            
            $su = implode(",", $nr);
            
            if ($su) {
                
                $stmt = $dbConnection->prepare('insert into news (date_op, msg, init_user_id, target_user, ticket_id) 
				 										   VALUES (:n, :msg, :init_user_id, :target_user,:ticket_id)');
                $stmt->execute(array(':msg' => $type, ':init_user_id' => $user_init_id, ':target_user' => $su, ':ticket_id' => $ticket_id, ':n' => $CONF['now_dt']));
                
                $stmt = $dbConnection->prepare('insert into notification_pool (delivers_id, type_op, ticket_id, dt) VALUES (:delivers_id, :type_op, :tid, :n)');
                $stmt->execute(array(':delivers_id' => $su, ':type_op' => $type, ':tid' => $ticket_id, ':n' => $CONF['now_dt']));
            }
        }
    } else if ($type == "ticket_refer") {
        if ($user_to_id == 0) {
            
            //отправка всему отделу
            $stmt = $dbConnection->prepare('SELECT id FROM users where find_in_set(:id,unit) and status=:n and is_client=0');
            $stmt->execute(array(':n' => '1', ':id' => $unit_to_id));
            $res1 = $stmt->fetchAll();
            $delivers_ids = array();
            foreach ($res1 as $qrow) {
                array_push($delivers_ids, $qrow['id']);
            }
            
            if (($key = array_search($_SESSION['helpdesk_user_id'], $delivers_ids)) !== false) {
                unset($delivers_ids[$key]);
            }
            foreach ($delivers_ids as $uniq_id_row) {
                
                $u_hash = get_user_hash_by_id($uniq_id_row);
                $stmt_n = $dbConnection->prepare('insert into notification_msg_pool (delivers_id, type_op, ticket_id, dt) VALUES (:delivers_id, :type_op, :tid, :n)');
                $stmt_n->execute(array(':delivers_id' => $u_hash, ':type_op' => 'ticket_refer', ':tid' => $ticket_id, ':n' => $CONF['now_dt']));
            }
            
            $res_str = implode(",", $delivers_ids);
            
            //Узнать кем?
            $stmt_log = $dbConnection->prepare('SELECT init_user_id FROM ticket_log where ticket_id=:tid and msg=:msg order by ID desc limit 1');
            $stmt_log->execute(array(':tid' => $ticket_id, ':msg' => 'refer'));
            $ticket_log_res = $stmt_log->fetch(PDO::FETCH_ASSOC);
            $who_init = $ticket_log_res['init_user_id'];
            
            $stmt = $dbConnection->prepare('insert into news (date_op, msg, init_user_id, target_user, ticket_id) 
				 										   VALUES (:n, :msg, :init_user_id, :target_user,:ticket_id)');
            $stmt->execute(array(':msg' => $type, ':init_user_id' => $who_init, ':target_user' => $res_str, ':ticket_id' => $ticket_id, ':n' => $CONF['now_dt']));
            
            $stmt = $dbConnection->prepare('insert into notification_pool (delivers_id, type_op, ticket_id, dt) 
													VALUES (:delivers_id, :type_op, :tid, :n)');
            $stmt->execute(array(':delivers_id' => $res_str, ':type_op' => $type, ':tid' => $ticket_id, ':n' => $CONF['now_dt']));
        } else if ($user_to_id <> 0) {
            $su = array();
            $users = explode(",", $user_to_id);
            foreach ($users as $val) {
                $stmt = $dbConnection->prepare('SELECT unit FROM users where id=:n');
                $stmt->execute(array(':n' => $val));
                $res1 = $stmt->fetchAll();
                foreach ($res1 as $qrow) {
                    $user_units = $qrow['unit'];
                    $res_str = explode(",", $user_units);
                    foreach ($res_str as $vals) {
                        $stmt2 = $dbConnection->prepare('SELECT id FROM users where find_in_set(:id,unit) and (priv=2 OR priv=0) and is_client=0 and status!=2');
                        $stmt2->execute(array(':id' => $vals));
                        $res2 = $stmt2->fetchAll();
                        foreach ($res2 as $qrow2) {
                            array_push($su, $qrow2['id']);
                        }
                    }
                }
            }
            
            // array_merge($users,$su);
            
            $nr = array();
            $nr = array_unique(array_merge($users, $su));
            if (($key = array_search($user_init_id, $nr)) !== false) {
                unset($nr[$key]);
            }
            
            foreach ($nr as $uniq_id_row) {
                
                $u_hash = get_user_hash_by_id($uniq_id_row);
                $stmt_n = $dbConnection->prepare('insert into notification_msg_pool (delivers_id, type_op, ticket_id, dt) VALUES (:delivers_id, :type_op, :tid, :n)');
                $stmt_n->execute(array(':delivers_id' => $u_hash, ':type_op' => $type, ':tid' => $ticket_id, ':n' => $CONF['now_dt']));
            }
            
            $su = implode(",", $nr);
            
            if ($su) {
                $stmt_log = $dbConnection->prepare('SELECT init_user_id FROM ticket_log where ticket_id=:tid and msg=:msg order by ID desc limit 1');
                $stmt_log->execute(array(':tid' => $ticket_id, ':msg' => 'refer'));
                $ticket_log_res = $stmt_log->fetch(PDO::FETCH_ASSOC);
                $who_init = $ticket_log_res['init_user_id'];
                
                $stmt = $dbConnection->prepare('insert into news (date_op, msg, init_user_id, target_user, ticket_id) 
				 										   VALUES (:n, :msg, :init_user_id, :target_user,:ticket_id)');
                $stmt->execute(array(':msg' => $type, ':init_user_id' => $who_init, ':target_user' => $su, ':ticket_id' => $ticket_id, ':n' => $CONF['now_dt']));
                
                $stmt = $dbConnection->prepare('insert into notification_pool (delivers_id, type_op, ticket_id, dt) VALUES (:delivers_id, :type_op, :tid, :n)');
                $stmt->execute(array(':delivers_id' => $su, ':type_op' => $type, ':tid' => $ticket_id, ':n' => $CONF['now_dt']));
            }
        }
    } else if ($type == "ticket_comment") {
        
        // отправить письмо автору заявки, исполнителям, всех кто есть в комментариях
        // $user_init_id, $user_to_id,
        // узнать
        $delivers_ids = array();
        
        $stmt = $dbConnection->prepare('SELECT init_user_id FROM ticket_log where ticket_id=:id and msg=:n');
        $stmt->execute(array(':n' => 'comment', ':id' => $ticket_id));
        $res1 = $stmt->fetchAll();
        foreach ($res1 as $qrow) {
            
            //всем кто в комментах есть
            array_push($delivers_ids, $qrow['init_user_id']);
        }
        
        //автору заявки
        array_push($delivers_ids, $user_init_id);
        
        ///////////Исполнителям?///////////////////
        if ($user_to_id == 0) {
            
            //выбрать всех с отдела
            $stmt = $dbConnection->prepare('SELECT id FROM users where find_in_set(:id,unit) and status=:n and is_client=0');
            $stmt->execute(array(':n' => '1', ':id' => $unit_to_id));
            $res1 = $stmt->fetchAll();
            
            foreach ($res1 as $qrow) {
                array_push($delivers_ids, $qrow['id']);
            }
        } else if ($user_to_id <> 0) {
            $users = explode(",", $user_to_id);
            foreach ($users as $val) {
                
                //всем исполнителям
                array_push($delivers_ids, $val);
            }
        }
        
        ///////////Исполнителям?///////////////////
        
        //кто прокомментировал - тому не слать
        //SELECT id,init_user_id FROM ticket_log where ticket_id=1 and msg='comment' order by id DESC limit 1
        $stmt = $dbConnection->prepare("SELECT init_user_id FROM ticket_log where ticket_id=:id and msg=:n order by id DESC limit 1");
        $stmt->execute(array(':n' => 'comment', ':id' => $ticket_id));
        $who_last = $stmt->fetch(PDO::FETCH_NUM);
        $res = $who_last[0];
        
        $delivers_ids = array_unique($delivers_ids);
        if (($key = array_search($res, $delivers_ids)) !== false) {
            unset($delivers_ids[$key]);
        }
        
        foreach ($delivers_ids as $uniq_id_row) {
            
            $u_hash = get_user_hash_by_id($uniq_id_row);
            $stmt_n = $dbConnection->prepare('insert into notification_msg_pool (delivers_id, type_op, ticket_id, dt) VALUES (:delivers_id, :type_op, :tid, :n)');
            $stmt_n->execute(array(':delivers_id' => $u_hash, ':type_op' => 'ticket_comment', ':tid' => $ticket_id, ':n' => $CONF['now_dt']));
        }
        
        $delivers_ids = implode(",", array_unique($delivers_ids));
        
        $stmt_log = $dbConnection->prepare('SELECT init_user_id FROM ticket_log where ticket_id=:tid and msg=:msg order by ID desc limit 1');
        $stmt_log->execute(array(':tid' => $ticket_id, ':msg' => 'comment'));
        $ticket_log_res = $stmt_log->fetch(PDO::FETCH_ASSOC);
        $who_init = $ticket_log_res['init_user_id'];
        
        $stmt = $dbConnection->prepare('insert into news (date_op, msg, init_user_id, target_user, ticket_id) 
				 										   VALUES (:n, :msg, :init_user_id, :target_user,:ticket_id)');
        $stmt->execute(array(':msg' => $type, ':init_user_id' => $who_init, ':target_user' => $delivers_ids, ':ticket_id' => $ticket_id, ':n' => $CONF['now_dt']));
        
        $stmt = $dbConnection->prepare('insert into notification_pool (delivers_id, type_op, ticket_id, dt) VALUES (:delivers_id, :type_op, :tid, :n)');
        $stmt->execute(array(':delivers_id' => $delivers_ids, ':type_op' => $type, ':tid' => $ticket_id, ':n' => $CONF['now_dt']));
    } else if ($type == "ticket_lock") {
        
        //отправить автору
        $delivers_ids = array();
        array_push($delivers_ids, $user_init_id);
        
        //всем исполнителям
        
        ///////////Исполнителям?///////////////////
        if ($user_to_id == 0) {
            
            //выбрать всех с отдела
            $stmt = $dbConnection->prepare('SELECT id FROM users where find_in_set(:id,unit) and status=:n and is_client=0');
            $stmt->execute(array(':n' => '1', ':id' => $unit_to_id));
            $res1 = $stmt->fetchAll();
            
            foreach ($res1 as $qrow) {
                array_push($delivers_ids, $qrow['id']);
            }
        } else if ($user_to_id <> 0) {
            $users = explode(",", $user_to_id);
            foreach ($users as $val) {
                array_push($delivers_ids, $val);
            }
        }
        
        ///////////Исполнителям?///////////////////
        
        //кто заблокировал?
        $stmt = $dbConnection->prepare("SELECT init_user_id FROM ticket_log where ticket_id=:id and msg=:n order by id DESC limit 1");
        $stmt->execute(array(':n' => 'lock', ':id' => $ticket_id));
        $who_last = $stmt->fetch(PDO::FETCH_NUM);
        $res = $who_last[0];
        
        $delivers_ids = array_unique($delivers_ids);
        if (($key = array_search($res, $delivers_ids)) !== false) {
            unset($delivers_ids[$key]);
        }
        
        foreach ($delivers_ids as $uniq_id_row) {
            
            $u_hash = get_user_hash_by_id($uniq_id_row);
            $stmt_n = $dbConnection->prepare('insert into notification_msg_pool (delivers_id, type_op, ticket_id, dt) VALUES (:delivers_id, :type_op, :tid, :n)');
            $stmt_n->execute(array(':delivers_id' => $u_hash, ':type_op' => 'ticket_lock', ':tid' => $ticket_id, ':n' => $CONF['now_dt']));
        }
        
        $delivers_ids = implode(",", array_unique($delivers_ids));
        
        $stmt_log = $dbConnection->prepare('SELECT init_user_id FROM ticket_log where ticket_id=:tid and msg=:msg order by ID desc limit 1');
        $stmt_log->execute(array(':tid' => $ticket_id, ':msg' => 'lock'));
        $ticket_log_res = $stmt_log->fetch(PDO::FETCH_ASSOC);
        $who_init = $ticket_log_res['init_user_id'];
        
        $stmt = $dbConnection->prepare('insert into news (date_op, msg, init_user_id, target_user, ticket_id) 
				 										   VALUES (:n, :msg, :init_user_id, :target_user,:ticket_id)');
        $stmt->execute(array(':msg' => $type, ':init_user_id' => $who_init, ':target_user' => $delivers_ids, ':ticket_id' => $ticket_id, ':n' => $CONF['now_dt']));
        
        $stmt = $dbConnection->prepare('insert into notification_pool (delivers_id, type_op, ticket_id, dt) VALUES (:delivers_id, :type_op, :tid, :n)');
        $stmt->execute(array(':delivers_id' => $delivers_ids, ':type_op' => $type, ':tid' => $ticket_id, ':n' => $CONF['now_dt']));
    } else if ($type == "ticket_unlock") {
        
        //отправить автору
        $delivers_ids = array();
        array_push($delivers_ids, $user_init_id);
        
        //всем исполнителям
        ///////////Исполнителям?///////////////////
        if ($user_to_id == 0) {
            
            //выбрать всех с отдела
            $stmt = $dbConnection->prepare('SELECT id FROM users where find_in_set(:id,unit) and status=:n and is_client=0');
            $stmt->execute(array(':n' => '1', ':id' => $unit_to_id));
            $res1 = $stmt->fetchAll();
            
            foreach ($res1 as $qrow) {
                array_push($delivers_ids, $qrow['id']);
            }
        } else if ($user_to_id <> 0) {
            $users = explode(",", $user_to_id);
            foreach ($users as $val) {
                array_push($delivers_ids, $val);
            }
        }
        
        ///////////Исполнителям?///////////////////
        //кто разблокировал?
        $stmt = $dbConnection->prepare("SELECT init_user_id FROM ticket_log where ticket_id=:id and msg=:n order by id DESC limit 1");
        $stmt->execute(array(':n' => 'unlock', ':id' => $ticket_id));
        $who_last = $stmt->fetch(PDO::FETCH_NUM);
        $res = $who_last[0];
        
        $delivers_ids = array_unique($delivers_ids);
        if (($key = array_search($res, $delivers_ids)) !== false) {
            unset($delivers_ids[$key]);
        }
        
        foreach ($delivers_ids as $uniq_id_row) {
            
            $u_hash = get_user_hash_by_id($uniq_id_row);
            $stmt_n = $dbConnection->prepare('insert into notification_msg_pool (delivers_id, type_op, ticket_id, dt) VALUES (:delivers_id, :type_op, :tid, :n)');
            $stmt_n->execute(array(':delivers_id' => $u_hash, ':type_op' => 'ticket_unlock', ':tid' => $ticket_id, ':n' => $CONF['now_dt']));
        }
        
        $delivers_ids = implode(",", array_unique($delivers_ids));
        
        $stmt_log = $dbConnection->prepare('SELECT init_user_id FROM ticket_log where ticket_id=:tid and msg=:msg order by ID desc limit 1');
        $stmt_log->execute(array(':tid' => $ticket_id, ':msg' => 'unlock'));
        $ticket_log_res = $stmt_log->fetch(PDO::FETCH_ASSOC);
        $who_init = $ticket_log_res['init_user_id'];
        
        $stmt = $dbConnection->prepare('insert into news (date_op, msg, init_user_id, target_user, ticket_id) 
				 										   VALUES (:n, :msg, :init_user_id, :target_user,:ticket_id)');
        $stmt->execute(array(':msg' => $type, ':init_user_id' => $who_init, ':target_user' => $delivers_ids, ':ticket_id' => $ticket_id, ':n' => $CONF['now_dt']));
        
        $stmt = $dbConnection->prepare('insert into notification_pool (delivers_id, type_op, ticket_id, dt) VALUES (:delivers_id, :type_op, :tid, :n)');
        $stmt->execute(array(':delivers_id' => $delivers_ids, ':type_op' => $type, ':tid' => $ticket_id, ':n' => $CONF['now_dt']));
    } else if ($type == "ticket_ok") {
        
        //отправить автору
        $delivers_ids = array();
        array_push($delivers_ids, $user_init_id);
        
        //всем исполнителям
        ///////////Исполнителям?///////////////////
        if ($user_to_id == 0) {
            
            //выбрать всех с отдела
            $stmt = $dbConnection->prepare('SELECT id FROM users where find_in_set(:id,unit) and status=:n and is_client=0');
            $stmt->execute(array(':n' => '1', ':id' => $unit_to_id));
            $res1 = $stmt->fetchAll();
            
            foreach ($res1 as $qrow) {
                array_push($delivers_ids, $qrow['id']);
            }
        } else if ($user_to_id <> 0) {
            $users = explode(",", $user_to_id);
            foreach ($users as $val) {
                array_push($delivers_ids, $val);
            }
        }
        
        ///////////Исполнителям?///////////////////
        //кто разблокировал?
        $stmt = $dbConnection->prepare("SELECT init_user_id FROM ticket_log where ticket_id=:id and msg=:n order by id DESC limit 1");
        $stmt->execute(array(':n' => 'ok', ':id' => $ticket_id));
        $who_last = $stmt->fetch(PDO::FETCH_NUM);
        $res = $who_last[0];
        
        $delivers_ids = array_unique($delivers_ids);
        if (($key = array_search($res, $delivers_ids)) !== false) {
            unset($delivers_ids[$key]);
        }
        
        foreach ($delivers_ids as $uniq_id_row) {
            
            $u_hash = get_user_hash_by_id($uniq_id_row);
            $stmt_n = $dbConnection->prepare('insert into notification_msg_pool (delivers_id, type_op, ticket_id, dt) VALUES (:delivers_id, :type_op, :tid, :n)');
            $stmt_n->execute(array(':delivers_id' => $u_hash, ':type_op' => 'ticket_ok', ':tid' => $ticket_id, ':n' => $CONF['now_dt']));
        }
        
        $delivers_ids = implode(",", array_unique($delivers_ids));
        
        $stmt_log = $dbConnection->prepare('SELECT init_user_id FROM ticket_log where ticket_id=:tid and msg=:msg order by ID desc limit 1');
        $stmt_log->execute(array(':tid' => $ticket_id, ':msg' => 'ok'));
        $ticket_log_res = $stmt_log->fetch(PDO::FETCH_ASSOC);
        $who_init = $ticket_log_res['init_user_id'];
        
        $stmt = $dbConnection->prepare('insert into news (date_op, msg, init_user_id, target_user, ticket_id) 
				 										   VALUES (:n, :msg, :init_user_id, :target_user,:ticket_id)');
        $stmt->execute(array(':msg' => $type, ':init_user_id' => $who_init, ':target_user' => $delivers_ids, ':ticket_id' => $ticket_id, ':n' => $CONF['now_dt']));
        
        $stmt = $dbConnection->prepare('insert into notification_pool (delivers_id, type_op, ticket_id, dt) VALUES (:delivers_id, :type_op, :tid, :n)');
        $stmt->execute(array(':delivers_id' => $delivers_ids, ':type_op' => $type, ':tid' => $ticket_id, ':n' => $CONF['now_dt']));
    } else if ($type == "ticket_no_ok") {
        
        //отправить автору
        $delivers_ids = array();
        array_push($delivers_ids, $user_init_id);
        
        //всем исполнителям
        ///////////Исполнителям?///////////////////
        if ($user_to_id == 0) {
            
            //выбрать всех с отдела
            $stmt = $dbConnection->prepare('SELECT id FROM users where find_in_set(:id,unit) and status=:n and is_client=0');
            $stmt->execute(array(':n' => '1', ':id' => $unit_to_id));
            $res1 = $stmt->fetchAll();
            
            foreach ($res1 as $qrow) {
                array_push($delivers_ids, $qrow['id']);
            }
        } else if ($user_to_id <> 0) {
            $users = explode(",", $user_to_id);
            foreach ($users as $val) {
                array_push($delivers_ids, $val);
            }
        }
        
        ///////////Исполнителям?///////////////////
        //кто разблокировал?
        $stmt = $dbConnection->prepare("SELECT init_user_id FROM ticket_log where ticket_id=:id and msg=:n order by id DESC limit 1");
        $stmt->execute(array(':n' => 'no_ok', ':id' => $ticket_id));
        $who_last = $stmt->fetch(PDO::FETCH_NUM);
        $res = $who_last[0];
        
        $delivers_ids = array_unique($delivers_ids);
        if (($key = array_search($res, $delivers_ids)) !== false) {
            unset($delivers_ids[$key]);
        }
        
        foreach ($delivers_ids as $uniq_id_row) {
            
            $u_hash = get_user_hash_by_id($uniq_id_row);
            $stmt_n = $dbConnection->prepare('insert into notification_msg_pool (delivers_id, type_op, ticket_id, dt) VALUES (:delivers_id, :type_op, :tid, :n)');
            $stmt_n->execute(array(':delivers_id' => $u_hash, ':type_op' => 'ticket_no_ok', ':tid' => $ticket_id, ':n' => $CONF['now_dt']));
        }
        
        $delivers_ids = implode(",", array_unique($delivers_ids));
        
        $stmt_log = $dbConnection->prepare('SELECT init_user_id FROM ticket_log where ticket_id=:tid and msg=:msg order by ID desc limit 1');
        $stmt_log->execute(array(':tid' => $ticket_id, ':msg' => 'no_ok'));
        $ticket_log_res = $stmt_log->fetch(PDO::FETCH_ASSOC);
        $who_init = $ticket_log_res['init_user_id'];
        
        $stmt = $dbConnection->prepare('insert into news (date_op, msg, init_user_id, target_user, ticket_id) 
				 										   VALUES (:n, :msg, :init_user_id, :target_user,:ticket_id)');
        $stmt->execute(array(':msg' => $type, ':init_user_id' => $who_init, ':target_user' => $delivers_ids, ':ticket_id' => $ticket_id, ':n' => $CONF['now_dt']));
        
        $stmt = $dbConnection->prepare('insert into notification_pool (delivers_id, type_op, ticket_id, dt) VALUES (:delivers_id, :type_op, :tid, :n)');
        $stmt->execute(array(':delivers_id' => $delivers_ids, ':type_op' => $type, ':tid' => $ticket_id, ':n' => $CONF['now_dt']));
    }
}

////////////////////////////////////////////////////////////////////////


?>
