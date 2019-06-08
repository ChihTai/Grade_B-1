<?php

$dsn="mysql:host=localhost;charset=utf8;dbname=db01";
$pdo=new PDO($dsn,"root","");
session_start();

//查詢單筆資料
function find($table,$def){
  global $pdo;
  
  if(is_array($def)){

    foreach($def as $key => $val){
      $str[]=sprintf("`%s`='%s'",$key,$val);
    }

    $sql="select * from $table where ".implode(" && ",$str)."";

  }else{
    
    $sql="select * from $table where id='$def'";

  }

  return $pdo->query($sql)->fetch(PDO::FETCH_ASSOC);

}


//新增及更新資料
function save($table,$data){
  global $pdo;
  if(!empty($data['id'])){
    //update
    foreach($data as $key => $val){

      if($key!='id'){

        $str[]=sprintf("%s='%s'",$key,$val);
      }
    }

    $sql="update $table set ".implode(" , ",$str)." where id='".$data['id']."'";

  }else{
    //insert
    $tmp=array_keys($data);
    $sql="insert into $table(`".implode("`,`",$tmp)."`) values('".implode("','",$data)."')";

  }
  echo $sql;
  return $pdo->exec($sql);

}

//導向函式
function to($page,$param){
  if(empty($param)){
    header("location:$page");
  }else{
    header("location:$page?$param");
  }
}


?>