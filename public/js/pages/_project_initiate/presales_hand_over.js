
var alfresco = alfresco_url + "/service/api/";

$(function () {
	
	// $(document).on('click','.upload-file',function(){
	// 	var doc_id = $(this).data('docid');
	// 	var notes = $("#presales_ho_notes_"+doc_id).val();
	// 	var target = $("#presales_ho_target_"+doc_id).val();
		
	// 	if ($("#presales_ho_file_"+doc_id).get(0).files.length === 0) {
	// 		alert("No file selected");
	// 	}else{
	// 		generatePresalesHandOverToken(doc_id);
	// 	}
	// });
	

	$("#upload-presales-hand-over-charter-approved-doc").on("click", function () {
		if ($("#presales_hand_over_approved_doc").get(0).files.length === 0) {
			alert("No file selected");
		} else {
			generateApprovedPSHOToken();
		}
	});

	$("#bs_datepicker_container input").datepicker({
		autoclose: true,
		container: "#bs_datepicker_container"
	});

	$("#btn-submit-presales-ho").on("click", function () {
		var color = $(this).data("color");
		$("#modal-submit-presales-ho .modal-content")
			.removeAttr("class")
			.addClass("modal-content modal-col-" + color);
		$("#modal-submit-presales-ho").modal("show");
	});

	$("#confirm-btn-submit-presales-ho").click(function () {
		// var formSubmit = ('#form_submit_presales_ho');
		// $.ajax({
		// 	url: hostname + "/project_initiate/presales_ho/submit",
		// 	type: "POST",
		// 	data: $(formSubmit).serialize(),

		// 	success: function (res) {

		// 		$("#responseAjax").html(res);
		// 	},
		// 	error: function (jXHR, textStatus, errorThrown) {
		// 		alert(textStatus);
		// 	}
		// });
		$("#modal-submit-presales-ho").modal("hide");
		setTimeout(function () {
			$("#form_submit_presales_ho").submit();
		}, 500);
	});

	$("#btn-update-presales-ho").on("click", function () {
		var color = $(this).data("color");
		$("#modal-update-presales-ho .modal-content")
			.removeAttr("class")
			.addClass("modal-content modal-col-" + color);
		$("#modal-update-presales-ho").modal("show");
	});

	$("#confirm-btn-update-presales-ho").click(function () {

		$("#modal-update-presales-ho").modal("hide");
		setTimeout(function () {
			$("#form-update-presales-ho").submit();
		}, 500);
	});

	$("#btn-approve-presales-ho").on("click", function () {
		var color = $(this).data("color");
		$("#modal-approve-presales-ho .modal-content")
			.removeAttr("class")
			.addClass("modal-content modal-col-" + color);
		$("#modal-approve-presales-ho").modal("show");
	});

	$("#confirm-btn-approve-presales-ho").click(function () {
		// var formSubmit = ('#form_submit_presales_ho');
		// $.ajax({
		// 	url: hostname + "/project_initiate/presales_ho/approve",
		// 	type: "POST",
		// 	data: $(formSubmit).serialize(),

		// 	success: function (res) {

		// 		$("#responseAjax").html(res);
		// 	},
		// 	error: function (jXHR, textStatus, errorThrown) {
		// 		alert(textStatus);
		// 	}
		// });
		$("#modal-approve-presales-ho").modal("hide");
		setTimeout(function () {
			$("#form_approve_presales_ho").submit();
		}, 500);
	});

	$("#btn-reject-presales-ho").on("click", function () {
		var color = $(this).data("color");
		$("#modal-reject-presales-ho .modal-content")
			.removeAttr("class")
			.addClass("modal-content modal-col-" + color);
		$("#modal-reject-presales-ho").modal("show");
	});

	$("#confirm-btn-reject-presales-ho").click(function () {
		$("#modal-reject-presales-ho").modal("hide");
		setTimeout(function () {
			$("#form_reject_presales_ho").submit();
		}, 500);
	});

	getPMOPresalesHandover2();
});

/*
function generatePresalesHandOverToken(doc_id){
	var user = {
		"username" : "user-pmo",
		"password" : "p4ssword"
	}
		
	$.ajax({
		url: alfresco+'login',
		type: 'post',
		dataType: "json",
		contentType: "application/json",
		success: function (data) {
			uploadPresalesHandOver(data, doc_id);
		},
		data: JSON.stringify(user)
	});
}
*/

