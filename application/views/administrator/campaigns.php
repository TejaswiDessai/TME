     <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admintemplate/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admintemplate/assets/pages/data-table/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admintemplate/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admintemplate/bower_components/ekko-lightbox/dist/ekko-lightbox.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admintemplate/bower_components/lightbox2/dist/css/lightbox.css">

<script type="text/javascript">
var base_url = "<?php echo base_url() ?>";
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
        $(".enable").click(function(e){ alert('as');
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
        $(".desable").click(function(e){ alert('as');
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

    $( document ).ready(function() {
    
    
         $('.status').click(function(){
            $("#camp_id").val($(this).data('camp_id'));
            $("#client_id").val($(this).data('client_id'));
           
                    $("#Modal-overflow").modal('show');
               
         });
          $('#cancelSuppbtn').click(function(){
                // $( "#uho" ).prop( "checked", false );
    //            alert($('#uho').prop('checked'));
    //                $('#mybtn').empty();
                //  $('#mybtn').append('<input type="checkbox"  class="js-small f-right suppclass form-control" name="suppchk" id="uho"/> ');
                   
          });
        
     
    });
</script>

<!-- check comment -->

            <div class="page-header">
                <div class="page-header-title">
                    <h4>List Users</h4>
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
                        <li class="breadcrumb-item"><a href="#!">List Campaigns</a>
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
                        <div class="table-responsive dt-responsive">
                            <table id="dom-jqry" class="table table-striped table-bordered nowrap">
                                <thead>
                                    <tr>
                                        <th>Campaign Id</th>
                                        <th>Client ID</th>
                                        <th>Campaign Name</th>
                                        <th>Start Date</th>
                                        <th>Estimated Close Date</th>
                                        <th>Modified Date</th>
                                        <!-- <th>Status</th> -->
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach($campaigns as $post) : ?>
                                 <tr>
                                        <td><?php echo $post['cids']; ?></td>
                                        <td><?php echo $post['clientcode']; ?></td>
                                        <td><?php echo $post['campnm']; ?></td>
                                        <td><?php echo date("M d,Y", strtotime($post['startdt'])); ?></td>
                                        <td><?php echo date("M d,Y", strtotime($post['estclosedt'])); ?></td>
                                        <td><?php if(isset($post['Modifieddt'])){ echo date("M d,Y", strtotime($post['Modifieddt']));} ?></td>
                                        <!-- <td > -->
                                        <!-- <button name="submit" id="mybtn" class="btn btn-primary">Status</button> -->
                                        <!-- <a class="label label-inverse-info" id="mybtn" href='#'>Status</a> -->
                                        <!-- </td> -->
                                        <td>
                                        <a  id="mybtn" data-camp_id="<?php echo $post['cnid']; ?>" data-client_id="<?php echo $post['clientids']; ?>" class="btn btn-primary status"><?php if($post['status'] == 2){ echo "Open";}elseif($post['status'] == 1){ echo "Closed";}else{ echo "On Hold";}?></a>
                                                <a class="label label-inverse-info" href='<?php echo base_url(); ?>campaigns/update_campaign/<?php echo $post['cnid']; ?>'>Edit</a>
                                                <a class="label label-inverse-danger delete" href='<?php echo base_url(); ?>administrator/delete/<?php echo $post['cnid']; ?>?table=<?php echo base64_encode('users'); ?>'>Delete</a>
                                            
                                        </td>
                                    </tr>
                                <?php endforeach; ?>

                                <!-- <div class="paginate-link">
                                    <?php //echo $this->pagination->create_links(); ?>
                                </div>  -->

                                 </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- DOM/Jquery table end -->
            </div>

    <!-- Modal -->
    <div class="modal fade modal-flex" id="Modal-overflow" tabindex="-1" role="dialog">
                                            <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Status</h5>
<!--                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>-->
                                                        </div>
                                                        <div class="modal-body p-b-0">
                                                            <form>
                                                               
                                                                <div class="form-group row">
                                                                    <div class="col-sm-6">
                                                                        <label class="col-lable"><b>Status</b></label>
                                                                        <input type="hidden" id="camp_id" >
                                                                        <input type="hidden" id="client_id" >
                                                                        <select  name="campaign_status" id="campaign_status" class="form-control">
                                                                            <option value="2">Open</option>
                                                                            <option value="1">Closed</option>
                                                                            <option value="3">Hold</option>
                                                                        </select>
                                                                    </div>
                                                              
                                                                    <div class="col-sm-6">
                                                                        <label class="col-lable"><b>Comment</b></label>
                                                                        <textarea id="comment" ></textarea>
                                                                    </div>
                                                                
                                                               
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" id="update_status" class="btn btn-primary">Update Status</button>
                                                            <button type="button" class="btn btn-default" data-dismiss="modal" id="cancelSuppbtn">Cancel</button>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
        <script>
        $(function() {
        $("#update_status").on('click', function() 
        {
            var campaign_id = $('#camp_id').val();
            var client_id = $('#client_id').val();
            var campaign_status = $('#campaign_status').val();
            var comment = $('#comment').val();
            // alert("camp id= "+campaign_id+"client id= "+client_id+"status="+campaign_status+"comment= "+comment);
            $.ajax({
                url :'<?php echo base_url("campaigns/updateCampaignStatus");?>',
                type: 'GET', 
                dataType: 'json',              
                data: {
					campaign_id: campaign_id,
                    client_id:client_id,
					campaign_status: campaign_status,
                    comment:comment
				},
                cache: false,
                success: function(response){
                    var text = response.statusCode;
                    console.log(text);
                   
                    if(response.statusCode == "Success") 
                    {                        
                        // $(".status").html(response.status);
                        $("#addcampbtn").prop('disabled', true);
                        $('#Modal-overflow').modal('hide');
                        top.location.href=base_url+"campaigns/campaign";//redirection
                    }else if(response.statusCode=="Fail")
                    {
                        $("#addcampbtn").html(response.message);
                        
					}

                   

                }
              
            });
        });
    });

    $(document).ready(function() {
    $('#dom-jqry').DataTable( {
        "order": [[ 0, "desc" ]]
    } );
} );

</script>