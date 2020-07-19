$(function () {
	$('#btn-save-project-update-exe').on('click', function () {
		var color = $(this).data('color');
		$('#modal-save-project-update-exe .modal-content').removeAttr('class').addClass('modal-content modal-col-' + color);
		$('#modal-save-project-update-exe').modal('show');
	});

	$('#confirm-btn-save-project-update-exe').click(function () {

		// var formSubmit = ('#form-update-project-update-exe');
		// $.ajax({
		// 	url: hostname + "/project_update/executive_summary_update/update/34",
		// 	type: "POST",
		// 	data: $(formSubmit).serialize(),

		// 	success: function (res) {

		// 		$("#responseAjax").html(res);
		// 	},
		// 	error: function (jXHR, textStatus, errorThrown) {
		// 		alert(textStatus);
		// 	}
		// });

		$('#modal-save-project-update-exe').modal('hide');
		setTimeout(function () {
			$('#form-update-project-update-exe').submit();
		}, 500);
	});

	$('#btn-update-project-update-exe').on('click', function () {
		var color = $(this).data('color');
		$('#modal-update-project-update-exe .modal-content').removeAttr('class').addClass('modal-content modal-col-' + color);
		$('#modal-update-project-update-exe').modal('show');
	});

	$('#confirm-btn-update-project-update-exe').click(function () {
		$('#modal-update-project-update-exe').modal('hide');
		setTimeout(function () {
			$('#form-update-project-update-exe').submit();
		}, 500);
	});

	$('#btn-submit-project-update-exe').on('click', function () {
		var color = $(this).data('color');
		$('#modal-submit-project-update-exe .modal-content').removeAttr('class').addClass('modal-content modal-col-' + color);
		$('#modal-submit-project-update-exe').modal('show');
	});

	$('#confirm-btn-submit-project-update-exe').click(function () {
		$('#modal-submit-project-update-exe').modal('hide');
		setTimeout(function () {
			$('#form-submit-project-update-exe').submit();
		}, 500);
	});

	$('#btn-approve-project-update-exe').on('click', function () {
		var color = $(this).data('color');
		$('#modal-approve-project-update-exe .modal-content').removeAttr('class').addClass('modal-content modal-col-' + color);
		$('#modal-approve-project-update-exe').modal('show');
	});

	$('#confirm-btn-approve-project-update-exe').click(function () {
		$('#modal-approve-project-update-exe').modal('hide');
		setTimeout(function () {
			$('#form-approve-project-update-exe').submit();
		}, 500);
	});

	$('#btn-reject-project-update-exe').on('click', function () {
		var color = $(this).data('color');
		$('#modal-reject-project-update-exe .modal-content').removeAttr('class').addClass('modal-content modal-col-' + color);
		$('#modal-reject-project-update-exe').modal('show');
	});

	$('#confirm-btn-reject-project-update-exe').click(function () {
		$('#modal-reject-project-update-exe').modal('hide');
		setTimeout(function () {
			$('#form-reject-project-update-exe').submit();
		}, 500);
	});

	$('#btn-upload-file-progress').on('click', function () {

		var path = "4. EXECUTION & MONITORING/4.2. PROGRESS REPORT";
		if ($("#weekly_report").get(0).files.length === 0) {
			alert("No file selected");
		} else {
			//alert("za warudo , tokio tomarei")
			uploadExecutiveSummary("#weekly_report", path, 1);
		}
	});

	$('#btn-upload-file-mom').on('click', function () {

		var path = "4. EXECUTION & MONITORING/4.1. MOM";
		if ($("#MOM").get(0).files.length === 0) {
			alert("No file selected");
		} else {

			uploadExecutiveSummary("#MOM", path, 2);
		}
	});

	$('#btn-upload-file-cr').on('click', function () {

		var path = "4. EXECUTION & MONITORING/4.5. CHANGE MANAGEMENT";
		if ($("#CR").get(0).files.length === 0) {
			alert("No file selected");
		} else {
			//alert("za warudo , tokio tomarei")
			uploadExecutiveSummary("#CR", path, 3);
		}
	});

	$('#btn-upload-file-closing').on('click', function () {

		var path = "5. PROJECT CLOSING/5.1. PROJECT CLOSING REPORT";
		if ($("#project_closing").get(0).files.length === 0) {
			alert("No file selected");
		} else {
			//alert("za warudo , tokio tomarei")
			uploadExecutiveSummary("#project_closing", path, 4);
		}
	});

	$('#btn-upload-file-others').on('click', function () {

		var path = "4. EXECUTION & MONITORING";
		if ($("#others").get(0).files.length === 0) {
			alert("No file selected");
		} else {
			//alert("za warudo , tokio tomarei")
			uploadExecutiveSummary("#others", path, 5);
		}
	});


	// $("#scurve_image").change(function () {
	// 	var fileExtension = ['jpeg', 'png', 'gif', 'bmp'];
	// 	if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
	// 		alert("Format S-Curve harus berupa : " + fileExtension.join(', '));
	// 		$(this).val('');
	// 		$('#scurve_image_view').hide();
	// 	} else {
	// 		readURL(this);
	// 		$('#scurve_image_view').show();
	// 	}
	// });
});

