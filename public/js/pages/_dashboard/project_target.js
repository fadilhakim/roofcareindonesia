$(function () {
	var uri = window.location.href;
	var arr_menu = uri.split("/");
	if(arr_menu[4] == "dashboard" && arr_menu[5] == "project_target"){
		$('#btn-submit-project-target').on('click', function () {
			var color = $(this).data('color');
			$('#modal-submit-project-target .modal-content').removeAttr('class').addClass('modal-content modal-col-' + color);
			$('#modal-submit-project-target').modal('show');
		});

		$('#confirm-btn-submit-project-target').click(function(){
			$('#modal-submit-project-target').modal('hide');
			setTimeout(function(){ 
				$('#form-update-project-target').submit();
			}, 500);
		});

		var current_year = $('#year').val();
		serviceGetTarget(current_year);

		$("#year").change(function() {
			var selected_year = this.value;      
			serviceGetTarget(selected_year);
		});
	}
});

function serviceGetTarget(selected_year){
	$.getJSON(base_url+'dashboard/service_get_target/'+selected_year, function(data) 
	{
		if (data.length>0) {
			$("#selected_year").html(data[0]['year']);
			var target = data[0]['target'];
			if(target/1000000000000 >= 1) {
				var display_target = (target/1000000000000).toFixed(2);
				display_target = display_target + ' T';
			}
			else {
				if(target/1000000000 >= 1) {
					var display_target = (target/1000000000).toFixed(2);
					display_target = display_target + ' M';
				}else {
					var display_target = (target/1000000).toFixed(2);
					display_target = display_target + ' JT';
				}
			}
			$("#selected_target").html(display_target);
		}else{}	
	})	
}