<?php
header("Content-Type: text/html; charset=UTF-8",true);
require('conf/conexao.php');
$act=$_GET['act'];
$disp=$_GET['disp'];
conectar();
if($act=="disp"){
	$res=mysql_query("select * from disp");
	echo "<option selected value=0>Todos</option>";
	while($row=mysql_fetch_array($res)){
		echo "<option value=".$row['Id'].">".$row['nome']."</option>";
		} 
}
if($act=="graf"){
	$hora=$_GET['hora'];
	$tipo=$_GET['tipo'];
	$con=conectar();
	switch($_GET['per']){
		case 1:
		case 2:
		case 3:
		case 6:
		case 7:
			$sql="select * from dados ";
			if($tipo==3)
				$sql.="where (var=1 or var=2 or var=3 or var=4 or var=5)  and time>=DATE_SUB( now()  , INTERVAL $hora hour ) and disp=$disp order by Id ASC limit 40000";
			else 
				$sql.="where (var=1 or var=2 or var=3 or var=4)  and time>=DATE_SUB( now()  , INTERVAL $hora hour ) and disp=$disp order by Id ASC limit 40000";
			break;
		case 4:
			$sql="select * from dados ";
			if($tipo==3)
				$sql.="where (var=1 or var=2 or var=3 or var=4 or var=5) and time>=DATE_SUB( now()  , INTERVAL $hora day )  and disp=$disp order by Id ASC ";
			else 
				$sql.="where (var=1 or var=2 or var=3 or var=4) and time>=DATE_SUB( now()  , INTERVAL $hora day )  and disp=$disp order by Id ASC ";
			break;
		case 5:
			$sql="select * from dados ";
			if($tipo==3)
				$sql.="where (var=1 or var=2 or var=3 or var=4 or var=5) and MONTH(time)=MONTH(NOW()) and YEAR(time)=YEAR(NOW()) and disp=$disp order by Id ASC limit 30000";
			else 
				$sql.="where (var=1 or var=2 or var=3 or var=4) and MONTH(time)=MONTH(NOW()) and YEAR(time)=YEAR(NOW()) and disp=$disp order by Id ASC limit 30000";
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
			if($row['var']==1)
				$orders[$i]['val1']=$row['dado'];
			$row=mysql_fetch_array($res);
			if($row['var']==2)
				$orders[$i]['val2']=$row['dado'];
			$row=mysql_fetch_array($res);
			if($row['var']==3)
				$orders[$i]['val3']=$row['dado'];
			$row=mysql_fetch_array($res);
			if($row['var']==4)
				$orders[$i]['val4']=$row['dado']; 
			if($tipo==3){
				$row=mysql_fetch_array($res);
				if($row['var']==5)
					$orders[$i]['val5']=$row['dado'];
				}
			$i++;
		}
		
	}
	echo json_encode($orders);
}
?>
