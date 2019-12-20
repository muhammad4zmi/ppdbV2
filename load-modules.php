<?php

if (isset($_GET['admin'])) {
    $page = antiinjection($_GET['admin']);
    $module = $page;
} else {
    $module = "";
}
switch ($module) {
    //------------Route Untuk Halaman Beranda------------//
    case 'beranda': case '':
    require("modules/beranda/index.php");
    break;

    //------------Route Untuk Halaman Data Guru------------//
    case 'dt_guru' :
    require("modules/guru/index.php");
    break;
    case 'add_guru' :
    require("modules/guru/add_guru.php");
    break;
    case 'ubah_guru' :
    require("modules/guru/ubah_guru.php");
    break;
    case 'del_guru' :
    require("modules/guru/del_guru.php");
    break;
    case 'cari_guru' :
    require("modules/guru/find_guru.php");
    break;
    //------------Route Untuk Halaman Data Mapel------------//
    case 'dt_mapel' :
    require("modules/mapel/index.php");
    break;
    case 'add_mapel' :
    require("modules/mapel/add_pelajaran.php");
    break;
    case 'cari_mapel' :
    require("modules/mapel/find-mapel.php");
    break;
    case 'del_mapel' :
    require("modules/mapel/del_mapel.php");
    break;
    case 'ubah_mapel' :
    require("modules/mapel/ubah_mapel.php");
    break;
    //-----------Route Untuk Halaman Kelas-------------//
    case 'inbox' :
    require("modules/inbox/inbox.php");
    break;
    case 'outbox' :
    require("modules/outbox/outbox.php");
    break;
    case 'sentitem' :
    require("modules/sentitem/senditem.php");
    break;
    case 'hapus_inbox' :
    require("modules/inbox/hapus_inbox.php");
    break;
    case 'hapus_outbox' :
    require("modules/outbox/hapus_outbox.php");
    break;
    case 'hapus_send' :
    require("modules/sentitem/hapus_send.php");
    break;
    case 'gagal':
    require("modules/sentitem/gagal.php");
    break;
    case 'ulang':
    require("modules/sentitem/ulang.php");
    break;
    case 'kirim_pesan':
    require("modules/kirimPesan/kirim_pesan.php");
    break;
    case 'kirim_personal':
    require("modules/kirimPesan/pesan_individu.php");
    break;
    case 'kirim_semua':
    require("modules/kirimPesan/send1.php");
    break;
    


    //------------Route Untuk Halaman Wali Kelas------------//
    case 'dt_wali' :
    require("modules/wali kelas/index.php");
    break;
    case 'ubah_wali' :
    require("modules/wali kelas/ubah_wali.php");
    break;
    case 'add_wali' :
    require("modules/wali kelas/add_wali.php");
    break;
    

    //------------Route Untuk Halaman SIswa-----------//
    case 'dt_siswa' :
    require("modules/siswa/index.php");
    break;
    case 'upload_foto':
    require("modules/siswa/upload_foto.php");
    break;
    case 'form_siswa' :
    require("modules/siswa/form_siswa.php");
    break;
    case 'add_siswa' :
    require("modules/siswa/add_siswa.php");
    break;
    case 'del_siswa' :
    require("modules/siswa/del_siswa.php");
    break;
    case 'form_ubah' :
    require("modules/siswa/ubah_siswa.php");
    break;
    case 'ubah_siswa' :
    require("modules/siswa/ubah.php");
    break;
    case 'detail_siswa' :
    require("modules/siswa/detail.php");
    break;
    case 'cari_siswa' :
    require("modules/siswa/find-siswa.php");
    break;
    case 'siswa' :
    require("modules/siswa/data.php");
    break;
    case 'backup' :
    require("modules/siswa/backup.php");
    break;
     case 'proses_back' :
    require("modules/siswa/db.php");
    break;
    case 'check-daftar' :
    require("modules/siswa/checkdaftar.php");
    break;
     case 'view' :
    require("modules/siswa/view.php");
    break;
    case 'backup_restore':
    require("modules/beranda/backup_restore.php");
    break;

    //------------Route Untuk Halaman Statistik------------//
    case 'nilai' :
    require("modules/nilai/index.php");
    break;
    case 'add_nilai' :
    require("modules/nilai/add_nilai.php");
    break;

    //------------Route Untuk Halaman Prestasi------------//
    case 'user' :
    require("modules/data_user/index.php");
    break;
    case 'add_prestasi' :
    require("modules/prestasi/add_prestasi.php");
    break;
    case 'cari_prestasi' :
    require("modules/prestasi/find-prestasi.php");
    break;
    case 'ubah_prestasi' :
    require("modules/prestasi/ubah_prestasi.php");
    break;
    case 'raport' :
    require("modules/raport/index.php");
    break;
    case 'detail_raport' :
    require("modules/raport/detail_nilai.php");
    break;
    case 'add_raport' :
    require("modules/raport/add_rapot.php");
    break;
    case 'add_viiigenap' :
    require("modules/raport/add_viiigenap.php");
    break;
    case 'data_user' :
    require("modules/data_user/index.php");
    break;
    case 'add_user' :
    require("modules/data_user/add-user.php");
    break;
    case 'del-user' :
    require("modules/data_user/del-user.php");
    break;
    case 'proses_spk' :
    require("modules/perangkingan/langkah-spk.php");
    break;

    //------------Route Untuk Halaman Pengaturan------------//
    case 'chart-siswa' :
    require("modules/raport/grafik.php");
    break;
    case 'del-raport' :
    require("modules/raport/del-raport.php");
    break;
    case 'reset_akun' :
    require("modules/pengaturan/reset_pass.php");
    break;
    case 'aktivasi' :
    require("modules/pengaturan/aktif-akun.php");
    break;
    case 'hapus_akun' :
    require("modules/pengaturan/hapus_mhs.php");
    break;
    case 'proses_akun' :
    require("modules/pengaturan/p_reset.php");
    break;
    case 'ubah_pass' :
    require("modules/pengaturan/ubah_admin.php");
    break;
    case 'ubah_admin_email' :
    require("modules/pengaturan/ubah_email.php");
    break;
    default :
    require("404.php");
    break;
}
?>