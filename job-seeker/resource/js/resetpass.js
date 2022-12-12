//reset password form submit
const resetpass = document.querySelector("#resetpass");
resetpass.addEventListener('submit', function (e) {
    e.preventDefault();
    
    let email = document.querySelector('#email').value;
    if (!email) {
        alert(" Email is required");
    }else{
        $.ajax({
            url:"exe/request-reset-link.php",
            type:"POST",
            data:{bemail:email},
            beforeSend:function(){
                $('#resbtn').html('Please Wait...');
            },
            success:function(res){
                $('.sms').html(res);
            }
        });
    }
});