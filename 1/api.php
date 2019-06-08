<?php
include_once "base.php";

$do=(!empty($_GET['do']))?$_GET['do']:"";
switch($do){
  case "total":
    
    $total=find("total",1);
    $total['total']=$_POST['total'];
    save("total",$total);

    to("admin.php","do=total");

  break;
  case "bottom":
    $bottom=find("bottom",1);
    $bottom['bottom']=$_POST['bottom'];
    save("bottom",$bottom);

    to("admin.php","do=bottom");
  break;
  default:

  echo "非法入侵";


}


?>