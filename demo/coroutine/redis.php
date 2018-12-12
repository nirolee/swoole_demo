<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$http = new swoole_http_server('0.0.0.0', 8812);
$http->on('request', function($request, $response){
    $redis = new Swoole\Coroutine\Redis();
    $redis->connect('127.0.0.1', 6379);
    $redis->auth('88322429');
    $value = $redis->get($request->get['a']);
    var_dump($redis);
    $response->header("Content-Type", "text/plain");
    $response->end($value);
});

$http->start();