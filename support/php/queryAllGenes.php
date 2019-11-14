<?php
	require("config.php");

	// query qtls that have 
	class Gene {
		var $chromosome;
		var $type;
		var $start;
		var $stop;
		var $name;
		var $mgiName;

		function __construct($chromosome, $type, $start, $stop, $name, $mgiName) {
			$this->chromosome = $chromosome;
			$this->type = $type;
			$this->start = $start;
			$this->stop = $stop;
			$this->name = $name;
			$this->mgiName = $mgiName;
		}
	}

	$data = json_decode(file_get_contents("php://input"));
	$min = $data->min;
	$max = $data->max;

	$returnArray = array();

	$stmt = $pdo->prepare('SELECT * FROM genes LIMIT :rowCount OFFSET :offset');
	$success = $stmt->execute([":rowCount" => $max - $min, ":offset" => $min]);

	if (!$success) {
		echo (json_encode(array("error" => "Could not retrieve snps from database.")));
		die;
	} else {
		while($result = $stmt->fetch())
		{
			$returnArray[] = new Gene($result[0], $result[2], $result[3], $result[4], $result[9], $result[12]);
		}
	}

	echo json_encode($returnArray);
?>