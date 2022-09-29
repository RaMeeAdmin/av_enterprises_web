<?php $this->load->view('section/header');?>
<?php $this->load->view('section/sidebar');?>
      <div class="content-wrapper">
        <section class="content-header">
          <h1>
            Dashboard
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>

        <section class="content1" style="padding:15px">
           <div class="row">
            <div class="col-lg-3 col-xs-6">
             <div class="small-box bg-aqua">
                <div class="inner">
                  <h4><?php echo $purchase[0]['gtotal'] - $transport_details['weight_dispatch'] ?></h4>
                  <p>Available Stock (In Tonne)</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="<?php echo base_url() . 'purchase' ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <div class="col-lg-3 col-xs-6">
              <div class="small-box bg-green">
                <div class="inner">
                  <h4><?php echo $sale[0]['stotal'] - $transport_details['weight_dispatch'] ?></h4>
                  <p>Sales Order (In Tonne)</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="<?php echo base_url() . 'deliver' ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <div class="col-lg-3 col-xs-6">
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h4><?php echo 0 + $transport_details['weight_dispatch'] ?></h4>
                  <p>Total Sale (In Rs)</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <div class="col-lg-3 col-xs-6">
             <div class="small-box bg-red">
                <div class="inner">
                  <h4>0</h4>
                  <p>Amount Receivable</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
          </div>
        </section>
         <section class="content">
           <div class="row">
            <div class="col-lg-3 col-xs-6">
             <div class="small-box bg-aqua">
                <div class="inner">
                  <h4>0</h4>
                  <p>Vehicle Payment Due</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
          </div>
        </section>
      </div>
      <?php $this->load->view('section/footer');?>