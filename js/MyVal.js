//custom validation rule - text only

//validation for login functionallity
$(document).ready(function() 
{
      $("#login").validate({
            rules:
            {
                  email:
                  {
                  required:true,
                  },
                  password :"required",
           },
            messages:
            {
                  email:
                  {
                  required:"Plese Enter Email address or User name",	
                  },
                  password :" Enter Password",
            }
      });

      // validation for popup value

      $.validator.addMethod("passMatch", 
            function(value, element) {
                return /^(?=.*?[A-Z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/.test(value);
            }, 
            "Password must be 8-digit alphanumeric, containing at least one capital letter, one number and one symbol."
       );
      
      $.validator.addMethod("epa",function(value, element) {
            if($("#epa").val().length == 7)
            {
                 return /^[a-zA-Z\s]+$/.test(value);
            }
            else if ($("#epa").val().length == 12) {
                 return /^(?=.*?[a-z])(?=.*?\d)[a-z\d]+$/.test(value);
                  
            }
            },
            "EPA must be 7-digit Alphabetical or 12-digit alphanumeric."
            );
      
      $("#generators_form").validate
      ({
            rules:
            {
                  email:
                  {
                  required:true,
                  },
                  password :{
                  required:true,
                  passMatch:true
                  },
                  cpassword:{
                  equalTo: "#password"
                  },
                  "zipcode":{
                  number:true
                  },  
                  "epa_id":{
                  required: true,
                  epa:true
                  },
                  "contact":{
                  number: true
                  },
                  
                  "fax":{
                  number: true
                  }                 
            },
            messages:
            {
                  password :{
                  required:" Enter Password",
                  pattern:"Incorrect pattern"
                  },
                  cpassword :" Enter Confirm Password Same as Password",
                  zipcode:{
                  number: "Plese provide Number only"
                  },
                  epa_id:{
                  required: "Please provide EPA ID Number"
                        
                  },
                  contact:{
                  number: "Plese provide Number only"
                  },
                  fax:{
                  number:     "Plese provide Number only"
                  }
            }
      });

      $("#reset_password").validate
      ({
            rules:
            {
                  new_password :{
                  required:true,
                  passMatch:true
                  },
                  confirm_password:{
                  equalTo: "#password"
                  }
                                
            },
            messages:
            {
                  new_password :{
                  required:" Enter Password",
                  pattern:"Incorrect pattern"
                  },
                  confirm_password :" Enter Confirm Password Same as Password"
            }
      });

});








