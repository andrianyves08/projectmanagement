<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Create Project</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
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
                <h3 class="card-title">Project Details</h3>
              </div>
              <!-- /.card-header -->
          
              <!-- form start -->
              <?php echo form_open_multipart('projects/create'); ?>
                <div class="card-body">
                  <div class="form-group">
                    <label for="projectname">Project Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter Name">
                  </div>
                  <div class="form-group">
                    <label for="projectdescription">Description</label>
                    <input type="text" class="form-control" name="description" placeholder="Enter Description">
                  </div>
                  <div class="form-group">
                    <label for="projectdescription">Location</label>
                    <input type="text" class="form-control" name="location" placeholder="Enter Location">
                  </div>
                  <div class="row">
                    <div class="col-6">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Date Start</label>
                      <input type="date" class="form-control" name="start">
                    </div></div>
                    <div class="col-6">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Date End</label>
                      <input type="date" class="form-control" name="end">
                    </div></div>
                  </div>
                    <div class="form-group">
                      <label>Select Teams</label>
                      <select name="team[]" class="select2" multiple="multiple" data-placeholder="Select Team" style="width: 100%;">
                        <?php foreach($teams as $team): ?>
                          <option value="<?php echo $team['id']; ?>"><?php echo $team['name']; ?></option>
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