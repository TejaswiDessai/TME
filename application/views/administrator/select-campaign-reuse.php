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
<script>

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
              <form id="basic-form" method="POST" enctype="multipart/form-data" action="reuse_campaign">
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
                                   
                                    <select name="rec_stage" id="rec_stage"  class="form-control form-control-sm" >
                                            <option value="">Select Campaign Status</option>
                                            <option value="Fresh">Fresh</option>
                                            <option value="Used">Used</option>
                                            <!-- <option value="3">Hold</option> -->

                                    </select>
                                    </div>
                           <div class="col-sm-3">
                               <select name="campaign_id" id="campaign_id"  class="form-control form-control-sm" >
                                     <option value="">Select Campaign To Get Leads</option>
                               <?php foreach ($campaigns as $campaign): ?>
                                   <option value="<?php echo $campaign['cnid']; ?>"><?php echo $campaign['campnm']; ?></option>
                               <?php endforeach; ?>
                               </select>
                            </div>
                         
                            <!-- setting hidden value of campaign id and sending to addlead form -->
                         <input type="hidden" name="hiddencnid" id="hiddencnid" value="">
                        </div>
                        <center><div class="col-sm-3">
                              <button type="submit" name="retrievedata" class="btn btn-primary" style=""  id="retrievedata">Retrieve Campaign Data</button>
                            </div></center>
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
      },
        rec_stage : {
        required: true
      }
     
    }

  });



});



     </script>

    

  