<?php

$do = (!empty($_GET['do'])) ? $_GET['do'] :"";
switch($do){
  case "title":
?>
<h3 style="text-align:center">新增標題區圖片</h3>
<hr>
<form action="api.php?do=newData" method="post" enctype="multipart/form-data">
<table style="margin:auto;">
  <tr>
    <td style="text-align:right">標題區圖片：</td>
    <td><input type="file" name="file"></td>
  </tr>
  <tr>
    <td style="text-align:right">標題區替代文字：</td>
    <td><input type="text" name="text"></td>
    <input type="hidden" name="table" value="title">
  </tr>
  <tr>
    <td><input type="submit" value="新增"><input type="reset" value="重置"></td>
    <td></td>
  </tr>
</table>
</form>
<?
  break;
  case "updateTitle":
?>
<h3 style="text-align:center">更新標題區圖片</h3>
<hr>
<form action="api.php?do=updateImage" method="post" enctype="multipart/form-data">
<table style="margin:auto;">
  <tr>
    <td style="text-align:right">標題區圖片：</td>
    <td><input type="file" name="file"></td>
    <input type="hidden" name="id" value="<?=$_GET['id'];?>">
    <input type="hidden" name="table" value="title">
  </tr>
  <tr>
    <td><input type="submit" value="新增"><input type="reset" value="重置"></td>
    <td></td>
  </tr>
</table>
</form>
<?
  break;
  case "ad":
  ?>
  <h3 style="text-align:center">新增動態文字廣告</h3>
  <hr>
  <form action="api.php?do=newData" method="post" enctype="multipart/form-data">
  <table style="margin:auto;">
    <tr>
      <td style="text-align:right">動態文字廣告：</td>
      <td><input type="text" name="text"></td>
      <input type="hidden" name="table" value="ad">
    </tr>
    <tr>
      <td><input type="submit" value="新增"><input type="reset" value="重置"></td>
      <td></td>
    </tr>
  </table>
  <form>
  <?
  break;
  case "mvim":
  ?>
  <h3 style="text-align:center">新增動畫圖片</h3>
  <hr>
  <form action="api.php?do=newData" method="post" enctype="multipart/form-data">
  <table style="margin:auto;">
    <tr>
      <td style="text-align:right">動畫圖片：</td>
      <td><input type="file" name="file"></td>
      <input type="hidden" name="table" value="mvim">
    </tr>

    <tr>
      <td><input type="submit" value="新增"><input type="reset" value="重置"></td>
      <td></td>
    </tr>
  </table>
  </form>
  <?
  break;
  case "updateMvim":
  ?>
  <h3 style="text-align:center">更換動畫圖片</h3>
  <hr>
  <form action="api.php?do=updateImage" method="post" enctype="multipart/form-data">
  <table style="margin:auto;">
    <tr>
      <td style="text-align:right">動畫圖片：</td>
      <td><input type="file" name="file"></td>
      <input type="hidden" name="id" value="<?=$_GET['id'];?>">
      <input type="hidden" name="table" value="mvim">
    </tr>
    <tr>
      <td><input type="submit" value="新增"><input type="reset" value="重置"></td>
      <td></td>
    </tr>
  </table>
  </form>
  <?
  break;
  case "image":
  ?>
  <h3 style="text-align:center">新增校園映像圖片</h3>
  <hr>
  <form action="api.php?do=newData" method="post" enctype="multipart/form-data">
  <table style="margin:auto;">
    <tr>
      <td style="text-align:right">校園映像圖片：</td>
      <td><input type="file" name="file"></td>
      <input type="hidden" name="table" value="image">
    </tr>

    <tr>
      <td><input type="submit" value="新增"><input type="reset" value="重置"></td>
      <td></td>
    </tr>
  </table>
  </form>
  <?
  break;
  case "updateImage":
  ?>
  <h3 style="text-align:center">更換校園映像圖片</h3>
  <hr>
  <form action="api.php?do=updateImage" method="post" enctype="multipart/form-data">
  <table style="margin:auto;">
    <tr>
      <td style="text-align:right">校園映像圖片：</td>
      <td><input type="file" name="file"></td>
      <input type="hidden" name="id" value="<?=$_GET['id'];?>">
      <input type="hidden" name="table" value="image">
    </tr>
    <tr>
      <td><input type="submit" value="新增"><input type="reset" value="重置"></td>
      <td></td>
    </tr>
  </table>
  </form>
  <?  
  break;
  case "news":
  ?>
  <h3 style="text-align:center">新增最新消息資料</h3>
  <hr>
  <form action="api.php?do=newData" method="post" enctype="multipart/form-data">
  <table style="margin:auto;">
    <tr>
      <td style="text-align:right">最新消息資料：</td>
      <td><textarea name="text"  cols="40" rows="5"></textarea></td>
      <input type="hidden" name="table" value="news">
    </tr>
    <tr>
      <td><input type="submit" value="新增"><input type="reset" value="重置"></td>
      <td></td>
    </tr>
  </table>
  <form>
  <?
  break;
  case "admin":
  ?>
  <h3 style="text-align:center">新增管理者帳號</h3>
  <hr>
  <form action="api.php?do=newData" method="post" enctype="multipart/form-data">
  <table style="margin:auto;">
    <tr>
      <td style="text-align:right">帳號：</td>
      <td><input type="text" name="acc"></td>
    </tr>
    <tr>
      <td style="text-align:right">密碼：</td>
      <td><input type="text" name="pw"></td>
    </tr>
    <tr>
      <td style="text-align:right">確認密碼：</td>
      <td><input type="text" name="pw2"></td>
    </tr>
    <tr>
        <input type="hidden" name="table" value="admin">
      <td><input type="submit" value="新增"><input type="reset" value="重置"></td>
      <td></td>
    </tr>
  </table>
  <form>
  <?
  break;
  case "menu":
  ?>
  <h3 style="text-align:center">新增主選單</h3>
  <hr>
  <form action="api.php?do=newData" method="post" enctype="multipart/form-data">
  <table style="margin:auto;">
    <tr>
      <td style="text-align:right">主選單名稱：</td>
      <td><input type="text" name="text"></td>
    </tr>
    <tr>
      <td style="text-align:right">選單連結網址：</td>
      <td><input type="text" name="href"></td>
    </tr>
    <tr>
        <input type="hidden" name="table" value="menu">
      <td><input type="submit" value="新增"><input type="reset" value="重置"></td>
      <td></td>
    </tr>
  </table>
  <form>
  <?
  break;
  case "subMenu":
  include_once "base.php";

    $subs=all("menu",['parent'=>$_GET['id']]);

  ?>
  <h3 style="text-align:center">編輯次選單</h3>
  <hr>
  <form action="api.php?do=subMenu" method="post" enctype="multipart/form-data">
  <table style="margin:auto;">
    <tr>
      <td style="text-align:right">次選單名稱：</td>
      <td style="text-align:right">次選單連結網址：</td>
      <td>刪除</td>
    </tr>
<?php
foreach($subs as $key => $value){
  ?>
    <tr>
      <td><input type="text" name="text[]" value="<?=$value['text'];?>"></td>
      <td><input type="text" name="href[]" value="<?=$value['href'];?>"></td>
      <input type="hidden" name="id[]" value="<?=$value['id'];?>">
      <td><input type="checkbox" name="del[]" value="<?=$value['id'];?>"></td>
    </tr>
<?php
}
?>
    <tr id="btn">
        <input type="hidden" name="table" value="menu">
        <input type="hidden" name="parent" value="<?=$_GET['id'];?>">
      <td>
        <input type="submit" value="修改確定">
        <input type="reset" value="重置">
        <input type="button" value="更多次選單" onclick="moreSub()">
      </td>
      <td></td>
    </tr>
  </table>
  <form>
  <script>
    function moreSub(){
      $str=`
            <tr>
              <td><input type="text" name="text2[]" value=""></td>
              <td><input type="text" name="href2[]" value=""></td>
            </tr>`
      $("#btn").before($str);
    }
  </script>
  <?
  break;
  default:
  echo "無此功能";
  
}
?>