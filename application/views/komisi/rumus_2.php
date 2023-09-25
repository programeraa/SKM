<?php 
//upline listing
// $up_1_l = $komisi->up_1_listing;
// $up_2_l = $komisi->up_2_listing;

foreach ($marketing as $mkt) {
    if ($mkt->id_mar == $komisi->up_1_listing) {
        $up_1_listing = $mkt->nama_mar;
        break;
    }else{
        $up_1_listing = '';
    }
}

$up_1_listing;

foreach ($marketing as $mkt) {
    if ($mkt->id_mar == $komisi->up_2_listing) {
        $up_2_listing = $mkt->nama_mar;
        break;
    }else{
        $up_2_listing = '';
    }
}

$up_2_listing;

//cek upline marketing listing ada atau tidak
if (!empty($up_1_listing)) {
    $up_listing_1 = 1;
} else {
    $up_listing_1 = 0;
}

if (!empty($up_2_listing)) {
    $up_listing_2 = 1;
} else {
    $up_listing_2 = 0;
}

//hitung upline listing 1
//fee kotor

$fuk = 5 / 100 * $fkl;

//string to rupiah
$fuk_n = stringToNumber($fuk);
$fuk_r = numberToRupiah($fuk_n);

//fuk listing dikurangi pajak
//$a = null;


// foreach ($marketing as $upline) {
//     if ($komisi->up_1_listing == $upline->nama_mar) {
//         $a = $upline->npwp_mar;
//             break; // Hentikan iterasi setelah menemukan kesamaan pertama
//         } 
//     }

$a = $komisi->npwpum_listing_komisi;

if ($a == 1) {
    $npwp_upline1_listing = 2.5;
} else {
    $npwp_upline1_listing = 3;
}

if ($npwp_upline1_listing == 2.5) {
    $teks_pajak_listing_1 = '2.5% - NPWP';
}else{
    $teks_pajak_listing_1 = '3% - Non NPWP';
}

$pajak_listing_1 = $npwp_upline1_listing / 100 * $fuk;

//string to rupiah
$pajak_listing_1_n = stringToNumber($pajak_listing_1);
$pajak_listing_1_r = numberToRupiah($pajak_listing_1_n);

//netto 1
$netto_listing_1 = $fuk - $pajak_listing_1;

//string to rupiah
$netto_listing_1_n = stringToNumber($netto_listing_1);
$netto_listing_1_r = numberToRupiah($netto_listing_1_n);

//===============================================================

//hitung upline listing 2
//fee kotor

$fuk2 = 5 / 100 * $fkl;

//string to rupiah
$fuk2_n = stringToNumber($fuk2);
$fuk2_r = numberToRupiah($fuk2_n);

//fuk listing dikurangi pajak
    //$a = null;

    // foreach ($marketing as $upline) {
    //     if ($komisi->up_2_listing == $upline->nama_mar) {
    //         $a2 = $upline->npwp_mar;
    //         break; // Hentikan iterasi setelah menemukan kesamaan pertama
    //     } 
    // }

$a2 = $komisi->npwpum_listing2_komisi;

if ($a2 == 1) {
    $npwp_upline2_listing = 2.5;
} else {
    $npwp_upline2_listing = 3;
}

if ($npwp_upline2_listing == 2.5) {
    $teks_pajak_listing_2 = '2.5% - NPWP';
}else{
    $teks_pajak_listing_2 = '3% - Non NPWP';
}

$pajak_listing_2 = $npwp_upline2_listing / 100 * $fuk2;

//string to rupiah
$pajak_listing_2_n = stringToNumber($pajak_listing_2);
$pajak_listing_2_r = numberToRupiah($pajak_listing_2_n);

//netto 1
$netto_listing_2 = $fuk - $pajak_listing_2;

//string to rupiah
$netto_listing_2_n = stringToNumber($netto_listing_2);
$netto_listing_2_r = numberToRupiah($netto_listing_2_n);

//===============================================================
//===============================================================

//upline selling
// $up_1_selling = $komisi->up_1_selling;
// $up_2_selling = $komisi->up_2_selling;

foreach ($marketing as $mkt) {
    if ($mkt->id_mar == $komisi->up_1_selling) {
        $up_1_selling = $mkt->nama_mar;
        break;
    }else{
        $up_1_selling = '';
    }
}

$up_1_selling;

foreach ($marketing as $mkt) {
    if ($mkt->id_mar == $komisi->up_2_selling) {
        $up_2_selling = $mkt->nama_mar;
        break;
    }else{
        $up_2_selling = '';
    }
}

