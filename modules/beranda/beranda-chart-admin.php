<?php

include("../../../style/chart/FC_Colors.php");
?>
<SCRIPT LANGUAGE="Javascript" SRC="../../../style/chart/FusionCharts.js"></SCRIPT>
<CENTER>
	<?php
	$strXML = "<graph caption='Jumlah Siswa Berprestasi ' xAxisName='Bulan' yAxisName='Jumlah Kegiatan' decimalPrecision='0' formatNumberScale='0'>";
   // Fetch all factory records
	$strQuery = "SELECT tbl_nilai.total_nilai as jml,tbl_nilai.semester as
	smt,tbl_nilai.nis as nis, tbl_nilai.id_kelas as kls FROM tbl_nilai GROUP BY tbl_nilai.semester
	order by tbl_nilai.semester ASC";
	$result = mysqli_query($link,$strQuery) or die(mysqli_error($link));

	//Iterate through each factory
	if ($result) {
		while($ors = mysqli_fetch_assoc($result)) {
			//Generate <set name='..' value='..' />        
			$strXML .= "<set name='" . $ors['smt'].", ".$ors['kls']. "' value='" . $ors['jml'] . "' color='" .getFCColor() . "'/>";
		}
	}
	//mysqli_close($link);
	//Finally, close <graph> element
	$strXML .= "</graph>";
	//Create the chart - Column 3D Chart with data contained in strXML
	echo renderChart("modules/beranda/FCF_Column3D.swf", "", $strXML, "CharPerBulan", 605, 400);
	?>
</CENTER>