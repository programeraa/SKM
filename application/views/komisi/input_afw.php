<?php 
$npwp_up_ang = 0;
$npwp_up2_ang = 0;

foreach ($marketing as $ang) {
    if ($ang->nama_mar == "Ang") {

        if ($ang->member_mar == 'Silver') {
            $member_ang = 50;
        } elseif ($ang->member_mar == 'Gold Express') {
            $member_ang = 60;
        } elseif ($ang->member_mar == 'Prime Pro') {
            $member_ang = 70;
        } elseif ($ang->member_mar == 'Black Jack') {
            $member_ang = 80;
        }

        if (!empty($ang->gambar_npwp_mar)) {
            $npwp_ang = 1;
        } else {
            $npwp_ang = 0;
        }

        $up_ang = $ang->upline_emd_mar;
        $up2_ang = $ang->upline_cmo_mar;
    }else{
        $up_ang = '';
        $up2_ang = '';
    }

    foreach ($marketing as $ang_2) {
       if ($ang_2->id_mar == $up_ang ) {
           if (!empty($ang_2->gambar_npwp_mar)) {
               $npwp_up_ang = 1;
           }
       }
   }

   foreach ($marketing as $ang_3) {
       if ($ang_3->id_mar == $up2_ang ) {
           if (!empty($ang_3->gambar_npwp_mar)) {
               $npwp_up2_ang = 1;
           }
       }
   }
}


$npwp_up_fran = 0;
$npwp_up2_fran = 0;

foreach ($marketing as $fran) {
    if ($fran->nama_mar == "Fran") {

        if ($fran->member_mar == 'Silver') {
            $member_fran = 50;
        } elseif ($fran->member_mar == 'Gold Express') {
            $member_fran = 60;
        } elseif ($fran->member_mar == 'Prime Pro') {
            $member_fran = 70;
        } elseif ($fran->member_mar == 'Black Jack') {
            $member_fran = 80;
        }

        if (!empty($fran->gambar_npwp_mar)) {
            $npwp_fran = 1;
        } else {
            $npwp_fran = 0;
        }

        $up_fran = $fran->upline_emd_mar;
        $up2_fran = $fran->upline_cmo_mar;
    }else{
        $up_fran = '';
        $up2_fran = '';
    }

    foreach ($marketing as $fran_2) {
       if ($fran_2->id_mar == $up_fran ) {
           if (!empty($fran_2->gambar_npwp_mar)) {
               $npwp_up_fran = 1;
           }
       }
   }

   foreach ($marketing as $fran_3) {
       if ($fran_3->id_mar == $up2_fran ) {
           if (!empty($fran_3->gambar_npwp_mar)) {
               $npwp_up2_fran = 1;
           }
       }
   }
}

$npwp_up_win = 0;
$npwp_up2_win = 0;

foreach ($marketing as $win) {
    if ($win->nama_mar == "Winata") {

        if ($win->member_mar == 'Silver') {
            $member_win = 50;
        } elseif ($win->member_mar == 'Gold Express') {
            $member_win = 60;
        } elseif ($win->member_mar == 'Prime Pro') {
            $member_win = 70;
        } elseif ($win->member_mar == 'Black Jack') {
            $member_win = 80;
        }

        if (!empty($win->gambar_npwp_mar)) {
            $npwp_win = 1;
        } else {
            $npwp_win = 0;
        }

        $up_win = $win->upline_emd_mar;
        $up2_win = $win->upline_cmo_mar;
    }else{
        $up_win = '';
        $up2_win = '';
    }

    foreach ($marketing as $win_2) {
       if ($win_2->id_mar == $up_win ) {
           if (!empty($win_2->gambar_npwp_mar)) {
               $npwp_up_win = 1;
           }
       }
   }

   foreach ($marketing as $win_3) {
       if ($win_3->id_mar == $up2_win ) {
           if (!empty($win_3->gambar_npwp_mar)) {
               $npwp_up2_win = 1;
           }
       }
   }
}

?>
