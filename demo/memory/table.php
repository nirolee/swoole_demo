<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of table
 *
 * @author niro
 */
class table {
    
    function __construct() {
        $this->table = new swoole_table(1024) ;
    }
    
}
