
<script>
var base_url = "<?php echo base_url() ?>";
$(document).ready(function () {
    // Handler for .ready() called.
    $('html, body').animate({
        scrollTop: $('#camp_form').offset().top
    }, 'slow');
});

$(document).ready(function() {
    var elements = $('.section').hide();
    $('#emplzid').bind('change', function() {
        // alert("test");
        var elements = $('.section').hide(); // hide all the elements
        var value = $(this).val();
        // alert(value);

        if (value == 10) { // if somethings' selected
            var elements = $('.section').show();
            $('#emplzid').children().hide();
            elements.filter('.' + value).show(); // show the ones we want
        }
    }).trigger('change');
    
    // $('.second-level-select').bind('change', function() {
    //     var elements = $('div.second-level-container').children().hide(); // hide all the elements
    //     var value = $(this).val();

    //     if (value.length) { // if somethings' selected
    //         elements.filter('.' + value).show(); // show the ones we want
    //     }
    // }).trigger('change');
});
$(document).ready(function() {
    var elements = $('.panel').hide();
    $('#revid').bind('change', function() {
        // alert("test");
        var elements = $('.panel').hide(); // hide all the elements
        var value = $(this).val();
        // alert(value);

        if (value == 177) { // if somethings' selected
            var elements = $('.panel').show();
            $('#revid').children().hide();
            elements.filter('.' + value).show(); // show the ones we want
        }
    }).trigger('change');
    
    // $('.second-level-select').bind('change', function() {
    //     var elements = $('div.second-level-container').children().hide(); // hide all the elements
    //     var value = $(this).val();

    //     if (value.length) { // if somethings' selected
    //         elements.filter('.' + value).show(); // show the ones we want
    //     }
    // }).trigger('change');
});

</script>

<div class="page-header">
    <div class="page-header-title">
        <h4>Data Lead And CDC</h4>
    </div>
    <div class="page-header-breadcrumb">
        <ul class="breadcrumb-title">
            <li class="breadcrumb-item">
                <a href="index-2.html">
                    <i class="icofont icofont-home"></i>
                </a>
            </li>
            <li class="breadcrumb-item"><a href="#!">Data Lead</a>
            </li>
            <li class="breadcrumb-item"><a href="#!">Add Lead</a>
            </li>
        </ul>
    </div>
