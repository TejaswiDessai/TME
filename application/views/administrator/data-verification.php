<!-- Developed by Tejaswi
Form is is regarding verification of a lead.
This is also known as DV form
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
    .select2-container--default .select2-selection--single .select2-selection__arrow {
    top: 3px;
    right: 15px;
}
    

.done-task span, .done-task .captions {
    text-decoration: None;
    background-color: #797373e3;
    border-radius: 4px;
    word-wrap: anywhere; /*wrapping in a div */

    padding: 4px 7px;
    margin-right: 5px;
    font-weight: 700;
    color: #fff !important;
}
.form-control{
  word-wrap: anywhere; /*wrapping in a div */ 
}
.tooltips {
  position: relative;
  display: inline-block;
  /* border-bottom: 1px dotted black; */
}
.tooltips .tooltiptext {
  visibility: hidden;
  width: 80px;
  background-color:#FF5722;
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
  font-size: 12px;
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
}

.tooltip {
  position: relative;
  display: inline-block;
  border-bottom: 1px dotted black;
}

.tooltip .tooltiptext {
  visibility: hidden;
  width: 120px;
  background-color: black;
  color: #fff;
  text-align: center;
  border-radius: 6px;
  padding: 5px 0;

  /* Position the tooltip */
  position: absolute;
  z-index: 1;
}

.tooltip:hover .tooltiptext {
  visibility: visible;
}

.to-do-list:hover i {
  color: #0e11b9;
    /* opacity: 1; */
    /* transition: opacity ease-in 0.3s; */
}
.to-do-list i {
  color: #0e11b9;
  opacity: unset;
  font-size: 18px;
}

 </style>
<script>


var base_url = "<?php echo base_url() ?>";
// alert(base_url);
$(document).ready(function () {
    // Handler for .ready() called.
    $('html, body').animate({
        scrollTop: $('#camp_form').offset().top
    }, 'slow');
});

