            <div class="page-header">
                <div class="page-header-title">
                    <h4>Dashboard</h4>
                </div>
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index-2.html">
                                <i class="icofont icofont-home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Pages</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Dashboard</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="page-body">
            <?php 
            $type = $this->db->select('rolenm')->from('roles')->where(array('rid'=> $this->session->userdata('role')))->get()->row_array();
            $empid = $this->session->userdata('emp_id');
            $Role = $this->session->userdata('role');
            ?>
                <div class="row">
                <?php if( $type['rolenm'] == "Administrator" || $this->session->userdata('role') == 0){?>
                    <div class="col-md-12 col-xl-4">
                        <!-- table card start -->
                        <div class="card table-card">
                            <div class="">
                                <div class="row-table">
                                    <div class="col-sm-6 card-block-big br">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <i class="icofont icofont-eye-alt text-success"></i>
                                            </div>
                                            <div class="col-sm-8 text-center">
                                                <h5>
                                                <?php $query = $this->db->query('SELECT * FROM users');
                                                    echo $query->num_rows();?>
                                                </h5>
                                                <span>All Employees</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 card-block-big">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <i class="icofont icofont-ui-user text-danger"></i>
                                            </div>
                                            <div class="col-sm-8 text-center">
                                                <h5>
                                                <?php $query = $this->db->query("SELECT * FROM users where cid_type='TME'");
                                                    echo $query->num_rows();?>
                                                </h5>
                                                <span>TME</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="">
                                <div class="row-table">
                                    <div class="col-sm-6 card-block-big br">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <i class="icofont icofont-user text-info"></i>
                                            </div>
                                            <div class="col-sm-8 text-center">  
                                                <h5>
                                                <?php $query = $this->db->query("SELECT * FROM users where cid_type='ME'");
                                                    echo $query->num_rows();?>
                                                </h5>
                                                <span>ME</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 card-block-big">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <i class="icofont icofont-user text-warning"></i>
                                            </div>
                                            <div class="col-sm-8 text-center">
                                                <h5>
                                                <?php $query = $this->db->query("SELECT * FROM users where cid_type='HP'");
                                                    echo $query->num_rows();?>
                                                </h5>
                                                <span>HP</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- table card end -->
                    </div>
                    <div class="col-md-12 col-xl-4">
                        <!-- table card start -->
                        <div class="card table-card">
                            <div class="">
                                <div class="row-table">
                                    <div class="col-sm-6 card-block-big br">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div id="barchart" style="height:40px;width:40px;"></div>
                                            </div>
                                            <div class="col-sm-8 text-center">
                                                <h5>
                                                <?php $query = $this->db->query("SELECT * FROM campaign ");
                                                    echo $query->num_rows();?>
                                                </h5>
                                                </h5>
                                                <span>Campaigns</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 card-block-big">
                                        <div class="row ">
                                            <div class="col-sm-4">
                                                <i class="icofont icofont-network text-primary"></i>
                                            </div>
                                            <div class="col-sm-8 text-center">
                                                <h5>600</h5>
                                                <span>Network</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="">
                                <div class="row-table">
                                    <div class="col-sm-6 card-block-big br">
                                        <div class="row ">
                                            <div class="col-sm-4">
                                                <div id="barchart2" style="height:40px;width:40px;"></div>
                                            </div>
                                            <div class="col-sm-8 text-center">
                                                <h5>
                                                <?php $query = $this->db->query("SELECT * FROM leadmaster ");
                                                    echo $query->num_rows();?>
                                                </h5>
                                                </h5>
                                                <span>Leads</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 card-block-big">
                                        <div class="row ">
                                            <div class="col-sm-4">
                                                <i class="icofont icofont-network-tower text-primary"></i>
                                            </div>
                                            <div class="col-sm-8 text-center">
                                                <h5>100%</h5>
                                                <span>Connections</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- table card end -->
                    </div>
                    <div class="col-md-12 col-xl-4">
                        <!-- widget primary card start -->
                        <div class="card table-card widget-primary-card">
                            <div class="">
                                <div class="row-table">
                                    <div class="col-sm-3 card-block-big">
                                        <i class="icofont icofont-star"></i>
                                    </div>
                                    <div class="col-sm-9">
                                        <h4>1000 +</h4>
                                        <h6>Campaigns Completed</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- widget primary card end -->
                        <!-- widget-success-card start -->
                        <div class="card table-card widget-success-card">
                            <div class="">
                                <div class="row-table">
                                    <div class="col-sm-3 card-block-big">
                                        <i class="icofont icofont-trophy-alt"></i>
                                    </div>
                                    <div class="col-sm-9">
                                        <h4>150000+</h4>
                                        <h6>Leads Delivered</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- widget-success-card end -->
                    </div>
                    <?php } ?>
                    <?php if( $type['rolenm'] == "Team Member" || $this->session->userdata('role') == 4 || $this->session->userdata('role') == 5 || $this->session->userdata('role') == 6){?>
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card table-1-card">
                                    <div class="card-block">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr class="text-capitalize">
                                                        <th>Lead Added</th>
                                                        <!-- <th>User Name</th> -->
                                                        <!-- <th>Views</th> -->
                                                        <th>Lead Saved/Updated</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><a href="#!"><?php  $startdate =  date('Y-m-d 00:00:00');  $enddate =  date('Y-m-d H:i:s'); //'stdti >=', date('Y-m-d 00:00:00') 'stdti <=', date('Y-m-d H:i:s')
                                                        $query = $this->db->query("SELECT * FROM leadmaster where stagtidi = $empid AND  stdti >= current_timestamp - interval '1 day' ");
                                                        echo $query->num_rows();
                                                        ?></a>
                                                        </td>
                                                        <!-- <td><?php //echo $this->session -> userdata('username')?></td><td> -->
                                                        <td>
                                                        <?php 
                                                        $query = $this->db->query("SELECT * FROM leadmaster where stagtidi = $empid AND  svdti >= current_timestamp - interval '1 day'");
                                                        echo $query->num_rows();
                                                        ?>
                                                        </td>
                                                    </tr>
                                                   
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                         
                        </div>
                        
                    </div>
                    <?php } ?>
                    <div class="col-md-6 col-xl-3">
                        <div class="card social-widget-card">
                            <div class="card-block-big bg-facebook">
                                <h3>1165 +</h3>
                                <span class="m-t-10">Facebook Users</span>
                                <i class="icofont icofont-social-facebook"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3">
                        <div class="card social-widget-card">
                            <div class="card-block-big bg-twitter">
                                <h3>780 +</h3>
                                <span class="m-t-10">Twitter Users</span>
                                <i class="icofont icofont-social-twitter"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3">
                        <div class="card social-widget-card">
                            <div class="card-block-big bg-linkein">
                                <h3>998 +</h3>
                                <span class="m-t-10">Linked In Users</span>
                                <i class="icofont icofont-brand-linkedin"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3">
                        <div class="card social-widget-card">
                            <div class="card-block-big bg-google-plus">
                                <h3>650 +</h3>
                                <span class="m-t-10">Google Plus Users</span>
                                <i class="icofont icofont-social-google-plus"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
       