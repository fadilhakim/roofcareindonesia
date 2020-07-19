var alfresco = alfresco_url + "/service/api/"

checkProjectScaleLevel()

$(function () {



	$(".money").autoNumeric("init", {
		aForm: true,
		vMax: "999999999999999"
	});

	$(document).on("click", ".upload-file", function () {
		var doc_id = $(this).data("docid");
		var notes = $("#presales_ho_notes_" + doc_id).val();
		var target = $("#presales_ho_target_" + doc_id).val();

		if ($("#presales_ho_file_" + doc_id).get(0).files.length === 0) {
			alert("No file selected");
		} else {
			generatePresalesHandOverToken(doc_id);
		}
	});

	$("#upload-project-charter-approved-doc").on("click", function () {
		if ($("#project_charter_approved_doc").get(0).files.length === 0) {
			alert("No file selected");
		} else {
			generateApprovedPCToken();
		}
	});

	$("#btn-save-project-charter").on("click", function () {
		var color = $(this).data("color");
		$("#modal-save-project-charter .modal-content")
			.removeAttr("class")
			.addClass("modal-content modal-col-" + color);
		$("#modal-save-project-charter").modal("show");
	});

	$("#confirm-btn-save-project-charter").click(function () {
		$("#modal-save-project-charter").modal("hide");
		setTimeout(function () {
			$("#form-create-project-charter").submit();
		}, 500);
	});

	$("#btn-generate-folder-project-charter").on("click", function () {
		var color = $(this).data("color");
		$("#modal-generate-folder-project-charter .modal-content")
			.removeAttr("class")
			.addClass("modal-content modal-col-" + color);
		$("#modal-generate-folder-project-charter").modal("show");
	});

	$("#confirm-btn-generate-folder-project-charter-test").on("click", function () {
		$("#modal-save-project-charter").modal("hide");
		//alert(" hello world")
		generateToken();
	})

	// $("#confirm-btn-generate-folder-project-charter").click(function () {
	// 	//$("#modal-save-project-charter").modal("hide");
	// 	alert(" hello world")
	// 	//generateToken();
	// });

	$("#btn-update-project-charter").on("click", function () {
		var color = $(this).data("color");
		$("#modal-update-project-charter .modal-content")
			.removeAttr("class")
			.addClass("modal-content modal-col-" + color);
		$("#modal-update-project-charter").modal("show");
	});

	$("#confirm-btn-update-project-charter").click(function () {
		// var formSubmit = $('#form_submit_project_charter');
		// $.ajax({
		// 	url : "http://localhost/pmois/project_initiate/project_charter/submit",
		// 	type: "POST",
		// 	data: $(formSubmit).serialize(),

		// 	success: function (res) {

		// 		$("#responseAjax").html(res);
		// 	},
		// 	error: function (jXHR, textStatus, errorThrown) {
		// 		alert(textStatus);
		// 	}
		// });

		$("#modal-update-project-charter").modal("hide");
		setTimeout(function () {
			$("#form-update-project-charter").submit();
		}, 500);
	});

	$("#btn-submit-project-charter").on("click", function () {
		var color = $(this).data("color");
		$("#modal-submit-project-charter .modal-content")
			.removeAttr("class")
			.addClass("modal-content modal-col-" + color);
		$("#modal-submit-project-charter").modal("show");
	});

	$("#confirm-btn-submit-project-charter").click(function () {
		$("#form_submit_project_charter").submit();
		$("#modal-submit-project-charter").modal("hide");
		// setTimeout(function(){
		// UJI TESTING, JANGAN DIHAPUS
		// var formSubmit = $('#form_submit_project_charter');
		// $.ajax({
		// 	url : "http://localhost/pmois/project_initiate/project_charter/submit",
		// 	type: "POST",
		// 	data: $(formSubmit).serialize(),

		// 	success: function (res) {

		// 		$("#responseAjax").html(res);
		// 	},
		// 	error: function (jXHR, textStatus, errorThrown) {
		// 		alert(textStatus);
		// 	}
		// });

		// }, 0);
	});

	$("#btn-approve-project-charter").on("click", function () {

		var pc_pm = $("#pc_project_manager").val()

		var is_approved_gm_presales = $("#is_approved_gm_presales").val()
		var is_approved_gm_delivery = $("#is_approved_gm_delivery").val()

		if (pc_pm === null && (is_approved_gm_delivery == 0 && is_approved_gm_presales == 1)) {
			//alert("pm gak ada");
			color = $("#btn-approve-project-charter").data("color");
			$("#modal-check-approve-project-charter .modal-content")
				.removeAttr("class")
				.addClass("modal-content modal-col-" + color);
			$("#modal-check-approve-project-charter").modal("show")
		}
		else {
			$("#pc_pm_approve").val()
			//alert(pc_pm)
			var color = $("#btn-approve-project-charter").data("color");
			$("#modal-approve-project-charter .modal-content")
				.removeAttr("class")
				.addClass("modal-content modal-col-" + color);
			$("#modal-approve-project-charter").modal("show");
		}

		// $.ajax({
		// 	url: hostname + "/project_initiate/check_project_charter_detail",
		// 	type: "POST",
		// 	data: $("#form-update-project-charter").serialize(),
		// 	//contentType:"application/json",
		// 	success: function (res) {
		// 		if (res.status === true) {
		// 			var color = $("#btn-approve-project-charter").data("color");
		// 			$("#modal-approve-project-charter .modal-content")
		// 				.removeAttr("class")
		// 				.addClass("modal-content modal-col-" + color);
		// 			$("#modal-approve-project-charter").modal("show");
		// 		} else {
		// 			// alert(res.message);
		// 			color = $("#btn-approve-project-charter").data("color");
		// 			$("#modal-check-approve-project-charter .modal-content")
		// 				.removeAttr("class")
		// 				.addClass("modal-content modal-col-" + color);
		// 			$("#modal-check-approve-project-charter").modal("show")
		// 		}
		// 		// check disini
		// 	},
		// 	error: function (jXHR, textStatus, errorThrown) {
		// 		alert(textStatus);
		// 	}
		// });

		// var color = $(this).data('color');
		// $('#modal-approve-project-charter .modal-content').removeAttr('class').addClass('modal-content modal-col-' + color);
		// $('#modal-approve-project-charter').modal('show');
	});

	$("#confirm-btn-approve-project-charter").click(function () {
		// FOR TESTING PURPOSE
		// var formSubmit = ('#form_approve_project_charter');
		// $.ajax({
		// 	url : "http://localhost/pmois/project_initiate/project_charter/approve",
		// 	type: "POST",
		// 	data: $(formSubmit).serialize(),

		// 	success: function (res) {

		// 		$("#responseAjax").html(res);
		// 	},
		// 	error: function (jXHR, textStatus, errorThrown) {
		// 		alert(textStatus);
		// 	}
		// });


		$("#modal-approve-project-charter").modal("hide");
		setTimeout(function () {
			$("#form_approve_project_charter").submit();
		}, 500);
	});

	$("#btn-reject-project-charter").on("click", function () {
		var color = $(this).data("color");
		$("#modal-reject-project-charter .modal-content")
			.removeAttr("class")
			.addClass("modal-content modal-col-" + color);
		$("#modal-reject-project-charter").modal("show");
	});

	$("#confirm-btn-reject-project-charter").click(function () {
		$("#modal-reject-project-charter").modal("hide");
		setTimeout(function () {
			$("#form_reject_project_charter").submit();
		}, 500);
	});

	$(document).on("click", "#add_activity", function () {
		var total_timeframe = $("#total_timeframe").val();
		total_timeframe++;
		var d = new Date();
		var day = d.getDate();
		if (day < 10) day = "0" + day;
		var month = d.getMonth() + 1;
		if (month < 10) month = "0" + month;
		var year = d.getFullYear();
		var today = month + "/" + day + "/" + year;

		var new_row = "";
		new_row += "<tr>";
		new_row +=
			'    <input type="hidden" class="form-control" id="timeframe_id[]" name="timeframe_id[]" value="' +
			total_timeframe +
			'">';
		new_row +=
			'    <td><input type="text" class="form-control" id="timeframe_notes[]" name="timeframe_notes[]" value=""></td>';
		new_row += "    <td>";
		new_row += '        <div class="input-group">';
		new_row +=
			'		    <span class="input-group-addon"><i class="material-icons">date_range</i></span>';
		new_row += '		    <div class="form-line" id="bs_datepicker_container">';
		new_row +=
			'                <input type="text" id="timeframe_date[]" name="timeframe_date[]" class="form-control" value="">';
		new_row += "			</div>";
		new_row += "		</div>";
		new_row += "	</td>";
		new_row += "</tr>";
		$("#table_activity").append(new_row);

		$("#bs_datepicker_container input").datepicker({
			autoclose: true,
			container: "#bs_datepicker_container"
		});

		$("#total_timeframe").val(total_timeframe);
	});

	$("#form-create-project-charter").validate({
		highlight: function (input) {
			$(input)
				.parents(".form-line")
				.addClass("error");
		},
		unhighlight: function (input) {
			$(input)
				.parents(".form-line")
				.removeClass("error");
		},
		errorPlacement: function (error, element) {
			$(element)
				.parents(".form-group")
				.append(error);
		}
	});

	$("#form-update-project-charter").validate({
		highlight: function (input) {
			$(input)
				.parents(".form-line")
				.addClass("error");
		},
		unhighlight: function (input) {
			$(input)
				.parents(".form-line")
				.removeClass("error");
		},
		errorPlacement: function (error, element) {
			$(element)
				.parents(".form-group")
				.append(error);
		}
	});

	$(".js-example-basic-single").select2();
	getPMOPresalesHandover();


});



