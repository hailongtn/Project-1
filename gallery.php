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
    <title>Category - Calvin</title>
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
<section class="s-content">
    <div class="s-pageheader">
            <div class="row">
                <div class="column large-12">
                    <h1 class="page-title" style="margin: -10%">
                        <span class="page-title__small-type"></span>
                        Gallery Pages

                    </h1>
                 
                </div>
            </div>
        </div>
</section>
    <!-- content
    ================================================== -->

   
    <?php
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


    $query = mysqli_query($con, "select posts.id as pid,posts.post_title as post_title,posts.post_image,category.category_name as category,category.id as cid,subcategory.subcategory as subcategory,posts.post_details as postdetails,posts.posting_date as postingdate,posts.post_description as postdescription,posts.post_url as url from posts left join category on category.id=posts.category_id left join  subcategory on  subcategory.subcategory_id=posts.subcategory_id where posts.is_active=1 order by posts.id desc  LIMIT $offset, $no_of_records_per_page");
    while ($row = mysqli_fetch_array($query)) {
     ?>
     
    <div class="scrollblock">
        <div class="container-fluid pt-10">
            <div class="row justify-content-md-center ">
                <div class="col-md-10 col-sm-12">
                    <div class="card-columns">
                        <div class="card card-hover h-100">
                            <div class="card-body">
                                <a href="single-post.php?nid=<?php echo htmlentities($row['pid']) ?>">
                                    <img src="admin/postimages/<?php echo htmlentities($row['post_image']); ?>">
                                    <div class="reveal h-100 p-2 d-flex ">
                                        <div class="w-100 align-self-center">
                                            <p><?php echo htmlentities($row['post_title']); ?> </p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php }?>


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
<style>
   .card {
	border: 0;
	border-radius: 0;
    margin-top: 20%;
}

.card-img,
.card-img-top {
	border-top-left-radius: 0;
	border-top-right-radius: 0;
}

.card-body {
	padding: 0;
}

.card-columns .card {
	margin-bottom: 1.25rem;
}

@media (max-width: 991px) {
	.card-columns {
		column-count: 1;
	}
}

@media (min-width: 992px) {
	.card-columns {
		column-count: 2;
	}
}

@media (min-width: 1200px) {
	.card-columns {
		column-count: 3;
	}
}

.card-hover img {
	transition: filter .5s ease-in-out;
	-webkit-filter: grayscale(0%);
	/* Ch 23+, Saf 6.0+, BB 10.0+ */
	filter: grayscale(0%);
	/* FF 35+ */
}

.card-hover:hover img {
	-webkit-filter: grayscale(100%);
	/* Ch 23+, Saf 6.0+, BB 10.0+ */
	filter: grayscale(100%);
	/* FF 35+ */
}

.reveal p {
	line-height: 125%;
	font-size: 1.5rem;
	text-align: center;
}

.card-hover .reveal {
	visibility: hidden;
	opacity: 0;
	height: 0;
	padding: 0;
	position: absolute;
	top: 0;
	width: 100%;
	background-color: black;
	color: white;
}

.card-hover:hover .reveal {
	height: auto;
	visibility: visible;
	opacity: 0.5;
	transition: opacity 1s ease;
	position: absolute;
	top: 0;
	background-color: black;
	color: white;
}

@media (max-width: 767px) {
	.card-hover .reveal,
	.card-hover:hover .reveal {
		visibility: visible;
		opacity: 1;
		position: relative;
		width: 100%;
		background-color: #ebeae9;
		color: black;
	}
	.reveal p {
		line-height: 125%;
		font-size: 1.2rem;
		text-align: left;
		padding-top: 1rem;
	}
}
</style>