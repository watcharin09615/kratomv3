<!-- Modal -->
<div class="modal fade" id="addadmin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog ">
        <div class="modal-content"> 
            <form method="POST" id="register" action="add_admin.php">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">เพิ่มสมาชิกผู้ดูแล</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body modal-dialog-scrollable">
           
                <div class="row g-4">
                    <label for="first_name" class="col-sm-1 col-form-label">ชื่อ</label>
                    <div class="col-sm-4">
                        <input class="form-control" type="text" id="first_name" name="first_name" required>
                    </div>
                    <label for="last_name" class="col-sm-2 col-form-label">นามสกุล</label>
                    <div class="col-sm-4">
                        <input class="form-control" type="text" id="last_name" name="last_name" required>
                        
                    </div>
                </div> 
                <br>
                <div class="row mb-3">
                    <label for="username" class="col-sm-3 col-form-label">Username</label>
                    <div class="col-sm-6">
                        <input class="form-control" type="text" id="username" name="username" pattern="^[a-zA-Z0-9]+$" title="ภาษาอังกฤษหรือตัวเลขเท่านั้น" require>
                    </div>
                    
                </div>

                <div class="row g-4">
                    <label for="password" class="col-sm-4 col-form-label">Password</label>
                    <div class="col-sm-6">
                        <input class="form-control" type="password" id="password" name="password" pattern="^[a-zA-Z0-9]+$" title="ภาษาอังกฤษหรือตัวเลขเท่านั้น" require>
                    </div>
                </div> 
                <br>
                <div class="row g-4">
                    <label for="confirmpassword" class="col-sm-4 col-form-label">Confirm Password</label>
                    <div class="col-sm-6">
                        <input class="form-control" type="password" id="confirmpassword" name="confirmpassword" pattern="^[a-zA-Z0-9]+$" title="ภาษาอังกฤษหรือตัวเลขเท่านั้น" required>
                        
                    </div>
                </div>
                <br>
            
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">เพิ่ม</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </form>
        </div>
    </div>
</div>