<?php 
	
  mysql_connect('localhost','root','');
  mysql_select_db('db_raport');
	
	$baca=mysql_query("select * from tbl_guru where nip='".$_POST["md"]."'") or die("gagal".mysql_error());
	
	while($r=mysql_fetch_array($baca)){
	
	?>
		<option name="nama" value="<?php echo $r["nama_guru"] ?>"><?php echo $r["nama_guru"] ?></option>
		
	<?php
	}
	
	
	
	?>