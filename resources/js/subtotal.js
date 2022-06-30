$(document).on("keyup change mouseup mousedown mouseout keydown", ".quantity", function() {
  var sum = 0.00;
  $(".sale_total").each(function(){
      sum += +$(this).val();
  });
  $(".sub_total").val(sum);
});

// discount
$(document).on("change keyup blur", "#grand_discount", function() {
  var amd = $('#sub_total').val();
  var disc = $('#grand_discount').val();
  if (disc != '' && amd != '') {
    $('#grand_total').val((parseFloat(amd) - ((parseFloat(amd)) * ((parseFloat(disc))/ 100))));
  }else{
    $('#grand_total').val(parseFloat(amd));
  }
});

//due
$(document).on("change keyup blur", "#payed", function() {
  var amd = $('#grand_total').val();
  var disc = $('#payed').val();
  if (disc != '' && amd != '') {
    $('#due').val((parseFloat(amd).toFixed(2)) - (parseFloat(disc).toFixed(2)));
  }else{
    $('#due').val(parseFloat(amd).toFixed(2));
  }
});


