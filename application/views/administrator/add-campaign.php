<style>
    .multiselect-container{position:absolute;list-style-type:none;margin:0;padding:0}.multiselect-container .input-group{margin:5px}.multiselect-container>li{padding:0}.multiselect-container>li>a.multiselect-all label{font-weight:700}.multiselect-container>li>label.multiselect-group{margin:0;padding:3px 20px;height:100%;font-weight:700}.multiselect-container>li>a{padding:0}.multiselect-container>li>a>label{margin:0;height:100%;cursor:pointer;font-weight:400;padding:3px 20px 3px 40px}.multiselect-container>li>a>label.radio,.multiselect-container>li>a>label.checkbox{margin:0}.multiselect-container>li>a>label>input[type=checkbox]{margin-bottom:5px}.btn-group>.btn-group:nth-child(2)>.multiselect.btn{border-top-left-radius:4px;border-bottom-left-radius:4px}.form-inline .multiselect-container label.checkbox,.form-inline .multiselect-container label.radio{padding:3px 20px 3px 40px}.form-inline .multiselect-container li a label.checkbox input[type=checkbox],.form-inline .multiselect-container li a label.radio input[type=radio]{margin-left:-20px;margin-right:0}

    #myModal .modal-body 
    { 
        min-height: 400px;
    }
    .select2-container--default .select2-selection--multiple {
    padding:0px 0px 0px 0px;
    }
</style>
<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css"
rel="Stylesheet"type="text/css"/>
<script type="text/javascript">
$(function () {
    // $( "#startdt" ).datepicker({ minDate: 0});
    $("#startdt").datepicker({
        numberOfMonths: 1,
        minDate: '-0m',
        onSelect: function (selected) {
            
            var dt = new Date(selected);
            dt.setDate(dt.getDate() + 0);
            // alert(dt);
            
            $("#estclosedt").datepicker("option", "minDate", dt);
        }
    });
    $("#estclosedt").datepicker({
        numberOfMonths: 1,
        onSelect: function (selected) {
            var dt = new Date(selected);
            // alert(dt);
            dt.setDate(dt.getDate() - 1);
            // $("#estclosedt").datepicker("option", "minDate", dt);
        }
    });
});

$(function(){
    $('#revnubound').prop('disabled', true);
    $('#revnubound_range').prop('disabled', true);
    $('#revnlbound_range').change(function(){
        
        if($(this).attr('id') == 'revnlbound_range' && $(this).val() == 'hundred'){
            // alert("hundred");
            $("#revnubound_range option").not(':first-child').each(function (index) {
                $(this).prop('disabled', false);
            });
            // $('#revnubound_range').val($(this).val());
        }
        else if($(this).attr('id') == 'revnlbound_range' && $(this).val() == 'million'){
            // alert("million");
            var check = "hundred";
            $('option[disabled]').prop('disabled', false);
            $('select').each(function() {
            $('#revnubound_range').not(this).find('option[value="' + check + '"]').prop('disabled', true); 
            });
            // $('#revnubound_range').val($(this).val());
        } 
        else if($(this).attr('id') == 'revnlbound_range' && $(this).val() == 'billion'){
            var check = "hundred";
            var check2 = "million";
            $('option[disabled]').prop('disabled', false);
            // $('#revnubound_range').val($(this).val());
            $('select').each(function() {
                $('#revnubound_range').not(this).find('option[value="' + check + '"]').prop('disabled', true); 
                $('#revnubound_range').not(this).find('option[value="' + check2 + '"]').prop('disabled', true); 
            });
            
        } 
        else if($(this).attr('id') == 'revnlbound_range' && $(this).val() == 'trillion'){
            // alert($(this).val());
            // $('#revnubound_range').val($(this).val());
            $("#revnubound_range option").not(':last-child').each(function (index) {
                $(this).prop('disabled', true);
            });
            
        }  
    });

    $('#revnubound_range').change(function()
    {
        var revnlbound_range = $('#revnlbound_range').val();
        var revnubound = $('#revnubound').val();
        var revnlbound = $('#revnlbound').val();
        var revnubound_range = $(this).val();
        $("#revnubound_msg").html("");
        if( revnubound_range == revnlbound_range)
        {
            if(revnubound < revnlbound)
            {
                $("#revnubound_msg").html("<p><strong>Upper Revenue must be greater than greater lower revenue!</strong></p>");
                return;
            }
            
        }
    });

    $('#revnlbound').change(function(){
        
        if($(this).attr('id') == 'revnlbound' && $(this).val() != null){
            var revnlbound = $(this).val();
            
            if (revnlbound != '')
            {
                $('#revnubound').prop('disabled', false);
                $('#revnubound_range').prop('disabled', false);
            }
            if(revnlbound > 10){
                if(revnlbound % 10 == 0)
                {
                    $("#revnlbound_msg").html("");
                }
                else
                {
                    $("#revnlbound_msg").html("<p><strong>Number should (* 10).</strong></p>");
                    return;
                }
            }
            
        }
    });

    $('#revnubound').change(function(){
        
        if($(this).attr('id') == 'revnubound' && $(this).val() != null){
            var revnubound = $(this).val();
           
            if(revnubound > 10){
                if(revnubound % 10 == 0)
                {
                    $("#revnubound_msg").html("");
                    //alert("prime");
                }
                else
                {
                    // alert("Please enter revenue multiple of 10");
                    $("#revnubound_msg").html("<p><strong>Number should (* 10).</strong></p>");
                    return;
                }
            }
            
        }
    });
});
</script>
<script>
var base_url = "<?php echo base_url() ?>";
$(document).ready(function () {
    // Handler for .ready() called.
    $('html, body').animate({
        scrollTop: $('#camp_form').offset().top
    }, 'slow');
});

