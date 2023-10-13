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




//====================================================================== Kasus ANG FRAN WIN

//Cari Upline ANG
    $nama_upline1_ang = '';
    $npwp_upline1_ang = '';
    $norek_upline1_ang = '';

    $nama_upline2_ang = '';
    $npwp_upline2_ang = '';
    $norek_upline2_ang = '';

    foreach ($marketing as $ang) { 
        if ($ang->nama_mar == "Ang") {
            foreach ($marketing as $ang_2) {
                if ($ang_2->id_mar == $ang->upline_emd_mar) {
                    $nama_upline1_ang = $ang_2->nama_mar;
                    $npwp_upline1_ang = $ang_2->gambar_npwp_mar;
                    $norek_upline1_ang = $ang_2->norek_mar;
                }

                if (!empty($npwp_upline1_ang)) {
                    $npwp_up1_ang = 1;
                }else{
                    $npwp_up1_ang = 0;
                }
            }

            foreach ($marketing as $ang_3) {
                if ($ang_3->id_mar == $ang->upline_cmo_mar) {
                    $nama_upline2_ang = $ang_3->nama_mar;
                    $npwp_upline2_ang = $ang_3->gambar_npwp_mar;
                    $norek_upline2_ang = $ang_3->norek_mar;
                }

                if (!empty($npwp_upline2_ang)) {
                    $npwp_up2_ang = 1;
                }else{
                    $npwp_up2_ang = 0;
                }
            }
        }
    }

    //================================================================ upline 1 ang
    $fuk_ang = 5 / 100 * $afw_2;

//string to rupiah
    $fuk_ang_n = stringToNumber($fuk_ang);
    $fuk_ang_r = numberToRupiah($fuk_ang_n);

    $npwp_upline_ang = $komisi->npwp_up_ang;

    if ($npwp_upline_ang == 1) {
        $npwp_upline_ang_angka = 2.5;
    } else {
        $npwp_upline_ang_angka = 3;
    }

    if ($npwp_upline_ang_angka == 2.5) {
        $teks_pajak_upline_ang = '2.5% - NPWP';
    }else{
        $teks_pajak_upline_ang = '3% - Non NPWP';
    }

    $pajak_upline_ang = $npwp_upline_ang_angka / 100 * $fuk_ang;

//string to rupiah
    $pajak_upline_ang_n = stringToNumber($pajak_upline_ang);
    $pajak_upline_ang_r = numberToRupiah($pajak_upline_ang_n);

//netto 1
    $netto_upline_ang = $fuk_ang - $pajak_upline_ang;

//string to rupiah
    $netto_upline_ang_n = stringToNumber($netto_upline_ang);
    $netto_upline_ang_r = numberToRupiah($netto_upline_ang_n);

//================================================================ upline 2 ang
    $fuk_ang2 = 5 / 100 * $afw_2;

//string to rupiah
    $fuk_ang2_n = stringToNumber($fuk_ang2);
    $fuk_ang2_r = numberToRupiah($fuk_ang2_n);

    $npwp_upline_ang2 = $komisi->npwp_up2_ang;

    if ($npwp_upline_ang2 == 1) {
        $npwp_upline_ang2_angka = 2.5;
    } else {
        $npwp_upline_ang2_angka = 3;
    }

    if ($npwp_upline_ang2_angka == 2.5) {
        $teks_pajak_upline_ang2 = '2.5% - NPWP';
    }else{
        $teks_pajak_upline_ang2 = '3% - Non NPWP';
    }

    $pajak_upline_ang2 = $npwp_upline_ang2_angka / 100 * $fuk_ang2;

//string to rupiah
    $pajak_upline_ang2_n = stringToNumber($pajak_upline_ang2);
    $pajak_upline_ang2_r = numberToRupiah($pajak_upline_ang2_n);

//netto 1
    $netto_upline_ang2 = $fuk_ang2 - $pajak_upline_ang2;

