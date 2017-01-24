$(document).ready(function(){
    $(".addcart").click(function(e){
    	var codigo = $(this).attr('data-id');
    	alert(codigo);
    });

    $(".btn-update-item").on('click', function(e){
		e.preventDefault();
		
		var id = $(this).data('id');
		var href = $(this).data('href');
		var quantity = $("#product_" + id).val();
		window.location.href = "/cart/update/"+ $(this).attr('data-id')+ "/"+ quantity;
	});
});