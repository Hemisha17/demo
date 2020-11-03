

    
    $("#myform").validate({
        rules:{
          email:{
            required:true,
            email:true
          },
          pwd:{
            required:true,
            minlength:5
          }
        },
        messages:{
          email:{
            required:"<div style='color:red;font-weight: bolder;'>email should not be blank</div>",

            email:"<div style='color:red;font-weight: bolder;'>email not valid</div>"
          },
          pwd:
          { 
             required:"<div style='color:red;font-weight: bolder;'>Password should not be blank</div>",

              minlength:"<div style='color:red;font-weight: bolder;'> 5 or more character required</div>"
          }
        }
    });

