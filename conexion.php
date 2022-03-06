<?php
unset($CFG);
global $CFG;
$CFG = new stdClass();
/* $CFG->dbtype    = 'mysqli';
$CFG->dblibrary = 'native';
$CFG->dbhost    = 'db5006770211.hosting-data.io';
$CFG->dbname    = 'dbs5600901';
$CFG->dbuser    = 'dbu2149735';
$CFG->dbpass    = 'B4RC0P4SSgrc.1.1';
$CFG->wwwroot    = 'http://s903179020.onlinehome.mx';
 */

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
}else{
	//echo "Si se conectó";
}
$mysqli->set_charset("utf8");
?>
