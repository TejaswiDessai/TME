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
              <form id="basic-form" method="POST" enctype="multipart/form-data" action="get_campaign_stage">
                <div class="card-header">
                
                </div>
                
                <div class="card-block">
                    <div class="col-sm-8">
                        <div class="validation_errors_alert">

                        </div>   
                    </div>
                    <div class="col-sm-12" >
                     

                        <div class="form-group row">
                            <div class="col-sm-2">
                            </div>  
                           <div class="col-sm-3">
                               <select name="campaign_id_from" id="campaign_id_from"  class="form-control form-control-sm" >
                                     <option value="">Select campaign to be pushed from</option>
                               <?php foreach ($campaigns as $campaign): ?>
                                   <option value="<?php echo $campaign['cnid']; ?>"><?php echo $campaign['campnm']; ?></option>
                               <?php endforeach; ?>
                               </select>
                            </div>
                           <div class="col-sm-3">
                               <select name="campaign_id_to" id="campaign_id_to"  class="form-control form-control-sm" >
                                     <option value="">Select campaign to be pushed to</option>
                               <?php foreach ($campaigns as $campaign): ?>
                                   <option value="<?php echo $campaign['cnid']; ?>"><?php echo $campaign['campnm']; ?></option>
                               <?php endforeach; ?>
                               </select>
                            </div>
                         <div class="col-sm-3">
                              <button type="submit" name="initialisecampaign" class="btn btn-primary" style=""  id="initialisecampaign">Retrieve Campaign Data</button>
                            </div>
                          
                        </div>
                    </div>
                      
                </div>
                </form>  
            </div>
        </div>
        <!-- Basic Form Inputs card end -->
        </div>
      </div>
    
   
     <script>
     // Campaign Name no special character allowed validation code
  
$(document).ready(function() {

  $("#basic-form").validate({
    rules: {
        campaign_id_to : {
        required: true
      },
        campaign_id_from : {
        required: true
      }
     
    }

  });



});



     </script>

    

  