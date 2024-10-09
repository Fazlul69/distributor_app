$(document).ready(function(){
    $(document).on('change', '.productVendor', function(){
      var vendor_id=$(this).val();
      var div=$(this).parent().parent();
            var op=" ";

      $.ajax({
        type:'get',
        url: '/findCategory',
        data:{'id':vendor_id},
        success: function(data){

          op+='<option value="0" selected disabled>Choose Category</option>';
                    for(var i=0;i<data.length;i++){
                      op+='<option value="'+data[i].id+'">'+data[i].category_name+'</option>';
          }

          div.find('.productCategory').html(" ");
          div.find('.productCategory').append(op);

        },

      });

    });


    $(document).on('change', '.productCategory', function(){
      var cat_id=$(this).val();
      var div=$(this).parent().parent();
            var op=" ";

      $.ajax({
        type:'get',
        url: '/findProduct',
        data:{'id':cat_id},
        success: function(data){
          console.log("ddd: "+data);
          op+='<option value="0" selected disabled>Choose Item</option>';
                    for(var i=0;i<data.length;i++){
                      op+='<option value="'+data[i].id+'">'+data[i].product_name+'</option>';
          }

          div.find('.productName').html(" ");
          div.find('.productName').append(op);

        },

      });

    });
    ///////
    
    $(document).on('change', '.productName', function(e){
      e.preventDefault();
      var pro_id=$(this).val();
      var a=$(this).parent().parent();

      $.ajax({
        type:'get',
        url: '/purchaseProduct',
        data:{'id':pro_id},
        dataType:'json',
        success: function(data){
          a.find('.purchase_quality').val(data.quantity)
        },
        

      });

    });
    // data from sale table check stock
    $(document).on('change', '.productName', function(e){
      e.preventDefault();
      var pro_id=$(this).val();
      var a=$(this).parent().parent();

      $.ajax({
        type:'get',
        url: '/saleProduct',
        data:{'id':pro_id},
        dataType:'json',
        
        success: function(data){

          a.find('.sales_quality').val(data)

          //stock
          var pur_pro = a.find('.purchase_quality').val();
          var tot = parseInt(pur_pro) - parseInt(data);
          a.find('.p_stock').val(tot);
        },
        

      });

    });

    // ///
    $(document).on('change', '.productName', function(){
      var pro_id=$(this).val();
      var a=$(this).parent().parent();

      $.ajax({
        type:'get',
        url: '/sellPrice',
        data:{'id':pro_id},
        dataType:'json',
        success: function(data){
          a.find('.p_price').val(data.sell_price)
        },

      });

    });
    

    // Stock start

    // Stock end
    // for view 
    $(document).on('change', '.customerSelectFromSale', function(){
      var cus_id=$(this).val();
      var div=$(this).parent().parent();
            var op=" ";

      $.ajax({
        type:'get',
        url: '/findCustomerInView',
        data:{'id':cus_id},
        success: function(data){
          op+='<option value="0" selected disabled>Choose Invoice</option>';
                    for(var i=0;i<data.length;i++){
                      op+='<option value="'+data[i].invoice+'">'+data[i].invoice+'</option>';
          }

          div.find('.saleInvoice').html(" ");
          div.find('.saleInvoice').append(op);

        },

      });
    });

    $(document).on('change', '.saleInvoice', function(){
      var invoice_id=$(this).val();
      var a=$(this).parent().parent();
      var op=" ";

      $.ajax({
        type:'get',
        url: '/findSaleDue',
        data:{'id':invoice_id},
        success: function(data){
          a.find('.saleDue').val(data.grand_total)
        },

      });
    });
    $(document).on('change', '.saleInvoice', function(){
      var invoice_id=$(this).val();
      console.log(invoice_id);
      var a=$(this).parent().parent();
      var op=" ";

      $.ajax({
        type:'get',
        url: '/findSaleDate',
        data:{'id':invoice_id},
        success: function(data){
          a.find('.saleDate').val(data.date);
        },

      });
    });
    $(document).on('change', '.saleInvoice', function(){
      var invoice_id=$(this).val();
      console.log(invoice_id);
      var a=$(this).parent().parent();
      var op=" ";

      $.ajax({
        type:'get',
        url: '/findCollection',
        data:{'id':invoice_id},
        success: function(data){
          console.log("coll: "+ data);
          a.find('.collections').val(data.amount);
        },

      });
    });

    // $(document).on('change', '.saleVendor', function(){
    //   var vendor_id=$(this).val();
    //   var a=$(this).parent().parent();

    //   $.ajax({
    //     type:'get',
    //     url: '/findSaleDue',
    //     data:{'id':vendor_id},
    //     success: function(data){
    //       a.find('.saleDue').val(data.due)
    //     },

    //   });
    // });

    // add in history\
    var formatDate = function(date) {
      return date.getDate() + "-" + date.getMonth() + "-" + date.getFullYear();
    }
    var alldue = [];
    $(document).on('click', '.addHistory', function(){
      var vendor = $('.saleVendor option:selected').text();
      var invoice = $('.saleInvoice').val();
      var timestamp = $('.saleDate').val();
      var date = new Date(timestamp);
      var due = $('.saleDue').val();
      var collections = $('.collections').val();
      
      // $('.queryTable tbody').append('<tr><td>'+date+'</td><td>'+invoice+'</td><td class="his_due">'+due+'</td><td class="collect">'+collections+'</td><td class="closeBalance"></td></tr>');
      
      if(collections != 0){
        var ddf = parseFloat(due)-parseFloat(collections);
        $('.queryTable tbody').append('<tr class="text-center"><td>'+formatDate(date)+'</td><td>'+invoice+'</td><td class="his_due">'+due+'</td><td class="collect">'+collections+'</td><td class="closeBalance">'+ddf+'</td></tr>');
        alldue.push(ddf);
      }
      else{
        $('.queryTable tbody').append('<tr class="text-center"><td>'+formatDate(date)+'</td><td>'+invoice+'</td><td class="his_due">'+due+'</td><td class="collect">'+collections+'</td><td class="closeBalance">'+due+'</td></tr>');
        alldue.push(due);
      }



      
      var sum = 0.00;
      $.each(alldue,function(){sum+=parseFloat(this) || 0;});
      $(".dShyt").append('<p class="totaldueinsale">'+'Total: ' +sum+'</p>');
      $(".totaldueinsale").empty();
      $(".dShyt").append('<p class="totaldueinsale">'+'Total: ' +sum+'</p>');
      console.log(sum);
    });

});