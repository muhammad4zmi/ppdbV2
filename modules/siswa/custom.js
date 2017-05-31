jQuery(function($) {
    "use strict";
	
$('body').on('change', '.provinsi', function(e) {
        e.preventDefault();
		var id = $("#provinsi").val();
        $.ajax({
        	type : "POST",
        	url  : "modules/siswa/data.php?page=cari-kota",
        	data :  {id : id},
        	success : function(data){
				$("#kota").html(data);
				
				getKota();
        	}
        });
    });
	
	$('body').on('change', '.kota', getKota);
	function getKota(){
        
		var id = $("#kota").val();
        $.ajax({
        	type : "POST",
        	url  : "modules/siswa/data.php?page=cari-kecamatan",
        	data :  {id : id},
        	success : function(data){
				$("#kecamatan").html(data);
				
				getKecamatan();
        	}
        });
	}
	
	$('body').on('change', '.kecamatan', getKecamatan);
	function getKecamatan(){
        
		var id = $("#kecamatan").val();
        $.ajax({
        	type : "POST",
        	url  : "modules/siswa/data.php?page=cari-kelurahan",
        	data :  {id : id},
        	success : function(data){
				$("#kelurahan").html(data);
        	}
        });
    }
});