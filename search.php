<?php
session_start();
error_reporting(0);
include('includes/config.php');
?>

<!DOCTYPE html>
<html class="no-js" lang="en">

<head>

    <!--- basic page needs
    ================================================== -->
    <meta charset="utf-8">
    <title>The Bridge | Search Pages</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- mobile specific metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="css/vendor.css">
    <link rel="stylesheet" href="css/styles.css">

    <!-- script
    ================================================== -->
    <script src="js/modernizr.js"></script>
    <script defer src="js/fontawesome/all.min.js"></script>

    <!-- favicons
    ================================================== -->
    <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
    <link rel="manifest" href="site.webmanifest">

</head>

<body id="top">


    <!-- preloader
    ================================================== -->
    <div id="preloader">
        <div id="loader"></div>
    </div>


    <!-- header
    ================================================== -->
    <header class="s-header s-header--opaque">
        <?php include('includes/header.php'); ?>
    </header> <!-- end s-header -->


    <!-- content
    ================================================== -->
    <section class="s-content">

        <!-- page header
        ================================================== -->
        <div class="s-pageheader">
            <div class="row">
                <div class="column large-12">
                    <h1 class="page-title">
                        <span class="page-title__small-type"></span>
                        Search Pages
                    </h1>
                </div>
            </div>
        </div>

        <!-- end s-pageheader-->
        <!-- masonry
        ================================================== -->
        <div class="s-bricks">

            <div class="masonry">
                <div class="bricks-wrapper h-group">
                    <?php
                    if ($_POST['searchtitle'] != '') {
                        $st = $_SESSION['searchtitle'] = $_POST['searchtitle'];
                    }
                    $st;





                    if (isset($_GET['pageno'])) {
                        $pageno = $_GET['pageno'];
                    } else {
                        $pageno = 1;
                    }
                    $no_of_records_per_page = 8;
                    $offset = ($pageno - 1) * $no_of_records_per_page;


                    $total_pages_sql = "SELECT COUNT(*) FROM posts";
                    $result = mysqli_query($con, $total_pages_sql);
                    $total_rows = mysqli_fetch_array($result)[0];
                    $total_pages = ceil($total_rows / $no_of_records_per_page);


                    $query = mysqli_query($con, "select posts.id as pid,posts.post_title as post_title,category.category_name as category,subcategory.subcategory as subcategory,posts.post_details as postdetails,posts.posting_date as postingdate,posts.post_url as url,posts.post_description as postdescription,posts.post_image from posts left join category on category.id=posts.category_id left join  subcategory on  subcategory.subcategory_id=posts.subcategory_id where posts.post_title like '%$st%' and posts.is_active=1 LIMIT $offset, $no_of_records_per_page");

                    $rowcount = mysqli_num_rows($query);
                    if ($rowcount == 0) {
                        echo "No record found";
                    } else {
                        while ($row = mysqli_fetch_array($query)) {


                    ?>



                            <div class="grid-sizer"></div>

                            <article class="brick entry" data-aos="fade-up">

                                <div class="entry__thumb">
                                    <a href="single-post.php?nid=<?php echo htmlentities($row['pid']) ?>"><a class="thumb-link">
                                            <img src="admin/postimages/<?php echo htmlentities($row['post_image']); ?>">
                                        </a>
                                </div>

                                <div class="entry__text">
                                    <div class="entry__header">
                                        <h1 class="entry__title"><a href="single-post.php?nid=<?php echo htmlentities($row['pid']) ?>" class="card-title text-decoration-none text-dark"><?php echo htmlentities($row['post_title']); ?></a></h1>
                                        <div class="entry__meta">
                                            <span class="cat-links">
                                                <a class="badge bg-success text-decoration-none link-light" href="category.php?catid=<?php echo htmlentities($row['cid']) ?>" style="color:#00000"><?php echo htmlentities($row['category']); ?></a>
                                                <!--subcategory--->
                                                <a class="" style="color:#00000"><?php echo htmlentities($row['subcategory']); ?></a><br>
                                                <a class="m-0"><small> Posted on <?php echo htmlentities($row['postingdate']);?></small></a>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="entry__excerpt">
                                    <p
                                        class="badge bg-success text-decoration-none link-light" href="category.php?catid=<?php echo htmlentities($row['cid']) ?>" style="color:#00000"><?php echo htmlentities($row['postdescription']); ?>                                        
                                    </p>
                                    </div>
                                </div> <!-- end entry__text -->


                            </article> <!-- end article -->
                    <?php }} ?>
                    



                </div> <!-- end brick-wrapper -->

            </div> <!-- end masonry -->


        </div> <!-- end s-bricks -->

    </section> <!-- end s-content -->


    <!-- footer
    ================================================== -->
    <?php include('includes/footer.php'); ?>


    <!-- Java Script
    ================================================== -->
    <script src="js/jquery-3.5.0.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>

</body>

</html>