//string to rupiah
    $netto_upline_ang2_n = stringToNumber($netto_upline_ang2);
    $netto_upline_ang2_r = numberToRupiah($netto_upline_ang2_n);

//===============================================================


//Cari Upline FRAN
    $nama_upline1_fran = '';
    $npwp_upline1_fran = '';
    $norek_upline1_fran = '';

    $nama_upline2_fran = '';
    $npwp_upline2_fran = '';
    $norek_upline2_fran = '';

    foreach ($marketing as $fran) { 
        if ($fran->nama_mar == "Fran") {
            foreach ($marketing as $fran_2) {
                if ($fran_2->id_mar == $fran->upline_emd_mar) {
                    $nama_upline1_fran = $fran_2->nama_mar;
                    $npwp_upline1_fran = $fran_2->gambar_npwp_mar;
                    $norek_upline1_fran = $fran_2->norek_mar;
                }

                if (!empty($npwp_upline1_fran)) {
                    $npwp_up1_fran = 1;
                }else{
                    $npwp_up1_fran = 0;
                }
            }

            foreach ($marketing as $fran_3) {
                if ($fran_3->id_mar == $fran->upline_cmo_mar) {
                    $nama_upline2_fran = $fran_3->nama_mar;
                    $npwp_upline2_fran = $fran_3->gambar_npwp_mar;
                    $norek_upline2_fran = $fran_3->norek_mar;
                }

                if (!empty($npwp_upline2_fran)) {
                    $npwp_up2_fran = 1;
                }else{
                    $npwp_up2_fran = 0;
                }
            }
        }
    }

    //================================================================ upline 1 fran
    $fuk_fran = 5 / 100 * $afw_2;

//string to rupiah
    $fuk_fran_n = stringToNumber($fuk_fran);
    $fuk_fran_r = numberToRupiah($fuk_fran_n);

    $npwp_upline_fran = $komisi->npwp_up_fran;

    if ($npwp_upline_fran == 1) {
        $npwp_upline_fran_angka = 2.5;
    } else {
        $npwp_upline_fran_angka = 3;
    }

    if ($npwp_upline_fran_angka == 2.5) {
        $teks_pajak_upline_fran = '2.5% - NPWP';
    }else{
        $teks_pajak_upline_fran = '3% - Non NPWP';
    }

    $pajak_upline_fran = $npwp_upline_fran_angka / 100 * $fuk_fran;

//string to rupiah
    $pajak_upline_fran_n = stringToNumber($pajak_upline_fran);
    $pajak_upline_fran_r = numberToRupiah($pajak_upline_fran_n);

//netto 1
    $netto_upline_fran = $fuk_fran - $pajak_upline_fran;

//string to rupiah
    $netto_upline_fran_n = stringToNumber($netto_upline_fran);
    $netto_upline_fran_r = numberToRupiah($netto_upline_fran_n);

//================================================================ upline 2 fran
    $fuk_fran2 = 5 / 100 * $afw_2;

//string to rupiah
    $fuk_fran2_n = stringToNumber($fuk_fran2);
    $fuk_fran2_r = numberToRupiah($fuk_fran2_n);

    $npwp_upline_fran2 = $komisi->npwp_up2_fran;

    if ($npwp_upline_fran2 == 1) {
        $npwp_upline_fran2_angka = 2.5;
    } else {
        $npwp_upline_fran2_angka = 3;
    }

    if ($npwp_upline_fran2_angka == 2.5) {
        $teks_pajak_upline_fran2 = '2.5% - NPWP';
    }else{
        $teks_pajak_upline_fran2 = '3% - Non NPWP';
    }

    $pajak_upline_fran2 = $npwp_upline_fran2_angka / 100 * $fuk_fran2;

//string to rupiah
    $pajak_upline_fran2_n = stringToNumber($pajak_upline_fran2);
    $pajak_upline_fran2_r = numberToRupiah($pajak_upline_fran2_n);

//netto 1
    $netto_upline_fran2 = $fuk_fran2 - $pajak_upline_fran2;

