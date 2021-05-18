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
<!-- start for Amol -->
<div class="page-body">
    <div class="row">
        <div class="col-sm-12">
            <!-- Basic Form Inputs card start -->
            <div class="card" id="camp_form">
              <form id="basic-form" method="POST" enctype="multipart/form-data" action="">
                <div class="card-header">
                
                </div>
                
                <div class="card-block">
                    <div class="col-sm-8">
                        <div class="validation_errors_alert">

                        </div>   
                    </div>
                    <div class="col-sm-12" >
                        <div class="form-group row">
                        <div class="col-sm-3">
                        
                        </div>
                           
                         <div class="col-sm-3">
                              <!-- <button type="submit" name="retrievedata" class="btn btn-primary" style=""  id="retrievedata">Add record to campaign</button> -->
                              <a href="<?php echo base_url(); ?>administrator/selectCampaignforReuse"  class="btn btn-primary">Add record to campaigns</a>
                            </div>

                            <div class="col-sm-3">
                           
                            <a href="<?php echo base_url(); ?>administrator/initialise_data"  class="btn btn-primary">Initialize Data to stages</a>
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
     </div>
 </div>
<!-- End for Amol -->



    
   
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

    

  