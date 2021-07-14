<!-- 
This is the interface page of lead when users accepts a lead from QA module and sends record for lead generation.
Here user can access multiple leads at a time and changes the status of leads.
Developed by Tejaswi
-->
    <style>
    body
    {
        counter-reset: Serial;  
    }
    .table1
    {
        border-collapse: separate !important;
        height: 10px; overflow-y: auto; overflow-x: hidden;
    }

    .table1 tr td:first-child:before
    {
        content: "" counter(Serial);
        counter-increment: Serial;      /* Increment the Serial counter */
    
    }
    
    .dataTables_filter {
    display: none;
    } 

    .table1 tbody tr {
min-height: 30px !important;/* or whatever height you need to make them all consistent */
}
    .table1 tbody tr td {
min-height: 30px !important;/* or whatever height you need to make them all consistent */
padding-bottom:0px;
}
   
 
    </style>
            <div class="page-header">
                <div class="page-header-title">
                    <h4>Quality Analysis</h4>
                </div>
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="#">
                                <i class="icofont icofont-home"></i>
                            </a>
                       
                        <li class="breadcrumb-item"><a href="#!">Quality Analysis</a>
                        </li>
                    </ul>
                </div>
            </div>
         
<script>
// $(document).ready(function() {

// //update record lock
// var rlc = 1; //lock 1
// var lmid1 = $('#leadid_1').val();
// var lmid2 = $('#leadid_2').val();
// var lmid3 = $('#leadid_3').val();
// var lmid4 = $('#leadid_4').val();
// var lmid5 = $('#leadid_5').val();
// var lmid6 = $('#leadid_6').val();
// var lmid7 = $('#leadid_7').val();
// var lmid8 = $('#leadid_8').val();
// var lmid9 = $('#leadid_9').val();
// var lmid10 = $('#leadid_10').val();

// var emp_id = $('#empcode').val();


// if(rlc == 1){
// var urlq = '<?php // echo base_url("administrator/updaterecordlock");?>';
// // alert(urlq);
// console.log(urlq+"?lmid1="+lmid1+"&lmid2="+lmid2+"&rlc="+rlc+"&emp_id="+emp_id);
// $.ajax({
//       url:'<?php //echo base_url("administrator/updaterecordlock");?>',
//       method: 'get',
//       data: {
//         lmid1: lmid1,
//         lmid2: lmid2,
//         lmid3: lmid3,
//         lmid4: lmid4,
//         lmid5: lmid5,
//         lmid6: lmid6,
//         lmid7: lmid7,
//         lmid8: lmid8,
//         lmid9: lmid9,
//         lmid10: lmid10,
//         rlc:rlc,
//         emp_id:emp_id
//       },
//       dataType: 'json',
//       success: function(response){

//         console.log("check");
//                     // var dataResult = JSON.parse(response);
//                     if(response.statusCode == "Success") 
//                     {         
//                       // alert("Success in success");
//                       console.log("Record is opened/locked now");     
                      
//                     }else if(response.data=="Fail")
//                     {
//                       alert("fail/check if record is already opened");  
                        
// 					          }
//       }
//   });
// }else{
//   alert("record already opened");
 
// }
// });


$(document).on("click", ".gotoupdatelead", function () {
    var ids = $(this).attr('data-id');
    var row = $(this).attr('data-row');
   
    window.location = base_url+"cdc/qualityform?camp_id=<?php echo $_SESSION['campaign_id']; ?>&lmid="+ids+"&empcode=<?php echo $_SESSION['empcode']; ?>";
   
});

// $(document).on("click", ".refreshbtn", function () {
    

// var emp_id = $('#empcode').val();
// // alert(emp_id);

// var urlq = '<?php echo base_url("administrator/updaterecordlockfrom_leadgeneration");?>';

// $.ajax({
//       url:'<?php echo base_url("administrator/updaterecordlockfrom_leadgeneration");?>',
//       method: 'get',
//       data: {
       
//       },
//       dataType: 'json',
//       success: function(response){

//         console.log("check");
                   
//                     if(response.statusCode == "Success") 
//                     {         
                    
//                       console.log("Record is opened/locked now");     
//                       window.location = base_url+"cdc/leadgenerationinterface?camp_id=<?php echo $_SESSION['campaign_id']; ?>";
                      
//                     }else if(response.data=="Fail")
//                     {
//                       alert("fail/please logout and log in again");  
// 					 }
//       }
//   });



    
   