</div>
<!-- Page header end -->
<!-- Page body start -->
<div class="page-body">
    <div class="row">
        <div class="col-sm-12">
            <!-- Basic Form Inputs card start -->
            <div class="card" id="camp_form">
                <div class="card-header">
                    <h5>Add Lead</h5>
                    <div class="card-header-right">
                        <i class="icofont icofont-rounded-down"></i>
                        <i class="icofont icofont-refresh"></i>
                        <i class="icofont icofont-close-circled"></i>
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
                        <!-- <form id="addcampForm" method="POST" enctype="multipart/form-data"> -->

                        <div class="form-group row">
                            <div class="col-sm-3">
                                <label  class="col-lable"><b>Agent Name</b></label>
                                <input type="text" name="agentName" id="agent_name" class="form-control" value="<?php echo $this->session->userdata('username'); ?>">
                            </div>
                            <div class="col-sm-3">
                                <label class="col-lable"><b>Campaign Name</b></label>
                                 <select name="campaign_id" id="campaign_id"  class="form-control">
                                      <option value="">Select Campaign</option>
                                <?php foreach ($campaigns as $campaign): ?>
                                    <option value="<?php echo $campaign['cnid']; ?>"><?php echo $campaign['campnm']; ?></option>
                                <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <label class="col-lable"><b>Rec Type</b></label>
                                 <select name="rec_type_id" id="rec_type_id"  class="form-control">
                                      <option value="1">Data </option>
                                      <option value="2">CDQA </option>
                                </select>
                            </div>
                            <div class="col-sm-3">
                              <button type="submit" name="submit" class="btn btn-primary" style="margin-top:25px"  id="addleadbtn">Retrieve Data</button>
                            </div>
                        </div>
                      
                        <div class="form-group row">
                            <div class="col-sm-3">
                                <label class="col-lable"><b>Department</b></label>
                                <select class="js-example-basic-multiple col-sm-12" multiple="multiple" name="dcd[]" id="dcd">
                                   <?php foreach ($departments as $dept): ?>
                                    <option value="<?php echo $dept['dcd']; ?>"><?php echo $dept['department']; ?></option>
                                <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <label class="col-lable"><b>Company Name</b></label>
                                <input type="text"  name="company_name" id="company_name"  placeholder="Enter Company Name"  class="form-control">
                            </div>
                            <div class="col-sm-2">
                                <label class="col-lable"><b>Salutation</b></label>
                                 <select name="rec_type_id" id="rec_type_id"  class="form-control">
                                      <option value="1">Mr.</option>
                                      <option value="2">Miss.</option>
                                      <option value="3">Mrs.</option>
                                      <option value="4">Other</option>
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <label class="col-lable"><b>First Name</b></label>
                                <input type="text"  name="first_name" id="first_name"  placeholder="Enter Fisrt Name"  class="form-control">
                            </div>
                            <div class="col-sm-2">
                                <label class="col-lable"><b>Last Name</b></label>
                                <input type="text"  name="last_name" id="last_name"  placeholder="Enter Last Name"  class="form-control">
                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="col-sm-3">
                                <label class="col-lable"><b>Job Title</b></label>
                                <input type="text"  name="job_title" id="job_title"  placeholder="Enter Job Title"  class="form-control">
                            </div>
                            <div class="col-sm-3">
                                <label class="col-lable"><b>Designation</b></label>
                                <select class="js-example-basic-multiple col-sm-12" multiple="multiple" name="desid[]" id="desid">
                                <?php foreach ($designation as $designation): ?>
                                    <option value="<?php echo $designation['tid']; ?>"><?php echo $designation['designation']; ?></option>
                                <?php endforeach; ?>
                                   
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <label class="col-lable"><b>Email</b></label>
                                <input type="email"  name="lead_email" id="lead_email"  placeholder="Enter Email"  class="form-control">
                            </div>
                            <div class="col-sm-2">
                                <label class="col-lable"><b>Phone</b></label>
                                <input type="text"  name="phone" id="phone"  placeholder="Enter Phone"  class="form-control">
                            </div>
                            <div class="col-sm-2">
                                <label class="col-lable"><b>Phone Extension</b></label>
                                <input type="text"  name="ph_ext" id="ph_ext"  placeholder="Enter Extension"  class="form-control">
                            </div>
                        </div>
                       


                        <div class="form-group row">
                            <div class="col-sm-3">
                                <label class="col-lable"><b>Select Country</b></label>
                                <select class="js-example-basic-multiple col-sm-12" multiple="multiple" name="country_id[]" id="country_id">
                                 <?php foreach ($countries as $country): ?>
                                    <option value="<?php echo $country['countrycd'];echo set_select('country_id'); ?>"><?php echo $country['countryname']; ?></option>
                                <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <label class="col-lable"><b>Select State</b></label>
                                <select class="js-example-basic-multiple col-sm-12" multiple="multiple" name="state_id[]" id="state_id">
                                 <?php foreach ($countries as $country): ?>
                                    <option value="<?php echo $country['countrycd'];echo set_select('country_id'); ?>"><?php echo $country['countryname']; ?></option>
                                <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <label class="col-lable"><b>City</b></label>
                                <input type="text"  name="city_id" id="city_id"  placeholder="Enter City"  class="form-control">
                           </div>
                            <div class="col-sm-2">
                                <label class="col-lable"><b>Street Address</b></label>
                                <input type="text"  name="st_address" id="st_address"  placeholder="Enter Address"  class="form-control">
                           </div>
                            <div class="col-sm-2">
                                <label class="col-lable"><b>Zip</b></label>
                                <input type="text"  name="zip_code" id="zip_code"  placeholder="Enter Zip Code"  class="form-control">
                           </div>
                       
                        </div>

                        <div class="form-group row">
                         <div class="col-sm-3">
                                <label class="col-lable"><b>Select TimeZone</b></label>
                              <select class="js-example-basic-multiple col-sm-12" multiple="multiple" name="timezone[]" id="timezone">
                                <?php foreach ($timezones as $tz): ?>
                                    <option value="<?php echo $tz['zoneid']; ?>"><?php echo $tz['timezonenm']; ?></option>
                                <?php endforeach; ?>
                                   
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <label class="col-lable"><b>Select Sub Industry</b></label>
                                <select class="js-example-basic-multiple col-sm-12" multiple="multiple" name="industrycd[]" id="industrycd">
                                     <?php foreach ($industries as $industry): ?>
                                    <option value="<?php echo $industry['industrycd']; ?>"><?php echo $industry['industry']; ?></option>
                                <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <label class="col-lable"><b>Select Industry</b></label>
                                <select class="js-example-basic-multiple col-sm-12" multiple="multiple" name="industrycd[]" id="industrycd">
                                     <?php foreach ($industries as $industry): ?>
                                    <option value="<?php echo $industry['industrycd']; ?>"><?php echo $industry['industry']; ?></option>
                                <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <label class="col-lable"><b>Actual Employee Size</b></label>
                                <input type="text"  name="actual_empsize" id="actual_empsize"  placeholder="Enter Actual Employee Size"  class="form-control">
                            </div>
                            <div class="col-sm-2">
                                <label class="col-lable"><b>Select Employee Size</b></label>
                                <select class="js-example-basic-multiple col-sm-12" name="emplzid[]" id="emplzid">
                                <?php foreach ($empsize as $empsize): ?>
                                    <option value="<?php echo $empsize['emplzid']; ?>"><?php echo $empsize['emplsizerange']; ?></option>
                                <?php endforeach; ?>
                                    </select>
                            </div>
                           
                        </div>
                        <div class="form-group row">
                             <div class="col-sm-3">
                                <label class="col-lable"><b>Actual Revenue Size</b></label>
                                <input type="text"  name="actual_revsize" id="actual_revsize"  placeholder="Enter Actual Revenue Size"  class="form-control">
                            </div>
                             <div class="col-sm-3">
                                <label class="col-lable"><b> Revenue Size</b></label>
                                    <select class="js-example-basic-multiple col-sm-12" name="revid[]" id="revid">
                                        <?php foreach ($revsize as $revsize): ?>
                                            <option value="<?php echo $revsize['comzid']; ?>"><?php echo $revsize['rangelist']; ?></option>
                                        <?php endforeach; ?>
                                     </select> 
                              </div>
                             <div class="col-sm-2">
                                <label class="col-lable"><b>Asset Titles</b></label>
                                <select class="js-example-basic-multiple col-sm-12" multiple="multiple" name="assetid[]" id="assetid">
                                <?php foreach ($assetitle as $assetitle): ?>
                                    <option value="<?php echo $assetitle['assetid']; ?>"><?php echo $assetitle['title']; ?></option>
                                <?php endforeach; ?>
                                </select>
                            </div>
                             <div class="col-sm-2">
                                <label class="col-lable"><b>Prospect link</b></label>
                                <input type="text"  name="prospect_link" id="prospect_link"  placeholder="Enter Prospect Link"  class="form-control">
                            </div>
                             <div class="col-sm-2">
                                <label class="col-lable"><b>Employee Size Link</b></label>
                                <input type="text"  name="emp_size_link" id="emp_size_link"  placeholder="Employee Size Link"  class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                             <div class="col-sm-3">
                                <label class="col-lable"><b>Industry Type Link</b></label>
                                <input type="text"  name="indutry_link" id="indutry_link"  placeholder="Enter Industry Type Link"  class="form-control">
                            </div>
                             <div class="col-sm-3">
                                <label class="col-lable"><b>Revenue Size Link</b></label>
                                <input type="text"  name="revsize_link" id="revsize_link"  placeholder="Enter Revenue Size Link"  class="form-control">
                            </div>
                             <div class="col-sm-2">
                                <label class="col-lable"><b>Domain</b></label>
                                <input type="text"  name="domain" id="domain"  placeholder="Enter Domain"  class="form-control">
                            </div>
                             
                             <div class="col-sm-2">
                                <label class="col-lable"><b>Call Verified</b></label>
                                <select class="form-control"  name="call_veryfied" id="call_veryfied">
                                    <option value="1">Yes</option>
                                    <option value="2">No</option>
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <label class="col-lable"><b>Call Recording</b></label>
                                <select class="form-control"  name="call_recording" id="call_recording">
                                    <option value="1">Yes</option>
                                    <option value="2">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">     
                            <div class="col-sm-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Question 1: </h5><br>
                                        <label class="col-lable"><b>This example loads data, options and schema parameters through ajax calls.</b></label>
                                    </div>
                                    <div class="card-block">
                                        <div id="form2">
                                        <input type="text"  name="ans1" id="ans1"  placeholder="Answer for Question 1"  class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card">
                                    <div class="card-header">
                                    <h5>Question 2: </h5><br>
                                   <label class="col-lable"><b>This example loads data, options and schema parameters through ajax calls.</b></label>
                                    </div>
                                    <div class="card-block">
                                        <div id="form2">
                                        <input type="text"  name="ans2" id="ans2"  placeholder="Answer for Question 2"  class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>   

                        <!-- </form> -->
                    </div>
                           
                </div>
            </div>
        </div>
        <!-- Basic Form Inputs card end -->

                         
    

  