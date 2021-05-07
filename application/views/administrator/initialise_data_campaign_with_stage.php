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
        <h4>Data Initialization </h4> <br><br><br>

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
                                <input type = hidden name="campaign_cids_from" id="campaign_cids_from" value="<?php echo $campaigns_from['cids']; ?>">
                                <input type = hidden name="campaign_cids_to" id="campaign_cids_to" value="<?php echo $campaigns_to['cids']; ?>">
                               
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
          $('#clearedchk').val("1");
          $('#pendingchk').val("0");
         

            $("#clearedchk").prop('checked', true);
            $("#pendingchk").prop('checked', false);

          
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

          

              var clrchk =   $('#clearedchk').val();
              var penchk =   $('#pendingchk').val();
              var campaign_id_to =   $('#campaign_id_to').val();
              var campaign_id_from =   $('#campaign_id_from').val();


$(function() {
        $("#initialisecampaign").on('click', function() 
        {
         if(campaign_id_to != '' && campaign_id_from != '')
           {
            if(clrchk == 1){
                if(camp_stage_from == '1')
                  { //dc stage
                    var campaign_cids_from = $('#campaign_cids_from').val();

                    var url = encodeURI("<?php echo base_url("cdc/ajax_update_ini_to_dc");?>");
                     console.log(url+"?campaign_id="+campaign_id+"&campaign_cids_from="+campaign_cids_from);
           
            $.ajax({
                url :'<?php echo base_url("cdc/ajax_update_ini_to_dc");?>',
                type: 'GET', 
                // contentType: "application/json",
                dataType: 'json',              
                data: {
                   
                  campaign_id: campaign_id,
                  campaign_cids_from: campaign_cids_from,
                     
                    
				},
        async: true,
                cache: false,
                success: function(response){                 
                    var text = response.statusCode;
                    console.log("check");
                    if(response.statusCode == "Success") 
                    {         
                         
                        $("#leadupdatecdc").html(response.message);                      
                        top.location.href=base_url+"cdc/get_campaign_stage?camp_id="+<?php echo $campaign['cnid']; ?>;//redirection
                      
                      
                    }else if(response.statusCode=="Fail")
                    {
                        $("#leadupdatecdc").html(response.message);
                        
                      } else if(response.statusCode =="Exist")
                    {
                      alert("Record already Exist");                  
                        
					          }
                    else if(response.statusCode =="plink")
                    {
                      alert("Record already Exist");                     
                        
					          }


                },
                error: function (error) {
                  alert("Error");
                  }
              
            });



                  }
            }
           }else{
             return;
           } 









        });
      });  

             
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


      //  Get count 
      $('#camp_stage_from').change(function(){
          var camp_stage_from = $(this).val();
          var campaign_cids = $('#campaign_cids').val();
          
          if(camp_stage_from == '1'){ //dc stage

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



     
  
         
          


});



     </script>

    

  