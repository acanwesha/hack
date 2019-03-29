<div class="page-wrapper chiller-theme toggled">
  <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
    <i class="fas fa-bars"></i>
  </a>
  <nav id="sidebar" class="sidebar-wrapper">
    <div class="sidebar-content">
      <div class="sidebar-brand">
        <a href="localhost:80/hackathon/student/index">Dashboard</a>
        <div id="close-sidebar">
          <i class="fas fa-times"></i>
        </div>
      </div>
      <div class="sidebar-header">

        <div class="user-info">
          <span class="user-name"><?php echo $teacher_info[0]->name; ?></span>
          <span class="user-role">ID: <?php echo $teacher_info[0]->teacher_id; ?></span>          
          

          <div class="sidebar-menu">
            <ul>
              <li  class="header-menu">
                <span style="color:white!important;font-size: 1.2em;">Menu</span>
              </li>
              <li class="sidebar-dropdown">
                <a href="../teacher/events">              
                  <span>Events</span>              
                </a>           
              </li>
              <li class="sidebar-dropdown" >
                <a href="../teacher/index">              
                  <span>Notes</span>              
                </a>           
              </li>
              <li class="sidebar-dropdown">
                <a href="../teacher/answer">              
                  <span>Answer Question</span>              
                </a>           
              </li>
              
              <li class="sidebar-dropdown">
                <a href="#">              
                  <span>Feedback</span>              
                </a>           
              </li>
            </ul>
          </div>
          <br><br><br>
          <div><a href="../teacher/logout" ><button style="color: white; margin:auto" class="btn btn-default">Log out</button></a></div>
        </div>
        <!-- sidebar-menu  -->
      </div>

    </nav>
    <!-- sidebar-wrapper  -->
  </div>
</body>

