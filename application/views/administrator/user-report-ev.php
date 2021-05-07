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
                    <h4>Email Verification Report</h4>
                </div>
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index-2.html">
                                <i class="icofont icofont-home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Report</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Email Verification Report</a>
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
                        <form action="<?php echo base_url();?>administrator/user_report_ev" method="post" >
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
                                        <th>S.no</th>
                                        <!-- <th>Date</th> -->
                                        <!-- <th>Image</th> -->
                                        <th>Username</th>
                                        <th>Total EV(Original Email)</th>
                                        <th>Total EV(with Trail Format)</th>
                                        <th>EV Open</th>
                                        <th>EV Accepted</th>
                                        <th>EV Rejected</th>
                                    </tr>
                                </thead>
                                <tbody >
                                <?php foreach($users as $post) : ?>
                                 <tr>
                                        <td></td>
                                        
                                        <td><a href=""><?php echo $post['fname']; ?></a></td>
                                        
                                        <td><?php 
                                       $ev_done = $this->db->query("select * from ev
                                       left join leadmaster ON ev.lmid=leadmaster.lmid
                                       and  ev.email=leadmaster.email
                                       where 
                                       ev.evagnt = '".$post['empcode']."'
                                       and leadmaster.cids = '".$Campid."'
                                       and (statdt >= '".$From."' and statdt <= '".$To."')
                                        ");
                                       echo $ev_done->num_rows();
                                        // echo "Total: ".$post['numbers'] + $post['savednumbers'];
                                        // $query = $this->db->query("SELECT * FROM leadmaster where stagtidi = '".$post['emp_id']."'");
                                        // echo $query->num_rows();

                                        ?></td>

                                        <td><?php 
                                       $ev_done = $this->db->query("select * from ev
                                       left join leadmaster ON ev.lmid=leadmaster.lmid
                                       where 
                                       ev.evagnt = '".$post['empcode']."'
                                       and leadmaster.cids = '".$Campid."'
                                       and (statdt >= '".$From."' and statdt <= '".$To."')
                                        ");
                                       echo $ev_done->num_rows();
                                        // echo "Total: ".$post['numbers'] + $post['savednumbers'];
                                        // $query = $this->db->query("SELECT * FROM leadmaster where stagtidi = '".$post['emp_id']."'");
                                        // echo $query->num_rows();

                                        ?></td>
                                         
                                         <td><?php 
                                         $ev_open = $this->db->query("select * from ev
                                         left join leadmaster ON ev.lmid=leadmaster.lmid 
                                         where
                                         ev.closer_status = 'Open'
                                         and ev.curr_active = 1
                                         and ev.evagnt = '".$post['empcode']."'
                                         and leadmaster.cids = '".$Campid."'
                                         and (statdt >= '".$From."' and statdt <= '".$To."')
                                         ");
                                         echo $ev_open->num_rows();
                                         ?></td>
                                         <td><?php 
                                         $ev_closed = $this->db->query("select * from ev
                                         left join leadmaster ON ev.lmid=leadmaster.lmid
                                         where 
                                         ev.closer_status = 'Closed'
                                         and (ev.status = 'Accepted' or ev.status = 'Confirmed' or ev.status = 'Out of Office')
                                         and leadmaster.cids = '".$Campid."'
                                         and ev.evagnt = '".$post['empcode']."'
                                         and (statdt >= '".$From."' and statdt <= '".$To."')
                                         ");
                                         echo $ev_closed->num_rows();
                                         ?></td>
                                         <td><?php 
                                         $ev_closed_rej = $this->db->query("select * from ev
                                         left join leadmaster ON ev.lmid=leadmaster.lmid
                                         where 
                                         ev.closer_status = 'Closed'
                                         and (ev.status != 'Accepted' AND ev.status != 'Confirmed' AND ev.status != 'Out of Office')
                                         and leadmaster.cids = '".$Campid."'
                                         and ev.evagnt = '".$post['empcode']."'
                                         and (statdt >= '".$From."' and statdt <= '".$To."')
                                         ");
                                         echo $ev_closed_rej->num_rows();
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

  