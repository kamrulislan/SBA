  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo 
      <a href="https://bestprintersltd.com/admin" class="brand-link">
          <img src="assets/dist/img/AdminLTELogo.png" alt="Best Printers Logo"
              class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">Best Printers Ltd</span>
      </a>
      -->

      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="image">
                  <img src="assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
              </div>
              <div class="info">
                  <a href="https://bestprintersltd.com/admin" class="d-block">Best Printers Ltd</a>
              </div>
          </div>

          <!-- SidebarSearch Form -->
          <div class="form-inline">
              <div class="input-group" data-widget="sidebar-search">
                  <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                  <div class="input-group-append">
                      <button class="btn btn-sidebar">
                          <i class="fas fa-search fa-fw"></i>
                      </button>
                  </div>
              </div>
          </div>

          <!-- Sidebar Menu -->

          <?php $page = substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'], "/") + 1); ?>


          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                  <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                  <li class="nav-item menu-open">
                      <a href="index" class="nav-link <?= $page == 'index.php' ? 'active' : '' ?>">
                          <i class="nav-icon fas fa-tachometer-alt"></i>
                          <p>
                              Dashboard

                          </p>
                      </a>

                  </li>

                  <li class="nav-item <?= $page == 'expense.php' || $page == 'expensemainadd.php' || $page == 'expenseadd.php' || $page == 'expensesubcat.php' || $page == 'expenses-sum.php' ? 'menu-open' : '' ?>">
                      <a href="#" class="nav-link  <?= $page == 'expense.php' || $page == 'expensemainadd.php' || $page == 'expenseadd.php' || $page == 'expensesubcat.php' || $page == 'expenses-sum.php' ? 'active' : '' ?>">
                          <i class="nav-icon fas fa-copy"></i>
                          <p>
                              Expenses
                              <i class="fas fa-angle-left right"></i>
                              <span class="badge badge-info right">6</span>
                          </p>
                      </a>
                      <ul class="nav nav-treeview   <?= $page == 'expensesubcat.php' ? 'active' : '' ?>">

                          <li class="nav-item">
                              <a href="expense-sum" class="nav-link <?= $page == 'expense-sum.php' ? 'active' : '' ?>">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Expenses sum</p>
                              </a>
                          </li>

                          <li class="nav-item">
                              <a href="expense" class="nav-link <?= $page == 'expense.php' ? 'active' : '' ?>">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Show Expenses</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="expensemainadd" class="nav-link <?= $page == 'expensemainadd.php' ? 'active' : '' ?>">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Expense </p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="expenseadd.php" class="nav-link <?= $page == 'expenseadd.php' ? 'active' : '' ?>">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Expense Category</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="expensesubcat.php" class="nav-link <?= $page == 'expensesubcat.php' ? 'active' : '' ?>">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Expense Sub Category</p>
                              </a>
                          </li>

                      </ul>
                  </li>


                  <!--Sale statement-->
                  <li class="nav-item <?= $page == 'sales.php' || $page == 'salebilladd.php' || $page == 'salecomadd.php' || $page == 'salebillpaid.php' ? 'menu-open' : '' ?>">
                      <a href="#" class="nav-link <?= $page == 'sales.php' || $page == 'salebilladd.php' || $page == 'salecomadd.php' || $page == 'salebillpaid.php' ? 'active' : '' ?>">
                          <i class="nav-icon fas fa-copy"></i>
                          <p>
                              Sales
                              <i class="fas fa-angle-left right"></i>
                              <span class="badge badge-info right">4</span>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="sales.php" class="nav-link <?= $page == 'sales.php' ? 'active' : '' ?>">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Sales statement</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="salebillpaid.php" class="nav-link <?= $page == 'salebillpaid.php' ? 'active' : '' ?>">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Paid Bill</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="salebilladd.php" class="nav-link <?= $page == 'salebilladd.php' ? 'active' : '' ?>">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Add Bill </p>
                              </a>
                          </li>

                          <li class="nav-item">
                              <a href="salecomadd.php" class="nav-link <?= $page == 'salecomadd.php' ? 'active' : '' ?>">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Compnay Name</p>
                              </a>
                          </li>


                      </ul>
                  </li>




                  <!--Lamination bill statement-->
                  <li class="nav-item <?= $page == 'lam.php' || $page == 'lambilladd.php' || $page == 'lamcomadd.php' || $page == 'lambillpaid.php' ? 'menu-open' : '' ?>">
                      <a href="#" class="nav-link <?= $page == 'lam.php' || $page == 'lambilladd.php' || $page == 'lamcomadd.php' || $page == 'lambillpaid.php' ? 'active' : '' ?>">
                          <i class="nav-icon fas fa-copy"></i>
                          <p>
                              Lamination
                              <i class="fas fa-angle-left right"></i>
                              <span class="badge badge-info right">3</span>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">

                          <li class="nav-item">
                              <a href="lambillpaid.php" class="nav-link <?= $page == 'lambillpaid.php' ? 'active' : '' ?>">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Paid Laminatin Bill</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="lambilladd.php" class="nav-link <?= $page == 'lambilladd.php' ? 'active' : '' ?>">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Add Lamination Bill </p>
                              </a>
                          </li>

                          <li class="nav-item">
                              <a href="lamcomadd.php" class="nav-link <?= $page == 'lamcomadd.php' ? 'active' : '' ?>">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Lamination Companies</p>
                              </a>
                          </li>


                      </ul>
                  </li>

                  <!--Lamination bill statement end-->


                  <!--Accounce of Paper start-->
                  <li class="nav-item <?= $page == 'papercomadd.php' || $page == 'paperbilladd.php' || $page == 'paperbillpaid.php' || $page == 'paperbillpaid.php' || $page == 'paperbilldue.php' ? 'menu-open' : '' ?>">
                      <a href="#" class="nav-link <?= $page == 'papercomadd.php' || $page == 'paperbilladd.php' || $page == 'paperbillpaid.php' || $page == 'paperbillpaid.php' || $page == 'paperbilldue.php' ? 'active' : '' ?>">
                          <i class="nav-icon fas fa-copy"></i>
                          <p>
                              Accounce of Paper
                              <i class="fas fa-angle-left right"></i>
                              <span class="badge badge-info right">3</span>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="paperbilldue.php" class="nav-link <?= $page == 'paperbilldue.php' ? 'active' : '' ?>">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Due Paper Bill</p>
                              </a>
                          </li>

                          <li class="nav-item">
                              <a href="paperbillpaid.php" class="nav-link <?= $page == 'paperbillpaid.php' ? 'active' : '' ?>">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Paid Paper Bill</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="paperbilladd.php" class="nav-link <?= $page == 'paperbilladd.php' ? 'active' : '' ?>">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Add Paper Bill </p>
                              </a>
                          </li>

                          <li class="nav-item">
                              <a href="papercomadd.php" class="nav-link <?= $page == 'papercomadd.php' ? 'active' : '' ?>">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Paper Companies</p>
                              </a>
                          </li>


                      </ul>
                  </li>

                  <!--Accounce of Paper end-->



                  <!--Product start-->
                  <li class="nav-item <?= $page == 'productadd.php' ? 'menu-open' : '' ?>">
                      <a href="#" class="nav-link <?= $page == 'productadd.php' || $page == 'paperbilladd.php' || $page == 'paperbillpaid.php' || $page == 'paperbillpaid.php' || $page == 'paperbilldue.php' ? 'active' : '' ?>">
                          <i class="nav-icon fas fa-copy"></i>
                          <p>
                              Product
                              <i class="fas fa-angle-left right"></i>
                              <span class="badge badge-info right">3</span>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">


                          <li class="nav-item">
                              <a href="productadd.php" class="nav-link <?= $page == 'productadd.php' ? 'active' : '' ?>">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Add Product</p>
                              </a>
                          </li>





                      </ul>
                  </li>

                  <!--Product end-->

                  <li class="nav-item">
                      <a href="https://challan-55a85.web.app/createChallan" target=”_blank” class="nav-link">
                          <i class="nav-icon fas fa-id-card"></i>


                          <p>Challan generator</p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="https://docs.google.com/spreadsheets/d/1u0zVb_RWK6dEgFyk_LeD3pHM4Q00RPQ4q0PhcL62azc/edit?usp=sharing" target=”_blank” class="nav-link">

                          <i class="nav-icon fa-regular fa-hand-scissors"></i>
                          <p>Cutting Machine</p>
                      </a>
                  </li>

                  <li class="nav-item">
                      <a href="https://docs.google.com/spreadsheets/d/1ScuJHiC3Dz9Cg1X5-wz23pbmG51yscWKvw-0TWipvdg/edit#gid=592496777" target=”_blank” class="nav-link">

                          <i class="nav-icon fa-regular fa-square-full"></i>
                          <p>Pasting</p>
                      </a>
                      s
                  </li>


                  <li class="nav-header">Setting</li>
                  <li class="nav-item">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-user"></i>
                          <p>Admin Profile</p>
                      </a>
                  </li>

                  <li class="nav-item">
                      <a href="registered.php" class="nav-link">
                          <i class="nav-icon fas fa-users"></i>
                          <p>Registered User</p>
                      </a>
                  </li>

                  <li class="nav-item">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-edit"></i>
                          <p>Role for user</p>
                      </a>
                  </li>




              </ul>
          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>