<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2022-05-19 09:38:17 --- CRITICAL: Database_Exception [ 2 ]: mysqli::__construct(): (HY000/2002): No connection could be made because the target machine actively refused it ~ MODPATH\database\classes\Kohana\Database\MySQLi.php [ 75 ] in C:\xampp\htdocs\kohana\modules\database\classes\Kohana\Database\MySQLi.php:154
2022-05-19 09:38:17 --- DEBUG: #0 C:\xampp\htdocs\kohana\modules\database\classes\Kohana\Database\MySQLi.php(154): Kohana_Database_MySQLi->connect()
#1 C:\xampp\htdocs\kohana\modules\database\classes\Kohana\Database\MySQLi.php(337): Kohana_Database_MySQLi->query(1, 'SHOW FULL COLUM...', false)
#2 C:\xampp\htdocs\kohana\modules\orm\classes\Kohana\ORM.php(1668): Kohana_Database_MySQLi->list_columns('`users`')
#3 C:\xampp\htdocs\kohana\modules\orm\classes\Kohana\ORM.php(444): Kohana_ORM->list_columns()
#4 C:\xampp\htdocs\kohana\modules\orm\classes\Kohana\ORM.php(389): Kohana_ORM->reload_columns()
#5 C:\xampp\htdocs\kohana\modules\orm\classes\Kohana\ORM.php(254): Kohana_ORM->_initialize()
#6 C:\xampp\htdocs\kohana\modules\orm\classes\Kohana\ORM.php(46): Kohana_ORM->__construct(NULL)
#7 C:\xampp\htdocs\kohana\application\classes\Controller\Register.php(27): Kohana_ORM::factory('Model_User')
#8 C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php(84): Controller_Register->action_register()
#9 [internal function]: Kohana_Controller->execute()
#10 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Register))
#11 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 C:\xampp\htdocs\kohana\system\classes\Kohana\Request.php(993): Kohana_Request_Client->execute(Object(Request))
#13 C:\xampp\htdocs\kohana\index.php(118): Kohana_Request->execute()
#14 {main} in C:\xampp\htdocs\kohana\modules\database\classes\Kohana\Database\MySQLi.php:154
2022-05-19 09:39:45 --- CRITICAL: Database_Exception [ 1932 ]: Table 'fitstart.users' doesn't exist in engine [ SHOW FULL COLUMNS FROM `users` ] ~ MODPATH\database\classes\Kohana\Database\MySQLi.php [ 171 ] in C:\xampp\htdocs\kohana\modules\database\classes\Kohana\Database\MySQLi.php:337
2022-05-19 09:39:45 --- DEBUG: #0 C:\xampp\htdocs\kohana\modules\database\classes\Kohana\Database\MySQLi.php(337): Kohana_Database_MySQLi->query(1, 'SHOW FULL COLUM...', false)
#1 C:\xampp\htdocs\kohana\modules\orm\classes\Kohana\ORM.php(1668): Kohana_Database_MySQLi->list_columns('`users`')
#2 C:\xampp\htdocs\kohana\modules\orm\classes\Kohana\ORM.php(444): Kohana_ORM->list_columns()
#3 C:\xampp\htdocs\kohana\modules\orm\classes\Kohana\ORM.php(389): Kohana_ORM->reload_columns()
#4 C:\xampp\htdocs\kohana\modules\orm\classes\Kohana\ORM.php(254): Kohana_ORM->_initialize()
#5 C:\xampp\htdocs\kohana\modules\orm\classes\Kohana\ORM.php(46): Kohana_ORM->__construct(NULL)
#6 C:\xampp\htdocs\kohana\application\classes\Controller\Register.php(27): Kohana_ORM::factory('Model_User')
#7 C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php(84): Controller_Register->action_register()
#8 [internal function]: Kohana_Controller->execute()
#9 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Register))
#10 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#11 C:\xampp\htdocs\kohana\system\classes\Kohana\Request.php(993): Kohana_Request_Client->execute(Object(Request))
#12 C:\xampp\htdocs\kohana\index.php(118): Kohana_Request->execute()
#13 {main} in C:\xampp\htdocs\kohana\modules\database\classes\Kohana\Database\MySQLi.php:337