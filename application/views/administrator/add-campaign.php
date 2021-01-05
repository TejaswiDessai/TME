<style>
    .multiselect-container{position:absolute;list-style-type:none;margin:0;padding:0}.multiselect-container .input-group{margin:5px}.multiselect-container>li{padding:0}.multiselect-container>li>a.multiselect-all label{font-weight:700}.multiselect-container>li>label.multiselect-group{margin:0;padding:3px 20px;height:100%;font-weight:700}.multiselect-container>li>a{padding:0}.multiselect-container>li>a>label{margin:0;height:100%;cursor:pointer;font-weight:400;padding:3px 20px 3px 40px}.multiselect-container>li>a>label.radio,.multiselect-container>li>a>label.checkbox{margin:0}.multiselect-container>li>a>label>input[type=checkbox]{margin-bottom:5px}.btn-group>.btn-group:nth-child(2)>.multiselect.btn{border-top-left-radius:4px;border-bottom-left-radius:4px}.form-inline .multiselect-container label.checkbox,.form-inline .multiselect-container label.radio{padding:3px 20px 3px 40px}.form-inline .multiselect-container li a label.checkbox input[type=checkbox],.form-inline .multiselect-container li a label.radio input[type=radio]{margin-left:-20px;margin-right:0}

#myModal .modal-body { 
    min-height: 400px;
}


    </style>
    
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
            <li class="breadcrumb-item"><a href="#!">Campaigns</a>
            </li>
            <li class="breadcrumb-item"><a href="#!">Add Campaign</a>
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
            <div class="card">
                <div class="card-header">
                    <h5>Add Campaign</h5>
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
                    <div class="col-sm-12">
                        <!-- <?php 
                        // echo form_open_multipart('campaigns/add_campaign');
                         ?> -->
                        <!-- <?php 
                        // echo form_open_multipart('', array('id' => 'addcampForm')) ?> -->
                        <!-- <form id="addcampForm" method="POST" enctype="multipart/form-data"> -->

                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label class="col-lable"><b>Client Id</b></label>
                                 <select name="client_id" id="client_id"  <?php echo (form_error('client_id')) ? 'class="form-control form-control-danger"' : 'class="form-control"';?>>
                                      <option value="<?php echo set_select('client_id'); ?>">Select One Client ID</option>
                                <?php foreach ($clients as $client): ?>
                                    <option value="<?php echo $client['clientid']; ?>"><?php echo $client['clientcode']; ?></option>
                                <?php endforeach; ?>
                                </select>

                            </div>
                            <div class="col-sm-6">
                                <label class="col-lable"><b>Campaign Id</b></label>
                                 <?php // echo form_error('campaign_id'); ?>
                                <input type="text" name="campaign_id" id="campaign_id" placeholder="EnterCampaign ID" value="<?php echo set_value('campaign_id'); ?>" 
                                    <?php echo (form_error('campaign_id')) ? 'class="form-control form-control-danger"' : 'class="form-control"';?>>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-12">
                                <label class="col-lable"><b>Campaign Name</b></label>

                                <?php // echo form_error('campaign_name'); ?>
                                <input type="text"  name="campaign_name"  placeholder="Enter Campaign Name"  value="<?php echo set_value('campaign_name'); ?>" id="campaign_name" 
                             <?php echo (form_error('campaign_name')) ? 'class="form-control form-control-danger"' :'class="form-control"';?> >
                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label class="col-lable"><b>Select Country</b></label>  <?php echo form_error('country_id'); ?>
                                <select class="js-example-basic-multiple col-sm-12" multiple="multiple" name="country_id[]" id="country_id">
                                 
                            <?php foreach ($countries as $country): ?>
                                    <option value="<?php echo $country['countrycd'];echo set_select('country_id'); ?>"><?php echo $country['countryname']; ?></option>
                                <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="col-sm-6">
                                <label class="col-lable"><b>World Region</b></label><?php echo form_error('region_id'); ?>
                                <select class="js-example-basic-multiple col-sm-12" multiple="multiple" name="region_id[]" id="region_id">
                                 
                            <?php foreach ($regions as $region): ?>
                                    <option value="<?php echo $region['regioncode']; ?>"><?php echo $region['region']; ?></option>
                                <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label class="col-lable"><b>Industry</b></label><?php echo form_error('industrycd'); ?>
                                <select class="js-example-basic-multiple col-sm-12" multiple="multiple" name="industrycd[]" id="industrycd">
                                     <?php foreach ($industries as $industry): ?>
                                    <option value="<?php echo $industry['industrycd']; ?>"><?php echo $industry['industry']; ?></option>
                                <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label class="col-lable"><b>Department</b></label><?php echo form_error('dcd'); ?>
                                <select class="js-example-basic-multiple col-sm-12" multiple="multiple" name="dcd[]" id="dcd">
                                   <?php foreach ($departments as $dept): ?>
                                    <option value="<?php echo $dept['dcd']; ?>"><?php echo $dept['department']; ?></option>
                                <?php endforeach; ?>
                                </select>
                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="col-sm-4">
                                <label class="col-lable"><b>Select Employee Size</b></label><?php echo form_error('emplzid'); ?>
                                <select class="js-example-basic-multiple col-sm-12" multiple="multiple" name="emplzid[]" id="emplzid">
                                <?php foreach ($empsize as $empsize): ?>
                                    <option value="<?php echo $empsize['emplzid']; ?>"><?php echo $empsize['emplsizerange']; ?></option>
                                <?php endforeach; ?>
                                    </select>
                            </div>
                            <div class="col-sm-4">
                                <label class="col-lable"><b>Select Revenue Size</b></label><?php echo form_error('revid'); ?>
                              <select class="js-example-basic-multiple col-sm-12" multiple="multiple" name="revid[]" id="revid">
                                <?php foreach ($revsize as $revsize): ?>
                                    <option value="<?php echo $revsize['comzid']; ?>"><?php echo $revsize['rangelist']; ?></option>
                                <?php endforeach; ?>
                                    </select>
                            </div>

                            <div class="col-sm-4">
                                <label class="col-lable"><b>Select Designation</b></label><?php echo form_error('desid'); ?>
                              <select class="js-example-basic-multiple col-sm-12" multiple="multiple" name="desid[]" id="desid">
                                <?php foreach ($designation as $designation): ?>
                                    <option value="<?php echo $designation['tid']; ?>"><?php echo $designation['designation']; ?></option>
                                <?php endforeach; ?>
                                   
                                </select>
                            </div>

                        </div>


                        <div class="form-group row">
                           
                              <div class="col-sm-2">
                                            <label class="f-left col-lable"><b>Suppression List</b> </label>
                              </div>
                              <div class="col-sm-2" id="mybtn"> 
                                          <input type="checkbox" class="js-small f-right suppclass" name="suppchk" id="uho" value="" >
                                </div>
                              <div class="col-sm-2">
                                            <label class="f-left col-lable"><b>Inclusion Account List  </b> </label>
                              </div>
                            <div class="col-sm-2"> 
                              <input type="checkbox" class="js-small f-right" name="inclist[]" value="" id="inclist">
                                 </div>
                             <div class="col-sm-4">   
                                              <input type="file" name="files[]" class="form-control">
                                </div>
                                 
                        </div>
                        
                        <div class="form-group row">
                           
                              <div class="col-sm-2">
                                            <label class="f-left col-lable"><b>CDQA Needed?</b> </label>
                              </div>
                            <div class="col-sm-2">
                             <input type="checkbox" class="js-small f-right" name="cdqa[]" value="" id="cdqa">
                               </div>
                              <div class="col-sm-2">
                                  <label class="f-left col-lable"><b>No. of Questions</b><br> <?php echo form_error('quantity'); ?></label>
                              </div>
                               <div class="col-sm-2">   
                                   <input  type="number" id="quantity" name="quantity" min="1" max="12" maxlength="2" value="<?php echo set_value('quantity');?>"
                                    <?php echo (form_error('quantity')) ? 'class="form-control form-control-danger"' :'class="form-control"';?> >
                               </div>
                            <div class="col-sm-4">   
                                <input type="file" name="files[]" class="form-control">
                                </div>
                                 
                        </div>
                        
                        
                        <div class="form-group row">
                              <div class="col-sm-6">
                                <label class="col-lable"><b>Asset Title</b></label>

                                <select class="js-example-basic-multiple col-sm-12" multiple="multiple" name="assetid[]" id="assetid">
                                <?php foreach ($assetitle as $assetitle): ?>
                                    <option value="<?php echo $assetitle['assetid']; ?>"><?php echo $assetitle['title']; ?></option>
                                <?php endforeach; ?>
                                </select>
                            </div>
                              <div class="col-sm-6">
                                <label class="col-lable"><b>Live Status</b></label>

                                 <select name="selectstatus" class="form-control form-control-default" id="selectstatus">
                                   <option value="2">Open</option>
                                    <option value="1">Closed</option>
                                    <option value="3">Hold</option>
                                    <
                                </select>
                            </div>

                        </div>
                        
                        
                        
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label class="col-lable"><b>Est Completion Date</b></label> <?php echo form_error('estclosedt'); ?>
                                <input type="date" id="estclosedt"  name="estclosedt" value="<?php echo set_value('estclosedt');?>" <?php echo (form_error('estclosedt')) ? 'class="form-control form-control-danger"' :'class="form-control"';?> >
                            </div>
                            <div class="col-sm-6">
                                <label class="col-lable"><b>Start Date</b></label> <?php echo form_error('startdt'); ?>
                                <input type="date" id="startdt"  name="startdt" value="<?php echo set_value('startdt');?>"  <?php echo (form_error('startdt')) ? 'class="form-control form-control-danger"' :'class="form-control"';?>>
                            </div>
                        </div>


                        <div class="form-group row">

                            <div class="col-sm-6">
                                <button type="submit" name="submit" class="btn btn-primary"  id="addcampbtn">Add Campaign</button>
                            </div>
                             
                        </div>
                        <!--<textarea id="description" style="visibility: hidden;"></textarea>-->

                        <!-- </form> -->
                    </div>
                           
                </div>
            </div>
        </div>
        <!-- Basic Form Inputs card end -->

 <!--<button type="button" class="btn btn-danger waves-effect" data-toggle="modal" data-target="#Modal-overflow" id="showmodal">Overflow</button>-->
                                        <!-- Modal -->
                                        <div class="modal fade modal-flex" id="Modal-overflow" tabindex="-1" role="dialog">
                                            <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Add Suppression</h5>
