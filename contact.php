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
    <title>Contact - Calvin</title>
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
      <?php include('includes/header.php');?>
    </header> <!-- end s-header -->


    <!-- content
    ================================================== -->
    <section class="s-content">

        <div class="row">
            <div class="column large-12">

                <article class="s-content__entry">

                   

                    <div class="s-content__entry-header">
                        <h1 class="s-content__title">Contact us.</h1>
                    </div> <!-- end s-content__entry-header -->

                    <div class="s-content__primary">

                        <div class="s-content__page-content">

                            <p class="lead">
                            
                            </p> 

                            <p>
                           
                            </p>

                            <br>

                            <div class="row block-large-1-2 block-tab-full s-content__blocks">
                                <div class="column">
                                    <h4>Where to Find Us</h4>
                                    <p>
                                    Số 8, Tôn Thất Tuyết, Mỹ Đình, Từ Liêm, Hà Nội<br>
                                    <br>
                                    
                                    </p>
                                </div>

                                <div class="column">
                                    <h4>Contact Info</h4>
                                    <p>
                                    hailong0309.tn@gmail.com<br>
                                    Phone:0399869812 <br>
                                    
                                    </p> 
                                </div>
                            </div> <!-- end s-content__blocks -->

                            <form name="cForm" id="cForm" class="s-content__form" method="post" action="">
                                <div class="s-content__entry-header">
                                    <h1 class="s-content__title">Your Request.</h1>
                                </div> <!-- end s-content__entry-header -->
                                <fieldset>

                                    <div class="form-field">
                                        <input name="cName" type="text" id="cName" class="h-full-width h-remove-bottom" placeholder="Your Name" value="">
                                    </div>

                                    <div class="form-field">
                                        <input name="cEmail" type="text" id="cEmail" class="h-full-width h-remove-bottom" placeholder="Your Email" value="">
                                    </div>

                                    <div class="form-field">
                                        <input name="cWebsite" type="text" id="cWebsite" class="h-full-width h-remove-bottom" placeholder="Website"  value="">
                                    </div>

                                    <div class="message form-field">
                                        <textarea name="cMessage" id="cMessage" class="h-full-width" placeholder="Your Message" ></textarea>
                                    </div>

                                    <br>
                                    <button type="submit" class="submit btn btn--primary h-full-width">Submit</button>

                                </fieldset>
                            </form> <!-- end form -->

                        </div> <!-- end s-entry__page-content -->

                    </div> <!-- end s-content__primary -->
                </article> <!-- end entry -->

            </div> <!-- end column -->
        </div> <!-- end row -->

    </section> <!-- end s-content -->


    <!-- footer
    ================================================== -->
    <?php include('includes/footer.php');?>


    <!-- Java Script
    ================================================== -->
    <script src="js/jquery-3.5.0.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>

</body>

</html>