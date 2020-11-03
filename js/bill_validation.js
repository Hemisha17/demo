$(document).ready(function(){
$( "#placeorder" ).validate({
  rules: {
    fullname: {
      required: true
    },
     email: {
      required: true,
      email:true
    },
     phone: {
      required: true,
      minlength:10,
      maxlength:10
    },
    address: {
      required: true
    },
    country: {
      required: true
    },
     city: {
      required: true
    }
  },
  messages:{
    fullname:{
      required : "<div style='color:red'>Name should not be blank</div>"
    },
    email:{
      required : "<div style='color:red'>Email must be required</div>",
      email:"<div style='color:red;'>Please enter valid email address</div>"
    },
    phone:{
      required : "<div style='color:red'>Phone Number must be required</div>",
      minlength:"<div style='color:red'>10 digit required</div>",
      maxlength:"<div style='color:red'>10 digit required</div>"
    },
    address:{
      required : "<div style='color:red'>Addres  should not be blank</div>"
    },
    country:{
      required : "<div style='color:red'>Please select country</div>"
    },
    city:{
      required : "<div style='color:red'>City must be required</div>"
    }
  }
});
});