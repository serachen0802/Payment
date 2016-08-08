
 $(function() {
     

  var interval = setInterval(function(){
 $.ajax({
    url: '../Home/countPeople',
    type: 'POST',
    dataType: 'json',
    error: function(xhr) {
        // alert(xhr.status);
    },
    success: function(response) {
        var result='';
         for(var i = 0; i < response.length;i ++){
             if(response[i]['totalP'] == null){
                 response[i]['totalP'] = 0;
                }
             c=response[i]['aId'];
           
             $('tr[data-id='+c+']').find('.total').text(response[i]['totalP']);
        }
    }
})
  },1000)

$(function() {

    $.datetimepicker.setLocale('zh-TW');

     $('.datenowpicker').datetimepicker({
         minDate: 0
     });
      
});

//收放選擇人員
$("#clickShow").click(function () {

 $("#showId").toggle("slow");
})


//新增表單
 	$('#btn_add').click(function(){
	 	var row = $( "#newMember" ).clone().show();
	  row.appendTo(".SearchForm4");
	});


  
 })
