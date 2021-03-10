<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admintemplate/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admintemplate/assets/pages/data-table/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admintemplate/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admintemplate/bower_components/ekko-lightbox/dist/ekko-lightbox.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admintemplate/bower_components/lightbox2/dist/css/lightbox.css">
    <style>
    body
    {
        counter-reset: Serial;  
    }
    .table1
    {
        border-collapse: separate;
        height: 10px; overflow-y: auto; overflow-x: hidden;
    }

    .table1 tr td:first-child:before
    {
        content: "" counter(Serial);
        counter-increment: Serial;      /* Increment the Serial counter */
    
    }
    </style>
    <script type="text/javascript">
    $(document).ready(function(){
            $(".delete").click(function(e){ alert('as');
                $this  = $(this);
                e.preventDefault();
                var url = $(this).attr("href");
                $.get(url, function(r){
                    if(r.success){
                        $this.closest("tr").remove();
                    }
                })
            });
        });
    $(document).ready(function(){
        $(".enable").click(function(e){
            $this  = $(this);
            e.preventDefault();
            var url = $(this).attr("href");
            $.get(url, function(r){
                if(r){
                    $this.closest("td").html("<button class='label label-inverse-warning desable'>Deactive</button>");
                }
            })
        });
    });
    $(document).ready(function(){
        $(".desable").click(function(e){ 
            $this  = $(this);
            e.preventDefault();
            var url = $(this).attr("href");
            $.get(url, function(r){
                if(r){
                    $this.closest("td").html("<button class='label label-inverse-primary enable'>Active</button>");
                }
            })
        });
    });
    </script>



            <div class="page-header">
                <div class="page-header-title">
                    <h4>List Users</h4>
                </div>
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index-2.html">
                                <i class="icofont icofont-home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Users</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">List Users</a>
                        </li>
                    </ul>
                </div>
            </div>
           
            <!-- Page-header end -->
            <!-- Page-body start -->
            <div class="page-body">
                <!-- DOM/Jquery table start -->
               
                <div class="card">
                    <div class="card-block">
                        <form action="<?php echo base_url();?>administrator/user_report" method="post" >
                        <table>
                            <tr>
                            <td>
                                <a class="btn btn-primary" href="">Refresh</a>
                            </td>
                            </tr>
                            </table>
                            </form>
                       
                    </div>
                    <br>

                        <div class="table-responsive dt-responsive">
                            <table id="dom-jqry" class="table table-striped table-bordered nowrap table1">
                                <thead>
                                    <tr>
                                        <th>S.no</th>
                                        <!-- <th>Date</th> -->
                                        <!-- <th>Image</th> -->
                                        <!-- <th>Username</th> -->
                                        <th>Campaign Name</th>
                                        <th>Total Records</th>
                                        <th>DC Pending</th>
                                        <th>DV Pending</th>
                                        <th>Saved</th>
                                        <th>Total Accepted</th>
                                        <th>1st Accept</th>
                                        <th>2nd Accept</th>
                                        <th>3rd Accept</th>
                                    </tr>
                                </thead>
                                <tbody >
                                <?php foreach($users as $post) : ?>
                                 <tr>
                                        <td></td>
                                        <!-- <td><?php //echo date("M d,Y", strtotime($post['last_login'])); ?></td> -->
                                        <!-- <td><a href=""><?php //echo $post['fname']; ?></a></td> -->
                                        <td><?php
                                        echo $post['campnm'];
                                        // echo $campnam = $this->Administrator_Model->get_camp_name($post['emp_id']);
                                        ?></td>
                                        <td><?php 
                                        // echo $post['cids'];
                                        $total = $this->db->query("SELECT * FROM leadmaster where cids = '".$post['cids']."'");
                                        echo $total->num_rows();

                                        ?></td>
                                         <td><?php 
                                         $dc_pending = $this->db->query("select * from leadmaster
                                         where ontag = 1
                                         and rlc = 0
                                         and pload = 0
                                         and dvload = 0
                                         and sbsvtag <>0
                                         and sbsvtag <6 and cids = '".$post['cids']."'");
                                         echo $dc_pending->num_rows();
                                         //echo $post['pending']; ?></td>
                                         <td><?php 
                                         $dv_pending = $this->db->query("select * from leadmaster
                                         where ontag = 0 
                                         and rlc = 0
                                         and pload = 1
                                         and dvload = 0
                                         and dvrejtg =0
                                         and dvsbtg =0
                                         and sbsvtag <>0
                                         and sbsvtag <6 and cids = '".$post['cids']."'");
                                         echo $dv_pending->num_rows();
                                          ?></td>
                                          <td>
                                          <?php 
                                         $saved = $this->db->query("SELECT * FROM public.leadmaster
                                         where 
                                        --  svagtidi is not null
                                        dvload = 0
                                         and sbsvtag < 6 and cids = '".$post['cids']."'
                                         group by svagtidi,lmid
                                        
                                         ");
                                         echo $saved->num_rows();
                                          ?>
                                        </td>
                                         <td><?php 
                                        $total_accept = $this->db->query("select * from leadmaster
                                        where ontag = 1
                                        and rlc = 0
                                        and pload = 0
                                        and (dvsbtg = 0 OR dvsbtg = 1 OR dvsbtg = 2)
                                        and dvload = 1 and cids = '".$post['cids']."'");
                                        echo $total_accept->num_rows();

                                         //echo $post['numberveri']; ?></td>
                                        <!-- <td> -->
                                        <td><?php 
                                         $first_accept = $this->db->query("select * from leadmaster
                                         where ontag = 1
                                         and rlc = 0
                                         and pload = 0
                                         and dvsbtg = 1
                                         and dvload = 1 and cids = '".$post['cids']."'");
                                         echo $first_accept->num_rows();
                                          ?></td>
                                        <!-- </td> -->
                                        
                                          <td><?php 
                                         $second_accept = $this->db->query("select * from leadmaster
                                         where ontag = 1
                                         and rlc = 0
                                         and pload = 0
                                         and dvsbtg = 2
                                         and dvload = 1 and cids = '".$post['cids']."'");
                                         echo $second_accept->num_rows();
                                          ?></td>
                                        <!-- </td> -->
                                        <td><?php 
                                         $third_accept = $this->db->query("select * from leadmaster
                                         where ontag = 1
                                         and rlc = 0
                                         and pload = 0
                                         and dvsbtg = 3
                                         and dvload = 1 and cids = '".$post['cids']."'");
                                         echo $third_accept->num_rows();
                                         ?></td>
                                    </tr>
                                <?php endforeach; ?>

                                <!-- <div class="paginate-link">
                                    <?php //echo $this->pagination->create_links(); ?>
                                </div>  -->

                                 </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- DOM/Jquery table end -->
            </div>

  