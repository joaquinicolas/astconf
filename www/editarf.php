<!DOCTYPE html>
<html lang='es'>
<head>
	<meta charset='UTF-8'>
	<title>Administración VoIP - Editar usuario</title>
	<link rel="stylesheet" type="text/css" href="./estilo.css">
</head>
<body>
		<?php
		require_once('./funcs.php');
		barnav(1);
	?>
	<article>
	<script type="text/javascript">var a;var i;</script>

	<form id='nomeacuerdo' action="editar.php?plus=0" method="post">
	<?php
		$val = $_GET['val'];
		echo "<script type='text/javascript'>var getval = $val;</script>";
		$i = 0;
		$v = 0;
		$apartado = 0;
		$ediln = array();
		$f = file("./sip.conf");
		$lineas = count($f);
		for($i=0; $i < $lineas; $i++){
			$tmp =  $f[$i];
			//echo $tmp;
			if ($tmp[0] == '['){
				$apartado += 1;
				//echo $apartado;
			}
			if($apartado == $val){
				array_push($ediln, $tmp);
			}
		}
			foreach ($ediln as $val) {
			//echo $val;
			
			if($val[0] == '['){
				$val2 = explode(']', $val);
				//unset($val2[0]);
				$nombre = str_replace("[", "", $val2[0]) ;
				echo "<p class='item'><span class='bold'><p class='itnom'>Nombre:</p></span><input type='text' class='entry' name='nombre' value='$nombre'></p>";
				if($val2[1][0] == '('){
					if($val2[1][1] == '!'){
						echo "<p class='item'><span class='bold'><p class='itnom'>(Plantilla)</p></span></p>\n<script type='text/javascript'>a = 1;</script>";
					} else {
						$plantilla = str_replace(array("(", ")"), "", $val2[1]);
						echo "<p class='item'><span class='bold'><p class='itnom'>Plantilla:</p></span><input type='text' class='entry' name='plantilla' value='$plantilla'></p>";
						echo "<script type='text/javascript'>a = 2;</script>";
					}
				}
			} elseif ($val[0] !== "\n") {
			$v +=1;
			$val2 = explode("=", $val);
			echo "<p class='item'><input type='text' class='entry' name='op".$v."' value='".$val2[0]."'><span class='bold'>:</span> <input type='text' class='entry' name='res".$v."'value='".$val2[1]."'></p>";
			echo "<script type='text/javascript'>i = $v;</script>";
			}
			}
	?>
	<script type="text/javascript">
		function agregar(){
			i += 1;
			var a = document.createElement('p');
			a.className = 'item';

			var b = document.createElement('input');
			b.type = 'text';
			b.className = 'entry';
			b.name = 'op'+i;

			var c = document.createElement('span');
			c.className = 'bold';

			var d = document.createTextNode(':');

			c.appendChild(d);

			var e = document.createElement('input');
			e.type = 'text';
			e.className = 'entry';
			e.name= 'res'+i;

			a.appendChild(b);
			a.appendChild(c);
			a.appendChild(e);

			document.getElementById('otros').appendChild(a);
		}
		function msplus(){
			document.getElementById('nomeacuerdo').action ="editar.php?op="+getval+"&plus="+i+"&plop="+a; 
		}
	</script>

	<input type='button' value='Agregar Opción' onclick='agregar()'>
	<div id='otros'></div>
	<input type="submit" value="Terminar" onclick='msplus()'>

</form>
</article>
</body>
</html>