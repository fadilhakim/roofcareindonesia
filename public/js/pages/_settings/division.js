$(function () {
	/*
	    Start of Js Index Page
	*/
	$(document).on('click','.delete-division',function(){
	    var color = $(this).data('color');
		var division_id = $(this).data('divid');
		var division_name =  $(this).data('divname');
		
		$('#modal-delete-division #division_name').html(division_name);
		$('#modal-delete-division #division_id').val(division_id);
        $('#modal-delete-division .modal-content').removeAttr('class').addClass('modal-content modal-col-' + color);
        $('#modal-delete-division').modal('show');
	});
	
	$('#btn-delete-division').click(function(){
        var division_id = $('#modal-delete-division #division_id').val();
		$('#modal-delete-division').modal('hide');
		setTimeout(function(){ 
			$('#form_delete_division').submit();
		}, 500);		
	});
	/*
	    End of JS Index Pages
	*/
	
	/*
	    Start of Js Create Page
	*/
	$('#form-create-division').validate({
        rules: {
            'checkbox': {
                required: true
            }
        },
        highlight: function (input) {
            $(input).parents('.form-line').addClass('error');
        },
        unhighlight: function (input) {
            $(input).parents('.form-line').removeClass('error');
        },
        errorPlacement: function (error, element) {
            $(element).parents('.form-group').append(error);
        }
    });
	
	$('.js-modal-buttons').on('click', function () {
		var color = $(this).data('color');
        $('#modal-create-division .modal-content').removeAttr('class').addClass('modal-content modal-col-' + color);
        $('#modal-create-division').modal('show');
    });
	
	$('#btn-create-division').click(function(){
        $('#modal-create-division').modal('hide');
		setTimeout(function(){ 
			$('#form-create-division').submit();
		}, 500);
	});
	/*
	    End of JS Index Pages
	*/
	
	/*
	    Start of Js Update Page
	*/
	$('#form-update-division').validate({
        rules: {
            'checkbox': {
                required: true
            }
        },
        highlight: function (input) {
            $(input).parents('.form-line').addClass('error');
        },
        unhighlight: function (input) {
            $(input).parents('.form-line').removeClass('error');
        },
        errorPlacement: function (error, element) {
            $(element).parents('.form-group').append(error);
        }
    });
	$('#btn-modal-update-division').on('click', function () {
		var color = $(this).data('color');
        $('#modal-update-division .modal-content').removeAttr('class').addClass('modal-content modal-col-' + color);
        $('#modal-update-division').modal('show');
    });
	$('#btn-update-division').click(function(){
        $('#modal-update-division').modal('hide');
		setTimeout(function(){ 
			$('#form-update-division').submit();
		}, 500);
	});
	/*
	    End of JS Update Pages
	*/
	
});
