
<?php 
  
  include "dbconfig.php";


class DB{


  /* public function  getUsers(){
      global $conn;


      $sql= $conn->query("SELECT * FROM users");

      echo json_encode($sql->fetch_assoc());


   }

   */


   public function  getTable($table){
    global $conn;


    $sql= $conn->query("SELECT * FROM $table");
     
    $arr=array();
    while($userdata=$sql->fetch_assoc()){
        array_push($arr,$userdata);
    }

     return $arr;


 }


 
 
 public function  getData($table,$id){
    global $conn;


    $sql= $conn->query("SELECT * FROM $table WHERE id='{$id}'");
     
   
     return $sql->fetch_assoc();


 }





}