function delete_project_charter_modal(project_charter_id) {
	// confirm delete project charter 
	var color = "red"
	$("#modal-project-charter-delete .modal-content")
		.removeAttr("class")
		.addClass("model-content modal-col-" + color);
	$("#project_charter_id").val(project_charter_id)
	$("#modal-project-charter-delete").modal("show")

}

function confirm_delete_project_charter() {

	var project_charter_id = $("#project_charter_id").val()

	//alert("confirm : "+project_charter_id)

	$("#modal-project-charter-delete").modal("hide");
	setTimeout(function () {
		$("#form_project_charter_delete").submit();
	}, 500);

}

function checkProjectScaleLevel() {

	//alert("hello")

	var realTcv = $("#total_contract").val()
	if (!realTcv) {
		realTcv = "Rp.0"
	}

	var tcv = parseFloat(realTcv.replace(/[^0-9]+/g, ""));


	// var otcRevenue = parseFloat($("#revenue_otc").val().replace(/[^0-9]+/g, ""));
	// var mrcRevenue = parseFloat($("#revenue_mrc").val().replace(/[^0-9]+/g, ""));
	// var month = parseFloat($("#month_mrc").val().replace(/[^0-9]+/g, ""));


	// if (isNaN(otcRevenue)) {
	// 	otcRevenue = 0
	// }

	// if (isNaN(mrcRevenue)) {
	// 	mrcRevenue = 0
	// }

	// if (isNaN(month)) {
	// 	month = 0
	// 	mrcResult = 0
	// } else {
	// 	mrcResult = Math.floor(mrcRevenue / month)
	// }

	var result = $("#project-scale-result")
	var inputScale = $("#project-scale-input")

	var scale = "S"
	result.html("Small")

	if (tcv >= 5000000000) {
		scale = "L"
		result.html("Large")
	} else if (((1000000000 <= tcv) && (tcv < 5000000000))) {

		result.html("Medium")
		scale = "M"
	} else if (tcv < 1000000000) {
		scale = "S"
		result.html("Small")
	} else {

	}

	$.ajax({
		"url": hostname + "/project_initiate/check_project_scale_data",
		method: "post",
		data: "scale=" + scale,
		dataType: "json",
		success: function (data) {
			//console.log(data.id)
			inputScale.val(data.id)
		}
	})
}

