<!--  
  Author Name: MH RONY.
  GigHub Link: https://github.com/dev-mhrony
  Facebook Link:https://www.facebook.com/dev.mhrony
  Youtube Link: https://www.youtube.com/channel/UChYhUxkwDNialcxj-OFRcDw
  for any PHP, Laravel, Python, Dart, Flutter work contact me at developer.mhrony@gmail.com  
  Visit My Website : developerrony.com 
--><?php
   session_start();
   include('includes/config.php');
   error_reporting(0);
   if(strlen($_SESSION['login'])==0)
     { 
   header('location:index.php');
   }
   else{
   if(isset($_POST['submitsubcat']))
   {
   $categoryid=$_POST['category'];
   $subcatname=$_POST['subcategory'];
   $subcatdescription=$_POST['sucatdescription'];
   $status=1;
   $query=mysqli_query($con,"insert into subcategory(category_id,subcategory,subcat_description,is_active) values('$categoryid','$subcatname','$subcatdescription','$status')");
   if($query)
   {
   $msg="Sub-Category created ";
   }
   else{
   $error="Something went wrong . Please try again.";    
   } 
   }
   
   ?>

<?php include('includes/topheader.php');?>
<!-- Top Bar End -->
<!-- ========== Left Sidebar Start ========== -->
<?php include('includes/leftsidebar.php');?>
<!-- Left Sidebar End -->
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Add Sub-Category</h4>
                        <ol class="breadcrumb p-0 m-0">
                            <li>
                                <a href="#">Admin</a>
                            </li>
                            <li>
                                <a href="#">Category </a>
                            </li>
                            <li class="active">
                                Add Sub-Category
                            </li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
          
            <!-- end row -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box">
                        <h4 class="m-t-0 header-title"><b>Add Sub-Category </b></h4>
                        <hr>
                        <div class="row">
                            <div class="col-sm-6">
                                <!---Success Message--->
                                <?php if($msg){ ?>
                                <div class="alert alert-success" role="alert">
                                    <strong>Well done!</strong> <?php echo htmlentities($msg);?>
                                </div>
                                <?php } ?>
                                <!---Error Message--->
                                <?php if($error){ ?>
                                <div class="alert alert-danger" role="alert">
                                    <strong>Oh snap!</strong> <?php echo htmlentities($error);?>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <form class="row" name="category" method="post">
                            <div class="form-group col-md-6">
                                <label class="control-label">Category</label>
                                <select class="form-control" name="category" required>
                                    <option value="">Select Category </option>
                                    <?php
                                                // Feching active categories
                                                $ret=mysqli_query($con,"select id,category_name from  category where is_active=1");
                                                while($result=mysqli_fetch_array($ret))
                                                {    
                                                ?>
                                    <option value="<?php echo htmlentities($result['id']);?>"><?php echo htmlentities($result['category_name']);?></option>
                                    <?php } ?>
                                </select>
                            </div>
         
                            <div class="form-group col-md-6">
                                <label class="control-label">Sub-Category</label>
                                <input type="text" class="form-control" value="" name="subcategory" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="control-label">Sub-Category Description</label>
                                <textarea class="form-control" rows="5" name="sucatdescription" required></textarea>
                            </div>
                            <div class="form-group col-md-12">
                                <button type="submit" class="btn btn-custom waves-effect waves-light btn-md" name="submitsubcat">
                                    Submit
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- container -->
    </div>
    <!-- content -->
    <?php include('includes/footer.php');?>
   

    <?php } ?>