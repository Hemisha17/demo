<?php
    include('header.php');
    ob_start();
   //session_start();
   if(isset($_SESSION['customer_data']['customer_name'])!='')
   {
     header('location:index.php');
   }

      if(isset($_POST['signin']))
      {
        $email=$_POST['email'];
        $pwd=$_POST['pwd'];

        $q="select * from tbl_customer where `customer_email`='$email' and `customer_password`='$pwd'"; 
        
        $q1=mysqli_query($con,$q);

        $nor=mysqli_num_rows($q1);
        if($nor == 1)
        {
          //$msg ="Successfully Log In!!!";
          $q2=mysqli_fetch_array($q1);
          $_SESSION['customer_data']=$q2;
          header('location:index.php');

        }
         else
        {
           $msg ="Invalid Email ID or Password!!!";
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
                        <span>Login</span>
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
                <div class="col-lg-6 offset-lg-3">
                    <div class="login-form">
                        <h2>Login</h2>
                        <form method="post" id="myform">
                            <div class="group-input">
                                <label for="username">Email address *</label>
                                <input type="email" id="email" name="email">
                            </div>
                            <div class="group-input">
                                <label for="pass">Password *</label>
                                <input type="password" id="pwd" name="pwd">
                            </div>
                            <div class="group-input gi-check">
                                <div class="gi-more">
                                    <label for="save-pass">
                                        Save Password
                                        <input type="checkbox" id="save-pass">
                                        <span class="checkmark"></span>
                                    </label>
                                    <a href="#" class="forget-pass">Forget your Password</a>
                                </div>
                            </div>
                            <button type="submit" class="site-btn login-btn" name="signin" id="signin">Sign In</button>
                        </form>
                        <div class="switch-login">
                            <a href="./register.php" class="or-login">Or  Create An Account</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Register Form Section End -->

   <?php 
  
      include('footer.php');
   ?>

