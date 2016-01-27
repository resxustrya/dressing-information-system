<?php
  
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    include_once 'database.php';
    
    if (isset($_REQUEST['username']) && isset($_REQUEST['password'])) {
        include_once 'database.php';
         $data = $obj->login_ajax($_REQUEST['username'], $_REQUEST['password']);
         
         $merge = array_merge($data,$obj->getName($data['userid']));
         
         echo $merge;
         
    }
?>