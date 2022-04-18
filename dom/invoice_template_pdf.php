<!DOCTYPE html>
<html>
    <head>
        <title>Invoice Details</title>
    </head>
	<body>
		<table width="100%" cellpadding="3" cellspacing="3" border="0">
			<tr>
				<td colspan="3"> 
					<?php 
		
						$path = base_url(!empty(get_academyinfo()->picture)?get_academyinfo()->picture:"assets/images/icons/logo.png");
						$type = pathinfo($path, PATHINFO_EXTENSION);
						$data = file_get_contents($path);
						$base64img = 'data:image/' . $type . ';base64,' . base64_encode($data);
					?>
					<br>
					<img src="<?php echo $base64img; ?>" class="img-responsive" alt="">
			        <br>
			        <address>
			            <strong><?php echo html_escape(get_academyinfo()->title) ?></strong><br>
			            <strong>Address: </strong><?php echo htmlspecialchars_decode(get_academyinfo()->address); ?><br>
			            <strong>Phone: </strong><?php echo htmlspecialchars_decode(get_academyinfo()->phone); ?><br>
			            <strong>Email: </strong><?php echo htmlspecialchars_decode(get_academyinfo()->email); ?><br>
			        </address>
			    </td>
				<td colspan="3" align="right">
					<?php if(!empty($student_info)){ ?>
			            <address>
			            	<h3><strong>Invoice No: <?php echo $invocie_info->invoice_id; ?></strong></h3>
			                <strong>Name: </strong><?php echo $student_info->player_firstname." ".$student_info->player_lastname ?><br>
			                <strong>Phone: </strong><?php echo html_escape(@$student_info->player_contactno); ?> <br>
			                <strong>E-mail: </strong><?php echo html_escape(@$student_info->player_email); ?> <br>
			                <strong>Address: </strong><?php echo html_escape(@$student_info->player_address); ?> <br>
			                <strong>Branch/Location: </strong><?php echo html_escape(@$branch->name); ?> <br>
			            </address>
			       <?php } ?>
				</td>
			</tr>
		</table>
		<table  width="100%" cellpadding="0" cellspacing="0" border="1">
			<thead>
				<tr>
					<th width="60">SL</th>
					<th>Date</th>
					<th>Package Name</th>
					<th style="text-align: right;">Package Price</th>
					<th style="text-align: right;">Paid Amount</th>
					<th style="text-align: center;">Status</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<?php if (!empty($invocie_info)) { ?>
						<td>1</td>
						<td><?php echo html_escape($invocie_info->date); ?></td>
						<td><?php echo html_escape($package_info->package_name); ?></td>
						<td style="text-align: right;"><?php echo html_escape($invocie_info->package_price); ?></td>
						<td style="text-align: right;"><?php echo html_escape($invocie_info->paid_amount); ?></td>
						<td style="text-align: center;">
							<?php 
								if($invocie_info->transaction_status == 1){
									echo "Approved";
								} else {
									echo "Fail";
								}
							?>
						</td>
					<?php } ?>
				</tr>
			</tbody>
		</table>
	</body>
</html>	
