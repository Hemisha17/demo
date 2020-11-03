
    $("#register").validate({
        rules:{
          fullname:{
            required:true
          },

          email:{
            required:true,
            email:true
          },
       
          pwd:{
            required:true,
            minlength:5
          },
          cpwd:{
            required:true,
            minlength:5
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
          pwd:
          { 
             required:"<div style='color:red;font-weight: bold;'>Password shold not be blank </div>",
             minlength:"<div style='color:red;font-weight: bold;'>Please enter 5 or more character</div>"
          },
           cpwd:
          { 
             required:"<div style='color:red;font-weight: bold;'> Confirm Password should not be blank</div>",
             minlength:"<div style='color:red;font-weight: bold;'>Please enter 5 or more character</div>"
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
  