<?php
header("Content-Type: text/html; charset=UTF-8",true);
require('conf/conexao.php');
$act=$_GET['act'];
$disp=$_GET['disp'];

if($act=='var'){
	$disp=$_GET['disp'];
	conectar();
	$res=mysql_query("select * from var_conf where disp=$disp");
	echo "<option selected value=0>Selecione a variavel</option>";
	while($row=mysql_fetch_array($res)){
		echo "<option value=".$row['Id'].">".$row['nome']."</option>";
		}
}

if($act=="graf"){
	$hora=$_GET['hora'];
	$con=conectar();
	switch($_GET['tipo']){
		case 1:
		case 2:
		case 3:
		case 6:
		case 7:
			$sql="select * from dados ";
			$sql.="where (var=1 or var=2 or var=3)  and time>=DATE_SUB( now()  , INTERVAL $hora hour ) and disp=$disp order by Id ASC ";
			break;
		case 4:
			$sql="select * from dados ";
			$sql.="where (var=1 or var=2 or var=3) and time>=DATE_SUB( now()  , INTERVAL $hora day )  and disp=$disp order by Id ASC ";
			break;
		case 5:
			$sql="select * from dados ";
			//$sql.="where var=".$_GET['var']." and date>=DATE_SUB( now()  , INTERVAL $hora day )  order by Id ASC ";
			$sql.="where (var=1 or var=2 or var=3) and MONTH(time)=MONTH(NOW()) and YEAR(time)=YEAR(NOW()) and disp=$disp order by Id ASC ";
			break;
	}
	//echo $sql;
	$res=mysql_query($sql);
	echo mysql_error();
	$i=0;
	$orders=array();
	while($row=mysql_fetch_array($res)){
		$orders[$i]['date']=$row['time'];
		if($row['var']==1){
			//if($i==0){
				$orders[$i]['val1']=$row['dado'];
				$row=mysql_fetch_array($res);
				$orders[$i]['val2']=$row['dado'];
				$row=mysql_fetch_array($res);
				$orders[$i]['val3']=$row['dado'];
			//	}
			/*else{
				if($row['dado']>(3*($orders[$i-1]['val1'])))
					$orders[$i]['val1']=$orders[$i-1]['val1'];
				else 
					$orders[$i]['val1']=$row['dado'];
				
				$row=mysql_fetch_array($res);
				if($row['dado']>(3*($orders[$i-1]['val2'])))
					$orders[$i]['val2']=$orders[$i-1]['val2'];
				else
					$orders[$i]['val2']=$row['dado'];
				$row=mysql_fetch_array($res);
				if($row['dado']>(3*($orders[$i-1]['val3'])))
					$orders[$i]['val3']=$orders[$i-1]['val3'];
				else
					$orders[$i]['val3']=$row['dado'];
				}*/
			}
		$i++;
	}
	echo json_encode($orders);
}
if($act=="grafv"){
	$varid=$_GET['vari'];
	$sql="select var_conf.Id,var_conf.nome,var_tipo,var_tipo.Id,var_tipo.unidade,var_tipo.titulo,disp.nome as disp from var_conf ";
	$sql.="inner join var_tipo on var_tipo.Id=var_conf.var_tipo ";
	$sql.="inner join disp on disp.Id=var_conf.disp ";
	$sql.="where var_conf.Id=$varid";
	//echo $sql;
	$con=conectar();
	mysql_set_charset('utf8');
	$res=mysql_query($sql);
	$i=0;
	$out=array();
	$row=mysql_fetch_array($res);
	$out['nome']=$row['nome'];
	$out['unidade']=$row['unidade'];
	$out['titulo']=$row['titulo']." da(o) ".$row['disp'];
	$out['tipo']=$row['var_tipo'];
	/*while($row=mysql_fetch_array($res)){
		$out[$i]['nome']=$row['nome'];
		//$out[$i]['unidade']=$row['unidade'];
		$out[$i]['titulo']=$row['titulo']." da(o) ".$row['disp'];
		$i++;
		}*/
	//echo $out['titulo'];
	$end=html_entity_decode(json_encode($out));
	echo $end;
}
if($act=="qtd"){
	$con=conectar();
	$res=mysql_query("select * from var_conf where disp=$disp");
	$qtd=mysql_num_rows($res);
	echo "<option value=1 selected > 1 Variavel</option>";
	for($i=1;$i<$qtd;$i++){
			echo "<option value=".($i+1).">".($i+1)." Variaveis</option>";
	}
	
}
?>