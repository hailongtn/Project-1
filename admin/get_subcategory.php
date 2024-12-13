<?php
include('includes/config.php');
if(!empty($_POST["catid"])) 
{
 $id=intval($_POST['catid']);
$query=mysqli_query($con,"SELECT * FROM subcategory WHERE category_id=$id and is_active=1");
?>
        <option value="">Select subcategory</option>
        <?php
 while($row=mysqli_fetch_array($query))
 {
  ?>
        <option value="<?php echo htmlentities($row['subcategory_id']); ?>"><?php echo htmlentities($row['subcategory']); ?></option>
        <?php
 }
}
?>
