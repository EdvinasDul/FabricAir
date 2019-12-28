<!DOCTYPE html>
<?php 

  include 'translations_controller.php';
  require_once('translations_model.php');
  $itemInfo;

  if(isset($_POST['editInfo']))
    $itemInfo = $model->getItemInfo($_POST['editInfo']);

  //var_dump($itemInfo['PART_DESCRIPTION']);

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
	<div class="container content" style="margin-top: 40px; margin-bottom: 40px;">
      <h2 class="text-center">Edit item description</h2>
        <br>
           <form action="translations_controller.php" method="post">
              <div class="col-sm-12">
                <h4>Description</h4> 
                <input style="height: 40vh;" class="form-control" type="text" name="description"  value="<?php echo $itemInfo['PART_DESCRIPTION'] ?>">
                <input type="hidden" name="id" value="<?php echo $itemInfo['PART_ID'] ?>">
                <input type="hidden" name="lang_id" value="<?php echo $itemInfo['LANG_ID'] ?>">     
              </div>     
              <div class="col-sm-12">
              	<br>
	            <button name="edit" class="btn btn-success" type="submit" title="save">Save changes</button>
	            <a href="index.php"><button class="btn btn-danger" type="button" title="cancel">Cancel</button></a>
              </div>  
          </form>
    </div>
</body>
</html>