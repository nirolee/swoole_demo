<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ws
 *
 * @author niro
 */
class Ws {
    const HOST = "0.0.0.0";
    const PORT = 8812;
    
    public $ws = null;
    public function __construct() {
        
        $this->ws = new swoole_websocket_server(self::HOST, self::PORT);
        $this->ws->on("open", [$this, 'onOpen']);
        $this->ws->on("message", [$this, 'onMessage']);
        $this->ws->on("close", [$this, 'onClose']);
        $this->ws->start();
    }
    /**
     * 监听ws连接事件
     * @param type $ws
     * @param type $request
     */
    public function onOpen($ws, $request) {
        var_dump('hello');
    }
    /**
     * 监听ws消息事件
     * @param type $ws
     * @param type $frame
     */
    public function onMessage($ws, $frame) {
        echo "ser-push-message:{$frame->data}\n";
        swoole_timer_tick(4000, function() use($ws, $frame){
           $ws->push($frame->fd, "每四秒啦"); 
        });
        $ws->push($frame->fd, "this is server". date("Y-m-d H:i:s"));
        
    }
    /**
     * close
     * @param type $ws
     * @param type $fd
     */
    public function onClose($ws, $fd) {
        echo "client {$fd} close \n";
    }
}
$obj = new Ws();