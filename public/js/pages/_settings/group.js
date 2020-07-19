
$(function() {
	/*
	    Start of Js Index Page
	*/
	$(document).on("click", ".delete-group", function() {
		var color = $(this).data("color");
		var group_id = $(this).data("groupid");
		var group_name = $(this).data("groupname");

		$("#modal-delete-group #group_name").html(group_name);
		$("#modal-delete-group #group_id").val(group_id);
		$("#modal-delete-group .modal-content")
			.removeAttr("class")
			.addClass("modal-content modal-col-" + color);
		$("#modal-delete-group").modal("show");
	});

	$("#btn-delete-group").click(function() {
		var group_id = $("#modal-delete-group #group_id").val();
		$("#modal-delete-group").modal("hide");
		setTimeout(function() {
			$("#form_delete_group").submit();
		}, 500);
	});
	/*
	    End of JS Index Pages
	*/

	/*
	    Start of Js Create Page
	*/
	$("#form-create-group").validate({
		rules: {
			checkbox: {
				required: true
			}
		},
		highlight: function(input) {
			$(input)
				.parents(".form-line")
				.addClass("error");
		},
		unhighlight: function(input) {
			$(input)
				.parents(".form-line")
				.removeClass("error");
		},
		errorPlacement: function(error, element) {
			$(element)
				.parents(".form-group")
				.append(error);
		}
	});

	$(".js-modal-buttons").on("click", function() {
		var color = $(this).data("color");
		$("#modal-create-group .modal-content")
			.removeAttr("class")
			.addClass("modal-content modal-col-" + color);
		$("#modal-create-group").modal("show");
	});

	$("#btn-create-group").click(function() {
		$("#modal-create-group").modal("hide");
		setTimeout(function() {
			$("#form-create-group").submit();
		}, 500);
	});
	/*
	    End of JS Index Pages
	*/

	/*
	    Start of Js Update Page
	*/
	$("#form-update-group").validate({
		rules: {
			checkbox: {
				required: true
			}
		},
		highlight: function(input) {
			$(input)
				.parents(".form-line")
				.addClass("error");
		},
		unhighlight: function(input) {
			$(input)
				.parents(".form-line")
				.removeClass("error");
		},
		errorPlacement: function(error, element) {
			$(element)
				.parents(".form-group")
				.append(error);
		}
	});
	$("#btn-modal-update-group").on("click", function() {
		var color = $(this).data("color");
		$("#modal-update-group .modal-content")
			.removeAttr("class")
			.addClass("modal-content modal-col-" + color);
		$("#modal-update-group").modal("show");
	});
	$("#btn-update-group").click(function() {
		$("#modal-update-group").modal("hide");
		setTimeout(function() {
			$("#form-update-group").submit();
		}, 500);
	});
	/*
	    End of JS Update Pages
	*/

	$(".js-example-basic-single").select2();
});

function get_division() {
	$.getJSON(base_url + "api/division", function(data) {
		var dropdown_option = $("#division_id");
		dropdown_option.empty();
		if (data.length > 0) {
			$.each(data, function(index, item) {
				dropdown_option.append(
					$(
						"<option>",
						{
							value: item.id,
							text: item.value
						},
						"</option>"
					)
				);
			});
		} else {
		}
	});
}
