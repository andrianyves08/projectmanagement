  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>View Profile</h1>
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
        <div class="row">
          <div class="col-md-3">
            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">

                </div>

                <h3 class="profile-username text-center"><?php echo ucwords($userinfo['firstname']);?> <?php echo ucwords($userinfo['lastname']);?></h3>

                <p class="text-muted text-center"><?php echo ucwords($userinfo['title']);?></p>


                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Projects</b><a class='float-right'><?php echo ucwords($projects); ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Teams</b><a class='float-right'><?php echo ucwords($teams); ?></a>
                  </li>
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">About Me</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> Education</strong>

                <p class="text-muted">
                  <?php echo ucfirst($userinfo['education']);?>
                </p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                <p class="text-muted"><?php echo ucfirst($userinfo['location']);?></p>

                <hr>

                <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                <p class="text-muted">
                  <span class="tag tag-danger"><?php echo ucfirst($userinfo['skills']);?></span>
                </p>

                <hr>

                <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                <p class="text-muted"><?php echo ucfirst($userinfo['notes']);?></p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
             <div class="card">
              <div class="card-header">
                <h3 class="card-title">History of Projects</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table">
                  <thead>
                    <tr>
                      <th>Project Name</th>
                      <th>Position</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php foreach ($listprojects as $projects){ ?>
                      <tr>
                        <td><?php echo ucwords($projects['name']); ?></td>
                        <td><?php echo ucwords($projects['role']); ?></td>
                      </tr>
                  <?php } ?>

                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->


        </div>
        <!-- /.row -->

       
        
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->