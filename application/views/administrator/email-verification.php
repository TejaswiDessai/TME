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
                                    <option value="">Agent</option>
                                    <?php foreach ($users_name as $user): ?>
                                        <option value="<?php echo $user['emp_id']; ?>" <?php if( isset($user_id) && $user_id == $user['emp_id'] ) { echo "selected" ; } ?>><?php echo $user['fname']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                            <td>
                                <select class="form-control form-control-default "  name="stage" id="stage">
                                    <option value="">Numbers</option>
                                    <option value="1" >1</option>
                                    <option value="2" >2</option>
                                    <option value="3" >3</option>
                                    <option value="4" >4</option>
                                    <option value="5" >5</option>
                                    <option value="6" >6</option>
                                    <option value="7" >7</option>
                                    <option value="8" >8</option>
                                    <option value="9" >9</option>
                                    <option value="10" >10</option>
                                    <option value="11" >11</option>
                                    <option value="12" >12</option>
                                    <option value="13" >13</option>
                                    <option value="14" >14</option>
                                    <option value="15" >15</option>
                                </select>
                            </td>
                            <td>
                                <select class="form-control form-control-default "  name="stage" id="stage">
                                    <option value="">Status</option>
                                    <option value="Open" >Open</option>
                                    <option value="Closed" >Closed</option>
                                    <option value="Accepted" >All</option>
                                </select>
                            </td>
                           
                            <td>
                                <input  class="btn btn-primary" type="submit" name="submit">
                            </td>
                            <td>
                                <a class="btn btn-primary" href="">Refresh</a>
                            </td>
                            </tr>
                            <tr>
                            <td>
                            <input type="text" class="form-control form-control-default " name="from" value="Enter send from Email..">
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
                                        <th>Campaign Name</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Domain</th>
                                        <th>State & Country </th>
                                        <th>Company Size</th>
                                        <th>Job title</th>
                                        <th>LinkedIn URL</th>
                                        <th>Email</th>
                                        <th>Change Format</th>
                                        <th>Current Status</th>
                                        <th>Send To</th>
                                        <th>Change Status</th>
                                        <th>Sent Timestamp</th>
                                        <th>Email Sent From</th>
                                        <th>Comments</th>
                                    </tr>
                                </thead>
                                <tbody >
                                <?php foreach($email_list as $post) : ?>
                                 <tr>
                                        <td></td>
                                        <!-- <td><?php //echo date("M d,Y", strtotime($post['last_login'])); ?></td> -->
                                        <td><?php
                                        echo $post['campnm'];
                                        // echo $campnam = $this->Administrator_Model->get_camp_name($post['emp_id']);
                                        ?></td>
                                        <td><?php echo $post['fname']; ?></td>
                                        <td><?php echo $post['lname']; ?></td>
                                        <td><?php 
                                        echo $post['domain'];
                                        // $query = $this->db->query("SELECT * FROM leadmaster where stagtidi = '".$post['emp_id']."'");
                                        // echo $query->num_rows();

                                        ?></td>
                                         <td><?php echo $post['city']." / ".$post['state']; ?></td>
                                        <td>
                                        <?php echo $post['empsize']; ?>
                                        </td>
                                        <td>
                                        <?php echo $post['jtitle']; ?>
                                        </td>
                                        <td>
                                        <a href="<?php echo $post['plink']; ?>">Click here</a>
                                        </td>
                                        <td>
                                        <?php echo $post['email']; ?>
                                        </td>
                                        <td>
                                            <input type="button" value="Change Format">
                                        </td>
                                        <td>
                                            
                                        </td>
                                        <td>
                                            <input type="checkbox">
                                        </td>
                                        <td>
                                            <input type="checkbox">
                                        </td>
                                        <td>
                                            
                                        </td>
                                        <td>
                                            
                                        </td>
                                        <td>
                                           
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
                <div class="form-group row">
                <div class="col-sm-2">
                    <input class="btn btn-primary" type="button" value="Send Email">
                    </div>
                    <div class="col-sm-2">
                    <input class="btn btn-primary" type="button" value="Update Email">
                    </div>
                    <div class="col-sm-2">
                    <select style="width:200px" class="form-control form-control-default "  name="stage" id="stage">
                        <option value="">Change Status</option>
                        <option value="Test Mail Sent" >Test Mail Sent</option>
                        <option value="Bounced" >Bounced</option>
                        <option value="Reviewed" >Reviewed</option>
                        <option value="Accepted" >Accepted</option>
                        <option value="Not Available" >Not Available</option>
                        <option value="Out of Office" >Out of Office</option>
                        <option value="Generic email" >Generic email</option>
                        <option value="Dead contact" >Dead contact</option>
                        <option value="Incorrect Info" >Incorrect Info</option>
                        <option value="Refused" >Refused</option>
                    </select>
                    </div>
                </div>
            </div>

  