<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admintemplate/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admintemplate/assets/pages/data-table/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admintemplate/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admintemplate/bower_components/ekko-lightbox/dist/ekko-lightbox.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admintemplate/bower_components/lightbox2/dist/css/lightbox.css">
    <style>
    .multiselect-container{position:absolute;list-style-type:none;margin:0;padding:0}.multiselect-container .input-group{margin:5px}.multiselect-container>li{padding:0}.multiselect-container>li>a.multiselect-all label{font-weight:700}.multiselect-container>li>label.multiselect-group{margin:0;padding:3px 20px;height:100%;font-weight:700}.multiselect-container>li>a{padding:0}.multiselect-container>li>a>label{margin:0;height:100%;cursor:pointer;font-weight:400;padding:3px 20px 3px 40px}.multiselect-container>li>a>label.radio,.multiselect-container>li>a>label.checkbox{margin:0}.multiselect-container>li>a>label>input[type=checkbox]{margin-bottom:5px}.btn-group>.btn-group:nth-child(2)>.multiselect.btn{border-top-left-radius:4px;border-bottom-left-radius:4px}.form-inline .multiselect-container label.checkbox,.form-inline .multiselect-container label.radio{padding:3px 20px 3px 40px}.form-inline .multiselect-container li a label.checkbox input[type=checkbox],.form-inline .multiselect-container li a label.radio input[type=radio]{margin-left:-20px;margin-right:0}

    #myModal .modal-body 
    { 
        min-height: 400px;
    }
    .select2-container--default .select2-selection--multiple {
    padding:0px 0px 0px 0px;
    }
    .form-control .multiselect-search input[type="text"]{
    height:40px;
    
}
.dataTables_length{
        display:none;
    }
.dataTables_filter{
        display:none;
    }
#dom-jqry_paginate{
        display:none;
    }
#dom-jqry_info{
        display:none;
    }
</style>
<script type="text/javascript">

$(function() {
$('#dcd')
    .multiselect({
    allSelectedText: 'All',
    maxHeight: 200,
    enableCaseInsensitiveFiltering :true,

    includeSelectAllOption: true,
    
    })
    .multiselect('selectAll', true)
    .multiselect('updateButtonText');
});
$(function() {
$('#ctype')
    .multiselect({
    allSelectedText: 'All',
    maxHeight: 200,
    enableCaseInsensitiveFiltering :true,

    includeSelectAllOption: true,
    
    })
    .multiselect('selectAll', true)
    .multiselect('updateButtonText');
});
$(function() {
$('#levelid')
    .multiselect({
    allSelectedText: 'All',
    maxHeight: 200,
    enableCaseInsensitiveFiltering :true,

    includeSelectAllOption: true,
    
    })
    .multiselect('selectAll', true)
    .multiselect('updateButtonText');
});
$(function() {
$('#sector_id')
    .multiselect({
    allSelectedText: 'All',
    maxHeight: 200,
    enableCaseInsensitiveFiltering :true,

    includeSelectAllOption: true,
    
    })
    .multiselect('selectAll', true)
    .multiselect('updateButtonText');
});
//  Get Job Title
$('#levelid').change(function(){
    var levelid = $(this).val();
    if (levelid != '')
    {
        $('#desid').prop('disabled', false);
    }
    // alert(levelid);
    var url = '<?php echo base_url("campaigns/getJobTitle")?>';
    console.log(url+'?levelid='+levelid);
    // AJAX request
    $.ajax({
        url:'<?php echo base_url("campaigns/getJobTitle");?>',
        method: 'get',
        data: {levelid: levelid},
        dataType: 'json',
        success: function(response){

        //    Remove options 
       $('#desid').find('option').remove();

        //    Add options
       $.each(response,function(index,data){
          $('#desid').append('<option value="'+data['jid']+'">'+data['joblist']+'</option>');
        });
        $('#desid').multiselect("rebuild");
        }
    });
});
//  Get sub industry
$('#sector_id').change(function(){
    var sector_id = $(this).val();
    if (sector_id != '')
    {
        $('#industrycd').prop('disabled', false);
    }
    // alert(sector_id);
    // AJAX request
    $.ajax({
        url:'<?php echo base_url("campaigns/getIndustry");?>',
        method: 'get',
        data: {sector_id: sector_id},
        dataType: 'json',
        success: function(response){

        //    Remove options 
       $('#industrycd').find('option').remove();

        //    Add options
       $.each(response,function(index,data){
          $('#industrycd').append('<option value="'+data['subindustrycd']+'">'+data['subindustry']+'</option>');
        });
        $('#industrycd').multiselect("rebuild");
        }
    });
});
 $(document).ready(function(){
        $(".delete").click(function(e){ alert('as');
            $this  = $(this);
            e.preventDefault();
            var url = $(this).attr("href");
            $.get(url, function(r){
                if(r.success){
                    $this.closest("tr").remove();
                }
            })
        });
    });
