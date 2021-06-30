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
                    <h4>List Candidate</h4>
                </div>
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index-2.html">
                                <i class="icofont icofont-home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Candidate</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">List Candidate</a>
                        </li>
                    </ul>
                </div>
            </div>
           
            <div class="card">
                    <div class="card-block">
                    <!-- <input type="hidden" value="<?php //echo $empcode;?>" id="empcode"> -->
                        <form action="<?php echo base_url(); ?>administrator/candidate_list" method="post">
                            <table class="table" style="margin-bottom:10px;">
                            <tr>
                            <!-- <td>
                            <?php //foreach ($campaigns as $campaign): ?>
                                <label class="col-lable"><b>Campaign Name: <?php //echo $campaign['campnm']; ?></b></label>
                                <input type="hidden" value="<?php//echo $campaign['cids']; ?>" id="campnm">
                            <?php //endforeach; ?>
                            <input type="hidden" value="<?php //echo $Campid; ?>" id="campaign_id" name="campaign_id">
                            </td> -->
                            <!-- <td>
                                <select style="height:34px;" class="form-control form-control-sm "  name="userstatus" id="userstatus">
                                <option value="">Select Status</option>
                                <option value="active" <?php if( isset($userstatus) && $userstatus == "active") { echo "selected" ; } ?>>Active</option>
                                    <option value="deactivated" <?php if( isset($userstatus) && $userstatus == "deactivated") { echo "selected" ; } ?>>Deactivated</option>
                                    </select>
                             </td> -->
                            <!-- <td>
                                <select style="height:34px;" class="form-control form-control-sm "  name="cid_type" id="cid_type">
                                    <option value="">Select Company</option>
                                    <option value="ME" <?php if( isset($cid_type) && $cid_type == "ME") { echo "selected" ; } ?>>ME</option>
                                    <option value="HP" <?php if( isset($cid_type) && $cid_type == "HP") { echo "selected" ; } ?>>HP</option>
                                    <option value="TMB" <?php if( isset($cid_type) && $cid_type == "TMB") { echo "selected" ; } ?>>TMB</option>
                                    </select>
                             </td>
                            
                            
                             <td>
                                <input  class="btn btn-primary" type="submit" name="submit" value="Fetch Record">
                            </td> -->
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
                                        <th><input type="checkbox" class="emailsend_all  emailclass"  onclick="toggle(this);"/>&nbsp;&nbsp;Select</th>
                                        <th>Camp Id</th>
                                        <th>Sal</th>
                                        <th>FName</th>
                                        <th>LName</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <!-- <th>Delivery Status</th> -->
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
                                        <th>Score</th>
                                        <!-- <th>Update</th> -->
                                    </tr>
                                </thead>
                                <?php 
                                $result = $users->result();
                                $i =0;
                                foreach($result as $post) {
                                
                                $i++;
                                $count = 0;
                                $total_count = 0;
                                // echo $j;
                                $total[] = 0;
                                ?>
                                 <tr>
                                        <td><input type="checkbox" class ="emailclass checkbox_emailclass" value="<?php echo $post->lmid;?>" name="delivery_final_check[]" id="delivery_final_check_<?php echo $i;?>" ><?php //echo $i;?>
                                        <input type="hidden" name="leadid" id="leadid_<?php echo $i;?>" value="<?php echo $post->lmid;?>">
                                        </td>
                                        <td><?php echo $post->cids; ?></td>
                                        <td><?php 
                                        $query = $this->db->query("SELECT sal FROM leadmaster where sal = '".$post->sal."' and lmid = '".$post->lmid."'  ");
                                        $sal_count = $query->num_rows();
                                        if($sal_count == 0){ $count++; echo "<p style='color:red'>".$post->sal."</p>";} 
                                        else { echo $post->sal;}
                                        // echo $post->sal." ". $post->fname; 
                                        ?></td>
                                        <td><?php 
                                        $query = $this->db->query("SELECT fname FROM leadmaster where fname ='".$post->fname."' and lmid = '".$post->lmid."'  ");
                                        $fname_count = $query->num_rows();
                                        if($fname_count == 0){ $count++; echo "<p style='color:red'>". $post->fname."</p>";} 
                                        else { echo $post->fname;}
                                        // echo $post->sal." ". $post->fname; 
                                        ?></td>
                                        <td><?php 
                                        $query = $this->db->query("SELECT lname FROM leadmaster where lname = '".$post->lname."' and lmid = '".$post->lmid."'");
                                        $lname_count = $query->num_rows();
                                        if($lname_count == 0){ $count++; echo "<p style='color:red'>".$post->lname."</p>";} 
                                        else { echo $post->lname;}
                                         ?></td>
                                        <td><?php 
                                        $query = $this->db->query("SELECT email FROM leadmaster where email = '".$post->email."' and lmid = '".$post->lmid."'");
                                        $email_count = $query->num_rows();
                                        if($email_count == 0){ $count++; echo "<p style='color:red'>".$post->email."</p>";} 
                                        else { echo $post->email;}
                                        ?></td>
                                        <td><?php 
                                        $query = $this->db->query("SELECT phone FROM leadmaster where phone = '".$post->phone."' and lmid = '".$post->lmid."'");
                                        $phone_count = $query->num_rows();
                                        if($phone_count == 0){ $count++; echo "<p style='color:red'>".$post->phone."</p>";} 
                                        else { echo $post->phone;}
                                         ?></td>
                                       
                                         <td><?php 
                                         $query = $this->db->query("SELECT jtitle FROM leadmaster where jtitle = '".$post->jtitle."' and lmid = '".$post->lmid."'");
                                         $jtitle_count = $query->num_rows();
                                         if($jtitle_count == 0){ $count++; echo "<p style='color:red'>".$post->jtitle."</p>";} 
                                         else { echo $post->jtitle;}
                                         ?></td>
                                         <td><?php 
                                         $query = $this->db->query("SELECT dname FROM leadmaster where dname = '".$post->dname."' and lmid = '".$post->lmid."'");
                                         $department_count = $query->num_rows();
                                         if($department_count == 0){ $count++; echo "<p style='color:red'>".$post->department."</p>";} 
                                         else { echo $post->department;}
                                         ?></td>
                                         <td><?php 
                                          $query = $this->db->query("SELECT ctyp FROM leadmaster where ctyp = '".$post->ctyp."' and lmid = '".$post->lmid."'");
                                          $cname_count = $query->num_rows();
                                          if($cname_count == 0){ $count++; echo "<p style='color:red'>".$post->cname."</p>";} 
                                          else { echo $post->cname;}
                                         ?></td>
                                         <td><?php 
                                         $query = $this->db->query("SELECT cname FROM leadmaster where cname = '".$post->cname."' and lmid = '".$post->lmid."'");
                                         $ctypname_count = $query->num_rows();
                                         if($ctypname_count == 0){ $count++; echo "<p style='color:red'>".$post->ctypname."</p>";} 
                                         else { echo $post->ctypname;}
                                         ?></td>
                                         <td><?php 
                                         $query = $this->db->query("SELECT indtry FROM leadmaster where indtry = '".$post->indtry."' and lmid = '".$post->lmid."'");
                                         $industry_count = $query->num_rows();
                                         if($industry_count == 0){ $count++; echo "<p style='color:red'>".$post->industry."</p>";} 
                                         else { echo $post->industry;}
                                         ?></td>
                                         <td><?php 
                                         $query = $this->db->query("SELECT sindtry FROM leadmaster where sindtry = '".$post->sindtry."' and lmid = '".$post->lmid."'");
                                         $subindustry_count = $query->num_rows();
                                         if($subindustry_count == 0){ $count++; echo "<p style='color:red'>".$post->subindustry."</p>";} 
                                         else { echo $post->subindustry;}
                                         ?></td>
                                         <td><?php 
                                         $query = $this->db->query("SELECT sectyp FROM leadmaster where sectyp = '".$post->sectyp."' and lmid = '".$post->lmid."'");
                                         $subindustry_count = $query->num_rows();
                                         if($subindustry_count == 0){ $count++; echo "<p style='color:red'>".$post->sector."</p>";} 
                                         else { echo $post->sector;}
                                         ?></td>
                                         <td><?php 
                                          $query = $this->db->query("SELECT empsize FROM leadmaster where empsize = '".$post->sectyp."' and lmid = '".$post->lmid."'");
                                          $subindustry_count = $query->num_rows();
                                          if($subindustry_count == 0){ $count++; echo "<p style='color:red'>".$post->empsize."</p>";} 
                                          else { echo $post->empsize;}
                                         ?></td>
                                         <td><?php 
                                         $query = $this->db->query("SELECT country FROM leadmaster where country = '".$post->country."' and lmid = '".$post->lmid."'");
                                         $subindustry_count = $query->num_rows();
                                         if($subindustry_count == 0){ $count++; echo "<p style='color:red'>".$post->countryname."</p>";} 
                                         else { echo $post->countryname;}
                                         ?></td>
                                         <td><?php 
                                         $query = $this->db->query("SELECT state FROM leadmaster where state = '".$post->state."' and lmid = '".$post->lmid."'");
                                         $state_count = $query->num_rows();
                                         if($state_count == 0){ $count++; echo "<p style='color:red'>".$post->state."</p>";} 
                                         else { echo $post->state;}
                                         ?></td>
                                         <td><?php 
                                         $query = $this->db->query("SELECT city FROM leadmaster where city = '".$post->city."' and lmid = '".$post->lmid."'");
                                         $city_count = $query->num_rows();
                                         if($city_count == 0){ $count++; echo "<p style='color:red'>".$post->city."</p>";} 
                                         else { echo $post->city;}
                                         ?></td>
                                         <td><?php 
                                         $query = $this->db->query("SELECT address FROM leadmaster where address = '".$post->address."' and lmid = '".$post->lmid."'");
                                         $address_count = $query->num_rows();
                                         if($address_count == 0){ $count++; echo "<p style='color:red'>".$post->address."</p>";} 
                                         else { echo $post->address;}
                                         ?></td>
                                         <td><?php 
                                         $query = $this->db->query("SELECT zipcode FROM leadmaster where zipcode = '".$post->zipcode."' and lmid = '".$post->lmid."'");
                                         $zipcode_count = $query->num_rows();
                                         if($zipcode_count == 0){ $count++; echo "<p style='color:red'>".$post->zipcode."</p>";} 
                                         else { echo $post->zipcode;}
                                         ?></td>
                                         <td><?php 
                                         $query = $this->db->query("SELECT domain FROM leadmaster where domain = '".$post->domain."' and lmid = '".$post->lmid."'");
                                         $domain_count = $query->num_rows();
                                         if($domain_count == 0){ $count++; echo "<p style='color:red'>".$post->domain."</p>";} 
                                         else { echo $post->domain;}
                                         ?></td>
                                         <td>
                                         <?php 
                                         $query = $this->db->query("SELECT plink FROM leadmaster where plink = '".$post->plink."' and lmid = '".$post->lmid."'");
                                         $plink_count = $query->num_rows();
                                         if($plink_count == 0){ $count++; echo "<p style='color:red'>".$post->plink."</p>";} 
                                         else { echo $post->plink;}
                                         ?>
                                         </td>
                                         <td>
                                         <?php echo $total[$i] = $count;?>
                                         </td>
                                        <!-- <td> -->
                                                <?php //if($post['status'] == 0){ ?>
                                               <!-- <a class="label label-inverse-primary enable" href='<?php echo base_url(); ?>administrator/enable/<?php echo $post->lmid; ?>?table=<?php echo base64_encode('users'); ?>'>Active</a> -->
                                                <?php //}else{ ?> 
                                                <!-- <a class="label label-inverse-warning desable" href='<?php echo base_url(); ?>administrator/desable/<?php echo $post->lmid; ?>?table=<?php echo base64_encode('users'); ?>'>Deactive</a> -->
                                                <?php //} ?>
                                                
                                                <!-- <a class="label label-inverse-danger delete" href='<?php echo base_url(); ?>administrator/delete/<?php echo $post->lmid; ?>?table=<?php echo base64_encode('users'); ?>'>Delete</a> -->
                                            
                                        <!-- </td> -->
                                        
                                    </tr>
                                <?php  }//endforeach;
                                ?>
                                <tr>
                                <td>
                                Total Score
                                </td>
                                <td>
                                <?php echo array_sum($total);?>
                                </td>
                                </tr>
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

  