<?php
session_start();
include('includes/config.php');
//Genrating CSRF Token
if (empty($_SESSION['token'])) {
    $_SESSION['token'] = bin2hex(random_bytes(32));
}

if (isset($_POST['submit'])) {
    //Verifying CSRF Token
    if (!empty($_POST['csrftoken'])) {
        if (hash_equals($_SESSION['token'], $_POST['csrftoken'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $comment = $_POST['comment'];
            $postid = intval($_GET['nid']);
            $st1 = '0';
            $query = mysqli_query($con, "insert into comments(post_id,name,email,comment,status) values('$postid','$name','$email','$comment','$st1')");
            if ($query):
                echo "<script>alert('comment successfully submit. Comment will be display after admin review ');</script>";
                unset($_SESSION['token']);
            else :
                echo "<script>alert('Something went wrong. Please try again.');</script>";

            endif;
        }
    }
}
$postid = intval($_GET['nid']);

$sql = "SELECT view_counter FROM posts WHERE id = '$postid'";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $visits = $row["view_counter"];
        $sql = "UPDATE posts SET view_counter = $visits+1 WHERE id ='$postid'";
        $con->query($sql);
    }
} else {
    echo "no results";
}


?>

<!DOCTYPE html>
<html class="no-js" lang="en">

<head>

    <!--- basic page needs
    ================================================== -->
    <meta charset="utf-8">
    <title>Standard Post - Calvin</title>
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

        <div class="row">
            <div class="column large-12">
                <?php
                $pid = intval($_GET['nid']);
                $currenturl = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];;
                $query = mysqli_query($con, "select posts.post_title as post_title,posts.post_image,category.category_name as category,category.id as cid,subcategory.subcategory as subcategory,posts.post_details as postdetails,posts.posting_date as posting_date,posts.post_url as url,posts.posted_by,posts.last_updatedby,posts.updation_date from posts left join category on category.id=posts.category_id left join  subcategory on  subcategory.subcategory_id=posts.subcategory_id where posts.id='$pid'");
                while ($row = mysqli_fetch_array($query)) {
                ?>
                    <article class="s-content__entry format-standard">

                        <div class="s-content__media">
                            <div class="s-content__post-thumb">
                                <img src="admin/postimages/<?php echo htmlentities($row['post_image']); ?>">

                            </div>
                        </div> <!-- end s-content__media -->

                        <div class="s-content__entry-header">
                            <h1 class="s-content__title s-content__title--post"><?php echo htmlentities($row['post_title']); ?>
                                .</h1>
                        </div> <!-- end s-content__entry-header -->

                        <div class="s-content__primary">

                            <div class="s-content__entry-content">

                                <p class="lead">
                                    <?php
                                    $pt = $row['postdetails'];
                                    echo (substr($pt, 0)); ?></p>




                            </div> <!-- end s-entry__entry-content -->


                            <div class="s-content__entry-meta">


                                <div class="entry-author meta-blk">
                                    <div class="author-avatar">
                                        <img class="avatar" src="admin/postimages/<?php echo htmlentities($row['post_image']); ?>">
                                    </div>

                                </div>

                                <div class="meta-bottom">

                                    <div class="entry-cat-links meta-blk">
                                        <div class="cat-links">
                                            <span>by</span>
                                            <?php echo htmlentities($row['posted_by']); ?>
                                        </div>

                                        <span>On</span>
                                        <?php echo htmlentities($row['posting_date']); ?>
                                    </div>

                                    <div class="entry-tags meta-blk">
                                        <span class="tagtext">Tags</span>
                                        <a class="badge bg-success text-decoration-none link-light" href="category.php?catid=<?php echo htmlentities($row['cid']) ?>" style="color:#00000"><?php echo htmlentities($row['category']); ?> , </a>
                                        <!--Subcategory--->
                                        <a class="badge bg-warning text-decoration-none link-light" style="color:#00000"><?php echo htmlentities($row['subcategory']); ?></a>
                                    </div>
                                    <br>
                                    <!-- So luong truy cap post -->
                                    <div class="entry-tags meta-blk">
                                        <span class="tagtext">Visit : <?php print $visits; ?></span>
                                    </div>
                                   
                                </div>
                            </div> <!-- s-content__entry-meta -->

                            <div class="s-content__pagenav">
                                <div class="prev-nav">
                                    <a href="#" rel="prev">
                                        <span>Previous</span>
                                        Tips on Minimalist Design
                                    </a>
                                </div>
                                <div class="next-nav">
                                    <a href="#" rel="next">
                                        <span>Next</span>
                                        A Practical Guide to a Minimalist Lifestyle.
                                    </a>
                                </div>
                            </div> <!-- end s-content__pagenav -->

                        </div> <!-- end s-content__primary -->

                    </article> <!-- end entry -->
                <?php } ?>
            </div> <!-- end column -->
        </div> <!-- end row -->


        <!-- comments
        ================================================== -->
        <div class="comments-wrap">

            <div class="row comment-respond">

            <?php 
                  $sts=1;
                  $query=mysqli_query($con,"select name,comment,posting_date from  comments where post_id='$pid' and status='$sts'");
                  while ($row=mysqli_fetch_array($query)) {
                  ?>
                  <div class="media mb-4">
                <img class="d-flex mr-3 rounded-circle" src="images/usericon.png" alt="">
                <div class="media-body">
                    <h5 class="mt-0"><?php echo htmlentities($row['name']);?> <br />
                        <span style="font-size:11px;"><b>at</b> <?php echo htmlentities($row['posting_date']);?></span>
                    </h5>
                    <?php echo htmlentities($row['comment']);?>
                </div>
            </div>
            <?php } ?>


                <!-- START respond -->
                <div id="respond" class="column">

                    <h3>
                        Add Comment
                        <span>Your email address will not be published.</span>
                    </h3>

                    <form name="contactForm" id="contactForm" method="post" action="" autocomplete="off">
                        <fieldset>
                        <input type="hidden" name="csrftoken" value="<?php echo htmlentities($_SESSION['token']); ?>" />

                            <div class="form-field">
                                <input name="name" class="h-full-width h-remove-bottom" placeholder="Your Name" value="" type="text">
                            </div>

                            <div class="form-field">
                                <input name="email"  class="h-full-width h-remove-bottom" placeholder="Your Email" value="" type="text">
                            </div>

                            <div class="message form-field">
                                <textarea name="comment" class="h-full-width" placeholder="Your Comment"></textarea>
                            </div>

                            <br>
                            <input name="submit" class="btn btn--primary btn-wide btn--large h-full-width" value="Add Comment" type="submit">

                        </fieldset>
                    </form> <!-- end form -->

                </div>
                <!-- END respond-->

            </div> <!-- end comment-respond -->

        </div> <!-- end comments-wrap -->


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