     <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admintemplate/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admintemplate/assets/pages/data-table/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admintemplate/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admintemplate/bower_components/ekko-lightbox/dist/ekko-lightbox.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admintemplate/bower_components/lightbox2/dist/css/lightbox.css">

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
           
            <div class="card">
                    <div class="card-block">
                    <!-- <input type="hidden" value="<?php //echo $empcode;?>" id="empcode"> -->
                        <form action="<?php echo base_url(); ?>administrator/users/users" method="post">
                            <table class="table" style="margin-bottom:10px;">
                            <tr>
                            <!-- <td>
                            <?php //foreach ($campaigns as $campaign): ?>
                                <label class="col-lable"><b>Campaign Name: <?php //echo $campaign['campnm']; ?></b></label>
                                <input type="hidden" value="<?php//echo $campaign['cids']; ?>" id="campnm">
                            <?php //endforeach; ?>
                            <input type="hidden" value="<?php //echo $Campid; ?>" id="campaign_id" name="campaign_id">
                            </td> -->
                            <td>
                                <select style="height:34px;" class="form-control form-control-sm "  name="userstatus" id="userstatus">
                                <option value="">Select Status</option>
                                <option value="active" <?php if( isset($userstatus) && $userstatus == "active") { echo "selected" ; } ?>>Active</option>
                                    <option value="deactivated" <?php if( isset($userstatus) && $userstatus == "deactivated") { echo "selected" ; } ?>>Deactivated</option>
                                    </select>
                             </td>
                            <td>
                                <select style="height:34px;" class="form-control form-control-sm "  name="cid_type" id="cid_type">
                                    <option value="">Select Company</option>
                                    <option value="ME" <?php if( isset($cid_type) && $cid_type == "ME") { echo "selected" ; } ?>>ME</option>
                                    <option value="HP" <?php if( isset($cid_type) && $cid_type == "HP") { echo "selected" ; } ?>>HP</option>
                                    <option value="TMB" <?php if( isset($cid_type) && $cid_type == "TMB") { echo "selected" ; } ?>>TMB</option>
                                    </select>
                             </td>
                            <td>
                                <select style="height:34px;" class="form-control form-control-sm "  name="roles" id="roles">
                                    <option value="">Select Role</option>
                                    <option value="1" <?php if( isset($roles) && $roles == "1") { echo "selected" ; } ?>>Administator</option>
                                    <option value="2" <?php if( isset($roles) && $roles == "2") { echo "selected" ; } ?>>Core Team</option>
                                    <option value="3" <?php if( isset($roles) && $roles == "3") { echo "selected" ; } ?>>Manager</option>
                                    <option value="4" <?php if( isset($roles) && $roles == "4") { echo "selected" ; } ?>>Team Lead</option>
                                    <option value="5" <?php if( isset($roles) && $roles == "5") { echo "selected" ; } ?>>Team member</option>
                                    <option value="6" <?php if( isset($roles) && $roles == "6") { echo "selected" ; } ?>>Developer</option>
                                    </select>
                             </td>
                            
                             <td>
                                <input  class="btn btn-primary" type="submit" name="submit" value="Fetch Record">
                            </td>
                            <td>
                               
                                <a class="btn btn-primary refreshbtn" style="color:white;" href=''>Refresh <i class="icofont icofont-refresh"></i></a>
                            </td>
                            </tr>
                          
                            </table>
                            </form>
                       
                    </div>
                    <br>


            <!-- Page-header end -->
            <!-- Page-body start -->
            <div class="page-body">
                <!-- DOM/Jquery table start -->

                <div class="card">
                    <div class="card-block">
                        <div class="table-responsive dt-responsive">
                            <table id="dom-jqry" class="table table-striped table-bordered nowrap">
                                <thead>
                                    <tr>
                                        <th>EMP Id</th>
                                        <!-- <th>Image</th> -->
                                        <th>Name</th>
                                        <th>Manager</th>
                                        <th>User Type</th>
                                        <th>Reg-Date</th>
                                        <th>Action</th>
                                        <th>Update</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach($users as $post) : ?>
                                 <tr>
                                        <td><?php  if(isset($post['cid_type'])){ echo $post['cid_type']."-";} echo $post['emp_id']; ?></td>
                                        <!-- <td>
                                            <img width="20px;" src="<?php echo site_url();?>assets/images/users/<?php echo $post['image']; ?> ">                                           
                                        </td> -->
                                        <td><a href="edit-blog.php?id=14"><?php echo $post['fname']; ?></a></td>
                                        <td><?php echo $post['mngr']; ?></td>
                                        <td><?php 
                                        if($post['role'] == 1)
                                        {
                                            echo "Admin";
                                        }
                                        else if($post['role'] == 2)
                                        {
                                            echo "Core";
                                        }
                                        else if($post['role'] == 3)
                                        {
                                            echo "Manager";
                                        }
                                        else if($post['role'] == 4)
                                        {
                                            echo "Team Leader";
                                        }
                                        else if($post['role'] == 5)
                                        {
                                            echo "Team Member";
                                        }
                                        else if($post['role'] == 6)
                                        {
                                            echo "Developer";
                                        }

                                        ?></td>
                                         <td><?php echo date("M d,Y", strtotime($post['last_login'])); ?></td>
                                         <!-- <td><?php //if($post['status'] == 0){ echo "Active";}else{ echo "Inactive";} ?></td> -->
                                        <td>
                                                <?php if($post['status'] == 0){ ?>
                                               <a class="label label-inverse-primary enable" href='<?php echo base_url(); ?>administrator/enable/<?php echo $post['id']; ?>?table=<?php echo base64_encode('users'); ?>'>Active</a>
                                                <?php }else{ ?> 
                                                <a class="label label-inverse-warning desable" href='<?php echo base_url(); ?>administrator/desable/<?php echo $post['id']; ?>?table=<?php echo base64_encode('users'); ?>'>Deactive</a>
                                                <?php } ?>
                                                
                                                <!-- <a class="label label-inverse-danger delete" href='<?php echo base_url(); ?>administrator/delete/<?php echo $post['id']; ?>?table=<?php echo base64_encode('users'); ?>'>Delete</a> -->
                                            
                                        </td>
                                        <td>
                                        <a class="label label-inverse-info" href='<?php echo base_url(); ?>administrator/users/update-user/<?php echo $post['id']; ?>'>Edit</a>
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

  