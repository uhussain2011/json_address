$(document).ready(function () {

$('#add-address').submit(function (event) {
event.preventDefault();
  

let validForm = true;


  $('.error').each(function(i,e) {
    $(this).html('');
  });


  $('.firstname').each(function(i,e){
    if( $(this).val() == '') {
      $(this).siblings('small.firstname-error').html('First Name Required');
      validForm = false;
    }
  });


  $('.lastname').each(function(i,e){
    if( $(this).val() == ''  ) {
      $(this).siblings('small.lastname-error').html('Last Name Required');
      validForm = false;
    }
  });

  $('.phone').each(function(i,e){
    if( !isNumeric( $(this).val() ) ) {
      $(this).siblings('small.phone-error').html('Numerical value required');
      validForm = false;
    }
  });


  $('.email').each(function(i,e){
    if( !isEmail( $(this).val() ) ) {
      $(this).siblings('small.email-error').html('Email required');
      validForm = false;
    }
  });


   if(!validForm) {
    return;
    }


var form = $(this);
var adminData = form.serialize();

//console.log(adminData);

$('.name-error').html("");
$('.netvalue-error').html("");


$.ajax({
url: 'create.php',
method: 'POST',
data: adminData,
dataType: 'json',
encode: true,
success: function (data) {
    if(data.success===false) {
        $("#success-alert").removeClass('alert-success').addClass('alert-danger');
      }
$("#success-alert").show().html(data.message);
setTimeout(function() { $("#success-alert").hide(); location.reload() }, 2000);

}

});

});


$('.deleteall-addresses').on('click', function(e) {
  e.preventDefault();
  $.ajax({
    url: 'deleteall.php',
    method: 'post',
    data: {rid: $(this).data('rid')},
    dataType: 'json',
    encode: true,
    success: function (data) {
      if(data.success===false) {
        $("#success-alert").removeClass('alert-success').addClass('alert-danger');
      }
      $("#success-alert").show().html(data.message);
      setTimeout(function() { $("#success-alert").hide(); location.reload() }, 2000);
    }
  });
});

});




function isNumeric(value) {
let regx = /^(([0-9]*)|(([0-9]*)\.([0-9]*)))$/;
return regx.test(value);
}





function isEmail(value){

  let regx = /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/;
  return regx.test(value);
}
