<?php
 require_once $_SERVER["DOCUMENT_ROOT"].'includes/database.php';
 if ($_POST) {
     switch ($_POST["accion"]) {
         case 'getNivel':
             getNivel($_POST['nivel']);
             break;

         default:
             # code...
             break;
     }
 }

 function getNivel($id){
    global $db;
    $nivel = $db->get("niveles", "*", ["id" => $id]);
    $respuesta["nombre"] = $Nivel["nombre"];
    $respuesta["status"] = $Nivel["status"];
    echo json_encode($respuesta);
}
?>