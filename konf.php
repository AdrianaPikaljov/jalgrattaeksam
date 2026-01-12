<?php
//kasutame kohalik arvuti
$serverinimi='localhost';
$kasutajanimi="adripikaljov";
$parool='12345';
$andmebaasinimi='adripikaljov';
$yhendus=new mysqli($serverinimi,$kasutajanimi,$parool,$andmebaasinimi);
$yhendus->set_charset("utf8");