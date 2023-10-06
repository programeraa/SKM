<?php
//=================================================== cari upline listing 1 dan 2
//cari upline listing 1
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

//============================================================
//cari upline listing 2
foreach ($marketing as $mkt) {
    if ($mkt->id_mar == $komisi->up_1_listing2) {
        $up_1_listing2 = $mkt->nama_mar;
        break;
    }else{
        $up_1_listing2 = '';
    }
}

$up_1_listing2;

foreach ($marketing as $mkt) {
    if ($mkt->id_mar == $komisi->up_2_listing2) {
        $up_2_listing2 = $mkt->nama_mar;
        break;
    }else{
        $up_2_listing2 = '';
    }
}

$up_2_listing2;

//cek upline marketing listing ada atau tidak
if (!empty($up_1_listing2)) {
    $up_listing2_1 = 1;
} else {
    $up_listing2_1 = 0;
}

if (!empty($up_2_listing2)) {
    $up_listing2_2 = 1;
} else {
    $up_listing2_2 = 0;
}

//===================================================== hitung upline 1 listing 1
//fee kotor

$fuk = 5 / 100 * $fkl;

//string to rupiah
$fuk_n = stringToNumber($fuk);
$fuk_r = numberToRupiah($fuk_n);

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

//hitung upline 2 listing 1
//fee kotor

$fuk2 = 5 / 100 * $fkl;

//string to rupiah
$fuk2_n = stringToNumber($fuk2);
$fuk2_r = numberToRupiah($fuk2_n);

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

//=============================================================== xxx
//hitung upline 1 listing 2 
//fee kotor

$fuk3 = 5 / 100 * $fkl2;

//string to rupiah
$fuk3_n = stringToNumber($fuk3);
$fuk3_r = numberToRupiah($fuk3_n);

$a3 = $komisi->npwpum2_listing_komisi;

if ($a3 == 1) {
    $npwp_upline1_listing2 = 2.5;
} else {
    $npwp_upline1_listing2 = 3;
}

if ($npwp_upline1_listing2 == 2.5) {
    $teks_pajak1_listing_2 = '2.5% - NPWP';
}else{
    $teks_pajak1_listing_2 = '3% - Non NPWP';
}

$pajak1_listing_2 = $npwp_upline1_listing2 / 100 * $fuk3;

//string to rupiah
$pajak1_listing_2_n = stringToNumber($pajak1_listing_2);
$pajak1_listing_2_r = numberToRupiah($pajak1_listing_2_n);

//netto 1
$netto1_listing_2 = $fuk3 - $pajak1_listing_2;

//string to rupiah
$netto1_listing_2_n = stringToNumber($netto1_listing_2);
$netto1_listing_2_r = numberToRupiah($netto1_listing_2_n);

//===============================================================

//hitung upline 2 listing 2
//fee kotor

$fuk4 = 5 / 100 * $fkl2;

//string to rupiah
$fuk4_n = stringToNumber($fuk4);
$fuk4_r = numberToRupiah($fuk4_n);

$a4 = $komisi->npwpum2_listing2_komisi;

if ($a4 == 1) {
    $npwp_upline2_listing2 = 2.5;
} else {
    $npwp_upline2_listing2 = 3;
}

if ($npwp_upline2_listing2 == 2.5) {
    $teks_pajak2_listing_2 = '2.5% - NPWP';
}else{
    $teks_pajak2_listing_2 = '3% - Non NPWP';
}

$pajak2_listing_2 = $npwp_upline2_listing2 / 100 * $fuk4;

//string to rupiah
$pajak2_listing_2_n = stringToNumber($pajak2_listing_2);
$pajak2_listing_2_r = numberToRupiah($pajak2_listing_2_n);

//netto 1
$netto2_listing_2 = $fuk4 - $pajak2_listing_2;

//string to rupiah
$netto2_listing_2_n = stringToNumber($netto2_listing_2);
$netto2_listing_2_r = numberToRupiah($netto2_listing_2_n);











//=================================================== cari upline selling 1 dan 2
//cari upline selling 1
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

//================================================ cari upline selling 2
foreach ($marketing as $mkt) {
    if ($mkt->id_mar == $komisi->up_1_selling2) {
        $up_1_selling2 = $mkt->nama_mar;
        break;
    }else{
        $up_1_selling2 = '';
    }
}

$up_1_selling2;

foreach ($marketing as $mkt) {
    if ($mkt->id_mar == $komisi->up_2_selling2) {
        $up_2_selling2 = $mkt->nama_mar;
        break;
    }else{
        $up_2_selling2 = '';
    }
}

$up_2_selling2;

//cek upline marketing selling ada atau tidak
if (!empty($up_1_selling2)) {
    $up_selling2_1 = 1;
} else {
    $up_selling2_1 = 0;
}

if (!empty($up_2_selling2)) {
    $up_selling2_2 = 1;
} else {
    $up_selling2_2 = 0;
}
//================================== XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX

