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
    $(document).ready(function(){
    $(".emailsend_all").on('change', function () {
                // alert("test");
                $(this).closest('table').find('.checkbox_emailclass').prop('checked', this.checked ); 
                // $("#send_email").attr("disabled", false);
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
                        <div class="table-responsive dt-responsive">
                            <table id="dom-jqry" class="table table-striped table-bordered nowrap">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" class="emailsend_all  emailclass"  onclick="toggle(this);"/>&nbsp;&nbsp;Select</th>
                                        <th>FName</th>
                                        <th>LName</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Job Title</th>
                                        <th>Department</th>
                                        <th>Company Name</th>
                                        <th>Company Type</th>
                                        <th>Industry</th>
                                        <th>SubIndustry</th>
                                        <th>Sector</th>
                                        <th>Emp Size</th>
                                        <th>Country</th>
                                        <th>State</th>
                                        <th>City</th>
                                        <th>Address</th>
                                        <th>ZipCode</th>
                                        <th>Domain</th>
                                        <th>Prospect Link</th>
                                        <!-- <th>Action</th> -->
                                        <!-- <th>Update</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                $result = $users->result();
                                $i =0;
                                foreach($result as $post) {
                                
                                $i++;
                                // echo $j;
                                ?>
                                 <tr>
                                        <td><input type="checkbox" class ="emailclass checkbox_emailclass" value="<?php echo $i;?>" name="delivery_final_<?php echo $i;?>" id="delivery_final_<?php echo $i;?>" ><?php //echo $i;?></td>
                                        <td><?php echo $post->sal." ". $post->fname; ?></td>
                                        <td><?php echo $post->lname; ?></td>
                                        <td><?php echo $post->email; ?></td>
                                        <td><?php echo $post->phone; ?></td>
                                         <td><?php echo $post->jtitle; ?></td>
                                         <td><?php echo $post->department;?></td>
                                         <td><?php echo $post->cname;?></td>
                                         <td><?php echo $post->ctypname;?></td>
                                         <td><?php echo $post->industry;?></td>
                                         <td><?php echo $post->subindustry;?></td>
                                         <td><?php echo $post->sector;?></td>
                                         <td><?php echo $post->empsize;?></td>
                                         <td><?php echo $post->countryname;?></td>
                                         <td><?php echo $post->state;?></td>
                                         <td><?php echo $post->city;?></td>
                                         <td><?php echo $post->address;?></td>
                                         <td><?php echo $post->zipcode;?></td>
                                         <td><?php echo $post->domain;?></td>
                                         <td><a class="label label-inverse-success" href='<?php echo $post->plink;?>'>Prospect Link</a></td>
                                        <!-- <td> -->
                                                <?php //if($post['status'] == 0){ ?>
                                               <!-- <a class="label label-inverse-primary enable" href='<?php echo base_url(); ?>administrator/enable/<?php echo $post->lmid; ?>?table=<?php echo base64_encode('users'); ?>'>Active</a> -->
                                                <?php //}else{ ?> 
                                                <!-- <a class="label label-inverse-warning desable" href='<?php echo base_url(); ?>administrator/desable/<?php echo $post->lmid; ?>?table=<?php echo base64_encode('users'); ?>'>Deactive</a> -->
                                                <?php //} ?>
                                                
                                                <!-- <a class="label label-inverse-danger delete" href='<?php echo base_url(); ?>administrator/delete/<?php echo $post->lmid; ?>?table=<?php echo base64_encode('users'); ?>'>Delete</a> -->
                                            
                                        <!-- </td> -->
                                        
                                    </tr>
                                <?php }//endforeach; ?>

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

  