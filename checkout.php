<?php
  include('header.php');
ob_start();

$customer_id=$_SESSION['customer_data']['customer_id'];

  $q= "SELECT * FROM tbl_cart JOIN tbl_product ON tbl_cart.`cart_product_id`=tbl_product.`product_id` WHERE tbl_cart.`cart_customer_id`='$customer_id' AND tbl_cart.`cart_status`='pending'";
  $q1=mysqli_query($con,$q);
  $cnum=mysqli_num_rows($q1);
 


  $cart_id  = array();
 $product_id = array();
  while($q3 =  mysqli_fetch_array($q1)){ 
      $cart_id[] =  $q3['cart_id'];
      $product_id[] = $q3['product_id'];
  }

   $cart_ids =  implode(',',$cart_id);
   $product_ids =  implode(',',$product_id);


   if(isset($_POST['place_order']))
   {
      $fullname=$_POST['fullname'];
      $email=$_POST['email'];
      $phone=$_POST['phone'];
      $address=$_POST['address'];
      $country=$_POST['country'];
      $city=$_POST['city'];
      $pincode=$_POST['pincode'];
      $product_id=$_POST['product_id'];
      $customer_id=$_POST['customer_id'];
      $cart_id=$_POST['cart_id'];
      $toa_amt=$_SESSION['grand_total'];
     
      $o_ins="insert into tbl_order (`order_customer_id`,`order_product_id`,`order_cart_id`,`fullname`,`email`,`address`,`phone`,`country`,`city`,`pincode`,`order_total_amount`,`status`) values('$customer_id','$product_id','$cart_id','$fullname','$email','$address','$phone','$country','$city','$pincode','$toa_amt','pending')";
     $o_ins1=mysqli_query($con,$o_ins);
     if($o_ins1)
     {
        $msg="Your order placed successfuly...";
        // $del_cart="delete from tbl_cart where `cart_customer_id`='$customer_id' and cart_id IN('$cart_ids')";
        // $del_cart1=mysqli_query($con,$del_cart);
     }
     else
     {
        $msg="Somthing happened wrong...";
     }
   }


?>
    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <a href="./index.html"><i class="fa fa-home"></i> Home</a>
                        <a href="./shop.html">Shop</a>
                        <span>Check Out</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->


    <?php if(isset($msg)) { ?>
              <div class="alert alert-success"><?php echo $msg; ?> </div>
          <?php } ?>

    <!-- Shopping Cart Section Begin -->
    

    <section class="checkout-section spad">
        <div class="container">
            <form method="post" id="placeorder" class="checkout-form">
          
                <div class="row">

               <input type="hidden" name="product_id"  value="<?php echo $product_ids; ?>">
              <input type="hidden" name="customer_id"  value="<?php echo $customer_id; ?>">
              <input type="hidden" name="cart_id"  value="<?php echo $cart_ids; ?>">


                    <div class="col-lg-5" style="border-radius: 3px;border: 2px solid lightgray;">
                        <!-- <div class="checkout-content">
                            <a href="login.php" class="content-btn">Click Here To Login</a>
                        </div> -->
                        <div style="background-color: #e7ab3c;height: 70px;width: 450px;text-align: center;margin-bottom: 30px;">
                        <h4 style="color: white;padding-top: 20px;">Biiling Details</h4></div>
                         <?php 

                           $u_data="select * from tbl_customer where customer_id=$customer_id";
                           $u_data1=mysqli_query($con,$u_data);
                           $u_data2=mysqli_fetch_array($u_data1);

                          ?>
                        <div class="row">
                            <div class="col-lg-12">
                                <label for="fir">Full Name<span>*</span></label>
                                <input type="text" name="fullname" id="fullname" value="<?php echo $u_data2['customer_name'] ?>">
                            </div>
                            <div class="col-lg-12">
                                <label for="email">Email Address<span>*</span></label>
                                <input type="text" name="email" id="email" value="<?php echo $u_data2['customer_email'] ?>">
                            </div>
                            <div class="col-lg-12">
                                <label for="phone">Phone<span>*</span></label>
                                <input type="text" name="phone" id="phone" value="<?php echo $u_data2['customer_phone'] ?>">
                            </div>
                             <div class="col-lg-12">
                                <label for="street">Street Address<span>*</span></label>
                                <input type="text" name="address" id="address" class="street-first" value="<?php echo $u_data2['customer_address'] ?>">
                                <!-- <input type="text"> -->
                            </div>
                            
                            <div class="col-lg-6">
                                <label for="cun">Country<span>*</span></label>
                                <input type="text" name="country" id="country" value="<?php echo $u_data2['customer_country'] ?>">
                            </div>
                             <div class="col-lg-6">
                                <label for="town">Town / City<span>*</span></label>
                                <input type="text" name="city" id="city" value="<?php echo $u_data2['customer_city'] ?>">
                            </div>
                           
                            <div class="col-lg-12">
                                <label for="zip">Pincode / ZIP (optional)</label>
                                <input type="text" name="pincode" id="pincode" value="<?php echo $u_data2['customer_pincode'] ?>">
                            </div>
                           
                            
                            
                        </div>
                    </div>
                    <div class="col-lg-7" style="border-radius: 3px;">
                        <!-- <div class="checkout-content">
                            <input type="text" placeholder="Enter Your Coupon Code">
                        </div> -->
                        <div class="place-order">
                            <div style="background-color: #e7ab3c;height: 70px;width: 650px;text-align: center;margin-bottom: 30px;">
                            <h4 style="color: white;padding-top: 20px;">Your Order</h4>
                        </div>
                            <div class="order-total">

                                <ul class="order-table">
                                     <li>Product 

                                        <span style="padding-left: 130px;">Total</span>
                                         <span style="padding-left: 80px;">Qty</span>
                                         <span>Price</span>
                                    </li>
                         <?php 


                         $cartdisplay= "SELECT * FROM tbl_cart JOIN tbl_product ON tbl_cart.`cart_product_id`=tbl_product.`product_id` WHERE tbl_cart.`cart_customer_id`='$customer_id' AND tbl_cart.`cart_status`='pending'";
                         $cartdisplay1=mysqli_query($con,$cartdisplay);
                         //$cartdisplaynum=mysqli_num_rows($cartdisplay1);



                                while($cartdisplay2=mysqli_fetch_array($cartdisplay1)){?>

                                <li class="fw-normal">
                                 <img src="img/products/wear/<?php echo $cartdisplay2['product_image']; ?>" style="height: 150px;width: 150px;"> 
                                       
                                 <span style="padding-left: 150px;"><?php echo $cartdisplay2['product_price']*$cartdisplay2['cart_qty'];?></span>
                                    <span style="padding-left: 100px;"><?php echo $cartdisplay2['cart_qty']; ?></span>
                                 <span ><?php echo $cartdisplay2['product_price']; ?></span>

                                 </li>
                              <?php    } ?>
                                    

                                </ul>
                                <ul class="order-table">
                                 <li class="total-price">Total
                                  <span style="font-size: 20px;">Rs.
                                    <?php 
                                           echo @$_SESSION['grand_total'];
                                    ?>
                                      </span>
                                 </li>
                               </ul>

                                <div class="order-btn">
                                    <button type="submit" class="site-btn place-btn" name="place_order" id="place_order">Place Order</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- Shopping Cart Section End -->
</form>
<?php
   include('footer.php');
?>