<?php

function getMainDirectoryItems($path){
    $data = getDirectoryItems($path);

    $html="";
    foreach ($data as $d){
        $html.='<li class="items firstItems"> <a class="itemLink" href="#">'.$d.'</a>';

        if(is_dir($d)) {
            $html.= displaySelectedItems($d);
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

    $html= "<ol>";

    $data = getDirectoryItems($data);
    foreach ($data as $d){

        $html.='<li class="items"> <a class="itemLink" href="#">'.$d.'</a>';
        var_dump($parent."\\".$d);
        if(is_dir($parent."\\".$d)) {
            $parentX = $parent."\\".$d;
            $html.= displaySelectedItems($parentX);
        }
        $html.='</li>';

    }
    $html.='</ol>';

    return $html;
}






////////////////////////

function selected(){

    if (isset($_POST['upload'])) {
        if ($_POST['foldername'] != "") {
            $foldername = $_POST['foldername'];
            if (!is_dir($foldername)) mkdir($foldername);
            foreach ($_FILES['files']['name'] as $i => $name) {
                if (strlen($_FILES['files']['name'][$i]) > 1) {
                    move_uploaded_file($_FILES['files']['tmp_name'][$i], $foldername . "/" . $name);
                }
            }
            echo "Folder is successfully uploaded";
        } else
            echo "Upload folder name is empty";
    }

}