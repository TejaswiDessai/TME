<!-- Developed by Tejaswi
Form is is regarding adding a lead with a validations.
If data id already in leadmaster then we can update lead using this form.
This is also known as DC form

This is for candidate
-->

<style>
    label.error {
    color: red;
    font-size: 12px;
    display: block;
    margin-top: 5px;
    }
    .fielderrors {
    color: red;
    font-size: 12px;
    display: block;
    margin-top: 5px;
    }
   
    .select2-container--default .select2-selection--multiple {
    padding:0px 0px 0px 0px;
    }
    .select2-container--default .select2-selection--single .select2-selection__rendered{
      line-height :15px;
    }
    .select2-container--default .select2-selection--single .select2-selection__rendered .erro{
      /* line-height :15px; */
      background-color: black;
    }
    .select2-container--default .select2-selection--single .select2-selection__arrow {
    top: 3px;
    right: 15px;
}
    

.tooltips {
  position: relative;
  display: inline-block;
  border-bottom: 1px dotted black;
}
.tooltips .tooltiptext {
  visibility: hidden;
  width: 120px;
  background-color: #555;
  color: #fff;
  text-align: center;
  border-radius: 6px;
  padding: 5px 0;
  position: absolute;
  z-index: 1;
  bottom: 125%;
  left: 50%;
  margin-left: -60px;
  opacity: 0;
  transition: opacity 0.3s;
}

.tooltips .tooltiptext::after {
  content: "";
  position: absolute;
  top: 100%;
  left: 50%;
  margin-left: -5px;
  border-width: 5px;
  border-style: solid;
  border-color: #555 transparent transparent transparent;
}

.tooltips:hover .tooltiptext {
  visibility: visible;
  opacity: 1;
  font-size: 12px;
  padding:5px;
}
 </style>
<script>
var base_url = "<?php echo base_url() ?>";
// $(document).ready(function () {
//     // Handler for .ready() called.
//     $('html, body').animate({
//         scrollTop: $('#camp_form').offset().top
//     }, 'slow');
// });

$(document).ready(function() {
 
 $(window).keydown(function(event){
   if(event.keyCode == 13) { // disable Enter key on form submission
     event.preventDefault();
     return false;
   }
 });

 $('#pcomt').keydown(function(event){
   if(event.keyCode == 51) { // disable # key on form submission
     event.preventDefault();
     return false;
   }
 });
});

//below code for retreive button on change on rect type
$(document).ready(function() { 
  var sbsvtag1 = $('#sbsvtag').val();
  if (sbsvtag1 > 0) {
    $('.comt').show();
  }
  $(".aumdis").attr("disabled", true);   // aum disable
  $('.commentvisible').hide();
  
  
 
    $('#ctype').bind('change', function() {
      var value = $(this).val();
      if (value == 1 ||value == 10|| value == 4 )  { // comp type selected aum enable
        $(".aumdis").attr("disabled", false);  
           
        }else{
          $(".aumdis").val('');
          $(".aumdis").attr("disabled", true);  
            
        }
    })


});

</script>
<form id="basic-form" method="POST" enctype="multipart/form-data">
<div class="page-header">
    <div class="page-header-title col-sm-12">
        <h4>Add Test Lead</h4>
            <div class="form-group row"> 
               <div class="col-sm-2" style="margin-left: 165px;margin-top: -25px;">
                              
                  </div> 
                <div class="col-sm-4" style="margin-top: -20px;">
                    <?php foreach ($campaigns as $campaign): ?>
                   
                    <label class="col-lable"><b>Prospect Link:
                      <?php foreach ($leadmaster as $ldmster1){
                       
                      } ?> <a class="btn btn-primary leaddisplay" target="_blank"  href="<?php echo $ldmster1['plink']; ?>"> Go to link </a></b></label>
                    <?php endforeach; ?>
                </div> 
                <div class="col-sm-4" style="margin-top: -25px;">

<progress value="<?php  print_r($_SESSION['login_time_stamp']) ?>" max="<?php  print_r($_SESSION['login_time_stamp']) ?>" id="pageBeginCountdown"></progress>
    <p> test duration:20 Minutes</p><p> <span style="color:#ee5656" id="pageBeginCountdownText"> </span> seconds left</p>
                </div>
            </div>          
    </div>

     <?php foreach ($campaigns as $campaign): ?>      
      <?php endforeach; ?>

     <?php foreach ($leadmaster as $ldmster): 
      // print_r($ldmster['dvrejectreason']);
      $dvrejectreason = explode(',',$ldmster['dvrejectreason']);  
     
      ?>
    
