<?php
session_start(); 
include('../condb.php');
error_reporting( error_reporting() & ~E_NOTICE );
 
  $user_id= $_SESSION['user_id'];
  $a_name = $_SESSION['a_name'];
  $status = $_SESSION['status'];
  $type = $_SESSION['type'];

    if($user_id==''){
    Header("Location: ../logout.php");  
    }

    if($type == '2'){
        if ($status != '1') {
            echo "<script>";
            echo "alert('บัญชีผู้ใช้ของคุณถูกปิดการใช้งาน');";
            echo "window.location.href ='../logout.php';";
            echo "</script>";
        }
    }else{
        echo "<script>";
        echo "alert('คุณไม่มีสิทธิ์การเข้าถึง');";
        echo "window.location.href ='../logout.php';";
        echo "</script>";

    }
?>
    <title>Admin</title>