<!DOCTYPE html>
<html >
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>Admin Home</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<script type="text/javascript">
		function sureToApprove(id){
			if(confirm("Are you sure you want to Approve this request?")){
				window.location.href ='approve.php?id='+id;
			}
		}
	</script>
</head>
<body>
<div id="header">
	<div class="shell">
		
		<?php
			include 'menu.php';
		?>
	</div>
</div>

<div id="container">
	<div class="shell">
		
		<div class="small-nav">
			<a href="index.php">Dashboard</a>
			<span>&gt;</span>
			Client Requests
		</div>
		
		<br />
		
		<div id="main">
			
			<div id="content">
				
				<div class="box">
					<div class="box-head">
						<h2 class="left">Client Requests</h2>
						
					</div>
					
					<div class="table">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<th width="13"><input type="checkbox" class="checkbox" /></th>
								<th>Client Name</th>
								<th>Client Phone</th>
								<th>Car Booked</th>
								<th>Mpesa ID</th>
								<th>Status</th>
								<th width="110" class="ac">Content Control</th>
							</tr>
							<?php
								include '../includes/config.php';
								$select = "SELECT client.client_id,client.fname,client.phone,cars.car_name,cars.hire_cost,client.status 
										FROM client JOIN cars ON client.car_id=cars.car_id";
								$result = $conn->query($select);
								while($row = $result->fetch_assoc()){
							?>
							<tr>
								<td><input type="checkbox" class="checkbox" /></td>
								<td><h3><a href="#"><?php echo $row['fname'] ?></a></h3></td>
								<td><h3><a href="#"><?php echo $row['phone'] ?></a></h3></td>
								<td><?php echo $row['car_name'] ?></td>
								<td><a href="#"><?php echo $row['hire_cost'] ?></a></td>
								<td><a href="#"><?php echo $row['status'] ?></a></td>
								<td><a href="javascript:sureToApprove(<?php echo $row['client_id'];?>)" class="ico del">Approve</a></td>
							</tr>
							<?php
								}
							?>
						</table>
						
						
						
						
				
						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


	
</body>
</html>