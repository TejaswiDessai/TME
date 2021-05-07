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
    <div class="page-header-title col-sm-12">
        <h4>Data Initialisation </h4> <br><br><br>

        <div class="col-sm-4" style="margin-top: -20px;">
        <?php foreach ($campaigns_from as $campaigns_from): ?>
                  
                    <?php endforeach; ?> 
        </div>
        <div class="col-sm-4" style="">
        <?php foreach ($campaigns_to as $campaigns_to): ?>
                  
                    <?php endforeach; ?>
         </div>
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
                    <div >
                     

                        <div class="form-group row">
                        <div class="col-sm-3">
                                <label class="col-lable"><b>Campaign From: <?php echo $campaigns_from['campnm']; ?></b></label>

                              
                                <select name="camp_stage_from" id="camp_stage_from"  class="form-control form-control-sm" >
                                     <option value="">Select campaign stage From</option>
                                     <!-- <option value="">AS IS</option> -->
                                     <option value="1">DC</option>
                                     <option value="2">DV</option>
                                     <option value="3">EV</option>
                                     <option value="4">CDC</option>
                              
                               </select>
                            </div>
                            
                           
                           <div class="col-sm-3">   
                             <label class="col-lable"><b>Cleared</b></label>
                            <input type="text"  name="cleared" id="cleared"  placeholder="Cleared Count"  autocomplete = "off"  
                            class="form-control form-control-sm" value ="" disabled>
                            </div>

                            <div class="col-sm-3"><label class="col-lable"><b>Pending</b></label>
                           <input type="text"  name="pending" id="pending"  placeholder="Pending Count"  autocomplete = "off"  
                           class="form-control form-control-sm" disabled>
                           </div>
                          
                        </div>

                        <div class="form-group row">
                            
                            <div class="col-sm-3">
                            <label class="col-lable"><b>Campaign To: <?php echo $campaigns_to['campnm']; ?></b></label>

                                <select name="camp_stage_to" id="camp_stage_to"  class="form-control form-control-sm" >
                                      <option value="">Select campaign stage To</option>
                                      <!-- <option value="">AS IS</option> -->
                                      <option value="1">DC</option>
                                      <option value="2">DV</option>
                                      <option value="3">EV</option>
                                      <option value="4">CDC</option>
                               
                                </select>
                             </div>
                            <div class="col-sm-3">
                           
                                      Push Cleared Data <input type="checkbox" value=""  id="clearedchk" name="clearedchk" class="js-single clearedchkclass"  />
                                      
                             </div>
                             <div class="col-sm-3">
                             Push Pending Data  <input type="checkbox" value=""  id="pendingchk" name="pendingchk" class="js-single clearedchkclass"  />
                            </div>
                            
                          
                           
                         </div>

                         <div class="col-sm-2">
                                <input type = hidden name="campaign_id" id="campaign_id" value="<?php echo $campaigns_from['cnid']; ?>">
                                <input type = hidden name="campaign_cids" id="campaign_cids" value="<?php echo $campaigns_from['cids']; ?>">
                               
                               <button type="submit" name="initialisecampaign" class="btn btn-primary" style=""  id="initialisecampaign">Initialise</button>
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
  // $("#clearedchk").prop('checked', true);
  // var clearedchk= $('#clearedchk').val("1");
  
  


  
  

  $("#basic-form").validate({
    rules: {
        campaign_id_to : {
        required: true
      },
        campaign_id_from : {
        required: true
      },
      camp_stage_from : {
        required: true
      },
      camp_stage_to : {
        required: true
      }

     
    }

  });


//  Get count dc
$('#camp_stage_from').change(function(){
    var camp_stage_from = $(this).val();
    var campaign_cids = $('#campaign_cids').val();
    
    if(camp_stage_from == '1'){

      var urlq = '<?php echo base_url("cdc/getdccount");?>';
    console.log(urlq+'?campaign_cids='+campaign_cids);
              // AJAX request
              $.ajax({
                  url:'<?php echo base_url("cdc/getdccount");?>',
                  method: 'get',
                  data: {campaign_cids: campaign_cids},
                  dataType: 'json',
                  success: function(response){
                      // var dataResult = JSON.parse(response);
                      // $('#cleared').val(dataResult);
                      $('#cleared').val(response.cleareddata);
                      $('#pending').val(response.pendingdata);
                      


                  }
              });
          // AJAX request end
          } else{// End DC
         alert("Select DC");
          }




});



        // if ($('#clearedchk').is(':checked')) {
          $("#clearedchk").click(function() {
        
            $('#clearedchk').val("1");
            $('#pendingchk').val("0");
         
            $("#clearedchk").prop('checked', true);
            $("#pendingchk").prop('checked', false);
           
          });

        $("#pendingchk").click(function() {
        
        
          $('#pendingchk').val("1");
            $('#clearedchk').val("0");
         
            $("#pendingchk").prop('checked', true);
            $("#clearedchk").prop('checked', false);
          });
  



});



     </script>

    

  