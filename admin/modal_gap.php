<!-- Modal -->
<div class="modal fade" id="img<?php echo $row_am['id_petition'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

<?php  
    $id = $row_am['id_petition'];
    $gap = "SELECT * FROM petition,user,img WHERE petition.id_petition = $id AND petition.id_user = user.id_user AND img.petition_id = $id " or die("Error:" . mysqli_error($con));
    $result2 = mysqli_query($con, $gap);
    $modal_gap = mysqli_fetch_assoc($result2);
?>
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ใบรับรอง</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body modal-dialog-scrollable">
                <img src="../images/petition/<?php echo $modal_gap['img'] ?>" class="img-fluid" alt="...">
            </div>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>