<!DOCTYPE html>
<html>
<head>
	<title>Cadastro arquivos .call</title>
</head>
<body>
	<BR><BR>
	<form action="#" method="POST">
		Numero: <input type="texte" name="ch" required=""><br>
		Tentativas: <input type="texte" name="mr" required=""><br>
		Tentar novamente apos: <input type="texte" name="rt" required=""><br>
		Aguardar atendimento: <input type="texte" name="wt" required=""><br>
		Transfere para: <input type="texte" name="ex" required=""><br>
		<button type="submit" name="submit">Enviar</button><br>					
	</form>
</body>
</html>

<?php

if(isset($_POST['submit'])){

	$filename = date('hms');
	$filepath = "C:/wamp64/www/projeto/Arrays_FuncoesEspeciais/".$filename.".call";

	$ch = $_POST['ch'];
	$mr = $_POST['mr'];
	$rt = $_POST['rt'];
	$wt = $_POST['wt'];
	$ct = "call-context";
	$ex = $_POST['ex'];

	    $arrayExemplo = array(0 => $ch, 1 => $mr, 2 => $rt, 3 => $wt, 4 => $ct, 5 => $ex);

	    echo "<BR><BR>";
	    
	    $teste = "Channel: SIP/" . $arrayExemplo[0] . "\r\n"
	    		."MaxRetries: " . $arrayExemplo[1] . "\r\n"
	    		."RetryTime: " . $arrayExemplo[2] . "\r\n"
	    		."WaitTime: " . $arrayExemplo[3] . "\r\n"
	    		."Context: " . $arrayExemplo[4] . "\r\n"
	    		."Extension: " . $arrayExemplo[5] . "\r\n";

	    $call = fopen($filepath, "x+");
	    fwrite($call, $teste);
	    fclose($call);

	    $exibir = file($filepath);
    	foreach($exibir as $elemento)
    	{
        	echo utf8_encode($elemento) . "<BR>";
    	}
	}

?>
