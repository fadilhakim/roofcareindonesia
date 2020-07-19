
var alfresco = alfresco_url + "/service/api/";

$(function () {
	$(document).on("click", ".upload-project-ho-file", function () {
		var doc_id = $(this).data("docid");
		var notes = $("#project_ho_notes_" + doc_id).val();
		var target = $("#project_ho_target_" + doc_id).val();

		if ($("#project_ho_file_" + doc_id).get(0).files.length === 0) {
			alert("No file selected");
		} else {
			generateProjectHandOverToken(doc_id);
		}
	});

	$("#upload-project-hand-over-charter-approved-doc").on("click", function () {
		if ($("#project_hand_over_approved_doc").get(0).files.length === 0) {
			alert("No file selected");
		} else {
			generateApprovedPRHOToken();
		}
	});

	$("#btn-submit-project-ho").on("click", function () { });

	$("#btn-submit-project-ho").on("click", function () {
		var ops_id_submit = $("#ops_id").val();
		var cc_id_submit = $("#cc_id").val();
		$("#ops_id_submit").val(ops_id_submit);
		$("#cc_id_submit").val(cc_id_submit);

		var color = $(this).data("color");
		$("#modal-submit-project-ho .modal-content")
			.removeAttr("class")
			.addClass("modal-content modal-col-" + color);
		$("#modal-submit-project-ho").modal("show");
	});

	$("#confirm-btn-submit-project-ho").click(function () {
		$("#modal-submit-project-ho").modal("hide");

		setTimeout(function () {

			$("#form_submit_project_ho").submit();
		}, 500);
	});

	$("#btn-update-project-ho").on("click", function () {
		var color = $(this).data("color");
		$("#modal-update-project-ho .modal-content")
			.removeAttr("class")
			.addClass("modal-content modal-col-" + color);
		$("#modal-update-project-ho").modal("show");
	});

	$("#confirm-btn-update-project-ho").click(function () {
		$("#modal-update-project-ho").modal("hide");
		setTimeout(function () {
			$("#form-update-project-ho").submit();
		}, 500);
	});

	$("#btn-approve-project-ho-ops").on("click", function () {
		var color = $(this).data("color");
		$("#modal-approve-project-ho .modal-content")
			.removeAttr("class")
			.addClass("modal-content modal-col-" + color);
		$("#modal-approve-project-ho").modal("show");
	});

	$("#btn-approve-project-ho-cc").on("click", function () {
		var color = $(this).data("color");
		$("#modal-approve-project-ho .modal-content")
			.removeAttr("class")
			.addClass("modal-content modal-col-" + color);
		$("#modal-approve-project-ho").modal("show");
	});

	$("#confirm-btn-approve-project-ho").click(function () {
		$("#modal-approve-project-ho").modal("hide");
		setTimeout(function () {
			$("#form_approve_project_ho").submit();
		}, 500);
	});

	$("#btn-reject-project-ho").on("click", function () {
		var color = $(this).data("color");
		$("#modal-reject-project-ho .modal-content")
			.removeAttr("class")
			.addClass("modal-content modal-col-" + color);
		$("#modal-reject-project-ho").modal("show");
	});

	$("#confirm-btn-reject-project-ho").click(function () {
		$("#modal-reject-project-ho").modal("hide");
		setTimeout(function () {
			$("#form_reject_project_ho").submit();
		}, 500);
	});

	getPMOProjectHandover();
});

function generateProjectHandOverToken(doc_id) {
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
			uploadProjectHandOver(data, doc_id);
		},
		data: JSON.stringify(user)
	});
}