function generateToken() {
	var user = {
		username: alfresco_username,
		password: alfresco_password
	};

	return new Promise(function (resolve, reject) {
		$.ajax({
			url: alfresco + "login",
			type: "post",
			dataType: "json",
			data: JSON.stringify(user),
			contentType: "application/json",
			success: function (data) {

				resolve(generateFolder(data))
			},
			error: function (XMLHttpRequest, textStatus, errorThrown) {
				// alert("Status: " + textStatus); alert("Error: " + errorThrown);
				reject("Status: " + textStatus + ", Error: " + errorThrown)
			},

		});
	})
}

function generateFolder(data) {
	var ticket = data["data"].ticket;

	var project_date = $("#pc_project_date").val();
	var arr_project_date = project_date.split("/");
	var project_year = arr_project_date[2];
	var project_name = $("#pc_project_name").val();
	var arr_parent_folder = new Array(
		"PRE-PROJECT",
		"CONTRACT",
		"INITIATION & PLANNING",
		"EXECUTION & MONITORING",
		"PROJECT CLOSING"
	);

	setTimeout(function () {
		generateProjectYearFolder(ticket, project_year)
	}, 500)

	setTimeout(function () {
		generateProjectNameFolder(ticket, project_year, project_name);
	}, 1000);

	setTimeout(function () {

		generateProjectParentFolder(
			ticket,
			project_year,
			project_name,
			arr_parent_folder
		);
	}, 2000);

	setTimeout(function () {

		generateProjectChildFolder(
			ticket,
			project_year,
			project_name,
			arr_parent_folder
		);

	}, 3000);


	setTimeout(function () {
		$("#modal-generate-folder-project-charter").modal("hide");
		alert("Folder berhasil dibuat");
	}, 3500)

	// //console.log(err)
	// $("#modal-generate-folder-project-charter").modal("hide");
	// alert("Folder Gagal dibuat")

}