$(document).ready(function(){
        $(".enable").click(function(e){
            $this  = $(this);
            e.preventDefault();
            var url = $(this).attr("href");
            $.get(url, function(r){
                if(r){
                    $this.closest("td").html("<button class='label label-inverse-warning desable'>Deactive</button>");
                }
            })
        });
    });
$(document).ready(function(){
        $(".desable").click(function(e){ 
            $this  = $(this);
            e.preventDefault();
            var url = $(this).attr("href");
            $.get(url, function(r){
                if(r){
                    $this.closest("td").html("<button class='label label-inverse-primary enable'>Active</button>");
                }
            })
        });
    });
    $(document).ready(function(){
    $(".emailsend_all").on('change', function () {
                // alert("test");
                $(this).closest('table').find('.checkbox_emailclass').prop('checked', this.checked ); 
                // $("#send_email").attr("disabled", false);
            });
        }); 
</script>



            <div class="page-header">
                <div class="page-header-title">
                    <h4>Lead Record</h4>
                </div>
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index-2.html">
                                <i class="icofont icofont-home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Leads</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Lead Record</a>
                        </li>
                    </ul>
                </div>
            </div>
           
            <!-- Page-header end -->
            <!-- Page-body start -->
            <div class="page-body">
                <!-- DOM/Jquery table start -->

                <div class="card">
                <div class="card-block">
                        <!-- <form action="<?php echo base_url();?>administrator/campaign_reuse" method="post" > -->
                       
                            
                       
                    </div>
                    <!-- <br> -->
                    <div class="card-block">
                    <?php if ($rec_stage == "Used") { ?>
                        <div class="table-responsive dt-responsive">
                        <!-- <form id="check" action="<?php echo base_url();?>administrator/export_csv" method="post" > -->
                        <form id="check" method="post" >
                       
                            <table id="dom-jqry" class="table table-striped table-bordered nowrap">
                                <thead>
                                    <tr>
                                        <!-- <th><input type="checkbox" class="emailsend_all  emailclass"  onclick="toggle(this);"/>&nbsp;&nbsp;Select</th> -->
                                        <!-- <th>Unused</th>
                                        <th>Used > 6 Month</th> -->
                                       
                                          
                                        <th>DC Pending </th>
                                        <th>DC Cleared</th>
                                        <th>DV Cleared</th>
                                        <th>EV Cleared</th>
                                        <!-- <th>Delivery Status</th> -->
                                        <th>CDC Cleared</th>
                                        <th>QA Cleared<br>Ready To Delivered</th>
                                        <!-- <th>Ready To Delivered</th> -->
                                        <th>Delivered</th>
                                       <?php } ?>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                // $result = $users->result();
                                // $i =0;
                                // foreach($result as $post) {
                                
                                // $i++;
                                // echo $j;
                                ?>
                                 <tr>
                
                                        <!-- <td><?php //echo $leadmaster_unused; -->
                                      //    $leadmaster_unused = $leadmaster_unused->result();
                                      //    $unused =0;
                                      //    $delivered_lmid = array();
                                      //    foreach($leadmaster_unused as $post) {
                                      //      $delivered_lmid[] = $post->lmid;
                                      //      //   echo $post->lmid;
                                      //        $unused++;
                                      //    }
                                      //  //   print_r($delivered_lmid);
                                      //    echo $unused;
                                      //    $delivered_lmid = implode(",", $delivered_lmid);
                                        ?>
                                         <button type="button" style="margin-left: 2px;height: 34px;" data-toggle="tooltip" title="Update"  class="col-sm-3 btn btn-primary btn-sm gotoupdateleadlsfinal" data-id="<?php echo $delivered_lmid;?>" data-campaign_id = "<?php echo $campaign_id;?>" id="gotoupdateleadlsfinal"
                                           data-row="<?php// echo  $delivered_lmid;?>"><i class="icofont icofont-edit"></i></button></td> -->
                                        <!-- <td><?php 
                                        // echo $leadmaster_used; 
                                      //   $leadmaster_used = $leadmaster_used->result();
                                      //   $used =0;
                                      //   $delivered_lmid = array();
                                      //   foreach($leadmaster_used as $post) {
                                      //     $delivered_lmid[] = $post->lmid;
                                      //     //   echo $post->lmid;
                                      //       $used++;
                                      //   }
                                      // //   print_r($delivered_lmid);
                                      //   echo $used;
                                      //   $delivered_lmid = implode(",", $delivered_lmid);
                                       ?>
                                       <button type="button" style="margin-left: 2px;height: 34px;" data-toggle="tooltip" title="Update"  class="col-sm-3 btn btn-primary btn-sm gotoupdateleadlsfinal" data-id="<?php echo $delivered_lmid;?>" data-campaign_id = "<?php echo $campaign_id;?>" id="gotoupdateleadlsfinal"
                                          data-row="<?php //echo  $delivered_lmid;?>"><i class="icofont icofont-edit"></i></button></td> -->
                                          <?php if ($rec_stage == "Used") { ?>
                                        <td> 
                                        <div class="form-group row">
                                                <div class="col-sm-3">
                                        <?php //echo $leadmaster_dcPending; 

                                        $leadmaster_dcPending = $leadmaster_dcPending->result();
                                        $dcpending = 0;
                                        $delivered_lmid = array();
                                        foreach($leadmaster_dcPending as $post) {
                                          $delivered_lmid[] = $post->lmid;
                                          //   echo $post->lmid;
                                            $dcpending++;
                                        }
                                      //   print_r($delivered_lmid);
                                        echo $dcpending;
                                        $delivered_lmid = implode(",", $delivered_lmid);
                                       ?><br><br>
                                       </div> 
                                       <div class="col-sm-8">
                                       <input type="hidden" placeholder="clearedcnt" style="height: 24px;" class="form-control form-control-sm"  name="clearedcnt" value="<?php echo $dcpending; ?>" id="clearedcnt">
                                       <input type="text"  style="height: 24px;" placeholder="No.Of leads" class="form-control form-control-sm count_of_leads"  name="count_of_leads" value="" id="count_of_leads">
                                       </div>
                                       </div>
                                      
                                       <button type="button" data-toggle="tooltip" title="Update"  class="col-sm-3 btn btn-primary btn-sm gotoupdateleadlsfinal" data-id="<?php echo $delivered_lmid;?>" data-campaign_id = "<?php echo $campaign_id;?>" id="gotoupdateleadlsfinal"
                                          data-row="<?php echo $delivered_lmid;?>"><i class="icofont icofont-edit"></i></button>
                                     
                                      
                                      </td>
                                        <td>
                                        
                                        <div class="form-group row">
                                                <div class="col-sm-3">
                                                <?php //echo $leadmaster_dcCleared; 
                                                $leadmaster_dcCleared = $leadmaster_dcCleared->result();
                                                $dcCleared =0;
                                                $delivered_lmid = array();
                                                foreach($leadmaster_dcCleared as $post) {
                                                $delivered_lmid[] = $post->lmid;
                                                //   echo $post->lmid;
                                                    $dcCleared++;
                                                }
                                            //   print_r($delivered_lmid);
                                                echo $dcCleared;
                                                $delivered_lmid = implode(",", $delivered_lmid);
                                            ?><br><br>
                                        </div>
                                            <div class="col-sm-8">
                                            <input type="hidden" placeholder="clearedcnt" style="height: 24px;" class="form-control form-control-sm"  name="clearedcnt" value="<?php echo $dcCleared; ?>" id="clearedcnt">
                                                 <input type="text"  style="height: 24px;" class="form-control form-control-sm count_of_leads" placeholder="No.Of leads" name="count_of_leads" value="" id="count_of_leads">
                                            </div>
                                            </div>
                                           
                                                <button type="button"data-toggle="tooltip" title="Update"  class="col-sm-3 btn btn-primary btn-sm gotoupdateleadlsfinal" data-id="<?php echo $delivered_lmid;?>" data-campaign_id = "<?php echo $campaign_id;?>" id="gotoupdateleadlsfinal"
                                                 data-row="<?php echo $delivered_lmid;?>"><i class="icofont icofont-edit"></i></button>
                                            
                                         </td>
                                        <td>
                                        <div class="form-group row">
                                                <div class="col-sm-3">
                                                <?php //echo $leadmaster_dvCleared; 
                                        $leadmaster_dvCleared = $leadmaster_dvCleared->result();
                                        $dvCleared =0;
                                        $delivered_lmid = array();
                                        foreach($leadmaster_dvCleared as $post) {
                                          $delivered_lmid[] = $post->lmid;
                                          //   echo $post->lmid;
                                            $dvCleared++;
                                        }
                                      //   print_r($delivered_lmid);
                                        echo $dvCleared;
                                        $delivered_lmid = implode(",", $delivered_lmid);
                                       ?> <br><br>
                                       </div>
                                       <div class="col-sm-8">
                                       <input type="hidden" placeholder="clearedcnt" style="height: 24px;" class="form-control form-control-sm"  name="clearedcnt" value="<?php echo $dvCleared; ?>" id="clearedcnt">
                                       <input type="text" placeholder="No.Of leads" style="height: 24px;" class="form-control form-control-sm count_of_leads"  name="count_of_leads" value="" id="count_of_leads">
                                       </div>
                                       </div>
                                         
                                       <button type="button" data-toggle="tooltip" title="Update"  class="col-sm-3 btn btn-primary btn-sm gotoupdateleadlsfinal" data-id="<?php echo $delivered_lmid;?>" data-campaign_id = "<?php echo $campaign_id;?>" id="gotoupdateleadlsfinal"
                                          data-row="<?php echo $delivered_lmid;?>"><i class="icofont icofont-edit"></i></button>
                                        
                                          </td>  
                                          <td>
                                          <div class="form-group row">
                                                <div class="col-sm-2"><?php  //echo $leadmaster_evCleared;  
                                        $leadmaster_evCleared = $leadmaster_evCleared->result();
                                        $evCleared =0;
                                        $delivered_lmid = array();
                                        foreach($leadmaster_evCleared as $post) {
                                          $delivered_lmid[] = $post->lmid;
                                          //   echo $post->lmid;
                                            $evCleared++;
                                        }
                                      //   print_r($delivered_lmid);
                                        echo $evCleared;
                                        $delivered_lmid = implode(",", $delivered_lmid);
                                       ?>
                                          <br><br>
                                       </div>
                                       <div class="col-sm-8">
                                       <input type="hidden" placeholder="clearedcnt" style="height: 24px;" class="form-control form-control-sm"  name="clearedcnt" value="<?php echo $evCleared; ?>" id="clearedcnt">
                                       <input type="text" placeholder="No.Of leads" style="height: 24px;" class="form-control form-control-sm count_of_leads"  name="count_of_leads" value="" id="count_of_leads">
                                       </div>
                                       </div>
                                      
                                       <button type="button" data-toggle="tooltip" title="Update"  class="col-sm-3 btn btn-primary btn-sm gotoupdateleadlsfinal" data-id="<?php echo $delivered_lmid;?>" data-campaign_id = "<?php echo $campaign_id;?>" id="gotoupdateleadlsfinal"
                                          data-row="<?php echo $delivered_lmid;?>"><i class="icofont icofont-edit"></i></button>
                                          
                                          </td>
                                       
                                         <td>
                                         <div class="form-group row">
                                                <div class="col-sm-2">
                                         <?php //echo $leadmaster_cdcCleared; 
                                         $leadmaster_cdcCleared = $leadmaster_cdcCleared->result();
                                         $cdcCleared =0;
                                         $delivered_lmid = array();
                                         foreach($leadmaster_cdcCleared as $post) {
                                           $delivered_lmid[] = $post->lmid;
                                           //   echo $post->lmid;
                                             $cdcCleared++;
                                         }
                                       //   print_r($delivered_lmid);
                                         echo $cdcCleared;
                                         $delivered_lmid = implode(",", $delivered_lmid);
                                        ?> <br><br>
                                        </div>
                                        <div class="col-sm-8">
                                        <input type="hidden" placeholder="clearedcnt" style="height: 24px;" class="form-control form-control-sm"  name="clearedcnt" value="<?php echo $cdcCleared; ?>" id="clearedcnt">
                                        <input type="text" placeholder="No.Of leads" style="height: 24px;" class="form-control form-control-sm count_of_leads"  name="count_of_leads" value="" id="count_of_leads">
                                        </div>
                                        </div>
                                        <button type="button" data-toggle="tooltip" title="Update"  class="col-sm-3 btn btn-primary btn-sm gotoupdateleadlsfinal" data-id="<?php echo $delivered_lmid;?>" data-campaign_id = "<?php echo $campaign_id;?>" id="gotoupdateleadlsfinal"
                                           data-row="<?php echo $delivered_lmid;?>"><i class="icofont icofont-edit"></i></button></td>
                                        <td>
                                        <div class="form-group row">
                                                <div class="col-sm-2">
                                        <?php //echo $leadmaster_qaCleared;
                                         $leadmaster_qaCleared = $leadmaster_qaCleared->result();
                                          $qaCleared =0;
                                          $delivered_lmid = array();
                                          foreach($leadmaster_qaCleared as $post) {
                                            $delivered_lmid[] = $post->lmid;
                                            //   echo $post->lmid;
                                              $qaCleared++;
                                          }
                                        //   print_r($delivered_lmid);
                                          echo $qaCleared;
                                          $delivered_lmid = implode(",", $delivered_lmid);
                                         ?> <br><br>
                                         </div>
                                         <div class="col-sm-8">
                                         <input type="hidden" placeholder="clearedcnt" style="height: 24px;" class="form-control form-control-sm"  name="clearedcnt" value="<?php echo $qaCleared; ?>" id="clearedcnt">
                                         <input type="text" placeholder="No.Of leads" style="height: 24px;" class="form-control form-control-sm count_of_leads"  name="count_of_leads" value="" id="count_of_leads">
                                         </div>
                                         </div>
                                         <button type="button" data-toggle="tooltip" title="Update"  class="col-sm-3 btn btn-primary btn-sm gotoupdateleadlsfinal" data-id="<?php echo $delivered_lmid;?>" data-campaign_id = "<?php echo $campaign_id;?>" id="gotoupdateleadlsfinal"
                                            data-row="<?php echo $delivered_lmid;?>"><i class="icofont icofont-edit"></i></button></td>
                                         <!-- <td><?php //echo $leadmaster_qaCleared;?></td> -->
                                         <td>
                                         <div class="form-group row">
                                                <div class="col-sm-2">
                                         <?php 
                                          $leadmaster_delivered = $leadmaster_delivered->result();
                                          $delivered =0;
                                          $delivered_lmid = array();
                                          foreach($leadmaster_delivered as $post) {
                                            $delivered_lmid[] = $post->lmid;
                                            //   echo $post->lmid;
                                              $delivered++;
                                          }
                                        //   print_r($delivered_lmid);
                                          echo $delivered;
                                          $delivered_lmid = implode(",", $delivered_lmid);
                                        //   $check2 = join(',', $delivered_lmid);
                                        // echo $post->lmid;
                                         //echo $leadmaster_delivered;?>
                                         <br><br>
                                         </div>
                                         <div class="col-sm-8">
                                         <input type="hidden" placeholder="clearedcnt" style="height: 24px;" class="form-control form-control-sm"  name="clearedcnt" value="<?php echo $delivered; ?>" id="clearedcnt">
                                         <input type="text" placeholder="No.Of leads" style="height: 24px;" class="form-control form-control-sm count_of_leads"  name="count_of_leads" value="" id="count_of_leads">
                                         </div>
                                         </div>
                                         <button type="button" data-toggle="tooltip" title="Update"  class="col-sm-3 btn btn-primary btn-sm gotoupdateleadlsfinal" data-id="<?php echo $delivered_lmid;?>" data-campaign_id = "<?php echo $campaign_id;?>" id="gotoupdateleadlsfinal"
                                            data-row="<?php echo $delivered_lmid;?>"><i class="icofont icofont-edit"></i></button>
                                         <!-- <input id="delivered_lmid" type="hidden" value="<?php //echo $delivered_lmid;?>"> -->
                                         </td>
                                        
                                         
                                       
                                        
                                    </tr>
                                <?php //}//endforeach; ?>

                                <!-- <div class="paginate-link">
                                    <?php //echo $this->pagination->create_links(); ?>
                                </div>  -->

                                 </tbody>
                            </table>
                           
                            <!-- <input  class="btn btn-primary" id="Import" type="submit" value="Import to Campaign" name="submit"> -->
                                </form>
                        </div>
                        <?php } else{ ?>

                        <div class="form-group row">
                                 <div class="col-sm-12">
                                

                              <?php 
                               $leadmaster_freshleads = $leadmaster_freshleads->result();
                               $freshleads =0;
                               $delivered_lmid = array();
                               foreach($leadmaster_freshleads as $post) {
                                 $delivered_lmid[] = $post->lmid;
                                 //   echo $post->lmid;
                                   $freshleads++;
                               }
                             
                            //    echo $freshleads;
                            $delivered_lmid = implode(",", $delivered_lmid);


                               ?>
                               <label class="col-lable"><b>Fresh leads: <?php echo $freshleads; ?></b></label>
                               <input type="hidden"   name="freshleadscnt" value="<?php echo $freshleads; ?>" id="freshleadscnt">
                               <input type="hidden"   name="lmidss" value="<?php echo $delivered_lmid; ?>" id="lmidss">
                               <input type="hidden" class="form-control form-control-sm"  name="campaign_ids" value="<?php echo $campaign_id;?>" id="campaign_ids">
                               <input type="text" placeholder="NO. of leads" style="height: 24px;" class="form-control form-control-sm col-sm-3"  name="count_of_leads" value="<?php echo $freshleads; ?>" id="count_of_leads">
                               <br><br>  <!-- <select name="camp_stage_from" id="camp_stage_from"  class="form-control form-control-sm col-sm-3" >
                                        <option value="">Select campaign stage</option>
                                       
                                        <option value="1">DC</option>
                                        <option value="2">DV</option>
                                        <option value="3">EV</option>
                                        <option value="4">CDC</option>
                                
                                </select><br><br> -->
                            </div> 
                            <div class="col-sm-12">
                            <button type="button" name="initialisecampaign_with_stage" class="btn btn-primary" id="initialisecampaign_with_stage">Initialise to DC</button> 
                             </div>  
                        </div>  
                    <?php } ?>
                    </div>
                </div>
                <!-- DOM/Jquery table end -->
            </div>

  <script>

