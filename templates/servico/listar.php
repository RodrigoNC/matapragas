<br /><br />
<h2>Lista de Serviços</h2>

<?php

	//Query para buscar todos os serviços
	$sql = 'select * from servico_tecnico;';
	

	//Execute a query
	$resultado = mysql_query($sql);
	echo '<table class=\'lista\'> 
		<tr>
			<th>Id</th>
			<th>Data Execução</th>
			<th>Executor</th>
			<th>Cliente</th>
			<th>Tempo de Garantia</th>
			<th>Observações</th>
			<th>Status</th>
			<th>Tipo de Serviços</th>
		</tr>';
	//Enquanto fetch retornar algo diferente de nulo
	while ($servicos = mysql_fetch_assoc($resultado)) {
		//inverte o formato da data do mysql para brasileiro
		$servicos['data_execucao']=implode("/",array_reverse(explode("-",$servicos['data_execucao'])));
			echo '<tr>
					<td>'.$servicos['id'].'</td>
					<td>'.$servicos['data_execucao'].'</td>';
								
					//acessando o nome do funcionario
					$idFuncionario=$servicos['funcionario_id'];
					$sqlFuncionario = 'SELECT nome FROM funcionarios WHERE id='.$idFuncionario.';';
					$resultadoFuncionario = mysql_query($sqlFuncionario);
					$nomeFuncionario = mysql_fetch_assoc($resultadoFuncionario);
					echo 	'<td>'.$nomeFuncionario['nome'].'</td>';
			
					//acessando o nome do cliente
					$idCliente=$servicos['cliente_id'];
					$sqlCliente = 'SELECT nome FROM clientes WHERE id='.$idCliente.';';
					$resultadoCliente = mysql_query($sqlCliente);
					$nomeCliente = mysql_fetch_assoc($resultadoCliente);
					echo '<td>'.$nomeCliente['nome'].'</td>


					
					<td>'.$servicos['tempo_garantia'].' meses</td>
					<td>'.$servicos['observacoes'].'</td>
					<td>'.$servicos['status'].'</td>
					<td>a preencher</td>
					<td><a href=\'/'.BASE.'/index.php/servico/alterar/?id='.$servicos['id'].'\'>Alterar</a></td>
					<td><a href=\'/'.BASE.'/index.php/servico/remover/?id='.$servicos['id'].'\'>Remover</a></td>
				</tr>';
							
			}
			echo '</table>';
?>
