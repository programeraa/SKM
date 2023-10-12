<?php 
//============================================================ bruto paling awal
$bruto_awal = $komisi->bruto_komisi;

//string to rupiah
$bruto_awal_n = stringToNumber($bruto_awal);
$bruto_awal_r = numberToRupiah($bruto_awal_n);

//====================================== cek apakah ada referal, co broke dan potongan
foreach ($referal as $referal) {
    if ($referal->id_komisi == $komisi->id_komisi) {
        $referal_jumlah = $referal->jumlah_referal;
        $referal_keterangan = $referal->keterangan_referal;
        break;
    }
}

//cek apakah ada co-broke
$id_unik_cobroke = null;
foreach ($co_broke as $kubruk) {
    if ($kubruk->id_komisi == $komisi->id_komisi) {
        $kubruk_nama = $kubruk->nama_cobroke;
        $id_unik_cobroke = $kubruk->id_komisi_unik;
        $persen_cobroke = $kubruk->persen_komisi_cobroke;
        break;
    }
}

//cek apakah ada potongan
foreach ($potongan as $potongan_item) {
    if ($potongan_item->id_komisi == $komisi->id_komisi) {
        $potongan_jumlah = $potongan_item->jumlah_potongan;
        $potongan_keterangan = $potongan_item->keterangan_potongan;
        break;
    }
}

//cek apakah kasus ang fran win
$ml_afw = null;
if ($komisi->mar_listing_komisi == 38) {
    $ml_afw = 'Ang/Fran/Win';
}

$ml_2_afw = null;
if ($komisi->mar_listing2_komisi == 38) {
    $ml_2_afw = 'Ang/Fran/Win';
}

$ms_afw = null;
if ($komisi->mar_selling_komisi == 38) {
    $ms_afw = 'Ang/Fran/Win';
}

$ms_2_afw = null;
if ($komisi->mar_selling2_komisi == 38) {
    $ms_2_afw = 'Ang/Fran/Win';
}

//================================================================ langkah 1 - 4 
//langkah 1 - hitung apakah ada referal awal
$hitung_referal = null;
//cek jika ada referal dan tidak ada co broke, maka referal dipotong di awal
if (!empty($referal_keterangan) && empty($kubruk_nama)) {
    if (strlen($referal_jumlah) <= 2) {
        $hitung_referal = $referal_jumlah / 100 * $bruto_awal;
        $bruto_1 = $bruto_awal - $hitung_referal;
    }else{
        $bruto_1 = $bruto_awal - $referal_jumlah;
    }
}else{
    $bruto_1 = $bruto_awal;
}

//string to rupiah
$hitung_referal_n = stringToNumber($hitung_referal);
$hitung_referal_r = numberToRupiah($hitung_referal_n);

//langkah 2 - hitung apakah ada potongan
if (!empty($potongan_keterangan)) {
    $bruto_2 = $bruto_1 - $potongan_jumlah;
}else{
    $bruto_2 = $bruto_1;
}

//string to rupiah
$bruto_2_n = stringToNumber($bruto_2);
$bruto_2_r = numberToRupiah($bruto_2_n);

//langkah 3 - hitung bila ada cobroke
if (!empty($kubruk_nama)) {
    $bruto_3 = $persen_cobroke / 100 * $bruto_2;
}else{
    $bruto_3 = $bruto_2;
}

//string to rupiah
$bruto_3_n = stringToNumber($bruto_3);
$bruto_3_r = numberToRupiah($bruto_3_n);

$bruto = null;
$ref_aa = null;
//langkah 4 - hitung apakah ada referal untuk a&a
if (!empty($referal_keterangan) && !empty($kubruk_nama)) {
    if (strlen($referal_jumlah) <= 2) {
        $hitung_referal = $referal_jumlah / 100 * $bruto_3;
        $bruto = $bruto_3 - $hitung_referal;
        $ref_aa = 1;
    }else{
        $bruto = $bruto_3 - $referal_jumlah;
        $ref_aa = 1;
    }
}else{
    $bruto = $bruto_3;
}

//====================================================== hitung jumlah marketing yang terlibat
//total bruto
//$bruto = $komisi->bruto_komisi;

//hitung_marketing_listing
$marketing_listing = $komisi->mar_listing_komisi; 

if (!empty($marketing_listing)) {
    $m_listing = 1;
} else {
    $m_listing = 0;
}

foreach ($marketing as $nama_listing_1) {
    if ($komisi->mar_listing_komisi == $nama_listing_1->id_mar) {
        $nama_marketing_listing_1 = $nama_listing_1->nama_mar;
    }
}

