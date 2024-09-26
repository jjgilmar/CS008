<!--connecting-->
<?php
$databaseName = 'JJGILMAR_labs';
$dsn = 'mysql:host=webdb.uvm.edu;dbname=' . $databaseName;
$username = 'jjgilmar_writer';
$password = 'hQ55F7S6Ceee';

$pdo = new PDO($dsn, $username, $password);
?>
<!--connection complete-->