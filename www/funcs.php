<?php
function barnav($a){
	$sal = "<nav>
		<div class='mnp_items' id='op1'>Cuentas de Usuario</div><div class='mnp_items' id='op2'>IVR</div>
	</nav>
	";
	$sal .="<script type='text/javascript'>
			document.getElementById('op$a').style.background= 'rgba(0,0,0,0.5)';
			document.getElementById('op$a').style.color= '#fff';
			</script>\n";
	echo $sal;
}
?>