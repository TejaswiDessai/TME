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

    $('#noneAboveCheck').change(function () {
        $('#noneAbove').toggle(this.checked);
    }).change();

    $('#incarcerated, #support').change(function () {
        if ($(this).attr("checked")) {
            $('#noneAboveCheck').attr('disabled', true);
        } else {
            $('#noneAboveCheck').attr('disabled', false);
        }
    });

    
    $('#noneAboveCheckInclusion').change(function () {
        $('#noneAboveInclusion').toggle(this.checked);
    }).change();

    $('#incarcerated, #support').change(function () {
        if ($(this).attr("checked")) {
            $('#noneAboveCheckInclusion').attr('disabled', true);
        } else {
            $('#noneAboveCheckInclusion').attr('disabled', false);
        }
    });

});
</script>
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script> -->
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
            <li class="breadcrumb-item"><a href="#!">Suppression List</a>
            </li>
            <li class="breadcrumb-item"><a href="#!">Add Suppression List</a>
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
                <!-- <div class="card-header">
                    <h5>Add Suppression List</h5>
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
                        <form id="addcampForm" method="post" action="ajax_add_suppression_list" enctype="multipart/form-data">

                        <div class="form-group row">
                        
                            <div class="col-sm-3">
                                <label class="col-lable"><b>Campaign Name</b></label>
                                <?php foreach ($campaign_record as $campaign_record): ?>
                                    <?php 
                                    
                                    if($campaign_record['suplistnew'] == 0 && $campaign_record['inclistnew'] == 0 && $campaign_record['questnos'] == 0 && $campaign_record['assetid'] == 0 )
                                    {
                                        ?>
                                        <script>
                                        // alert("Campaign Added Successfully");
                                        top.location.href=base_url+"campaigns/addcampaignForm";
                                        </script>
                                        <?php
                                        // redirect('campaigns/addcampaignForm');
                                    }
                                    
                                    ?>
                                    <?php echo $campaign_record['campnm']; ?>
                                <?php // echo form_error('campaign_name'); ?>
                                <input type="hidden"  name="camp_id"  value="<?php echo $campaign_record['cnid']; ?>" id="camp_id" >
                                <span style='color:#FF0000' id="campaign_name_msg"></span>
                               
                            </div>
                            <div class="col-sm-3">
                            <label class="col-lable"><b>Suppression Type</b></label><?php echo form_error('revid'); ?>
                            <select class="js-example-basic-multiple col-sm-12"  name="suptyp" id="suptyp">
                                <option value="1">All</option>
                                <option value="1">Client</option>
                                <option value="0">Internal</option>
                            </select>
                            </div>
                            <!-- below code added by Tejaswi -->
                                <div class="col-sm-3" style="border:1px solid #f1c40f; padding: 3px;">
                                <label class="col-lable"><b>Disclaimer:</b></label>
                                <p>1. File should be saved as <b>".csv"</b> extension.
                                <br>2. File should not have column headings.
                                <br>3. File should have only one column filled with data.
                                <br>4. Click and see below sample image for uploading csv file</p>
                                <a href="#myModalsample" data-target="#myModalsample" data-toggle="modal">
                                <img class="col-sm-12" src="<?php echo base_url(); ?>/assets/images/sample_upload.png"></a>
                                </div>
                                <!-- End -->
                            <!-- <div class="col-sm-3">
                                <label class="col-lable"><b>Select Period</b></label>
                                <select class="js-example-basic-multiple col-sm-12 "  name="period" id="period">
                                <option value="1">1 Month<option>
                                <option value="2">2 Month<option>
                                <option value="3">3 Month<option>
                                <option value="4">4 Month<option>
                                <option value="5">5 Month<option>
                                <option value="6" selected>6 Month<option>
                                </select>
                            </div> -->
                           
                        </div>
                        
                        <div class="form-group row">
                            <?php if($campaign_record['suplistnew'] == 1){?>
                                <div class="col-sm-12">
                                    <label class="col-lable" style="color:#FF5722;"><b>Exclusion Type</b></label><br>
                                </div>
                            <div class="col-sm-3 form-check form-switch ">
                                <!-- <input type="checkbox" class="js-small f-right suppclass" name="suppchk" id="noneAboveCheck" value="" > -->
                                <!-- <div id="noneAbove"> -->
                                <label class="col-lable"><b>Mail List</b></label>
                                <input type="file" name="suplistnew_email" class="form-control">
                            </div>
                            <div class="col-sm-3 form-check form-switch ">
                                <label class="col-lable"><b>Company List</b></label>
                                <input type="file" name="suplistnew_company" class="form-control">
                            </div>
                            <div class="col-sm-3 form-check form-switch ">
                                <label class="col-lable"><b>Domain List </b></label>
                                <input type="file" name="suplistnew_domain" class="form-control">
                            </div>
                                <!-- <label class="f-left col-lable"><b>Exclusion(*.csv) </b> </label>
                                <input type="file" name="userfile" class="form-control"> -->
                                <!-- </div> -->
                            <!-- </div> -->
                            <?php } ?>
                        </div>
                        <hr>
                        <?php if($campaign_record['inclistnew'] == 1){?>
                           <div class="form-group row">
                          
                            <div class="col-sm-12">
                                <label class="col-lable" style="color:#FF5722;"><b>Inclusion Type </b></label>
                            </div>
                            <div class="col-sm-3 form-check form-switch " >
                                <!-- <input type="checkbox" class="js-small f-right suppclass" name="suppchk" id="noneAboveCheckInclusion" value="" > -->
                                <!-- <div id="noneAboveInclusion"> -->
                                <label class="col-lable"><b>Mail List</b></label>
                                <input type="file" name="inclistnew_email" class="form-control">
                            </div>
                            <div class="col-sm-3 form-check form-switch " >
                                <label class="col-lable"><b>Company List</b></label>
                                <input type="file" name="inclistnew_company" class="form-control">
                            </div>
                            
                            <div class="col-sm-3 form-check form-switch " >
                                <label class="col-lable"><b>Domain List</b></label>
                                <input type="file" name="inclistnew_domain" class="form-control">
                            </div>
                                <!-- <label class="f-left col-lable"><b>Inclusion(*.csv) </b> </label>
                            <input type="file" name="userfileincl" class="form-control">
                            </div> -->
                            <!-- </div> -->
                            
                            </div>
                                <div class="form-group row">
                                <div class="col-sm-3 form-check form-switch " >
                                <!-- <label class="col-lable"><b>Company Disposition Neeeded?</b></label>
                                <input type="checkbox" name="dispo_comp" class="form-control"> -->
                                </div>
                                <div class="col-sm-3 form-check form-switch " >
                                <label class="col-lable"><b>Company Disposition Neeeded?</b></label>
                                <input type="checkbox" name="dispo_comp" id="dispo_comp" value="" class="form-control">
                                </div>
                                <div class="col-sm-3 form-check form-switch " >
                                <label class="col-lable"><b>Domain Disposition Neeeded?</b></label>
                                <input type="checkbox" name="dispo_domain" id="dispo_domain" value="" class="form-control">
                                </div>
                                </div>
                            <?php } ?>
                            
                            <hr>
                            <div class="form-group row">
                            <?php if($campaign_record['questnos'] != 0){?>
                            <div class="col-sm-3 form-check form-switch " >
                             <label class="col-lable"><b>Questions(*.csv)</b></label>
                             <!-- <input type="checkbox" class="js-small f-right suppclass" name="suppchk" id="noneAboveCheckInclusion" value="" > -->
                             <!-- <div id="noneAboveInclusion"> -->
                            <!-- <label class="f-left col-lable"><b>Inclusion(*.csv) </b> </label> -->
                            <input type="file" name="userfilequestion" class="form-control">
                            </div>
                            <!-- </div> -->
                            <?php } ?>
                            <?php if($campaign_record['assetid'] != 0 ){?>
                            <div class="col-sm-3 form-check form-switch " >
                             <label class="col-lable"><b>Asset Title(*.csv)</b></label>
                             <!-- <input type="checkbox" class="js-small f-right suppclass" name="suppchk" id="noneAboveCheckInclusion" value="" > -->
                             <!-- <div id="noneAboveInclusion"> -->
                            <!-- <label class="f-left col-lable"><b>Inclusion(*.csv) </b> </label> -->
                            <input type="file" name="userfileasset" class="form-control">
                            </div>
                            <!-- </div> -->
                            <?php } ?>
                        </div>
                        

                        <div class="form-group row">
                            
                        <!-- <div class="col-sm-4" id="noneAbove"> 
                            <label class="f-left col-lable"><b>Exclusion(*.csv) </b> </label>
                            <input type="file" name="userfile" class="form-control">
                        </div>
                            
                        <div class="col-sm-4" id="noneAboveInclusion"> 
                            <label class="f-left col-lable"><b>Inclusion(*.csv) </b> </label>
                            <input type="file" name="userfile" class="form-control">
                        </div> -->
                                 
                        </div>
    
                        
                        
                        <div class="form-group row">
                        <!-- <div class="col-sm-3">
                                <label  class="col-lable"><b>Client Id</b></label>
                                 <select name="client_id" id="client_id"  <?php //echo (form_error('client_id')) ? 'class="form-control form-control-danger"' : 'class="form-control"';?>>
                                      <option value="<?php //echo set_select('client_id'); ?>">Select One Client ID</option>
                                <?php //foreach ($clients as $client): ?>
                                    <option value="<?php //echo $client['clientid']; ?>"><?php //echo $client['clientcode']; ?></option>
                                <?php //endforeach; ?>
                                </select>
                                <span style='color:#FF0000' id="client_id_msg"></span>
                            </div> -->
                           

                        </div>
                        
                        


                        <div class="form-group row">

                            <div class="col-sm-6">
                                <button name="submit" class="btn btn-primary"  id="addSuppressionbtn">Add CSV Data</button>
                            </div>
                             
                        </div>
                        <!--<textarea id="description" style="visibility: hidden;"></textarea>-->
                        <?php endforeach; ?>
                        </form>
                    </div>
                           
                </div>
            </div>
        </div>
        <!-- Basic Form Inputs card end -->

  <!-- Modal -->
  <div class="modal fade" id="myModalsample" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <!-- <h4 class="modal-title">Modal Header</h4> -->
        </div>
        <div class="modal-body">
            <div class="mail-body-content">
                                        <form>
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                <img class ="col-sm-12" src="<?php echo base_url(); ?>/assets/images/sample_upload.png"></a>
                                                </div>
                                            </div>
                                           
                                        </form>
                                       
                                        <div style="clear:both"></div>
		                                    <br />
              </div>
        </div>
        <div class="modal-footer">
       
          <button type="button" class="btn btn-danger " data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
    
