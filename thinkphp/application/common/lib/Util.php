<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\common\lib;

/**
 * Description of Util
 *
 * @author niro
 */
class Util {
    /**
     * api 输出格式
     * @param type $status
     * @param type $message
     * @param type $data
     */
    public static function show($status, $message ='', $data=[]){
        $result = [
            'status' => $status,
            'message' => $message,
            'data' => $data,
        ];
        echo json_encode($result);
    }
}
