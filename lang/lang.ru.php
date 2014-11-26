<?php
function lang_ru($phrase){
    static $lang = array(
    
    
    
'cron_navbar'=>'Планировщик',    
'cron_title'=>'Планировщик задач',     
'cron_view'=>'Просмотр информации о задаче',     
'cron_period'=>'Периодичность',     
'cron_day'=>'День',     
'cron_week'=>'Неделя',     
'cron_month'=>'Месяц',     
'cron_tab'=>'Расписание',     
'cron_do_every'=>'Выполнять, каждый',     
'cron_do_day'=>'день',     
'cron_1'=>'Понедельник',     
'cron_2'=>'Вторник',     
'cron_3'=>'Среда',     
'cron_4'=>'Четвевг',     
'cron_5'=>'Пятница',     
'cron_6'=>'Суббота',     
'cron_7'=>'Воскресенье',     
'cron_do_week'=>'день недели',     
'cron_do_month'=>'числа каждого месяца',      
'cron_ta'=>'Время выполнения',     
'cron_active'=>'Активация',     
'cron_del'=>'Удалить задачу',     
'cron_t_create'=>'Создание задачи',     
'cron_add'=>'Добавить в планировщик',     
'cron_info'=>'В данном разделе Вы можете создать задачу, которая будет выполняться по выбранному расписанию.',     
'cron_title_list'=>'Список задач',     
    
    
    
    
    
    
    
    
'mail_msg_ticket_refer'=>'ЗАЯВКА ПЕРЕАДРЕСОВАНА',
'mail_msg_ticket_refer_ext'=>'Вы получили это сообщение, потому что заявка была переадресована пользователем',
'mail_msg_ticket_to_ext'=>'на',
'mail_msg_ticket_comment'=>'ЗАЯВКА ПРОКОММЕНТИРОВАНА',
'mail_msg_ticket_comment_ext'=>'Вы получили это сообщение, потому что заявка была прокомментирована пользователем',
'mail_msg_ticket_lock'=>'ЗАЯВКА ЗАБЛОКИРОВАНА',
'mail_msg_ticket_lock_ext'=>'Вы получили это сообщение, потому что заявка была заблокирована пользователем',
'mail_msg_ticket_unlock'=>'ЗАЯВКА РАЗБЛОКИРОВАНА',
'mail_msg_ticket_unlock_ext'=>'Вы получили это сообщение, потому что заявка была разблокирована пользователем',
'mail_msg_ticket_ok'=>'ЗАЯВКА ВЫПОЛНЕНА',
'mail_msg_ticket_ok_ext'=>'Вы получили это сообщение, потому что заявка была выполнена пользователем',
'mail_msg_ticket_no_ok'=>'ЗАЯВКА НЕ ВЫПОЛНЕНА',
'mail_msg_ticket_no_ok_ext'=>'Вы получили это сообщение, потому что заявка была отмечена как "не выполнена" пользователем',

'EXT_stats_refer'=>'Переадресовано',
'EXT_stats_lock'=>'Заблокировано заявок',
'EXT_stats_unlock'=>'Разблокировано',
'EXT_stats_no_ok'=>'Не выполнено',
'EXT_stats_main'=>'Информация по заявкам',
'EXT_stats_main_todo'=>'Для отображения статистики по пользователю, укажите пользователя и период.',

'EXT_stat_title'=>'Журнал действий пользователя с ',

'REG_msg'=>'Регистрация завершена! Вы сможете войти, после проверки администратором.',
'REG_new'=>'Регистрация нового пользователя',

'REG_button'=>'Регистрация',
'REG_already'=>'У меня уже есть аккаунт',

'CONF_timezone'=>'Временная зона',
'CONF_2noty_info'=>'Для работы почтовых уведомлений, добавьте в cron строку ',
'UPGRADE_title'=>'Обновление системы',
'UPGRADE_title_ext'=>'Мастер обновления версии',
'UPGRADE_version_already'=>'У Вас самая последняя версия!',
'UPGRADE_dbu'=>'Создана резервная копия БД',
'UPGRADE_error'=>'Обновление прошло с ошибками. Устраните проблемы и попытайтесь снова обновиться. Или обратитесь в службу поддержки.',
'UPGRADE_success'=>'Обновление прошло успешно. Теперь у Вас самая новая версия',
'UPGRADE_new'=>'Доступна новая версия',
'UPGRADE_list'=>'Список изменений',
'UPGRADE_files'=>'Файлы которые подлежат изменению',
'UPGRADE_att'=>'Убедитесь, что права на файлы и директории выставлены в соответствии с таблицей:',
'UPGRADE_now'=>'Обновить сейчас!',
'EXT_do_write_message'=>'Написать сообщение', 
'EXT_no_unread_msg'=>'Нет не прочитанных сообщений',
'EXT_unread_msg1'=>'У Вас',
'EXT_unread_msg2'=>'новых сообщений',
'EXT_all_msgs'=>'Все сообщения',
'MESSAGES_navbar'=>'Сообщения',

'MESSAGES_us'=>'Сообщения пользователя',
'MESSAGES_us_ext'=>'Переписка и личные сообщения',
'MESSAGES_main'=>'Основной чат',
'MESSAGES_fio'=>'ФИО пользователя',
'MESSAGES_with'=>'Переписка с',
'MESSAGES_sel_text'=>'Введите текст',









'EXT_toggle_nav'=>'Меню навигации',
'EXT_users_online'=>'пользователей онлайн',
'EXT_users_all_view'=>'смотреть всех',
'EXT_new_message'=>'Новое сообщение',


'EXT_for_clients'=>'Для клиентов',
'EXT_for_clients_ext'=>'будет доступно для клиентов',
'EXT_hello'=>'Привет',
'EXT_fill_msg'=>'Укажите сообщение',
'EXT_client_add_after'=>'Клиент будет добавлен после модерации администратором.',
'EXT_press_tofind'=>'Нажмите для поиска',
'EXT_news_view_t'=>'Смотреть заявку',
'EXT_ldap_ip'=>'IP-адрес LDAP-сервера',
'EXT_ldap_domain'=>'LDAP-домен для уч. записей',
'EXT_pb_noti'=>'PushBullet-уведомления',
'EXT_pb_api_key'=>'API-ключ',
'EXT_perf_must_ldap'=>'На сервере LDAP должна быть учётная запись с одноимённым логином',
'EXT_client'=>'Клиент',
'EXT_client_what'=>'Будет видеть только заявки, созданные собой.',
'EXT_perf_msg_t'=>'Заголовок сообщения',
'EXT_t_created'=>'Создано заявок',
'EXT_t_locked'=>'В обработке',
'EXT_t_oked'=>'Выполнено',

'EXT_attach_file'=>'Прикрепил файл',

'EXT_graph'=>'Отчёты',
'EXT_graph_user'=>'Отчёт пользователя',
'EXT_graph_user_ext'=>'За определённый период',
'EXT_graph_user_ext2'=>'В данном разделе содержатся отчёты по пользователю за определённый период.',

'EXT_more_info'=>'Перейти',
'NAVBAR_news'=>'Новости',
'STATS_TITLE_ext'=>'Личные графики',
'VIEWUSER_title'=>'Информация о пользователе',
'VIEWUSER_title_ext'=>'Профиль пользователя',
'MAIN_attention'=>'Внимание',

'CLIENTS_name_ext'=>'Поиск и редактирование',
'STATS_TITLE_short'=>'Статистика',

'ticket_login_error'=>'Такой логин уже есть',

'NEWS_action_lock'=>'заблокировал заявку',
'NEWS_action_unlock'=>'разблокировал заявку',
'NEWS_action_ok'=>'выполнил заявку',
'NEWS_action_no_ok'=>'пометил заявку',
'NEWS_action_no_ok2'=>'как не выполненая',
'NEWS_action_refer'=>'переадресовал заявку',
'NEWS_action_create'=>'создал новую заявку с кодом',
'NEWS_action_comment'=>'прокомментировал заявку',
'NEWS_action_ticket_arch'=>'перешла в архив',

'NEWS_text_ticket'=>'Текст заявки',
'NEWS_text_comment'=>'Комментарий',


'DASHBOARD_messages'=>'Важные объявления',
'DASHBOARD_title_ext'=>'Основная информация',

'NEWS_today'=>'сегодня',

'PROFILE_select_image'=>'Выбрать изображение',
'PROFILE_del_image'=>'Убрать',
'NAVBAR_profile_ext'=>'Просмотр и редактирование информации',

'ALLSTATS_main'=>'Общая статистика',    
'ALLSTATS_help'=>'В данном разделе содержится статистика всех отделов и их пользователей, на которые Вы имеете права доступа.',
'ALLSTATS_unit'=>'Информация о заявках Ваших отделов',
'ALLSTATS_unit_free'=>'Свободных заявок',
'ALLSTATS_unit_lock'=>'Занятых заявок',
'ALLSTATS_unit_ok'=>'Выполненных заявок',
'ALLSTATS_user'=>'Текущая информация о заявках пользователей Ваших отделов',
'ALLSTATS_user_fio'=>'ФИО',
'ALLSTATS_user_free'=>'Свободных',
'ALLSTATS_user_lock'=>'Блокированых',
'ALLSTATS_user_ok'=>'Выполненных',
'ALLSTATS_user_out_all'=>'Созданых (всего)',
'ALLSTATS_user_out_all_not'=>'Созданых (не выполненых)',
    
'NAVBAR_files'=>'Файлы заявок',   
'T_from'=>'с',
'FILES_title'=>'Файлы заявок',
'FILES_off' =>'В данный момент отключена загрузка файлов к заявкам. Для включения перейдите <a href="./config">сюда</a> и активируйте загрузку файлов к заявке.',
'FILES_info'=>'В данном раздереле вы можете просмотреть все прикреплённые файлы к заявкам, а так же удалить их.',
'FILES_name'=>'Имя файла',
'FILES_ticket'=>'Заявка',
'FILES_size'=>'Размер',
'FILES_del'=>'Удалить',
'FILES_down'=>'Скачать',
'CONF_file_types'=>'Допустимые типы файлов',
'CONF_file_size'=>'Максимальный размер файла',    
 'DEPS_off'=>'В данный момент отключен фиксированный список тем заявок. Для его включения перейдите <a href="./config">сюда</a> и выберите темы заявок "фиксированный список".',   
 'CONF_info'=>'В данном разделе содержатся основные настройки системы.',
 'CONF_mail'=>'E-mail администратора',
 'CONF_title'=>'Настройки системы',   
 'CONF_mains'=>'Общие настройки',   
 'CONF_name'=>'Название организации',     
 'CONF_title_org'=>'Заголовок системы',     
 'CONF_url'=>'URL системы',     
 'CONF_2arch'=>'Через сколько дней заявку в архив',     
 'CONF_2arch_info'=>'Для автоматического переноса заявок в архив, добавьте в cron-планировщик строку:',     
 'CONF_f_login'=>'Первый вход и активация',     
 'CONF_f_login_opt_true'=>'Доступна ссылка',     
 'CONF_false'=>'Не активно',     
 'CONF_f_login_info'=>'Если у Вас уже есть база пользователей (а точнее их email), то каждый новый пользователей будет вводить email, и если такой уже есть в базе, то на него будет высылаться пароль. Администратора это избавляет от создания паролей и активации учёток.',     
 'CONF_subj'=>'Темы заявок',     
 'CONF_fix_list'=>'Фиксированый список',     
 'CONF_subj_text'=>'Поле ввода',     
 'CONF_subj_info'=>'При создании заявок Вы можете определить фиксированый набор тем или же текстовое поле, в которое вписывают название темы заявки.',     
 'CONF_fup'=>'Загрузка файлов к заявке',     
 'CONF_true'=>'Активно',     
 'CONF_fup_info'=>'Возможность прикрепления файлов к заявке.',     
 'CONF_act_edit'=>'Редактировать',     
 
 'CONF_mail_name'=>'Настройки почты',     
 'CONF_mail_status'=>'Почтовые уведомления',     
 'CONF_mail_host'=>'Адрес SMTP-сервера',     
 'CONF_mail_port'=>'Порт SMTP-сервера',     
 'CONF_mail_auth'=>'Авторизация',     
 'CONF_mail_type'=>'Тип авторизации',     
 'CONF_mail_login'=>'Логин',     
 'CONF_mail_pass'=>'Пароль',     
 'CONF_mail_from'=>'Оправитель',     
 'CONF_mail_debug'=>'Режим отладки',      
 'CONF_mail_type'=>'Тип',
  
 'HELPER_info'=>'В данном разделе могут содержаться инструкции и документация для решения типичных проблем.',
 'NAVBAR_conf'=>'Настройки системы',  
 'DASHBOARD_TITLE'=>'Панель приборов',
 'DASHBOARD_ticket_stats'=>'Статистика заявок',
 'DASHBOARD_ticket_in_desc'=>'Входящие свободные заявки, которые вы можете взять',
 'DASHBOARD_ticket_in'=>'входящие заявки',
 'DASHBOARD_ticket_lock'=>'заблокировано мной',
 'DASHBOARD_ticket_lock_desc'=>'Заявки, с которыми Вы работаете',
 'DASHBOARD_ticket_out'=>'исходящие заявки',
 'DASHBOARD_ticket_out_desc'=>'Заявки, созданные Вами и остались не выполненными',
 'DASHBOARD_last_news'=>'Последние изменения',
 'DASHBOARD_last_help'=>'Последнее из Центра Знаний',
 'APPROVED_info' => 'В данном разделе содержатся запросы пользователей системы на изменение информации о клиентах (пользователях).',
 'WORKERS_info' => 'В данном разделе содержится информация о пользователях (клиентах), вы можете найти и отправить запрос на изменение информации.',
 'DASHBOARD_author'=>'Автор',
 'DASHBOARD_last_in'=>'Последние входящие заявки',
 'NEW_title'=>'Создание новой заявки',
 'NEW_ok'=>'Заявка успешно создана!',
 'NEW_ok_1'=>'Вы можете',
 'NEW_ok_2'=>'поделиться ссылкой',
 'NEW_ok_3'=>'на заявку или',
 'NEW_ok_4'=>'распечатайте ее',
 'NEW_from'=>'От кого',
 'NEW_from_desc'=>'ФИО или логин пользователя, который обратился за помощью',
 'NEW_fio'=>'ФИО или логин',
 'NEW_fio_desc'=>'Пожалуйста, заполните это поле',
 'NEW_to'=>'Кому',
 'NEW_to_desc'=>'Исполнитель заявки - или весь отдел , или опционально конкретного сотрудника.',
 'NEW_to_unit'=>'Отдел',
 'NEW_to_unit_desc'=>'Укажите отдел назначения или сотрудника',
 'NEW_to_user'=>'Исполнитель',
 'NEW_prio'=>'Приоритет',
 'NEW_prio_low'=>'Низкий',
 'NEW_prio_norm'=>'Средний',
 'NEW_prio_high'=>'Высокий',
 'NEW_prio_high_desc'=>'Будет задействовано SMS-информирование',
 'NEW_subj'=>'Тема',
 'NEW_subj_msg'=>'Укажите тему заявки',
 'NEW_subj_det'=>'Заголовок заявки',
 'NEW_MSG'=>'Текст',
 'NEW_MSG_msg'=>'Укажите подробно суть заявки',
 'NEW_MSG_ph'=>'Суть заявки',
 'NEW_MSG_ph_1'=>'Если нужно дополните сообщение информацией',
 'NEW_button_create'=>'Создать заявку',
 'NEW_button_reset'=>'Очистить поля',
 'LIST_title'=>'Список заявок',
 'LIST_ok_t'=>'выполненые заявки',
 'LIST_lock_t_i'=>'заявки, с которымы Вы работаете',
 'LIST_lock_t'=>'заявки, с которыми другие работают',
 'LIST_lock_n'=>'номер заявки',
 'LIST_find_ph'=>'Введите # или тему заявки, или текст заявки, или текст комментария',
 'LIST_find_button'=>'Поиск',
 'LIST_in'=>'Входящие',
 'LIST_out'=>'Исходящие',
 'LIST_arch'=>'Архив',
 'LIST_loading'=>'Идет загрузка',
 'CREATE_ACC_success'=>'Ваша учетная запись успешно активирована! <br> На Вашу электронную почту отправлено логин и пароль.',
 'msg_created_new_user' => 'Будет создан новый пользователь',
 'CREATE_ACC_already'=>'Ваша учетная запись уже активирована.',
 'CREATE_ACC_error'=>'Пользователь с таким электронным адресом не найден.',
 'MAIN_TITLE'=>'СИСТЕМА ЗАЯВОК',
 'AUTH_USER'=>'Авторизация пользователя',
 'login'=>'Логин',
 'pass'=>'Пароль',
 'remember_me'=>'Запомнить меня',
 'error_auth'=>'Ошибка авторизации. <br> Проверьте логин и пароль.',
 'first_in_auth'=>'Первый вход и активация',
'user_auth'=>'Активация пользователя',
'work_mail'=>'Ваш рабочий e-mail',
'action_auth'=>'Активировать',
'log_in'=>'Войти',
'work_mail_ph'=>'Укажите Вашу рабочую электронную почту (e-mail).',
'NOTES_single'=>'Запись...',
't_LIST_prio'=>'Приоритет',
't_LIST_subj'=>'Тема',
// <? = lang ('t_LIST_prio');
't_LIST_worker'=>'Пользователь',
't_LIST_create'=>'Создан',
't_LIST_ago'=>'Прошло',
't_LIST_init'=>'Автор',
't_LIST_to'=>'Исполнитель',
't_LIST_status'=>'Статус',
't_LIST_action'=>'Действие',
'stats_last_time'=>'Последний вход: ',
't_list_a_nook'=>'отметить, как выполненное',
't_list_a_unlock'=>'разблокировать',
't_list_a_lock'=>'заблокировать',
't_list_a_ok'=>'выполнить',
't_list_a_all'=>'Всем',
't_list_a_user_ok'=>'Выполнил',
't_list_a_date_ok'=>'Выполнено',
't_list_a_p_norm'=>'Средний приоритет',
't_list_a_p_low'=>'Низкий приоритет',
't_list_a_p_high'=>'Высокий приоритет',
't_list_a_oko'=>'выполнено',
't_list_a_arch'=>'в архиве',
't_list_a_lock_i'=>'работаю я',
't_list_a_lock_u'=>'работает',
't_list_a_hold'=>'ожидания действия',
't_list_a_ok_no'=>'Выполнено / не выполнено',

'HELP_desc'=>'Описание проблемы',
'HELP_do'=>'Решение',
'HELP_save'=>'Сохранить',
'HELP_back'=>'Назад',
'HELP_all'=>'Все',
'HELP_create'=>'Создать',
'MSG_no_records'=>'Нет записей',
'TICKET_name'=>'Заявка',



'WORKER_TITLE'=>'Информация о пользователе',
'WORKER_fio'=>'ФИО',
'WORKER_login'=>'Логин',
'WORKER_posada'=>'Должность',
'WORKER_unit'=>'Подразделение',
'WORKER_tel'=>'Тел',
'WORKER_tel_full'=>'Телефон',
'WORKER_room'=>'Кабинет',
'WORKER_mail'=>'E-mail',
'WORKER_total'=>'Заявок',
'WORKER_last'=>'Последняя',
'WORKER_edit_info'=>'Изменение информации',
'WORKER_send_approve'=>'Отправить запрос на изменение',

'PROFILE_msg_ok'=>'Информация успешно обновлена.',
'PROFILE_msg_error'=>'Имя или e-mail имеют не корректный формат.',
'PROFILE_msg_pass_err'=>'Старый пароль не верен.',
'PROFILE_msg_pass_err2'=>'Новые пароли не совпадают.',
'PROFILE_msg_pass_err3'=>'Пароль должен быть не менее 4 символов.',
'PROFILE_msg_pass_ok'=>'Пароль успешно изменен. Вам нужно <a href=\'index.php\'> зайти заново в систему </a>.',
'PROFILE_msg_te'=>'Ошибка',
'PROFILE_priv'=>'Ваши полномочия в системе',
'PROFILE_priv_unit'=>'Доступ к отделам',


'TABLE_name'=>'Название',
'TABLE_action'=>'Действие',
'PROFILE_msg_send'=>'Запрос на изменение информации о пользователе отправлен. Изменения произойдут только после проверки администратором.',
'PROFILE_msg_add'=>'Пользователь (клиент) успешно добавлен',
'TICKET_msg_OK'=>'Заявка выполнена',
'TICKET_msg_OK_error'=>'Невозможно выполнение. Заявка уже выполнена пользователем',
'TICKET_msg_unOK'=>'Заявка не выполнена',
'TICKET_msg_unOK_error'=>'Не удается выполнить',
'TICKET_msg_lock'=>'Заявка заблокирована',
'TICKET_msg_lock_error'=>'Невозможно заблокировать заявку. С ней работает ',
'TICKET_msg_unlock'=>'Заявка разблокирована',
'TICKET_msg_refer'=>'Заявка переадресована',
'empty'=>'пусто',
't_list_a_top'=>'ТОП 10 результатов поиска',

'TICKET_p_add_client'=>'Добавление клиента',
'TICKET_p_edit_client'=>'Редактирование клиента',


'TICKET_status_arch'=>'заявка в архиве',
'TICKET_status_ok'=>'заявка выполнена пользователем',
'TICKET_status_lock'=>'с заявкой работает',
'TICKET_status_new'=>'новая заявка, ожидание действия',

'TICKET_action_unlock'=>'Восстановить',
'TICKET_action_lock'=>'Заблокировать',
'TICKET_action_ok'=>'Выполнено',
'TICKET_action_nook'=>'Не выполнено',
'TICKET_msg_updated'=>'Заявка была обновлена​​.',

'TICKET_t_from'=>'Автор',
'TICKET_t_was_create'=>'Была создана',
'TICKET_t_to'=>'Исполнитель',
'TICKET_t_last_edit'=>'Редактировалось',
'TICKET_t_worker'=>'Пользователь',
'TICKET_t_last_up'=>'Последнее обновление',
'TICKET_t_status'=>'Статус',
'TICKET_t_prio'=>'Приоритет',
'TICKET_t_subj'=>'Тема',
'TICKET_t_refer'=>'Переадресация',
'TICKET_t_refer_to'=>'Переадресация на',
'TICKET_t_opt'=>'опционально',
'TICKET_t_in_arch'=>'Заявка находится в архиве.',
'TICKET_t_ok'=>'Заявка успешно выполнена пользователем',
'TICKET_t_ok_1'=>'Через некоторое время заявка перейдет в архив.',
'TICKET_t_lock'=>'В настоящее время с заявкой работает пользователь',
'TICKET_t_lock_1'=>'Поэтому Вы не можете работать с заявкой.',
'TICKET_t_lock_i'=>'В настоящее время Вы работаете с заявкой. Для того, чтобы другие могли работать, разблокируйте ее.',
'TICKET_t_comment'=>'Комментарии',
'TICKET_t_history'=>'История изменений',
'TICKET_t_your_comment'=>'Ваш комментарий',
'TICKET_t_det_ticket'=>'Укажите подробно суть заявки',
'TICKET_t_comm_ph'=>'Комментарий к заявке',
'TICKET_t_send'=>'Отправить',
'TICKET_t_date'=>'Дата',
'TICKET_t_init'=>'Автор',
'TICKET_t_action'=>'Действие',
'TICKET_t_desc'=>'Описание',
'TICKET_t_a_refer'=>'заявка переадресована на',
'TICKET_t_a_arch'=>'заявка перенесена в архив',
'TICKET_t_a_ok'=>'заявка отмечена как выполнена',
'TICKET_t_a_nook'=>'заявка отмечена как не выполнена',
'TICKET_t_a_lock'=>'заявка заблокирована',
'TICKET_t_a_unlock'=>'заявка разблокирована',
'TICKET_t_a_create'=>'заявка была создана',
'TICKET_t_a_e_text'=>'в заявке было изменено сообщение',
'TICKET_t_a_e_prio'=>'в заявке был изменён приоритет',
'TICKET_t_a_e_subj'=>'в заявке была изменена тема',
'TICKET_t_a_com'=>'заявка была прокомментирована',
'TICKET_t_no'=>'Нет такой заявки',
'TICKET_error_msg'=>'<strong>Упс!</strong> У Вас нет прав на добавление нового клиента.',

'CLIENTS_name'=>'Клиенты',
'CLIENTS_find'=>'Найти',
'CLIENTS_find_me'=>'Воспользуйтесь поиском для редактирования информации...',


'NAVBAR_tickets'=>'Заявки',
'NAVBAR_create_ticket'=>'Создать заявку',
'NAVBAR_list_ticket'=>'Список заявок',
'NAVBAR_workers'=>'Клиенты',
'NAVBAR_helper'=>'Центр знаний',
'NAVBAR_notes'=>'Блокнот',
'NAVBAR_admin'=>'Администрирование',
'NAVBAR_users'=>'Пользователи системы',
'NAVBAR_deps'=>'Отделы системы',
'NAVBAR_approve'=>'Подтверждения',
'NAVBAR_all_tickets'=>'Все заявки',
'NAVBAR_reports'=>'Отчеты',
'NAVBAR_db'=>'Справочники',
'NAVBAR_posads'=>'Должности',
'NAVBAR_units'=>'Управления',
'NAVBAR_subjs'=>'Темы заявок',
'NAVBAR_profile'=>'Профиль',
'NAVBAR_help'=>'Помощь',
'NAVBAR_logout'=>'Выйти',

'CONF_title_ext'=>'Конфигурация системы',

'TICKET_ACTION_refer'=>'переадресована пользователем',
'TICKET_ACTION_refer_to'=>'на',
'TICKET_ACTION_ok'=>'выполнена пользователем',
'TICKET_ACTION_nook'=>'не выполнена пользователем',
'TICKET_ACTION_lock'=>'заблокирована пользователем',
'TICKET_ACTION_unlock'=>'разблокирована пользователем',
'TICKET_ACTION_create'=>'создана пользователем',
'TICKET_ACTION_edit'=>'изменено пользователем',
'TICKET_ACTION_comment'=>'прокомментировано пользователем',
'TICKET_ACTION_arch'=>'заявка перенесена в архив',
'NOTES_title_ext'=>'Личные заметки',
'ALLSTATS_main_ext'=>'По отделам и пользователям',
'HELPER_title'=>'Центр знаний',
'HELPER_title_ext'=>'Популярные вопросы и их решения',
'HELPER_back'=>'назад',
'HELPER_print'=>'распечатать',
'HELPER_pub'=>'Опубликовал',
'HELPER_date'=>'Дата',
'HELPER_find'=>'Найти',
'HELPER_create'=>'создать новую запись',
'HELPER_desc'=>'Описание проблемы или вопросы...',

'USERS_title_ext'=>'Управление учётными записями',
'NOTES_title'=>'Персональный блокнот',
'NOTES_link'=>'Ссылка на запись',
'NOTES_create'=>'создать новую запись',
'NOTES_cr'=>'Добавление нового или выберите...',


'P_title'=>'Редактирование информации',
'P_main'=>'Общая информация',
'P_login'=>'Логин',
'P_mail'=>'E-mail',
'P_mail_desc'=>'Используется исключительно для оповещения.',
'P_edit'=>'Сохранить',
'P_passedit'=>'Изменение пароля',
'P_pass_old'=>'Старый пароль',
'P_pass_old2'=>'Пароль старый',
'P_pass_new'=>'Новый пароль',
'P_pass_new2'=>'Пароль новый',
'P_pass_new_re'=>'Повторите новый пароль',
'P_pass_new_re2'=>'Пароль новый (повторно)',
'P_do_edit_pass'=>'Изменить пароль',

'JS_not_found'=>'Не найдено...',
'JS_ticket'=>'Заявка',
'JS_up'=>'Обновлено!',
'JS_save'=>'Сохранить',
'JS_pub'=>'Поделиться',
'JS_del'=>'Действительно хотите удалить?',
'JS_create'=>'Добавление новой или выберите...',
'JS_low'=>'Низкий',
'JS_norm'=>'Средний',
'JS_high'=>'Высокий',
'JS_unit'=>'Пожалуйста, заполните поле подразделение',
'JS_probl'=>'Пожалуйста, заполните поле описание проблемы',
'JS_ok'=>'Выполнено',
'JS_no_ok'=>'Не выполнено',
'JS_unlock'=>'Восстановить',
'JS_lock'=>'Заблокировать',
'NAVBAR_workers_list'=>'Список клиентов',
'NAVBAR_workers_add'=>'Создать клиента',
'LIST_pin' => 'Отделов',
'USERS_title'=>'Пользователи системы',
'USERS_create'=>'Создать пользователя',
'USERS_list'=>'Пользователи',
'USERS_profile_priv'=>'Видимость заявок',
'USERS_msg_add'=>'Пользователь успешно добавлен!',
'USERS_new'=>'Новый клиент',
'USERS_new_add'=>'Новый пользователь',
'USERS_fio'=>'ФИО',
'USERS_fio_full'=>'Фамилии, имя и отчество',
'USERS_login'=>'Логин',
'USERS_pass'=>'Пароль',
'USERS_mail'=>'E-mail',
'USERS_units'=>'Отделы',
'USERS_unit'=>'Отдел',
'USERS_nach1'=>'Начальник управления',
'USERS_nach1_desc'=>'Будет видеть все заявки.',
'USERS_nach'=>'Начальник отдела',
'USERS_nach_desc'=>'Будет видеть все заявки, адресованные в выбранные отделы, а также адресованые всем пользователям отдела.',
'USERS_wo'=>'Сотрудник',
'USERS_wo_desc'=>'Будет видеть все заявки, адресованные в отдел и пользователю. Заявки другим пользователям отдела будет не видно.',
'USERS_make_create'=>'Создать пользователя',
'FILES_title_ext'=>'Управление файлами заявок',
'POSADA_title_ext'=>'Управление должностями',
'USERS_uid'=>'UID',
'USERS_privs'=>'Привилегии',
'USERS_p_1'=>'Нач. отдела',
'USERS_p_2'=>'Сотрудник',
'USERS_p_3'=>'Нач. управления',
'USERS_p_4'=>'Клиент',
'USERS_msg_edit_ok'=>'Данные пользователя успешно отредактированы!',
'USERS_make_edit'=>'Редактировать данные клиента',
'USERS_make_edit_user'=>'Редактировать данные пользователя',
'DEPS_title_ext'=>'Управление подразделениями',
'USERS_acc'=>'Аккаунт',
'USERS_not_active'=>'Выключен',
'USERS_active'=>'Включен',
'USERS_editable'=>'Редактировать данные',

'DEPS_title'=>'Отделы',
'DEPS_name'=>'Название отдела',
'DEPS_add'=>'Добавить',
'DEPS_n'=>'Название',
'DEPS_action'=>'Действие',


'APPROVE_title'=>'Подтверждение изменения информации',
'APPROVE_info'=>'Информация',
'APPROVE_fio'=>'ФИО',
'APPROVE_login'=>'Логин',
'APPROVE_posada'=>'Должность',
'APPROVE_unit'=>'Подразделение',
'APPROVE_tel'=>'Тел',
'APPROVE_adr'=>'Адрес',
'APPROVE_mail'=>'E-mail',
'APPROVE_app'=>'Подтвердить?',
'APPROVE_orig'=>'Оригинал',
'APPROVE_yes'=>'Да',
'APPROVE_no'=>'Нет',
'APPROVE_want_edit'=>'хочет изменить на',
'APPROVE_want_add'=>'хочет создать',

'POSADA_title'=>'Должности',
'POSADA_name'=>'Название должности',
'POSADA_add'=>'Добавить',
'POSADA_n'=>'Название',
'POSADA_action'=>'Действие',


'UNITS_title'=>'Подразделения клиентов',
'UNITS_title_ext'=>'Управление подразделениями клиентов',
'UNITS_name'=>'Название управления',
'UNITS_add'=>'Добавить',
'UNITS_n'=>'Название',
'UNITS_action'=>'Действие',


'SUBJ_title'=>'Темы заявок',
'SUBJ_name'=>'Название темы',
'SUBJ_add'=>'Добавить',
'SUBJ_n'=>'Название',
'SUBJ_action'=>'Действие',


'STATS_TITLE'=>'Статистика пользователя',
'STATS_in'=>'Входящие заявки',
'STATS_out'=>'Исходящие заявки',
'STATS_new'=>'Новые',
'STATS_lock'=>'С которыми работаю',
'STATS_ok'=>'Выполнено мной',
'STATS_nook'=>'Не выполненные',
'STATS_create'=>'Создано мной',
'STATS_lock_o'=>'Работают',
'STATS_ok_o'=>'Выполнено',
'STATS_help1'=>'<li> новые - заявки , которые адресованы Вам или Вашему отделу и Вы можете их выполнить. </li > <li> Заблокированные - заявки, над которыми Вы работаете. </li > <li> Выполненные - заявки, которые Вы уже выполнили (через некоторое время перейдут в архив и исчезнут по графику) </li >',
'STATS_help2'=>'<li> Не выполненные - заявки, которые вы создали, но их еще никто не выполнил. </li > <li> Заблокированные - заявки, над которыми кто-то работает. </li > <li> Выполненные - заявки, которые Вы создали и их выполнили </li >',
'STATS_in_now'=>'Входящие заявки в настоящее время',
'STATS_t'=>'Заявок',
'STATS_t_ok'=>'Выполненные',
'STATS_t_free'=>'Свободные',
'STATS_out_all'=>'Исходящие заявки за весь период',
'STATS_t_lock'=>'С которыми работают',

'DEPS_info'=>'В данном разделе содержатся отделы, в которые входят пользователи системы.<br> При создании заявки, вы можете выбрать один из этих отделов.',
'SUBJ_info'=>'В данном разделе содержатся темы заявок.<br> При создании заявки, вы можете выбрать тему заявки.',
'POSADA_info'=>'В данном разделе содержатся должности пользователей (клиентов).<br> При создании заявки, если у Вас есть права на редактирование/добавление пользователей (клиентов), Вы сможете указывать должность.',
'UNITS_info'=>'В данном разделе содержатся отделы пользователей (клиентов).<br> При создании заявки, если у Вас есть права на редактирование/добавление пользователей (клиентов), Вы сможете указывать отдел.',
'DASHBOARD_def_msg'=>', приветствуем Вас в системе заявок! </strong> </center> <br> Рекомендуем Вам посмотреть <a href=\'help\' class=\'alert-link\'> </i> инструкции </a> по работе с системой. <br> Или <a href=\'create\'class=\'alert-link\'> создайте новую заявку </a> прямо сейчас!',

'msg_creted_new_user' => 'Будет заведен новый пользователь.',


'MAIL_active' => 'Учетная запись активирована',
'MAIL_adr' => 'Адрес',
'MAIL_active_u' => 'Учетная запись пользователя активирована',
'MAIL_cong' => 'Приветствуем Вас в системе заявок',
'MAIL_data' => 'Данные',
'MAIL_name' => 'Система заявок',
'MAIL_new' => 'НОВАЯ ЗАЯВКА',
'MAIL_code' => 'Код заявки',
'MAIL_2link' => 'Перейти на страницу заявки',
'MAIL_info' => 'Информация',
'MAIL_created' => 'Заявку создал',
'MAIL_to' => 'Кому',
'MAIL_prio' => 'Приоритет',
'MAIL_worker' => 'Сотрудник',
'MAIL_msg' => 'Сообщение',
'MAIL_subj' => 'Тема',
'MAIL_text' => 'Текст',
't_LIST_worker_to' => 'сотруднику',
't_LIST_person' => 'персонально',

'HELP_title' => 'Инструкция по работе с заявками',
'HELP_new' => 'Создание заявки',
'HELP_review' => 'Просмотр заявки',
'HELP_edit_user' => 'Изменение информации о пользователе',
'HELP_new_text' => '<p>Для создания заявки, Вам необходимо заполнить обязательные поля.
                                </p>
                                <ol>
                                    <li><strong>От кого</strong> - Вам необходимо начать набирать часть фамилии, имя, отчество или логин. Если такой работник уже есть в системе, то Вам автоматически будет предложено выбрать его из Списка. Если его нет - то он будет создан. В правой части страницы Вы можете дополнительно указать контактную информацию о работнике. Как правило это контактный телефон, адрес.</li>
                                    <li><strong>Кому</strong> - указывается отдел. Обязательно указать отдел, а также опционально исполнителя. Если указать только отдел, то заявку увидят все сотрудники отдела. Если указать еще и исполнителя, то заявку увидит лишь исполнитель а также начальник его отдела.</li>
                                    <li><strong>Приоритет</strong> - указывается приоритет выполнения заявки. В общем списке заявки его можно увидеть определенными пометками.</li>
                                    <li><strong>Тема</strong> - указывается кратко тема заявки.</li>
                                    <li><strong>Сообщение</strong> - указывается подробно суть заявки.</li>
                                </ol>',
'HELP_review_text' => '<p>Вам доступны три "каталога": "Входящие", "Исходящие", "Архив". Подробно о них ниже.
                                </p>
                                <ul>
                                    <li><strong>Входящие</strong> - в этом каталоге содержатся все заявки, адресованые Вам непосредственно или Вашему отделу.
При наличии прав пользователя - вы видите только заявки адресованые всему отделу или Вам непосредственно. (заявки адресованы Вам и отделу).
При наличии прав начальника отдела - вы видите все заявки Вашего отдела (адресованные Вам, пользователям, и отделу).
                                    </li>
                                    <li><strong>Исходящие</strong> - в этом каталоге содержатся все заявки которые создавали Вы. Вы можете просматривать статус Ваших создаваемых заявок.
                                    </li>
                                    <li><strong>Архив</strong> - в этом каталоге содержатся все заявки которые были выполнены, и через некоторое время перешли в архив. Они отправляются в архив автоматически.
                                    </li>
                                </ul>
                                <p>
                                    В списке заявки имеют разные цвета, для того, чтобы видеть их статус. Если заявка черного цветом - то она не прочитана. Синего - ожидает действия. Желтого - блокирована Вами. Серого - блокирована пользователем. Зеленого - заявка выполнена.
                                </p>
                                <center>
                                
                                </center>
                                <p>
                                    <strong>Как только Вы или Ваш отдел получили новую заявку</strong>, Вам необходимо просмотреть ее, нажав на тему и принять решение:
                                <ul>
                                    <li><strong>Переадресовать на другой отдел / или пользователя</strong> - Если заявка не в Вашей компетенции, то вы можете перевести заявку на другой отдел или пользователя.
                                    </li>
                                    <li><strong>Заблокировать ее</strong> - для того чтобы все видели, что Вы работаете в данное время с заявкой, и другие пользователи не смогли ничего делать с заявкой кроме начальника отдела.
                                    <li><strong>Выполнить ее</strong> - значит заявку выполнили и через некоторое время она попадет в архив</li>

                                        </ul>
                                    </li>
                                </ul>
                                </p>
                                <p>
                                    Также вы можете оставить комментарий к заявке.
                                </p>',
'HELP_edit_user_text' => '<p>Иногда возникает необходимость дополнить информацию о пользователе или изменить ее.
Для этого существует раздел - Пользователи. Найдите того пользователя, который вам нужен и измените данные. После чего, они пройдут проверку администратором системы и изменятся.
                                </p>',
'REFER_comment_add'=>'дополнил',
'TICKET_file_upload'=>'выбрать файлы',
'TICKET_file_startupload'=>'загрузить',
'TICKET_file_notupload'=>'отменить загрузку',
'TICKET_file_notupload_one'=>'отменить',
'TICKET_file_upload_msg'=>'Вы можете перенести файлы на страницу',
'TICKET_file_add'=>'Добавить файл',
'TICKET_file_list'=>'Прикреплённые файлы',
'SYSTEM_lang'=>'Язык',
'summernote_lang'=> 'ru-RU',
'note_save'=>'Запись сохранена',
'upload_errortypes'=>'Тип файла не допускается',
'upload_errorsize'=>'Слишком большой файл',
'upload_not_u' => 'Вы забыли загрузить файлы',
'userinfo_ticket'=>'Заявки пользователя',
'file_info'=>'Файл',
'file_info2'=>'загружен',
'last_more'=>'еще',
'ticket_sort_def'=>'Показать все',
'ticket_sort_ok'=>'Выполненные',
'ticket_sort_ilock'=>'Заблокированные мной',
'ticket_sort_lock'=>'Заблокированые не мной',
''=>''

            );
    return isset($lang[$phrase]) ? $lang[$phrase] : 'undefined';
}
?>