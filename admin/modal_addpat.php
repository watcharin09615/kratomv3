<!-- Modal -->
<div class="modal fade" id="addpet" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

<?php  
    $query3 = "SELECT * FROM user WHERE user_status = 1 and user_type = 1 ORDER BY id_user asc" or die("Error:" . mysqli_error($con));
    $result3 = mysqli_query($con, $query3);
?>
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">เพิ่มคำร้อง</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body modal-dialog-scrollable">
            <form method="POST" id="register" action="add_pet_db.php">
                <div class="row mb-3">
                    <label for="id_user" class="col-sm-2 col-form-label">ผู้ใช้</label>
                    <div class="col-sm-10">
                    <select class="form-select" name="id_user" id="id_user" aria-label="Floating label select example" require>
                        <option selected="">--โปรดเลือก--</option>
                        <?php foreach($result3 as $results){?>
                            <option value="<?php echo $results["id_user"];?>">
                                <?php echo $results["id_user"]." ".$results["name"]." ".$results["lastname"];?>
                            </option>
                        <?php }?>
                    </select>
                        

                    </div>
                    
                </div>
                <div class="row g-4">
                    <label for="species" class="col-sm-2 col-form-label">สายพันธ์ุ</label>
                    <div class="col-sm-4">
                        <input class="form-control" type="text" id="species" name="species">
                    </div>
                    <label for="qty" class="col-sm-2 col-form-label">จำนวน</label>
                    <div class="col-sm-2">
                        <input class="form-control" type="number" id="qty" name="qty" min="1" required>
                        
                    </div>
                    <label for="qty" class="col-sm-2 col-form-label">ต้น</label>
                </div> 
                <br>
                <label class="col-sm-2 col-form-label">ที่อยู่ฟาร์ม</label>
                <div class="row mb-3">
                    <label for="address" class="col-sm-2 col-form-label">ที่อยู่</label>
                    <div class="col-sm-4">
                        <input class="form-control" type="text" id="address" name="address">
                    </div>
                    <?php
                        $sql_provinces = "SELECT * FROM provinces";
                        $pro = mysqli_query($con, $sql_provinces);
                    ?>

                    <label for="address" class="col-sm-1 col-form-label">จังหวัด</label>
                    <div class="col-sm-4">
                    <select class="form-select" name="provinces" id="provinces" aria-label="Floating label select example" require>
                        <option value="" selected disabled>-กรุณาเลือกจังหวัด-</option>
                            <?php foreach ($pro as $value) { ?>
                                <option value="<?=$value['id']?>"><?=$value['name_pr']?></option>
                            <?php } ?>
                    </select>
                    </div>
                    
                </div>
                <div class="row mb-3">
                    <legend class="col-form-label col-sm-2 pt-0"></legend>
                        <label for="amphures" class="col-sm-1 col-form-label">อำเภอ</label>
                        <div class="col-sm-3">
                            <select class="form-select" name="amphures" id="amphures" aria-label="Floating label select example" require>
                            </select>
                        </div>
                        <label for="districts" class="col-sm-1 col-form-label">ตำบล</label>
                        <div class="col-sm-3">
                            <select class="form-select" name="districts" id="districts" aria-label="Floating label select example" require>
                            </select>
                        </div>
                </div>
                <div class="row mb-3">
                    <legend class="col-form-label col-sm-2 pt-0"></legend>
                        <label for="zip_code" class="col-sm-2 col-form-label">รหัสไปรษณีย์</label>
                        <div class="col-sm-2">
                            <input class="form-control" type="text" id="zip_code" name="zip_code" require>
                        </div>
                </div>
                <div class="row mb-3">
                    <legend class="col-form-label col-sm-2 pt-0">เบอร์โทร</legend>
                        <div class="col-sm-4">
                            <input class="form-control" type="tel" id="tel" name="tel" maxlength="10" require>
                        </div>
                </div>
                
                <button type="submit" class="btn btn-primary">ยืนยัน</button>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>