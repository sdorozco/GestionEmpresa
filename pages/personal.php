<?php
session_start();
	require_once('../model/Login.php');
    require_once('../model/Crud_login.php');
    require_once('../model/crudTipoRol.php');
    require_once('../model/Tipo_rol.php');
	//require_once('../model/Usuarios.php');
	//require_once('../model/Crud_Usuarios.php');
	if($_SESSION == null){
		header('Location: ../index.php');
	}
	$login = new Login();
    $crud = new CrudLogin();
    $tipo_rol = new TipoRol();
    $crudTipo_rol = new CrudTipo_rol();
	//$usuario = new Usuario();
	//$user = new CrudUsuarios();
    $login = $crud->obtenerUsuario($_SESSION['id']);
	$tipo_rolList = $crudTipo_rol->mostrar();
	//$usuario = $user->obtenerUsuario($_SESSION['id']);
	//$rol = $usuario->getRol();
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Personal</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="../css/main.css">
</head>
<body id="inicio">

	<!-- SideBar -->
	<section class="full-box cover dashboard-sideBar">
		<div class="full-box dashboard-sideBar-bg btn-menu-dashboard"></div>
		<div class="full-box dashboard-sideBar-ct">
			<!--SideBar Title -->
			<div class="full-box text-uppercase text-center text-titles dashboard-sideBar-title">
				Empresa <i class="zmdi zmdi-close btn-menu-dashboard visible-xs"></i>
			</div>
			<!-- SideBar User info -->
			<div class="full-box dashboard-sideBar-UserInfo">
				<figure class="full-box">
					<img src="../assets/avatars/maleavatar.png" alt="UserIcon">
					<figcaption class="text-center text-titles"><?php echo $login->getUserName() ?></figcaption>
				</figure>
				<ul class="full-box list-unstyled text-center">
					<li>
						<a href="my-data.php" title="Mis datos">
							<i class="zmdi zmdi-account-circle"></i>
						</a>
					</li>
					<li>
						<a title="Salir del sistema" id="boton">
							<i class="zmdi zmdi-power"></i>
						</a>
					</li>
				</ul>
			</div>
			<!-- SideBar Menu -->
			<ul class="list-unstyled full-box dashboard-sideBar-Menu" >
				<li>
					<a href="../home.php">
						<i class="zmdi zmdi-view-dashboard zmdi-hc-fw"></i> Dashboard
					</a>
				</li>
				<li id="administrar" style="display: block">
					<a href="#!" class="btn-sideBar-SubMenu">
						<i class="zmdi zmdi-case zmdi-hc-fw"></i> Administración <i class="zmdi zmdi-caret-down pull-right"></i>
					</a>
					<ul class="list-unstyled full-box">
					    <li>
							<a href="empresa.php"><i class="zmdi zmdi-balance zmdi-hc-fw"></i> Empresa</a>
						</li>
						<li>
							<a href="categoria.php"><i class="zmdi zmdi-labels zmdi-hc-fw"></i> Categorías</a>
						</li>
						<li>
							<a href="proveedores.php"><i class="zmdi zmdi-truck zmdi-hc-fw"></i> Proveedores</a>
						</li>
						<li>
							<a href="productos.php"><i class="zmdi zmdi-case zmdi-hc-fw"></i> Productos</a>
						</li>
					</ul>
				</li>
				<li id="usuarios" style="display: block">
					<a href="#!" class="btn-sideBar-SubMenu" >
						<i class="zmdi zmdi-account-add zmdi-hc-fw"></i> Registro de Usuarios <i class="zmdi zmdi-caret-down pull-right"></i>
					</a>
					<ul class="list-unstyled full-box">
						<li>
							<a href="personal.php"><i class="zmdi zmdi-account zmdi-hc-fw"></i> Nuevo Administrador</a>
						</li>
					</ul>
				</li>
				<li >
				<li id="faacturacion" style="display: block">
					<a href="#!" class="btn-sideBar-SubMenu" >
						<i class="zmdi zmdi-balance zmdi-hc-fw"></i> Facturación <i class="zmdi zmdi-caret-down pull-right"></i>
					</a>
					<ul class="list-unstyled full-box">
						<li>
							<a href="facturacion.php"><i class="zmdi zmdi-labels zmdi-hc-fw"></i> Crear Factura</a>
						</li>
						<li>
							<a href="reporte.php"><i class="zmdi zmdi-calendar-note zmdi-hc-fw"></i> Reportes</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="pedidos.php">
						<i class="zmdi zmdi-timer zmdi-hc-fw"></i> Pedidos
					</a>
				</li>
			</ul>
		</div>
	</section>
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
			  <h1 class="text-titles"><i class="zmdi zmdi-male-alt zmdi-hc-fw"></i> Usuarios </small></h1>
			</div>
			<p class="lead">Bienvenidos esta sección es para agregar nuevos Usuarios en la aplicación</p>
		</div>

		<div class="container-fluid">
			<ul class="breadcrumb breadcrumb-tabs">
			  	<li>
			  		<a href="personal.php" class="btn btn-info">
			  			<i class="zmdi zmdi-plus"></i> &nbsp; NUEVO USUARIO
			  		</a>
			  	</li>
			  	<li>
			  		<a href="personal-list.php" class="btn btn-success">
			  			<i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE USUARIOS
			  		</a>
			  	</li>
			  	<li>
			  		<a href="personal-search.php" class="btn btn-primary">
			  			<i class="zmdi zmdi-search"></i> &nbsp; BUSCAR USUARIOS
			  		</a>
			  	</li>
			</ul>
		</div>

		<!-- Panel nuevo cliente -->
		<div class="container-fluid">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h3 class="panel-title"><i class="zmdi zmdi-plus"></i> &nbsp; NUEVO USUARIO</h3>
				</div>
				<div class="panel-body">
					<form action="../controller/adminPersonal.php" method="post">
				    	<fieldset>
				    		<legend><i class="zmdi zmdi-account-box"></i> &nbsp; Información personal</legend>
				    		<div class="container-fluid">
				    			<div class="row">
				    				<div class="col-xs-12">
								    	<div class="form-group label-floating">
										  	<label class="control-label">Tarjeta de Identidad/Cedula *</label>
										  	<input pattern="[0-9-]{1,30}" class="form-control" type="text" name="codigo_personal" required="true" maxlength="30">
										</div>
				    				</div>
				    				<div class="col-xs-12 col-sm-6">
								    	<div class="form-group label-floating">
										  	<label class="control-label">Nombres *</label>
										  	<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="nombre" required="true" maxlength="30" onkeyup="javascript:this.value=this.value.toUpperCase();">
										</div>
				    				</div>
				    				<div class="col-xs-12 col-sm-6">
										<div class="form-group label-floating">
										  	<label class="control-label">Apellidos *</label>
										  	<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="apellido" required="true" maxlength="30" onkeyup="javascript:this.value=this.value.toUpperCase();">
										</div>
									</div>
									<div class="col-xs-12 col-sm-6">
										<div class="form-group label-floating">
										  	<label class="control-label">E-mail *</label>
										  	<input class="form-control" type="email" name="email" maxlength="50" required="true">
										</div>
				    				</div>
				    				<div class="col-xs-12 col-sm-6">
										<div class="form-group label-floating">
										  	<label class="control-label">Teléfono</label>
										  	<input pattern="[0-9+]{1,15}" class="form-control" type="text" name="telefono" maxlength="15">
										</div>
				    				</div>
				    				
				    				<div class="col-xs-12">
										<div class="form-group label-floating">
										  	<label class="control-label">Dirección</label>
										  	<input name="direccion" class="form-control" rows="2" maxlength="100" style="text-transform:uppercase;" value=""  onkeyup="javascript:this.value=this.value.toUpperCase();"></input>
										</div>
									</div>
								</div>
							</div>
				    	</fieldset>
				    	<br>
				    	<fieldset>
				    		<legend><i class="zmdi zmdi-key"></i> &nbsp; Datos de la cuenta</legend>
				    		<div class="container-fluid">
				    			
				    				<div class="col-xs-12">
							    		<div class="form-group label-floating">
										  	<label class="control-label">Nombre de usuario *</label>
										  	<input pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ]{1,15}" class="form-control" type="text" name="username" required="true" maxlength="15"
											  onkeyup="javascript:this.value=this.value.toUpperCase();">
										</div>
				    				</div>
				    				<div class="col-xs-12 col-sm-6">
										<div class="form-group label-floating" >
										  	<label class="control-label">Contraseña *</label>
										  	<input class="form-control" type="password" name="userpass" required="true" maxlength="70" >
										</div>
				    				</div>
				    				<div class="col-xs-12 col-sm-6">
										<div class="form-group label-floating">
										  	<label class="control-label">Repita la contraseña *</label>
										  	<input class="form-control" type="password" name="pass_rep" required="true" maxlength="70">
										</div>
                        
				    			</div>
				    		</div>
                            <fieldset>
				    		<legend><i class="zmdi zmdi-star"></i> &nbsp; Nivel de privilegios</legend>
				    		<div class="container-fluid">
				    			<div class="row">
				    				<div class="col-xs-12 col-sm-6">
                                    <?php foreach($tipo_rolList as $tipo_rol){ 
                                        if($tipo_rol->getNombre() == 'ADMINISTRADOR'){?>
							    		<p class="text-left">
					                        <div class="label label-danger">Nivel <?php echo $tipo_rol->getCodigo_rol() ?></div> <?php echo $tipo_rol->getDescripcion() ?>
					                    </p>
                                        <?php }elseif($tipo_rol->getNombre() == 'ADMINISTRATIVO'){ ?>
                                            <p class="text-left">
					                        <div class="label label-warning">Nivel <?php echo $tipo_rol->getCodigo_rol() ?></div> <?php echo $tipo_rol->getDescripcion() ?>
					                        </p>
                                        <?php }else{ ?>
                                            <p class="text-left">
					                        <div class="label label-success">Nivel <?php echo $tipo_rol->getCodigo_rol() ?></div> <?php echo $tipo_rol->getDescripcion() ?>
                                            </p>
                                        <?php }} ?>
				    				</div>
				    				<div class="col-xs-12 col-sm-6">
                                    <?php foreach($tipo_rolList as $tipo_rol){ ?>
										<div class="radio radio-primary">
										<label>Nivel <?php echo $tipo_rol->getCodigo_rol() ?></label>
											<label>
												<input type="radio" name="rol" value="<?php echo $tipo_rol->getNombre() ?>">
												<i class="zmdi zmdi-star"></i> &nbsp; <?php echo $tipo_rol->getNombre() ?>
											</label>
										</div>
                                    <?php } ?>
				    				</div>
				    			</div>
				    		</div>
				    	</fieldset>
				    	</fieldset>
						<p class="text-center" style="margin-top: 20px;">
						<input type="hidden" name="insertar" value="insertar"></input>
					    	<button type="submit" class="btn btn-info btn-raised btn-sm"><i class="zmdi zmdi-floppy"></i> Guardar</button>
					    </p>
				    </form>
				</div>
			</div>
		</div>

	</section>
	
	<script language="JavaScript" type="text/javascript">
	var lista1 = document.getElementById("usuarios");
	var lista2 = document.getElementById("administrar");
	<?php if($rol == 'estudiante'){ ?>
	lista1.style.display = 'none';
	lista2.style.display = 'none';
	<?php }?>
	</script>
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
		}).then(function () {
			window.location.href="administrar_login.php?id=salir";
		});
	}
</script>
<script language="JavaScript" type="text/javascript">
<?php if($_GET != null){ ?>
		function load(){
		swal({ 
			title:"¡Las contraseñas no coinciden!", 
			text:"Verifique sus datos e intente nuevamente", 
			type: "error", 
			confirmButtonText: "Aceptar" 
		});
		}
		window.onload = load;
	<?php } ?>
	</script>
	<!--====== Scripts -->
	<script src="../js/jquery-3.1.1.min.js"></script>
	<script src="../js/sweetalert2.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/material.min.js"></script>
	<script src="../js/ripples.min.js"></script>
	<script src="../js/jquery.mCustomScrollbar.concat.min.js"></script>
	<script src="../js/main.js"></script>
	<script>
		$.material.init();
	</script>
</body>
</html>