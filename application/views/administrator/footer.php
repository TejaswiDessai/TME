                </div>
            </div>
            <!-- Page body end -->
        </div>
    </div>
    <!-- Main-body end -->
   
 <!-- Warning Section Ends -->
   
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="<?php echo base_url(); ?>admintemplate/bower_components/jquery-slimscroll/jquery.slimscroll.js"></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="<?php echo base_url(); ?>admintemplate/bower_components/modernizr/modernizr.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>admintemplate/bower_components/modernizr/feature-detects/css-scrollbars.js"></script>
    <!-- classie js -->
    <script type="text/javascript" src="<?php echo base_url(); ?>admintemplate/bower_components/classie/classie.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>admintemplate/bower_components/lightbox2/dist/js/lightbox.min.js"></script>
  
    <!-- Horizontal-Timeline js -->
    <script type="text/javascript" src="<?php echo base_url(); ?>admintemplate/assets/pages/dashboard/horizontal-timeline/js/main.js"></script>
    <!-- amchart js -->
    <script type="text/javascript" src="<?php echo base_url(); ?>admintemplate/assets/pages/dashboard/amchart/js/amcharts.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>admintemplate/assets/pages/dashboard/amchart/js/serial.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>admintemplate/assets/pages/dashboard/amchart/js/light.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>admintemplate/assets/pages/dashboard/amchart/js/custom-amchart.js"></script>
    <!-- i18next.min.js -->
    <script type="text/javascript" src="<?php echo base_url(); ?>admintemplate/bower_components/i18next/i18next.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>admintemplate/bower_components/i18next-xhr-backend/i18nextXHRBackend.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>admintemplate/bower_components/i18next-browser-languagedetector/i18nextBrowserLanguageDetector.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>admintemplate/bower_components/jquery-i18next/jquery-i18next.min.js"></script>
     <!-- jquery file upload js -->
    <script src="<?php echo base_url(); ?>admintemplate/bower_components/jquery.filer/js/jquery.filer.min.js"></script>
    <script src="<?php echo base_url(); ?>admintemplate/assets/pages/filer/custom-filer.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>admintemplate/assets/pages/filer/jquery.fileuploads.init.js" type="text/javascript"></script>
    
     <!-- Select 2 js -->
    <script type="text/javascript" src="<?php echo base_url(); ?>admintemplate/bower_components/select2/dist/js/select2.full.min.js"></script>
    <!-- Multiselect js -->
    <script type="text/javascript" src="<?php echo base_url(); ?>admintemplate/bower_components/bootstrap-multiselect/dist/js/bootstrap-multiselect.js">
    </script>
    <script type="text/javascript" src="<?php echo base_url(); ?>admintemplate/bower_components/multiselect/js/jquery.multi-select.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>admintemplate/assets/js/jquery.quicksearch.js"></script>
    
      <!-- Summernote js -->
    <script type="text/javascript" src="<?php echo base_url(); ?>admintemplate/bower_components/summernote/dist/summernote.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>admintemplate/bower_components/summernote/lang/summernote-ko-KR.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>admintemplate/assets/pages/summernote/custom-note.js"></script>

    <script type="text/javascript" src="<?php echo base_url(); ?>admintemplate/assets/pages/toolbar/custom-toolbar.js"></script>
      <script type="text/javascript"src="<?php echo base_url(); ?>admintemplate/assets/pages/toolbar/jquery.toolbar.min.js"></script>
    <!-- Custom js -->
    <script type="text/javascript" src="<?php echo base_url(); ?>admintemplate/assets/pages/dashboard/custom-dashboard.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>admintemplate/assets/js/script.js"></script>
      <script type="text/javascript" src="<?php echo base_url(); ?>admintemplate/assets/pages/advance-elements/select2-custom.js"></script>
   
      <script src="<?php echo base_url(); ?>admintemplate/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>admintemplate/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url(); ?>admintemplate/assets/pages/data-table/js/jszip.min.js"></script>
    <script src="<?php echo base_url(); ?>admintemplate/assets/pages/data-table/js/pdfmake.min.js"></script>
    <script src="<?php echo base_url(); ?>admintemplate/assets/pages/data-table/js/vfs_fonts.js"></script>
    <script src="<?php echo base_url(); ?>admintemplate/bower_components/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="<?php echo base_url(); ?>admintemplate/bower_components/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="<?php echo base_url(); ?>admintemplate/bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?php echo base_url(); ?>admintemplate/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?php echo base_url(); ?>admintemplate/bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
    <script src="<?php echo base_url(); ?>admintemplate/assets/pages/data-table/js/data-table-custom.js"></script>
    
    <!-- Switch component js -->
    <script type="text/javascript" src="<?php echo base_url(); ?>admintemplate/bower_components/switchery/dist/switchery.min.js"></script>
    <script>
    // Multiple swithces
    var elem = Array.prototype.slice.call(document.querySelectorAll('.js-small'));

    elem.forEach(function(html) {
        var switchery = new Switchery(html, {
            color: '#FF5722',
            jackColor: '#fff',
            size: 'small'
        });
    });
    </script>
     <script>
        CKEDITOR.replace( 'editor1' );
    </script>   
     <script>
    lightbox.option({
        'resizeDuration': 200,
        'wrapAround': true
    })
    </script> 

    <script>
    var base_url = "<?php echo base_url() ?>";
   
        var timeSinceLastMove = 0;

        $(document).mousemove(function() {

            timeSinceLastMove = 0;
        });

        $(document).keyup(function() {

            timeSinceLastMove = 0;
        });

        checkTime();

        function checkTime() {
console.log(timeSinceLastMove);
            timeSinceLastMove++;

            if (timeSinceLastMove > 10 * 60 ) {  //10 mints
            // if (timeSinceLastMove == 599 ) {  //10 mints
                alert("Session is Out");
                
                window.location = base_url+"administrator/logout";
            }

            setTimeout(checkTime, 1000); // check evry 1 second
        }
</script> 
    </body>
</html>