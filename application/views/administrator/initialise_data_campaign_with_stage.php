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
              <form id="basic-form" method="POST" enctype="multipart/form-data">
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
                         <div class="form-group row">
                         <div class="col-sm-3">
                         <label class="col-lable"><b>No. of leads to be pushed</b></label>
                         <input type="text"  name="leadsno" id="leadsno"  placeholder="Number"   class="form-control form-control-sm" value= "" maxlength="6">   
                         <span class="error" style="color: red; display: none">* Input Number</span>
                         <br><br> 
                                <!-- <input type = hidden name="campaign_id" id="campaign_id" value="<?php echo $campaigns_from['cnid']; ?>"> -->
                                <input type = hidden name="campaign_cids_from" id="campaign_cids_from" value="<?php echo $campaigns_from['cids']; ?>">
                                <input type = hidden name="campaign_cids_to" id="campaign_cids_to" value="<?php echo $campaigns_to['cids']; ?>">
                               
                               <button type="button" name="initialisecampaign" class="btn btn-primary" id="initialisecampaign">Initialise</button>
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
                $('#leadsno').val("");
                $('#clearedchk').val("0");
            
                $("#pendingchk").prop('checked', true);
                $("#clearedchk").prop('checked', false);
              });

          


$(function() {
        $("#initialisecampaign").on('click', function() 
        {
              var cleared =   $('#cleared').val();
              var pending =   $('#pending').val();

             
              var clrchk =   $('#clearedchk').val();
              var penchk =   $('#pendingchk').val();

              var camp_stage_from = $('#camp_stage_from').val();
              var camp_stage_to = $('#camp_stage_to').val();
              var campaign_cids_from = $('#campaign_cids_from').val();
              var campaign_cids_to = $('#campaign_cids_to').val();
              var leadsno = $('#leadsno').val();
          
        
         if(camp_stage_to != '' && camp_stage_from != '')
           {
            if(clrchk == 1){
                  if(leadsno > cleared || leadsno <= '0')
                  {
                    alert("No. of leads should be greater than 0 and less than cleared leads");
                    return;
                  }
              
                if(camp_stage_from == '1' && camp_stage_to == '1')
                  { //dc to dc stage
                    var url = encodeURI("<?php echo base_url("cdc/ajax_update_ini_to_dc");?>");
                     console.log(url+"?campaign_cids_to="+campaign_cids_to+"&campaign_cids_from="+campaign_cids_from);
         
                      $.ajax({
                            url :'<?php echo base_url("cdc/ajax_update_ini_to_dc");?>',
                            type: 'GET', 
                            // contentType: "application/json",
                            dataType: 'json',              
                            data: {
                            
                              campaign_cids_to: campaign_cids_to,
                              campaign_cids_from: campaign_cids_from,
                              leadsno: leadsno
                               },
                              async: true,
                                      cache: false,
                                      success: function(response){                 
                                      var text = response.statusCode;
                                      console.log("check");
                                      if(response.statusCode == "Success") 
                                      {         
                                          
                                          $("#initialisecampaign").html("Initialized!");   
                                          $("#initialisecampaign").attr("disabled", true); 
                                        
                                      }


                                  },
                                  error: function (error) {
                                    alert("Error");
                                    }
                                
                              }); //Ajax End



                }else if(camp_stage_from == '1' && camp_stage_to == '2'){ //dc to dv
                     var url = encodeURI("<?php echo base_url("cdc/ajax_update_ini_dc_to_dv");?>");
                     console.log(url+"?campaign_cids_to="+campaign_cids_to+"&campaign_cids_from="+campaign_cids_from);
         
                      $.ajax({
                            url :'<?php echo base_url("cdc/ajax_update_ini_dc_to_dv");?>',
                            type: 'GET', 
                            // contentType: "application/json",
                            dataType: 'json',              
                            data: {
                            
                              campaign_cids_to: campaign_cids_to,
                              campaign_cids_from: campaign_cids_from,
                              leadsno: leadsno
                               },
                              async: true,
                                      cache: false,
                                      success: function(response){                 
                                      var text = response.statusCode;
                                      console.log("check");
                                      if(response.statusCode == "Success") 
                                      {         
                                          
                                          $("#initialisecampaign").html("Initialized!");   
                                          $("#initialisecampaign").attr("disabled", true); 
                                        
                                      }


                                  },
                                  error: function (error) {
                                    alert("Error");
                                    }
                                
                              }); //Ajax End
                 
                }else if(camp_stage_from == '1' && camp_stage_to == '3'){ //dc to ev

                     var url = encodeURI("<?php echo base_url("cdc/ajax_update_ini_dc_to_ev");?>");
                     console.log(url+"?campaign_cids_to="+campaign_cids_to+"&campaign_cids_from="+campaign_cids_from);
         
                      $.ajax({
                            url :'<?php echo base_url("cdc/ajax_update_ini_dc_to_ev");?>',
                            type: 'GET', 
                            // contentType: "application/json",
                            dataType: 'json',              
                            data: {
                            
                              campaign_cids_to: campaign_cids_to,
                              campaign_cids_from: campaign_cids_from,
                              leadsno:leadsno
                               },
                              async: true,
                                      cache: false,
                                      success: function(response){                 
                                      var text = response.statusCode;
                                      console.log("check");
                                      if(response.statusCode == "Success") 
                                      {         
                                          
                                          $("#initialisecampaign").html("Initialized!");   
                                          $("#initialisecampaign").attr("disabled", true); 
                                        
                                      }


                                  },
                                  error: function (error) {
                                    alert("Error");
                                    }
                                
                              }); //Ajax End

                }else if(camp_stage_from == '1' && camp_stage_to == '4'){ //dc to cdc
                     var url = encodeURI("<?php echo base_url("cdc/ajax_update_ini_dc_to_cdc");?>");
                     console.log(url+"?campaign_cids_to="+campaign_cids_to+"&campaign_cids_from="+campaign_cids_from);
         
                      $.ajax({
                            url :'<?php echo base_url("cdc/ajax_update_ini_dc_to_cdc");?>',
                            type: 'GET', 
                            // contentType: "application/json",
                            dataType: 'json',              
                            data: {
                            
                              campaign_cids_to: campaign_cids_to,
                              campaign_cids_from: campaign_cids_from,
                              leadsno:leadsno
                               },
                              async: true,
                                      cache: false,
                                      success: function(response){                 
                                      var text = response.statusCode;
                                      console.log("check");
                                      if(response.statusCode == "Success") 
                                      {         
                                          
                                          $("#initialisecampaign").html("Initialized!");   
                                          $("#initialisecampaign").attr("disabled", true); 
                                        
                                      }


                                  },
                                  error: function (error) {
                                    alert("Error");
                                    }
                                
                              }); //Ajax End

                }else if(camp_stage_from == '2' && camp_stage_to == '1'){ //dv to dc
                  var url = encodeURI("<?php echo base_url("cdc/ajax_update_ini_dv_to_dc");?>");
                     console.log(url+"?campaign_cids_to="+campaign_cids_to+"&campaign_cids_from="+campaign_cids_from);
         
                      $.ajax({
                            url :'<?php echo base_url("cdc/ajax_update_ini_dv_to_dc");?>',
                            type: 'GET', 
                            // contentType: "application/json",
                            dataType: 'json',              
                            data: {
                            
                              campaign_cids_to: campaign_cids_to,
                              campaign_cids_from: campaign_cids_from,
                              leadsno:leadsno
                               },
                              async: true,
                                      cache: false,
                                      success: function(response){                 
                                      var text = response.statusCode;
                                      console.log("check");
                                      if(response.statusCode == "Success") 
                                      {         
                                          
                                          $("#initialisecampaign").html("Initialized!");   
                                          $("#initialisecampaign").attr("disabled", true); 
                                        
                                      }


                                  },
                                  error: function (error) {
                                    alert("Error");
                                    }
                                
                              }); //Ajax End
                
                }else if(camp_stage_from == '2' && camp_stage_to == '2'){ //dv to dv
                    var url = encodeURI("<?php echo base_url("cdc/ajax_update_ini_dv_to_dv");?>");
                     console.log(url+"?campaign_cids_to="+campaign_cids_to+"&campaign_cids_from="+campaign_cids_from);
         
                      $.ajax({
                            url :'<?php echo base_url("cdc/ajax_update_ini_dv_to_dv");?>',
                            type: 'GET', 
                            // contentType: "application/json",
                            dataType: 'json',              
                            data: {
                            
                              campaign_cids_to: campaign_cids_to,
                              campaign_cids_from: campaign_cids_from,
                              leadsno:leadsno
                               },
                              async: true,
                                      cache: false,
                                      success: function(response){                 
                                      var text = response.statusCode;
                                      console.log("check");
                                      if(response.statusCode == "Success") 
                                      {         
                                          
                                          $("#initialisecampaign").html("Initialized!");   
                                          $("#initialisecampaign").attr("disabled", true); 
                                        
                                      }


                                  },
                                  error: function (error) {
                                    alert("Error");
                                    }
                                
                              }); //Ajax End
                }else if(camp_stage_from == '2' && camp_stage_to == '3'){ //dv to ev
                    var url = encodeURI("<?php echo base_url("cdc/ajax_update_ini_dv_to_ev");?>");
                     console.log(url+"?campaign_cids_to="+campaign_cids_to+"&campaign_cids_from="+campaign_cids_from);
         
                      $.ajax({
                            url :'<?php echo base_url("cdc/ajax_update_ini_dv_to_ev");?>',
                            type: 'GET', 
                            // contentType: "application/json",
                            dataType: 'json',              
                            data: {
                            
                              campaign_cids_to: campaign_cids_to,
                              campaign_cids_from: campaign_cids_from,
                              leadsno:leadsno
                               },
                              async: true,
                                      cache: false,
                                      success: function(response){                 
                                      var text = response.statusCode;
                                      console.log("check");
                                      if(response.statusCode == "Success") 
                                      {         
                                          
                                          $("#initialisecampaign").html("Initialized!");   
                                          $("#initialisecampaign").attr("disabled", true); 
                                        
                                      }


                                  },
                                  error: function (error) {
                                    alert("Error");
                                    }
                                
                              }); //Ajax End
                }else if(camp_stage_from == '2' && camp_stage_to == '4'){ //dv to cdc
                    var url = encodeURI("<?php echo base_url("cdc/ajax_update_ini_dv_to_cdc");?>");
                     console.log(url+"?campaign_cids_to="+campaign_cids_to+"&campaign_cids_from="+campaign_cids_from);
         
                      $.ajax({
                            url :'<?php echo base_url("cdc/ajax_update_ini_dv_to_cdc");?>',
                            type: 'GET', 
                            // contentType: "application/json",
                            dataType: 'json',              
                            data: {
                            
                              campaign_cids_to: campaign_cids_to,
                              campaign_cids_from: campaign_cids_from,
                              leadsno:leadsno
                               },
                              async: true,
                                      cache: false,
                                      success: function(response){                 
                                      var text = response.statusCode;
                                      console.log("check");
                                      if(response.statusCode == "Success") 
                                      {         
                                          
                                          $("#initialisecampaign").html("Initialized!");   
                                          $("#initialisecampaign").attr("disabled", true); 
                                        
                                      }


                                  },
                                  error: function (error) {
                                    alert("Error");
                                    }
                                
                              }); //Ajax End
                }else if(camp_stage_from == '3' && camp_stage_to == '1'){ //ev to dc
                    var url = encodeURI("<?php echo base_url("cdc/ajax_update_ini_ev_to_dc");?>");
                     console.log(url+"?campaign_cids_to="+campaign_cids_to+"&campaign_cids_from="+campaign_cids_from);
         
                      $.ajax({
                            url :'<?php echo base_url("cdc/ajax_update_ini_ev_to_dc");?>',
                            type: 'GET', 
                            // contentType: "application/json",
                            dataType: 'json',              
                            data: {
                            
                              campaign_cids_to: campaign_cids_to,
                              campaign_cids_from: campaign_cids_from,
                              leadsno:leadsno
                               },
                              async: true,
                                      cache: false,
                                      success: function(response){                 
                                      var text = response.statusCode;
                                      console.log("check");
                                      if(response.statusCode == "Success") 
                                      {         
                                          
                                          $("#initialisecampaign").html("Initialized!");   
                                          $("#initialisecampaign").attr("disabled", true); 
                                        
                                      }


                                  },
                                  error: function (error) {
                                    alert("Error");
                                    }
                                
                              }); //Ajax End
                }else if(camp_stage_from == '3' && camp_stage_to == '2'){ //ev to dv
                    var url = encodeURI("<?php echo base_url("cdc/ajax_update_ini_ev_to_dv");?>");
                     console.log(url+"?campaign_cids_to="+campaign_cids_to+"&campaign_cids_from="+campaign_cids_from);
         
                      $.ajax({
                            url :'<?php echo base_url("cdc/ajax_update_ini_ev_to_dv");?>',
                            type: 'GET', 
                            // contentType: "application/json",
                            dataType: 'json',              
                            data: {
                            
                              campaign_cids_to: campaign_cids_to,
                              campaign_cids_from: campaign_cids_from,
                              leadsno:leadsno
                               },
                              async: true,
                                      cache: false,
                                      success: function(response){                 
                                      var text = response.statusCode;
                                      console.log("check");
                                      if(response.statusCode == "Success") 
                                      {         
                                          
                                          $("#initialisecampaign").html("Initialized!");   
                                          $("#initialisecampaign").attr("disabled", true); 
                                        
                                      }


                                  },
                                  error: function (error) {
                                    alert("Error");
                                    }
                                
                              }); //Ajax End
                }else if(camp_stage_from == '3' && camp_stage_to == '3'){ //ev to ev
                    var url = encodeURI("<?php echo base_url("cdc/ajax_update_ini_ev_to_ev");?>");
                     console.log(url+"?campaign_cids_to="+campaign_cids_to+"&campaign_cids_from="+campaign_cids_from);
         
                      $.ajax({
                            url :'<?php echo base_url("cdc/ajax_update_ini_ev_to_ev");?>',
                            type: 'GET', 
                            // contentType: "application/json",
                            dataType: 'json',              
                            data: {
                            
                              campaign_cids_to: campaign_cids_to,
                              campaign_cids_from: campaign_cids_from,
                              leadsno:leadsno
                               },
                              async: true,
                                      cache: false,
                                      success: function(response){                 
                                      var text = response.statusCode;
                                      console.log("check");
                                      if(response.statusCode == "Success") 
                                      {         
                                          
                                          $("#initialisecampaign").html("Initialized!");   
                                          $("#initialisecampaign").attr("disabled", true); 
                                        
                                      }


                                  },
                                  error: function (error) {
                                    alert("Error");
                                    }
                                
                              }); //Ajax End
                }else if(camp_stage_from == '3' && camp_stage_to == '4'){ //ev to cdc
                    var url = encodeURI("<?php echo base_url("cdc/ajax_update_ini_ev_to_cdc");?>");
                     console.log(url+"?campaign_cids_to="+campaign_cids_to+"&campaign_cids_from="+campaign_cids_from);
         
                      $.ajax({
                            url :'<?php echo base_url("cdc/ajax_update_ini_ev_to_cdc");?>',
                            type: 'GET', 
                            // contentType: "application/json",
                            dataType: 'json',              
                            data: {
                            
                              campaign_cids_to: campaign_cids_to,
                              campaign_cids_from: campaign_cids_from,
                              leadsno:leadsno
                               },
                              async: true,
                                      cache: false,
                                      success: function(response){                 
                                      var text = response.statusCode;
                                      console.log("check");
                                      if(response.statusCode == "Success") 
                                      {         
                                          
                                          $("#initialisecampaign").html("Initialized!");   
                                          $("#initialisecampaign").attr("disabled", true); 
                                        
                                      }


                                  },
                                  error: function (error) {
                                    alert("Error");
                                    }
                                
                              }); //Ajax End
                }else if(camp_stage_from == '4' && camp_stage_to == '1'){ //cdc to dc
                    var url = encodeURI("<?php echo base_url("cdc/ajax_update_ini_cdc_to_dc");?>");
                     console.log(url+"?campaign_cids_to="+campaign_cids_to+"&campaign_cids_from="+campaign_cids_from);
         
                      $.ajax({
                            url :'<?php echo base_url("cdc/ajax_update_ini_cdc_to_dc");?>',
                            type: 'GET', 
                            // contentType: "application/json",
                            dataType: 'json',              
                            data: {
                            
                              campaign_cids_to: campaign_cids_to,
                              campaign_cids_from: campaign_cids_from,
                              leadsno:leadsno
                               },
                              async: true,
                                      cache: false,
                                      success: function(response){                 
                                      var text = response.statusCode;
                                      console.log("check");
                                      if(response.statusCode == "Success") 
                                      {         
                                          
                                          $("#initialisecampaign").html("Initialized!");   
                                          $("#initialisecampaign").attr("disabled", true); 
                                        
                                      }


                                  },
                                  error: function (error) {
                                    alert("Error");
                                    }
                                
                              }); //Ajax End
                }else if(camp_stage_from == '4' && camp_stage_to == '2'){ //cdc to dv
                    var url = encodeURI("<?php echo base_url("cdc/ajax_update_ini_cdc_to_dv");?>");
                     console.log(url+"?campaign_cids_to="+campaign_cids_to+"&campaign_cids_from="+campaign_cids_from);
         
                      $.ajax({
                            url :'<?php echo base_url("cdc/ajax_update_ini_cdc_to_dv");?>',
                            type: 'GET', 
                            // contentType: "application/json",
                            dataType: 'json',              
                            data: {
                            
                              campaign_cids_to: campaign_cids_to,
                              campaign_cids_from: campaign_cids_from,
                              leadsno:leadsno
                               },
                              async: true,
                                      cache: false,
                                      success: function(response){                 
                                      var text = response.statusCode;
                                      console.log("check");
                                      if(response.statusCode == "Success") 
                                      {         
                                          
                                          $("#initialisecampaign").html("Initialized!");   
                                          $("#initialisecampaign").attr("disabled", true); 
                                        
                                      }


                                  },
                                  error: function (error) {
                                    alert("Error");
                                    }
                                
                              }); //Ajax End
                }else if(camp_stage_from == '4' && camp_stage_to == '3'){ //cdc to ev
                    var url = encodeURI("<?php echo base_url("cdc/ajax_update_ini_cdc_to_ev");?>");
                     console.log(url+"?campaign_cids_to="+campaign_cids_to+"&campaign_cids_from="+campaign_cids_from);
         
                      $.ajax({
                            url :'<?php echo base_url("cdc/ajax_update_ini_cdc_to_ev");?>',
                            type: 'GET', 
                            // contentType: "application/json",
                            dataType: 'json',              
                            data: {
                            
                              campaign_cids_to: campaign_cids_to,
                              campaign_cids_from: campaign_cids_from,
                              leadsno:leadsno
                               },
                              async: true,
                                      cache: false,
                                      success: function(response){                 
                                      var text = response.statusCode;
                                      console.log("check");
                                      if(response.statusCode == "Success") 
                                      {         
                                          
                                          $("#initialisecampaign").html("Initialized!");   
                                          $("#initialisecampaign").attr("disabled", true); 
                                        
                                      }


                                  },
                                  error: function (error) {
                                    alert("Error");
                                    }
                                
                              }); //Ajax End
                }else if(camp_stage_from == '4' && camp_stage_to == '4'){ //cdc to cdc
                    var url = encodeURI("<?php echo base_url("cdc/ajax_update_ini_cdc_to_cdc");?>");
                     console.log(url+"?campaign_cids_to="+campaign_cids_to+"&campaign_cids_from="+campaign_cids_from);
         
                      $.ajax({
                            url :'<?php echo base_url("cdc/ajax_update_ini_cdc_to_cdc");?>',
                            type: 'GET', 
                            // contentType: "application/json",
                            dataType: 'json',              
                            data: {
                            
                              campaign_cids_to: campaign_cids_to,
                              campaign_cids_from: campaign_cids_from,
                              leadsno:leadsno
                               },
                              async: true,
                                      cache: false,
                                      success: function(response){                 
                                      var text = response.statusCode;
                                      console.log("check");
                                      if(response.statusCode == "Success") 
                                      {         
                                          
                                          $("#initialisecampaign").html("Initialized!");   
                                          $("#initialisecampaign").attr("disabled", true); 
                                        
                                      }


                                  },
                                  error: function (error) {
                                    alert("Error");
                                    }
                                
                              }); //Ajax End

                }else{
                  
                }
            }
            
            if(penchk == '1'){ //pending checked
            
              if(leadsno > pending || leadsno <= '0')
                  {
                    alert("No. of leads should be greater than 0 and less than pending leads");
                    return;
                  }
              
                if(camp_stage_from == '1' && camp_stage_to == '1') ///dc to dc pending
                  { //dc to dc stage
                    var url = encodeURI("<?php echo base_url("cdc/ajax_update_ini_to_dc_pending");?>");
                     console.log(url+"?campaign_cids_to="+campaign_cids_to+"&campaign_cids_from="+campaign_cids_from);
         
                      $.ajax({
                            url :'<?php echo base_url("cdc/ajax_update_ini_to_dc_pending");?>',
                            type: 'GET', 
                            // contentType: "application/json",
                            dataType: 'json',              
                            data: {
                            
                              campaign_cids_to: campaign_cids_to,
                              campaign_cids_from: campaign_cids_from,
                              leadsno: leadsno
                               },
                              async: true,
                                      cache: false,
                                      success: function(response){                 
                                      var text = response.statusCode;
                                      console.log("check");
                                      if(response.statusCode == "Success") 
                                      {         
                                          
                                          $("#initialisecampaign").html("Initialized!");   
                                          $("#initialisecampaign").attr("disabled", true); 
                                        
                                      }


                                  },
                                  error: function (error) {
                                    alert("Error");
                                    }
                                
                              }); //Ajax End



                }else if(camp_stage_from == '1' && camp_stage_to == '2'){ //dc to dv pending
                     var url = encodeURI("<?php echo base_url("cdc/ajax_update_ini_dc_to_dv_pending");?>");
                     console.log(url+"?campaign_cids_to="+campaign_cids_to+"&campaign_cids_from="+campaign_cids_from);
         
                      $.ajax({
                            url :'<?php echo base_url("cdc/ajax_update_ini_dc_to_dv_pending");?>',
                            type: 'GET', 
                            // contentType: "application/json",
                            dataType: 'json',              
                            data: {
                            
                              campaign_cids_to: campaign_cids_to,
                              campaign_cids_from: campaign_cids_from,
                              leadsno: leadsno
                               },
                              async: true,
                                      cache: false,
                                      success: function(response){                 
                                      var text = response.statusCode;
                                      console.log("check");
                                      if(response.statusCode == "Success") 
                                      {         
                                          
                                          $("#initialisecampaign").html("Initialized!");   
                                          $("#initialisecampaign").attr("disabled", true); 
                                        
                                      }


                                  },
                                  error: function (error) {
                                    alert("Error");
                                    }
                                
                              }); //Ajax End
                 
                }else if(camp_stage_from == '1' && camp_stage_to == '3'){ //dc to ev pending

                     var url = encodeURI("<?php echo base_url("cdc/ajax_update_ini_dc_to_ev_pending");?>");
                     console.log(url+"?campaign_cids_to="+campaign_cids_to+"&campaign_cids_from="+campaign_cids_from);
         
                      $.ajax({
                            url :'<?php echo base_url("cdc/ajax_update_ini_dc_to_ev_pending");?>',
                            type: 'GET', 
                            // contentType: "application/json",
                            dataType: 'json',              
                            data: {
                            
                              campaign_cids_to: campaign_cids_to,
                              campaign_cids_from: campaign_cids_from,
                              leadsno:leadsno
                               },
                              async: true,
                                      cache: false,
                                      success: function(response){                 
                                      var text = response.statusCode;
                                      console.log("check");
                                      if(response.statusCode == "Success") 
                                      {         
                                          
                                          $("#initialisecampaign").html("Initialized!");   
                                          $("#initialisecampaign").attr("disabled", true); 
                                        
                                      }


                                  },
                                  error: function (error) {
                                    alert("Error");
                                    }
                                
                              }); //Ajax End

                }else if(camp_stage_from == '1' && camp_stage_to == '4'){ //dc to cdc pending
                     var url = encodeURI("<?php echo base_url("cdc/ajax_update_ini_dc_to_cdc_pending");?>");
                     console.log(url+"?campaign_cids_to="+campaign_cids_to+"&campaign_cids_from="+campaign_cids_from);
         
                      $.ajax({
                            url :'<?php echo base_url("cdc/ajax_update_ini_dc_to_cdc_pending");?>',
                            type: 'GET', 
                            // contentType: "application/json",
                            dataType: 'json',              
                            data: {
                            
                              campaign_cids_to: campaign_cids_to,
                              campaign_cids_from: campaign_cids_from,
                              leadsno:leadsno
                               },
                              async: true,
                                      cache: false,
                                      success: function(response){                 
                                      var text = response.statusCode;
                                      console.log("check");
                                      if(response.statusCode == "Success") 
                                      {         
                                          
                                          $("#initialisecampaign").html("Initialized!");   
                                          $("#initialisecampaign").attr("disabled", true); 
                                        
                                      }


                                  },
                                  error: function (error) {
                                    alert("Error");
                                    }
                                
                              }); //Ajax End

                }else if(camp_stage_from == '2' && camp_stage_to == '1'){ //dv to dc pending
                  var url = encodeURI("<?php echo base_url("cdc/ajax_update_ini_dv_to_dc_pending");?>");
                     console.log(url+"?campaign_cids_to="+campaign_cids_to+"&campaign_cids_from="+campaign_cids_from);
         
                      $.ajax({
                            url :'<?php echo base_url("cdc/ajax_update_ini_dv_to_dc_pending");?>',
                            type: 'GET', 
                            // contentType: "application/json",
                            dataType: 'json',              
                            data: {
                            
                              campaign_cids_to: campaign_cids_to,
                              campaign_cids_from: campaign_cids_from,
                              leadsno:leadsno
                               },
                              async: true,
                                      cache: false,
                                      success: function(response){                 
                                      var text = response.statusCode;
                                      console.log("check");
                                      if(response.statusCode == "Success") 
                                      {         
                                          
                                          $("#initialisecampaign").html("Initialized!");   
                                          $("#initialisecampaign").attr("disabled", true); 
                                        
                                      }


                                  },
                                  error: function (error) {
                                    alert("Error");
                                    }
                                
                              }); //Ajax End
                
                }else if(camp_stage_from == '2' && camp_stage_to == '2'){ //dv to dv pending
                    var url = encodeURI("<?php echo base_url("cdc/ajax_update_ini_dv_to_dv_pending");?>");
                     console.log(url+"?campaign_cids_to="+campaign_cids_to+"&campaign_cids_from="+campaign_cids_from);
         
                      $.ajax({
                            url :'<?php echo base_url("cdc/ajax_update_ini_dv_to_dv_pending");?>',
                            type: 'GET', 
                            // contentType: "application/json",
                            dataType: 'json',              
                            data: {
                            
                              campaign_cids_to: campaign_cids_to,
                              campaign_cids_from: campaign_cids_from,
                              leadsno:leadsno
                               },
                              async: true,
                                      cache: false,
                                      success: function(response){                 
                                      var text = response.statusCode;
                                      console.log("check");
                                      if(response.statusCode == "Success") 
                                      {         
                                          
                                          $("#initialisecampaign").html("Initialized!");   
                                          $("#initialisecampaign").attr("disabled", true); 
                                        
                                      }


                                  },
                                  error: function (error) {
                                    alert("Error");
                                    }
                                
                              }); //Ajax End
                }else if(camp_stage_from == '2' && camp_stage_to == '3'){ //dv to ev pending
                    var url = encodeURI("<?php echo base_url("cdc/ajax_update_ini_dv_to_ev_pending");?>");
                     console.log(url+"?campaign_cids_to="+campaign_cids_to+"&campaign_cids_from="+campaign_cids_from);
         
                      $.ajax({
                            url :'<?php echo base_url("cdc/ajax_update_ini_dv_to_ev_pending");?>',
                            type: 'GET', 
                            // contentType: "application/json",
                            dataType: 'json',              
                            data: {
                            
                              campaign_cids_to: campaign_cids_to,
                              campaign_cids_from: campaign_cids_from,
                              leadsno:leadsno
                               },
                              async: true,
                                      cache: false,
                                      success: function(response){                 
                                      var text = response.statusCode;
                                      console.log("check");
                                      if(response.statusCode == "Success") 
                                      {         
                                          
                                          $("#initialisecampaign").html("Initialized!");   
                                          $("#initialisecampaign").attr("disabled", true); 
                                        
                                      }


                                  },
                                  error: function (error) {
                                    alert("Error");
                                    }
                                
                              }); //Ajax End
                }else if(camp_stage_from == '2' && camp_stage_to == '4'){ //dv to cdc
                    var url = encodeURI("<?php echo base_url("cdc/ajax_update_ini_dv_to_cdc_pending");?>");
                     console.log(url+"?campaign_cids_to="+campaign_cids_to+"&campaign_cids_from="+campaign_cids_from);
         
                      $.ajax({
                            url :'<?php echo base_url("cdc/ajax_update_ini_dv_to_cdc_pending");?>',
                            type: 'GET', 
                            // contentType: "application/json",
                            dataType: 'json',              
                            data: {
                            
                              campaign_cids_to: campaign_cids_to,
                              campaign_cids_from: campaign_cids_from,
                              leadsno:leadsno
                               },
                              async: true,
                                      cache: false,
                                      success: function(response){                 
                                      var text = response.statusCode;
                                      console.log("check");
                                      if(response.statusCode == "Success") 
                                      {         
                                          
                                          $("#initialisecampaign").html("Initialized!");   
                                          $("#initialisecampaign").attr("disabled", true); 
                                        
                                      }


                                  },
                                  error: function (error) {
                                    alert("Error");
                                    }
                                
                              }); //Ajax End
                }else if(camp_stage_from == '3' && camp_stage_to == '1'){ //ev to dc pending
                    var url = encodeURI("<?php echo base_url("cdc/ajax_update_ini_ev_to_dc_pending");?>");
                     console.log(url+"?campaign_cids_to="+campaign_cids_to+"&campaign_cids_from="+campaign_cids_from);
         
                      $.ajax({
                            url :'<?php echo base_url("cdc/ajax_update_ini_ev_to_dc_pending");?>',
                            type: 'GET', 
                            // contentType: "application/json",
                            dataType: 'json',              
                            data: {
                            
                              campaign_cids_to: campaign_cids_to,
                              campaign_cids_from: campaign_cids_from,
                              leadsno:leadsno
                               },
                              async: true,
                                      cache: false,
                                      success: function(response){                 
                                      var text = response.statusCode;
                                      console.log("check");
                                      if(response.statusCode == "Success") 
                                      {         
                                          
                                          $("#initialisecampaign").html("Initialized!");   
                                          $("#initialisecampaign").attr("disabled", true); 
                                        
                                      }


                                  },
                                  error: function (error) {
                                    alert("Error");
                                    }
                                
                              }); //Ajax End
                }else if(camp_stage_from == '3' && camp_stage_to == '2'){ //ev to dv
                    var url = encodeURI("<?php echo base_url("cdc/ajax_update_ini_ev_to_dv_pending");?>");
                     console.log(url+"?campaign_cids_to="+campaign_cids_to+"&campaign_cids_from="+campaign_cids_from);
         
                      $.ajax({
                            url :'<?php echo base_url("cdc/ajax_update_ini_ev_to_dv_pending");?>',
                            type: 'GET', 
                            // contentType: "application/json",
                            dataType: 'json',              
                            data: {
                            
                              campaign_cids_to: campaign_cids_to,
                              campaign_cids_from: campaign_cids_from,
                              leadsno:leadsno
                               },
                              async: true,
                                      cache: false,
                                      success: function(response){                 
                                      var text = response.statusCode;
                                      console.log("check");
                                      if(response.statusCode == "Success") 
                                      {         
                                          
                                          $("#initialisecampaign").html("Initialized!");   
                                          $("#initialisecampaign").attr("disabled", true); 
                                        
                                      }


                                  },
                                  error: function (error) {
                                    alert("Error");
                                    }
                                
                              }); //Ajax End
                }else if(camp_stage_from == '3' && camp_stage_to == '3'){ //ev to ev pending
                    var url = encodeURI("<?php echo base_url("cdc/ajax_update_ini_ev_to_ev_pending");?>");
                     console.log(url+"?campaign_cids_to="+campaign_cids_to+"&campaign_cids_from="+campaign_cids_from);
         
                      $.ajax({
                            url :'<?php echo base_url("cdc/ajax_update_ini_ev_to_ev_pending");?>',
                            type: 'GET', 
                            // contentType: "application/json",
                            dataType: 'json',              
                            data: {
                            
                              campaign_cids_to: campaign_cids_to,
                              campaign_cids_from: campaign_cids_from,
                              leadsno:leadsno
                               },
                              async: true,
                                      cache: false,
                                      success: function(response){                 
                                      var text = response.statusCode;
                                      console.log("check");
                                      if(response.statusCode == "Success") 
                                      {         
                                          
                                          $("#initialisecampaign").html("Initialized!");   
                                          $("#initialisecampaign").attr("disabled", true); 
                                        
                                      }


                                  },
                                  error: function (error) {
                                    alert("Error");
                                    }
                                
                              }); //Ajax End
                }else if(camp_stage_from == '3' && camp_stage_to == '4'){ //ev to cdc pending
                    var url = encodeURI("<?php echo base_url("cdc/ajax_update_ini_ev_to_cdc_pending");?>");
                     console.log(url+"?campaign_cids_to="+campaign_cids_to+"&campaign_cids_from="+campaign_cids_from);
         
                      $.ajax({
                            url :'<?php echo base_url("cdc/ajax_update_ini_ev_to_cdc_pending");?>',
                            type: 'GET', 
                            // contentType: "application/json",
                            dataType: 'json',              
                            data: {
                            
                              campaign_cids_to: campaign_cids_to,
                              campaign_cids_from: campaign_cids_from,
                              leadsno:leadsno
                               },
                              async: true,
                                      cache: false,
                                      success: function(response){                 
                                      var text = response.statusCode;
                                      console.log("check");
                                      if(response.statusCode == "Success") 
                                      {         
                                          
                                          $("#initialisecampaign").html("Initialized!");   
                                          $("#initialisecampaign").attr("disabled", true); 
                                        
                                      }


                                  },
                                  error: function (error) {
                                    alert("Error");
                                    }
                                
                              }); //Ajax End
                }else if(camp_stage_from == '4' && camp_stage_to == '1'){ //cdc to dc pending
                    var url = encodeURI("<?php echo base_url("cdc/ajax_update_ini_cdc_to_dc_pending");?>");
                     console.log(url+"?campaign_cids_to="+campaign_cids_to+"&campaign_cids_from="+campaign_cids_from);
         
                      $.ajax({
                            url :'<?php echo base_url("cdc/ajax_update_ini_cdc_to_dc_pending");?>',
                            type: 'GET', 
                            // contentType: "application/json",
                            dataType: 'json',              
                            data: {
                            
                              campaign_cids_to: campaign_cids_to,
                              campaign_cids_from: campaign_cids_from,
                              leadsno:leadsno
                               },
                              async: true,
                                      cache: false,
                                      success: function(response){                 
                                      var text = response.statusCode;
                                      console.log("check");
                                      if(response.statusCode == "Success") 
                                      {         
                                          
                                          $("#initialisecampaign").html("Initialized!");   
                                          $("#initialisecampaign").attr("disabled", true); 
                                        
                                      }


                                  },
                                  error: function (error) {
                                    alert("Error");
                                    }
                                
                              }); //Ajax End
                }else if(camp_stage_from == '4' && camp_stage_to == '2'){ //cdc to dv pending
                    var url = encodeURI("<?php echo base_url("cdc/ajax_update_ini_cdc_to_dv_pending");?>");
                     console.log(url+"?campaign_cids_to="+campaign_cids_to+"&campaign_cids_from="+campaign_cids_from);
         
                      $.ajax({
                            url :'<?php echo base_url("cdc/ajax_update_ini_cdc_to_dv_pending");?>',
                            type: 'GET', 
                            // contentType: "application/json",
                            dataType: 'json',              
                            data: {
                            
                              campaign_cids_to: campaign_cids_to,
                              campaign_cids_from: campaign_cids_from,
                              leadsno:leadsno
                               },
                              async: true,
                                      cache: false,
                                      success: function(response){                 
                                      var text = response.statusCode;
                                      console.log("check");
                                      if(response.statusCode == "Success") 
                                      {         
                                          
                                          $("#initialisecampaign").html("Initialized!");   
                                          $("#initialisecampaign").attr("disabled", true); 
                                        
                                      }


                                  },
                                  error: function (error) {
                                    alert("Error");
                                    }
                                
                              }); //Ajax End
                }else if(camp_stage_from == '4' && camp_stage_to == '3'){ //cdc to ev pending
                    var url = encodeURI("<?php echo base_url("cdc/ajax_update_ini_cdc_to_ev_pending");?>");
                     console.log(url+"?campaign_cids_to="+campaign_cids_to+"&campaign_cids_from="+campaign_cids_from);
         
                      $.ajax({
                            url :'<?php echo base_url("cdc/ajax_update_ini_cdc_to_ev_pending");?>',
                            type: 'GET', 
                            // contentType: "application/json",
                            dataType: 'json',              
                            data: {
                            
                              campaign_cids_to: campaign_cids_to,
                              campaign_cids_from: campaign_cids_from,
                              leadsno:leadsno
                               },
                              async: true,
                                      cache: false,
                                      success: function(response){                 
                                      var text = response.statusCode;
                                      console.log("check");
                                      if(response.statusCode == "Success") 
                                      {         
                                          
                                          $("#initialisecampaign").html("Initialized!");   
                                          $("#initialisecampaign").attr("disabled", true); 
                                        
                                      }


                                  },
                                  error: function (error) {
                                    alert("Error");
                                    }
                                
                              }); //Ajax End
                }else if(camp_stage_from == '4' && camp_stage_to == '4'){ //cdc to cdc pending
                    var url = encodeURI("<?php echo base_url("cdc/ajax_update_ini_cdc_to_cdc_pending");?>");
                     console.log(url+"?campaign_cids_to="+campaign_cids_to+"&campaign_cids_from="+campaign_cids_from);
         
                      $.ajax({
                            url :'<?php echo base_url("cdc/ajax_update_ini_cdc_to_cdc_pending");?>',
                            type: 'GET', 
                            // contentType: "application/json",
                            dataType: 'json',              
                            data: {
                            
                              campaign_cids_to: campaign_cids_to,
                              campaign_cids_from: campaign_cids_from,
                              leadsno:leadsno
                               },
                              async: true,
                                      cache: false,
                                      success: function(response){                 
                                      var text = response.statusCode;
                                      console.log("check");
                                      if(response.statusCode == "Success") 
                                      {         
                                          
                                          $("#initialisecampaign").html("Initialized!");   
                                          $("#initialisecampaign").attr("disabled", true); 
                                        
                                      }


                                  },
                                  error: function (error) {
                                    alert("Error");
                                    }
                                
                              }); //Ajax End

                }else{
                  
                }


            }
           }else{
            alert("Please fill mandatory fields"); //Empty
           } 


        });
      });  

             
  $("#basic-form").validate({
    rules: {
     
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
          var campaign_cids_from = $('#campaign_cids_from').val();
          
          if(camp_stage_from == '1'){ //dc stage

                    var urlq = '<?php echo base_url("cdc/getdccount");?>';
                  console.log(urlq+'?campaign_cids_from='+campaign_cids_from);
                    // AJAX request
                    $.ajax({
                        url:'<?php echo base_url("cdc/getdccount");?>',
                        method: 'get',
                        data: {campaign_cids_from: campaign_cids_from},
                        dataType: 'json',
                        success: function(response){
                            // var dataResult = JSON.parse(response);
                            // $('#cleared').val(dataResult);
                            $('#cleared').val(response.cleareddata);
                            $('#leadsno').val(response.cleareddata);
                            $('#pending').val(response.pendingdata);
                            


                        }
                    });
                // AJAX request end
                } else if(camp_stage_from == '2'){
                  var urlq = '<?php echo base_url("cdc/getdvcount");?>';
                  console.log(urlq+'?campaign_cids_from='+campaign_cids_from);
                    // AJAX request
                    $.ajax({
                        url:'<?php echo base_url("cdc/getdvcount");?>',
                        method: 'get',
                        data: {campaign_cids_from: campaign_cids_from},
                        dataType: 'json',
                        success: function(response){
                           
                            $('#cleared').val(response.cleareddata);
                            $('#leadsno').val(response.cleareddata);
                            $('#pending').val(response.pendingdata);
                            


                        }
                    });
                } else if(camp_stage_from == '3'){
                  var urlq = '<?php echo base_url("cdc/getevcount");?>';
                  console.log(urlq+'?campaign_cids_from='+campaign_cids_from);
                    // AJAX request
                    $.ajax({
                        url:'<?php echo base_url("cdc/getevcount");?>',
                        method: 'get',
                        data: {campaign_cids_from: campaign_cids_from},
                        dataType: 'json',
                        success: function(response){
                           
                            $('#cleared').val(response.cleareddata);
                            $('#leadsno').val(response.cleareddata);
                            $('#pending').val(response.pendingdata);
                            


                        }
                    });
                } else if(camp_stage_from == '4'){
                  var urlq = '<?php echo base_url("cdc/getcdccount");?>';
                  console.log(urlq+'?campaign_cids_from='+campaign_cids_from);
                    // AJAX request
                    $.ajax({
                        url:'<?php echo base_url("cdc/getcdccount");?>',
                        method: 'get',
                        data: {campaign_cids_from: campaign_cids_from},
                        dataType: 'json',
                        success: function(response){
                           
                            $('#cleared').val(response.cleareddata);
                            $('#leadsno').val(response.cleareddata);
                            $('#pending').val(response.pendingdata);
                            


                        }
                    });
                } else{// End Dv
              alert("Select DC");
                }

      });



     
  
         
          


});
$(document).ready(function() {

$("#leadsno").bind("keypress", function (e) {

    var keyCode = e.which ? e.which : e.keyCode

         

    if (!(keyCode >= 48 && keyCode <= 57)) {

      $(".error").css("display", "inline");

      return false;

    }else{

      $(".error").css("display", "none");

    }

});

});



     </script>

    

  