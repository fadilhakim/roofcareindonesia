$(function() {
	/*
	    Start of Js Index Page
	*/
	$(document).on("click", ".delete-user", function() {
		var color = $(this).data("color");
		var user_id = $(this).data("userid");
		var user_name = $(this).data("username");

		$("#modal-delete-user #user_name").html(user_name);
		$("#modal-delete-user #user_id").val(user_id);
		$("#modal-delete-user .modal-content")
			.removeAttr("class")
			.addClass("modal-content modal-col-" + color);
		$("#modal-delete-user").modal("show");
	});

	$("#btn-delete-user").click(function() {
		var user_id = $("#modal-delete-user #user_id").val();
		$("#modal-delete-user").modal("hide");
		setTimeout(function() {
			$("#form_delete_user").submit();
		}, 500);
	});
	/*
	    End of JS Index Pages
	*/

	/*
	    Start of Js Create Page
	*/
	$("#division_id").change(function() {
		var division_id = this.value;
		get_group(division_id);
	});

	$("#sign_image").change(function() {
		var fileExtension = ["jpeg", "png", "gif", "bmp"];
		if (
			$.inArray(
				$(this)
					.val()
					.split(".")
					.pop()
					.toLowerCase(),
				fileExtension
			) == -1
		) {
			alert("Format S-Curve harus berupa : " + fileExtension.join(", "));
			$(this).val("");
			$("#sign_image_view").hide();
		} else {
			readSignatureURL(this);
			$("#sign_image_view").show();
		}
	});

	$("#form-create-user").validate({
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
		$("#modal-create-user .modal-content")
			.removeAttr("class")
			.addClass("modal-content modal-col-" + color);
		$("#modal-create-user").modal("show");
	});

	$("#btn-create-user").click(function() {
		$("#modal-create-user").modal("hide");
		setTimeout(function() {
			$("#form-create-user").submit();
		}, 500);
	});
	/*
	    End of JS Index Pages
	*/

	/*
	    Start of Js Update Page
	*/
	$("#form-update-user").validate({
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
	$("#btn-modal-update-user").on("click", function() {
		var color = $(this).data("color");
		$("#modal-update-user .modal-content")
			.removeAttr("class")
			.addClass("modal-content modal-col-" + color);
		$("#modal-update-user").modal("show");
	});
	$("#btn-update-user").click(function() {
		$("#modal-update-user").modal("hide");
		setTimeout(function() {
			$("#form-update-user").submit();
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
			get_group(data[0].id);
		} else {
		}
	});
}

function get_group(division_id) {
	$.getJSON(base_url + "api/group?division_id=" + division_id, function(data) {
		var dropdown_option = $("#group_id");
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

function readSignatureURL(input) {
	if (input.files && input.files[0]) {
		var reader = new FileReader();

		reader.onload = function(e) {
			$("#sign_image_view").attr("src", e.target.result);
		};
		reader.readAsDataURL(input.files[0]);
	}
}
