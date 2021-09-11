<?php


namespace common\interpreter;


class User
{

    protected $_username = '';

    public function __construct($username)
    {
        $this->_username = $username;
    }

    public function getProfilePage()
    {
        $profile = "<h2>I like Never Again!</h2>\r\n";
        $profile .= "I love all of their songs. My favorite CD:\r\n";
        $profile .= "{{myCD.getTitle}}!!\r\n";

        return $profile;
    }
}