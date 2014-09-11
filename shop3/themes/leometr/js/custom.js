$(document).ready( function(){

	$("#productsview a.btn").click( function(){
		if( $(this).attr("rel") == "view-grid" ){
			$("#product_list").addClass("view-grid").removeClass("view-list");
		} else {
			$("#product_list").addClass("view-list").removeClass("view-grid");
		}
		return false;
	} );
} );