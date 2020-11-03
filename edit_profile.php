
<?php
  include('header.php');
 
  ob_start();


$customer_id=$_SESSION['customer_data']['customer_id'];
  
    if(isset($_POST['update']))
      {
        $fullname = $_POST['fullname'];
        $gender=$_POST['gender'];
        $email = $_POST['email'];
        $phone=$_POST['phone'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $country = $_POST['country'];
        $pincode=$_POST['pincode'];
        $address = $_POST['address'];
 
     
        $qu="update tbl_customer set `customer_name`='$fullname',`customer_gender`='$gender',`customer_email`='$email',`customer_city`='$city',`customer_state`='$state',`customer_pincode`='$pincode',`customer_country`='$country',`customer_address`='$address',`customer_phone`='$phone' where `customer_id`='$customer_id'";
     
          $qu1=mysqli_query($con,$qu);

          if($qu1)
            {
                header('location:edit_profile.php'); 
            }
            else
           {
              $msg =  "Something Wrong!!";
           } 


         $q = "select * from tbl_customer where `customer_id`='$customer_id'";
         $q1 = mysqli_query($con,$q);
         $q2 = mysqli_fetch_array($q1);
        $_SESSION['customer_data'] = $q2;
        

        }
   


?>

<?php
   if(isset($msg))
   { ?>
        <div style="color: red;font-weight: bolder;width: 100%;height: 50px;background-color: lightyellow;padding-top: 10px;text-align: center;"><?php echo $msg; ?></div>
   <?php  } ?>


<br/><br/>
<form method="post" id="edit_profile">
<div id="sc-edprofile">
  <h1>Edit Your Profile</h1>
  <div class="sc-container">

    
    <input type="text" placeholder="User full name" name="fullname" id="fullname" value="<?php echo $_SESSION['customer_data']['customer_name']; ?>"/>

   <!--  <select name="gender" >
      <option value="">Male</option>
      <option value="">Female</option>
    </select> --><br/>

    <input type="radio" name="gender" id="gender" value="male" 
        <?php if($_SESSION['customer_data']['customer_gender']=='male')
          {
              echo "checked";
          }     ?> 
        > &nbsp;&nbsp;&nbsp;Male

    <input type="radio" name="gender" id="gender" value="female"
         <?php if($_SESSION['customer_data']['customer_gender']=='female'){
               echo "checked";
           } ?>
        > &nbsp;&nbsp;&nbsp;Female

    <input type="text" placeholder="Email Address" name="email" id="email" value="<?php echo $_SESSION['customer_data']['customer_email']; ?>"/>
    <input type="text" placeholder="Phone number" name="phone" id="phone" value="<?php echo $_SESSION['customer_data']['customer_phone']; ?>"/>
  
    
 <select name="city" id="city" name="city" style="width: 225px;">
     <option selected="selected" disabled="disabled">Select City</option>
         <?php
      
           $city = array("Surat", "Mumbai", "Bangalore", "Pune", "Patna", "Vadodara", "Lucknow","Indore");
        
       
              foreach($city as $c){
                                 ?>
                <option <?php if(@$_SESSION['customer_data']['customer_city']== $c){echo "selected";} ?>><?php echo $c;?></option>

             <?php
               }
             ?>
 </select>
                               
  <select name="state" id="state"  name="state" style="width: 225px;">
        <option selected="selected" disabled="disabled">Select State</option>
          <?php
      
            $state = array("Gujarat", "Maharashtra", "Karnatak", "Rajasthan", "Madhya Pradesh", "Tamil Nadu", "Uttar Pradesh","Andhra Pradesh","Delhi","Panjab");
        
       
            foreach($state as $s){
           ?>
             <option <?php if(@$_SESSION['customer_data']['customer_state']== $s){echo "selected";} ?>><?php echo $s;?></option>

          <?php
              }
         ?>
  </select>
    <select name="country" id="country"  name="country" style="width: 225px;">
      <option selected="selected" disabled="disabled">Select Country</option>
       <?php
      
        $country = array("India", "United States", "Austrelia", "France", "Canada", "Germany", "Malaysia");
        
       
         foreach($country as $ctr){
       ?>
          <option <?php if(@$_SESSION['customer_data']['customer_country']== $ctr){echo "selected";} ?>><?php echo $ctr;?></option>

       <?php
        }
       ?>
 </select>

    <input type="text" placeholder="Pincode" name="pincode" id="pincode" value="<?php echo $_SESSION['customer_data']['customer_pincode']; ?>" />

    <input type="text" placeholder="Address" name="address" id="address" value="<?php echo $_SESSION['customer_data']['customer_address']; ?>" />
    
    <input type="submit" value="Update" name="update" id="update" />
  </div>
</div>
<br/><br/>

   


 <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="js/jquery.validate.js"></script>


<script>

    
    $("#edit_profile").validate({
        rules:{
          fullname:{
            required:true
          },
          email:{
            required:true,
            email:true
          },
          pincode:{
            required:true,
            number:true,
            minlength:6,
            maxlength:6
          },
           address:{
            required:true
          },
           phone:{
            required:true,
            number:true,
            minlength:10,
            maxlength:10
          }
         
        },

        messages:{
          
          fullname:{
            required:"<div style='color:red;font-weight: bold;'>Full Name should not be blank</div>"
          },
          email:
          { 
             required:"<div style='color:red;font-weight: bold'>Email should not be blank</div>",
             email:"<div style='color:red;font-weight: bold'>Please entetr valid email address</div>"
          },
           pincode:
          { 
             required:"<div style='color:red;font-weight: bold'>Pincode should not be blank</div>",
             number:"<div style='color:red;font-weight: bold;'> Pincode must be number</div>",
             minlength:"<div style='color:red;font-weight: bold;'>6 character required</div>",
             maxlength:"<div style='color:red;font-weight: bold;'>6   character required</div>"
          },
           address:
          { 
             required:"<div style='color:red;font-weight: bold;'> Address should not be blank</div>"
          },
           phone:
          { 
             required:"<div style='color:red;font-weight: bold;'> Phone number should not be blank</div>",
             number:"<div style='color:red;font-weight: bold;'> Phone number must be number</div>",
             minlength:"<div style='color:red;font-weight: bold;'>10 character required</div>",
             maxlength:"<div style='color:red;font-weight: bold;'>10 character required</div>"
          }
          
        }   

    });
  
 </script>


<?php
  include('footer.php');
?>