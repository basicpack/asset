<?php
//Criado por Anderson Ismael
//21 de junho de 2019

function asset($urls){
    if(is_string($urls)){
        $arr[]=$urls;
        $urls=$arr;
    }
    foreach ($urls as $url) {
        $filename=ROOT.'public/'.$url;
        $filename2=ROOT.$url;
        $path_parts = pathinfo($url);
        $ext=$path_parts['extension'];
        if(file_exists($filename)){
            $md5=md5_file($filename);
            $url=$url."?$md5";
            printAsset($url,$ext);
        }elseif(file_exists($filename2)){
            $md5=md5_file($filename2);
            $url=$url."?$md5";
            printAsset($url,$ext);
        }
    }
}

function printAsset($url,$ext){
    $url=$_SERVER["REQUEST_SCHEME"].'://'.$_ENV['SITE_DOMAIN'].$url;
    if($ext=='css'){
        print '<link rel="stylesheet" href="'.$url.'" />';
    }
    if($ext=='js'){
        print '<script src="'.$url.'"></script>';
    }
}

