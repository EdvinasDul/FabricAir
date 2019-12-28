<?php

class translations_model{

	private $DB_SERVER    = 'localhost';
	private $DB_NAME      = 'lang';
	private $DB_USERNAME  = 'root';
	private $DB_PASSWORD  = '';
	private $conn = '';

	function __construct(){
		
		$this->conn = new mysqli($this->DB_SERVER, $this->DB_USERNAME, $this->DB_PASSWORD, $this->DB_NAME);
	}

	public function getItems(){
		$result = array();

		$query = "SELECT * from translations";
		
		$data = $this->conn->query($query);

		foreach ($data as $key)
			array_push($result, $key);
		
		return $result;
	}

	public function deleteItem($item){
		$data = explode(';', $item);

		$query = "DELETE FROM `translations` WHERE PART_ID = '". (int)$data[0]."' and LANG_ID = '". $data[1] ."'";

		$this->conn->query($query);

		header('Location:item_delete_success.php');
		exit;

	}

	public function getItemInfo($item){
		$data = explode(';', $item);

		$query = "SELECT * FROM `translations` WHERE PART_ID = '". (int)$data[0]."' and LANG_ID = '". $data[1] ."'";

		$result = mysqli_fetch_assoc($this->conn->query($query));	
 
		return $result;

	}

	public function editItem($id, $lang, $description){

		$query = "UPDATE `translations` SET PART_DESCRIPTION = '".$description."' WHERE PART_ID = '".$id."' and LANG_ID = '".$lang."' ";

		$this->conn->query($query);

		header('Location:item_edit_success.php');
		exit;
	}


}

?>