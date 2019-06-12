<?php

$dsn = "mysql:host=localhost;charset=utf8;dbname=db01";
$pdo = new PDO($dsn, "root", "");
session_start();


if(empty($_SESSION['total'])){
    $total=find("total",1);
    $total['total']=$total['total']+1;
    save("total",$total);
    $_SESSION['total']=$total['total'];
}


//查詢單筆資料
function find($table, $def)
{
    global $pdo;

    if (is_array($def)) {

        foreach ($def as $key => $val) {

            $str[] = sprintf("`%s`='%s'", $key, $val);

        }
        
        $sql = "select * from $table where " . implode(" && ", $str) . "";

    } else {

        $sql = "select * from $table where id='$def'";

    }

    return $pdo->query($sql)->fetch(PDO::FETCH_ASSOC);

}

//新增及更新資料
function save($table, $data)
{
    global $pdo;
    if (!empty($data['id'])) {
        //update
        foreach ($data as $key => $val) {

            if ($key != 'id') {

                $str[] = sprintf("%s='%s'", $key, $val);

            }
        }

        $sql = "update $table set " . implode(" , ", $str) . " where id='" . $data['id'] . "'";

    } else {
        //insert
        $tmp = array_keys($data);
        $sql = "insert into $table(`" . implode("`,`", $tmp) . "`) values('" . implode("','", $data) . "')";

    }
    //echo $sql;
    return $pdo->exec($sql);

}

//導向函式
function to($page, $param)
{
    if (empty($param)) {
        header("location:$page");
    } else {
        header("location:$page?$param");
    }
}

//刪除資料函式
function del($table, $def)
{
    global $pdo;

    if (is_array($def)) {

        foreach ($def as $key => $val) {

            $str[] = sprintf("`%s`='%s'", $key, $val);

        }

        $sql = "delete from $table where " . implode(" && ", $str) . "";

    } else {

        $sql = "delete from $table where id='$def'";

    }

    return $pdo->exec($sql);

}

//通用查詢函式
function q($str)
{
    global $pdo;

    return $pdo->query($str)->fetchAll();

}

//多筆查詢
function all($table, $def)
{
    global $pdo;

    if (count($def) > 0) {

        foreach ($def as $key => $val) {

            $str[] = sprintf("`%s`='%s'", $key, $val);

        }

        $sql = "select * from $table where " . implode(" && ", $str) . "";

    } else {

        $sql = "select * from $table";

    }

    return $pdo->query($sql)->fetchAll();

}

//計算筆數
function nums($table, $def)
{

    global $pdo;

    if (count($def) > 0) {

        foreach ($def as $key => $val) {

            $str[] = sprintf("`%s`='%s'", $key, $val);

        }

        $sql = "select count(*) from $table where " . implode(" && ", $str) . "";

    } else {

        $sql = "select count(*) from $table";

    }

    return $pdo->query($sql)->fetchColumn();

}


