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

 </style>
 <style>
    .multiselect-container{position:absolute;list-style-type:none;margin:0;padding:0}.multiselect-container .input-group{margin:5px}.multiselect-container>li{padding:0}.multiselect-container>li>a.multiselect-all label{font-weight:700}.multiselect-container>li>label.multiselect-group{margin:0;padding:3px 20px;height:100%;font-weight:700}.multiselect-container>li>a{padding:0}.multiselect-container>li>a>label{margin:0;height:100%;cursor:pointer;font-weight:400;padding:3px 20px 3px 40px}.multiselect-container>li>a>label.radio,.multiselect-container>li>a>label.checkbox{margin:0}.multiselect-container>li>a>label>input[type=checkbox]{margin-bottom:5px}.btn-group>.btn-group:nth-child(2)>.multiselect.btn{border-top-left-radius:4px;border-bottom-left-radius:4px}.form-inline .multiselect-container label.checkbox,.form-inline .multiselect-container label.radio{padding:3px 20px 3px 40px}.form-inline .multiselect-container li a label.checkbox input[type=checkbox],.form-inline .multiselect-container li a label.radio input[type=radio]{margin-left:-20px;margin-right:0}
    .multiselect{
        width:250px;
    }
    #myModal .modal-body 
    { 
        min-height: 400px;
    }
    .select2-container--default .select2-selection--multiple {
    padding:0px 0px 0px 0px;
    }
    .form-control .multiselect-search input[type="text"]{
    height:40px;
}
</style>

<script>
$(function() {
$('#campaign_id')
    .multiselect({
    allSelectedText: 'All',
    maxHeight: 200,
    enableCaseInsensitiveFiltering :true,
    includeSelectAllOption: true,
    required:true,
    })
    .multiselect('selectAll', true)
    .multiselect('updateButtonText');
});
$(document).ready(function () {
    // Handler for .ready() called.
    $('html, body').animate({
        scrollTop: $('#camp_form').offset().top
    }, 'slow');
});


</script>

<div class="page-header">
    <div class="page-header-title">
        <h4>Select Campaign </h4> 
    </div>
   
</div>
<!-- Page header end -->
<!-- Page body start -->
<div class="page-body">
    <div class="row">
        <div class="col-sm-12">
            <!-- Basic Form Inputs card start -->
            <div class="card" id="camp_form">
              <form id="basic-form" method="POST" enctype="multipart/form-data" action="campaign_report">
                <div class="card-header">
                
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
                        <div class="col-sm-3">
                        
                    </div>
                           <div class="col-sm-3">
                           <select style="width:100px;" class="js-example-basic multiselect col-sm-12 form-control-sm" multiple="multiple" name="campaign_id[]" id="campaign_id" required>
                               <!-- <select name="campaign_id" multiselect="multiselect" id="campaign_id"  class="form-control form-control-sm" > -->
                                     <!-- <option value="">Select Campaign</option> -->
                               <?php foreach ($campaigns as $campaign): ?>
                                   <option value="<?php echo $campaign['cids']; ?>"><?php echo $campaign['campnm']; ?></option>
                               <?php endforeach; ?>
                               </select>
                            </div>
                         <div class="col-sm-3">
                              <button type="submit" name="retrievedata" class="btn btn-primary" style=""  id="retrievedata">Retrieve Campaign Data</button>
                            </div>
                            <!-- setting hidden value of campaign id and sending to addlead form -->
                         <input type="hidden" name="hiddencnid" id="hiddencnid" value="">
                        </div>
                    </div>
                      
                </div>
                </form>  
            </div>
        </div>
        <!-- Basic Form Inputs card end -->
     
    
   
     <script>
     // Campaign Name no special character allowed validation code
  
$(document).ready(function() {

  $("#basic-form").validate({
    rules: {
        campaign_id : {
        required: true
      }
     
    }

  });



});



     </script>

    

  