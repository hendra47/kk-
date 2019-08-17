<?php
if (! function_exists('aksesName')) {
    function aksesName($id)
    {
        if($id){
            return "Yes";
        }
        return "No";
    }
}

function format_uang($angka){ 
    $num = explode('.', $angka);
    if(count($num) == 2){ $angk = number_format($angka,4,",","."); }
    else { $angk = number_format($angka,0,",","."); }
    return 'Rp '.$angk;
}