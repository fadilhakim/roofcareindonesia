$(function() {
	//console.log("i already added ")
})

function read_notification(notification_id,project_url) {

	$.ajax({
		url: hostname+"/notification_box/read_notification",
		method:"post",
		data:"notification_id="+notification_id,
		success:function(res){
			location.href = project_url
			console.log(res)
		},
		error:function(err){
			console.log(err)
		}
		
	})
}
