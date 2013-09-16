<!DOCTYPE html>
<html lang='es'>
<head>
	<meta charset='UTF-8'>
	<title>Administración VoIP - Agregar usuario</title>
	<link rel="stylesheet" type="text/css" href="./estilo.css">
</head>
<body>
	<?php
		require_once('./funcs.php');
		barnav(1);
	?>
	<article>
	<script type="text/javascript">
		var i = 0;
		var a = 2;
		function cambiar(b){
			if(b == 2){
				document.getElementById('upw').style.display='none';
				document.getElementById('upw2').style.display='block';
				a=1;
			} else {
				document.getElementById('upw').style.display='block';
				document.getElementById('upw2').style.display='none';
				a=0;	
			}
		}
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
			document.getElementById('nomeacuerdo').action ="agregar.php?plus="+i+"&plop="+a;
		}

	</script>
	<form id='nomeacuerdo' action='agregar.php' method='post'>
	<p class='item'><span class='bold'><p class='itnom'>nombre:</p></span><input type="text" class='entry' name="nombre"><span class='numerito'>*Este tiene que ser obligatorio</span>
	<span class='bold'><label><input type="radio" name="plant" onclick='cambiar(1)' checked="yes">Usuario</label>
	<label><input type="radio" name="plant" onclick='cambiar(2)'>Plantilla</label></span>
	</p>
	<div id='upw'>
		<p class='item'><span class='bold'><p class='itnom'>aplicar plantilla:</p></span><input type="text" class='entry' name="plantilla"></p>
		<p class='item'><span class='bold'><p class='itnom'>username:</p></span><input type="text" class='entry' name="username"></p>
		<p class='item'><span class='bold'><p class='itnom'>secret:</p></span><input type="text" class='entry' name="secret"></p>
	</div>
	<div id='upw2' style='display:none;'>
		<p class='item'><span class='bold'><p class='itnom'>type:</p></span><input type="text" class='entry' name="type"></p>
		<p class='item'><span class='bold'><p class='itnom'>mailbox:</p></span><input type="text" class='entry' name="mailbox"></p>
		<p class='item'><span class='bold'><p class='itnom'>nat:</p></span><input type="text" class='entry' name="nat"></p>
		<p class='item'><span class='bold'><p class='itnom'>context:</p></span><input type="text" class='entry' name="context"></p>
		<p class='item'><span class='bold'><p class='itnom'>qualify:</p></span><input type="text" class='entry' name="qualify"></p>
		<p class='item'><span class='bold'><p class='itnom'>codec:</p></span><input type="text" class='entry' name="codec"></p>
	</div>
	<input type='button' value='Agregar Opción' onclick='agregar()'>
	<div id='otros'></div>
	<input type="submit" value="Terminar" onclick='msplus()'>
</form>
</article>
</body>
</html>