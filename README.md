# ZENLIX-2
WEB HELPDESK SYSTEM v.2.95 (deprecated)

https://ru.zenlix.com/ !!! NEW version there https://zenlix.com/

![](https://github.com/ZENLIX/ZENLIX-2/blob/master/zenlix_2.x.png?raw=true)

### Общий принцип работы системы
Система разработана для организации, которая ведёт учёт задач, следит за статусом их выполнения. Эти задачи называются заявками. Заявки могут создаваться как внутри организации на пользователей, так и внешне — напр. клиентами на пользователей. Система будет полезна компаниям, которые обслуживают клиентов. Они могут интегрировать учётные записи клиентов с системой ZENLIX и принимать заявки от клиентов, через web, e-mail или API-интерфейс.

![](https://ru.zenlix.com/files/view/5e2tLvNwutIHlWompsqrXso0fWiVUB.png)

Если в организации нет клиентов, но есть задачи и сотрудники, на которых расписываются задачи, то ZENLIX будет незаменимым инструментом контроля выполнения поставленных задач. Заявки создаются через web-интерфейс, который имеет адаптивный дизайн, либо e-mail. Оповещение о событиях заявок присылается на почту или через SMS. А у пользователя будет всплывающее уведомление на веб-странице.


### Внешний портал
Внешний портал - это продукт, который входит в пакет ZENLIX. Он может быть как активен так и нет. Это решение призвано обеспечить ещё большую связь разработчика с клиентом. Если система заявок имеет связи клиент-разработчик, то Внешний Портал это публичный сайт, на котором можно обсуждать продукт, а так же оказывать его поддержку открыто. Данный процесс обеспечивают посты, с типами сообщений: 

- Вопрос 
- Предложение 
- Проблема 
- Благодарность 

Данные типы сообщений могут иметь статусы, официальные ответы и комментарии, что позволяет рассортировать сообщения клиентов.

![](https://ru.zenlix.com/files/view/WeesoQ0wMZ5Gozxb1qGqh8amldJ2wg.png)

Так же есть отдельные разделы: 

- Новости На котором можно публиковать последние Ваши новости. 
- История версий На котором можно размещать информацию об состоявшихся релизах, списке изменений, 
- CHANGELOG, а так же текущий список задач и их статус выполнено или нет. 
- Центр знаний Состоит из разделов и категорий материалов а так же часто задаваемых вопросов и ответов, по которым можно быстро найти необходимую информацию.

### Права пользователей

![](https://ru.zenlix.com/files/view/beAFGyVE4UhOeU8aWdUwdddlQs4c7f.jpg)

Основными полноценными привилегиями в системе есть:

- Начальник департамента
- Начальник отдела
- Пользователь отдела - Пользователи с данными привилегиями могут создавать, получать и переадресовывать заявки, а так же быть привязаны к одному или нескольким отделам.

Привилегии обычных пользователей-клиентов это:

- Клиенты
- Главный среди группы клиентов (доступны все заявки группы клиентов)
Клиенты имеют ограниченный интерфейс для работы с системой. Они не могут быть привязаны к отделу и получать заявки от других пользователей системы.


### SLA-планы

Данная функция позволяет администратору создать определённые темы заявок, которые имеют чёткие временные критерии. Каждый такой SLA-план, имеет такие критерии:

- Допустимое время реакции на заявку при низком, среднем и высоком приоритетах
- Допустимое время на работу с заявкой при низком, среднем и высоком приоритетах
- Крайний срок выполнения заявки при низком, среднем и высоком приоритетах

Каждый показатель устанавливает время по к-ву:

- Дней
- Часов
- Минут
- Секунд

![](https://ru.zenlix.com/files/view/uoKkpgFA73On71gih7DjDsVYH9eyok.png)

Если включена система SLA-планов, то стандартные опции поле крайний срок выполнения заявки не доступно при создании заявки, так как сам SLA-план уже включает крайний срок выполнения заявки. Так же стандартные темы заявок заменяются на темы из SLA-планов.

Допустимое время реакции на заявку - описывает время, за которое пользователь системы должен среагировать на заявку, а именно заблокировать её (взять в работу). С момента создания заявки до времени первой блокировки заявки и является время реакции на заявку.


Допустимое время на работу с заявкой - описывает время, в течении которого пользователь работает с заявкой, в статусе заблокировано. Это время состоит суммируется по всем пользователям, кто работал с заявкой. Суммируются временные интервалы от времени блокировки заявки до времени разблокировки, от времени блокировки до времени выполнения, от времени действия пометки как не выполнения заявки для времени разблокировки или выполнения.


Крайний срок выполнения заявки - описывает время, крайний срок до которого пользователь должен выполнить заявку. Данное время считается с момента создания заявки до момента её выполнения.


Начальникам отделов и управления доступны SLA-отчёты, которые показывают к-во созданных, входящих, выполненныз и не выполненных заявок выбранным отделом за определённый период с данными по SLA, а именно процент успешности выполнения той или иной заявки среди уже выполненных и ещё не выполненных.

![](https://ru.zenlix.com/files/view/8Mrz0GIeKaN8Nhzil6C08kUxgX3yRY.png)

### Система уведомлений

Для уведомлений пользователей разработана система уведомлений, которая работает независимо, асинхронно с действиями пользователя и обрабатывает очереди сообщений. Это позволяет рассылать огромное количество уведомлений не нагружая интерфейс системы. К примеру, если была прокомментирована заявка, то уведомление прийдёт автору заявки, исполнителю и всем кто писал в комментариях, за исключением самого автора действия. Если заявка создавалась на пользователей разных отделов, то письмо получат не только пользователи, но и начальники разных отделов.

![](https://ru.zenlix.com/files/view/leGXH3lq3tiz40140aVmaARdmorY1m.jpg)

Система уведомлений состоит из: 

- Почтовых уведомлений
- PUSHBULLET-уведомлений
- Всплывающих уведомлениях в веб-интерфейсе

Каждое из этих уведомлений обрабатывается отдельно через очередь, при условии наличии адреса получателя.


Почтовые уведомления (а так же все другие) состоят из тригеров:

- При создании заявки 
письма получают исполнитель заявки: если отдел, то все пользователи отдела, 
если конкретные люди, то только они и их начальники
- При переадресации заявки
письма получают исполнитель заявки: если отдел, то все пользователи отдела, 
если конкретные люди, то только они и их начальники
- При блокировании заявки
письма получают начальники отделов того, кто заблокировал заявку, а так же автор заявки, если только не он инициатор действия блокировки
- При разблокировке заявки
письма получают начальники отделов того, кто разблокировал заявку, а так же автор заявки, если только не он инициатор действия разблокировки
- При выполнении заявки
письма получают начальники отделов того, кто выполнил заявку, а так же автор заявки, если только не он инициатор действия выполнения
- При пометке, как не выполнено
письма получают начальники отделов того, кто пометил как заявка не выполнена, а так же автор заявки, если только не он инициатор действия пометки не выполнено
- При комментарии
письма получают начальники отделов того, кто прокомментировал заявку, а так же автор заявки, если только не он инициатор действия комментария, а так же все те, кто ранее комментировал заявку


Отдельно письма приходят при:

- Массовой рассылке писем
- Регистрации нового пользователя
- Восстановлении пароля
- Комментарии к посту на Внешнем Портале всем кто комментировал ранее пост, кроме инициатора действия комментария

Для работы системы уведомлений должна быть добавлена строка запуска скрипта обработки очереди уведомлений в планировщик задач. Узнать полный путь можно из меню: "Администрирование" - "Настройка системы" - "Информация", либо через: {ZENLIX_URL}/config?inform

### Описание API

Для работы с системой разработан API, через который на данный момент можно выполнять следующие действия:


- Авторизация
- Просмотр входящих заявок
- Просмотр исходящих заявок
- Просмотр архивных заявок
- Просмотр определённой заявки
- Блокировка заявки
- Разблокировка заявки
- Выполнение заявки
- Пометка как не выполнение заявки
- Просмотр информации о пользователе
- Просмотр информации об отделе
- Получение списка отделов
- Просмотр списка тем
- Просмотр списка должностей
- Просмотр комментариев заявки
- Создание заявки
- Перенаправление заявки
- Комментирование заявки
- Получение списка пользователей отдела
- Получение списка всех пользователей и клиентов по email, логину, ФИО или номеру телефона.

Формат запросов JSON.

Кодировка UTF-8.
[link](https://ru.zenlix.com/support/download/zH0mObONdzpuBpaACG5b0enjyxYgge)


### Системные требования

Система написана на php с использованием БД MySQL. Интерфейс использует JQuery. Для работы серверной части, необходимы:

- Веб-сервер:	Apache or Nginx, с поддержкой mod_rewrite
- PHP-интерпритатор:	PHP 5.x (офиц. поддерживаемая стаб. версия), short_open_tag = on, LDAP, PDO, sendmail, memory_limit: 512M
- БД:	MySQL
- Планировщик задач:	CRON или аналогичный, для почтовых уведомлений и переноса заявок в архив.
- NodeJS:	socket.io, mysql (для интерактивности сайта), pm2 (для поддержки nodeJS)

В качестве ОС рекомендовано любую UNIX-систему. Для работы клиента рекомендовано использовать любой из современных веб-браузеров с поддержкой JavaScript. 
Дистрибутив zenlix с чистой установки занимает около 20Мб. Для комфортной работы 1000 клиентов, 50 online-пользователей и 100 заявок в день будет достаточно: VPS с ОЗУ: 1024M. HDD зависит только от пользовательских вложений к заявкам.

### Инсталляция системы

Перед инсталляцией убедитесь, что Ваша система отвечает системным требованиям, напр. UBUNTU server 14.04.x.

- Распакуйте полученный архив в директорию веб-сервера.
- Зайдите через веб в распакованную директорию. Следуйте инструкциям инсталлятора.
- Авторизируйтесь, используя логин system и пароль 1234.
- Перейдите в «Администрирование» => «Настройки системы». Заполните всю нужную информацию. Внесите в планировщик задач две задачи, описанные на странице «настройки системы».
- Далее, Вам необходимо установить nodejs, а так же модули: mysql & socket.io.
- Запустите сервер: используя строку подсказку из «Администрирование» => «Настройки системы».
- Обратите внимание так же на то, что Ваш firewall не блокирует адреса nodejs-сервера.

Пример установки под ubuntu 14.04-1: 
Обновление дерева портов:

```
$ sudo apt-get update
```

Установка VESTA-панели

```
$ curl -O http://vestacp.com/pub/vst-install.sh
$ sudo bash vst-install.sh
```

Установка модулей php

```
$ apt-get install php5-imap
$ php5enmod imap
$ sudo apt-get install php5-ldap
$ sudo service apache2 restart
```

Установка nodejs и всего что с ним связано

```
$ sudo apt-get install nodejs
$ sudo apt-get install npm
$ sudo npm install pm2 -g
$ sudo npm install socket.io -g
$ sudo npm install mysql -g
$ sudo ln -s /usr/bin/nodejs /usr/bin/node
```

Войдите в VESTA, используя логин и пароль, ранее отправленные на почту, создайте WEB-домен и БД. 

Войдите по FTP/SFTP в созданный сайт и распакуйте архив zenlix.

Войдите по WEB в созданный сайт и следуйте инструкциям.

Отредактируйте файл nginx.conf Вашего веб-каталога (обычно /home/admin/conf/web/nginx.conf), добавив следующее:

```
  location /socket.io {
    proxy_set_header Upgrade $http_upgrade;
    proxy_set_header Connection "upgrade";
    proxy_http_version 1.1;
    proxy_set_header X-Forwarded-For $proxy_add_x_forwarded_for;
    proxy_set_header Host $host;
    proxy_pass http://127.0.0.1:3001/socket.io/;
  }
```

После удачной установки, не забудьте добавить в VESTA планировщик задачи из: «Администрирование» => «Настройки системы». Так же запустить nodejs(pm2) используя строку подсказку из «Администрирование» => «Настройки системы».

```
$ sudo pm2 startup
$ sudo pm2 save
```

Всё готово! 

### Вопросы

Данная версия не поддерживается проектом ZENLIX, поэтому была опубликована в открытом доступе. Есть более новая стабильная версия на Laravel 5.1, которая успешно развивается и поддерживается.

Все вопросы пишите на support@zenlix.com

Так же некоторую информацию по работе с системой можно найти тут: https://ru.zenlix.com/support/v295