<?php

include 'translations_model.php';
$model = new translations_model();

// get all items
$items = $model->getItems();

// delete item
if(isset($_POST['delete'])){
	$model->deleteItem($_POST['delete']);
}

// Redagavimo funkcija
if(isset($_POST['edit'])){
	$id = $_POST['id'];
	$lang = $_POST['lang_id'];
	$description = $_POST['description'];
	
	$model->editItem($id, $lang, $description);
}

?>