//hitung_marketing_listing ke 2
$marketing_listing_2 = $komisi->mar_listing2_komisi; 

if (!empty($marketing_listing_2)) {
    $m_listing_2 = 1;
} else {
    $m_listing_2 = 0;
}

//hitung_marketing_selling
$marketing_selling = $komisi->mar_selling_komisi; 

if (!empty($marketing_selling)) {
    $m_selling = 1;
} else {
    $m_selling = 0;
}

foreach ($marketing as $nama_selling_1) {
    if ($komisi->mar_selling_komisi == $nama_selling_1->id_mar) {
        $nama_marketing_selling_1 = $nama_selling_1->nama_mar;
    }
}

//hitung_marketing_selling ke 2
$marketing_selling_2 = $komisi->mar_selling2_komisi; 

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
//cek jika ada co broke
if (($marketing_listing == $id_unik_cobroke || $marketing_selling == $id_unik_cobroke) && $ref_aa == 1 && $marketing_listing_2 == 0 && $marketing_selling_2 == 0) {
    if ($persen_cobroke > 50) {
        $fmk = (((100 - $persen_cobroke) / 100) * $bruto_2) - $referal_jumlah;
    }else{
        $fmk = $bruto;
    } 
    //echo "A";
}elseif (($marketing_listing == $id_unik_cobroke || $marketing_selling == $id_unik_cobroke) && $marketing_listing_2 == 0 && $marketing_selling_2 == 0) {
    if ($persen_cobroke > 50) {
        $fmk = ((100 - $persen_cobroke) / 100) * $bruto_2;
    }else{
        $fmk = $bruto_2 / $total_marketing; 
    }
    //echo "B";
}elseif (!empty($kubruk_nama) && $ref_aa == 1 && ($marketing_listing == $id_unik_cobroke || $marketing_selling == $id_unik_cobroke)) {
    if ($persen_cobroke > 50) {
        $fmk = ((((100 - $persen_cobroke) / 100) * $bruto_2) - $referal_jumlah) / 2;
    }else{
        $fmk = $bruto / 2 ;
    }
    //echo "C";
}elseif (!empty($kubruk_nama) && ($marketing_listing == $id_unik_cobroke || $marketing_selling == $id_unik_cobroke)) {
    if ($persen_cobroke > 50) {
        $fmk = (((100 - $persen_cobroke) / 100) * $bruto_2) / 2;
    }else{
        $fmk = $bruto_3 / 2 ;
    }
    //echo "D";
}else{
    $fmk = $bruto / $total_marketing; 
    //echo "E";
}

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

//====================================================== cari fee marketing listing/selling co broke
if (!empty($marketing_listing) && !empty($kubruk_nama) && $marketing_listing_2 || $marketing_selling_2 != 0){
    $bruto_cobroke = $bruto_3;
}elseif($persen_cobroke > 50){
    $bruto_cobroke = $persen_cobroke / 100 * $bruto_2;
}else{
    $bruto_cobroke = $fmk;
}

//string to rupiah
$bruto_cobroke_n = stringToNumber($bruto_cobroke);
$bruto_cobroke_r = numberToRupiah($bruto_cobroke_n);

//fee marketing co broke listing
$j_cobroke_angka = 0;
foreach ($co_broke as $cobroke) {
    if ($cobroke->id_komisi == $komisi->id_komisi) {
        $j_cobroke_angka = $cobroke->jenis_cobroke;
        break;
    }
}

$pph_cobroke_listing = $j_cobroke_angka / 100 * $bruto_cobroke;

//string to rupiah
$pph_cobroke_listing_n = stringToNumber($pph_cobroke_listing);
$pph_cobroke_listing_r = numberToRupiah($pph_cobroke_listing_n);

//fee cobroke listing diterima
$fee_cobroke_listing = $bruto_cobroke - $pph_cobroke_listing;

//string to rupiah
$fee_cobroke_listing_n = stringToNumber($fee_cobroke_listing);
$fee_cobroke_listing_r = numberToRupiah($fee_cobroke_listing_n);

//==============================================================
//fee marketing co broke selling
$s_cobroke_angka = 0;
foreach ($co_broke as $cobroke) {
    if ($cobroke->id_komisi == $komisi->id_komisi) {
        $s_cobroke_angka = $cobroke->jenis_cobroke;
        break;
    }
}

$pph_cobroke_selling = $s_cobroke_angka / 100 * $bruto_cobroke;

//string to rupiah
$pph_cobroke_selling_n = stringToNumber($pph_cobroke_selling);
$pph_cobroke_selling_r = numberToRupiah($pph_cobroke_selling_n);

