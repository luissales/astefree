<?php
   include("excelwriter.inc.php");

    $excel = new ExcelWriter("lista_contatos.xls");

    if($excel==false){
        echo $excel->error;
   }

	$myArr=array('Nome','Sobrenome','Departamento', 'Ramal', 'E-mail', 'Data');
	$excel->writeLine($myArr);

	$conn = mysqli_connect("localhost:3307", "ramaisLife", "Ram@isLif&", "ramaislife") or die ('Não foi possivel conectar ao banco de dados! Erro: ' . mysqli_error());

	$consulta = "select * from ramais order by id";
	$resultado = mysqli_query($conn, $consulta);
	if($resultado==true){
    	while($linha = mysqli_fetch_array($resultado)){
      	$myArr=array($linha['frist_name'],$linha['last_name'],$linha['department'],$linha['ddi'],$linha['email'],$linha['data_atualizacao']);
      	$excel->writeLine($myArr);
    }
  }

  $excel->close();
  echo "O arquivo foi gerado com sucesso. <a href=\"lista_contatos.xls\">Baixar</a>";

?>
