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
                    <h4>Result</h4>
                </div>
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index-2.html">
                                <i class="icofont icofont-home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Result</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Result</a>
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
                                        <!-- <th><input type="checkbox" class="emailsend_all  emailclass"  onclick="toggle(this);"/>&nbsp;&nbsp;Select</th> -->
                                        <th>Sr.No.</th>
                                        <th>Sal</th>
                                        <th>FName</th>
                                        <th>LName</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <!-- <th>Alternate Phone</th> -->
                                        <th>Job Title</th>
                                        <th>Department</th>
                                        <th>Company Name</th>
                                        <th>Company Type</th>
                                        <th>Time Zone</th>
                                        <th>Industry</th>
                                        <th>SubIndustry</th>
                                        <th>Sector</th>
                                        <th>Emp Size</th>
                                        <th>Revenue</th>
                                        <th>Denomination</th>
                                        <th>Currency</th>
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
                                        <!-- <td><input type="checkbox" class ="emailclass checkbox_emailclass" value="<?php echo $post->lmid;?>" name="delivery_final_check[]" id="delivery_final_check_<?php echo $i;?>" ><?php //echo $i;?>
                                        <input type="hidden" name="leadid" id="leadid_<?php echo $i;?>" value="<?php echo $post->lmid;?>">
                                        </td> -->
                                        <!-- <td><?php //echo $post->cids; ?></td> -->
                                        <td><?php echo $i;?></td>
                                        <td><?php 
                                        $query = $this->db->query("SELECT sal FROM leadmaster where sal = '".$post->sal."' and lmid = '".$post->lmid."'  ");
                                        $sal_count = $query->num_rows();
                                        if($sal_count == 0){ $count++; echo "<p style='color:red'>".$post->sal."</p>";} 
                                        else { echo $post->sal;}
                                        $query1 = $this->db->query("SELECT sal FROM leadmaster where lmid = '".$post->lmid."'  ");
                                        $result_sal = $query1->result_array();
                                        foreach($result_sal as $result_sals) {
                                             $sal = $result_sals['sal'];
                                            echo "<p style='color:green'>".$sal."</p>";
                                        }
                                        
                                        ?></td>
                                        <td><?php 
                                        $query = $this->db->query("SELECT fname FROM leadmaster where fname ='".$post->fname."' and lmid = '".$post->lmid."'  ");
                                        $fname_count = $query->num_rows();
                                        if($fname_count == 0){ $count++; echo "<p style='color:red'>". $post->fname."</p>";} 
                                        else { echo $post->fname;}
                                        $query1 = $this->db->query("SELECT fname FROM leadmaster where lmid = '".$post->lmid."'  ");
                                        $result_fname = $query1->result_array();
                                        foreach($result_fname as $result_fnames) {
                                             $fname = $result_fnames['fname'];
                                            echo "<p style='color:green'>".$fname."</p>";
                                        } 
                                        ?></td>
                                        <td><?php 
                                        $query = $this->db->query("SELECT lname FROM leadmaster where lname = '".$post->lname."' and lmid = '".$post->lmid."'");
                                        $lname_count = $query->num_rows();
                                        if($lname_count == 0){ $count++; echo "<p style='color:red'>".$post->lname."</p>";} 
                                        else { echo $post->lname;}

                                        $query1 = $this->db->query("SELECT lname FROM leadmaster where lmid = '".$post->lmid."'  ");
                                        $result_lname = $query1->result_array();
                                        foreach($result_lname as $result_lnames) {
                                             $lname = $result_lnames['lname'];
                                            echo "<p style='color:green'>".$lname."</p>";
                                        } 
                                         ?></td>
                                        <td><?php 
                                        $query = $this->db->query("SELECT email FROM leadmaster where email = '".$post->email."' and lmid = '".$post->lmid."'");
                                        $email_count = $query->num_rows();
                                        if($email_count == 0){ $count++; echo "<p style='color:red'>".$post->email."</p>";} 
                                        else { echo $post->email;}

                                        $query1 = $this->db->query("SELECT email FROM leadmaster where lmid = '".$post->lmid."'  ");
                                        $result_email = $query1->result_array();
                                        foreach($result_email as $result_emails) {
                                             $email = $result_emails['email'];
                                            echo "<p style='color:green'>".$email."</p>";
                                        } 

                                        ?></td>
                                        <td><?php 
                                        $query = $this->db->query("SELECT phone FROM leadmaster where phone = '".$post->phone."' and lmid = '".$post->lmid."'");
                                        $phone_count = $query->num_rows();
                                        if($phone_count == 0){ $count++; echo "<p style='color:red'>".$post->phone."</p>";} 
                                        else { echo $post->phone;}

                                        $query1 = $this->db->query("SELECT phone FROM leadmaster where lmid = '".$post->lmid."'  ");
                                        $result_phone = $query1->result_array();
                                        foreach($result_phone as $result_phones) {
                                             $phone = $result_phones['phone'];
                                            echo "<p style='color:green'>".$phone."</p>";
                                        } 
                                         ?></td>
                                       <!-- <td> -->
                                       <?php 
                                        // $query = $this->db->query("SELECT altphn FROM leadmaster where altphn = '".$post->altphn."' and lmid = '".$post->lmid."'");
                                        // $altphone_count = $query->num_rows();
                                        // if($altphone_count == 0){ $count++; echo "<p style='color:red'>".$post->altphn."</p>";} 
                                        // else { echo $post->altphn;}
                                         ?>
                                         <!-- </td> -->
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
                                         $query = $this->db->query("SELECT cname FROM leadmaster where cname = '".$post->cname."' and lmid = '".$post->lmid."'");
                                          $cname_count = $query->num_rows();
                                          if($cname_count == 0){ $count++; echo "<p style='color:red'>".$post->cname."</p>";} 
                                          else { echo $post->cname;}

                                          $query1 = $this->db->query("SELECT cname FROM leadmaster where lmid = '".$post->lmid."'  ");
                                         $result_cname = $query1->result_array();
                                         foreach($result_cname as $result_cname) {
                                              $cname = $result_cname['cname'];
                                             echo "<p style='color:green'>".$cname."</p>";
                                         } 
                                         ?></td>
                                         <td><?php 
                                         $query = $this->db->query("SELECT ctyp FROM leadmaster where ctyp = '".$post->ctyp."' and lmid = '".$post->lmid."'");
                                         $ctypname_count = $query->num_rows();
                                         if($ctypname_count == 0){ $count++; echo "<p style='color:red'>".$post->ctypname."</p>";} 
                                         else { echo $post->ctypname;}

                                         $query1 = $this->db->query("SELECT ctyp FROM leadmaster where lmid = '".$post->lmid."'  ");
                                         $result_ctyp = $query1->result_array();
                                         foreach($result_ctyp as $result_ctyp) {
                                              $ctyp = $result_ctyp['ctyp'];
                                             echo "<p style='color:green'>".$ctyp."</p>";
                                         } 
                                         
                                         
                                         ?></td>
                                          <td><?php 
                                         $query = $this->db->query("SELECT timez FROM leadmaster where timez = '".$post->timez."' and lmid = '".$post->lmid."'");
                                         $timez_count = $query->num_rows();
                                         if($timez_count == 0){ $count++; echo "<p style='color:red'>".$post->zonename."</p>";} 
                                         else { echo $post->zonename;}
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

                                         $query1 = $this->db->query("SELECT sectyp FROM leadmaster where lmid = '".$post->lmid."'  ");
                                          $result_sectyp = $query1->result_array();
                                          foreach($result_sectyp as $result_sectyp) {
                                               $sectyp = $result_sectyp['sectyp'];
                                                if($sectyp == 0){
                                                    echo "<p style='color:green'> Unknown </p>";
                                                } else if ($sectyp == '1'){
                                                    echo "<p style='color:green'> Public </p>";
                                                }else if($sectyp == '2'){
                                                    echo "<p style='color:green'> Private </p>";  
                                                }else if($sectyp == '3'){
                                                    echo "<p style='color:green'> Government </p>";  
                                                }else if($sectyp == '4'){
                                                    echo "<p style='color:green'> Non - Profit </p>";  
                                                }
                                            }
                                         ?></td>
                                         <td><?php 
                                          $query = $this->db->query("SELECT empsize FROM leadmaster where empsize = '".$post->empsize."' and lmid = '".$post->lmid."'");
                                          $subindustry_count = $query->num_rows();
                                          if($subindustry_count == 0){ $count++; echo "<p style='color:red'>".$post->empsize."</p>";} 
                                          else { echo $post->empsize;}

                                         $query1 = $this->db->query("SELECT empsize FROM leadmaster where lmid = '".$post->lmid."'  ");
                                         $result_empsize = $query1->result_array();
                                         foreach($result_empsize as $result_empsize) {
                                              $empsize = $result_empsize['empsize'];
                                             echo "<p style='color:green'>".$empsize."</p>";
                                         } 
                                         ?></td>
                                          <td><?php 
                                          $query = $this->db->query("SELECT arevenue FROM leadmaster where arevenue = '".$post->arevenue."' and lmid = '".$post->lmid."'");
                                          $arevenue_count = $query->num_rows();
                                          if($arevenue_count == 0){ $count++; echo "<p style='color:red'>".$post->arevenue."</p>";} 
                                          else { echo $post->arevenue;}

                                          $query1 = $this->db->query("SELECT arevenue FROM leadmaster where lmid = '".$post->lmid."'  ");
                                          $result_arevenue = $query1->result_array();
                                          foreach($result_arevenue as $result_arevenue) {
                                               $arevenue = $result_arevenue['arevenue'];
                                              echo "<p style='color:green'>".$arevenue."</p>";
                                          } 

                                         ?></td>
                                         <td><?php 
                                          $query = $this->db->query("SELECT mlbl FROM leadmaster where mlbl = '".$post->mlbl."' and lmid = '".$post->lmid."'");
                                          $denomination_count = $query->num_rows();
                                          if($denomination_count == 0){ $count++; echo "<p style='color:red'>".$post->denomination."</p>";} 
                                          else { echo $post->denomination;}

                                          $query1 = $this->db->query("SELECT mlbl FROM leadmaster where lmid = '".$post->lmid."'  ");
                                          $result_mlbl = $query1->result_array();
                                          foreach($result_mlbl as $result_mlbl) {
                                               $mlbl = $result_mlbl['mlbl'];
                                                if($mlbl == 0){
                                                    echo "<p style='color:green'> Thousands </p>";
                                                } else if ($mlbl == '1'){
                                                    echo "<p style='color:green'> Millions </p>";
                                                }else if($mlbl == '2'){
                                                    echo "<p style='color:green'> Billions </p>";  
                                                }else if($mlbl == '3'){
                                                    echo "<p style='color:green'> Trillions </p>";  
                                                }
                                            }
                                         ?></td>
                                         <td><?php 
                                          $query = $this->db->query("SELECT curr FROM leadmaster where curr = '".$post->curr."' and lmid = '".$post->lmid."'");
                                          $curr_count = $query->num_rows();
                                          if($curr_count == 0){ $count++; echo "<p style='color:red'>".$post->currab."</p>";} 
                                          else { echo $post->currab;}
                                         ?></td>
                                         <td><?php 
                                         $query = $this->db->query("SELECT country FROM leadmaster where country = '".$post->country."' and lmid = '".$post->lmid."'");
                                         $subindustry_count = $query->num_rows();
                                         if($subindustry_count == 0){ $count++; echo "<p style='color:red'>".$post->countryname."</p>";} 
                                         else { echo $post->countryname;}

                                         $query1 = $this->db->query("SELECT countryname FROM country join leadmaster on 
                                         country.countrycd = leadmaster.country
                                          where  leadmaster.lmid = '".$post->lmid."'");
                                         $result_countryname = $query1->result_array();
                                         foreach($result_countryname as $result_countryname) {
                                              $countryname = $result_countryname['countryname'];
                                             echo "<p style='color:green'>".$countryname."</p>";
                                         } 


                                         ?></td>
                                         <td><?php 
                                         $query = $this->db->query("SELECT state FROM leadmaster where state = '".$post->state."' and lmid = '".$post->lmid."'");
                                         $state_count = $query->num_rows();
                                         if($state_count == 0){ $count++; echo "<p style='color:red'>".$post->state."</p>";} 
                                         else { echo $post->state;}
                                         
                                         $query1 = $this->db->query("SELECT state FROM leadmaster where lmid = '".$post->lmid."'  ");
                                         $result_state = $query1->result_array();
                                         foreach($result_state as $result_state) {
                                              $state = $result_state['state'];
                                             echo "<p style='color:green'>".$state."</p>";
                                         } 
                                         ?></td>
                                         <td><?php 
                                         $query = $this->db->query("SELECT city FROM leadmaster where city = '".$post->city."' and lmid = '".$post->lmid."'");
                                         $city_count = $query->num_rows();
                                         if($city_count == 0){ $count++; echo "<p style='color:red'>".$post->city."</p>";} 
                                         else { echo $post->city;}

                                         $query1 = $this->db->query("SELECT city FROM leadmaster where lmid = '".$post->lmid."'  ");
                                         $result_city = $query1->result_array();
                                         foreach($result_city as $result_city) {
                                              $city = $result_city['city'];
                                             echo "<p style='color:green'>".$city."</p>";
                                         } 
                                         ?></td>
                                         <td><?php 
                                         $query = $this->db->query("SELECT address FROM leadmaster where address = '".$post->address."' and lmid = '".$post->lmid."'");
                                         $address_count = $query->num_rows();
                                         if($address_count == 0){ $count++; echo "<p style='color:red'>".$post->address."</p>";} 
                                         else { echo $post->address;}

                                         $query1 = $this->db->query("SELECT address FROM leadmaster where lmid = '".$post->lmid."'  ");
                                         $result_address = $query1->result_array();
                                         foreach($result_address as $result_address) {
                                              $address = $result_address['address'];
                                             echo "<p style='color:green'>".$address."</p>";
                                         } 
                                         ?></td>
                                         <td><?php 
                                         $query = $this->db->query("SELECT zipcode FROM leadmaster where zipcode = '".$post->zipcode."' and lmid = '".$post->lmid."'");
                                         $zipcode_count = $query->num_rows();
                                         if($zipcode_count == 0){ $count++; echo "<p style='color:red'>".$post->zipcode."</p>";} 
                                         else { echo $post->zipcode;}

                                         
                                         $query1 = $this->db->query("SELECT zipcode FROM leadmaster where lmid = '".$post->lmid."'  ");
                                         $result_zipcode = $query1->result_array();
                                         foreach($result_zipcode as $result_zipcode) {
                                              $zipcode = $result_zipcode['zipcode'];
                                             echo "<p style='color:green'>".$zipcode."</p>";
                                         } 
                                         ?></td>
                                         <td><?php 
                                         $query = $this->db->query("SELECT domain FROM leadmaster where domain = '".$post->domain."' and lmid = '".$post->lmid."'");
                                         $domain_count = $query->num_rows();
                                         if($domain_count == 0){ $count++; echo "<p style='color:red'>".$post->domain."</p>";} 
                                         else { echo $post->domain;}

                                         $query1 = $this->db->query("SELECT domain FROM leadmaster where lmid = '".$post->lmid."'  ");
                                         $result_domain = $query1->result_array();
                                         foreach($result_domain as $result_domain) {
                                              $domain = $result_domain['domain'];
                                             echo "<p style='color:green'>".$domain."</p>";
                                         } 
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
                                         <?php echo $total[$i] = 23-$count;?>
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
                                <p style="color:black;font-weight:bold;">Total Score</p>
                                </td>
                                <td>
                                <p style="color:black;font-weight:bold;"><?php if(isset($total)) { echo array_sum($total);}?></p>
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

  