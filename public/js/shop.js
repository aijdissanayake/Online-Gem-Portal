$(document).ready(function () {

    $('#type_button').click(function () {

    	var value = $("input[name=type]").val();

    	if(value){

    		$.ajax({
					type: 'GET',
	                url: '/shop/add-type',
	                data: { type: value },
	                success: function (data) {

				        var $type = data['type'];
				        var $id = data['id'];
	                	console.log('success' + $type);
				        $('#types').append("<li class='type' typeID= "+ $id +" >" + $type
				        	+ " <a href='#' class='close' aria-hidden='true'>&times;</a></li>");
    				}
    		});
    	}
    });

    $("body").on('click', '#types a', function () {

    	if(confirm('Do you want to delete this item?')){

    		var element = $(this).closest("li");
    		var id = $(this).closest("li").attr('typeID');

    		$.ajax({
					type: 'GET',
	                url: '/shop/remove-type',
	                data: { id : id },
	                success: function (data) {

				        var $success = data['success'];
	                	console.log($success);
				       	element.remove();
    				}
    		});

    	}
    });

});