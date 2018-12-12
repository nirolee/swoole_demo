<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$cotent = time(). PHP_EOL;
swolle_asyno_writefile(__DIR__."/1.log", $content, function($filename){
    echo "success".PHP_EOL;
},FILE_APPEND); //FILE_APPEND 追加
echo 'start'.PHP_EOL;