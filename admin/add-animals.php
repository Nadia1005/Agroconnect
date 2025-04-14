<?php
session_start();
include('includes/dbconnection.php');
error_reporting(0);
if (strlen($_SESSION['zmsaid']==0)) {
  header('location:logout.php');
} else {
  if(isset($_POST['submit'])) {
    $fname=$_POST['aname'];  // Farm Type
    $productnum=$_POST['cnum'];  // Farming Product Number
    $seednum=$_POST['fnum'];  // Seed Number
    $desc=$_POST['desc'];     // Description
    $fimg=$_FILES["image"]["name"];

    $extension = substr($fimg,strlen($fimg)-4,strlen($fimg));
    $allowed_extensions = array(".jpg","jpeg",".png",".gif");

    if(!in_array($extension,$allowed_extensions)) {
      echo "<script>alert('Image has Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
    } else {
      $fimg=md5($fimg).time().$extension;
      move_uploaded_file($_FILES["image"]["tmp_name"],"images/".$fimg);

      $ret=mysqli_query($con,"SELECT FarmingProductNumber,SeedNumber FROM tblfarm WHERE FarmingProductNumber='$productnum' OR SeedNumber='$seednum'");
      $result=mysqli_fetch_array($ret);

      if($result > 0) {
        echo "<script>alert('This Farming Product Number or Seed Number is already allotted.');</script>";
      } else {
        $query=mysqli_query($con, "INSERT INTO tblfarm(FarmType,FarmingProductNumber,SeedNumber,Description,FarmImage) 
        VALUES('$fname','$productnum','$seednum','$desc','$fimg')");

        if ($query) {
          echo '<script>alert("Farm detail has been added.")</script>';
        } else {
          echo '<script>alert("Something Went Wrong. Please try again.")</script>';
        }
      }
    }
  }
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Add Farm Detail - Agroconnect Bangladesh</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- KEEPING ALL LINKS UNCHANGED AS REQUESTED -->
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/metisMenu.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/default-css.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
    <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
    <script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
</head>

<body>
    <div class="page-container">
        <?php include_once('includes/sidebar.php');?>
        <div class="main-content">
            <?php include_once('includes/header.php');?>
            <?php include_once('includes/pagetitle.php');?>
            <div class="main-content-inner">
                <div class="row">
                    <div class="col-lg-12 col-ml-12">
                        <div class="row">
                            <div class="col-12 mt-5">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Add Farm Detail</h4>
                                        <form method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Farm Type</label>
                                                <input type="text" class="form-control" id="aname" name="aname" placeholder="Enter Farm Type" required="true">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Farm Image</label>
                                                <input type="file" class="form-control" id="image" name="image" required="true">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Farming Product Number</label>
                                                <input type="text" class="form-control" id="cnum" name="cnum" placeholder="Enter Farming Product Number" required="true" maxlength="5">
                                            </div> 
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Seed Number</label>
                                                <input type="text" class="form-control" id="fnum" name="fnum" placeholder="Enter Seed Number" required="true" maxlength="6">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Description</label>
                                                <input type="text" class="form-control" id="desc" name="desc" placeholder="Enter Description of seed" required="true">
                                            </div>
                                            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4" name="submit">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include_once('includes/footer.php');?>
    </div>

    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>
</body>
</html>
<?php } ?>  
