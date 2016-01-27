<?php
session_start();
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


class DatabaseAction {
    private $db;
    
    public function __construct() {
        try {
            $this->db = new PDO("mysql:localhost;dbname=php1final","root","");
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $ex){
            echo $ex;
        }
    }
    public function login_ajax($username, $password)
    {
        $st = $this->db->prepare("select roles,userid,username,password from user where username = :username and password = :password");
        $st->bindParam(":username", $username);
        $st->bindParam(":password", $password);
        $st->execute();
        $row = $st->fetch(PDO::FETCH_ASSOC);

        if (is_array($row)) {
            return $row;
        }
        return false;
    }
    public function login($username,$password) {
        
        $username = htmlentities(trim($username));
        $password = htmlentities(trim($password));
        
       
        $st = $this->db->prepare("select roles,userid,username,password from user where username = :username and password = :password");
        $st->bindParam(":username",$username);
        $st->bindParam(":password",$password);
        $st->execute();
        $row = $st->fetch(PDO::FETCH_ASSOC);
        if ($row['username'] == $username and $row['password'] == $password) {
           $_SESSION['USERID'] = $row['userid'];
           if ($row['roles'] == 2){
               return -1;
           } else {
               return 1;
           }
        }
        return false;
    }
    public function userlist()
    {
        $st = $this->db->prepare("select * from user where roles = 2 and active = 1");
        $st->execute();
        $row = $st->fetchAll(PDO::FETCH_ASSOC);
        
        if(is_array($row)) {
            return $row;
        }
        return false;
    }
    public function signup($username,$password,$firstname,$lastname)
    {
        try
        {
            $st = $this->db->prepare("insert into user(username,password,firstname,lastname,roles,active) values(?,?,?,?,?,?)");
            $st->execute(array($username,$password,$firstname,$lastname,2,1));
        }catch(PDOException $e) {
            return false;
        }
        return true;
    }
    public function getItem($id) {
        $st = $this->db->prepare("SELECT * FROM dressrecord WHERE dressid = :id");
        $st->bindParam(":id",$id);
        $st->execute();
        $row = $st->fetch(PDO::FETCH_ASSOC);
        
        if (is_array($row)) {
            return $row;
        }
        return null;
    }
    public function getName($id) {
       $st = $this->db->prepare("select firstname, lastname from user where userid = :id");
       $st->bindParam(":id",$id);
       $st->execute();
        $row = $st->fetch();
        
        if (isset($row)) {
            return $row;
        }
        return null;
    }
    public function logout() {
        if(session_destroy()) {
           return true;
        }
        return false;
    }
    public function addRecord($dressname,$dresssize,$dresstype,$price,$qty,$img) {
        try {
            $st = $this->db->prepare("insert into dressrecord(dressname,dresssize,dresstype,status,price,qty,imgname) values(?,?,?,?,?,?,?)");
            $st->execute(array($dressname,$dresssize,$dresstype,1,$price,$qty,$img));
        }catch(PDOException $ex) {
            return false;
        }
        return true;
    }
    private function uploadPhoto(){
        
    }
    public function viewList() {
        $st = $this->db->prepare("select * from dressrecord where status = 1");
        $st->execute();
        $row = $st->fetchAll(PDO::FETCH_ASSOC);
        
        if (is_array($row)) {
            return $row;
        }
        return null;
    }
    public function updateRecord($dressname,$dresssize,$dresstype,$price,$qty,$desc) {
        try {
            $st = $this->db->prepare("update dressrecord set dressname = :dressname, dresssize = :dresssize, dresscolor = :dresscolor ,dresstype = :dresstype");
            $st->bindParam(":username", $dressname);
            $st->bindParam(":dresssize",$dresssize);
            $st->bindParam(":dresscolor",$dresscolor);
            $st->bindParam(":dresstype",$dresstype);
            $st->execute();
        }catch(PDOException $ex) {
            return false;
        }
        return true;
    }
    public function search($search) {
        $st = $this->db->prepare("select * from dressrecord where dressname like ':search%'");
        $st->bindParam(":search",$search);
        $st->execute();
        $row = $st->fetchAll(PDO::FETCH_ASSOC);
        
        if (is_array($row)){
            return $row;
        }
        return null;
    }
    public function delete($key) {
        try {
            $st = $this->db->prepare("update dressrecord set status = 0 where dressid= :key");
            $st->bindParam(":key",$key);
            $st->execute();
        }catch(PDOException $ex) {
            return false;
        }
        return true;
    }
    public function edit($a,$b,$c,$d,$e,$f,$id) {
        try {
            $st = $this->db->prepare("update dressrecord set dressname = :a, dresssize = :b, dresstype = :c,price = :d, qty = :e ,img = :f where dressid = :id");
            $st->bindParam(":a",$a);
            $st->bindParam(":b",$b);
            $st->bindParam(":c",$c);
            $st->bindParam(":d",$d);
            $st->bindParam(":e",$e);
            $st->bindParam(":f",$f);
            $st->bindParam(":id",$id);
            $st->execute();
        }catch(PDOException $ex ) {
            return false;
        }
        return true;
    }
    public function removeuser($key) {
        try {
            $st = $this->db->prepare("update user set active = 0 where userid = :key");
            $st->bindParam(":key",$key);
            $st->execute();
        }catch(PDOException $ex) {
            return false;
        }
        return true;
    }
    public function buyDress($dressid,$userid,$qty) {
        try {
            $st = $this->db->prepare("insert into purchaseddress(userid,dressid,status,qty) values(?,?,?,?)");
            $st->execute(array($userid,$dressid,1,$qty));
        }catch(PDOException $ex) {
            die($ex.getMessage());
            return false;
        }
        return true;
    }
    public function purchaselist($key){
        $st = $this->db->prepare("select d.dressname from dressrecord d, purchaseddress p where d.dressid = p.dressid and p.userid = :key");
        $st->bindParam(":key",$key);
        $st->execute();
        $row = $st->fetchAll(PDO::FETCH_ASSOC);
        if (is_array($row)) {
            return $row;
        }
        return null;
    }
    public function updateQty($dressid,$qty){
        $st = $this->db->prepare("select qty from dressrecord where dressid = :dressid");
        $st->bindParam(":dressid",$dressid);
        $st->execute();
        $row = $st->fetch();
        $oldqty = $row['qty'];
        $oldqty -= $qty;
        $st = $this->db->prepare("update dressrecord set qty = :oldqty where dressid = :dressid");
        $st->bindParam(":oldqty",$oldqty);
        $st->bindParam(":dressid",$dressid);
        $st->execute();
    }
}
    $obj = new DatabaseAction();
  ?>