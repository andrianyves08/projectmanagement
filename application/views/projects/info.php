<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php echo ucwords($info['name']);?></h1>
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
                  <dt>Description</dt>
                  <dd><?php echo ucwords($info['description']); ?></dd>
                  <dt>Date Start</dt>
                  <dd><?php echo date('F j, Y',strtotime($info['datestart']));?></dd>
                  <dt>Date End</dt>
                  <dd><?php echo date('F j, Y',strtotime($info['dateend']));?></dd>
                  <dt>Location</dt>
                  <dd><?php echo ucfirst($info['location']);?></dd>
                  <dt>Project Manager</dt>
                  <dd><?php echo ucfirst($info['firstname']);?> <?php echo ucfirst($info['lastname']);?></dd>
                  <dt>Teams</dt>
                    <?php foreach ($members as $projectsmembers){ ?>
                      <ul>
                        <li><?php echo ucfirst($projectsmembers['name']);?>
                            <a class="btn btn-info btn-sm" href='<?php echo base_url('teams/members/'.$projectsmembers['name']); ?>'><i class="fas fa-users"></i>Members</a>
                        </li>
                      </ul>
                    <?php }?>

                <dd><a class="btn btn-primary btn-sm" href='<?php echo base_url('projects/members/'.$info['projID']); ?>'><i class="fas fa-users"></i>View Member Roles
                        </a></dd>
                
                </dl>
                <?php  
                   if($info['owner'] == $this->session->userdata('user_id')){ ?>
                                     <?php echo form_open_multipart('projects/inviteteam/'.$info['projID']); ?>
                <div class="row">
                  <div class="col-3">
                  <div class="form-group">
                      <label>Invite Teams</label>
                      <input type="hidden" class="form-control" id="proID" name="proID" value="<?php echo ucfirst($info['projID']);?>">

                      <select name="projectteam[]" class="select2" multiple="multiple" data-placeholder="Select Team" style="width: 100%;">
                      <?php foreach($teamnotjoin as $teamjoining): ?>
                        <option value="<?php echo $teamjoining['id']; ?>"><?php echo $teamjoining['name']; ?></option>
                      <?php endforeach; ?>
                      </select><br>
                      <button type="submit" class="btn btn-primary btn-sm">Submit</button>
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