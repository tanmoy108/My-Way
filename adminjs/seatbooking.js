$(document).ready(function () {
var i = 1;
$('#add').click(function () {
  i++;
  $('#dynamic_field').append('<div class="row  mb-3" id="row' + i +
    '"> <div class="col-9"><input type="text" name="name[]" placeholder="Boarding Point Name:" class="form-control address_list" /></div><div class="col-3"><button type="button" name="remove" id="' +
    i + '" class="btn btn-danger btn_remove"><i class="fas fa-minus-circle"></i></button></div></div>');
});
$(document).on('click', '.btn_remove', function () {
  var button_id = $(this).attr("id");
  $('#row' + button_id + '').remove();
});
// $('#submit').click(function () {
//     $('#add_info')[0].reset();
//   });
});

//resubmission problem solution
if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href)
}
