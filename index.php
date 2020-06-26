<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<meta charset="UTF-8">
	<title>PHP Search</title>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2" style="margin-top: 5%;">
				<div class="row">

				<?php
				
				$connection = mysqli_connect('localhost','root','','tutorial');
				if(isset($_POST['search']))
				{
					$searchkey = $_POST['search'];
					$sql = "SELECT * FROM users WHERE name LIKE '%$searchkey%'";
				}
				else{
					$sql = "SELECT * FROM users";
					$searchkey ="";
				}

				$result = mysqli_query($connection,$sql) ;

				?>	

				<form action="" method="POST"> 
					<div class="col-md-6">
						<input type="text" name="search" class='form-control' placeholder="Search By Name" value="<?php echo $searchkey; ?>" > 
					</div>
					<!-- <div class="col-md-6 text-left">
						<button class="btn btn-success">Search</button>
					</div> -->
				</form>

				<br>
				<br>
				</div>
				<table class="table table-bordered">
					<tr>
						<th>Name</th>
						<th>Amount</th>
						<th>City</th>
					</tr>

					<?php while($row = mysqli_fetch_object($result)) { ?>
					<tr>
						<td><?php echo $row->name ?></td>
						<td><?php echo $row->amount ?></td>
						<td><?php echo $row->city ?></td>
					</tr>
					<?php } ?>

				</table>
			</div>
		</div>
	</div>
</body>
</html>