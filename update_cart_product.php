<?php
   include('header.php');

if(isset($_GET['cart_id'])){

  $cart_id = $_GET['cart_id'];
  $q = "select * from tbl_cart join tbl_product on tbl_cart.cart_product_id=tbl_product.product_id where `cart_id`='$cart_id'";
  $q1 = mysqli_query($con,$q);
  $q2 = mysqli_fetch_array($q1);
  //print_r($q2);


  $product_image=$q2['product_image']; 

  $qu="select * from tbl_product where `product_image`='$product_image'";

   $qu1 = mysqli_query($con,$qu);
                                     
    $customer_id=@$_SESSION['customer_data']['customer_id'];                    


     if(isset($_POST['updatecart']))    
    { 
       $cart_id = $_GET['cart_id'];
       $qty=$_POST['qty'];
       $selectsize=$_POST['selectsize'];
       $product_price=$_POST['product_price'];
       $total_amt=$qty * $product_price; 
      

        $query="select * from tbl_cart where `cart_product_id`='$selectsize' and `cart_customer_id`='$customer_id' AND `cart_status` != 'completed'";
        $query1 = mysqli_query($con,$query);
        $num = mysqli_num_rows($query1);
        $query2=mysqli_fetch_array($query1);
        $_SESSION['tbl_cart']=$query2;
        $cart_qty= $_SESSION['tbl_cart']['cart_qty'];
        $upd_cqty=$qty + $cart_qty;
        $upd_total_amt= $upd_cqty * $product_price; 

          
          //print_r($_SESSION['tbl_cart']['cart_qty']); 
       if($num >0)
       {
        $que="update tbl_cart set `cart_qty`='$qty',`cart_total_amount`='$total_amt' where `cart_id`='$cart_id'";       
        $que1=mysqli_query($con,$que);
     

          if($que1)
            {
                $msg="Product is update to your shopping cart...";

            }
            else
            {
                $msg="Something happened wrong !!!";
            }
           
        }
    }
    else
    {

    }
      
        
        
        
  
      // else
        //{   
       //    $s_cartid= $_SESSION['tbl_cart']['cart_id'];
       //    $ucqty="update tbl_cart set `cart_qty`='$upd_cqty',`cart_total_amount`='$upd_total_amt' where `cart_id`='$s_cartid'";
       //    $ucqty1=mysqli_query($con,$ucqty);
       //    if($ucqty1)
       //      {
       //          $msg="Product Quantity is added to your shopping cart...";

       //      }
       //      else
       //      {
       //          $msg="Something happened wrong !!!";
       //      }
       //}
      

      
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
                        <span>Detail</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php if(isset($msg)) { ?>
                <div class="alert alert-success"><?php echo $msg;
                 ?> </div>
      <?php } ?>
    <!-- Breadcrumb Section Begin -->
    <form method="post" id="product">

    <!-- Product Shop Section Begin -->
    <section class="product-shop spad page-details">
        <div class="container">
            <div class="row" style="margin-left: 30px;">

                <div class="col-lg-9">
                    <div class="row">
                     

                        <div class="col-lg-6"> 
                            <div class="product-pic-zoom">

                              <!--   <input type="hidden" name="product_id" value="<?php echo $q2['product_id']; ?>">
                                <input type="hidden" name="product_image" value="<?php echo $q2['product_image']; ?>"> -->

                                <img class="product-big-img" src="img/products/wear/<?php echo $q2['product_image']; ?>" alt="">
                                <div class="zoom-icon">
                                    <i class="fa fa-search-plus"></i>
                                </div>
                            </div>

                            <div class="product-thumbs">
                                <div class="product-thumbs-track ps-slider owl-carousel">
                                    <div class="pt active" data-imgbigurl="img/products/wear/<?php echo $q2['product_image']; ?>">
                                          <img
                                            src="img/products/wear/<?php echo $q2['product_image']; ?>" alt="">
                                    </div>
                                    <div class="pt" data-imgbigurl="img/products/wear/<?php echo $q2['product_image']; ?>">
                                        <img
                                            src="img/products/wear/<?php echo $q2['product_image']; ?>" alt="">
                                    </div>
                                    <div class="pt" data-imgbigurl="img/products/wear/<?php echo $q2['product_image']; ?>">
                                        <img
                                            src="img/products/wear/<?php echo $q2['product_image']; ?>" alt="">
                                    </div>
                                    <div class="pt" data-imgbigurl="img/products/wear/<?php echo $q2['product_image']; ?>">
                                        <img
                                            src="img/products/wear/<?php echo $q2['product_image']; ?>" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    

                        <div class="col-lg-6">
                            <div class="product-details">
                                <div class="pd-title">

                                    <!-- <input type="hidden" name="product_name" value="<?php echo $q2['product_name']; ?>"> -->

                                    <span><?php echo $q2['product_name'].' for '. $q2['shop_for']; ?></span><br/>

                                    <h3><?php echo $q2['product_short_description']; ?></h3><br/>
                                   <!--      -->
                                </div>
                                <!-- <div class="pd-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>    
                                    <span>(5)</span>
                                </div> -->
                                <div class="pd-desc">
                                    <p><?php echo $q2['product_long_description']; ?></p>
                                    <h4>Rs. <?php echo $q2['product_price']; ?></h4>
                                    <input type="hidden" name="product_price" value="<?php echo $q2['product_price']; ?>"> 
                                </div>
                                   
                                   
                                 
                                <div class="pd-size-choose"><lable style="font-weight: bolder;padding-right: 50px;">Size</lable>




                                   <div class="sc-item">

                                      <select name="selectsize" style="width:300px;height: 30px;background-color:#F8F8FF;border-radius: 5px;padding-left: 20px;" id="size">

                                        <option disabled="disabled" selected="selected">  ---   Select Size   ---   </option>

                                        <?php while($qu2=mysqli_fetch_array($qu1)){ ?>

                                          <option value="<?php  echo $qu2['product_id']; ?>" <?php 
                                             if($q2['cart_product_id']==$qu2['product_id'])
                                              { 
                                                echo "selected"; 
                                              }?> >
                                            <?php echo $qu2['product_size']; ?>
                                          
                                          </option>

                                       <?php } ?>
                                        </select>
                                   </div>
                            
                                   
                                </div>

                                <div class="quantity"><lable style="font-weight: bolder;padding-right: 50px;">Quantity</lable>
                                    <div class="pro-qty">
                                        <input type="text" value="<?php echo $q2['cart_qty']; ?>" name="qty">
                                    </div>
                                </div>
                                <div class="quantity">

                                     <?php if(isset($_SESSION['customer_data'])) { ?> 

                                      <button type="submit" name="updatecart" id="updatecart" class="primary-btn pd-cart" style="width: 400px;">
                                        <i class="fa fa-shopping-cart" style="font-size: 25px;"></i> 
                                            &nbsp;&nbsp;Update Cart
                                     </button>
                                     <?php } else { ?>

                                    <a href="login.php" class="primary-btn pd-cart" name="updatecart" onclick="return gotologin()">
                                       <i class="fa fa-shopping-cart" style="font-size: 25px;"></i> 
                                    &nbsp;&nbsp;Update Cart
                                    </a> 

                                      <?php }?>
                                </div>

                            <div class="quantity" >

                                <?php if(isset($_SESSION['customer_data'])) { ?> 

                                <button type="submit" name="wishlist" class="primary-btn pd-cart" style="width: 300px;">
                                    <i class="fa fa-heart" style="font-size: 20px;"></i>&nbsp;&nbsp;Add To Wishlist
                                </button> 
                                 <?php } else { ?>
                                 <a href="login.php" class="primary-btn pd-cart" name="wishlist" onclick="return gotologin()">
                                    <i class="fa fa-heart" style="font-size: 20px;"></i>&nbsp;&nbsp;Add To Wishlist
                                </a>
                              <?php }?> 



                                <!-- </div>
                                <div class="quantity"> -->&nbsp;&nbsp;&nbsp;&nbsp;
                                    <button type="submit" name="compare" class="primary-btn pd-cart" style="width: 220px;">
                                        <i class="fa fa-random" style="font-size: 20px;"></i>&nbsp;&nbsp;Compare
                                    </button>
                            </div>
                                
                                <div class="pd-share">
                                    <div class="p-code">Sku : 00012</div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-tab">
                        <div class="tab-item">
                            <ul class="nav" role="tablist">
                                <li>
                                    <a class="active" data-toggle="tab" href="#tab-1" role="tab">DESCRIPTION</a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#tab-2" role="tab">SPECIFICATIONS</a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#tab-3" role="tab">Customer Reviews (02)</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-item-content">
                            <div class="tab-content">
                                <div class="tab-pane fade-in active" id="tab-1" role="tabpanel">
                                    <div class="product-content">
                                        <div class="row">
                                            <div class="col-lg-7">
                                                <h5>DESCRIPTION</h5>
                                                <p><?php echo $q2['product_short_description']; ?></p>
                                                <!-- <h5>Features</h5> -->
                                                <p><?php echo $q2['product_long_description']; ?> </p>
                                            </div>
                                            <div class="col-lg-5">
                                                <img src="img/products/wear/<?php echo $q2['product_image']; ?>" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab-2" role="tabpanel">
                                    <div class="specification-table">
                                        <table>
                                            <tr>
                                                <td class="p-catagory">Customer Rating</td>
                                                <td>
                                                    <div class="pd-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <span>(5)</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Price</td>
                                                <td>
                                                    <div class="p-price">$495.00</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Add To Cart</td>
                                                <td>
                                                    <div class="cart-add">+ add to cart</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Availability</td>
                                                <td>
                                                    <div class="p-stock">22 in stock</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Weight</td>
                                                <td>
                                                    <div class="p-weight">1,3kg</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Size</td>
                                                <td>
                                                    <div class="p-size">Xxl</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Color</td>
                                                <td><span class="cs-color"></span></td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Sku</td>
                                                <td>
                                                    <div class="p-code">00012</div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab-3" role="tabpanel">
                                    <div class="customer-review-option">
                                        <h4>2 Comments</h4>
                                        <div class="comment-option">
                                            <div class="co-item">
                                                <div class="avatar-pic">
                                                    <img src="img/product-single/avatar-1.png" alt="">
                                                </div>
                                                <div class="avatar-text">
                                                    <div class="at-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <h5>Brandon Kelley <span>27 Aug 2019</span></h5>
                                                    <div class="at-reply">Nice !</div>
                                                </div>
                                            </div>
                                            <div class="co-item">
                                                <div class="avatar-pic">
                                                    <img src="img/product-single/avatar-2.png" alt="">
                                                </div>
                                                <div class="avatar-text">
                                                    <div class="at-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <h5>Roy Banks <span>27 Aug 2019</span></h5>
                                                    <div class="at-reply">Nice !</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="personal-rating">
                                            <h6>Your Ratind</h6>
                                            <div class="rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>
                                        </div>
                                        <div class="leave-comment">
                                            <h4>Leave A Comment</h4>
                                            <form action="#" class="comment-form">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <input type="text" placeholder="Name">
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <input type="text" placeholder="Email">
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <textarea placeholder="Messages"></textarea>
                                                        <button type="submit" class="site-btn">Send message</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </form>
    <!-- Product Shop Section End -->

    <!-- Related Products Section End -->
    <div class="related-products spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Related Products</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="product-item">
                        <div class="pi-pic">
                            <img src="img/products/women-1.jpg" alt="">
                            <div class="sale">Sale</div>
                            <div class="icon">
                                <i class="icon_heart_alt"></i>
                            </div>
                            <ul>
                                <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                <li class="quick-view"><a href="#">+ Quick View</a></li>
                                <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                            </ul>
                        </div>
                        <div class="pi-text">
                            <div class="catagory-name">Coat</div>
                            <a href="#">
                                <h5>Pure Pineapple</h5>
                            </a>
                            <div class="product-price">
                                $14.00
                                <span>$35.00</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="product-item">
                        <div class="pi-pic">
                            <img src="img/products/women-2.jpg" alt="">
                            <div class="icon">
                                <i class="icon_heart_alt"></i>
                            </div>
                            <ul>
                                <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                <li class="quick-view"><a href="#">+ Quick View</a></li>
                                <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                            </ul>
                        </div>
                        <div class="pi-text">
                            <div class="catagory-name">Shoes</div>
                            <a href="#">
                                <h5>Guangzhou sweater</h5>
                            </a>
                            <div class="product-price">
                                $13.00
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="product-item">
                        <div class="pi-pic">
                            <img src="img/products/women-3.jpg" alt="">
                            <div class="icon">
                                <i class="icon_heart_alt"></i>
                            </div>
                            <ul>
                                <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                <li class="quick-view"><a href="#">+ Quick View</a></li>
                                <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                            </ul>
                        </div>
                        <div class="pi-text">
                            <div class="catagory-name">Towel</div>
                            <a href="#">
                                <h5>Pure Pineapple</h5>
                            </a>
                            <div class="product-price">
                                $34.00
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="product-item">
                        <div class="pi-pic">
                            <img src="img/products/women-4.jpg" alt="">
                            <div class="icon">
                                <i class="icon_heart_alt"></i>
                            </div>
                            <ul>
                                <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                <li class="quick-view"><a href="#">+ Quick View</a></li>
                                <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                            </ul>
                        </div>
                        <div class="pi-text">
                            <div class="catagory-name">Towel</div>
                            <a href="#">
                                <h5>Converse Shoes</h5>
                            </a>
                            <div class="product-price">
                                $34.00
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Related Products Section End -->


<?php
   include('footer.php');
?>

<script type="text/javascript">
 
  function gotologin()
  {
    var i = confirm("Are you sure to go Login Page!!!");
    if(i)
    {
      window.location="login.php";
    }
    else
    {
      return false;
    }
  }

</script>
<!-- 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
<script>
 $('#product').validate({ // initialize the plugin
    rules: {
             selectsize:{
               required: true
              },
           },
  messages:{
          selectsize:{
            required:"<div style='color:red;'>Please Select Size</div>"
            }

       }  
});
 </script> -->
