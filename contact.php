<?php
  include('header.php');

  if(isset($_POST['send']))
  {
      $name=$_SESSION['customer_data']['customer_name'];
      $email=$_SESSION['customer_data']['customer_email'];
      $subject=$_POST['subject'];
      $msg=$_POST['msg'];

    $q="insert into tbl_comment(`comment_customer_name`,`comment_customer_email`,`comment_subject`,`comment_msg`) values('$name','$email','$subject','$msg')";
    
    $q1=mysqli_query($con,$q);

    if($q1)
    {
       // header('location:index.php');
        $msg="Your comment send successfully!!!";
       
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
                        <span>Contact</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Map Section Begin -->
    <div class="map spad">
        <div class="container">
            <div class="map-inner">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d48158.305462977965!2d-74.13283844036356!3d41.02757295168286!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c2e440473470d7%3A0xcaf503ca2ee57958!2sSaddle%20River%2C%20NJ%2007458%2C%20USA!5e0!3m2!1sen!2sbd!4v1575917275626!5m2!1sen!2sbd"
                    height="610" style="border:0" allowfullscreen="">
                </iframe>
                <div class="icon">
                    <i class="fa fa-map-marker"></i>
                </div>
            </div>
        </div>
    </div>
    <!-- Map Section Begin -->

    <!-- Contact Section Begin -->
    <section class="contact-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="contact-title">
                        <h4>Contacts Us</h4>
                        <p>Contrary to popular belief, Lorem Ipsum is simply random text. It has roots in a piece of
                            classical Latin literature from 45 BC, maki years old.</p>
                    </div>
                    <div class="contact-widget">
                        <div class="cw-item">
                            <div class="ci-icon">
                                <i class="ti-location-pin"></i>
                            </div>
                            <div class="ci-text">
                                <span>Address:</span>
                                <p>60-49 Road 11378 New York</p>
                            </div>
                        </div>
                        <div class="cw-item">
                            <div class="ci-icon">
                                <i class="ti-mobile"></i>
                            </div>
                            <div class="ci-text">
                                <span>Phone:</span>
                                <p>+65 11.188.888</p>
                            </div>
                        </div>
                        <div class="cw-item">
                            <div class="ci-icon">
                                <i class="ti-email"></i>
                            </div>
                            <div class="ci-text">
                                <span>Email:</span>
                                <p>hellocolorlib@gmail.com</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 offset-lg-1">
                    <div class="contact-form">
                        <div class="leave-comment">
                            <h4>Leave A Comment</h4>
                           
    <?php
       if(isset($msg))
       { ?>
            <div style="color: black;font-weight: bolder;width: 100%;height: 50px;background-color: lightblue;padding-top: 10px;text-align: center;"><?php echo $msg; ?></div>
      <?php  } ?>
      <br/>

                         <form action="#" class="comment-form" method="post" id="comment">
                             <div class="row">
                                <div class="col-lg-12">
                                  <input type="text" placeholder="Your name" name="name" id="name" value="<?php echo $_SESSION['customer_data']['customer_name']; ?>">
                                </div>
                                <div class="col-lg-12">
                                  <input type="email" placeholder="Your email" name="email" id="email" value="<?php echo $_SESSION['customer_data']['customer_email']; ?>">
                                </div>
                                <div class="col-lg-12">
                                  <input type="text" placeholder="Subject" name="subject" id="subject">
                                </div>
                                <div class="col-lg-12">
                                  <textarea placeholder="Your message" name="msg" id="msg"></textarea>

                                   <button type="submit" class="site-btn" name="send" id="send">Send message</button>
                                </div>
                            </div>
                         </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->



 <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="js/jquery.validate.js"></script>


<script>

    
    $("#comment").validate({
        rules:{
          name:{
            required:true
          },
          email:{
            required:true,
            email:true
          },
          subject:{
            required:true
            
          },
           msg:{
            required:true
          }
         
        },

        messages:{
          
          name:{
            required:"<div style='color:red;font-weight: bold;'>Full Name should not be blank</div>"
          },
          email:
          { 
             required:"<div style='color:red;font-weight: bold'>Email should not be blank</div>",
             email:"<div style='color:red;font-weight: bold'>Please entetr valid email address</div>"
          },
           subject:
          { 
             required:"<div style='color:red;font-weight: bold'>Subject should not be blank</div>"
          },
           msg:
          { 
             required:"<div style='color:red;font-weight: bold;'> Message should not be blank</div>"
          }
        }   

    });
  
 </script>

<?php
   include('footer.php');
?>