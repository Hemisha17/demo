<?php
   include('db.php');

if(isset($_POST["action"]))
{
  
 $shop_for = isset($_POST['shop_for'])?$_POST['shop_for']:'';
 $type = isset($_POST['type'])?$_POST['type']:'';

if(($shop_for!='')&&($type!=''))
{

 $query = " SELECT * FROM tbl_product WHERE `product_name`='$type' And `shop_for`='$shop_for'";

 
 if(isset($_POST["minimum_price"], $_POST["maximum_price"]) && !empty($_POST["minimum_price"]) && !empty($_POST["maximum_price"]))
 {
  $query .= "
   AND product_price BETWEEN '".$_POST["minimum_price"]."' AND '".$_POST["maximum_price"]."'
  ";
 }

	
 

 if(isset($_POST["chk_size"]))
 {
  $size_filter = implode("','",$_POST["chk_size"]);
  $query .= "
   AND product_size IN('".$size_filter."')
  ";
 }

 
 if(isset($_POST["color"]))
 {
  $color_filter = implode("','",$_POST["color"]);
  $query .= "
   AND product_color IN('".$color_filter."')
  ";
 }

 if(isset($_POST["brand"]))
 {
  $brand_filter = implode("','",$_POST["brand"]);
  $query .= "
   AND product_brand IN('".$brand_filter."')
  ";
 }

  if(isset($_POST["sort"]))
 
 {
     $sort=$_POST["sort"];
    
     if($sort == 'l2h')
     {
          $query .= " ORDER BY product_price ASC";
     }
     else if($sort == 'h2l')
     {
          $query .= " ORDER BY product_price DESC";
     }
     else if($sort == 'newest')
     {
          $query .= " ORDER BY product_id DESC";
     }
     else if($sort =='product_name')
     {
          $query .= " ORDER BY product_short_description DESC";
     }
    
     
 }

  if(isset($_POST["search"]))
 {
    $search=$_POST['search'];
    $query .= "
   AND product_short_description LIKE '%$search%'
  ";
 }
 

 

$query1=mysqli_query($con,$query);
$nor=mysqli_num_rows($query1);

 $output = '';

 if($nor > 0)
 {

  while($query2=mysqli_fetch_array($query1)) 
  {
   
 $output .= '

  <div class="col-lg-4 col-sm-6">
    <div class="product-item">
      <div class="pi-pic">
        <img src="img/products/wear/'. $query2['product_image'] .'" alt="">
                                      
          <div class="icon">
             <i class="icon_heart_alt"></i>
          </div>
          <ul>
            <li class="w-icon active">
                <a href="product.php">
                  <i class="icon_bag_alt"></i>
                </a>
            </li>

            <li class="quick-view">
                <a href="product.php?product_id='.$query2['product_id'] .'">+ Quick View</a>
            </li>

            <li class="w-icon">
                <a href="product.php">
                    <i class="fa fa-random"></i>
                </a>
            </li>

           </ul>
       </div>

      <div class="pi-text">
                                       
        <a href="#">
         <h5>
            '. $query2['product_short_description'] .'        
         </h5>
        </a>
          <div class="product-price">
            Rs.'. $query2['product_price'] .'                            
          </div>
      </div>
  </div>
 </div>


 ';


  }
 }
 else
 {
  $output = '<h3>No Data Found</h3>';
 }
 echo $output;
}
}

?>
