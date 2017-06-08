<?php 
  $menu = 'universidad';
 ?>

<!DOCTYPE html>
<html lang="esp">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>General</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/gritter/css/jquery.gritter.css" />
      <!--right slidebar-->
      <link href="css/slidebars.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

  <section id="container" class="">
      <!--header start-->
      <?php 
      include('header.php');
       ?>
      <!--header end-->
      <!--sidebar start-->
      <?php 
      include('aside.php');
       ?>
      <!--sidebar end-->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              <div class="row">
                  <div class="col-lg-12">
                      <!--breadcrumbs start -->
                      <ul class="breadcrumb">
                          <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
                          <li><a href="#">Library</a></li>
                          <li class="active">Data</li>
                      </ul>
                      <!--breadcrumbs end -->
                  </div>
              </div>
              <div class="row">
                  <div class="col-lg-6">
                      <!--notification start-->
                      <section class="panel">
                          <div class="panel-body">
                              <div class="alert alert-success alert-block fade in">
                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="fa fa-times"></i>
                                  </button>
                                  <h4>
                                      <i class="fa fa-ok-sign"></i>
                                      Success!
                                  </h4>
                                  <p>Best check yo self, you're not looking too good...</p>
                              </div>
                              <div class="alert alert-block alert-danger fade in">
                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="fa fa-times"></i>
                                  </button>
                                  <strong>Oh snap!</strong> Change a few things up and try submitting again.
                              </div>
                              <div class="alert alert-success fade in">
                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="fa fa-times"></i>
                                  </button>
                                  <strong>Well done!</strong> You successfully read this important alert message.
                              </div>
                              <div class="alert alert-info fade in">
                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="fa fa-times"></i>
                                  </button>
                                  <strong>Heads up!</strong> This alert needs your attention, but it's not super important.
                              </div>
                              <div class="alert alert-warning fade in">
                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="fa fa-times"></i>
                                  </button>
                                  <strong>Warning!</strong> Best check yo self, you're not looking too good.
                              </div>

                          </div>
                      </section>
                      <!--notification end-->

                      <!--tab nav start-->
                      <section class="panel">
                          <header class="panel-heading tab-bg-dark-navy-blue ">
                              <ul class="nav nav-tabs">
                                  <li class="active">
                                      <a data-toggle="tab" href="#home">Home</a>
                                  </li>
                                  <li class="">
                                      <a data-toggle="tab" href="#about">About</a>
                                  </li>
                                  <li class="">
                                      <a data-toggle="tab" href="#profile">Profile</a>
                                  </li>
                                  <li class="">
                                      <a data-toggle="tab" href="#contact">Contact</a>
                                  </li>
                              </ul>
                          </header>
                          <div class="panel-body">
                              <div class="tab-content">
                                  <div id="home" class="tab-pane active">
                                      Home
                                  </div>
                                  <div id="about" class="tab-pane">About</div>
                                  <div id="profile" class="tab-pane">Profile</div>
                                  <div id="contact" class="tab-pane">Contact</div>
                              </div>
                          </div>
                      </section>
                      <!--tab nav start-->
                      <!--tab nav start-->
                      <section class="panel">
                          <header class="panel-heading tab-bg-dark-navy-blue">
                              <ul class="nav nav-tabs">
                                  <li>
                                      <a data-toggle="tab" href="#home-2">
                                          <i class="fa fa-home"></i>
                                      </a>
                                  </li>
                                  <li class="active">
                                      <a data-toggle="tab" href="#about-2">
                                          <i class="fa fa-user"></i>
                                          About
                                      </a>
                                  </li>
                                  <li class="">
                                      <a data-toggle="tab" href="#contact-2">
                                          <i class="fa fa-envelope-o"></i>
                                          Contact
                                      </a>
                                  </li>
                              </ul>
                          </header>
                          <div class="panel-body">
                              <div class="tab-content">
                                  <div id="home-2" class="tab-pane ">
                                      Home
                                  </div>
                                  <div id="about-2" class="tab-pane active">About</div>
                                  <div id="contact-2" class="tab-pane ">Contact</div>
                              </div>
                          </div>
                      </section>
                      <!--tab nav start-->

                      <!--tab nav start-->
                      <section class="panel">
                          <header class="panel-heading tab-bg-dark-navy-blue tab-right ">
                              <ul class="nav nav-tabs pull-right">
                                  <li class="active">
                                      <a data-toggle="tab" href="#home-3">
                                          <i class="fa fa-home"></i>
                                      </a>
                                  </li>
                                  <li class="">
                                      <a data-toggle="tab" href="#about-3">
                                          <i class="fa fa-user"></i>
                                          About
                                      </a>
                                  </li>
                                  <li class="">
                                      <a data-toggle="tab" href="#contact-3">
                                          <i class="fa fa-envelope-o"></i>
                                          Contact
                                      </a>
                                  </li>
                              </ul>
                              <span class="hidden-sm wht-color">Right tab</span>
                          </header>
                          <div class="panel-body">
                              <div class="tab-content">
                                  <div id="home-3" class="tab-pane active">
                                      Home
                                  </div>
                                  <div id="about-3" class="tab-pane">About</div>
                                  <div id="contact-3" class="tab-pane">Contact</div>
                              </div>
                          </div>
                      </section>
                      <!--tab nav start-->

                      <!--navigation start-->
                      <nav class="navbar navbar-inverse" role="navigation">
                          <!-- Brand and toggle get grouped for better mobile display -->
                          <div class="navbar-header">
                              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                                  <span class="sr-only">Toggle navigation</span>
                                  <span class="fa fa-bars"></span>
                              </button>
                              <a class="navbar-brand" href="#">Brand</a>
                          </div>

                          <!-- Collect the nav links, forms, and other content for toggling -->
                          <div class="collapse navbar-collapse navbar-ex1-collapse">
                              <ul class="nav navbar-nav">
                                  <li class="active"><a href="#">Link</a></li>
                                  <li><a href="javascript:;">Link</a></li>
                                  <li class="dropdown">
                                      <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                                      <ul class="dropdown-menu">
                                          <li><a href="#">Action</a></li>
                                          <li><a href="#">Another action</a></li>
                                          <li><a href="#">Something else here</a></li>
                                          <li><a href="#">Separated link</a></li>
                                          <li><a href="#">One more separated link</a></li>
                                      </ul>
                                  </li>
                              </ul>
                              <!--<form class="navbar-form navbar-left" role="search">-->
                              <!--<div class="form-group">-->
                              <!--<input type="text" class="form-control" placeholder="Search">-->
                              <!--</div>-->
                              <!--<button type="submit" class="btn btn-default">Submit</button>-->
                              <!--</form>-->
                              <ul class="nav navbar-nav navbar-right">
                                  <li><a href="javascript:;">Link</a></li>
                                  <li class="dropdown">
                                      <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                                      <ul class="dropdown-menu">
                                          <li><a href="#">Action</a></li>
                                          <li><a href="#">Another action</a></li>
                                          <li><a href="#">Something else here</a></li>
                                          <li><a href="#">Separated link</a></li>
                                      </ul>
                                  </li>
                              </ul>
                          </div><!-- /.navbar-collapse -->
                      </nav>

                      <!--navigation end-->

                      <!--tooltips start-->
                      <section class="panel">
                          <div class="panel-body">
                              <button title="" data-placement="top" data-toggle="tooltip" class="btn btn-default tooltips" type="button" data-original-title="Tooltip on top">Tooltip on top</button>
                              <button title="" data-placement="left" data-toggle="tooltip" class="btn btn-default tooltips" type="button" data-original-title="Tooltip on left"> left</button>
                              <button title="Tooltip on bottom" data-placement="bottom" data-toggle="tooltip " class="btn btn-default tooltips" type="button"> bottom</button>
                              <button title="Tooltip on right" data-placement="right" data-toggle="tooltip" class="btn btn-default tooltips" type="button"> right</button>
                          </div>
                      </section>
                      <!--tooltips start-->

                      <!--popover start-->
                      <section class="panel">
                          <div class="panel-body">
                              <button data-original-title="Popovers in top" data-content="And here's some amazing content. It's very engaging. right?" data-placement="top" data-trigger="hover" class="btn btn-info popovers">Popover on Top</button>
                              <button data-original-title="Popovers in bottom" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus." data-placement="bottom" data-trigger="hover" class="btn btn-info popovers">Bottom</button>
                              <button data-original-title="Popovers in right" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus." data-placement="right" data-trigger="hover" class="btn btn-info popovers">Right</button>
                              <button data-original-title="Popovers in left" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus." data-placement="left" data-trigger="hover" class="btn btn-info popovers">Left</button>
                          </div>
                      </section>
                      <!--popover start-->

                      <!--modal start-->
                      <section class="panel">
                          <header class="panel-heading">
                              Modal Dialogs
                          </header>
                          <div class="panel-body">
                              <a class="btn btn-success" data-toggle="modal" href="#myModal">
                                  Dialog
                              </a>
                              <a class="btn btn-warning" data-toggle="modal" href="#myModal2">
                                  Confirm
                              </a>
                              <a class="btn btn-danger" data-toggle="modal" href="#myModal3">
                                  Alert !
                              </a>
                              <!-- Modal -->
                              <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                              <h4 class="modal-title">Modal Tittle</h4>
                                          </div>
                                          <div class="modal-body">

                                              Body goes here...

                                          </div>
                                          <div class="modal-footer">
                                              <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                                              <button class="btn btn-success" type="button">Save changes</button>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <!-- modal -->
                              <!-- Modal -->
                              <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                              <h4 class="modal-title">Modal Tittle</h4>
                                          </div>
                                          <div class="modal-body">

                                              Body goes here...

                                          </div>
                                          <div class="modal-footer">
                                              <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                                              <button class="btn btn-warning" type="button"> Confirm</button>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <!-- modal -->
                              <!-- Modal -->
                              <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                              <h4 class="modal-title">Modal Tittle</h4>
                                          </div>
                                          <div class="modal-body">

                                              Body goes here...

                                          </div>
                                          <div class="modal-footer">
                                              <button class="btn btn-danger" type="button"> Ok</button>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <!-- modal -->

                          </div>
                      </section>
                      <!--modal start-->

                      <!--carousel start-->
                      <section class="panel">
                          <div id="c-slide" class="carousel slide auto panel-body">
                              <ol class="carousel-indicators out">
                                  <li class="active" data-slide-to="0" data-target="#c-slide"></li>
                                  <li class="" data-slide-to="1" data-target="#c-slide"></li>
                                  <li class="" data-slide-to="2" data-target="#c-slide"></li>
                              </ol>
                              <div class="carousel-inner">
                                  <div class="item text-center active">
                                      <h3>Flatlab is new model of Admin</h3>
                                      <small class="text-muted">Based on Bootstrap 3</small>
                                  </div>
                                  <div class="item text-center">
                                      <h3>Massive UI Elements</h3>
                                      <small class="text-muted">Fully Responsive</small>
                                  </div>
                                  <div class="item text-center">
                                      <h3>Well Documentation</h3>
                                      <small class="text-muted">Easy to Use</small>
                                  </div>
                              </div>
                              <a data-slide="prev" href="#c-slide" class="left carousel-control">
                                  <i class="fa fa-angle-left"></i>
                              </a>
                              <a data-slide="next" href="#c-slide" class="right carousel-control">
                                  <i class="fa fa-angle-right"></i>
                              </a>
                          </div>
                      </section>
                      <!--carousel end-->

                      <!--gritter notification start-->
                      <section class="panel">
                          <header class="panel-heading">
                              Gritter Notifications
                          </header>
                          <div class="panel-body">
                              <p class="text-muted">Click on below buttons to check it out.</p>
                              <a id="add-regular" class="btn btn-default btn-sm" href="javascript:;">Regular</a>
                              <a id="add-sticky" class="btn btn-success  btn-sm" href="javascript:;">Sticky</a>
                              <a id="add-without-image" class="btn btn-info  btn-sm" href="javascript:;">Imageless</a>

                              <a id="add-gritter-light" class="btn btn-warning  btn-sm" href="javascript:;">Light</a>
                              <a id="add-max" class="btn btn-primary  btn-sm" href="javascript:;">Max of 3</a>
                              <a id="remove-all" class="btn btn-danger  btn-sm" href="#">Remove all</a>
                          </div>
                      </section>
                      <!--gritter notification end-->

                  </div>
                  <div class="col-lg-6">
                      <!--progress bar start-->
                      <section class="panel">
                          <header class="panel-heading">
                              Basic Progress Bars
                          </header>
                          <div class="panel-body">
                              <div class="progress progress-xs">
                                  <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                                      <span class="sr-only">60% Complete</span>
                                  </div>
                              </div>
                              <div class="progress progress-xs">
                                  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                      <span class="sr-only">40% Complete (success)</span>
                                  </div>
                              </div>
                              <div class="progress progress-xs">
                                  <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                      <span class="sr-only">20% Complete</span>
                                  </div>
                              </div>
                              <div class="progress progress-xs">
                                  <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                      <span class="sr-only">60% Complete (warning)</span>
                                  </div>
                              </div>
                              <div class="progress progress-xs">
                                  <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                      <span class="sr-only">80% Complete</span>
                                  </div>
                              </div>
                              <p class="text-muted">
                                  Stacked Progress Bars
                              </p>
                              <div class="progress progress-sm">
                                  <div class="progress-bar progress-bar-success" style="width: 35%">
                                      <span class="sr-only">35% Complete (success)</span>
                                  </div>
                                  <div class="progress-bar progress-bar-warning" style="width: 20%">
                                      <span class="sr-only">20% Complete (warning)</span>
                                  </div>
                                  <div class="progress-bar progress-bar-danger" style="width: 10%">
                                      <span class="sr-only">10% Complete (danger)</span>
                                  </div>
                              </div>
                          </div>
                      </section>
                      <section class="panel">
                          <header class="panel-heading">
                              Striped Progress Bars
                          </header>
                          <div class="panel-body">
                              <div class="progress progress-striped progress-sm">
                                  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                      <span class="sr-only">40% Complete (success)</span>
                                  </div>
                              </div>
                              <div class="progress progress-striped progress-sm">
                                  <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                      <span class="sr-only">20% Complete</span>
                                  </div>
                              </div>
                              <div class="progress progress-striped progress-sm">
                                  <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                      <span class="sr-only">60% Complete (warning)</span>
                                  </div>
                              </div>
                              <div class="progress progress-striped progress-sm">
                                  <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                      <span class="sr-only">80% Complete (danger)</span>
                                  </div>
                              </div>
                              <p class="text-muted">
                                  Animated Progress Bars
                              </p>
                              <div class="progress progress-striped active progress-sm">
                                  <div class="progress-bar progress-bar-success"  role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%">
                                      <span class="sr-only">45% Complete</span>
                                  </div>
                              </div>
                          </div>
                      </section>
                      <!--progress bar end-->

                      <!--collapse start-->
                      <div class="panel-group m-bot20" id="accordion">
                          <div class="panel panel-default">
                              <div class="panel-heading">
                                  <h4 class="panel-title">
                                      <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                          Collapsible Group Item #1
                                      </a>
                                  </h4>
                              </div>
                              <div id="collapseOne" class="panel-collapse collapse in">
                                  <div class="panel-body">
                                      Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                  </div>
                              </div>
                          </div>
                          <div class="panel panel-default">
                              <div class="panel-heading">
                                  <h4 class="panel-title">
                                      <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                          Collapsible Group Item #2
                                      </a>
                                  </h4>
                              </div>
                              <div id="collapseTwo" class="panel-collapse collapse">
                                  <div class="panel-body">
                                      Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                  </div>
                              </div>
                          </div>
                          <div class="panel panel-default">
                              <div class="panel-heading">
                                  <h4 class="panel-title">
                                      <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                          Collapsible Group Item #3
                                      </a>
                                  </h4>
                              </div>
                              <div id="collapseThree" class="panel-collapse collapse">
                                  <div class="panel-body">
                                      Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                  </div>
                              </div>
                          </div>
                      </div>
                      <!--collapse end-->

                      <!--label and badge start-->
                      <section class="panel">
                          <div class="panel-body">
                              <p class="text-muted text-center">Labels</p>
                              <p class="text-center">
                                  <span class="label label-default">label</span>
                                  <span class="label label-primary">Primary</span>
                                  <span class="label label-success">Success</span>
                                  <span class="label label-info">Info</span>
                                  <span class="label label-inverse">Inverse</span>
                                  <span class="label label-warning">Warning</span>
                                  <span class="label label-danger">Danger</span>
                              </p>
                              <p class="text-muted text-center">Badges</p>
                              <p class="m-bot-none text-center">
                                  <span class="badge">5</span>
                                  <span class="badge bg-primary">10</span>
                                  <span class="badge bg-success">15</span>
                                  <span class="badge bg-info">20</span>
                                  <span class="badge bg-inverse">25</span>
                                  <span class="badge bg-warning">30</span>
                                  <span class="badge bg-important">35</span>
                              </p>
                          </div>
                      </section>
                      <!--label and badge end-->

                      <!--pagination start-->
                      <section class="panel">
                          <div class="panel-body">
                              <div>
                                  <ul class="pagination pagination-lg">
                                      <li><a href="#">«</a></li>
                                      <li><a href="#">1</a></li>
                                      <li><a href="#">2</a></li>
                                      <li><a href="#">3</a></li>
                                      <li><a href="#">4</a></li>
                                      <li><a href="#">5</a></li>
                                      <li><a href="#">»</a></li>
                                  </ul>
                              </div>
                              <div class="text-center">
                                  <ul class="pagination">
                                      <li><a href="#">«</a></li>
                                      <li><a href="#">1</a></li>
                                      <li><a href="#">2</a></li>
                                      <li><a href="#">3</a></li>
                                      <li><a href="#">4</a></li>
                                      <li><a href="#">5</a></li>
                                      <li><a href="#">»</a></li>
                                  </ul>
                              </div>
                              <div>
                                  <ul class="pagination pagination-sm pull-right">
                                      <li><a href="#">«</a></li>
                                      <li><a href="#">1</a></li>
                                      <li><a href="#">2</a></li>
                                      <li><a href="#">3</a></li>
                                      <li><a href="#">4</a></li>
                                      <li><a href="#">5</a></li>
                                      <li><a href="#">»</a></li>
                                  </ul>
                              </div>
                          </div>
                      </section>
                      <!--pagination end-->

                  </div>

              </div>
              <div class="row">
                  <div class="col-lg-12">
                      <!--Pulstate start-->
                      <section class="panel">
                          <header class="panel-heading">
                              Pulstate
                          </header>
                          <div class="panel-body">
                              <p>Click on below buttons to check it out.</p>
                              <a href="javascript:;" class="btn btn-default" id="pulsate-regular">Pulsate regular</a>
                              <a href="javascript:;" class="btn btn-success" id="pulsate-once">Pulsate once</a>
                              <a href="javascript:;" class="btn btn-info" id="pulsate-hover">Pulsate hover</a>
                              <a href="javascript:;" class="btn btn-danger" id="pulsate-crazy">Crazy pulsate :)</a>
                          </div>
                      </section>
                      <!--Pulstate  end-->
                  </div>
              </div>
          </section>
      </section>
      <!--main content end-->
      <!-- Right Slidebar start -->
      <div class="sb-slidebar sb-right sb-style-overlay">
          <h5 class="side-title">Online Customers</h5>
          <ul class="quick-chat-list">
              <li class="online">
                  <div class="media">
                      <a href="#" class="pull-left media-thumb">
                          <img alt="" src="img/chat-avatar2.jpg" class="media-object">
                      </a>
                      <div class="media-body">
                          <strong>John Doe</strong>
                          <small>Dream Land, AU</small>
                      </div>
                  </div><!-- media -->
              </li>
              <li class="online">
                  <div class="media">
                      <a href="#" class="pull-left media-thumb">
                          <img alt="" src="img/chat-avatar.jpg" class="media-object">
                      </a>
                      <div class="media-body">
                          <div class="media-status">
                              <span class=" badge bg-important">3</span>
                          </div>
                          <strong>Jonathan Smith</strong>
                          <small>United States</small>
                      </div>
                  </div><!-- media -->
              </li>

              <li class="online">
                  <div class="media">
                      <a href="#" class="pull-left media-thumb">
                          <img alt="" src="img/pro-ac-1.png" class="media-object">
                      </a>
                      <div class="media-body">
                          <div class="media-status">
                              <span class=" badge bg-success">5</span>
                          </div>
                          <strong>Jane Doe</strong>
                          <small>ABC, USA</small>
                      </div>
                  </div><!-- media -->
              </li>
              <li class="online">
                  <div class="media">
                      <a href="#" class="pull-left media-thumb">
                          <img alt="" src="img/avatar1.jpg" class="media-object">
                      </a>
                      <div class="media-body">
                          <strong>Anjelina Joli</strong>
                          <small>Fockland, UK</small>
                      </div>
                  </div><!-- media -->
              </li>
              <li class="online">
                  <div class="media">
                      <a href="#" class="pull-left media-thumb">
                          <img alt="" src="img/mail-avatar.jpg" class="media-object">
                      </a>
                      <div class="media-body">
                          <div class="media-status">
                              <span class=" badge bg-warning">7</span>
                          </div>
                          <strong>Mr Tasi</strong>
                          <small>Dream Land, USA</small>
                      </div>
                  </div><!-- media -->
              </li>
          </ul>
          <h5 class="side-title"> pending Task</h5>
          <ul class="p-task tasks-bar">
              <li>
                  <a href="#">
                      <div class="task-info">
                          <div class="desc">Dashboard v1.3</div>
                          <div class="percent">40%</div>
                      </div>
                      <div class="progress progress-striped">
                          <div style="width: 40%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="40" role="progressbar" class="progress-bar progress-bar-success">
                              <span class="sr-only">40% Complete (success)</span>
                          </div>
                      </div>
                  </a>
              </li>
              <li>
                  <a href="#">
                      <div class="task-info">
                          <div class="desc">Database Update</div>
                          <div class="percent">60%</div>
                      </div>
                      <div class="progress progress-striped">
                          <div style="width: 60%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="60" role="progressbar" class="progress-bar progress-bar-warning">
                              <span class="sr-only">60% Complete (warning)</span>
                          </div>
                      </div>
                  </a>
              </li>
              <li>
                  <a href="#">
                      <div class="task-info">
                          <div class="desc">Iphone Development</div>
                          <div class="percent">87%</div>
                      </div>
                      <div class="progress progress-striped">
                          <div style="width: 87%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="20" role="progressbar" class="progress-bar progress-bar-info">
                              <span class="sr-only">87% Complete</span>
                          </div>
                      </div>
                  </a>
              </li>
              <li>
                  <a href="#">
                      <div class="task-info">
                          <div class="desc">Mobile App</div>
                          <div class="percent">33%</div>
                      </div>
                      <div class="progress progress-striped">
                          <div style="width: 33%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="80" role="progressbar" class="progress-bar progress-bar-danger">
                              <span class="sr-only">33% Complete (danger)</span>
                          </div>
                      </div>
                  </a>
              </li>
              <li>
                  <a href="#">
                      <div class="task-info">
                          <div class="desc">Dashboard v1.3</div>
                          <div class="percent">45%</div>
                      </div>
                      <div class="progress progress-striped active">
                          <div style="width: 45%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="45" role="progressbar" class="progress-bar">
                              <span class="sr-only">45% Complete</span>
                          </div>
                      </div>

                  </a>
              </li>
              <li class="external">
                  <a href="#">See All Tasks</a>
              </li>
          </ul>
      </div>
      <!-- Right Slidebar end -->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              2013 &copy; FlatLab by VectorLab.
              <a href="#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <script type="text/javascript" src="assets/gritter/js/jquery.gritter.js"></script>
    <script src="js/respond.min.js" ></script>
    <script type="text/javascript" src="js/jquery.pulsate.min.js"></script>

    <!--right slidebar-->
    <script src="js/slidebars.min.js"></script>

    <!--common script for all pages-->
    <script src="js/common-scripts.js"></script>

    <!--script for this page only-->
    <script src="js/gritter.js" type="text/javascript"></script>
    <script src="js/pulstate.js" type="text/javascript"></script>


  </body>
</html>
