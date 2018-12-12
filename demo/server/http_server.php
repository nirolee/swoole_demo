<?php

$http = new swoole_http_server('0.0.0.0', 8811);

$http->set(
	[
		'enable_static_handler' =>true,
		'document_root'=>"/www/wwwroot/swoole/demo/data",
	]
);
$http->on('request', function($request, $response){
  $response->end(json_encode($request->get));
});
$http->start();
