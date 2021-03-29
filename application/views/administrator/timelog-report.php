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
                    <h4>Timelog Reports</h4>
                </div>
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index-2.html">
                                <i class="icofont icofont-home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Timelog</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Timelog Reports</a>
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
                        <form action="<?php echo base_url();?>cdc/timelog_report" method="post" >
                            <table style="margin-bottom:10px;">
                            <tr>
                            <td>
                                <select class="form-control form-control-default "  name="campid" id="campid" required> 
                                    <!-- <option value="">Campaign</option> -->
                                    <?php foreach ($campaigns as $campaign): ?>
                                        <option value="<?php echo $campaign['cids']; ?>" <?php if( isset($Campid) && $Campid == $campaign['cids']) { echo "selected" ; } ?>><?php echo $campaign['campnm']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                           
                          
                            <td>
                            From: </td><td><input class="form-control startdatetimelog" type="datetime-local" value="<?php if(isset($From)){ echo $From;}?>" name="from"  id="example-datetime-local-input">
                            </td>
                            <td>
                            To: </td><td><input class="form-control todatetimelog" type="datetime-local"  value="<?php if(isset($To)){ echo $To;}?>"  name="to" id="example-datetime-local-input1">
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
                        <!-- <?php //if (isset($Stage) && $Stage == "verified")
                       // {
                          //  $display  = "visibility: hidden;";
                        //}else{
                          //  $display  = "visibility: visible;"; 
                        //}

                        ?> -->
                        <div class="table-responsive dt-responsive">
                            <table id="dom-jqry" class="table table-striped table-bordered nowrap table1">
                                <thead>
                                    <tr>
                                        <!-- <th>S.no</th>
                                        <th>Username</th>
                                        <th>Campaign Name</th>
                                        <th>No. Of Records</th>
                                        <?php if (isset($Stage) && $Stage == "datacollect" ||$Stage == "")
                                        { ?>
                                        <th>Submit & Saved</th>
                                      <?php  } ?>
                                        <th>Pending</th>
                                        <th>Verified</th>
                                        <th>Rejection</th>
                                        <th>Accepted</th> -->


                                        <th>S.no</th>
                                        <th>Username</th>
                                        <th>Campaign Name</th>
                                        <th>Sub1</th>
                                        <th>Submit2</th>
                                        <th>Saved</th>
                                        <th>Accept1</th>
                                        <th>Accept2</th>
                                        <th>Reject1</th>

                                        <th>Reject2</th>
                                     
                                    </tr>
                                </thead>
                                <tbody >
                                <?php foreach($users as $post) : ?>
                                 <tr>
                                        <td></td>
                                        <td><?php echo $post['fname']; ?></td>
                                        <td><?php echo $post['campnm']; ?> <?php echo "-".$post['empcode']; ?> </td>
                                        <td><?php 
                                         if(isset($Campid)){
                                            $onesub = $this->db->query("select *
                                            from timelog join users on users.empcode = timelog.agent 
                                            where stage='i submit' 
                                            AND cids= $Campid 
                                            and agent = '".$post['empcode']."'
                                            and (tim >= '".$From."' and tim <= '".$To."')   ");
                                            
                                            echo $onesub->num_rows();
                                         }
                                        //  else{
                                        //     $onesub = $this->db->query("select *
                                        //     from timelog join users on users.empcode = timelog.agent 
                                        //     where stage='i submit' and agent = '".$post['empcode']."'
                                        //     and (tim >= '".$From."' and tim <= '".$To."')  ");
                                        //     // echo $onesub;
                                        //     echo $onesub->num_rows();
                                        //  }
                                           
                                       ?></td>
                                        <td><?php //second submit
                                          if(isset($Campid)){
                                            $twosub = $this->db->query("select *
                                            from timelog join users on users.empcode = timelog.agent 
                                            where stage='ii submit' 
                                            AND cids= $Campid  
                                            and agent = '".$post['empcode']."'
                                            and (tim >= '".$From."' and tim <= '".$To."') 
                                            ");
                                            //  echo $this->db->last_query(); 
                                             echo $twosub->num_rows();
                                          }
                                        //   else{
                                        //     $twosub = $this->db->query("select *
                                        //     from timelog join users on users.empcode = timelog.agent 
                                        //     where stage='ii submit' 
                                        //     and agent = '".$post['empcode']."'
                                        //     and (tim >= '".$From."' and tim <= '".$To."')   ");
                                        //     echo $twosub->num_rows(); 
                                        //   }
                                       ?></td>
                                        <td><?php  //save
                                          if(isset($Campid)){
                                            $saves = $this->db->query("select *
                                            from timelog join users on users.empcode = timelog.agent 
                                            where stage='dc save'  

                                            AND cids= $Campid  
                                            and agent = '".$post['empcode']."'
                                            and (tim >= '".$From."' and tim <= '".$To."')  ");
                                            echo $saves->num_rows();
                                          }
                                        //   else{
                                        //     $saves = $this->db->query("select *
                                        //     from timelog join users on users.empcode = timelog.agent 
                                        //     where stage='dc save'
                                        //     and agent = '".$post['empcode']."'
                                        //     and (tim >= '".$From."' and tim <= '".$To."')   ");
                                        //     echo $saves->num_rows();
                                        //   }
                                       ?></td>
                                      
                                        <td>
                                        <?php  //1st dv accept
                                         if(isset($Campid)){
                                            $oneaccpt = $this->db->query("select *
                                            from timelog join users on users.empcode = timelog.agent 
                                            where stage='idv accept'  
                                            and agent = '".$post['empcode']."'
                                            AND cids= $Campid  
                                           
                                            and (tim >= '".$From."' and tim <= '".$To."')   ");
                                            echo $oneaccpt->num_rows();
                                         }
                                        //  else{
                                        //     $oneaccpt = $this->db->query("select *
                                        //     from timelog join users on users.empcode = timelog.agent 
                                        //     where stage='idv accept'
                                        //     and agent = '".$post['empcode']."'
                                        //     and (tim >= '".$From."' and tim <= '".$To."')  ");
                                        //     echo $oneaccpt->num_rows();
                                        //  }
                                       ?>
                                        </td>
                                        <td>
                                        <?php  //2st dv accept
                                        if(isset($Campid)){
                                            $twoaccpt = $this->db->query("select *
                                            from timelog join users on users.empcode = timelog.agent 
                                            where stage='iidv accept'  

                                            AND cids= $Campid  
                                            and agent = '".$post['empcode']."'
                                            and (tim >= '".$From."' and tim <= '".$To."')  ");
                                            echo $twoaccpt->num_rows();
                                        }
                                        // else{
                                        //     $twoaccpt = $this->db->query("select *
                                        //     from timelog join users on users.empcode = timelog.agent 
                                        //     where stage='iidv accept'
                                        //     and agent = '".$post['empcode']."'
                                        //     and (tim >= '".$From."' and tim <= '".$To."')  ");
                                        //     echo $twoaccpt->num_rows(); 
                                        // }
                                       ?>
                                       </td> 
                                        <td>
                                        <?php  //1st dv reject
                                         if(isset($Campid)){
                                            $onerej = $this->db->query("select *
                                            from timelog join users on users.empcode = timelog.agent 
                                            where stage='idv reject'  

                                            AND cids= $Campid 
                                            and agent = '".$post['empcode']."'
                                            and (tim >= '".$From."' and tim <= '".$To."')  ");
                                            echo $onerej->num_rows();
                                         }
                                        //  else{
                                        //     $onerej = $this->db->query("select *
                                        //     from timelog join users on users.empcode = timelog.agent 
                                        //     where stage='idv reject'  
                                        //     and agent = '".$post['empcode']."'
                                        //     and (tim >= '".$From."' and tim <= '".$To."')  ");
                                        //     echo $onerej->num_rows();
                                        //  }
                                       ?>
                                        </td>
                                        <td>
                                        <?php  //2nd dv reject
                                          if(isset($Campid)){
                                            //   echo "Hiiiiii".$post['empcode'];
                                            $tworej = $this->db->query("select *
                                            from timelog join users on users.empcode = timelog.agent 
                                            where stage='iidv reject'  

                                            AND cids= $Campid  
                                            and agent = '".$post['empcode']."'
                                            and (tim >= '".$From."' and tim <= '".$To."')   ");
                                            echo $tworej->num_rows();
                                          }
                                        //   else{
                                        //     $tworej = $this->db->query("select *
                                        //     from timelog join users on users.empcode = timelog.agent 
                                        //     where stage='iidv reject'  
                                        //     and agent = '".$post['empcode']."'
                                        //     and (tim >= '".$From."' and tim <= '".$To."')  ");
                                        //     echo $tworej->num_rows();
                                        //   }
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

  