// $(document).ready(function() {
//     var elements = $('.section').hide();
//     $('#emplzid').bind('change', function() {
//         // alert("test");
//         var elements = $('.section').hide(); // hide all the elements
//         var value = $(this).val();
//         // alert(value);

//         if (value == "emp_other") { // if somethings' selected
//             var elements = $('.section').show();
//             // $('#emplzid').children().hide();
//             elements.filter('.' + value).show(); // show the ones we want
//         }
//     }).trigger('change');
    
    // $('.second-level-select').bind('change', function() {
    //     var elements = $('div.second-level-container').children().hide(); // hide all the elements
    //     var value = $(this).val();

    //     if (value.length) { // if somethings' selected
    //         elements.filter('.' + value).show(); // show the ones we want
    //     }
    // }).trigger('change');
// });
// $(document).ready(function() {
    // var elements = $('.panel').hide();
    // $('#revid').bind('change', function() {
    //     // alert("test");
    //     var elements = $('.panel').hide(); // hide all the elements
    //     var value = $(this).val();
    //     // alert(value);

    //     if (value == "rev_other") { // if somethings' selected
    //         var elements = $('.panel').show();
    //         // $('#revid').children().hide();
    //         elements.filter('.' + value).show(); // show the ones we want
    //     }
    // }).trigger('change');
    
    // $('.second-level-select').bind('change', function() {
    //     var elements = $('div.second-level-container').children().hide(); // hide all the elements
    //     var value = $(this).val();

    //     if (value.length) { // if somethings' selected
    //         elements.filter('.' + value).show(); // show the ones we want
    //     }
    // }).trigger('change');
// });

