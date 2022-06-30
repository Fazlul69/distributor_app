
$('form').on('click', '.addRowforsale', function(){
    $('input.purchase_quality').val('');
    $('input.sales_quality').val('');

    let $newRow = $('div.add:first').clone();
    
    $newRow.find('select.productVendor').val('');
    $newRow.find('select.productCategory').val('');
    $newRow.find('select.productName').val('');
    $newRow.find('input.p_stock').val('');
    $newRow.find('input.p_price').val('');
    $newRow.find('input.quantity').val('');
    $newRow.find('input.sale_total').val('');

    $newRow.find('input.purchase_quality').val('');
    $newRow.find('input.sales_quality').val('');

    
    $('.invoice_table').append($newRow);
});

//note

$('form').on('click', '.addNote', function(){

    let $newNote = $('div.hgDqw:first').clone();
    $newNote.find('select.bhFre').val('');
    $newNote.find('input.sdLju').val('');

    
    $('.gtYsd').append($newNote);
});

//note upload

$('form').on('click', '.notesubmit', function(e){
    e.preventDefault();

    let vendor_id = $("select[name=vendor_id]").val();
    let customer_id = $("select[name=customer_id]").val();
    let invoice = $("input[name=note_invoice]").val();
    let payed = $("input[name=note_payed]").val();
    let due = $("input[name=note_due]").val();
    let _token   = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        type:'post',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        url: '/notestore',
        dataType: "text",
        data:{
            _token:_token,
            vendor_id:vendor_id,
            customer_id:customer_id,
            invoice:invoice,
            payed:payed,
            due:due
        },
        success: function(data){
          console.log("dd :"+ data);
        },

      });
});