<script>
    $(function() {
        $("#addSuppressionbtn").on('click', function() 
        {
            var dispo_comp = $('#dispo_comp').val(); 
            
            var userfile = $('file#userfile').val();
            var files = $('#userfile')[0].files;
            alert("test"+files);
            var client_id = $('#client_id').val();
            var campaign_name = $('#campaign_name').val();
            var suptyp = $('#suptyp').val(); 
            var region_id = $('#region_id').val(); 
            
            var dispo_domain = $('#dispo_domain').val(); 
            // alert(dispo_comp);
            // if(client_id == null || client_id == '')
            // {
            //     $("#client_id_msg").html("<p><strong>Please fill this.</strong></p>");
            //     return;
            // }
            // if(campaign_id == null || campaign_id == '')
            // {
            //     $("#campaign_id_msg").html("<p><strong>Please fill this.</strong></p>");
            //     return;
            // }
            // if(campaign_name == null || campaign_name == '')
            // {
            //     $("#campaign_name_msg").html("<p><strong>Please fill this.</strong></p>");
            //     return;
            // }
           

            $.ajax({
                url :'<?php echo base_url("campaigns/ajax_add_suppression_list");?>',
                type: 'GET', 
                dataType: 'json',              
                data: {
					campaign_id: campaign_id,
                    // client_id:client_id,
					userfile: userfile,
                    dispo_comp:dispo_comp,
                    dispo_domain:dispo_domain,
                    // region_id:region_id,
                   
                    

				},
                cache: false,
                success: function(response){
                    var text = response.statusCode;
                    console.log("check");
                   
                    if(response.statusCode == "Success") 
                    {                        
                        $("#addcampbtn").html(response.message);
                        $("#addcampbtn").prop('disabled', true);
                        top.location.href="suppressionForm";//redirection
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
  