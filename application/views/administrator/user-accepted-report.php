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
    .dataTables_filter {
    display: none;
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
                    <h4>Lead accepted reports</h4>
                </div>
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="<?php echo base_url();?>administrator/dashboard ">
                                <i class="icofont icofont-home"></i>
                            </a>
                        </li>
                      
                        <li class="breadcrumb-item"><a href="#!">Lead accepted reports </a>
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
                        <form action="<?php echo base_url();?>cdc/user_accpeted_report" method="post" >
                            <table style="margin-bottom:10px;">
                            <tr>
                            <td>
                                
                            </td>
                           
                          
                            <td>
                            <div>
                                <select class="form-control form-control-sm"  name="intervaldiff" id="intervaldiff">
                                    <!-- <option value="14"<?php if( isset($intervaldiff) && $intervaldiff == "14") { echo "selected" ; } ?>>Select Days</option> -->
                                    <option value="14" <?php if( isset($intervaldiff) && $intervaldiff == "14") { echo "selected" ; } ?>><?php echo date('d/m',strtotime("- 14 days"));?> - <?php echo date('d/m',strtotime("- 0 days"));?></option>
                                            <option value="28" <?php if( isset($intervaldiff) && $intervaldiff == "28") { echo "selected" ; } ?>><?php echo date('d/m',strtotime("- 28 days"));?> - <?php echo date('d/m',strtotime("- 14 days"));?></option>
                                            <option value="42" <?php if( isset($intervaldiff) && $intervaldiff == "42") { echo "selected" ; } ?>><?php echo date('d/m',strtotime("- 42 days"));?> - <?php echo date('d/m',strtotime("- 28 days"));?></option>
                                            
                                  </select>
                            </div>
                            </td>
                            <!-- <td>
                            From: </td><td><input class="form-control startdatetimelog" type="datetime-local" value="<?php if(isset($From)){ echo $From;}?>" name="from"  id="example-datetime-local-input">
                            </td>
                            <td>
                            To: </td><td><input class="form-control todatetimelog" type="datetime-local"  value="<?php if(isset($To)){ echo $To;}?>"  name="to" id="example-datetime-local-input1">
                            </td> -->
                            <td>
                                <input  class="btn btn-primary" style="margin-left:30px" type="submit" name="submit">
                            </td>
                            <td>
                                <a class="btn btn-primary" style="margin-left:30px" href="">Refresh</a>
                            </td>
                            </tr>
                            </table>
                            </form>
                       
                    </div>
                    <br>
                  


                        <!-- <?php // foreach($users as $post) : ?> -->
                        <div class="table-responsive dt-responsive">
                            <table id="dom-jqry" class="table table-striped table-bordered nowrap table1">
                                <thead>
                                    <tr>
                                      
                                          
                                            <th>User Name</th>
                                            <!-- <th>Total Submitted</th>
                                            <th>Total Accepted</th> -->
                                            <?php 
                                            $d14 = $intervaldiff; //old date
                                            $d13 = $d14-1;
                                            $d12 = $d13-1;
                                            $d11 = $d12-1;
                                            $d10 = $d11-1;
                                            $d9 = $d10-1;
                                            $d8 = $d9-1;
                                            $d7 = $d8-1;
                                            $d6 = $d7-1;
                                            $d5 = $d6-1;
                                            $d4 = $d5-1;
                                            $d3 = $d4-1;
                                            $d2 = $d3-1;
                                            $d1 = $d2-1;
                                            $d0 = $d1-1;// current date
                                            ?>
                                            <th><?php echo date('d/m',strtotime("- $d14 days"));?></th>
                                            <th><?php echo date('d/m',strtotime("- $d13 days"));?></th>
                                            <th><?php echo date('d/m',strtotime("- $d12 days"));?></th>
                                            <th><?php echo date('d/m',strtotime("- $d11 days"));?></th>
                                            <th><?php echo date('d/m',strtotime("- $d10 days"));?></th>
                                            <th><?php echo date('d/m',strtotime("-$d9 days"));?></th>
                                            <th><?php echo date('d/m',strtotime("-$d8 days"));?></th>
                                            <th><?php echo date('d/m',strtotime("-$d7 days"));?></th>
                                            <th><?php echo date('d/m',strtotime("-$d6 days"));?></th>
                                            <th><?php echo date('d/m',strtotime("-$d5 days"));?></th>
                                            <th><?php echo date('d/m',strtotime("-$d4 days"));?></th>
                                            <th><?php echo date('d/m',strtotime("-$d3 days"));?></th>
                                            <th><?php echo date('d/m',strtotime("-$d2 days"));?></th>
                                            <th><?php echo date('d/m',strtotime("-$d1 days"));?></th>
                                            <th><?php echo date('d/m',strtotime("-$d0 days"));?></th>
                                            <th>Total Submitted</th>
                                            <th>Total Accpted</th>
                                     
                                    </tr>
                                </thead>
                                <tbody >
                                
                                <?php 
                                    foreach($users as $post) : ?>
                                 <tr>
                                  
                                     <td><?php echo $post['fname']; ?></td>
                                    
                                            <td>
                                            <?php 
                                            $day15_1 = $this->db->query("select * from leadmaster where ontag = 1
                                            and rlc = 0
                                            and pload = 0
                                            and (stagtidi = '".$post['empcode']."')
                                            and dvagtidi is not null
                                            and dvagtidii is null
                                            
                                            and (dvsbtg = 0 OR dvsbtg = 1 OR dvsbtg = 2)
                                            and dvload = 1 and leadmaster.stdti > current_date - $d14 and leadmaster.stdti < current_date - $d13 ");
                                            $day15_1 = $day15_1->num_rows();
                                            $day15_2 = $this->db->query("select * from leadmaster where ontag = 1
                                            and rlc = 0
                                            and pload = 0
                                            and (stagtidii = '".$post['empcode']."')
                                            and dvagtidi is not null
                                            and dvagtidii is not null
                                            
                                            and (dvsbtg = 0 OR dvsbtg = 1 OR dvsbtg = 2)
                                            and dvload = 1 and leadmaster.stdtii > current_date - $d14 and leadmaster.stdtii < current_date - $d13 ");
                                            $day15_2 = $day15_2->num_rows();
                                            echo $day15 = $day15_1 + $day15_2;
                                             ?>
                                            </td>
                                            <td>
                                            <?php 
                                            $day14_1 = $this->db->query("select * from leadmaster where ontag = 1
                                            and rlc = 0
                                            and pload = 0
                                            and (stagtidi = '".$post['empcode']."')
                                            and dvagtidi is not null
                                            and dvagtidii is null
                                            
                                            and (dvsbtg = 0 OR dvsbtg = 1 OR dvsbtg = 2)
                                            and dvload = 1 and leadmaster.stdti > current_date - 13 and leadmaster.stdti < current_date - $d12 ");
                                            $day14_1 = $day14_1->num_rows();
                                            $day14_2 = $this->db->query("select * from leadmaster where ontag = 1
                                            and rlc = 0
                                            and pload = 0
                                            and (stagtidii = '".$post['empcode']."')
                                            and dvagtidi is not null
                                            and dvagtidii is not null
                                            
                                            and (dvsbtg = 0 OR dvsbtg = 1 OR dvsbtg = 2)
                                            and dvload = 1 and leadmaster.stdtii > current_date - 13 and leadmaster.stdtii < current_date - $d12 ");
                                            $day14_2 = $day14_2->num_rows();
                                            echo $day14 = $day14_1 + $day14_2;
                                             ?>
                                            </td>
                                            <td>
                                            <?php 
                                            $day13_1 = $this->db->query("select * from leadmaster where ontag = 1
                                            and rlc = 0
                                            and pload = 0
                                            and (stagtidi = '".$post['empcode']."')
                                            and dvagtidi is not null
                                            and dvagtidii is null
                                            
                                            and (dvsbtg = 0 OR dvsbtg = 1 OR dvsbtg = 2)
                                            and dvload = 1 and leadmaster.stdti > current_date - 12 and leadmaster.stdti < current_date - $d11 ");
                                            $day13_1 = $day13_1->num_rows();
                                            $day13_2 = $this->db->query("select * from leadmaster where ontag = 1
                                            and rlc = 0
                                            and pload = 0
                                            and (stagtidii = '".$post['empcode']."')
                                            and dvagtidi is not null
                                            and dvagtidii is not null
                                            
                                            and (dvsbtg = 0 OR dvsbtg = 1 OR dvsbtg = 2)
                                            and dvload = 1 and leadmaster.stdtii > current_date - 12 and leadmaster.stdtii < current_date - $d11 ");
                                            $day13_2 = $day13_2->num_rows();
                                            echo $day13 = $day13_1 + $day13_2;
                                             ?>
                                            </td>
                                            <td>
                                            <?php 
                                            $day12_1 = $this->db->query("select * from leadmaster where ontag = 1
                                            and rlc = 0
                                            and pload = 0
                                            and (stagtidi = '".$post['empcode']."')
                                            and dvagtidi is not null
                                            and dvagtidii is null
                                            
                                            and (dvsbtg = 0 OR dvsbtg = 1 OR dvsbtg = 2)
                                            and dvload = 1 and leadmaster.stdti > current_date - 11 and leadmaster.stdti < current_date - $d10 ");
                                            $day12_1 = $day12_1->num_rows();
                                            $day12_2 = $this->db->query("select * from leadmaster where ontag = 1
                                            and rlc = 0
                                            and pload = 0
                                            and (stagtidii = '".$post['empcode']."')
                                            and dvagtidi is not null
                                            and dvagtidii is not null
                                            
                                            and (dvsbtg = 0 OR dvsbtg = 1 OR dvsbtg = 2)
                                            and dvload = 1 and leadmaster.stdtii > current_date - 11 and leadmaster.stdtii < current_date - $d10 ");
                                            $day12_2 = $day12_2->num_rows();
                                            echo $day12 = $day12_1 + $day12_2;
                                             ?>
                                            </td>
                                            <td>
                                            <?php 
                                            $day11_1 = $this->db->query("select * from leadmaster where ontag = 1
                                            and rlc = 0
                                            and pload = 0
                                            and (stagtidi = '".$post['empcode']."')
                                            and dvagtidi is not null
                                            and dvagtidii is null
                                            
                                            and (dvsbtg = 0 OR dvsbtg = 1 OR dvsbtg = 2)
                                            and dvload = 1 and leadmaster.stdti > current_date - 10 and leadmaster.stdti < current_date - $d9 ");
                                            $day11_1 = $day11_1->num_rows();
                                            $day11_2 = $this->db->query("select * from leadmaster where ontag = 1
                                            and rlc = 0
                                            and pload = 0
                                            and (stagtidii = '".$post['empcode']."')
                                            and dvagtidi is not null
                                            and dvagtidii is not null
                                            
                                            and (dvsbtg = 0 OR dvsbtg = 1 OR dvsbtg = 2)
                                            and dvload = 1 and leadmaster.stdtii > current_date - 10 and leadmaster.stdtii < current_date - $d9 ");
                                            $day11_2 = $day11_2->num_rows();
                                            echo $day11 = $day11_1 + $day11_2;
                                             ?>
                                            </td>
                                            <td>
                                            <?php 
                                            $day10_1 = $this->db->query("select * from leadmaster where ontag = 1
                                            and rlc = 0
                                            and pload = 0
                                            and (stagtidi = '".$post['empcode']."')
                                            and dvagtidi is not null
                                            and dvagtidii is null
                                            
                                            and (dvsbtg = 0 OR dvsbtg = 1 OR dvsbtg = 2)
                                            and dvload = 1 and leadmaster.stdti > current_date - 9 and leadmaster.stdti < current_date - $d8 ");
                                            $day10_1 = $day10_1->num_rows();
                                            $day10_2 = $this->db->query("select * from leadmaster where ontag = 1
                                            and rlc = 0
                                            and pload = 0
                                            and (stagtidii = '".$post['empcode']."')
                                            and dvagtidi is not null
                                            and dvagtidii is not null
                                            
                                            and (dvsbtg = 0 OR dvsbtg = 1 OR dvsbtg = 2)
                                            and dvload = 1 and leadmaster.stdtii > current_date - 9 and leadmaster.stdtii < current_date - $d8 ");
                                            $day10_2 = $day10_2->num_rows();
                                            echo $day10 = $day10_1 + $day10_2;
                                             ?>
                                            </td>
                                            <td>
                                            <?php 
                                            $day9_1 = $this->db->query("select * from leadmaster where ontag = 1
                                            and rlc = 0
                                            and pload = 0
                                            and (stagtidi = '".$post['empcode']."')
                                            and dvagtidi is not null
                                            and dvagtidii is null
                                            
                                            and (dvsbtg = 0 OR dvsbtg = 1 OR dvsbtg = 2)
                                            and dvload = 1 and leadmaster.stdti > current_date - 8 and leadmaster.stdti < current_date - $d7 ");
                                            $day9_1 = $day9_1->num_rows();
                                            $day9_2 = $this->db->query("select * from leadmaster where ontag = 1
                                            and rlc = 0
                                            and pload = 0
                                            and (stagtidii = '".$post['empcode']."')
                                            and dvagtidi is not null
                                            and dvagtidii is not null
                                            
                                            and (dvsbtg = 0 OR dvsbtg = 1 OR dvsbtg = 2)
                                            and dvload = 1 and leadmaster.stdtii > current_date - 8 and leadmaster.stdtii < current_date - $d7 ");
                                            $day9_2 = $day9_2->num_rows();
                                            echo $day9 = $day9_1 + $day9_2;
                                             ?>
                                            </td>
                                            <td>
                                            <?php 
                                            $monday_1 = $this->db->query("select * from leadmaster where ontag = 1
                                            and rlc = 0
                                            and pload = 0
                                            and (stagtidi = '".$post['empcode']."')
                                            and dvagtidi is not null
                                            and dvagtidii is null
                                            
                                            and (dvsbtg = 0 OR dvsbtg = 1 OR dvsbtg = 2)
                                            and dvload = 1 and leadmaster.stdti > current_date - 7 and leadmaster.stdti < current_date - $d6 ");
                                            $monday_1 = $monday_1->num_rows();
                                            $monday_2 = $this->db->query("select * from leadmaster where ontag = 1
                                            and rlc = 0
                                            and pload = 0
                                            and (stagtidii = '".$post['empcode']."')
                                            and dvagtidi is not null
                                            and dvagtidii is not null
                                            
                                            and (dvsbtg = 0 OR dvsbtg = 1 OR dvsbtg = 2)
                                            and dvload = 1 and leadmaster.stdtii > current_date - 7 and leadmaster.stdtii < current_date - $d6 ");
                                            $monday_2 = $monday_2->num_rows();
                                            echo $monday_total = $monday_1 + $monday_2;
                                             ?>
                                            </td>
                                            <td>
                                            <?php
                                            $tuesday_1 = $this->db->query("select * from leadmaster where ontag = 1
                                            and rlc = 0
                                            and pload = 0
                                            and (stagtidi = '".$post['empcode']."')
                                            and dvagtidi is not null
                                            and dvagtidii is null
                                            
                                            and (dvsbtg = 0 OR dvsbtg = 1 OR dvsbtg = 2)
                                            and dvload = 1 and leadmaster.stdti > current_date - 6 and leadmaster.stdti < current_date - $d5 ");
                                            $tuesday_1 = $tuesday_1->num_rows();
                                            $tuesday_2 = $this->db->query("select * from leadmaster where ontag = 1
                                            and rlc = 0
                                            and pload = 0
                                            and (stagtidii = '".$post['empcode']."')
                                            and dvagtidi is not null
                                            and dvagtidii is not null
                                            
                                            and (dvsbtg = 0 OR dvsbtg = 1 OR dvsbtg = 2)
                                            and dvload = 1 and leadmaster.stdtii > current_date - 6 and leadmaster.stdtii < current_date - $d5 ");
                                            $tuesday_2 = $tuesday_2->num_rows();
                                            echo $tuesday_total = $tuesday_1 + $tuesday_2;
                                             ?>
                                            </td>
                                            <td>
                                            <?php 
                                            $wed_1 = $this->db->query("select * from leadmaster where ontag = 1
                                            and rlc = 0
                                            and pload = 0
                                            and (stagtidi = '".$post['empcode']."')
                                            and dvagtidi is not null
                                            and dvagtidii is null
  
                                            and (dvsbtg = 0 OR dvsbtg = 1 OR dvsbtg = 2)
                                            and dvload = 1 and leadmaster.stdti > current_date - 5 and leadmaster.stdti < current_date - $d4 ");
                                            $wed_1 = $wed_1->num_rows();
                                            $wed_2 = $this->db->query("select * from leadmaster where ontag = 1
                                            and rlc = 0
                                            and pload = 0
                                            and (stagtidii = '".$post['empcode']."')
                                            and dvagtidi is not null
                                            and dvagtidii is not null
                                            
                                            and (dvsbtg = 0 OR dvsbtg = 1 OR dvsbtg = 2)
                                            and dvload = 1 and leadmaster.stdtii > current_date - 5 and leadmaster.stdtii < current_date - $d4 ");
                                            $wed_2 = $wed_2->num_rows();
                                            echo $wed_total = $wed_1 + $wed_2;
                                             ?>
                                            </td>
                                            <td>
                                            <?php 
                                            $thursday_1 = $this->db->query("select * from leadmaster where ontag = 1
                                            and rlc = 0
                                            and pload = 0
                                            and dvagtidi is not null
                                            and dvagtidii is null
                                            and (stagtidi = '".$post['empcode']."')
                                            and (dvsbtg = 0 OR dvsbtg = 1 OR dvsbtg = 2)
                                            and dvload = 1 and leadmaster.stdti > current_date - 4 and leadmaster.stdti < current_date - $d3 ");
                                            $thursday_1 = $thursday_1->num_rows();
                                            $thursday_2 = $this->db->query("select * from leadmaster where ontag = 1
                                            and rlc = 0
                                            and pload = 0
                                            and dvagtidi is not null
                                            and dvagtidii is not null
                                            and (stagtidii = '".$post['empcode']."')
                                            and (dvsbtg = 0 OR dvsbtg = 1 OR dvsbtg = 2)
                                            and dvload = 1 and leadmaster.stdtii > current_date - 4 and leadmaster.stdtii < current_date - $d3 ");
                                            $thursday_2 = $thursday_2->num_rows();
                                            echo $thursday_total = $thursday_1+$thursday_2;
                                             ?>
                                            </td>
                                            <td>
                                            <?php 
                                            $friday_1 = $this->db->query("select * from leadmaster where ontag = 1
                                            and rlc = 0
                                            and pload = 0
                                            and (stagtidi = '".$post['empcode']."')
                                            and dvagtidi is not null
                                            and dvagtidii is null
                                            and (dvsbtg = 0 OR dvsbtg = 1 OR dvsbtg = 2)
                                            and dvload = 1 and leadmaster.stdti > current_date - 3 and leadmaster.stdti < current_date - $d2 ");
                                            $friday_1 = $friday_1->num_rows();
                                            $friday_2 = $this->db->query("select * from leadmaster where ontag = 1
                                            and rlc = 0
                                            and pload = 0
                                            and (stagtidii = '".$post['empcode']."')
                                            and dvagtidi is not null
                                            and dvagtidii is not null
                                            and (dvsbtg = 0 OR dvsbtg = 1 OR dvsbtg = 2)
                                            and dvload = 1 and leadmaster.stdtii > current_date - 3 and leadmaster.stdtii < current_date - $d2 ");
                                            $friday_2 = $friday_2->num_rows();
                                            echo $friday_total = $friday_1+$friday_2;
                                             ?>
                                            </td>
                                            <td>
                                            <?php 
                                            $sat_1 = $this->db->query("select * from leadmaster where ontag = 1
                                            and rlc = 0
                                            and pload = 0
                                            and (stagtidi = '".$post['empcode']."')
                                            and dvagtidi is not null
                                            and dvagtidii is null
                                            and (dvsbtg = 0 OR dvsbtg = 1 OR dvsbtg = 2)
                                            and dvload = 1 and leadmaster.stdti > current_date - 2 and leadmaster.stdti < current_date - $d1 ");
                                            $sat_1 = $sat_1->num_rows();
                                            $sat_2 = $this->db->query("select * from leadmaster where ontag = 1
                                            and rlc = 0
                                            and pload = 0
                                            and (stagtidii = '".$post['empcode']."')
                                            and dvagtidi is not null
                                            and dvagtidii is not null
                                            and (dvsbtg = 0 OR dvsbtg = 1 OR dvsbtg = 2)
                                            and dvload = 1 and leadmaster.stdtii > current_date - 2 and leadmaster.stdtii < current_date - $d1 ");
                                            $sat_2 = $sat_2->num_rows();
                                            echo $sat_total = $sat_1+$sat_2;
                                             ?>
                                            </td>
                                            <td>
                                            <?php 
                                            $sun_1 = $this->db->query("select * from leadmaster where ontag = 1
                                            and rlc = 0
                                            and pload = 0
                                            and (stagtidi = '".$post['empcode']."')
                                            and dvagtidi is not null
                                            and dvagtidii is null
                                            and (dvsbtg = 0 OR dvsbtg = 1 OR dvsbtg = 2)
                                            and dvload = 1 and leadmaster.stdti > current_date - 1 and leadmaster.stdti < current_date - $d0 ");
                                            $sun_1 = $sun_1->num_rows();
                                            $sun_2 = $this->db->query("select * from leadmaster where ontag = 1
                                            and rlc = 0
                                            and pload = 0
                                            and (stagtidii = '".$post['empcode']."')
                                            and dvagtidi is not null
                                            and dvagtidii is not null
                                            and (dvsbtg = 0 OR dvsbtg = 1 OR dvsbtg = 2)
                                            and dvload = 1 and leadmaster.stdtii > current_date - 1 and leadmaster.stdtii < current_date - $d0 ");
                                            $sun_2 = $sun_2->num_rows();                                            
                                            echo $sun_total = $sun_1+$sun_2;
                                             ?>
                                            </td>
                                            <td>
                                            <?php 
                                            if($intervaldiff != 14)
                                            {
                                                $today_date = "current_date - $d0";
                                            }
                                            else{
                                                $today_date = 'current_date' ;
                                            }
                                            $today_1 = $this->db->query("select * from leadmaster where ontag = 1
                                            and rlc = 0
                                            and pload = 0
                                            and (stagtidi = '".$post['empcode']."')
                                            and dvagtidi is not null
                                            and dvagtidii is null
                                            and (dvsbtg = 0 OR dvsbtg = 1 OR dvsbtg = 2)
                                            and dvload = 1 and leadmaster.stdti >= $today_date");
                                            $today_1 = $today_1->num_rows();
                                            $today_2 = $this->db->query("select * from leadmaster where ontag = 1
                                            and rlc = 0
                                            and pload = 0
                                            and (stagtidii = '".$post['empcode']."')
                                            and dvagtidi is not null
                                            and dvagtidii is not null
                                            and (dvsbtg = 0 OR dvsbtg = 1 OR dvsbtg = 2)
                                            and dvload = 1 and leadmaster.stdtii >= $today_date");
                                           
                                            $today_2 = $today_2->num_rows();
                                            echo $today_total = $today_1+$today_2;
                                             ?>
                                            </td>
                                            
                                            <td><?php
                                            $date_start = strtotime('-' . date('w') . ' days');
                                            if($intervaldiff != 14)
                                            {
                                                $submit1_total = $this->db->query("select * from leadmaster where  (leadmaster.stdti >= current_date - $d14 AND leadmaster.stdti <= current_date - $d0) AND leadmaster.stagtidi = '".$post['empcode']."' ");
                                                $submit1 = $submit1_total->num_rows();
                                               
                                                $submit2_total = $this->db->query("select * from leadmaster where  (leadmaster.stdtii >= current_date - $d14 AND leadmaster.stdtii <= current_date - $d0) AND stagtidii = '".$post['empcode']."' ");
                                                echo $submit1 + $submit2_total->num_rows();
                                              
                                            }
                                            else{
                                                $submit1_total = $this->db->query("select * from leadmaster where  leadmaster.stdti >= current_date - $d14  AND leadmaster.stagtidi = '".$post['empcode']."' ");
                                                $submit1 = $submit1_total->num_rows();
                                               
                                                $submit2_total = $this->db->query("select * from leadmaster where  leadmaster.stdtii >= current_date - $d14  AND stagtidii = '".$post['empcode']."' ");
                                                echo $submit1 + $submit2_total->num_rows();
                                                
                                            }
                                             
                                            ?></td>
                                            <td><?php echo $day15+$day14+$day13+$day12+$day11+$day10+$day9+$monday_total +$tuesday_total+$wed_total+$thursday_total+$friday_total+$sat_total+$sun_total+$today_total;?></td>

                                           
                                    </tr>
                               

                                    <?php  endforeach; ?>

                                 </tbody>
                            </table>      
                        </div>
                       
                    </div>
                </div>
                <!-- DOM/Jquery table end -->
            </div>

  