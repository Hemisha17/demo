<?php 
     ob_start();
      include('header.php');
      include("db.php");
      if(isset($_POST['submit']))
      {
         $spass=$_SESSION['customer_data']['customer_password'];
         $pass=$_POST['password'];
         $npass=$_POST['npass'];
         $cpass=$_POST['cpass'];
       if($spass == $pass)
       {
        if($pass != $npass)
        {
          if($npass == $cpass)
          {
            $id=$_SESSION['customer_data']['customer_id'];
            $qu="update tbl_customer set `customer_password`='$npass' where `customer_id`='$id'";
            $qu1=mysqli_query($con,$qu);
            if($qu1)
            {
              header("location:logout.php");
            }

          }
          else
          {
            $msg="New and confirm password must be same...";
          }
        }
        else
        {
          $msg="old and new password should be differant...Try again";
        }
       }
       else
       {
           $msg="Exsisting and old password must be same...";

       }

      }

?>
        
    <!--main content start-->
    <br/><br/>
<div style="border:2px solid gray;margin:20px;border-radius: 10px;">
  <div align="center" style="font-weight: bolder;font-size: 50px;width: 100%;height:90px;background-color: #e7ab3c;border-bottom: 2px solid gray;color: white;">Change Password</div>

    <section id="main-content">
      <section class="wrapper">
 
       
     <?php
       if(isset($msg))
       { ?>
            <div style="color: red;font-weight: bolder;width: 100%;height: 50px;background-color: lightyellow;padding-top: 10px;text-align: center;"><?php echo $msg; ?></div>
      <?php  } ?>

 <br/><br/>
 
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
             <!--  <h4 class="mb"><i class="fa fa-angle-right"></i> Add Ship Type Data</h4> -->
              <form class="form-horizontal style-form" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label"><b>Enter old Password</b></label>
                  <div class="col-sm-12">
                    <input type="Password" class="form-control" name="password"/>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label"><b>Enter New Password</b></label>
                  <div class="col-sm-12">
                    <input type="Password" class="form-control" name="npass"/>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label"><b>Enter Confirm Password</b></label>
                  <div class="col-sm-12">
                    <input type="Password" class="form-control" name="cpass"/>
                  </div>
                </div>


              
                <div class="form-group">
                  
                 <center>
                    <input type="submit" value="Submit" name="submit" width="50" class="btn btn-success" >
                  
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="index.php">
                     <button class="btn btn-danger " name="reset" type="button">     Cancel
                      </button>
                    </a>
                  </center>
                </div>
              </form>
            </div>
          </div>
         
        </div>
        
      </section>
     
    </section>
   </div>
    <br/><br/>
    <?php include('footer.php');?>
   