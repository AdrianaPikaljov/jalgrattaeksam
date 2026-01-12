<?php
require_once("konf.php");
include("header.php");
global $yhendus;

if (isset($_REQUEST["teooriatulemus"], $_REQUEST["id"])) {

    $tulemus = intval($_REQUEST["teooriatulemus"]);
    $id = intval($_REQUEST["id"]);

    if ($tulemus < 10) {
        $kask = $yhendus->prepare("UPDATE jalgrattaeksam SET teooriatulemus=?,slaalom=2,ringtee=2,t2nav=2 WHERE id=?"
        );
        $kask->bind_param("ii", $tulemus, $id);
    } else {
        $kask = $yhendus->prepare("UPDATE jalgrattaeksam SET teooriatulemus=? WHERE id=?");
        $kask->bind_param("ii", $tulemus, $id);
    }
    $kask->execute();
}

$kask = $yhendus->prepare("SELECT id, eesnimi, perekonnanimi FROM jalgrattaeksam WHERE teooriatulemus = -1");
$kask->bind_result($id, $eesnimi, $perekonnanimi);
$kask->execute();
?>
<!doctype html>
<html>
<head>
    <title>Teooriaeksam</title>
</head>
<body>
<table>
    <?php
    while($kask->fetch()){
        echo " 
 <tr> 
 <td>$eesnimi</td> 
 <td>$perekonnanimi</td> 
 <td><form action=''> 
 <input type='hidden' name='id' value='$id' /> 
 <input type='text' name='teooriatulemus' />
 <input type='submit' value='Sisesta tulemus' /> 
 </form> 
 </td> 
</tr> 
 ";
    }
    ?>
</table>
</body>
</html>