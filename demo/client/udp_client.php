<?php

$client = new swoole_client(SWOOLE_SOCK_UDP);
#$client->connect('127.0.0.1',9502);


fwrite(STDOUT, "请输入消息:");
$msg = trim(fgets(STDIN));


$client->sendto('127.0.0.1', 9502, $msg);
$res = $client->recv();
echo $res;
