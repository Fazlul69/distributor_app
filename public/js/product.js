$(document).on('change', '.productcat', function(){
    var category_id=$(this).val();
    var div=$(this).parent().parent();
          var op=" ";

    $.ajax({
      type:'get',
      url: '/getSubCat',
      data:{'id':category_id},
      success: function(data){
        op+='<option value="0" selected disabled>Choose Subcategory</option>';
                  for(var i=0;i<data.length;i++){
                    op+='<option value="'+data[i].id+'">'+data[i].subcategory_name+'</option>';
        }

        div.find('.productSub').html(" ");
        div.find('.productSub').append(op);

      },

    });

  });

  //item part


  // dashboard part E-commerce

  $(document).on('change', '.ecomCategory', function(){
    var category_id=$(this).val();
    var div=$(this).parent().parent();
          var op=" ";

    $.ajax({
      type:'get',
      url: '/ecomCategory',
      data:{'id':category_id},
      success: function(data){
        op+='<option value="0" selected disabled>Choose Subcategory</option>';
                  for(var i=0;i<data.length;i++){
                    op+='<option value="'+data[i].id+'">'+data[i].subcategory_name+'</option>';
        }

        div.find('.ecomSubCategory').html(" ");
        div.find('.ecomSubCategory').append(op);

      },

    });

  });
  $(document).on('change', '.ecomSubCategory', function(){
    var subCat_id=$(this).val();
    var div=$(this).parent().parent();
          var op=" ";

    $.ajax({
      type:'get',
      url: '/ecomSubCategory',
      data:{'id':subCat_id},
      success: function(data){
        op+='<option value="0" selected disabled>Choose Item</option>';
                  for(var i=0;i<data.length;i++){
                    op+='<option value="'+data[i].id+'">'+data[i].product_name+'</option>';
        }

        div.find('.ecomproductName').html(" ");
        div.find('.ecomproductName').append(op);

      },

    });

  });
  $(document).on('change', '.ecomproductName', function(){
    var ecomPro_id=$(this).val();
    var a=$(this).parent().parent();

    $.ajax({
      type:'get',
      url: '/ecomproductsellprice',
      data:{'id':ecomPro_id},
      success: function(data){
        a.find('.ecomSalePrice').val(data.sell);

      },

    });

  });

  $(document).on('change', '.ecomproductName', function(){
    var ecomPro_id=$(this).val();
    var a=$(this).parent().parent();

    $.ajax({
      type:'get',
      url: '/ecomproductquantity',
      data:{'id':ecomPro_id},
      success: function(data){
        a.find('.ecom_quality').val(data.quantity);

      },

    });

  });
  $(document).on('change', '.ecomproductName', function(){
    var ecomPro_id=$(this).val();
    var a=$(this).parent().parent();

    $.ajax({
      type:'get',
      url: '/ecomsalequantity',
      data:{'id':ecomPro_id},
      success: function(data){
        a.find('.ecomsalesquality').val(data);

        //stock
        var ecomqulity = a.find('.ecom_quality').val();
        var tott = parseInt(ecomqulity) - parseInt(data);
        a.find('.ecom_stock').val(tott);

      },

    });

  });