function generateProjectYearFolder(ticket, year) {
	var project_year = year;
	var project_year_folder = {
		name: project_year,
		title: project_year,
		description: project_year,
		type: "cm:folder"
	};
	return new Promise(function (resolve, reject) {
		$.ajax({
			url: alfresco + "site/folder/" + pmo_folder + "/documentLibrary/" + "" + "?alf_ticket=" + ticket,
			type: "post",
			dataType: "json",
			contentType: "application/json",
			data: JSON.stringify(project_year_folder),
			success: function (data) {
				resolve(data)
			},
			error: function (XMLHttpRequest, textStatus, errorThrown) {
				// alert("Status: " + textStatus); alert("Error: " + errorThrown);
				reject(console.log("generateProjectYearFolder => Status: " + textStatus + ", Error: " + errorThrown))
			},
		});
	})
}

function generateProjectNameFolder(ticket, year, name) {
	var project_year = year;
	var project_name = name.trim();
	var project_name_folder = {
		name: project_name,
		type: "cm:folder"
	};

	return new Promise(function (resolve, reject) {
		$.ajax({
			url:
				alfresco +
				"site/folder/" + pmo_folder + "/documentLibrary/" +
				project_year +
				"?alf_ticket=" +
				ticket,
			type: "post",
			dataType: "json",
			contentType: "application/json",
			success: function (data) {
				resolve(data)
			},
			error: function (XMLHttpRequest, textStatus, errorThrown) {
				// alert("Status: " + textStatus); alert("Error: " + errorThrown);
				reject("generateProjectNameFolder => Status: " + textStatus + ", Error: " + errorThrown)
			},

			data: JSON.stringify(project_name_folder)
		});
	})


}

function generateProjectParentFolder(ticket, year, name, arr_parent_folder) {
	var project_year = year;
	var project_name = name;
	var j = 1;
	for (var i = 0; i < arr_parent_folder.length; i++) {
		var name = j + ". " + arr_parent_folder[i];
		var name_folder = {
			name: name,
			type: "cm:folder"
		};
		$.ajax({
			url:
				alfresco +
				"site/folder/" + pmo_folder + "/documentLibrary/" +
				project_year +
				"/" +
				project_name +
				"?alf_ticket=" +
				ticket,
			type: "post",
			dataType: "json",
			contentType: "application/json",
			success: function (data) {
				console.log(data)
			},
			error(err) {
				console.log(err)
			},
			data: JSON.stringify(name_folder)
		});
		j++;
	}
}

function generateProjectChildFolder(ticket, year, name, arr_parent_folder) {
	var arr_pre_project = new Array(
		"SALES DOCS",
		"PRESALES-SA-PRODUCT-SI HANDOVER"
	);
	var arr_initiation_planning = new Array(
		"PM",
		"PROCUREMENT",
		"FINANCE",
		"PLANNING",
		"EXTERNAL PARTY"
	);
	var arr_execution_monitoring = new Array(
		"MOM",
		"PROGRESS REPORT",
		"DELIVERY",
		"INSTALLATION SERVICES",
		"CHANGE MANAGEMENT",
		"TRAINING IMPLEMENTATION"
	);
	var arr_project_closing = new Array(
		"PROJECT CLOSING REPORT",
		"PROJECT HANDOVER"
	);
	var project_year = year;
	var project_name = name;
	var j = 1;
	for (var i = 0; i < arr_parent_folder.length; i++) {
		switch (arr_parent_folder[i]) {
			case "PRE-PROJECT":
				var arr_child_folder = arr_pre_project;
				break;
			case "INITIATION & PLANNING":
				var arr_child_folder = arr_initiation_planning;
				break;
			case "EXECUTION & MONITORING":
				var arr_child_folder = arr_execution_monitoring;
				break;
			case "PROJECT CLOSING":
				var arr_child_folder = arr_project_closing;
				break;
		}
		if (arr_parent_folder[i] != "CONTRACT") {
			var y = 1;
			for (var x = 0; x < arr_child_folder.length; x++) {
				var parent_name = j + ". " + arr_parent_folder[i];
				var sub_name = j + "." + y + ". " + arr_child_folder[x];
				var sub_name_folder = {
					name: sub_name,
					type: "cm:folder"
				};
				$.ajax({
					url:
						alfresco +
						"site/folder/" + pmo_folder + "/documentLibrary/" +
						project_year +
						"/" +
						project_name +
						"/" +
						parent_name +
						"?alf_ticket=" +
						ticket,
					type: "post",
					dataType: "json",
					contentType: "application/json",
					success: function (data) { },
					data: JSON.stringify(sub_name_folder)
				});
				y++;
			}
		}
		j++;
	}
}

