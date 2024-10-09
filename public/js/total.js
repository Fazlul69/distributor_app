// function getTotal() {
//     var price 		= document.getElementById("company_price").value;
//     var quantity 	= document.getElementById("quantity").value;
//     if ( price && quantity ) {
//         var total = price * quantity;
//         document.getElementById("total").value = total;
//     }
// }

$(document).ready(function() {
    $('.p_bill').select2();
});

//Dashboard make ledger
$('select.year').change(function(){
    var year=$(this).val();
    var a=$(this).parent().parent();
    a.find('.yearstore').val(year);
});

$('select.month').change(function(){
    var month=$(this).val();
    var a=$(this).parent().parent();
    var yy = a.find('.yearstore').val();
    $('.lg_table tbody').empty();
    $('.finalBalance').empty();
    
    $.ajax({
        type:'get',
        url: '/getdata',
        data:{'year':yy, 'month':month},
        dataType:'json',
        
        success: function(data){
            // a.find('.lg_p_date').val(data.date)
            console.log(data);
            var pBalance = 0.00;
            for(var i=0;i<data.length;i++){
            $('.lg_table tbody').append('<tr> <td class="p_date">'+data[i].date+'</td> <td>Purchase</td><td>'+data[i].invoice+'</td><td></td><td class="ptotal">'+data[i].grand_total+'</td></tr>');

            pBalance += data[i].grand_total;
            $(".pBalance").append(pBalance);
            $(".pBalance").empty();
            $(".pBalance").append(pBalance);
            }
        },
    });

    $.ajax({
        type:'get',
        url: '/getcollection',
        data:{'year':yy, 'month':month},
        dataType:'json',
        
        success: function(data){
            var cBalance = 0.00;
            console.log(data);
            for(var i=0;i<data.length;i++){
            $('.lg_table tbody').append('<tr> <td>'+data[i].date+'</td> <td>Collection</td><td>'+data[i].sales_invoice+'</td><td>'+data[i].amount+'</td><td></td></tr>');

            cBalance += data[i].amount;
            $(".cBalance").append(cBalance);
            $(".cBalance").empty();
            $(".cBalance").append(cBalance);
            }
        },
    });

    $.ajax({
        type:'get',
        url: '/getexpense',
        data:{'year':yy, 'month':month},
        dataType:'json',
        
        success: function(data){
            var exBalance = 0.00;

            for(var i=0;i<data.length;i++){
            $('.lg_table tbody').append('<tr> <td>'+data[i].date+'</td> <td>'+data[i].details+'</td><td></td><td></td><td>'+data[i].amount+'</td></tr>');

            exBalance += data[i].amount;
            $(".exBalance").append(exBalance);
            $(".exBalance").empty();
            $(".exBalance").append(exBalance);
            }
        },
    });

    $.ajax({
        type:'get',
        url: '/getreplace',
        data:{'year':yy, 'month':month},
        dataType:'json',
        
        success: function(data){
            var repBalance = 0.00;

            for(var i=0;i<data.length;i++){
            $('.lg_table tbody').append('<tr> <td>'+data[i].date+'</td> <td>Replace</td><td></td><td>'+data[i].amount+'</td><td></td></tr>');

            repBalance += data[i].amount;
            $(".repBalance").append(repBalance);
            $(".repBalance").empty();
            $(".repBalance").append(repBalance);
            }
        },
    });
    

});

// $(document).on("click", ".cal_generate", function(){
    $(".cal_generate").click(function(){

        var pb = $(".pBalance").text();
        var cb = $(".cBalance").text();
        var exb = $(".exBalance").text();
        var repb = $(".repBalance").text();

        if(cb.length == '' || exb.length == '' || repb.length == '')
        {
            cb = 0;
            exb = 0;
            repb = 0;
            $(".finalBalance").append("Balance: "+(parseFloat(pb)-parseFloat(cb)+parseFloat(exb)-parseFloat(repb)));
        }
        else if(pb.length == '' || exb.length == '' || repb.length == '')
        {
            pb = 0;
            exb = 0;
            repb = 0;
            $(".finalBalance").append("Balance: "+(parseFloat(pb)-parseFloat(cb)+parseFloat(exb)-parseFloat(repb)));
        }
        else if(pb.length == '' || cb.length == '' || repb.length == '')
        {
            pb = 0;
            cb = 0;
            repb = 0;
            $(".finalBalance").append("Balance: "+(parseFloat(pb)-parseFloat(cb)+parseFloat(exb)-parseFloat(repb)));
        }
        else if(pb.length == '' || cb.length == '' || exb.length == '')
        {
            pb = 0;
            cb = 0;
            exb = 0;
            $(".finalBalance").append("Balance: "+(parseFloat(pb)-parseFloat(cb)+parseFloat(exb)-parseFloat(repb)));
        }
        else{
            $(".finalBalance").append("Balance: "+(parseFloat(pb)-parseFloat(cb)+parseFloat(exb)-parseFloat(repb)));
        }
        
        $(".pBalance").empty();
        $(".cBalance").empty();
        $(".exBalance").empty();
        $(".repBalance").empty();
    });