//fee cobroke listing diterima
$fee_cobroke_selling = $bruto_cobroke - $pph_cobroke_selling;

//string to rupiah
$fee_cobroke_selling_n = stringToNumber($fee_cobroke_selling);
$fee_cobroke_selling_r = numberToRupiah($fee_cobroke_selling_n);

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


//============================================= KASUS ANG FRAN WIN

//Langkah 1 - Bagi fee marketing kotor menjadi 2 untuk Ang Fran dan Win
$afw_1 = null;
if (!empty($ml_afw)) {
    $afw_1 = $fmk2_listing / 2;
    //echo "A";
}
if (!empty($ml_2_afw)) {
    $afw_1 = $fmk2_listing2 / 2;
    //echo "B";
}
if (!empty($ms_afw)) {
    $afw_1 = $fmk2_selling / 2;
    //echo "C";
}
if(!empty($ms_2_afw)) {
    $afw_1 = $fmk2_selling2 / 2;
    //echo "D";
}

//$afw_1 = $fmk2_listing / 2;

//string to rupiah
$afw_1_n = stringToNumber($afw_1);
$afw_1_r = numberToRupiah($afw_1_n);

//Langkah 2 - Bagi fee marketing afw_1 menjadi 2 untuk Ang dan Fran
$afw_2 = $afw_1 / 2;

//string to rupiah
$afw_2_n = stringToNumber($afw_2);
$afw_2_r = numberToRupiah($afw_2_n);

//================================================== Hitung ANG
foreach ($marketing as $ang) {
    if ($ang->nama_mar == "Ang") {
        $npwp_ang = $ang->gambar_npwp_mar; 
        $norek_ang = $ang->norek_mar;
        $l_member_ang = $ang->member_mar;
    }
}

if ($l_member_ang == 'Silver') {
    $l_member_ang_2 = 50;
}elseif($l_member_fran == 'Gold Express'){
    $l_member_ang_2 = 60;
}elseif($l_member_fran == 'Prime Pro'){
    $l_member_ang_2 = 70;
}else{
    $l_member_ang_2 = 80;
}

if ($l_member_ang_2 > 50) {
    $admin_listing_ang = 2.5 / 100 * $afw_2;
}else{
    $admin_listing_ang = 0;
}

//string to rupiah
$admin_listing_ang_n = stringToNumber($admin_listing_ang);
$admin_listing_ang_r = numberToRupiah($admin_listing_ang_n);

//fee marketing sementara setelah dikurangi admin
$fmk3_listing_ang = $afw_2 - $admin_listing_ang;

//string to rupiah
$fmk3_listing_ang_n = stringToNumber($fmk3_listing_ang);
$fmk3_listing_ang_r = numberToRupiah($fmk3_listing_ang_n);

//rincian biaya pph marketing listing
if (!empty($npwp_ang)) {
    $npwp_ang_2 = 1;
}else{
    $npwp_ang_2 = 0;
}

$npwp_listing_ang = $npwp_ang_2; 

if ($npwp_listing_ang == 1) {
    $n_listing_ang = 1;
} else {
    $n_listing_ang = 0;
}

if ($n_listing_ang == 1) {
    $pph_listing_ang = '2.5% - NPWP';
}else{
    $pph_listing_ang = '3% - Non NPWP';
}

if ($pph_listing_ang == '2.5% - NPWP') {
    $pph_listing_angka_ang = 2.5;
}else{
    $pph_listing_angka_ang = 3;
}

$biaya_pph_l_ang = $pph_listing_angka_ang / 100 * $fmk3_listing_ang;

//string to rupiah
$biaya_pph_l_ang_n = stringToNumber($biaya_pph_l_ang);
$biaya_pph_l_ang_r = numberToRupiah($biaya_pph_l_ang_n);

//fee fix diterima marketing listing
$fmb_l_ang = $fmk3_listing_ang - $biaya_pph_l_ang;

//string to rupiah
$fmb_l_ang_n = stringToNumber($fmb_l_ang);
$fmb_l_ang_r = numberToRupiah($fmb_l_ang_n);


//==================================================== Hitung FRAN
foreach ($marketing as $fran) {
    if ($fran->nama_mar == "Fran") {
        $npwp_fran = $fran->gambar_npwp_mar; 
        $norek_fran = $fran->norek_mar;
        $l_member_fran = $fran->member_mar;
    }
}

if ($l_member_fran == 'Silver') {
    $l_member_fran_2 = 50;
}elseif($l_member_fran == 'Gold Express'){
    $l_member_fran_2 = 60;
}elseif($l_member_fran == 'Prime Pro'){
    $l_member_fran_2 = 70;
}else{
    $l_member_fran_2 = 80;
}

