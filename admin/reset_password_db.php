<meta charset="utf-8">
<?php
    include('../condb.php');
    $id = $_POST["a_id"];
	  $a_pass1  = MD5($_POST["password"]);
	  $a_pass2  = $_POST["newpassword"];
    $a_pass3  = $_POST["confirmpassword"];


    if($a_pass2 != $a_pass3){
        echo "<script type='text/javascript'>";
        echo "alert('ยืนยัน password ไม่ตรงกัน กรุณากรอกใหม่อีกครั้ง ');";
        echo "window.history.back();";
        echo "</script>";
    }elseif(MD5($a_pass2) == $a_pass1){
        echo "<script type='text/javascript'>";
        echo "alert('คุณใช้ password เก่ากรุณากรอกใหม่อีกครั้ง ');";
        echo "window.history.back();";
        echo "</script>";

    }
    

    $check = "SELECT * FROM user WHERE id_user = $id";
    $result = mysqli_query($con, $check);
    $row_am = mysqli_fetch_assoc($result);

  if($row_am['password'] != $a_pass1){
        echo "<script type='text/javascript'>";
        echo "alert('Password เดิมไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง');";
        echo "window.history.back();";
        echo "</script>";
  }else{
    $sql = "UPDATE user SET password = MD5('$a_pass2') WHERE id_user = '$id'";
    $result2 = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error($con));
    mysqli_close($con);

    if($result2){
    echo "<script type='text/javascript'>";
    echo "alert('เปลี่ยนรหัสผ่านสำเร็จ');";
    echo "window.location = 'index.php'; ";
    echo "</script>";
    }else{
    echo "<script type='text/javascript'>";
    echo "window.history.back();";
    echo "</script>";
    }
  }
?>