function createUploadedExecutiveSummary(project_charter_id, doc_id) {

	$.ajax({
		url: hostname + "project_update/executive_summary_create_uploaded",
		data: "project_charter_id=" + project_charter_id + "&doc_id=" + doc_id,
		type: "post",
		dataType: "json",
		contentType: "application/json",
		success: function (data) {
			location.reload()
		},
		error: function (err) {
			alert("failed created uploaded exe summary")
		},
		data: JSON.stringify(user)
	});
}

function generateExecutiveSumToken() {
	return new Promise((resolve, reject) => {
		var user = {
			username: alfresco_username,
			password: alfresco_password
		};

		$.ajax({
			url: alfresco + "login",
			type: "post",
			dataType: "json",
			contentType: "application/json",
			success: function (data) {
				resolve(data)
			},
			error: function (err) {
				reject(console.log(err))
			},
			data: JSON.stringify(user)
		});
	})
}

function uploadExecutiveSummary(element, path, doc_id) {

	var project_date = $("#pc_project_date").val();
	var arr_project_date = project_date.split("-");
	var project_year = arr_project_date[0];
	var project_name = $("#pc_project_name").val();

	generateExecutiveSumToken()
		.then(data => {

			var ticket = data["data"].ticket;
			// My Files

			var folder_name = project_year + "/" + project_name.trim() + "/" + path;
			var file_data = $(element).prop("files")[0];

			var fname = file_data.name;
			var project_id = $("#pc_id").val();

			var form_data = new FormData();
			form_data.append("filedata", file_data);
			form_data.append("siteid", pmo_folder);
			form_data.append("containerid", "documentLibrary");
			form_data.append("uploaddirectory", folder_name);
			form_data.append("filename", fname);
			form_data.append("contentType", "cm:content");

			$.ajax({
				url: alfresco + "upload?alf_ticket=" + ticket,
				dataType: "json",
				cache: false,
				contentType: false,
				processData: false,
				data: form_data,
				type: "post",
				success: function (data) {
					if (data.status.code == 200) {
						alert("Successfully to upload approved document");
						createUploadedExecutiveSummary(project_id, doc_id)

					} else {
						alert("Failed Upload")
					}
				},
				statusCode: {
					404: function () {
						alert("Failed to upload document, check your project folder");
					}
				}
			});
		})
		.catch(err => {
			alert("get token error")
			console.log(err)
		})




}

// function readURL(input) {
// 	if (input.files && input.files[0]) {
// 		var reader = new FileReader();

// 		reader.onload = function (e) {
// 			$('#scurve_image_view').attr('src', e.target.result);
// 		};
// 		reader.readAsDataURL(input.files[0]);
// 	}
// }
