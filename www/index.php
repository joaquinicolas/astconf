<!DOCTYPE html>
<html lang='es'>
<head>
	<meta charset='UTF-8'>
	<title>Administración VoIP - Lista de usuarios</title>
	<link rel="stylesheet" type="text/css" href="./estilo.css">
</head>
<body>
 <?php
	require_once('./funcs.php');
	barnav(1);
	echo "<section id='princ'>\n";

		echo "<a id='bt_agregar' href='agregarf.php'>Agregar</a>";
		$f = file("./sip.conf");
		$lineas = count($f);
		$numplant = array();
		$numusr = array();
		$tatata = 1;
		for($i=0; $i < $lineas; $i++){

			$tmp =  $f[$i];
			if ($tmp[0] == '['){//veo si es comienzo de declaración
				$tmp2 = explode(']', $tmp);
				$plan = 0;
				//echo $tmp2[1];
				$nombre = str_replace("[", " ", $tmp2[0]) ;
				//echo $nombre;
				if($tmp2[1][1] == "!"){//verifico si es plantilla
					//echo 'Plantilla';
					$plan = 1;
				}
				$apartado += 1;
				$tatata = 2;
				echo "<article id='apa".$apartado."' style='border-left: 15px solid blue; display:none;'>\n";
	
				if($plan == 1){
					echo "<script type='text/javascript'>document.getElementById('apa".$apartado."').style.borderColor = '#f22';</script>\n";
					echo "<p class='item'><span class='bold'>Nombre de plantilla:</span> ".$nombre . "</p>\n";
					$plamul .= "<p id='listit2' onclick='mosusr($apartado)' >$nombre</p>\n";
					array_push($numplant, $apartado);
					
				} else {
					echo "<p class='item'><span class='bold'>Nombre de Usuario:</span> ".$nombre. "</p>\n";
					$nomul .= "<p id='listit' onclick='mosusr($apartado)'>$nombre</p>\n";
					array_push($numusr, $apartado);
					
				}
				if($tmp2[1][1] !== "!" && $tmp2[1][0] == "("){
					echo "<p class='item'><span class='bold'>Plantilla aplicada:</span> ". str_replace(array("(", ")"), "", $tmp2[1]). "</p>\n";
				}

			} elseif($tmp[0] !== ';') {
				$tmp2 = explode("=", $tmp);
				if($tmp2[1]){
					echo "<p class='item'><span class='bold'>".$tmp2[0]."</span>: " .$tmp2[1]. "</p>\n";//aca imprime los datos
				} elseif ($tatata !== 1){
				//echo "<span class='numerito'>".$apartado. "</span>\n";
				echo "<div style='text-align:right;'><a class='bt_opc' href='editarf.php?val=$apartado'>Editar</a>\n";
				echo "<a class='bt_opc' href='borrar.php?val=$apartado'>Borrar</a></div>\n";
					echo "</article>\n";
					$tatata = 1;
				}
			}

		}
		?>
		<script type="text/javascript">
		
		var numplant = new Array();
		var numusr = new Array();
		<?php
		for($cota = 0; $cota<count($numplant); $cota++){
			echo 'numplant['. $cota .'] = '. $numplant[$cota] .";\n";
		}

		for($cota = 0; $cota<count($numusr); $cota++){
			echo 'numusr['. $cota .'] = '. $numusr[$cota] .";\n";
		}

	?>
	</script>
	<script type="text/javascript">
	function usuarios(){
		document.getElementById('usuarios').style.background= '#888';
		document.getElementById('plantillas').style.background= 'rgba(0,0,0,0)';
		document.getElementById('plantillasl').style.display = 'none';
		document.getElementById('usuariosl').style.display = 'block';
		}

	function plantillas(){
		document.getElementById('plantillas').style.background= '#888';
		document.getElementById('usuarios').style.background= 'rgba(0,0,0,0)';
		document.getElementById('plantillasl').style.display = 'block';
		document.getElementById('usuariosl').style.display = 'none';
	}
	var b = 1;
	function mosusr(a){
		document.getElementById('apa'+b).style.display = 'none';
		document.getElementById('apa'+a).style.display = 'block';
		b = a;
	}
	</script>
</section>
<aside>
	<div id="menu-usr"><ul><li id='usuarios' onclick="usuarios()">Usuarios</li><li id='plantillas' onclick="plantillas()">Plantillas</li></ul></div>
	<div id='usuariosl'>
	<?php
		echo $nomul;
	?>
	</div>
	<div id='plantillasl'>
<?php
		echo $plamul;
	?>
	</div>
</aside>
</body>
<!-- Pereyra, Armando | 2013 -->
</html>