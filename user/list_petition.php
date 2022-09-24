<!DOCTYPE html>
<html lang="en">

<head>
    <?php 
    include('header.php');

    
    $query = "SELECT * FROM petition WHERE id_user = $user_id" or die("Error:" . mysqli_error($con));

    $result = mysqli_query($con, $query);
 

    ?>
    <meta charset="utf-8">
    <title>Admin</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="index.php" class="navbar-brand mx-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="../images/11478160-D297-4215-BCA7-84A3191EB15D.png" alt="" style="width: 40px; height: 40px;">
                    <strong class="text-primary">KRATOM</strong>
                    </div>
                    
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0"><?php echo $a_name; ?></h6>
                        <span>#User</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="index.php" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>HOME</a>
                    <div class="nav-item dropdown">
                    </div>
                    <a href="list_petition.php" class="nav-item nav-link active"><i class="fa fa-th me-2"></i>รายการคำขอ</a>
                    
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <?php 
            include('navber.php');   
            ?>
            <!-- Navbar End -->
            <div class="container-fluid pt-4 px-4">
            <div class="col-12">
                <div class="bg-light rounded h-100 p-4">
                    <h2 class="mb-4">รายการคำร้อง</h2>
                    
                    <br>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">วันที่ยื่นคำร้อง</th>
                                    <th scope="col">วันที่ดำเนินการเสร็จสิ้น</th>
                                    <th scope="col">สายพันธ์ุ</th>
                                    <th scope="col">สถานะ</th>
                                    <th scope="col">รายละเอียด</th>
                                </tr>
                            </thead>
                            <?php 
                                $num = 1;
                                if($result->num_rows == 0){
                            ?>
                                    <tr align="center">
                                    <td colspan="8">ไม่พบข้อมูล</td>
                                    </tr>   
                            <?php 
                                }else{

                                    ?> <tbody><?php
                                    while ($row_am =  mysqli_fetch_assoc($result)){ ?>
                            
                                <tr>
                                    <th scope="row"><?php echo $num; $num++; ?></th>
                                    <td><?php echo $row_am['petition_date']; ?></td>
                                    <td><?php echo $row_am['succes_date']; ?></td>
                                    <td><?php echo $row_am['species']; ?></td>
                                    <?php if($row_am['status'] == 1){ ?>
                                        <td class="text-warning"> รอการตรวจสอบ </td>
                                    <?php }elseif($row_am['status'] == 2){ ?>
                                        <td> กำลังดำเนินการ </td>
                                    <?php }elseif($row_am['status'] == 3){?>
                                        <td class="text-success"> เสร็จสิ้น <?php if ($row_am['approved'] == 1) {
                                            ?> (อนุมัติ)<?php
                                        }elseif ($row_am['approved'] == 0) {
                                            ?> (ไม่อนุมัติ) <?php
                                        } ?></td>
                                    <?php } ?>
                                    <td>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#detail<?php echo $row_am['id_petition'] ?>">
                                        รายละเอียด
                                        </button>
                                        
                                        <?php 
                                            if ($row_am['status'] == 3 && $row_am['approved'] == 1) {
                                                ?> 
                                                <a class="btn btn-success m-2" data-bs-toggle="modal" data-bs-target="#img<?php echo $row_am['id_petition'] ?>"> ดูใบรับรอง</a> 
                                                <?php
                                            }
                                        ?>
                                
                                    </td>
                                </tr> 
                                
                                <?php 
                                // modal
                                include('modal_detail.php');
                                include('modal_gap.php');
                                } ?>

                                


                            </tbody>
                            <?php }; ?>
                        </table>

                        

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        ...
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>

        </div>
        <!-- Content End -->

        
        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>
    
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
                            
    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>

