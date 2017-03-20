$(document).ready(function(){

//Give API key to browser
$('.api-add-btn').click(function(){
  //Get VARIABLES
  var api_key = $('.u-i-api-key').val();
  var func = 'add';
  if (api_key === ""){
    $('.u-i-api-key').val('No API Key Entered!');
  }else if (api_key === "No API Key Entered!") {
    $('.u-i-api-key').val('No API Key Entered!');
  }else{
    window.location.href = window.location.pathname + "?api_key=" + api_key + "&func=" + func;
  }
});

$('.api-add-btn-red').click(function(){
  //Get VARIABLES
  var api_key = $('.u-i-api-key').val();
  var func = 'delete';
  if (api_key === "" || api_key === "No API Key Entered!" || api_key.length < 31 ){
    api_key = "undefined";
    $('.popup-add-api').removeClass('open');
    $('.add-api-blackout').removeClass('open');
    $('.popup-add-api-AF').removeClass('open');
    $('.add-api-blackout-AF').removeClass('open');
  }else {
    window.location.href = window.location.pathname + "?api_key=" + api_key + "&func=" + func;
  }
});


//Open
$('.add-api').click(function(){
  $('.popup-add-api').addClass('open');
  $('.add-api-blackout').addClass('open');
});

});
