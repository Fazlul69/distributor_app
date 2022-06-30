$(document).ready(function(){
    $(document).on('change', '.damageVendor', function(){
      var vendor_id=$(this).val();
      var div=$(this).parent().parent();
            var op=" ";

      $.ajax({
        type:'get',
        url: '/findDamageProduct',
        data:{'id':vendor_id},
        success: function(data){
          op+='<option value="0" selected disabled>Choose Category</option>';
          for(var i=0;i<data.length;i++){
            op+='<option value="'+data[i].id+'">'+data[i].product_name+'</option>';
          }

          div.find('.damageProduct').html(" ");
        div.find('.damageProduct').append(op);

        },

      });

    });
});