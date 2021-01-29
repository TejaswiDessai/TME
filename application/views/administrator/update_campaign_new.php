<style>
    .multiselect-container{position:absolute;list-style-type:none;margin:0;padding:0}.multiselect-container .input-group{margin:5px}.multiselect-container>li{padding:0}.multiselect-container>li>a.multiselect-all label{font-weight:700}.multiselect-container>li>label.multiselect-group{margin:0;padding:3px 20px;height:100%;font-weight:700}.multiselect-container>li>a{padding:0}.multiselect-container>li>a>label{margin:0;height:100%;cursor:pointer;font-weight:400;padding:3px 20px 3px 40px}.multiselect-container>li>a>label.radio,.multiselect-container>li>a>label.checkbox{margin:0}.multiselect-container>li>a>label>input[type=checkbox]{margin-bottom:5px}.btn-group>.btn-group:nth-child(2)>.multiselect.btn{border-top-left-radius:4px;border-bottom-left-radius:4px}.form-inline .multiselect-container label.checkbox,.form-inline .multiselect-container label.radio{padding:3px 20px 3px 40px}.form-inline .multiselect-container li a label.checkbox input[type=checkbox],.form-inline .multiselect-container li a label.radio input[type=radio]{margin-left:-20px;margin-right:0}

    #myModal .modal-body 
    { 
        min-height: 400px;
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

// campaign id numeric validation code
function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}
// Campaign Name no special character allowed validation code
$(function () {
        $("#campaign_name").keypress(function (e) {
            var keyCode = e.keyCode || e.which;
 
            $("#campaign_name_msg").html("");
 
            //Regex for Valid Characters i.e. Alphabets and Numbers.
            var regex = /^[A-Za-z0-9]+$/;
 
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
        // $('#sub_region_id').prop('disabled', true);
        // $('#country_id').prop('disabled', true);
        // $('#industrycd').prop('disabled', true);
        // $('#desid').prop('disabled', true);
    // City change
    $('#region_id').change(function(){
    
    // $('#region_id').prop('disabled', false);
    var region_id = $(this).val();
    if (region_id != '')
    {
        $('#sub_region_id').prop('disabled', false);
    }
    // if(region_id == 0)
    // {
    //     $('#region_id').prop('disabled', true);
    // }
    // alert(region_id);
    // AJAX request
    $.ajax({
        url:'<?php echo base_url("campaigns/getSubRegion");?>',
        method: 'get',
        data: {region_id: region_id},
        dataType: 'json',
        success: function(response){

        //    Remove options 
       $('#sub_region_id').find('option').remove();

        //    Add options
       $.each(response,function(index,data){
          $('#sub_region_id').append('<option value="'+data['subregioncode']+'">'+data['subregion']+'</option>');
        });
        }
    });
});

 // City change
 $('#sub_region_id').change(function(){
    var sub_region_id = $(this).val();
    var region_id = $('#region_id').val();
    if (sub_region_id != '')
    {
        $('#country_id').prop('disabled', false);
    }
    // alert(sub_region_id);
    // AJAX request
    $.ajax({
        url:'<?php echo base_url("campaigns/getCountry");?>',
        method: 'get',
        data: {sub_region_id: sub_region_id,region_id:region_id},
        dataType: 'json',
        success: function(response){

        //    Remove options 
       $('#country_id').find('option').remove();

        //    Add options
       $.each(response,function(index,data){
          $('#country_id').append('<option value="'+data['countrycd']+'">'+data['countryname']+'</option>');
          
        });
        $('#country_id').multiselect("rebuild");
        }
    });
});

//  Get sub industry
$('#sector_id').change(function(){
    var sector_id = $(this).val();
    if (sector_id != '')
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
       $('#subindustrycd').find('option').remove();

        //    Add options
       $.each(response,function(index,data){
          $('#subindustrycd').append('<option value="'+data['subindustrycd']+'">'+data['subindustry']+'</option>');
        });
        $('#subindustrycd').multiselect("rebuild");
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
       $('#desid').find('option').remove();

        //    Add options
       $.each(response,function(index,data){
          $('#desid').append('<option value="'+data['jid']+'">'+data['joblist']+'</option>');
        });
        $('#desid').multiselect("rebuild");
        }
    });
});

});

