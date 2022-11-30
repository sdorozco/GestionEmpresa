<?php
//incluye la clase Libro y CrudLibro
session_start();
require_once('./model/Login.php');
require_once('./model/Crud_login.php');
//require_once('./model/Crud_Usuarios.php');
//require_once('./model/Usuarios.php');
//$user = new Usuario();
$login = new Login();
$crud = new CrudLogin();
//busca el libro utilizando el id, que es enviado por GET desde la vista mostrar.php
$login = $crud->obtenerUsuario($_SESSION['id']);
//valida si hay una sesion activa y id valido'
if ($_SESSION == null || $_SESSION['id'] == null) {
	header('Location: index.php');
}

//$crudUser = new CrudUsuarios();

?>
<!DOCTYPE html>
<html lang="es">

<head>
	<title>Inicio</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="./css/main.css">
</head>

<?php
require_once('./pages/plantilla/header.php');
?>

<!-- Content page-->
<section class="full-box dashboard-contentPage">
	<!-- NavBar -->
	<nav class="full-box dashboard-Navbar">
		<ul class="full-box list-unstyled text-right">
			<li class="pull-left">
				<a href="#!" class="btn-menu-dashboard"><i class="zmdi zmdi-menu"></i></a>
			</li>
		</ul>
	</nav>

	<!-- Content page -->
	<div class="container-fluid">
		<div class="page-header">
			<h1 class="text-titles text-uppercase" align="center">Sistema de Información para control de pedidos</h1>
		</div>
	</div>
	<div class="full-box text-center" style="padding: 30px 10px;">
		<article class="full-box tile" id="empresa">
			<div class="full-box tile-title text-center text-titles text-uppercase">
				Empresa
			</div>
			<div class="full-box tile-icon text-center" style="margin-top: 30px;">
				<i class="zmdi zmdi-balance"></i>
			</div>
			<div class="full-box tile-number text-titles" style="margin-right: 10px;">
				<br><br>
				<small>Gestiona el ingreso de nuevas empresas</small>
			</div>
		</article>
		<article class="full-box tile" id="productos">
			<div class="full-box tile-title text-center text-titles text-uppercase">
				PRODUCTOS
			</div>
			<div class="full-box tile-icon text-center" style="margin-top: 30px;">
				<i class="zmdi zmdi zmdi-case"></i>
			</div>
			<div class="full-box tile-number text-titles" style="margin-right: 10px;">
				<br><br>
				<small>Gestiona el ingreso de nuevos productos</small>
			</div>
		</article>
		</article>
		<article class="full-box tile" id="proveedores">
			<div class="full-box tile-title text-center text-titles text-uppercase">
				PROVEEDORES
			</div>
			<div class="full-box tile-icon text-center" style="margin-top: 30px;">
				<i class="zmdi zmdi-truck"></i>
			</div>
			<div class="full-box tile-number text-titles" style="margin-right: 10px;">
				<br><br>
				<small>Gestiona el ingreso de nuevos proveedores</small>
			</div>
		</article>

		<article class="full-box tile" id="usuario">
			<div class="full-box tile-title text-center text-titles text-uppercase">
				usuarios
			</div>
			<div class="full-box tile-icon text-center" style="margin-top: 30px;">
				<i class="zmdi zmdi-account"></i>
			</div>
			<div class="full-box tile-number text-titles" style="margin-right: 10px;">
				<br>
				<small>Gestiona el ingreso de nuevos usuarios administradores</small>
			</div>
		</article>
		<article class="full-box tile" id="facturacion">
			<div class="full-box tile-title text-center text-titles text-uppercase">
				facturación
			</div>
			<div class="full-box tile-icon text-center" style="margin-top: 30px;">
				<i class="zmdi zmdi-labels"></i>
			</div>
			<div class="full-box tile-number text-titles" style="margin-right: 10px;">
				<br>
				<small>Gestiona la creación de facturas y reportes de las compras a proveedores</small>
			</div>
		</article>
		<article class="full-box tile" id="pedidos">
			<div class="full-box tile-title text-center text-titles text-uppercase">
				pedidos
			</div>
			<div class="full-box tile-icon text-center" style="margin-top: 32px;">
				<i class="zmdi zmdi-calendar-note"></i>
			</div>
			<div class="full-box tile-number text-titles" style="margin-right: 10px;">
				<br>
				<small>Gestiona los pedidos relizadoa a los proveedores</small>
			</div>
		</article>
	</div>
	<!--<div class="container-fluid">
			<div class="page-header">
			  <h1 class="text-titles">INICIO</h1>
			</div>
			<section id="cd-timeline" class="cd-container">
                <div class="cd-timeline-block">
                    <div class="cd-timeline-img">
                        <img src="assets/avatars/StudetMaleAvatar.png" alt="user-picture">
                    </div>
                    <div class="cd-timeline-content">
                        <h4 class="text-center text-titles">1 - Name (Admin)</h4>
                        <p class="text-center">
                            <i class="zmdi zmdi-timer zmdi-hc-fw"></i> Start: <em>7:00 AM</em> &nbsp;&nbsp;&nbsp; 
                            <i class="zmdi zmdi-time zmdi-hc-fw"></i> End: <em>7:17 AM</em>
                        </p>
                        <span class="cd-date"><i class="zmdi zmdi-calendar-note zmdi-hc-fw"></i> 07/07/2016</span>
                    </div>
                </div>  
                <div class="cd-timeline-block">
                    <div class="cd-timeline-img">
                        <img src="assets/avatars/StudetMaleAvatar.png" alt="user-picture">
                    </div>
                    <div class="cd-timeline-content">
                        <h4 class="text-center text-titles">2 - Name (Teacher)</h4>
                        <p class="text-center">
                            <i class="zmdi zmdi-timer zmdi-hc-fw"></i> Start: <em>7:00 AM</em> &nbsp;&nbsp;&nbsp; 
                            <i class="zmdi zmdi-time zmdi-hc-fw"></i> End: <em>7:17 AM</em>
                        </p>
                        <span class="cd-date"><i class="zmdi zmdi-calendar-note zmdi-hc-fw"></i> 07/07/2016</span>
                    </div>
                </div>
                <div class="cd-timeline-block">
                    <div class="cd-timeline-img">
                        <img src="assets/avatars/StudetMaleAvatar.png" alt="user-picture">
                    </div>
                    <div class="cd-timeline-content">
                        <h4 class="text-center text-titles">3 - Name (Student)</h4>
                        <p class="text-center">
                            <i class="zmdi zmdi-timer zmdi-hc-fw"></i> Start: <em>7:00 AM</em> &nbsp;&nbsp;&nbsp; 
                            <i class="zmdi zmdi-time zmdi-hc-fw"></i> End: <em>7:17 AM</em>
                        </p>
                        <span class="cd-date"><i class="zmdi zmdi-calendar-note zmdi-hc-fw"></i> 07/07/2016</span>
                    </div>
                </div>
                <div class="cd-timeline-block">
                    <div class="cd-timeline-img">
                        <img src="assets/avatars/StudetMaleAvatar.png" alt="user-picture">
                    </div>
                    <div class="cd-timeline-content">
                        <h4 class="text-center text-titles">4 - Name (Personal Ad.)</h4>
                        <p class="text-center">
                            <i class="zmdi zmdi-timer zmdi-hc-fw"></i> Start: <em>7:00 AM</em> &nbsp;&nbsp;&nbsp; 
                            <i class="zmdi zmdi-time zmdi-hc-fw"></i> End: <em>7:17 AM</em>
                        </p>
                        <span class="cd-date"><i class="zmdi zmdi-calendar-note zmdi-hc-fw"></i> 07/07/2016</span>
                    </div>
                </div>   
            </section>


		</div>
	</section>-->
	<script language="JavaScript" type="text/javascript">
		var boton = document.getElementById("boton");
		// cuando se pulsa en el enlace
		boton.onclick = function(e) {
			e.preventDefault();
			swal({
				title: 'Estas seguro?',
				text: "Deseas cerrar sesion",
				type: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#03A9F4',
				cancelButtonColor: '#F44336',
				confirmButtonText: '<i class="zmdi zmdi-close-circle"></i> Si, Salir!',
				cancelButtonText: '<i class="zmdi zmdi-run"></i> No, Cancelar!'
			}).then(function() {
				window.location.href = "controller/adminLogin.php?id=salir";
			});
		}
	</script>
	<script language="JavaScript" type="text/javascript">
		var boton = document.getElementById("empresa");
		boton.onclick = function(e) {
			e.preventDefault();
			window.location.href = "pages/empresa.php";
		}
	</script>
	<script language="JavaScript" type="text/javascript">
		var boton = document.getElementById("productos");
		boton.onclick = function(e) {
			e.preventDefault();
			window.location.href = "pages/productos.php";
		}
	</script>
	<script language="JavaScript" type="text/javascript">
		var boton = document.getElementById("proveedores");
		boton.onclick = function(e) {
			e.preventDefault();
			window.location.href = "pages/proveedores.php";
		}
	</script>
	</script>
	<script language="JavaScript" type="text/javascript">
		var boton = document.getElementById("usuario");
		boton.onclick = function(e) {
			e.preventDefault();
			window.location.href = "pages/personal.php";
		}
	</script>
	</script>
	<script language="JavaScript" type="text/javascript">
		var boton = document.getElementById("facturacion");
		boton.onclick = function(e) {
			e.preventDefault();
			window.location.href = "pages/facturacion.php";
		}
	</script>
	</script>
	<script language="JavaScript" type="text/javascript">
		var boton = document.getElementById("pedidos");
		boton.onclick = function(e) {
			e.preventDefault();
			window.location.href = "pages/pedidos.php";
		}
	</script>

	<!--====== Scripts -->
	<script src="./js/jquery-3.1.1.min.js"></script>
	<script src="./js/sweetalert2.min.js"></script>
	<script src="./js/bootstrap.min.js"></script>
	<script src="./js/material.min.js"></script>
	<script src="./js/ripples.min.js"></script>
	<script src="./js/jquery.mCustomScrollbar.concat.min.js"></script>
	<script src="./js/main.js"></script>
	<script>
		$.material.init();
	</script>
	</body>

</html>