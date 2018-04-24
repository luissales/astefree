<!DOCTYPE html>
<html>
<head>
	<title>Conexão a base de dados</title>
</head>
<body>
	<BR><BR>
	<form action="#" method="POST">
		Endereço do Servidor: <input type="texte" name="srv" required=""><br>
		Porta de Conexão: <input type="texte" name="prt" required=""><br>
		Nome da Base de Dados: <input type="texte" name="db" required=""><br>
		Nome de Usuário: <input type="texte" name="user" required=""><br>
		Senha da Base: <input type="password" name="pwd" required=""><br>
		Tipo de gerenciador: <select name="drv">
			<option name="mysql" value="mysqli">MySQL</option>
			<option name="pgsql" value="pg_connect">PostgreSQL</option>
		</select><br>	
		<button type="submit" name="submit">Enviar</button><br>					
	</form>
</body>
</html>

<?php

if(isset($_POST['submit'])){
	
	$filename = 'dbconnect';
	$filepath = "C:/wamp64/www/projeto/Arrays_FuncoesEspeciais/".$filename.".php";
	if(is_file($filepath))
	{
	    echo "Uma conexão já foi configurada!<BR>";
	    echo "Para refazer a conexão <a href='editconf.php?config=editconf'>Clique aqui</a>";
	}
	else
	{
	    if($_POST['drv'] == 'pg_connect'){
			$srv = $_POST['srv'];
			$prt = $_POST['prt'];
			$db = $_POST['db'];
			$user = $_POST['user'];
			$pwd = $_POST['pwd'];
			$drv = $_POST['drv'];

		    $arrayExemplo = array(0 => $srv, 1 => $prt, 2 => $db, 3 => $user, 4 => $pwd);

		    echo "<BR><BR>";
		    
		    $teste = '<?php' . "\r\n"
		    		.'$dbcon = pg_connect("host=' . $arrayExemplo[0] . ' '
		    		.'port=' . $arrayExemplo[1] . ' '
		    		.'dbname=' . $arrayExemplo[2] . ' '
		    		.'user=' . $arrayExemplo[3] . ' '
		    		.'password=' . $arrayExemplo[4] . '");'
		    		."\r\n"
		    		.'or die("'.'Conexao falhou: '.'" . pg_last_error());'
		    		."\r\n"
		    		.'?>';
		    			

		    $call = fopen($filepath, "x+");
		    fwrite($call, $teste);
		    fclose($call);

		    $exibir = file($filepath);
	    	if($exibir != 0)
	    	{
	        	echo "Conexão configurada com sucesso!";
	    	}
		}else{

			$filename = 'dbconnect';
			$filepath = "C:/wamp64/www/projeto/Arrays_FuncoesEspeciais/".$filename.".php";

			$srv = $_POST['srv'];
			$prt = $_POST['prt'];
			$user = $_POST['user'];
			$pwd = $_POST['pwd'];
			$db = $_POST['db'];
			$drv = $_POST['drv'];

		    $arrayExemplo = array(0 => $srv, 1 => $prt, 2 => $user, 3 => $pwd, 4 => $db);

		    echo "<BR><BR>";
		    
		    $teste = '<?php' . "\r\n"
		    		.'$dbcon = new mysqli('."'".$arrayExemplo[0] . ':'
		    		. $arrayExemplo[1] . "'". ', '
		    		. "'" . $arrayExemplo[2] . "'". ', '
		    		. "'" . $arrayExemplo[3] . "'". ', '
		    		. "'" . $arrayExemplo[4] . "'". ');'
		    		. "\r\n"
		    		. 'if (mysqli_connect_errno()) trigger_error(mysqli_connect_error());'
		    		."\r\n"
		    		.'?>';	

		    $call = fopen($filepath, "x+");
		    fwrite($call, $teste);
		    fclose($call);

		    $exibir = file($filepath);
	    	if($exibir != 0)
	    	{
	        	echo "Conexão configurada com sucesso!";
	    	}
	    }	
	}
}

?>
