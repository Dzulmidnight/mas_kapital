<?php 
    require('../conexion/conexion.php');
    require('../conexion/sesion.php');

    if(isset($_SESSION['usuario'])){
        if($_SESSION['usuario']['tipo'] != 'administrador'){
            header('Location: conexion/salir.php');
        }
    }
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

    <title>FAQ</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
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
      <?php include('header.php'); ?>      <!--header end-->
      <!--sidebar start-->
      <?php include('aside.php'); ?>
      <!--sidebar end-->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper site-min-height">
              <!-- page start-->
              <div class="row">
                <div class="col-md-9">
              <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                  <div class="panel-group" id="accordion1">
                      <div class="panel panel-danger">
                          <div class="panel-heading">
                              <h4 class="panel-title">
                                  <a href="#accordion1_1" data-parent="#accordion1" data-toggle="collapse" class="accordion-toggle">
                                      1. Lorem Ipsum is simply dummy text of the printing and typesetting industry?
                                  </a>
                              </h4>
                          </div>
                          <div class="panel-collapse collapse  in" id="accordion1_1">
                              <div class="panel-body">
                                <p> Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                                  <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                                  <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                                 
                              </div>
                          </div>
                      </div>
                      <div class="panel panel-success">
                          <div class="panel-heading">
                              <h4 class="panel-title">
                                  <a href="#accordion1_2" data-parent="#accordion1" data-toggle="collapse" class="accordion-toggle">
                                      2. It is a long established fact that a reader will be distracted ?
                                  </a>
                              </h4>
                          </div>
                          <div class="panel-collapse collapse" id="accordion1_2">
                              <div class="panel-body">
                                  There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.
                              </div>
                          </div>
                      </div>
                      <div class="panel">
                          <div class="panel-heading">
                              <h4 class="panel-title">
                                  <a href="#accordion1_3" data-parent="#accordion1" data-toggle="collapse" class="accordion-toggle">
                                      3. Contrary to popular belief, Lorem Ipsum is not simply random text?
                                  </a>
                              </h4>
                          </div>
                          <div class="panel-collapse collapse" id="accordion1_3">
                              <div class="panel-body">
                                  Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Lorem officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch Lorem tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                              </div>
                          </div>
                      </div>
                      <div class="panel ">
                          <div class="panel-heading">
                              <h4 class="panel-title">
                                  <a href="#accordion1_4" data-parent="#accordion1" data-toggle="collapse" class="accordion-toggle">
                                      4. Various versions have evolved over the years, sometimes by accident?
                                  </a>
                              </h4>
                          </div>
                          <div class="panel-collapse collapse" id="accordion1_4">
                              <div class="panel-body">
                                  content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text,
                              </div>
                          </div>
                      </div>
                      <div class="panel panel-warning">
                          <div class="panel-heading">
                              <h4 class="panel-title">
                                  <a href="#accordion1_5" data-parent="#accordion1" data-toggle="collapse" class="accordion-toggle">
                                      5. The standard chunk of Lorem Ipsum used ?
                                  </a>
                              </h4>
                          </div>
                          <div class="panel-collapse collapse" id="accordion1_5">
                              <div class="panel-body">
                                  Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard
                              </div>
                          </div>
                      </div>
                      <div class="panel panel-default">
                          <div class="panel-heading">
                              <h4 class="panel-title">
                                  <a href="#accordion1_6" data-parent="#accordion1" data-toggle="collapse" class="accordion-toggle">
                                      6. All the Lorem Ipsum generators on the Internet tend ?
                                  </a>
                              </h4>
                          </div>
                          <div class="panel-collapse collapse" id="accordion1_6">
                              <div class="panel-body">
                                  There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.
                              </div>
                          </div>
                      </div>
                      <div class="panel panel-default">
                          <div class="panel-heading">
                              <h4 class="panel-title">
                                  <a href="#accordion1_7" data-parent="#accordion1" data-toggle="collapse" class="accordion-toggle">
                                      7. There are many variations of passages of Lorem Ipsum available ?
                                  </a>
                              </h4>
                          </div>
                          <div class="panel-collapse collapse" id="accordion1_7">
                              <div class="panel-body">
                                  the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.
                              </div>
                          </div>
                      </div>
                      <div class="panel panel-default">
                          <div class="panel-heading">
                              <h4 class="panel-title">
                                  <a href="#accordion1_8" data-parent="#accordion1" data-toggle="collapse" class="accordion-toggle">
                                      8.  passages of Lorem Ipsum available ?
                                  </a>
                              </h4>
                          </div>
                          <div class="panel-collapse collapse" id="accordion1_8">
                              <div class="panel-body">
                                  the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="tab-pane" id="tab_2">
                  <div class="panel-group" id="accordion2">
                      <div class="panel panel-success">
                          <div class="panel-heading">
                              <h4 class="panel-title">
                                  <a href="#accordion2_1" data-parent="#accordion2" data-toggle="collapse" class="accordion-toggle">
                                      1. Reprehenderit enim eiusmod high life accusamury ?
                                  </a>
                              </h4>
                          </div>
                          <div class="panel-collapse collapse  in" id="accordion2_1">
                              <div class="panel-body">
                                  <p>
                                     life accusamus terry richardson ad squid. Lorem officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch Lorem tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of the.
                                  </p>
                                  <p>
                                      Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Lorem officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch Lorem tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic.
                                  </p>
                              </div>
                          </div>
                      </div>
                      <div class="panel panel-danger">
                          <div class="panel-heading">
                              <h4 class="panel-title">
                                  <a href="#accordion2_2" data-parent="#accordion2" data-toggle="collapse" class="accordion-toggle">
                                      2. life accusamus terry richardson ad squid. ?
                                  </a>
                              </h4>
                          </div>
                          <div class="panel-collapse collapse" id="accordion2_2">
                              <div class="panel-body">
                                  <p>
                                      Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Lorem officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch Lorem tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic.
                                      Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Lorem officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch Lorem tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic.
                                  </p>
                              </div>
                          </div>
                      </div>
                      <div class="panel panel-success">
                          <div class="panel-heading">
                              <h4 class="panel-title">
                                  <a href="#accordion2_3" data-parent="#accordion2" data-toggle="collapse" class="accordion-toggle">
                                      3. Quinoa nesciunt laborum eiusmod moon tempor ?
                                  </a>
                              </h4>
                          </div>
                          <div class="panel-collapse collapse" id="accordion2_3">
                              <div class="panel-body">
                                  Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Lorem officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch Lorem tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                  Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Lorem officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch Lorem tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                  Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Lorem officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch Lorem tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                              </div>
                          </div>
                      </div>
                      <div class="panel panel-default">
                          <div class="panel-heading">
                              <h4 class="panel-title">
                                  <a href="#accordion2_4" data-parent="#accordion2" data-toggle="collapse" class="accordion-toggle">
                                      4. Anim pariatur cliche reprehenderit?
                                  </a>
                              </h4>
                          </div>
                          <div class="panel-collapse collapse" id="accordion2_4">
                              <div class="panel-body">
                                  Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                              </div>
                          </div>
                      </div>
                      <div class="panel panel-default">
                          <div class="panel-heading">
                              <h4 class="panel-title">
                                  <a href="#accordion2_5" data-parent="#accordion2" data-toggle="collapse" class="accordion-toggle">
                                      5. Lorem Ipsum is simply dummy text of the printing and typesetting industry.?
                                  </a>
                              </h4>
                          </div>
                          <div class="panel-collapse collapse" id="accordion2_5">
                              <div class="panel-body">
                                  Lorem officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch Lorem tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. Food truck quinoa nesciunt laborum eiusmod. Brunch Lorem tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et
                              </div>
                          </div>
                      </div>


                  </div>
              </div>
              <div class="tab-pane" id="tab_3">
                  <div class="panel-group" id="accordion3">
                      <div class="panel panel-danger">
                          <div class="panel-heading">
                              <h4 class="panel-title">
                                  <a href="#accordion3_1" data-parent="#accordion3" data-toggle="collapse" class="accordion-toggle">
                                      1. Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry ?
                                  </a>
                              </h4>
                          </div>
                          <div class="panel-collapse collapse  in" id="accordion3_1">
                              <div class="panel-body">
                                  <p>
                                      Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Lorem officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch Lorem tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.
                                  </p>
                                  <p>
                                      Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Lorem officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch Lorem tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.
                                  </p>
                              </div>
                          </div>
                      </div>
                      <div class="panel panel-success">
                          <div class="panel-heading">
                              <h4 class="panel-title">
                                  <a href="#accordion3_2" data-parent="#accordion3" data-toggle="collapse" class="accordion-toggle">
                                      2. Anim pariatur cliche reprehenderit, enim eiusmod high  ?
                                  </a>
                              </h4>
                          </div>
                          <div class="panel-collapse collapse" id="accordion3_2">
                              <div class="panel-body">
                                 Truck quinoa nesciunt laborum eiusmod. Brunch Lorem tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch   et.
                                  Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Lorem officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch Lorem tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                              </div>
                          </div>
                      </div>
                      <div class="panel panel-default">
                          <div class="panel-heading">
                              <h4 class="panel-title">
                                  <a href="#accordion3_3" data-parent="#accordion3" data-toggle="collapse" class="accordion-toggle">
                                      3. Laborum eiusmod. Brunch dsfsdff moon tempor ?
                                  </a>
                              </h4>
                          </div>
                          <div class="panel-collapse collapse" id="accordion3_3">
                              <div class="panel-body">
                                  Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Lorem officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch Lorem tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                  Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Lorem officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch Lorem tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                  Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Lorem officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch Lorem tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                              </div>
                          </div>
                      </div>
                      <div class="panel panel-default">
                          <div class="panel-heading">
                              <h4 class="panel-title">
                                  <a href="#accordion3_4" data-parent="#accordion3" data-toggle="collapse" class="accordion-toggle">
                                      4. Non Sumon skateboard dolor Lorem ?
                                  </a>
                              </h4>
                          </div>
                          <div class="panel-collapse collapse" id="accordion3_4">
                              <div class="panel-body">
                                  Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular
                              </div>
                          </div>
                      </div>
                      <div class="panel panel-default">
                          <div class="panel-heading">
                              <h4 class="panel-title">
                                  <a href="#accordion3_5" data-parent="#accordion3" data-toggle="collapse" class="accordion-toggle">
                                      5. Contrary to popular belief, Lorem Ipsum is not simply random text.?
                                  </a>
                              </h4>
                          </div>
                          <div class="panel-collapse collapse" id="accordion3_5">
                              <div class="panel-body">
                                  It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem
                              </div>
                          </div>
                      </div>
                      <div class="panel panel-default">
                          <div class="panel-heading">
                              <h4 class="panel-title">
                                  <a href="#accordion3_6" data-parent="#accordion3" data-toggle="collapse" class="accordion-toggle">
                                      6. The standard chunk of Lorem Ipsum used since the  ?
                                  </a>
                              </h4>
                          </div>
                          <div class="panel-collapse collapse" id="accordion3_6">
                              <div class="panel-body">
                                  ontrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              </div>
              </div>
                <div class="col-md-3">
                    <ul class="vertical-menu">
                        <li class="active">
                            <a href="#tab_1" data-toggle="tab">
                                <i class="fa fa-bullhorn"></i>
                                General Questions
                            </a>
                        </li>
                        <li><a href="#tab_2" data-toggle="tab"><i class="fa fa-bolt"></i>  Lorem Ipsum is simply dummy</a></li>
                        <li><a href="#tab_3" data-toggle="tab"><i class="fa fa-briefcase"></i>  Contrary to popular belief</a></li>
                        <li><a href="#tab_1" data-toggle="tab"><i class="fa fa-bookmark"></i>  standard chunk of Lorem </a></li>
                        <li><a href="#tab_2" data-toggle="tab"><i class="fa fa-exclamation-circle"></i> Why Chose Flatlab</a></li>
                        <li><a href="#tab_3" data-toggle="tab"><i class="fa fa-plus"></i> Other Questions</a></li>
                    </ul>
                </div>

              </div>
              <!-- page end-->
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
      <?php include('footer.php'); ?>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="js/respond.min.js" ></script>

  <!--right slidebar-->
  <script src="js/slidebars.min.js"></script>

    <!--common script for all pages-->
    <script src="js/common-scripts.js"></script>


  </body>
</html>
