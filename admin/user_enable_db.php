<meta charset="UTF-8">
<?php
//1. เชื่อมต่อ database: 
include('../condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
//สร้างตัวแปรสำหรับรับค่า member_id จากไฟล์แสดงข้อมูล
$a_id = $_REQUEST["ID"];

//ลบข้อมูลออกจาก database ตาม member_id ที่ส่งมา

$sql = "UPDATE user SET user_status = '1' WHERE id_user ='$a_id' ";
$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error($con));

//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม
  
  if($result){
  echo "<script type='text/javascript'>";
  //echo "alert('Delete Succesfuly');";
  echo "window.location = 'memberuser.php'; ";
  echo "</script>";
  }
  else{
  echo "<script type='text/javascript'>";
  echo "alert('Error back to delete again');";
  echo "</script>";
}
?>