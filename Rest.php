<?php
    /* Header configuration*/
	
    header('Access-Control-Allow-Origin: *'); 
    header("Access-Control-Allow-Credentials: true");
    header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
    header('Access-Control-Max-Age: 1000');
    header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization');
	
	/* include class file and object creation*/
	require_once __DIR__ .'/ClassCsv.php';
	$restapi 	= new ClassCsv();
	$request_method = strtolower($_SERVER['REQUEST_METHOD']);
	
	if($request_method == 'get' && isset($_GET['type'])) {
        $dataArray 	= $restapi->getValue();
		echo json_encode(array_values($dataArray));
    }
	if($request_method == 'post'){
		$id = json_decode(file_get_contents("php://input"));
		$dataArray 	= $restapi->deleteValue($id);
		echo json_encode(array_values($dataArray));		
	}
	if($request_method == 'get' && isset($_GET['add'])) {
        $value 	= $restapi->addvalue();
		if($value == 1){
			$dataArray 	= $restapi->getValue();
			echo json_encode(array_values($dataArray));
		}
    }
?>