<?php
$assets= base_url()."assets/adminlte/";
$admin= base_url()."index.php/admin/";
$dir= __DIR__ ."/../../"; ?>
<!DOCTYPE html>
<html>
  <?php include $dir."header.php" ?>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <?php include $dir.'sidebar.php' ?>
        <!-- Main content -->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Options
            <small>Anime</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Options</a></li>
            <li class="active">Genre Management</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
			 <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Genre </h3>
                </div><!-- /.box-header -->
			<div class="box-body">
		<?php echo $this->table->generate(); ?>
			</div>
              </div><!-- /.box -->
			 <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Management</h3>
                </div><!-- /.box-header -->
                <form role="form" method="post" action="<?php echo $admin."addgenre/"; ?>">
                  <div class="box-body">
					<div class="form-group">
                      <label for="IdGenre">Genre ID</label>
                      <input type="text" class="form-control" id="IdGenre_show" name="IdGenre_show" placeholder="Automatically Added" disabled>
					  <input type="hidden" id="IdGenre" name="IdGenre" value="">
                    </div>
                    <div class="form-group">
                      <label for="InputTitle">Genre Title</label>
                      <input type="text" class="form-control" id="InputTitle" name="InputTitle" placeholder="Enter Title">
                    </div>
                    <div class="form-group">
                      <label for="InputDescription">Description</label>
                      <textarea class="form-control" rows="5" id="InputDescription" name="InputDescription" placeholder="Enter Description Here..."></textarea>
                    </div>
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
					<button type="reset" class="btn btn-primary btn-khusus" id="btnReset" disabled>Clear</button>
                  </div>
                </form>
              </div>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
	  	 <!-- Datatables and Select 2 for Anime Main Table -->
	<script src="<?php echo base_url()."assets/"?>js/table_genre.js"></script>
    <?php include $dir.'footer.php' ?>
</html>