<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

swoole_async_readfile(__DIR__."/1.txt", function($filename, $fileContent){
    echo "filename".$filename.PHP_EOL;
    echo "content:".$fileContent.PHP_EOL;
});