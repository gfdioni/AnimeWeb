<?php
function cek($id)
{
    $ci = & get_instance();
    if($id == 1){
        $html = '<span class="glyphicon glyphicon-ok-circle">';
        $html .= '</span>';
    } else {
        $html = '<span class="glyphicon glyphicon-remove-circle">';
        $html .= '</span>';
    }
    return $html;
}

function pendekin($kata)
{
    $desc= explode('.', $kata, 3);
    $hasil= $desc[0].'.'.$desc[1].'.';
    return $hasil;
}