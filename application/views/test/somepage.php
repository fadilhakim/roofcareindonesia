<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Some Page</title>
</head>
<body>
    <div>
        <?php print ( "<pre>".print_r($this->session->all_userdata(), true)."</pre>") ?>
    </div>
    <hr>
    <table style="border:1px solid grey; collapse:border-collapse" cellpadding="5" cellborder="1">
        <thead>
            <th> No </th>
            <th> Title </th>
            <th> Action </th>
            <th> Redirect </th>
        </thead>
        <tbody>
            <tr>
                <td> 1 </td>
                <td> Menu Executive Summary Update - Submit</td>
                <td>

                    <?php if($this->authorization->display("exe_summary_update","submit")){ ?>
                    <button> Submit </button>
                    <?php } ?>

                </td>
                <td>
                    <a href="<?=base_url("welcome/executive_summary_update_submit")?>" target="_black"> Go </a>
                </td>
            </tr>
            <tr>
                <td> 1 </td>
                <td> Menu Presales HO - Approve</td>
                <td>

                    <?php if($this->authorization->display("presales_handover","approve")){ ?>
                    <button> Approve  </button>
                    <?php } ?>


                </td>
                <td>
                    <a href="<?=base_url("welcome/presales_ho_approve")?>" target="_black"> Go </a>
                </td>
            </tr>
           
        </tbody>
    </table>
	

	<hr>
	<form action="<?=base_url("welcome/rfs_date_submit")?>" method="post">
		<div class="form-control">
			<label> RFS Date</label>
			<input type="text" name="pc_rfs_date" value="">
		</div>
	</form>
   
</body>
</html>
