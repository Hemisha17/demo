<?php
include("db.php");
 

if(!empty($_POST["keyword"])) 
{
   $keyword=$_POST["keyword"];
  

   $query ="SELECT distinct product_name,shop_for FROM tbl_product WHERE product_name like '%$keyword%' OR shop_for like '%$keyword%'  ORDER BY product_name";
 
$result = mysqli_query($con,$query);
if(!empty($result)) {
?>
<ul id="search">
<?php
foreach($result as $product) {
?>
   <a href="<?php echo $product['shop_for'].'_'.$product['product_name'].'.php'; ?>">

   	<li onClick="selectproduct('<?php echo $product["product_name"] .' for '. $product["shop_for"] ; ?>');" style="color:black;">
	 <?php echo $product["product_name"] .' for '. $product["shop_for"] ; ?>
		
   </li>
  </a>
<?php } ?>
</ul>
<?php } } ?>