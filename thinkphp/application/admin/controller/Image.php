<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\admin\controller;
use app\common\lib\Util;

/**
 * 图片上传类
 *
 * @author niro
 */
class Image {
    
    public function index() {
       $file = request()->file('file');
       $info = $file->move('../public/static/upload');
       if($info){
           $data = [
               'image' => config('live.host')."/upload/".$info->getSaveName(),
           ];
           return Util::show(config('code.success'), 'OK', $data);
       }else{
           return Util::show(config('code.error'), 'error');
       }
    }
    
    
}
