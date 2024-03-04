<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link">
      {{-- <img src="{{ asset('assets') }}/images/uploads/settings/{{ getSetting()->site_icon }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> --}}
      <span class="brand-text font-weight-light"> Chokoria Probashi Society</span>
    </a>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ route('admin.dashboard') }}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                Website Settings
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.slider.list') }}" class="nav-link">
                  <i class="fas fa-file-image ml-3"></i>
                  <p class="ml-1">Sliders</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.setting.edit') }}" class="nav-link">
                  <i class="fas fa-edit ml-3"></i>
                  <p class="ml-1">Change Settings</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.staff.list') }}" class="nav-link">
              <i class="nav-icon fas fa-briefcase"></i>
              <p>
                Staff List
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                Staff Attendance
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.attendance.add') }}" class="nav-link">
                  <i class="fas fa-file-image ml-3"></i>
                  <p class="ml-1">Add Attendance</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.attendance.list') }}" class="nav-link">
                  <i class="fas fa-edit ml-3"></i>
                  <p class="ml-1">Manage Attendance</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.member-meeting.list') }}" class="nav-link">
                <i class="nav-icon fa fa-window-restore"></i>
                 <p>
                Member Meeting List
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                Executive Council
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.council.list') }}" class="nav-link">
                  <i class="fas fa-file-image ml-3"></i>
                  <p class="ml-1">Council List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.executive.list') }}" class="nav-link">
                  <i class="fas fa-edit ml-3"></i>
                  <p class="ml-1">Exceutive Council List</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.member.list') }}" class="nav-link">
              <i class="nav-icon fas fa-briefcase"></i>
              <p>
                Member List
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.member.inactive') }}" class="nav-link">
              <i class="nav-icon fas fa-lock"></i>
              <p>
                Inactive Member List
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.project.list') }}" class="nav-link">
              <i class="nav-icon fas fa-project-diagram"></i>
              <p>
                Projects List
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.donation.list') }}" class="nav-link">
              <i class="nav-icon fas fa-donate"></i>
              <p>
                Montly Fee / Donation
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-money-bill"></i>
              <p>
                Expense / Income
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.head.list') }}" class="nav-link">
                  <i class="fas fa-file-image ml-3"></i>
                  <p class="ml-1"> Head List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.laser.list') }}" class="nav-link">
                  <i class="fas fa-edit ml-3"></i>
                  <p class="ml-1">Laser List</p>
                </a>
              </li>
              {{-- <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-cogs"></i>
                  <p>
                    Report
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('admin.laser.weak') }}" class="nav-link">
                          <i class="fas fa-edit ml-3"></i>
                          <p class="ml-1">Weak</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{ route('admin.laser.month') }}" class="nav-link">
                          <i class="fas fa-edit ml-3"></i>
                          <p class="ml-1">Month</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{ route('admin.laser.year') }}" class="nav-link">
                          <i class="fas fa-edit ml-3"></i>
                          <p class="ml-1">Year</p>
                        </a>
                      </li>
                </ul>
              </li> --}}
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.certificate.list') }}" class="nav-link">
              <i class="nav-icon fas fa-certificate"></i>
              <p>
               Certificate
              </p>
            </a>
          </li>

          {{-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                Administration
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.department.list') }}" class="nav-link">
                  <i class="fas fa-building ml-3"></i>
                  <p class="ml-1">Departments</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.teacher.list') }}" class="nav-link">
                  <i class="fas fa-edit ml-3"></i>
                  <p class="ml-1">Teachers</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.student.list') }}" class="nav-link">
                  <i class="fas fa-edit ml-3"></i>
                  <p class="ml-1">Student</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.location.list') }}" class="nav-link">
                  <i class="fas fa-map-marker ml-3"></i>
                  <p class="ml-1">Staff Working Locations</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.staff.list') }}" class="nav-link">
                  <i class="fas fa-briefcase ml-3"></i>
                  <p class="ml-1">Staffs</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.notice.list') }}" class="nav-link">
                  <i class="fas fa-bullhorn ml-3"></i>
                  <p class="ml-1">Notices</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.news.list') }}" class="nav-link">
                  <i class="fas fa-book ml-3"></i>
                  <p class="ml-1">News</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Student Data
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.student.list') }}" class="nav-link">
                  <i class="fas fa-list-alt ml-3"></i>
                  <p class="ml-1">All Students</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.group.list') }}" class="nav-link">
                  <i class="fas fa-list-alt ml-3"></i>
                  <p class="ml-1">Groups</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.result.list') }}" class="nav-link">
              <i class="nav-icon fas fa-list-alt"></i>
              <p>
                Student Result
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.photogallery.list') }}" class="nav-link">
              <i class="nav-icon fas fa-image"></i>
              <p>
                Photo Gallery
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
               Academic
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.examroutine.list') }}" class="nav-link">
                  <i class="fas fa-edit ml-3"></i>
                  <p class="ml-1">Add-Exam-Routine</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.classroutine.list') }}" class="nav-link">
                  <i class="fas fa-edit ml-3"></i>
                  <p class="ml-1">Add-Class-Routine</p>
                </a>
              </li>
            </ul>
          {{-- </li> --}}

        </ul>

      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