/*
function uploadPresalesHandOver(data, doc_id){
	var ticket = data["data"].ticket;
	var project_date = $("#pc_project_date").val();
	var arr_project_date = project_date.split("/");
	var project_year = arr_project_date[2];
	var project_name = $("#pc_project_name").val();
	var folder_name = project_year+"/"+project_name+"/1. PRE-PROJECT/1.2. PRESALES-SA-PRODUCT-SI HANDOVER";	
	var file_data = $("#presales_ho_file_"+doc_id).prop('files')[0];
	var file_name = file_data.name;
	var extension = file_name.substr( (file_name.lastIndexOf('.') +1) );
	var fname = $("#presales_ho_doc_name_"+doc_id).html()+"."+extension;
	var project_id = $("#pc_id").val();
	var notes = $("#presales_ho_notes_"+doc_id).val();
	var target = $("#presales_ho_target_"+doc_id).val();
	
	var form_data = new FormData();                  
	form_data.append("filedata", file_data);
	form_data.append("siteid", "pmo");
	form_data.append("containerid", "documentLibrary");
	form_data.append("uploaddirectory" , folder_name);
	form_data.append("filename"  , fname);
	form_data.append("contentType", "cm:content");
	
	$.ajax({
		url: alfresco+'upload?alf_ticket='+ticket, 
		dataType: 'json', 
		cache: false,
		contentType: false,
		processData: false,
		data: form_data,                         
		type: 'post',
		success: function(data){
			console.log(data);
			if(data.status.code == 200){
				//alert(data.nodeRef);
				updatePMOPresalesHandover(project_id, doc_id, notes, target);
			}
		},
		statusCode: {
			404: function() {
			  alert("Failed to upload document, check your project folder");
			}
		 }
	});
}
*/

/*
function updatePMOPresalesHandover(project_id, doc_id, notes, target){
	var form_data = new FormData();                  
	form_data.append("project_id", project_id);
	form_data.append("doc_id", doc_id);
	form_data.append("notes", notes);
	form_data.append("target", target);
		
	$.ajax({
		url: base_url+'project_initiate/updatePMOPresalesHandover',
		dataType: 'json', 
		cache: false,
		contentType: false,
		processData: false,
		data: form_data,                         
		type: 'post',
		success: function (data) {
			//console.log(data);
			if(data.success == true){
				alert("Successfully Upload Document");
				//$('#presales_ho_'+doc_id).prop('checked', true);
				$('#presales_is_uploaded_'+doc_id).css("display","");
			}
		}
	});
	
	getPMOPresalesHandover();
}
*/

function getPMOPresalesHandover2() {
	var arrDocId = getArrayDocID2();
	var project_id = $("#pc_id").val();
	var form_data = new FormData();
	form_data.append("project_id", project_id);
	//console.log(arrDocId);
	$.ajax({
		url: hostname + "/project_initiate/getPMOPresalesHandover",
		dataType: "json",
		cache: false,
		contentType: false,
		processData: false,
		data: form_data,
		type: "post",
		success: function (data) {
			var flag_approve = 1;
			$.each(data, function (index, item) {
				$("#presales_is_uploaded_" + item.doc_id).css("display", "");
				if (item.is_handover == 1)
					$("#presales_ho_" + item.doc_id).prop("checked", true);
				else if (item.is_handover == 0) {
					if (item.doc_id != 8) {
						flag_approve = 0;
					}
				}

				$("#presales_ho_notes_" + item.doc_id).val(item.notes);
				$("#presales_ho_target_" + item.doc_id).val(item.target);

				arrDocId.splice($.inArray(item.doc_id, arrDocId), 1);
			});
			//console.log(arrDocId);
			if (arrDocId.length == 0) {
				$("#btn-submit-presales-ho").css("display", "");
			}
			if (flag_approve == 1) {
				$("#btn-approve-presales-ho").css("display", "");
			}
		}
	});
}

function getArrayDocID2() {
	var total_doc = $("#total_doc").val();
	var arrDocId = new Array();
	for (var i = 1; i <= total_doc; i++) {
		var doc_id = $("#presales_doc_id_" + i).val();
		arrDocId.push(doc_id);
	}
	return arrDocId;
}

function generateApprovedPSHOToken() {
	var user = {
		username: "admin",
		password: "admin"
	};

	$.ajax({
		url: alfresco + "login",
		type: "post",
		dataType: "json",
		contentType: "application/json",
		success: function (data) {
			uploadApprovedPSHO(data);
		},
		data: JSON.stringify(user)
	});
}

function uploadApprovedPSHO(data) {
	var ticket = data["data"].ticket;
	var project_date = $("#pc_project_date").val();
	var arr_project_date = project_date.split("/");
	var project_year = arr_project_date[2];
	var project_name = $("#pc_project_name").val();
	var folder_name =
		project_year +
		"/" +
		project_name +
		"/1. PRE-PROJECT/1.2. PRESALES-SA-PRODUCT-SI HANDOVER";
	var file_data = $("#presales_hand_over_approved_doc").prop("files")[0];
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
				alert("Successfully Upload PRESALES HAND OVER Approved Document");
			}
		},
		statusCode: {
			404: function () {
				alert("Failed to upload document, check your project folder");
			}
		}
	});
}
