<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2022-05-20 11:01:24 --- CRITICAL: TypeError [ 0 ]: count(): Argument #1 ($value) must be of type Countable|array, Model_Role given ~ MODPATH\orm\classes\Kohana\ORM.php [ 1475 ] in C:\xampp\htdocs\kohana\modules\orm\classes\Kohana\Auth\ORM.php:90
2022-05-20 11:01:24 --- DEBUG: #0 C:\xampp\htdocs\kohana\modules\orm\classes\Kohana\Auth\ORM.php(90): Kohana_ORM->has('roles', Object(Model_Role))
#1 C:\xampp\htdocs\kohana\modules\auth\classes\Kohana\Auth.php(92): Kohana_Auth_ORM->_login(Object(Model_User), '25491bbabc8ad4b...', true)
#2 C:\xampp\htdocs\kohana\application\classes\Controller\Register.php(55): Kohana_Auth->login('test4', '123', true)
#3 C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php(84): Controller_Register->action_login()
#4 [internal function]: Kohana_Controller->execute()
#5 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Register))
#6 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 C:\xampp\htdocs\kohana\system\classes\Kohana\Request.php(993): Kohana_Request_Client->execute(Object(Request))
#8 C:\xampp\htdocs\kohana\index.php(118): Kohana_Request->execute()
#9 {main} in C:\xampp\htdocs\kohana\modules\orm\classes\Kohana\Auth\ORM.php:90
2022-05-20 11:10:12 --- CRITICAL: TypeError [ 0 ]: count(): Argument #1 ($value) must be of type Countable|array, Model_Role given ~ MODPATH\orm\classes\Kohana\ORM.php [ 1475 ] in C:\xampp\htdocs\kohana\modules\orm\classes\Kohana\Auth\ORM.php:91
2022-05-20 11:10:12 --- DEBUG: #0 C:\xampp\htdocs\kohana\modules\orm\classes\Kohana\Auth\ORM.php(91): Kohana_ORM->has('roles', Object(Model_Role))
#1 C:\xampp\htdocs\kohana\modules\auth\classes\Kohana\Auth.php(92): Kohana_Auth_ORM->_login(Object(Model_User), '25491bbabc8ad4b...', true)
#2 C:\xampp\htdocs\kohana\application\classes\Controller\Register.php(55): Kohana_Auth->login('test4', '123', true)
#3 C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php(84): Controller_Register->action_login()
#4 [internal function]: Kohana_Controller->execute()
#5 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Register))
#6 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 C:\xampp\htdocs\kohana\system\classes\Kohana\Request.php(993): Kohana_Request_Client->execute(Object(Request))
#8 C:\xampp\htdocs\kohana\index.php(118): Kohana_Request->execute()
#9 {main} in C:\xampp\htdocs\kohana\modules\orm\classes\Kohana\Auth\ORM.php:91
2022-05-20 11:29:28 --- CRITICAL: TypeError [ 0 ]: count(): Argument #1 ($value) must be of type Countable|array, Model_Role given ~ MODPATH\orm\classes\Kohana\ORM.php [ 1475 ] in C:\xampp\htdocs\kohana\modules\orm\classes\Kohana\Auth\ORM.php:91
2022-05-20 11:29:28 --- DEBUG: #0 C:\xampp\htdocs\kohana\modules\orm\classes\Kohana\Auth\ORM.php(91): Kohana_ORM->has('roles', Object(Model_Role))
#1 C:\xampp\htdocs\kohana\modules\auth\classes\Kohana\Auth.php(92): Kohana_Auth_ORM->_login(Object(Model_User), '25491bbabc8ad4b...', true)
#2 C:\xampp\htdocs\kohana\application\classes\Controller\Register.php(55): Kohana_Auth->login('test4', '123', true)
#3 C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php(84): Controller_Register->action_login()
#4 [internal function]: Kohana_Controller->execute()
#5 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Register))
#6 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 C:\xampp\htdocs\kohana\system\classes\Kohana\Request.php(993): Kohana_Request_Client->execute(Object(Request))
#8 C:\xampp\htdocs\kohana\index.php(118): Kohana_Request->execute()
#9 {main} in C:\xampp\htdocs\kohana\modules\orm\classes\Kohana\Auth\ORM.php:91
2022-05-20 11:42:18 --- CRITICAL: Error [ 0 ]: Attempt to assign property "main" on string ~ APPPATH\classes\Controller\Standard.php [ 19 ] in C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php:69
2022-05-20 11:42:18 --- DEBUG: #0 C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php(69): Controller_Standard->before()
#1 [internal function]: Kohana_Controller->execute()
#2 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Register))
#3 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 C:\xampp\htdocs\kohana\system\classes\Kohana\Request.php(993): Kohana_Request_Client->execute(Object(Request))
#5 C:\xampp\htdocs\kohana\index.php(118): Kohana_Request->execute()
#6 {main} in C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php:69
2022-05-20 11:42:19 --- CRITICAL: Error [ 0 ]: Attempt to assign property "main" on string ~ APPPATH\classes\Controller\Standard.php [ 19 ] in C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php:69
2022-05-20 11:42:19 --- DEBUG: #0 C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php(69): Controller_Standard->before()
#1 [internal function]: Kohana_Controller->execute()
#2 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Register))
#3 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 C:\xampp\htdocs\kohana\system\classes\Kohana\Request.php(993): Kohana_Request_Client->execute(Object(Request))
#5 C:\xampp\htdocs\kohana\index.php(118): Kohana_Request->execute()
#6 {main} in C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php:69