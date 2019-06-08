<?php

$dsn = "mysql:host=localhost;charset=utf8;dbname=bquiz01";
$pdo = new PDO($dsn, "root", "");
session_start();

/***************************************************
 * 計算資料筆數的函式
 * 參數需要table名稱及條件，條件以陣列形式呈現
 * 陣列長為0時表示要計算table全部的筆數
 * 陣列內有元素時表示計算符合條件的資料筆數
 * 陣列的形式為['欄位名'=>'值']
 * 多個條件時，預設以&&連結。
 ***************************************************/
function nums($table, $def)
{
  global $pdo;

  if (count($def) > 0) {
    foreach ($def as $key => $value) {
      $str[] = sprintf("%s='%s'", $key, $value);
    }

    $sql = "select count(*) from $table where " . implode(" && ", $str) . " ";

  } else {

    $sql = "select count(*) from $table";

  }

  $rows = $pdo->query($sql)->fetchColumn();
  return $rows;

}

/***************************************************
 * 查詢資料的函式
 * 參數需要table名稱及條件，條件以陣列形式呈現
 * 陣列長度為0時表示要取得資料表的全部資料
 * 陣列內有元素時表示只取得符合條件的資料
 * 陣列的形式為['欄位名'=>'值']
 * 多個條件時，預設以&&連結。
 ***************************************************/
function all($table, $def)
{
  global $pdo;

  if (count($def) > 0) {
    foreach ($def as $key => $value) {
      $str[] = sprintf("%s='%s'", $key, $value);
    }

    $sql = "select * from $table where " . implode(" && ", $str) . " ";

  } else {

    $sql = "select * from $table";

  }

  $rows = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
  return $rows;

}

/***************************************************
 * 查詢指定id資料的函式
 * 參數需要table名稱及id
 ***************************************************/
function find($table, $id)
{
  global $pdo;
  $sql = "select * from $table where id='$id'";
  $row = $pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
  return $row;
}

/***************************************************
 * 通用query函式
 * 簡化pdo的指令
 * 一律以fetchAll()的方式取資料
 ***************************************************/
function q($query)
{
  global $pdo;
  $rows = $pdo->query($query)->fetchAll(PDO::FETCH_ASSOC);
  return $rows;
}

/***************************************************
 * 新增及更新資料通用函式
 * 以有無id值來判斷是要做新增還是更新的動作
 * 預設會先以find()拿到指定id的資料後，進行內容的修改再
 * 做更新進資料庫的動作
 * 利用array_keys()來取出陣列中的key值陣列
 * 利用implode()來組合陣列
 ***************************************************/
function save($table, $row)
{
  global $pdo;
  if (!empty($row['id'])) {
    //更新資料
    foreach ($row as $key => $value) {
      if ($key != 'id') {
        $str[] = sprintf("%s='%s'", $key, $value);
      }
    }

    $sql = "update $table set " . implode(",", $str) . " where id='" . $row['id'] . "'";

  } else {
    //新增資料
    $sql = "insert into $table (`" . implode('`,`', array_keys($row)) . "`) values('" . implode("','", $row) . "')";

  }

  echo $sql;

  return $pdo->exec($sql);
}

/***************************************************
 * 刪除資料專用函式
 * 需帶入兩個參數，資料表名及刪除的條件
 * 當刪除的條件為數值時，表示刪除指定id的資料
 ***************************************************/
function del($table, $def)
{
  global $pdo;
  if (is_array($def)) {
    foreach ($row as $key => $value) {
      $str[] = sprintf("%s='%s'", $key, $value);
    }

    $sql = "delete from $table where " . implode(" && ", $str) . "";

  } else {

    $sql = "delete from $table where id='$def'";
  }

  return $pdo->exec($sql);
}

/***************************************************
 * 頁面導向專用函式
 * 需帶入兩個參數，路徑檔名及路徑參數
 ***************************************************/
function to($url,$param){
  header("location:$url?$param");
}