<?php
	$doorbell=1;
	if (isset($_POST["doorbellid"])) {
		$doorbell=$_POST["doorbellid"];
	}
	
	$lsSQL = "select * from bells WHERE doorbellid=".$doorbell." order by id desc limit 50;";
	echo "Running SQL:".$lsSQL;
	try {
	   	$db = new PDO('mysql:host=localhost;dbname=ruinerb_doorbell;charset=utf8', 'ruinerb_doorbell', 'd00rb3ll');
	} catch(PDOException $ex) {
	    echo "An Error occured connecting!";
	    echo $ex->getMessage();
	}
	$stmt = $db->query($lsSQL);
	$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
	echo json_encode($results);
?>