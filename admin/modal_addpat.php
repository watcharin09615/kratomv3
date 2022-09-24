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
            <form action="#">
                <div class="row mb-3">
                    <label for="user" class="col-sm-2 col-form-label">ผู้ใช้</label>
                    <div class="col-sm-10">
                    <select class="form-select" id="user" aria-label="Floating label select example">
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
                    <label for="inputPassword3" class="col-sm-2 col-form-label">สายพันธ์ุ</label>
                    <div class="col-sm-4">
                        <input class="form-control" type="text" id="inputPassword3">
                    </div>
                    <label for="inputPassword3" class="col-sm-2 col-form-label">จำนวน</label>
                    <div class="col-sm-2">
                        <input class="form-control" type="number" id="inputPassword3">
                        
                    </div>
                    <label for="inputPassword3" class="col-sm-2 col-form-label">ต้น</label>
                </div>
                <fieldset class="row mb-3">
                    <legend class="col-form-label col-sm-2 pt-0">Radios</legend>
                    <div class="col-sm-10">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked="">
                            <label class="form-check-label" for="gridRadios1">
                                First radio
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
                            <label class="form-check-label" for="gridRadios2">
                                Second radio
                            </label>
                        </div>
                    </div>
                </fieldset>
                <div class="row mb-3">
                    <legend class="col-form-label col-sm-2 pt-0">Checkbox</legend>
                    <div class="col-sm-10">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="gridCheck1">
                            <label class="form-check-label" for="gridCheck1">
                                Check me out
                            </label>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Sign in</button>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>