function generatePresalesHandOverToken(doc_id) {
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
			uploadPresalesHandOver(data, doc_id);
		},
		data: JSON.stringify(user)
	});
}

function uploadPresalesHandOver(data, doc_id) {
	var ticket = data["data"].ticket;
	var project_date = $("#pc_project_date").val();
	var arr_project_date = project_date.split("/");
	var project_year = arr_project_date[2];
	var project_name = $("#pc_project_name").val();
	if (doc_id == 1) {
		var folder_name = project_year + "/" + project_name + "/2. CONTRACT";
	} else {
		var folder_name =
			project_year +
			"/" +
			project_name +
			"/1. PRE-PROJECT/1.2. PRESALES-SA-PRODUCT-SI HANDOVER";
	}
	var file_data = $("#presales_ho_file_" + doc_id).prop("files")[0];
	//console.log(file_data);
	/*
	var file_name = file_data.name;
	var extension = file_name.substr( (file_name.lastIndexOf('.') +1) );
	var fname = $("#presales_ho_doc_name_"+doc_id).html()+"."+extension;
	*/
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
			console.log(data);
			if (data.status.code == 200) {
				//alert(data.nodeRef);
				updatePMOPresalesHandover(project_id, doc_id);
			}
		},
		statusCode: {
			404: function () {
				alert("Failed to upload document, check your project folder");
			}
		}
	});
}

function updatePMOPresalesHandover(project_id, doc_id) {
	var form_data = new FormData();
	form_data.append("project_id", project_id);
	form_data.append("doc_id", doc_id);

	$.ajax({
		url: hostname + "/project_initiate/updatePMOPresalesHandover",
		dataType: "json",
		cache: false,
		contentType: false,
		processData: false,
		data: form_data,
		type: "post",
		success: function (data) {
			//console.log(data);
			if (data.success == true) {
				alert("Successfully Upload Document");
				//$('#presales_ho_'+doc_id).prop('checked', true);
				$("#presales_is_uploaded_" + doc_id).css("display", "");
			}
		}
	});

	getPMOPresalesHandover();
}

function getPMOPresalesHandover() {
	var arrDocId = getArrayDocPresalesID();
	var project_id = $("#pc_id").val();
	var form_data = new FormData();
	form_data.append("project_id", project_id);

	$.ajax({
		url: hostname + "/project_initiate/getPMOPresalesHandover",
		dataType: "json",
		cache: false,
		contentType: false,
		processData: false,
		data: form_data,
		type: "post",
		success: function (data) {
			//console.log(data);
			$.each(data, function (index, item) {
				$("#presales_is_uploaded_" + item.doc_id).css("display", "");
				arrDocId.splice($.inArray(item.doc_id, arrDocId), 1);
			});
			//console.log(arrDocId);
			if (arrDocId.length == 0 || (arrDocId.length == 1 && arrDocId[0] == 8)) {
				$("#btn-submit-project-charter").css("display", "");
			}
		}
	});
}

function getArrayDocPresalesID() {
	var total_doc = $("#total_doc").val();
	var arrDocId = new Array();
	for (var i = 1; i <= total_doc; i++) {
		var doc_id = $("#presales_doc_id_" + i).val();
		arrDocId.push(doc_id);
	}
	//console.log(arrDocId);
	return arrDocId;
}

function generateApprovedPCToken() {
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
			uploadApprovedPC(data);
		},
		data: JSON.stringify(user)
	});
}

function uploadApprovedPC(data) {
	var ticket = data["data"].ticket;
	var project_date = $("#pc_project_date").val();
	var arr_project_date = project_date.split("/");
	var project_year = arr_project_date[2];
	var project_name = $("#pc_project_name").val();
	var folder_name =
		project_year + "/" + project_name + "/3. INITIATION & PLANNING/3.1. PM";
	var file_data = $("#project_charter_approved_doc").prop("files")[0];
	//console.log(file_data);
	/*
	var file_name = file_data.name;
	var extension = file_name.substr( (file_name.lastIndexOf('.') +1) );
	var fname = $("#presales_ho_doc_name_"+doc_id).html()+"."+extension;
	*/
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
			}
		},
		statusCode: {
			404: function () {
				alert("Failed to upload document, check your project folder");
			}
		}
	});
}
