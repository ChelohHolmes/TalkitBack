<?php
include 'Header.php';
include_once 'Database.php';

$db = new Database();
$dataB = $db -> connect();
$data = json_decode(file_get_contents('php://input'), true);
$query = "SELECT id_usuario FROM public.usuario where username = '". $data['user'] ."'";
$res = pg_query($dataB, $query);
$id = pg_fetch_result($res, 0, 0);
$query = "DELETE FROM public.amigos WHERE id_usuario_recibe = '". $data['id'] ."' AND id_usuario_envia = '". $id ."'";
try {
    $res = pg_query($dataB, $query);
    echo 1;
}
catch (Exception $e) {
    echo 0;
}