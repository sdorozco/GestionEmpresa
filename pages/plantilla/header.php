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
                    <img src="./assets/avatars/maleavatar.png" alt="UserIcon">
                    <figcaption class="text-center text-titles"><?php echo $login->getUserName() ?></figcaption>
                </figure>
                <ul class="full-box list-unstyled text-center">
                    <li>
                        <a href="pages/my-data.php" title="Mis datos">
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
            <ul class="list-unstyled full-box dashboard-sideBar-Menu">
                <li>
                    <a href="home.php">
                        <i class="zmdi zmdi-view-dashboard zmdi-hc-fw"></i> Dashboard
                    </a>
                </li>
                <li id="administrar" style="display: block">
                    <a href="#!" class="btn-sideBar-SubMenu">
                        <i class="zmdi zmdi-case zmdi-hc-fw"></i> Administración <i class="zmdi zmdi-caret-down pull-right"></i>
                    </a>
                    <ul class="list-unstyled full-box">
                        <li>
                            <a href="pages/empresa.php"><i class="zmdi zmdi-balance zmdi-hc-fw"></i> Empresa</a>
                        </li>
                        <li>
                            <a href="pages/categoria.php"><i class="zmdi zmdi-labels zmdi-hc-fw"></i> Categorías</a>
                        </li>
                        <li>
                            <a href="pages/proveedores.php"><i class="zmdi zmdi-truck zmdi-hc-fw"></i> Proveedores</a>
                        </li>
                        <li>
                            <a href="pages/productos.php"><i class="zmdi zmdi-case zmdi-hc-fw"></i> Productos</a>
                        </li>
                    </ul>
                </li>
                <li id="usuarios" style="display: block">
                    <a href="#!" class="btn-sideBar-SubMenu">
                        <i class="zmdi zmdi-account-add zmdi-hc-fw"></i> Registro de Usuarios <i class="zmdi zmdi-caret-down pull-right"></i>
                    </a>
                    <ul class="list-unstyled full-box">
                        <li>
                            <a href="pages/personal.php"><i class="zmdi zmdi-account zmdi-hc-fw"></i> Nuevo Administrador</a>
                        </li>
                    </ul>
                </li>
                <li>
                <li id="faacturacion" style="display: block">
                    <a href="#!" class="btn-sideBar-SubMenu">
                        <i class="zmdi zmdi-balance zmdi-hc-fw"></i> Facturación <i class="zmdi zmdi-caret-down pull-right"></i>
                    </a>
                    <ul class="list-unstyled full-box">
                        <li>
                            <a href="pages/facturacion.php"><i class="zmdi zmdi-labels zmdi-hc-fw"></i> Crear Factura</a>
                        </li>
                        <li>
                            <a href="pages/reporte.php"><i class="zmdi zmdi-calendar-note zmdi-hc-fw"></i> Reportes</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="pages/pedidos.php">
                        <i class="zmdi zmdi-timer zmdi-hc-fw"></i> Pedidos
                    </a>
                </li>
            </ul>
        </div>
    </section>