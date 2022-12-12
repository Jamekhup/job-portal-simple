const uploadjob = document.querySelector('#uploadjob');
uploadjob.addEventListener('submit',function(e){
    e.preventDefault();
   
    let title = $("#title").val();
    let salary = $("#salary").val();
    let description = $("#description").val();
    let address = $("#address").val();
    let phone = $("#phone").val();
    let email = $("#email").val();

    if(!title || !salary || !description || !address || !phone ||!email){
        alert("All fields are required");
    }else{
        $.ajax({
            url:"pages/uploadjob.php",
            type:"POST",
            data:{btitle:title,bsalary:salary,bdescription:description,baddress:address,bphone:phone,bemail:email},
            beforeSend:function(){
                $('.ujbtn').html("Please Wait..");
            },
            success:function(res){
                $('.sms').html(res);
                $('.ujbtn').html("Upload");
                uploadjob.reset();
            }
        });
    }

});