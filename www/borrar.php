<?php
		$val = $_GET['val'];
		$borrln = array();
		//$ini = fopen('./sip.conf', 'w+');
		$f = file("./sip.conf");
		$lineas = count($f);
		for($i=0; $i < $lineas; $i++){
			$tmp =  $f[$i];
			if ($tmp[0] == '['){
				$apartado += 1;
			}
			if($apartado == $val){

					array_push($borrln, $i);
			}
		}
		foreach ($borrln as $val) {
			unset($f[$val]);
		}
file_put_contents('./sip.conf', $f );
		header('Location: ./index.php');
?>