// campaign id numeric validation code
function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}
//Campaign Name no special character allowed validation code
$(function () {
        $("#campaign_name").keypress(function (e) {
            var keyCode = e.keyCode || e.which;
 
            $("#campaign_name_msg").html("");
 
            //Regex for Valid Characters i.e. Alphabets and Numbers.
            var regex = /^[A-Za-z0-9 ]+$/;
 
            //Validate TextBox value against the Regex.
            var isValid = regex.test(String.fromCharCode(keyCode));
            if (!isValid) {
                $("#campaign_name_msg").html("Only Alphabets and Numbers allowed.");
            }
 
            return isValid;
        });
    });

    $(document).ready(function()
    {
        $('#sub_region_id').prop('disabled', true);
        $('#country_id').prop('disabled', true);
        $('#industrycd').prop('disabled', true);
        $('#desid').prop('disabled', true);
    // City change
    $('#region_id').change(function(){
    
    
    var region_id = $(this).val();
    if (region_id != '')
    {
        $('#sub_region_id').prop('disabled', false);
    }
    // alert(region_id);
    // AJAX request
    $.ajax({
        url:'<?php echo base_url("campaigns/getSubRegion");?>',
        method: 'get',
        data: {region_id: region_id},
        dataType: 'json',
        success: function(response){

        //    Remove options 
       $('#sub_region_id').find('option').not(':first').remove();

        //    Add options
       $.each(response,function(index,data){
          $('#sub_region_id').append('<option value="'+data['intercodederived']+'">'+data['intermedtregion']+'</option>');
        });
        }
    });
});

 // City change
 $('#sub_region_id').change(function(){
    var sub_region_id = $(this).val();
    if (sub_region_id != '')
    {
        $('#country_id').prop('disabled', false);
    }
    // alert(sub_region_id);
    // AJAX request
    $.ajax({
        url:'<?php echo base_url("campaigns/getCountry");?>',
        method: 'get',
        data: {sub_region_id: sub_region_id},
        dataType: 'json',
        success: function(response){

        //    Remove options 
       $('#country_id').find('option').not(':first').remove();

        //    Add options
       $.each(response,function(index,data){
          $('#country_id').append('<option value="'+data['countrycd']+'">'+data['countryname']+'</option>');
          
        });
        $('#country_id').multiselect("rebuild");
        }
    });
});

$(function() {
$('#country_id')
    .multiselect({
    allSelectedText: 'All',
    maxHeight: 200,
    includeSelectAllOption: true
    })
    .multiselect('selectAll', false)
    .multiselect('updateButtonText');
});
$(function() {
$('#industrycd')
    .multiselect({
    allSelectedText: 'All',
    maxHeight: 200,
    includeSelectAllOption: true
    })
    .multiselect('selectAll', false)
    .multiselect('updateButtonText');
});
$(function() {
$('#desid')
    .multiselect({
    allSelectedText: 'All',
    maxHeight: 200,
    includeSelectAllOption: true
    })
    .multiselect('selectAll', false)
    .multiselect('updateButtonText');
});
//  Get sub industry
 $('#sector_id').change(function(){
    var sector_id = $(this).val();
    if (region_id != '')
    {
        $('#industrycd').prop('disabled', false);
    }
    // alert(sector_id);
    // AJAX request
    $.ajax({
        url:'<?php echo base_url("campaigns/getIndustry");?>',
        method: 'get',
        data: {sector_id: sector_id},
        dataType: 'json',
        success: function(response){

        //    Remove options 
       $('#industrycd').find('option').not(':first').remove();

        //    Add options
       $.each(response,function(index,data){
          $('#industrycd').append('<option value="'+data['subindustrycd']+'">'+data['subindustry']+'</option>');
        });
        $('#industrycd').multiselect("rebuild");
        }
    });
});

//  Get Job Title
$('#levelid').change(function(){
    var levelid = $(this).val();
    if (levelid != '')
    {
        $('#desid').prop('disabled', false);
    }
    // alert(levelid);
    var url = '<?php echo base_url("campaigns/getJobTitle")?>';
    console.log(url+'?levelid='+levelid);
    // AJAX request
    $.ajax({
        url:'<?php echo base_url("campaigns/getJobTitle");?>',
        method: 'get',
        data: {levelid: levelid},
        dataType: 'json',
        success: function(response){

        //    Remove options 
       $('#desid').find('option').not(':first').remove();

        //    Add options
       $.each(response,function(index,data){
          $('#desid').append('<option value="'+data['jid']+'">'+data['joblist']+'</option>');
        });
        $('#desid').multiselect("rebuild");
        }
    });
});
});



// $('#region_id').on("select2:select", function (e) { 
//     alert("tesdt");
//            var data = e.params.data.text;
//            if(data=='all'){
//             $("#region_id > option").prop("selected","selected");
//             $("#region_id").trigger("change");
//            }
//       });
// $(document).ready(function() {
    // var elements = $('.panel').hide();
    // $('#region_id').bind('change', function() {
    //     // alert("test");
    //     // var elements = $('.panel').hide(); // hide all the elements
    //     var value = $(this).val();
    //     // alert(value);

    //     if (value == "all") { // if somethings' selected
    //         $("#region_id > option").prop("selected","selected");
    //         $("#region_id").trigger("change");
    //     }
    // }).trigger('change');
    
    // $('#country_id').bind('change', function() {
    //     // alert("test");
    //     // var elements = $('.panel').hide(); // hide all the elements
    //     var value = $(this).val();
    //     // alert(value);

    //     if (value == "all") { // if somethings' selected
    //         $("#country_id > option").prop("selected","selected");
    //         $("#country_id").trigger("change");
    //     }
    // }).trigger('change');
    // $('.second-level-select').bind('change', function() {
    //     var elements = $('div.second-level-container').children().hide(); // hide all the elements
    //     var value = $(this).val();

    //     if (value.length) { // if somethings' selected
    //         elements.filter('.' + value).show(); // show the ones we want
    //     }
    // }).trigger('change');
// });
</script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.2/css/bootstrap.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />
<style>
.caret{
    display:none;
}
.dropdown-toggle::after {
    display: inline-block;
    width: 0;
    height: 0;
    margin-left: 10.0em;
    /* vertical-align: middle; */
    content: "";
    /* border-top: .3em solid;
    border-right: .3em solid transparent;
    border-left: .3em solid transparent; */
}
</style>
<div class="page-header">
    <div class="page-header-title">
        <h4>Campaigns</h4>
    </div>
    <div class="page-header-breadcrumb">
        <!-- <ul class="breadcrumb-title">
            <li class="breadcrumb-item">
                <a href="index-2.html">
                    <i class="icofont icofont-home"></i>
                </a>
            </li>
            <li class="breadcrumb-item"><a href="#!">Campaigns</a>
            </li>
            <li class="breadcrumb-item"><a href="#!">Add Campaign</a>
            </li>
        </ul> -->
    </div>
