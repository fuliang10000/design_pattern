<?php
/**
 * 解释器模式
 */
namespace app;

use common\interpreter\User;
use common\interpreter\UserCDInterpreter;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$username = 'fuliang';

$user = new User($username);
$interpreter = new UserCDInterpreter();
$interpreter->setUser($user);

print "<h1>{$username}'s Profile</h1>\r\n";
print $interpreter->getInterpreted();