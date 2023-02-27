<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar" style="line-height: 2.0;">
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
    <div class="sidebar-brand-icon">
      <img src="img/logo/zoo.png">
    </div>
    <div class="sidebar-brand-text mx-3" style="font-size: 30px;">Zoo</div>
  </a>
  <hr class="sidebar-divider my-0">
  <li class="nav-item active">
    <a class="nav-link" href="dashboard.php">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span>
    </a>
  </li>
  <hr class="sidebar-divider">
  <div class="sidebar-heading">
    Features
  </div>
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#packageForm" aria-expanded="true" aria-controls="collapseForm">
      <i class="fab fa-fw fa-wpforms"></i>
      <span>DEPARTMENT</span>
    </a>
    <div id="packageForm" class="collapse" aria-labelledby="headingForm" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header"> DEPARTMENT</h6>
        <a class="collapse-item" href="add_department.php">ADD Department</a>
        <a class="collapse-item" href="manage_department.php">Manage Department</a>
      </div>
    </div>
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#packageForm1" aria-expanded="true" aria-controls="collapseForm">
      <i class="fab fa-fw fa-wpforms"></i>
      <span>STAFF</span>
    </a>
    <div id="packageForm1" class="collapse" aria-labelledby="headingForm" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header"> SCHEDULING</h6>
        <a class="collapse-item" href="addstaff.php">Add Staff</a>
        <a class="collapse-item" href="manage_animals.php">Manage Staff</a>
      </div>
    </div>
  </li>
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#users2" aria-expanded="true" aria-controls="collapseTable">
      <i class="fas fa-fw fa-table"></i>
      <span>TASKS TO DO</span>
    </a>
    <div id="users2" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">tasks</h6>
        <a class="collapse-item" href="assignedtasks.php">assigned tasks</a>
        
      </div>
    </div>
    </li>
    

  

    <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#users2" aria-expanded="true" aria-controls="collapseTable">
      <i class="fas fa-fw fa-table"></i>
      <span>PROFILE</span>
    </a>
    <div id="users2" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Users</h6>
        <a class="collapse-item" href="myprofile.php">MY PROFILE</a>
        <a class="collapse-item" href="changepassword.php">CHANGE PASSWORD</a>
      </div>
    </div>
    </li>
    
    
    <li class="nav-item">
    <a class="nav-link" href="../Login.php">
      <i class="fas fa-fw fa-chart-area"></i>
      <span>Logout </span>
    </a>
  </li>
  </li>
</ul>