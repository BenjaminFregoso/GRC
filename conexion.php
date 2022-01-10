<?php
unset($CFG);
global $CFG;
$CFG = new stdClass();
$CFG->dbtype    = 'mysqli';
$CFG->dblibrary = 'native';
$CFG->dbhost    = 'localhost';
$CFG->dbname    = 'grc';
$CFG->dbuser    = 'root';
$CFG->dbpass    = '';
$CFG->wwwroot    = 'https://localhost';

$mysqli= new mysqli($CFG->dbhost,$CFG->dbuser,$CFG->dbpass,$CFG->dbname);
if(mysqli_connect_errno()){
	echo "Problemas al conectarse con la BDD";
}
$mysqli->set_charset("utf8");
?>
