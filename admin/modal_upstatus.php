<!-- Modal -->
<div class="modal fade" id="status<?php echo $row_am['id_petition'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

<?php  
    $id = $row_am['id_petition'];
    $modal = "SELECT * FROM petition,user,provinces,amphures,districts WHERE MD5(petition.id_petition) = MD5($id) AND petition.sub_area = districts.id AND petition.area = amphures.id AND petition.province = provinces.id AND petition.id_user = user.id_user" or die("Error:" . mysqli_error($con));

    $result1 = mysqli_query($con, $modal);
    $row_modal = mysqli_fetch_assoc($result1);
?>
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">คำร้องที่ <?php echo md5($row_modal['id_petition']); ?></h5>
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

                    <dt class="col-sm-4 text-truncate">สถานะปัจจุบัน</dt>
                    <dd class="col-sm-8"><?php if($row_am['status'] == 1){ ?>
                                        รอการตรวจสอบ
                                    <?php }elseif($row_am['status'] == 2){ ?>
                                        กำลังดำเนินการ
                                    <?php }elseif($row_am['status'] == 3){?>
                                        เสร็จสิ้น
                                    <?php } ?></dd>
                    <dt class="col-sm-4">เปลี่ยนสถานะ</dt>
                    <dd class="col-sm-8">
                    <div class="btn-group" role="group">
                                <input type="radio" class="btn-check" onclick="status('1')" name="status" id="btnradio1" value='1' autocomplete="off" checked>
                                <label class="btn btn-outline-primary" for="btnradio1">รอการตรวจสอบ</label>

                                <input type="radio" class="btn-check" onclick="status('2')" name="status" id="btnradio2" value='2' autocomplete="off" <?php if ($row_modal['status'] == 2) echo "checked"; ?>>
                                <label class="btn btn-outline-primary" for="btnradio2">กำลังดำเนินการ</label>

                                <input type="radio" class="btn-check" onclick="status('3')" name="status" id="btnradio3" value='3' autocomplete="off" <?php if ($row_modal['status'] == 3) echo "checked"; ?>>
                                <label class="btn btn-outline-primary" for="btnradio3">เสร็จสิ้น</label>
                    </div>
                    </dd>
                    <div><br></div>
                        <dt class="col-sm-4" id="dis1">ผลการอนุมัติ</dt>
                        <dd class="col-sm-8" id="dis2">
                        <div class="btn-group" role="group" >
                                    <input type="radio" class="btn-check" onclick="approved('1')"  name="approved" id="radio1" value='1' autocomplete="off" >
                                    <label class="btn btn-outline-primary" for="radio1">อนุมัติ</label>

                                    <input type="radio" class="btn-check" onclick="approved('0')" name="approved" id="radio2" value='0' autocomplete="off">
                                    <label class="btn btn-outline-primary" for="radio2">ไม่อนุมัติ</label>
                        </div>
                        </dd>
                    
                    <div><br></div>
                        <dt class="col-sm-4" id="dis3">แนบรูปใบรับรอง</dt>
                        <dd class="col-sm-8" id="dis4">
                            <input class="form-control" type="file" id="formFile" onchange="readURL(this);" accept="image/*">
                            <img id="display" src="#" alt="" class="img-fluid rounded shadow-sm mx-auto d-block"/>
                        </dd>
                        <dt class="col-sm-4"></dt>
                        <dd class="col-sm-8">
                                <button type="submit" class="btn btn-primary text-sm-end">บันทึก</button>
                            
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
<script>
function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      $('#display').attr('src', e.target.result).width(800);
    };

    reader.readAsDataURL(input.files[0]);
  }
}



function status(pvar) {
	 if(pvar==3){
        document.getElementById("dis1").style.display = '';
		document.getElementById("dis2").style.display = '';
	 }else{
        document.getElementById("dis1").style.display = 'none';
	 document.getElementById("dis2").style.display = 'none';
	 }
	 
}
function approved(pvar) {
	 if(pvar==1){
        document.getElementById("dis3").style.display = '';
		document.getElementById("dis4").style.display = '';
	 }else{
        document.getElementById("dis3").style.display = 'none';
	 document.getElementById("dis4").style.display = 'none';
	 }
	 
}
</script>