<?php
//incluye la clase facturacion y Crudfacturacion
	require_once('../model/crudFacturacion.php');
	require_once('../model/Facturacion.php');
	require_once('../model/crudProductoList.php');
    require_once('../model/ProductoList.php');
    require_once('../dompdf/autoload.inc.php');

	$crudProductlist= new CrudProductoList();
	$producto_list=new ProductoList();
	$crud= new CrudFacturacion();
    $facturacion=new Facturacion();
    if($_GET != null){
        $id = $_GET['id'];
    }
    use Dompdf\Dompdf;

    // Introducimos HTML de prueba
    $html=file_get_contents_curl("http://localhost/GestionEmpresa/dompdf/reporte.php?id=$id");
    // Instanciamos un objeto de la clase DOMPDF.
    $pdf = new DOMPDF();
     
    // Definimos el tamaño y orientación del papel que queremos.
    $pdf->set_paper("letter", "portrait");
    //$pdf->set_paper(array(0,0,104,250));
     
    // Cargamos el contenido HTML.
    $pdf->load_html(utf8_decode($html));
     
    // Renderizamos el documento PDF.
    $pdf->render();
    $pdf->set_option('enable_html5_parser', TRUE);
    // Enviamos el fichero PDF al navegador.
    $pdf->stream('reporte.pdf');

    function file_get_contents_curl($url) {
        $crl = curl_init();
        $timeout = 5;
        curl_setopt($crl, CURLOPT_URL, $url);
        curl_setopt($crl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($crl, CURLOPT_CONNECTTIMEOUT, $timeout);
        $ret = curl_exec($crl);
        curl_close($crl);
        return $ret;
    }
    ?>