</div>
<!-- Page header end -->
<!-- Page body start -->
<div class="page-body">
    <div class="row">
        <div class="col-sm-12">
            <!-- Basic Form Inputs card start -->
            <div class="card" id="camp_form">
                <div class="card-header">
                  <div class="form-group row">       
                  </div>
                </div>
                
                <div class="card-block">
                    <div class="col-sm-8">
                        <div class="validation_errors_alert">

                        </div>
                    </div>
                    <div class="col-sm-12" >
                        <!-- <?php 
                        // echo form_open_multipart('campaigns/add_campaign');
                         ?> -->
                        <div class="form-group row">
                            <div class="col-sm-1">
                                 <select name="sal" id="sal"  class="form-control  form-control-sm cdqadisable">
                                 <option value="Mr">Mr.</option>
                                      <option value="Ms">Ms.</option>
                                      <option value="Mrs">Mrs.</option>
                                      <option value="Dr">Dr.</option>
                                      <option value="Other">Other</option>
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <input type="text"  name="fname" id="fname"  placeholder="First Name" autocomplete = "off"  class="form-control form-control-sm cdqadisable  
                                <?php
                                 if(isset($ldmster) && in_array('fname',$dvrejectreason)) { echo "" ; } 
                                 ?>"                             
                                 value ="" >
                                <input type="hidden" name="inclistnew" id="inclistnew" value="<?php echo $campaign['inclistnew']; ?>">
                                <span style='color:#FF0000' id="fname_msg"></span>
                            </div>
                            
                            <div class="col-sm-2">
                                <input type="text"  name="lname" id="lname" autocomplete = "off" placeholder="Last Name"
                                 value =""   class="form-control form-control-sm cdqadisable
                                <?php
                                 if(isset($ldmster) && in_array('lname',$dvrejectreason)) { echo "" ; } 
                                 ?>">
                                <span style='color:#FF0000' id="lname_msg"></span>
                            </div>
                            <div class="col-sm-3">
                                <input type="text"  name="jtitle" id="jtitle" autocomplete = "off"  placeholder="Job Title"
                                 value =""  class="form-control form-control-sm cdqadisable
                                <?php
                                 if(isset($ldmster) && in_array('jtitle',$dvrejectreason)) { echo "" ; } 
                                 ?>">
                            </div>
                            <div class="col-sm-2">
                                <select class="form-control form-control-sm cdqadisable" name="jlevel" id="jlevel">
                                  <option value="">Job Level</option>
                                  <?php foreach ($joblevel as $joblevel): ?>
                                      <option value="<?php echo $joblevel['joblids']; ?>" ><?php echo $joblevel['joblevel']; ?></option>
                                  <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-sm-2 <?php
                                 if(isset($ldmster) && in_array('desid',$dvrejectreason)) { echo "" ; } 
                                 ?>">
                             
                                <select class="js-example-basic-single <?php
                                 if(isset($ldmster) && in_array('desid',$dvrejectreason)) { echo "" ; } 
                                 ?>" name="desid" id="desid">
                                <option value="">Designation</option>
                                <?php foreach ($designation as $designation): ?>
                                    <option value="<?php echo $designation['jid']; ?>" ><?php echo $designation['joblist']; ?></option>
                                <?php endforeach; ?>  
                                </select>
                            </div>
                        </div>

                        <hr>
                        <div class="form-group row">
                          <div class="col-sm-2  <?php
                                  if(isset($ldmster) && in_array('dcd',$dvrejectreason)) { echo "" ; } 
                                  ?>">
                                  <select class="js-example-basic-single <?php
                                  if(isset($ldmster) && in_array('dcd',$dvrejectreason)) { echo "" ; } 
                                  ?>" name="dcd" id="dcd">
                                      <option value=""> Department</option>
                                  <?php foreach ($departments as $dept): ?>
                                      <option value="<?php echo $dept['dcd']; ?>" ><?php echo $dept['department']; ?></option>
                                  <?php endforeach; ?>
                                  </select>
                            </div> 
                            <div class="col-sm-2">
                                <div class="newsletter-signup">
                                <input type="text"  name="email" id="email" autocomplete = "off" value =""  placeholder="Email"  class="form-control form-control-sm cdqadisable
                                <?php
                                 if(isset($ldmster) && in_array('email',$dvrejectreason)) { echo "" ; } 
                                 ?>">
                               </div>
                                <span style='color:#FF0000' id="email_msg"></span>
                            </div>
                            <div class="col-sm-2">
                                <input type="text"  name="phone" id="phone" autocomplete = "off" value ="" placeholder="Phone" maxlength="15"  class="form-control form-control-sm cdqadisable
                                <?php
                                 if(isset($ldmster) && in_array('phone',$dvrejectreason)) { echo "" ; } 
                                 ?>">
                                <span style='color:#FF0000' id="phone_msg"></span>
                            </div>
                            <div class="col-sm-2">
                                <input type="text"  name="altphn" id="altphn" autocomplete = "off"  value ="" placeholder="Alternate Phone Number" maxlength="10"  class="form-control form-control-sm cdqadisable
                                <?php
                                 if(isset($ldmster) && in_array('altphn',$dvrejectreason)) { echo "" ; } 
                                 ?>">
                            </div>
                            
                            <div class="col-sm-2">
                                <input type="text"  name="phext" id="phext" autocomplete = "off" 
                                 value ="" placeholder="Extension" maxlength="5"  class="form-control form-control-sm cdqadisable
                                <?php
                                 if(isset($ldmster) && in_array('phext',$dvrejectreason)) { echo "" ; } 
                                 ?>">
                            </div>
                            <div class="col-sm-2">
                            <div class="tooltips">
                            <?php if($ldmster['plink'] != ""){ ?>
                              <a href="<?php echo $ldmster['plink'] ?>" target="_blank" style="float:right"><i class="icofont icofont-link"></i></a>
                            <?php } else{ ?>
                              <a style="float:right"><i class="icofont icofont-unlink"></i></a>     
                            <?php } ?>
                                <input type="text" disabled="disabled" name="plink" id="plink" autocomplete = "off"  placeholder="Prospect Link"  class="form-control form-control-sm 
                                <?php
                                 if(isset($ldmster) && in_array('plink',$dvrejectreason)) { echo "" ; } 
                                 ?>" value ="<?php if(isset($ldmster)){  echo $ldmster['plink']; }?>" >
                               
                                <span style='color:#FF0000' id="url_msg"></span>
                                <span class="tooltiptext"> Prospect Link<span>
                            </div>
                            </div>
                      </div>
         <hr>
                        <div class="form-group row">
                              <!-- <div class="col-sm-2">
                               <select name="linetype" id="linetype"  class="form-control  form-control-sm cdqadisable <?php
                                 if(isset($ldmster) && in_array('linetype',$dvrejectreason)) { echo "" ; } 
                                 ?>">
                                     <option value="0">Line Type</option>
                                     <option value="0">unknown</option>
                                     <option value="1">Direct</option>
                                     <option value="2">Board</option>  
                               </select>
                              
                           </div> -->
                              <div class="col-sm-2 <?php
                                 if(isset($ldmster) && in_array('company_name',$dvrejectreason) && (!empty($comp_list))) { echo "" ; } 
                                 ?>">
                                <div class="compcheck">

                                <?php if(!empty($comp_list)) { ?>
                                 <select name="company_name" id="company_name"   class="js-example-basic-single"> 
                                     <option value="">Company Name</option>
                                     <?php foreach ($comp_list as $comp_list): ?>
                                    <option value="<?php echo $comp_list['companynms']; ?>" ><?php echo $comp_list['companynms']; ?></option>
                                <?php endforeach; ?> 
                               </select>
                               <?php } else{ ?>
                                <input type="text" autocomplete = "off"   name="company_name" id="company_name"  placeholder="Company Name"  class="form-control form-control-sm cdqadisable <?php
                                 if(isset($ldmster) && in_array('company_name',$dvrejectreason)) { echo "" ; } 
                                 ?>"  value ="">
                             <?php  } ?>

                                </div>
                                <span style='color:#FF0000' id="comp_msg"></span>
                              </div> 

                            <div class="col-sm-2">
                                <input type="text"  name="address" autocomplete = "off" id="address"  placeholder="Address" 
                                 value =""
                                 class="form-control form-control-sm cdqadisable <?php
                                 if(isset($ldmster) && in_array('address',$dvrejectreason)) { echo "" ; } 
                                 ?>">
                           </div>
                           <div class="col-sm-2">
                                <input type="text"  name="city" id="city" autocomplete = "off"  placeholder="City" 
                                value =""   class="form-control form-control-sm cdqadisable
                                <?php
                                 if(isset($ldmster) && in_array('city',$dvrejectreason)) { echo "" ; } 
                                 ?>">
                           </div>
                           <div class="col-sm-2">
                                <input type="text"  name="state" id="state" autocomplete = "off"   placeholder="State"
                                 value ="" class="form-control form-control-sm cdqadisable
                                <?php
                                 if(isset($ldmster) && in_array('state',$dvrejectreason)) { echo "" ; } 
                                 ?>">
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <input type="text"  name="zip_code" id="zip_code" autocomplete = "off"  placeholder="Zip Code" 
                                value ="" class="form-control form-control-sm cdqadisable
                                <?php
                                 if(isset($ldmster) && in_array('zip_code',$dvrejectreason)) { echo "" ; } 
                                 ?>">
                           </div>
                           <div class="col-sm-2 <?php
                                  if(isset($ldmster) && in_array('country_id',$dvrejectreason)) { echo "" ; } 
                                  ?>">
                                      <select class="js-example-basic-single <?php
                                  if(isset($ldmster) && in_array('country_id',$dvrejectreason)) { echo "" ; } 
                                  ?>" name="country_id" id="country_id">
                                      <option value="">Countries</option>
                                  <?php foreach ($countriesofcampaign as $countriesofcampaign): ?>
                                      <option value="<?php echo $countriesofcampaign['countrycd']; ?>">
                                      <?php echo $countriesofcampaign['countryname']; ?></option>
                                  <?php endforeach; ?>
                                  </select>
                                  <span style='color:#FF0000' id="country_id_msg"></span>
                              </div>
                        </div>
                       <hr>

                        <div class="form-group row">
                            
                            
                            <div class="col-sm-2 <?php
                                 if(isset($ldmster) && in_array('timezone',$dvrejectreason)) { echo "" ; } 
                                 ?>">
                              <select class="js-example-basic-single <?php
                                 if(isset($ldmster) && in_array('timezone',$dvrejectreason)) { echo "" ; } 
                                 ?>"  name="timezone" id="timezone">
                            <?php  if(!isset($ldmster['lmid'])){ ?>
                              <option value="">Timezone</option>
                            <?php } else{ ?>
                             <option value="">Timezone</option>
                              <?php foreach ($timezones as $tz):
                                 ?>
                                    <option value="<?php echo $tz['zids']; ?>" ><?php echo $tz['abbrev']; ?></option>
                                <?php endforeach;  }?>
                                </select>
                                <span style='color:#FF0000' id="timezone_msg"></span>
                            </div>

                            <div class="col-sm-2">
                               <select name="ctype" id="ctype"  class="form-control  form-control-sm cdqadisable <?php
                                 if(isset($ldmster) && in_array('ctype',$dvrejectreason)) { echo "" ; } 
                                 ?>"> 
                                     <option value="0">Company Type</option>
                                     <?php foreach ($comptype as $comptype): ?>
                                    <option value="<?php echo $comptype['ctypid']; ?>" >
                                    <?php echo $comptype['ctypname']; ?></option>
                                <?php endforeach; ?> 
                               </select>
                           </div>
                            <!-- toolbar options -->
                              <div id="toolbar-options" class="hidden">
                                <a href="#myModalemail" data-target="#myModalemail" data-toggle="modal"><i class="icofont icofont-info-circle"></i></a>
                              </div>
                          
                            <div class="col-sm-2  <?php
                                 if(isset($ldmster) && in_array('industrycd',$dvrejectreason)) { echo "" ; } 
                                 ?>">
                                  <div data-toolbar="user-options"  id="info-toolbar">
                              <select class="js-example-basic-single <?php
                                 if(isset($ldmster) && in_array('industrycd',$dvrejectreason)) { echo "" ; } 
                                 ?>"  name="industrycd" id="industrycd">
                              <option value="">Industry</option>
                              <?php foreach ($industries as $industry): ?>
                                    <option value="<?php echo $industry['industrycd']; ?>"><?php echo $industry['industry']; ?></option>
                                <?php endforeach; ?>
                                </select>
                                <span style='color:#FF0000' id="industry_id_msg"></span>
                            </div>
                           </div>      
                            
                            <div class="col-sm-2 <?php
                                 if(isset($ldmster) && in_array('subindustrycd',$dvrejectreason)) { echo "" ; } 
                                 ?>">
                                   <div data-toolbar="user-options"  id="grow-toolbar">
                                <select class="js-example-basic-single  <?php
                                 if(isset($ldmster) && in_array('subindustrycd',$dvrejectreason)) { echo "" ; } 
                                 ?>" name="subindustrycd" id="subindustrycd">
                                <option value="">Sub Industry</option>
                                <?php foreach ($industriessub as $sub): ?>
                                    <option value="<?php echo $sub['subindustrycd']; ?>" >
                                    <?php echo $sub['subindustry']; ?></option>
                                <?php endforeach; ?>
                                </select>
                                <span style='color:#FF0000' id="subindustry_id_msg"></span>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <select class="form-control form-control-sm cdqadisable <?php
                                 if(isset($ldmster) && in_array('sectyp',$dvrejectreason)) { echo "" ; } 
                                 ?>" name="sectyp" id="sectyp">                                  
                                    <option value="0">Sector Type</option>
                                    <option value="0" >Unknown</option>
                                    <option value="1" >Public</option>
                                    <option value="2">Private</option>
                                    <option value="3">Government</option>
                                    <option value="4">Non-Profit </option>
                               </select>
                            </div>

                            <div class="col-sm-2">
                              <div class="tooltips">
                                <input  type="text" autocomplete = "off"  name="empsize" id="empsize" maxlength="6" 
                                value ="" placeholder="Actual Employee Size"  
                                      class="form-control form-control-sm cdqadisable <?php
                                      if(isset($ldmster) && in_array('empsize',$dvrejectreason)) { echo "" ; } 
                                      ?>">
                                      <span class="tooltiptext"> Select range  between <?php echo $campaign['emplbnd']; ?> & <?php echo $campaign['empubnd']; ?></span>
                              </div>
                                <span style='color:#FF0000' id="empsize_msg"></span>
                                    
                            </div>
                        </div>
                <hr>
                    <div class="form-group row">
                        
                            <div class="col-sm-2">
                              <div class="tooltips">
                                <input type="text" autocomplete = "off"  name="arevenue" id="arevenue" value =""  maxlength="15" placeholder="Actual Revenue Size" 
                                 class="form-control form-control-sm cdqadisable <?php
                                 if(isset($ldmster) && in_array('arevenue',$dvrejectreason)) { echo "" ; } 
                                 ?>">
                                
                                <span class="tooltiptext"> Select range  between <?php echo $campaign['revlbnd']; ?> <?php echo $campaign['revlbdim']; ?> 
                          & <?php echo $campaign['revubnd']; ?> <?php echo $campaign['revubdim']; ?></span>
                              </div>
                                <span style='color:#FF0000' id="revsize_msg"></span>
                            </div>
                            
                            
                            <div class="col-sm-2">
                                <select class="form-control form-control-sm cdqadisable <?php
                                 if(isset($ldmster) && in_array('mlbl',$dvrejectreason)) { echo "" ; } 
                                 ?>" name="mlbl" id="mlbl">
                                
                               
                                    <option value="0">K</option>
                                   <option value="1">M</option>
                                    <option value="2">B</option>
                                    <option value="3">T</option>
                                    </select>
                            </div>          
                            <div class="col-sm-2">
                                <select class="form-control form-control-sm cdqadisable <?php
                                 if(isset($ldmster) && in_array('curr',$dvrejectreason)) { echo "" ; } 
                                 ?>" name="curr" id="curr">
                                    <option value="1">USD</option>                                  
                                <?php foreach ($currency as $currency): ?>
                                    <option value="<?php echo $currency['currid']; ?>"  ><?php echo $currency['currab']; ?></option>
                                <?php endforeach; ?>
                                   </select>
                                

                            </div>          
                            <div class="col-sm-2 <?php
                                 if(isset($ldmster) && in_array('domain',$dvrejectreason) && (!empty($domain))) { echo "" ; } 
                                 ?>">
                                 <div class="tooltips">
                                 <!-- <?php //if($ldmster['domain'] != ""){ ?>
                                  <a href="" target="_blank" style="float:right"><i class="icofont icofont-link"></i></a>
                                  <?php //} else{ ?>
                                    <a style="float:right"><i class="icofont icofont-unlink"></i></a>     
                                  <?php// } ?> -->
                                <div class="domaincheck ">

                                <?php if(!empty($domain)) { ?>
                                 <select name="domain" id="domain"   class="js-example-basic-single"> 
                                     <option value="">Domain</option>
                                     <?php foreach ($domain as $domain): ?>
                                    <option value=""><?php echo $domain['domainnms']; ?></option>
                                <?php endforeach; ?> 
                               </select>
                               <?php } else{ ?>
                                <input type="text" autocomplete = "off"  value =""   name="domain" id="domain"  placeholder="Domain" value="" 
                                 class="form-control form-control-sm cdqadisable  <?php
                                 if(isset($ldmster) && in_array('domain',$dvrejectreason)) { echo "" ; } 
                                 ?>">
                                  <span class="tooltiptext"> Domain<span>
                             <?php  } ?>
                                </div>
                                </div>
                                <span style='color:#FF0000' id="domain_msg"></span>
                              </div>
                            
                            <div class="col-sm-2">
                            <div class="tooltips">
                            <?php if($ldmster['empszlink'] != ""){ ?>
                              <a href="<?php if($ldmster['empszlink'] != ""){ echo $ldmster['empszlink']; } else{  echo "#"; } ?>" target="_blank" style="float:right"><i class="icofont icofont-link"></i></a>
                                <?php } else{ ?>
                                <a style="float:right"><i class="icofont icofont-unlink"></i></a>       
                                <?php } ?>
                                <input type="text" disabled="disabled" autocomplete = "off"  value ="<?php if(isset($ldmster)){  echo $ldmster['empszlink']; }?>"  name="empszlink" id="empszlink" value=""   placeholder="Employee Size Link" 
                                 class="form-control form-control-sm  <?php
                                 if(isset($ldmster) && in_array('empszlink',$dvrejectreason)) { echo "" ; } 
                                 ?>">
                                 <span class="tooltiptext"> Emp Size Link<span>
                            </div>
                            </div>
                            <div class="col-sm-2 ">
                            <div class="tooltips">
                                  <?php if($ldmster['indlink'] != ""){ ?>
                                    <a href="<?php echo $ldmster['indlink'];?>" target="_blank" style="float:right"><i class="icofont icofont-link"></i></a>
                                      <?php } else { ?>
                                        <a style="float:right"><i class="icofont icofont-unlink"></i></a>       
                                    <?php  } ?>
                                    <input type="text" disabled="disabled" autocomplete = "off"  value ="<?php if(isset($ldmster)){  echo $ldmster['indlink']; }?>"  name="indlink" 
                                    id="indlink"  placeholder="Industry Link" value="" class="form-control form-control-sm <?php
                                    if(isset($ldmster) && in_array('indlink',$dvrejectreason)) { echo "" ; } 
                                    ?>">
                                      <span class="tooltiptext"> Industry Link<span>
                                </div>
                            </div>


                           
                        </div>
                        
                        <hr>
                        <div class="form-group row">
                           
                        
                            <div class="col-sm-2">
                            <div class="tooltips">
                            <?php if(isset($ldmster['revszlink']) && $ldmster['revszlink'] != "NA"){ ?>
                                <a href=" <?php echo $ldmster['revszlink']; ?>" target="_blank" style="float:right"><i class="icofont icofont-link"></i></a>
                                  <?php } else{ ?>
                                      <a style="float:right"><i class="icofont icofont-unlink"></i></a>
                                <?php  } ?>
                                <input type="text"  disabled="disabled" autocomplete = "off"   name="revszlink" id="revszlink" value ="<?php if(isset($ldmster)){  echo $ldmster['revszlink']; }?>"     placeholder="Revenue Size Link"  
                                class="form-control form-control-sm revsizehide <?php
                                 if(isset($ldmster) && in_array('revszlink',$dvrejectreason)) { echo "" ; } 
                                 ?>">
                                  <span class="tooltiptext"> Revenue Size Link<span>
                            </div>
                            </div>
                            <div class="col-sm-2">
                            <div class="tooltips">
                            <?php if($ldmster['othrlink'] != ""){ ?>
                                <!-- <a href="<?php //if($ldmster['othrlink'] != ""){ echo $ldmster['othrlink']; } else{  echo "#"; } ?>" target="_blank" style="float:right"><i class="icofont icofont-link"></i></a> -->
                                <a href="<?php echo $ldmster['othrlink']; ?>" target="_blank" style="float:right"><i class="icofont icofont-link"></i></a> 
                                  <?php } else{ ?>
                                    <a style="float:right"><i class="icofont icofont-unlink"></i></a>
                                  <?php } ?>
                                <input disabled="disabled" type="text" autocomplete = "off"  name="othrlink" id="othrlink" value ="<?php if(isset($ldmster)){  echo $ldmster['othrlink']; }?>" placeholder="Other Link"  
                                class="form-control form-control-sm <?php
                                 if(isset($ldmster) && in_array('othrlink',$dvrejectreason)) { echo "" ; } 
                                 ?>">
                                   <span class="tooltiptext"> Other Link<span>
                            </div>
                            </div>
                            <!-- <div class="col-sm-2">
                                <select class="form-control form-control-sm"  name="emailver" id="emailver">
                                    <option value="0">Email Verification</option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <input type="text" autocomplete = "off"  name="aum" id="aum" 
                                value ="<?php //if(isset($ldmster)){  echo $ldmster['aum']; }?>" placeholder="Asset Under Management" 
                                 class="form-control form-control-sm aumdis <?php
                                 //if(isset($ldmster) && in_array('aum',$dvrejectreason)) { echo "" ; } 
                                 ?>">
                            </div> -->
                            <!-- <div class="col-sm-2">
                                <select class="form-control form-control-sm commentvisible <?php
                                //  if(isset($ldmster) && in_array('assetid',$dvrejectreason)) { echo "" ; } 
                                 ?>" name="assetid" id="assetid">
                                    <option value="0">Asset</option>
                                    <?php //foreach ($assetitle as $assetitle): ?>
                                    <option value="<?php //echo $assetitle['assetid']; ?>"><?php //echo $assetitle['title']; ?></option>
                                <?php //endforeach; ?>
                                   </select>
                            </div>  -->
                        </div>
                        <hr>
                     
                        <br>

                        
                        <input type = hidden name="campaign_id" id="campaign_id" value="<?php echo $campaign['cnid']; ?>">
                        <input type = hidden name="campaign_idcids" id="campaign_idcids" value="<?php echo $campaign['cids']; ?>">
                        
                       
                        <?php if(isset($ldmster) && $ldmster != 1 ){ ?> 
                          <!-- <div class="form-group row" >
                             <div class="col-sm-12  comt">
                                <label class="col-lable"><b>Comment</b></label>
                                <input type="text" autocomplete = "off"  name="pcomt" id="pcomt"  placeholder="Comment"  class="form-control form-control-sm" 
                                value="">
                            </div> 
                         </div> -->
                        
                          <input type = hidden name="lmid" id="lmid" value="<?php echo $ldmster['lmid']; ?>">
                          <input type = hidden name="emp_id" id="emp_id" value="<?php echo  $_SESSION['empcode']; ?>">
                          <input type = hidden name="sbsvtag" id="sbsvtag" value="<?php echo $ldmster['sbsvtag']; ?>">
                          <input type = hidden name="stdti" id="stdti" value="<?php echo $ldmster['stdti']; ?>">
                          <input type = hidden name="stagtidi" id="stagtidi" value="<?php echo $ldmster['stagtidi']; ?>">
                          <input type = hidden name="dvsbtg" id="dvsbtg" value="<?php echo $ldmster['dvsbtg']; ?>">
                          <input type = hidden name="dvrejtg" id="dvrejtg" value="<?php echo $ldmster['dvrejtg']; ?>">
                          
                          <input type = hidden name="stagtidii" id="stagtidii" value="<?php echo $ldmster['stagtidii']; ?>">
                          <input type = hidden name="stdtii" id="stdtii" value="<?php echo $ldmster['stdtii']; ?>">
                          <input type = hidden name="rlc" id="rlc" value="<?php echo $ldmster['rlc']; ?>">
                          <div class="col-sm-12">
                             <center>
                              <button type="submit" name="leadupdatecandidate" class="btn btn-primary leaddisplay" style=""  id="leadupdatecandidate">Submit</button> 
                              <!-- <button type="submit" name="leadsave" class="btn btn-primary leaddisplay" style="margin-left:50px"  id="leadsave">Skip </button>  -->
                            </center>
                            </div>
                        <?php } ?>
                       <?php if($ldmster == 1){ ?>
                        <input type = hidden name="emp_id" id="emp_id" value="<?php echo  $_SESSION['empcode']; ?>">
                        <div class="col-sm-12">
                             <center>
                              <button type="submit" name="leadsubmitcandidate" class="btn btn-primary leaddisplay" style=""  id="leadsubmitcandidate">Submit </button> 
                              <!-- <button type="submit" name="leadsave" class="btn btn-primary leaddisplay" style="margin-left:50px"  id="leadsave">Skip </button>  -->
                             </center>
                            </div>
                        <?php } ?>
                        
                    

                    </div>
                      
                </div>
                <!-- </form>   -->
            </div>
        </div>
        <!-- Basic Form Inputs card end -->
        </form>  
    
