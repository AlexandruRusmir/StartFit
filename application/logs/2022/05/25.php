<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2022-05-25 13:29:31 --- CRITICAL: Database_Exception [ 1146 ]: Table 'fitstart.auth_users' doesn't exist [ SHOW FULL COLUMNS FROM `auth_users` ] ~ MODPATH\database\classes\Kohana\Database\MySQLi.php [ 171 ] in C:\xampp\htdocs\kohana\modules\database\classes\Kohana\Database\MySQLi.php:337
2022-05-25 13:29:31 --- DEBUG: #0 C:\xampp\htdocs\kohana\modules\database\classes\Kohana\Database\MySQLi.php(337): Kohana_Database_MySQLi->query(1, 'SHOW FULL COLUM...', false)
#1 C:\xampp\htdocs\kohana\modules\orm\classes\Kohana\ORM.php(1670): Kohana_Database_MySQLi->list_columns('`auth_users`')
#2 C:\xampp\htdocs\kohana\modules\orm\classes\Kohana\ORM.php(444): Kohana_ORM->list_columns()
#3 C:\xampp\htdocs\kohana\modules\orm\classes\Kohana\ORM.php(389): Kohana_ORM->reload_columns()
#4 C:\xampp\htdocs\kohana\modules\orm\classes\Kohana\ORM.php(254): Kohana_ORM->_initialize()
#5 C:\xampp\htdocs\kohana\modules\orm\classes\Kohana\ORM.php(46): Kohana_ORM->__construct(NULL)
#6 C:\xampp\htdocs\kohana\application\classes\Controller\SuperAdminStandard.php(23): Kohana_ORM::factory('Model_Auth_User')
#7 C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php(84): Controller_SuperAdminStandard->action_returnUsersList()
#8 [internal function]: Kohana_Controller->execute()
#9 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_SuperAdminStandard))
#10 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#11 C:\xampp\htdocs\kohana\system\classes\Kohana\Request.php(993): Kohana_Request_Client->execute(Object(Request))
#12 C:\xampp\htdocs\kohana\index.php(118): Kohana_Request->execute()
#13 {main} in C:\xampp\htdocs\kohana\modules\database\classes\Kohana\Database\MySQLi.php:337
2022-05-25 13:30:04 --- CRITICAL: Error [ 0 ]: Class "Model_users" not found ~ MODPATH\orm\classes\Kohana\ORM.php [ 46 ] in C:\xampp\htdocs\kohana\application\classes\Controller\SuperAdminStandard.php:23
2022-05-25 13:30:04 --- DEBUG: #0 C:\xampp\htdocs\kohana\application\classes\Controller\SuperAdminStandard.php(23): Kohana_ORM::factory('Model_users')
#1 C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php(84): Controller_SuperAdminStandard->action_returnUsersList()
#2 [internal function]: Kohana_Controller->execute()
#3 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_SuperAdminStandard))
#4 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 C:\xampp\htdocs\kohana\system\classes\Kohana\Request.php(993): Kohana_Request_Client->execute(Object(Request))
#6 C:\xampp\htdocs\kohana\index.php(118): Kohana_Request->execute()
#7 {main} in C:\xampp\htdocs\kohana\application\classes\Controller\SuperAdminStandard.php:23
2022-05-25 13:30:20 --- CRITICAL: TypeError [ 0 ]: Unsupported operand types: string + string ~ APPPATH\classes\Controller\SuperAdminStandard.php [ 33 ] in C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php:84
2022-05-25 13:30:20 --- DEBUG: #0 C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php(84): Controller_SuperAdminStandard->action_returnUsersList()
#1 [internal function]: Kohana_Controller->execute()
#2 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_SuperAdminStandard))
#3 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 C:\xampp\htdocs\kohana\system\classes\Kohana\Request.php(993): Kohana_Request_Client->execute(Object(Request))
#5 C:\xampp\htdocs\kohana\index.php(118): Kohana_Request->execute()
#6 {main} in C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php:84