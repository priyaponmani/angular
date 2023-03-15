<?php

class ClassCsv {
	function getValue(){
		$input_file = './csv/data.csv';
		if (!($fp = fopen($input_file, 'r'))) {
        die("Can't open file...");
    }
    //read csv headers
    $key = fgetcsv($fp,"1024",",");
    // parse csv rows into array
    $json = array();
        while ($row = fgetcsv($fp,"1024",",")) {
			//	echo "<pre>";print_r($row[0]);echo "</pre>";
        $json[] = array_combine($key, $row);
    }
    // release file handle
    fclose($fp);
	return $json;

	}
	
	function deleteValue($id){
		if($id) {
		$input_file = './csv/data.csv';
		if (!($fp = fopen($input_file, 'r'))) {
			die("Can't open file...");
		}    
    //read csv headers
    $key = fgetcsv($fp,"1024",",");
    // parse csv rows into array
    $json = array();
        while ($row = fgetcsv($fp,"1024",",")) {
			//echo "row".$row[0];
			if($row[0] == $id){
				//echo "yesbreak";
				continue;
			}
        $json[] = array_combine($key, $row);
    }
    // release file handle
    fclose($fp);
	}
	return $json;
	}
	
	function addvalue(){
		$list = array('5','test','In','00098','45','2','Norway');
		$input_file = './csv/data.csv';
		if (!($file = fopen($input_file, 'a'))) {
		die("Can't open file...");
		}
		fputcsv($file, $list);
		fclose($file); 
		return true;		
	}
}
?>