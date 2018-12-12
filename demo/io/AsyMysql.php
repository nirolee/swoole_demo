<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AsyMysql
 *
 * @author niro
 */
class AsyMysql {
    /**
     *
     * @var type 
     */
    public $db;
    
    /**
     * 
     */
    public function __construct() {
        $this->db = new swoole_mysql();
        $this->config = [
            'host' => '127.0.0.1',
            'user' =>'root',
            'password' =>'lgq13632499177',
            'database' =>'blog',
        ];
    }
    
    public function update($param) {
        
    }
    
    public function add($param) {
        
    }
    /**
     * 
     * @param type $id
     * @param type $username
     */
    public function execute() {
        $this->db->connect($this->config, function($db, $result){
            if($result===FALSE){
                var_dump($db->connect_error);
            }else{
                $sql = "select * from wp_posts where ID<100";
                $db->query($sql, function($db, $result){
                     if($result===FALSE){
                         var_dump($db->connect_error);
                     }elseif($result===TRUE){
                         var_dump($db->affected_rows, $db->insert_id);
                     }else{
                         var_dump($result);
                     }
                });
                $db->close();
            }
        });
         
    }
}  
$asy = new AsyMysql();
$result = $asy->execute();