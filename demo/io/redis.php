<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$options = [
    'password' => '88322429',
];
$redisClient = new swoole_redis($options);
$redisClient->connect('127.0.0.1', '6379', function($client, $result){
    if($result === FALSE){
        echo "connect to redis server failed .\n";
        return ;
    }
    $client->set('key', 'swoole', function($client, $result){
        var_dump($result);
    });
});
echo "start".PHP_EOL;