<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\common\lib;

/**
 * Description of Redis
 *
 * @author niro
 */
class Redis {
    /**
     * 验证码 redis key的前缀
     * @var string
     */
    public static $pre = "sms_";
    /**
     * 用户user pre
     * @var string
     */
    public static $userpre = "user_";

    /**
     * 存储验证码 redis key
     * @param $phone
     * @return string
     */
    public static function smsKey($phone) {
        return self::$pre.$phone;
    }

    /**
     * 用户 key
     * @param $phone
     * @return string
     */
    public static function userkey($phone) {
        return self::$userpre.$phone;
    }
}
