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
    
/*     
      .form-control option:hover {
          background: pink;
            
     box-shadow: 0 0 10px 10px #e1358f inset;
        }
        select:focus{
    border-color: gray;
    outline:none;
} */

 </style>
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
    var elements = $('.section').hide();
    $('#rec_type_id').bind('change', function() {
        var elements = $('.section').hide(); // hide all the elements
        var value = $(this).val();
        if (value == 2) { // if cdqa is selected
            var elements = $('.section').show(); 

            $(".cdqadisable").attr("disabled", true);   
            // $("#dcd").attr("disabled", true);   
            // $("#company_name").attr("disabled", true);  
           
          
        }else{
            $(".cdqadisable").attr("disabled", false);    
            
        }
    }).trigger('change');
 
// $('#rec_type_id').change(function(){
//   if($(this).val() == '2'){ // or this.value == 'volvo'
    
//     var campaign_id = $('#campaign_id').val();
    
//     $.ajax({
//                 url:'<?php echo base_url("cdc/getAjaxcampaign");?>',
//                 method: 'post',
//                 data: {
//                     campaign_id:campaign_id

//                 },
//                 dataType: 'json',
//                 success: function(response){
   
//                 // Remove options 
//                 //    $('#sel_user').find('option').not(':first').remove();
//                 $('#company_name').val(response.cnid);

//                 }
//             });



//   }
// });


});