$(function(){
    $('#revnlbound_range').change(function(){
        
        if($(this).attr('id') == 'revnlbound_range' && $(this).val() == 'hundred'){
            // alert("hundred");
            $("#revnubound_range option").not(':first-child').each(function (index) {
                $(this).prop('disabled', false);
            });
            $('#revnubound_range').val($(this).val());
        }
        else if($(this).attr('id') == 'revnlbound_range' && $(this).val() == 'million'){
            // alert("million");
            var check = "hundred";
            $('option[disabled]').prop('disabled', false);
            $('select').each(function() {
            $('#revnubound_range').not(this).find('option[value="' + check + '"]').prop('disabled', true); 
            });
            $('#revnubound_range').val($(this).val());
        } 
        else if($(this).attr('id') == 'revnlbound_range' && $(this).val() == 'billion'){
            var check = "hundred";
            var check2 = "million";
            $('option[disabled]').prop('disabled', false);
            $('#revnubound_range').val($(this).val());
            $('select').each(function() {
                $('#revnubound_range').not(this).find('option[value="' + check + '"]').prop('disabled', true); 
                $('#revnubound_range').not(this).find('option[value="' + check2 + '"]').prop('disabled', true); 
            });
            
        } 
        else if($(this).attr('id') == 'revnlbound_range' && $(this).val() == 'trillion'){
            // alert($(this).val());
            $('#revnubound_range').val($(this).val());
            $("#revnubound_range option").not(':last-child').each(function (index) {
                $(this).prop('disabled', true);
            });
            
        }  
    });
});
</script>

