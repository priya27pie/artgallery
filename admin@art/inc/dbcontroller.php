<?php
class DBController {
	private $host = "localhost";
	private $user = "dnmsquar_art";
	private $password = "hackit_321";
	private $database = "dnmsquar_art";

	function __construct() {
		GLOBAL $conn;
		$conn = $this->connectDB();
		if(!empty($conn)) {
			$this->selectDB($conn);
		}
	}

	function connectDB() {
			GLOBAL $conn;
		$conn = mysqli_connect($this->host,$this->user,$this->password);
		return $conn;
	}

	function selectDB($conn) {
					GLOBAL $conn;

		mysqli_select_db($conn,$this->database);
	}

	function runQuery($query) {
					GLOBAL $conn;

		$result = mysqli_query($conn,$query);
		while($row=mysqli_fetch_assoc($result)) {
			$resultset[] = $row;
		}
		if(!empty($resultset))
			return $resultset;
	}

	function numRows($query) {
					GLOBAL $conn;

		$result  = mysqli_query($conn,$query);
		$rowcount = mysqli_num_rows($result);
		return $rowcount;
	}
}
?>