function uploadProjectHandOver(data, doc_id) {
	var ticket = data["data"].ticket;
	var project_date = $("#project_charter_date").val();
	var arr_project_date = project_date.split("/");
	var project_year = arr_project_date[2];
	var project_name = $("#project_charter_name").val();
	if (doc_id <= 4) {
		var folder_name =
			project_year +
			"/" +
			project_name +
			"/1. PRE-PROJECT/1.2. PRESALES-SA-PRODUCT-SI HANDOVER";
	} else {
		var folder_name =
			project_year +
			"/" +
			project_name +
			"/5. PROJECT CLOSING/5.2. PROJECT HANDOVER";
	}
	var file_data = $("#project_ho_file_" + doc_id).prop("files")[0];
	/*
	var file_name = file_data.name;
	var extension = file_name.substr( (file_name.lastIndexOf('.') +1) );
	var fname = $("#project_ho_doc_name_"+doc_id).html()+"."+extension;
	*/
	var fname = file_data.name;
	var project_id = $("#project_charter_id").val();
	var notes = $("#project_ho_notes_" + doc_id).val();
	var target = $("#project_ho_target_" + doc_id).val();

	var form_data = new FormData();
	form_data.append("filedata", file_data);
	form_data.append("siteid", "pmo");
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
			//console.log(data);
			if (data.status.code == 200) {
				updatePMOProjectHandover(project_id, doc_id, notes, target);
			}
		},
		statusCode: {
			404: function () {
				alert("Failed to upload document, check your project folder");
			}
		}
	});
}

function updatePMOProjectHandover(project_id, doc_id, notes, target) {
	var form_data = new FormData();
	form_data.append("project_id", project_id);
	form_data.append("doc_id", doc_id);
	form_data.append("notes", notes);
	form_data.append("target", target);

	$.ajax({
		url: hostname + "project_update/updatePMOProjectHandover",
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
				//$('#project_ho_'+doc_id).prop('checked', true);
				$("#project_is_uploaded_" + doc_id).css("display", "");
			}
		}
	});

	getPMOProjectHandover();
}

function getPMOProjectHandover() {
	var arrDocId = getArrayDocID();
	var arrApprovalOps = getArrayDocID();
	var arrApprovalCc = getArrayDocID();
	var project_id = $("#project_charter_id").val();
	var form_data = new FormData();
	form_data.append("project_id", project_id);
	//console.log(arrDocId);
	$.ajax({
		url: hostname + "/project_update/getPMOProjectHandover",
		dataType: "json",
		cache: false,
		contentType: false,
		processData: false,
		data: form_data,
		type: "post",
		success: function (data) {
			$.each(data, function (index, item) {
				$("#project_is_uploaded_" + item.doc_id).css("display", "");
				if (item.is_handover == 1)
					$("#project_ho_" + item.doc_id).prop("checked", true);
				if (item.is_handover_cc == 1)
					$("#project_ho_cc_" + item.doc_id).prop("checked", true);
				$("#project_ho_notes_" + item.doc_id).val(item.notes);
				$("#project_ho_target_" + item.doc_id).val(item.target);

				arrDocId.splice($.inArray(item.doc_id, arrDocId), 1);

				if (item.is_handover == 1)
					arrApprovalOps.splice($.inArray(item.doc_id, arrApprovalOps), 1);

				if (item.is_handover_cc == 1)
					arrApprovalCc.splice($.inArray(item.doc_id, arrApprovalCc), 1);
			});
			//console.log(arrDocId);
			if (arrDocId.length == 0) {
				$("#btn-submit-project-ho").css("display", "");
			}

			if (arrApprovalOps.length == 0) {
				$("#btn-approve-project-ho-ops").css("display", "");
			}

			if (arrApprovalCc.length == 0) {
				$("#btn-approve-project-ho-cc").css("display", "");
			}
		}
	});
}

function getArrayDocID() {
	var total_doc = $("#total_doc").val();
	var arrDocId = new Array();
	for (var i = 1; i <= total_doc; i++) {
		var doc_id = $("#project_doc_id_" + i).val();
		arrDocId.push(doc_id);
	}
	return arrDocId;
}

function generateApprovedPRHOToken() {
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
			uploadApprovedPRHO(data);
		},
		data: JSON.stringify(user)
	});
}

function uploadApprovedPRHO(data) {
	var ticket = data["data"].ticket;
	var project_date = $("#project_charter_date").val();
	var arr_project_date = project_date.split("/");
	var project_year = arr_project_date[2];
	var project_name = $("#project_charter_name").val();
	var folder_name =
		project_year +
		"/" +
		project_name +
		"/5. PROJECT CLOSING/5.2. PROJECT HANDOVER";
	var file_data = $("#project_hand_over_approved_doc").prop("files")[0];
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
	form_data.append("siteid", "pmo");
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
				alert("Successfully Upload PROJECT HAND OVER Approved Document");
			}
		},
		statusCode: {
			404: function () {
				alert("Failed to upload document, check your project folder");
			}
		}
	});
}
