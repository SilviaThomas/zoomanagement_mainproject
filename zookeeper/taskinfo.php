

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog add-category-modal">
    
      <!-- Modal content-->
      <div class="modal-content rounded-0">
        <div class="modal-header rounded-0">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h2 class="modal-title text-center">Assign New Task</h2>
        </div>
        <div class="modal-body rounded-0">
          <div class="row">
            <div class="col-md-12">
              <form role="form" action="" method="post" autocomplete="off">
                <div class="form-horizontal">
                  <div class="form-group">
                    <label class="control-label text-p-reset">Task Title</label>
                    <div class="">
                      <input type="text" placeholder="Task Title" id="task_title" name="task_title" list="expense" class="form-control rounded-0" id="default" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label text-p-reset">Task Description</label>
                    <div class="">
                      <textarea name="task_description" id="task_description" placeholder="Text Deskcription" class="form-control rounded-0" rows="5" cols="5"></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label text-p-reset">Start Time</label>
                    <div class="">
                      <input type="text" name="t_start_time" id="t_start_time" class="form-control rounded-0">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label text-p-reset">End Time</label>
                    <div class="">
                      <input type="text" name="t_end_time" id="t_end_time" class="form-control rounded-0">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label text-p-reset">Assign To</label>
                    <div class="">
                      <?php 
                        $sql = "SELECT user_id, fullname FROM tbl_admin WHERE user_role = 2";
                        $info = $obj_admin->manage_all_info($sql);   
                      ?>
                      <select class="form-control rounded-0" name="assign_to" id="aassign_to" required>
                        <option value="">Select Employee...</option>

                        <?php while($row = $info->fetch(PDO::FETCH_ASSOC)){ ?>
                        <option value="<?php echo $row['user_id']; ?>"><?php echo $row['fullname']; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                   
                  </div>
                  <div class="form-group">
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-3">
                      <button type="submit" name="add_task_post" class="btn btn-primary rounded-0 btn-sm">Assign Task</button>
                    </div>
                    <div class="col-sm-3">
                      <button type="submit" class="btn btn-default rounded-0 btn-sm" data-dismiss="modal">Cancel</button>
                    </div>
                  </div>
                </div>
              </form> 
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>





    <div class="row">
      <div class="col-md-12">
        <div class="well well-custom rounded-0">
          <div class="gap"></div>
          <div class="row">
            <div class="col-md-8">
              <div class="btn-group">
                <?php if($user_role == 1){ ?>
                <div class="btn-group">
                  <button class="btn btn-info btn-menu" data-toggle="modal" data-target="#myModal">Assign New Task</button>
                </div>
              <?php } ?>

              </div>

            </div>

            
          </div>
          <center ><h3>Task Management Section</h3></center>
          <div class="gap"></div>

          <div class="gap"></div>

          <div class="table-responsive">
            <table class="table table-codensed table-custom">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Task Title</th>
                  <th>Assigned To</th>
                  <th>Start Time</th>
                  <th>End Time</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>

             
                
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>




include("include/footer.php");



?>

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script type="text/javascript">
  flatpickr('#t_start_time', {
    enableTime: true
  });

  flatpickr('#t_end_time', {
    enableTime: true
  });

</script>
