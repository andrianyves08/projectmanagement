<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Create Team</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Create Team</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

 <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Create Team</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <?php echo form_open_multipart('teams/create'); ?>
                <div class="card-body">
                  <div class="form-group">
                    <label for="projectname">Team Name</label>
                    <input type="text" class="form-control" id="teamname" name="teamname" placeholder="Enter Team Name">
                  </div>
                    <div class="form-group">
                      <label>Select a Member</label>

                      <select name="teammember[]" class="select2" multiple="multiple" data-placeholder="Select Team" style="width: 100%;">
                      <?php foreach($allusers as $user): ?>
                        <option value="<?php echo $user['id']; ?>"><?php echo $user['firstname']; ?> <?php echo $user['lastname']; ?></option>
                      <?php endforeach; ?>
                      </select>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="createproject">Submit</button>
                </div>
              </form>
            </div>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->