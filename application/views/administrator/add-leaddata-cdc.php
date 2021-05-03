

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

<?php foreach ($leadmaster as $ldmster):  
     
    endforeach; ?>




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
   if(event.keyCode == 51) { // disable Enter key on form submission
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


  
  $("#gotocdc").on('click', function() 
        {
          window.location = base_url+"cdc/cdcform?rec_type_id=0&camp_id=<?php echo $_SESSION['campaign_id']; ?>&lmid=<?php echo $_SESSION['lmid']; ?>";
        }
  )
    
 
    $('#ctype').bind('change', function() {
      var value = $(this).val();
      if (value == 1 ||value == 10|| value == 4 )  { // comp type selected aum enable
        $(".aumdis").attr("disabled", false);  
           
        }else{
          $(".aumdis").val('');
          $(".aumdis").attr("disabled", true);  
            
        }
    })


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
       
       
 if(index == '1'){
          $('.questionrow').append('<div class="col-sm-6 card">'+
                                   '<p id='+ index +'><b>'+data['questions']+'</b></p>'+                                  
                                    '<input type="text" value="<?php  echo $ldmster['aa1']; ?>"  name="aa' + index + '" id="aa' + index + '" placeholder="Answer for question ' + index + '"  class="form-control form-control-sm ">'+
                                                                     
                          '</div>');
        }else  if(index == '2'){
          $('.questionrow').append('<div class="col-sm-6 card">'+
                                   '<p id='+ index +'><b>'+data['questions']+'</b></p>'+                                  
                                    '<input type="text" value="<?php  echo $ldmster['aa2']; ?>"  name="aa' + index + '" id="aa' + index + '" placeholder="Answer for question ' + index + '"  class="form-control form-control-sm ">'+
                                                                     
                          '</div>');
        }else  if(index == '3'){
          $('.questionrow').append('<div class="col-sm-6 card">'+
                                   '<p id='+ index +'><b>'+data['questions']+'</b></p>'+                                    
                                    '<input type="text" value="<?php  echo $ldmster['aa3']; ?>"  name="aa' + index + '" id="aa' + index + '" placeholder="Answer for question ' + index + '"  class="form-control form-control-sm ">'+
                                                                     
                          '</div>');
        }else  if(index == '4'){
          $('.questionrow').append('<div class="col-sm-6 card">'+
                                   '<p id='+ index +'><b>'+data['questions']+'</b></p>'+                                  
                                    '<input type="text" value="<?php  echo $ldmster['aa4']; ?>"  name="aa' + index + '" id="aa' + index + '"  placeholder="Answer for question ' + index + '"  class="form-control form-control-sm ">'+
                                                                     
                          '</div>');
        }else  if(index == '5'){
          $('.questionrow').append('<div class="col-sm-6 card">'+
                                   '<p id='+ index +'><b>'+data['questions']+'</b></p>'+                                  
                                    '<input type="text" value="<?php  echo $ldmster['aa5']; ?>"  name="aa' + index + '" id="aa' + index + '" placeholder="Answer for question ' + index + '"  class="form-control form-control-sm ">'+
                                                                     
                          '</div>');
        }else  if(index == '6'){
          $('.questionrow').append('<div class="col-sm-6 card">'+
                                   '<p id='+ index +'><b>'+data['questions']+'</b></p>'+                                   
                                    '<input type="text" value="<?php  echo $ldmster['aa6']; ?>"  name="aa' + index + '" id="aa' + index + '"  placeholder="Answer for question ' + index + '"  class="form-control form-control-sm ">'+
                                                                     
                          '</div>');
        }else  if(index == '7'){
          $('.questionrow').append('<div class="col-sm-6 card">'+
                                   '<p id='+ index +'><b>'+data['questions']+'</b></p>'+                                 
                                    '<input type="text" value="<?php  echo $ldmster['aa7']; ?>"  name="aa' + index + '" id="aa' + index + '" placeholder="Answer for question ' + index + '"  class="form-control form-control-sm ">'+
                                                                     
                          '</div>');
        }else  if(index == '8'){
          $('.questionrow').append('<div class="col-sm-6 card">'+
                                   '<p id='+ index +'><b>'+data['questions']+'</b></p>'+                              
                                    '<input type="text" value="<?php  echo $ldmster['aa8']; ?>"  name="aa' + index + '" id="aa' + index + '" placeholder="Answer for question ' + index + '"  class="form-control form-control-sm ">'+
                                                                     
                          '</div>');
        }else  if(index == '9'){
          $('.questionrow').append('<div class="col-sm-6 card">'+
                                   '<p id='+ index +'><b>'+data['questions']+'</b></p>'+                                 
                                    '<input type="text" value="<?php  echo $ldmster['aa9']; ?>"  name="aa' + index + '" id="aa' + index + '"  placeholder="Answer for question ' + index + '"  class="form-control form-control-sm ">'+
                                                                     
                          '</div>');
        }else  if(index == '10'){
          $('.questionrow').append('<div class="col-sm-6 card">'+
                                   '<p id='+ index +'><b>'+data['questions']+'</b></p>'+                                 
                                    '<input type="text" value="<?php  echo $ldmster['aa10']; ?>"  name="aa' + index + '" id="aa' + index + '"  placeholder="Answer for question ' + index + '"  class="form-control form-control-sm ">'+
                                                                     
                          '</div>');
        }else  if(index == '11'){
          $('.questionrow').append('<div class="col-sm-6 card">'+
                                   '<p id='+ index +'><b>'+data['questions']+'</b></p>'+                               
                                    '<input type="text" value="<?php  echo $ldmster['aa11']; ?>"  name="aa' + index + '" id="aa' + index + '"  placeholder="Answer for question ' + index + '"  class="form-control form-control-sm ">'+
                                                                     
                          '</div>');
        }else  if(index == '12'){
          $('.questionrow').append('<div class="col-sm-6 card">'+
                                   '<p id='+ index +'><b>'+data['questions']+'</b></p>'+                                 
                                    '<input type="text" value="<?php  echo $ldmster['aa12']; ?>"  name="aa' + index + '" id="aa' + index + '"  placeholder="Answer for question ' + index + '"  class="form-control form-control-sm ">'+
                                                                     
                          '</div>');
        }
        
      });
      }
  });
//end question

});

