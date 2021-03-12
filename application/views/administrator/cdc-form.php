

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
    
/*     
      .form-control option:hover {
          background: pink;
            
     box-shadow: 0 0 10px 10px #e1358f inset;
        }
        select:focus{
    border-color: gray;
    outline:none;
} */
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


<?php foreach ($leadmaster as $ldmster):  
      // print_r($ldmster['dvrejectreason']);
      // $dvrejectreason = explode(',',$ldmster['dvrejectreason']);
      // print_r($ldmster);
     
    endforeach;
      //  print_r($campaign['tid']);
       
       ?>
 
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
  // $(".ansdiv").hide();   // ans div hide
  $('.cdqadisplay').hide();
  // $('.commentvisible').hide();
  // $('.optindiv').hide();

  $("#gotoupdate").on('click', function() 
        {
          window.location = base_url+"cdc/cdcform?rec_type_id=2&camp_id=<?php echo $_SESSION['campaign_id']; ?>&lmid=<?php echo $ldmster['lmid']; ?>";
        }
  )
    $('#rec_type_id').bind('change', function() {
     
        var value = $(this).val();
        if (value == 2) { // if cdqa is selected
          // $('.commentvisible').show();
          $('.optindiv').show();
          $('.cdqadisplay').show();
          $('.leaddisplay').hide();
          $(".ansdiv").show(); 
          // window.location = base_url+"cdc/cdcform?rec_type_id=2&camp_id=<?php echo $_SESSION['campaign_id']; ?>&lmid=<?php echo $ldmster['lmid']; ?>";
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


    var campaign_id = $('#campaign_id').val();
    var urlq = '<?php echo base_url("cdc/getquestion");?>';
console.log(urlq+'?campaign_id='+campaign_id);
$.ajax({
      url:'<?php echo base_url("cdc/getquestion");?>',
      method: 'get',
      data: {campaign_id: campaign_id},
      dataType: 'json',
      success: function(response){

      //    Remove options 
    //  $('#country_id').find('option').not(':first').remove();
     

      //    Add options
     $.each(response,function(index,data){
        // $('.questionrow').append('<select><option value="'+data['qid']+'">'+data['questions']+'</option></select');
       
          index++;
          var ans = 'aa'+index;
          // alert (<?php echo "'aa'+index";?>);
          var testa = <?php echo "'aa'+index";?>;
          alert(testa);
        // $('.questionrow').html("");
        $('.questionrow').append('<div class="col-sm-6 card">'+
                                   '<p id='+ index +'><b>'+data['questions']+'</b></p>'+
                                      // '<input type="text" value="<?php //$aaa= 'aa'; if(isset($ldmster)){  echo $ldmster[$aaa]; }?>"  name="aa' + index + '" id="aa' + index + '"  placeholder="Answer for question ' + index + '"  class="form-control form-control-sm ">'+
                                      '<input type="text" value="<?php echo 'aa';?>'+ index +'"  name="aa' + index + '" id="aa' + index + '"  placeholder="Answer for question ' + index + '"  class="form-control form-control-sm ">'+
                                                                     
                          '</div>');

        
      });
      }
  });
//end question

});

</script>
<form id="basic-form" method="POST" enctype="multipart/form-data">
<div class="page-header">
    <div class="page-header-title col-sm-12">
        <h4>Data Verification</h4> 
        
      
            <div class="form-group row"> 
               <div class="col-sm-2" style="margin-left: 200px;margin-top: -25px;">

               <button type="submit" name="gotoupdate" class="btn btn-primary" style="" id="gotoupdate">Go To Update</button>
               
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
                        <!-- <?php 
                        // echo form_open_multipart('campaigns/add_campaign');
                         ?> -->
                        <!-- <?php 
                        // echo form_open_multipart('', array('id' => 'addcampForm')) ?> -->
                        <!-- <form id="basic-form" method="POST" enctype="multipart/form-data"> -->

                       
                      
                        <div class="form-group row">
                           
                            <div class="col-sm-1">
                                 <!-- <select name="sal" id="sal"  class="form-control  form-control-sm cdqadisable">
                                 <option value="Mr">Mr.</option>
                                      <option value="Ms">Ms.</option>
                                      <option value="Mrs">Mrs.</option>
                                      <option value="Dr">Dr.</option>
                                      <option value="Other">Other</option>
                                </select> -->
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
                                <!-- <input type="text"  name="fname" id="fname"  placeholder="First Name"   class="form-control form-control-sm cdqadisable"                             
                                 value ="<?php //if(isset($ldmster)){  echo $ldmster['fname']; }?>" > -->
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
                                <!-- <input type="text"  name="lname" id="lname"  placeholder="Last Name" value ="<?php if(isset($ldmster)){  echo $ldmster['lname']; }?>"   class="form-control form-control-sm cdqadisable">
                                <span style='color:#FF0000' id="lname_msg"></span> -->
                               
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
                                <!-- <input type="text"  name="jtitle" id="jtitle"  placeholder="Job Title" value ="<?php //if(isset($ldmster)){  echo $ldmster['jtitle']; }?>"  class="form-control form-control-sm cdqadisable"> -->
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
                            <!-- <div class="col-sm-2"> -->
                                <!-- <select class="js-example-basic-multiple col-sm-12 cdqadisable" multiple="multiple" name="desid[]" id="desid"> -->
                                <!-- <select class="form-control form-control-sm cdqadisable" name="jlevel" id="jlevel">
                                <option value="">Job Level</option>
                                <?php //foreach ($joblevel as $joblevel): ?>
                                    <option value="<?php// echo $joblevel['joblids']; ?>"  <?php //if(isset($ldmster) && $ldmster['jlevel'] == $joblevel['joblids']){ echo "selected" ; } ?> ><?php// echo $joblevel['joblevel']; ?></option>
                                <?php //endforeach; ?>  
                               
                                </select> -->

                                <!-- <div class="to-do-list">
                                        <div class="checkbox-fade fade-in-primary  col-sm-12">
                                            <label class="check-task">
                                                <input type="checkbox" name="jlevel" id="jlevel"  value="jlevel">
                                                <?php// foreach ($joblevel as $joblevel): ?>
                                               <span  class="form-control form-control-sm cdqadisable">
                                               <?php// if(isset($ldmster)){ echo $ldmster['jlevel']; } else { echo "Job level is Empty" ; } ?>
                                               
                                                </span>
                                                <?php// endforeach; ?>  
                                            </label>
                                        </div>
                                  </div> -->


                            <!-- </div> -->
                            <div class="col-sm-4">
                                <!-- <select class="js-example-basic-multiple col-sm-12 cdqadisable" multiple="multiple" name="desid[]" id="desid"> -->
                                <!-- <select class="js-example-basic-single" name="desid" id="desid">
                                <option value="">Designation</option> -->
                                <?php //foreach ($designation as $designation): ?>
                                    <!-- <option value="<?php// echo $designation['jid']; ?>" <?php //if(isset($ldmster) && $ldmster['jlevel'] == $designation['jid']){ echo "selected" ; } ?>>
                                    <?php //echo $designation['joblist']; ?></option> -->
                                <?php //endforeach; ?>  
                                <!-- </select> -->


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
                                 <!-- <select class="js-example-basic-single" name="dcd" id="dcd">
                                    <option value=""> Department</option>
                                <?php// foreach ($departments as $dept): ?>
                                    <option value="<?php //echo $dept['dcd']; ?>"  
                                    <?php// if(isset($ldmster) && $ldmster['dname'] == $dept['dcd']){ echo "selected" ; } ?> ><?php //echo $dept['department']; ?></option>
                                <?php// endforeach; ?>
                                </select> -->

                                
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
                                <!-- <input type="text"  name="phone" id="phone" value ="<?php //if(isset($ldmster)){  echo $ldmster['phone']; }?>" placeholder="Phone" maxlength="15"  class="form-control form-control-sm cdqadisable"> -->
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
                                <!-- <input type="text"  name="altphn" id="altphn" value ="<?php //if(isset($ldmster)){  echo $ldmster['altphn']; }?>" placeholder="Alternate Phone Number" maxlength="10"  class="form-control form-control-sm cdqadisable"> -->
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
                                <!-- <input type="text"  name="phext" id="phext" value ="<?php //if(isset($ldmster)){  echo $ldmster['phext']; }?>" placeholder="Extension" maxlength="5"  class="form-control form-control-sm cdqadisable"> -->
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
                               <!-- <select name="linetype" id="linetype"  class="form-control  form-control-sm cdqadisable">
                                     <option value="0">Line Type</option>
                                     <option value="0">unknown</option>
                                     <option value="1">Direct</option>
                                     <option value="2">Board</option>  
                               </select> -->
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
                                <!-- <input type="text"  name="company_name" id="company_name"  
                                placeholder="Company Name"  class="form-control form-control-sm cdqadisable"  value ="<?php //if(isset($ldmster)){  echo $ldmster['cname']; }?>"> -->
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
                                <!-- <input type="text"  name="address" id="address"  placeholder="Address"  value ="<?php// if(isset($ldmster)){  echo $ldmster['address']; }?>" class="form-control form-control-sm cdqadisable"> -->
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
                                <!-- <input type="text"  name="city" id="city"  placeholder="City" value ="<?php //if(isset($ldmster)){  echo $ldmster['city']; }?>"   class="form-control form-control-sm cdqadisable"> -->
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
                                <!-- <input type="text"  name="state" id="state"  placeholder="State" value ="<?php if(isset($ldmster)){  echo $ldmster['state']; }?>" class="form-control form-control-sm cdqadisable"> -->
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
                                <!-- <input type="text"  name="zip_code" id="zip_code"  placeholder="Zip Code" value ="<?php //if(isset($ldmster)){  echo $ldmster['zipcode']; }?>" class="form-control form-control-sm cdqadisable"> -->
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

                              <!-- <select class="js-example-basic-single"  name="timezone" id="timezone">
                              <option value="">Timezone</option>
                              <?php //foreach ($timezones as $tz): ?>
                                    <option value="<?php// echo $tz['zoneid']; ?>"  <?php //if(isset($ldmster) && $ldmster['timez'] == $tz['zoneid']){ echo "selected" ; } ?>>
                                    <?php //echo $tz['abbrev']; ?></option>
                                <?php //endforeach; ?> 
                                </select> -->
                                <!-- <span style='color:#FF0000' id="timezone_msg"></span> -->
                            </div>

                            <div class="col-sm-2">
                               <!-- <select name="ctype" id="ctype"  class="form-control  form-control-sm cdqadisable"> 
                                     <option value="0">Company Type</option>
                                     <?php// foreach ($comptype as $comptype): ?>
                                    <option value="<?php //echo $comptype['ctypid']; ?>"><?php //echo $comptype['ctypname']; ?></option>
                                <?php //endforeach; ?> 
                               </select> -->
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


                              <!-- <select class="js-example-basic-single"  name="industrycd" id="industrycd">
                              <option value="">Industry</option>
                              <?php// foreach ($industries as $industry): ?>
                                    <option value="<?php //echo $industry['industrycd']; ?>" <?php //if(isset($ldmster) && $ldmster['indtry'] == $industry['industrycd']){ echo "selected" ; } ?>>
                                    <?php// echo $industry['industry']; ?></option>
                                <?php //endforeach; ?>
                                </select> -->
                                <!-- <span style='color:#FF0000' id="industry_id_msg"></span> -->
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
                                <!-- <select class="js-example-basic-single" name="subindustrycd" id="subindustrycd">
                                <option value="">Sub Industry</option>
                                <?php //foreach ($industriessub as $sub): ?>
                                    <option value="<?php //echo $sub['subindustrycd']; ?>" <?php //if(isset($ldmster) && $ldmster['sindtry'] == $sub['subindustrycd']){ echo "selected" ; } ?>>
                                    <?php //echo $sub['subindustry']; ?></option>
                                <?php //endforeach; ?>
                                </select> -->
                                <!-- <span style='color:#FF0000' id="subindustry_id_msg"></span> -->
                            </div>
                            <div class="col-sm-2">
                                <!-- <select class="form-control form-control-sm cdqadisable" name="sectyp" id="sectyp">
                                  
                                    <option value="0">Sector Type</option>
                                    <option value="0">Unknown</option>
                                    <option value="1">Public</option>
                                    <option value="2">Private</option>
                                    <option value="3">Government</option>
                                    <option value="4">Non -Profit </option>
                               
                                    </select> -->

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
                                <!-- <select class="form-control form-control-sm cdqadisable" name="mlbl" id="mlbl">
                                    <option value="0">K</option>
                                    <option value="1">Hundred Thousand</option> -->
                                    <!-- <option value="1">M</option>
                                    <option value="2">B</option>
                                    <option value="3">T</option>
                                    </select> --> 
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

                                <!-- <select class="form-control form-control-sm cdqadisable" name="curr" id="curr">
                                    <option value="1">USD</option>                                  
                                <?php //foreach ($currency as $currency): ?>
                                    <option value="<?php //echo $currency['currid']; ?>"  
                                    <?php //if(isset($ldmster) && $ldmster['curr'] == $currency['currid']){ echo "selected" ; } ?>><?php echo $currency['currab']; ?></option>
                                <?php //endforeach; ?>
                                   </select> -->
                                

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
                                <!-- <input type="text" value ="<?php // if(isset($ldmster)){  echo $ldmster['empszlink']; }?>"  name="empszlink" id="empszlink" value=""   placeholder="Employee Size Link"  class="form-control form-control-sm"> -->
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
                               
                                <!-- <a href="<?php //if(isset($ldmster['indlink'])){ echo $ldmster['indlink']; } ?> "target="_blank"> 
                                <?php //if(isset($ldmster['indlink'])){  echo $ldmster['indlink']; }else { echo "Industry Link Empty" ;} ?>
                                </a>
                            
                                  <input type="checkbox" value=""  id="indlink" name="indlink" class="js-single"  /> -->
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
                                <!-- <input type="text"  name="revszlink" id="revszlink" value ="<?php // if(isset($ldmster)){  echo $ldmster['revszlink']; }?>"  placeholder="Revenue Size Link"  class="form-control form-control-sm revsizehide"> -->
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
                                <!-- <input type="text"  name="othrlink" id="othrlink" value ="<?php //if(isset($ldmster)){  echo $ldmster['othrlink']; }?>" placeholder="Other Link"  class="form-control form-control-sm"> -->
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
                                <!-- <select class="form-control form-control-sm"  name="emailver" id="emailver">
                                    <option value="0">Email Verification</option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select> -->
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
                                <!-- <input type="text"  name="aum" id="aum" value ="<?php // if(isset($ldmster)){  echo $ldmster['aum']; }?>" placeholder="Asset Under Management"  class="form-control form-control-sm aumdis"> -->
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
                                <!-- <select class="form-control form-control-sm commentvisible" name="assetid" id="assetid">
                                    <option value="0">Asset</option>
                                    <?php //foreach ($assetitle as $assetitle): ?>
                                    <option value="<?php// echo $assetitle['assetid']; ?>"><?php// echo $assetitle['title']; ?></option>
                                <?php //endforeach; ?>
                                   </select> -->

                                   <div class="to-do-list">
                                        <div class="checkbox-fade fade-in-primary  col-sm-12">
                                            <label class="check-task">
                                                <input type="checkbox" name="assetid" id="assetid"  value="assetid">
                                                <?php// foreach ($joblevel as $joblevel): ?>
                                               <span  class="form-control form-control-sm cdqadisable tooltips"><?php if($ldmster['atitle'] != ""){ echo $assetitledv['title']; } else { echo "Asset title is Empty" ; } ?>
                                               <span class="tooltiptext">Asset Title</span>
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
                                        <div class="col-sm-2 optoption">
                                        DND <input type="checkbox" value="" id="dnd" name="dnd" class="js-single dnd"  />
                                        </div>
                         </div>
                       

                        <div class="form-group row questionrow">  
                         
                          
                        </div> 
                        <br>

                        <div class="form-group row" >
                             <div class="col-sm-12 commentvisible">
                                <label class="col-lable"><b>Comment</b></label>
                                <input type="text"  name="pcomt" id="pcomt"  placeholder="Comment"  class="form-control form-control-sm" value="<?php echo $ldmster['pcomt']; ?>" >
                            </div> 
                         </div>
                        <input type = hidden name="campaign_id" id="campaign_id" value="<?php echo $campaign['cnid']; ?>">
                        <input type = hidden name="campaign_idcids" id="campaign_idcids" value="<?php echo $campaign['cids']; ?>">
                        
                       
                        <?php if(isset($ldmster) && $ldmster['dvrejtg'] <= 2){ ?> 
                        <?php //if(isset($ldmster) && $ldmster['dvrejtg'] <= '2' OR  $ldmster['dvsbtg'] <= '2'){ ?> 
                        
                          <input type = hidden name="lmid" id="lmid" value="<?php echo $ldmster['lmid']; ?>">
                          <input type = hidden name="emp_id" id="emp_id" value="<?php echo  $_SESSION['empcode']; ?>">
                          <input type = hidden name="sbsvtag" id="sbsvtag" value="<?php echo $ldmster['sbsvtag']; ?>">
                          <input type = hidden name="dvrejtg" id="dvrejtg" value="<?php echo $ldmster['dvrejtg']; ?>">
                          <input type = hidden name="dvsbtg" id="dvsbtg" value="<?php echo $ldmster['dvsbtg']; ?>">
                          <input type = hidden name="dvsbtg" id="dvsbtg" value="<?php echo $ldmster['dvsbtg']; ?>">
                          <input type = hidden name="rlc" id="rlc" value="<?php echo $ldmster['rlc']; ?>">
                          
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
                              <button type="submit" name="leadupdatecdc" class="btn btn-primary leaddisplay" style=""  id="leadupdatecdc">Accept & Submit</button> 
                             
                             
                              <button type="submit" name="leadsavecdc" class="btn btn-primary leaddisplay" style="margin-left:50px"  id="leadsavecdc">Save </button> 
                             </center>
                        <?php } else{ ?>
                          <!-- <button type="submit" name="" class="btn btn-primary leaddisplay" style=""  id="">Limit Crossed</button>  -->
                          <!-- <button type="submit" name="leadsavecdc" class="btn btn-primary leaddisplay" style=""  id="leadsavecdc">Discard </button>  -->
                           <?php }?>
                       <?php if(empty($ldmster)){ ?>
                        
                        <?php } ?>
                        </div>
                          </div>
                        <!-- <input class="submit" class ="" type="submit" value="SUBMIT"> -->
                        <!-- below buttons are for cdqa save and submit -->
                        <!-- <button type="submit" name="submit" class="btn btn-primary cdqadisplay"   id="cdqasubmit">Submit Lead </button> 
                        <button type="submit" name="submit" class="btn btn-primary cdqadisplay"  id="cdqasave">Save Lead </button> 
                        -->

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
                                               
                                                <!-- <div class="col-sm-6">
                                                <select class="form-control form-control-sm cdqadisable" name="" id="">
                                                    <option value="1">Industry</option>                                  
                                            
                                                    <option value="2">Sub Industry</option>
                                              
                                                </select>
                                              </div> -->
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
      // alert(m+" "+lrevrangenumber1+" "+urevrangenumber1);
    
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
      // alert(m);
      var urevrangenumber1 = urevrangenumber*1000000;
      var lrevrangenumber1 = lrevrangenumber*1000;
    // alert("hundred and million");
            //  var ch = "0"; // thousand
            //   var ch1 = "1"; // million
            //   var check = "2"; //billion
            //   var check2 = "3"; // trillion
            //   $('select').each(function() {
            //     $('#mlbl').not(this).find('option[value="' + check2 + '"]').hide();
            //       $('#mlbl').not(this).find('option[value="' + ch + '"]').prop('disabled', false); 
            //       $('#mlbl').not(this).find('option[value="' + ch1 + '"]').prop('disabled', false); 
            //       $('#mlbl').not(this).find('option[value="' + check + '"]').hide();
            //   });



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
    // alert("hundred and billion");
              // var ch = "0"; // thousand
              // var ch1 = "1"; // million
              // var check = "2"; //billion
              // var check2 = "3"; // trillion
              // $('select').each(function() {
              //     $('#mlbl').not(this).find('option[value="' + check2 + '"]').hide();
              //     $('#mlbl').not(this).find('option[value="' + ch + '"]').prop('disabled', false); 
              //     $('#mlbl').not(this).find('option[value="' + ch1 + '"]').hide();
              //     $('#mlbl').not(this).find('option[value="' + check + '"]').prop('disabled', false); 
              // });
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
      // alert(m);
    // alert("hundred and trillion");
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
    // alert("million and bllion");
              // var ch = "0"; // thousand
              // var ch1 = "1"; // million
              // var check = "2"; //billion
              // var check2 = "3"; // trillion
              // $('select').each(function() {
              //   $('#mlbl').not(this).find('option[value="' + check2 + '"]').hide();
              //     $('#mlbl').not(this).find('option[value="' + ch + '"]').hide();
              //     $('#mlbl').not(this).find('option[value="' + ch1 + '"]').prop('disabled', false); 
              //     $('#mlbl').not(this).find('option[value="' + check + '"]').prop('disabled', false); 
              // });


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
              // var ch = "0"; // thousand
              // var ch1 = "1"; // million
              // var check = "2"; //billion
              // var check2 = "3"; // trillion
              // $('select').each(function() {
              //   $('#mlbl').not(this).find('option[value="' + check2 + '"]').prop('disabled', false);
              //     $('#mlbl').not(this).find('option[value="' + ch + '"]').hide();
              //     $('#mlbl').not(this).find('option[value="' + ch1 + '"]').prop('disabled', false); 
              //     $('#mlbl').not(this).find('option[value="' + check + '"]').hide();
              // });
            
    alert("million and trillion");
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
        // $('#subindustrycd').prop('disabled', false);
    }
    // alert(sector_id);
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
          // alert(response.exclusionemail);
          if(response.inclusionemail == "true")
          {
            $("#email_msg").html("");
            console.log("true");
            return true;	
          }else if(response.inclusionemail == "false")
          {
            $("#email_msg").html("Not in Inclusion Email List");
            console.log("false");
            // $('#email').val("");
            // return false;	
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
});


