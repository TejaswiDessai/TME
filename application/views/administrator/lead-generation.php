

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
  
}
.to-do-list i {
  color: #0e11b9;
  opacity: unset;
  font-size: 18px;
}

.checkvalue{
  outline: 1px solid #FF5722;
}

 </style>


<?php foreach ($leadmaster as $ldmster):  
     
    endforeach;   ?>
 
<script>


var base_url = "<?php echo base_url() ?>";

$(document).ready(function () {

    // Handler for .ready() called.
    $('html, body').animate({
        scrollTop: $('#camp_form').offset().top
    }, 'slow');
});


//below code for retreive button on change on rect type
$(document).ready(function() { 
  $(".aumdis").attr("disabled", true);   // aum disable
 
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
          
          var ans = 'aa'+index; 
        
          var testa = <?php echo "'aa'+index";?>;
       
        if(index == '1'){
          $('.questionrow').append('<div class="col-sm-6 card">'+
                                   '<p id='+ index +'><b>'+data['questions']+'</b></p>'+
                                    '<input type="text" value="<?php  echo $ldmster['aa1']; ?>"  name="aa' + index + '" id="aa' + index + '"  placeholder="Answer for question ' + index + '"  class="form-control form-control-sm ">'+
                                                                     
                          '</div>');
        }else  if(index == '2'){
          $('.questionrow').append('<div class="col-sm-6 card">'+
                                   '<p id='+ index +'><b>'+data['questions']+'</b></p>'+
                                    '<input type="text" value="<?php  echo $ldmster['aa2']; ?>"  name="aa' + index + '" id="aa' + index + '"  placeholder="Answer for question ' + index + '"  class="form-control form-control-sm ">'+
                                                                     
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
                                    '<input type="text" value="<?php  echo $ldmster['aa5']; ?>"  name="aa' + index + '" id="aa' + index + '"  placeholder="Answer for question ' + index + '"  class="form-control form-control-sm ">'+
                                                                     
                          '</div>');
        }else  if(index == '6'){
          $('.questionrow').append('<div class="col-sm-6 card">'+
                                   '<p id='+ index +'><b>'+data['questions']+'</b></p>'+
                                    '<input type="text" value="<?php  echo $ldmster['aa6']; ?>"  name="aa' + index + '" id="aa' + index + '"  placeholder="Answer for question ' + index + '"  class="form-control form-control-sm ">'+
                                                                     
                          '</div>');
        }else  if(index == '7'){
          $('.questionrow').append('<div class="col-sm-6 card">'+
                                   '<p id='+ index +'><b>'+data['questions']+'</b></p>'+
                                    '<input type="text" value="<?php  echo $ldmster['aa7']; ?>"  name="aa' + index + '" id="aa' + index + '"  placeholder="Answer for question ' + index + '"  class="form-control form-control-sm ">'+
                                                                     
                          '</div>');
        }else  if(index == '8'){
          $('.questionrow').append('<div class="col-sm-6 card">'+
                                   '<p id='+ index +'><b>'+data['questions']+'</b></p>'+
                                    '<input type="text" value="<?php  echo $ldmster['aa8']; ?>"  name="aa' + index + '" id="aa' + index + '"  placeholder="Answer for question ' + index + '"  class="form-control form-control-sm ">'+
                                                                     
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
        <h4>Lead Generation</h4> 
        
      
            <div class="form-group row"> 
               <div class="col-sm-2" style="margin-left: 200px;margin-top: -25px;">

           
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
    
      $tid = explode(',',$ldmster['dvrejectreason']);
     
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
                                                <span  class="form-control form-control-sm cdqadisable tooltips"><?php if(isset($ldmster['cname'])){  echo $ldmster['cname']; }else { echo "Comapny Name Empty" ;} ?>
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
                                                <span  class="form-control form-control-sm cdqadisable tooltips"><?php if(isset($ldmster['city'])){  echo $ldmster['state']; }else { echo "state is Empty" ;} ?>
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
<!--                                  
                                <span style='color:#FF0000' id="country_id_msg"></span> -->
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
                            
                            </div>
                            <div class="col-sm-2">
                                <!-- <input type="text"  name="arevenue" id="arevenue" value ="<?php //if(isset($ldmster)){  echo $ldmster['arevenue']; }?>"  maxlength="15" placeholder="Actual Revenue Size"  class="form-control form-control-sm cdqadisable"> -->
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
                                <!-- <input type="text" value ="<?php //if(isset($ldmster)){  echo $ldmster['domain']; }?>"   name="domain" id="domain"  placeholder="Domain" value=""  class="form-control form-control-sm cdqadisable"> -->
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
                                                    <input type="checkbox" name="emailver" id="lineemailvertype"  value="linetype">
                                                  <span  class="form-control form-control-sm cdqadisable tooltips"><?php 
                                                    if($ldmster['emailver'] == "0"){ 
                                                     echo "Not Email verified"; 
                                                    }else if($ldmster['emailver'] == "1") { 
                                                      echo "Email verified";
                                                    
                                                    }
                                                      ?>
                                                      <span class="tooltiptext">Email verified</span>
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
                            <div class="col-sm-2">
                              
                                   <div class="to-do-list">
                                        <div class="checkbox-fade fade-in-primary  col-sm-12">
                                            <label class="check-task">
                                                <input type="checkbox" name="assetid" id="assetid"  value="assetid">
                                                <?php// foreach ($joblevel as $joblevel): ?>
                                               <span  class="form-control form-control-sm cdqadisable tooltips"><?php if($ldmster['atitle'] != "" && $ldmster['atitle'] != '0' ){ echo $assetitledv['title']; } else { echo "Asset title is Empty" ; } ?>
                                               <span class="tooltiptext">Asset Title</span>
                                                </span>
                                                <?php// endforeach; ?>  
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
                                                <input type="checkbox" name="cvr" id="cvr"  value="cvr">
                                                <?php// foreach ($joblevel as $joblevel): ?>
                                               <span  class="form-control form-control-sm cdqadisable tooltips">
                                               <?php if($ldmster['cvr'] != "" && $ldmster['cvr'] == '1' ){ echo "Yes"; } else { echo "NO" ; } ?>
                                               <span class="tooltiptext">Call Verified</span>
                                                </span>
                                                <?php// endforeach; ?>  
                                            </label>
                                        </div>
                                  </div>

                            </div>

                        <div class="col-sm-2">

                        <div class="to-do-list">
                                        <div class="checkbox-fade fade-in-primary  col-sm-12">
                                            <label class="check-task">
                                                <input type="checkbox" name="lcalldisp" id="lcalldisp"  value="lcalldisp">
                                                <?php// foreach ($joblevel as $joblevel): ?>
                                               <span  class="form-control form-control-sm cdqadisable tooltips">
                                               <?php if($ldmster['lcalldisp'] != "" ){ echo $ldmster['lcalldisp']; } else { echo "Call Disposition" ; } ?>
                                               <span class="tooltiptext">Call Disposition</span>
                                                </span>
                                                <?php// endforeach; ?>  
                                            </label>
                                        </div>
                                  </div>

                         
                            </div>
                            <div class="col-sm-2">
                            <div class="to-do-list">
                                        <div class="checkbox-fade fade-in-primary  col-sm-12">
                                            <label class="check-task">
                                                <input type="checkbox" name="lcallstat" id="lcallstat"  value="lcallstat">
                                                <?php// foreach ($joblevel as $joblevel): ?>
                                               <span  class="form-control form-control-sm cdqadisable tooltips">
                                               <?php if($ldmster['lcallstat'] != "" && $ldmster['lcallstat'] == '0' )
                                               { 
                                                 echo "On hold"; 
                                              } else if($ldmster['lcallstat'] != "" && $ldmster['lcallstat'] == '1'){
                                                echo "Call back"; 
                                              }else if($ldmster['lcallstat'] != "" && $ldmster['lcallstat'] == '2'){
                                                echo "complete"; 
                                              }
                                               else { echo "Empty" ; } ?>
                                               <span class="tooltiptext">Call on hold/call back</span>
                                                </span>
                                                <?php// endforeach; ?>  
                                            </label>
                                        </div>
                                  </div>

                               
                            </div>
                            <div class="col-sm-2">
                            <div class="to-do-list">
                                        <div class="checkbox-fade fade-in-primary  col-sm-12">
                                            <label class="check-task">
                                                <input type="checkbox" name="ddispositionclass" id="ddispositionclass"  value="cvr">
                                                <?php// foreach ($joblevel as $joblevel): ?>
                                               <span  class="form-control form-control-sm cdqadisable tooltips">
                                               <?php if($ldmster['ddispositionclass'] != "" && $ldmster['ddispositionclass'] == '1' ){ echo "Dead"; } else { echo "Live" ; } ?>
                                               <span class="tooltiptext">Disposition Class</span>
                                                </span>
                                                <?php// endforeach; ?>  
                                            </label>
                                        </div>
                                  </div>
                              
                            </div>
                           <div class="col-sm-2">

                            <div class="to-do-list">
                                        <div class="checkbox-fade fade-in-primary  col-sm-12">
                                            <label class="check-task">
                                                <input type="checkbox" name="cdclst" id="cdclst"  value="cdclst">
                                                <?php// foreach ($joblevel as $joblevel): ?>
                                               <span  class="form-control form-control-sm cdqadisable tooltips">
                                               <?php if($ldmster['cdclst'] != "" && $ldmster['cdclst'] == '1' ){ echo "Yes"; } else { echo "NO" ; } ?>
                                               <span class="tooltiptext">CDC Lead Score</span>
                                                </span>
                                                <?php// endforeach; ?>  
                                            </label>
                                        </div>
                                  </div>
                              
                            </div>
                           
                       </div>

                      <hr>

                        <div class="form-group row">

                        <div class="col-sm-2">
                                <select class="form-control form-control-sm"  name="clscored" id="clscored">
                                    <option value="">Lead Score</option>
                                    <option value="1"<?php if(isset($ldmster) && $ldmster['clscored'] == '1'){ echo "selected" ; } ?>>Yes</option>
                                    <option value="0"<?php if(isset($ldmster) && $ldmster['clscored'] == '0'){ echo "selected" ; } ?>>No</option>
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <select class="form-control form-control-sm"  name="callrec" id="callrec">
                                    <option value="">Call recording</option>
                                    <option value="1"<?php if(isset($ldmster) && $ldmster['callrec'] == '2'){ echo "selected" ; } ?>>Yes</option>
                                    <option value="0"<?php if(isset($ldmster) && $ldmster['callrec'] == '0'){ echo "selected" ; } ?>>No</option>
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <select class="form-control form-control-sm"  name="lstat" id="lstat">
                                    <option value="">Call Status</option>
                                    <option value="on-hold" <?php if(isset($ldmster['lstat']) && ($ldmster['lstat'] =='on-hold') ){ echo "Selected"; } ?> >on-hold</option>
                                            <option value="voicemail" <?php if(isset($ldmster['lstat']) && ($ldmster['lstat'] =='voicemail') ){ echo "Selected"; } ?> >voicemail</option>
                                            <option value="call-back" <?php if(isset($ldmster['lstat']) && ($ldmster['lstat'] =='call-back') ){ echo "Selected" ;} ?> >call-back</option>
                                  </select>
                            </div>
                            <div class="col-sm-2">
                                <select class="form-control form-control-sm"  name="lsfinal" id="lsfinal">
                                    <option value="">Call Disposition</option>
                                            <option value="0" <?php if(isset($ldmster['lsfinal']) && ($ldmster['lsfinal'] =='0') ){ echo "Selected"; } ?> >Open</option>
                                            <option value="1" <?php if(isset($ldmster['lsfinal']) && ($ldmster['lsfinal'] =='1') ){ echo "Selected" ;} ?> >Closed</option>
                                  </select>
                            </div>
                            
                        </div>



                        <hr>
                          <div class="form-group row optindiv">
                                       
                                       <div class="col-sm-2">
                                        Opt - in  <input type="checkbox" <?php if($ldmster['optin'] == '1'){ echo "checked" ; } ?> value="<?php if($ldmster['optin'] == '1'){ echo "1" ; } ?>"   id="optin" name="optin" class="js-single optin  <?php if($ldmster['optin'] == '1'){ echo "checkvalue" ; } ?>"  />
                                        </div>
                                        <div class="col-sm-2 optoption">
                                        Opt - in Post  <input type="checkbox" <?php if($ldmster['optpst'] == '1'){ echo "checked" ; } ?>  value="<?php if($ldmster['optpst'] == '1'){ echo "1" ; } ?>" id="optpst" name="optpst" class="js-single  <?php if($ldmster['optpst'] == '1'){ echo "checkvalue" ; } ?>"  />
                                        </div>
                                       
                                        <div class="col-sm-2 optoption">
                                        Opt - in Phone <input type="checkbox" <?php if($ldmster['optph'] == '1'){ echo "checked" ; } ?> value="<?php if($ldmster['optph'] == '1'){ echo "1" ; } ?>"  id="optph" name="optph" class="js-single <?php if($ldmster['optph'] == '1'){ echo "checkvalue" ; } ?>"  />
                                        </div>
                                        
                                        <div class="col-sm-2 optoption">
                                        Opt - in Email <input type="checkbox" <?php if($ldmster['opteml'] == '1'){ echo "checked" ; } ?> value="<?php if($ldmster['opteml'] == '1'){ echo "1" ; } ?>" id="opteml" name="opteml" class="js-single  <?php if($ldmster['opteml'] == '1'){ echo "checkvalue" ; } ?>"  />
                                        </div>
                                        <div class="col-sm-2">
                                        DND <input type="checkbox" <?php if($ldmster['dnd'] == '1'){ echo "checked" ; } ?> value="<?php if($ldmster['dnd'] == '1'){ echo "1" ; } ?>" id="dnd" name="dnd" class="js-single dnd <?php if($ldmster['dnd'] == '1'){ echo "checkvalue" ; } ?>"  />
                                        </div>
                         </div>
                       

                        <div class="form-group row questionrow">  
                         
                          
                        </div> 
                        <br>

                        <div class="form-group row" >
                             <div class="col-sm-12 commentvisible">
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
                        <input type = hidden name="campaign_id" id="campaign_id" value="<?php echo $campaign['cnid']; ?>">
                        <input type = hidden name="campaign_idcids" id="campaign_idcids" value="<?php echo $campaign['cids']; ?>">
                        
                       
                        <?php //if(isset($ldmster) && $ldmster['cdcrjt'] <= 2){ 
                          
                          ?> 
                        <?php if( $ldmster['cdcrjt'] <= 3 AND  $ldmster['cdcsb'] <= 3){ ?> 
                        
                          <input type = "hidden" name="lmid" id="lmid" value="<?php echo $ldmster['lmid']; ?>">
                          <input type = "hidden" name="evload" id="evload" value="<?php echo $ldmster['evload']; ?>">
                          <input type = "hidden" name="emp_id" id="emp_id" value="<?php echo  $_SESSION['empcode']; ?>">
                          <input type = "hidden" name="qasv" id="qasv" value="<?php echo $ldmster['qasv']; ?>">
                          <input type = "hidden" name="cdcrjt" id="cdcrjt" value="<?php echo $ldmster['cdcrjt']; ?>">
                          <input type = "hidden" name="cdcsb" id="cdcsb" value="<?php echo $ldmster['cdcsb']; ?>">
                         
                          <input type = "hidden" name="rlc" id="rlc" value="<?php echo $ldmster['rlc']; ?>">
                          
                          <input type = "hidden" name="lsagti" id="lsagti" value="<?php echo $ldmster['lsagti']; ?>">
                          <input type = "hidden" name="qaacptagtii" id="qaacptagtii" value="<?php echo $ldmster['qaacptagtii']; ?>">
                          <input type = "hidden" name="lsdti" id="lsdti" value="<?php echo $ldmster['lsdti']; ?>">
                          <input type = "hidden" name="qaacptdtii" id="qaacptdtii" value="<?php echo $ldmster['qaacptdtii']; ?>">

                          <input type = "hidden" name="qarjtagti" id="qarjtagti" value="<?php echo $ldmster['qarjtagti']; ?>">
                          <input type = "hidden" name="qarjtagtii" id="qarjtagtii" value="<?php echo $ldmster['qarjtagtii']; ?>">
                          <input type = "hidden" name="qarjtdti" id="qarjtdti" value="<?php echo $ldmster['qarjtdti']; ?>">
                          <input type = "hidden" name="qarjtdtii" id="qarjtdtii" value="<?php echo $ldmster['qarjtdtii']; ?>">
                          <div class="form-group row col-sm-12" >
                            <div class="col-sm-4">
                            
                          
                              </div>
                              <div class="col-sm-2">
                                <button type="submit" name="leadupdatelead" class="btn btn-primary leaddisplay" style=""  id="leadupdatelead">Submit</button> 
                             
                             </div>
                              <div class="col-sm-3">
                             
                             </div>
                        <?php } else{ ?>
                         
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
    
    
      if(m > parseInt(urevrangenumber1) || m < parseInt(lrevrangenumber1)){
        alert("not in range");
        $('#arevenue').val("");
      }else{
     
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
      // alert(m+" "+lrevrangenumber1+" "+urevrangenumber1);
    
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
 
  $(window).keydown(function(event){
    if(event.keyCode == 13) {
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
             
                    if(response.statusCode == "Success") 
                    {         
                 
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
 
  
  $('#optin').change(function()
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

/* update lead submit*/
    $(function() {
        $("#leadupdatelead").on('click', function() 
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
             
        

            var clscored = $('#clscored').val();
            var callrec = $('#callrec').val();

            var lstat = $('#lstat').val();
            var lsfinal = $('#lsfinal').val();
           


            var qarjtdti = $('#qarjtdti').val();
            var qarjtagti = $('#qarjtagti').val();

            var qarjtdtii = $('#qarjtdtii').val();
            var qarjtagtii = $('#qarjtagtii').val();

            var lsdti = $('#lsdti').val();
            var lsagti = $('#lsagti').val();

            var qaacptdtii = $('#qaacptdtii').val();
            var qaacptagtii = $('#qaacptagtii').val();

           
            var campaign_id = $('#campaign_id').val();
            var campaign_idcids = $('#campaign_idcids').val();
         
            var evload = $('#evload').val();

           
            var lmid = $('#lmid').val();

            var pcomt = $('#pcomt').val();
    
       
            var url = encodeURI("<?php echo base_url("cdc/ajax_update_leadgeneration");?>");
          
            console.log(url+"?campaign_id="+campaign_id+"&lmid="+lmid+"&campaign_idcids="+campaign_idcids+"&pcomt="+pcomt);
           
            $.ajax({
               url :'<?php echo base_url("cdc/ajax_update_leadgeneration");?>',
                type: 'GET', 
                // contentType: "application/json",
                dataType: 'json',              
                data: {
                   
                  campaign_id: campaign_id,
                  campaign_idcids: campaign_idcids,
                  lmid: lmid,
                 
                  pcomt :pcomt,
                
                  clscored:clscored,
                  callrec:callrec,

                  lstat:lstat,
                  lsfinal:lsfinal,

                  lsdti:lsdti,
                  lsagti:lsagti,
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
                         
                        $("#leadupdatelead").html(response.message);
                        top.location.href=base_url+"cdc/leadgenerationinterface?camp_id="+<?php echo $campaign['cnid']; ?>;//redirection
                      
                    }else if(response.statusCode=="Fail")
                    {
                        $("#leadupdatelead").html(response.message);
                        
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
        $("#leadsaveqa").on('click', function() 
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
              $("#optin").prop('checked', false);
              $("#optpst").prop('checked', false);
              $("#optph").prop('checked', false);
              $("#opteml").prop('checked', false);
              $("#dnd").prop('checked', false);
                this.checked ? checked.push(this.id) : notChecked.push(this.id);
            });

            var campaign_id = $('#campaign_id').val();
            var campaign_idcids = $('#campaign_idcids').val();
            var qasv = '0';

            var lmid = $('#lmid').val();

            var pcomt = $('#pcomt').val();
          
            var url = encodeURI("<?php echo base_url("cdc/ajax_save_leadqa");?>");
          
            console.log(url+"?campaign_id="+campaign_id+"&lmid="+lmid+"&campaign_idcids="+campaign_idcids+"&checked="+checked+"&qasv="+qasv+"&pcomt="+pcomt);
           
            $.ajax({
               url :'<?php echo base_url("cdc/ajax_save_leadqa");?>',
                type: 'POST', 
                // contentType: "application/json",
                dataType: 'json',              
                data: {
                   
                  campaign_id: campaign_id,
                  campaign_idcids: campaign_idcids,
                  lmid: lmid,
                  qasv :qasv,
                  pcomt :pcomt,
                  checked:checked,  
                   
				},
        async: true,
                cache: false,
                success: function(response){
                    $("#leadupdateqa").hide();
                    var text = response.statusCode;
                    console.log("check");
                    if(response.statusCode == "Success") 
                    {         
                         
                        $("#leadsaveqa").html(response.message);
                     
                        top.location.href=base_url+"cdc/leadgenerationinterface?camp_id="+<?php echo $campaign['cnid']; ?>;//redirection
                      
                     
                      
                    }else if(response.data=="Fail")
                    {
                        $("#leadupdateqa").html(response.message);
                        
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