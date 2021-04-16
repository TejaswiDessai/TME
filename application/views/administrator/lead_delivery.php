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
                    <h4>Delivery</h4>
                </div>
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index-2.html">
                                <i class="icofont icofont-home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Leads</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Delivery</a>
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
                        <form action="<?php echo base_url();?>administrator/delivery" method="post" >
                        <table>
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
                                <select class="form-control form-control-default "  name="delivery_status" id="delivery_status">
                                    <option value="">Delivery Status</option>
                                    <option value="0" <?php if( isset($delivery_status) && $delivery_status == "0") { echo "selected" ; } ?>>Ready to Deliver</option>
                                    <option value="1" <?php if( isset($delivery_status) && $delivery_status == "1") { echo "selected" ; } ?>>Delivered</option>
                                </select>
                            </td>
                            <td>
                                <select class="form-control form-control-default "  name="qa_status" id="qa_status">
                                    <option value="">QA Status</option>
                                    <option value="qualified" <?php if( isset($qa_status) && $qa_status == "qualified") { echo "selected" ; } ?>>Accept - Qualified</option>
                                    <option value="disqualified" <?php if( isset($qa_status) && $qa_status == "disqualified") { echo "selected" ; } ?>>Accept - DisQualified</option>
                                </select>
                            </td>
                            <td>
                                <select class="form-control form-control-default "  name="ls_status" id="ls_status">
                                    <option value="">Lead Scored Status</option>
                                    <option value="1" <?php if( isset($ls_status) && $ls_status == "1") { echo "selected" ; } ?>>Yes</option>
                                    <option value="0" <?php if( isset($ls_status) && $ls_status == "0") { echo "selected" ; } ?>>No</option>
                                </select>
                            </td>
                            <td>
                                <input  class="btn btn-primary" type="submit" name="submit">
                            </td>
                            </tr>
                            </form>
                            <tr>
                            <td>


                            </td>
                            </tr>
                            </table>
                            
                       
                    </div>
                    <!-- <br> -->
                    <div class="card-block">
                        <div class="table-responsive dt-responsive">
                        <form id="check" action="<?php echo base_url();?>administrator/export_csv" method="post" >
                            <table id="dom-jqry" class="table table-striped table-bordered nowrap">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" class="emailsend_all  emailclass"  onclick="toggle(this);"/>&nbsp;&nbsp;Select</th>
                                        <th>Camp Id</th>
                                        <th>FName</th>
                                        <th>LName</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Delivery Status</th>
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
                                        <td><input type="checkbox" class ="emailclass checkbox_emailclass" value="<?php echo $post->lmid;?>" name="delivery_final_check[]" id="delivery_final_check_<?php echo $i;?>" ><?php //echo $i;?>
                                        <input type="hidden" name="leadid" id="leadid_<?php echo $i;?>" value="<?php echo $post->lmid;?>">
                                        </td>
                                        <td><?php echo $post->cids; ?></td>
                                        <td><?php echo $post->sal." ". $post->fname; ?></td>
                                        <td><?php echo $post->lname; ?></td>
                                        <td><?php echo $post->email; ?></td>
                                        <td><?php echo $post->phone; ?></td>
                                        <td>
                                            <?php if($post->dytg == 0 || $post->dytg == ''){ echo "<b style='color:green';>Ready to Deliver</b>";}elseif($post->dytg == 1){ echo "<b style='color:red';>Delivered</b>";}?>
                                        </td>
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
                                         <td><a class="label label-inverse-success" href='<?php echo $post->plink;?>' target="_new">Prospect Link</a></td>
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
                            <input  class="btn btn-primary" id="Export" type="submit" value="Export" name="submit">
                                </form>
                        </div>
                    </div>
                </div>
                <!-- DOM/Jquery table end -->
            </div>

  <script>
    $('#Export').prop("disabled", true);
    $('input:checkbox').click(function() {
    if ($(this).is(':checked')) {
    $('#Export').prop("disabled", false);
    } else {
    if ($('.checks').filter(':checked').length < 1){
    $('#Export').attr('disabled',true);}
    }
    });
  </script>