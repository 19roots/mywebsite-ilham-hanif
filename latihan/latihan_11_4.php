<?php
$hasil1 = true and false;
echo '$hasil1 = ';
echo
var_dump($hasil1)."<br/>";
$hasil2 = (true and false);
echo '$hasil2 = ';
echo
var_dump($hasil2)."<br/>";
$hasil3 = (true xor false);
echo '$hasil3 = ';
echo
var_dump($hasil3)."<br/>";
$hasil4 = (false != true);
echo '$hasil4 = ';
echo var_dump($hasil4)."<br/>";
$a=true;
$b=false;
$hasil5 = ($a and $b || $a or b);
echo '$hasil5 = ';
echo var_dump($hasil5);
?>