const rform = document.querySelector('.rform');

rform.addEventListener('submit',ureg);
function ureg(e){
    e.preventDefault();
    
    let name = document.querySelector('#name').value;
    let email = document.querySelector('#email').value;
    let pass = document.querySelector('#pass').value;
    let cpass = document.querySelector('#cpass').value;

    if (!name || !email || !pass || !cpass || pass != cpass) {
        alert('All fields are required or password not match');
    }else{
        $.ajax({
            url:'exe/register.php',
            type:'POST',
            data:{bname:name,bemail:email,bpass:pass},
            beforeSend:function(){
                $('#regbtn').html('please wait..');
            },
            success:function(res){
                $('.sms').html(res);
                rform.reset();
                $('#regbtn').html('Register');
            }
        });
    }
}

