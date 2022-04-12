<?php
/**
 * 解释器模式
 * @description 解释器模式用于分析一个实体的关键元素，
 * 并且针对每个元素都提供自己的解释或相应的动作。
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