$up_2_selling;

//cek upline marketing selling ada atau tidak
if (!empty($up_1_selling)) {
    $up_selling_1 = 1;
} else {
    $up_selling_1 = 0;
}

if (!empty($up_2_selling)) {
    $up_selling_2 = 1;
} else {
    $up_selling_2 = 0;
}

//hitung upline selling 1
//fee kotor

$fuk_s = 5 / 100 * $fks;

//string to rupiah
$fuk_s_n = stringToNumber($fuk_s);
$fuk_s_r = numberToRupiah($fuk_s_n);

//fuk selling dikurangi pajak
    //$a = null;

    // foreach ($marketing as $upline) {
    //     if ($komisi->up_1_selling == $upline->nama_mar) {
    //         $b = $upline->npwp_mar;
    //         break; // Hentikan iterasi setelah menemukan kesamaan pertama
    //     } 
    // }

$b = $komisi->npwpum_selling_komisi;

if ($b == 1) {
    $npwp_upline1_selling = 2.5;
} else {
    $npwp_upline1_selling = 3;
}

if ($npwp_upline1_selling == 2.5) {
    $teks_pajak_selling_1 = '2.5% - NPWP';
}else{
    $teks_pajak_selling_1 = '3% - Non NPWP';
}

$pajak_selling_1 = $npwp_upline1_selling / 100 * $fuk_s;

//string to rupiah
$pajak_selling_1_n = stringToNumber($pajak_selling_1);
$pajak_selling_1_r = numberToRupiah($pajak_selling_1_n);

//netto 1
$netto_selling_1 = $fuk_s - $pajak_selling_1;

//string to rupiah
$netto_selling_1_n = stringToNumber($netto_selling_1);
$netto_selling_1_r = numberToRupiah($netto_selling_1_n);

//===============================================================

//hitung upline selling 2
//fee kotor

$fuk2_s = 5 / 100 * $fks;

//string to rupiah
$fuk2_s_n = stringToNumber($fuk2_s);
$fuk2_s_r = numberToRupiah($fuk2_s_n);

//fuk selling dikurangi pajak
    //$a = null;

    // foreach ($marketing as $upline) {
    //     if ($komisi->up_2_selling == $upline->nama_mar) {
    //         $b2 = $upline->npwp_mar;
    //         break; // Hentikan iterasi setelah menemukan kesamaan pertama
    //     } 
    // }

$b2 = $komisi->npwpum_selling2_komisi;

if ($b2 == 1) {
    $npwp_upline2_selling = 2.5;
} else {
    $npwp_upline2_selling = 3;
}

if ($npwp_upline2_selling == 2.5) {
    $teks_pajak_selling_2 = '2.5% - NPWP';
}else{
    $teks_pajak_selling_2 = '3% - Non NPWP';
}

$pajak_selling_2 = $npwp_upline2_selling / 100 * $fuk2_s;

//string to rupiah
$pajak_selling_2_n = stringToNumber($pajak_selling_2);
$pajak_selling_2_r = numberToRupiah($pajak_selling_2_n);

//netto 1
$netto_selling_2 = $fuk2_s - $pajak_selling_2;

//string to rupiah
$netto_selling_2_n = stringToNumber($netto_selling_2);
$netto_selling_2_r = numberToRupiah($netto_selling_2_n);

//norek upline 1 listing
foreach ($marketing as $upline) {
    if ($upline->nama_mar == $up_1_listing) {
        $norek_up_listing1 = $upline->norek_mar;
                break; // Hentikan iterasi setelah menemukan kesamaan pertama
            } 
        }

//norek upline 2 listing
        foreach ($marketing as $upline) {
            if ($upline->nama_mar == $up_2_listing) {
                $norek_up_listing2 = $upline->norek_mar;
            break; // Hentikan iterasi setelah menemukan kesamaan pertama
        } 
    }

//norek upline 1 selling
    foreach ($marketing as $upline) {
        if ($upline->nama_mar == $up_1_selling) {
            $norek_up_selling1 = $upline->norek_mar;
            break; // Hentikan iterasi setelah menemukan kesamaan pertama
        } 
    }

//norek upline 2 selling
    foreach ($marketing as $upline) {
        if ($upline->nama_mar == $up_2_selling) {
            $norek_up_selling2 = $upline->norek_mar;
            break; // Hentikan iterasi setelah menemukan kesamaan pertama
        } 
    }

?>