<!--                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>-->
                                                        </div>
                                                        <div class="modal-body p-b-0">
                                                            <form>
                                                               
                                                                <div class="form-group row">
                                                                    <div class="col-sm-6">
                                                                        <label class="col-lable"><b>Exclusion Type</b></label>

                                                                        <select class="js-example-basic-multiple col-sm-12" multiple="multiple" style="z-index: 999999999">
                                                                            <option value="AL">Manager</option>
                                                                            <option value="WY">Delivery Head</option>
                                                                            <option value="WY">CEO</option>
                                                                            <option value="WY">Marketing Head</option>
                                                                            <option value="WY">Supervisor</option>
                                                                        </select>
                                                                    </div>
                                                              
                                                                    <div class="col-sm-6">
                                                                        <label class="col-lable"><b>Campaign Name</b></label>
                                                                        <input type="text"  name="campaign_name" class="form-control" placeholder="Enter Campaign Name">
                                                                    </div>
                                                                    <div class="col-sm-12">
<!--                                                                        <label class="col-lable"><b>Campaign Name</b></label>
                                                                        <input type="text"  name="campaign_name" class="form-control" placeholder="Enter Campaign Name">-->
                                                                    </div><div class="col-sm-12">
<!--                                                                        <label class="col-lable"><b>Campaign Name</b></label>
                                                                        <input type="text"  name="campaign_name" class="form-control" placeholder="Enter Campaign Name">-->
                                                                    </div><div class="col-sm-12">
                                                                        <label class="col-lable"><b>Campaign Name</b></label>
                                                                        <input type="text"  name="campaign_name" class="form-control" placeholder="Enter Campaign Name">
                                                                    </div><div class="col-sm-12">
                                                                        <label class="col-lable"><b>Campaign Name</b></label>
                                                                        <input type="text"  name="campaign_name" class="form-control" placeholder="Enter Campaign Name">
                                                                    </div>
                                                                </div>
                                                               
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-primary">Add To Suppression List</button>
                                                            <button type="button" class="btn btn-default" data-dismiss="modal" id="cancelSuppbtn">Cancel</button>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
    
<script>
    $(function() {
        $("#addcampbtn").on('click', function() {
          
          
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
  