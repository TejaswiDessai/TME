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
                    <h4>Campaign Report</h4>
                </div>
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index-2.html">
                                <i class="icofont icofont-home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Campaign</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Campaign Report</a>
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
                        <form action="<?php echo base_url();?>administrator/campaign_report" method="post" >
                        <table>
                            <tr>
                                <td>
                                <select class="form-control form-control-default "  name="campaign_status" id="campaign_status">
                                    <option value="">Campaign Status</option>
                                    <option value="1" <?php if( isset($campaign_status) && $campaign_status == "1") { echo "selected" ; } ?>>Closed</option>
                                    <option value="2" <?php if( isset($campaign_status) && $campaign_status == "2") { echo "selected" ; } ?> selected>Open</option>
                                    <option value="3" <?php if( isset($campaign_status) && $campaign_status == "3") { echo "selected" ; } ?>>On Hold</option>
                                </select>
                                </td>
                                <td>
                                <input type="submit" class="btn btn-primary" value="Search">
                                </td>
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
                                        <th>DC Locked</th>
                                        <th>DV Pending</th>
                                        <th>DV Locked</th>
                                        <th>Saved</th>
                                        <th>Total Accepted</th>
                                        <th>1st Accept</th>
                                        <th>2nd Accept</th>
                                        <th>Total EV</th>
                                        <th>EV Pending</th>
                                        <th>EV InProccess</th>
                                        <th>EV Done</th>
                                        <th>CDC Pending</th>
                                        <th>CDC Total Accept</th>
                                        <th>CDC Reject</th>
                                        <th>QA Pending</th>
                                        <th>QA Accept- Qualified</th>
                                        <th>QA Accept- Dis-Qualified</th>
                                        <th>QA Reject- Dis-Qualified</th>
                                        
                                        <th>QA Sent to Lead</th>
                                        <th>LS Pending</th>
                                        <th>Ready To Deliver</th>
                                        <th>Delivered</th>
                                        <!-- <th>DC Pending with 1st Reject</th> -->
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
                                        //  $dc_pending_frej = $this->db->query("select * from leadmaster
                                        //  where 
                                        //  rlc = 0
                                        //  and ontag = 0
                                        //  and dvrejtg = 1
                                        //  and sbsvtag != 0 
                                        //  and dvload = 0 and cids = '".$post['cids']."'");
                                        //  $freject = $dc_pending_frej->num_rows();
                                        $freject = 0;
                                         $dc_pending = $this->db->query("select * from leadmaster
                                         where 
                                         rlc = 0
                                         and ontag = 1
                                         and pload = 0
                                         and dvload = 0
                                         and (dvrejtg = 0 or dvrejtg = 1 or dvrejtg = 2)
                                         and sbsvtag <>0
                                        and cids = '".$post['cids']."'");
                                         echo $freject + $dc_pending->num_rows();
                                         //echo $post['pending']; ?></td>
                                         <td>
                                         <?php
                                          $locked = $this->db->query("SELECT * FROM public.leadmaster
                                          where 
                                         --  svagtidi is not null
                                         rlc = 1
                                           and ontag = 1
                                          and cids = '".$post['cids']."'
                                         --  group by svagtidi,lmid
                                         
                                          ");
                                          echo $locked->num_rows();
                                         ?>
                                         </td>
                                         <td><?php 
                                         $dv_pending = $this->db->query("select * from leadmaster
                                         where ontag = 0 
                                         and rlc = 0
                                         and pload = 1
                                         and dvload = 0
                                        
                                         and dvsbtg =0
                                         and sbsvtag <>0
                                         and sbsvtag <6 and cids = '".$post['cids']."'");
                                         echo $dv_pending->num_rows();
                                          ?></td>
                                          <td>
                                          <?php 
                                          $dvlocked = $this->db->query("SELECT * FROM public.leadmaster
                                          where 
                                         --  svagtidi is not null
                                         rlc = 1
                                           and pload = 1
                                          and cids = '".$post['cids']."'
                                         --  group by svagtidi,lmid
                                         
                                          ");
                                          echo $dvlocked->num_rows();
                                         
                                          ?>
                                        </td>
                                          <td>
                                          <?php 
                                         $saved = $this->db->query("SELECT * FROM public.leadmaster
                                         where 
                                        --  svagtidi is not null
                                        dvload = 0
                                          and sbsvtag = 0 
                                         and cids = '".$post['cids']."'
                                        --  group by svagtidi,lmid
                                        
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
                                        <td>
                                        <?php 
                                       $total_accept1 = $this->db->query("select * from leadmaster
                                       where ontag = 1
                                       and rlc = 0
                                       and pload = 0
                                       and (dvsbtg = 0 OR dvsbtg = 1 OR dvsbtg = 2)
                                       and dvload = 1 and cids = '".$post['cids']."'");
                                       echo $total_accept1->num_rows();
                                       ?>
                                       </td>
                                       <td>
                                        <?php 
                                         $ev_pending = $this->db->query("select * from leadmaster
                                         where 
                                         rlc != 1
                                         and dvload = 1
                                         and sbsvtag != 0
                                         and evcomp is NULL
                                         and cids = '".$post['cids']."'");
                                         echo $ev_pending->num_rows();
                                         ?>
                                        </td>
                                        <td>
                                        <?php 
                                         $ev_inproccess = $this->db->query("select * from ev
                                         left join leadmaster ON ev.lmid=leadmaster.lmid 
                                         where
                                         ev.closer_status = 'Open'
                                         and ev.curr_active = 1
                                
                                         and leadmaster.cids = '".$post['cids']."'
                                         
                                         ");
                                        
                                         echo $ev_inproccess->num_rows();
                                         ?>
                                        </td>
                                        <td>
                                        <?php 
                                         $ev_done = $this->db->query("select * from leadmaster
                                         where 
                                         rlc != 1
                                         and evload = 1
                                         and evdisp = 4
                                         and evcomp = 1
                                         and cdcsb = 0
                                         and cdcrjt = 0
                                         and cids = '".$post['cids']."'");
                                         echo $ev_done->num_rows();
                                         ?>
                                        </td>
                                        <td>
                                            <?php 
                                         $cdc_pending = $this->db->query("select * from leadmaster
                                         where 
                                         rlc != 1
                                         and evload = 1
                                         and sbsvtag != 0
                                         and cdcsb < 4
                                         and cdcrjt < 4
                                         and cdcsv is NULL
                                         and qasv is NULL
                                         and cdcload is NULL
                                         and qaload is NULL
                                         and cids = '".$post['cids']."'");
                                         echo $cdc_pending->num_rows();
                                         ?>
                                         </td>
                                        <td>
                                            <?php 
                                         $cdc_first_accept = $this->db->query("select * from leadmaster
                                         where 
                                         rlc = 0
                                        
                                         and evload = 1
                                         and ontag = 1
                                         and dvcomt = '1' 
                                         and cdcsb >= 1
                                         and cdcsbagti is not null
                                         and cids = '".$post['cids']."'");
                                         $cdcfirstA = $cdc_first_accept->num_rows();
                                         $cdc_second_accept = $this->db->query("select * from leadmaster
                                         where 
                                         rlc = 0
                                         
                                         and evload = 1
                                         and ontag = 1
                                         and dvcomt = '1' 
                                         and cdcsb >= 1
                                         
                                         and cdcsbagtii is not null
                                         and cids = '".$post['cids']."'");
                                         $cdcsecondA = $cdc_second_accept->num_rows();
                                         echo $cdctotal = $cdcfirstA + $cdcsecondA;
                                         ?>
                                         </td>
                                         <td>
                                            <?php 
                                         $cdc_reject = $this->db->query("select * from leadmaster
                                         where 
                                         dvcomt = '1' 
                                         and cdcrjt >= 1
                                         and rlc = 0
                                         and cdcrjt >= 1
                                         and cdcload is NULL
                                         and evload is NULL
                                         and ontag = 1
                                         and (cdcrjtagti is not null OR cdcrjtagti is not null)
                                         and cids = '".$post['cids']."'");
                                         echo $cdc_reject->num_rows();
                                         ?>
                                         </td>
                                         <td>
                                            <?php 
                                         $qa_pending = $this->db->query("select * from leadmaster
                                         where 
                                         rlc != 1
                                         and cdcsb < 4
                                         and cdcrjt < 4
                                         and sbsvtag != 0
                                         and cdcsv is NULL
                                         and qasv is NULL
                                         and cdcload = 1
                                         and qaload is NULL
                                         and lsload is NULL
                                         and cids = '".$post['cids']."'");
                                         echo $qa_pending->num_rows();
                                         ?>
                                         </td>
                                         <td>
                                            <?php 
                                         $qa_accept_qualify = $this->db->query("select * from leadmaster
                                         where 
                                         rlc = 0
                                         and qaacpt = 1
                                         and qastat = 'qualified'
                                         and evload = 1
                                         and qaload = 1
                                         and evload = 1
                                         and cids = '".$post['cids']."'");
                                         echo $qa_accept_qualify->num_rows();
                                         ?>
                                         </td>
                                         <td>
                                            <?php 
                                         $qa_accept_disqualify = $this->db->query("select * from leadmaster
                                         where 
                                         rlc = 0
                                         and qaacpt = 1
                                         and qastat = 'disqualified'
                                         and evload = 1
                                         
                                         and qasv = 0
                                         and cids = '".$post['cids']."'");
                                         echo $qa_accept_disqualify->num_rows();
                                         ?>
                                         </td>
                                         <td>
                                            <?php 
                                         $qa_reject = $this->db->query("select * from leadmaster
                                         where 
                                         rlc = 0
                                         and evload = 1
                                         and qasv = 0
                                         and cdcload is NULL
                                         and qastat = 'disqualified'
                                         and qarej = 1
                                         and cids = '".$post['cids']."'");
                                         echo $qa_reject->num_rows();
                                         ?>
                                         </td>
                                         
                                         <td>
                                            <?php 
                                         $qa_sent_to_lead = $this->db->query("select * from leadmaster
                                         where 
                                         rlc = 0
                                         and qaacpt = 1
                                         and qalsload = 1
                                         and cids = '".$post['cids']."'");
                                         echo $qa_sent_to_lead->num_rows();
                                         ?>
                                         </td>
                                         <td>
                                            <?php 
                                         $ls_pending = $this->db->query("select * from leadmaster
                                         where 
                                         rlc = 0
                                         and qaacpt = 1
                                         and qalsload = 1
                                         and lsagent is NULL
                                         and cids = '".$post['cids']."'");
                                         echo $ls_pending->num_rows();
                                         //"qalsload = 1  and lsagent is NULL" is added by Tejaswi?> 
                                         </td>
                                         <td>
                                            <?php 
                                         $ready_to_deliver = $this->db->query("select * from leadmaster
                                            where 
                                            qaload = 1
                                            and qaacpt = 1
                                            and qastat = 'qualified'
                                            and evload = 1
                                            and (dytg = 0 OR dytg is null)
                                            and cdcsb <=4 
			                                and cdcrjt <=4
                                         and cids = '".$post['cids']."'");
                                         echo $ready_to_deliver->num_rows();
                                         ?>
                                         </td>
                                         <td>
                                            <?php 
                                         $delivered = $this->db->query("select * from leadmaster
                                         where 
                                         
                                         dytg = 1
                                         
                                         and cids = '".$post['cids']."'");
                                         echo $delivered->num_rows();
                                         ?>
                                         </td>
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

  