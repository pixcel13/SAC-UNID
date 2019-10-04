<?php
    require_once $_SERVER["DOCUMENT_ROOT"].'includes/database.php';
    session_start();
	error_reporting(0);
	$varsesion = $_SESSION['email'];
	if (isset($varsesion)){
?>
<!DOCTYPE html>
<html lang="mx">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="/css/estilo.css" />
    <link rel="stylesheet" href="/vendor/components/bootstrap/css/bootstrap.min.css" />
    <script src="/vendor/components/jquery/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="/js/alert.js"></script>
    <title>Niveles</title>
</head>

<body>
    <?php
        Include_once $_SERVER["DOCUMENT_ROOT"].'modulos/shared/navbar.php';
    ?>
    <section class="wrapper">
        <?php
            Include_once $_SERVER["DOCUMENT_ROOT"].'modulos/shared/sidebar.php';
        ?>
        <div class="contenedor-principal">
            <div class="header">
                <h3>Niveles</h3>
                <div class="boton-nuevo" id="btn-new" onClick="newAlert()">
                    <a href="#"><i class="fas fa-level-up-alt fa-lg" title="Añadir nuevo nivel"></i></a>
                </div>
                <div class="boton-cancelar" onClick="cancelAlert()">
                    <a href="#"><i class="fas fa-times fa-lg" title="Cancelar"></i></a>
                </div>
            </div>
            <div class="info">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Status</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $niveles = $db->select("niveles","*"); 
                        if($niveles)
                        { 
                            foreach ($niveles as $nivel) 
                            { 
                        ?>
                        <tr>
                            <th scope="row"><?php echo $nivel['id']; ?></th>
                            <td><?php echo utf8_encode($nivel['nombre']); ?></td>
                            <td><?php echo $nivel['status']; ?></td>
                            <td>
                                <a href="#" data="<?php echo $nivel['id']?>" class="btn-edit"><i class="fas fa-edit" title="Editar" onClick="newAlert()"></i></a>
                                <a href="#" data="<?php echo $nivel['id']?>" class="btn-delete"><i class="fas fa-trash-alt" title="Eliminar"></i></a>
                            </td>
                        <?php
                            }
                        }else{
                            echo "<script>errorAlert()</script>";
                        }
                        ?>
                        </tr>
                    </tbody>
                </table>
                <!-- FORMULARIO -->
                <div class="form">
                    <form class="form-register" id="nivel-form">
                        <input type="text" id="nombre" name="nombre" placeholder="Nombre" />
                        <select id="status" name="status" class="select_opt">
                            <option value="">Seleccione una opción: </option>
                            <option value="1">Activo</option>
                            <option value="0">Inactivo</option>
                        </select>
                        <button type="button" id="btn-form">Registrar nivel <i class="fas fa-level-up-alt fa-sm"></i></button>
                    </form>
                </div>
                <!-- FIN FORMULARIO -->
            </div>
        </div>
    </section>
    <footer>
        <p><i class="fas fa-user-lock"></i> Sistema desarrollado por La Logia Corp.</p>
    </footer>
    <script src="/vendor/fortawesome/font-awesome/js/all.js" data-auto-replace-svg="nest"></script>
    <script src="/vendor/components/bootstrap/js/bootstrap.min.js"></script>
    <script src="/modulos/niveles/main.js"></script>
</body>

</html>
<?php
	}else{
        header('Location: /modulos/login/index.php/');
    }
?>
