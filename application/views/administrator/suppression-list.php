<style>
    .multiselect-container{position:absolute;list-style-type:none;margin:0;padding:0}.multiselect-container .input-group{margin:5px}.multiselect-container>li{padding:0}.multiselect-container>li>a.multiselect-all label{font-weight:700}.multiselect-container>li>label.multiselect-group{margin:0;padding:3px 20px;height:100%;font-weight:700}.multiselect-container>li>a{padding:0}.multiselect-container>li>a>label{margin:0;height:100%;cursor:pointer;font-weight:400;padding:3px 20px 3px 40px}.multiselect-container>li>a>label.radio,.multiselect-container>li>a>label.checkbox{margin:0}.multiselect-container>li>a>label>input[type=checkbox]{margin-bottom:5px}.btn-group>.btn-group:nth-child(2)>.multiselect.btn{border-top-left-radius:4px;border-bottom-left-radius:4px}.form-inline .multiselect-container label.checkbox,.form-inline .multiselect-container label.radio{padding:3px 20px 3px 40px}.form-inline .multiselect-container li a label.checkbox input[type=checkbox],.form-inline .multiselect-container li a label.radio input[type=radio]{margin-left:-20px;margin-right:0}

    #myModal .modal-body 
    { 
        min-height: 400px;
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
                <div class="card-header">
                    <h5>Add Suppression List</h5>
                    <div class="card-header-right">
                        <i class="icofont icofont-rounded-down"></i>
                        <i class="icofont icofont-refresh"></i>
                        <i class="icofont icofont-close-circled"></i>
                    </div>
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
                        <!-- <form id="addcampForm" method="POST" enctype="multipart/form-data"> -->

                        <div class="form-group row">
                        
                            <div class="col-sm-3">
                                <label class="col-lable"><b>Campaign Name</b></label>

                                <?php // echo form_error('campaign_name'); ?>
                                <input type="text"  name="campaign_name"  placeholder="Enter Campaign Name"  value="<?php echo set_value('campaign_name'); ?>" id="campaign_name" 
                                <?php echo (form_error('campaign_name')) ? 'class="form-control form-control-danger"' :'class="form-control"';?> >
                                <span style='color:#FF0000' id="campaign_name_msg"></span>
                            </div>
                            <div class="col-sm-4" id="mybtn"> 
                            <label class="f-left col-lable"><b>Company Names (*.csv) </b> </label>
                            <input type="file" name="company_name[]" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-3">
                                <label class="col-lable"><b>Exclusion Type</b></label><?php echo form_error('emplzid'); ?>
                                <select class="js-example-basic-multiple col-sm-12" multiple="multiple" name="emplzid[]" id="emplzid">
                                <?php foreach ($empsize as $empsize): ?>
                                    <option value="<?php echo $empsize['emplzid']; ?>"><?php echo $empsize['emplsizerange']; ?></option>
                                <?php endforeach; ?>
                                    </select>
                            </div>
                            <div class="col-sm-4"> 
                            <label class="f-left col-lable"><b>Domain Names (*.csv)  </b> </label>
                            <input type="file" name="domain_names[]" class="form-control">
                            </div>
                            

                        </div>


                        <div class="form-group row">
                            <div class="col-sm-3">
                                <label class="col-lable"><b>Suppression Type</b></label><?php echo form_error('revid'); ?>
                              <select class="js-example-basic-multiple col-sm-12" multiple="multiple" name="revid[]" id="revid">
                                <?php foreach ($revsize as $revsize): ?>
                                    <option value="<?php echo $revsize['comzid']; ?>"><?php echo $revsize['rangelist']; ?></option>
                                <?php endforeach; ?>
                                    </select>
                            </div>
                            
                            
                            <div class="col-sm-4"> 
                            <label class="f-left col-lable"><b>Campaign Name (*.csv)  </b> </label>
                            <input type="file" name="domain_names[]" class="form-control">
                            </div>
                                 
                        </div>
    
                        
                        
                        <div class="form-group row">
                        <div class="col-sm-3">
                                <label  class="col-lable"><b>Client Id</b></label>
                                 <select name="client_id" id="client_id"  <?php echo (form_error('client_id')) ? 'class="form-control form-control-danger"' : 'class="form-control"';?>>
                                      <option value="<?php echo set_select('client_id'); ?>">Select One Client ID</option>
                                <?php foreach ($clients as $client): ?>
                                    <option value="<?php echo $client['clientid']; ?>"><?php echo $client['clientcode']; ?></option>
                                <?php endforeach; ?>
                                </select>
                                <span style='color:#FF0000' id="client_id_msg"></span>
                            </div>
                            <div class="col-sm-4">
                                <label class="col-lable"><b>Select Period</b></label><?php echo form_error('desid'); ?>
                                <select class="js-example-basic-multiple col-sm-12" multiple="multiple" name="desid[]" id="desid">
                                <?php foreach ($designation as $designation): ?>
                                    <option value="<?php echo $designation['tid']; ?>"><?php echo $designation['designation']; ?></option>
                                <?php endforeach; ?>
                                   
                                </select>
                            </div>

                        </div>
                        
                        


                        <div class="form-group row">

                            <div class="col-sm-6">
                                <button type="submit" name="submit" class="btn btn-primary"  id="addcampbtn">Add To Suppression List</button>
                            </div>
                             
                        </div>
                        <!--<textarea id="description" style="visibility: hidden;"></textarea>-->

                        <!-- </form> -->
                    </div>
                           
                </div>
            </div>
        </div>
        <!-- Basic Form Inputs card end -->

 
    
<script>
    $(function() {
        $("#addcampbtn").on('click', function() 
        {
            var campaign_id = $('#campaign_id').val();
            var client_id = $('#client_id').val();
            var campaign_name = $('#campaign_name').val();
            var country_id = $('#country_id').val(); 
            var region_id = $('#region_id').val(); 
            var industrycd = $('#industrycd').val(); 
            var dcd = $('#dcd').val(); 
            var emplzid = $('#emplzid').val(); 
            var revid = $('#revid').val(); 
            var desid = $('#desid').val();
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
          
            var inclist =$('#inclist').prop('checked');
            var cdqa = $('#cdqa').prop('checked');
            var quantity = $('#quantity').val();
            var selectstatus = $('#selectstatus').val();
            var estclosedt = $('#estclosedt').val();
            var startdt = $('#startdt').val();

            $.ajax({
                url :'<?php echo base_url("campaigns/ajax_add_campaign");?>',
                type: 'POST', 
                dataType: 'json',              
                data: {
					campaign_id: campaign_id,
                    client_id:client_id,
					campaign_name: campaign_name,
                    country_id:country_id,
                    region_id:region_id,
                    industrycd:industrycd,
                    dcd:dcd,
                    emplzid:emplzid,
                    revid:revid,
                    desid:desid,
                    checksupp:checksupp,
                    inclist:inclist,
                    cdqa:cdqa,
                    quantity:quantity,
                    selectstatus:selectstatus,
                    estclosedt:estclosedt,
                    startdt:startdt
                    

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
  