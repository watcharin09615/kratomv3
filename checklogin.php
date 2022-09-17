<?php 
//print_r($_POST);
//exit();
session_start();
  if(isset($_POST['username'])){
    include("condb.php");
    $a_user= $_POST['username'];
    $a_pass = $_POST['password'];

    $sql="SELECT * FROM `user` WHERE username='".$a_user."' AND password='". md5($a_pass)."' ";
    $result = mysqli_query($con,$sql);

    if(mysqli_num_rows($result)==1){
        $row = mysqli_fetch_array($result);

        $_SESSION["user_id"] = $row["id_user"];
        $_SESSION["a_name"] = $row["name"];
        $_SESSION["type"] = $row["user_type"];
        $_SESSION["status"] = $row["user_status"];
        if($_SESSION["user_id"]!=''){
          if($_SESSION["status"]=='1'){
            if($_SESSION["type"]=='1'){
                Header("Location: user/");
            }elseif($_SESSION["type"]=='2'){
              Header("Location: admin/");
            }
          }else{
            echo "<script>";
              echo "alert(\"บัญชีการใช้งานนี้ถูกปิดการใช้งาน โปรดติดต่อผู้ดูแลระบบ\");"; 
              echo "window.history.back()";
            echo "</script>";
          }
          
        }

    }else{
      echo "<script>";
          echo "alert(\" user หรือ  password ไม่ถูกต้อง\");"; 
          echo "window.history.back()";
      echo "</script>";

    }
  }else{
        
        Header("Location: index.php"); //user & password incorrect back to login again

  }
?>