<input type="hidden" id="php_lbound" value="<?php echo $campaign['emplbnd']; ?>"/>
<input type="hidden" id="php_ubound" value="<?php echo $campaign['empubnd']; ?>"/>
<input type="hidden" id="revlbndmlbl" value="<?php echo $campaign['revlbnd']; ?>"/>
<input type="hidden" id="revubndmlbl" value="<?php echo $campaign['revubnd']; ?>"/>
<input type="hidden" id="revlbdimmlbl" value="<?php echo $campaign['revlbdim']; ?>"/>
<input type="hidden" id="revubdimmlbl" value="<?php echo $campaign['revubdim']; ?>"/>
<?php endforeach;
      ?>
   
 <!-- Modal -->
 <div class="modal fade" id="myModalemail" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <!-- <h4 class="modal-title">Modal Header</h4> -->
        </div>
        <div class="modal-body">
        <div class="mail-body-content">
            <form>
                <div class="form-group row">                  
                    <div class="col-sm-12">
                      <input type ="text"  id="search_text" name="search_text" class="form-control form-control-sm" placeholder="Search here...">
                    </div>
                </div>
                
            </form>
         <div id="resultdiv"></div>
                <div style="clear:both"></div>
                <br />
               </div>
        </div>
        <div class="modal-footer">
        <button type="button" id="searchbtn" name ="searchbtn" class="btn btn-primary">Search</button>
          <button type="button" class="btn btn-danger " data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>


   
   
