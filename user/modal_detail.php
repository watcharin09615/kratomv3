<!-- Modal -->
<div class="modal fade" id="detail<?php echo $row_am['id_petition'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

<?php  
    $id = $row_am['id_petition'];
    $modal = "SELECT * FROM petition,user,provinces,amphures,districts WHERE MD5(petition.id_petition) = MD5($id) AND petition.sub_area = districts.id AND petition.area = amphures.id AND petition.province = provinces.id AND petition.id_user = user.id_user" or die("Error:" . mysqli_error($con));

    $result1 = mysqli_query($con, $modal);
    $row_modal = mysqli_fetch_assoc($result1);
?>
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">คำร้อง</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body modal-dialog-scrollable">
                <h3>คุณ <?php echo $row_modal['name']." ".$row_modal['lastname']; ?></h3>
                <br>
                <div class="bg-light rounded h-100 p-4">
                <dl class="row mb-0">
                    <dt class="col-sm-4">กระท่อมสายพันธ์ุ</dt>
                    <dd class="col-sm-8">
                        <?php echo $row_am['species']; ?>
                    </dd>

                    <dt class="col-sm-4">จำนวน</dt>
                    <dd class="col-sm-8"><?php echo $row_modal['quantity']; ?> ต้น</dd>

                    <dt class="col-sm-4">ที่ตั้งฟาร์ม</dt>
                    <dd class="col-sm-8">ที่อยู่ <?php echo $row_modal['address_farm']; ?> ตำบล <?php echo $row_modal['name_di']; ?> อำเภอ <?php echo $row_modal['name_am']; ?> จังหวัด <?php echo $row_modal['name_pr']; ?> รหัสไปรษณีย์ <?php echo $row_modal['zip_code']; ?>  </dd>

                    <dt class="col-sm-4 text-truncate">เบอร์โทร</dt>
                    <dd class="col-sm-8"><?php echo $row_modal['tel']; ?></dd>

                    <dt class="col-sm-4 text-truncate">วันที่ยื่นคำร้อง</dt>
                    <dd class="col-sm-8"><?php echo $row_modal['petition_date']; ?></dd>

                    <?php 
                    if ($row_modal['status'] == 3) {
                        ?>  
                        <dt class="col-sm-4 text-truncate">วันที่ดำเนินการเสร็จสิ้น</dt>
                        <dd class="col-sm-8"><?php echo $row_modal['succes_date']; ?></dd>
                        
                        <?php
                    }
                    ?>

                   

                    <dt class="col-sm-4 text-truncate">สถานะการดำเนินการ</dt>
                    <dd class="col-sm-8">
                    <?php
                        switch ($row_modal['status']) {
                            case '1': ?>
                                รอการตรวจสอบ
                               <?php break;
                            case '2': ?>
                                กำลังดำเนินการ
                               <?php break;
                            case '3': ?>
                                เสร็จสิ้น
                               <?php break;
                        
                            default:
                                # code...
                                break;
                        }
                    ?>
                    </dd>
                </dl>
            </div>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>