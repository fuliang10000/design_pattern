<?php
//引入模板引擎文件
include("20130304.php");
$smarty = new TinySmarty();
$qq_numbers = array('a1' => '12333', 'a2' => '2222222', 'a3' => '333333', 'a4' => '3333333');
$smarty->assign($qq_numbers);
$smarty->assign('title', '这是我的QQ号码');
$smarty->assign('contents', '这是我的QQ：1211884772');
$smarty->display('20120305_01.html');