</script>
<form id="basic-form" method="POST" enctype="multipart/form-data">
<div class="page-header">
    <div class="page-header-title col-sm-12">
        <h4>Data Lead And CDC </h4> 
        
      
            <div class="form-group row"> 
            <div class="col-sm-2" style="margin-left: 200px;margin-top: -25px;">
                                <select name="rec_type_id" id="rec_type_id"  class="form-control form-control-sm">
                                      <option value="1">Data </option>
                                      <option value="2">CDQA </option>
                                </select>
                  </div> 
        <div class="col-sm-2" style="margin-top: -20px;">
        <?php foreach ($campaigns as $campaign): ?>
                 <label class="col-lable"><b>Campaign Name: <?php echo $campaign['campnm']; ?></b></label>
                 <?php endforeach; ?>
                  </div> 
        </div>   
                           
    </div>
    <!-- <div class="page-header-breadcrumb">
        <ul class="breadcrumb-title">
            <li class="breadcrumb-item">
                <a href="index-2.html">
                    <i class="icofont icofont-home"></i>
                </a>
            </li>
            <li class="breadcrumb-item"><a href="#!">Data Lead And CDC</a>
            </li>
            <li class="breadcrumb-item"><a href="#!">Add Lead</a>
            </li>
        </ul>
    </div> -->
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
                 <!-- <div class="col-sm-3">
                                <select name="rec_type_id" id="rec_type_id"  class="form-control form-control-sm">
                                      <option value="1">Data </option>
                                      <option value="2">CDQA </option>
                                </select>
                            </div> -->
                    
                       
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
                                 <select name="sal" id="sal"  class="form-control  form-control-sm cdqadisable">
                                      <option value="1">Mr.</option>
                                      <option value="2">Miss.</option>
                                      <option value="3">Mrs.</option>
                                      <option value="4">Other</option>
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <input type="text"  name="fname" id="fname"  placeholder="First Name" Maxlength="5"  class="form-control form-control-sm cdqadisable">
                                <span style='color:#FF0000' id="fname_msg"></span>
                            </div>
                            <div class="col-sm-2">
                                <input type="text"  name="lname" id="lname"  placeholder="Last Name"   Maxlength="5" class="form-control form-control-sm cdqadisable">
                                <span style='color:#FF0000' id="lname_msg"></span>
                            </div>
                            <div class="col-sm-3">
                                <input type="text"  name="jtitle" id="jtitle"  placeholder="Job Title"  class="form-control form-control-sm cdqadisable">
                            </div>
                            <div class="col-sm-2">
                                <!-- <select class="js-example-basic-multiple col-sm-12 cdqadisable" multiple="multiple" name="desid[]" id="desid"> -->
                                <select class="form-control form-control-sm cdqadisable" name="desid[]" id="desid">
                                <option>Designation</option>
                                <?php foreach ($designation as $designation): ?>
                                    <option value="<?php echo $designation['tid']; ?>"><?php echo $designation['designation']; ?></option>
                                <?php endforeach; ?>  
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <!-- <select class="js-example-basic-multiple col-sm-12 cdqadisable" multiple="multiple" name="desid[]" id="desid"> -->
                                <select class="form-control form-control-sm cdqadisable" name="jlevel" id="jlevel">
                                <option>Job Level</option>
                               
                                </select>
                            </div>
                           
                        </div>

                        <hr>
                        <div class="form-group row">
                        <div class="col-sm-2">
                                 <select class="form-control form-control-sm cdqadisable" name="dcd[]" id="dcd">
                                    <option> Department</option>
                                <?php foreach ($departments as $dept): ?>
                                    <option value="<?php echo $dept['dcd']; ?>"><?php echo $dept['department']; ?></option>
                                <?php endforeach; ?>
                                </select>
                            </div> 
                            <div class="col-sm-2">
                                <div class="newsletter-signup">
                                <input type="text"  name="email" id="email"  placeholder="Email"  class="form-control form-control-sm cdqadisable">
                               </div>
                                <span style='color:#FF0000' id="email_msg"></span>
                            </div>
                            <div class="col-sm-2">
                                <input type="text"  name="phone" id="phone"  placeholder="Phone" maxlength="10"  class="form-control form-control-sm cdqadisable">
                                <span style='color:#FF0000' id="phone_msg"></span>
                            </div>
                            <div class="col-sm-2">
                                <input type="text"  name="altphn" id="altphn"  placeholder="Alternate Phone Number" maxlength="10"  class="form-control form-control-sm cdqadisable">
                            </div>
                            
                            <div class="col-sm-2">
                                <input type="text"  name="phext" id="phext"  placeholder="Extension" maxlength="5"  class="form-control form-control-sm cdqadisable">
                            </div>
                            <div class="col-sm-2">
                                <input type="text"  name="plink" id="plink"  placeholder="Prospect Link"  class="form-control form-control-sm">
                                <span style='color:#FF0000' id="url_msg"></span>
                            </div>
                        
                      </div>
                            <hr>
                        <div class="form-group row">
                        <div class="col-sm-2">
                                <input type="text"  name="company_name" id="company_name"  placeholder="Company Name"  class="form-control form-control-sm cdqadisable">
                            </div>  
                            <div class="col-sm-2">
                                <input type="text"  name="address" id="address"  placeholder="Address"  class="form-control form-control-sm cdqadisable">
                           </div>
                           <div class="col-sm-2">
                                <input type="text"  name="city" id="city"  placeholder="City"  class="form-control form-control-sm cdqadisable">
                           </div>
                           <div class="col-sm-2">
                                <input type="text"  name="state" id="state"  placeholder="State"  class="form-control form-control-sm cdqadisable">
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <input type="text"  name="zip_code" id="zip_code"  placeholder="Zip Code"  class="form-control form-control-sm cdqadisable">
                           </div>
                             <div class="col-sm-2">
                                     <select class="form-control form-control-sm cdqadisable" name="country_id[]" id="country_id">
                                 <?php foreach ($countries as $country): ?>
                                    <option value="<?php echo $country['countrycd'];echo set_select('country_id'); ?>"><?php echo $country['countryname']; ?></option>
                                <?php endforeach; ?>
                                </select>
                            </div>
                            
                        </div>
                       <hr>

                        <div class="form-group row">
                            
                            <div class="col-sm-2">
                              <select class="form-control form-control-sm cdqadisable"  name="timezone[]" id="timezone">
                              <option value="">Timezone</option>
                              <?php foreach ($timezones as $tz): ?>
                                    <option value="<?php echo $tz['zoneid']; ?>"><?php echo $tz['timezonenm']; ?></option>
                                <?php endforeach; ?> 
                                </select>
                            </div>

                            <div class="col-sm-2">
                               <select name="ctype" id="ctype"  class="form-control  form-control-sm cdqadisable"> 
                                     <option value="">Company Type</option>
                                     <option value="0">None</option>
                                     <option value="1">Private Equity</option>
                                     <option value="2">Law Firm</option>
                                     <option value="3">Corporate</option>
                                     <option value="4">Investment Banking</option>
                               </select>
                           </div>
                           
                           <div class="col-sm-2">
                               <select name="linetype" id="linetype"  class="form-control  form-control-sm cdqadisable">
                                     <option value="null">unknown</option>
                                     <option value="0">Direct</option>
                                     <option value="1">Board</option>  
                               </select>
                           </div>


                            <div class="col-sm-2">
                              <select class="form-control form-control-sm cdqadisable"  name="industrycd" id="industrycd">
                              <option value="">Industry</option>
                              <?php foreach ($industries as $industry): ?>
                                    <option value="<?php echo $industry['industrycd']; ?>"><?php echo $industry['industry']; ?></option>
                                <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <select class="form-control form-control-sm cdqadisable" name="subindustrycd" id="subindustrycd">
                                <option value="">Sub Industry</option>
                                <!-- <?php //foreach ($industries as $industry): ?>
                                    <option value="<?php echo $industry['industrycd']; ?>"><?php echo $industry['industrycd']; ?></option>
                                <?php //endforeach; ?> -->
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <select class="form-control form-control-sm cdqadisable" name="sectyp" id="sectyp">
                                    <option value="">Sector</option>
                                    <option value="0">Unknown</option>
                                    <option value="1">Public</option>
                                    <option value="2">Private</option>
                                    <option value="3">Government</option>
                                    <option value="4">Charity</option>
                               
                                    </select>
                            </div>

                        </div>
                <hr>
                    <div class="form-group row">
                        <div class="col-sm-2">
                                <input type="text"  name="empsize" id="empsize" maxlength="6" placeholder="Actual Employee Size"  class="form-control form-control-sm cdqadisable">
                            </div>
                            <div class="col-sm-2">
                                <input type="text"  name="arevenue" id="arevenue" maxlength="15" placeholder="Actual Revenue Size"  class="form-control form-control-sm cdqadisable">
                            </div>

                            
                            <div class="col-sm-2">
                                <select class="form-control form-control-sm cdqadisable" name="mlbl" id="mlbl">
                                    <option value="0">Thousands</option>
                                    <option value="1">Hundred Thousand</option>
                                    <option value="2">Million</option>
                                    <option value="3">Billion</option>
                                    <option value="4">Trillion</option>
                                    </select>
                            </div>          
                            <div class="col-sm-2">
                                <select class="form-control form-control-sm cdqadisable" name="curr" id="curr">
                                    <option value="0">USD</option>
                                   </select>
                            </div>          
                            <div class="col-sm-2">
                                <input type="text"  name="domain" id="domain"  placeholder="Domain"  class="form-control form-control-sm">
                            </div>
                            
                            <div class="col-sm-2">
                                <input type="text"  name="empszlink" id="empszlink"  placeholder="Employee Size Link"  class="form-control form-control-sm">
                            </div>
                           
                        </div>
                        
                        <hr>
                        <div class="form-group row">
                           
                        <div class="col-sm-2">
                                <input type="text"  name="indlink" id="indlink"  placeholder="Industry Type Link"  class="form-control form-control-sm">
                            </div>
                            <div class="col-sm-2">
                                <input type="text"  name="revszlink" id="revszlink"  placeholder="Revenue Size Link"  class="form-control form-control-sm">
                            </div>
                            <div class="col-sm-2">
                                <input type="text"  name="othrlink" id="othrlink"  placeholder="Other Link"  class="form-control form-control-sm">
                            </div>
                            <div class="col-sm-2">
                                <select class="form-control form-control-sm"  name="emailver" id="emailver">
                                    <option value="">Email Verification</option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <input type="text"  name="aum" id="aum"  placeholder="Asset Under Management"  class="form-control form-control-sm">
                            </div>
                            <div class="col-sm-2">
                                <select class="form-control form-control-sm cdqadisable" name="assetid" id="assetid">
                                    <option value="0">Asset</option>
                                    <?php foreach ($assetitle as $assetitle): ?>
                                    <option value="<?php echo $assetitle['assetid']; ?>"><?php echo $assetitle['title']; ?></option>
                                <?php endforeach; ?>
                                   </select>
                            </div> 
                        </div>
                        <hr>
                        <div class="form-group row">
                                       
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
                                        DND <input type="checkbox" value="" id="dnd" name="dnd" class="js-single"  />
                                        </div>
                         </div>
                        <div class="form-group row">     
                          <div class="col-sm-6 card">
                                <div class="card-header">
                                    <h5>Question 2: </h5><br>
                                    <label class="col-lable"><p><b>This example loads data, options and schema parameters through ajax calls.</b></p></label>
                                    </div>
                                    <div class="card-block">
                                        <div id="form2">
                                        <input type="text"  name="ans2" id="ans2"  placeholder="Answer for Question 2"  class="form-control form-control-sm cdqadisable">
                                        </div>
                                    </div>
                            </div>
                            <div class="col-sm-6 card">
                                <div class="card-header">
                                    <h5>Question 2: </h5><br>
                                    <label class="col-lable"><p><b>This example loads data, options and schema parameters through ajax calls.</b></p></label>
                                    </div>
                                    <div class="card-block">
                                        <div id="form2">
                                        <input type="text"  name="ans2" id="ans2"  placeholder="Answer for Question 2"  class="form-control form-control-sm cdqadisable">
                                        </div>
                                    </div>
                               
                            </div>

                            <div class="col-sm-12">
                                <label class="col-lable"><b>Comment</b></label>
                                <input type="text"  name="pcomt" id="pcomt"  placeholder="Comment"  class="form-control form-control-sm">
                            </div> 
                        </div> 
                       
                        <button type="submit" name="leadsubmit" class="btn btn-primary" style=""  id="leadsubmit">Submit Lead</button> 
                        <button type="submit" name="leadsave" class="btn btn-primary" style=""  id="leadsave">Save Lead</button> 
                        <!-- <input class="submit" class ="" type="submit" value="SUBMIT"> -->
                       

                    </div>
                      
                </div>
                <!-- </form>   -->
            </div>
        </div>
        <!-- Basic Form Inputs card end -->
        </form>  
    
   
     <script>
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
        // $("#phone").keypress(function (e) {
        //     var keyCode = e.keyCode || e.which;
 
        //     $("#phone_msg").html("");
 
        //     //Regex for Valid Characters i.e. Alphabets and Numbers.
          
        //     var regex = /^[0-9]+$/;
 
        //     //Validate TextBox value against the Regex.
        //     var isValid = regex.test(String.fromCharCode(keyCode));
        //     if (!isValid) {
        //         $("#phone_msg").html("Only Numbers allowed.");
        //     }
        //     return isValid;
        // });
    });
  
    $('.newsletter-signup input:first').on('keyup', function(){
        $('#email_msg').html("");
    var valid = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/.test(this.value) && this.value.length;
    if(valid){
        $('#email_msg').html("");
    }else{
        $('#email_msg').html("Not Valid format");  
    }
    
   
});