$(document).ready(function() {

//update record lock
var rlc = 0; //lock 1
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
  // top.location.href=base_url+"cdc/selectCampaignforlead";//redirection
}


  // $("#revszlink").prop('disabled', true);
  // $('#revszlink').val("NA");

  // $('.commentvisible').hide();
  // $('.revsizehide').hide();

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
            $('.optoption').show();
            $("#opteml").prop('checked', true);
            $("#optph").prop('checked', true);
            $("#optpst").prop('checked', true);
               
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
      },
      optpst: {
        // required: true
      },
      optph: {
        // required: true
      },
      optin: {
        // required: true
      },
      opteml: {
        // required: true
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
            $("#leadupdatecdc").html("Accept & Submit");
          }else{
            $("#leadupdatecdc").html("Reject & Submit");
          }
          
});
/* update lead submit*/
    $(function() {
        $("#leadupdatecdc").on('click', function() 
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

            // alert(checked);
            
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
                var dvsbtg1 = $('#dvsbtg').val();
                if(dvsbtg1 == ""){
                  var dvsbtg = 1;
                }else{
                  var dvsbtg = parseInt(dvsbtg1)+1; // incremataion for dv  Accept
                }
    
                if(dvsbtg == '3'){
                  var dvsbtg = '3';
                  var sbsvtag = '0';
                }else{
                  var sbsvtag = $('#sbsvtag').val();
                }
                var dvrejtg = $('#dvrejtg').val(); 
                
          }else{ //checked -rejected
            var dvsbtg =$('#dvsbtg').val();

            var dvrejtg1 = $('#dvrejtg').val();
            if(dvrejtg1 == ""){
              var dvrejtg = 1;
            }else{
              var dvrejtg = parseInt(dvrejtg1)+1; // incremataion for dv  rejection
            }
 
            if(dvrejtg == '3'){
              var dvrejtg = '3';
              var sbsvtag = '0';
            }else{
              var sbsvtag = $('#sbsvtag').val();
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
            
            var aa1 = $('#aa1').val();
            // alert(aa1);
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

            var lmid = $('#lmid').val();

            var pcomt = $('#pcomt').val();
          
            // var url = encodeURI("<?php //echo base_url("cdc/ajax_update_datacdc");?>");
            var url = encodeURI("<?php echo base_url("cdc/ajax_update_datacdc");?>");
          
            console.log(url+"?campaign_id="+campaign_id+"&lmid="+lmid+"&campaign_idcids="+campaign_idcids+"&checked="+checked+"&sbsvtag="+sbsvtag+"&pcomt="+pcomt);
           
            $.ajax({
               url :'<?php echo base_url("cdc/ajax_update_datacdc");?>',
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
                  checked:checked,

                  dvrdti:dvrdti,
                  dvragtidi:dvragtidi,

                  dvragtidii:dvragtidii,
                  dvrdtii:dvrdtii,

                  dvdti:dvdti,
                  dvagtidi:dvagtidi,
                  dvdtii:dvdtii,
                  dvagtidii:dvagtidii,

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
                    $("#leadsavecdc").hide();
                    var text = response.statusCode;
                    console.log("check");
                    if(response.statusCode == "Success") 
                    {         
                         
                        $("#leadupdatecdc").html(response.message);
                        top.location.href=base_url+"administrator/dashboard";//redirection
                        // top.location.href=base_url+"cdc/dataverfication?camp_id="+<?php //echo $campaign['cnid']; ?>;//redirection
                      
                    }else if(response.data=="Fail")
                    {
                        $("#leadupdatecdc").html(response.message);
                        
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
        $("#leadsavecdc").on('click', function() 
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

            // alert(checked);
            
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
                var dvsbtg1 = $('#dvsbtg').val();
                if(dvsbtg1 == ""){
                  var dvsbtg = 1;
                }else{
                  var dvsbtg = parseInt(dvsbtg1)+1; // incremataion for dv  Accept
                }
    
                if(dvsbtg == '3'){
                  var dvsbtg = '3';
                  var sbsvtag = '0';
                }
                var dvrejtg = $('#dvrejtg').val(); 
          }else{ //checked -rejected
            var dvsbtg =$('#dvsbtg').val();

            var dvrejtg1 = $('#dvrejtg').val();
            if(dvrejtg1 == ""){
              var dvrejtg = 1;
            }else{
              var dvrejtg = parseInt(dvrejtg1)+1; // incremataion for dv  rejection
            }
 
            if(dvrejtg == '3'){
              var dvrejtg = '3';
              var sbsvtag = '0';
            }

          }
           
            var campaign_id = $('#campaign_id').val();
            var campaign_idcids = $('#campaign_idcids').val();
            var sbsvtag = '0';
            
            var aa1 = $('#aa1').val();
            // alert(aa1);
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

            var lmid = $('#lmid').val();

            var pcomt = $('#pcomt').val();
          
            // var url = encodeURI("<?php //echo base_url("cdc/ajax_update_datacdc");?>");
            var url = encodeURI("<?php echo base_url("cdc/ajax_save_leaddatacdc");?>");
          
            console.log(url+"?campaign_id="+campaign_id+"&lmid="+lmid+"&campaign_idcids="+campaign_idcids+"&checked="+checked+"&sbsvtag="+sbsvtag+"&pcomt="+pcomt);
           
            $.ajax({
               url :'<?php echo base_url("cdc/ajax_save_leaddatacdc");?>',
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
                  checked:checked,

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
                    $("#leadupdatecdc").hide();
                    var text = response.statusCode;
                    console.log("check");
                    if(response.statusCode == "Success") 
                    {         
                         
                        $("#leadsavecdc").html(response.message);
                        top.location.href=base_url+"administrator/dashboard";//redirection
                        // top.location.href=base_url+"cdc/dataverfication?camp_id="+<?php //echo $campaign['cnid']; ?>;//redirection
                      
                    }else if(response.data=="Fail")
                    {
                        $("#leadupdatecdc").html(response.message);
                        
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