//========================================================= hitung upline 1 selling 1
//fee kotor

$fuk_s = 5 / 100 * $fks;

//string to rupiah
$fuk_s_n = stringToNumber($fuk_s);
$fuk_s_r = numberToRupiah($fuk_s_n);

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

//hitung upline 2 selling 1
//fee kotor

$fuk2_s = 5 / 100 * $fks;

//string to rupiah
$fuk2_s_n = stringToNumber($fuk2_s);
$fuk2_s_r = numberToRupiah($fuk2_s_n);

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

//=============================================================== hitung upline selling 2

//hitung upline 1 selling 2
//fee kotor

$fuk3_s = 5 / 100 * $fks2;

//string to rupiah
$fuk3_s_n = stringToNumber($fuk3_s);
$fuk3_s_r = numberToRupiah($fuk3_s_n);

$b3 = $komisi->npwpum2_selling_komisi;

if ($b3 == 1) {
    $npwp_upline1_selling2 = 2.5;
} else {
    $npwp_upline1_selling2 = 3;
}

if ($npwp_upline1_selling2 == 2.5) {
    $teks_pajak1_selling_2 = '2.5% - NPWP';
}else{
    $teks_pajak1_selling_2 = '3% - Non NPWP';
}

$pajak1_selling_2 = $npwp_upline1_selling2 / 100 * $fuk3_s;

//string to rupiah
$pajak1_selling_2_n = stringToNumber($pajak1_selling_2);
$pajak1_selling_2_r = numberToRupiah($pajak1_selling_2_n);

//netto 1
$netto1_selling_2 = $fuk3_s - $pajak1_selling_2;

//string to rupiah
$netto1_selling_2_n = stringToNumber($netto1_selling_2);
$netto1_selling_2_r = numberToRupiah($netto1_selling_2_n);

//=============================================================== hitung upline 2 selling 2

//hitung upline 2 selling 2
//fee kotor

$fuk4_s = 5 / 100 * $fks2;

//string to rupiah
$fuk4_s_n = stringToNumber($fuk4_s);
$fuk4_s_r = numberToRupiah($fuk4_s_n);

$b4 = $komisi->npwpum2_selling2_komisi;

if ($b4 == 1) {
    $npwp_upline2_selling2 = 2.5;
} else {
    $npwp_upline2_selling2 = 3;
}

if ($npwp_upline2_selling2 == 2.5) {
    $teks_pajak2_selling_2 = '2.5% - NPWP';
}else{
    $teks_pajak2_selling_2 = '3% - Non NPWP';
}

$pajak2_selling_2 = $npwp_upline2_selling2 / 100 * $fuk4_s;

//string to rupiah
$pajak2_selling_2_n = stringToNumber($pajak2_selling_2);
$pajak2_selling_2_r = numberToRupiah($pajak2_selling_2_n);

//netto 1
$netto2_selling_2 = $fuk4_s - $pajak2_selling_2;

//string to rupiah
$netto2_selling_2_n = stringToNumber($netto2_selling_2);
$netto2_selling_2_r = numberToRupiah($netto2_selling_2_n);

//====================================================================== Norek Upline
//norek upline 1 listing 1
foreach ($marketing as $upline) {
    if ($upline->nama_mar == $up_1_listing) {
        $norek_up_listing1 = $upline->norek_mar;
                break; // Hentikan iterasi setelah menemukan kesamaan pertama
            } 
        }

//norek upline 2 listing 1
        foreach ($marketing as $upline) {
            if ($upline->nama_mar == $up_2_listing) {
                $norek_up_listing2 = $upline->norek_mar;
            break; // Hentikan iterasi setelah menemukan kesamaan pertama
        } 
    }

//norek upline 1 listing 2
foreach ($marketing as $upline) {
    if ($upline->nama_mar == $up_1_listing2) {
        $norek_up1_listing2 = $upline->norek_mar;
                break; // Hentikan iterasi setelah menemukan kesamaan pertama
            } 
        }

//norek upline 2 listing 2
        foreach ($marketing as $upline) {
            if ($upline->nama_mar == $up_2_listing2) {
                $norek_up2_listing2 = $upline->norek_mar;
            break; // Hentikan iterasi setelah menemukan kesamaan pertama
        } 
    }

//==================================================================================

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

//norek upline 1 selling 2
    foreach ($marketing as $upline) {
        if ($upline->nama_mar == $up_1_selling2) {
            $norek_up1_selling2 = $upline->norek_mar;
            break; // Hentikan iterasi setelah menemukan kesamaan pertama
        } 
    }


//norek upline 2 selling 2
    foreach ($marketing as $upline) {
        if ($upline->nama_mar == $up_2_selling2) {
            $norek_up2_selling2 = $upline->norek_mar;
            break; // Hentikan iterasi setelah menemukan kesamaan pertama
        } 
    }

?>
