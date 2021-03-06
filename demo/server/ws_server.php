<?php

$server = new swoole_websocket_server("0.0.0.0", 9501);
$server->set(
    [
	'enable_static_handler' =>true,
	'document_root' => "/www/wwwroot/swoole/demo/data", 	    
    ]
);
$server->on('open', function (swoole_websocket_server $server, $request) {
    echo "server: handshake success with fd{$request->fd}\n";
});
//监听ws消息事件
$server->on('message', function (swoole_websocket_server $server, $frame) {
    echo "receive from {$frame->fd}:{$frame->data},opcode:{$frame->opcode},fin:{$frame->finish}\n";
    $server->push($frame->fd, "this is server");
});

$server->on('close', function ($ser, $fd) {
    echo "client {$fd} closed\n";
});

$server->start();