if ($l_member_fran_2 > 50) {
    $admin_listing_fran = 2.5 / 100 * $afw_2;
}else{
    $admin_listing_fran = 0;
}

//string to rupiah
$admin_listing_fran_n = stringToNumber($admin_listing_fran);
$admin_listing_fran_r = numberToRupiah($admin_listing_fran_n);

//fee marketing sementara setelah dikurangi admin
$fmk3_listing_fran = $afw_2 - $admin_listing_fran;

//string to rupiah
$fmk3_listing_fran_n = stringToNumber($fmk3_listing_fran);
$fmk3_listing_fran_r = numberToRupiah($fmk3_listing_fran_n);

//rincian biaya pph marketing listing
if (!empty($npwp_fran)) {
    $npwp_fran_2 = 1;
}else{
    $npwp_fran_2 = 0;
}

$npwp_listing_fran = $npwp_fran_2; 

if ($npwp_listing_fran == 1) {
    $n_listing_fran = 1;
} else {
    $n_listing_fran = 0;
}

if ($n_listing_fran == 1) {
    $pph_listing_fran = '2.5% - NPWP';
}else{
    $pph_listing_fran = '3% - Non NPWP';
}

if ($pph_listing_fran == '2.5% - NPWP') {
    $pph_listing_angka_fran = 2.5;
}else{
    $pph_listing_angka_fran = 3;
}

$biaya_pph_l_fran = $pph_listing_angka_fran / 100 * $fmk3_listing_fran;

//string to rupiah
$biaya_pph_l_fran_n = stringToNumber($biaya_pph_l_fran);
$biaya_pph_l_fran_r = numberToRupiah($biaya_pph_l_fran_n);

//fee fix diterima marketing listing
$fmb_l_fran = $fmk3_listing_fran - $biaya_pph_l_fran;

//string to rupiah
$fmb_l_fran_n = stringToNumber($fmb_l_fran);
$fmb_l_fran_r = numberToRupiah($fmb_l_fran_n);


//==================================================== Hitung WIN
foreach ($marketing as $win) {
    if ($win->nama_mar == "Winata") {
        $npwp_win = $win->gambar_npwp_mar; 
        $norek_win = $win->norek_mar;
        $l_member_win = $win->member_mar;
    }
}

if ($l_member_win == 'Silver') {
    $l_member_win_2 = 50;
}elseif($l_member_win == 'Gold Express'){
    $l_member_win_2 = 60;
}elseif($l_member_win == 'Prime Pro'){
    $l_member_win_2 = 70;
}else{
    $l_member_win_2 = 80;
}

if ($l_member_win_2 > 50) {
    $admin_listing_win = 2.5 / 100 * $afw_1;
}else{
    $admin_listing_win = 0;
}

//string to rupiah
$admin_listing_win_n = stringToNumber($admin_listing_win);
$admin_listing_win_r = numberToRupiah($admin_listing_win_n);

//fee marketing sementara setelah dikurangi admin
$fmk3_listing_win = $afw_1 - $admin_listing_win;

//string to rupiah
$fmk3_listing_win_n = stringToNumber($fmk3_listing_win);
$fmk3_listing_win_r = numberToRupiah($fmk3_listing_win_n);

//rincian biaya pph marketing listing
if (!empty($npwp_win)) {
    $npwp_win_3 = 1;
}else{
    $npwp_win_3 = 0;
}

$npwp_listing_win = $npwp_win_3; 

if ($npwp_listing_win == 1) {
    $n_listing_win = 1;
} else {
    $n_listing_win = 0;
}

if ($n_listing_win == 1) {
    $pph_listing_win = '2.5% - NPWP';
}else{
    $pph_listing_win = '3% - Non NPWP';
}

if ($pph_listing_win == '2.5% - NPWP') {
    $pph_listing_angka_win = 2.5;
}else{
    $pph_listing_angka_win = 3;
}

$biaya_pph_l_win = $pph_listing_angka_win / 100 * $fmk3_listing_win;

//string to rupiah
$biaya_pph_l_win_n = stringToNumber($biaya_pph_l_win);
$biaya_pph_l_win_r = numberToRupiah($biaya_pph_l_win_n);

//fee fix diterima marketing listing
$fmb_l_win = $fmk3_listing_win - $biaya_pph_l_win;

//string to rupiah
$fmb_l_win_n = stringToNumber($fmb_l_win);
$fmb_l_win_r = numberToRupiah($fmb_l_win_n);

//=================================================================================






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
