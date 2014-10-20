<?php
#   Copyright by: FeTTsack
#   Support: http://www.graphics-for-all.de/


defined ('main') or die ( 'no direct access' );
defined ('admin') or die ( 'only admin access' );

$design = new design ( 'Admins Area', 'Admins Area', 2 );
$design->header();

if(isset($_POST['s_inactive'])){
	db_query("UPDATE prefix_marquee SET mrq_bolactive = 0");
}


if(isset($_POST['s_insert'])){
	$text = $_POST['t_text'];
	$size = $_POST['t_size'];
	$color = $_POST['t_color'];
	$speed = $_POST['t_speed'];
	$blink = 0;//$_POST['r_blink'];
	$bolt = $_POST['r_bolt'];
	$save = $_POST['r_save'];
	
	if($color == "#"){
		$color = "#FF0000";
	}
	
	if(strlen($speed) <= 0){
		$speed = 3;
	}
	
	db_query("INSERT INTO prefix_marquee (mrq_strtext, mrq_bolactive, mrq_speed, mrq_bolblink, mrq_color, mrq_fsize, mrq_bolbold, mrq_bolsave)
			VALUES
			('$text', 1, $speed, $blink, '$color', '$size', '$bolt', '$save')");
}

$s_text_query = db_query("SELECT * FROM prefix_marquee WHERE mrq_bolsave = 1");

if(isset($_POST['s_take'])){
	$savetext = $_POST['s_text'];
	db_query("UPDATE prefix_marquee SET mrq_bolactive = 0");
	$pk = stristr($savetext, '|', true);
	db_query("UPDATE prefix_marquee SET mrq_bolactive = 1 WHERE mrq_pk = '$pk'");
}

?>

<head>
</head>

<body>
<form name="form1" action="?gfa_scroll_admin" method="post">

<table>
<tr><td>
	<table>
	<tr><th>
		Gespeicherte Texte	
	</td></tr><tr><td>
		<select name="s_text"><option selected>-</option>
		<?php
		while($s_text = db_fetch_assoc($s_text_query)){
			echo "<option>".$s_text['mrq_pk']."|".$s_text['mrq_strtext']."</option>";
		}
		?>
		</select>
	</td></tr>
	</table>
</td></tr><tr><td>
<input name="s_take" type="submit" value="Take"/>
<hr/>
</td></tr><tr><td>
	<table>
	<tr><td>
		Text:</td><td><input name="t_text" type="text" value=""/>
	</td></tr>
	<tr><td>
		Schriftgröße:</td><td><input name="t_size" type="text" value=""/>
	</td></tr>
	<tr><td>
		Schriftfarbe in Hex:</td><td><input name="t_color" type="text" value="#"/>
	</td></tr>
	<tr><td>
		Scrollgeschwindigkeit:</td><td><input name="t_speed" type="text" value=""/>
	</td></tr>
	<!--tr><td>
		<strike>Blinken ?:</strike></td><td><strike>Ja:<input name="r_blink" type="radio" value="1"/> Nein:<input name="r_blink" type="radio" value="0" checked /></strike>
	</td></tr-->
	<tr><td>
		Fett ?:</td><td>Ja:<input name="r_bolt" type="radio" value="1"/> Nein:<input name="r_bolt" type="radio" value="0" checked />
	</td></tr>
	<tr><td>
		Save ?:</td><td>Ja:<input name="r_save" type="radio" value="1"/> Nein:<input name="r_save" type="radio" value="0" checked />
	</td></tr>
	</table>
</td></tr><tr><td>
<input name="s_insert" type="submit" value="Insert"/>
<br/><br/><h3>Notice:</h3>die Savefunktion bietet es an, die Texte zu speichern um diese später einfach wieder unter "Gepsiecherte Texte" auszuwählen<br/>Ohne aktivierung von Save bleiben die Texte genau bis zum Deaktivieren oder eintrag eines Anderen Textes aktiv auf der Homepage<br/><br/><br/><hr/>
<input onclick="alert('kein Scrolltext mehr auf der Hauptseite.')" name="s_inactive" type="submit" value="!!! Texte Deaktivieren !!!"/>
</td></tr>
</table>
</form>
</body>


<?php
$design->footer();
?>