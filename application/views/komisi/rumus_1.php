<?php 
//============================================================ bruto paling awal
$bruto_awal = $komisi->bruto_komisi;

//====================================== cek apakah ada referal, co broke dan potongan
foreach ($referal as $referal) {
    if ($referal->id_komisi == $komisi->id_komisi) {
        $referal_jenis = $referal->jenis_referal;
        $referal_jumlah = $referal->jumlah_referal;
        $referal_keterangan = $referal->keterangan_referal;
        break;
    }
}

//cek apakah ada co-broke
foreach ($co_broke as $kubruk) {
    if ($kubruk->id_komisi == $komisi->id_komisi) {
        $kubruk_nama = $kubruk->nama_cobroke;
        break;
    }
}

//cek apakah ada potongan
foreach ($potongan as $potongan) {
    if ($potongan->id_komisi == $komisi->id_komisi) {
        $potongan_jumlah = $potongan->jumlah_potongan;
        $potongan_keterangan = $potongan->keterangan_potongan;
        break;
    }
}

//================================================================ langkah 1 - 4 
//langkah 1 - hitung apakah ada referal awal
if (!empty($referal_keterangan) && $referal_jenis == 0) {
    $bruto_1 = $bruto_awal - $referal_jumlah;
}else{
    $bruto_1 = $bruto_awal;
}

//langkah 2 - hitung apakah ada potongan
if (!empty($potongan_keterangan)) {
    $bruto_2 = $bruto_1 - $potongan_jumlah;
}else{
    $bruto_2 = $bruto_1;
}

//langkah 3 - hitung bila ada cobroke
if (!empty($kubruk_nama)) {
    $bruto_3 = $bruto_2 / 2;
}else{
    $bruto_3 = $bruto_2;
}

//langkah 4 - hitung apakah ada referal untuk a&a
if (!empty($referal_keterangan) && $referal_jenis == 1) {
    $bruto = $bruto_3 - $referal_jumlah;
}else{
    $bruto = $bruto_3;
}

//====================================================== hitung jumlah marketing yang terlibat
//total bruto
//$bruto = $komisi->bruto_komisi;

//hitung_marketing_listing
$marketing_listing = $komisi->nama_mar; 

if (!empty($marketing_listing)) {
    $m_listing = 1;
} else {
    $m_listing = 0;
}

//hitung_marketing_listing ke 2
$marketing_listing_2 = $komisi->listing_2; 

if (!empty($marketing_listing_2)) {
    $m_listing_2 = 1;
} else {
    $m_listing_2 = 0;
}

//hitung_marketing_selling
$marketing_selling = $komisi->nama_mar2; 

if (!empty($marketing_selling)) {
    $m_selling = 1;
} else {
    $m_selling = 0;
}

//hitung_marketing_selling ke 2
$marketing_selling_2 = $komisi->selling_2; 

if (!empty($marketing_selling_2)) {
    $m_selling_2 = 1;
} else {
    $m_selling_2 = 0;
}

//pengaturan listing dan selling (jika ada kesamaan)
if ($komisi->mar_listing_komisi == $komisi->mar_selling_komisi) {
    $total_marketing = 1;
}else{
    $total_marketing = $m_listing + $m_selling + $m_listing_2 + $m_selling_2;
}

//====================================================== cari fee marketing kotor
//cari fee marketing kotor (FMK)
$fmk = $bruto / $total_marketing; 

//string to rupiah
$fmk_n = stringToNumber($fmk);
$fmk_r = numberToRupiah($fmk_n);

//====================================================== cari fee marketing listing dan fee kantor
//cari fee marketing listing dan fee kantor
$l_member = $komisi->mm_listing_komisi;

$l_member2 = $komisi->mm2_listing_komisi;

//cari fee marketing selling dan fee kantor
$s_member = $komisi->mm_selling_komisi;

$s_member2 = $komisi->mm2_selling_komisi;

//====================================================== cari fee marketing listing 1 & 2
//fee marketing listing
$fmk2_listing = $l_member / 100 * $fmk ;

//string to rupiah
$fmk2_listing_n = stringToNumber($fmk2_listing);
$fmk2_listing_r = numberToRupiah($fmk2_listing_n);

//fee marketing listing ke 2
$fmk2_listing2 = $l_member2 / 100 * $fmk ;

//string to rupiah
$fmk2_listing2_n = stringToNumber($fmk2_listing2);
$fmk2_listing2_r = numberToRupiah($fmk2_listing2_n);