<!-- // Search result for industry -->
<script>
$(document).ready(function(){
	// load_data();
	function load_data(query)
	{
		$.ajax({
			// url:"fetch.php",
      url:'<?php echo base_url("cdc/getsearcresultofindustry");?>',
			method:"post",
			data:{query:query},
			success:function(data)
			{
				$('#resultdiv').html(data);
			}
		});
	}
	
	$('#search_text').keyup(function(){
		var search = $(this).val();
		if(search != '')
		{
			load_data(search);
		}
		else
		{
			// load_data();			
		}
	});
});
// end of search result

$('#empsize').blur(function(){
  var lbound = $('#php_lbound').val();
  var ubound = $('#php_ubound').val();
  var value = $(this).val();
    if ( value > parseInt(ubound) || value < parseInt(lbound)) 
    {
      $("#empsize_msg").html("Not in Range");
      $(this).val("");
    }else{
      $("#empsize_msg").html("");
    }



});

// jlevel change -- get Sub Industry
$('#jlevel').change(function(){
    var jlevel = $(this).val();
   
    // AJAX request to get timezones
    var urlq = '<?php echo base_url("cdc/getJobTitle");?>';
    console.log(urlq+'?jlevel='+jlevel);
    $.ajax({
        url:'<?php echo base_url("cdc/getJobTitle");?>',
        method: 'get',
        data: {jlevel: jlevel},
        dataType: 'json',
        success: function(response){

        //    Remove options 
       $('#desid').find('option').not(':first').remove();

        //    Add options
       $.each(response,function(index,data){
          $('#desid').append('<option value="'+data['jid']+'" >'+data['joblist']+'</option>');
          
        });
     
      }
    });
});

// Country change -- get timezones
$('#country_id').change(function(){
    var country_id = $(this).val();
   
    // AJAX request to get timezones
    var urlq = '<?php echo base_url("cdc/gettimezones");?>';
    console.log(urlq+'?country_id='+country_id);
    $.ajax({
        url:'<?php echo base_url("cdc/gettimezones");?>',
        method: 'get',
        data: {country_id: country_id},
        dataType: 'json',
        success: function(response){

        //    Remove options 
       $('#timezone').find('option').not(':first').remove();

        //    Add options
       $.each(response,function(index,data){
          $('#timezone').append('<option value="'+data['zids']+'" >'+data['abbrev']+'</option>');
          
        });
        // $('#country_id').multiselect("rebuild");
        // callB();
              $.ajax({
              url:'<?php echo base_url("cdc/gettcurrency");?>',
              method: 'get',
              data: {country_id: country_id},
              dataType: 'json',
              success: function(response){

              //    Remove options 
            $('#curr').find('option').not(':first').remove();

              //    Add options
            $.each(response,function(index,data){
                $('#curr').append('<option value="'+data['currid']+'">'+data['currab']+'</option>');
              
              });
              // $('#country_id').multiselect("rebuild");
            
              }
          });





        }
    });
});


// check revenue range for campaign
// $('#arevenue').change(function(){

//   $("#revszlink").prop('disabled', false);
//   $('#revszlink').val("");
  
// });

