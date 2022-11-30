<?php
    require_once('../model/crudFacturacion.php');
	require_once('../model/Facturacion.php');
	require_once('../model/crudProductoList.php');
    require_once('../model/ProductoList.php');
    require_once('../dompdf/autoload.inc.php');
	$crudProductlist= new CrudProductoList();
	$producto_list=new ProductoList();
  $crud= new CrudFacturacion();
  $date = new DateTime();
    $facturacion=new Facturacion();
if($_GET != null){
    $facturacion = $crud->obtenerfacturacion($_GET['id']);
    $listaProductos = $crudProductlist->mostrarFactura($_GET['id']);
    $totalcant = $crudProductlist->totalcantidadReporte($_GET['id']);
    $totalFactura = $crudProductlist->totalReporte($_GET['id']);
}
    ?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link rel="stylesheet" href="../css/main.css">
<title>Reporte</title>
</head>
<body style="margin:30px;" >
<br>
<div style="margin:30px;" class="container-fluid" style="width: 90%">
			<div class="panel panel-info">
				<div class="panel-heading">
<font color="white">
<h2 align="center" >REPORTE</h2>
</font>
</div>
<div class="panel-body">
<p>El siguiente reporte es sobre la factura Numero: <?php echo $facturacion->getCodigo_factura() ?> generada el <?php echo $facturacion->getFecha() ?> donde se realizo la venta de 
<?php echo $totalcant ?> productos por un valor de $<?php echo number_format($totalFactura,"0",",","."); ?>.</p>
   <table  style="width: 100%">
   <tr align="center">
  <td></td>
  <td align="left"><b>Codigo Factura: <?php echo $facturacion->getCodigo_factura() ?></b></td>
  <td align="right"><b>Fecha:</b> <?php echo $date->format('d-m-Y'); ?></td>
  </tr>
   </table>
  <table border="1" style="width: 100%">
  <tr>
    <td style="width: 50%;"><b>Cliente:</b>  <?php echo $facturacion->getCliente() ?></td>
    <td><b>Email:</b>  <?php echo $facturacion->getEmail() ?></td>
  </tr>
  </table>
  <br>
  <table border="1" style="width: 100%">
  <tr align="center">
     <td>Nombre Producto</td>
     <td>Cantidad</td>
     <td>Precio Unitario</td>
     <td>Total</td>
  </tr>
  <?php foreach($listaProductos as $producto_list){ ?>
  <tr align="center">
     <td><?php echo $producto_list->getNombre() ?></td>
     <td><?php echo $producto_list->getCantidad() ?></td>
     <td><?php echo $producto_list->getPrecio() ?></td>
     <td><?php echo $producto_list->getTotal() ?></td>
  </tr>
  <?php } ?>
  <tr>
    <td align="center"><b>Cantidad Total</b></td>
    <td align="center"><?php echo $totalcant ?></td>
    <td align="center"><b>Total</b></td>
    <td align="center"><?php echo $totalFactura ?></td>
  </tr>
  </table>
  </div>
  </div>
  </div>
</body>
</html>