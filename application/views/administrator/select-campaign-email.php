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
              <form id="basic-form" method="POST" enctype="multipart/form-data" action="emailVerfication">
              <!-- <form id="basic-form" method="POST" enctype="multipart/form-data" action="#"> -->
                <div class="card-header">
                
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
                        <!-- <form id="basic-form" method="POST" enctype="multipart/form-data"> -->

                        <div class="form-group row">
                        <div class="col-sm-3">
                        
                    </div>
                           <div class="col-sm-3">
                               <select name="campaign_id" id="campaign_id"  class="form-control form-control-sm" >
                                     <option value="">Select Campaign</option>
                               <?php foreach ($campaigns as $campaign): ?>
                                   <option value="<?php echo $campaign['cnid']; ?>"><?php echo $campaign['campnm']; ?></option>
                               <?php endforeach; ?>
                               </select>
                               <br><input type="text" id="email" name="email" class="form-control" placeholder="Email"><br>
                               <input type="password" id="password" name="password" class="form-control" placeholder="Password">    <br>
                            <!-- </div> -->
                         <!-- <div class="col-sm-3"> -->
                              <button type="submit" name="retrievedata" class="btn btn-primary" style=""  id="retrievedata">Retrieve Campaign Data</button>
                            </div>
                            <!-- setting hidden value of campaign id and sending to addlead form -->
                         <input type="hidden" name="hiddencnid" id="hiddencnid" value="">
                        </div>
                    </div>
                      
                </div>
                <!-- </form>   -->
            </div>
        </div>
        <!-- Basic Form Inputs card end -->
      <!-- Modal -->
   <div class="modal fade" id="myModalemail" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <!-- <h4 class="modal-title">Modal Header</h4> -->
        </div>
        <div class="modal-body">
        <div class="mail-body-content">
                                        <!-- <form id="register-form" action="<?php echo base_url();?>administrator/emailVerfication" method="post"> -->
                                            <div class="form-group">
                                            <!-- <select class="js-example-basic-multiple col-sm-12 form-control-sm" multiple="multiple" name="from" id="from">
                                                <option value="0">All</option>
                                                <?php //foreach ($from_email as $email): ?>
                                                    <option value="<?php //echo $email['fmail']; ?>"><?php //echo $email['fmail']; ?></option>
                                                <?php //endforeach; ?>
                                                </select> -->
                                                <input type="text" id="email" class="form-control" placeholder="Email">
                                            </div>
                                            <div class="form-group">
                                            <input type="text" id="password" class="form-control" placeholder="Password">    
                                        </div>
                                        <!-- </form> -->
                                    </div>
        </div>
        <div class="modal-footer">
        <button type="submit" id="retrievedata1"  class="btn btn-primary" data-dismiss="modal">Send</button>
          <button type="button" class="btn btn-danger " data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
    
   
     <script>
     // Campaign Name no special character allowed validation code
  
$(document).ready(function() {
// $("#retrievedata").on('click', function() 
//     {
//         $('#myModalemail').modal('show');
//     });

    $("#retrievedata1").on('click', function() 
    {
      $("#register-form").submit();
        var campaign_id = $('#campaign_id').val();
        alert(campaign_id);
        $.ajax({
        type: 'POST',
        url: $('#retrievedata1').attr('action'),
        data: {campaign_id:campaign_id}, 
        success: function(response) { 
            top.location.href=base_url+"administrator/emailVerfication?campaign_id="+campaign_id;//redirection
         },
    });
    });
  $("#basic-form").validate({
    rules: {
        campaign_id : {
        required: true
      }
     
    }

  });



});



     </script>

    

  