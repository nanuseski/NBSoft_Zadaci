<?php

function getMainDirectoryItems($path){
    $data = getDirectoryItems($path);

    $html="";
    foreach ($data as $d){
        $html.='<li class="items firstItems"> <a class="itemLink"';

        if(is_dir($d)) {
            $html.= 'href="#">'.$d.'</a>'.displaySelectedItems($d);
        } else{
            $html.= 'href="'.$d.'" target="_blank">'.$d.'</a>';
        }

        $html.='</li>';

    }

    echo $html;
}

function getDirectoryItems($path){
    $data = scandir($path);

    $data = array_diff($data, array('.', '..'));

    return $data;

}

function displaySelectedItems($data){

    $parent = $data;

    $html= "<ol class='otherItems'>";

    $data = getDirectoryItems($data);
    foreach ($data as $d){

        $html.='<li class="items "> <a class="itemLink"';

        if(is_dir($parent."\\".$d)) {
            $parentX = $parent."\\".$d;
            $html.= 'href="#">'.$d.'</a>'.displaySelectedItems($parentX);
        }else{
            $html.= 'href="'.$parent."\\".$d.'" target="_blank">'.$d.'</a>';
        }
        $html.='</li>';

    }
    $html.='</ol>';

    return $html;
}
