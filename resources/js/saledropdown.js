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
          console.log("p quantity: "+pur_pro);
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
          a.find('.p_price').val(data.tp)
        },

      });

    });
    

    // Stock start

    // Stock end
    // for view 
    $(document).on('change', '.customerSelectFromSale', function(){
      var cus_id=$(this).val();
      console.log("a :"+ cus_id);
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
      console.log("b :"+ invoice_id);
      var div=$(this).parent().parent();
      var op=" ";

      $.ajax({
        type:'get',
        url: '/findVendorFromSale',
        data:{'id':invoice_id},
        success: function(data){
         console.log("gg:"+data);
          op+='<option value="0" selected disabled>Choose Vendor</option>';
                    for(var i=0;i<data.length;i++){
                      op+='<option value="'+data[i].vendor_id+'">'+data[i].name+'</option>';
          }

          div.find('.saleVendor').html(" ");
          div.find('.saleVendor').append(op);

        },

      });
    });

    $(document).on('change', '.saleVendor', function(){
      var vendor_id=$(this).val();
      console.log("c :"+ vendor_id);
      var a=$(this).parent().parent();

      $.ajax({
        type:'get',
        url: '/findSaleDue',
        data:{'id':vendor_id},
        success: function(data){
          console.log("dd :"+ data);
          a.find('.saleDue').val(data.due)
        },

      });
    });

    // add in history
    var alldue = [];
    $(document).on('click', '.addHistory', function(){
      var vendor = $('.saleVendor option:selected').text();
      var invoice = $('.saleInvoice').val();
      var due = $('.saleDue').val();

      $('.queryTable tbody').append('<tr><td>'+vendor+'</td><td>'+invoice+'</td><td class="his_due">'+due+'</td></tr>');
      
      alldue.push($('.saleDue').val());
      var sum = 0.00;
      $.each(alldue,function(){sum+=parseFloat(this) || 0;});
      $(".dShyt").append('<p class="totaldueinsale">'+'Total Due: ' +sum+'</p>');
      $(".totaldueinsale").empty();
      $(".dShyt").append('<p class="totaldueinsale">'+'Total Due: ' +sum+'</p>');
      console.log(sum);
    });

});