<div class="page-header">
    <div class="page-header-title">
        <h4>Campaigns</h4>
    </div>
    <div class="page-header-breadcrumb">
        <ul class="breadcrumb-title">
            <li class="breadcrumb-item">
                <a href="index-2.html">
                    <i class="icofont icofont-home"></i>
                </a>
            </li>
            <li class="breadcrumb-item"><a href="#!">Campaigns</a>
            </li>
            <li class="breadcrumb-item"><a href="#!">Add Campaign</a>
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
                    <h5>Update Campaign</h5>
                    <div class="card-header-right">
                        <i class="icofont icofont-rounded-down"></i>
                        <i class="icofont icofont-refresh"></i>
                        <i class="icofont icofont-close-circled"></i>
                    </div>
                </div>
                <?php foreach($campaign_record as $post) : ?>
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
                                 <select name="client_id" id="client_id"  <?php echo (form_error('client_id')) ? 'class="form-control form-control-danger"' : 'class="form-control"';?>>
                                    <option value="<?php echo set_select('client_id'); ?>">Select One Client ID</option>
                                    
                                    <?php foreach ($clients as $client) : ?>
                                    <option value="<?php echo $post['clientids']; ?>" 
                                    <?php if($post['clientids'] == $client['clientid']){ echo "selected" ; } ?> ><?php echo $client['clientcode']; ?></option>
                                    <?php endforeach; ?>
                   
                                </select>
                                <span style='color:#FF0000' id="client_id_msg"></span>
                            </div>
                            <div class="col-sm-3">
                                <label class="col-lable"><b>Campaign Id</b></label>
                                 <?php // echo form_error('campaign_id'); ?>
                                <input type="text" name="campaign_id" id="campaign_id"  value="<?php echo $post['cids']; ?>" 
                                <?php echo (form_error('campaign_id')) ? 'class="form-control form-control-danger"' : 'class="form-control"';?>  onkeypress="return isNumber(event)">
                                <span style='color:#FF0000' id="campaign_id_msg"></span>
                            </div>
                            <div class="col-sm-3">
                                <label class="col-lable"><b>Campaign Name</b></label>

                                <?php // echo form_error('campaign_name'); ?>
                                <input type="text" pattern="^[a-zA-Z0-9]+$"  name="campaign_name"  placeholder="Enter Campaign Name"  value="<?php echo $post['campnm']; ?>" id="campaign_name" 
                                <?php echo (form_error('campaign_name')) ? 'class="form-control form-control-danger"' :'class="form-control"';?> >
                                <span style='color:#FF0000' id="campaign_name_msg"></span>
                            </div>
                            <div class="col-sm-3">
                                <label class="col-lable"><b>Department</b></label><?php echo form_error('dcd'); ?>
                                <select class="js-example-basic multiselect col-sm-12" multiple="multiple" name="dcd[]" id="dcd">
                                <?php $dcd = explode(',',$post['dcd']);?>
                                   <?php foreach ($departments as $dept): ?>
                                    <option value="<?php echo $dept['dcd']; ?>"  <?php if( in_array($dept['dcd'], $dcd)) { echo "selected" ; } ?>><?php echo $dept['department']; ?></option>
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

                                <?php
                                $HiddenProducts = explode(',',$post['regioncode']);
                                ?>
                        <div class="form-group row">
                            <div class="col-sm-3">
                                <label class="col-lable"><b>World Region</b></label>
                                <select class="js-example-basic-multiple col-sm-12" multiple="multiple" name="region_id" id="region_id">
                                <?php 
                                if($post['regioncode'] == 0)
                                {
                                    $regioncode = $post['regioncode'];
                                }
                                else
                                {
                                    $regioncode = explode(',',$post['regioncode']);
                                }
                                
                                
                                ?>
                                <?php if($regioncode == 0)
                                {
                                    ?>
                                    <option value="0" selected>All</option>
                                    <?php
                                }
                                $myArray = explode(',', $post['regioncode']);
                                ?>

                                <?php foreach ($regions as $region): ?>
                                    <option value="<?php echo $region['regioncode']; ?>" <?php if( in_array($region['regioncode'], $myArray)) { echo "selected" ; } ?>><?php echo $region['region']; ?></option>
                                <?php endforeach; ?>
                                
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <label class="col-lable"><b>Sub Region</b></label>
                                <select class="js-example-basic-multiple col-sm-12" multiple="multiple" name="sub_region_id" id="sub_region_id">
                                <?php 
                                if($post['subregioncode'] == 0)
                                {
                                    $regioncode = $post['subregioncode'];
                                }
                                else
                                {
                                    $regioncode = explode(',',$post['subregioncode']);
                                }
                                
                                
                                ?>
                                <?php if($subregioncode == 0)
                                {
                                    ?>
                                    <option value="0" selected>All</option>
                                    <?php
                                }
                                $myArray2 = explode(',', $post['subregioncode']);
                                ?>

                                <?php foreach ($subregions as $subregions): ?>
                                    <option value="<?php echo $subregions['subregioncode']; ?>" <?php if( in_array($subregions['subregioncode'], $myArray2)) { echo "selected" ; } ?>><?php echo $subregions['subregion']; ?></option>
                                <?php endforeach; ?>
                                
                                </select>
                            </div>
                            
                            <div class="col-sm-3">
                                <label class="col-lable"><b>Select Country</b></label>  <?php echo form_error('country_id'); ?>
                                <select class="js-example-basic multiselect col-sm-12" multiple="multiple" name="country_id[]" id="country_id">
                                <?php $array_country = $post['countrycd'];$countrycd = explode(',',$array_country);?>
                            <?php foreach ($countries as $country): ?>
                                    <option value="<?php echo $country['countrycd']; ?>" <?php if( in_array($country['countrycd'], $countrycd)){ echo "selected" ; } ?>><?php echo $country['countryname']; ?></option>
                                <?php endforeach; ?>
                                </select>
                            </div>
                            <!-- <div class="col-sm-3"> -->
                                <!-- <label class="col-lable"><b>Sector</b></label>
                                <select class="js-example-basic-multiple col-sm-12 form-control-sm" multiple="multiple" name="sector_id[]" id="sector_id">
                                <option value="0">All</option> -->
                                     <?php //foreach ($industries as $industry): ?>
                                    <!-- <option value="<?php //echo $industry['industrycd']; ?>"><?php //echo $industry['industry']; ?></option> -->
                                <?php// endforeach; ?>
                                <!-- </select> -->
                            <!-- </div> -->
                            
                            
                        </div>
                        <div class="form-group row">
                        <div class="col-sm-3">
                                <label class="col-lable"><b>Industry(Sector)</b></label>
                                <select class="js-example-basic-multiple col-sm-12" multiple="multiple" name="sector_id[]" id="sector_id">
                                <?php
                                if($post['industrycd'] == 0)
                                {
                                    $industrycd = $post['industrycd'];
                                }
                                else
                                {
                                    $industrycd = explode(',',$post['industrycd']);
                                }
                                if($industrycd == 0)
                                {
                                    ?>
                                    <option value="0" selected>All</option>
                                    <?php
                                }
                                $industrycd = explode(',',$post['industrycd']);?>
                                <?php foreach ($industries->result_array()  as $industry1): ?>
                                    <option value="<?php echo $industry1['industrycd']; ?>" <?php if( in_array($industry1['industrycd'], $industrycd)){ echo "selected" ; } ?>><?php echo $industry1['industry']; ?></option>
                                <?php endforeach; ?>
                                </select>
                            </div>
                        <div class="col-sm-3">
                                <label class="col-lable"><b>Sub Industry</b></label>
                                <select class="js-example-basic multiselect col-sm-12" multiple="multiple" name="subindustrycd[]" id="subindustrycd">
                                <?php $subindustrycd = explode(',',$post['subindustrycd']);?>
                                <?php foreach ($subindustries->result_array()  as $industry): ?>
                                    <option value="<?php echo $industry['subindustrycd']; ?>" <?php if( in_array($industry['subindustrycd'], $subindustrycd)){ echo "selected" ; } ?>><?php echo $industry['subindustry']; ?></option>
                                <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3">
                                <label class="col-lable"><b>Job Level</b></label>
                              <select class="js-example-basic-multiple col-sm-12 form-control-sm" multiple="multiple" name="levelid[]" id="levelid">
                              <!-- <option value="0">All</option>  -->
                              <?php 
                              if($post['joblevelids'] == 0)
                              {
                                  $joblevelids = $post['joblevelids'];
                              }
                              else
                              {
                                  $joblevelids = explode(',',$post['joblevelids']);
                              }
                              if($joblevelids == 0)
                              {
                                  ?>
                                  <option value="0" selected>All</option>
                                  <?php
                              }
                              $joblevelids = explode(',',$post['joblevelids']);
                              ?>
                                <?php foreach ($job_level->result_array() as $job_level): ?>
                                    <option value="<?php echo $job_level['joblids']; ?>" <?php if( in_array($job_level['joblids'], $joblevelids)) { echo "selected" ; } ?>><?php echo $job_level['joblevel']; ?></option> 
                                <?php endforeach; ?>
                                   
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <label class="col-lable"><b>Designation</b></label><?php echo form_error('desid'); ?>
                              <select class="js-example-basic multiselect col-sm-12" multiple="multiple" name="desid[]" id="desid">
                              <?php $tid = explode(',',$post['tid']);?>
                                <?php foreach ($designation->result_array()  as $designation1): ?>
                                    <option value="<?php echo $designation1['jid']; ?>" <?php if( in_array($designation1['jid'], $tid)) { echo "selected" ; } ?>><?php echo $designation1['joblist']; ?></option>
                                <?php endforeach; ?>
                                   
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
                                <input type="checkbox" <?php if($post['suplistnew'] == '1'){ echo "checked" ; } ?> class="js-small f-right suppclass" name="suppchk" id="uho" value="" >
                            </div>
                            <div class="col-sm-2">
                                <label class="f-left col-lable"><b>Inclusion Account List  </b> </label>
                            </div>
                            <div class="col-sm-1"> 
                                <input type="checkbox" <?php if($post['inclistnew'] == '1'){ echo "checked" ; } ?> class="js-small f-right" name="inclist[]" value="" id="inclist">
                            </div>
                            <div class="col-sm-2">
                                            <label class="f-left col-lable"><b>CDQA Needed?</b> </label>
                              </div>
                            <div class="col-sm-1">
                             <input type="checkbox" class="js-small f-right"  <?php if($post['cdcneed'] == '1'){ echo "checked" ; } ?> name="cdqa[]" value="" id="cdqa">
                               </div>
                               <div class="col-sm-2">
                                            <label class="f-left col-lable"><b>Asset Title</b> </label>
                              </div>
                            <div class="col-sm-1">
                             <input type="checkbox" class="js-small f-right"  <?php if($post['assetid'] == '1'){ echo "checked" ; } ?> name="cdqa[]" value="" id="cdqa">
                               </div>
                            
                                 
                        </div>
                        <hr>
                        <div class="form-group row">
                            
                            <div class="col-sm-2">
                                    
                                <label class="col-lable"><b>Select Lower Bound</b></label>
                                <input type="text"   name="emplbound"  value="<?php echo $post['emplbnd']; ?>"  id="emplbound" class="form-control form-control-sm" onkeypress="return isNumber(event)" >
                            </div>
                            <div class="col-sm-2 ">
                                <label class="col-lable"><b>Select Upper Bound</b></label><?php echo form_error('empubound'); ?>
                                <input type="text"   name="empubound"  value="<?php echo $post['empubnd']; ?>"  id="empubound" class="form-control form-control-sm" onkeypress="return isNumber(event)" >
                            </div>
                            <div class="col-sm-3">
                                <label class="col-lable"><b>Frequency Type</b></label>
                                <select class="js-example-basic-multiple col-sm-12"  name="frequency_type" id="frequency_type">
                                <?php 
                                $freqtyp = explode(',',$post['freqtyp']);
                                if($freqtyp == 0)
                                {
                                    ?>
                                    <option value="0" selected>All</option>
                                    <?php
                                }
                                ?>
                                <?php foreach ($frequency_type as $frequency_types): ?>
                                    <option value="<?php echo $frequency_types['fids']; ?>" <?php if( in_array($frequency_types['fids'], $freqtyp)) { echo "selected" ; } ?>><?php echo $frequency_types['freqtype']; ?></option>
                                <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <label class="col-lable"><b>Frequency <?php echo $post['freqid'] ?></b></label>
                                <select class="js-example-basic-multiple col-sm-12" multiple="multiple" name="frequency[]" id="frequency">
                                 <?php 
                                 $freqid = explode(',',$post['freqid']);
                                  if($freqid == 0)
                                  {
                                      ?>
                                      <option value="0" selected>All</option>
                                      <?php
                                  }
                                 ?>
                                <?php foreach ($frequency as $frequency): ?>
                                    <option value="<?php echo $frequency['fdid']; ?>" <?php if( in_array($frequency['fdid'], $freqid)){ echo "selected" ; } ?>><?php echo $frequency['days']; ?></option>
                                <?php endforeach; ?>
                                </select>
                            </div>
                  
                               <div class="col-sm-2">   
                               <label class="f-left col-lable"><b>No. of Questions</b><br> <?php echo form_error('quantity'); ?></label>
                                   <input  type="number" id="quantity" name="quantity" min="1" max="12" maxlength="2" value="<?php echo $post['questnos'];?>"
                                    <?php echo (form_error('quantity')) ? 'class="form-control form-control-danger"' :'class="form-control"';?> >
                               </div>
                          </div>
                        <!-- </div>  -->
                        
                        <!-- </div> -->
                        <div class="form-group row">
                            <div class="col-sm-2 ">
                                <!-- <div class="senior-airman"> -->
                                <label class="col-lable"><b>Select Lower Bound</b></label><?php echo form_error('emplbound'); ?>
                                <input type="text"   name="revnlbound"  value="<?php echo $post['revlbnd']; ?>"  id="revnlbound" class="form-control form-control-sm" onkeypress="return isNumber(event)" >
                                
                                <!-- </div> -->
                            </div>
                            <div class="col-sm-2 ">
                                <label class="col-lable "><b>NM List Bount</b></label>

                                <select name="selectstatus" class="form-control form-control-default" id="revnlbound_range">
                                    <option value="">Select </option>
                                    <option value="hundred" <?php if($post['revlbdim'] == "hundred"){ echo "selected" ; } ?>>Hundred Thousand</option>
                                    <option value="million" <?php if($post['revlbdim'] == "million"){ echo "selected" ; } ?>>Million</option>
                                    <option value="billion" <?php if($post['revlbdim'] == "billion"){ echo "selected" ; } ?>>Billion </option>
                                    <option value="trillion" <?php if($post['revlbdim'] == "trillion"){ echo "selected" ; } ?>>Trillion </option>
                                </select>
                            </div>
                            <div class="col-sm-2 ">
                                
                                <!-- <div class="airman"> -->
                                    <label class="col-lable"><b>Select Upper Bound</b></label>
                                    <input type="text"   name="revnubound"  value="<?php echo $post['revubnd']; ?>"  id="revnubound" class="form-control form-control-sm" onkeypress="return isNumber(event)" >
                                    
                            </div>
                            <div class="col-sm-2 ">
                                <label class="col-lable "><b>NM List Bount</b></label>

                                <select name="selectstatus" class="form-control form-control-default" id="revnubound_range">
                                    <option value="">Select </option>
                                    <option value="hundred" <?php if($post['revubdim'] == "hundred"){ echo "selected" ; } ?>>Hundred Thousand</option>
                                    <option value="million" <?php if($post['revubdim'] == "million"){ echo "selected" ; } ?>>Million</option>
                                    <option value="billion" <?php if($post['revubdim'] == "billion"){ echo "selected" ; } ?>>Billion </option>
                                    <option value="trillion" <?php if($post['revubdim'] == "trillion"){ echo "selected" ; } ?>>Trillion </option>
                                    
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

                        <hr>
                        <div class="form-group row">
                             
                              <div class="col-sm-3">
                                <label class="col-lable"><b>Current Status</b></label>

                                <select name="selectstatus" class="form-control form-control-default" id="selectstatus">
                                    <option value="2">Open</option>
                                    <option value="1">Closed</option>
                                    <option value="3">Hold</option>
                                </select>
                                <span style='color:#FF0000' id="selectstatus_msg"></span>
                            </div>
                            <div class="col-sm-3">
                                <label class="col-lable"><b>Start Date</b></label> <?php echo form_error('startdt'); ?>
                                <input type="date" id="startdt"  name="startdt" value="<?php echo $post['startdt'];?>"  <?php echo (form_error('startdt')) ? 'class="form-control form-control-danger"' :'class="form-control"';?>>
                                <span style='color:#FF0000' id="startdt_msg"></span>
                            </div>
                            <div class="col-sm-3">
                                <label class="col-lable"><b>Est Completion Date</b></label> <?php echo form_error('estclosedt'); ?>
                                <input type="date" id="estclosedt"  name="estclosedt" value="<?php echo $post['estclosedt'];?>" <?php echo (form_error('estclosedt')) ? 'class="form-control form-control-danger"' :'class="form-control"';?> >
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
                                <button type="submit" name="submit" class="btn btn-primary"  id="addcampbtn">Update Campaign</button>
                            </div>
                             
                        </div>
                        <!--<textarea id="description" style="visibility: hidden;"></textarea>-->

                        <!-- </form> -->
                    </div>
                           
                </div>
            </div>
        </div>
        <!-- Basic Form Inputs card end -->
        <?php endforeach; ?>
 <!--<button type="button" class="btn btn-danger waves-effect" data-toggle="modal" data-target="#Modal-overflow" id="showmodal">Overflow</button>-->
                                        <!-- Modal -->
                                        <div class="modal fade modal-flex" id="Modal-overflow" tabindex="-1" role="dialog">
                                            <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Add Suppression</h5>