//string to rupiah
    $netto_upline_fran2_n = stringToNumber($netto_upline_fran2);
    $netto_upline_fran2_r = numberToRupiah($netto_upline_fran2_n);

//===============================================================


//Cari Upline WIN
    $nama_upline1_win = '';
    $npwp_upline1_win = '';
    $norek_upline1_win = '';

    $nama_upline2_win = '';
    $npwp_upline2_win = '';
    $norek_upline2_win = '';

    foreach ($marketing as $win) { 
        if ($win->nama_mar == "Winata") {
            foreach ($marketing as $win_2) {
                if ($win_2->id_mar == $win->upline_emd_mar) {
                    $nama_upline1_win = $win_2->nama_mar;
                    $npwp_upline1_win = $win_2->gambar_npwp_mar;
                    $norek_upline1_win = $win_2->norek_mar;
                }

                if (!empty($npwp_upline1_win)) {
                    $npwp_up1_win = 1;
                }else{
                    $npwp_up1_win = 0;
                }
            }

            foreach ($marketing as $win_3) {
                if ($win_3->id_mar == $win->upline_cmo_mar) {
                    $nama_upline2_win = $win_3->nama_mar;
                    $npwp_upline2_win = $win_3->gambar_npwp_mar;
                    $norek_upline2_win = $win_3->norek_mar;
                }

                if (!empty($npwp_upline2_win)) {
                    $npwp_up2_win = 1;
                }else{
                    $npwp_up2_win = 0;
                }
            }
        }
    }

    //================================================================ upline 1 win
    $fuk_win = 5 / 100 * $afw_1;

//string to rupiah
    $fuk_win_n = stringToNumber($fuk_win);
    $fuk_win_r = numberToRupiah($fuk_win_n);

    $npwp_upline_win = $komisi->npwp_up_win;

    if ($npwp_upline_win == 1) {
        $npwp_upline_win_angka = 2.5;
    } else {
        $npwp_upline_win_angka = 3;
    }

    if ($npwp_upline_win_angka == 2.5) {
        $teks_pajak_upline_win = '2.5% - NPWP';
    }else{
        $teks_pajak_upline_win = '3% - Non NPWP';
    }

    $pajak_upline_win = $npwp_upline_win_angka / 100 * $fuk_win;

//string to rupiah
    $pajak_upline_win_n = stringToNumber($pajak_upline_win);
    $pajak_upline_win_r = numberToRupiah($pajak_upline_win_n);

//netto 1
    $netto_upline_win = $fuk_win - $pajak_upline_win;

//string to rupiah
    $netto_upline_win_n = stringToNumber($netto_upline_win);
    $netto_upline_win_r = numberToRupiah($netto_upline_win_n);

//================================================================ upline 2 win
    $fuk_win2 = 5 / 100 * $afw_1;

//string to rupiah
    $fuk_win2_n = stringToNumber($fuk_win2);
    $fuk_win2_r = numberToRupiah($fuk_win2_n);

    $npwp_upline_win2 = $komisi->npwp_up2_win;

    if ($npwp_upline_win2 == 1) {
        $npwp_upline_win2_angka = 2.5;
    } else {
        $npwp_upline_win2_angka = 3;
    }

    if ($npwp_upline_win2_angka == 2.5) {
        $teks_pajak_upline_win2 = '2.5% - NPWP';
    }else{
        $teks_pajak_upline_win2 = '3% - Non NPWP';
    }

    $pajak_upline_win2 = $npwp_upline_win2_angka / 100 * $fuk_win2;

//string to rupiah
    $pajak_upline_win2_n = stringToNumber($pajak_upline_win2);
    $pajak_upline_win2_r = numberToRupiah($pajak_upline_win2_n);

//netto 1
    $netto_upline_win2 = $fuk_win2 - $pajak_upline_win2;

//string to rupiah
    $netto_upline_win2_n = stringToNumber($netto_upline_win2);
    $netto_upline_win2_r = numberToRupiah($netto_upline_win2_n);

//===============================================================


?>
