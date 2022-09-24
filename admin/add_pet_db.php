<?php
include('../condb.php');
$type_iduser = $_POST['id_user'];
$type_species = $_POST['species'];
$type_quantity = $_POST['qty'];
$type_address = $_POST['address'];
$type_province = $_POST['provinces'];
$type_subarea = $_POST['districts'];
$type_area = $_POST['amphures'];
$type_zip_code = $_POST['zip_code'];
$type_tel = $_POST['tel'];



$sql ="INSERT INTO petition (
                      id_user,
                      species,
                      quantity,
                      address_farm,
                      sub_area,
                      area,
                      province,
                      zip_code,
                      tel,
                      status,
                      petition_date) VALUES (
                        '$type_iduser',
                        '$type_species',
                        '$type_quantity',
                        '$type_address',
                        '$type_subarea',
                        '$type_area',
                        '$type_province',
                        '$type_zip_code',
                        '$type_tel',
                        '1',
                        CURRENT_TIMESTAMP);";
    
    $result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error($con));
    mysqli_close($con);
    
    if($result){
      echo "<script>";
      echo "alert('สำเร็จ');";
      echo "window.location ='list_petition.php'; ";
      echo "</script>";
    } else {
      
      echo "<script>";
      echo "alert('ERROR!');";
      echo "window.history.back()'; ";
      echo "</script>";
    }
?>