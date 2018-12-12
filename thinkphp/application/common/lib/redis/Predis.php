<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\common\lib\redis;

/**
 * Description of Predis
 *
 * @author niro
 */
class Predis {
    public $redis = "";
    protected static $predis = null ;
    public static function getInstance(){
       if(empty(self::$predis)) {
            self::$predis = new self();
        }
        return self::$predis;
        

    }
    private function __construct() {
        $this->redis = new \Redis();
        $this->redis->connect(config('redis.host'), config('redis.port'), config('redis.timeOut'));
        $this->redis->auth(config('redis.password'));   
        
        if($this->redis === false) {
            throw new \Exception('redis connect error');
        }
    }

    /**
     * set
     * @param $key
     * @param $value
     * @param int $time
     * @return bool|string
     */
    public function set($key, $value, $time = 0 ) {
        if(!$key) {
            return '';
        }
        if(is_array($value)) {
            $value = json_encode($value);
        }
        if(!$time) {
            return $this->redis->set($key, $value);
        }

        return $this->redis->setex($key, $time, $value);
    }

    /**
     * get
     * @param $key
     * @return bool|string
     */
    public function get($key) {
        if(!$key) {
            return '';
        }

        return $this->redis->get($key);
    }

    /**
     * @param $key
     * @return array
     */
    public function sMembers($key) {
        return $this->redis->sMembers($key);
    }

    /**当方法不存在的时候，传的参数又一样
     * @param $name
     * @param $arguments
     * @return array
     */
    public function __call($name, $arguments) {
        //echo $name.PHP_EOL;
        //print_r($arguments);
        if(count($arguments) != 2) {
            return '';
        }
        $this->redis->$name($arguments[0], $arguments[1]);
    }
   
}
