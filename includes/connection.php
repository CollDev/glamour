<?php
require_once 'connect.cn';
$link_identifier = mysql_connect($server, $username, $password);
if (!$link_identifier) exit('No se puede conectar a la base de datos.');
$selection = mysql_selectdb($database_name, $link_identifier);
if (!$selection) exit('No se puede seleccionar la base de datos.');