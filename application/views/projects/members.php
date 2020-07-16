<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Project Members</h1>
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
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table">
                  <thead>
                    <tr>
                      <th width="100">Full Name</th>
                      <th width="100">Team</th>
                      <th width="100">Role</th>
                      <th width="20" style="width: 10px"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($members as $projectsmembers){ ?>
                      <tr>
                      <td><?php echo ucwords($projectsmembers['firstname']); ?> <?php echo ucwords($projectsmembers['lastname']); ?></td>
                      <td>
                        </td>
                      <td><?php echo ucwords($projectsmembers['role']); ?></td>
                      <td>
                        <a href='<?php echo base_url('user-profile/'.$projectsmembers['usID']); ?>'><button class="btn btn-xs btn-info">View Profile</button></a>
                        <?php  
                           if($info['owner'] == $this->session->userdata('user_id')){ ?>
                          <a href='<?php echo base_url('projects/update-role/'.$projectsmembers['usID']); ?>'><button class="btn btn-xs btn-success">Edit Role</button></a>
                          <a href='<?php echo base_url('projects/remove/'.$projectsmembers['usID']); ?>'><button class="btn btn-xs btn-danger">Remove Member</button></a>
                        <?php } ?>

                      </td>
                    </tr>
                    <?php }?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->



      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->