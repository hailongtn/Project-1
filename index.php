<?php
session_start();
include('includes/config.php');
?>
<!DOCTYPE html>
<html class="no-js" lang="en">

<head>

    <!--- basic page needs
    ================================================== -->
    <meta charset="utf-8">
    <title>The Bridge</title>
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
    <?php include('includes/header.php'); ?>


    <!-- hero
    ================================================== -->
    <section id="hero" class="s-hero">

        <div class="s-hero__slider">

            <div class="s-hero__slide">

                <div class="s-hero__slide-bg" style="background-image: url('images/slide1-bg-3000.jpg');"></div>

                <div class="row s-hero__slide-content animate-this">
                    <div class="column">
                        <div class="s-hero__slide-meta">
                            </span>
                        </div>
                        <h1 class="s-hero__slide-text">
                            <a href="#0">
                                The Bridge Connecting Communities.
                            </a>
                        </h1>
                    </div>
                </div>

            </div> 

            <div class="s-hero__slide">

                <div class="s-hero__slide-bg    " style="background-image: url('images/slide2-bg-3000.jpg');"></div>

                <div class="row s-hero__slide-content animate-this">
                    <div class="column">
                        <div class="s-hero__slide-meta">
                            <span class="cat-links">
                                <a href="#0">Work</a>
                            </span>
                            <span class="byline">
                                Posted by
                                <span class="author">
                                    <a href="#0">Juan Dela Cruz</a>
                                </span>
                            </span>
                        </div>
                        <h1 class="s-hero__slide-text">
                            <a href="#0">
                                Minimalism: The Art of Keeping It Simple.
                            </a>
                        </h1>
                    </div>
                </div>

            </div> <!-- end s-hero__slide -->

            <div class="s-hero__slide"">

                <div class=" s-hero__slide-bg" style="background-image: url('images/slide3-bg-3000.jpg');"></div>

            <div class="row s-hero__slide-content animate-this">
                <div class="column">
                    <div class="s-hero__slide-meta">
                        <span class="cat-links">
                            <a href="#0">Health</a>
                            <a href="#0">Lifestyle</a>
                        </span>
                        <span class="byline">
                            Posted by
                            <span class="author">
                                <a href="#0">Jane Doe</a>
                            </span>
                        </span>
                    </div>
                    <h1 class="s-hero__slide-text">
                        <a href="#0">
                            10 Reasons Why Being in Nature Is Good For You.
                        </a>
                    </h1>
                </div>
            </div>

        </div> <!-- end s-hero__slide -->

        </div> <!-- end s-hero__slider -->

        <div class="s-hero__social hide-on-mobile-small">
            <p>Follow</p>
            <span></span>
            <ul class="s-hero__social-icons">
                <li><a href="#0"><i class="fab fa-facebook-f" aria-hidden="true"></i></a></li>
                <li><a href="#0"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                <li><a href="#0"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
                <li><a href="#0"><i class="fab fa-dribbble" aria-hidden="true"></i></a></li>
            </ul>
        </div> <!-- end s-hero__social -->

        <div class="nav-arrows s-hero__nav-arrows">
            <button class="s-hero__arrow-prev">
                <svg viewBox="0 0 15 15" xmlns="http://www.w3.org/2000/svg" width="15" height="15">
                    <path d="M1.5 7.5l4-4m-4 4l4 4m-4-4H14" stroke="currentColor"></path>
                </svg>
            </button>
            <button class="s-hero__arrow-next">
                <svg viewBox="0 0 15 15" xmlns="http://www.w3.org/2000/svg" width="15" height="15">
                    <path d="M13.5 7.5l-4-4m4 4l-4 4m4-4H1" stroke="currentColor"></path>
                </svg>
            </button>
        </div> <!-- end s-hero__arrows -->

    </section> <!-- end s-hero -->


    <!-- content
    ================================================== -->
    <section class="s-content s-content--no-top-padding">



        <!-- masonry
        ================================================== -->
        <div class="s-bricks">
            <div class="cntain">
                <div class="topicheader">
                    <h2 class=list-categories-title>
                        <span>TOPICS </span>
                    </h2>
                </div>
                <div class="topics">
                    <?php $query = mysqli_query($con, "select id,category_name from category");
                    while ($row = mysqli_fetch_array($query)) {
                    ?>
                        <a href="category.php?catid=<?php echo htmlentities($row['id']) ?>" class="topic"><?php echo htmlentities($row['category_name']); ?></a>
                    <?php } ?>

                </div>
                
            </div>



            <div class="s-bricks">

                <div class="masonry">
                    <div class="bricks-wrapper h-group">

                        <div class="grid-sizer"></div>

                        <div class="lines">
                            <span> </span>
                            <span></span>
                            <span></span>
                        </div>




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

                        

                            <article class="brick entry" data-aos="fade-up">

                                <div class="entry__thumb">
                                    <a href="single-post.php?nid=<?php echo htmlentities($row['pid']) ?>" class="thumb-link">
                                            <img src="admin/postimages/<?php echo htmlentities($row['post_image']); ?>">
                                        </a>
                                </div>

                                <div class="entry__text">
                                    <div class="entry__header">
                                        <h1 class="entry__title"><a href="single-post.php?nid=<?php echo htmlentities($row['pid']) ?>" class="card-title text-decoration-none text-dark"><?php echo htmlentities($row['post_title']); ?></a></h1>
                                        <div class="entry__meta">
                                            <span class="cat-links">
                                                <!--Category-->
                                                <a class="badge bg-success text-decoration-none link-light" href="category.php?catid=<?php echo htmlentities($row['cid']) ?>" style="color:#00000"><?php echo htmlentities($row['category']); ?></a>
                                                <!--Subcategory--->
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
                        <?php } ?>
                        div class="col-md-12"><a href="tel:+8801608445456">


                            <!-- Pagination -->
                            <!-- <ul class="pagination justify-content-center mb-4">
                        <li class="page-item"><a href="?pageno=1"  class="page-link border-0">First</a></li>
                        <li class="<?php if ($pageno <= 1) {
                                        echo 'disabled';
                                    } ?> page-item">
                           <a href="<?php if ($pageno <= 1) {
                                        echo '#';
                                    } else {
                                        echo "?pageno=" . ($pageno - 1);
                                    } ?>" class="page-link border-0">Prev</a>
                        </li>
                        <li class="<?php if ($pageno >= $total_pages) {
                                        echo 'disabled';
                                    } ?> page-item">
                           <a href="<?php if ($pageno >= $total_pages) {
                                        echo '#';
                                    } else {
                                        echo "?pageno=" . ($pageno + 1);
                                    } ?> " class="page-link border-0">Next</a>
                        </li>
                        <li class="page-item"><a href="?pageno=<?php echo $total_pages; ?>" class="page-link border-0">Last</a></li>
                        </ul> -->
                    </div>






                </div> <!-- end brick-wrapper -->

            </div> <!-- end masonry -->



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