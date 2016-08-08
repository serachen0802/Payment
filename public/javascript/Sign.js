

$(function() {
    $.datetimepicker.setLocale('zh-TW');
    $('.datenowpicker').datetimepicker();
      
      
    GetApplyNum();
    var interval = setInterval(function(){
        GetApplyNum();
    },1000);
    
    function GetApplyNum() {
        var aId = $("#aId").val();
         $.ajax({
            url: '../Sign/GetApplyNum',
            type: 'POST',
            dataType: 'json',
            data:{
                aId: aId
            },
            error: function(xhr) {
                // alert(xhr.status);
            },
            success: function(response) {
                
                 if(response[0]['Num']==null){
                     response[0]['Num'] = 0;
                    }
                $("#JoinNum").text(response[0]['Num']);
            }
        })
    }
});