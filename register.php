
<!-- <script type="text/javascript" src="js/register_validation.php"></script> -->

<?php
  include('header.php');
  //include('db.php');
  ob_start();

  if(isset($_POST['register']))
  {
     $fullname=$_POST['fullname'];
     $gender=$_POST['gender'];
     $email=$_POST['email'];
     $pwd=$_POST['pwd'];
     $city=$_POST['city'];
     $state=$_POST['state'];
     $country=$_POST['country'];
     $pincode=$_POST['pincode'];
     $address=$_POST['address'];
     $phone=$_POST['phone'];

      $q="insert into tbl_customer(`customer_name`,`customer_gender`,`customer_email`,`customer_password`,`customer_city`,`customer_state`,`customer_pincode`,`customer_country`,`customer_address`,`customer_phone`) values('$fullname','$gender','$email','$pwd','$city','$state','$pincode','$country','$address','$phone')";
    
    $q1=mysqli_query($con,$q);

    if($q1)
    {
       header('location:index.php');
       
    }
    else
    {
         $msg="Somthing wrong!!!";
    }
        

  } 
?>





    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="#"><i class="fa fa-home"></i> Home</a>
                        <span>Register</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Form Section Begin -->

<?php
       if(isset($msg))
       { ?>
            <div style="color: red;font-weight: bolder;width: 100%;height: 50px;background-color: lightyellow;padding-top: 10px;text-align: center;"><?php echo $msg; ?></div>
      <?php  } ?>


    <!-- Register Section Begin -->
    <div class="register-login-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3" >
                    <div class="register-form" >
                        
                        <h2>Register</h2>
                         
                        <form method="post" id="register">


                            <div class="group-input">
                                <label><b>Full Name *</b></label>
                                <input type="text" id="fullname" name="fullname">
                            </div>

                            <div>
                                <label><b>Gender *</b></label>&nbsp;&nbsp;&nbsp;&nbsp;
                               <input type="radio" id="gender" name="gender" value="male">  <b>Male</b>&nbsp;&nbsp;

                               <input type="radio" id="gender" name="gender" value="female">  <b>Female</b>
                            </div><br/>

                            <div class="group-input">
                                <label><b>Email *</b></label>
                                <input type="email" id="email" name="email">
                            </div>
                            <div class="group-input">
                                <label for="pass"><b>Password *</b></label>
                                <input type="password" id="pwd" name="pwd">
                            </div>
                            <div class="group-input">
                                <label for="con-pass"><b>Confirm Password *</b></label>
                                <input type="password" id="cpwd" name="cpwd">
                            </div>

                            <div class="group-input" style="float:left;">
                                <label><b>City *</b></label>
                            

                                <select name="city" id="city" style="width: 160px;">
                                <option selected="selected" disabled="disabled">Select City</option>
                                  <?php
      
                                  $city = array("Surat", "Mumbai", "Bangalore", "Pune", "Patna", "Vadodara", "Lucknow","Indore");
        
       
                              foreach($city as $c){
                                 ?>
                              <option value="<?php echo ($c); ?>"><?php echo $c; ?></option>

                                <?php
                                   }
                                  ?>
                              </select>
                               

                            
                            </div>
                            <div class="group-input" style="float:left;padding-left: 30px;">
                               <label><b>State *</b></label>

                                 <select name="state" id="state"  style="width: 160px;">
                                <option selected="selected" disabled="disabled">Select State</option>
                                  <?php
      
                                  $state = array("Gujarat", "Maharashtra", "Karnatak", "Rajasthan", "Madhya Pradesh", "Tamil Nadu", "Uttar Pradesh","Andhra Pradesh","Delhi","Panjab");
        
       
                              foreach($state as $s){
                                 ?>
                              <option value="<?php echo ($s); ?>"><?php echo $s; ?></option>

                                <?php
                                   }
                                  ?>
                              </select>

                            </div>

                            
                            <div class="group-input" style="padding-left: 30px;padding-left: 380px;">
 
                                  <label><b>Country *</b></label>
                                 <select name="country" id="country"  style="width: 160px;">
                                <option selected="selected" disabled="disabled">Select Country</option>
                                  <?php
      
                                  $country = array("India", "United States", "Austrelia", "France", "Canada", "Germany", "Malaysia");
        
       
                              foreach($country as $c){
                                 ?>
                              <option value="<?php echo ($c); ?>"><?php echo $c; ?></option>

                                <?php
                                   }
                                  ?>
                              </select>

                            </div>

                            <div class="group-input">
                                <label><b>Pincode *</b></label>
                                <input type="text" id="pincode" name="pincode">
                            </div>
                            <div class="group-input">
                                <label><b>Address *</b></label>
                                <textarea id="address" name="address" style="width: 500px;height: 70px;"></textarea>
                            </div>
                            <div class="group-input">
                                <label><b>Phone Number *</b></label>
                                <input type="text" id="phone" name="phone">
                            </div>


                            <button type="submit" class="site-btn register-btn" id="register" name="register">REGISTER</button>
                        </form>

                        <div class="switch-login">
                            <a href="./login.php" class="or-login">Or Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Register Form Section End -->




<!-- Validation For Fields -->


   
<?php

include('footer.php');

?>
 