$(document).ready(function() {

$(".count_of_leads").bind("keypress", function (e) {

    var keyCode = e.which ? e.which : e.keyCode

         

    if (!(keyCode >= 48 && keyCode <= 57)) {

      $(".error").css("display", "inline");

      return false;

    }else{

      $(".error").css("display", "none");

    }

});

});
    $('#Export').prop("disabled", true);
    // $('input:checkbox').click(function() {
    // if ($(this).is(':checked')) {
    // $('#Export').prop("disabled", false);
    // } else {
    // if ($('.checks').filter(':checked').length < 1){
    // $('#Export').attr('disabled',true);}
    // }
    // });
    $(document).ready(function() {
    $(document).on("click", ".gotoupdateleadlsfinal", function () {
    var lmids = $(this).attr('data-id');
    
    var campaign_id = $(this).attr('data-campaign_id');

    var count_of_leads =   $(this).closest('td').find('#count_of_leads').val();
    var clearedcnt =   $(this).closest('td').find('#clearedcnt').val();
    // alert(campaign_id);ddfd
    // var row = $(this).attr('data-row');
    $this  = $(this);
    
    if(count_of_leads > clearedcnt || clearedcnt <= '0' || count_of_leads == '')
                  {
                    alert("No. of leads should be greater than 0 and less than cleared count");
                    return;
                  }
  
   
    
      

     
        var urlq = '<?php echo base_url("administrator/assign_leads_to_campaign");?>';
        // alert(urlq+"?lmids="+lmids+"&campaign_id="+campaign_id);
        console.log(urlq+"?lmids="+lmids+"&campaign_id="+campaign_id+"&count_of_leads="+count_of_leads);
      
        $.ajax({
               url :'<?php echo base_url("administrator/assign_leads_to_campaign");?>',
                type: 'GET', 
                // contentType: "application/json",
                dataType: 'json',              
                data: {
                   
                    lmids:lmids,
                    count_of_leads:count_of_leads,
                    campaign_id:campaign_id             
                   
				},
        async: true,
                cache: false,
                success: function(response){
                    // $("#leadupdateqa").hide();
                    var text = response.statusCode;
                    // alert("Lead Added Succefully to your Campaign!");
                    console.log("check");
                    if(response.statusCode == "Success") 
                    {         
                        //  alert("Call displosition updated successfully");
                        //  $("#gotoupdateleadlsfinal").html("<i class='icofont icofont-edit'></i> <i class='icofont icofont-check'></i>");
                        // $("#gotoupdateleadlsfinal").attr("disabled", true); 
                        // $("#gotoupdateleadlsfinal").html("Updated <i class='icofont icofont-check'></i>");
                        $this.closest("td").find("#gotoupdateleadlsfinal").html("<i class='icofont icofont-edit'></i> <i class='icofont icofont-check'></i>"); 
                        // top.location.href=base_url+"administrator/dashboard";//redirection
                        // top.location.href=base_url+"cdc/dataverfication?camp_id="+<?php //echo $campaign['cnid']; ?>;//redirection
                      
                    }else if(response.data=="Fail")
                    {
                        $("#leadupdateqa").html(response.message);
                        
					          }

                   

                },
                error: function (error) {
                  alert("Error");
                  }
              
            });


});

$(function() {
        $("#initialisecampaign_with_stage").on('click', function() 
        {

            var lmids =$('#lmidss').val();
    
            var campaign_ids = $('#campaign_ids').val();

            var count_of_leads =  $('#count_of_leads').val();
            var freshleadscnt =  $('#freshleadscnt').val();

    if(count_of_leads > freshleadscnt || count_of_leads <= '0' || count_of_leads == '')
                  {
                    alert("No. of leads should be greater than 0 and less than leads count");
                    return;
                  }

            $.ajax({
                            url :'<?php echo base_url("administrator/assign_leads_to_campaign_fresh");?>',
                            type: 'GET', 
                            // contentType: "application/json",
                            dataType: 'json',              
                            data: {
                            
                                lmids:lmids,
                                count_of_leads:count_of_leads,
                                campaign_id:campaign_ids  
                               },
                              async: true,
                                      cache: false,
                                      success: function(response){                 
                                      var text = response.statusCode;
                                      console.log("check");
                                      if(response.statusCode == "Success") 
                                      {         
                                          
                                          $("#initialisecampaign_with_stage").html("Initialized!");   
                                          $("#initialisecampaign_with_stage").attr("disabled", true); 
                                        
                                      }


                                  },
                                  error: function (error) {
                                    alert("Error");
                                    }
                                
                              }); //Ajax End


        });
        });



});
$(document).ready(function() {

$("#count_of_leads").bind("keypress", function (e) {

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