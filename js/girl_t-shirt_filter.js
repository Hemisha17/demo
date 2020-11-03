
  $(document).ready(function(){

        $('#filter_data_display');
        var action = 'fetch_data';
        var shop_for='girl';
        var type='t-shirt';
        $('#sortmenu').change(function(){
            filter_data();
        });
        $("#search").on("keyup", function() {
           filter_data();
        });



    function filter_data()
    {
        
        var minimum_price = $('#hidden_min_price').val();
        var maximum_price = $('#hidden_max_price').val();
        var chk_size = get_filter('chk_size');
        var color= get_filter('color');
        var brand = get_filter('brand');
        var sort= $('#sortmenu').val();
        var search=$('#search').val();

        $.ajax({
            url:"filter_fetch_data.php",
            method:"POST",
            data:{action:action, 
                  minimum_price:minimum_price,
                  maximum_price:maximum_price,
                  chk_size:chk_size,
                  color:color,
                  brand:brand,
                  sort:sort,
                  search:search,
                  shop_for:shop_for,
                  type:type
              },

            success:function(data){
                 $('#filter_data_display').html(data);
             
            }

        });
    }



    function get_filter(class_name)
    { 
        var filter = [];
        $('.'+class_name+':checked').each(function(){
            filter.push($(this).val());
        });
        return filter;
    }
   
    $('.filter_all').click(function(){
        filter_data();
    });


   $('#price_range').slider({
       range:true,
       min:0,
       max:2000,
       values:[ 0, 2000],
       step:10,
       stop:function(event,ui)
       {
            $('#price_show').html(ui.values[0] + ' - ' + ui.values[1]);
            $('#hidden_min_price').val(ui.values[0]);
            $('#hidden_max_price').val(ui.values[1]);
            filter_data();
       }
   });

 });    
