<section class="content">
	<div class="container-fluid">
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card">
					<div class="header">
						<h2>
							Monitoring Notifications
						</h2>
					</div>
					<div class="body">
						<div class="table-responsive m-t-25">
							<table class="table table-bordered table-striped table-hover js-basic-example dataTable">
								<thead>
									<tr>
										<th>Milestone Date</th>
										<th>Opty ID</th>
										<th>Project Name</th>
										<th>Customer</th>
										<th>From</th>
										<th>To</th>
										<th>Milestone Status</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody class="table-striped">
									<?php 
									
									foreach($inboxes as $row){ 
									?>


									<tr>
										<td><?=$row["milestone_date"]?></td>
										<td><?=$row["opty_id"]?></td>
										<td><?=$row["project_name"]?></td>
										<td><?=$row["customer"]?></td>
										<td><?=$row["from_user"]?></td>
										<td><?=$row["to_user"]?></td>
										<td>
											<?=$this->services_model->detail_milestone_status_option($row["milestone_status"])->value?>
										</td>
										<td>
											<?php 
												$res = $this->services_model->get_project_status_detail($row["status"]); 
												$text = $res->value;
												if($row["status"] == 1) {
													$bg = "bg-default";
												} else if ($row["status"] == 2) {
													$bg= "bg-warning";
												} else if( $row["status"] == 3) {
													$bg = "bg-success";
												} else if($row["status"] == 4) {
													$bg = "bg-danger";
												}
											?>
											<span class="badge <?=$bg?>"><?=$text?></span>
										</td>
										<td>
											<!-- <a onclick="javascript:read_notification(<?=$row['id']?>,'<?=$row['project_url']?>')"  href="<?=$row["project_url"]?>" style="margin-bottom: 10px;" href="" class="btn btn-success waves-effect">
												<i class="material-icons">gavel</i>
												<span class="icon-name">Approve</span>
											</a> -->

											<a href="<?=$row["project_url"]?>" class="btn btn-primary waves-effect">
												<i class="material-icons">find_in_page</i>
												<span class="icon-name">see detail</span>
											</a>
											
										</td>
									</tr>
									<?php
									}
									?>
									
									
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

