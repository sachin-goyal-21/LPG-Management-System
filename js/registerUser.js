 $("#cancelModal").click(function() { 
  
 });
 
$("#regNowBtn").click(function() { 

   $('#signInCloseBtn').trigger('click');
   
    
    
});


$("#loginsubmit").click(function() {
   
    var email= $('#email').val();
    var password  = $('#password').val();
     var flag = true;
     var cPage =$('#currentPage').val();
     
     if(email==""){ 
        $('#email').css('border-color','red'); 
        flag = false;
		output = '<div class="error">Please Enter Your Email</div>';
		$("#loginresult").hide().html(output).slideDown();  
		return false;
    }
    
   
    /* pass field validation */
    if(password==""){ 
        $('#password').css('border-color','red'); 
		
        flag = false;
		output = '<div class="error">Please Enter Your Password</div>';
		$("#loginresult").hide().html(output).slideDown();   
		return false;
    }
    
      
     if(flag) 
    {
        
        $.ajax({
            type: 'post',
            url: 'signin.php', 
            dataType: 'json',
            data:{ 
                 
                 email:email,
                 password:password,
                 loginsubmit: 1
             },
            beforeSend: function() {
                 
                $('#loginsubmit').attr('disabled', true);
               
            },
            complete: function() {
                 
                $('#loginsubmit').attr('disabled', false);
               
            },  
            success: function(data)
            {
                if(data.type == 'error')
                {
                   
                    output = '<div class="error">'+data.text+'</div>';
                    $("#loginresult").hide().html(output).slideDown(); 
                    return false;
                }
                else
                {
//                     eval( data.text);
		
                   
//                    output = '<div class="error">'+data.text+'</div>';
//                    $("#loginresult").hide().html(output).slideDown(); 
//                    return true;
                  document.location.href = "userPage.php";
//	             location.reload();
//                     return true;
			
                }

                   
				
                }
        });
    }
     
}); 
 


//reset previously set border colors and hide all message on .keyup()
//$("#contactform input, #contactform textarea").keyup(function() { 
//    $("#contactform input, #contactform textarea").css('border-color',''); 


