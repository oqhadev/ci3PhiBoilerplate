<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $title ?> - <?php echo $this->config->item("dashboardJudul")  ?></title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <?php echo css("/css/backends.css") ?>
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
       
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <?php echo js("/js/backends.js") ?>



        <link rel="stylesheet"
              href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">

            <header class="main-header">
                <a href="<?php echo base_url() ?>welcome" class="logo">
                    <span class="logo-mini"><b><?php echo $this->config->item("dashboardJudul")  ?></b></span>
                    <span class="logo-lg"><b><?php echo $this->config->item("dashboardJudul")  ?></b></span>
                </a>
                <nav class="navbar navbar-static-top">
                    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>

                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">                          


                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="<?php echo base_url() ?>assets/img/foto_profil/<?php echo $this->session->userdata('images'); ?>" class="user-image" alt="User Image">
                                    <span class="hidden-xs"><?php echo $this->session->userdata('full_name'); ?> </span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header">
                                        <img src="<?php echo base_url() ?>assets/img/foto_profil/<?php echo $this->session->userdata('images'); ?> " class="img-circle" alt="User Image">

                                        <p>
                                            <?php echo $this->session->userdata('full_name'); ?>                                         
                                            <small><?php echo $this->db->from("tbl_user_level")->select("nama_level")->where("id_user_level",$this->session->userdata('id_user_level'))->get()->row()->nama_level; ?></small>
                                        </p>
                                    </li>
                                    <li class="user-footer">
                                       
                                        <div class="pull-right">
                                            <?php echo anchor($this->config->item("dashboardUrl").'auth/logout', 'Logout', array('class' => 'btn btn-default btn-flat')); ?>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                           
                        </ul>
                    </div>
                </nav>
            </header>
            <aside class="main-sidebar">
                <?php $this->load->view('adminPart/sidebar'); ?>
            </aside>
         
            <?php
            echo $contents;
            ?>


            <footer class="main-footer">
                <div class="pull-right hidden-xs">
             </div>
                <strong>Copyright &copy; 2018 <a href="http://oqhadev.com">OqhaDev</a>.</strong> All rights
                reserved.
            </footer>

          
            <div class="control-sidebar-bg"></div>
        </div>
        <script>
            
<?php echo ($this->session->flashdata('message')) ? "   setTimeout(function(){swal({
  type: 'success',
  title: '".$this->session->flashdata('message')."',
  showConfirmButton: false,
  timer: 3000
})},3000); " : "" ?>  
        </script>
    </body>
</html>
