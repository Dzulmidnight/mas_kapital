<aside>
    <div id="sidebar"  class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
            <li>
                <a <?php if(isset($menu) && $menu == 'inicio'){echo 'class="active"';} ?>href="index.php">
                    <i class="fa fa-dashboard"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="sub-menu">
                <a <?php if(isset($seccion) && $seccion == 'secciones'){echo 'class="active"'; } ?> href="javascript:;" >
                    <i class="fa fa-laptop"></i>
                    <span>Secciones</span>
                </a>
                <ul class="sub">
                    <li <?php if(isset($menu) && $menu == 'quienes'){echo 'class="active"'; } ?>><a href="quienes_somos.php">¿Quiénes Somos?</a></li>
                    <li <?php if(isset($menu) && $menu == 'normatividad'){echo 'class="active"'; } ?>><a href="normatividad.php">Normatividad</a></li>
                    <li <?php if(isset($menu) && $menu == 'sucursales'){echo 'class="active"'; } ?>><a href="sucursales.php">Sucursales</a></li>
                    <li <?php if(isset($menu) && $menu == 'flexible'){echo 'class="active"'; } ?>><a href="mas_flexible.php">Más Flexible</a></li>
                    <li <?php if(isset($menu) && $menu == 'universidad'){echo 'class="active"'; } ?>><a href="universidad_mk.php">Universidad Mk</a></li>
                    <li <?php if(isset($menu) && $menu == 'trabajo'){echo 'class="active"'; } ?>><a href="bolsa_trabajo.php">Bolsa de Trabajo</a></li>

                    <!--<li <?php if(isset($menu) && $menu == 'quienes'){echo 'class="active"'; } ?>><a href="#">¿Quiénes Somos?</a></li>
                    <li <?php if(isset($menu) && $menu == 'normatividad'){echo 'class="active"'; } ?>><a href="#">Normatividad</a></li>
                    <li <?php if(isset($menu) && $menu == 'sucursales'){echo 'class="active"'; } ?>><a href="#">Sucursales</a></li>
                    <li <?php if(isset($menu) && $menu == 'flexible'){echo 'class="active"'; } ?>><a href="#">Más Flexible</a></li>
                    <li <?php if(isset($menu) && $menu == 'universidad'){echo 'class="active"'; } ?>><a href="#">Universidad Mk</a></li>
                    <li <?php if(isset($menu) && $menu == 'trabajo'){echo 'class="active"'; } ?>><a href="#">Bolsa de Trabajo</a></li>-->

                </ul>
            </li>

            <li class="sub-menu">
                <a <?php if(isset($seccion) && $seccion == 'informacion'){echo 'class="active"'; } ?> href="javascript:;" >
                    <i class="fa fa-book"></i>
                    <span>Información</span>
                </a>
                <ul class="sub">
                    <li <?php if(isset($menu) && $menu == 'usuarios'){echo 'class="active"'; } ?>><a  href="usuarios.php">Usuarios</a></li>
                    <li <?php if(isset($menu) && $menu == 'sucursales_add'){echo 'class="active"'; } ?>><a  href="sucursales_add.php">Sucursales</a></li>
                    <li <?php if(isset($menu) && $menu == 'vacantes'){echo 'class="active"'; } ?>><a  href="vacantes.php">Vacantes</a></li>
                    <li <?php if(isset($menu) && $menu == 'faq'){echo 'class="active"'; } ?>><a  href="preguntas_frecuentes.php">Preguntas Frecuentes</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a <?php if(isset($seccion) && $seccion == 'formularios'){echo 'class="active"'; } ?> href="javascript:;" >
                    <i class="fa fa-files-o"></i>
                    <span>Formularios</span>
                </a>
                <ul class="sub">
                    <li <?php if(isset($menu) && $menu == 'denuncias'){echo 'class="active"'; } ?>><a  href="denuncias.php">Denuncias</a></li>
                    <li <?php if(isset($menu) && $menu == 'solicitudes'){echo 'class="active"'; } ?>><a  href="solicitudes.php">Solicitudes</a></li>
                </ul>
            </li>



            <li class="sub-menu">
                <a href="javascript:;" >
                    <i class="fa fa-book"></i>
                    <span>UI Elements</span>
                </a>
                <ul class="sub">
                    <li><a  href="general.html">General</a></li>
                    <li><a  href="buttons.html">Buttons</a></li>
                    <li><a  href="modal.html">Modal</a></li>
                    <li><a  href="toastr.html">Toastr Notifications</a></li>
                    <li><a  href="widget.html">Widget</a></li>
                    <li><a  href="slider.html">Slider</a></li>
                    <li><a  href="nestable.html">Nestable</a></li>
                    <li><a  href="font_awesome.html">Font Awesome</a></li>
                </ul>
            </li>

            <li class="sub-menu">
                <a href="javascript:;" >
                    <i class="fa fa-cogs"></i>
                    <span>Components</span>
                </a>
                <ul class="sub">
                    <li><a  href="grids.html">Grids</a></li>
                    <li><a  href="calendar.html">Calendar</a></li>
                    <li><a  href="gallery.html">Gallery</a></li>
                    <li><a  href="todo_list.html">Todo List</a></li>
                    <li><a  href="draggable_portlet.html">Draggable Portlet</a></li>
                    <li><a  href="tree.html">Tree View</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" >
                    <i class="fa fa-tasks"></i>
                    <span>Form Stuff</span>
                </a>
                <ul class="sub">
                    <li><a  href="form_component.html">Form Components</a></li>
                    <li><a  href="advanced_form_components.html">Advanced Components</a></li>
                    <li><a  href="form_wizard.html">Form Wizard</a></li>
                    <li><a  href="form_validation.html">Form Validation</a></li>
                    <li><a  href="dropzone.html">Dropzone File Upload</a></li>
                    <li><a  href="inline_editor.html">Inline Editor</a></li>
                    <li><a  href="image_cropping.html">Image Cropping</a></li>
                    <li><a  href="file_upload.html">Multiple File Upload</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" >
                    <i class="fa fa-th"></i>
                    <span>Data Tables</span>
                </a>
                <ul class="sub">
                    <li><a  href="basic_table.html">Basic Table</a></li>
                    <li><a  href="responsive_table.html">Responsive Table</a></li>
                    <li><a  href="dynamic_table.html">Dynamic Table</a></li>
                    <li><a  href="editable_table.html">Editable Table</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" >
                    <i class=" fa fa-envelope"></i>
                    <span>Mail</span>
                </a>
                <ul class="sub">
                    <li><a  href="inbox.html">Inbox</a></li>
                    <li><a  href="inbox_details.html">Inbox Details</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" >
                    <i class=" fa fa-bar-chart-o"></i>
                    <span>Charts</span>
                </a>
                <ul class="sub">
                    <li><a  href="morris.html">Morris</a></li>
                    <li><a  href="chartjs.html">Chartjs</a></li>
                    <li><a  href="flot_chart.html">Flot Charts</a></li>
                    <li><a  href="xchart.html">xChart</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" >
                    <i class="fa fa-shopping-cart"></i>
                    <span>Shop</span>
                </a>
                <ul class="sub">
                    <li><a  href="product_list.html">List View</a></li>
                    <li><a  href="product_details.html">Details View</a></li>
                </ul>
            </li>
            <li>
                <a href="google_maps.html" >
                    <i class="fa fa-map-marker"></i>
                    <span>Google Maps </span>
                </a>
            </li>
            <li class="sub-menu">
                <a href="javascript:;">
                    <i class="fa fa-comments-o"></i>
                    <span>Chat Room</span>
                </a>
                <ul class="sub">
                    <li><a  href="lobby.html">Lobby</a></li>
                    <li><a  href="chat_room.html"> Chat Room</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" >
                    <i class="fa fa-glass"></i>
                    <span>Extra</span>
                </a>
                <ul class="sub">
                    <li><a  href="blank.html">Blank Page</a></li>
                    <li><a  href="sidebar_closed.html">Sidebar Closed</a></li>
                    <li><a  href="people_directory.html">People Directory</a></li>
                    <li><a  href="coming_soon.html">Coming Soon</a></li>
                    <li><a  href="lock_screen.html">Lock Screen</a></li>
                    <li><a  href="profile.html">Profile</a></li>
                    <li><a  href="invoice.html">Invoice</a></li>
                    <li><a  href="project_list.html">Project List</a></li>
                    <li><a  href="project_details.html">Project Details</a></li>
                    <li><a  href="search_result.html">Search Result</a></li>
                    <li><a  href="pricing_table.html">Pricing Table</a></li>
                    <li><a  href="faq.html">FAQ</a></li>
                    <li><a  href="fb_wall.html">FB Wall</a></li>
                    <li><a  href="404.html">404 Error</a></li>
                    <li><a  href="500.html">500 Error</a></li>
                </ul>
            </li>
            <li>
                <a  href="login.html">
                    <i class="fa fa-user"></i>
                    <span>Login Page</span>
                </a>
            </li>

            <!--multi level menu start-->
            <li class="sub-menu">
                <a href="javascript:;" >
                    <i class="fa fa-sitemap"></i>
                    <span>Multi level Menu</span>
                </a>
                <ul class="sub">
                    <li><a  href="javascript:;">Menu Item 1</a></li>
                    <li class="sub-menu">
                        <a  href="boxed_page.html">Menu Item 2</a>
                        <ul class="sub">
                            <li><a  href="javascript:;">Menu Item 2.1</a></li>
                            <li class="sub-menu">
                                <a  href="javascript:;">Menu Item 3</a>
                                <ul class="sub">
                                    <li><a  href="javascript:;">Menu Item 3.1</a></li>
                                    <li><a  href="javascript:;">Menu Item 3.2</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <!--multi level menu end-->

        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>