//====================================================== cari fee marketing selling 1 & 2
//fee marketing selling
$fmk2_selling = $s_member / 100 * $fmk ;

//string to rupiah
$fmk2_selling_n = stringToNumber($fmk2_selling);
$fmk2_selling_r = numberToRupiah($fmk2_selling_n);

//fee marketing selling ke 2
$fmk2_selling2 = $s_member2 / 100 * $fmk ;

//string to rupiah
$fmk2_selling2_n = stringToNumber($fmk2_selling2);
$fmk2_selling2_r = numberToRupiah($fmk2_selling2_n);

//====================================================== cari fee kantor dari listing 1 & 2
//cari fee kantor listing
$fkl = $fmk - $fmk2_listing;

//string to rupiah
$fkl_n = stringToNumber($fkl);
$fkl_r = numberToRupiah($fkl_n);

//cari fee kantor listing ke dua
$fkl2 = $fmk - $fmk2_listing2;

//string to rupiah
$fkl2_n = stringToNumber($fkl2);
$fkl2_r = numberToRupiah($fkl2_n);

//====================================================== cari fee kantor dari selling 1 & 2
//cari fee kantor selling
$fks = $fmk - $fmk2_selling;

//string to rupiah
$fks_n = stringToNumber($fks);
$fks_r = numberToRupiah($fks_n);

//cari fee kantor selling ke dua
$fks2 = $fmk - $fmk2_selling2;

//string to rupiah
$fks2_n = stringToNumber($fks2);
$fks2_r = numberToRupiah($fks2_n);


//====================================================== konversi bruto ke rupiah
//string to rupiah
$bruto_n = stringToNumber($bruto);
$bruto_r = numberToRupiah($bruto_n);

//====================================================== rincian biaya admin & pph marketing listing 1 dan 2
//rincian biaya admin marketing listing
if ($l_member > 50) {
    $admin_listing = 2.5 / 100 * $fmk2_listing;
}else{
    $admin_listing = 0;
}

//string to rupiah
$admin_listing_n = stringToNumber($admin_listing);
$admin_listing_r = numberToRupiah($admin_listing_n);

//fee marketing sementara setelah dikurangi admin
$fmk3_listing = $fmk2_listing - $admin_listing;

//string to rupiah
$fmk3_listing_n = stringToNumber($fmk3_listing);
$fmk3_listing_r = numberToRupiah($fmk3_listing_n);

//rincian biaya pph marketing listing
$npwp_listing = $komisi->npwpm_listing_komisi; 

if ($npwp_listing == 1) {
    $n_listing = 1;
} else {
    $n_listing = 0;
}

if ($n_listing == 1) {
    $pph_listing = '2.5% - NPWP';
}else{
    $pph_listing = '3% - Non NPWP';
}

if ($pph_listing == '2.5% - NPWP') {
    $pph_listing_angka = 2.5;
}else{
    $pph_listing_angka = 3;
}

$biaya_pph_l = $pph_listing_angka / 100 * $fmk3_listing;

//string to rupiah
$biaya_pph_l_n = stringToNumber($biaya_pph_l);
$biaya_pph_l_r = numberToRupiah($biaya_pph_l_n);

//fee fix diterima marketing listing
$fmb_l = $fmk3_listing - $biaya_pph_l;

//string to rupiah
$fmb_l_n = stringToNumber($fmb_l);
$fmb_l_r = numberToRupiah($fmb_l_n);

//==================================================
//rincian biaya admin marketing listing ke dua
if ($l_member2 > 50) {
    $admin_listing2 = 2.5 / 100 * $fmk2_listing2;
}else{
    $admin_listing2 = 0;
}

//string to rupiah
$admin_listing2_n = stringToNumber($admin_listing2);
$admin_listing2_r = numberToRupiah($admin_listing2_n);

//fee marketing sementara setelah dikurangi admin
$fmk3_listing2 = $fmk2_listing2 - $admin_listing2;

//string to rupiah
$fmk3_listing2_n = stringToNumber($fmk3_listing2);
$fmk3_listing2_r = numberToRupiah($fmk3_listing2_n);

//rincian biaya pph marketing listing ke dua
$npwp_listing2 = $komisi->npwpm2_listing_komisi; 

if ($npwp_listing2 == 1) {
    $n_listing2 = 1;
} else {
    $n_listing2 = 0;
}

if ($n_listing2 == 1) {
    $pph_listing2 = '2.5% - NPWP';
}else{
    $pph_listing2 = '3% - Non NPWP';
}

