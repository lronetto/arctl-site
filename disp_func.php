<?php
// Incluindo arquivo de conex������������������o/configura������������������������������������o
require('conf/conexao.php');
 
conectar();

$act=$_GET['act'];
//echo $act;


if($act=="modo"){
	$res=mysql_query("select * from modo_config");
	//echo "<option selected value=0>Todos</option>";
	while($row=mysql_fetch_array($res))
		echo "<option value=".$row['Id'].">".$row['modo']."</option>";
}
if($act=='edit'){
	$id=$_GET['id'];
	$sql= "select disp.Id,disp.nome,config.tempo,config.setpoint,config.hist,config.modo, config.pidp,config.pidi,config.pidd from disp ";
	$sql.="inner join config on config.disp=disp.Id ";
	$sql.="where disp.Id=$id";
	$res=mysql_query($sql);
	echo mysql_error();
	$row=mysql_fetch_array($res);
	echo html_entity_decode(json_encode($row));
	
}
if($act=='nome'){
	$id=$_GET['id'];
	$sql="select * from disp where Id=$id";
	$res=mysql_query($sql);
	$row=mysql_fetch_array($res); 
	echo $row['nome'];
	//return $row['nome'];
}

if($act=='atu'){
		$id=$_GET['id'];
		$nome=$_GET['nome'];
		$modo=$_GET['modo'];
		$set=$_GET['set'];
		$hist=$_GET['hist'];
		$tempo=$_GET['tempo'];
		$pidp=$_GET['pidp'];
		$pidi=$_GET['pidi'];
		$pidd=$_GET['pidd'];
		$conf=0;
		mysql_query("update disp set nome='$nome' where Id=$id");
		$res=mysql_query("select * from config where disp=$id and modo!=$modo");
		echo "select * from config where disp=$id and modo!=$modo ("+mysql_num_rows($res)+")<br>";
		if(mysql_num_rows($res)>0)
			$conf=1;
		$res=mysql_query("select * from config where disp=$id and setpoint!='$set'");
		echo "select * from config where disp=$id and setpoint!='$set'("+mysql_num_rows($res)+")<br>";
		if(mysql_num_rows($res)>0)
			$conf|=2;
		$res=mysql_query("select * from config where disp=$id and hist!='$hist'");
		echo "select * from config where disp=$id and hist!='$hist'("+mysql_num_rows($res)+")<br>";
		if(mysql_num_rows($res)>0)
			$conf|=4;
		$res=mysql_query("select * from config where disp=$id and tempo!=$tempo");
		echo "select * from config where disp=$id and tempo!=$tempo ("+mysql_num_rows($res)+")<br>";
		if(mysql_num_rows($res)>0)
			$conf|=8;
		//if($conf>0){
			mysql_query("update config set modo=$modo, setpoint=$set, hist='$hist', tempo=$tempo, pidp=$pidp, pidi=$pidi, pidd=$pidd where disp=$id");
			mysql_query("insert into disp_atu(disp,conf) values($id,$conf)");
		//	}
			
		//echo mysql_error();
}
if($act=='dat'){
	$sql="select disp.Id,tipo, disp.disp, estado, nome, rssi, disp.atu, disp.Id,config.tempo, modo_config.modo from disp ";
	//$sql.="inner join tipo as tipo on disp.tipo=tipo.Id ";
	$sql.="inner join config on config.disp=disp.Id ";
	$sql.="inner join modo_config on config.modo=modo_config.Id ";
	$sql.="order by disp.atu desc"; 
	$res=mysql_query($sql);
	echo mysql_error();
	?>
<table border=1> 
<tr><td>Id</td><td>Nome</td><td>Modo</td><td>Dispositivo</td><td>Estado</td><td>Tempo</td><td>RSSI</td><td>Ultima comunicao</td><td>Editar</td>
</tr>
<?php
	while($row=mysql_fetch_array($res)){
		echo "<tr><td>".$row['Id']."</td><td>".$row['nome']."</td><td>".$row['modo']."</td>";
		echo "<td>".$row['disp']."</td><td>";
		if($row['estado']=='1') echo "Ativo";
		else echo "Inativo";
		echo "</td><td>".$row['tempo']."</td><td>";
		if($row['rssi']=='0') 
			echo "N/A";
		else 
			echo $row['rssi']."dB";
		echo "</td><td>";
		echo $row['atu']."</td>";
		echo "<td><a href='#' onclick=disp_edit(".$row['Id'].")>Editar</a></td></tr>";
		}
	echo "</table>";
}

?>