//below code for retreive button on change on rect type
$(document).ready(function() { 
  $(".aumdis").attr("disabled", true);   // aum disable
  $(".ansdiv").hide();   // ans div hide
  $('.cdqadisplay').hide();
  // $('.commentvisible').hide();
  $('.optindiv').hide();
    $('#rec_type_id').bind('change', function() {
     
        var value = $(this).val();
        if (value == 2) { // if cdqa is selected
          // $('.commentvisible').show();
          $('.optindiv').show();
          $('.cdqadisplay').show();
          $('.leaddisplay').hide();
          $(".ansdiv").show(); 

          var campaign_id = $('#campaign_id').val();

         
        }else{
          // $('.commentvisible').hide();
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
        <h4>Data Verification</h4> 
        
      
            <div class="form-group row"> 
               <div class="col-sm-2" style="margin-left: 200px;margin-top: -25px;">
                                <!-- <select name="rec_type_id" id="rec_type_id"  class="form-control form-control-sm">
                                      <option value="1">Data </option>
                                      <option value="2">CDQA </option>
                                </select> -->
                  </div> 
                <div class="col-sm-4" style="margin-top: -20px;">
                <?php foreach ($campaigns as $campaign): ?>
                 <label class="col-lable"><b>Campaign Name: <?php echo $campaign['campnm']; ?></b></label>
                 <?php endforeach; ?>
                </div> 

                <div class="col-sm-1" style="margin-top: -25px;">
                      <?php foreach ($leadmaster as $ldmster1){
                        print_r($ldmster1['lmid']);
                      } 
                ?>
                </div>
                <div class="col-sm-2" style="margin-top: -25px;">
                      <?php foreach ($leadmaster as $ldmster2){
                        if(empty($ldmster2['stagtidii'])){
                          // print_r($ldmster2['stagtidi']);
                        //  echo "Submitted by ".$ldmster2['stagtidi'];
                        }else{
                          // echo "Submitted by ".$ldmster2['stagtidii'];
                     
                        }
                      } 
                ?>
                </div>
                
            </div>   
                           
    </div>
     <?php foreach ($campaigns as $campaign): ?>
     
      <?php endforeach; ?>
      <?php foreach ($countriesdv as $countriesdv): ?>
      <?php endforeach;    ?>
     
      <?php foreach ($industriesdv as $industriesdv): ?>
     <?php endforeach;    ?>
      <?php foreach ($subindustriesdv as $subindustriesdv): ?>
     <?php endforeach;    ?>
      <?php foreach ($currencydv as $currencydv): ?>
     <?php endforeach;    ?>
      <?php foreach ($timezonedv as $tz): ?>
     <?php endforeach;    ?>
      <?php foreach ($designationdv as $designationdv): ?>
     <?php endforeach;    ?>
      <?php foreach ($departmentsdv as $departmentsdv): ?>
     <?php endforeach;    ?>
      <?php foreach ($assetitledv as $assetitledv): ?>
     <?php endforeach;    ?>
      <?php foreach ($comptypedv as $comptypedv): ?>
     <?php endforeach;    ?>
     <?php foreach ($leadmaster as $ldmster): 
      // print_r($ldmster['unverified_fields']);
      $tid = explode(',',$ldmster['dvrejectreason']);
      // print_r($tid);
      ?>
      
      <?php //endforeach;  ?>

      
     
   
</div>
<!-- Page header end -->
<!-- Page body start -->
<div class="page-body">
    <div class="row">
        <div class="col-sm-12">
            <!-- Basic Form Inputs card start -->
            <div class="card" id="camp_form">
              <!-- <form id="basic-form" method="POST" enctype="multipart/form-data"> -->
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
                              
                                <div class="to-do-list">
                                        <div class="checkbox-fade fade-in-primary  col-sm-12">
                                            <label class="check-task">
                                                <input type="checkbox" name="sal" id="sal"  value="sal">
                                               <span  class="form-control form-control-sm cdqadisable" style=" word-wrap: Normal;padding-left: 0px;" >
                                               <?php if(isset($ldmster)){  echo $ldmster['sal']; }else { echo "Salutation is Empty" ;} ?>
                                               
                                                </span>
                                            </label>
                                        </div>
                                </div>
                            </div>
                           
                            <div class="col-sm-2">                             
                                 <input type="hidden" name="inclistnew" id="inclistnew" value="<?php echo $campaign['inclistnew']; ?>">
                                <span style='color:#FF0000' id="fname_msg"></span>
                                <div class="col-sm-12">
                                <div class="to-do-list">
                                        <div class="checkbox-fade fade-in-primary  col-sm-12">
                                            <label class="check-task">
                                                <input type="checkbox" name="fname" id="fname"  value="fname">
                                               <span  class="form-control form-control-sm cdqadisable tooltips">
                                               <?php if(isset($ldmster)){  echo $ldmster['fname']; }else { echo "Fname is Empty" ;} ?>
                                               <span class="tooltiptext">First Name</span>
                                                </span>
                                            </label>
                                        </div>
                                  </div>
                                </div>
                              
                            </div>
                            
                            <div class="col-sm-2">
                                <div class="to-do-list">
                                        <div class="checkbox-fade fade-in-primary  col-sm-12">
                                            <label class="check-task">
                                                <input type="checkbox" name="lname" id="lname"  value="lname">
                                               <span  class="form-control form-control-sm cdqadisable tooltips"><?php if(isset($ldmster)){  echo $ldmster['lname']; }else { echo "Lname is Empty" ;} ?>
                                               <span class="tooltiptext">Last Name</span>
                                                </span>
                                            </label>
                                        </div>
                                  </div>


                            </div>
                            <div class="col-sm-3">                               
                                <div class="to-do-list">
                                        <div class="checkbox-fade fade-in-primary  col-sm-12">
                                            <label class="check-task">
                                                <input type="checkbox" name="jtitle" id="jtitle"  value="jtitle">
                                               <span  class="form-control form-control-sm cdqadisable tooltips"><?php if(isset($ldmster)){  echo $ldmster['jtitle']; }else { echo "Job Title is Empty" ;} ?>
                                               <span class="tooltiptext">Job Title</span>
                                                </span>
                                            </label>
                                        </div>
                                  </div>
                            </div>
                           
                            <div class="col-sm-4">
                                   <div class="to-do-list">
                                          <div class="checkbox-fade fade-in-primary  col-sm-12">
                                              <label class="check-task">
                                                  <input type="checkbox" name="desid" id="desid"  value="desid">
                                                <span  class="form-control form-control-sm cdqadisable tooltips"><?php if(isset($ldmster['jlevel'])){  echo $designationdv['joblist']; }else { echo "Designation is Empty" ;} ?>
                                                <span class="tooltiptext">Designation</span>
                                                </span>
                                              </label>
                                          </div>
                                  </div>   
                                
                            </div>
                            
                           
                        </div>

                        <hr>
                        <div class="form-group row">
                        <div class="col-sm-2">
                              
                                
                                <div class="to-do-list">
                                          <div class="checkbox-fade fade-in-primary  col-sm-12">
                                              <label class="check-task">
                                                  <input type="checkbox" name="dcd" id="dcd"  value="dcd">
                                                <span  class="form-control form-control-sm cdqadisable tooltips"><?php if(isset($ldmster['dname'])){  echo $departmentsdv['department']; }else { echo "Department is Empty" ;} ?>
                                                <span class="tooltiptext">Department</span>
                                                </span>
                                              </label>
                                          </div>
                                  </div>   
                            </div> 
                            <div class="col-sm-2">
                                <div class="newsletter-signup">
                                <!-- <input type="text"  name="email" id="email" value ="<?php //if(isset($ldmster)){  echo $ldmster['email']; }?>"  placeholder="Email"  class="form-control form-control-sm cdqadisable"> -->
                                  <div class="to-do-list">
                                          <div class="checkbox-fade fade-in-primary  col-sm-12">
                                              <label class="check-task">
                                                  <input type="checkbox" name="email" id="email"  value="email">
                                                <span  class="form-control form-control-sm cdqadisable tooltips"><?php if(isset($ldmster)){  echo $ldmster['email']; }else { echo "Email is Empty" ;} ?>
                                                <span class="tooltiptext">Email</span>
                                                  </span>
                                              </label>
                                          </div>
                                    </div>
                               
                               
                               
                               </div>
                                <span style='color:#FF0000' id="email_msg"></span>
                            </div>
                            <div class="col-sm-2">
                               
                                <span style='color:#FF0000' id="phone_msg"></span>
                                <div class="to-do-list">
                                          <div class="checkbox-fade fade-in-primary  col-sm-12">
                                              <label class="check-task">
                                                  <input type="checkbox" name="phone" id="phone"  value="phone">
                                                <span  class="form-control form-control-sm cdqadisable tooltips"><?php if(isset($ldmster)){  echo $ldmster['phone']; }else { echo "Phone is Empty" ;} ?>
                                                <span class="tooltiptext">Phone</span>
                                                  </span>
                                              </label>
                                          </div>
                                    </div>



                            </div>
                            <div class="col-sm-2">
                              
                                <div class="to-do-list">
                                          <div class="checkbox-fade fade-in-primary  col-sm-12">
                                              <label class="check-task">
                                                  <input type="checkbox" name="altphn" id="altphn"  value="altphn">
                                                  <span  class="form-control form-control-sm cdqadisable tooltips"><?php if(isset($ldmster) && $ldmster['altphn'] != ""){  echo $ldmster['altphn']; }else { echo "ALT Phone Empty" ;} ?>
                                                  <span class="tooltiptext">Alt Phone</span>
                                                </span>
                                              </label>
                                          </div>
                                    </div>
                            
                            </div>
                            
                            <div class="col-sm-2">
                                
                                <div class="to-do-list">
                                          <div class="checkbox-fade fade-in-primary  col-sm-12">
                                              <label class="check-task">
                                                  <input type="checkbox" name="phext" id="phext"  value="phext">
                                                <span  class="form-control form-control-sm cdqadisable tooltips"><?php if($ldmster['phext'] != '0'){  echo $ldmster['phext']; }else { echo "Phone EXT Empty" ;} ?>
                                                <span class="tooltiptext">Phone EXT</span>
                                                  </span>
                                              </label>
                                          </div>
                                    </div>
                           
                           
                            </div>
                            <div class="col-sm-2">
                            
                            <div class="to-do-list">
                                          <div class="checkbox-fade fade-in-primary  col-sm-12">
                                              <label class="check-task">
                                                  <input type="checkbox" name="plink" id="plink"  value="plink">
                                                <span  class="form-control form-control-sm cdqadisable tooltips">Prospect Link  
                                                <a href="<?php echo $ldmster['plink'] ?>" target="_blank" style="float:right"><i class="icofont icofont-link"></i></a>
                                                  <span class="tooltiptext">Prospect Link</span>
                                                </span>
                                              </label>
                                             
                                          </div>
                                    </div>
                            
                             
                            </div>
                        
                      </div>
                            <hr>
                        <div class="form-group row">
                             
                              <div class="col-sm-2">
                                         <div class="to-do-list">
                                            <div class="checkbox-fade fade-in-primary  col-sm-12">
                                                <label class="check-task">
                                                    <input type="checkbox" name="linetype" id="linetype"  value="linetype">
                                                  <span  class="form-control form-control-sm cdqadisable tooltips"><?php 
                                                    if($ldmster['linetype'] == "0"){ 
                                                     echo "Unknown Linetype"; 
                                                    }else if($ldmster['linetype'] == "1") { 
                                                      echo "Direct Linetype";
                                                    }else if($ldmster['linetype'] == "2"){
                                                      echo "Board Linetype";
                                                    }
                                                      ?>
                                                      <span class="tooltiptext">Line Type</span>
                                                  </span>
                                                </label>
                                            </div>
                                  </div>

                           </div>
                              <div class="col-sm-2">
                            
                                <div class="to-do-list">
                                          <div class="checkbox-fade fade-in-primary  col-sm-12">
                                              <label class="check-task">
                                                  <input type="checkbox" name="company_name" id="company_name"  value="company_name">
                                                <span  class="form-control form-control-sm cdqadisable tooltips"><?php if(isset($ldmster['cname']) && ($ldmster['cname'] !='')){  echo $ldmster['cname']; }else { echo "Comapny Name Empty" ;} ?>
                                                <span class="tooltiptext">Company Name</span>
                                                </span>
                                              </label>
                                          </div>
                                </div>
                               
                           
                          </div>


                            <div class="col-sm-2">
                               
                                <div class="to-do-list">
                                          <div class="checkbox-fade fade-in-primary  col-sm-12">
                                              <label class="check-task">
                                                  <input type="checkbox" name="address" id="address"  value="address">
                                                <span  class="form-control form-control-sm cdqadisable tooltips"><?php if(isset($ldmster['address'])){  echo $ldmster['address']; }else { echo "Address is Empty" ;} ?>
                                                <span class="tooltiptext">Address</span>
                                                </span>
                                              </label>
                                          </div>
                                </div>
                           </div>
                           <div class="col-sm-2">
                               
                                <div class="to-do-list">
                                          <div class="checkbox-fade fade-in-primary  col-sm-12">
                                              <label class="check-task">
                                                  <input type="checkbox" name="city" id="city"  value="city">
                                                <span  class="form-control form-control-sm cdqadisable tooltips"><?php if(isset($ldmster['city'])){  echo $ldmster['city']; }else { echo "city is Empty" ;} ?>
                                                <span class="tooltiptext">City</span>
                                                </span>
                                              </label>
                                          </div>
                                </div>
                           </div>
                           <div class="col-sm-2">
                               
                                <div class="to-do-list">
                                          <div class="checkbox-fade fade-in-primary  col-sm-12">
                                              <label class="check-task">
                                                  <input type="checkbox" name="state" id="state"  value="state">
                                                <span  class="form-control form-control-sm cdqadisable tooltips"><?php if(isset($ldmster['state'])){  echo $ldmster['state']; }else { echo "state is Empty" ;} ?>
                                                <span class="tooltiptext">State</span>
                                                </span>
                                              </label>
                                          </div>
                                   
                                </div>
                            </div>
                            <div class="col-sm-2">
                               
                                <div class="to-do-list">
                                          <div class="checkbox-fade fade-in-primary  col-sm-12">
                                              <label class="check-task">
                                                  <input type="checkbox" name="zip_code" id="zip_code"  value="zip_code">
                                                <span  class="form-control form-control-sm cdqadisable tooltips"><?php if(isset($ldmster['zipcode'])){  echo $ldmster['zipcode']; }else { echo "zipcode is Empty" ;} ?>
                                                <span class="tooltiptext">Zip Code</span>
                                                </span>
                                              </label>
                                          </div>
                                  </div>
                             </div>
                           
                            
                        </div>
                       <hr>

                        <div class="form-group row">

                          <div class="col-sm-2">

                          <div class="to-do-list">
                                          <div class="checkbox-fade fade-in-primary  col-sm-12">
                                              <label class="check-task">
                                                  <input type="checkbox" name="country_id" id="country_id"  value="country_id">
                                                <span  class="form-control form-control-sm cdqadisable tooltips"><?php if(isset($ldmster['country'])){  echo $countriesdv['countryname']; }else { echo "Country is Empty" ;} ?>
                                                <span class="tooltiptext">Country</span>
                                                </span>
                                              </label>
                                          </div>
                                  </div>     

                        </div>
                            
                            <div class="col-sm-2">

                            <div class="to-do-list">
                                          <div class="checkbox-fade fade-in-primary  col-sm-12">
                                              <label class="check-task">
                                                  <input type="checkbox" name="timezone" id="timezone"  value="timezone">
                                                <span  class="form-control form-control-sm cdqadisable tooltips"><?php if(isset($ldmster['timez']) && $ldmster['timez'] != "0"){  echo $tz['abbrev']; }else { echo "Timezone is Empty" ;} ?>
                                                <span class="tooltiptext">Timezone</span>
                                                </span>
                                              </label>
                                          </div>
                                  </div>

                             
                            </div>

                            <div class="col-sm-2">
                              
                               <div class="to-do-list">
                                          <div class="checkbox-fade fade-in-primary  col-sm-12">
                                              <label class="check-task">
                                                  <input type="checkbox" name="ctype" id="ctype"  value="ctype">
                                                <span  class="form-control form-control-sm cdqadisable tooltips"><?php if($ldmster['ctyp'] != "0"){  echo $comptypedv['ctypname']; }else { echo "Comp Type is Empty" ;} ?>
                                                <span class="tooltiptext">Company Type</span>
                                                </span>
                                              </label>
                                          </div>
                                  </div> 
                           </div>
                           <!-- toolbar options -->
                           <div id="toolbar-options" class="hidden">
                                <a href="#myModalemail" data-target="#myModalemail" data-toggle="modal"><i class="icofont icofont-info-circle"></i></a>
                               
                            </div>
                         
                            <div class="col-sm-2">
                            <div data-toolbar="user-options"  id="info-toolbar">
                            <div class="to-do-list">
                                          <div class="checkbox-fade fade-in-primary  col-sm-12">
                                              <label class="check-task">
                                                  <input type="checkbox" name="industrycd" id="industrycd"  value="industrycd">
                                                <span  class="form-control form-control-sm cdqadisable tooltips"><?php if(isset($ldmster['indtry'])){  echo $industriesdv['industry']; }else { echo "industry is Empty" ;} ?>
                                                <span class="tooltiptext" style="margin-left: -100px;">Industry</span>
                                                </span>
                                              </label>
                                          </div>
                                    </div> 
                                  </div> 


                             
                            </div>
                            
                            <div class="col-sm-2">
                            <div data-toolbar="user-options"  id="grow-toolbar">
                              <div class="to-do-list">
                                          <div class="checkbox-fade fade-in-primary  col-sm-12">
                                              <label class="check-task">
                                                  <input type="checkbox" name="subindustrycd" id="subindustrycd"  value="subindustrycd">
                                                <span  class="form-control form-control-sm cdqadisable tooltips"><?php if(isset($ldmster['sindtry'])){  echo $subindustriesdv['subindustry']; }else { echo "Sub industry is Empty" ;} ?>
                                                <span class="tooltiptext" style="margin-left: -100px;">Sub Industry</span>
                                                </span>
                                              </label>
                                          </div>
                                  </div> 
                                </div> 
                               
                            </div>
                            <div class="col-sm-2">
                                

                                    <div class="to-do-list">
                                            <div class="checkbox-fade fade-in-primary  col-sm-12">
                                                <label class="check-task">
                                                    <input type="checkbox" name="sectyp" id="sectyp"  value="sectyp">
                                                  <span  class="form-control form-control-sm cdqadisable tooltips"><?php 
                                                    if($ldmster['sectyp'] == "0"){ 
                                                     echo "Unknown"; 
                                                    }else if($ldmster['sectyp'] == "1") { 
                                                      echo "Public";
                                                    }else if($ldmster['sectyp'] == "2"){
                                                      echo "Private";
                                                    }else if($ldmster['sectyp'] == "3"){
                                                      echo "Government";
                                                    }else if($ldmster['sectyp'] == "4"){
                                                      echo "Non-Profit";
                                                    }else{

                                                    }
                                                      ?>
                                                       <span class="tooltiptext">Sector Type</span>
                                                  </span>
                                                 
                                                </label>
                                            </div>
                                  </div>

                            </div>

                        </div>
                <hr>
                    <div class="form-group row">
                        <div class="col-sm-2">
                        <!-- <div class="tooltips"> -->
                                <!-- <input type="text"  name="empsize" id="empsize" maxlength="6" value ="<?php// if(isset($ldmster)){  echo $ldmster['empsize']; }?>" placeholder="Actual Employee Size"  class="form-control form-control-sm cdqadisable"> -->
                                <div class="to-do-list">
                                          <div class="checkbox-fade fade-in-primary  col-sm-12">
                                              <label class="check-task">
                                                  <input type="checkbox" name="empsize" id="empsize"  value="empsize">
                                                <span  class="form-control form-control-sm cdqadisable tooltips"><?php if(isset($ldmster['empsize'])){  echo $ldmster['empsize']; }else { echo "Emp Size is Empty" ;} ?>
                                                <!-- <span class="tooltiptext">Emp size</span> -->
                                                 <span class="tooltiptext"> Emp size range  should be in <?php echo $campaign['emplbnd']; ?> & <?php echo $campaign['empubnd']; ?></span>
                                                </span>
                                              </label>
                                          </div>
                                 <!-- </div> -->
                                 </div>
                                <!-- <span style='color:#FF0000' id="empsize_msg"></span> -->
                            </div>
                            <div class="col-sm-2">
                               
                                <span style='color:#FF0000' id="revsize_msg"></span>
                                <div class="to-do-list">
                                          <div class="checkbox-fade fade-in-primary  col-sm-12">
                                              <label class="check-task">
                                                  <input type="checkbox" name="arevenue" id="arevenue"  value="arevenue">
                                                <span  class="form-control form-control-sm cdqadisable tooltips"><?php if(isset($ldmster['arevenue'])){  echo $ldmster['arevenue']; }else { echo "Revenue is Empty" ;} ?>
                                                <!-- <span class="tooltiptext">Revenue</span> -->
                                                <span class="tooltiptext"> Revenue should be in <?php echo $campaign['revlbnd']; ?> <?php echo $campaign['revlbdim']; ?> 
                          & <?php echo $campaign['revubnd']; ?> <?php echo $campaign['revubdim']; ?></span>
                                                </span>
                                              </label>
                                          </div>
                                </div>
                            
                            </div>
                            
                            
                            <div class="col-sm-2">
                               
                                    <div class="to-do-list">
                                            <div class="checkbox-fade fade-in-primary  col-sm-12">
                                                <label class="check-task">
                                                    <input type="checkbox" name="mlbl" id="mlbl"  value="mlbl">
                                                  <span  class="form-control form-control-sm cdqadisable tooltips"><?php 
                                                    if($ldmster['mlbl'] == "0"){ 
                                                     echo "K"; 
                                                    }else if($ldmster['mlbl'] == "1") { 
                                                      echo "M";
                                                    }else if($ldmster['mlbl'] == "2"){
                                                      echo "B";
                                                    }else if($ldmster['mlbl'] == "3"){
                                                      echo "T";
                                                    }else{

                                                    }
                                                      ?>
                                                      <span class="tooltiptext">Revenue Range</span>
                                                  </span>
                                                </label>
                                            </div>
                                  </div>



                            </div>          
                            <div class="col-sm-2">
                            
                            <div class="to-do-list">
                                          <div class="checkbox-fade fade-in-primary  col-sm-12">
                                              <label class="check-task">
                                                  <input type="checkbox" name="curr" id="curr"  value="curr">
                                                <span  class="form-control form-control-sm cdqadisable tooltips"><?php if(isset($ldmster['curr'])){  echo $currencydv['currab']; }else { echo "currency is Empty" ;} ?>
                                                <span class="tooltiptext">Currency</span>
                                                </span>
                                              </label>
                                          </div>
                                  </div>

                                
                                

                            </div>          
                            <div class="col-sm-2">
                                <div class="domaincheck">
                               
                                <div class="to-do-list">
                                          <div class="checkbox-fade fade-in-primary  col-sm-12">
                                              <label class="check-task">
                                                  <input type="checkbox" name="domain" id="domain"  value="domain">
                                                <span  class="form-control form-control-sm cdqadisable tooltips">Domain Link  
                                                <?php if($ldmster['domain'] != ""){ ?>
                                                <a href="http://<?php echo $ldmster['domain'] ?>" target="_blank" style="float:right"><i class="icofont icofont-link"></i></a>
                                                <?php } else{ ?>
                                                  <a style="float:right"><i class="icofont icofont-unlink"></i></a>     
                                                <?php } ?>
                                                 
                                                  <span class="tooltiptext">Domain Link</span>
                                                </span>
                                              </label>
                                          </div>
                                    </div>
                                </div>
                                <!-- <span style='color:#FF0000' id="domain_msg"></span> -->
                              </div>
                            
                            <div class="col-sm-2">
                               
                                <div class="to-do-list">
                                          <div class="checkbox-fade fade-in-primary  col-sm-12">
                                              <label class="check-task">
                                                  <input type="checkbox" name="empszlink" id="empszlink"  value="empszlink">
                                                <span  class="form-control form-control-sm cdqadisable tooltips">Emp Size Link  
                                                <?php if($ldmster['empszlink'] != ""){ ?>
                                                <a href="<?php if($ldmster['empszlink'] != ""){ echo $ldmster['empszlink']; } else{  echo "#"; } ?>" target="_blank" style="float:right"><i class="icofont icofont-link"></i></a>
                                                 <?php } else{ ?>
                                                  <a style="float:right"><i class="icofont icofont-unlink"></i></a>       
                                                 <?php } ?>
                                                  <span class="tooltiptext">Emp Size Link</span>
                                                </span>
                                              </label>
                                          </div>
                                    </div>
                            </div>
                           
                        </div>
                        
                        <hr>
                        <div class="form-group row">
                           
                            <div class="col-sm-2 ">
                               
                                
                                  <div class="to-do-list">
                                          <div class="checkbox-fade fade-in-primary  col-sm-12">
                                              <label class="check-task">
                                                  <input type="checkbox" name="indlink" id="indlink"  value="indlink">
                                                <span  class="form-control form-control-sm cdqadisable tooltips">Industry Link  
                                                <?php if($ldmster['indlink'] != ""){ ?>
                                                <a href="<?php echo $ldmster['indlink'];?>" target="_blank" style="float:right"><i class="icofont icofont-link"></i></a>
                                                  <?php } else { ?>
                                                   <a style="float:right"><i class="icofont icofont-unlink"></i></a>       
                                                <?php  } ?>
                                                  <span class="tooltiptext">Industry Link</span>
                                                </span>
                                              </label>
                                          </div>
                                    </div>
                              
                            </div>
                            <div class="col-sm-2">
                                
                                <div class="to-do-list">
                                          <div class="checkbox-fade fade-in-primary  col-sm-12">
                                              <label class="check-task">
                                                  <input type="checkbox" name="revszlink" id="revszlink"  value="revszlink">
                                                <span  class="form-control form-control-sm cdqadisable tooltips">Revenue Link  
                                                <!-- <a href="<?php// if($ldmster['revszlink'] != "NA"){ echo $ldmster['revszlink']; } else{  echo ""; } ?>" target="_blank" style="float:right"><i class="icofont icofont-link"></i></a> -->
                                                <?php if($ldmster['revszlink'] != "NA"){ ?>
                                                <a href=" <?php echo $ldmster['revszlink']; ?>" target="_blank" style="float:right"><i class="icofont icofont-link"></i></a>
                                                  <?php } else{ ?>
                                                     <a style="float:right"><i class="icofont icofont-unlink"></i></a>
                                                <?php  } ?>
                                                  <span class="tooltiptext">Revenue Link</span>
                                                </span>
                                              </label>
                                          </div>
                                    </div>
                            </div>
                            
                            <div class="col-sm-2">
                              
                                <div class="to-do-list">
                                          <div class="checkbox-fade fade-in-primary  col-sm-12">
                                              <label class="check-task">
                                                  <input type="checkbox" name="othrlink" id="othrlink"  value="othrlink">
                                                <span  class="form-control form-control-sm cdqadisable tooltips">Other Link  
                                                <?php if($ldmster['othrlink'] != ""){ ?>
                                                <!-- <a href="<?php //if($ldmster['othrlink'] != ""){ echo $ldmster['othrlink']; } else{  echo "#"; } ?>" target="_blank" style="float:right"><i class="icofont icofont-link"></i></a> -->
                                                <a href="<?php echo $ldmster['othrlink']; ?>" target="_blank" style="float:right"><i class="icofont icofont-link"></i></a> 
                                                  <?php } else{ ?>
                                                    <a style="float:right"><i class="icofont icofont-unlink"></i></a>
                                                 <?php } ?>
                                                  <span class="tooltiptext">other Link</span>
                                                </span>
                                              </label>
                                          </div>
                                    </div>
                            
                            </div>
                            
                            <div class="col-sm-2">
                               
                                <div class="to-do-list">
                                            <div class="checkbox-fade fade-in-primary  col-sm-12">
                                                <label class="check-task">
                                                    <input type="checkbox" name="aum" id="aum"  value="aum">
                                                  <span  class="form-control form-control-sm cdqadisable tooltips"><?php if($ldmster['aum'] != '0'){  echo $ldmster['aum']; }else { echo " AUM is Empty" ;} ?>
                                                  <span class="tooltiptext">AUM</span>
                                                  </span>
                                                </label>
                                            </div>
                                  </div>
                            </div>
                            <div class="col-sm-4">

                            </div> 
                        </div>
                        <hr>
                       
                        <br>

                        <div class="form-group row" >
                             <div class="col-sm-12 commentvisible">
                                <label class="col-lable"><b>Comment</b></label>
                                <!-- <input type="text"  name="pcomt" id="pcomt"  placeholder="Comment"  class="form-control form-control-sm" value="<?php echo $ldmster['pcomt']; ?>" > -->
                                <input type="text" autocomplete = "off"  name="pcomt" id="pcomt"  placeholder="Comment"  class="form-control form-control-sm" 
                                value="<?php if(isset($ldmster['pcomt']) && $ldmster['pcomt'] != '' && strpos($ldmster['pcomt'], '#') !== false ) {
                                   $arr = explode("#", $ldmster['pcomt']);
                                  
                                   $withoutchar = $arr[0];
                                   $first = $arr[1];
                                   if(!empty($arr[1])){
                                      $first = $arr[1];
                                      echo  $first; 
                                   }else{
                                    echo $first;
                                   }
                                  
                                 }else{
                                   echo $ldmster['pcomt'];
                                 } ?>">
                            
                            
                            </div> 
                         </div>
                        <input type = hidden name="campaign_id" id="campaign_id" value="<?php echo $campaign['cnid']; ?>">
                        <input type = hidden name="campaign_idcids" id="campaign_idcids" value="<?php echo $campaign['cids']; ?>">
                        
                       
                        <!-- <?php// if(isset($ldmster) && $ldmster['dvrejtg'] <= 2){ ?>  -->
                        <?php if(isset($ldmster) && $ldmster['dvrejtg'] <= '3' && $ldmster['dvsbtg'] <= '3'){ ?> 
                        
                          <input type = hidden name="lmid" id="lmid" value="<?php echo $ldmster['lmid']; ?>">
                          <input type = hidden name="emp_id" id="emp_id" value="<?php echo  $_SESSION['empcode']; ?>">
                          <input type = hidden name="sbsvtag" id="sbsvtag" value="<?php echo $ldmster['sbsvtag']; ?>">
                          <input type = hidden name="qarej" id="qarej" value="<?php echo $ldmster['qarej']; ?>">
                          <input type = hidden name="cdcrjt" id="cdcrjt" value="<?php echo $ldmster['cdcrjt']; ?>">
                          <input type = hidden name="dvrejtg" id="dvrejtg" value="<?php echo $ldmster['dvrejtg']; ?>">
                          <input type = hidden name="dvsbtg" id="dvsbtg" value="<?php echo $ldmster['dvsbtg']; ?>">
                          <input type = hidden name="rlc" id="rlc" value="<?php echo $ldmster['rlc']; ?>">
                          
                          <input type = hidden name="dvrejectreason" id="dvrejectreason" value="<?php echo $ldmster['dvrejectreason']; ?>">

                          <input type = hidden name="dvagtidi" id="dvagtidi" value="<?php echo $ldmster['dvagtidi']; ?>">
                          <input type = hidden name="dvagtidii" id="dvagtidii" value="<?php echo $ldmster['dvagtidii']; ?>">
                          <input type = hidden name="dvdti" id="dvdti" value="<?php echo $ldmster['dvdti']; ?>">
                          <input type = hidden name="dvdtii" id="dvdtii" value="<?php echo $ldmster['dvdtii']; ?>">

                          <input type = hidden name="dvragtidi" id="dvragtidi" value="<?php echo $ldmster['dvragtidi']; ?>">
                          <input type = hidden name="dvragtidii" id="dvragtidii" value="<?php echo $ldmster['dvragtidii']; ?>">
                          <input type = hidden name="dvrdti" id="dvrdti" value="<?php echo $ldmster['dvrdti']; ?>">
                          <input type = hidden name="dvrdtii" id="dvrdtii" value="<?php echo $ldmster['dvrdtii']; ?>">
                          <div class="form-group row" >
                            <div class="col-sm-12">
                             <center>
                              <button type="submit" name="leadupdatedv" class="btn btn-primary leaddisplay" style=""  id="leadupdatedv">Accept</button> 
                             
                             
                              <button type="submit" name="leadsavedv" class="btn btn-primary leaddisplay" style="margin-left:50px"  id="leadsavedv">Skip </button> 
                             </center>
                        <?php } else{ ?>
                          <button type="submit" name="" class="btn btn-primary leaddisplay" style=""  id="">Limit Crossed</button> 
                          <button type="submit" name="leadsavedv" class="btn btn-primary leaddisplay" style=""  id="leadsavedv">Discard </button> 
                           <?php }?>
                       <?php if(empty($ldmster)){ ?>
                        
                        <?php } ?>
                        </div>
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
<?php endforeach;  ?>
  
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





     <script>
// <!-- // Search result for industry -->

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
          $('#timezone').append('<option value="'+data['zoneid']+'" >'+data['abbrev']+'</option>');
          
        });
        
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
             
              }
          });





        }
    });
});




