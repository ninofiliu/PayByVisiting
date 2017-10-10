<?php

if ($_POST["cracked"]=="true"){
    
    // delete from queue
    $ll=file("tocrack.txt");
    $f=fopen("tocrack.txt","w");
    for ($i=0; $i<count($ll); $i++){
        if (substr($ll[$i],0,strpos($ll[$i],","))!=$_POST["hash"]){
            fwrite($f,$ll[$i]);
        }
    }
    fclose($f);
    
    // add to cracked
    $f=fopen("cracked.txt","a+");
    fwrite($f,$_POST["hash"].",".$_POST["latest"]."\n");
    fclose($f);
    
}
else {
    
    // update queue
    $ll=file("tocrack.txt");
    $f=fopen("tocrack.txt","w");
    for ($i=0; $i<count($ll); $i++){
        if (substr($ll[$i],0,strpos($ll[$i],","))==$_POST["hash"]){
            $ll[$i]=$_POST["hash"].",".$_POST["latest"]."\n";
        }
        fwrite($f,$ll[$i]);
    }
    fclose($f);
    
}

?>