</div>
<!-- Page header end -->
<!-- Page body start -->
<div class="page-body">
    <div class="row">
        <div class="col-sm-12">
            <!-- Basic Form Inputs card start -->
            <div class="card" id="camp_form">
                <!-- <div class="card-header">
                    <h5>Add Campaign</h5>
                    <div class="card-header-right">
                        <i class="icofont icofont-rounded-down"></i>
                        <i class="icofont icofont-refresh"></i>
                        <i class="icofont icofont-close-circled"></i>
                    </div>
                </div> -->
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
                                <label  class="col-lable"><b>Client Id</b></label>
                                 <select name="client_id" id="client_id"  <?php echo (form_error('client_id')) ? 'class="form-control form-control-sm form-control-danger"' : 'class="form-control form-control-sm"';?>>
                                      <option value="<?php echo set_select('client_id'); ?>">Select One Client ID</option>
                                <?php foreach ($clients as $client): ?>
                                    <option value="<?php echo $client['clientid']; ?>"><?php echo $client['clientcode']; ?></option>
                                <?php endforeach; ?>
                                </select>
                                <span style='color:#FF0000' id="client_id_msg"></span>
                            </div>
                            <div class="col-sm-3">
                                <label class="col-lable"><b>Campaign Id</b></label>
                                 <?php // echo form_error('campaign_id'); ?>
                                <input type="text" style="height:30px;" name="campaign_id" id="campaign_id" placeholder="EnterCampaign ID" value="<?php echo set_value('campaign_id'); ?>" 
                                <?php echo (form_error('campaign_id')) ? 'class="form-control form-control-sm form-control-danger"' : 'class="form-control form-control-sm"';?>  onkeypress="return isNumber(event)">
                                <span style='color:#FF0000' id="campaign_id_msg"></span>
                            </div>
                            <div class="col-sm-3">
                                <label class="col-lable"><b>Campaign Name</b></label>

                                <?php // echo form_error('campaign_name'); ?>
                                <input type="text" style="height:30px;" pattern="^[a-zA-Z0-9]+$"  name="campaign_name"  placeholder="Enter Campaign Name"  value="<?php echo set_value('campaign_name'); ?>" id="campaign_name" 
                                <?php echo (form_error('campaign_name')) ? 'class="form-control form-control-sm form-control-danger"' :'class="form-control form-control-sm"';?> >
                                <span style='color:#FF0000' id="campaign_name_msg"></span>
                            </div>
                            <div class="col-sm-3">
                                <label class="col-lable"><b>Department</b></label><?php echo form_error('dcd'); ?>
                                <select class="js-example-basic-multiple col-sm-12 form-control-sm" multiple="multiple" name="dcd[]" id="dcd">
                                <option value="0">All</option>
                                   <?php foreach ($departments as $dept): ?>
                                    <option value="<?php echo $dept['dcd']; ?>"><?php echo $dept['department']; ?></option>
                                <?php endforeach; ?>
                                </select>
                            </div>
                            
                        </div>
                      
                        <!-- <div class="form-group row">
                            <div class="col-sm-3">
                                <label class="col-lable"><b>Campaign Name</b></label>

                                <?php // echo form_error('campaign_name'); ?>
                                <input type="text"  name="campaign_name"  placeholder="Enter Campaign Name"  value="<?php echo set_value('campaign_name'); ?>" id="campaign_name" 
                             <?php //echo (form_error('campaign_name')) ? 'class="form-control form-control-danger"' :'class="form-control"';?> >
                            </div>
                        </div> -->


                        <div class="form-group row">
                            <div class="col-sm-3">
                                <label class="col-lable"><b>World Region</b></label>
                                <select class="js-example-basic-multiple col-sm-12 form-control-sm region" multiple="multiple" name="region_id[]" id="region_id">
                                <option value="0">All</option>
                                <?php foreach ($regions as $region): ?>
                                    <option value="<?php echo $region['regioncode']; ?>"><?php echo $region['region']; ?></option>
                                <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <label class="col-lable"><b>Sub Region</b></label>  <?php echo form_error('country_id'); ?>
                                <select class="js-example-basic-multiple col-sm-12 form-control-sm" multiple="multiple" name="sub_region_id[]" id="sub_region_id">
                               
                                <option value="0">All</option>
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <label class="col-lable"><b>Country</b></label>  <?php echo form_error('country_id'); ?>
                                <select style="width:500px;" class="js-example-basic multiselect col-sm-12 form-control-sm" multiple="multiple" name="country_id[]" id="country_id">
                               
                                <!-- <option value="0">All</option> -->
                                </select>
                            </div>
                            
                           
                            </div>
                            <div class="form-group row">
                            <div class="col-sm-3">
                                <label class="col-lable"><b>Sector (Industry)</b></label>
                                <select class="js-example-basic-multiple col-sm-12 form-control-sm" multiple="multiple" name="sector_id[]" id="sector_id">
                                <option value="0">All</option>
                                <?php foreach ($industries as $industry): ?>
                                    <option value="<?php echo $industry['industrycd']; ?>"><?php echo $industry['industry']; ?></option>
                                <?php endforeach; ?>
                                
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <label class="col-lable"><b>Sub Industry</b></label><?php echo form_error('industrycd'); ?>
                                <select class="js-example-basic multiselect col-sm-12 form-control-sm" multiple="multiple" name="industrycd[]" id="industrycd">
                                <!-- <option value="0">All</option> -->
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <label class="col-lable"><b>Job Level</b></label>
                              <select class="js-example-basic-multiple col-sm-12 form-control-sm" multiple="multiple" name="levelid[]" id="levelid">
                              <option value="0">All</option>
                              <?php foreach ($designation as $designation): ?>
                                    <option value="<?php echo $designation['joblids']; ?>"><?php echo $designation['joblevel']; ?></option>
                                <?php endforeach; ?>
                                   
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <label class="col-lable"><b>Designation [Job Title]</b></label><?php echo form_error('desid'); ?>
                              <select class="js-example-basic multiselect col-sm-12 form-control-sm" multiple="multiple" name="desid[]" id="desid">
                              <!-- <option value="0">All</option> -->
                               
                                   
                                </select>
                            </div>
                        </div>
                        <!-- <div class="form-group row">
                            <div class="col-sm-6">
                                <label class="col-lable"><b>Industry</b></label><?php //echo form_error('industrycd'); ?>
                                <select class="js-example-basic-multiple col-sm-12" multiple="multiple" name="industrycd[]" id="industrycd">
                                     <?php //foreach ($industries as $industry): ?>
                                    <option value="<?php //echo $industry['industrycd']; ?>"><?php //echo $industry['industry']; ?></option>
                                <?php //endforeach; ?>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label class="col-lable"><b>Department</b></label><?php //echo form_error('dcd'); ?>
                                <select class="js-example-basic-multiple col-sm-12" multiple="multiple" name="dcd[]" id="dcd">
                                   <?php //foreach ($departments as $dept): ?>
                                    <option value="<?php //echo $dept['dcd']; ?>"><?php //echo $dept['department']; ?></option>
                                <?php //endforeach; ?>
                                </select>
                            </div>
                        </div> -->
                        <hr>
                        <div class="form-group row">
                           
                           <div class="col-sm-2">
                               <label class="f-left col-lable"><b>Suppression List</b> </label>
                           </div>
                           <div class="col-sm-1" id="mybtn"> 
                               <input type="checkbox" class="js-small f-right suppclass" name="suppchk" id="uho" value="" >
                           </div>
                           <div class="col-sm-2">
                               <label class="f-left col-lable"><b>Inclusion Account List  </b> </label>
                           </div>
                           <div class="col-sm-1"> 
                               <input type="checkbox" class="js-small f-right" name="inclist[]" value="" id="inclist">
                           </div>
                           <div class="col-sm-2">
                               <label class="f-left col-lable"><b>CDQA Needed?</b> </label>
                           </div>
                           <div class="col-sm-1">
                            <input type="checkbox" class="js-small f-right" name="cdqa[]" value="" id="cdqa">
                              </div>

                              <div class="col-sm-2">
                               <label class="f-left col-lable"><b>Asset Title</b> </label>
                           </div>
                           <div class="col-sm-1">
                            <input type="checkbox" class="js-small f-right" name="assetid[]" value="" id="assetid">
                              </div>
                           <!-- <div class="col-sm-4">   
                               <input type="file" name="files[]" class="form-control">
                           </div> -->
                                
                       </div>
                       <hr>
                        <div class="form-group row">
                            <div class="col-sm-2 ">
                                    
                                <label class="col-lable"><b>Employee Lower Bound</b></label>
                                <input type="text"  style="height:30px;"  name="emplbound"  placeholder="Emp Lower Bound"  id="emplbound" class="form-control form-control-sm" onkeypress="return isNumber(event)" >
                                <!-- <select class="second-level-select form-control form-control-sm"  name="emplbound" id="emplbound">
                                    <?php //foreach ($ubound as $ubound): ?>
                                    <option value="<?php //echo $ubound['emplbound']; ?>"><?php// echo $ubound['emplbound']; ?></option>
                                    <?php //endforeach; ?>
                                </select> -->
                            </div>
                            <div class="col-sm-2 ">
                                <label class="col-lable"><b>Employee Upper Bound</b></label><?php echo form_error('empubound'); ?>
                                <input type="text"  style="height:30px;"  name="empubound"  placeholder="Emp Upper Bound"  id="empubound" class="form-control form-control-sm" onkeypress="return isNumber(event)" >
                                <!-- <select class="second-level-select form-control form-control-sm"  name="empubound" id="empubound">
                                    <?php //foreach ($lbound as $lbound): ?>
                                    <option value="<?php //echo $lbound['empubound']; ?>"><?php //echo $lbound['empubound']; ?></option>
                                    <?php //endforeach; ?>
                                </select> -->
                            </div>
                            <div class="col-sm-2">
                                <label class="col-lable"><b>Frequency Type</b></label>
                                <select class="js-example-basic col-sm-12 form-control-sm"   name="frequency_type" id="frequency_type">
                                 
                                <?php foreach ($frequency_type as $frequency_type): ?>
                                    <option value="<?php echo $frequency_type['fids']; ?>"><?php echo ucfirst($frequency_type['freqtype']); ?></option>
                                <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <label class="col-lable"><b>Frequency</b></label>
                                <select class="js-example-basic-multiple col-sm-12 form-control-sm" multiple="multiple" name="frequency[]" id="frequency">
                                <option value="0">All</option>
                                <?php foreach ($frequency as $frequency): ?>
                                    <option value="<?php echo $frequency['fdid']; ?>"><?php echo $frequency['days']; ?></option>
                                <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-sm-2">   
                            <label class="f-left col-lable"><b>No. of Questions</b><br> <?php echo form_error('quantity'); ?></label>
                                <input  type="number" style="height:30px;" id="quantity" name="quantity" min="1" max="12" maxlength="2" 
                                <?php echo (form_error('quantity')) ? 'class="form-control form-control-danger form-control-sm"' :'class="form-control form-control-sm"';?> >
                            </div>
                            <!-- </div>
                        </div> -->
                        
                        </div>
                        <div class="form-group row">
                            
                            <!-- <div class="col-sm-2">
                                    <label class="col-lable"><b>Revenue Size</b></label><?php //echo form_error('revid'); ?>
                                    <select class="form-control form-control-sm" name="revid[]" id="revid">
                                        <?php// foreach ($revsize as $revsize): ?>
                                            <option value="<?php //echo $revsize['comzid']; ?>"><?php //echo $revsize['rangelist']; ?></option>
                                        <?php// endforeach; ?>
                                        <option value="rev_other">Other</option>
                                    </select>
                            </div> -->
                            <!-- <div class="panel"> -->
                            <!-- <div class="col-sm-9"> -->
                            
                            <div class="col-sm-2 ">
                                <!-- <div class="senior-airman"> -->
                                <label class="col-lable"><b>Revenue Lower Bound</b></label>
                                <input type="text"  style="height:30px;"  name="revnlbound" step="5"  placeholder="Rev Lower Bound"  id="revnlbound" class="form-control form-control-sm" onkeypress="return isNumber(event)" >
                                <span style='color:#FF0000' id="revnlbound_msg"></span>
                                <!-- <select class="second-level-select form-control form-control-sm"  name="revnlbound" id="revnlbound">
                                <option value="">Select </option>
                                    <?php //foreach ($revnubound as $revnubound): ?>
                                    <option value="<?php //echo $revnubound['revnlbound']; ?>"><?php //echo $revnubound['revnlbound']; ?></option>
                                    <?php //endforeach; ?>
                                </select> -->
                                <!-- </div> -->
                            </div>
                            <div class="col-sm-2 ">
                                <label class="col-lable "><b>NM List Bound</b></label>

                                <select name="selectstatus" class="form-control form-control-sm form-control-default" id="revnlbound_range">
                                    <option value="">Select </option>
                                    <option value="hundred">Hundred Thousand </option>
                                    <option value="million">Million</option>
                                    <option value="billion">Billion</option>
                                    <option value="trillion">Trillion </option>
                                </select>
                            </div>
                            <div class="col-sm-2 ">
                                
                                <!-- <div class="airman"> -->
                                    <label class="col-lable"><b>Revenue Upper Bound</b></label>
                                    <input type="text"  style="height:30px;"  name="revnubound"  placeholder="Rev Upper Bound"  id="revnubound" class="form-control form-control-sm" onkeypress="return isNumber(event)" >
                                    <span style='color:#FF0000' id="revnubound_msg"></span>
                                    <!-- <select class="second-level-select form-control form-control-sm"  name="revnubound" id="revnubound">
                                    <option value="">Select </option>
                                        <?php //foreach ($revnlbound as $revnlbound): ?>
                                          
                                        <option value="<?php //echo $revnlbound['revnubound']; ?>"><?php //echo $revnlbound['revnubound']; ?></option>
                                        <?php //endforeach; ?>
                                    </select> -->
                                <!-- </div> -->
                            </div>
                            <div class="col-sm-2 ">
                                <label class="col-lable "><b>NM List Bound</b></label>

                                <select name="selectstatus" class="form-control form-control-sm form-control-default" id="revnubound_range">
                                    <option value="">Select </option>
                                    <option value="hundred">Hundred Thousand </option>
                                    <option value="million">Million</option>
                                    <option value="billion">Billion</option>
                                    <option value="trillion">Trillion</option>
                                    
                                </select>
                            </div>
                              
                            <!-- </div> -->
                            

                        </div>

                        <!-- <div class="form-group row">
                        <div class="col-sm-3">
                                <label class="col-lable"><b>Select Designation</b></label><?php echo form_error('desid'); ?>
                              <select class="js-example-basic-multiple col-sm-12" multiple="multiple" name="desid[]" id="desid">
                                <?php foreach ($designation as $designation): ?>
                                    <option value="<?php echo $designation['tid']; ?>"><?php echo $designation['designation']; ?></option>
                                <?php endforeach; ?>
                                   
                                </select>
                            </div>
                        </div> -->

                        
                        
                       
                        <!-- <div class="form-group row">
                            
                            
                        </div> -->
                        <hr>
                        <div class="form-group row">
                              <div class="col-sm-3">
                                <label class="col-lable"><b>Current Status</b></label>

                                <select name="selectstatus" class="form-control form-control-default form-control-sm" id="selectstatus">
                                    <option value="2">Open</option>
                                    <option value="1">Closed</option>
                                    <option value="3">Hold</option>
                                </select>
                                <span style='color:#FF0000' id="selectstatus_msg"></span>
                            </div>

                            <div class="col-sm-3">
                                <label class="col-lable"><b>Start Date</b></label> 
                                <input type="text" style="height:30px;" id="startdt"  name="startdt"   <?php echo (form_error('startdt')) ? 'class="form-control form-control-danger form-control-sm"' :'class="form-control form-control-sm"';?>>
                                <span style='color:#FF0000' id="startdt_msg"></span>
                            </div>
                            <div class="col-sm-3">
                                <label class="col-lable"><b>Est Completion Date</b></label> <?php echo form_error('estclosedt'); ?>
                                <input type="text" style="height:30px;" id="estclosedt"  name="estclosedt" value="<?php echo set_value('estclosedt');?>" <?php echo (form_error('estclosedt')) ? 'class="form-control form-control-danger form-control-sm"' :'class="form-control form-control-sm"';?> >
                            </div>
                            <div class="col-sm-3">
                                <label class="col-lable"><b>Select Period</b></label>
                                <select class="form-control form-control-default form-control-sm "  name="period" id="period">
                                <option value="1">1 Month<option>
                                <option value="2">2 Month<option>
                                <option value="3">3 Month<option>
                                <option value="4">4 Month<option>
                                <option value="5">5 Month<option>
                                <option value="6" selected>6 Month<option>
                                </select>
                            
                            </div>

                        </div>
                        
                        
                        
                        <!-- <div class="form-group row">
                            <div class="col-sm-6">
                                <label class="col-lable"><b>Est Completion Date</b></label> <?php echo form_error('estclosedt'); ?>
                                <input type="date" id="estclosedt"  name="estclosedt" value="<?php echo set_value('estclosedt');?>" <?php echo (form_error('estclosedt')) ? 'class="form-control form-control-danger"' :'class="form-control"';?> >
                            </div>
                            <div class="col-sm-6">
                                <label class="col-lable"><b>Start Date</b></label> <?php echo form_error('startdt'); ?>
                                <input type="date" id="startdt"  name="startdt" value="<?php echo set_value('startdt');?>"  <?php echo (form_error('startdt')) ? 'class="form-control form-control-danger"' :'class="form-control"';?>>
                            </div>
                        </div> -->


                        <div class="form-group row">

                            <div class="col-sm-6">
                                <button  name="submit" class="btn btn-primary"  id="addcampbtn">Add Campaign</button>
                            </div>
                             
                        </div>
                        <!--<textarea id="description" style="visibility: hidden;"></textarea>-->

                        <!-- </form> -->
                    </div>
                           
                </div>
            </div>
        </div>
        <!-- Basic Form Inputs card end -->


    