$('#mlbl').blur(function(){   // revenue range change
// $('#arevenue').blur(function(){   // revenue range change
 
var arevenuevalue = $('#arevenue').val();

  var lrevrange = $('#revlbdimmlbl').val(); //lower range  for eg million /billion
  var urevrange = $('#revubdimmlbl').val();

  var lrevrangenumber = $('#revlbndmlbl').val();
  var urevrangenumber = $('#revubndmlbl').val();
  
 
  if(lrevrange == "hundred" && urevrange =="hundred" ){
    if($('#mlbl').val()== 0){
      var m = arevenuevalue*1000;
      var urevrangenumber1 = urevrangenumber*1000;
      var lrevrangenumber1 = lrevrangenumber*1000;
      
    
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
      // alert(m);
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
    // $('.newsletter-signup input:first').on('keyup', function(){ 
//       $('.newsletter-signup input:first').focusout(function(){
//       var email = $('#email').val();
//       var inclistnew = $('#inclistnew').val();
//       var campaign_id = <?php  echo $campaign['cnid']; ?>;
    
//       var url = '<?php echo base_url("cdc/checkemail");?>';
//       console.log(url+'?email='+email+"&campaign_id="+campaign_id);
//     // AJAX request
//     $.ajax({

//         url:'<?php echo base_url("cdc/checkemail");?>',
//         method: 'get',
//         data: {
//           email: email,
//           campaign_id: campaign_id,
//           inclistnew:inclistnew
//           },
//         dataType: 'json',
//         success: function(response){
//           $( '#email_msg' ).html("response");
//           // alert(response.exclusionemail);
//           if(response.inclusionemail == "true")
//           {
//             $("#email_msg").html("");
//             console.log("true");
//             return true;	
//           }else if(response.inclusionemail == "false")
//           {
//             $("#email_msg").html("Not in Inclusion Email List");
//             console.log("false");
//             // $('#email').val("");
//             // return false;	
//           }
//           else if(response.exclusionemail == "true")
//           {
//             $("#email_msg").html("Suppressed Email");
//             $('#email').val("");
//             console.log("true");
            

//           } else 
//           {
//             $("#email_msg").html("");
//             console.log("true");
//             return false;	
//           }
          
//         }
//     });
    
   
// });
  
    // Check unique domain
//     $('.domaincheck input:first').blur(function(){
//       var domain = $('#domain').val();
//       var inclistnew = $('#inclistnew').val();
//       var campaign_id = <?php  echo $campaign['cnid']; ?>;
//       var url = '<?php echo base_url("cdc/checkdomain");?>';
//       console.log(url+'?domain='+domain+"&campaign_id="+campaign_id);
//     // AJAX request
//     $.ajax({

//         url:'<?php echo base_url("cdc/checkdomain");?>',
//         method: 'get',
//         data: {
//           domain: domain,
//           campaign_id: campaign_id,
//           inclistnew:inclistnew
          
//           },
//         dataType: 'json',
//         success: function(response){
//           $( '#domain_msg' ).html(response);
//           if(response.domaincheckincl == "true")
//           {
//             $("#domain_msg").html("");
//             console.log("true");
//             return true;	
//           }
//           if(response.domaincheckincl == "false")
//           {
//             $("#domain_msg").html("Not in Inclusion Doamin List");
//             console.log("true");
//             // return true;	
//           }
//           else if(response.domainchecksupp == "true")
//           {
//             $("#domain_msg").html("Suppressed Domain List");
//             console.log("true");
//             $('#domain').val("");
//             return true;	
//           } else 
//           {
//             $("#domain_msg").html("");
//             console.log("true");
//             return false;	
//           }
          
//         }
//     });
    
   
// });



 // Check unique Company
//  $('.compcheck input:first').blur(function(){
//       var company_name = $('#company_name').val();
//       var inclistnew = $('#inclistnew').val();
//       var campaign_id = <?php  echo $campaign['cnid']; ?>;
//       var url = '<?php echo base_url("cdc/checkcompanylist");?>';
//       console.log(url+'?company_name='+company_name+"&campaign_id="+campaign_id);
//     // AJAX request
//     $.ajax({

//         url:'<?php echo base_url("cdc/checkcompanylist");?>',
//         method: 'get',
//         data: {
//         company_name: company_name,
//         campaign_id: campaign_id,
//         inclistnew:inclistnew
//         },
//         dataType: 'json',
//         success: function(response){
//           $( '#comp_msg' ).html(response);
//           if(response.companycheckincl == "true")
//           {
//             $("#comp_msg").html("");
//             console.log("true");
//             return true;	
//           }
//           else if(response.companycheckincl == "false")
//           {
//             $("#comp_msg").html("Not in Inclusion Company List");
//             console.log("true");
//             return true;	
//           }
//           else if(response.companychecksupp == "true")
//           {
//             $("#comp_msg").html("Suppressed Company");
//             $('#company_name').val("");
//             console.log("true");
//             return true;	
//           } else 
//           {
//             $("#domain_msg").html("");
//             console.log("true");
//             return false;	
//           }
          
//         }
//     });
    
   
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


$(document).ready(function() {

//update record lock
var rlc = 1; //lock 1
var lmid = $('#lmid').val();
var emp_id = $('#emp_id').val();
// $this->session -> userdata('email')
if(emp_id === undefined){
            window.location = base_url+"administrator/logout";
            exit;
  }
if(emp_id == ''){
  window.location = base_url+"administrator/logout";
  exit;
}
// alert(emp_id);
if(rlc == "1"){
var urlq = '<?php echo base_url("cdc/updaterecordlock");?>';
console.log(urlq+'?lmid='+lmid+"&rlc="+rlc+"&emp_id="+emp_id);
$.ajax({
      url:'<?php echo base_url("cdc/updaterecordlock");?>',
      method: 'get',
      data: {
        lmid: lmid,
        rlc:rlc,
        emp_id:emp_id
      },
      dataType: 'json',
      success: function(response){

        console.log("check");
                    // var dataResult = JSON.parse(response);
                    if(response.statusCode == "Success") 
                    {         
                      // alert("Success in success");
                      console.log("Record is opened/locked now");     
                      
                    }else if(response.data=="Fail")
                    {
                      alert("fail/check if record is already opened");  
                        
					          }
      }
  });
}else{
  alert("record already opened");
 
}



  $('.leaddisplay').show(); //buttons
  $('.cdqadisplay').hide();//buttons
  // load questions of campaign on load 
  $('.optoption').hide();
    
    // $('.optin').change(function()
    //   {
    //     if ($('#optin').is(':checked')) {
    //         $('#optin').val("1");
    //         $('#opteml').val("1");
    //         $('#optph').val("1");
    //         $('#optpst').val("1");
    //         $('.optoption').show();
          
               
    //     }else{
    //         $('#optin').val("0");
    //         $('#opteml').val("0");
    //         $('#optph').val("0");
    //         $('#optpst').val("0");
    //         $('.optoption').hide();
               
    //     };
    //   });
      // $('.dnd').change(function()
      // {
      //   if ($('#dnd').is(':checked')) {
      //       $('#optin').val("0");
      //       $('#opteml').val("0");
      //       $('#optph').val("0");
      //       $('#optpst').val("0");
      //       $('.optoption').hide();   
      //   }else{
      //       $('#optin').val("1");
      //       $('#opteml').val("1");
      //       $('#optph').val("1");
      //       $('#optpst').val("1");
      //       $('.optoption').show();
               
      //   };
      // });


  $("#basic-form").validate({
    rules: {
        sal : {
        required: true
      },
      fname : {
        required: true,
        minlength: 2
      },
      lname : {
        required: true,
        minlength: 2
      },
      jtitle : {
        required: true
      },
      jlevel : {
        required: true
      },
        company_name : {
        required: true
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
        required: true
        // minlength: 4
      },
      city : {
        required: true
        // minlength: 5
      },
      state : {
        required: true
        // minlength: 5
      },
      zip_code : {
        required: true
        // minlength: 5
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
// alert();
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
});
 </script>

<script>

$("input:checkbox").change(function() {
  var notChecked = [], checked = [];
            $(":checkbox").map(function() {
            
                this.checked ? checked.push(this.id) : notChecked.push(this.id);
            });
          if(checked == ""){ // if unchecked any field
            checked = [0];
            $("#leadupdatedv").html("Accept");
          }else{
            $("#leadupdatedv").html("Reject");
          }
          
});
/* update lead submit*/
    $(function() {
        $("#leadupdatedv").on('click', function() 
        {
          var empid = $('#emp_id').val();
          if(empid === undefined){
            window.location = base_url+"administrator/logout";
            exit;
          }
          if(empid == ''){
            window.location = base_url+"administrator/logout";
            exit;
          }

          var notChecked = [], checked = [];
            $(":checkbox").map(function() {
            
                this.checked ? checked.push(this.id) : notChecked.push(this.id);
            });
            
          if(checked == ""){ // if unchecked any field
                checked = [0];
                var dvsbtg1 = $('#dvsbtg').val();
                var qarej =$('#qarej').val(); // tags of qa team
                var cdcrjt =$('#cdcrjt').val(); // tags of qa team
                // if(dvsbtg1 == ""){
                //   var dvsbtg = 1;
                // }else{
                //   var dvsbtg = parseInt(dvsbtg1)+1; // incremataion for dv  Accept
                // }
                if(dvsbtg1 == ""){
                  var dvsbtg = 1;
                }else if(dvsbtg1 <= '2' && qarej == "")
                {           
                var dvsbtg = parseInt(dvsbtg1)+1; // incremataion for dv  rejection
                }else if(dvsbtg1 <= '2' && qarej == "1")
                {
                  var dvsbtg = parseInt(dvsbtg1)+1; // incremataion for dv  rejection
                  // alert(dvsbtg);
                }else{
                
                  var dvsbtg = $('#dvsbtg').val(); 
                  
                }
    
                if(dvsbtg == '3'){
                  var dvsbtg = '3';
                  var sbsvtag = $('#sbsvtag').val();
                }else{
                  var sbsvtag = $('#sbsvtag').val();
                }
                var dvrejtg = $('#dvrejtg').val(); 
                
          }else{ //checked -rejected
            var qarej =$('#qarej').val(); // tags of qa team
            var cdcrjt =$('#cdcrjt').val(); // tags of qa team
            var dvsbtg =$('#dvsbtg').val();

            
            var dvrejtg1 = $('#dvrejtg').val();
             if(dvrejtg1 == ""){
              var dvrejtg = 1;
              }else if(dvrejtg1 <= '2' && qarej == "")
              {           
               var dvrejtg = parseInt(dvrejtg1)+1; // incremataion for dv  rejection
              }else if(dvrejtg1 <= '2' && qarej == "1")
              {
                var dvrejtg = parseInt(dvrejtg1)+1; // incremataion for dv  rejection
              }else{
              
                var dvrejtg = $('#dvrejtg').val();  
              }
       
          
 
            if(dvrejtg == '3' && qarej == '' && cdcrjt == ''){
            
              var dvrejtg = '3';
              var sbsvtag = '0';
             
            }
            
           
            else{
              var sbsvtag = $('#sbsvtag').val();
              // alert(sbsvtag);
            }
           
          }
        
            var dvrdti = $('#dvrdti').val();
            var dvragtidi = $('#dvragtidi').val();

            var dvrdtii = $('#dvrdtii').val();
            var dvragtidii = $('#dvragtidii').val();

            var dvdti = $('#dvdti').val();
            var dvagtidi = $('#dvagtidi').val();

            var dvdtii = $('#dvdtii').val();
            var dvagtidii = $('#dvagtidii').val();


            var campaign_id = $('#campaign_id').val();
            var campaign_idcids = $('#campaign_idcids').val();
            // var sbsvtag = $('#sbsvtag').val();
            // var sbsvtag = parseInt(sbsvtag1)+1; // incremataion

            var lmid = $('#lmid').val();
            var dvrejectreason = $('#dvrejectreason').val();

            var pcomt = $('#pcomt').val();

            var url = encodeURI("<?php echo base_url("cdc/ajax_update_dataverification");?>");
          
            console.log(url+"?campaign_id="+campaign_id+"&lmid="+lmid+"&campaign_idcids="+campaign_idcids+"&checked="+checked+"&sbsvtag="+sbsvtag+"&pcomt="+pcomt);
           
            $.ajax({
                url :'<?php echo base_url("cdc/ajax_update_dataverification");?>',
                type: 'POST', 
                // contentType: "application/json",
                dataType: 'json',              
                data: {
                   
                  campaign_id: campaign_id,
                  campaign_idcids: campaign_idcids,
                  lmid: lmid,
                  sbsvtag :sbsvtag,
                  dvrejtg :dvrejtg,
                  dvsbtg :dvsbtg,
                  pcomt :pcomt,
                  dvrejectreason :dvrejectreason,
                  checked:checked,
                  dvrdti:dvrdti,
                  dvragtidi:dvragtidi,

                  dvragtidii:dvragtidii,
                  dvrdtii:dvrdtii,

                  dvdti:dvdti,
                  dvagtidi:dvagtidi,
                  dvdtii:dvdtii,
                  dvagtidii:dvagtidii,
                
				},
        async: true,
                cache: false,
                success: function(response){
                    $("#leadsavedv").hide();
                    var text = response.statusCode;
                    console.log("check");
                    if(response.statusCode == "Success") 
                    {         
                         
                        $("#leadupdatedv").html(response.message);
                        top.location.href=base_url+"cdc/dataverfication?camp_id="+<?php echo $campaign['cnid']; ?>;//redirection
                      
                    }else if(response.data=="Fail")
                    {
                        $("#leadupdatedv").html(response.message);
                        
					          }

                   

                },
                error: function (error) {
                  alert("Error");
                  }
              
            });
       
        });
    });
</script>

<script>
/* Save /Discard lead*/
    $(function() {
        $("#leadsavedv").on('click', function() 
        {
          var empid = $('#emp_id').val();
          if(empid == 'undefined'){
            window.location = base_url+"administrator/logout";
            exit;
          }
         
           var checked = [0];

            var campaign_id = $('#campaign_id').val();
            var campaign_idcids = $('#campaign_idcids').val();
            // var sbsvtag1 = $('#sbsvtag').val();
            var sbsvtag = '0'; // discard
            var dvrejtg = '0';
            var dvsbtg = '0';
           
            var lmid = $('#lmid').val();
            var dvrejectreason = $('#dvrejectreason').val();
            var pcomt = $('#pcomt').val();

            var url = encodeURI("<?php echo base_url("cdc/ajax_update_dataverification");?>");
          
            console.log(url+"?campaign_id="+campaign_id+"&lmid="+lmid+"&campaign_idcids="+campaign_idcids+"&checked="+checked+"&sbsvtag="+sbsvtag+"&pcomt="+pcomt);
           
            $.ajax({
                url :'<?php echo base_url("cdc/ajax_update_dataverification");?>',
                type: 'POST', 
                // contentType: "application/json",
                dataType: 'json',              
                data: {
                   
                  campaign_id: campaign_id,
                  campaign_idcids: campaign_idcids,
                  dvrejectreason :dvrejectreason,
                  lmid: lmid,
                  sbsvtag :sbsvtag,
                  dvrejtg :dvrejtg,
                  dvsbtg :dvsbtg,
                  pcomt :pcomt,
                  checked:checked,
                
                   
				},
        async: true,
                cache: false,
                success: function(response){
                    $("#leadsavedv").hide();
                    var text = response.statusCode;
                    console.log("check");
                    if(response.statusCode == "Success") 
                    {         
                         
                        $("#leadupdatedv").html(response.message);
                        top.location.href=base_url+"cdc/dataverfication?camp_id="+<?php echo $campaign['cnid']; ?>;//redirection
                      
                    }else if(response.data=="Fail")
                    {
                        $("#leadupdatedv").html(response.message);
                        
					          }

                   
                },
                error: function (error) {
                  alert("Error");
                  }
              
            });
       
        });
    });
</script>

<script type="text/javascript" src="<?php echo base_url(); ?>admintemplate/assets/pages/todo/todo.js"></script>