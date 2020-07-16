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
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table">
                  <thead>
                    <tr>
                      <th width="100">Full Name</th>
                      <th width="20" style="width: 10px"></th>
                    </tr>
                  </thead>
                  <tbody>
                   <?php foreach ($teammembers as $members): ?>
                      <tr>
                        <td><?php echo ucwords($members['firstname']); ?> <?php echo ucwords($members['lastname']); ?></td>
                        <td><a href="<?php echo base_url('user-profile/'.$members['usID']); ?>"><span class="badge bg-info">View Profile</span></a></td>
                      </tr>
                    <?php endforeach; ?>
     
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