// });
$(document).on("click", ".gotoupdateleadlstat", function () {
    var ids = $(this).attr('data-id');
   
    var lstat =   $(this).closest('tr').find('.lstatclass').val();
    var row = $(this).attr('data-row');
    $this  = $(this);
   
    if(lstat == ""){
    alert("Please Select status");
    exit;
    }
   
    
        var urlq = '<?php echo base_url("cdc/leadgenerationupdatelstat");?>';
      
        console.log(urlq+"?ids="+ids+"&row="+row+"&lstat="+lstat);
      
        $.ajax({
               url :'<?php echo base_url("cdc/leadgenerationupdatelstat");?>',
                type: 'GET', 
                // contentType: "application/json",
                dataType: 'json',              
                data: {
                   
                    ids:ids,
                    lstat:lstat             
                   
				},
        async: true,
                cache: false,
                success: function(response){
                   
                    var text = response.statusCode;
                    console.log("check");
                    if(response.statusCode == "Success") 
                    {   
                   
                        $this.closest("td").find("#gotoupdateleadlstat").html("<i class='icofont icofont-edit'></i><i class='icofont icofont-check'></i>");
                      
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
$(document).on("click", ".gotoupdateleadlsfinal", function () {
    var ids = $(this).attr('data-id');
   
    var lsfinal =   $(this).closest('tr').find('.lsfinalclass').val();
    var row = $(this).attr('data-row');
    $this  = $(this);
   
        var urlq = '<?php echo base_url("cdc/leadgenerationupdatelsfinal");?>';
       
        console.log(urlq+"?ids="+ids+"&row="+row+"&lsfinal="+lsfinal);
      
        $.ajax({
               url :'<?php echo base_url("cdc/leadgenerationupdatelsfinal");?>',
                type: 'GET', 
                // contentType: "application/json",
                dataType: 'json',              
                data: {
                   
                    ids:ids,
                    lsfinal:lsfinal             
                   
				},
        async: true,
                cache: false,
                success: function(response){
                    $("#leadupdateqa").hide();
                    var text = response.statusCode;
                    console.log("check");
                    if(response.statusCode == "Success") 
                    {   
                         $this.closest("td").find("#gotoupdateleadlsfinal").html("<i class='icofont icofont-edit'></i> <i class='icofont icofont-check'></i>");
                      
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

$(document).ready(function() {
    $('#dom-jqry').DataTable( {
        // "lengthMenu": [[5, 10], [5, 10]]
        "lengthChange": false
    } );
} );


</script>

  
                <div class="card">
                    <div class="card-block">
                    <input type="hidden" value="<?php echo $empcode;?>" id="empcode">
                        <!-- <form action="<?php echo base_url();?>cdc/leadgenerationinterface" method="post">
                            <table class="table" style="margin-bottom:10px;">
                            <tr>
                            <td>
                            <?php foreach ($campaigns as $campaign): ?>
                                <label class="col-lable"><b>Campaign Name: <?php //echo $campaign['campnm']; ?></b></label>
                                <input type="hidden" value="<?php //echo $campaign['cids']; ?>" id="campnm">
                            <?php endforeach; ?>
                            <input type="hidden" value="<?php //echo $Campid; ?>" id="campaign_id" name="campaign_id">
                            </td>
                            <td>
                                <select style="height:34px;" class="form-control form-control-sm "  name="leadrectype" id="leadrectype">
                                    <option value="assigned" <?php //if( isset($leadrectype) && $leadrectype == "assigned") { echo "selected" ; } ?>>Assigned</option>
                                    <option value="new" <?php //if( isset($leadrectype) && $leadrectype == "new") { echo "selected" ; } ?>>New</option>
                                    </select>
                             </td>
                            <td>
                                <select style="height:34px;" class="form-control form-control-sm "  name="leadlimit" id="leadlimit">
                                    <option value="5" <?php //if( isset($leadlimit) && $leadlimit == "5") { echo "selected" ; } ?>>5</option>
                                    <option value="10" <?php //if( isset($leadlimit) && $leadlimit == "10") { echo "selected" ; } ?>>10</option>
                                    </select>
                             </td>
                             <td>
                                <input  class="btn btn-primary" type="submit" name="submit" value="Fetch Record">
                            </td>
                            <td>
                               
                                <a class="btn btn-primary refreshbtn" style="color:white;">Refresh <i class="icofont icofont-refresh"></i></a>
                            </td>
                            </tr>
                          
                            </table>
                            </form> -->
                       
                    </div>
                    <br>
                
                    <div class="card-block">
                    <!-- Image loader -->
                        <div class="table-responsive dt-responsive">
                            <table id="dom-jqry" style="border-collapse: separate !important" class="table table-striped table-bordered nowrap table1">
                                <thead>
                                    <tr>
                                        <th>S.no</th>
                                    
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Phone</th>
                                        <th>Alt Ph</th>
                                        <th>Domain</th>
                                        <th>State & Country </th>
                                      
                                        <th>Job title</th>
                                        <th>Comapany Name</th>
                                        <th>LinkedIn URL</th>
                                        <th>Email</th>
                                        <!-- <th>Call Disposition  &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                        <th>Call Status &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th> -->
                                       
                                        <th>View Lead</th>
                                    </tr>
                                </thead>
                                <tbody >
                                
                                <?php //foreach($email_list as $post) : 
                                $i = 0;
                                   foreach ($leadmaster as $post): 
                                    //    Print_r($post);
                                        $i++;
                                    ?>
                                 <tr>
                                        <td></td>
                                       
                                        <td>
                                        <input type="hidden" name="row_id" id="row_id_<?php echo $post['lmid'];?>" value="<?php echo $post['lmid'];?>">
                                        <input type="hidden" name="leadid" id="leadid_<?php echo  $i;?>" value="<?php echo $post['lmid'];?>">
                                      
                                        <?php echo $post['fname']; ?></td>
                                        <td><?php echo $post['lname']; ?></td>
                                        <td><?php echo $post['phone']; ?></td>
                                        <td><?php echo $post['altphn']; ?></td>
                                        <td><?php 
                                        echo $post['domain'];  ?>
                                        </td>
                                        <?php foreach ($countriesdv as $countriesdv){
                                            // Print_r($countriesdv);
                                        }
                                       ?>
                                         <td><?php echo $post['state']." / ".$post['country']; ?></td>
                                       
                                        <td>
                                        <?php echo $post['jtitle']; ?>
                                        </td>
                                        <td>
                                        <?php echo $post['cname']; ?>
                                        </td>
                                        <td>
                                        <a href="<?php echo $post['plink']; ?>" target="_blank">Click here</a>
                                        </td>
                                        <td>
                                        <?php echo $post['email']; ?>
                                        </td>
                                        <!-- <td>
                                        <div class="form-group row ">
                                        <select style="margin-left: 6px;margin-bottom: 5px;height:34px;" class="form-control form-control-sm lsfinalclass col-sm-8 "  name="lsfinal" id="lsfinal_<?php //echo  $i;?>">
                                           
                                           <option value="0" <?php //if(isset($post['lsfinal']) && ($post['lsfinal'] =='0') ){ echo "Selected"; } ?> >Open</option>
                                           <option value="1" <?php //if(isset($post['lsfinal']) && ($post['lsfinal'] =='1') ){ echo "Selected"; } ?> >Closed</option>
                                          
                                           </select>
                                         
                                           <button type="button" style="margin-left: 2px;height: 34px;" data-toggle="tooltip" title="Update"  class="col-sm-3 btn btn-primary btn-sm gotoupdateleadlsfinal" data-id="<?php// echo $post['lmid'];?>" id="gotoupdateleadlsfinal"
                                            data-row="<?php //echo $i;?>"><i class="icofont icofont-edit"></i></button>
                                     
                                        </div>
                                        </td> -->
                                        <!-- <td>
                                            <div class="form-group row">
                                                <select style="margin-bottom: 5px;margin-left: 6px;height:34px;"  class="form-control form-control-sm lstatclass col-sm-8"  name="lstat" id="lstat_<?php // echo  $i;?>" required="">
                                                    <option value="">Change Status</option>
                                                    <option value="on-hold" <?php //if(isset($post['lstat']) && ($post['lstat'] =='on-hold') ){ echo "Selected"; } ?> >on-hold</option>
                                                    <option value="voicemail" <?php //if(isset($post['lstat']) && ($post['lstat'] =='voicemail') ){ echo "Selected"; } ?> >voicemail</option>
                                                    <option value="call-back" <?php //if(isset($post['lstat']) && ($post['lstat'] =='call-back') ){ echo "Selected" ;} ?> >call-back</option>
                                                    </select>
                                              
                                                <button type="button" style="margin-left: 2px;height: 34px;" class="btn btn-primary col-sm-3 btn-sm gotoupdateleadlstat" data-toggle="tooltip" title="Update" data-id="<?php //echo $post['lmid'];?>" id="gotoupdateleadlstat"
                                                 data-row="<?php // echo $i;?>"><i class="icofont icofont-edit"></i></button>
                                             </div>
                                      
                                          
                                        </td> -->
                                       
                                      
                                        <td>
                                            <button type="button" class="btn btn-primary btn-sm gotoupdatelead" data-id="<?php echo $post['lmid'];?>" data-row="<?php echo $i;?>">Go to Update</button>
                                          
                                        </td>
                                       
                                    </tr>
                                <?php endforeach; ?>


                                 </tbody>
                            </table>
                           
                        </div>
                    </div>
                </div>
    

