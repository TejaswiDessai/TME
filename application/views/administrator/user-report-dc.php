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

    /* .table1 tr td:first-child:before
    {
        content: "" counter(Serial);
        counter-increment: Serial;      /* Increment the Serial counter */
    
    } */
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
                            <table style="margin-bottom:10px;">
                            <tr>
                            <td>
                                <select class="form-control form-control-default "  name="campid" id="campid">
                                    <option value="">Campaign</option>
                                    <?php foreach ($campaigns as $campaign): ?>
                                        <option value="<?php echo $campaign['cids']; ?>" <?php if( isset($Campid) && $Campid == $campaign['cids']) { echo "selected" ; } ?>><?php echo $campaign['campnm']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                            <td>
                                <select class="form-control form-control-default "  name="user_id" id="user_id">
                                    <option value="">User</option>
                                    <?php foreach ($users_name as $user): ?>
                                        <option value="<?php echo $user['empcode']; ?>" <?php if( isset($user_id) && $user_id == $user['empcode'] ) { echo "selected" ; } ?>><?php echo $user['fname']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                            <td>
                                <select class="form-control form-control-default "  name="stage" id="stage">
                                    <option value="">Data Collection</option>
                                   
                                    <!-- <option value="datacollect" <?php// if( isset($Stage) && $Stage == "datacollect") { echo "selected" ; } ?>>Data Collection</option> -->
                                    <option value="verified" <?php if( isset($Stage) && $Stage == "verified") { echo "selected" ; } ?>>Data Verified</option>
                                  
                                    
                                    <!-- <option value="All">All</option> -->

                                    <!-- <?php //foreach ($users as $campaign): ?>
                                        <option value="<?php //echo $campaign['emp_id']; ?>"><?php //echo $campaign['fname']; ?></option>
                                    <?php //endforeach; ?> -->
                                </select>
                            </td>
                            <td>
                            From: </td><td><input class="form-control" type="datetime-local" value="<?php if(isset($From)){ echo $From;}?>" name="from"  id="example-datetime-local-input">
                            </td>
                            <td>
                            To: </td><td><input class="form-control" type="datetime-local"  value="<?php if(isset($To)){ echo $To;}?>"  name="to" id="example-datetime-local-input1">
                            </td>
                            <td>
                                <input  class="btn btn-primary" type="submit" name="submit">
                            </td>
                            <td>
                                <a class="btn btn-primary" href="">Refresh</a>
                            </td>
                            </tr>
                            </table>
                            </form>
                       
                    </div>
                    <br>
                        <?php if (isset($Stage) && $Stage == "verified")
                        {
                            $display  = "visibility: hidden;";
                        }else{
                            $display  = "visibility: visible;"; 
                        }

                        ?>
                        <div class="table-responsive dt-responsive">
                            <table id="dom-jqry" class="table table-striped table-bordered nowrap table1">
                                <thead>
                                    <tr>
                                        <!-- <th>S.no</th> -->
                                        <!-- <th>Date</th> -->
                                        <!-- <th>Image</th> -->
                                        <th>Username</th>
                                        <!-- <th>Campaign Name</th> -->
                                        <th>No. Of Records</th>
                                        <?php //if (isset($Stage) && $Stage == "datacollect" ||$Stage == "")
                                        //{ ?>
                                        <!-- <th>Submit & Saved</th> -->
                                      <?php // } ?>
                                        <th>1st SUBMIT</th>
                                        <th>2nd SUBMIT</th>
                                        <!-- <th>Pending</th>
                                        <th>Verified</th>
                                        <th>Rejection</th>
                                        <th>Accepted</th> -->
                                    </tr>
                                </thead>
                                <tbody >
                                <?php foreach($users as $post) : ?>
                                 <tr>
                                        <!-- <td></td> -->
                                        <!-- <td><?php //echo date("M d,Y", strtotime($post['last_login'])); ?></td> -->
                                        <td><a href=""><?php echo $post['fname']; ?></a></td>
                                        <!-- <td> -->
                                            <?php
                                        // echo $campaign['campnm'];
                                        // echo $campnam = $this->Administrator_Model->get_camp_name($post['emp_id']);
                                        ?>
                                        <!-- </td> -->
                                        <td><?php 
                                        $submit1_total = $this->db->query("SELECT * FROM leadmaster where cids = '".$Campid."' and stagtidi = '".$post['empcode']."' and (stdti >= '".$From."' and stdti <= '".$To."')");
                                        $submit1 = $submit1_total->num_rows();
                                        $submit2_total = $this->db->query("SELECT * FROM leadmaster where cids = '".$Campid."' and stagtidii = '".$post['empcode']."' and (stdti >= '".$From."' and stdti <= '".$To."')");
                                        echo $submit1 + $submit2_total->num_rows();

                                    //    if(isset($Stage) && $Stage == "verified"){
                                    //     $t=$post['numbers'];
                                    //    }else{
                                    //     $t=$post['numbers'] + $post['savednumbers'];
                                       
                                    //    }
                                    //    echo   $t;
                                        // echo "Total: ".$post['numbers'] + $post['savednumbers'];
                                        // $query = $this->db->query("SELECT * FROM leadmaster where stagtidi = '".$post['emp_id']."'");
                                        // echo $query->num_rows();

                                        ?>
                                        </td>
                                        <td>
                                        <?php 
                                        // echo $From;
                                        $submit1_total = $this->db->query("SELECT * FROM leadmaster where cids = '".$Campid."' and stagtidi = '".$post['empcode']."' and (stdti >= '".$From."' and stdti <= '".$To."') ");
                                        // echo "<center><b>Total: </b>".$submit1 = $submit1_total->num_rows();
                                        // echo "<br>";
                                        $total_accept = $this->db->query("select * from leadmaster
                                        where ontag = 1
                                        and rlc = 0
                                        and pload = 0
                                        and dvagtidi is not null
                                        and dvragtidi is null
                                        and (dvsbtg = 0 OR dvsbtg = 1 OR dvsbtg = 2)
                                        and dvload = 1 and cids = '".$Campid."' and stagtidi = '".$post['empcode']."' 
                                        and (stdti >= '".$From."' and stdti <= '".$To."')");
                                        //echo "Accepted: ".$total_accept->num_rows()."<br>";
                                        $dc_pending_frej = $this->db->query("select * from leadmaster
                                          where 
                                          
                                           
                                          
                                           dvragtidi is not null
                                          
                                           and cids = '".$Campid."' and stagtidi = '".$post['empcode']."'
                                          and (stdti >= '".$From."' and stdti <= '".$To."')");
                                        
                                        // $saved = $this->db->query("SELECT * FROM public.leadmaster
                                        //  where 
                                        // --  svagtidi is not null
                                        // dvload = 0
                                        // --   and sbsvtag = 0 
                                        //  and cids = '".$Campid."' and stagtidi = '".$post['empcode']."'
                                        //  and (dvrejtg = 1 OR dvrejtg = 2 OR dvrejtg = 3 )
                                        //  and sbsvtag = 0
                                        //  and (stdti >= '".$From."' and stdti <= '".$To."')
                                        // --  group by svagtidi,lmid
                                        
                                        //  ");
                                        $AR = $total_accept->num_rows() + $dc_pending_frej->num_rows();
                                        $saved = $submit1_total->num_rows() - $AR;
                                        ?>
                                        <table>
                                            <tr>
                                                <th>Total</th>
                                                <th>Accepted</th>
                                                <th>Rejected</th>
                                                <th>Saved/Pending</th>
                                    </tr>
                                    <tr>
                                        <td><?php echo $submit1 = $submit1_total->num_rows();?></td>
                                        <td><?php echo $total_accept->num_rows()."<br>";?></td>
                                        <td><?php echo $freject = $dc_pending_frej->num_rows()."<br>";?></td>
                                        <td><?php echo $saved ;//$saved->num_rows(); ?></td>
                                    </tr>
                                    </table>
                                        </td>
                                        <td>
                                            <?php
                                        $submit2_total = $this->db->query("SELECT * FROM leadmaster where cids = '".$Campid."' and stagtidii = '".$post['empcode']."' and (stdti >= '".$From."' and stdti <= '".$To."')");
                                        // echo "<center><b>Total: </b>".$submit2_total->num_rows();
                                        $total_accept2 = $this->db->query("select * from leadmaster
                                        where ontag = 1
                                        and rlc = 0
                                        and pload = 0
                                        and (dvsbtg = 0 OR dvsbtg = 1 OR dvsbtg = 2)
                                        and dvload = 1 and cids = '".$Campid."' and stagtidii = '".$post['empcode']."' 
                                        and (stdti >= '".$From."' and stdti <= '".$To."')");
                                        //echo "Accepted: ".$total_accept->num_rows()."<br>";
                                        $dc_pending_frej2 = $this->db->query("select * from leadmaster
                                          where 
                                          rlc = 0
                                          and ontag = 0
                                          and dvrejtg = 2
                                          and sbsvtag != 0 
                                          and dvload = 0 and cids = '".$Campid."' and stagtidii = '".$post['empcode']."'
                                          and (stdti >= '".$From."' and stdti <= '".$To."')");
                                        
                                        // $saved = $this->db->query("SELECT * FROM public.leadmaster
                                        //  where 
                                        // --  svagtidi is not null
                                        // dvload = 0
                                        // --   and sbsvtag = 0 
                                        //  and cids = '".$Campid."' and stagtidii = '".$post['empcode']."'
                                        //  and dvrejtg = 3
                                        //  and sbsvtag <>0
                                        //  and (stdti >= '".$From."' and stdti <= '".$To."')
                                        // --  group by svagtidi,lmid
                                        
                                        //  ");
                                         
                                        $AR2 = $total_accept2->num_rows() + $dc_pending_frej2->num_rows();
                                        $saved2 = $submit2_total->num_rows() - $AR2;

                                        ?>
                                        <table>
                                            <tr>
                                                <th>Total</th>
                                                <th>Accepted</th>
                                                <th>Rejected</th>
                                                <th>Saved/Pending</th>
                                    </tr>
                                    <tr>
                                        <td><?php echo $submit2_total->num_rows();?></td>
                                        <td><?php echo $total_accept2->num_rows()."<br>";?></td>
                                        <td><?php echo $freject = $dc_pending_frej2->num_rows()."<br>";?></td>
                                        <td><?php echo $saved2;//$saved->num_rows(); ?></td>
                                    </tr>
                                    </table>
                                    
                                        </td>
                                         <?php //if (isset($Stage) && $Stage == "datacollect" ||$Stage == "")
                                        //{ ?>
                                        <!-- <td> -->
                                            <?php  
                                         //echo "Submited: ".$post['numbers']."<br>";
                                         //echo "Saved: ".$post['savednumbers']; ?>
                                         <!-- </td> -->
                                      <?php  //} ?>
                                         <!-- <td><?php //echo $post['pending']; ?></td> -->
                                         <!-- <td><?php //echo $post['numberveri']; ?></td> -->
                                        <!-- <td> -->
                                        <?php //echo $post['rejected']; ?>
                                        <!-- </td> -->

                                        <!-- <td> -->
                                        <?php  //echo $post['accepted']; ?>
                                        <!-- </td> -->
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

  