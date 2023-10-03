<?php 
//bruto paling awal
$bruto_awal = $komisi->bruto_komisi;

//cek apakah ada referal awal
foreach ($potongan as $potongan) {
    if ($potongan->id_komisi == $komisi->id_komisi) {
        $potongan_1 = $potongan->jumlah_potongan;
        break;
    }
}

//cek apakah ada co-broke
foreach ($co_broke as $kubruk) {
    if ($kubruk->id_komisi == $komisi->id_komisi) {
        $kubruk_awal = $kubruk->status_selling;
        break;
    }
}

// //langkah 1
// if (!empty($potongan_1) && $potongan_1 == 'Listing' ) {
//     // code...
// }

// if (!empty($kubruk_awal)) {
//     echo "ada";
// }else{
//     echo "Tidak ada";
// }
// $referal_awal = 





















//total bruto
$bruto = $komisi->bruto_komisi;

//hitung_marketing_listing
$marketing_listing = $komisi->nama_mar; 

if (!empty($marketing_listing)) {
    $m_listing = 1;
} else {
    $m_listing = 0;
}

//hitung_marketing_selling
$marketing_selling = $komisi->nama_mar2; 

if (!empty($marketing_selling)) {
    $m_selling = 1;
} else {
    $m_selling = 0;
}

//pengaturan listing dan selling (jika ada kesamaan)
if ($komisi->mar_listing_komisi == $komisi->mar_selling_komisi) {
    $total_marketing = 1;
}else{
    $total_marketing = $m_listing + $m_selling;
}

//cari fee marketing kotor (FMK)
$fmk = $bruto / $total_marketing; 

//string to rupiah
$fmk_n = stringToNumber($fmk);
$fmk_r = numberToRupiah($fmk_n);

//cari fee marketing listing dan fee kantor
$l_member = $komisi->mm_listing_komisi;

// $member = $komisi->member_listing;
// if ($member == 'Silver') {
//     $l_member = 50;
// }elseif ($member == 'Gold Express') {
//     $l_member = 60;
// }elseif ($member == 'Prime Pro') {
//     $l_member = 70;
// }elseif ($member == 'Black Jack') {
//     $l_member = 80;
// }  

//cari fee marketing selling dan fee kantor
$s_member = $komisi->mm_selling_komisi;

// $member = $komisi->member_selling;
// if ($member == 'Silver') {
//     $s_member = 50;
// }elseif ($member == 'Gold Express') {
//     $s_member = 60;
// }elseif ($member == 'Prime Pro') {
//     $s_member = 70;
// }elseif ($member == 'Black Jack') {
//     $s_member = 80;
// }  

//fee marketing listing
$fmk2_listing = $l_member / 100 * $fmk ;

//string to rupiah
$fmk2_listing_n = stringToNumber($fmk2_listing);
$fmk2_listing_r = numberToRupiah($fmk2_listing_n);

//fee marketing selling
$fmk2_selling = $s_member / 100 * $fmk ;

//string to rupiah
$fmk2_selling_n = stringToNumber($fmk2_selling);
$fmk2_selling_r = numberToRupiah($fmk2_selling_n);

//cari fee kantor listing
$fkl = $fmk - $fmk2_listing;

//string to rupiah
$fkl_n = stringToNumber($fkl);
$fkl_r = numberToRupiah($fkl_n);

//cari fee kantor selling
$fks = $fmk - $fmk2_selling;

//string to rupiah
$fks_n = stringToNumber($fks);
$fks_r = numberToRupiah($fks_n);

//string to rupiah
$bruto_n = stringToNumber($bruto);
$bruto_r = numberToRupiah($bruto_n);

//==============================================================

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

//$npwp_listing = $komisi->npwp_listing; 
// if (!empty($npwp_listing)) {
//     $n_listing = 1;
// } else {
//     $n_listing = 0;
// }

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

//================================================================

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

//$npwp_selling = $komisi->npwp_selling; 
// if (!empty($npwp_selling)) {
//     $n_selling = 1;
// } else {
//     $n_selling = 0;
// }


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

//norek marketing listing
$norek_listing = $komisi->norek_listing;

//norek marketing selling
$norek_selling = $komisi->norek_selling;

?>
