<?php

include './config.php';

if (isset($_GET['action']) && $_GET['action'] == 'getContent') {
    //echo $_GET['directory'];
    getContents($_GET['directory']);
}

function getContents($dir)
{

    global $base;
    global $root;
    global $logPath;

    $contents = [];

    $files = scandir($dir, SCANDIR_SORT_NONE);

    foreach ($files as $key => $value) {
        $path = realpath($dir . DIRECTORY_SEPARATOR . $value);
        if (is_dir($path) || $value == "..") {
            if (($value == "." || $value == "..") && $dir == $root) {

            } else {
                if ($value != '.') {
                    if ($value == '..') {
                        $contents[$value] = "<button onclick=\"goFolder(this)\" class=\"btn back \" href=\"" . $path . "\"><i class=\"glyphicon glyphicon-chevron-left\"></i>  Back</button>";
                    } else {
                        $contents[$value] = "<button onclick=\"goFolder(this)\" class=\"btn dir\" href=\"" . $path . "\"><i class=\"glyphicon glyphicon-chevron-right\"></i>  " . $value . "</button>";
                    }
                }
            }
        }
    }

    foreach ($files as $key => $value) {
        $path = realpath($dir . DIRECTORY_SEPARATOR . $value);


        if(substr($dir, 0, strlen($root)) === $root){
             $str = substr($dir, strlen($root));
        }
        $str=str_replace("\\", "/", $str);
        
        if ($dir == $root) {
            $url = $base . $value;
        } else {
            $url = $base . $str . '/' . $value;
        }

        if (!is_dir($path)) {
            $contents[$value] = "<a class=\"btn btn-link file\" onclick=\"addVariable(this,event)\" target=\"iframe1\" href=\"" . $url . "\" name=\"" . $url . "\"><i class=\"glyphicon glyphicon-file\"></i> " . $value . "</a>";
        }
    }
    foreach ($contents as $key => $value) {
        echo $value;
        echo "<br>";
    }
}
