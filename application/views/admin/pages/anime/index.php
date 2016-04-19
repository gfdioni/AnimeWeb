<?php
$title="Anime Management";
$assets= base_url()."assets/adminlte/";
$admin= base_url()."index.php/admin/";
$dir= $_SERVER['DOCUMENT_ROOT']."/ci_project/anime/application/views/admin/"; ?>
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
            Anime Management
            <small>Anime</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Anime Management</a></li>
            <li class="active">Anime</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
			 <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Anime List</h3>
                </div><!-- /.box-header -->
		<div class="box-body">
		<?php echo $this->table->generate(); ?>

					</div>
              </div><!-- /.box -->
			 <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Management</h3>
                </div><!-- /.box-header -->
                <form role="form" method="post" action="<?php echo $admin."add"; ?>" >
                  <div class="box-body">
                    <div class="form-group">
                      <label for="InputTitle">Anime Title</label>
                      <input type="text" class="form-control" id="InputTitle" name="InputTitle" placeholder="Enter Title">
                    </div>
                    <div class="form-group">
                      <label for="InputDescription">Description</label>
                      <textarea class="form-control" rows="3" id="InputDescription" name="InputDescription" paceholder="Enter Description Here..."></textarea>
                    </div>
                    <div class="form-group">
                      <label for="InputGenre">Genre</label>
						<select class="form-control" name="InputGenre"  id="InputGenre" multiple="multiple" data-placeholder="Select Genres" style="width: 100%;">
					  <option>Action</option>
                      <option>Adventure</option>
                      <option>Comedy</option>
                      <option>Drama</option>
                      <option>Ecchi</option>
                      <option>Fantasy</option>
                      <option>Game</option>
						</select>
                    </div>

                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
    <?php include $dir.'footer.php' ?>
</html>