<!--                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>-->
                                                        </div>
                                                        <div class="modal-body p-b-0">
                                                            <form>
                                                               
                                                                <div class="form-group row">
                                                                    <div class="col-sm-6">
                                                                        <label class="col-lable"><b>Exclusion Type</b></label>

                                                                        <select class="js-example-basic-multiple col-sm-12" multiple="multiple" style="z-index: 999999999">
                                                                            <option value="AL">Manager</option>
                                                                            <option value="WY">Delivery Head</option>
                                                                            <option value="WY">CEO</option>
                                                                            <option value="WY">Marketing Head</option>
                                                                            <option value="WY">Supervisor</option>
                                                                        </select>
                                                                    </div>
                                                              
                                                                    <div class="col-sm-6">
                                                                        <label class="col-lable"><b>Campaign Name</b></label>
                                                                        <input type="text"  name="campaign_name" class="form-control" placeholder="Enter Campaign Name">
                                                                    </div>
                                                                    <div class="col-sm-12">
<!--                                                                        <label class="col-lable"><b>Campaign Name</b></label>
                                                                        <input type="text"  name="campaign_name" class="form-control" placeholder="Enter Campaign Name">-->
                                                                    </div><div class="col-sm-12">
<!--                                                                        <label class="col-lable"><b>Campaign Name</b></label>
                                                                        <input type="text"  name="campaign_name" class="form-control" placeholder="Enter Campaign Name">-->
                                                                    </div><div class="col-sm-12">
                                                                        <label class="col-lable"><b>Campaign Name</b></label>
                                                                        <input type="text"  name="campaign_name" class="form-control" placeholder="Enter Campaign Name">
                                                                    </div><div class="col-sm-12">
                                                                        <label class="col-lable"><b>Campaign Name</b></label>
                                                                        <input type="text"  name="campaign_name" class="form-control" placeholder="Enter Campaign Name">
                                                                    </div>
                                                                </div>
                                                               
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-primary">Add To Suppression List</button>
                                                            <button type="button" class="btn btn-default" data-dismiss="modal" id="cancelSuppbtn">Cancel</button>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
    
