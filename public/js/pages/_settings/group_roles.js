
function check_menu_action_clickable(menu_checked, menu_action_id) {
	// var action_id = menu_action_id.split("_")

	// var real_menu_id = action_id[1]
	// var real_menu_action_id = action_id[2];
	
	// if(menu_checked === false) {
	// 	return false
	// }
}

function check_menu_clickable(menu_checked) {

}

$("#treeview").hummingbird();

$(function() {
	/*
	    Start of Js Index Page
	*/
	
	

	$("#btn-modal-update-group-roles").on("click", function () {
	
		var color = $(this).data("color");
		$("#modal-update-group-roles .modal-content")
			.removeAttr("class")
			.addClass("modal-content modal-col-" + color);
		$("#modal-update-group-roles").modal("show");
	});

	$("#btn-update-group-roles").click(function(){
		$("#modal-update-group-roles").modal("hide");
	
		setTimeout(function() {
			$("#form-update-group-roles").submit();
			// var formSubmit = $('form#form-update-group-roles');
		
			// $.ajax({
			// 	url : hostname+"/settings/group_roles/update_process",
			// 	type: "POST",
			// 	data: formSubmit.serialize(),
	
			// 	success: function (res) {
	
			// 		$("#responseAjax").html(res);
			// 	},
			// 	error: function (jXHR, textStatus, errorThrown) {
			// 		alert(textStatus);
			// 	}
			// });
		}, 500);
	})

});
