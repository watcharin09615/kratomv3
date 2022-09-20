<!-- Modal -->
<div class="modal fade" id="status<?php echo $row_am['id_petition'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

<?php  
    $id = $row_am['id_petition'];
    $query = "SELECT * FROM user WHERE user_status = 1 and user_type = 1 ORDER BY id_user asc" or die("Error:" . mysqli_error($con));
        //3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
    $result = mysqli_query($con, $query);
    //4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล:
?>
    <div class="modal-dialog modal-xl">
        <form action="update_status_db.php" method="post" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">คำร้องของคุณ <?php echo $row_modal['name']." ".$row_modal['lastname']; ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body modal-dialog-scrollable">
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

                        <dt class="col-sm-4 text-truncate">สถานะปัจจุบัน</dt>
                        <dd class="col-sm-8"><?php if($row_am['status'] == 1){ ?>
                                            รอการตรวจสอบ
                                        <?php }elseif($row_am['status'] == 2){ ?>
                                            กำลังดำเนินการ
                                        <?php }elseif($row_am['status'] == 3){?>
                                            เสร็จสิ้น
                                        <?php } ?></dd>
                        <input type="hidden" name="petid" value="<?php echo $row_am['id_petition']; ?>">
                        <dt class="col-sm-4">เปลี่ยนสถานะ</dt>
                        <dd class="col-sm-8">
                        <div class="btn-group" role="group">
                                    <input type="radio" class="btn-check" name="status" id="btnradio1_<?= $row_am['id_petition'] ?>" petid=<?= $row_am['id_petition'] ?>  value='1' autocomplete="off" <?php if ($row_modal['status'] == 1) echo "checked"; ?>>
                                    <label class="btn btn-outline-primary" for="btnradio1_<?= $row_am['id_petition'] ?>" id="btnradio1text">รอการตรวจสอบ</label>

                                    <input type="radio" class="btn-check" name="status" id="btnradio2_<?= $row_am['id_petition'] ?>" petid=<?= $row_am['id_petition'] ?>  value='2' autocomplete="off" <?php if ($row_modal['status'] == 2) echo "checked"; ?>>
                                    <label class="btn btn-outline-primary" for="btnradio2_<?= $row_am['id_petition'] ?>" id="btnradio2text">กำลังดำเนินการ</label>

                                    <input type="radio" class="btn-check" name="status" id="btnradio3_<?= $row_am['id_petition'] ?>" petid=<?= $row_am['id_petition'] ?> value='3' autocomplete="off" <?php if ($row_modal['status'] == 3) echo "checked"; ?>>
                                    <label class="btn btn-outline-primary" for="btnradio3_<?= $row_am['id_petition'] ?>" id="btnradio3text">เสร็จสิ้น</label>
                        </div>
                        </dd>
                        <div><br></div>
                            <dt class="col-sm-4" id="dis1_<?= $row_am['id_petition'] ?>" style="display:none">ผลการอนุมัติ</dt>
                            <dd class="col-sm-8" id="dis2_<?= $row_am['id_petition'] ?>" style="display:none">
                            <div class="btn-group" role="group" >
                                        <input type="radio" class="btn-check" name="approved" id="radio1_<?= $row_am['id_petition'] ?>" petid=<?= $row_am['id_petition'] ?> value='1' autocomplete="off" >
                                        <label class="btn btn-outline-primary" id="radio1text" for="radio1_<?= $row_am['id_petition'] ?>">อนุมัติ</label>

                                        <input type="radio" class="btn-check" name="approved" id="radio2_<?= $row_am['id_petition'] ?>" petid=<?= $row_am['id_petition'] ?> value='0' autocomplete="off">
                                        <label class="btn btn-outline-primary" id="radio2text" for="radio2_<?= $row_am['id_petition'] ?>">ไม่อนุมัติ</label>
                            </div>
                            </dd>
                        
                        <div><br></div>
                            <dt class="col-sm-4" id="dis3_<?= $row_am['id_petition'] ?>" style="display:none">แนบรูปใบรับรอง</dt>
                            <dd class="col-sm-8" id="dis4_<?= $row_am['id_petition'] ?>" style="display:none">
                                <input class="form-control" type="file" name='image' id="image" onchange="readURL(this);" accept="image/*">
                                <img id="display" src="#" alt="" class="img-fluid rounded shadow-sm mx-auto d-block"/>
                            </dd>
                            <dt class="col-sm-4"></dt>
                            <dd class="col-sm-8">
                                    <button type="submit" for="updatestatus" class="btn btn-primary text-sm-end">บันทึก</button>
                            </dd>
                        </dl>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
        
    </div>
</div>
