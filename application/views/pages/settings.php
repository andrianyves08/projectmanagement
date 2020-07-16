<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Settings</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Settings</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <div class="row">
          <div class="col-md-6">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">About Me</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="">Position</label>
                    <input type="hidden" class="form-control" name="id" value="">
                    <input type="text" class="form-control" name="position" placeholder="Enter position" value="">
                  </div>
                  <div class="form-group">
                    <label for="">Education</label>
                    <input type="text" class="form-control" name="education" placeholder="Enter education" value="">
                  </div>
                  <div class="form-group">
                    <label for="">Location</label>
                    <input type="text" class="form-control" name="location" placeholder="Enter location" value="">
                  </div>
                  <div class="form-group">
                    <label for="">Skills</label>
                    <textarea class="form-control" rows="3" name="skills" placeholder="Enter skills" value=""></textarea>
                  </div>
                   <div class="form-group">
                    <label for="">Notes</label>
                    <textarea class="form-control" rows="3" name="notes" placeholder="Enter notes" value=""></textarea>
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-success" name="save">Save</button>
                </div>
              </form>
            </div>
          </div>
          <!-- /.col -->

        </div>
        <!-- /.row -->



        
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->