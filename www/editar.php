<?php
		$plop = $_GET['plop'];
		$i = $_GET['plus'];
		$op = $_GET['op'];
		$nombre = $_POST['nombre'];
		$plantilla = $_POST['plantilla'];

		//echo 'plop='.$plop.' plus='.$i.' op='.$op;
		if($nombre){
			$sal = "[$nombre]";
			if($plantilla && $plop !== 2){
				$sal .= "($plantilla)";
			}

			if($plop == 1){
				$sal .= "(!)";
			}

			$sal .= "\n";

			for($x = 1; $x <= $i; $x++){
					$xop = $_POST["op$x"];
					$xres = $_POST["res$x"];
					if($xop && $xres){
						$sal .= "$xop=$xres";
						$sal .= "\n";
					}
			}
			$sal .= "\n"."\n";
			//echo $sal;


			$val = $op;
			$borrln = array();
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
			$ini = fopen('./sip.conf', 'a+');
			fwrite($ini, $sal);
			fclose($ini);
			header('Location: ./index.php');
		} else {
			echo "ERROR: El campo de nombre esta vacio";
		}
	?>