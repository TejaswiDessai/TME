

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
    .asendtonone {
   
    display: none;
   
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
/* input[type=checkbox][disabled] { */
.checkvalue{
  outline: 1px solid #FF5722;
}

 </style>


<?php foreach ($leadmaster as $ldmster):  
    endforeach;   ?>
 
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
  
  $("#rsendto").hide();  
 
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
                                    '<input type="text" value="<?php  echo $ldmster['aa1']; ?>"  name="aa' + index + '" id="aa' + index + '" disabled="disabled" placeholder="Answer for question ' + index + '"  class="form-control form-control-sm ">'+
                                                                     
                          '</div>');
        }else  if(index == '2'){
          $('.questionrow').append('<div class="col-sm-6 card">'+
                                   '<p id='+ index +'><b>'+data['questions']+'</b></p>'+
                                    '<input type="text" value="<?php  echo $ldmster['aa2']; ?>"  name="aa' + index + '" id="aa' + index + '" disabled="disabled" placeholder="Answer for question ' + index + '"  class="form-control form-control-sm ">'+
                                                                     
                          '</div>');
        }else  if(index == '3'){
          $('.questionrow').append('<div class="col-sm-6 card">'+
                                   '<p id='+ index +'><b>'+data['questions']+'</b></p>'+                                
                                    '<input type="text" value="<?php  echo $ldmster['aa3']; ?>"  name="aa' + index + '" id="aa' + index + '" disabled="disabled" placeholder="Answer for question ' + index + '"  class="form-control form-control-sm ">'+
                                                                     
                          '</div>');
        }else  if(index == '4'){
          $('.questionrow').append('<div class="col-sm-6 card">'+
                                   '<p id='+ index +'><b>'+data['questions']+'</b></p>'+                                 
                                    '<input type="text" value="<?php  echo $ldmster['aa4']; ?>"  name="aa' + index + '" id="aa' + index + '" disabled="disabled" placeholder="Answer for question ' + index + '"  class="form-control form-control-sm ">'+
                                                                     
                          '</div>');
        }else  if(index == '5'){
          $('.questionrow').append('<div class="col-sm-6 card">'+
                                   '<p id='+ index +'><b>'+data['questions']+'</b></p>'+                                   
                                    '<input type="text" value="<?php  echo $ldmster['aa5']; ?>"  name="aa' + index + '" id="aa' + index + '" disabled="disabled" placeholder="Answer for question ' + index + '"  class="form-control form-control-sm ">'+
                                                                     
                          '</div>');
        }else  if(index == '6'){
          $('.questionrow').append('<div class="col-sm-6 card">'+
                                   '<p id='+ index +'><b>'+data['questions']+'</b></p>'+                                  
                                    '<input type="text" value="<?php  echo $ldmster['aa6']; ?>"  name="aa' + index + '" id="aa' + index + '" disabled="disabled" placeholder="Answer for question ' + index + '"  class="form-control form-control-sm ">'+
                                                                     
                          '</div>');
        }else  if(index == '7'){
          $('.questionrow').append('<div class="col-sm-6 card">'+
                                   '<p id='+ index +'><b>'+data['questions']+'</b></p>'+                                
                                    '<input type="text" value="<?php  echo $ldmster['aa7']; ?>"  name="aa' + index + '" id="aa' + index + '" disabled="disabled" placeholder="Answer for question ' + index + '"  class="form-control form-control-sm ">'+
                                                                     
                          '</div>');
        }else  if(index == '8'){
          $('.questionrow').append('<div class="col-sm-6 card">'+
                                   '<p id='+ index +'><b>'+data['questions']+'</b></p>'+                                
                                    '<input type="text" value="<?php  echo $ldmster['aa8']; ?>"  name="aa' + index + '" id="aa' + index + '" disabled="disabled" placeholder="Answer for question ' + index + '"  class="form-control form-control-sm ">'+
                                                                     
                          '</div>');
        }else  if(index == '9'){
          $('.questionrow').append('<div class="col-sm-6 card">'+
                                   '<p id='+ index +'><b>'+data['questions']+'</b></p>'+                                 
                                    '<input type="text" value="<?php  echo $ldmster['aa9']; ?>"  name="aa' + index + '" id="aa' + index + '" disabled="disabled" placeholder="Answer for question ' + index + '"  class="form-control form-control-sm ">'+
                                                                     
                          '</div>');
        }else  if(index == '10'){
          $('.questionrow').append('<div class="col-sm-6 card">'+
                                   '<p id='+ index +'><b>'+data['questions']+'</b></p>'+                                
                                    '<input type="text" value="<?php  echo $ldmster['aa10']; ?>"  name="aa' + index + '" id="aa' + index + '" disabled="disabled" placeholder="Answer for question ' + index + '"  class="form-control form-control-sm ">'+
                                                                     
                          '</div>');
        }else  if(index == '11'){
          $('.questionrow').append('<div class="col-sm-6 card">'+
                                   '<p id='+ index +'><b>'+data['questions']+'</b></p>'+
                                    '<input type="text" value="<?php  echo $ldmster['aa11']; ?>"  name="aa' + index + '" id="aa' + index + '" disabled="disabled" placeholder="Answer for question ' + index + '"  class="form-control form-control-sm ">'+
                                                                     
                          '</div>');
        }else  if(index == '12'){
          $('.questionrow').append('<div class="col-sm-6 card">'+
                                   '<p id='+ index +'><b>'+data['questions']+'</b></p>'+
                                    '<input type="text" value="<?php  echo $ldmster['aa12']; ?>"  name="aa' + index + '" id="aa' + index + '" disabled="disabled" placeholder="Answer for question ' + index + '"  class="form-control form-control-sm ">'+
                                                                     
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
        <h4>Quality Assurance</h4> 
        <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="#">
                                <i class="icofont icofont-home"></i>
                            </a>
                            <?php foreach ($campaigns as $campaign): ?>
                        <li class="breadcrumb-item"><a href="qalistings?camp_id=<?php echo $campaign['cnid']; ?>">Quality Analysis Listings</a>
                        <?php endforeach; ?>
                        </li>
                    </ul>
                </div> 
      
            <div class="form-group row"> 
               <div class="col-sm-2" style="margin-left: 200px;">

                  </div> 
                <div class="col-sm-4" style="margin-top: -20px;">
                  <?php foreach ($campaigns as $campaign): ?>
                  <label class="col-lable"><b>Campaign Name: <?php echo $campaign['campnm']; ?></b></label>
                  <?php endforeach; ?>
                </div> 
                <div class="col-sm-3" style="">
                  <?php //foreach ($campaigns as $campaign): ?>
                  <label class="col-lable"><b>CDC Date: <?php if (empty($ldmster['cdcsbdtii'])) {
                    echo $ldmster['cdcsbdti'];}else{
                      echo $ldmster['cdcsbdtii'];
                    } ?></b></label>
                  <label class="col-lable"><b>Lead Date: <?php  echo $ldmster['lsdti']; ?></b></label>
                  <label class="col-lable"><b>QA Pending for this campaign: <?php  echo $leadmastercounts; ?></b></label>
                  <?php //endforeach; ?>
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
                                               <span  class="form-control form-control-sm cdqadisable tooltips"><?php if($ldmster['atitle'] != "" && $ldmster['atitle'] != '0'  ){ echo $assetitledv['title']; } else { echo "Asset title is Empty" ; } ?>
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
                                                <input type="checkbox" name="ddispositionclass" id="ddispositionclass"  value="ddispositionclass">
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
                                               <span class="tooltiptext">CDC Lead Score Tag</span>
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
                                                <input type="checkbox" name="callrec" id="callrec"  value="callrec">
                                                <?php// foreach ($joblevel as $joblevel): ?>
                                               <span  class="form-control form-control-sm cdqadisable tooltips">
                                               <?php if($ldmster['callrec'] != "" && $ldmster['callrec'] == '1' ){ echo "Yes"; } else { echo "NO" ; } ?>
                                               <span class="tooltiptext">Call Recording</span>
                                                </span>
                                                <?php// endforeach; ?>  
                                            </label>
                                        </div>
                                  </div>
                              
                            </div>
                            
                          
                       </div>
                        <hr>
                          <div class="form-group row optindiv">
                                       
                                       <div class="col-sm-2">
                                        Opt - in  <input type="checkbox" <?php if($ldmster['optin'] == '1'){ echo "checked" ; } ?> value=""  id="optin" name="optin" class="js-single optin  <?php if($ldmster['optin'] == '1'){ echo "checkvalue" ; } ?>"  />
                                        </div>
                                        <div class="col-sm-2 optoption">
                                        Opt - in Post  <input type="checkbox" <?php if($ldmster['optpst'] == '1'){ echo "checked" ; } ?>  value="" id="optpst" name="optpst" class="js-single  <?php if($ldmster['optpst'] == '1'){ echo "checkvalue" ; } ?>"  />
                                        </div>
                                       
                                        <div class="col-sm-2 optoption">
                                        Opt - in Phone <input type="checkbox" <?php if($ldmster['optph'] == '1'){ echo "checked" ; } ?> value=""  id="optph" name="optph" class="js-single <?php if($ldmster['optph'] == '1'){ echo "checkvalue" ; } ?>"  />
                                        </div>
                                        
                                        <div class="col-sm-2 optoption">
                                        Opt - in Email <input type="checkbox" <?php if($ldmster['opteml'] == '1'){ echo "checked" ; } ?> value="" id="opteml" name="opteml" class="js-single  <?php if($ldmster['opteml'] == '1'){ echo "checkvalue" ; } ?>"  />
                                        </div>
                                        <div class="col-sm-2 optoption">
                                        DND <input type="checkbox" <?php if($ldmster['dnd'] == '1'){ echo "checked" ; } ?> value="" id="dnd" name="dnd" class="js-single dnd <?php if($ldmster['dnd'] == '1'){ echo "checkvalue" ; } ?>"  />
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
                          
                          <input type = "hidden" name="qaacptagti" id="qaacptagti" value="<?php echo $ldmster['qaacptagti']; ?>">
                          <input type = "hidden" name="qaacptagtii" id="qaacptagtii" value="<?php echo $ldmster['qaacptagtii']; ?>">
                          <input type = "hidden" name="qaacptdti" id="qaacptdti" value="<?php echo $ldmster['qaacptdti']; ?>">
                          <input type = "hidden" name="qaacptdtii" id="qaacptdtii" value="<?php echo $ldmster['qaacptdtii']; ?>">

                          <input type = "hidden" name="qarjtagti" id="qarjtagti" value="<?php echo $ldmster['qarjtagti']; ?>">
                          <input type = "hidden" name="qarjtagtii" id="qarjtagtii" value="<?php echo $ldmster['qarjtagtii']; ?>">
                          <input type = "hidden" name="qarjtdti" id="qarjtdti" value="<?php echo $ldmster['qarjtdti']; ?>">
                          <input type = "hidden" name="qarjtdtii" id="qarjtdtii" value="<?php echo $ldmster['qarjtdtii']; ?>">
                          <div class="form-group row col-sm-12" >
                            <div class="col-sm-4">
                            
                             <!-- <center> -->
                               <select class="form-control form-control-sm"  name="asendto" id="asendto" style="height: 40px;" required>
                                   
                                    <option value="2">Accept-Qualify</option>
                                    <option value="1" class="<?php if(($ldmster['dnd'] == '1') || ($ldmster['cvr'] == '0') || ($ldmster['cdclst'] == '1') || ($ldmster['lsfinal'] == '1') ){ echo 'asendtonone';} ?>">Accept-Send to Lead</option>
                                    <option value="3">Accept-Disqualify</option>
                                </select>
                               <select class="form-control form-control-sm"  name="rsendto" id="rsendto" style="height: 40px;" required>
                                    <option value="1">Reject-Send to CDC</option>
                                    <option value="2">Reject-Send to DC</option>
                                    <option value="3">Reject-Disqualify</option>
                                </select>
                              </div>
                              <div class="col-sm-2">
                                <button type="submit" name="leadupdateqa" class="btn btn-primary leaddisplay" style=""  id="leadupdateqa">Accept & Submit</button> 
                        
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

if(emp_id === undefined){
            window.location = base_url+"administrator/logout";
            exit;
  }
if(emp_id == ''){
  window.location = base_url+"administrator/logout";
  exit;
}

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


   $("#rsendto").val("");  
  $('.leaddisplay').show(); //buttons
 
  $('.optin').prop('disabled', true);
  $('#optpst').prop('disabled', true);
  $('#optph').prop('disabled', true);
  $('#dnd').prop('disabled', true);
  $('#opteml').prop('disabled', true);
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
      rsendto : {
        required: true
      },
      asendto : {
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
            
            $("#leadupdateqa").html("Accept & Submit");
            $("#asendto").show();  
            $("#rsendto").hide();  
            $("#rsendto").val("");  

          }else if(checked == "optin"){ // if unchecked any field
            checked = [0];
            
            $("#leadupdateqa").html("Accept & Submit");
            $("#asendto").show();  
            $("#rsendto").hide(); 
            $("#rsendto").val("");   
            
          }else if(checked == "optin,optpst,optph,opteml"){ // if unchecked any field
            checked = [0];
            
            $("#leadupdateqa").html("Accept & Submit");
            $("#asendto").show();  
            $("#rsendto").hide();
            $("#rsendto").val("");   
          }else if(checked == "optpst,optph,opteml"){ // if unchecked any field
            checked = [0];
            
            $("#leadupdateqa").html("Accept & Submit");
            $("#asendto").show();  
            $("#rsendto").hide(); 
            $("#rsendto").val("");  
          }else if(checked == "optin,optpst,optph,opteml,dnd"){ // if unchecked any field
            checked = [0];
            
            $("#leadupdateqa").html("Accept & Submit");
            $("#asendto").show();  
            $("#rsendto").hide(); 
            $("#rsendto").val("");  
          } else if(checked == "dnd"){ // if unchecked any field
            checked = [0];
            
            $("#leadupdateqa").html("Accept & Submit");
            $("#asendto").show();  
            $("#rsendto").hide(); 
            $("#rsendto").val("");  
          }else{
            $("#leadupdateqa").html("Reject & Submit");
            $("#asendto").hide();  
            $("#rsendto").show(); 
            $("#asendto").val("");  
          }
          
});
/* update lead submit*/
    $(function() {
        $("#leadupdateqa").on('click', function() 
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
            
             if(checked == ""){ // if unchecked any field
                checked = [0];
                var cdcsb1 = $('#cdcsb').val();
                
                if(cdcsb1 == ""){
                  var cdcsb = 0;
                }else{
                  var cdcsb = parseInt(cdcsb1)+1; // incremataion for dv  Accept
                }
    
                if(cdcsb == '4'){
                  var cdcsb = '4';
                  var qasv = $('#qasv').val();
                }else{
                  var qasv = $('#qasv').val();
                }
                var cdcrjt = $('#cdcrjt').val(); 
                
          }else{ //checked -rejected
            var cdcsb =$('#cdcsb').val();

            var cdcrjt1 = $('#cdcrjt').val();
          
            if(cdcrjt1 == ""){
              var cdcrjt = 1;
            }else{
              var cdcrjt = parseInt(cdcrjt1)+1; // incremataion for dv  rejection
            
            }
 
            if(cdcrjt == '4'){
              var cdcrjt = '4';
              var qasv = '0';
            }else{
              var qasv = $('#qasv').val();
            }

          }
            var qarjtdti = $('#qarjtdti').val();
            var qarjtagti = $('#qarjtagti').val();

            var qarjtdtii = $('#qarjtdtii').val();
            var qarjtagtii = $('#qarjtagtii').val();

            var qaacptdti = $('#qaacptdti').val();
            var qaacptagti = $('#qaacptagti').val();

            var qaacptdtii = $('#qaacptdtii').val();
            var qaacptagtii = $('#qaacptagtii').val();

           
            var campaign_id = $('#campaign_id').val();
            var campaign_idcids = $('#campaign_idcids').val();
         
            var evload = $('#evload').val();
            var lmid = $('#lmid').val();

            var pcomt = $('#pcomt').val();
            var asendto = $('#asendto').val();
            var rsendto = $('#rsendto').val();
        

//acc-send to lead
if((asendto != "")  &&  (rsendto != ""))
{
  
 if(asendto == 1)
          { 
            var url = encodeURI("<?php echo base_url("cdc/ajax_update_qatoacc_lead");?>");
          
            console.log(url+"?campaign_id="+campaign_id+"&lmid="+lmid+"&campaign_idcids="+campaign_idcids+"&checked="+checked+"&qasv="+qasv+"&pcomt="+pcomt);
           
            $.ajax({
               url :'<?php echo base_url("cdc/ajax_update_qatoacc_lead");?>',
                type: 'POST',           
                dataType: 'json',              
                data: {
                   
                  campaign_id: campaign_id,
                  campaign_idcids: campaign_idcids,
                  lmid: lmid,
                 
                  pcomt :pcomt,
                  checked:checked,

                  qaacptdti:qaacptdti,
                  qaacptagti:qaacptagti,

                  qaacptagtii:qaacptagtii,
                  qaacptdtii:qaacptdtii,

                    
				},
        async: true,
                cache: false,
                success: function(response){
                    $("#leadsaveqa").hide();
                    var text = response.statusCode;
                    console.log("check");
                    if(response.statusCode == "Success") 
                    {         
                         
                        $("#leadupdateqa").html(response.message);
                    
                        top.location.href=base_url+"cdc/qualityform?camp_id="+<?php echo $campaign['cnid']; ?>;//redirection
                      
                    }else if(response.data=="Fail")
                    {
                        $("#leadupdateqa").html(response.message);
                        
					          }

                   

                },
                error: function (error) {
                  alert("Error");
                  }
              
            });
          } //end acc-send to lead
//acc-qualify
else if(asendto == 2)
          {
          //  alert(checked); 
            var url = encodeURI("<?php echo base_url("cdc/ajax_update_qatoacc_q");?>");
          
            console.log(url+"?campaign_id="+campaign_id+"&lmid="+lmid+"&campaign_idcids="+campaign_idcids+"&checked="+checked+"&qasv="+qasv+"&pcomt="+pcomt);
           
            $.ajax({
               url :'<?php echo base_url("cdc/ajax_update_qatoacc_q");?>',
                type: 'POST', 
                // contentType: "application/json",
                dataType: 'json',              
                data: {
                   
                  campaign_id: campaign_id,
                  campaign_idcids: campaign_idcids,
                  lmid: lmid,
                 
                  pcomt :pcomt,
                  checked:checked,

                  qaacptdti:qaacptdti,
                  qaacptagti:qaacptagti,

                  qaacptagtii:qaacptagtii,
                  qaacptdtii:qaacptdtii,

                    
				},
        async: true,
                cache: false,
                success: function(response){
                    $("#leadsaveqa").hide();
                    var text = response.statusCode;
                    console.log("check");
                    if(response.statusCode == "Success") 
                    {         
                         
                        $("#leadupdateqa").html(response.message);
                     
                        top.location.href=base_url+"cdc/qualityform?camp_id="+<?php echo $campaign['cnid']; ?>;//redirection
                      
                    }else if(response.data=="Fail")
                    {
                        $("#leadupdateqa").html(response.message);
                        
					          }

                   

                },
                error: function (error) {
                  alert("Error");
                  }
              
            });
          } //end acc-qualify





           //acc-disqualify
else if(asendto == 3)
          {
           
            var url = encodeURI("<?php echo base_url("cdc/ajax_update_qatoacc_disq");?>");
          
            console.log(url+"?campaign_id="+campaign_id+"&lmid="+lmid+"&campaign_idcids="+campaign_idcids+"&checked="+checked+"&qasv="+qasv+"&pcomt="+pcomt);
           
            $.ajax({
               url :'<?php echo base_url("cdc/ajax_update_qatoacc_disq");?>',
                type: 'POST', 
                // contentType: "application/json",
                dataType: 'json',              
                data: {
                   
                  campaign_id: campaign_id,
                  campaign_idcids: campaign_idcids,
                  lmid: lmid,
                 
                  pcomt :pcomt,
                  checked:checked,

                  qaacptdti:qaacptdti,
                  qaacptagti:qaacptagti,

                  qaacptagtii:qaacptagtii,
                  qaacptdtii:qaacptdtii,

                    
				},
        async: true,
                cache: false,
                success: function(response){
                    $("#leadsaveqa").hide();
                    var text = response.statusCode;
                    console.log("check");
                    if(response.statusCode == "Success") 
                    {         
                         
                        $("#leadupdateqa").html(response.message);
                        top.location.href=base_url+"cdc/qualityform?camp_id="+<?php echo $campaign['cnid']; ?>;//redirection
                      
                    }else if(response.data=="Fail")
                    {
                        $("#leadupdateqa").html(response.message);
                        
					          }

                   

                },
                error: function (error) {
                  alert("Error");
                  }
              
            });
          } //end acc-disqualify
          
          
          else if(rsendto == 2)
          {
            var url = encodeURI("<?php echo base_url("cdc/ajax_update_qatodc");?>");
          
            console.log(url+"?campaign_id="+campaign_id+"&lmid="+lmid+"&campaign_idcids="+campaign_idcids+"&checked="+checked+"&qasv="+qasv+"&pcomt="+pcomt);
           
            $.ajax({
               url :'<?php echo base_url("cdc/ajax_update_qatodc");?>',
                type: 'POST', 
                // contentType: "application/json",
                dataType: 'json',              
                data: {
                   
                  campaign_id: campaign_id,
                  campaign_idcids: campaign_idcids,
                  lmid: lmid,
                 
                  pcomt :pcomt,
                  checked:checked,

                  qarjtdti:qarjtdti,
                  qarjtagti:qarjtagti,

                  qarjtagtii:qarjtagtii,
                  qarjtdtii:qarjtdtii,

                    
				},
        async: true,
                cache: false,
                success: function(response){
                    $("#leadsaveqa").hide();
                    var text = response.statusCode;
                    console.log("check");
                    if(response.statusCode == "Success") 
                    {         
                         
                        $("#leadupdateqa").html(response.message);
                        top.location.href=base_url+"cdc/qualityform?camp_id="+<?php echo $campaign['cnid']; ?>;//redirection
                      
                    }else if(response.data=="Fail")
                    {
                        $("#leadupdateqa").html(response.message);
                        
					          }

                   

                },
                error: function (error) {
                  alert("Error");
                  }
              
            });
          }

//start cdc
         else if(rsendto == 1)
          {

            var url = encodeURI("<?php echo base_url("cdc/ajax_update_qatoCDC");?>");
          
            console.log(url+"?campaign_id="+campaign_id+"&lmid="+lmid+"&campaign_idcids="+campaign_idcids+"&checked="+checked+"&qasv="+qasv+"&pcomt="+pcomt);
           
            $.ajax({
               url :'<?php echo base_url("cdc/ajax_update_qatoCDC");?>',
                type: 'POST', 
                // contentType: "application/json",
                dataType: 'json',              
                data: {
                   
                  campaign_id: campaign_id,
                  campaign_idcids: campaign_idcids,
                  lmid: lmid,
                 
                  pcomt :pcomt,
                  checked:checked,

                  qarjtdti:qarjtdti,
                  qarjtagti:qarjtagti,

                  qarjtagtii:qarjtagtii,
                  qarjtdtii:qarjtdtii,

                    
				},
        async: true,
                cache: false,
                success: function(response){
                    $("#leadsaveqa").hide();
                    var text = response.statusCode;
                    console.log("check");
                    if(response.statusCode == "Success") 
                    {         
                         
                        $("#leadupdateqa").html(response.message);
                    
                        top.location.href=base_url+"cdc/qualityform?camp_id="+<?php echo $campaign['cnid']; ?>;//redirection
                      
                    }else if(response.data=="Fail")
                    {
                        $("#leadupdateqa").html(response.message);
                        
					          }

                   

                },
                error: function (error) {
                  alert("Error");
                  }
              
            });
          } //end cdc

//rej-disqualify
else if(rsendto == 3)
          {

            var url = encodeURI("<?php echo base_url("cdc/ajax_update_qatorej_disq");?>");
          
            console.log(url+"?campaign_id="+campaign_id+"&lmid="+lmid+"&campaign_idcids="+campaign_idcids+"&checked="+checked+"&qasv="+qasv+"&pcomt="+pcomt);
           
            $.ajax({
               url :'<?php echo base_url("cdc/ajax_update_qatorej_disq");?>',
                type: 'POST', 
                // contentType: "application/json",
                dataType: 'json',              
                data: {
                   
                  campaign_id: campaign_id,
                  campaign_idcids: campaign_idcids,
                  lmid: lmid,
                 
                  pcomt :pcomt,
                  checked:checked,

                  qarjtdti:qarjtdti,
                  qarjtagti:qarjtagti,

                  qarjtagtii:qarjtagtii,
                  qarjtdtii:qarjtdtii,

                    
				},
        async: true,
                cache: false,
                success: function(response){
                    $("#leadsaveqa").hide();
                    var text = response.statusCode;
                    console.log("check");
                    if(response.statusCode == "Success") 
                    {         
                         
                        $("#leadupdateqa").html(response.message);
                     
                        top.location.href=base_url+"cdc/qualityform?camp_id="+<?php echo $campaign['cnid']; ?>;//redirection
                      
                    }else if(response.data=="Fail")
                    {
                        $("#leadupdateqa").html(response.message);
                        
					          }

                   

                },
                error: function (error) {
                  alert("Error");
                  }
              
            });
          } //end rej-disqualify        
          else{
            alert("Please select");
          }
      }else{
        alert("Please select");
      }

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
               
                        top.location.href=base_url+"cdc/qualityform?camp_id="+<?php echo $campaign['cnid']; ?>;//redirection
                      
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