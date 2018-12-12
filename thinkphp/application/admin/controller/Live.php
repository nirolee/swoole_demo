<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\admin\controller;
use app\common\lib\Util;
use app\common\lib\redis\Predis;
/**
 * Description of Live
 *
 * @author niro
 */
class Live {
    
    public function push() {
        if(empty($_GET)){
            return Util::show('code.error', 'error');
        }
        
        $teams = [
            1 => [
                'name' => '马刺',
                'logo' => '/live/imgs/team1.png',
            ],
            4 => [
                'name' => '火箭',
                'logo' => '/live/imgs/team2.png',
            ]
        ];
        $data = [
            'type' =>intval($_GET['type']),
            'title' => $teams[$_GET['team_id']]['logo'] ?? '直播员',
        ];
        $clients = Predis::getInstance()->sMembers(config('redis.live_game_key'));
        foreach ($clients as $fd) {
            $_POST['http_server']->push($fd, json_encode($data));
        };
        
    }
}
