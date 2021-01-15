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
                           
                            <div class="col-sm-2">
                                <label class="col-lable"><b>Salutation</b></label>
                                 <select name="sal_id" id="sal_id"  class="form-control  form-control-sm cdqadisable">
                                      <option value="1">Mr.</option>
                                      <option value="2">Miss.</option>
                                      <option value="3">Mrs.</option>
                                      <option value="4">Other</option>
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <label class="col-lable"><b>First Name</b></label>
                                <input type="text"  name="first_name" id="first_name"  placeholder="Enter Fisrt Name"  class="form-control form-control-sm cdqadisable">
                                <span style='color:#FF0000' id="fname_msg"></span>
                            </div>
                            <div class="col-sm-2">
                                <label class="col-lable"><b>Last Name</b></label>
                                <input type="text"  name="last_name" id="last_name"  placeholder="Enter Last Name"  class="form-control form-control-sm cdqadisable">
                                <span style='color:#FF0000' id="lname_msg"></span>
                            </div>
                            <div class="col-sm-2">
                                <label class="col-lable"><b>Job Title</b></label>
                                <input type="text"  name="job_title" id="job_title"  placeholder="Enter Job Title"  class="form-control form-control-sm cdqadisable">
                            </div>
                            <div class="col-sm-2">
                                <label class="col-lable"><b>Designation</b></label>
                                <!-- <select class="js-example-basic-multiple col-sm-12 cdqadisable" multiple="multiple" name="desid[]" id="desid"> -->
                                <select class="form-control form-control-sm cdqadisable" name="desid[]" id="desid">
                                <?php foreach ($designation as $designation): ?>
                                    <option value="<?php echo $designation['tid']; ?>"><?php echo $designation['designation']; ?></option>
                                <?php endforeach; ?>  
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <label class="col-lable"><b>Department</b></label>
                                <select class="form-control form-control-sm cdqadisable" name="dcd[]" id="dcd">
                                <?php foreach ($departments as $dept): ?>
                                    <option value="<?php echo $dept['dcd']; ?>"><?php echo $dept['department']; ?></option>
                                <?php endforeach; ?>
                                </select>
                            </div> 
                           
                        </div>

                        <hr>
                        <div class="form-group row">
                        <div class="col-sm-2">
                                <label class="col-lable"><b>Company Name</b></label>
                                <input type="text"  name="company_name" id="company_name"  placeholder="Enter Company Name"  class="form-control form-control-sm cdqadisable">
                            </div>  
                            <div class="col-sm-2">
                                <label class="col-lable"><b>Company Type</b></label>
                                <select name="ctype" id="ctype"  class="form-control  form-control-sm cdqadisable">
                                      <option value="1">Mr.</option>
                                      <option value="0">None</option>
                                      <option value="1">Private Equity</option>
                                      <option value="2">Law Firm</option>
                                      <option value="3">Corporate</option>
                                      <option value="4">Investment Banking</option>
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <label class="col-lable"><b>Email</b></label>
                                <div class="newsletter-signup">
                                <input type="text"  name="lead_email" id="lead_email"  placeholder="Enter Email"  class="form-control form-control-sm cdqadisable">
                               </div>
                                <span style='color:#FF0000' id="email_msg"></span>
                            </div>
                            <div class="col-sm-2">
                                <label class="col-lable"><b>Phone</b></label>
                                <input type="text"  name="phone" id="phone"  placeholder="Enter Phone" maxlength="10"  class="form-control form-control-sm cdqadisable">
                                <span style='color:#FF0000' id="phone_msg"></span>
                            </div>
                            <div class="col-sm-2">
                                <label class="col-lable"><b>Direct/Board</b></label> 
                                <select name="linetype" id="linetype"  class="form-control  form-control-sm cdqadisable">
                                      <option value="null">unknown</option>
                                      <option value="0">Direct</option>
                                      <option value="1">Board</option>  
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <label class="col-lable"><b>Phone Extension</b></label>
                                <input type="text"  name="phext" id="phext"  placeholder="Enter Extension" maxlength="5"  class="form-control form-control-sm cdqadisable">
                            </div>
                      </div>
                            <hr>
                        <div class="form-group row">
                            <div class="col-sm-2">
                                <label class="col-lable"><b>Alternate Phone</b></label>
                                <input type="text"  name="altphn" id="altphn"  placeholder="Enter Alternate Phone Number" maxlength="10"  class="form-control form-control-sm cdqadisable">
                            </div>
                            <div class="col-sm-2">
                                <label class="col-lable"><b>Street Address</b></label>
                                <input type="text"  name="address" id="address"  placeholder="Enter Address"  class="form-control form-control-sm cdqadisable">
                           </div>
                           <div class="col-sm-2">
                                <label class="col-lable"><b>City</b></label>
                                <input type="text"  name="city" id="city"  placeholder="Enter City"  class="form-control form-control-sm cdqadisable">
                           </div>
                           <div class="col-sm-2">
                                <label class="col-lable"><b>State</b></label>
                                <input type="text"  name="state" id="state"  placeholder="Enter State"  class="form-control form-control-sm cdqadisable">
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <label class="col-lable"><b>Zip</b></label>
                                <input type="text"  name="zip_code" id="zip_code"  placeholder="Enter Zip Code"  class="form-control form-control-sm cdqadisable">
                           </div>
                             <div class="col-sm-2">
                                <label class="col-lable"><b>Select Country</b></label>
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
                                <label class="col-lable"><b>Select TimeZone</b></label>
                              <select class="form-control form-control-sm cdqadisable"  name="timezone[]" id="timezone">
                                <?php foreach ($timezones as $tz): ?>
                                    <option value="<?php echo $tz['zoneid']; ?>"><?php echo $tz['timezonenm']; ?></option>
                                <?php endforeach; ?> 
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <label class="col-lable"><b>Select Industry</b></label>
                                <select class="form-control form-control-sm cdqadisable"  name="industrycd[]" id="industrycd">
                                     <?php foreach ($industries as $industry): ?>
                                    <option value="<?php echo $industry['industrycd']; ?>"><?php echo $industry['industry']; ?></option>
                                <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <label class="col-lable"><b>Select Sub Industry</b></label>
                                <select class="form-control form-control-sm cdqadisable" name="subindustrycd[]" id="subindustrycd">
                                     <?php foreach ($industries as $industry): ?>
                                    <option value="<?php echo $industry['industrycd']; ?>"><?php echo $industry['industry']; ?></option>
                                <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <label class="col-lable"><b>Sector Type</b></label>
                                <select class="form-control form-control-sm cdqadisable" name="sectyp" id="sectyp">
                                    <option value="0">Unknown</option>
                                    <option value="1">Public</option>
                                    <option value="2">Private</option>
                                    <option value="3">Government</option>
                                    <option value="4">Charity</option>
                               
                                    </select>
                            </div>

                            <div class="col-sm-2">
                                <label class="col-lable"><b>Actual Employee Size</b></label>
                                <input type="text"  name="empsize" id="empsize" maxlength="10" placeholder="Enter Actual Employee Size"  class="form-control form-control-sm cdqadisable">
                            </div>
                            <div class="col-sm-2">
                                <label class="col-lable"><b>Actual Revenue Size</b></label>
                                <input type="text"  name="arevenue" id="arevenue" maxlength="15" placeholder="Enter Actual Revenue Size"  class="form-control form-control-sm cdqadisable">
                            </div>

                        </div>
                <hr>
                        <div class="form-group row">
                        
                            
                            <div class="col-sm-2">
                                <label class="col-lable"><b>Mil/Bil</b></label>
                                <select class="form-control form-control-sm cdqadisable" name="mlbl" id="mlbl">
                                    <option value="0">Thousands</option>
                                    <option value="1">Hundred Thousand</option>
                                    <option value="2">Million</option>
                                    <option value="3">Billion</option>
                                    <option value="4">Trillion</option>
                                    </select>
                            </div>          
                            <div class="col-sm-2">
                                <label class="col-lable"><b>Currency</b></label>
                                <select class="form-control form-control-sm cdqadisable" name="curr" id="curr">
                                    <option value="0">Select</option>
                                   </select>
                            </div>          
                            <div class="col-sm-2">
                                <label class="col-lable"><b>Domain</b></label>
                                <input type="text"  name="domain" id="domain"  placeholder="Enter Domain"  class="form-control form-control-sm">
                            </div>
                            <div class="col-sm-2">
                                <label class="col-lable"><b>Prospect link</b></label>
                                <input type="text"  name="plink" id="plink"  placeholder="Enter Prospect Link"  class="form-control form-control-sm">
                                <span style='color:#FF0000' id="url_msg"></span>
                            </div>
                            <div class="col-sm-2">
                                <label class="col-lable"><b>Employee Size Link</b></label>
                                <input type="text"  name="empszlink" id="empszlink"  placeholder="Employee Size Link"  class="form-control form-control-sm">
                            </div>
                            <div class="col-sm-2">
                                <label class="col-lable"><b>Industry Type Link</b></label>
                                <input type="text"  name="indlink" id="indlink"  placeholder="Enter Industry Type Link"  class="form-control form-control-sm">
                            </div>
                        </div>
                        
                        <hr>
                        <div class="form-group row">
                           
                           
                            <div class="col-sm-2">
                                <label class="col-lable"><b>Revenue Size Link</b></label>
                                <input type="text"  name="revszlink" id="revszlink"  placeholder="Enter Revenue Size Link"  class="form-control form-control-sm">
                            </div>
                            <div class="col-sm-2">
                                <label class="col-lable"><b>Other Links</b></label>
                                <input type="text"  name="othrlink" id="othrlink"  placeholder="Enter Other Link"  class="form-control form-control-sm">
                            </div>
                            <div class="col-sm-2">
                                <label class="col-lable"><b>Email Verified</b></label>
                                <select class="form-control form-control-sm"  name="emailver" id="emailver">
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <label class="col-lable"><b>AUM</b></label>
                                <input type="text"  name="aum" id="aum"  placeholder="Enter Asset Under Management"  class="form-control form-control-sm">
                            </div>
                            <div class="col-sm-2">
                                <label class="col-lable"><b>Asset title</b></label>
                                <select class="form-control form-control-sm cdqadisable" name="assetid" id="assetid">
                                    <option value="0">Select</option>
                                   </select>
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
                                <input type="text"  name="pcomt" id="pcomt"  placeholder="Enter Comment"  class="form-control form-control-sm">
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
        $("#first_name").keypress(function (e) {
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
  $("#basic-form").validate({
    rules: {
        campaign_id : {
        required: true
      },
        company_name : {
        required: true,
        minlength: 3
      },
       'country_id[]' : {
        required: true,
        minlength: 1
      },
      phone: {
        required: true,
        number: true,
        min: 6
      },
      email: {
        required: true,
        email: true
      },
      domain: {
        required: true,
        url: true
      },
     
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

    

  