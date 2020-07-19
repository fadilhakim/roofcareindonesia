$(function () {
    $('.js-basic-example').DataTable({
        responsive: true
    });

    //Exportable table
    $('.js-exportable').DataTable({
        dom: 'Bfrtip',
        responsive: true,
        buttons: [
            'copy', "csv", 'excel', 'pdf', 'print'
        ]
	});
	
	$(".js-excel-export").DataTable({
		dom: 'lBfrtip',
		responsive: true,
		
        buttons: [
            'excel', 'print'
        ]
	})
});
