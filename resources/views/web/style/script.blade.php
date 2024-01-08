             <!-- show product in cart -->
<script>
    $(function(){
        $(".add_cart").click(function(){
            var product_id=$(this).attr("id_product");
            // console.log(product_id);

            $.ajax({
                url:"{{route('webs/data_ajax')}}",
                method:"POST",
                data:{product_id : product_id , _token : "{{csrf_token()}}"},
                success:function(data){
                    $("._all_item").load(location.href+" ._all_item",function(){
                          
                      $(function(){
                     $("._remove").click(function(){
                    var remove_pro=$(this).attr("remove_pro");
                   var remove_cart=$(this).closest(".remove_cart");
                     remove_cart.remove();
                     console.log(remove_pro);

                        $.ajax({
                          url:"{{route('webs/delete_cart')}}",
                          method: "POST",
                          data:{remove_pro:remove_pro, _token : "{{csrf_token()}}"},
                          success:function(data){
                            console.log(data);
                            } , 
                            error:function(){

               }
            });
        });
    })




                    });
                } ,




                error:function(error){
                      console.log(error);
                }
            });

        
        });
    });
</script>

            <!-- remove_product_cart -->
<script>
    $(function(){
        $("._remove").click(function(){
            var remove_pro=$(this).attr("remove_pro");
            var remove_cart=$(this).closest(".remove_cart");
            remove_cart.remove();
            console.log(remove_pro);

            $.ajax({
               url:"{{route('webs/delete_cart')}}",
               method: "POST",
               data:{remove_pro:remove_pro, _token : "{{csrf_token()}}"},
               success:function(data){
                    console.log(data);
               } , 
               error:function(){

               }
            });
        });
    })
</script>
              <!-- search in website -->
<script>
 $(function(){
    $(".search_input").keyup(function(){
         var se=$(this).val();
        //  console.log(se);
         $.ajax({
            url:"{{route('webs/search_ajax')}}",
            method:"POST",
            data:{se:se , _token:"{{csrf_token()}}"},
            success:function(data){
                $(".data_search").html(data);
            } ,
            error:function(){

            }


         })
    });
 })
</script>