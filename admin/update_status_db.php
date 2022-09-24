<meta charset="UTF-8">
<?php
//1. เชื่อมต่อ database: 
include('../condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
//สร้างตัวแปรสำหรับรับค่า member_id จากไฟล์แสดงข้อมูล


$id = $_POST['petid'];
$status = $_POST["status"];
$approved = NULL;
if ($status == 3) {
  $approved = $_POST["approved"];
  $sql = "UPDATE petition SET status = '$status' ,approved = '$approved' ,succes_date = CURRENT_TIMESTAMP WHERE id_petition ='$id'";
  if ($approved == 1) {
    if(isset($_FILES['image'])) {
      $path="../images/petition/";
      //ตัวขื่อกับนามสกุลภาพออกจากกัน
      $type = strrchr($_FILES['image']['name'],".");
    
      $newname ='GAP_'.MD5($id).$type;
      $path_copy=$path.$newname;
      $path_link="../images/petition/".$newname;
      move_uploaded_file($_FILES['image']['tmp_name'],$path_copy);
      $sql1 = "INSERT INTO img(petition_id,img) VALUES('$id','$newname')";
      $result2 = mysqli_query($con, $sql1) or die ("Error in query: $sql " . mysqli_error($con));
    }
  }
  

}else{
  $sql = "UPDATE petition SET status = '$status' WHERE id_petition ='$id'";
}


$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error($con));





// status 1, 2,3  update to database


// if($upload <> '') {

// 	//โฟลเดอร์ที่เก็บไฟล์
// 	$path="../images/petition/";
// 	//ตัวขื่อกับนามสกุลภาพออกจากกัน
// 	$type = strrchr($_FILES['image']['name'],".");
// 	//ตั้งชื่อไฟล์ใหม่เป็น สุ่มตัวเลข+วันที่
// 	$newname ='GAP_'.$id.$type;
// 	$path_copy=$path.$newname;
// 	$path_link="../images/petition/".$newname;
// 	//คัดลอกไฟล์ไปยังโฟลเดอร์
// 	move_uploaded_file($_FILES['image']['tmp_name'],$path_copy);
// 	}




// //ลบข้อมูลออกจาก database ตาม member_id ที่ส่งมา
// if ($approved != NULL) {
//   $sql = "UPDATE petition SET status = '$status' ,approved = '$approved' ,succes_date = CURRENT_TIMESTAMP WHERE MD5(id_petition) ='$id'";
// }else{
//   $sql = "UPDATE petition SET status = '$status' WHERE MD5(id_petition) ='$id'";
// }
// $result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error($con));


  
if($result){
      echo "<script type='text/javascript'>";
      echo "alert('Update Succesfuly');";
      echo "window.location = 'list_petition.php';";
      echo "</script>";
}
else{
echo "<script type='text/javascript'>";
echo "alert('Error back to delete again');";
echo "</script>";
}
?>