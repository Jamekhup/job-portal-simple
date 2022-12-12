const applyform = document.querySelector("#applyform");
applyform.addEventListener('submit',function(e){
    e.preventDefault();
    let formdata = new FormData(this);

    $.ajax({
        url:"pages/applyjob.php",
        type:"POST",
        data:formdata,
        processData:false,
        contentType:false,
        beforeSend:function(){
            $('.applybtn').text('Please Wait...');
        },
        sucess:function(res){
            $('.applysms').html(res);
            $('.applybtn').text('Apply Now');
        }
        
    });
    $('#applyform')[0].reset();
});