</script>
<form id="basic-form" method="POST" enctype="multipart/form-data">
<div class="page-header">
    <div class="page-header-title col-sm-12">
        <h4>Update Lead</h4> 
        
      
            <div class="form-group row"> 
               <div class="col-sm-2" style="margin-left: 200px;margin-top: -25px;">
                              
                                <button type="submit" name="gotocdc" class="btn btn-primary" style="" id="gotocdc">Go To CDC form</button>
                  </div> 
                <div class="col-sm-4" style="margin-top: -20px;">
                <?php foreach ($campaigns as $campaign): ?>
                 <label class="col-lable"><b>Campaign Name: <?php echo $campaign['campnm']; ?></b></label>
                 <?php endforeach; ?>
                </div> 
                
            </div>   
                           
    </div>
     <?php foreach ($campaigns as $campaign): ?>
      
      <?php endforeach;
       ?>

     <?php foreach ($leadmaster as $ldmster): 
    
      $test1 = "";
      $dvrejectreason = explode(',',$test1);
   
     
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
                                           
                        <div class="form-group row">
                           
                            <div class="col-sm-1">
                                 <select name="sal" id="sal"  class="form-control  form-control-sm cdqadisable">
                                 <option value="Mr">Mr.</option>
                                      <option value="Ms" <?php if(isset($ldmster) && $ldmster['sal'] == "Ms"){ echo "selected" ; } ?> >Ms.</option>
                                      <option value="Mrs" <?php if(isset($ldmster) && $ldmster['sal'] == "Mrs"){ echo "selected" ; } ?>>Mrs.</option>
                                      <option value="Dr" <?php if(isset($ldmster) && $ldmster['sal'] == "Dr"){ echo "selected" ; } ?>>Dr.</option>
                                      <option value="Other" <?php if(isset($ldmster) && $ldmster['sal'] == "Other"){ echo "selected" ; } ?>>Other</option>
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <input type="text"  name="fname" id="fname"  placeholder="First Name"   class="form-control form-control-sm cdqadisable  
                                <?php
                                 if(isset($ldmster) && in_array('fname',$dvrejectreason)) { echo "form-bg-inverse" ; } 
                                 ?>"                             
                                 value ="<?php if(isset($ldmster)){  echo $ldmster['fname']; }?>" >
                                <input type="hidden" name="inclistnew" id="inclistnew" value="<?php echo $campaign['inclistnew']; ?>">
                                <span style='color:#FF0000' id="fname_msg"></span>
                            </div>
                            
                            <div class="col-sm-2">
                                <input type="text"  name="lname" id="lname"  placeholder="Last Name" value ="<?php if(isset($ldmster)){  echo $ldmster['lname']; }?>"   class="form-control form-control-sm cdqadisable
                                <?php
                                 if(isset($ldmster) && in_array('lname',$dvrejectreason)) { echo "form-bg-inverse" ; } 
                                 ?>">
                                <span style='color:#FF0000' id="lname_msg"></span>
                            </div>
                            <div class="col-sm-3">
                                <input type="text"  name="jtitle" id="jtitle"  placeholder="Job Title" value ="<?php if(isset($ldmster)){  echo $ldmster['jtitle']; }?>"  class="form-control form-control-sm cdqadisable
                                <?php
                                 if(isset($ldmster) && in_array('jtitle',$dvrejectreason)) { echo "form-bg-inverse" ; } 
                                 ?>">
                            </div>
                            <div class="col-sm-2">
                                <select class="form-control form-control-sm cdqadisable" name="jlevel" id="jlevel">
                                <option value="">Job Level</option>
                                <?php foreach ($joblevel as $joblevel): ?>
                                    <option value="<?php echo $joblevel['joblids']; ?>"  <?php if(isset($ldmster) && $ldmster['jlevel'] == $joblevel['joblids']){ echo "selected" ; } ?> ><?php echo $joblevel['joblevel']; ?></option>
                                <?php endforeach; ?>  
                               
                                </select>
                            </div>
                            <div class="col-sm-2 <?php
                                 if(isset($ldmster) && in_array('desid',$dvrejectreason)) { echo "form-bg-inverse" ; } 
                                 ?>">
                              
                                <select class="js-example-basic-single <?php
                                 if(isset($ldmster) && in_array('desid',$dvrejectreason)) { echo "form-bg-inverse" ; } 
                                 ?>" name="desid" id="desid">
                                <option value="">Designation</option>
                                <?php foreach ($designation as $designation): ?>
                                    <option value="<?php echo $designation['jid']; ?>" <?php if(isset($ldmster) && $ldmster['jlevel'] == $designation['jid']){ echo "selected" ; } ?>><?php echo $designation['joblist']; ?></option>
                                <?php endforeach; ?>  
                                </select>
                            </div>
                            
                           
                        </div>

                        <hr>
                        <div class="form-group row">
                        <div class="col-sm-2  <?php
                                 if(isset($ldmster) && in_array('dcd',$dvrejectreason)) { echo "form-bg-inverse" ; } 
                                 ?>">
                                 <select class="js-example-basic-single <?php
                                 if(isset($ldmster) && in_array('dcd',$dvrejectreason)) { echo "form-bg-inverse" ; } 
                                 ?>" name="dcd" id="dcd">
                                    <option value=""> Department</option>
                                <?php foreach ($departments as $dept): ?>
                                    <option value="<?php echo $dept['dcd']; ?>"  <?php if(isset($ldmster) && $ldmster['dname'] == $dept['dcd']){ echo "selected" ; } ?> ><?php echo $dept['department']; ?></option>
                                <?php endforeach; ?>
                                </select>
                            </div> 
                            <div class="col-sm-2">
                                <div class="newsletter-signup">
                                <input type="text"  name="email" id="email" value ="<?php if(isset($ldmster)){  echo $ldmster['email']; }?>"  placeholder="Email"  class="form-control form-control-sm cdqadisable
                                <?php
                                 if(isset($ldmster) && in_array('email',$dvrejectreason)) { echo "form-bg-inverse" ; } 
                                 ?>">
                               </div>
                                <span style='color:#FF0000' id="email_msg"></span>
                            </div>
                            <div class="col-sm-2">
                                <input type="text"  name="phone" id="phone" value ="<?php if(isset($ldmster)){  echo $ldmster['phone']; }?>" placeholder="Phone" maxlength="15"  class="form-control form-control-sm cdqadisable
                                <?php
                                 if(isset($ldmster) && in_array('phone',$dvrejectreason)) { echo "form-bg-inverse" ; } 
                                 ?>">
                                <span style='color:#FF0000' id="phone_msg"></span>
                            </div>
                            <div class="col-sm-2">
                                <input type="text"  name="altphn" id="altphn" value ="<?php if(isset($ldmster)){  echo $ldmster['altphn']; }?>" placeholder="Alternate Phone Number" maxlength="10"  class="form-control form-control-sm cdqadisable
                                <?php
                                 if(isset($ldmster) && in_array('altphn',$dvrejectreason)) { echo "form-bg-inverse" ; } 
                                 ?>">
                            </div>
                            
                            <div class="col-sm-2">
                                <input type="text"  name="phext" id="phext" value ="<?php if(isset($ldmster)){  echo $ldmster['phext']; }?>" placeholder="Extension" maxlength="5"  class="form-control form-control-sm cdqadisable
                                <?php
                                 if(isset($ldmster) && in_array('phext',$dvrejectreason)) { echo "form-bg-inverse" ; } 
                                 ?>">
                            </div>
                            <div class="col-sm-2">
                          
                                <input type="text"  name="plink" id="plink"  placeholder="Prospect Link"  class="form-control form-control-sm 
                                <?php
                                 if(isset($ldmster) && in_array('plink',$dvrejectreason)) { echo "form-bg-inverse" ; } 
                                 ?>" value ="<?php if(isset($ldmster)){  echo $ldmster['plink']; }?>" >
                               
                                <span style='color:#FF0000' id="url_msg"></span>
                            </div>
                        
                      </div>
                            <hr>
                        <div class="form-group row">
                             
                              <div class="col-sm-2">
                               <select name="linetype" id="linetype"  class="form-control  form-control-sm cdqadisable <?php
                                 if(isset($ldmster) && in_array('linetype',$dvrejectreason)) { echo "form-bg-inverse" ; } 
                                 ?>">
                                     <option value="0">Line Type</option>
                                     <option value="0" <?php if(isset($ldmster) && $ldmster['linetype'] == 0){ echo "selected" ; } ?> >unknown</option>
                                     <option value="1" <?php if(isset($ldmster) && $ldmster['linetype'] == 1){ echo "selected" ; } ?>>Direct</option>
                                     <option value="2" <?php if(isset($ldmster) && $ldmster['linetype'] == 2){ echo "selected" ; } ?>>Board</option>  
                               </select>
                              
                           </div>
                              <div class="col-sm-2">
                                <div class="compcheck">
                                <input type="text"  name="company_name" id="company_name"  
                                placeholder="Company Name"  class="form-control form-control-sm cdqadisable <?php
                                 if(isset($ldmster) && in_array('company_name',$dvrejectreason)) { echo "form-bg-inverse" ; } 
                                 ?>"  value ="<?php if(isset($ldmster)){  echo $ldmster['cname']; }?>">
                                </div>
                                <span style='color:#FF0000' id="comp_msg"></span>
                              </div> 



                            <div class="col-sm-2">
                                <input type="text"  name="address" id="address"  placeholder="Address"  value ="<?php if(isset($ldmster)){  echo $ldmster['address']; }?>"
                                 class="form-control form-control-sm cdqadisable <?php
                                 if(isset($ldmster) && in_array('address',$dvrejectreason)) { echo "form-bg-inverse" ; } 
                                 ?>">
                           </div>
                           <div class="col-sm-2">
                                <input type="text"  name="city" id="city"  placeholder="City" value ="<?php if(isset($ldmster)){  echo $ldmster['city']; }?>"   class="form-control form-control-sm cdqadisable
                                <?php
                                 if(isset($ldmster) && in_array('city',$dvrejectreason)) { echo "form-bg-inverse" ; } 
                                 ?>">
                           </div>
                           <div class="col-sm-2">
                                <input type="text"  name="state" id="state"  placeholder="State" value ="<?php if(isset($ldmster)){  echo $ldmster['state']; }?>" class="form-control form-control-sm cdqadisable
                                <?php
                                 if(isset($ldmster) && in_array('state',$dvrejectreason)) { echo "form-bg-inverse" ; } 
                                 ?>">
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <input type="text"  name="zip_code" id="zip_code"  placeholder="Zip Code" value ="<?php if(isset($ldmster)){  echo $ldmster['zipcode']; }?>" class="form-control form-control-sm cdqadisable
                                <?php
                                 if(isset($ldmster) && in_array('zip_code',$dvrejectreason)) { echo "form-bg-inverse" ; } 
                                 ?>">
                           </div>
                           
                            
                        </div>
                       <hr>

                        <div class="form-group row">

                        <div class="col-sm-2 <?php
                                 if(isset($ldmster) && in_array('country_id',$dvrejectreason)) { echo "form-bg-inverse" ; } 
                                 ?>">
                                     <select class="js-example-basic-single <?php
                                 if(isset($ldmster) && in_array('country_id',$dvrejectreason)) { echo "form-bg-inverse" ; } 
                                 ?>" name="country_id" id="country_id">
                                     <option value="">Countries</option>
                                 <?php foreach ($countriesofcampaign as $countriesofcampaign): ?>
                                    <option value="<?php echo $countriesofcampaign['countrycd']; ?>" <?php if(isset($ldmster) && $ldmster['country'] == $countriesofcampaign['countrycd']){ echo "selected" ; } ?>  ><?php echo $countriesofcampaign['countryname']; ?></option>
                                <?php endforeach; ?>
                                </select>
                                <span style='color:#FF0000' id="country_id_msg"></span>
                            </div>
                            
                            <div class="col-sm-2 <?php
                                 if(isset($ldmster) && in_array('timezone',$dvrejectreason)) { echo "form-bg-inverse" ; } 
                                 ?>">
                              <select class="js-example-basic-single <?php
                                 if(isset($ldmster) && in_array('timezone',$dvrejectreason)) { echo "form-bg-inverse" ; } 
                                 ?>"  name="timezone" id="timezone">
                            <?php  if(!isset($ldmster['lmid'])){ ?>
                              <option value="">Timezone</option>
                            <?php } else{ ?>
                             <option value="">Timezone</option>
                              <?php foreach ($timezones as $tz):
                                 ?>
                                    <option value="<?php echo $tz['zids']; ?>"  <?php if(isset($ldmster) && $ldmster['timez'] == $tz['zids']){ echo "selected" ; } ?>><?php echo $tz['abbrev']; ?></option>
                                <?php endforeach;  }?>
                                
                                
                                </select>
                                <span style='color:#FF0000' id="timezone_msg"></span>
                            </div>

                            <div class="col-sm-2">
                               <select name="ctype" id="ctype"  class="form-control  form-control-sm cdqadisable <?php
                                 if(isset($ldmster) && in_array('ctype',$dvrejectreason)) { echo "form-bg-inverse" ; } 
                                 ?>"> 
                                     <option value="0">Company Type</option>
                                     <?php foreach ($comptype as $comptype): ?>
                                    <option value="<?php echo $comptype['ctypid']; ?>" <?php if(isset($ldmster) && $ldmster['ctyp'] == $comptype['ctypid']){ echo "selected" ; } ?>><?php echo $comptype['ctypname']; ?></option>
                                <?php endforeach; ?> 
                               </select>
                           </div>
                            <!-- toolbar options -->
                            <div id="toolbar-options" class="hidden">
                                <a href="#myModalemail" data-target="#myModalemail" data-toggle="modal"><i class="icofont icofont-info-circle"></i></a>
                               
                            </div>
                          
                            <div class="col-sm-2  <?php
                                 if(isset($ldmster) && in_array('industrycd',$dvrejectreason)) { echo "form-bg-inverse" ; } 
                                 ?>">
                                  <div data-toolbar="user-options"  id="info-toolbar">
                              <select class="js-example-basic-single <?php
                                 if(isset($ldmster) && in_array('industrycd',$dvrejectreason)) { echo "form-bg-inverse" ; } 
                                 ?>"  name="industrycd" id="industrycd">
                              <option value="">Industry</option>
                              <?php foreach ($industries as $industry): ?>
                                    <option value="<?php echo $industry['industrycd']; ?>" <?php if(isset($ldmster) && $ldmster['indtry'] == $industry['industrycd']){ echo "selected" ; } ?>><?php echo $industry['industry']; ?></option>
                                <?php endforeach; ?>
                                </select>
                                <span style='color:#FF0000' id="industry_id_msg"></span>
                            </div>
                           </div>      
                            
                            <div class="col-sm-2 <?php
                                 if(isset($ldmster) && in_array('subindustrycd',$dvrejectreason)) { echo "form-bg-inverse" ; } 
                                 ?>">
                                   <div data-toolbar="user-options"  id="grow-toolbar">
                                <select class="js-example-basic-single  <?php
                                 if(isset($ldmster) && in_array('subindustrycd',$dvrejectreason)) { echo "form-bg-inverse" ; } 
                                 ?>" name="subindustrycd" id="subindustrycd">
                                <option value="">Sub Industry</option>
                                <?php foreach ($industriessub as $sub): ?>
                                    <option value="<?php echo $sub['subindustrycd']; ?>" <?php if(isset($ldmster) && $ldmster['sindtry'] == $sub['subindustrycd']){ echo "selected" ; } ?>><?php echo $sub['subindustry']; ?></option>
                                <?php endforeach; ?>
                                </select>
                                <span style='color:#FF0000' id="subindustry_id_msg"></span>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <select class="form-control form-control-sm cdqadisable <?php
                                 if(isset($ldmster) && in_array('sectyp',$dvrejectreason)) { echo "form-bg-inverse" ; } 
                                 ?>" name="sectyp" id="sectyp">
                                  
                                    <option value="0">Sector Type</option>
                                    <option value="0"  <?php if(isset($ldmster) && $ldmster['sectyp'] == 0){ echo "selected" ; } ?>>Unknown</option>
                                    <option value="1"  <?php if(isset($ldmster) && $ldmster['sectyp'] == 1){ echo "selected" ; } ?>>Public</option>
                                    <option value="2" <?php if(isset($ldmster) && $ldmster['sectyp'] == 2){ echo "selected" ; } ?>>Private</option>
                                    <option value="3" <?php if(isset($ldmster) && $ldmster['sectyp'] == 3){ echo "selected" ; } ?>>Government</option>
                                    <option value="4" <?php if(isset($ldmster) && $ldmster['sectyp'] == 4){ echo "selected" ; } ?>>Non-Profit </option>
                               
                                    </select>
                            </div>

                        </div>
                <hr>
                    <div class="form-group row">
                        <div class="col-sm-2">
                        <div class="tooltips">
                          <input  type="text"  name="empsize" id="empsize" maxlength="6" value ="<?php if(isset($ldmster)){  echo $ldmster['empsize']; }?>" placeholder="Actual Employee Size"  
                                class="form-control form-control-sm cdqadisable <?php
                                 if(isset($ldmster) && in_array('empsize',$dvrejectreason)) { echo "form-bg-inverse" ; } 
                                 ?>">
                                <span class="tooltiptext"> Select range  between <?php echo $campaign['emplbnd']; ?> & <?php echo $campaign['empubnd']; ?></span>
                        </div>

                               
                                
                                <span style='color:#FF0000' id="empsize_msg"></span>
                               
                            </div>
                            <div class="col-sm-2">
                              <div class="tooltips">
                                <input type="text"  name="arevenue" id="arevenue" value ="<?php if(isset($ldmster)){  echo $ldmster['arevenue']; }?>"  maxlength="15" placeholder="Actual Revenue Size" 
                                 class="form-control form-control-sm cdqadisable <?php
                                 if(isset($ldmster) && in_array('arevenue',$dvrejectreason)) { echo "form-bg-inverse" ; } 
                                 ?>">
                                
                                <span class="tooltiptext"> Select range  between <?php echo $campaign['revlbnd']; ?> <?php echo $campaign['revlbdim']; ?> 
                          & <?php echo $campaign['revubnd']; ?> <?php echo $campaign['revubdim']; ?></span>
                              </div>
                                <span style='color:#FF0000' id="revsize_msg"></span>
                            </div>
                            
                            
                            <div class="col-sm-2">
                                <select class="form-control form-control-sm cdqadisable <?php
                                 if(isset($ldmster) && in_array('mlbl',$dvrejectreason)) { echo "form-bg-inverse" ; } 
                                 ?>" name="mlbl" id="mlbl">
                                
                               
                                    <option value="0" <?php if(isset($ldmster) && $ldmster['mlbl'] == 0){ echo "selected" ; } ?> >K</option>
                                  
                                    <option value="1" <?php if(isset($ldmster) && $ldmster['mlbl'] == 1){ echo "selected" ; } ?>>M</option>
                                    <option value="2"<?php if(isset($ldmster) && $ldmster['mlbl'] == 2){ echo "selected" ; } ?>>B</option>
                                    <option value="3"<?php if(isset($ldmster) && $ldmster['mlbl'] == 3){ echo "selected" ; } ?>>T</option>
                                    </select>
                            </div>          
                            <div class="col-sm-2">
                                <select class="form-control form-control-sm cdqadisable <?php
                                 if(isset($ldmster) && in_array('curr',$dvrejectreason)) { echo "form-bg-inverse" ; } 
                                 ?>" name="curr" id="curr">
                                    <option value="1">USD</option>                                  
                                <?php foreach ($currency as $currency): ?>
                                    <option value="<?php echo $currency['currid']; ?>"  <?php if(isset($ldmster) && $ldmster['curr'] == $currency['currid']){ echo "selected" ; } ?>><?php echo $currency['currab']; ?></option>
                                <?php endforeach; ?>
                                   </select>
                                

                            </div>          
                            <div class="col-sm-2">
                                <div class="domaincheck">
                                <input type="text" value ="<?php if(isset($ldmster)){  echo $ldmster['domain']; }?>"   name="domain" id="domain"  placeholder="Domain" value="" 
                                 class="form-control form-control-sm cdqadisable  <?php
                                 if(isset($ldmster) && in_array('domain',$dvrejectreason)) { echo "form-bg-inverse" ; } 
                                 ?>">
                                </div>
                                <span style='color:#FF0000' id="domain_msg"></span>
                              </div>
                            
                            <div class="col-sm-2">
                                <input type="text" value ="<?php if(isset($ldmster)){  echo $ldmster['empszlink']; }?>"  name="empszlink" id="empszlink" value=""   placeholder="Employee Size Link" 
                                 class="form-control form-control-sm  <?php
                                 if(isset($ldmster) && in_array('empszlink',$dvrejectreason)) { echo "form-bg-inverse" ; } 
                                 ?>">
                            </div>
                           
                        </div>
                        
                        <hr>
                        <div class="form-group row">
                           
                        <div class="col-sm-2 ">
                                <input type="text" value ="<?php if(isset($ldmster)){  echo $ldmster['indlink']; }?>"  name="indlink" 
                                id="indlink"  placeholder="Industry Link" value="" class="form-control form-control-sm <?php
                                 if(isset($ldmster) && in_array('indlink',$dvrejectreason)) { echo "form-bg-inverse" ; } 
                                 ?>">
                            </div>
                            <div class="col-sm-2">
                                <input type="text"  name="revszlink" id="revszlink" value ="<?php if(isset($ldmster)){  echo $ldmster['revszlink']; }?>"     placeholder="Revenue Size Link"  
                                class="form-control form-control-sm revsizehide <?php
                                 if(isset($ldmster) && in_array('revszlink',$dvrejectreason)) { echo "form-bg-inverse" ; } 
                                 ?>">
                            </div>
                            <div class="col-sm-2">
                                <input type="text"  name="othrlink" id="othrlink" value ="<?php if(isset($ldmster)){  echo $ldmster['othrlink']; }?>" placeholder="Other Link"  
                                class="form-control form-control-sm <?php
                                 if(isset($ldmster) && in_array('othrlink',$dvrejectreason)) { echo "form-bg-inverse" ; } 
                                 ?>">
                            </div>
                            <div class="col-sm-2">
                                <select class="form-control form-control-sm"  name="emailver" id="emailver">
                                    <option value="0">Email Verification</option>
                                    <option value="1"<?php if(isset($ldmster) && $ldmster['emailver'] == 1){ echo "selected" ; } ?>>Yes</option>
                                    <option value="0"<?php if(isset($ldmster) && $ldmster['emailver'] == 0){ echo "selected" ; } ?>>No</option>
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <input type="text"  name="aum" id="aum" value ="<?php if(isset($ldmster)){  echo $ldmster['aum']; }?>" placeholder="Asset Under Management" 
                                 class="form-control form-control-sm aumdis <?php
                                 if(isset($ldmster) && in_array('aum',$dvrejectreason)) { echo "form-bg-inverse" ; } 
                                 ?>">
                            </div>
                            <div class="col-sm-2">
                                <select class="form-control form-control-sm <?php
                                 if(isset($ldmster) && in_array('assetid',$dvrejectreason)) { echo "form-bg-inverse" ; } 
                                 ?>" name="assetid" id="assetid">
                                    <option value="">Asset</option>
                                    <?php foreach ($assetitle as $assetitle): ?>
                                    <option value="<?php echo $assetitle['assetid']; ?>"><?php echo $assetitle['title']; ?></option>
                                <?php endforeach; ?>
                                   </select>
                            </div> 
                        </div>
                        <hr>
                        <div class="form-group row">
                        <div class="col-sm-2">
                                <select class="form-control form-control-sm"  name="cvr" id="cvr">
                                    <option value="">Call Verified</option>
                                    <option value="1"<?php if(isset($ldmster) && $ldmster['cvr'] == '1'){ echo "selected" ; } ?>>Yes</option>
                                    <option value="0"<?php if(isset($ldmster) && $ldmster['cvr'] == '0'){ echo "selected" ; } ?>>No</option>
                                </select>
                            </div>

                        <div class="col-sm-2">
                          <select class="form-control form-control-sm"  name="lcalldisp" id="lcalldisp">
                              <option value="">Call Disposition</option>
                            
                              <option value="Voicemail"<?php if(isset($ldmster) && $ldmster['lcalldisp'] == 'Voicemail'){ echo "selected" ; } ?>>Voicemail</option>
                              <option value="VM_DBN"<?php if(isset($ldmster) && $ldmster['lcalldisp'] == 'VM_DBN'){ echo "selected" ; } ?>>VM_DBN</option>
                              <option value="VM_DIRECT"<?php if(isset($ldmster) && $ldmster['lcalldisp'] == 'VM_DIRECT'){ echo "selected" ; } ?>>VM_DIRECT</option>
                              <option value="VM_EXTN"<?php if(isset($ldmster) && $ldmster['lcalldisp'] == 'VM_EXTN'){ echo "selected" ; } ?>>VM_EXTN</option>
                              <option value="POC"<?php if(isset($ldmster) && $ldmster['lcalldisp'] == 'POC'){ echo "selected" ; } ?>>POC</option>
                              <option value="Assistant CNF"<?php if(isset($ldmster) && $ldmster['lcalldisp'] == 'Assistant CNF'){ echo "selected" ; } ?>>Assistant CNF</option>
                              <option value="Assistant VM"<?php if(isset($ldmster) && $ldmster['lcalldisp'] == 'Assistant VM'){ echo "selected" ; } ?>>Assistant VM</option>
                              <option value="Assistant Extn"<?php if(isset($ldmster) && $ldmster['lcalldisp'] == 'Assistant Extn'){ echo "selected" ; } ?>>Assistant Extn</option>
                              <option value="Operator"<?php if(isset($ldmster) && $ldmster['lcalldisp'] == 'Operator'){ echo "selected" ; } ?>>Operator</option>
                              <option value="OPR_CNF"<?php if(isset($ldmster) && $ldmster['lcalldisp'] == 'OPR_CNF'){ echo "selected" ; } ?>>OPR_CNF</option>
                              <option value="OPR_VM"<?php if(isset($ldmster) && $ldmster['lcalldisp'] == 'OPR_VM'){ echo "selected" ; } ?>>OPR_VM</option>
                              <option value="VM but Prospect Left"<?php if(isset($ldmster) && $ldmster['lcalldisp'] == 'VM but Prospect Left'){ echo "selected" ; } ?>>VM but Prospect Left</option>
                              <option value="OPR_NOTFR"<?php if(isset($ldmster) && $ldmster['lcalldisp'] == 'OPR_NOTFR'){ echo "selected" ; } ?>>OPR_NOTFR</option>
                              <option value="ONLY EMAIL"<?php if(isset($ldmster) && $ldmster['lcalldisp'] == 'ONLY EMAIL'){ echo "selected" ; } ?>>ONLY EMAIL</option>
                              <option value="Lead"<?php if(isset($ldmster) && $ldmster['lcalldisp'] == 'Lead'){ echo "selected" ; } ?>>Lead</option>
                              <option value="Half Lead"<?php if(isset($ldmster) && $ldmster['lcalldisp'] == 'Half Lead'){ echo "selected" ; } ?>>Half Lead</option>
                          </select>
                            </div>
                            <div class="col-sm-2">
                                <select class="form-control form-control-sm"  name="lcallstat" id="lcallstat">
                                    <option value="">Call on hold/call back</option>
                                    <option value="0"<?php if(isset($ldmster) && $ldmster['lcallstat'] == '0'){ echo "selected" ; } ?>>On hold</option>
                                    <option value="1"<?php if(isset($ldmster) && $ldmster['lcallstat'] == '1'){ echo "selected" ; } ?>>Call back</option>
                                    <option value="2"<?php if(isset($ldmster) && $ldmster['lcallstat'] == '2'){ echo "selected" ; } ?>>complete</option>
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <select class="form-control form-control-sm"  name="ddispositionclass" id="ddispositionclass">
                                    <option value="0" <?php if(isset($ldmster) && $ldmster['ddispositionclass'] == '0'){ echo "selected" ; } ?>>Disposition Class- Live</option>
                                    <option value="1" <?php if(isset($ldmster) && $ldmster['ddispositionclass'] == '1'){ echo "selected" ; } ?>>Dead</option>
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <select class="form-control form-control-sm"  name="cdclst" id="cdclst">
                                    <option value="">Lead Score</option>
                                    <option value="1"<?php if(isset($ldmster) && $ldmster['cdclst'] == '1'){ echo "selected" ; } ?>>Yes</option>
                                    <option value="0"<?php if(isset($ldmster) && $ldmster['cdclst'] == '0'){ echo "selected" ; } ?>>No</option>
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <select class="form-control form-control-sm"  name="callrec" id="callrec">
                                    <option value="">Call Recording</option>
                                    <option value="1"<?php if(isset($ldmster) && $ldmster['callrec'] == '1'){ echo "selected" ; } ?>>Yes</option>
                                    <option value="0"<?php if(isset($ldmster) && $ldmster['callrec'] == '0'){ echo "selected" ; } ?>>No</option>
                                </select>
                            </div>
                            
                          
                       </div>
                        <hr>


                        <div class="form-group row optindiv">

                         
                        <div class="col-sm-2">
                                       Opt - in  <input type="checkbox" <?php if($ldmster['optin'] == '1'){ echo "checked" ; } ?> value="<?php if($ldmster['optin'] == '1'){ echo "1" ; } ?>"  id="optin" name="optin" class="js-single optin"  />
                                        </div>
                                        <div class="col-sm-2 optoption">
                                        Opt - in Post  <input type="checkbox" <?php if($ldmster['optpst'] == '1'){ echo "checked" ; } ?>  value="<?php if($ldmster['optpst'] == '1'){ echo "1" ; } ?>" id="optpst" name="optpst" class="js-single"  />
                                        </div>
                                       
                                        <div class="col-sm-2 optoption">
                                        Opt - in Phone <input type="checkbox" <?php if($ldmster['optph'] == '1'){ echo "checked" ; } ?> value="<?php if($ldmster['optph'] == '1'){ echo "1" ; } ?>"  id="optph" name="optph" class="js-single"  />
                                        </div>
                                        
                                        <div class="col-sm-2 optoption">
                                        Opt - in Email <input type="checkbox" <?php if($ldmster['opteml'] == '1'){ echo "checked" ; } ?> value="<?php if($ldmster['opteml'] == '1'){ echo "1" ; } ?>" id="opteml" name="opteml" class="js-single"  />
                                        </div>
                                        <!-- <div class="col-sm-2 optoption"> -->
                                        <div class="col-sm-2 ">
                                        DND <input type="checkbox" <?php if($ldmster['dnd'] == '1'){ echo "checked" ; } ?> value="<?php if($ldmster['dnd'] == '1'){ echo "1" ; } ?>" id="dnd" name="dnd" class="js-single dnd"  />
                                        </div>


                         </div>
                       

                        <div class="form-group row questionrow">                       
                          
                        </div> 
                        <br>

                        
                        <input type = hidden name="campaign_id" id="campaign_id" value="<?php echo $campaign['cnid']; ?>">
                        <input type = hidden name="campaign_idcids" id="campaign_idcids" value="<?php echo $campaign['cids']; ?>">
                        
                       
                        <?php if(isset($ldmster) && $ldmster != 1 ){ ?> 
                          <div class="form-group row" >
                             <div class="col-sm-12  comt">
                                <label class="col-lable"><b>Comment</b></label>
                                <input type="text"  name="pcomt" id="pcomt"  placeholder="Comment"  class="form-control form-control-sm" 
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
                                 } ?>" >
                            </div> 
                         </div>
                        
                          <input type = hidden name="lmid" id="lmid" value="<?php echo $ldmster['lmid']; ?>">
                          <input type = hidden name="emp_id" id="emp_id" value="<?php echo  $_SESSION['empcode']; ?>">
                          <input type = hidden name="sbsvtag" id="sbsvtag" value="<?php echo $ldmster['sbsvtag']; ?>">
                          <input type = hidden name="rlc" id="rlc" value="<?php echo $ldmster['rlc']; ?>">
                         
                          <input type = hidden name="cdcsbdti" id="cdcsbdti" value="<?php echo $ldmster['cdcsbdti']; ?>">
                          <input type = hidden name="cdcsbagti" id="cdcsbagti" value="<?php echo $ldmster['cdcsbagti']; ?>">
                          
                          <input type = hidden name="cdcsbagtii" id="cdcsbagtii" value="<?php echo $ldmster['cdcsbagtii']; ?>">
                          <input type = hidden name="cdcsbdtii" id="cdcsbdtii" value="<?php echo $ldmster['cdcsbdtii']; ?>">
                          
                          <input type = hidden name="cdcsb" id="cdcsb" value="<?php echo $ldmster['cdcsb']; ?>">

                          <div class="col-sm-12">
                             <center>
                              <button type="submit" name="leadupdatecdc" class="btn btn-primary leaddisplay" style=""  id="leadupdatecdc">Submit</button> 
                              <button type="submit" name="leadsavecdc" class="btn btn-primary leaddisplay" style="margin-left:50px"  id="leadsavecdc">Skip </button> 
                            </center>
                            </div>
                        <?php } ?>
                       <?php if($ldmster == 1){ ?>
                        <input type = hidden name="emp_id" id="emp_id" value="<?php echo  $_SESSION['empcode']; ?>">
                        <div class="col-sm-12">
                             <center>
                              <button type="submit" name="leadsubmitcdc" class="btn btn-primary leaddisplay" style=""  id="leadsubmitcdc">Submit </button> 
                              <button type="submit" name="leadsavecdc" class="btn btn-primary leaddisplay" style="margin-left:50px"  id="leadsavecdc">Skip </button> 
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


// check revenue range for campaign
$('#arevenue').change(function(){

  $("#revszlink").prop('disabled', false);
  $('#revszlink').val("");
  
});

$('#mlbl').blur(function(){   // revenue range change

 
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
    // $('.newsletter-signup input:first').on('keyup', function(){ 
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


// alert(lmid);
if(lmid == undefined){
  $("#revszlink").prop('disabled', true);
  $('#revszlink').val("NA");

}
 
  $('.commentvisible').hide();

  $('.leaddisplay').show(); //buttons
  $('.cdqadisplay').hide();//buttons
  // load questions of campaign on load 
  $('.optoption').hide();
    
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
      $('.dnd').change(function()
      {
        if ($('#dnd').is(':checked')) {
            $('#optin').val("0");
            $('#opteml').val("0");
            $('#optph').val("0");
            $('#optpst').val("0");
            $('.optoption').hide();   
        }else{
            $('#optin').val("1");
            $('#opteml').val("1");
            $('#optph').val("1");
            $('#optpst').val("1");
            $('.optoption').show();
               
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
      ddispositionclass : {
        // required: true
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
        email: true,
        required: true,
        
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
        $("#leadupdatecdc").on('click', function() 
        {
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
            var campaign_id = $('#campaign_id').val();
            var campaign_idcids = $('#campaign_idcids').val();
            var sbsvtag1 = $('#sbsvtag').val();
            var sbsvtag = parseInt(sbsvtag1)+1; // incremataion
            var lmid = $('#lmid').val();


            var cdcsbagti = $('#cdcsbagti').val();
            var cdcsbagtii = $('#cdcsbagtii').val();

            var cdcsbdti = $('#cdcsbdti').val();
            var cdcsbdtii = $('#cdcsbdtii').val();

            var cdcsb1 = $('#cdcsb').val();
            var cdcsb = parseInt(cdcsb1)+1; // incremataion

          
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
            var dnd = $('#dnd').val();
            
            if(optin == ""){
            var optin = 0;
             }
             if(optpst == ""){
            var optpst = 0;
             }
             if(opteml == ""){
            var opteml = 0;
             }
             if(optph == ""){
            var optph = 0;
             }
             if(dnd == ""){
            var dnd = 0;
             }

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
            if(aa1 == undefined)
             {
              var aa1 = null; 
             }
             if(aa2 == undefined)
             {
              var aa2 = null; 
             }
             if(aa3 == undefined)
             {
              var aa3 = null; 
             }
             if(aa4 == undefined)
             {
              var aa4 = null; 
             }
             if(aa5 == undefined)
             {
              var aa5= null; 
             }
             if(aa6 == undefined)
             {
              var aa6 = null; 
             }
             if(aa7 == undefined)
             {
              var aa7 = null; 
             }
             if(aa8 == undefined)
             {
              var aa8 = null; 
             }
             if(aa9 == undefined)
             {
              var aa9 = null; 
             }
             if(aa9 == undefined)
             {
              var aa9 = null; 
             }
             if(aa10 == undefined)
             {
              var aa10 = null; 
             }
             if(aa11 == undefined)
             {
              var aa11= null; 
             }
             if(aa12 == undefined)
             {
              var aa12= null; 
             }
          
            var lcalldisp = $('#lcalldisp').val();
            var lcallstat = $('#lcallstat').val();
            var ddispositionclass = $('#ddispositionclass').val();
            var cdclst = $('#cdclst').val();
            var callrec = $('#callrec').val();
            var cvr = $('#cvr').val();
          
          
            if(cvr != "" && callrec != "" && cdclst !="" && fname != "" && lname != "" && company_name != ""  && jtitle != "" && desid != "" && dcd !="" && email != "" && phone !="" && plink !="" && address != "" && city != "" && state != ""  && country_id != "" && industrycd != "" && subindustrycd != "" && empsize != "" && domain !=""  && empszlink != "" && revszlink != ""  && zip_code !="" ){
            var url = encodeURI("<?php echo base_url("cdc/ajax_update_leaddatacdc");?>");
            console.log(url+"?campaign_id="+campaign_id+"&lmid="+lmid+"&campaign_idcids="+campaign_idcids+"&sbsvtag="+sbsvtag+"&sal="+sal+"&fname="+fname+"&lname="+lname+"&jtitle="+jtitle+"&desid="+desid+"&jlevel="+jlevel+"&dcd="+dcd+"&email="+email+"&phone="+phone+"&altphn="+altphn+"&phext="+phext+"&plink="+plink+"&company_name="+company_name+"&address="+address+"&city="+city+"&state="+state+"&zip_code="+zip_code+"&country_id="+country_id+"&timezone="+timezone+"&ctype="+ctype+"&linetype="+linetype+"&industrycd="+industrycd+"&subindustrycd="+subindustrycd+"&sectyp="+sectyp+"&empsize="+empsize+"&mlbl="+mlbl+"&curr="+curr+"&arevenue="+arevenue+"&empszlink="+empszlink+"&indlink="+indlink+"&domain="+domain+"&othrlink="+othrlink+"&revszlink="+revszlink+"&emailver="+emailver+"&aum="+aum+"&assetid="+assetid+"&optin="+optin+"&optpst="+optpst+"&optph="+optph+"&opteml="+opteml+"&aa1="+aa1+"&aa2="+aa2+"&aa3="+aa3+"&aa4="+aa4+"&aa5="+aa5+"&aa6="+aa6+"&aa7="+aa7+"&aa8="+aa8+"&aa9="+aa9+"&aa10="+aa10+"&aa11="+aa11+"&aa12="+aa12+"&pcomt="+pcomt);
           
            $.ajax({
                url :'<?php echo base_url("cdc/ajax_update_leaddatacdc");?>',
                type: 'GET', 
                // contentType: "application/json",
                dataType: 'json',              
                data: {
                   
                  campaign_id: campaign_id,
                  campaign_idcids: campaign_idcids,
                  lmid: lmid,
                  sbsvtag :sbsvtag,
                  
                  cdcsbdti:cdcsbdti,
                  cdcsbagti:cdcsbagti,
                  cdcsbdtii:cdcsbdtii,
                  cdcsbagtii:cdcsbagtii,

                  cdcsb:cdcsb,

                  lcalldisp:lcalldisp,
                  lcallstat:lcallstat,
                  ddispositionclass:ddispositionclass,
                  cdclst:cdclst,
                  callrec:callrec,
                  cvr:cvr,


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
                    aum:aum,
                    assetid:assetid,

                    optin:optin,
                    optph:optph,
                    opteml:opteml,
                    optpst:optpst,
                    dnd:dnd,
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
                      
                    
                    
				},
        async: true,
                cache: false,
                success: function(response){                 
                    var text = response.statusCode;
                    console.log("check");
                    if(response.statusCode == "Success") 
                    {         
                         
                        $("#leadupdatecdc").html(response.message);                      
                        top.location.href=base_url+"cdc/cdcform?camp_id="+<?php echo $campaign['cnid']; ?>;//redirection
                      
                      
                    }else if(response.statusCode=="Fail")
                    {
                        $("#leadupdatecdc").html(response.message);
                        
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
        } else{
          alert("Please fill Mandatory fields");
        }
        });
    });
</script>

<!--  code for save data in db -->
<script>
    $(function() {
        $("#leadsavecdc").on('click', function() 
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
            window.location = base_url+"administrator/logout";
            exit;
          }
           
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
            var dnd = $('#dnd').val();
             if(optin == ""){
            var optin = 0;
             }
             if(optpst == ""){
            var optpst = 0;
             }
             if(opteml == ""){
            var opteml = 0;
             }
             if(optph == ""){
            var optph = 0;
             }
             if(dnd == ""){
            var dnd = 0;
             }
             

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
          
            if(aa1 == undefined)
             {
              var aa1 = null; 
             }
             if(aa2 == undefined)
             {
              var aa2 = null; 
             }
             if(aa3 == undefined)
             {
              var aa3 = null; 
             }
             if(aa4 == undefined)
             {
              var aa4 = null; 
             }
             if(aa5 == undefined)
             {
              var aa5= null; 
             }
             if(aa6 == undefined)
             {
              var aa6 = null; 
             }
             if(aa7 == undefined)
             {
              var aa7 = null; 
             }
             if(aa8 == undefined)
             {
              var aa8 = null; 
             }
             if(aa9 == undefined)
             {
              var aa9 = null; 
             }
             if(aa9 == undefined)
             {
              var aa9 = null; 
             }
             if(aa10 == undefined)
             {
              var aa10 = null; 
             }
             if(aa11 == undefined)
             {
              var aa11= null; 
             }
             if(aa12 == undefined)
             {
              var aa12= null; 
             }

            var lcalldisp = $('#lcalldisp').val();
            var lcallstat = $('#lcallstat').val();
            var ddispositionclass = $('#ddispositionclass').val();
            var cdclst = $('#cdclst').val();
            var callrec = $('#callrec').val();
            var cvr = $('#cvr').val();
           
            if(cvr != "" && callrec != "" && cdclst !="" && fname != "" && lname != "" && company_name != ""  && jtitle != "" && desid != "" && dcd !="" && email != "" && phone !="" && plink !="" && address != "" && city != "" && state != ""  && country_id != "" && industrycd != "" && subindustrycd != "" && empsize != "" && domain !=""  && empszlink != "" && revszlink != ""  && zip_code !="" ){
           

            var url = encodeURI("<?php echo base_url("cdc/ajax_save_updateleaddatacdc");?>");
            console.log(url+"?campaign_idcids="+campaign_idcids+"&lmid="+lmid+"&campaign_id="+campaign_id+"&sal="+sal+"&fname="+fname+"&lname="+lname+"&jtitle="+jtitle+"&desid="+desid+"&jlevel="+jlevel+"&dcd="+dcd+"&email="+email+"&phone="+phone+"&altphn="+altphn+"&phext="+phext+"&plink="+plink+"&company_name="+company_name+"&address="+address+"&city="+city+"&state="+state+"&zip_code="+zip_code+"&country_id="+country_id+"&timezone="+timezone+"&ctype="+ctype+"&linetype="+linetype+"&industrycd="+industrycd+"&subindustrycd="+subindustrycd+"&sectyp="+sectyp+"&empsize="+empsize+"&mlbl="+mlbl+"&curr="+curr+"&arevenue="+arevenue+"&empszlink="+empszlink+"&indlink="+indlink+"&domain="+domain+"&othrlink="+othrlink+"&revszlink="+revszlink+"&emailver="+emailver+"&aum="+aum+"&assetid="+assetid+"&optin="+optin+"&optpst="+optpst+"&optph="+optph+"&opteml="+opteml+"&aa1="+aa1+"&aa2="+aa2+"&aa3="+aa3+"&aa4="+aa4+"&aa5="+aa5+"&aa6="+aa6+"&aa7="+aa7+"&aa8="+aa8+"&aa9="+aa9+"&aa10="+aa10+"&aa11="+aa11+"&aa12="+aa12+"&pcomt="+pcomt);
           
            $.ajax({
                url :'<?php echo base_url("cdc/ajax_save_updateleaddatacdc");?>',
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

                    lcalldisp:lcalldisp,
                    lcallstat:lcallstat,
                    ddispositionclass:ddispositionclass,
                    cdclst:cdclst,
                    callrec:callrec,
                    cvr:cvr,

                    
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
                    aum:aum,

                    optin:optin,
                    optph:optph,
                    opteml:opteml,
                    optpst:optpst,
                    dnd:dnd,
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
                             
                   
				},
      
                success: function(response){

                    var text = response.statusCode;
                    console.log("check");
                   
                    if(response.statusCode == "Success") 
                    {     
                                 
                        $("#leadsave").html(response.message);
                    
                        top.location.href=base_url+"cdc/cdcform?camp_id="+<?php echo $campaign['cnid']; ?>;//redirection
                      
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
</script>     