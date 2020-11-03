<?php
include('header.php');

$query="select * from tbl_wishlist";
$query1=mysqli_query($con,$query);
$nor=mysqli_num_rows($query1);

if($nor==0)
{?>
    
    <div class="alert alert-success" style="margin-top: 30px;margin-bottom: 50px;">Your wishlist is empty !!!</div>

      
         <a href="index.php" style="color: black;border: 2px solid #C0C0C0;margin-left: 500px;font-weight: bolder; background: #E7AB3C;padding: 12px 20px 12px 20px;
               border-radius: 10px;">Continue shopping</a> 
        <br/><br/><br/>
    
    
 <?php  
}
else
{

@$customer_id=isset($_SESSION['customer_data']['customer_id'])?$_SESSION['customer_data']['customer_id']:0;

$q= "select * from tbl_wishlist JOIN tbl_product ON tbl_wishlist.wishlist_product_id=tbl_product.product_id where tbl_wishlist.wishlist_customer_id='$customer_id'";

      $q1 = mysqli_query($con,$q);
      $num = mysqli_num_rows($q1);



 if(isset($_GET['wishlist_id']) && isset($_GET['del'])=='delete')
  {

      $wishlist_id=$_GET['wishlist_id'];
               
     $qu="delete from tbl_wishlist where `wishlist_id`='$wishlist_id'";
            
      $qu1= mysqli_query($con,$qu);
      if($qu1)
      {
          $msg="Your product removed successfully from your wishlist !!!";
          header('location:wishlist.php');
      }
 }
if(isset($_POST['clear']))
 {
  $del="delete from tbl_wishlist";
  $del1=mysqli_query($con,$del);
  if($del1)
  {
    $msg="Your wishlist is empty now !!!";
    header('location:wishlist.php');
  }
  else
  {
    $msg="Something wrong !!!";

  }

 }


?>

    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <a href="./home.html"><i class="fa fa-home"></i> Home</a>
                        <a href="./shop.html">Shop</a>
                        <span>Wishlist</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->
<form method="post"> 
    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cart-table">

                <?php if(isset($msg)) {?>
                    <div class="alert alert-success"><?php echo $msg; ?></div>
                <?php } ?>

                        <table>
                            <thead style="background-color: #E7AB3C;">
                                <tr>
                                    <th>Image</th>
                                    <th class="p-name">Product Description</th>
                                    
                                    <th>Price ( In Rs. )</th>
                                    <th>View Product</th>
                                 
                                    <th><!-- <i class="ti-close"></i> -->Delete</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php 
                                 
                                while($q2=mysqli_fetch_array($q1)){ ?>
                                <tr>
                                    <td class="cart-pic first-row">
                                        <a href="product.php?product_id=<?php echo $q2['wishlist_product_id'];?>">
                                            <img src="img/products/wear/<?php echo $q2['product_image']; ?>" alt="">
                                        </a>
                                    </td>

                                    <td class="cart-title first-row">
                                        <h5><?php echo $q2['product_short_description']; ?></h5>
                                    </td>

                                     

                                    <td class="p-price first-row"><?php echo $q2['product_price']; ?> 
                                    </td>

                                     <td class="p-price first-row">

                                         <a href="product.php?product_id=<?php echo $q2['wishlist_product_id'];?>" style="color: black;">
                                             <div style="height: 40px;width: 180px; background-color:#e7ab3c;padding-top: 10px;border-radius: 5px;">
                                                <i class="fa fa-eye"></i>&nbsp;&nbsp; Quick View
                                             </div>
                                         </a>   
                                    </td>


                                    <td class="close-td first-row">
                                        <a href="wishlist.php?wishlist_id=<?php echo $q2['wishlist_id']; ?>&del=delete">
                                          <i class="fa fa-trash"></i>
                                        </a>
                                    </td>

                                </tr>
                           
                            <?php
                                  } ?>
                              
                            </tbody>
                        </table>
                    </div>
                     <div class="col-lg-12">

                            <div class="cart-buttons" style="margin-left: 350px;">
                                <a href="index.php" class="primary-btn continue-shop">Continue shopping</a> 
                              
                              <button class="primary-btn clear-cart" name="clear">Clear Whishlist</button>    
                            </div>
                          
                        </div>

                    

                </div>
            </div>
        </div>
    </section>
    <!-- Shopping Cart Section End -->

    <?php   }  ?>
  </form>
   <?php
include('footer.php');

?>