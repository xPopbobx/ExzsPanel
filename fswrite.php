<?php
$ad="Success";
if(isset($_GET["Auth"])==false){
    $ad="No Token provided";
}else{
    if(isset($_GET["file"])==false){
        $ad="No file provided";
    }else{
        if(isset($_GET["data"])==false){
            $ad="No data provided";
        }else{
            if($_GET["Auth"]==json_decode(file_get_contents(".config.json"),TRUE)["Server"]["My SMP"]["Auth"]){
            if(json_decode(file_get_contents(".config.json"),TRUE)["Server"]["My SMP"]["Path"].$_GET['file']==json_decode(file_get_contents(".config.json"),TRUE)["Server"]["My SMP"]["Path"]."/".json_decode(file_get_contents(".config.json"),TRUE)["Server"]["My SMP"]["Startfile"]){
                $ad="You should not edit Important files";
            }else{  
                if(file_exists(json_decode(file_get_contents(".config.json"),TRUE)["Server"]["My SMP"]["Path"].$_GET['file'])==false){$ad="File not found";}else{

    $path1=json_decode(file_get_contents(".config.json"),TRUE)["Server"]["My SMP"]["Path"];
    $path=json_decode(file_get_contents(".config.json"),TRUE)["Server"]["My SMP"]["Path"]."/".$_GET["file"];
    $path=str_replace("\\","/",realpath($path));
    if(substr($path,0,strlen($path1))==$path1){
    file_put_contents($path,$_GET["data"]);
    }else
    {$ad="Illegal path";}

}}
}else{
    $ad="Access denied";
}}}}
Print($ad)
?>