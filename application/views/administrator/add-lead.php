
<!-- This is the page where user can insert new data. he can access this form for one hour.
once user selects campaign then otp will get genertae and will get sent to users mehp account.
and the he can insert data 
This is the short way for CDC team to insert data.
Below form is  developed by Tejaswi
-->
<style>
    label.error {
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
    .select2-container--default .select2-selection--single .select2-selection__arrow {
    top: 3px;
    right: 15px;
}
    
/*     
      .form-control option:hover {
          background: pink;
            
     box-shadow: 0 0 10px 10px #e1358f inset;
        }
        select:focus{
    border-color: gray;
    outline:none;
} */
.tooltips {
  position: relative;
  /* display: inline-block; */
  display: inline;
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
  /* bottom: 125%; */
  bottom: 55%;
  margin-bottom: 5px;
  /* left: 50%; */
  /* margin-left: -60px; */
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
$(document).ready(function () {
    // Handler for .ready() called.
    $('html, body').animate({
        scrollTop: $('#camp_form').offset().top
    }, 'slow');
});

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
  $(".aumdis").attr("disabled", true);   // aum disable
  $(".ansdiv").hide();   // ans div hide
  $('.cdqadisplay').hide();
  $('.commentvisible').hide();
  $('.optindiv').hide();
    $('#rec_type_id').bind('change', function() {
     
        var value = $(this).val();
        if (value == 2) { // if cdqa is selected
          $('.commentvisible').show();
          $('.optindiv').show();
          $('.cdqadisplay').show();
          $('.leaddisplay').hide();
          $(".ansdiv").show(); 

          var campaign_id = $('#campaign_id').val();

var urlq = '<?php echo base_url("cdc/getquestion");?>';
console.log(urlq+'?campaign_id='+campaign_id);
$.ajax({
      url:'<?php echo base_url("cdc/getquestion");?>',
      method: 'get',
      data: {campaign_id: campaign_id},
      dataType: 'json',
      success: function(response){


      //    Add options
     $.each(response,function(index,data){
     
          index++;
       
        $('.questionrow').append('<div class="col-sm-6 card ansdiv">'+
                                   '<p><b>'+data['questions']+'</b></p>'+
                                      '<input type="text" value=""  autocomplete = "off" name="aa' + index + '" id="aa' + index + '"  placeholder="Answer for Question 2"  class="form-control form-control-sm ">'+
                                                                     
                          '</div>');

        
      });
      }
  });


         
        }else{
          $('.commentvisible').hide();
          $('.optindiv').hide();
          $(".ansdiv").hide(); 
          $('.leaddisplay').show();
          $('.cdqadisplay').hide();
            
        }
    }).trigger('change');
 
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
        <h4>Data Lead And CDC </h4> 
        
      
            <div class="form-group row"> 
             <div class="col-sm-2" style="margin-left: 200px;margin-top: -25px;">
                                <select name="rec_type_id" id="rec_type_id"  class="form-control form-control-sm">
                                      <!-- <option value="1">Data </option> -->
                                      <option value="2">CDQA </option>
                                </select>
                  </div> 
                <div class="col-sm-4" style="margin-top: -20px;">
                <?php foreach ($campaigns as $campaign): ?>
                 <label class="col-lable"><b>Campaign Name: <?php echo $campaign['campnm']; ?></b></label>
                 <?php endforeach; ?>
                </div> 
                
            </div>   
                           
    </div>
     <?php foreach ($campaigns as $campaign): ?>
     
      <?php endforeach; ?>
   
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
                                <input type="text"  name="fname" id="fname"  placeholder="First Name"  autocomplete = "off"  class="form-control form-control-sm cdqadisable">
                                <input type="hidden" name="inclistnew" id="inclistnew" value="<?php echo $campaign['inclistnew']; ?>">
                                <span style='color:#FF0000' id="fname_msg"></span>
                            </div>
                            
                            <div class="col-sm-2">
                                <input type="text"  name="lname" id="lname"  placeholder="Last Name"  autocomplete = "off"  class="form-control form-control-sm cdqadisable">
                                <span style='color:#FF0000' id="lname_msg"></span>
                            </div>
                            <div class="col-sm-3">
                            <?php if(!empty($supp_jt)){ ?>
                                <a href="#myModalemail1" data-target="#myModalemail1" data-toggle="modal"><i class="icofont icofont-ui-delete">Suppressed list</i></a>
                                <?php } ?>
                              <div class="<?php if(!empty($supp_jt)){ echo 'jtitilelist';}?>">
                                  <input type="text"  name="jtitle" id="jtitle"  placeholder="Job Title"  autocomplete = "off" class="form-control form-control-sm cdqadisable">
                                  <input type="hidden" name="jobtitleexl" id="jobtitleexl" value="<?php echo $campaign['jobtitleexl']; ?>">
                                </div>
                                <span style='color:#FF0000' id="jtitle_msg"></span>
                            </div>
                            <div class="col-sm-2">
                                <select class="form-control form-control-sm cdqadisable" name="jlevel" id="jlevel" >
                                <option value="">Job Level</option>
                                <?php foreach ($joblevel as $joblevel): ?>
                                    <option value="<?php echo $joblevel['joblids']; ?>"><?php echo $joblevel['joblevel']; ?></option>
                                <?php endforeach; ?>  
                               
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <select class="js-example-basic-single" name="desid" id="desid">
                                <option value="">Designation</option>
                                <?php foreach ($designation as $designation): ?>
                                    <option value="<?php echo $designation['jid']; ?>"><?php echo $designation['joblist']; ?></option>
                                <?php endforeach; ?>  
                                </select>
                            </div>
                        </div>

                        <hr>
                        <div class="form-group row">
                        <div class="col-sm-2">
                                 <select class="js-example-basic-single" name="dcd" id="dcd">
                                    <option value=""> Department</option>
                                <?php foreach ($departments as $dept): ?>
                                    <option value="<?php echo $dept['dcd']; ?>"><?php echo $dept['department']; ?></option>
                                <?php endforeach; ?>
                                </select>
                            </div> 
                            <div class="col-sm-2">
                                <div class="newsletter-signup">
                                <input type="text"  autocomplete = "off" name="email" id="email"  placeholder="Email"  class="form-control form-control-sm cdqadisable">
                               </div>
                                <span style='color:#FF0000' id="email_msg"></span>
                            </div>
                            <div class="col-sm-2">
                                <input type="text"  autocomplete = "off"  name="phone" id="phone"  placeholder="Phone" maxlength="15"  class="form-control form-control-sm cdqadisable">
                                <span style='color:#FF0000' id="phone_msg"></span>
                            </div>
                            <div class="col-sm-2">
                                <input type="text"  name="altphn" id="altphn"  placeholder="Alternate Phone Number" maxlength="10"  class="form-control form-control-sm cdqadisable">
                            </div>
                            
                            <div class="col-sm-2">
                                <input type="text"  autocomplete = "off" name="phext" id="phext"  placeholder="Extension" maxlength="5"  class="form-control form-control-sm cdqadisable">
                            </div>
                            <div class="col-sm-2">
                          
                                <input type="text"  autocomplete = "off"  name="plink" id="plink"  placeholder="Prospect Link"  class="form-control form-control-sm"  >
                               
                                <span style='color:#FF0000' id="url_msg"></span>
                            </div>
                        
                      </div>
              <hr>
                        <div class="form-group row">
                              <div class="col-sm-2">
                               <select name="linetype" id="linetype"  class="form-control  form-control-sm cdqadisable">
                                     <option value="0">Line Type</option>
                                     <option value="0">unknown</option>
                                     <option value="1">Direct</option>
                                     <option value="2">Board</option>  
                               </select>
                           </div>
                              <div class="col-sm-2">
                              <div class="tooltips">
                                <div class="compcheck">
                                <?php if(!empty($comp_list)) { ?>
                                 <select name="company_name" id="company_name"   class="js-example-basic-single"> 
                                     <option value="">Company Name</option>
                                     <?php foreach ($comp_list as $comp_list): ?>
                                    <option value="<?php echo $comp_list['companynms']; ?>" <?php if(isset($ldmster) && $ldmster['cname'] == $comp_list['companynms']){ echo "selected" ; } ?>><?php echo $comp_list['companynms']; ?></option>
                                <?php endforeach; ?> 
                               </select>
                               <?php } else{ ?>
                                <input type="text" autocomplete = "off"  name="company_name" id="company_name"  placeholder="Company Name"  class="form-control form-control-sm cdqadisable">
                                <?php  } ?>
                                </div>

                                <span class="tooltiptext" id="copypaste" style="height: 40px; font-size:15x"> 
                                 <!-- <i class="icofont icofont-rounded-down"></i> --> Company Name
                                   <!-- <button onclick="copyToClipboard('#company_name')">Copy TEXT 1</button> -->
                                   </span>
                               </div>

                                <span style='color:#FF0000' id="comp_msg"></span>
                              </div> 

                            <div class="col-sm-2">
                                <input type="text"  autocomplete = "off" name="address" id="address"  placeholder="Address"  class="form-control form-control-sm cdqadisable">
                           </div>
                           <div class="col-sm-2">
                                <input type="text"  autocomplete = "off" name="city" id="city"  placeholder="City"  class="form-control form-control-sm cdqadisable">
                           </div>
                           <div class="col-sm-2">
                                <input type="text"  autocomplete = "off" name="state" id="state"  placeholder="State"  class="form-control form-control-sm cdqadisable">
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <input type="text"  autocomplete = "off" name="zip_code" id="zip_code"  placeholder="Zip Code"  class="form-control form-control-sm cdqadisable">
                           </div>
                        </div>
                       <hr>

                        <div class="form-group row">
                          <div class="col-sm-2">
                                      <select class="js-example-basic-single" name="country_id" id="country_id">
                                      <option value="">Countries</option>
                                  <?php foreach ($countriesofcampaign as $countriesofcampaign): ?>
                                      <option value="<?php echo $countriesofcampaign['countrycd']; ?>"  ><?php echo $countriesofcampaign['countryname']; ?></option>
                                  <?php endforeach; ?>
                                  </select>
                                  <span style='color:#FF0000' id="country_id_msg"></span>
                              </div>
                            
                            <div class="col-sm-2">
                              <select class="js-example-basic-single"  name="timezone" id="timezone">
                              <option value="">Timezone</option>
                            
                                </select>
                                <span style='color:#FF0000' id="timezone_msg"></span>
                            </div>

                            <div class="col-sm-2">
                               <select name="ctype" id="ctype"  class="form-control  form-control-sm cdqadisable"> 
                                     <option value="0">Company Type</option>
                                     <?php foreach ($comptype as $comptype): ?>
                                    <option value="<?php echo $comptype['ctypid']; ?>"><?php echo $comptype['ctypname']; ?></option>
                                <?php endforeach; ?> 
                               </select>
                           </div>
                           
                        

                            <!-- toolbar options -->
                            <div id="toolbar-options" class="hidden">
                                  <a href="#myModalemail" data-target="#myModalemail" data-toggle="modal"><i class="icofont icofont-info-circle"></i></a>
                                                          
                            </div>


                            <div class="col-sm-2">
                                <div data-toolbar="user-options"  id="info-toolbar">
                                  <select class="js-example-basic-single"  name="industrycd" id="industrycd">
                                    <option value="">Industry</option>
                                    <?php foreach ($industries as $industry): ?>
                                          <option value="<?php echo $industry['industrycd']; ?>"><?php echo $industry['industry']; ?></option>
                                      <?php endforeach; ?>
                                  </select>
                                    <span style='color:#FF0000' id="industry_id_msg"></span>
                                </div>
                            </div>
                            <div class="col-sm-2">
                            <div data-toolbar="user-options"  id="grow-toolbar">
                                <select class="js-example-basic-single" name="subindustrycd" id="subindustrycd">
                                <option value="">Sub Industry</option>
                                <?php foreach ($industriessub as $sub): ?>
                                    <option value="<?php echo $sub['subindustrycd']; ?>"><?php echo $sub['subindustry']; ?></option>
                                <?php endforeach; ?>
                                </select>
                                <span style='color:#FF0000' id="subindustry_id_msg"></span>
                            </div>
                            </div>
                            <div class="col-sm-2">
                                <select class="form-control form-control-sm cdqadisable" name="sectyp" id="sectyp">
                                  
                                    <option value="0">Sector Type</option>
                                    <option value="0">Unknown</option>
                                    <option value="1">Public</option>
                                    <option value="2">Private</option>
                                    <option value="3">Government</option>
                                    <option value="4">Non -Profit </option>
                               
                                    </select>
                            </div>

                        </div>
                <hr>
                    <div class="form-group row">
                        <div class="col-sm-2">
                        <div class="tooltips">
                                <input type="text"  autocomplete = "off"  name="empsize" id="empsize" maxlength="6" placeholder="Actual Employee Size"  class="form-control form-control-sm cdqadisable">
                               
                                <span class="tooltiptext"> Select range  between <?php echo $campaign['emplbnd']; ?> & <?php echo $campaign['empubnd']; ?></span>
                                </div>
                                <span style='color:#FF0000' id="empsize_msg"></span>
                            </div>
                            <div class="col-sm-2">
                              <div class="tooltips">
                                <input type="text"  autocomplete = "off"  name="arevenue" id="arevenue" maxlength="15" placeholder="Actual Revenue Size"  class="form-control form-control-sm cdqadisable">
                                <span class="tooltiptext"> Select range  between <?php echo $campaign['revlbnd']; ?> <?php echo $campaign['revlbdim']; ?> 
                          & <?php echo $campaign['revubnd']; ?> <?php echo $campaign['revubdim']; ?></span>
                              </div>
                               
                                <span style='color:#FF0000' id="revsize_msg"></span>
                            </div>
                            
                            
                            <div class="col-sm-2">
                                <select class="form-control form-control-sm cdqadisable" name="mlbl" id="mlbl">
                                
                                    <option value="0">K</option>
                                    <option value="1">M</option>
                                    <option value="2">B</option>
                                    <option value="3">T</option>
                                 </select>
                            </div>          
                            <div class="col-sm-2">
                                <select class="form-control form-control-sm cdqadisable" name="curr" id="curr">
                                    <option value="1">USD</option>                                  
                                
                                   </select>
                            </div>          
                            <div class="col-sm-2">
                                <div class="domaincheck">
                                <?php if(!empty($domain)) { ?>
                                 <select name="domain" id="domain"   class="js-example-basic-single"> 
                                     <option value="">Domain</option>
                                     <?php foreach ($domain as $domain): ?>
                                    <option value="<?php echo $domain['domainnms']; ?>" <?php if(isset($ldmster) && $ldmster['domain'] == $domain['domainnms']){ echo "selected" ; } ?>><?php echo $domain['domainnms']; ?></option>
                                <?php endforeach; ?> 
                               </select>
                               <?php } else{ ?>
                                <input type="text"  autocomplete = "off"  name="domain" id="domain"  placeholder="Domain" value=""  class="form-control form-control-sm cdqadisable">
                                <?php  } ?>
                                </div>
                                <span style='color:#FF0000' id="domain_msg"></span>
                              </div>
                            
                            <div class="col-sm-2">
                                <input type="text"  autocomplete = "off" name="empszlink" id="empszlink" value=""   placeholder="Employee Size Link"  class="form-control form-control-sm">
                            </div>
                           
                        </div>
                        
                        <hr>
                        <div class="form-group row">
                           
                        <div class="col-sm-2 ">
                                <input type="text"  autocomplete = "off" name="indlink" id="indlink"  placeholder="Industry Link" value="" class="form-control form-control-sm">
                            </div>
                            <div class="col-sm-2">
                                <input type="text"  autocomplete = "off" name="revszlink" id="revszlink" value=""    placeholder="Revenue Size Link"  class="form-control form-control-sm revsizehide">
                            </div>
                            <div class="col-sm-2">
                                <input type="text"  autocomplete = "off"  name="othrlink" id="othrlink" value=""  placeholder="Other Link"  class="form-control form-control-sm">
                            </div>
                            <div class="col-sm-2">
                                <select class="form-control form-control-sm"  name="emailver" id="emailver">
                                    <option value="0">Email Verification</option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <input type="text"  autocomplete = "off"  name="aum" id="aum"  placeholder="Asset Under Management"  class="form-control form-control-sm aumdis">
                            </div>
                            <div class="col-sm-2">
                                <select class="form-control form-control-sm commentvisible" name="assetid" id="assetid">
                                    <option value="0">Asset</option>
                                    <?php foreach ($assetitle as $assetitle): ?>
                                    <option value="<?php echo $assetitle['assetid']; ?>"><?php echo $assetitle['title']; ?></option>
                                <?php endforeach; ?>
                                   </select>
                            </div> 
                        </div>
                        <hr>
                        <div class="form-group row">
                        <?php if(!empty($comp_dispostatus)) { ?>
                          <div class="col-sm-2">
                                <select class="form-control form-control-sm"  name="dispositiontagforcomplist" id="dispositiontagforcomplist">
                                    <option value="">Disposition Reason for company </option>
                                    <option value="Prospect not interested">Prospect not interested</option>
                                   
                                </select>
                          </div> 
                          <?php } ?>

                          <?php if(!empty($domain_dispostatus)) { ?>
                          <div class="col-sm-2">
                                <select class="form-control form-control-sm"  name="dispositiontagfordomain" id="dispositiontagfordomain">
                                    <option value="">Disposition Reason for Domain </option>
                                    <option value="Prospect not interested">Prospect not interested</option>
                                  
                                </select>
                          </div> 
                          <hr>
                          <?php } ?>
                        </div>



                        <div class="form-group row">
                        <div class="col-sm-2">
                                <select class="form-control form-control-sm commentvisible"  name="cvr" id="cvr">
                                    <option value="">Call Verified</option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>

                        <div class="col-sm-2">
                                <select class="form-control form-control-sm commentvisible"  name="lcalldisp" id="lcalldisp">
                                    <option value="">Call Disposition</option>
                                  
                                    <option value="Voicemail">Voicemail</option>
                                    <option value="VM_DBN">VM_DBN</option>
                                    <option value="VM_DIRECT">VM_DIRECT</option>
                                    <option value="VM_EXTN">VM_EXTN</option>
                                    <option value="POC">POC</option>
                                    <option value="Assistant CNF">Assistant CNF</option>
                                    <option value="Assistant VM">Assistant VM</option>
                                    <option value="Assistant Extn">Assistant Extn</option>
                                    <option value="Operator">Operator</option>
                                    <option value="OPR_CNF">OPR_CNF</option>
                                    <option value="OPR_VM">OPR_VM</option>
                                    <option value="VM but Prospect Left">VM but Prospect Left</option>
                                    <option value="OPR_NOTFR">OPR_NOTFR</option>
                                    <option value="ONLY EMAIL">ONLY EMAIL</option>
                                    <option value="Lead">Lead</option>
                                    <option value="Half Lead">Half Lead</option>
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <select class="form-control form-control-sm commentvisible"  name="lcallstat" id="lcallstat">
                                    <option value="">Call on hold/call back</option>
                                    <option value="0">Call back</option>
                                    <option value="2">complete</option>
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <select class="form-control form-control-sm commentvisible"  name="ddispositionclass" id="ddispositionclass">
                              
                                <option value="0">Disposition Class- Live</option>
                                    <option value="1">Dead</option>
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <select class="form-control form-control-sm commentvisible"  name="cdclst" id="cdclst">
                                    <option value="">Lead Score</option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <select class="form-control form-control-sm commentvisible"  name="callrec" id="callrec">
                                    <option value="">Call Recording</option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                       </div>
                          <div class="form-group row optindiv">
                                       
                                       <div class="col-sm-2">
                                        Opt - in  <input type="checkbox" value=""  id="optin" name="optin" class="js-single optin"  />
                                        </div>
                                        <div class="col-sm-2 optoption">
                                        Opt - in Post  <input type="checkbox" value="" id="optpst" name="optpst" class="js-single"  />
                                        </div>
                                       
                                        <div class="col-sm-2 optoption">
                                        Opt - in Phone <input type="checkbox" value=""  id="optph" name="optph" class="js-single"  />
                                        </div>
                                        
                                        <div class="col-sm-2 optoption">
                                        Opt - in Email <input type="checkbox" value="" id="opteml" name="opteml" class="js-single"  />
                                        </div>
                                        <div class="col-sm-2 ">
                                        DND <input type="checkbox" value="" id="dnd" name="dnd" class="js-single dnd"  />
                                        </div>
                         </div>
                       

                        <div class="form-group row questionrow">  
                         
                          
                        </div> 
                        <br>

                        <div class="form-group row" >
                             <div class="col-sm-12 commentvisible">
                                <label class="col-lable"><b>Comment</b></label>
                                <input type="text"  autocomplete = "off" name="pcomt" id="pcomt"  placeholder="Comment"  class="form-control form-control-sm">
                            </div> 
                         </div>
                        <input type = hidden name="campaign_id" id="campaign_id" value="<?php echo $campaign['cnid']; ?>">
                        <input type = hidden name="campaign_idcids" id="campaign_idcids" value="<?php echo $campaign['cids']; ?>">
                        
                        <div class="col-sm-12">
                             <center>
                        <button type="submit" name="leadsubmit" class="btn btn-primary leaddisplay" style=""  id="leadsubmit">Submit </button> 
                        <!-- <button type="submit" name="leadsave" class="btn btn-primary leaddisplay" style="margin-left:50px"   id="leadsave">Skip </button>  -->
                        <!-- <input class="submit" class ="" type="submit" value="SUBMIT"> -->
                        <!-- below buttons are for cdqa save and submit -->
                        <button type="submit" name="submit" class="btn btn-primary cdqadisplay"   id="cdqasubmit">Submit  </button> 
                        <!-- <button type="submit" name="submit" class="btn btn-primary cdqadisplay" style="margin-left:50px"   id="cdqasave">Skip  </button>  -->
                            </center>
                          </div>

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



  <!-- Modal -->
 <div class="modal fade" id="myModalemail1" role="dialog">
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
                      <input type ="text"  id="search_textjt" name="search_textjt" class="form-control form-control-sm" placeholder="Search suppressed jobtitles here...">
                    </div>
                </div>
                
            </form>
         <div id="resultdivjt"></div>
                <div style="clear:both"></div>
                <br />
               </div>
        </div>
        <div class="modal-footer">
        <button type="button" id="searchbtnjt" name ="searchbtnjt" class="btn btn-primary">Search</button>
          <button type="button" class="btn btn-danger " data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>


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


//job titles search start
$(document).ready(function(){
	// load_data();
  var campaign_id = <?php  echo $campaign['cnid']; ?>;
	function load_datajt(query)
	{
		$.ajax({
			// url:"fetch.php",
      url:'<?php echo base_url("cdc/getsearcresultofjt");?>',
			method:"post",
			data:{
        query:query,
        campaign_id:campaign_id
      },
			success:function(data)
			{
				$('#resultdivjt').html(data);
			}
		});
	}
	
	$('#search_textjt').keyup(function(){
		var searchjt = $(this).val();
		if(searchjt != '')
		{
			load_datajt(searchjt);
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
  // var lbound = 1;
  var ubound = $('#php_ubound').val();
  // alert(parseInt(ubound));
  var value = $(this).val();
  
  
  if ( value > parseInt(ubound) || value < parseInt(lbound)) 
 
 {
  $("#empsize_msg").html("Not in Range");
  $(this).val("");
 }else{
  $("#empsize_msg").html("");
 }



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
          // $('#timezone').append('<option value="'+data['zoneid']+'">'+data['abbrev']+'</option>');
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
$('#arevenue').change(function(){

  $("#revszlink").prop('disabled', false);
  $('#revszlink').val("");
  
});

$('#company_name').change(function(){
  var company_name = $(this).val();
  $("#copypaste").html(company_name);
 
  
});

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
      // alert(m+" "+lrevrangenumber1+" "+urevrangenumber1);
    
      if(m > parseInt(urevrangenumber1) || m < parseInt(lrevrangenumber1)){
        alert("not in range");
        $('#arevenue').val("");
      }else{
        // alert("in range");
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
     
    }
 
    if(m > parseInt(urevrangenumber1) || m < parseInt(lrevrangenumber1)){
        alert("not in range");
        $('#arevenue').val("");
      }else{
       
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
      
        }
    });
});


     // Campaign Name no special character allowed validation code
    $(function () {
        $("#fname").keypress(function (e) {
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

 // Check unique jobtitle
 $('.jtitilelist input:first').blur(function(){
      var jtitle = $('#jtitle').val();
      var jobtitleexl = $('#jobtitleexl').val();
      var campaign_id = <?php  echo $campaign['cnid']; ?>;
      var url = '<?php echo base_url("cdc/checkjtitle");?>';
      console.log(url+'?jtitle='+jtitle+"&campaign_id="+campaign_id);
    // AJAX request
    $.ajax({

        url:'<?php echo base_url("cdc/checkjtitle");?>',
        method: 'get',
        data: {
          jtitle: jtitle,
          campaign_id: campaign_id,
          jobtitleexl:jobtitleexl
          
          },
        dataType: 'json',
        success: function(response){
          $( '#jtitle_msg' ).html(response);
          if(response.domaincheckincl == "true")
          {
            $("#jtitle_msg").html("");
            console.log("true");
            return true;	
          }
          if(response.domaincheckincl == "false")
          {
            $("#jtitle_msg").html("Not in Inclusion jobtitle List");
            console.log("true");
            // return true;	
          }
          else if(response.jtitlesupp == "true")
          {
            $("#jtitle_msg").html("Suppressed jobtitle");
            console.log("true");
            $('#jtitle').val("");
            return true;	
          } else 
          {
            $("#jtitle_msg").html("");
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
  
  $("#revszlink").prop('disabled', true);
  $('#revszlink').val("NA");

  // $('.commentvisible').hide();
  // $('.revsizehide').hide();

  // $('.leaddisplay').show(); //buttons
  // $('.cdqadisplay').hide();//buttons
  // load questions of campaign on load 
  // $('.optoption').hide();
    
  $('.optin').change(function()
      {
        if ($('#optin').is(':checked')) {
            $('#optin').val("1");
            $('#opteml').val("1");
            $('#optph').val("1");
            $('#optpst').val("1");
            $('#dnd').val("0");
            $('.optoption').show();
            $("#opteml").prop('checked', true);
            $("#optph").prop('checked', true);
            $("#optpst").prop('checked', true);
            $("#dnd").prop('checked', false);
           
           
          
               
        }else{
            $('#optin').val("0");
            $('#opteml').val("0");
            $('#optph').val("0");
            $('#optpst').val("0");
            $('.optoption').hide();
               
        };
      });


      $('#opteml').change(function()
      {
        var checksupp = $('#opteml').prop('checked');
       
            if(checksupp == true)
            {
              $('#opteml').val("1");
            }
            else
            {
              $('#opteml').val("0");
            }

          });
     
      $('#optph').change(function()
      {
        var checksupp = $('#optph').prop('checked');
        
            if(checksupp == true)
            {
              $('#optph').val("1");
            }
            else
            {
              $('#optph').val("0");
            }

          });
     
      $('#optpst').change(function()
      {
        var checksupp = $('#optpst').prop('checked');
        
            if(checksupp == true)
            {
              $('#optpst').val("1");
            }
            else
            {
              $('#optpst').val("0");
            }

          });
     

      $('.dnd').change(function()
      {
        if ($('#dnd').is(':checked')) {
          $("#optin").prop('checked', false);
          $('.dnd').val("1");
            $('#optin').val("0");
            $('#opteml').val("0");
            $('#optph').val("0");
            $('#optpst').val("0");
            $("#optin").prop('checked', false);
            
            $('.optoption').hide();   
        }else{
            $('#optin').val("1");
            $('#opteml').val("1");
            $('#optph').val("1");
            $('#optpst').val("1");
            $("#optin").prop('checked', true);
            $('.dnd').val("0");
            $('.optoption').show();
               
        };
      });



  $("#basic-form").validate({
    rules: {
        sal : {
        required: true
      },
      cvr : {
        required: true
      },
      callrec : {
        required: true
      },
      cdclst : {
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
      altphn: {
        number: true
      },
      aum: {
        number: true
      },
      empsize: {
        required: true,
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
    $(function() {
        $("#leadsubmit").on('click', function() 
        {
         
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
              
              $("#revszlink").prop('disabled', true);
              $('#revszlink').val("NA");
            }else if(arevenue != ""){
              
              $("#revszlink").prop('disabled', false);
              var revszlink = $('#revszlink').val();
            }
        

            var othrlink = $('#othrlink').val();
            var emailver = $('#emailver').val();
            var aum = $('#aum').val();
            var assetid = $('#assetid').val();
            
            var optin = $('#optin').val();
            var optpst = $('#optpst').val();
            var opteml = $('#opteml').val();
            var optph = $('#optph').val();
            var optoption = $('#optoption').val();

            var aa1 = $('#aa1').val();
            var aa2 = $('#aa2').val();
            var aa3 = $('#aa3').val();
            var aa4 = $('#aa4').val();
            var aa5 = $('#aa5').val();
            var aa6 = $('#aa6').val();
            var aa7 = $('#aa7').val();
            var aa8 = $('#aa8').val();
            var aa9 = $('#aa9').val();
            var aa10 = $('#aa10').val();
            var aa11 = $('#aa11').val();
            var aa12 = $('#aa12').val();
          
            
           
            if(fname != "" && lname != "" && company_name != "" && jlevel != "" && jtitle != "" && desid != "" && dcd !="" && email != "" && phone !="" && plink !="" && address != "" && city != "" && state != ""  && country_id != "" && industrycd != "" && subindustrycd != "" && empsize != "" && domain !=""  && empszlink != "" && revszlink != ""  && zip_code !="" ){
            var url = encodeURI("<?php echo base_url("cdc/ajax_add_new_leadandcdc");?>");
            console.log(url+"?campaign_id="+campaign_id+"&sal="+sal+"&fname="+fname+"&lname="+lname+"&jtitle="+jtitle+"&desid="+desid+"&jlevel="+jlevel+"&dcd="+dcd+"&email="+email+"&phone="+phone+"&altphn="+altphn+"&phext="+phext+"&plink="+plink+"&company_name="+company_name+"&address="+address+"&city="+city+"&state="+state+"&zip_code="+zip_code+"&country_id="+country_id+"&timezone="+timezone+"&ctype="+ctype+"&linetype="+linetype+"&industrycd="+industrycd+"&subindustrycd="+subindustrycd+"&sectyp="+sectyp+"&empsize="+empsize+"&mlbl="+mlbl+"&curr="+curr+"&arevenue="+arevenue+"&empszlink="+empszlink+"&indlink="+indlink+"&domain="+domain+"&othrlink="+othrlink+"&revszlink="+revszlink+"&emailver="+emailver+"&aum="+aum+"&assetid="+assetid+"&optin="+optin+"&optpst="+optpst+"&optph="+optph+"&opteml="+opteml+"&optoption="+optoption+"&aa1="+aa1+"&aa2="+aa2+"&aa3="+aa3+"&aa4="+aa4+"&aa5="+aa5+"&aa6="+aa6+"&aa7="+aa7+"&aa8="+aa8+"&aa9="+aa9+"&aa10="+aa10+"&aa11="+aa11+"&aa12="+aa12+"&pcomt="+pcomt);
           
            $.ajax({
                url :'<?php echo base_url("cdc/ajax_add_new_leadandcdc");?>',
                type: 'GET',               
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

                
                  $("#leadsave").hide();
                  
                    var text = response.statusCode;
                    console.log("check");
                   
                    if(response.statusCode == "Success") 
                    {         
                                  
                        $("#leadsubmit").html(response.message);
                        top.location.href=base_url+"cdc/addlead?camp_id="+<?php echo $campaign['cnid']; ?>;//redirection
                     
                    }else if(response.data=="Fail")
                    {
                        $("#leadsubmit").html(response.message);
                        
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
              
              $("#revszlink").prop('disabled', true);
              $('#revszlink').val("NA");
            }else if(arevenue != ""){
              
              $("#revszlink").prop('disabled', false);
              var revszlink = $('#revszlink').val();
            }
            
            var othrlink = $('#othrlink').val();
            var emailver = $('#emailver').val();
            var aum = $('#aum').val();
            var assetid = $('#assetid').val();
            
            var optin = $('#optin').val();
            var optpst = $('#optpst').val();
            var opteml = $('#opteml').val();
            var optph = $('#optph').val();
            var optoption = $('#optoption').val();

            var aa1 = $('#aa1').val();
            var aa2 = $('#aa2').val();
            var aa3 = $('#aa3').val();
            var aa4 = $('#aa4').val();
            var aa5 = $('#aa5').val();
            var aa6 = $('#aa6').val();
            var aa7 = $('#aa7').val();
            var aa8 = $('#aa8').val();
            var aa9 = $('#aa9').val();
            var aa10 = $('#aa10').val();
            var aa11 = $('#aa11').val();
            var aa12 = $('#aa12').val();
          
            

            if(fname != "" && lname != "" && company_name != "" && jlevel != "" && jtitle != "" && desid != "" && dcd !="" && email != "" && phone !="" && plink !="" && address != "" && city != "" && state != ""  && country_id != "" && industrycd != "" && subindustrycd != "" && empsize != "" && domain !=""  && empszlink != "" && revszlink != ""  && zip_code !="" ){
            var url = encodeURI("<?php echo base_url("cdc/ajax_save_leadandcdc");?>");
            console.log(url+"?campaign_idcids="+campaign_idcids+"&campaign_id="+campaign_id+"&sal="+sal+"&fname="+fname+"&lname="+lname+"&jtitle="+jtitle+"&desid="+desid+"&jlevel="+jlevel+"&dcd="+dcd+"&email="+email+"&phone="+phone+"&altphn="+altphn+"&phext="+phext+"&plink="+plink+"&company_name="+company_name+"&address="+address+"&city="+city+"&state="+state+"&zip_code="+zip_code+"&country_id="+country_id+"&timezone="+timezone+"&ctype="+ctype+"&linetype="+linetype+"&industrycd="+industrycd+"&subindustrycd="+subindustrycd+"&sectyp="+sectyp+"&empsize="+empsize+"&mlbl="+mlbl+"&curr="+curr+"&arevenue="+arevenue+"&empszlink="+empszlink+"&indlink="+indlink+"&domain="+domain+"&othrlink="+othrlink+"&revszlink="+revszlink+"&emailver="+emailver+"&aum="+aum+"&assetid="+assetid+"&optin="+optin+"&optpst="+optpst+"&optph="+optph+"&opteml="+opteml+"&optoption="+optoption+"&aa1="+aa1+"&aa2="+aa2+"&aa3="+aa3+"&aa4="+aa4+"&aa5="+aa5+"&aa6="+aa6+"&aa7="+aa7+"&aa8="+aa8+"&aa9="+aa9+"&aa10="+aa10+"&aa11="+aa11+"&aa12="+aa12+"&pcomt="+pcomt);
           
            $.ajax({
                url :'<?php echo base_url("cdc/ajax_save_leadandcdc");?>',
                type: 'GET', 
                dataType: 'Json',              
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
       
                success: function(response){

                 
                    var text = response.statusCode;
                    console.log("check");
                   
                    if(response.statusCode == "Success") 
                    {     
                                
                        $("#leadsave").html(response.message);
                        top.location.href=base_url+"cdc/addlead?camp_id="+<?php echo $campaign['cnid']; ?>;//redirection
                      
                    }else if(response.statusCode=="Fail")
                    {
                        $("#leadsave").html(response.message);
                        
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
</script>   
<!--  code for Submit data in CDQA -->
<script>
    $(function() {
        $("#cdqasubmit").on('click', function() 
        {

          var dispositiontagfordomain = $('#dispositiontagfordomain').val();
          var dispositiontagforcomplist = $('#dispositiontagforcomplist').val();
          // alert(dispositiontagfordomain);
          if(dispositiontagfordomain == undefined){
            var dispositiontagfordomain = '';

            // alert(dispositiontagfordomain);
          }
          if(dispositiontagforcomplist == undefined){
            var dispositiontagforcomplist = '';

            // alert(dispositiontagforcomplist);
          }

//           if (($("#dispositiontagfordomain").length > 0)){
//    alert('yes');
//    alert(dispositiontagfordomain);
// }else{
//   alert(dispositiontagfordomain);
// }
//           // alert(dispositiontagfordomain);
//           alert(dispositiontagforcomplist);
 
          // if(dispositiontagforcomplist != ""){
          //   alert("Please remove disposition reason or Click on Skip");
          //    return; 
          // }
          //   if(dispositiontagfordomain != ""){
          //     alert("Please remove disposition reason or Click on Skip");
          //    return; 
          //   }

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
           var revszlink = $('#revszlink').val();
           var pcomt = $('#pcomt').val();

           var arevenue = $('#arevenue').val();
           var othrlink = $('#othrlink').val();
           var emailver = $('#emailver').val();
           var aum = $('#aum').val();
           var assetid = $('#assetid').val();
           
           var optin = $('#optin').val();
           var optpst = $('#optpst').val();
           var opteml = $('#opteml').val();
           var optph = $('#optph').val();
           var optoption = $('#optoption').val();

           var aa1 = $('#aa1').val();
           var aa2 = $('#aa2').val();
           var aa3 = $('#aa3').val();
           var aa4 = $('#aa4').val();
           var aa5 = $('#aa5').val();
           var aa6 = $('#aa6').val();
           var aa7 = $('#aa7').val();
           var aa8 = $('#aa8').val();
           var aa9 = $('#aa9').val();
           var aa10 = $('#aa10').val();
           var aa11 = $('#aa11').val();
           var aa12 = $('#aa12').val();
         
           if(aa1 == undefined){
            var aa1 = 0;
           }
           if(aa2 == undefined){
            var aa2 = 0;
           }
           if(aa3 == undefined){
            var aa3 = 0;
           }
           if(aa4 == undefined){
            var aa4 = 0;
           }
           if(aa5 == undefined){
            var aa5 = 0;
           }
           if(aa6 == undefined){
            var aa6 = 0;
           }
           if(aa7 == undefined){
            var aa7 = 0;
           }
           if(aa8 == undefined){
            var aa8 = 0;
           }
           if(aa9 == undefined){
            var aa9 = 0;
           }
           if(aa10 == undefined){
            var aa10 = 0;
           }
           if(aa11 == undefined){
            var aa11 = 0;
           }
           if(aa12 == undefined){
            var aa12 = 0;
           }
          

            var lcalldisp = $('#lcalldisp').val();
            var lcallstat = $('#lcallstat').val();
            var ddispositionclass = $('#ddispositionclass').val();
            var cdclst = $('#cdclst').val();
            var callrec = $('#callrec').val();
            var cvr = $('#cvr').val();

            if(dispositiontagforcomplist != ""|| dispositiontagfordomain != ""){

              if(company_name == "" && dispositiontagforcomplist != ""){
                alert("Select Company Name");
                return;
              }
              if(domain == "" && dispositiontagfordomain != ""){
                alert("Select Domain");
                return;
              }
             
                         if(confirm(" Disposition reason is selected.Data will not save, are you sure?")){ 
                           $.ajax({
                         url :'<?php echo base_url("cdc/ajax_update_leadandcdcbyCDQA_domain_disposition");?>', //domain and complist both
                         type: 'GET', 
                         dataType: 'json',              
                         data: {
                            
                          campaign_id: campaign_id,
                           dispositiontagfordomain:dispositiontagfordomain,
                           domain:domain,
                           dispositiontagforcomplist:dispositiontagforcomplist,
                           company_name:company_name

                          
                         },
                 async: true,
                         cache: false,
                         success: function(response){
                           console.log("Success");
                             if(response.statusCode == "Success") 
                             {   
                                 $("#cdqasubmit").html(response.message);
                                 top.location.href=base_url+"cdc/addlead?camp_id="+<?php echo $campaign['cnid']; ?>;//redirection
                               
                               } else if(response.statusCode =="Exist")
                               {
                                 alert("Record already Exist");
                               }
                           },
                          error: function (error) {
                                 alert("Error domain and complist");
                               
                                 }
                             
                           }); // ajax end
         
                           
                               }else{
                                         return;
                                       }
            }// domain end


            // if(company_name != "" && dispositiontagforcomplist != ""){
             
            //           if(confirm("Company Disposition reason is selected.Data will not save, are you sure?")){ 
            //             $.ajax({
            //           url :'<?php echo base_url("cdc/ajax_update_leadandcdcbyCDQA_complist_disposition");?>',
            //           type: 'GET', 
            //           dataType: 'json',              
            //           data: {
                         
                        
            //            dispositiontagforcomplist:dispositiontagforcomplist,
            //            company_name:company_name
                       
            //           },
            //   async: true,
            //           cache: false,
            //           success: function(response){
            //             console.log("Success");
            //               if(response.statusCode == "Success") 
            //               {   
            //                   $("#cdqasubmit").html(response.message);
            //                   top.location.href=base_url+"cdc/addlead?camp_id="+<?php echo $campaign['cnid']; ?>;//redirection
                            
            //                 } else if(response.statusCode =="Exist")
            //                 {
            //                   alert("Record already Exist");
            //                 }
            //             },
            //            error: function (error) {
            //                   alert("Error complist");
                            
            //                   }
                          
            //             }); // ajax end
         
                        
            //                 }else{
            //                           return;
            //                         }
            
            //      }// complist end

          
           if(cvr != "" && callrec != "" && cdclst !="" && fname != "" && lname != "" && company_name != "" && jlevel != "" && jtitle != "" && desid != "" && dcd !="" && email != "" && phone !="" && plink !="" && address != "" && city != "" && state != ""  && country_id != "" && industrycd != "" && subindustrycd != "" && empsize != "" && domain !=""  && empszlink != "" && revszlink != ""  && zip_code !="" ){
              if(dispositiontagforcomplist != "" || dispositiontagfordomain != ""){
                if(confirm("Disposition reason is selected.Data will not save, are you sure?")){ 
                      }else{
                                return;
                              }
              }
           var url = encodeURI("<?php echo base_url("cdc/ajax_submit_leadandcdcbyCDQA");?>");
           console.log(url+"?campaign_id="+campaign_id+"&sal="+sal+"&fname="+fname+"&lname="+lname+"&jtitle="+jtitle+"&desid="+desid+"&jlevel="+jlevel+"&dcd="+dcd+"&email="+email+"&phone="+phone+"&altphn="+altphn+"&phext="+phext+"&plink="+plink+"&company_name="+company_name+"&address="+address+"&city="+city+"&state="+state+"&zip_code="+zip_code+"&country_id="+country_id+"&timezone="+timezone+"&ctype="+ctype+"&linetype="+linetype+"&industrycd="+industrycd+"&subindustrycd="+subindustrycd+"&sectyp="+sectyp+"&empsize="+empsize+"&mlbl="+mlbl+"&curr="+curr+"&arevenue="+arevenue+"&empszlink="+empszlink+"&indlink="+indlink+"&domain="+domain+"&othrlink="+othrlink+"&revszlink="+revszlink+"&emailver="+emailver+"&aum="+aum+"&assetid="+assetid+"&optin="+optin+"&optpst="+optpst+"&optph="+optph+"&opteml="+opteml+"&optoption="+optoption+"&aa1="+aa1+"&aa2="+aa2+"&aa3="+aa3+"&aa4="+aa4+"&aa5="+aa5+"&aa6="+aa6+"&aa7="+aa7+"&aa8="+aa8+"&aa9="+aa9+"&aa10="+aa10+"&aa11="+aa11+"&aa12="+aa12+"&pcomt="+pcomt);
          
            $.ajax({
                url :'<?php echo base_url("cdc/ajax_submit_leadandcdcbyCDQA");?>',
                type: 'GET', 
                dataType: 'json',              
                data: {
                   
                  campaign_id: campaign_id,
                  campaign_idcids:campaign_idcids,
                  dispositiontagfordomain:dispositiontagfordomain,
                  dispositiontagforcomplist:dispositiontagforcomplist,
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
                    aum:aum,                 
                    
                    assetid:assetid,
                    optin:optin,
                    optph:optph,
                    opteml:opteml,
                    optpst:optpst,
                    optoption:optoption,
                    aa1:aa1,
                    aa2:aa2,
                    aa3:aa3,
                    aa4:aa4,
                    aa5:aa5,
                    aa6:aa6,
                    aa7:aa7,
                    aa8:aa8,
                    aa9:aa9,
                    aa10:aa10,
                    aa11:aa11,
                    aa12:aa12,


                    lcalldisp:lcalldisp,
                    lcallstat:lcallstat,
                    ddispositionclass:ddispositionclass,
                    cdclst:cdclst,
                    callrec:callrec,
                    cvr:cvr,

                    pcomt:pcomt     
                    
                    
				},
        async: true,
                cache: false,
                success: function(response){
                  console.log("Success");
                  
                  $("#cdqasave").hide();
                 
                    if(response.statusCode == "Success") 
                    {        
                          
                        $("#cdqasubmit").html(response.message);
                        top.location.href=base_url+"cdc/addlead?camp_id="+<?php echo $campaign['cnid']; ?>;//redirection
                      
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

    //        }else  if(domain != "" && dispositiontagfordomain != ""){
             
    //             if(confirm("Domain Disposition reason is selected.Data will not save, are you sure?")){ 
    //               $.ajax({
    //             url :'<?php echo base_url("cdc/ajax_update_leadandcdcbyCDQA_domain_disposition");?>',
    //             type: 'GET', 
    //             dataType: 'json',              
    //             data: {
                   
                  
    //               dispositiontagfordomain:dispositiontagfordomain,
    //               domain:domain
                 
    //             },
    //     async: true,
    //             cache: false,
    //             success: function(response){
    //               console.log("Success");
    //                 if(response.statusCode == "Success") 
    //                 {   
    //                     $("#cdqasubmit").html(response.message);
    //                     top.location.href=base_url+"cdc/addlead?camp_id="+<?php echo $campaign['cnid']; ?>;//redirection
                      
    //                   } else if(response.statusCode =="Exist")
    //                   {
    //                     alert("Record already Exist");
    //                   }
    //               },
    //              error: function (error) {
    //                     alert("Error domain");
                      
    //                     }
                    
    //               }); // ajax end

                  
    //                   }else{
    //                             return;
    //                           }
    //           // }

    //          } else  if(company_name != "" && dispositiontagforcomplist != ""){
             
    //          if(confirm("Company Disposition reason is selected.Data will not save, are you sure?")){ 
    //            $.ajax({
    //          url :'<?php echo base_url("cdc/ajax_update_leadandcdcbyCDQA_complist_disposition");?>',
    //          type: 'GET', 
    //          dataType: 'json',              
    //          data: {
                
               
    //           dispositiontagforcomplist:dispositiontagforcomplist,
    //           company_name:company_name
              
    //          },
    //  async: true,
    //          cache: false,
    //          success: function(response){
    //            console.log("Success");
    //              if(response.statusCode == "Success") 
    //              {   
    //                  $("#cdqasubmit").html(response.message);
    //                  top.location.href=base_url+"cdc/addlead?camp_id="+<?php echo $campaign['cnid']; ?>;//redirection
                   
    //                } else if(response.statusCode =="Exist")
    //                {
    //                  alert("Record already Exist");
    //                }
    //            },
    //           error: function (error) {
    //                  alert("Error complist");
                   
    //                  }
                 
    //            }); // ajax end

               
                  //  }else{
                  //            return;
                  //          }
   
        }else{
          alert("Please fill Mandatory Fields");
        }
        });
    });
</script>   
<!--  code for Save data in CDQA -->
<script>
    $(function() {
        $("#cdqasave").on('click', function() 
        {
         
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
           var revszlink = $('#revszlink').val();
           var pcomt = $('#pcomt').val();

           var arevenue = $('#arevenue').val();
           var othrlink = $('#othrlink').val();
           var emailver = $('#emailver').val();
           var aum = $('#aum').val();
           var assetid = $('#assetid').val();
           
           var optin = $('#optin').val();
           var optpst = $('#optpst').val();
           var opteml = $('#opteml').val();
           var optph = $('#optph').val();
           var optoption = $('#optoption').val();

           var aa1 = $('#aa1').val();
           var aa2 = $('#aa2').val();
           var aa3 = $('#aa3').val();
           var aa4 = $('#aa4').val();
           var aa5 = $('#aa5').val();
           var aa6 = $('#aa6').val();
           var aa7 = $('#aa7').val();
           var aa8 = $('#aa8').val();
           var aa9 = $('#aa9').val();
           var aa10 = $('#aa10').val();
           var aa11 = $('#aa11').val();
           var aa12 = $('#aa12').val();
         
           if(aa1 == undefined){
            var aa1 = 0;
           }
           if(aa2 == undefined){
            var aa2 = 0;
           }
           if(aa3 == undefined){
            var aa3 = 0;
           }
           if(aa4 == undefined){
            var aa4 = 0;
           }
           if(aa5 == undefined){
            var aa5 = 0;
           }
           if(aa6 == undefined){
            var aa6 = 0;
           }
           if(aa7 == undefined){
            var aa7 = 0;
           }
           if(aa8 == undefined){
            var aa8 = 0;
           }
           if(aa9 == undefined){
            var aa9 = 0;
           }
           if(aa10 == undefined){
            var aa10 = 0;
           }
           if(aa11 == undefined){
            var aa11 = 0;
           }
           if(aa12 == undefined){
            var aa12 = 0;
           }
          
          
           if(fname != "" && lname != "" && company_name != "" && jlevel != "" && jtitle != "" && desid != "" && dcd !="" && email != "" && phone !="" && plink !="" && address != "" && city != "" && state != ""  && country_id != "" && industrycd != "" && subindustrycd != "" && empsize != "" && domain !=""  && empszlink != "" && revszlink != ""  && zip_code !="" ){
            var url = encodeURI("<?php echo base_url("cdc/ajax_save_leadandcdcbyCDQA");?>");
            console.log(url+"?campaign_id="+campaign_id+"&sal="+sal+"&fname="+fname+"&lname="+lname+"&jtitle="+jtitle+"&desid="+desid+"&jlevel="+jlevel+"&dcd="+dcd+"&email="+email+"&phone="+phone+"&altphn="+altphn+"&phext="+phext+"&plink="+plink+"&company_name="+company_name+"&address="+address+"&city="+city+"&state="+state+"&zip_code="+zip_code+"&country_id="+country_id+"&timezone="+timezone+"&ctype="+ctype+"&linetype="+linetype+"&industrycd="+industrycd+"&subindustrycd="+subindustrycd+"&sectyp="+sectyp+"&empsize="+empsize+"&mlbl="+mlbl+"&curr="+curr+"&arevenue="+arevenue+"&empszlink="+empszlink+"&indlink="+indlink+"&domain="+domain+"&othrlink="+othrlink+"&revszlink="+revszlink+"&emailver="+emailver+"&aum="+aum+"&assetid="+assetid+"&optin="+optin+"&optpst="+optpst+"&optph="+optph+"&opteml="+opteml+"&optoption="+optoption+"&aa1="+aa1+"&aa2="+aa2+"&aa3="+aa3+"&aa4="+aa4+"&aa5="+aa5+"&aa6="+aa6+"&aa7="+aa7+"&aa8="+aa8+"&aa9="+aa9+"&aa10="+aa10+"&aa11="+aa11+"&aa12="+aa12+"&pcomt="+pcomt);
          
            $.ajax({
                url :'<?php echo base_url("cdc/ajax_save_leadandcdcbyCDQA");?>',
                type: 'GET', 
                dataType: 'json',              
                data: {
                   
                  campaign_id: campaign_id,
                  campaign_idcids:campaign_idcids,
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
                    aum:aum,                 
                    
                    assetid:assetid,
                    optin:optin,
                    optph:optph,
                    opteml:opteml,
                    optpst:optpst,
                    optoption:optoption,
                    aa1:aa1,
                    aa2:aa2,
                    aa3:aa3,
                    aa4:aa4,
                    aa5:aa5,
                    aa6:aa6,
                    aa7:aa7,
                    aa8:aa8,
                    aa9:aa9,
                    aa10:aa10,
                    aa11:aa11,
                    aa12:aa12,
                    pcomt:pcomt     
                   
                    
                    
				},
                cache: false,
                
                success: function(response){

                  console.log("Success");
                  
                  
                    if(response.statusCode == "Success") 
                    {             
                     
                        $("#cdqasave").html(response.message);
                        top.location.href=base_url+"cdc/addlead?camp_id="+<?php echo $campaign['cnid']; ?>;//redirection
                    }else if(response.statusCode=="Fail")
                    {
                        $("#cdqasave").html(response.message);
                        
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
</script>   

  