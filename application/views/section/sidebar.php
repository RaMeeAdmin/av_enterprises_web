 <aside class="main-sidebar">
  <section class="sidebar">
    <div class="user-panel">
            <!-- <div class="pull-left image">
              <img src="<//?php echo base_url() .'assets/dist/img/user2-160x160.jpg' ?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>Alexander Pierce</p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div> -->
         <!--  <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form> -->

          <ul class="sidebar-menu">
            <li class="active">
              <a href="<?php echo base_url() . 'dashboard' ?>">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
              </a>
            </li>
              <?php $user_type = $this->session->userdata('user_type');

if ($user_type == '1' || $user_type == '4') {
	?>


            <li>
              <a href="<?php echo base_url() . 'purchase' ?>">
                <i class="fa fa-user-plus"></i> <span>Po Generation</span>
              </a>
            </li>
         <li>
              <a href="<?php echo base_url() . 'deliver' ?>">
                <i class="fa fa-user-plus"></i> <span>So Generation</span>
              </a>

            </li>
            <?php
          }
$user_type = $this->session->userdata('user_type');
	if ($user_type == '2' || $user_type == '1') {?>
            <li>
              <a href="<?php echo base_url() . 'gate_entry_pass' ?>">
                <i class="fa fa-user-plus"></i> <span>Gate Pass</span>
              </a>
            </li>
          <?php }?>

     <?php
if ($user_type == '2' || $user_type == '1') {?>
             <li>
              <a href="<?php echo base_url() . 'transport_details' ?>">
                <i class="fa fa-user-plus"></i> <span>Delivery Challan</span>
              </a>
            </li>

          <?php }?>


  <?php $user_type = $this->session->userdata('user_type');
if ($user_type == '1' || $user_type == '3' || $user_type == '4') {?>
            <li>
              <a href="<?php echo base_url() . 'diesel_payments' ?>">
                <i class="fa fa-user-plus"></i> <span>Diesel Payments</span>
              </a>
            </li>
          <?php }?>

       <li>

              <a href="<?php echo base_url() . 'bagasse_sale' ?>">
                <i class="fa fa-user-plus"></i> <span>Bagasse Sale</span>
              </a>

            </li>
          <?php $user_type = $this->session->userdata('user_type');

if ($user_type == '1' || $user_type == '4') {?>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-pie-chart"></i>
                <span>Master</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li>
                  <a href="<?php echo base_url() . 'customer' ?>">
                    <i class="fa fa-user"></i> <span>Customer</span>
                  </a>
                </li>
                <li>
                  <a href="<?php echo base_url() . 'suppliers' ?>">
                    <i class="fa fa-users"></i> <span>Suppliers</span>
                  </a>
                </li>
                <li>
                  <a href="<?php echo base_url() . 'transporter' ?>">
                    <i class="fa fa-truck"></i> <span>Vehicle Owner</span>
                  </a>
                </li>
                <li>
                  <a href="<?php echo base_url() . 'material' ?>">
                    <i class="fa fa-bars"></i> <span>Material</span>
                  </a>
                </li>
                <li>
                  <a href="<?php echo base_url() . 'locations' ?>">
                    <i class="fa fa-map-marker"></i> <span>Locations</span>
                  </a>
                </li>
                <li>
                  <a href="<?php echo base_url() . 'petrol_pumps' ?>">
                    <i class="fa fa-bars"></i> <span>Petrol Pumps</span>
                  </a>
                </li>
                <li>
                  <a href="<?php echo base_url() . 'user' ?>">
                    <i class="fa fa-user-plus"></i> <span>Users</span>
                  </a>
                </li>
              </ul>
            </li>

          <?php }?>



  <?php $user_type = $this->session->userdata('user_type');
if ($user_type == '1' || $user_type == '3' || $user_type == '4') {?>
            <!-- <li>
              <a href="<?php echo base_url() . 'diesel_payments' ?>">
                <i class="fa fa-user-plus"></i> <span>Diesel Payments</span>
              </a>
            </li> -->
             <li>
              <a href="<?php echo base_url() . 'receipts_payment' ?>">
                <i class="fa fa-user-plus"></i> <span>Vendor Payment</span>
              </a>
            </li>
          <?php }?>

          </ul>
        </div>
        </section>
        <!-- /.sidebar -->
      </aside>