<?php
session_start();
	require_once('../model/Login.php');
    require_once('../model/Crud_login.php');
    require_once('../model/Producto.php');
	require_once('../model/crudProducto.php');
	require_once('../model/ProductoList.php');
	require_once('../model/crudProductoList.php');
	require_once('../model/crudTipoPago.php');
    require_once('../model/Tipo_pago.php');
    require_once('../model/Pedidos.php');
	require_once('../model/crudPedidos.php');
	require_once('../model/Proveedor.php');
	require_once('../model/crudProveedor.php');
	$login = new Login();
    $crud = new CrudLogin();
    $producto = new Producto();
	$crudproducto = new CrudProducto();
	$productolist = new ProductoList();
	$crudProductolist = new CrudProductoList();
	$crudPedidos = new CrudPedidos();
	$tipo_pago = new TIpoPago();
	$crudTipoPago = new Crudtipo_pago();
	$proveedor = new Proveedor();
    $crudProveedor = new CrudProveedor();
    $pedidos = new Pedidos();
	if($_SESSION == null){
		header('Location: ../index.php');
    }
    if($_GET != null){
        $pedidos = $crudPedidos->obtenerPedidos($_GET['id']);
        $total = $crudProductolist->totalPedido($_GET['id']);
	    $totalcantidad = $crudProductolist->totalcantidadPedido($_GET['id']);
    }
    $login = $crud->obtenerUsuario($_SESSION['id']);
	$productolist = $crudproducto->mostrar();
	$productolista = $crudProductolist->mostrar();
	$count = $crudPedidos->count();
	$count2 = $crudProductolist->count();
	$tipo_pagos = $crudTipoPago->mostrar();
	
	$proveedorlist = $crudProveedor->mostrar();
	
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Pedidos</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="../css/main.css">
</head>
<body>
	<!-- SideBar -->
	<section class="full-box cover dashboard-sideBar">
		<div class="full-box dashboard-sideBar-bg btn-menu-dashboard"></div>
		<div class="full-box dashboard-sideBar-ct">
			<!--SideBar Title -->
			<div class="full-box text-uppercase text-center text-titles dashboard-sideBar-title ">
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
						<a title="Salir del sistema"  id="boton">
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
						<i class="zmdi zmdi-case zmdi-hc-fw"></i> Administraci??n <i class="zmdi zmdi-caret-down pull-right"></i>
					</a>
					<ul class="list-unstyled full-box">
					    <li>
							<a href="empresa.php"><i class="zmdi zmdi-balance zmdi-hc-fw"></i> Empresa</a>
						</li>
						<li>
							<a href="categoria.php"><i class="zmdi zmdi-labels zmdi-hc-fw"></i> Categor??as</a>
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
						<i class="zmdi zmdi-balance zmdi-hc-fw"></i> Facturaci??n <i class="zmdi zmdi-caret-down pull-right"></i>
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
			  <h1 class="text-titles"><i class="zmdi zmdi-balance zmdi-hc-fw"></i> Pedidos</h1>
			</div>
			<p class="lead">Bienvenidos a la secci??n de Pedidos, podras crear tus pedidos desde aqui, consultar el listado de los pedidos generados y generar los reportes.</p>
		</div>

		<div class="container-fluid">
			<ul class="breadcrumb breadcrumb-tabs">
			  	<li>
			  		<a href="pedidos.php" class="btn btn-info">
			  			<i class="zmdi zmdi-plus"></i> &nbsp;NUEVO PEDIDO
			  		</a>
			  	</li>
			  	<li>
			  		<a href="pedidos-list.php" class="btn btn-success">
			  			<i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTADO DE PEDIDOS
			  		</a>
			  	</li>
			</ul>
		</div>

		<!-- panel datos de la empresa -->
		<div class="container-fluid">
			<div class="panel panel-info">
				<div class="panel-heading">
				<div  class="row">
					<div class="col-xs-12 col-sm-6">
						<h3 class="panel-title"><i class="zmdi zmdi-refresh"></i> &nbsp; DATOS DEL PEDIDO</h3>
					</div>
					<div class="col-xs-12 col-sm-6" align="right">
						<label class="panel-title">
						<i> C??digo Pedido  # </i><?php echo $pedidos->getCodigo_pedido() ?>
					</label>
                     </div>
					</div>
				</div>
				<div class="panel-body">
				<form action="../controller/adminProductList.php" method="post">
				    	<fieldset>
				    		<legend><i class="zmdi zmdi-assignment"></i> &nbsp; Datos de Pedido</legend>
				    		<div class="container-fluid">
				    			<div class="row">
									<input pattern="[0-9-]{1,30}" class="form-control" type="hidden" name="codigo_pedido" required="true" maxlength="30"
                                        value="<?php echo $pedidos->getCodigo_pedido() ?>" readonly="readonly">
									<div class="list-group-separator">
									<div class="container-fluid">
										<input type="hidden" name="estado" value="1"></input>
										<input type="hidden" name="producto_name" id="producto_name">
										<input type="hidden" name="insertarPedidos" value="insertarPedidos"></input>
										<ul class="breadcrumb breadcrumb-tabs">
			                        	 <li>
			  	                         	<button type="submit" class="btn btn-info">
												<i class="zmdi zmdi-plus"></i> &nbsp; AGREGAR PRODUCTO
										    </button>
			  	                          </li>
			                             </ul>
									   </div>
									   <div class="list-group-separator"></div>
									<div class="col-xs-12 col-sm-3">
                                    <div class="form-group label-floating">
										  	<label class="control-label" >Producto</label>
										  	<select class="form-control" name="nombre_producto" id="product" onClick="cargar(this);">
                                                <option value="0">Seleccione un Producto</option>
										  		<?php foreach ($productolist as $producto){?>
									          	<option value="<?php echo $producto->getPrecio() ?>"><?php echo $producto->getNombre() ?></option>
									          	<?php }?>
									        </select>
										</div>
									</div>    
									</div>		
									<div class="col-xs-12 col-sm-3">
										<div class="form-group label-floating">
										  	<label class="control-label">Cantidad *</label>
                                              <input pattern="[0-9+]{1,15}" class="form-control" onKeyUp="valores();" type="text" name="cantidad" maxlength="170" required="true" id="cantidad">
										</div>
				    				</div>
									<div class="col-xs-12 col-sm-3">
										<div class="form-group label-floating">
										  	<label class="control-label">Precio *</label>
										  	<input class="form-control" type="text" name="precio" maxlength="50" required="true" id="precio" value="$" readonly="readonly">
										</div>
				    				</div>
									<div class="col-xs-12 col-sm-3">
										<div class="form-group label-floating">
										  	<label class="control-label">Total *</label>
										  	<input class="form-control" type="text" name="total" maxlength="50" required="true" id="total" value="0" readonly="readonly">
										</div>
				    				</div>
									
					<div class="table-responsive" style="width: 100%">
						<table class="table table-striped table-hover" style="width: 100%">
							<thead>
								<tr>
									<th class="text-center">Nombre</th>
									<th class="text-center">Cantidad</th>
									<th class="text-center">Precio</th>
									<th class="text-center">Total</th>
									<th class="text-center">Eliminar</th>
								</tr>
							</thead>
							<tbody>
							<?php foreach($productolista as $productolist)
							{ if($productolist->getEstado() == "1" && $productolist->getCodigo_pedido() == $pedidos->getCodigo_pedido()){?>
								<tr>
									<td class="text-center"><?php echo $productolist->getNombre() ?></td>
									<td class="text-center"><?php echo $productolist->getCantidad() ?></td>
									<td class="text-center"><?php echo $productolist->getPrecio() ?></td>
									<td class="text-center"><?php echo $productolist->getTotal() ?></td>
									<td>
										<p class="text-center">
											<a href="../controller/adminProductList.php?id=<?php echo $productolist->getCodigo_productolist()?>&accion=epu&codigo=<?php echo $pedidos->getCodigo_pedido() ?>" class="btn btn-raised btn-danger btn-xs"><i class="zmdi zmdi-delete"></i></a>
										</p>
									</td>
								</tr>
							<?php }} ?>
							</tbody>
						</table>
					</div>
				    </form>
				</div>
			</div>
			</div>
			</div>
			<div class="container-fluid">
			<div class="panel panel-info">
				<div class="panel-heading">
				  <div  class="row">
					  <div class="col-xs-12 col-sm-6">
						<h3 class="panel-title"><i class="zmdi zmdi-refresh"></i> &nbsp; DATOS DEL PEDIDO</h3>
				      </div>
				   </div>
				</div>
				<div class="panel-body">
				<form action="../controller/adminPedidos.php" method="post">
				    	<fieldset>
				    		<legend><i class="zmdi zmdi-assignment"></i> &nbsp; Datos de Pedido</legend>
				    		<div class="container-fluid">
									<div class="container-fluid">	
									<div class="col-xs-12 col-sm-6">
									    <div class="form-group label-floating">
										  	<label class="control-label" >Proveedor</label>
										  	<input class="form-control" name="proveedor" value="<?php echo $pedidos->getProveedor() ?>" readonly="readonly">
										</div>
									</div>
									<div class="col-xs-12  col-sm-6">
										<div class="form-group label-floating">
										  	<label class="control-label">E-mail *</label>
										  	<input class="form-control" type="email" name="email" maxlength="50" required="true" value="<?php echo $pedidos->getEmail() ?>"
                                              readonly="readonly">
										</div>
				    				</div>
									<div class="col-xs-12 col-sm-3">
                                       <div class="form-group label-floating">
										  	<label class="control-label" >M??todo de Pago</label>
										  	<input class="form-control" name="modopago" value="<?php echo $pedidos->getModopago() ?>" readonly="readonly">
										</div>
									</div>    
									<div class="col-xs-12 col-sm-3">
										<div class="form-group label-floating">
										  	<label class="control-label">Cantidad Total *</label>
										  	<input class="form-control" type="text" name="total_cantidad" maxlength="50" required="true"
											  value="<?php echo $totalcantidad ?>" readonly="readonly">
										</div>
				    			</div>
									<div class="col-xs-12 col-sm-3">
										<div class="form-group label-floating">
										  	<label class="control-label">Total Pedido *</label>
										  	<input class="form-control" type="text" name="total_pedido" maxlength="50" required="true"
											  value="<?php echo $total?>" readonly="readonly">
										</div>
				    			</div>
								<div class="col-xs-12 col-sm-3">
										<div class="form-group label-floating">
										  	<label class="control-label">Fecha *</label>
										  	<input class="form-control" type="text" name="fecha" maxlength="50" value="2020-01-01" required="true" readonly="readonly"
                                              value="<?php echo $pedidos->getFecha() ?>">
										</div>
				    				</div>
							</div>	
							<p class="text-center" style="margin-top: 20px;">
							    <input type="hidden" name="codigo_pedido" value="<?php echo $pedidos->getCodigo_pedido() ?>"></input>
								<input type="hidden" name="name_proveedor" id="proveedor_name"></input>
						        <input type="hidden" name="actualizar" value="actualizar"></input>
					    	<button type="submit" class="btn btn-info btn-raised btn-sm"><i class="zmdi zmdi-floppy"></i> Guardar</button>
					    </p>
				    </form>
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
		swal({
		  	title: 'Estas seguro?',
		  	text: 'Deseas cerrar sesion',
		  	type: 'warning',
		  	showCancelButton: true,
		  	confirmButtonColor: '#03A9F4',
		  	cancelButtonColor: '#F44336',
		  	confirmButtonText: '<i class="zmdi zmdi-close-circle"></i> Si, Salir!',
		  	cancelButtonText: '<i class="zmdi zmdi-run"></i> No, Cancelar!'
		}).then(function () {
			window.location.href="../controller/adminLogin.php?id=salir";
		});
	}
	</script>
    <script language="JavaScript" type="text/javascript">
    function cargar(objeto){
	var nameproducto = document.getElementById("producto_name");
	var precio = document.getElementById("precio");

	var indice = objeto.selectedIndex;
	nameproducto.value = objeto.options[indice].text;
	precio.value = objeto.value;

	}
    windows.onload = cargar;
	</script>
	<script language="JavaScript" type="text/javascript">
	function valores(){
	var producto = document.getElementById("product").value;
	var cantidad = document.getElementById("cantidad").value;
	var total = document.getElementById("total");
	total.value = producto * cantidad;
	}
	windows.onload = valores;
   </script>

   <script language="JavaScript" type="text/javascript">
    function cargarProveedor(objeto){
	var nameproveedor = document.getElementById("nameproveedor").value;
	var email = document.getElementById("idemail");
	var proveedor_name = document.getElementById("proveedor_name");
	
	var indice = objeto.selectedIndex;
	proveedor_name.value = objeto.options[indice].text;
	email.value = nameproveedor;
	
	}
    windows.onload = cargarProveedor;
	</script>
	<script language="JavaScript" type="text/javascript">
     <?php if($_GET != null){ 
		 if($_GET['error'] == "error1") {?>
		function load(){
		swal({ 
			title:"Advertencia", 
			text:"Verifique sus datos e intente nuevamente. Los campos de cantidad o Total no pueden estar vacios", 
			type: "warning", 
			confirmButtonText: "Aceptar" 
		});
		}
		window.onload = load;
	<?php }elseif($_GET['error'] == "error2") {?>
		function load(){
		swal({ 
			title:"Advertencia", 
			text:"Verifique sus datos e intente nuevamente. Debes elegir un metodo de pago", 
			type: "warning", 
			confirmButtonText: "Aceptar" 
		});
		}
		window.onload = load;
	<?php }elseif($_GET['error'] == "error3") {?>
		function load(){
		swal({ 
			title:"Advertencia", 
			text:"Verifique sus datos e intente nuevamente. Debes Agregar Minimo Un producto", 
			type: "warning", 
			confirmButtonText: "Aceptar" 
		});
		}
		window.onload = load;
	<?php }elseif($_GET['error'] == "error4"){ ?>
		function load(){
		swal({ 
			title:"Advertencia", 
			text:"Verifique sus datos e intente nuevamente. Debes Elegir un proveedor para hacer el pedido", 
			type: "warning", 
			confirmButtonText: "Aceptar" 
		});
		}
		window.onload = load;
	<?php }} ?>
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