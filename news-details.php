<?php 
session_start();
include('includes/config.php');
//Genrating CSRF Token
if (empty($_SESSION['token'])) {
 $_SESSION['token'] = bin2hex(random_bytes(32));
}

if(isset($_POST['submit']))
{
  //Verifying CSRF Token
if (!empty($_POST['csrftoken'])) {
    if (hash_equals($_SESSION['token'], $_POST['csrftoken'])) {
$name=$_POST['name'];
$email=$_POST['email'];
$comment=$_POST['comment'];
$postid=intval($_GET['nid']);
$st1='0';
$query=mysqli_query($con,"insert into tblcomments(postId,name,email,comment,status) values('$postid','$name','$email','$comment','$st1')");
if($query):
  echo "<script>alert('comment successfully submit. Comment will be display after admin review ');</script>";
  unset($_SESSION['token']);
else :
 echo "<script>alert('Something went wrong. Please try again.');</script>";  

endif;

}
}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>FAISAL ADITYA | NEWS</title>

    <!-- Favicon -->
    <link rel="icon" href="vendor/newsbox/img/core-img/favicon.ico">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="vendor/newsbox/style.css">

</head>

<body>
    <!-- Preloader -->
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="lds-ellipsis">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>

    <!-- ##### Header Area Start ##### -->
    <header class="header-area">
        <!-- Navbar Area -->
        <div class="newsbox-main-menu">
            <div class="classy-nav-container breakpoint-off">
                <div class="container-fluid">
                    <!-- Menu -->
                    <nav class="classy-navbar justify-content-between" id="newsboxNav">

                        <!-- Nav brand -->
                        <a href="index.html" class="nav-brand"><img src="img/core-img/logo.png" alt=""></a>

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu">

                            <!-- Close Button -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            <!-- Nav Start -->
                            <div class="classynav">
                                <ul>
                                    <li><a href="index.php">NEWS</a></li>
                                    <li><a href="admin/dashboard.php">SING IN</a></li>
                                </ul>

                                <!-- Header Add Area -->
                                <div class="header-add-area">
                                    <a href="#">
                                       <img src="vendor/newsbox/img/bg-img/add.png" alt="">
                                    </a>
                                </div>
                            </div>
                            <!-- Nav End -->

                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ##### Header Area End ##### -->

    <!-- ##### Breaking News Area Start ##### -->
    <section class="breaking-news-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- Breaking News Widget -->
                    <div class="breaking-news-ticker d-flex flex-wrap align-items-center">
                        <div class="title">
                            <h6>FAISAL ADITYA</h6>
                        </div>
                        <div id="breakingNewsTicker" class="ticker">
                            <ul>
                                <li><a href="#">Welcome to FAISAL | ARTIKEL.</a></li>
                                <li><a href="#">Web yang memuat berita, serta artikel terkini</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Breaking News Area End ##### -->
    <!-- ##### Hero Area Start ##### -->
    <div class="hero-area">
        <!-- Hero Post Slides -->
        <div class="hero-post-slides owl-carousel">

            <!-- Single Slide -->
            <div class="single-slide">
                <div class="container-fluid">
                    <div class="row">
                        <!-- Single Blog Post Area -->
                        <div class="col-12 col-md-6">
                            <div class="single-blog-post style-1" data-animation="fadeInUpBig" data-delay="100ms" data-duration="1000ms">
                                <!-- Blog Thumbnail -->
                              <!--   <div class="blog-thumbnail bg-overlay">
                                    <a href="#"><img src="vendor/newsbox/img/bg-img/1.jpg" alt=""></a>
                                </div> -->

                                <!-- Blog Content -->
                            
                            <!-- Single Blog Post Area -->
                        </div>
                    </div>
                </div>
            </div>

            <!-- Single Slide -->

        </div>
    </div>
    <!-- ##### Hero Area End ##### -->


    <!-- ##### Intro News Area Start ##### -->
    <section class="intro-news-area section-padding-100-0 mb-70">
        <div class="container">
            <div class="row justify-content-left">
                <!-- Intro News Tabs Area -->
                <div class="col-12 col-lg-8">
                    <div class="intro-news-tab">

                        <!-- Intro News Filter -->
                     <!-- <div class="container"> -->


     
      <!-- <div class="row" style="margin-top: 4%">
 -->
        <!-- Blog Entries Column -->
        <!-- <div class="col-md-8"> -->

          <!-- Blog Post -->
<?php
$pid=intval($_GET['nid']);
 $query=mysqli_query($con,"select tblposts.PostTitle as posttitle,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.id='$pid'");
while ($row=mysqli_fetch_array($query)) {
?>

          <div class="card mb-4">
      
            <div class="card-body">
              <h2 class="card-title"><?php echo htmlentities($row['posttitle']);?></h2>
              <p><b>Category : </b> <a href="category.php?catid=<?php echo htmlentities($row['cid'])?>"><?php echo htmlentities($row['category']);?></a> |
                <b>Sub Category : </b><?php echo htmlentities($row['subcategory']);?> <b> Posted on </b><?php echo htmlentities($row['postingdate']);?></p>
                <hr />

 <img class="img-fluid rounded" src="admin/postimages/<?php echo htmlentities($row['PostImage']);?>" alt="<?php echo htmlentities($row['posttitle']);?>">
  
              <p class="card-text"><?php 
$pt=$row['postdetails'];
              echo  (substr($pt,0));?></p>
             
            </div>
            <div class="card-footer text-muted">
             
           
            </div>
          </div>
<?php } ?>
       
       

      

          <!-- Pagination -->


    <ul class="pagination justify-content-center mb-4">
        <li class="page-item"><a href="?pageno=1"  class="page-link">First</a></li>
        <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?> page-item">
            <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>" class="page-link">Prev</a>
        </li>
        <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?> page-item">
            <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?> " class="page-link">Next</a>
        </li>
        <li class="page-item"><a href="?pageno=<?php echo $total_pages; ?>" class="page-link">Last</a></li>
    </ul>

        </div>

    </section>
    <!-- ##### Intro News Area End ##### -->

    <!-- ##### Video Area Start ##### -->
  
        </div>
    </div>
    <!-- ##### Top News Area End ##### -->

    <!-- ##### Add Area Start ##### -->
    <!-- ##### Add Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
    <footer class="footer-area">
        <!-- Footer Content -->
                <div class="col-12">
                    <div class="footer-content text-center">
                        <!-- Footer Nav -->
                        <div class="footer-nav">
                           
                        </div>
                        <p class="copywrite-text"><a href="#">
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> Muchammad Faisal Aditya 
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ##### Footer Area Start ##### -->

    <!-- ##### All Javascript Script ##### -->
    <!-- jQuery-2.2.4 js -->
    <script src="vendor/newsbox/js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="vendor/newsbox/js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="vendor/newsbox/js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="vendor/newsbox/js/plugins/plugins.js"></script>
    <!-- Active js -->
    <script src="vendor/newsbox/js/active.js"></script>
</body>

</html>