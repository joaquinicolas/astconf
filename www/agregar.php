<?php
		$nombre = $_POST['nombre'];
		$username = $_POST['username'];
		$secret = $_POST['secret'];
		$type = $_POST['type'];
		$mailbox = $_POST['mailbox'];
		$nat = $_POST['nat'];
		$context = $_POST['context'];
		$qualify = $_POST['qualify'];
		$codec = $_POST['codec'];
		$plantilla = $_POST['plantilla'];
		$plop = $_GET['plop'];
		$i = $_GET['plus'];
		$i = $i;
		$f = file("./sip.conf");
		$lineas = count($f);
		for($i=0; $i < $lineas; $i++){
			$tmp =  $f[$i];
			if ($tmp[0] == '['){
				$tmp2 = explode(']', $tmp);
				$nombrear = str_replace("[", " ", $tmp2[0]);
				if ($nombrear == $nombre){
					echo "ERROR: Nombre repetido";
					exit();
				}
			}
		}
		if($nombre){
				$sal = "[$nombre]";
				if($plantilla && $plop !== 2){
					$sal .= "($plantilla)";
				}
		
				if($plop == 1){
					$sal .= "(!)";
				}
		
				$sal .= "\n";
		
				if($username){
					$sal .= "username=$username";
				 $sal .= "\n";}
		
				if($secret){
					$sal .= "secret=$secret";
				 $sal .= "\n";}
		
				if($type){
					$sal .= "type=$type";
				 $sal .= "\n";}
		
				if($mailbox){
					$sal .= "mailbox=$mailbox";
				 $sal .= "\n";}
		
				if($nat){
					$sal .= "nat=$nat";
				 $sal .= "\n";}
		
				if($context){
					$sal .= "context=$context";
				 $sal .= "\n";}
		
				if($qualify){
					$sal .= "qualify=$qualify";
				 $sal .= "\n";}
		
				if($codec){
					$sal .= "codec=$codec";
				 $sal .= "\n";}
		
				for($x = 1; $x <= $i; $x++){
					$xop = $_POST["op$x"];
					$xres = $_POST["res$x"];
					if($xop && $xres){
						$sal .= "$xop=$xres";
						$sal .= "\n";
					}
				}
				$sal .= "\n"."\n";
				$ini = fopen('./sip.conf', 'a+');
				fwrite($ini, $sal);
				fclose($ini);
				header('Location: ./index.php');
		} else {
			echo "ERROR: El campo de nombre esta vacio";
		}
	?>