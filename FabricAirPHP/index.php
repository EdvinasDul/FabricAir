<!DOCTYPE html>
<?php

include 'translations_controller.php';

if(isset($_GET['array'])){

$items= unserialize(urldecode($_GET['array']));

}

?>
<html>
	<head>
		<title>FabricAir</title>
		<!-- Bootstrap -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/axaj/libs/popper.js/1.14.7/umd/popper.min.js"></script>
		<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

		<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
	</head>
	<body>
		<div class="container" style="margin-top: 40px; margin-bottom: 40px;">
			<h2 class="page-header">List of all Items</h2>
<?php 
			if(empty($items)) {?>
				<h1 style="margin-top: 50px; margin-left: 20vw;">There are no items...</h1>
<?php 		}
			else { ?>
				<table class="table table-striped" id="items_table">
					<thead>
						<tr>
							<th scope="col">Part ID</th>
							<th scope="col">Description</th>
							<th scope="col">Language</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
<?php 					foreach($items as $item){ ?>
						<tr>
							<th scope="row"><?php echo $item['PART_ID']; ?></th>
							<td><?php echo $item['PART_DESCRIPTION']; ?></td>
							<td><?php echo $item['LANG_ID']; ?></td>
							<td style="text-align: center;">
								<form style="display: inline-block; padding: 5px;" action="item_edit.php" method="post">
			                        <button class="btn btn-warning" type="submit" value="<?php echo sprintf("%d;%s", $item['PART_ID'], $item['LANG_ID']); ?>" name="editInfo" >Edit</button>
			                    </form>
								<form style="display: inline-block; padding: 5px;" action="translations_controller.php" method="post" onsubmit=" return confirm('Do you want to delete item?');">
		                       		<button type="submit" value="<?php echo sprintf("%d;%s", $item['PART_ID'], $item['LANG_ID']); ?>" name="delete" class="btn btn-danger">Delete</button>
		                      	</form>
							</td>
						</tr>
<?php 					} ?>
					</tbody>					
				</table>
<?php 		} ?>

		</div>
		<!-- Pagination -->
		<script >
			$(document).ready(function () {
			  $('#items_table').DataTable();
			});
		</script>

	</body>
</html>