$(document).ready(function() {
    $('.optoption').hide();
    
    $('[name="optin"]').change(function()
      {
        if ($(this).is(':checked')) {
            $('#optin').val("1");
            $('.optoption').show();
               
        }else{
            $('#optin').val("0");
            $('.optoption').hide();
               
        };
      });



  $("#basic-form").validate({
    rules: {
        sal : {
        required: true
      },
      fname : {
        required: true
      },
      lname : {
        required: true
      },
      jtitle : {
        required: true
      },
      jlevel : {
        required: true
      },
        company_name : {
        required: true,
        minlength: 3
      },
      dcd : {
        required: true,
        minlength: 3
      },
      linetype : {
        required: true        
      },
      address : {
        required: true,
        minlength: 5
      },
      city : {
        required: true,
        minlength: 5
      },
      state : {
        required: true,
        minlength: 5
      },
      zip_code : {
        required: true,
        minlength: 5
      },
      country_id : {
        required: true
      },
      timezone : {
        required: true,
      },
      industrycd : {
        required: true
      },
      subindustrycd : {
        required: true
      },

    //    'country_id[]' : {
    //     required: true,
    //     minlength: 1
    //   },
      phone: {
        required: true,
        number: true,
        min: 6
      },
      altphn: {
        number: true
      },
      empsize: {
        number: true
      },
      email: {
        required: true,
        email: true
      },
      domain: {
        required: true,
        url: true
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
      revszlink: {
        required: true,
        url: true
      },
      emailver: {
        required: true
      },
      optpst: {
        required: true
      },
      optph: {
        required: true
      },
      optin: {
        required: true
      },
      opteml: {
        required: true
      }
     
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

    

  