<div class="content-wrapper" style="min-height: 551px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
???


    ?>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

     <?php 
     if ($this->session->userdata('notif')) echo $this->session->userdata('notif');
      ?>

    </section>
    <!-- /.content -->
  </div>