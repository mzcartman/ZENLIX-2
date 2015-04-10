<?php
session_start();

include ("../functions.inc.php");
$rkeys = array_keys($_GET);

$CONF['title_header'] = lang('TICKET_name') . " #" . get_ticket_id_by_hash($rkeys[1]) . " - " . $CONF['name_of_firm'];

if (validate_client($_SESSION['helpdesk_user_id'], $_SESSION['code'])) {
    include ("head.inc.php");
    include ("client.navbar.inc.php");
    
    //echo $rkeys[1];
    //$hn=($_GET['hash']);
    $hn = $rkeys[1];
    $stmt = $dbConnection->prepare('SELECT 
                            id, user_init_id, user_to_id, date_create, subj, msg, client_id, unit_id, status, hash_name, comment, last_edit, is_read, lock_by, ok_by, arch, ok_date, prio, last_update
                            from tickets
                            where hash_name=:hn');
    $stmt->execute(array(':hn' => $hn));
    $res1 = $stmt->fetchAll();
    if (!empty($res1)) {
        foreach ($res1 as $row) {
            
            $lock_by = $row['lock_by'];
            $ok_by = $row['ok_by'];
            $ok_date = $row['ok_date'];
            $cid = $row['client_id'];
            $tid = $row['id'];
            $arch = $row['arch'];
            $subj = $row['subj'];
            $status_ok = $row['status'];
            $ms = $row['msg'];
            $pr = $row['prio'];
            
            if ($arch == 1) {
                $st = "<span class=\"label label-default\"><i class=\"fa fa-archive\"></i> " . lang('TICKET_status_arch') . "</span>";
            }
            if ($arch == 0) {
                if ($status_ok == 1) {
                    $st = "<span class=\"label label-success\"><i class=\"fa fa-check-circle\"></i> " . lang('TICKET_status_ok') . " " . nameshort(name_of_user_ret_nolink($ok_by)) . "</span>";
                }
                if ($status_ok == 0) {
                    if ($lock_by <> 0) {
                        $st = "<span class=\"label label-warning\"><i class=\"fa fa-gavel\"></i> " . lang('TICKET_status_lock') . " " . name_of_user_ret_nolink($lock_by) . "</span>";
                    }
                    if ($lock_by == 0) {
                        $st = "<span class=\"label label-primary\"><i class=\"fa fa-clock-o\"></i> " . lang('TICKET_status_new') . "</span>";
                    }
                }
            }
            
            if ($row['user_to_id'] <> 0) {
                $to_text = "<div class=''>" . name_of_user_ret($row['user_to_id']) . "</div>";
            }
            if ($row['user_to_id'] == 0) {
                $to_text = "<strong>" . lang('t_list_a_all') . "</strong> " . lang('T_from') . " " . view_array(get_unit_name_return($row['unit_id']));
            }
            
            if ($row['is_read'] == "0") {
                
                $res = $dbConnection->prepare("update tickets set is_read=:n where id=:tid");
                $res->execute(array(':n' => '1', ':tid' => $tid));
            }
            
            if ($lock_by <> "0") {
                if ($lock_by == $_SESSION['helpdesk_user_id']) {
                    $status_lock = "me";
                    
                    //$lock_disabled="";
                    $lock_text = "<i class=\"fa fa-unlock\"></i> " . lang('TICKET_action_unlock') . "";
                    $lock_status = "unlock";
                } else {
                    
                    $status_lock = "you";
                    
                    $lock_status = "unlock";
                    $lock_text = "<i class=\"fa fa-unlock\"></i> " . lang('TICKET_action_unlock') . "";
                }
            }
            if ($lock_by == "0") {
                
                $lock_text = "<i class=\"fa fa-lock\"></i> " . lang('TICKET_action_lock') . "";
                $lock_status = "lock";
            }
            
            if ($status_ok == "1") {
                $status_ok_text = lang('TICKET_action_nook');
                $status_ok_status = "ok";
            }
            
            if ($status_ok == "0") {
                $status_ok_text = "<i class=\"fa fa-check\"></i> " . lang('TICKET_action_ok') . "";
                $status_ok_status = "no_ok";
            }
            
            $inituserid_flag = 0;
            if ($row['user_init_id'] == $_SESSION['helpdesk_user_id']) {
                $inituserid_flag = 1;
            }
            
            $prio = "<span class=\"label label-info\"><i class=\"fa fa-minus\"></i> " . lang('t_list_a_p_norm') . "</span>";
            if ($row['prio'] == "1") {
                $prio_style['normal'] = "active";
            } else if ($row['prio'] == "0") {
                $prio = "<span class=\"label label-primary\"><i class=\"fa fa-arrow-down\"></i> " . lang('t_list_a_p_low') . "</span>";
                $prio_style['low'] = "active";
            } else if ($row['prio'] == "2") {
                $prio = "<span class=\"label label-danger\"><i class=\"fa fa-arrow-up\"></i> " . lang('t_list_a_p_high') . "</span>";
                $prio_style['high'] = "active";
            }
?>
            
            
            <section class="content-header">
                    <h1>
                        <i class="fa fa-ticket"></i> <?php echo lang('TICKET_name'); ?> <strong>#<?php echo $row['id'] ?></strong>
                        <small>
                            <?php echo make_html($row['subj'], 'no') ?>
                        </small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo $CONF['hostname'] ?>index.php"><span class="icon-svg"></span> <?php echo $CONF['name_of_firm'] ?></a></li>
                        <li class="active"><?php echo lang('TICKET_name'); ?> #<?php echo $row['id'] ?></li>
                    </ol>
                </section>
            
            
            
            
            
            
            
            
            
            <section class="content">
                    <!-- title row -->
<div class="row">
<div class="col-md-8">
    <div class="row">
    <div class="col-md-12">
                    <div class="box">
                                <div class="box-header">
                                <h3 class="box-title">
                                    
                                    
                                <?php echo make_html($row['subj']) ?>
                                </h3>
                                <small class="box-tools pull-right">
                                
                                <i class="fa fa-clock-o"></i>
                                <time id="c" datetime="<?php echo $row['date_create']; ?>"></time></small>
                                
                                </div>
                                <div class="box-body">
                                <table class="table table-bordered">
                <tbody>
                <tr>
                    <td style="width:50px;"><small><strong><?php echo lang('TICKET_t_from'); ?> </strong></small></td>
                    <td><small><a href="view_user?<?php echo get_user_hash_by_id($row['user_init_id']); ?>"><?php echo name_of_user($row['user_init_id']) ?> </a></small></td>
                    
                    <td><small><strong><?php echo lang('TICKET_t_prio'); ?></strong></small>
                    </td>
                    <td><small><?php echo $prio; ?></small>
                    </td>
                </tr>
                <tr>
                    <td style="width:50px;"><small><strong><?php echo lang('TICKET_t_to'); ?> </strong></small></td>
                    <td><small><?php echo $to_text; ?> </small></td>
                    <td><small><strong><?php echo lang('TICKET_t_status'); ?></strong></small>
                    </td>
                    <td><small><?php echo $st; ?></small></td>
                </tr>



                </tbody>
            </table>
<?php
        $stmts = $dbConnection->prepare('SELECT * FROM ticket_data where ticket_hash=:n');
        $stmts->execute(array(':n' => $hn));
        $res11 = $stmts->fetchAll();


if (!empty($res11)) {
?><br>
<small class="text-muted"><?=lang('FIELD_add_title');?>: </small>
<table class="table table-bordered">
                <tbody>
<?php
        foreach ($res11 as $rown) { 

    $stmt2 = $dbConnection->prepare('SELECT name from ticket_fields where id=:tm and status=:s');
    $stmt2->execute(array(
        ':tm' => $rown['field_id'],
        ':s'=>'1'
    ));
    
    $tt = $stmt2->fetch(PDO::FETCH_ASSOC);

    


?>

        <tr>
                    <td style="width:150px"><small class="text-muted"><?php echo $rown['field_name']; ?>: </small></td>
                    <td><small><?php echo $rown['field_val']; ?> </small></td>
                    
                    
                </tr>


<?php

}
?>
 </tbody>
            </table>
<?php
}
?>
            <div class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                                <?php echo make_html($row['msg']) ?>
                            </div>
                            <?php
            if (($inituserid_flag == 1) && ($arch == 0)) { ?>
                            <div class="row"><div class="col-md-12">
                            <button type="button" class="btn btn-default btn-xs pull-right" data-toggle="modal" data-target="#myModal"><?php echo lang('CONF_act_edit'); ?></button>
                            </div>
                            </div>                            <?php
            }
            
            $stmt = $dbConnection->prepare('SELECT file_hash, original_name, file_size FROM files where ticket_hash=:tid');
            $stmt->execute(array(':tid' => $hn));
            $res1 = $stmt->fetchAll();
            if (!empty($res1)) {
?>
                    <hr style="margin:0px;">
                        <div class="row" style="padding:10px;">
                        <div class="col-md-3">
                            <center><small><strong><?php echo lang('TICKET_file_list') ?>:</strong></small></center>
                        </div>
                        <div class="col-md-9">
                            <table class="table table-hover">
                                    <tbody>
                                <?php
                foreach ($res1 as $r) { ?>
                                    
                                    
                                    
                    <tr>
                        <td style="width:20px;"><small><?php echo get_file_icon($r['file_hash']); ?></small></td>
                        <td><small><a href='<?php echo $CONF['hostname']; ?>sys/download.php?<?php echo $r['file_hash']; ?>'><?php echo $r['original_name']; ?></a></small></td>
                        <td><small><?php
                    echo round(($r['file_size'] / (1024 * 1024)), 2); ?> Mb</small></td>
                    </tr>
<?php
                } ?>
                                    </tbody>
                            </table>

                        </div>
                        
                        
                        
                        
                        
                        
                    </div>


                <?php
            } ?>

                            


                                </div>
                    </div>
                    
                    
                    </div>
    </div>
    
    
    

    
    <div class="row">
    <div class="col-md-12">
    
<div id="msg"></div>
<div class="nav-tabs-custom">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#tab_1" data-toggle="tab"><i class="fa fa-comments-o"></i> <?php echo lang('TICKET_t_comment'); ?></a></li>
                                    <li class=""><a href="#tab_2" data-toggle="tab"><?php echo lang('TICKET_t_history'); ?></a></li>
                                    
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_1">
                                        <div class="box box-solid" >
                                <div class="box-header">
                                    
                                    
                                </div>
                                <div class="box-body chat" id="comment_content">
                                <?php echo view_comment($tid); ?>
                                    <!-- chat item -->
                                    
                                </div><!-- /.chat -->
                                <div class="box-footer">
                                    <div class="" id="for_msg">
                                        

<textarea id="msg" name="msg" class="form-control" data-toggle="popover" data-html="true" data-trigger="manual" data-placement="top" data-content="&lt;small&gt;<?php echo lang('TICKET_t_det_ticket'); ?>&lt;/small&gt;" placeholder="<?php echo lang('TICKET_t_comm_ph'); ?>"></textarea>


                                    </div>
                                    <div class="">
<div style="height: 30px;" class="">

                                        <div class="btn-group pull-right">
                                            <button value="<?php echo $hn ?>" id="do_comment" class="btn btn-success btn-sm"><i class="fa fa-comment"></i></button>
                                            
  <input type="file" id="do_comment_file" value="<?php echo $hn ?>" class="file-inputs" title="+">
                                            
                                            
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                    </div><!-- /.tab-pane -->
                                    <div class="tab-pane" id="tab_2">
                                        <?php echo view_log($tid); ?>
                                    </div><!-- /.tab-pane -->
                                </div><!-- /.tab-content -->
                            </div>





    

    </div></div>
    
    
    
</div>
<div class="col-md-4">



<div class="row">
    
    <div class="col-md-12">
    <?php
            
            if ($arch == 1) {
?>
                
<div class="callout callout-danger">
                                        <h4><?php echo lang('MAIN_attention'); ?></h4>
                                        <p><?php echo lang('TICKET_t_in_arch'); ?></p>
                                    </div>
                            
                            
                            
                
                
                
                
                

            <?php
            }
            if ($arch == 0) {
                if ($status_ok == 1) {
?>
<div class="callout callout-warning">
                                        <h4><?php echo lang('MAIN_attention'); ?></h4>
                                        <p><i class="fa fa-check-circle"></i> <?php echo lang('TICKET_t_ok'); ?> <strong> <?php echo name_of_user_ret($ok_by) ?></strong> <?php echo $ok_date; ?>.<br> <?php echo lang('TICKET_t_ok_1'); ?></p>
                                    </div>



                <?php
                }
                if ($status_ok == 0) {
                    if ($lock_by <> 0) {
                        if ($status_lock == "you") {
?>
                            
                            <div class="callout callout-warning">
                                        <h4><?php echo lang('MAIN_attention'); ?></h4>
                                        <p><i class="fa fa-check-circle"></i> <?php echo lang('TICKET_t_lock'); ?> <strong> <?php echo name_of_user_ret($lock_by) ?></strong> .<br> <?php echo lang('TICKET_t_lock_1'); ?></p>
                                    </div>
                                    
                                    
                                    
                            
                            
                            
                           
                        <?php
                        }
                        if ($status_lock == "me") {
?>
                            
                            
                            
                            <div class="callout callout-warning">
                                        <h4><?php echo lang('MAIN_attention'); ?></h4>
                                        <p><i class="fa fa-check-circle"></i> <?php echo lang('TICKET_t_lock_i'); ?></p>
                                    </div>
                                    
                                    
                            
                            
                            
                        <?php
                        }
                    }
                }
            }
?>
    </div>
    
</div>

</div>

</div>












                                        
                    

                </section>
            
            
            
            
                <input type="hidden" id="prio" value="<?php echo $pr; ?>">

            <input type="hidden" id="ticket_hash" value="<?php echo $hn; ?>">
            <div class="container">

            <div class="row">

            <div class="col-md-8">
            <?php
            if (isset($_GET['refresh'])) { ?>
                <div class="alert alert-info">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <i class="fa fa-refresh"></i> <?php echo lang('TICKET_msg_updated'); ?></div>
            <?php
            }
?>
            </div>
            </div>









<link rel="stylesheet" href="<?php echo $CONF['hostname'] ?>/css/ticket_style.css">


<?php
            if (($inituserid_flag == 1) && ($arch == 0)) { ?>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title"><?php echo lang('P_title'); ?></h4>
      </div>
      <div class="modal-body">
        
        
       <form class="form-horizontal" role="form">
       



<div class="control-group" id="for_prio">
    <div class="controls">
        <div class="form-group">
            <label for="" class="col-sm-2 control-label"><small><?php echo lang('NEW_prio'); ?>: </small></label>
            <div class="col-sm-10" style=" padding-top: 5px; ">

                <div class="btn-group btn-group-justified">
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary btn-xs <?php echo $prio_style['low']; ?>" id="prio_low"><i id="lprio_low" class=""></i><?php echo lang('NEW_prio_low'); ?></button>
                    </div>
                    <div class="btn-group">
                        <button type="button" class="btn btn-info btn-xs <?php echo $prio_style['normal']; ?>" id="prio_normal"><i id="lprio_norm" class=""></i> <?php echo lang('NEW_prio_norm'); ?></button>
                    </div>
                    <div class="btn-group">
                        <button type="button" class="btn btn-danger btn-xs <?php echo $prio_style['high']; ?>" data-toggle="tooltip" data-placement="top" title="<?php echo lang('NEW_prio_high_desc'); ?>" id="prio_high"><i id="lprio_high" class=""></i><?php echo lang('NEW_prio_high'); ?></button>
                    </div>
                </div>
            </div></div></div></div>
            
            




<?php
                if ($CONF['fix_subj'] == "false") {
?>

<div class="control-group" id="for_s">
        <div class="controls">
          <div class="form-group">
    <label for="subj" class="col-sm-2 control-label"><small><?php echo lang('NEW_subj'); ?>: </small></label>
    <div class="col-sm-10">
      <input type="text" class="form-control input-sm" name="subj" id="subj" placeholder="<?php echo lang('NEW_subj'); ?>" value="<?php echo $subj; ?>">
    </div>
  </div></div></div>
<?php
                } else if ($CONF['fix_subj'] == "true") {
?>



<div class="control-group" id="for_subj" >
    <div class="controls">
        <div class="form-group">
            <label for="subj" class="col-sm-2 control-label"><small><?php echo lang('NEW_subj'); ?>: </small></label>
            <div class="col-sm-10" style="">
                <select data-placeholder="<?php echo lang('NEW_subj_det'); ?>" class="form-control input-sm" id="subj" name="subj">
                    <option value="0"></option>
                    <?php
                    
                    $stmts = $dbConnection->prepare('SELECT name FROM subj order by name COLLATE utf8_unicode_ci ASC');
                    $stmts->execute();
                    $res11 = $stmts->fetchAll();
                    foreach ($res11 as $rows) {
                        $sel_flag = "";
                        if ($rows['name'] == $subj) {
                            $sel_flag = "selected";
                        }
?>

                        <option <?php echo $sel_flag; ?> value="<?php echo $rows['name'] ?>"><?php echo $rows['name'] ?></option>

                    <?php
                    }
?>

                </select>
            </div>
        </div>

    </div>
</div>


<?php
                } ?>







  <div class="control-group">
    <div class="controls">
        <div class="form-group" id="for_msg">
            <label for="msg" class="col-sm-2 control-label"><small><?php echo lang('NEW_MSG'); ?>:</small></label>
            <div class="col-sm-10">
                <textarea data-toggle="popover" data-html="true" data-trigger="manual" data-placement="right" data-content="<small><?php echo lang('NEW_MSG_msg'); ?></small>" placeholder="<?php echo lang('NEW_MSG_ph'); ?>" class="form-control input-sm animated" name="msg" id="msg_up" rows="3" required="" data-validation-required-message="<?php echo lang('EXT_fill_msg'); ?>" aria-invalid="false"><?php echo $ms; ?></textarea>
            </div>
        </div>
        <div class="help-block"></div></div></div>
       
       
       
       
       
       
       </form> 
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo lang('TICKET_file_notupload_one'); ?></button>
        <button type="button" id="save_edit_ticket" class="btn btn-primary"><?php echo lang('JS_save'); ?></button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<?php
            } ?>

           

            




            










            

            </div>
        <?php
        }
    } else {
?>
        <div class="well well-large well-transparent lead">
            <center><?php echo lang('TICKET_t_no'); ?></center>
        </div>
    <?php
    }
?>


    <?php
    include ("footer.inc.php");
} else {
    include 'auth.php';
}
?>
