$(document).on('click','#morejob',function(){
    let lastid = $(this).data('id');
    
    $.ajax({
        url:"pages/loadmorejob.php",
        type:"POST",
        data:{blastid:lastid},
        beforeSend:function(){
            $('#morejob').html("Loading..");
        },
        success:function(res){
            if(res != ''){
                $('#morejob').remove();
                $('#joblist').append(res);
            }else{
                $('#morejob').text("No More Post");
            }
        }
    });
});

//search job ajax
$('#searchjob').on('keyup',function(){
    let value = $("#searchjob").val();
    
    $.ajax({
        url:"pages/search.php",
        type:"POST",
        data:{bvalue:value},
        success:function(res){
            $('.svalue').html(res);
        }
    });
   
});