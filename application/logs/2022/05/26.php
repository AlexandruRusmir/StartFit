<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2022-05-26 11:20:40 --- CRITICAL: ParseError [ 0 ]: syntax error, unexpected token "if" ~ APPPATH\classes\Controller\UsersHandling.php [ 18 ] in file:line
2022-05-26 11:20:40 --- DEBUG: #0 [internal function]: Kohana_Core::auto_load('Controller_User...')
#1 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client\Internal.php(74): class_exists('Controller_User...')
#2 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#3 C:\xampp\htdocs\kohana\system\classes\Kohana\Request.php(993): Kohana_Request_Client->execute(Object(Request))
#4 C:\xampp\htdocs\kohana\index.php(118): Kohana_Request->execute()
#5 {main} in file:line
2022-05-26 11:20:49 --- CRITICAL: Error [ 0 ]: Call to undefined method Database_MySQLi_Result::find_all() ~ APPPATH\classes\Controller\UsersHandling.php [ 21 ] in C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php:84
2022-05-26 11:20:49 --- DEBUG: #0 C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php(84): Controller_UsersHandling->action_returnUsersList()
#1 [internal function]: Kohana_Controller->execute()
#2 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_UsersHandling))
#3 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 C:\xampp\htdocs\kohana\system\classes\Kohana\Request.php(993): Kohana_Request_Client->execute(Object(Request))
#5 C:\xampp\htdocs\kohana\index.php(118): Kohana_Request->execute()
#6 {main} in C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php:84
2022-05-26 11:22:36 --- CRITICAL: Error [ 0 ]: Call to undefined method Database_MySQLi_Result::find_all() ~ APPPATH\classes\Controller\UsersHandling.php [ 21 ] in C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php:84
2022-05-26 11:22:36 --- DEBUG: #0 C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php(84): Controller_UsersHandling->action_returnUsersList()
#1 [internal function]: Kohana_Controller->execute()
#2 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_UsersHandling))
#3 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 C:\xampp\htdocs\kohana\system\classes\Kohana\Request.php(993): Kohana_Request_Client->execute(Object(Request))
#5 C:\xampp\htdocs\kohana\index.php(118): Kohana_Request->execute()
#6 {main} in C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php:84
2022-05-26 11:30:26 --- CRITICAL: Database_Exception [ 1146 ]: Table 'fitstart.auth_users' doesn't exist [ SHOW FULL COLUMNS FROM `auth_users` ] ~ MODPATH\database\classes\Kohana\Database\MySQLi.php [ 171 ] in C:\xampp\htdocs\kohana\modules\database\classes\Kohana\Database\MySQLi.php:337
2022-05-26 11:30:26 --- DEBUG: #0 C:\xampp\htdocs\kohana\modules\database\classes\Kohana\Database\MySQLi.php(337): Kohana_Database_MySQLi->query(1, 'SHOW FULL COLUM...', false)
#1 C:\xampp\htdocs\kohana\modules\orm\classes\Kohana\ORM.php(1670): Kohana_Database_MySQLi->list_columns('`auth_users`')
#2 C:\xampp\htdocs\kohana\modules\orm\classes\Kohana\ORM.php(444): Kohana_ORM->list_columns()
#3 C:\xampp\htdocs\kohana\modules\orm\classes\Kohana\ORM.php(389): Kohana_ORM->reload_columns()
#4 C:\xampp\htdocs\kohana\modules\orm\classes\Kohana\ORM.php(254): Kohana_ORM->_initialize()
#5 C:\xampp\htdocs\kohana\modules\orm\classes\Kohana\ORM.php(46): Kohana_ORM->__construct(NULL)
#6 C:\xampp\htdocs\kohana\application\classes\Controller\UsersHandling.php(12): Kohana_ORM::factory('Model_Auth_User')
#7 C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php(84): Controller_UsersHandling->action_returnUsersList()
#8 [internal function]: Kohana_Controller->execute()
#9 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_UsersHandling))
#10 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#11 C:\xampp\htdocs\kohana\system\classes\Kohana\Request.php(993): Kohana_Request_Client->execute(Object(Request))
#12 C:\xampp\htdocs\kohana\index.php(118): Kohana_Request->execute()
#13 {main} in C:\xampp\htdocs\kohana\modules\database\classes\Kohana\Database\MySQLi.php:337
2022-05-26 11:30:59 --- CRITICAL: Error [ 0 ]: Class "Model_Users" not found ~ MODPATH\orm\classes\Kohana\ORM.php [ 46 ] in C:\xampp\htdocs\kohana\application\classes\Controller\UsersHandling.php:12
2022-05-26 11:30:59 --- DEBUG: #0 C:\xampp\htdocs\kohana\application\classes\Controller\UsersHandling.php(12): Kohana_ORM::factory('Model_Users')
#1 C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php(84): Controller_UsersHandling->action_returnUsersList()
#2 [internal function]: Kohana_Controller->execute()
#3 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_UsersHandling))
#4 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 C:\xampp\htdocs\kohana\system\classes\Kohana\Request.php(993): Kohana_Request_Client->execute(Object(Request))
#6 C:\xampp\htdocs\kohana\index.php(118): Kohana_Request->execute()
#7 {main} in C:\xampp\htdocs\kohana\application\classes\Controller\UsersHandling.php:12
2022-05-26 11:31:08 --- CRITICAL: Error [ 0 ]: Object of class Database_MySQLi_Result could not be converted to string ~ APPPATH\classes\Controller\UsersHandling.php [ 13 ] in C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php:84
2022-05-26 11:31:08 --- DEBUG: #0 C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php(84): Controller_UsersHandling->action_returnUsersList()
#1 [internal function]: Kohana_Controller->execute()
#2 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_UsersHandling))
#3 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 C:\xampp\htdocs\kohana\system\classes\Kohana\Request.php(993): Kohana_Request_Client->execute(Object(Request))
#5 C:\xampp\htdocs\kohana\index.php(118): Kohana_Request->execute()
#6 {main} in C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php:84
2022-05-26 11:39:46 --- CRITICAL: Database_Exception [ 1146 ]: Table 'fitstart.auth_users' doesn't exist [ SHOW FULL COLUMNS FROM `auth_users` ] ~ MODPATH\database\classes\Kohana\Database\MySQLi.php [ 171 ] in C:\xampp\htdocs\kohana\modules\database\classes\Kohana\Database\MySQLi.php:337
2022-05-26 11:39:46 --- DEBUG: #0 C:\xampp\htdocs\kohana\modules\database\classes\Kohana\Database\MySQLi.php(337): Kohana_Database_MySQLi->query(1, 'SHOW FULL COLUM...', false)
#1 C:\xampp\htdocs\kohana\modules\orm\classes\Kohana\ORM.php(1670): Kohana_Database_MySQLi->list_columns('`auth_users`')
#2 C:\xampp\htdocs\kohana\modules\orm\classes\Kohana\ORM.php(444): Kohana_ORM->list_columns()
#3 C:\xampp\htdocs\kohana\modules\orm\classes\Kohana\ORM.php(389): Kohana_ORM->reload_columns()
#4 C:\xampp\htdocs\kohana\modules\orm\classes\Kohana\ORM.php(254): Kohana_ORM->_initialize()
#5 C:\xampp\htdocs\kohana\modules\orm\classes\Kohana\ORM.php(46): Kohana_ORM->__construct(NULL)
#6 C:\xampp\htdocs\kohana\application\classes\Controller\UsersHandling.php(12): Kohana_ORM::factory('Model_Auth_User')
#7 C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php(84): Controller_UsersHandling->action_returnUsersList()
#8 [internal function]: Kohana_Controller->execute()
#9 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_UsersHandling))
#10 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#11 C:\xampp\htdocs\kohana\system\classes\Kohana\Request.php(993): Kohana_Request_Client->execute(Object(Request))
#12 C:\xampp\htdocs\kohana\index.php(118): Kohana_Request->execute()
#13 {main} in C:\xampp\htdocs\kohana\modules\database\classes\Kohana\Database\MySQLi.php:337
2022-05-26 11:43:31 --- CRITICAL: Kohana_Exception [ 0 ]: Method find() cannot be called on loaded objects ~ MODPATH\orm\classes\Kohana\ORM.php [ 966 ] in C:\xampp\htdocs\kohana\application\classes\Controller\UsersHandling.php:14
2022-05-26 11:43:31 --- DEBUG: #0 C:\xampp\htdocs\kohana\application\classes\Controller\UsersHandling.php(14): Kohana_ORM->find()
#1 C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php(84): Controller_UsersHandling->action_returnUsersList()
#2 [internal function]: Kohana_Controller->execute()
#3 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_UsersHandling))
#4 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 C:\xampp\htdocs\kohana\system\classes\Kohana\Request.php(993): Kohana_Request_Client->execute(Object(Request))
#6 C:\xampp\htdocs\kohana\index.php(118): Kohana_Request->execute()
#7 {main} in C:\xampp\htdocs\kohana\application\classes\Controller\UsersHandling.php:14
2022-05-26 12:07:52 --- CRITICAL: Error [ 0 ]: Attempt to assign property "header" on string ~ APPPATH\classes\Controller\Standard.php [ 13 ] in C:\xampp\htdocs\kohana\application\classes\Controller\SuperAdminStandard.php:16
2022-05-26 12:07:52 --- DEBUG: #0 C:\xampp\htdocs\kohana\application\classes\Controller\SuperAdminStandard.php(16): Controller_Standard->before()
#1 C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php(69): Controller_SuperAdminStandard->before()
#2 [internal function]: Kohana_Controller->execute()
#3 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_UsersHandling))
#4 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 C:\xampp\htdocs\kohana\system\classes\Kohana\Request.php(993): Kohana_Request_Client->execute(Object(Request))
#6 C:\xampp\htdocs\kohana\index.php(118): Kohana_Request->execute()
#7 {main} in C:\xampp\htdocs\kohana\application\classes\Controller\SuperAdminStandard.php:16
2022-05-26 12:09:32 --- CRITICAL: Error [ 0 ]: Attempt to assign property "header" on string ~ APPPATH\classes\Controller\Standard.php [ 13 ] in C:\xampp\htdocs\kohana\application\classes\Controller\SuperAdminStandard.php:16
2022-05-26 12:09:32 --- DEBUG: #0 C:\xampp\htdocs\kohana\application\classes\Controller\SuperAdminStandard.php(16): Controller_Standard->before()
#1 C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php(69): Controller_SuperAdminStandard->before()
#2 [internal function]: Kohana_Controller->execute()
#3 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_UsersHandling))
#4 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 C:\xampp\htdocs\kohana\system\classes\Kohana\Request.php(993): Kohana_Request_Client->execute(Object(Request))
#6 C:\xampp\htdocs\kohana\index.php(118): Kohana_Request->execute()
#7 {main} in C:\xampp\htdocs\kohana\application\classes\Controller\SuperAdminStandard.php:16
2022-05-26 12:13:36 --- CRITICAL: TypeError [ 0 ]: Controller_UsersHandling::action_returnUsersList(): Return value must be of type View, string returned ~ APPPATH\classes\Controller\UsersHandling.php [ 12 ] in C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php:84
2022-05-26 12:13:36 --- DEBUG: #0 C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php(84): Controller_UsersHandling->action_returnUsersList()
#1 [internal function]: Kohana_Controller->execute()
#2 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_UsersHandling))
#3 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 C:\xampp\htdocs\kohana\system\classes\Kohana\Request.php(993): Kohana_Request_Client->execute(Object(Request))
#5 C:\xampp\htdocs\kohana\index.php(118): Kohana_Request->execute()
#6 {main} in C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php:84
2022-05-26 12:14:30 --- CRITICAL: Error [ 0 ]: Attempt to assign property "header" on string ~ APPPATH\classes\Controller\Standard.php [ 18 ] in C:\xampp\htdocs\kohana\application\classes\Controller\SuperAdminStandard.php:11
2022-05-26 12:14:30 --- DEBUG: #0 C:\xampp\htdocs\kohana\application\classes\Controller\SuperAdminStandard.php(11): Controller_Standard->before()
#1 C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php(69): Controller_SuperAdminStandard->before()
#2 [internal function]: Kohana_Controller->execute()
#3 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_UsersHandling))
#4 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 C:\xampp\htdocs\kohana\system\classes\Kohana\Request.php(993): Kohana_Request_Client->execute(Object(Request))
#6 C:\xampp\htdocs\kohana\index.php(118): Kohana_Request->execute()
#7 {main} in C:\xampp\htdocs\kohana\application\classes\Controller\SuperAdminStandard.php:11
2022-05-26 12:22:04 --- CRITICAL: Error [ 0 ]: Attempt to assign property "main" on string ~ APPPATH\classes\Controller\UsersHandling.php [ 7 ] in C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php:84
2022-05-26 12:22:04 --- DEBUG: #0 C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php(84): Controller_UsersHandling->action_displayUsers()
#1 [internal function]: Kohana_Controller->execute()
#2 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_UsersHandling))
#3 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 C:\xampp\htdocs\kohana\system\classes\Kohana\Request.php(993): Kohana_Request_Client->execute(Object(Request))
#5 C:\xampp\htdocs\kohana\index.php(118): Kohana_Request->execute()
#6 {main} in C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php:84
2022-05-26 12:30:49 --- CRITICAL: Error [ 0 ]: Attempt to assign property "main" on string ~ APPPATH\classes\Controller\UsersHandling.php [ 7 ] in C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php:84
2022-05-26 12:30:49 --- DEBUG: #0 C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php(84): Controller_UsersHandling->action_displayUsers()
#1 [internal function]: Kohana_Controller->execute()
#2 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_UsersHandling))
#3 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 C:\xampp\htdocs\kohana\system\classes\Kohana\Request.php(993): Kohana_Request_Client->execute(Object(Request))
#5 C:\xampp\htdocs\kohana\index.php(118): Kohana_Request->execute()
#6 {main} in C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php:84
2022-05-26 12:36:32 --- CRITICAL: Error [ 0 ]: Attempt to assign property "main" on string ~ APPPATH\classes\Controller\UsersHandling.php [ 7 ] in C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php:84
2022-05-26 12:36:32 --- DEBUG: #0 C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php(84): Controller_UsersHandling->action_displayUsers()
#1 [internal function]: Kohana_Controller->execute()
#2 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_UsersHandling))
#3 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 C:\xampp\htdocs\kohana\system\classes\Kohana\Request.php(993): Kohana_Request_Client->execute(Object(Request))
#5 C:\xampp\htdocs\kohana\index.php(118): Kohana_Request->execute()
#6 {main} in C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php:84
2022-05-26 12:37:20 --- CRITICAL: Error [ 0 ]: Attempt to assign property "main" on string ~ APPPATH\classes\Controller\UsersHandling.php [ 7 ] in C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php:84
2022-05-26 12:37:20 --- DEBUG: #0 C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php(84): Controller_UsersHandling->action_displayUsers()
#1 [internal function]: Kohana_Controller->execute()
#2 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_UsersHandling))
#3 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 C:\xampp\htdocs\kohana\system\classes\Kohana\Request.php(993): Kohana_Request_Client->execute(Object(Request))
#5 C:\xampp\htdocs\kohana\index.php(118): Kohana_Request->execute()
#6 {main} in C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php:84
2022-05-26 12:44:09 --- CRITICAL: Kohana_Exception [ 0 ]: The name property does not exist in the Model_User class ~ MODPATH\orm\classes\Kohana\ORM.php [ 687 ] in C:\xampp\htdocs\kohana\modules\orm\classes\Kohana\ORM.php:603
2022-05-26 12:44:09 --- DEBUG: #0 C:\xampp\htdocs\kohana\modules\orm\classes\Kohana\ORM.php(603): Kohana_ORM->get('name')
#1 C:\xampp\htdocs\kohana\application\classes\Controller\UsersHandling.php(22): Kohana_ORM->__get('name')
#2 C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php(84): Controller_UsersHandling->action_returnUsersList()
#3 [internal function]: Kohana_Controller->execute()
#4 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_UsersHandling))
#5 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 C:\xampp\htdocs\kohana\system\classes\Kohana\Request.php(993): Kohana_Request_Client->execute(Object(Request))
#7 C:\xampp\htdocs\kohana\index.php(118): Kohana_Request->execute()
#8 {main} in C:\xampp\htdocs\kohana\modules\orm\classes\Kohana\ORM.php:603
2022-05-26 12:44:09 --- CRITICAL: Error [ 0 ]: Attempt to assign property "main" on string ~ APPPATH\classes\Controller\UsersHandling.php [ 7 ] in C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php:84
2022-05-26 12:44:09 --- DEBUG: #0 C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php(84): Controller_UsersHandling->action_displayUsers()
#1 [internal function]: Kohana_Controller->execute()
#2 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_UsersHandling))
#3 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 C:\xampp\htdocs\kohana\system\classes\Kohana\Request.php(993): Kohana_Request_Client->execute(Object(Request))
#5 C:\xampp\htdocs\kohana\index.php(118): Kohana_Request->execute()
#6 {main} in C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php:84
2022-05-26 12:44:27 --- CRITICAL: Error [ 0 ]: Attempt to assign property "main" on string ~ APPPATH\classes\Controller\UsersHandling.php [ 7 ] in C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php:84
2022-05-26 12:44:27 --- DEBUG: #0 C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php(84): Controller_UsersHandling->action_displayUsers()
#1 [internal function]: Kohana_Controller->execute()
#2 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_UsersHandling))
#3 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 C:\xampp\htdocs\kohana\system\classes\Kohana\Request.php(993): Kohana_Request_Client->execute(Object(Request))
#5 C:\xampp\htdocs\kohana\index.php(118): Kohana_Request->execute()
#6 {main} in C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php:84
2022-05-26 12:44:27 --- CRITICAL: Kohana_Exception [ 0 ]: The name property does not exist in the Model_User class ~ MODPATH\orm\classes\Kohana\ORM.php [ 687 ] in C:\xampp\htdocs\kohana\modules\orm\classes\Kohana\ORM.php:603
2022-05-26 12:44:27 --- DEBUG: #0 C:\xampp\htdocs\kohana\modules\orm\classes\Kohana\ORM.php(603): Kohana_ORM->get('name')
#1 C:\xampp\htdocs\kohana\application\classes\Controller\UsersHandling.php(22): Kohana_ORM->__get('name')
#2 C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php(84): Controller_UsersHandling->action_returnUsersList()
#3 [internal function]: Kohana_Controller->execute()
#4 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_UsersHandling))
#5 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 C:\xampp\htdocs\kohana\system\classes\Kohana\Request.php(993): Kohana_Request_Client->execute(Object(Request))
#7 C:\xampp\htdocs\kohana\index.php(118): Kohana_Request->execute()
#8 {main} in C:\xampp\htdocs\kohana\modules\orm\classes\Kohana\ORM.php:603
2022-05-26 12:44:40 --- CRITICAL: Error [ 0 ]: Attempt to assign property "main" on string ~ APPPATH\classes\Controller\UsersHandling.php [ 7 ] in C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php:84
2022-05-26 12:44:40 --- DEBUG: #0 C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php(84): Controller_UsersHandling->action_displayUsers()
#1 [internal function]: Kohana_Controller->execute()
#2 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_UsersHandling))
#3 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 C:\xampp\htdocs\kohana\system\classes\Kohana\Request.php(993): Kohana_Request_Client->execute(Object(Request))
#5 C:\xampp\htdocs\kohana\index.php(118): Kohana_Request->execute()
#6 {main} in C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php:84
2022-05-26 13:57:57 --- CRITICAL: Error [ 0 ]: Attempt to assign property "main" on string ~ APPPATH\classes\Controller\UsersHandling.php [ 7 ] in C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php:84
2022-05-26 13:57:57 --- DEBUG: #0 C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php(84): Controller_UsersHandling->action_displayUsers()
#1 [internal function]: Kohana_Controller->execute()
#2 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_UsersHandling))
#3 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 C:\xampp\htdocs\kohana\system\classes\Kohana\Request.php(993): Kohana_Request_Client->execute(Object(Request))
#5 C:\xampp\htdocs\kohana\index.php(118): Kohana_Request->execute()
#6 {main} in C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php:84
2022-05-26 14:27:37 --- CRITICAL: ParseError [ 0 ]: syntax error, unexpected token "public", expecting end of file ~ APPPATH\views\userListItem.php [ 4 ] in C:\xampp\htdocs\kohana\system\classes\Kohana\View.php:359
2022-05-26 14:27:37 --- DEBUG: #0 C:\xampp\htdocs\kohana\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#1 C:\xampp\htdocs\kohana\system\classes\Kohana\View.php(236): Kohana_View->render()
#2 C:\xampp\htdocs\kohana\application\views\userList.php(6): Kohana_View->__toString()
#3 C:\xampp\htdocs\kohana\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#4 C:\xampp\htdocs\kohana\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#5 C:\xampp\htdocs\kohana\system\classes\Kohana\View.php(236): Kohana_View->render()
#6 C:\xampp\htdocs\kohana\system\classes\Kohana\Response.php(160): Kohana_View->__toString()
#7 C:\xampp\htdocs\kohana\application\classes\Controller\UsersHandling.php(27): Kohana_Response->body(Object(View))
#8 C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php(84): Controller_UsersHandling->action_returnUsersList()
#9 [internal function]: Kohana_Controller->execute()
#10 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_UsersHandling))
#11 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 C:\xampp\htdocs\kohana\system\classes\Kohana\Request.php(993): Kohana_Request_Client->execute(Object(Request))
#13 C:\xampp\htdocs\kohana\index.php(118): Kohana_Request->execute()
#14 {main} in C:\xampp\htdocs\kohana\system\classes\Kohana\View.php:359
2022-05-26 14:27:37 --- CRITICAL: Error [ 0 ]: Attempt to assign property "main" on string ~ APPPATH\classes\Controller\UsersHandling.php [ 7 ] in C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php:84
2022-05-26 14:27:37 --- DEBUG: #0 C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php(84): Controller_UsersHandling->action_displayUsers()
#1 [internal function]: Kohana_Controller->execute()
#2 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_UsersHandling))
#3 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 C:\xampp\htdocs\kohana\system\classes\Kohana\Request.php(993): Kohana_Request_Client->execute(Object(Request))
#5 C:\xampp\htdocs\kohana\index.php(118): Kohana_Request->execute()
#6 {main} in C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php:84
2022-05-26 14:27:40 --- CRITICAL: Error [ 0 ]: Attempt to assign property "main" on string ~ APPPATH\classes\Controller\UsersHandling.php [ 7 ] in C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php:84
2022-05-26 14:27:40 --- DEBUG: #0 C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php(84): Controller_UsersHandling->action_displayUsers()
#1 [internal function]: Kohana_Controller->execute()
#2 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_UsersHandling))
#3 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 C:\xampp\htdocs\kohana\system\classes\Kohana\Request.php(993): Kohana_Request_Client->execute(Object(Request))
#5 C:\xampp\htdocs\kohana\index.php(118): Kohana_Request->execute()
#6 {main} in C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php:84
2022-05-26 14:27:40 --- CRITICAL: ParseError [ 0 ]: syntax error, unexpected token "public", expecting end of file ~ APPPATH\views\userListItem.php [ 4 ] in C:\xampp\htdocs\kohana\system\classes\Kohana\View.php:359
2022-05-26 14:27:40 --- DEBUG: #0 C:\xampp\htdocs\kohana\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#1 C:\xampp\htdocs\kohana\system\classes\Kohana\View.php(236): Kohana_View->render()
#2 C:\xampp\htdocs\kohana\application\views\userList.php(6): Kohana_View->__toString()
#3 C:\xampp\htdocs\kohana\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#4 C:\xampp\htdocs\kohana\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#5 C:\xampp\htdocs\kohana\system\classes\Kohana\View.php(236): Kohana_View->render()
#6 C:\xampp\htdocs\kohana\system\classes\Kohana\Response.php(160): Kohana_View->__toString()
#7 C:\xampp\htdocs\kohana\application\classes\Controller\UsersHandling.php(27): Kohana_Response->body(Object(View))
#8 C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php(84): Controller_UsersHandling->action_returnUsersList()
#9 [internal function]: Kohana_Controller->execute()
#10 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_UsersHandling))
#11 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 C:\xampp\htdocs\kohana\system\classes\Kohana\Request.php(993): Kohana_Request_Client->execute(Object(Request))
#13 C:\xampp\htdocs\kohana\index.php(118): Kohana_Request->execute()
#14 {main} in C:\xampp\htdocs\kohana\system\classes\Kohana\View.php:359
2022-05-26 14:29:13 --- CRITICAL: Error [ 0 ]: Attempt to assign property "main" on string ~ APPPATH\classes\Controller\UsersHandling.php [ 7 ] in C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php:84
2022-05-26 14:29:13 --- DEBUG: #0 C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php(84): Controller_UsersHandling->action_displayUsers()
#1 [internal function]: Kohana_Controller->execute()
#2 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_UsersHandling))
#3 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 C:\xampp\htdocs\kohana\system\classes\Kohana\Request.php(993): Kohana_Request_Client->execute(Object(Request))
#5 C:\xampp\htdocs\kohana\index.php(118): Kohana_Request->execute()
#6 {main} in C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php:84
2022-05-26 14:29:38 --- CRITICAL: Error [ 0 ]: Attempt to assign property "main" on string ~ APPPATH\classes\Controller\UsersHandling.php [ 7 ] in C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php:84
2022-05-26 14:29:38 --- DEBUG: #0 C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php(84): Controller_UsersHandling->action_displayUsers()
#1 [internal function]: Kohana_Controller->execute()
#2 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_UsersHandling))
#3 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 C:\xampp\htdocs\kohana\system\classes\Kohana\Request.php(993): Kohana_Request_Client->execute(Object(Request))
#5 C:\xampp\htdocs\kohana\index.php(118): Kohana_Request->execute()
#6 {main} in C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php:84
2022-05-26 14:29:48 --- CRITICAL: Error [ 0 ]: Attempt to assign property "main" on string ~ APPPATH\classes\Controller\UsersHandling.php [ 7 ] in C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php:84
2022-05-26 14:29:48 --- DEBUG: #0 C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php(84): Controller_UsersHandling->action_displayUsers()
#1 [internal function]: Kohana_Controller->execute()
#2 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_UsersHandling))
#3 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 C:\xampp\htdocs\kohana\system\classes\Kohana\Request.php(993): Kohana_Request_Client->execute(Object(Request))
#5 C:\xampp\htdocs\kohana\index.php(118): Kohana_Request->execute()
#6 {main} in C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php:84
2022-05-26 14:35:16 --- CRITICAL: Error [ 0 ]: Attempt to assign property "main" on string ~ APPPATH\classes\Controller\UsersHandling.php [ 7 ] in C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php:84
2022-05-26 14:35:16 --- DEBUG: #0 C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php(84): Controller_UsersHandling->action_displayUsers()
#1 [internal function]: Kohana_Controller->execute()
#2 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_UsersHandling))
#3 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 C:\xampp\htdocs\kohana\system\classes\Kohana\Request.php(993): Kohana_Request_Client->execute(Object(Request))
#5 C:\xampp\htdocs\kohana\index.php(118): Kohana_Request->execute()
#6 {main} in C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php:84
2022-05-26 14:36:21 --- CRITICAL: Error [ 0 ]: Attempt to assign property "main" on string ~ APPPATH\classes\Controller\UsersHandling.php [ 7 ] in C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php:84
2022-05-26 14:36:21 --- DEBUG: #0 C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php(84): Controller_UsersHandling->action_displayUsers()
#1 [internal function]: Kohana_Controller->execute()
#2 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_UsersHandling))
#3 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 C:\xampp\htdocs\kohana\system\classes\Kohana\Request.php(993): Kohana_Request_Client->execute(Object(Request))
#5 C:\xampp\htdocs\kohana\index.php(118): Kohana_Request->execute()
#6 {main} in C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php:84
2022-05-26 14:36:37 --- CRITICAL: Error [ 0 ]: Attempt to assign property "main" on string ~ APPPATH\classes\Controller\UsersHandling.php [ 7 ] in C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php:84
2022-05-26 14:36:37 --- DEBUG: #0 C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php(84): Controller_UsersHandling->action_displayUsers()
#1 [internal function]: Kohana_Controller->execute()
#2 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_UsersHandling))
#3 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 C:\xampp\htdocs\kohana\system\classes\Kohana\Request.php(993): Kohana_Request_Client->execute(Object(Request))
#5 C:\xampp\htdocs\kohana\index.php(118): Kohana_Request->execute()
#6 {main} in C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php:84
2022-05-26 14:36:50 --- CRITICAL: Error [ 0 ]: Attempt to assign property "main" on string ~ APPPATH\classes\Controller\UsersHandling.php [ 7 ] in C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php:84
2022-05-26 14:36:50 --- DEBUG: #0 C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php(84): Controller_UsersHandling->action_displayUsers()
#1 [internal function]: Kohana_Controller->execute()
#2 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_UsersHandling))
#3 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 C:\xampp\htdocs\kohana\system\classes\Kohana\Request.php(993): Kohana_Request_Client->execute(Object(Request))
#5 C:\xampp\htdocs\kohana\index.php(118): Kohana_Request->execute()
#6 {main} in C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php:84
2022-05-26 14:37:31 --- CRITICAL: Error [ 0 ]: Attempt to assign property "main" on string ~ APPPATH\classes\Controller\UsersHandling.php [ 7 ] in C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php:84
2022-05-26 14:37:31 --- DEBUG: #0 C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php(84): Controller_UsersHandling->action_displayUsers()
#1 [internal function]: Kohana_Controller->execute()
#2 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_UsersHandling))
#3 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 C:\xampp\htdocs\kohana\system\classes\Kohana\Request.php(993): Kohana_Request_Client->execute(Object(Request))
#5 C:\xampp\htdocs\kohana\index.php(118): Kohana_Request->execute()
#6 {main} in C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php:84
2022-05-26 14:37:58 --- CRITICAL: Error [ 0 ]: Attempt to assign property "main" on string ~ APPPATH\classes\Controller\UsersHandling.php [ 7 ] in C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php:84
2022-05-26 14:37:58 --- DEBUG: #0 C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php(84): Controller_UsersHandling->action_displayUsers()
#1 [internal function]: Kohana_Controller->execute()
#2 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_UsersHandling))
#3 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 C:\xampp\htdocs\kohana\system\classes\Kohana\Request.php(993): Kohana_Request_Client->execute(Object(Request))
#5 C:\xampp\htdocs\kohana\index.php(118): Kohana_Request->execute()
#6 {main} in C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php:84
2022-05-26 14:39:20 --- CRITICAL: Error [ 0 ]: Attempt to assign property "main" on string ~ APPPATH\classes\Controller\UsersHandling.php [ 7 ] in C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php:84
2022-05-26 14:39:20 --- DEBUG: #0 C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php(84): Controller_UsersHandling->action_displayUsers()
#1 [internal function]: Kohana_Controller->execute()
#2 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_UsersHandling))
#3 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 C:\xampp\htdocs\kohana\system\classes\Kohana\Request.php(993): Kohana_Request_Client->execute(Object(Request))
#5 C:\xampp\htdocs\kohana\index.php(118): Kohana_Request->execute()
#6 {main} in C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php:84
2022-05-26 14:43:41 --- CRITICAL: Error [ 0 ]: Attempt to assign property "main" on string ~ APPPATH\classes\Controller\UsersHandling.php [ 7 ] in C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php:84
2022-05-26 14:43:41 --- DEBUG: #0 C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php(84): Controller_UsersHandling->action_displayUsers()
#1 [internal function]: Kohana_Controller->execute()
#2 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_UsersHandling))
#3 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 C:\xampp\htdocs\kohana\system\classes\Kohana\Request.php(993): Kohana_Request_Client->execute(Object(Request))
#5 C:\xampp\htdocs\kohana\index.php(118): Kohana_Request->execute()
#6 {main} in C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php:84
2022-05-26 14:44:14 --- CRITICAL: Error [ 0 ]: Attempt to assign property "main" on string ~ APPPATH\classes\Controller\UsersHandling.php [ 7 ] in C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php:84
2022-05-26 14:44:14 --- DEBUG: #0 C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php(84): Controller_UsersHandling->action_displayUsers()
#1 [internal function]: Kohana_Controller->execute()
#2 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_UsersHandling))
#3 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 C:\xampp\htdocs\kohana\system\classes\Kohana\Request.php(993): Kohana_Request_Client->execute(Object(Request))
#5 C:\xampp\htdocs\kohana\index.php(118): Kohana_Request->execute()
#6 {main} in C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php:84
2022-05-26 14:44:28 --- CRITICAL: Error [ 0 ]: Attempt to assign property "main" on string ~ APPPATH\classes\Controller\UsersHandling.php [ 7 ] in C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php:84
2022-05-26 14:44:28 --- DEBUG: #0 C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php(84): Controller_UsersHandling->action_displayUsers()
#1 [internal function]: Kohana_Controller->execute()
#2 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_UsersHandling))
#3 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 C:\xampp\htdocs\kohana\system\classes\Kohana\Request.php(993): Kohana_Request_Client->execute(Object(Request))
#5 C:\xampp\htdocs\kohana\index.php(118): Kohana_Request->execute()
#6 {main} in C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php:84
2022-05-26 14:45:00 --- CRITICAL: Error [ 0 ]: Attempt to assign property "main" on string ~ APPPATH\classes\Controller\UsersHandling.php [ 7 ] in C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php:84
2022-05-26 14:45:00 --- DEBUG: #0 C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php(84): Controller_UsersHandling->action_displayUsers()
#1 [internal function]: Kohana_Controller->execute()
#2 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_UsersHandling))
#3 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 C:\xampp\htdocs\kohana\system\classes\Kohana\Request.php(993): Kohana_Request_Client->execute(Object(Request))
#5 C:\xampp\htdocs\kohana\index.php(118): Kohana_Request->execute()
#6 {main} in C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php:84
2022-05-26 14:45:12 --- CRITICAL: Error [ 0 ]: Attempt to assign property "main" on string ~ APPPATH\classes\Controller\UsersHandling.php [ 7 ] in C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php:84
2022-05-26 14:45:12 --- DEBUG: #0 C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php(84): Controller_UsersHandling->action_displayUsers()
#1 [internal function]: Kohana_Controller->execute()
#2 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_UsersHandling))
#3 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 C:\xampp\htdocs\kohana\system\classes\Kohana\Request.php(993): Kohana_Request_Client->execute(Object(Request))
#5 C:\xampp\htdocs\kohana\index.php(118): Kohana_Request->execute()
#6 {main} in C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php:84
2022-05-26 14:45:27 --- CRITICAL: Error [ 0 ]: Attempt to assign property "main" on string ~ APPPATH\classes\Controller\UsersHandling.php [ 7 ] in C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php:84
2022-05-26 14:45:27 --- DEBUG: #0 C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php(84): Controller_UsersHandling->action_displayUsers()
#1 [internal function]: Kohana_Controller->execute()
#2 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_UsersHandling))
#3 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 C:\xampp\htdocs\kohana\system\classes\Kohana\Request.php(993): Kohana_Request_Client->execute(Object(Request))
#5 C:\xampp\htdocs\kohana\index.php(118): Kohana_Request->execute()
#6 {main} in C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php:84
2022-05-26 14:45:39 --- CRITICAL: Error [ 0 ]: Attempt to assign property "main" on string ~ APPPATH\classes\Controller\UsersHandling.php [ 7 ] in C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php:84
2022-05-26 14:45:39 --- DEBUG: #0 C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php(84): Controller_UsersHandling->action_displayUsers()
#1 [internal function]: Kohana_Controller->execute()
#2 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_UsersHandling))
#3 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 C:\xampp\htdocs\kohana\system\classes\Kohana\Request.php(993): Kohana_Request_Client->execute(Object(Request))
#5 C:\xampp\htdocs\kohana\index.php(118): Kohana_Request->execute()
#6 {main} in C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php:84
2022-05-26 14:46:54 --- CRITICAL: Error [ 0 ]: Attempt to assign property "main" on string ~ APPPATH\classes\Controller\UsersHandling.php [ 7 ] in C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php:84
2022-05-26 14:46:54 --- DEBUG: #0 C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php(84): Controller_UsersHandling->action_displayUsers()
#1 [internal function]: Kohana_Controller->execute()
#2 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_UsersHandling))
#3 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 C:\xampp\htdocs\kohana\system\classes\Kohana\Request.php(993): Kohana_Request_Client->execute(Object(Request))
#5 C:\xampp\htdocs\kohana\index.php(118): Kohana_Request->execute()
#6 {main} in C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php:84
2022-05-26 14:47:35 --- CRITICAL: Error [ 0 ]: Attempt to assign property "main" on string ~ APPPATH\classes\Controller\UsersHandling.php [ 7 ] in C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php:84
2022-05-26 14:47:35 --- DEBUG: #0 C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php(84): Controller_UsersHandling->action_displayUsers()
#1 [internal function]: Kohana_Controller->execute()
#2 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_UsersHandling))
#3 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 C:\xampp\htdocs\kohana\system\classes\Kohana\Request.php(993): Kohana_Request_Client->execute(Object(Request))
#5 C:\xampp\htdocs\kohana\index.php(118): Kohana_Request->execute()
#6 {main} in C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php:84
2022-05-26 14:48:33 --- CRITICAL: Error [ 0 ]: Attempt to assign property "main" on string ~ APPPATH\classes\Controller\UsersHandling.php [ 7 ] in C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php:84
2022-05-26 14:48:33 --- DEBUG: #0 C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php(84): Controller_UsersHandling->action_displayUsers()
#1 [internal function]: Kohana_Controller->execute()
#2 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_UsersHandling))
#3 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 C:\xampp\htdocs\kohana\system\classes\Kohana\Request.php(993): Kohana_Request_Client->execute(Object(Request))
#5 C:\xampp\htdocs\kohana\index.php(118): Kohana_Request->execute()
#6 {main} in C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php:84
2022-05-26 14:49:12 --- CRITICAL: Error [ 0 ]: Attempt to assign property "main" on string ~ APPPATH\classes\Controller\UsersHandling.php [ 7 ] in C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php:84
2022-05-26 14:49:12 --- DEBUG: #0 C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php(84): Controller_UsersHandling->action_displayUsers()
#1 [internal function]: Kohana_Controller->execute()
#2 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_UsersHandling))
#3 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 C:\xampp\htdocs\kohana\system\classes\Kohana\Request.php(993): Kohana_Request_Client->execute(Object(Request))
#5 C:\xampp\htdocs\kohana\index.php(118): Kohana_Request->execute()
#6 {main} in C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php:84
2022-05-26 14:52:18 --- CRITICAL: Error [ 0 ]: Attempt to assign property "main" on string ~ APPPATH\classes\Controller\UsersHandling.php [ 7 ] in C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php:84
2022-05-26 14:52:18 --- DEBUG: #0 C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php(84): Controller_UsersHandling->action_displayUsers()
#1 [internal function]: Kohana_Controller->execute()
#2 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_UsersHandling))
#3 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 C:\xampp\htdocs\kohana\system\classes\Kohana\Request.php(993): Kohana_Request_Client->execute(Object(Request))
#5 C:\xampp\htdocs\kohana\index.php(118): Kohana_Request->execute()
#6 {main} in C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php:84
2022-05-26 14:52:28 --- CRITICAL: Error [ 0 ]: Attempt to assign property "main" on string ~ APPPATH\classes\Controller\UsersHandling.php [ 7 ] in C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php:84
2022-05-26 14:52:28 --- DEBUG: #0 C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php(84): Controller_UsersHandling->action_displayUsers()
#1 [internal function]: Kohana_Controller->execute()
#2 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_UsersHandling))
#3 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 C:\xampp\htdocs\kohana\system\classes\Kohana\Request.php(993): Kohana_Request_Client->execute(Object(Request))
#5 C:\xampp\htdocs\kohana\index.php(118): Kohana_Request->execute()
#6 {main} in C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php:84
2022-05-26 14:53:03 --- CRITICAL: Error [ 0 ]: Attempt to assign property "main" on string ~ APPPATH\classes\Controller\UsersHandling.php [ 7 ] in C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php:84
2022-05-26 14:53:03 --- DEBUG: #0 C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php(84): Controller_UsersHandling->action_displayUsers()
#1 [internal function]: Kohana_Controller->execute()
#2 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_UsersHandling))
#3 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 C:\xampp\htdocs\kohana\system\classes\Kohana\Request.php(993): Kohana_Request_Client->execute(Object(Request))
#5 C:\xampp\htdocs\kohana\index.php(118): Kohana_Request->execute()
#6 {main} in C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php:84
2022-05-26 14:53:13 --- CRITICAL: Error [ 0 ]: Attempt to assign property "main" on string ~ APPPATH\classes\Controller\UsersHandling.php [ 7 ] in C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php:84
2022-05-26 14:53:13 --- DEBUG: #0 C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php(84): Controller_UsersHandling->action_displayUsers()
#1 [internal function]: Kohana_Controller->execute()
#2 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_UsersHandling))
#3 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 C:\xampp\htdocs\kohana\system\classes\Kohana\Request.php(993): Kohana_Request_Client->execute(Object(Request))
#5 C:\xampp\htdocs\kohana\index.php(118): Kohana_Request->execute()
#6 {main} in C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php:84
2022-05-26 14:53:30 --- CRITICAL: Error [ 0 ]: Attempt to assign property "main" on string ~ APPPATH\classes\Controller\UsersHandling.php [ 7 ] in C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php:84
2022-05-26 14:53:30 --- DEBUG: #0 C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php(84): Controller_UsersHandling->action_displayUsers()
#1 [internal function]: Kohana_Controller->execute()
#2 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_UsersHandling))
#3 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 C:\xampp\htdocs\kohana\system\classes\Kohana\Request.php(993): Kohana_Request_Client->execute(Object(Request))
#5 C:\xampp\htdocs\kohana\index.php(118): Kohana_Request->execute()
#6 {main} in C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php:84
2022-05-26 14:54:11 --- CRITICAL: Error [ 0 ]: Attempt to assign property "main" on string ~ APPPATH\classes\Controller\UsersHandling.php [ 7 ] in C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php:84
2022-05-26 14:54:11 --- DEBUG: #0 C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php(84): Controller_UsersHandling->action_displayUsers()
#1 [internal function]: Kohana_Controller->execute()
#2 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_UsersHandling))
#3 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 C:\xampp\htdocs\kohana\system\classes\Kohana\Request.php(993): Kohana_Request_Client->execute(Object(Request))
#5 C:\xampp\htdocs\kohana\index.php(118): Kohana_Request->execute()
#6 {main} in C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php:84
2022-05-26 14:54:29 --- CRITICAL: Error [ 0 ]: Attempt to assign property "main" on string ~ APPPATH\classes\Controller\UsersHandling.php [ 7 ] in C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php:84
2022-05-26 14:54:29 --- DEBUG: #0 C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php(84): Controller_UsersHandling->action_displayUsers()
#1 [internal function]: Kohana_Controller->execute()
#2 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_UsersHandling))
#3 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 C:\xampp\htdocs\kohana\system\classes\Kohana\Request.php(993): Kohana_Request_Client->execute(Object(Request))
#5 C:\xampp\htdocs\kohana\index.php(118): Kohana_Request->execute()
#6 {main} in C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php:84
2022-05-26 14:54:39 --- CRITICAL: Error [ 0 ]: Attempt to assign property "main" on string ~ APPPATH\classes\Controller\UsersHandling.php [ 7 ] in C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php:84
2022-05-26 14:54:39 --- DEBUG: #0 C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php(84): Controller_UsersHandling->action_displayUsers()
#1 [internal function]: Kohana_Controller->execute()
#2 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_UsersHandling))
#3 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 C:\xampp\htdocs\kohana\system\classes\Kohana\Request.php(993): Kohana_Request_Client->execute(Object(Request))
#5 C:\xampp\htdocs\kohana\index.php(118): Kohana_Request->execute()
#6 {main} in C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php:84
2022-05-26 15:08:00 --- CRITICAL: Error [ 0 ]: Attempt to assign property "main" on string ~ APPPATH\classes\Controller\UsersHandling.php [ 7 ] in C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php:84
2022-05-26 15:08:00 --- DEBUG: #0 C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php(84): Controller_UsersHandling->action_displayUsers()
#1 [internal function]: Kohana_Controller->execute()
#2 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_UsersHandling))
#3 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 C:\xampp\htdocs\kohana\system\classes\Kohana\Request.php(993): Kohana_Request_Client->execute(Object(Request))
#5 C:\xampp\htdocs\kohana\index.php(118): Kohana_Request->execute()
#6 {main} in C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php:84
2022-05-26 15:17:59 --- CRITICAL: Error [ 0 ]: Attempt to assign property "main" on string ~ APPPATH\classes\Controller\UsersHandling.php [ 7 ] in C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php:84
2022-05-26 15:17:59 --- DEBUG: #0 C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php(84): Controller_UsersHandling->action_displayUsers()
#1 [internal function]: Kohana_Controller->execute()
#2 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_UsersHandling))
#3 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 C:\xampp\htdocs\kohana\system\classes\Kohana\Request.php(993): Kohana_Request_Client->execute(Object(Request))
#5 C:\xampp\htdocs\kohana\index.php(118): Kohana_Request->execute()
#6 {main} in C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php:84
2022-05-26 15:24:11 --- CRITICAL: Error [ 0 ]: Attempt to assign property "main" on string ~ APPPATH\classes\Controller\UsersHandling.php [ 7 ] in C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php:84
2022-05-26 15:24:11 --- DEBUG: #0 C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php(84): Controller_UsersHandling->action_displayUsers()
#1 [internal function]: Kohana_Controller->execute()
#2 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_UsersHandling))
#3 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 C:\xampp\htdocs\kohana\system\classes\Kohana\Request.php(993): Kohana_Request_Client->execute(Object(Request))
#5 C:\xampp\htdocs\kohana\index.php(118): Kohana_Request->execute()
#6 {main} in C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php:84
2022-05-26 15:24:43 --- CRITICAL: Error [ 0 ]: Attempt to assign property "main" on string ~ APPPATH\classes\Controller\UsersHandling.php [ 7 ] in C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php:84
2022-05-26 15:24:43 --- DEBUG: #0 C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php(84): Controller_UsersHandling->action_displayUsers()
#1 [internal function]: Kohana_Controller->execute()
#2 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_UsersHandling))
#3 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 C:\xampp\htdocs\kohana\system\classes\Kohana\Request.php(993): Kohana_Request_Client->execute(Object(Request))
#5 C:\xampp\htdocs\kohana\index.php(118): Kohana_Request->execute()
#6 {main} in C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php:84
2022-05-26 15:24:59 --- CRITICAL: Error [ 0 ]: Attempt to assign property "main" on string ~ APPPATH\classes\Controller\UsersHandling.php [ 7 ] in C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php:84
2022-05-26 15:24:59 --- DEBUG: #0 C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php(84): Controller_UsersHandling->action_displayUsers()
#1 [internal function]: Kohana_Controller->execute()
#2 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_UsersHandling))
#3 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 C:\xampp\htdocs\kohana\system\classes\Kohana\Request.php(993): Kohana_Request_Client->execute(Object(Request))
#5 C:\xampp\htdocs\kohana\index.php(118): Kohana_Request->execute()
#6 {main} in C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php:84