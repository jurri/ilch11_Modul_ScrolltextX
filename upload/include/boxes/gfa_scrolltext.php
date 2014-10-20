<?php
#   Copyright by FeTTsack
#   Support www.fettsack.de.vc

?>
<head>
</head>

<body>
<?php
$abfrage01 = db_query("SELECT * FROM prefix_marquee WHERE mrq_bolactive = 1");
if($row = db_fetch_assoc($abfrage01)){

	if($row['mrq_bolbold'] == 1){
		$b_s = "<b>";
		$b_e = "</b>";
	}else{
		$b_s = $b_e = "";
	}
	if($row['mrq_bolblink'] == 1){
		$bl_s = "<span style=\"text-decoration:blink;\">";
		$bl_e = "</span>";
	}else{
		$bl_s = $bl_e = "";
	}
	echo $bl_s."".$b_s."<font size=\"".$row['mrq_fsize']."\" color=\"".$row['mrq_color']."\"><marquee scrolldelay=\"3\" scrollamount=\"".$row['mrq_speed']."\" >".$row['mrq_strtext']."</marquee></font>".$b_e."".$bl_e;
}
?>
</body>