$('#mlbl').blur(function(){   // revenue range change
// $('#arevenue').blur(function(){   // revenue range change
 
var arevenuevalue = $('#arevenue').val();

  var lrevrange = $('#revlbdimmlbl').val(); //lower range  for eg million /billion
  var urevrange = $('#revubdimmlbl').val();

  var lrevrangenumber = $('#revlbndmlbl').val();
  var urevrangenumber = $('#revubndmlbl').val();
  // alert(lrevrange+" "+urevrange+" "+lrevrangenumber+" "+urevrangenumber);
 
  if(lrevrange == "hundred" && urevrange =="hundred" ){
    if($('#mlbl').val()== 0){
      var m = arevenuevalue*1000;
      var urevrangenumber1 = urevrangenumber*1000;
      var lrevrangenumber1 = lrevrangenumber*1000;
      // alert(m+" "+lrevrangenumber1+" "+urevrangenumber1);
    
      if(m > parseInt(urevrangenumber1) || m < parseInt(lrevrangenumber1)){
        alert("not in range");
        $('#arevenue').val("");
      }else{
        alert("in range");
      }
    }else{
      alert("not in range of Thousand");
      $('#arevenue').val("");
    }
              var ch = "0"; // thousand
              var ch1 = "1"; // million
              var check = "2"; //billion
              var check2 = "3"; // trillion
              $('select').each(function() {
                $('#mlbl').not(this).find('option[value="' + ch + '"]').prop('disabled', false);
                  $('#mlbl').not(this).find('option[value="' + check + '"]').hide();
                  $('#mlbl').not(this).find('option[value="' + ch1 + '"]').hide();
                  $('#mlbl').not(this).find('option[value="' + check2 + '"]').hide();
              });
             
  }
  if(lrevrange == "million" && urevrange =="million" ){
    if($('#mlbl').val()==1){
      var m = arevenuevalue*1000000;
      var urevrangenumber1 = urevrangenumber*1000000;
      var lrevrangenumber1 = lrevrangenumber*1000000;
     
    
      if(m > parseInt(urevrangenumber1) || m < parseInt(lrevrangenumber1)){
        alert("not in range");
        $('#arevenue').val("");
      }else{
      
      }
    }else{
      alert("not in range of Million");
      $('#arevenue').val("");
    }
              var ch = "0"; // thousand
              var ch1 = "1"; // million
              var check = "2"; //billion
              var check2 = "3"; // trillion
              $('select').each(function() {
                $('#mlbl').not(this).find('option[value="' + ch1 + '"]').prop('disabled', false);
                  $('#mlbl').not(this).find('option[value="' + check + '"]').hide();
                  $('#mlbl').not(this).find('option[value="' + ch + '"]').hide();
                  $('#mlbl').not(this).find('option[value="' + check2 + '"]').hide();
              });
  }
  if(lrevrange == "billion" && urevrange =="billion" ){
    if($('#mlbl').val()==2){
      var m = arevenuevalue*1000000000;
      var urevrangenumber1 = urevrangenumber*1000000000;
      var lrevrangenumber1 = lrevrangenumber*1000000000;
      // alert(m+" "+lrevrangenumber1+" "+urevrangenumber1);
    
      if(m > parseInt(urevrangenumber1) || m < parseInt(lrevrangenumber1)){
        alert("not in range");
        $('#arevenue').val("");
      }else{
        // alert("in range ");
      }
    }else{
      alert("not in range of Billion");
      $('#arevenue').val("");
    }
              var ch = "0"; // thousand
              var ch1 = "1"; // million
              var check = "2"; //billion
              var check2 = "3"; // trillion
              $('select').each(function() {
                $('#mlbl').not(this).find('option[value="' + check + '"]').prop('disabled', false);
                  $('#mlbl').not(this).find('option[value="' + ch + '"]').hide(); 
                  $('#mlbl').not(this).find('option[value="' + ch1 + '"]').hide(); 
                  $('#mlbl').not(this).find('option[value="' + check2 + '"]').hide();
              });

  }
  if(lrevrange == "trillion" && urevrange =="trillion" ){
    if($('#mlbl').val()==3){
      var m = arevenuevalue*1000000000000;
      var urevrangenumber1 = urevrangenumber*1000000000000;
      var lrevrangenumber1 = lrevrangenumber*1000000000000;
    
      if(m > parseInt(urevrangenumber1) || m < parseInt(lrevrangenumber1)){
        alert("not in range");
        $('#arevenue').val("");
      }else{
        // alert("in range ");
      }
    }else{
      alert("not in range of Trillion");
      $('#arevenue').val("");
    }
              var ch = "0"; // thousand
              var ch1 = "1"; // million
              var check = "2"; //billion
              var check2 = "3"; // trillion
              $('select').each(function() {
                $('#mlbl').not(this).find('option[value="' + check2 + '"]').prop('disabled', false);
                  $('#mlbl').not(this).find('option[value="' + ch + '"]').hide();
                  $('#mlbl').not(this).find('option[value="' + ch1 + '"]').hide();
                  $('#mlbl').not(this).find('option[value="' + check + '"]').hide();
              });

  }

  if(lrevrange != urevrange){ // different range
   if(lrevrange == "hundred" && urevrange ==  "million"){
      if($('#mlbl').val()==0){
        var m = arevenuevalue*1000;
      }else if($('#mlbl').val()==1){
        var m = arevenuevalue*1000000;
      }
      else if($('#mlbl').val()==2){
        var m = arevenuevalue*1000000000;
      } else if($('#mlbl').val()==3){
        var m = arevenuevalue*1000000000000;
      }
      var urevrangenumber1 = urevrangenumber*1000000;
      var lrevrangenumber1 = lrevrangenumber*1000;
   


    }else if(lrevrange == "hundred" && urevrange ==  "billion"){
      if($('#mlbl').val()==0){
        var m = arevenuevalue*1000;
      }else if($('#mlbl').val()==1){
        var m = arevenuevalue*1000000;
      }
      else if($('#mlbl').val()==2){
        var m = arevenuevalue*1000000000;
      } else if($('#mlbl').val()==3){
        var m = arevenuevalue*1000000000000;
      }
      var urevrangenumber1 = urevrangenumber*1000000000;
      var lrevrangenumber1 = lrevrangenumber*1000;
   
    }else if(lrevrange == "hundred" && urevrange ==  "trillion"){
    
      var urevrangenumber1 = urevrangenumber*1000000000000;
      var lrevrangenumber1 = lrevrangenumber*1000;
      if($('#mlbl').val()==0){
        var m = arevenuevalue*1000;
      }else if($('#mlbl').val()==1){
        var m = arevenuevalue*1000000;
      }
      else if($('#mlbl').val()==2){
        var m = arevenuevalue*1000000000;
      } else if($('#mlbl').val()==3){
        var m = arevenuevalue*1000000000000;
      }
    
    }else if(lrevrange == "million" && urevrange ==  "billion"){
      if($('#mlbl').val()==0){
        var m = arevenuevalue*1000;
      }else if($('#mlbl').val()==1){
        var m = arevenuevalue*1000000;
      }
      else if($('#mlbl').val()==2){
        var m = arevenuevalue*1000000000;
      } else if($('#mlbl').val()==3){
        var m = arevenuevalue*1000000000000;
      }
      var urevrangenumber1 = urevrangenumber*1000000000;
      var lrevrangenumber1 = lrevrangenumber*1000000;
   


    } else if(lrevrange == "million" && urevrange ==  "trillion"){
      if($('#mlbl').val()==0){
        var m = arevenuevalue*1000;
      }else if($('#mlbl').val()==1){
        var m = arevenuevalue*1000000;
      }
      else if($('#mlbl').val()==2){
        var m = arevenuevalue*1000000000;
      } else if($('#mlbl').val()==3){
        var m = arevenuevalue*1000000000000;
      }
      var urevrangenumber1 = urevrangenumber*1000000000000;
      var lrevrangenumber1 = lrevrangenumber*1000000;
           
    } else if(lrevrange == "billion" && urevrange ==  "trillion"){
      if($('#mlbl').val()==0){
        var m = arevenuevalue*1000;
      }else if($('#mlbl').val()==1){
        var m = arevenuevalue*1000000;
      }
      else if($('#mlbl').val()==2){
        var m = arevenuevalue*1000000000;
      } else if($('#mlbl').val()==3){
        var m = arevenuevalue*1000000000000;
      }
      var urevrangenumber1 = urevrangenumber*1000000000000;
      var lrevrangenumber1 = lrevrangenumber*1000000000;
      
      // alert("billion and trillion");
              // var ch = "0"; // thousand
              // var ch1 = "1"; // million
              // var check = "2"; //billion
              // var check2 = "3"; // trillion
              // $('select').each(function() {
              //   $('#mlbl').not(this).find('option[value="' + check2 + '"]').prop('disabled', false);
              //     $('#mlbl').not(this).find('option[value="' + ch + '"]').hide();
              //     $('#mlbl').not(this).find('option[value="' + ch1 + '"]').hide();
              //     $('#mlbl').not(this).find('option[value="' + check + '"]').prop('disabled', false); 
              // });
    }
    // alert(m+" "+lrevrangenumber1+" "+urevrangenumber1);
    if(m > parseInt(urevrangenumber1) || m < parseInt(lrevrangenumber1)){
        alert("not in range");
        $('#arevenue').val("");
      }else{
        // alert("in range ");
      }
  }


});


