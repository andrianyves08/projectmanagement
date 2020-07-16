  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php echo ucfirst($teamname['name']);?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <h4 class="mb-2 mb-sm-0 pt-1"><a class="text-right" href="<?php echo $back;?>">Back</a></h4>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

 <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-text-width"></i>
                  Info
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <dl>
                  <dt>Projects</dt>
                    <?php foreach ($teamprojects as $projects){ ?>
                      <ul><li><?php echo ucfirst($projects['projName']);?> <a class="btn btn-primary btn-sm" href="<?php echo base_url('projects/info/'.$projects['projID']); ?>"><i class="fas fa-folder"></i>View
                      </a></li></ul>
                    <?php }?>


                  <dt>Members</dt>
                  <?php foreach ($teammembers as $members){ ?>
                  <ul><li><?php echo ucwords($members['firstname']);?> <?php echo ucwords($members['lastname']);?></li></ul>
                   <?php }?>
                </dl>
                  <?php   
                    if($creator == '1'){ ?>
                <form class="form-horizontal" action="teaminfo.php" method="POST">
                <div class="row">
                  <div class="col-3">
                  <div class="form-group">
                      <label>Invite Members</label>
                      <input type="hidden" class="form-control" id="teamid" name="teamid" value="">
                      <select name="addmember[]" class="select2" multiple="multiple" data-placeholder="Select Team" style="width: 100%;">
                      </select><br>
                      <button type="submit" class="btn btn-primary btn-sm" name="save">Submit</button>
                    </div>
                  </div>
                </div>
              </form>
                <?php } ?>
              </div>
              <!-- /.card-body -->
            </div>


      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->