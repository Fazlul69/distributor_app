$(document).ready(function(){
    $(document).on('change', '.purchaseVendor', function(){
      var vendor_id=$(this).val();

      var div=$(this).parent().parent().parent();
            var op=" ";

      $.ajax({
        type:'get',
        url: '/findvendorwisecategory',
        data:{'id':vendor_id},
        success: function(data){

          op+='<option value="0" selected disabled>Choose Category</option>';
            for(var i=0;i<data.length;i++){
          op+='<option value="'+data[i].id+'">'+data[i].category_name+'</option>';
          }

          div.find('.purchaseCat').html(" ");
          div.find('.purchaseCat').append(op);

        },

      });

    });
    /////
    
    /////////
    $(document).on('change', '.purchaseCat', function(){
      var cat_id=$(this).val();
      console.log(cat_id);
      var div=$(this).parent().parent();
            var op=" ";

      $.ajax({
        type:'get',
        url: '/findCatWiseProduct',
        data:{'id':cat_id},
        success: function(data){
          console.log(data);
          op+='<option value="0" selected disabled>Choose Item</option>';
          for(var i=0;i<data.length;i++){
            op+='<option value="'+data[i].id+'">'+data[i].product_name+'</option>';
          }

          div.find('.productNameforpurchase').html(" ");
          div.find('.productNameforpurchase').append(op);

        },

      });

    });

    /////
    $(document).on('change', '.productNameforpurchase', function(){
      var pro_id=$(this).val();
      var a=$(this).parent().parent();

      $.ajax({
        type:'get',
        url: '/dealerPrice',
        data:{'id':pro_id},
        dataType:'json',
        success: function(data){
          console.log("dp :"+data);
          a.find('.company_price').val(data.buy_price)
        },

      });

    });

    //////
    $(document).on('change', '.productNameforpurchase', function(){
      var pro_id=$(this).val();
      var a=$(this).parent().parent();

      $.ajax({
        type:'get',
        url: '/discountPrice',
        data:{'id':pro_id},
        dataType:'json',
        success: function(data){
          console.log("dis:"+ data);
          a.find('#discount_price').val(data.discount_price)
        },

      });

    });

    //////
    $(document).on('change', '.productNameforpurchase', function(){
      var pro_id=$(this).val();
      var a=$(this).parent().parent();

      $.ajax({
        type:'get',
        url: '/tradePrice',
        data:{'id':pro_id},
        dataType:'json',
        success: function(data){
          a.find('#sell_price').val(data.sell_price)
        },

      });

    });

    ////

    $(document).on('change', '.productNameforpurchase', function(){
      var pro_id=$(this).val();
      var a=$(this).parent().parent();

      $.ajax({
        type:'get',
        url: '/mrpPrice',
        data:{'id':pro_id},
        dataType:'json',
        success: function(data){
          console.log("mrp :"+data);
          a.find('#mrp').val(data.mrp)
        },

      });

    });
});