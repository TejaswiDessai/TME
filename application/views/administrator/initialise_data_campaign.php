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


<!-- start for Tejaswi -->

<div class="page-header" id="camp_form">
    <div class="page-header-title">
        <h4>Initialise Data Stage </h4> 
    </div>
   
</div>
<!-- Page header end -->
<!-- Page body start -->
<div class="page-body">
    <div class="row">
        <div class="col-sm-12">
            <!-- Basic Form Inputs card start -->
            <div class="card">
              <form id="basic-form1" method="POST" enctype="multipart/form-data" action="get_campaign_stage">
                <div class="card-header">
                
                </div>
                
                <div class="card-block">
              
                   
                    <div class="col-sm-12" >
                    <center>
                        <div class="page-header-title">
                            <h5>Campaign To Be Pushed From </h5> 
                        </div>
                    </center><br><br>
                        <div class="form-group row">
                                    <div class="col-sm-3">
                        
                                     </div>
                                    <div class="col-sm-3">
                                   
                                    <select name="campaign_status_from" id="campaign_status_from"  class="form-control form-control-sm" >
                                            <option value="">Select Campaign Status</option>
                                            <option value="2">Live</option>
                                            <option value="1">Closed</option>
                                            <option value="3">Hold</option>

                                    </select>
                                    </div>

                                    <div class="col-sm-3">
                                    <select name="campaign_id_from" id="campaign_id_from"  class="form-control form-control-sm" >
                                            <option value="">Select campaign to be pushed from</option>
                                    
                                    </select>
                                    </div>
                        </div>
                        <hr>
                        <center>
                        <div class="page-header-title">
                        <h5>Campaign To Be Pushed into </h5>
                        </div><br><br> 
                        </center><br><br>
                        <div class="form-group row">
                        <div class="col-sm-3">
                        
                        </div>
                            <div class="col-sm-3">
                           
                               <select name="campaign_status_to" id="campaign_status_to"  class="form-control form-control-sm" >
                                     <option value="">Select Campaign Status</option>
                                     <option value="2">Live</option>
                                    <option value="1">Closed</option>
                                    <option value="3">Hold</option>
                               
                               </select>
                            </div>
                           <div class="col-sm-3">
                           
                               <select name="campaign_id_to" id="campaign_id_to"  class="form-control form-control-sm" >
                                     <option value="">Select campaign to be pushed to</option>
                            
                               </select>
                            </div>
                        
                        
                        </div>

                       
                    </div>
                    <center>
                    <div class="col-sm-3">
                              <button type="submit" name="retrievedatacampaign" class="btn btn-primary" style=""  id="retrievedatacampaign">Retrieve Campaign Data</button>
                            </div>
                     </center>
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

    $("#basic-form1").validate({
    rules: {
        campaign_status_from : {
        required: true
      },
        campaign_status_to : {
        required: true
      },
        campaign_id_to : {
        required: true
      },
        campaign_id_from : {
        required: true
      }
     
    }

  });



//Start get campaign on status change from
$('#campaign_status_from').change(function(){
    var campaign_status_from = $(this).val();
   
    // AJAX request to get   cdc/getJobTitle
    var urlq = '<?php echo base_url("cdc/getcampaignwithstatus");?>';
    console.log(urlq+'?campaign_status_from='+campaign_status_from);
    $.ajax({
        url:'<?php echo base_url("cdc/getcampaignwithstatus");?>',
        method: 'get',
        data: {campaign_status_from: campaign_status_from},
        dataType: 'json',
        success: function(response){

        //    Remove options 
       $('#campaign_id_from').find('option').not(':first').remove();

        //    Add options
       $.each(response,function(index,data){
          $('#campaign_id_from').append('<option value="'+data['cnid']+'" >'+data['campnm']+'</option>');
          
        });
     
      }
    });
});
//get campaign on status change End

//Start get campaign on status change to
$('#campaign_status_to').change(function(){
    var campaign_status_to = $(this).val();
   
    // AJAX request to get   cdc/getJobTitle
    var urlq = '<?php echo base_url("cdc/getcampaignwithstatusto");?>';
    console.log(urlq+'?campaign_status_to='+campaign_status_to);
    $.ajax({
        url:'<?php echo base_url("cdc/getcampaignwithstatusto");?>',
        method: 'get',
        data: {campaign_status_to: campaign_status_to},
        dataType: 'json',
        success: function(response){

        //    Remove options 
       $('#campaign_id_to').find('option').not(':first').remove();

        //    Add options
       $.each(response,function(index,data){
          $('#campaign_id_to').append('<option value="'+data['cnid']+'" >'+data['campnm']+'</option>');
          
        });
     
      }
    });
});
//get campaign on status change End

});



     </script>

    

  