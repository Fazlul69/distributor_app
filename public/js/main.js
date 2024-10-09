$(document).ready(function(){
    $(document).on('click', '.ecom_cat', function(e){
      e.preventDefault();

      var cat_id = $(this).data('value');
      var div=$(this).parent().parent();
            var op=" ";

      $.ajax({
        type:'get',
        url: '/getEcomCat',
        data:{'id':cat_id},
        success: function(data){

          op+= '<li>';
          for(var i=0;i<data.length;i++){
            op+='<a class="dropdown-item" href="/product/category/show/'+data[i].id+'">'+data[i].subcategory_name+'</a>';
            }
          op+=   '</li>';
          

          div.find('.subcatEcom').html(" ");
          div.find('.subcatEcom').append(op);

        },

      });

    });

    // ///////
    // invoice
    
});