<script>
    $(function() {
        $("#addcampbtn").on('click', function() 
        {
            var campaign_id = $('#campaign_id').val();
            var client_id = $('#client_id').val();
            var campaign_name = $('#campaign_name').val();
            var country_id = $('#country_id').val(); 
            var region_id = $('#region_id').val();
            // var theRemovedElement = region_id.shift();  
            var sector_id = $('#sector_id').val(); 
            var subindustrycd = $('#subindustrycd').val(); 
            // alert(sector_id);
            var dcd = $('#dcd').val(); 
            // var emplzid = $('#emplzid').val(); 
            var levelid = $('#levelid').val(); 
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
            if(campaign_name == null || campaign_name == '')
            {
                $("#campaign_name_msg").html("<p><strong>Please fill this.</strong></p>");
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
            
            

            // var myCheckboxes = new Array();
            // $("input:checked").each(function() {
            // myCheckboxes.push($('#uho').prop('checked'));
            // });
            // alert(myCheckboxes);
            // if(myCheckboxes == true)
            // {
            //     var checksupp = true;
            // }else{
            //     var checksupp = false;
            // }
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
            var url = "<?php echo base_url("campaigns/ajax_update_campaign");?>";
            console.log(url+"?campaign_id="+campaign_id+"&client_id="+client_id+"&campaign_name="+campaign_name+"&region_id="+region_id+"&subindustrycd="+subindustrycd+"&country_id="+country_id+"&dcd="+dcd+"&desid="+desid+"&checksupp="+checksupp+"&inclist="+inclist+"&cdqa="+cdqa+"&assetid="+assetid+"&quantity="+quantity+"&selectstatus="+selectstatus+"&estclosedt="+estclosedt+"&startdt="+startdt+"&emplbound="+emplbound+"&empubound="+empubound+"&revnlbound="+revnlbound+"&revnubound="+revnubound+"&revnlbound_range="+revnlbound_range+"&revnubound_range="+revnubound_range+"&frequency_type="+frequency_type+"&frequency="+frequency);

            $.ajax({
                url :'<?php echo base_url("campaigns/ajax_update_campaign");?>',
                type: 'POST', 
                dataType: 'json',              
                data: {
					campaign_id: campaign_id,
                    client_id:client_id,
					campaign_name: campaign_name,
                    country_id:country_id,
                    region_id:region_id,
                    industrycd:sector_id,
                    subindustrycd:subindustrycd,
                    dcd:dcd,
                    levelid:levelid,
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
                    frequency:frequency
                    

				},
                cache: false,
                success: function(response){
                    var text = response.statusCode;
                    console.log("check");
                   
                    if(response.statusCode == "Success") 
                    {                        
                        $("#addcampbtn").html(response.message);
                        $("#addcampbtn").prop('disabled', true);
                        // top.location.href=base_url+"campaigns/campaign";//redirection
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
 
     
$(function() {
$('#country_id')
    .multiselect({
    // allSelectedText: 'All',
    maxHeight: 200,
    enableCaseInsensitiveFiltering :true,

    includeSelectAllOption: true,
    
    })
    .multiselect('selectAll', true)
    .multiselect('updateButtonText');
});
$(function() {
$('#subindustrycd')
    .multiselect({
    // allSelectedText: 'All',
    maxHeight: 200,
    enableCaseInsensitiveFiltering :true,
    includeSelectAllOption: true
    })
    .multiselect('selectAll', true)
    .multiselect('updateButtonText');
});
$(function() {
$('#desid')
    .multiselect({
    // allSelectedText: 'All',
    maxHeight: 200,
     enableCaseInsensitiveFiltering :true,
    includeSelectAllOption: true
    })
    .multiselect('selectAll', true)
    .multiselect('updateButtonText');
});
$(function() {
$('#dcd')
    .multiselect({
    // allSelectedText: 'All',
    maxHeight: 200,
    enableCaseInsensitiveFiltering :true,

    includeSelectAllOption: true,
    
    })
    .multiselect('selectAll', true)
    .multiselect('updateButtonText');
});
    </script>
  