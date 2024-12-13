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
    <title>About - The Bridge</title>
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

        <div class="row">
            <div class="column large-12">

                <article class="s-content__entry">



                    <div class="s-content__entry-header">
                        <h1 class="s-content__title"> Blog About Bridge around the world .</h1>
                    </div> <!-- end s-content__entry-header -->

                    <div class="s-content__primary">

                        <div class="s-content__page-content">

                            <p class="lead">
                                Hello and welcome to the Incredible Bridge Blog. This website will tell you more about bridges around the world,
                                allowing you to expand your knowledge about bridges
                            </p>

                            <p>

                            </p>

                            <p>

                            </p>

                            <br>


                            <div class="container additional">
                                <div class="row">
                                    <div class="col-xl-4">
                                        <img src="img/photo-12.jpg" class="img-fluid" alt="Image">
                                    </div>
                                    <div class="col-xl-4">
                                        <img src="img/photo-13.jpg" class="img-fluid" alt="Image">
                                    </div>
                                    <div class="col-xl-4">
                                        <img src="img/photo-14.jpg" class="img-fluid" alt="Image">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div> <!-- end s-entry__page-content -->

            </div> <!-- end s-content__primary -->
            </article> <!-- end entry -->

        </div> <!-- end column -->
        </div> <!-- end row -->

    </section> <!-- end s-content -->


    <!-- footer
    ================================================== -->
    <?php include("includes/footer.php"); ?>


    <!-- Java Script
    ================================================== -->
    <script src="js/jquery-3.5.0.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>

</body>

</html>
<style>
    .additional img {
	margin-right: 0;
	margin-left: 0;
	padding-right: 0;
	padding-left: 0;
}

.additional .col-xl-4 {
	padding-right: 0px;
	padding-left: 0px;
	max-width: 100%;
	margin-right: 0;
	margin-left: 0;
}

.container.additional {
	min-width: 100%;
}
</style>