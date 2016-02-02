<?php
	$TO = "raitchet@gmail.com";

	$h = "From: " . $TO;

	$message = "le message suuivant :";

	echo $_POST['dutexte'];
	$message .= $_POST['dutexte']." : ".$_POST['ettexte'];
	
	echo $message;

	mail($TO, $subject, $message, $h);

?>