//  Get sub industry
 $('#industrycd').change(function(){
    var industrycd = $(this).val();
    if (industrycd != '')
    {
     
    }
   
    // AJAX request
    $.ajax({
        url:'<?php echo base_url("cdc/getIndustry");?>',
        method: 'get',
        data: {industrycd: industrycd},
        dataType: 'json',
        success: function(response){

        //    Remove options 
       $('#subindustrycd').find('option').not(':first').remove();

        //    Add options
       $.each(response,function(index,data){
          $('#subindustrycd').append('<option value="'+data['subindustrycd']+'">'+data['subindustry']+'</option>');
        });
        // $('#industrycd').multiselect("rebuild");
        }
    });
});


     // Campaign Name no special character allowed validation code
    $(function () {
        $("#fname").keyup(function (e) {
            var keyCode = e.keyCode || e.which;
 
            $("#fname_msg").html("");
 
            //Regex for Valid Characters i.e. Alphabets and Numbers.
          
            var regex = /^[A-Za-z]+$/;
 
            //Validate TextBox value against the Regex.
            var isValid = regex.test(String.fromCharCode(keyCode));
            if (!isValid) {
                $("#fname_msg").html("Only Alphabets allowed.");
                
            }
 
            return isValid;
        });
        $("#last_name").keypress(function (e) {
            var keyCode = e.keyCode || e.which;
 
            $("#lname_msg").html("");
 
            //Regex for Valid Characters i.e. Alphabets and Numbers.
          
            var regex = /^[A-Za-z]+$/;
 
            //Validate TextBox value against the Regex.
            var isValid = regex.test(String.fromCharCode(keyCode));
            if (!isValid) {
                $("#lname_msg").html("Only Alphabets allowed.");
            }
            return isValid;
        });
       
    });
  
  // Check unique Email function // check inclusion and exclusion email in db table
    
      $('.newsletter-signup input:first').focusout(function(){
      var email = $('#email').val();
      var inclistnew = $('#inclistnew').val();
      var campaign_id = <?php  echo $campaign['cnid']; ?>;
    
      var url = '<?php echo base_url("cdc/checkemail");?>';
      console.log(url+'?email='+email+"&campaign_id="+campaign_id);
    // AJAX request
    $.ajax({

        url:'<?php echo base_url("cdc/checkemail");?>',
        method: 'get',
        data: {
          email: email,
          campaign_id: campaign_id,
          inclistnew:inclistnew
          },
        dataType: 'json',
        success: function(response){
          $( '#email_msg' ).html("response");
         
          if(response.inclusionemail == "true")
          {
            $("#email_msg").html("");
            console.log("true");
            return true;	
          }else if(response.inclusionemail == "false")
          {
            $("#email_msg").html("Not in Inclusion Email List");
            console.log("false");
         
          }
          else if(response.exclusionemail == "true")
          {
            $("#email_msg").html("Suppressed Email");
            $('#email').val("");
            console.log("true");
            

          } else 
          {
            $("#email_msg").html("");
            console.log("true");
            return false;	
          }
          
        }
    });
    
   
});
  
    // Check unique domain
    $('.domaincheck input:first').blur(function(){
      var domain = $('#domain').val();
      var inclistnew = $('#inclistnew').val();
      var campaign_id = <?php  echo $campaign['cnid']; ?>;
      var url = '<?php echo base_url("cdc/checkdomain");?>';
      console.log(url+'?domain='+domain+"&campaign_id="+campaign_id);
    // AJAX request
    $.ajax({

        url:'<?php echo base_url("cdc/checkdomain");?>',
        method: 'get',
        data: {
          domain: domain,
          campaign_id: campaign_id,
          inclistnew:inclistnew
          
          },
        dataType: 'json',
        success: function(response){
          $( '#domain_msg' ).html(response);
          if(response.domaincheckincl == "true")
          {
            $("#domain_msg").html("");
            console.log("true");
            return true;	
          }
          if(response.domaincheckincl == "false")
          {
            $("#domain_msg").html("Not in Inclusion Doamin List");
            console.log("true");
            // return true;	
          }
          else if(response.domainchecksupp == "true")
          {
            $("#domain_msg").html("Suppressed Domain List");
            console.log("true");
            $('#domain').val("");
            return true;	
          } else 
          {
            $("#domain_msg").html("");
            console.log("true");
            return false;	
          }
          
        }
    });
    
   
});



 // Check unique Company
 $('.compcheck input:first').blur(function(){
      var company_name = $('#company_name').val();
      var inclistnew = $('#inclistnew').val();
      var campaign_id = <?php  echo $campaign['cnid']; ?>;
      var url = '<?php echo base_url("cdc/checkcompanylist");?>';
      console.log(url+'?company_name='+company_name+"&campaign_id="+campaign_id);
    // AJAX request
    $.ajax({

        url:'<?php echo base_url("cdc/checkcompanylist");?>',
        method: 'get',
        data: {
        company_name: company_name,
        campaign_id: campaign_id,
        inclistnew:inclistnew
        },
        dataType: 'json',
        success: function(response){
          $( '#comp_msg' ).html(response);
          if(response.companycheckincl == "true")
          {
            $("#comp_msg").html("");
            console.log("true");
            return true;	
          }
          else if(response.companycheckincl == "false")
          {
            $("#comp_msg").html("Not in Inclusion Company List");
            console.log("true");
            return true;	
          }
          else if(response.companychecksupp == "true")
          {
            $("#comp_msg").html("Suppressed Company");
            $('#company_name').val("");
            console.log("true");
            return true;	
          } else 
          {
            $("#domain_msg").html("");
            console.log("true");
            return false;	
          }
          
        }
    });
    
   
});




