<?php 
   ob_start();
include('db.php');
session_start();


if(isset($_SESSION['customer_data']['customer_id'])){

       $customer_id=$_SESSION['customer_data']['customer_id'];
       
         $cart_num = "select * from tbl_cart where `cart_customer_id`='$customer_id' AND `cart_status`='pending'";
         $cart_num1 = mysqli_query($con,$cart_num);
         $num = mysqli_num_rows($cart_num1);
         $tot_amt=mysqli_fetch_array($cart_num1); 
          $_SESSION['cart_total_amount']=$tot_amt['cart_total_amount'];

         $_SESSION['cart_number'] =  $num;




          $wishlist_num = "select * from tbl_wishlist where `wishlist_customer_id`='$customer_id'";
         $wishlist_num1 = mysqli_query($con,$wishlist_num);
         $wnum = mysqli_num_rows($wishlist_num1);
         $_SESSION['wishlist_number'] =  $wnum; 

}
?>

 <!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Fashi Template">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fashi | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/themify-icons.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="css/edit_profile_css.css" type="text/css">

<!-- 
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script> -->



</head>

<body>
    <!-- Page Preloder -->
   <!--  <div id="preloder">
        <div class="loader"></div>
    </div> -->

<!-- Header Section Begin -->
 <header class="header-section">
        <div class="header-top">
            <div class="container">
                <div class="ht-left">
                  <!--   <div class="mail-service">
                            <i class=" fa fa-envelope"></i>
                            hello.colorlib@gmail.com 
                       
                    </div> -->
                    <!-- <div class="phone-service">
                        <i class=" fa fa-phone"></i>
                        +65 11.188.888
                    </div> -->
                <div class="mail-service">
                 <?php 
                  if(@$_SESSION['customer_data']['customer_email']!='')
                        {  ?>
                          Welcome

                        <?php
                         echo $_SESSION['customer_data']['customer_name']." !!!";}?>
                     </div>  

                </div>

                <div class="ht-right">

                  <?php
                
                     if(@$_SESSION['customer_data']['customer_email']!='')
                        {   
                         
                   
                      } else{ ?>
                         <a href="register.php" class="login-panel"><i class="fa fa-user"></i>Registration</a>
                     <?php } ?>



                               <?php
                               if(isset($_SESSION['customer_data']['customer_email'])!='')
                               { ?>
                                  <a href="logout.php" class="login-panel"></i>Logout&nbsp;&nbsp;</a>
                               <?php }
                                else
                               { ?>
                                 <a href="login.php" class="login-panel"><i class="fa fa-user"></i>Login&nbsp;&nbsp;</a>

                                <?php } ?>
                   <!--  <a href="logout.php" class="login-panel"></i>Logout&nbsp;&nbsp;</a>
                    
                    <a href="login.php" class="login-panel"><i class="fa fa-user"></i>Login&nbsp;&nbsp;</a> -->

                    <a href="#" class="login-panel">T & C&nbsp;&nbsp;</a>
                     <a href="contact.php" class="login-panel">Contact us&nbsp;&nbsp;</a>
                     <a href="about_us.php" class="login-panel">About us&nbsp;&nbsp;</a>

                <?php
                     if(@$_SESSION['customer_data']['customer_name']!='')
                        {   ?>
                          <a href="edit_profile.php" class="login-panel">My Account&nbsp;&nbsp;
                          </a>
                <?php } ?>

                <?php
                     if(@$_SESSION['customer_data']['customer_name']!='')
                        {   ?>
                          <a href="change_pwd.php" class="login-panel">Change Password&nbsp;&nbsp;
                          </a>
                <?php } ?>
                 <?php
                     if(@$_SESSION['customer_data']['customer_name']!='')
                        {   ?>
                          <a href="my_order.php" class="login-panel">My Order&nbsp;&nbsp;
                          </a>
                <?php } ?>


               
                   
                    
                
                     
                </div>
            </div>
        </div>

        <div class="container" >
            <div class="inner-header">
                <div class="row">
                    <div class="col-lg-2 col-md-2">
                        <div class="logo">
                            <a href="./index.php">
                                <img src="img/h_logo.png" alt="" width="120px" height="70px;">
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-7 col-md-7">
                        <div class="advanced-search">
                           <button type="button" class="category-btn" style="font-weight: bolder;">Search here&nbsp;&nbsp;</button>  
                             
                            <div class="input-group">
                             <input type="text" id="search-box">
                             <div id="suggesstion-box"></div>

                                <button type="button"><i class="ti-search"></i></button>
                            </div>

                        </div>
                    </div>

                    <div class="col-lg-3 text-right col-md-3">
                        <ul class="nav-right">


                            <li class="heart-icon">
                               <!--  <a href="#">
                               <i class="fa fa-heart" style="font-size:33px;color:#e7ab3c"></i>
                                    <span style="background-color:black;">1</span>
                                </a> -->


                       <?php
                
                       if(@$_SESSION['customer_data']['customer_email']!='')
                        {   ?>
                           <a href="wishlist.php">
                               <i class="fa fa-heart" style="font-size:33px;color:#e7ab3c"></i>
                                <span style="background-color:black;"> 
                                    <?php echo @$_SESSION['wishlist_number']; ?>
                                        
                                </span>
                       </a>   
                   
                     <?php } else{ ?>
                         <a href="register.php">
                        <i class="fa fa-heart" style="font-size:33px;color:#e7ab3c"></i>
                        </a> 
                     <?php } ?>

                            </li>



                            <li class="cart-icon">
                                <!-- <a href="shopping_cart.php">
                                    <i class="fa fa-shopping-cart" style="font-size:40px;color:#e7ab3c"></i>
                                    <span style="background-color:black;"> 
                                        <?php echo $_SESSION['cart_number']; ?>
                                        
                                    </span>
                                 </a>    -->


                  <?php
                
                     if(@$_SESSION['customer_data']['customer_email']!='')
                        {   ?>
                         <a href="shopping_cart.php">
                                    <i class="fa fa-shopping-cart" style="font-size:40px;color:#e7ab3c"></i>
                                    <span style="background-color:black;"> 
                                        <?php echo @$_SESSION['cart_number']; ?>
                                        
                                    </span>
                         </a>   
                   
                     <?php } else{ ?>
                        <a href="register.php">
                          <i class="fa fa-shopping-cart" style="font-size:40px;color:#e7ab3c"></i>
                      </a>
                     <?php } ?>


                                
                                <div class="cart-hover">


                                    <div class="select-button">
                                        <a href="shopping_cart.php" class="primary-btn view-card">VIEW CARD</a>
                                        <a href="#" class="primary-btn checkout-btn">CHECK OUT</a>
                                    </div>
                                </div>
                            </li>

                            <li class="cart-price">Rs. 
                             <?php 
                                      if(isset($_SESSION['grand_total']))
                                        { 
                                          echo @$_SESSION['grand_total'];
                                        }
                                        else
                                        { ?>
                                            00

                                        <?php } ?>
                            </li>
                        </ul>

                
                    </div>
                </div>
            </div>
        </div>
        <div class="nav-item">
            <div class="container">
                <!-- <div class="nav-depart">
                    <div class="depart-btn">
                        <i class="ti-menu"></i>
                        <span>All departments</span>
                        <ul class="depart-hover">
                            <li class="active"><a href="#">Women’s Clothing</a></li>
                            <li><a href="#">Men’s Clothing</a></li>
                            <li><a href="#">Underwear</a></li>
                            <li><a href="#">Kid's Clothing</a></li>
                            <li><a href="#">Brand Fashion</a></li>
                            <li><a href="#">Accessories/Shoes</a></li>
                            <li><a href="#">Luxury Brands</a></li>
                            <li><a href="#">Brand Outdoor Apparel</a></li>
                        </ul>
                    </div>
                </div> -->

                <nav class="nav-menu mobile-menu">
                   <!--  <ul> -->
                       <li class="active"><a href="index.php">Home</a></li>

                        <li><a href="#">Girls</a>
                            <ul class="dropdown">


                            <li style="color: white;font-size:25px;font-weight: bolder;padding-left: 30px;padding-bottom: 10px;padding-top: 10px;">Top wear
                            </li>
                               
                                <!-- <li><a href="#">Tops</a></li> -->
                                <li><a href="girl_t-shirt.php">T-shirts</a></li>
                                <li><a href="#">Jackets  & Shrugs</a></li>
                                
                              <li style="color: white;font-size:25px;font-weight: bolder;padding-left: 30px;padding-bottom: 10px;padding-top: 10px;">Bottom wear
                              </li>
                              
                                  <li><a href="#">Jeans</a></li>
                                <li><a href="#">Trousers</a></li>
                                <li><a href="#">Shorts</a></li>
                                 <li><a href="#">Track Pants</a></li>
                               
                            </ul>
                        </li>

 
  



                        <li><a href="product.php">Boys</a>
                                  
                         <ul class="dropdown">


                              <!--       <li><a href="#">Winter Wear</a></li>
                                <li><a href="#">Sport Wear</a></li>
                                <li><a href="#">Dungrees</a></li> -->


                            <li style="color: white;font-size:25px;font-weight: bolder;padding-left: 30px;padding-bottom: 10px;padding-top: 10px;">Top wear
                            </li>
                               
                                <li><a href="#">Shirts</a></li>
                                <li><a href="#">T-shirts</a></li>
                                
                              <li style="color: white;font-size:25px;font-weight: bolder;padding-left: 30px;padding-bottom: 10px;padding-top: 10px;">Bottom wear
                              </li>
                              
                                  <li><a href="#">Jeans</a></li>
                                <li><a href="#">Trousers</a></li>
                               <!--  <li><a href="#">Shorts</a></li> -->
                                 <li><a href="#">Track Pants & Joggers</a></li>
                               
                            </ul>

                        </li>

                        <li><a href="#">Accessories</a>
                            <ul class="dropdown">
                                <li><a href="#">Hairs Accessories</a></li>
                                <li><a href="#">Socks & Tights</a></li>
                                <li><a href="#">baby jewellery</a></li>
                                <li><a href="#">Sunglasses</a></li>
                                <li><a href="#">Watches</a></li>
                                <li><a href="#">Cap</a></li>
                            </ul>
                        </li>
                        <li><a href="">Footwear</a>
                        <ul class="dropdown">
                                <li><a href="#">Boys</a></li>
                                <li><a href="#">Girls</a></li>
                        </ul>
                        </li>
                        <li><a href="">Ethnic Wear</a> 
                           <ul class="dropdown">
                                <li><a href="#">Boys</a></li>
                                <li><a href="#">Girls</a></li>
                           </ul>
                        </li>

                        <li><a href="#">Party Wear</a>
                        <ul class="dropdown">
                                <li><a href="#">Boys</a></li>
                                <li><a href="#">Girls</a></li>
                        </ul>
                                
                        </li>
                        

                        
                        
                    <!-- </ul> -->
                </nav>
                <div id="mobile-menu-wrap"></div>
            </div>
        </div>
    </header>
     <!-- Header End -->