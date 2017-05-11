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
                        $('#types').append(
                            "<li class='type-size row' typeID = " + $id + "> <span class='col-md-9'>" + $type + 
                            "</span><span class='col-md-1' style='border-width: 1px'> 0 </span>" + 
                            "<span><a href='#' class='close' style='color: black;' aria-hidden='true'>&times;</a></span>"
                            );
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

    $('#size_button').click(function () {

    	var value = $("input[name=size]").val();

    	if(value){

    		$.ajax({
					type: 'GET',
	                url: '/shop/add-size',
	                data: { size: value },
	                success: function (data) {

				        var $size = data['size'];
				        var $id = data['id'];
	                	console.log('success' + $size);
				        // $('#sizes').append("<li class='type-size' sizeID= "+ $id +" >" + $size
				        // 	+ " <a href='#' class='close' aria-hidden='true'>&times;</a></li>");
                        $('#sizes').append(
                            "<li class='type-size row col-md-offset-1' sizeID = " + $id + "> <span class='col-md-9'>" + $size + 
                            "</span><span class='col-md-1' style='border-width: 1px'> 0 </span>" + 
                            "<span><a href='#' class='close' style='color: black;' aria-hidden='true'>&times;</a></span>"
                            );
    				}
    		});
    	}
    });

    $("body").on('click', '#sizes a', function () {

    	if(confirm('Do you want to delete this item?')){

    		var element = $(this).closest("li");
    		var id = $(this).closest("li").attr('sizeID');

    		$.ajax({
					type: 'GET',
	                url: '/shop/remove-size',
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