<script>
    $(function() {
        $("#addcampbtn").on('click', function() 
        {
            var campaign_id = $('#campaign_id').val();
            var client_id = $('#client_id').val();
            var campaign_name = $('#campaign_name').val();
            var country_id = $('#country_id').val(); 
            var region_id = $('#region_id').val();
            alert(region_id);
            // var theRemovedElement = region_id.shift();  
            var industrycd = $('#industrycd').val(); 
            // alert(industrycd);
            var dcd = $('#dcd').val(); 
            // var emplzid = $('#emplzid').val(); 
            
            var desid = $('#desid').val();
            var emplbound = $('#emplbound').val();
            var empubound = $('#empubound').val();
            var revnlbound = $('#revnlbound').val();
            var revnubound = $('#revnubound').val();
            var revnlbound_range = $('#revnlbound_range').val();
            var revnubound_range = $('#revnubound_range').val();
            var startdt = $('#startdt').val();
            var selectstatus = $('#selectstatus').val();
            var frequency_type = $('#frequency_type').val();
            var frequency = $('#frequency').val();
            var period = $('#period').val(); 
            alert(period);
            //alert(revnlbound+ "" + emplbound);
            $("#client_id_msg").html("");
            $("#campaign_id_msg").html("");
            $("#campaign_name_msg").html("");
            if(client_id == null || client_id == '')
            {
                $("#client_id_msg").html("<p><strong>Please fill this.</strong></p>");
                return;
            }
            if(campaign_id == null || campaign_id == '')
            {
                $("#campaign_id_msg").html("<p><strong>Please fill this.</strong></p>");
                return;
            }
            if(startdt == null || startdt == '')
            {
                $("#startdt_msg").html("<p><strong>Please fill this.</strong></p>");
                return;
            }
            if(selectstatus == null || selectstatus == '')
            {
                $("#selectstatus_msg").html("<p><strong>Please fill this.</strong></p>");
                return;
            }
            
            var checksupp = $('#uho').prop('checked');
            if(checksupp == true)
            {
                checksupp = 1;
            }
            else
            {
                checksupp = 0;
            }
            var inclist =$('#inclist').prop('checked');
            if(inclist == true)
            {
                inclist = 1;
            }
            else
            {
                inclist = 0;
            }
            var cdqa = $('#cdqa').prop('checked');
            if(cdqa == true)
            {
                cdqa = 1;
            }
            else
            {
                cdqa = 0;
            }
            var assetid = $('#assetid').prop('checked');
            if(assetid == true)
            {
                assetid = 1;
            }
            else
            {
                assetid = 0;
            }
            var quantity = $('#quantity').val();
            var estclosedt = $('#estclosedt').val();
           
            var url = "<?php echo base_url("campaigns/ajax_add_new_campaign1");?>";
            console.log(url+"?campaign_id="+campaign_id+"&client_id="+client_id+"&campaign_name="+campaign_name+"&region_id="+region_id+"&industrycd="+industrycd+"&country_id="+country_id+"&dcd="+dcd+"&desid="+desid+"&checksupp="+checksupp+"&inclist="+inclist+"&cdqa="+cdqa+"&assetid="+assetid+"&quantity="+quantity+"&selectstatus="+selectstatus+"&estclosedt="+estclosedt+"&startdt="+startdt+"&emplbound="+emplbound+"&empubound="+empubound+"&revnlbound="+revnlbound+"&revnubound="+revnubound+"&revnlbound_range="+revnlbound_range+"&revnubound_range="+revnubound_range+"&frequency_type="+frequency_type+"&frequency="+frequency);
            $.ajax({
                url :'<?php echo base_url("campaigns/ajax_add_new_campaign1");?>',
                type: 'GET', 
                dataType: 'json',              
                data: {
					campaign_id: campaign_id,
                    client_id:client_id,
					campaign_name: campaign_name,
                    country_id:country_id,
                    region_id:region_id,
                    industrycd:industrycd,
                    dcd:dcd,
                    desid:desid,
                    checksupp:checksupp,
                    inclist:inclist,
                    cdqa:cdqa,
                    assetid:assetid,
                    quantity:quantity,
                    selectstatus:selectstatus,
                    estclosedt:estclosedt,
                    startdt:startdt,
                    emplbound:emplbound,
                    empubound:empubound,
                    revnlbound:revnlbound,
                    revnubound:revnubound,
                    revnlbound_range:revnlbound_range,
                    revnubound_range:revnubound_range,
                    frequency_type:frequency_type,
                    frequency:frequency,
                    period:period
				},
                cache: false,
                success: function(response){
                    var text = response.statusCode;
                    console.log("check");
                   
                    if(response.statusCode == "Success") 
                    {                        
                        $("#addcampbtn").html(response.message);
                        // $("#addcampbtn").prop('disabled', true);
                        top.location.href=base_url+"campaigns/addsuppressionList?camp_id="+response.campaign_id;//redirection
                    }else if(response.statusCode=="Fail")
                    {
                        $("#addcampbtn").html(response.message);
                        
					}

                   

                }
              
            });
        });
    });
</script>
                                    
    <script>
       
  
  $( document ).ready(function() {
    
    
//      $('#mybtn').click(function(){
//          alert($('#uho').prop('checked'));
//             if($('#uho').prop('checked')){
//                 alert($('#uho').val());
//                 $("#Modal-overflow").modal('show');
//             }else{
//                 alert($('#uho').val());
//             }
//      });
      $('#cancelSuppbtn').click(function(){
            $( "#uho" ).prop( "checked", false );
//            alert($('#uho').prop('checked'));
//                $('#mybtn').empty();
             $('#mybtn').append('<input type="checkbox"  class="js-small f-right suppclass form-control" name="suppchk" id="uho"/> ');
               
      });
    
 
});
 
     
 
    </script>
  