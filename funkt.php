<?php
require_once("konf.php");
global $yhendus;

function kustuta($id)
{
    global $yhendus;
    $paring = $yhendus->prepare("DELETE FROM jalgrattaeksam WHERE id=?");
    $paring->bind_param("i", $id);
    if($paring->execute()){
        echo "Kirje kustutatud!";
    }
    $paring->close();
}

