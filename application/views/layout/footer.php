

<!-- Jquery Core Js -->
<script src="<?= base_url();?>public/plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap Core Js -->
<script src="<?= base_url();?>public/plugins/bootstrap/js/bootstrap.js"></script>

<!-- Select Plugin Js -->
<script src="<?= base_url();?>public/plugins/bootstrap-select/js/bootstrap-select.js"></script>

<!-- Slimscroll Plugin Js -->
<script src="<?= base_url();?>public/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

<!-- Jquery DataTable Plugin Js -->
<script src="<?= base_url();?>public/plugins/jquery-datatable/jquery.dataTables.js"></script>
<script src="<?= base_url();?>public/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
<script src="<?= base_url();?>public/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
<script src="<?= base_url();?>public/plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
<script src="<?= base_url();?>public/plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
<script src="<?= base_url();?>public/plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
<script src="<?= base_url();?>public/plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
<script src="<?= base_url();?>public/plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
<script src="<?= base_url();?>public/plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

<!-- treeview -->
<script src="<?= base_url();?>public/js/hummingbird-treeview.js"></script>

<!-- Waves Effect Plugin Js -->
<script src="<?= base_url();?>public/plugins/node-waves/waves.js"></script>

<!-- Autosize Plugin Js -->
<script src="<?= base_url();?>public/plugins/autosize/autosize.js"></script>

<!-- Moment Plugin Js -->
<script src="<?= base_url();?>public/plugins/momentjs/moment.js"></script>

<!-- Bootstrap Material Datetime Picker Plugin Js -->
<script src="<?= base_url();?>public/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>

<!-- Bootstrap Datepicker Plugin Js -->
<script src="<?= base_url();?>public/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>

<!-- Autocomplete Select2 Plugin Js -->
<script src="<?= base_url();?>public/plugins/jquery-validation/jquery.validate.js"></script>

<!-- Autocomplete Select2 Plugin Js -->
<script src="<?= base_url();?>public/plugins/select2/select2.js"></script>

<!-- Notify Plugin Js -->
<script src="<?= base_url();?>public/plugins/bootstrap-notify/bootstrap-notify.js"></script>

<!-- Chart Plugins Js -->
<script src="<?= base_url();?>public/plugins/chartjs/Chart.bundle.js"></script>

<!-- Highchart Plugin Js -->
<script src="<?= base_url();?>public/plugins/highcharts/code/highcharts.js"></script>
<script src="<?= base_url();?>public/plugins/highcharts/code/highcharts-3d.js"></script>

<!-- Auto Numeric Plugin Js -->
<script src="<?= base_url();?>public/plugins/auto-numeric/autoNumeric.js"></script>

<!-- Ckeditor -->
<script src="<?= base_url();?>public/plugins/ckeditor/ckeditor.js"></script>

<!-- Custom Js -->
<script src="<?= base_url();?>public/js/admin.js"></script>
<!--<script src="<?= base_url();?>public/js/pages/charts/chartjs.js"></script>-->
<script src="<?= base_url();?>public/js/pages/forms/basic-form-elements.js"></script>
<script src="<?= base_url();?>public/js/pages/tables/jquery-datatable.js"></script>

<script src="<?= base_url();?>public/js/pages/_notification/notification.js"></script>

<!-- Custom JS for Dashboard Menu -->
<script src="<?= base_url();?>public/js/pages/_dashboard/executive_dashboard.js"></script>
<script src="<?= base_url();?>public/js/pages/_dashboard/project_target.js"></script>

<!-- Custom JS for Project Initiate Menu -->
<script src="<?= base_url();?>public/js/pages/_project_initiate/project_charter.js"></script>
<script src="<?= base_url();?>public/js/pages/_project_initiate/presales_hand_over.js"></script>

<!-- Custom JS for Project Update Menu -->
<script src="<?= base_url();?>public/js/pages/_project_update/project_hand_over.js"></script>
<script src="<?= base_url();?>public/js/pages/_project_update/executive_summary_update.js"></script>

<!-- Custom JS for Settings Menu -->
<script src="<?= base_url();?>public/js/pages/_settings/division.js"></script>
<script src="<?= base_url();?>public/js/pages/_settings/group.js"></script>
<script src="<?= base_url();?>public/js/pages/_settings/user.js"></script>
<script src="<?= base_url();?>public/js/pages/_settings/group_roles.js"></script>
<script src="<?= base_url();?>public/js/pages/ui/modals.js"></script>

<!-- Custom Js -->
<script src="<?= base_url();?>public/js/pages/forms/editors.js"></script>

<!-- Demo Js -->
<script src="<?= base_url();?>public/js/demo.js"></script>



<?php
	$message = $this->session->flashdata('message');
	if($message == "login-success"){
?>
	<script type="text/javascript">
	$(document).ready(function(){
		$.notify({
			icon: 'fa fa-angellist',
			message: " Login success"
		},{
			type: 'success',
			timer: 2000
		});
	});
	</script>
<?php
	} else if($message == "add-success"){ ?>
		<script type="text/javascript">
		$(document).ready(function(){
			$.notify({
				icon: 'fa fa-angellist',
				message: " Successfully create a new record"
			},{
				type: 'success',
				timer: 2000
			});
		});
	</script>
<?php
	} else if($message == "add-failed"){ ?>
		<script type="text/javascript">
		$(document).ready(function(){
			$.notify({
				icon: 'fa fa-exclamation',
				message: " Failed to add a new record"
			},{
				type: 'danger',
				timer: 2000
			});
		});
	</script>
<?php
	} else if($message == "edit-success"){ ?>
		<script type="text/javascript">
		$(document).ready(function(){
			$.notify({
				icon: 'fa fa-angellist',
				message: " Successfully update a record"
			},{
				type: 'success',
				timer: 2000
			});
		});
	</script>
<?php
	} else if($message == "delete-success"){ ?>
		<script type="text/javascript">
		$(document).ready(function(){
			$.notify({
				icon: 'fa fa-angellist',
				message: " Successfully delete a record"
			},{
				type: 'success',
				timer: 2000
			});
		});
		</script>
<?php
	}else if($message == "delete-failed"){ ?>
		<script type="text/javascript">
		$(document).ready(function(){
			$.notify({
				icon: 'fa fa-exclamation',
				message: " Failed to delete a record"
			},{
				type: 'danger',
				timer: 2000
			});
		});
		</script>
<?php
		}else if($message == "upload-success"){ ?>
			<script type="text/javascript">
			$(document).ready(function(){
				$.notify({
					icon: 'fa fa-angellist',
					message: " Successfully upload a file"
				},{
					type: 'success',
					timer: 2000
				});
			});
		</script>
<?php
		}else if($message == "upload-failed"){ ?>
			<script type="text/javascript">
			$(document).ready(function(){
				$.notify({
					icon: 'fa fa-exclamation',
					message: " Failed to upload a file"
				},{
					type: 'danger',
					timer: 2000
				});
			});
		</script>
<?php
	}else if($message == "email-success"){ ?>
			<script type="text/javascript">
			$(document).ready(function(){
				$.notify({
					icon: 'fa fa-angellist',
					message: " Successfully send mail"
				},{
					type: 'success',
					timer: 2000
				});
			});
		</script>
<?php
	}else if($message == "email-failed"){ ?>
		<script type="text/javascript">
		$(document).ready(function(){
			$.notify({
				icon: 'fa fa-exclamation',
				message: " Failed to send mail"
			},{
				type: 'danger',
				timer: 2000
			});
		});
	</script>
<?php
	}
?>
</body>

</html>
