<meta name='viewport' content='width=device-width, initial-scale=1'>
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<?php
include('header.php');
$query="select * from tbl_cart";
$query1=mysqli_query($con,$query);
$nor=mysqli_num_rows($query1);

if($nor==0)
{?>
    
    <div class="alert alert-success" style="margin-top: 30px;margin-bottom: 50px;">Your shopping cart is empty !!!</div>

      
         <a href="index.php" style="color: black;border: 2px solid #C0C0C0;margin-left: 500px;font-weight: bolder; background: #E7AB3C;padding: 12px 20px 12px 20px;
               border-radius: 10px;">Continue shopping</a> 
        <br/><br/><br/>
    
    
 <?php  
}
else
{

@$customer_id=isset($_SESSION['customer_data']['customer_id'])?$_SESSION['customer_data']['customer_id']:0;

 $q= "SELECT * FROM tbl_cart JOIN tbl_product ON tbl_cart.`cart_product_id`=tbl_product.`product_id` WHERE tbl_cart.`cart_customer_id`='$customer_id' AND tbl_cart.`cart_status`='pending'";

      $q1 = mysqli_query($con,$q);
      $num = mysqli_num_rows($q1);
     

 if(isset($_GET['cart_id']) && isset($_GET['del'])=='delete')
  {

      $cart_id=$_GET['cart_id'];
               
      $qu="delete from tbl_cart where `cart_id`='$cart_id'";
            
      $qu1= mysqli_query($con,$qu);
      if($qu1)
      {
         $msg="Your product removed successfully from your cart !!!";
           header('location:shopping_cart.php');
      }
 }



 if(isset($_POST['clear']))
 {
  $del="delete from tbl_cart";
  $del1=mysqli_query($con,$del);
  if($del1)
  {
    $msg="Your cart empty now !!!";
    header('location:shopping_cart.php');
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
                        <span>Shopping Cart</span>
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
                                    <th>Size</th>
                                    <th>Price ( In Rs. )</th>
                                    <th>Quantity</th>
                                    <th>Total ( In Rs. )</th>
                                    <th><!-- <i class="ti-close"></i> -->Delete</th>
                                    <th>Edit</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $amount=0;
                               if($num > 0 )
                                {
                                 while($q2=mysqli_fetch_array($q1)){ ?>
                                <tr>
                                    <td class="cart-pic first-row">
                                        <a href="update_cart_product.php?cart_id=<?php echo $q2['cart_id']; ?>">
                                        <img src="img/products/wear/<?php echo $q2['product_image']; ?>" alt="">
                                    </a>
                                    </td>
                                    <td class="cart-title first-row">
                                        <h5><?php echo $q2['product_short_description']; ?></h5>
                                    </td>

                                     <td class="size first-row">
                                        <?php echo $q2['product_size']; ?> 
                                    </td>

                                    <td class="p-price first-row" id="price">
                                         <?php echo $q2['product_price']; ?> 
                                    </td>

                                    <td class="qua-col first-row">
                                        <div class="quantity">
                                            <div class="pro-qty" id="qty">
                                                <input type="text"  id="qty_num" name="qty_num" value="<?php echo $q2['cart_qty']; ?> " >
                                            </div>
                                        </div>
                                    </td>

                                    <td class="total-price first-row" id="tot_price">
                      
                                        <?php echo $q2['cart_total_amount'];  ?> 

                                      <!-- ?php echo $q2['cart_total_amount']*$q2['cart_qty'];?> -->
                                        
                                    </td>
                                      
                                 <!--   <input type="hidden" value="<?php echo $q2['cart_total_amount']*$q2['cart_qty'];?>" name="tot_amt"> -->

                                    <td class="close-td first-row">
                                        <a href="shopping_cart.php?cart_id=<?php echo $q2['cart_id']; ?>&del=delete">
                                          <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                    <td class="edit-td first-row">
                                        <a href="update_cart_product.php?cart_id=<?php echo $q2['cart_id']; ?>">
                                        <i class='fas fa-edit'></i>
                                    </a>
                                    </td>
                               <!--  <td class="edit-td first-row">
                                <div class="cart-buttons">
                                  <a href="update_cart_product.php?cart_id=<?php echo $q2['cart_id']; ?>" class="primary-btn continue-shop">Edit</a>    
                               </div>
                             </td> -->


                                </tr>
                            <?php
                                $amount=$amount + $q2['cart_total_amount'];
                               

                              } }?>
                              
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <!-- <div class="cart-buttons">
                                <a href="#" class="primary-btn continue-shop">Continue shopping</a>
                                <a href="#" class="primary-btn up-cart">Update cart</a>
                            </div> -->

                            <div class="cart-buttons">
                                <a href="index.php" class="primary-btn continue-shop">Continue shopping</a> 
                              <!--   <button class="primary-btn up-cart" name="update">Update cart</button> -->
                              <button class="primary-btn clear-cart" name="clear">Clear Cart</button>    
                            </div>
                          
                        </div>
                        <div class="col-lg-6 offset-lg-6">
                            <div class="proceed-checkout">
                                 <div class="proceed-btn1">Payment Information</div>
                                <ul>
                                    <li class="subtotal">Subtotal 
                                     <span>Rs.
                                    <?php 
                                     @$_SESSION['grand_total']=$amount;

                                      if(isset($_SESSION['grand_total']))
                                        { 
                                          echo $_SESSION['grand_total']; 
                                        }
                                        else
                                        { ?>
                                            00

                                        <?php } ?>
                                      </span>
                                    </li>

                                    <li class="subtotal">Shipping fee
                                         <span>Free</span>
                                    </li>

                                    <li class="cart-total">Total 
                                        <span>RS.
                                        <?php 
                                      if(isset($_SESSION['grand_total']))
                                        { 
                                          echo $_SESSION['grand_total']; 
                                        }
                                        else
                                        { ?>
                                            00
                                      <?php } ?>
                                          
                                      </span>
                                    </li>
                                </ul>
                                <a href="checkout.php" class="proceed-btn">PROCEED TO CHECK OUT</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
  </form>
    <!-- Shopping Cart Section End -->

 


 <?php } ?>
   <?php
include('footer.php');

?>

<script type="text/javascript">
      
// $(document).ready(function() {

// $("#qty").on('click',function() {
   
// $("#tot_price").text($("#price").text() * $("#qty_num").val());
  
//  });
// });


$(document).ready(function() {

$(".pro-qty").on('click',function() {
  
   
 // var tot= $(".total-price").text();
 // var price=$("#price").text();
 // var qty_num =$(".qty_num").val();
// $(".total-price").text($(".p-price").text() * $(".qty_num").val());
$("#tot_price").text($("#price").text() * $("#qty_num").val());

 // alert(qty_num);
  
 });
});
</script>