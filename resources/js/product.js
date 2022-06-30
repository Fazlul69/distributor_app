$(document).on('change', '.productcat', function(){
    var category_id=$(this).val();
    var div=$(this).parent().parent();
          var op=" ";

    $.ajax({
      type:'get',
      url: '/getSubCat',
      data:{'id':category_id},
      success: function(data){
        console.log(data);
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
  