if ($pph_listing == '2.5% - NPWP') {
    $pph_listing2_angka = 2.5;
}else{
    $pph_listing2_angka = 3;
}

$biaya_pph_l2 = $pph_listing2_angka / 100 * $fmk3_listing2;

//string to rupiah
$biaya_pph_l2_n = stringToNumber($biaya_pph_l2);
$biaya_pph_l2_r = numberToRupiah($biaya_pph_l2_n);

//fee fix diterima marketing listing
$fmb_l2 = $fmk3_listing2 - $biaya_pph_l2;

//string to rupiah
$fmb_l2_n = stringToNumber($fmb_l2);
$fmb_l2_r = numberToRupiah($fmb_l2_n);

//====================================================== rincian biaya admin & pph marketing selling 1 dan 2
//rincian biaya admin marketing selling
if ($s_member > 50) {
    $admin_selling = 2.5 / 100 * $fmk2_selling;
}else{
    $admin_selling = 0;
}

//string to rupiah
$admin_selling_n = stringToNumber($admin_selling);
$admin_selling_r = numberToRupiah($admin_selling_n);

//fee marketing sementara setelah dikurangi admin
$fmk3_selling = $fmk2_selling - $admin_selling;

//string to rupiah
$fmk3_selling_n = stringToNumber($fmk3_selling);
$fmk3_selling_r = numberToRupiah($fmk3_selling_n);

//rincian biaya pph marketing selling
$npwp_selling = $komisi->npwpm_selling_komisi; 

if ($npwp_selling == 1) {
    $n_selling = 1;
} else {
    $n_selling = 0;
}

if ($n_selling == 1) {
    $pph_selling = '2.5% - NPWP';
}else{
    $pph_selling = '3% - Non NPWP';
}

if ($pph_selling == '2.5% - NPWP') {
    $pph_selling_angka = 2.5;
}else{
    $pph_selling_angka = 3;
}

$biaya_pph_s = $pph_selling_angka / 100 * $fmk3_selling;

//string to rupiah
$biaya_pph_s_n = stringToNumber($biaya_pph_s);
$biaya_pph_s_r = numberToRupiah($biaya_pph_s_n);

//fee fix diterima marketing selling
$fmb_s = $fmk3_selling - $biaya_pph_s;

//string to rupiah
$fmb_s_n = stringToNumber($fmb_s);
$fmb_s_r = numberToRupiah($fmb_s_n);

//===========================================================
//rincian biaya admin marketing selling ke dua
if ($s_member2 > 50) {
    $admin_selling2 = 2.5 / 100 * $fmk2_selling2;
}else{
    $admin_selling2 = 0;
}

//string to rupiah
$admin_selling2_n = stringToNumber($admin_selling2);
$admin_selling2_r = numberToRupiah($admin_selling2_n);

//fee marketing sementara setelah dikurangi admin
$fmk3_selling2 = $fmk2_selling2 - $admin_selling2;

//string to rupiah
$fmk3_selling2_n = stringToNumber($fmk3_selling2);
$fmk3_selling2_r = numberToRupiah($fmk3_selling2_n);

//rincian biaya pph marketing selling ke dua
$npwp_selling2 = $komisi->npwpm2_selling_komisi; 

if ($npwp_selling2 == 1) {
    $n_selling2 = 1;
} else {
    $n_selling2 = 0;
}

if ($n_selling2 == 1) {
    $pph_selling2 = '2.5% - NPWP';
}else{
    $pph_selling2 = '3% - Non NPWP';
}

if ($pph_selling2 == '2.5% - NPWP') {
    $pph_selling2_angka = 2.5;
}else{
    $pph_selling2_angka = 3;
}

$biaya_pph_s2 = $pph_selling2_angka / 100 * $fmk3_selling2;

//string to rupiah
$biaya_pph_s2_n = stringToNumber($biaya_pph_s2);
$biaya_pph_s2_r = numberToRupiah($biaya_pph_s2_n);

//fee fix diterima marketing selling
$fmb_s2 = $fmk3_selling2 - $biaya_pph_s2;

//string to rupiah
$fmb_s2_n = stringToNumber($fmb_s2);
$fmb_s2_r = numberToRupiah($fmb_s2_n);

//====================================================== norek listing dan selling 1 & 2
//norek marketing listing
$norek_listing = $komisi->norek_listing;

//norek marketing selling
$norek_selling = $komisi->norek_selling;

//norek marketing listing ke dua
$norek_listing2 = $komisi->norek_listing2;

//norek marketing selling ke dua
$norek_selling2 = $komisi->norek_selling2;

?>