$(document).ready(function() {

//update record lock
var rlc = 1; //lock 1
var lmid = $('#lmid').val();
var emp_id = $('#emp_id').val();

if(emp_id === undefined){
  
            window.location = base_url+"administrator/logout";
            exit;
  }
if(emp_id == ''){
  // alert("Null");
  window.location = base_url+"administrator/logout";
  exit;
}

// if(rlc == "1"){
// var urlq = '<?php echo base_url("cdc/updaterecordlock");?>';
// console.log(urlq+'?lmid='+lmid+"&rlc="+rlc+"&emp_id="+emp_id);
// $.ajax({
//       url:'<?php echo base_url("cdc/updaterecordlock");?>',
//       method: 'get',
//       data: {
//         lmid: lmid,
//         rlc:rlc,
//         emp_id:emp_id
//       },
//       dataType: 'json',
//       success: function(response){

//         console.log("check");
//                     // var dataResult = JSON.parse(response);
//                     if(response.statusCode == "Success") 
//                     {         
                     
//                       console.log("Record is opened/locked now");     
                      
//                     }else if(response.data=="Fail")
//                     {
//                       alert("fail/check if record is already opened");  
                        
// 					          }
//       }
//   });
// }else{
//   alert("record already opened");
 
// }


// alert(lmid);
if(lmid == undefined){
  $("#revszlink").prop('disabled', true);
  $('#revszlink').val("NA");

}
 
  $('.commentvisible').hide(); 
  $('.optoption').hide(); 
  $("#basic-form").validate({
    rules: {
        sal : {
        required: true
      },
      fname : {
        required: true,
        minlength: 2,
        customvalidation: true
      },
      lname : {
        required: true,
        minlength: 2,
        customvalidation: true
      },
      jtitle : {
        required: true,
        customvalidation: true
      },
      jlevel : {
        required: true
      },
        company_name : {
        required: true,
        customvalidation: true
        // minlength: 3
      },
      dcd : {
        required: true
        // minlength: 3
      },
      desid : {
        required: true
        // minlength: 3
      },
      linetype : {
        required: true        
      },
      address : {
        required: true,
        customvalidation: true
        // minlength: 4
      },
      city : {
        required: true,
        customvalidation: true
        // minlength: 5
      },
      state : {
        required: true,
        customvalidation: true
        // minlength: 5
      },
      zip_code : {
        required: true
        // minlength: 5
      },
      timezone : {
        // required: true
      },
      industrycd : {
        required: true
      },
      subindustrycd : {
        required: true
      },
       country_id : {
        required: true
        // minlength: 1
      },
      phone: {
        required: true,
        number: true,
        min: 6
      },
      empsize: {
        required: true,
        number: true,
       
      },
      altphn: {
        number: true
      },
      aum: {
        number: true
      },     
      email: {
        required: true,
        email: true
      },
      domain: {
        required: true
        // url: true
      },     
      plink: {
        required: true,
        url: true
      },
      empszlink: {
        required: true,
        url: true
      },
      indlink: {
        required: true,
        url: true
      },
      othrlink: {
        // required: true,
        url: true
      },
      revszlink: {
        required: true,
        url: true
      },
      emailver: {
        required: true
      }
      
     
    },
    submitHandler: function(form) {

    },
    messages : {
        company_name: {
        required: "Please enter Company Name",
        minlength: "Name should be at least 3 characters"
      },
      phone: {
        required: "Please enter Phone",
        number: "Please enter your Phone as a numerical value",
        min: "Phone must be at least 6 digit"
      },
      domain: {
        url: "The Domain should be in the URL format"
      }
    }
  });

  $.validator.addMethod("customvalidation",
           function(value, element) {
             return /^[A-Za-z\d=#$%!*&()+',?./><@_ -]+$/.test(value); // validation for RÃ¤feldstrasse word
           },
   "Sorry, no special characters allowed"
   );
});


 </script>

<script>
/* add lead submit initial*/
    $(function() {
        $("#leadsubmitcandidate").on('click', function() 
        {
          var empid = $('#emp_id').val();
          if(empid  === undefined){
            window.location = base_url+"administrator/logout";
            exit;
          }
          if(empid == ''){
         
            window.location = base_url+"administrator/logout";
            exit;
          }
        
            var campaign_id = $('#campaign_id').val();
            var campaign_idcids = $('#campaign_idcids').val();
        
            var sal = $('#sal').val();
            var fname = $('#fname').val();
            var lname = $('#lname').val();
            var jtitle = $('#jtitle').val();
            var desid = $('#desid').val();
            var jlevel = $('#jlevel').val();
           
            var dcd = $('#dcd').val();
            var email = $('#email').val();
            var phone = $('#phone').val();
            var altphn = $('#altphn').val();
            var phext = $('#phext').val();
            var plink = $('#plink').val();
            var company_name = $('#company_name').val();
            var address = $('#address').val();
            var city = $('#city').val();
            var state = $('#state').val();
            var zip_code = $('#zip_code').val();

            var country_id = $('#country_id').val(); 
            var timezone = $('#timezone').val();
            var ctype = $('#ctype').val();
            var linetype = $('#linetype').val();
            var industrycd = $('#industrycd').val();
            var subindustrycd = $('#subindustrycd').val();
            var sectyp = $('#sectyp').val();
            
            var empsize = $('#empsize').val();

            var mlbl = $('#mlbl').val();
            var domain = $('#domain').val();
            var curr = $('#curr').val();
            var empszlink = $('#empszlink').val();
            var indlink = $('#indlink').val();

            

            var pcomt = $('#pcomt').val();

            var arevenue = $('#arevenue').val();
            var revszlink = $('#revszlink').val();
            if(arevenue ==""){
              
              // $("#revszlink").prop('disabled', true);
              $('#revszlink').val("NA");
            }else if(arevenue != ""){
              
              // $("#revszlink").prop('disabled', false);
              var revszlink = $('#revszlink').val();
            }
        

            var othrlink = $('#othrlink').val();
            var emailver = $('#emailver').val();
            var aum = $('#aum').val();
            var assetid = $('#assetid').val();
            
           
            
           
            if(fname != "" && lname != "" && company_name != "" && jlevel != "" && jtitle != "" && desid != "" && dcd !="" && email != "" && phone !="" && plink !="" && address != "" && city != "" && state != ""  && country_id != "" && industrycd != "" && subindustrycd != "" && empsize != "" && domain !=""  && empszlink != "" && revszlink != ""  && zip_code !="" ){
           
            var url = encodeURI("<?php echo base_url("cdc/ajax_add_new_leaddata_candidate");?>");
            console.log(url+"?campaign_id="+campaign_id+"&sal="+sal+"&fname="+fname+"&lname="+lname+"&jtitle="+jtitle+"&desid="+desid+"&jlevel="+jlevel+"&dcd="+dcd+"&email="+email+"&phone="+phone+"&altphn="+altphn+"&phext="+phext+"&plink="+plink+"&company_name="+company_name+"&address="+address+"&city="+city+"&state="+state+"&zip_code="+zip_code+"&country_id="+country_id+"&timezone="+timezone+"&ctype="+ctype+"&linetype="+linetype+"&industrycd="+industrycd+"&subindustrycd="+subindustrycd+"&sectyp="+sectyp+"&empsize="+empsize+"&mlbl="+mlbl+"&curr="+curr+"&arevenue="+arevenue+"&empszlink="+empszlink+"&indlink="+indlink+"&domain="+domain+"&othrlink="+othrlink+"&revszlink="+revszlink+"&emailver="+emailver+"&aum="+aum+"&assetid="+assetid+"&pcomt="+pcomt);
           
            $.ajax({
                url :'<?php echo base_url("cdc/ajax_add_new_leaddata_candidate");?>',
                type: 'GET', 
                // contentType: "application/json",
                dataType: 'json',              
                data: {
                   
                  campaign_id: campaign_id,
                  campaign_idcids: campaign_idcids,
                    sal:sal,
                    fname:fname,
                    lname: lname,
                    jtitle:jtitle,
                    desid:desid,
                    jlevel:jlevel,
                    dcd:dcd,
                    email:email,
                    phone:phone,
                    altphn:altphn,
                    phext:phext,
                    plink:plink,
                    company_name:company_name,
                    address:address,
                    city:city,
                    state:state,
                    zip_code:zip_code,
                    
                    country_id:country_id,
                    timezone:timezone,
                    ctype:ctype,
                    linetype:linetype,
                                      
                    industrycd:industrycd,
                    subindustrycd:subindustrycd,
                    sectyp:sectyp,
                    empsize:empsize,
                    mlbl:mlbl,
                    curr:curr,
                    arevenue:arevenue,
                    empszlink:empszlink,
                    indlink:indlink,
                    revszlink:revszlink,
                    domain:domain,
                    othrlink:othrlink,
                    emailver:emailver,
                    aum:aum                 
                      
                    
                    
				},
        async: true,
                cache: false,
                success: function(response){
                    // $("#leadsave").hide();
                    var text = response.statusCode;
                    console.log("check");
                    if(response.statusCode == "Success") 
                    {         
                         
                        $("#leadsubmitcandidate").html(response.message);
                        top.location.href=base_url+"cdc/add_candidate_lead?camp_id="+<?php echo $campaign['cnid']; ?>;//redirection
                      
                    }
                    else if(response.statusCode =="Fail")
                    {
                        $("#leadsubmitcandidate").html(response.message);
                        
					          }
                    else if(response.statusCode =="Exist")
                    {
                      alert("Record already Exist");
                        
					          }
                    else if(response.statusCode =="plink")
                    {
                      alert("Record already Exist");
                        
					          }

                   

                },
                error: function (error) {
                  alert("Error");
                  }
              
            });
        } else{
          alert("Please fill Mandatory fields");
        }
        });
    });
</script>
<script>
/* update lead submit*/

$(document).ready(function() { //below code is to disable back button

window.history.pushState(null, "", window.location.href);        

window.onpopstate = function() {

    window.history.pushState(null, "", window.location.href);

};

});


$(document).ready(function () {
    function disableBack() {window.history.forward()}

    window.onload = disableBack();
    window.onpageshow = function (evt) {if (evt.persisted) disableBack()}
});

    $(function() {
        $("#leadupdatecandidate").on('click', function() 
        {
          var empid = $('#emp_id').val();
          if(empid  === undefined){
            window.location = base_url+"administrator/logout";
            exit;
          }
          if(empid == ''){
       
            window.location = base_url+"administrator/logout";
            exit;
          }
            var campaign_id = $('#campaign_id').val();

            var stagtidi = $('#stagtidi').val();
            var stagtidii = $('#stagtidii').val();

            var stdti = $('#stdti').val();
            var stdtii = $('#stdtii').val();

            var campaign_idcids = $('#campaign_idcids').val();
            var sbsvtag1 = $('#sbsvtag').val();
            var sbsvtag = parseInt(sbsvtag1)+1; // incremataion
            var lmid = $('#lmid').val();
           
     

            var sal = $('#sal').val();
            var fname = $('#fname').val();
            var lname = $('#lname').val();
            var jtitle = $('#jtitle').val();
            var desid = $('#desid').val();
            var jlevel = $('#jlevel').val();
           
            var dcd = $('#dcd').val();
            var email = $('#email').val();
            var phone = $('#phone').val();
            var altphn = $('#altphn').val();
            var phext = $('#phext').val();
            var plink = $('#plink').val();
            var company_name = $('#company_name').val();
         

            var address = $('#address').val();
            var city = $('#city').val();
            var state = $('#state').val();
            var zip_code = $('#zip_code').val();

            var country_id = $('#country_id').val(); 
            var timezone = $('#timezone').val();
            var ctype = $('#ctype').val();
            var linetype = $('#linetype').val();
            var industrycd = $('#industrycd').val();
            var subindustrycd = $('#subindustrycd').val();
            var sectyp = $('#sectyp').val();
            
            var empsize = $('#empsize').val();

            var mlbl = $('#mlbl').val();
            var domain = $('#domain').val();
            var curr = $('#curr').val();
            var empszlink = $('#empszlink').val();
            var indlink = $('#indlink').val();

            

            var pcomt = $('#pcomt').val();

            var arevenue = $('#arevenue').val();
            var revszlink = $('#revszlink').val();
            if(arevenue ==""){
              
              // $("#revszlink").prop('disabled', true);
              $('#revszlink').val("NA");
            }else if(arevenue != ""){
              
              // $("#revszlink").prop('disabled', false);
              var revszlink = $('#revszlink').val();
            }
        

            var othrlink = $('#othrlink').val();
            var emailver = $('#emailver').val();
            var aum = $('#aum').val();
            var assetid = $('#assetid').val();
            
            

            var dvsbtg = $('#dvsbtg').val();
            var dvrejtg = $('#dvrejtg').val();
           
            
           
            if(fname != "" && lname != "" && company_name != ""  && jtitle != "" && desid != "" && dcd !="" && email != "" && phone !="" && plink !="" && address != "" && city != "" && state != ""  && country_id != "" && industrycd != "" && subindustrycd != "" && empsize != "" && domain !=""  && empszlink != "" && revszlink != ""  && zip_code !="" ){
            var url = encodeURI("<?php echo base_url("cdc/ajax_update_leaddata_candiate");?>");
            console.log(url+"?campaign_id="+campaign_id+"&lmid="+lmid+"&campaign_idcids="+campaign_idcids+"&sbsvtag="+sbsvtag+"&sal="+sal+"&fname="+fname+"&lname="+lname+"&jtitle="+jtitle+"&desid="+desid+"&jlevel="+jlevel+"&dcd="+dcd+"&email="+email+"&phone="+phone+"&altphn="+altphn+"&phext="+phext+"&plink="+plink+"&company_name="+company_name+"&address="+address+"&city="+city+"&state="+state+"&zip_code="+zip_code+"&country_id="+country_id+"&timezone="+timezone+"&ctype="+ctype+"&linetype="+linetype+"&industrycd="+industrycd+"&subindustrycd="+subindustrycd+"&sectyp="+sectyp+"&empsize="+empsize+"&mlbl="+mlbl+"&curr="+curr+"&arevenue="+arevenue+"&empszlink="+empszlink+"&indlink="+indlink+"&domain="+domain+"&othrlink="+othrlink+"&revszlink="+revszlink+"&emailver="+emailver+"&aum="+aum+"&assetid="+assetid+"&pcomt="+pcomt);
           
            $.ajax({
                url :'<?php echo base_url("cdc/ajax_update_leaddata_candiate");?>',
                type: 'GET', 
                // contentType: "application/json",
                dataType: 'json',              
                data: {
                   
                  campaign_id: campaign_id,
                  campaign_idcids: campaign_idcids,
                  lmid: lmid,
                  sbsvtag :sbsvtag,

                  stdti:stdti,
                  stagtidi:stagtidi,
                  stdtii:stdtii,
                  stagtidii:stagtidii,

                    sal:sal,
                    fname:fname,
                    lname: lname,
                    jtitle:jtitle,
                    desid:desid,
                    jlevel:jlevel,
                    dcd:dcd,
                    email:email,
                    phone:phone,
                    altphn:altphn,
                    phext:phext,
                    plink:plink,
                    company_name:company_name,
                    address:address,
                    city:city,
                    state:state,
                    zip_code:zip_code,
                    
                    country_id:country_id,
                    timezone:timezone,
                    ctype:ctype,
                    linetype:linetype,
                                      
                    industrycd:industrycd,
                    subindustrycd:subindustrycd,
                    sectyp:sectyp,
                    empsize:empsize,
                    mlbl:mlbl,
                    curr:curr,
                    arevenue:arevenue,
                    empszlink:empszlink,
                    indlink:indlink,
                    revszlink:revszlink,
                    domain:domain,
                    othrlink:othrlink,
                    emailver:emailver,
                    pcomt:pcomt,
                    dvsbtg:dvsbtg,
                    dvrejtg:dvrejtg,
                    aum:aum                 
                      
                    
                    
				},
        async: true,
                cache: false,
                success: function(response){
               
                    var text = response.statusCode;
                    console.log("check");
                    if(response.statusCode == "Success") 
                    {         
                         
                        $("#leadupdatecandidate").html(response.message);
                        top.location.href=base_url+"cdc/add_candidate_lead?camp_id="+<?php echo $campaign['cnid']; ?>;//redirection
                      
                    }else if(response.data=="Fail")
                    {
                        $("#leadupdatecandidate").html(response.message);
                        
					          }
                    else if(response.statusCode =="Exist")
                    {
                      alert("Record already Exist");

                
                        
					          }
                    else if(response.statusCode =="plink")
                    {
                      alert("Record already Exist");

                        
					          }

                   

                },
                error: function (error) {
                  alert("Error");
                  }
              
            });
        } else{
          alert("Please fill Mandatory fields");
        }
        });
    });
</script>

<!--  code for save data in db -->
<script>
    $(function() {
        $("#leadsave").on('click', function() 
        {
         
          var campaign_id = $('#campaign_id').val();
            var campaign_idcids = $('#campaign_idcids').val();
            var lmid = $('#lmid').val();
            if(lmid == undefined){
              var lmid = "1";
            }
            var empid = $('#emp_id').val();
          if(empid  === undefined){
            window.location = base_url+"administrator/logout";
            exit;
          }
          if(empid == ''){
            // alert("Null");
            window.location = base_url+"administrator/logout";
            exit;
          }
           
          //  alert(campaign_idcids);
            var sal = $('#sal').val();
            var fname = $('#fname').val();
            var lname = $('#lname').val();
            var jtitle = $('#jtitle').val();
            var desid = $('#desid').val();
            var jlevel = $('#jlevel').val();
           
            var dcd = $('#dcd').val();
            var email = $('#email').val();
            var phone = $('#phone').val();
            var altphn = $('#altphn').val();
            var phext = $('#phext').val();
            var plink = $('#plink').val();
            var company_name = $('#company_name').val();
            var address = $('#address').val();
            var city = $('#city').val();
            var state = $('#state').val();
            var zip_code = $('#zip_code').val();

            var country_id = $('#country_id').val(); 
            var timezone = $('#timezone').val();
            var ctype = $('#ctype').val();
            var linetype = $('#linetype').val();
            var industrycd = $('#industrycd').val();
            var subindustrycd = $('#subindustrycd').val();
            var sectyp = $('#sectyp').val();
            
            var empsize = $('#empsize').val();

            var mlbl = $('#mlbl').val();
            var domain = $('#domain').val();
            var curr = $('#curr').val();
            var empszlink = $('#empszlink').val();
            var indlink = $('#indlink').val();

            

            var pcomt = $('#pcomt').val();
            if(pcomt == undefined){
              var pcomt = "0";
            }

            var arevenue = $('#arevenue').val();
            var revszlink = $('#revszlink').val();
            // if(arevenue ==""){
              
            //   $("#revszlink").prop('disabled', true);
            //   $('#revszlink').val("NA");
            // }else if(arevenue != ""){
              
            //   $("#revszlink").prop('disabled', false);
            //   var revszlink = $('#revszlink').val();
            // }
        
            var othrlink = $('#othrlink').val();
            var emailver = $('#emailver').val();
            var aum = $('#aum').val();
            var assetid = $('#assetid').val();
           
            if(fname != "" && lname != "" && company_name != ""  && jtitle != "" && desid != "" && dcd !="" && email != "" && phone !="" && plink !="" && address != "" && city != "" && state != ""  && country_id != "" && industrycd != "" && subindustrycd != "" && empsize != "" && domain !=""  && empszlink != "" && revszlink != ""  && zip_code !="" ){
           

            var url = encodeURI("<?php echo base_url("cdc/ajax_save_leaddata");?>");
            console.log(url+"?campaign_idcids="+campaign_idcids+"&lmid="+lmid+"&campaign_id="+campaign_id+"&sal="+sal+"&fname="+fname+"&lname="+lname+"&jtitle="+jtitle+"&desid="+desid+"&jlevel="+jlevel+"&dcd="+dcd+"&email="+email+"&phone="+phone+"&altphn="+altphn+"&phext="+phext+"&plink="+plink+"&company_name="+company_name+"&address="+address+"&city="+city+"&state="+state+"&zip_code="+zip_code+"&country_id="+country_id+"&timezone="+timezone+"&ctype="+ctype+"&linetype="+linetype+"&industrycd="+industrycd+"&subindustrycd="+subindustrycd+"&sectyp="+sectyp+"&empsize="+empsize+"&mlbl="+mlbl+"&curr="+curr+"&arevenue="+arevenue+"&empszlink="+empszlink+"&indlink="+indlink+"&domain="+domain+"&othrlink="+othrlink+"&revszlink="+revszlink+"&emailver="+emailver+"&aum="+aum+"&assetid="+assetid+"&pcomt="+pcomt);
           
            $.ajax({
                url :'<?php echo base_url("cdc/ajax_save_leaddata");?>',
                type: 'GET', 
                dataType: 'Json',              
                data: {
                   
                  campaign_id: campaign_id,
                  campaign_idcids: campaign_idcids,
                  lmid: lmid,
               
                    sal:sal,
                    fname:fname,
                    lname: lname,
                    jtitle:jtitle,
                    desid:desid,
                    jlevel:jlevel,
                    dcd:dcd,
                    email:email,
                    phone:phone,
                    altphn:altphn,
                    phext:phext,
                    plink:plink,
                    company_name:company_name,
                    address:address,
                    city:city,
                    state:state,
                    zip_code:zip_code,
                    
                    country_id:country_id,
                    timezone:timezone,
                    ctype:ctype,
                    linetype:linetype,
                                      
                    industrycd:industrycd,
                    subindustrycd:subindustrycd,
                    sectyp:sectyp,
                    empsize:empsize,
                    mlbl:mlbl,
                    curr:curr,
                    arevenue:arevenue,
                    empszlink:empszlink,
                    indlink:indlink,
                    revszlink:revszlink,
                    domain:domain,
                    othrlink:othrlink,
                    emailver:emailver,
                    pcomt:pcomt,
                    aum:aum                 
                             
                   
				},
        // async: true,
                // cache: false,
                success: function(response){

                    var text = response.statusCode;
                    console.log("check");
                   
                    if(response.statusCode == "Success") 
                    {     
                      // alert("Success");                   
                        $("#leadsave").html(response.message);
                        top.location.href=base_url+"cdc/add_candidate_lead?camp_id="+<?php echo $campaign['cnid']; ?>;//redirection
                        
                    }else if(response.statusCode=="Fail")
                    {
                        $("#leadsave").html(response.message);
                        
					          } else if(response.statusCode =="Exist")
                    {
                      alert("Record already Exist");

					          }
                    else if(response.statusCode =="plink")
                    {
                      alert("Record already Exist");

					          }

                   

                },
                
                error: function (error) {
                  alert("Error");
              
                  }
              
            });
        }else{
          alert("Please fill Mandatory Fields");
        }
        });
    });


// added by tejaswi for timer   
var base_url = "<?php echo base_url() ?>";
var countdownnumber = <?php  echo $_SESSION["login_time_stamp"]; ?> 
ProgressCountdown(countdownnumber, 'pageBeginCountdown', 'pageBeginCountdownText').then(
    // value => alert(`Test is finished: ${value}.`),
   
  );
 


function ProgressCountdown(timeleft, bar, text) {

  return new Promise((resolve, reject) => {
    var countdownTimer = setInterval(() => {
      timeleft--;

      document.getElementById(bar).value = timeleft;
      document.getElementById(text).textContent = timeleft;
     
      
      $.ajax({
        url :'<?php echo base_url("cdc/set_session_timer");?>',
                type: 'GET', 
                dataType: 'Json',              
                data: {
                  timeleft :timeleft
                }
    });         
     
     
//  alert(timeleft12);

      if (timeleft <= 0) {
        clearInterval(countdownTimer);
        resolve(true);
        window.location = base_url+"administrator/logout_candiate";
      }
    }, 1000);
  });
}

</script>   