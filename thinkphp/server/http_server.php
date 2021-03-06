<?php

$http = new swoole_http_server('0.0.0.0', 8811);

$http->set(
    [
        'enable_static_handler' => true,
        'document_root' => "/www/wwwroot/swoole/thinkphp/public/static",
        'worker_num'=> 5,
    ]
);
$http->on('WorkerStart', function(swoole_server $server, $workerId){
    define('APP_PATH', __DIR__ . '/../application/');
    require __DIR__ . '/../thinkphp/base.php';
});
$http->on('request', function($request, $response) use($http){
        $_SERVER  =  [];
    if(isset($request->server)){
        foreach ($request->server as $k => $v) {
            $_SERVER[strtoupper($k)] = $v;
        }
    }
    if(isset($request->header)) {
        foreach($request->header as $k => $v) {
            $_SERVER[strtoupper($k)] = $v;
        }
    }

    $_GET = [];
    if(isset($request->get)) {
        foreach($request->get as $k => $v) {
            $_GET[$k] = $v;
        }
    }
    $_POST = [];
    if(isset($request->post)) {
        foreach($request->post as $k => $v) {
            $_POST[$k] = $v;
        }
    }
    
    ob_start();
    try {
        think\Container::get('app', [APP_PATH])
            ->run()
            ->send();
    }catch (\Exception $e) {
        // todo
    }
    $res = ob_get_contents();
    ob_end_clean();
    $response->end($res);
});
$http->start();
