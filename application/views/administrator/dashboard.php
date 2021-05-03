            <div class="page-header">
                <div class="page-header-title">
                    <h4>Dashboard</h4>
                </div>
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index-2.html">
                                <i class="icofont icofont-home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Pages</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Dashboard</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="page-body">
            <?php 
            $type = $this->db->select('rolenm')->from('roles')->where(array('rid'=> $this->session->userdata('role')))->get()->row_array();
            $empid = $this->session->userdata('emp_id');
            $empcode = $this->session->userdata('empcode');
            $Role = $this->session->userdata('role');
            ?>
            <div class="row">
                <?php if( $type['rolenm'] == "Administrator" || $this->session->userdata('role') == 0|| $this->session->userdata('role') == 6 || $this->session->userdata('role') == 2){?>
                    <div class="col-md-12 col-xl-4">
                        <!-- table card start -->
                        <div class="card table-card">
                            <div class="">
                                <div class="row-table">
                                    <div class="col-sm-6 card-block-big br">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <i class="icofont icofont-eye-alt text-success"></i>
                                            </div>
                                            <div class="col-sm-8 text-center">
                                                <h5>
                                                <?php $query = $this->db->query('SELECT * FROM users where status = 0');
                                                    echo $query->num_rows();?>
                                                </h5>
                                                <span>All Employees</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 card-block-big">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <i class="icofont icofont-ui-user text-danger"></i>
                                            </div>
                                            <div class="col-sm-8 text-center">
                                                <h5>
                                                <?php $query = $this->db->query("SELECT * FROM users where cid_type='TMB'and status = 0");
                                                    echo $query->num_rows();?>
                                                </h5>
                                                <span>TMB</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="" style="height:122px;">
                                <div class="row-table">
                                    <div class="col-sm-6 card-block-big br">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <i class="icofont icofont-user text-info"></i>
                                            </div>
                                            <div class="col-sm-8 text-center">  
                                                <h5>
                                                <?php $query = $this->db->query("SELECT * FROM users where cid_type='ME' and status = 0");
                                                    echo $query->num_rows();?>
                                                </h5>
                                                <span>ME</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 card-block-big">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <i class="icofont icofont-user text-warning"></i>
                                            </div>
                                            <div class="col-sm-8 text-center">
                                                <h5>
                                                <?php $query = $this->db->query("SELECT * FROM users where cid_type ='HP' and status = 0");
                                                    echo $query->num_rows();?>
                                                </h5>
                                                <span>HP</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- table card end -->
                    </div>



                  
                    
                    <div class="col-md-12 col-xl-4">
                        <!-- table card start -->
                        <div class="card table-card">
                            <div class="">
                                <div class="row-table">
                                    <div class="col-sm-6 card-block-big br">
                                        <div class="row">
                                            <div class="col-sm-4">
                                            <i class="icofont icofont-trophy-alt text-primary"></i>
                                            </div>
                                            <div class="col-sm-8 text-center">
                                                <h5>
                                                <?php $query = $this->db->query("SELECT * FROM campaign ");
                                                    echo $query->num_rows();?>
                                                </h5>
                                                </h5>
                                                <span>Total Campaigns</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 card-block-big">
                                        <div class="row ">
                                            <div class="col-sm-4">
                                            <i class="icofont icofont-lens  text-primary"></i>
                                          
                                             
                                            </div>
                                            <div class="col-sm-8 text-center">
                                                <h5>
                                                    <?php 
//                                                     $querylive = $this->db->query("SELECT * FROM leadmaster join campaign on campaign.cids = leadmaster.cids
// where leadmaster.stdti >= now()::date + interval '-6 MONTH'
// OR leadmaster.stdtii >= now()::date + interval '-6 MONTH' ");
                                                    $querylive = $this->db->query("SELECT * FROM leadmaster join campaign on campaign.cids = leadmaster.cids
                                                    where campaign.startdt >= now()::date + interval '-6 MONTH' and campaign.status = 2
                                                    ");
                                                    echo $live = $querylive->num_rows();?></h5>
                                                <span>Leads in live campaigns</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="">
                                <div class="row-table">
                                    <div class="col-sm-6 card-block-big br">
                                        <div class="row ">
                                            <div class="col-sm-4 ">
                                            <!-- <i class="icofont icofont-archive text-primary"></i> -->
                                            <i class="icofont icofont-star text-primary"></i>
                                            </div>
                                            <div class="col-sm-8 text-center">
                                                <h5>
                                                <?php // $query = $this->db->query("SELECT campaign.campnm FROM campaign 
                                                       // where campaign.startdt < now()::date + interval '-6 MONTH'
                                                       // group by campaign.campnm ");
                                                       $query = $this->db->query("SELECT * from leadmaster");

                                                    echo $totalleads = $query->num_rows();?>
                                                </h5>
                                                </h5>
                                                <span>Total leads</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 card-block-big">
                                        <div class="row ">
                                            <div class="col-sm-4">
                                            <i class="icofont icofont-speed-meter  text-primary"></i>
                                            </div>
                                            <div class="col-sm-8 text-center">
                                                <h5><?php
                                               $pending = $totalleads- $live;
                                                    echo $pending;?>
                                                </h5>
                                                <span>Leads pending</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- table card end -->
                    </div>

                    
                    <div class="col-md-12 col-xl-4">
                        <!-- table card start -->
                        <div class="card table-card">
                            <div class="">
                                <div class="row-table">
                                    <div class="col-sm-6 card-block-big br">
                                        <div class="row">
                                            <div class="col-sm-4">
                                            <i class="icofont icofont-growth  text-primary"></i>
                                            </div>
                                            <div class="col-sm-8 text-center">
                                                <h5>
                                                <?php $queryds = $this->db->query("SELECT * FROM leadmaster 
                                                        where leadmaster.stdti is Not NULL
                                                        and evload is null and cdcload is null and qaload is null ");
                                                    echo $queryds->num_rows();?>
                                                </h5>
                                                </h5>
                                                <span>Data Stage</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 card-block-big">
                                        <div class="row ">
                                            <div class="col-sm-4">
                                                <i class="icofont icofont-network text-primary"></i>
                                            </div>
                                            <div class="col-sm-8 text-center">
                                                <h5> <?php $queryev = $this->db->query("SELECT * FROM leadmaster 
                                                        where dvload = 1 and evload is null and cdcload is null and qaload is null ");
                                                    echo $queryev->num_rows();?>
                                                
                                                </h5>
                                                <span>EV stage</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="" style="height:122px;">
                                <div class="row-table">
                                    <div class="col-sm-6 card-block-big br">
                                        <div class="row ">
                                            <div class="col-sm-4">
                                            <i class="icofont icofont-live-support text-primary"></i>
                                         
                                            </div>
                                            <div class="col-sm-8 text-center">
                                                <h5>
                                                <?php $querycdc = $this->db->query("SELECT * FROM leadmaster 
                                                        where evload = 1 and cdcload is null and qaload is null ");
                                                    echo $querycdc->num_rows();?>
                                                </h5>
                                                </h5>
                                                <span>CDC Stage</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 card-block-big">
                                        <div class="row ">
                                            <div class="col-sm-4">
                                            <i class="icofont icofont-tick-boxed text-primary"></i>
                                          
                                            </div>
                                            <div class="col-sm-8 text-center">
                                                <h5>  <?php $queryqa = $this->db->query("SELECT * FROM leadmaster 
                                                        where cdcload = 1 and qaload is null ");
                                                    echo $queryqa->num_rows();?></h5>
                                                <span>QA stage</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- table card end -->
                    </div>
                  
                   
                  
          
                  


                    <div class="col-md-12 col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h5>Top 10 countries</h5>
                            </div>
                            <div class="card-block">
                            <script type="text/javascript" src="<?php echo base_url(); ?>admintemplate/bower_components/gChart/loader.js"></script>
                            <!-- <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> -->
                            <div id="top_x_div_desi"></div>

                                <?php 
                                // $stmt = pg_query("SELECT language, nos  FROM chart_data");
                                $stmt_desi_bar = pg_query("SELECT countryname, COUNT(lmid)
                                FROM country
                                    JOIN leadmaster on leadmaster.country= country.countrycd
                                GROUP BY countrycd,countryname
                                ORDER BY COUNT DESC LIMIT 10;;");
                                $php_data_array_desi_bar = Array(); // create PHP array
                                ?>
                               
                                <?php 
                                    while ($row_desi_bar = pg_fetch_row($stmt_desi_bar)) {
                                    ?>
                              
                                <?php $php_data_array_desi_bar[] = $row_desi_bar; // Adding to array
                                }?>
                               
                                <?php json_encode($php_data_array_desi_bar); 

                               
                                echo "<script>
                                        var my_2d_desi_bar = ".json_encode($php_data_array_desi_bar)."
                                </script>";
                                ?>


                               
   <script>
 
                        google.charts.load('current', {'packages':['bar']});
                        google.charts.setOnLoadCallback(drawStuff1);

                        function drawStuff1() {
                           
                            var data1 = new google.visualization.DataTable();
                            data1.addColumn('string', 'Industries');
                            data1.addColumn('number', 'Nos');
                                        for(i = 0; i < my_2d_ind_bar.length; i++)
                                        data1.addRow([my_2d_ind_bar[i][0], parseInt(my_2d_ind_bar[i][1])]);

                            var options1 = {
                            title: 'Chess opening moves',
                            height: 300,
                            legend: { position: 'none' },
                            chart: { title: 'Leads distributed in top 10 industries',
                                    subtitle: '' },
                            bars: 'horizontal', // Required for Material Bar Charts.
                            axes: {
                                x: {
                                0: { side: 'top', label: 'No. of leads'} // Top x-axis.
                                }
                            },
                            bar: { 
                                groupWidth: "90%"
                             }
                            };

                            var chart1 = new google.charts.Bar(document.getElementById('top_x_div1'));
                            chart1.draw(data1, options1);
                        };

//End industry chart




                                google.charts.load('current', {'packages':['bar']});
                                    // Draw the pie chart when Charts is loaded.
                                    google.charts.setOnLoadCallback(drawStuffdesi);
                                    // Callback that draws the pie chart
                                    function drawStuffdesi() {
                                        // Create the data table .
                                        var data_desi_bar = new google.visualization.DataTable();
                                        data_desi_bar.addColumn('string', 'Countries');
                                        data_desi_bar.addColumn('number', 'No. of leads');
                                        for(i = 0; i < my_2d_desi_bar.length; i++)
                                        data_desi_bar.addRow([my_2d_desi_bar[i][0], parseInt(my_2d_desi_bar[i][1])]);
                                // above row adds the JavaScript two dimensional array data into required chart format
                                    var options_desi_bar = {
                                                        title: 'Leads distributed in top 10 countries',
                                                        height: 300,
                                                        legend: { position: 'none' },
                                                        chart: { 
                                                            title: 'Leads distributed in top 10 countries',
                                                            subtitle: '' },
                                                        bars: 'horizontal', // Required for Material Bar Charts.
                                                        axes: {
                                                            x: {
                                                            0: { side: 'top', label: 'No. of leads'} // Top x-axis.
                                                            }
                                                        },
                                                        bar: {
                                                             groupWidth: "90%"
                                                             }
                                                };

                                        // Instantiate and draw the chart
                                        var chart_desi_bar = new google.charts.Bar(document.getElementById('top_x_div_desi'));
                                        chart_desi_bar.draw(data_desi_bar, options_desi_bar);
                                    }// End countries


                                google.charts.load('current', {'packages':['bar']});
                                    // Draw the pie chart when Charts is loaded.
                                    google.charts.setOnLoadCallback(drawStuffdesi1);
                                    // Callback that draws the pie chart
                                    function drawStuffdesi1() {
                                        // Create the data table .
                                        var data_desi1_bar = new google.visualization.DataTable();
                                        data_desi1_bar.addColumn('string', 'Designations');
                                        data_desi1_bar.addColumn('number', 'Nos');
                                        for(i = 0; i < my_2d_desi1_bar.length; i++)
                                        data_desi1_bar.addRow([my_2d_desi1_bar[i][0], parseInt(my_2d_desi1_bar[i][1])]);
                                // above row adds the JavaScript two dimensional array data into required chart format
                                    var options_desi1_bar = {
                                                        title: 'Leads distributed in top 10 designations',
                                                        height: 300,
                                                        legend: { position: 'none' },
                                                        chart: { 
                                                            title: 'Leads distributed in top 10 designations',
                                                            subtitle: '' },
                                                        bars: 'horizontal', // Required for Material Bar Charts.
                                                        axes: {
                                                            x: {
                                                            0: { side: 'top', label: 'No. of leads'} // Top x-axis.
                                                            }
                                                        },
                                                        bar: {
                                                             groupWidth: "90%"
                                                             }
                                                };

                                        // Instantiate and draw the chart
                                        var chart_desi1_bar = new google.charts.Bar(document.getElementById('top_x_desi1'));
                                        chart_desi1_bar.draw(data_desi1_bar, options_desi1_bar);
                                    }

                                  // Designation
                                    // Pie chart for jlevel
                                  google.charts.load('current', {'packages':['corechart']});
                                    // Draw the pie chart when Charts is loaded.
                                    google.charts.setOnLoadCallback(draw_my_chart);
                                    // Callback that draws the pie chart
                                    function draw_my_chart() {
                                        // Create the data table .
                                        var data = new google.visualization.DataTable();
                                        data.addColumn('string', 'Country');
                                        data.addColumn('number', 'Nos');
                                        for(i = 0; i < my_2d.length; i++)
                                    data.addRow([my_2d[i][0], parseInt(my_2d[i][1])]);
                                // above row adds the JavaScript two dimensional array data into required chart format
                                    var options = {
                                                    title:'Overall leads distributed at joblevel',
                                                    width:600,
                                                    height:300,
                                                    titleTextStyle: {color: '#757575',fontSize: 15,bold: false} ,
                                                    position: "none"  ,
                                                    // is3D: true,                                                   
                                                    legend: {
                                                    position: 'labeled',
                                                    textStyle: {
                                                        // fontName: 'monospace',
                                                        fontSize: 9
                                                    }
                                                    },
                                                    pieSliceTextStyle: {
                                                    fontSize: 8
                                                    },
                                                     sliceVisibilityThreshold: 0,
                                                    chartArea: {width: '80%', height: '75%'},
                                                };

                                        // Instantiate and draw the chart
                                        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
                                        chart.draw(data, options);

                                        
                                    }
                                </script>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h5>Top 10 Industries</h5>
                            </div>
                            <div class="card-block">
                            <!-- <div id="top_x_div"></div> -->
                            <div id="top_x_div1"></div>
                                <?php 
                                // $stmt = pg_query("SELECT language, nos  FROM chart_data");
                                $stmt_ind_bar = pg_query("SELECT industry, COUNT(lmid)
                                FROM industry
                                    JOIN leadmaster on leadmaster.indtry= industry.industrycd
                                GROUP BY industry
                                ORDER BY COUNT DESC LIMIT 10;");
                                $php_data_array_ind_bar = Array(); // create PHP array
                                ?>
                               
                                <?php 
                                    while ($row_ind_bar = pg_fetch_row($stmt_ind_bar)) {
                                    ?>
                              
                                <?php $php_data_array_ind_bar[] = $row_ind_bar; // Adding to array
                                }?>
                               
                                <?php // json_encode($php_data_array_ind_bar); 

                               
                                echo "<script>
                                        var my_2d_ind_bar = ".json_encode($php_data_array_ind_bar)."
                                </script>";
                                ?>


                                <!-- <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> -->
                               

                            </div>
                        </div>
                    </div>


                    <div class="col-md-12 col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h5>Top 10 Designations</h5>
                            </div>
                            <div class="card-block">
                            <!-- <div id="top_x_div"></div> -->
                            <div id="top_x_desi1"></div>
                                <?php 
                                // $stmt = pg_query("SELECT language, nos  FROM chart_data");
                                $stmt_desi1_bar = pg_query("SELECT joblist, COUNT(lmid)
                                FROM joblevels
                                    JOIN leadmaster on leadmaster.jlevel= joblevels.jid
                                GROUP BY joblist
                                ORDER BY COUNT DESC LIMIT 10;");
                                $php_data_array_ind_bar = Array(); // create PHP array
                                ?>
                               
                                <?php 
                                    while ($row_desi1_bar = pg_fetch_row($stmt_desi1_bar)) {
                                    ?>
                              
                                <?php $php_data_array_desi1_bar[] = $row_desi1_bar; // Adding to array
                                }?>
                               
                                <?php // json_encode($php_data_array_desi1_bar); 

                               
                                echo "<script>
                                        var my_2d_desi1_bar = ".json_encode($php_data_array_desi1_bar)."
                                </script>";
                                ?>


                                <!-- <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> -->
                               

                            </div>
                        </div>
                    </div>
                 
    <div class="col-md-12 col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h5>Job Level on Pie Chart </h5>
                            </div>
                            <div class="card-block"  id="chart_div">
                                <!-- <div id="chart_div"></div> -->
                                <?php 
                                // $stmt = pg_query("SELECT language, nos  FROM chart_data");
                                $stmt = pg_query("SELECT joblevel, COUNT(lmid)
                                FROM joblevels
                                    JOIN leadmaster on leadmaster.jlevel= joblevels.jid
                                GROUP BY joblevel
                                ORDER BY COUNT DESC LIMIT 10;");
                                // echo "No of records : ".pg_num_rows($stmt)."<br>";		


                                $php_data_array = Array(); // create PHP array
                                ?>
                                <!-- <table>
                                <tr> <th>Country</th><th>Nos</th></tr> -->
                                
                                <?php 
                                    while ($row = pg_fetch_row($stmt)) {
                                    ?>
                                
                                <!-- <tr>
                                    
                                    <td> <?php //echo  $row[0];?></td>
                                    <td> <?php //echo  $row[1];?></td>
                                
                                    </tr> -->
                                <?php $php_data_array[] = $row; // Adding to array
                                }?>
                                <!-- </table> -->
                                <!-- 
                                //print_r( $php_data_array);
                                // You can display the json_encode output here.  -->
                                <?php  json_encode($php_data_array); 

                                // Transfor PHP array to JavaScript two dimensional array 
                                echo "<script>
                                        var my_2d = ".json_encode($php_data_array)."
                                </script>";
                                ?>


                                

                               
                                <script>
                            
                                </script>

                            </div>
                        </div> 
                    </div>



                    
                    <!-- <div class="col-md-12 col-lg-4">
                        <div class="card">
                            <div class="card-header">
                                <h5>Total Leads</h5>
                               
                            </div>
                            <div class="card-block">
                            <canvas id="bar_canvas_countries"></canvas>
                            </div>
                        </div>
                    </div>   -->
                    <!-- <div class="col-md-12 col-lg-4">
                        <div class="card">
                            <div class="card-header">
                                <h5>Leads Regions</h5>
                            </div>
                            <div class="card-block">
                                <canvas id="myChart" width="400" height="400"></canvas>
                            </div>
                        </div>
                    </div> -->
                    <!-- <div class="col-md-12 col-lg-4">
                        <div class="card">
                            <div class="card-header">
                                <h5>Leads Industries</h5>
                            </div>
                            <div class="card-block">
                                <canvas id="myChart1" width="400" height="400"></canvas>
                            </div>
                        </div>
                    </div> -->
                    <!-- <div class="col-md-12 col-lg-4">
                        <div class="card">
                            <div class="card-header">
                                <h5>Bar chart</h5>
                             
                            </div>
                            <div class="card-block">
                                <canvas id="barChart" width="400" height="400"></canvas>
                            </div>
                        </div>
                    </div> -->
                    <!-- <div class="col-md-12 col-lg-4">
                        <div class="card">
                            <div class="card-header">
                                <h5>Total Leads</h5>
                               
                            </div>
                            <div class="card-block">
                            <canvas id="bar_canvas"></canvas>
                            </div>
                        </div>
                    </div>   -->
                   
                    




                    
                    <?php } ?>
                    <?php if( $type['rolenm'] == "Team Member" || $this->session->userdata('role') == 4 || $this->session->userdata('role') == 5 || $this->session->userdata('role') == 6){?>
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card table-1-card">
                                    <div class="card-block">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr><td><b>First Iteration</b></td></tr>
                                                    <tr class="text-capitalize">
                                                        <th style="background-color: rgba(255, 0, 0, 0.3);">Lead Added / Updated</th>
                                                        <!-- <th>User Name</th> -->
                                                       
                                                        <th style="background-color: rgba(255, 0, 0, 0.3);">Lead Saved</th>
                                                        <th style="background-color: hsl(120, 60%, 70%);">Lead Verified-Accepted</th>
                                                        <th style="background-color: hsl(120, 60%, 70%);">Lead Verified-Rejected</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td style="background-color: rgba(255, 0, 0, 0.3);"><?php  $startdate =  date('Y-m-d 00:00:00');  $enddate =  date('Y-m-d H:i:s'); //'stdti >=', date('Y-m-d 00:00:00') 'stdti <=', date('Y-m-d H:i:s')
                                                        $today = $this->db->query("SELECT * FROM leadmaster where (stagtidi = $empid OR stagtidi = $empcode ) AND  stdti <= current_date + current_time AND stdti >= current_date + 00-00-00 ");
                                                        $yesterday = $this->db->query("SELECT * FROM leadmaster where (stagtidi = $empid OR stagtidi = $empcode ) AND stdti >= current_date - 1 AND stdti <= current_date");
                                                        // echo  "YESTERDAY :  ".$yesterday->num_rows()."<br><br>";
                                                        echo "TODAY : ". $today->num_rows();
                                                        $subone= $today;
                                                        ?>
                                                        </td>
                                                        <!-- <td><?php //echo $this->session -> userdata('username')?></td><td> -->
                                                        <td style="background-color: rgba(255, 0, 0, 0.3);">
                                                        <?php 
                                                         $today = $this->db->query(" SELECT * FROM public.leadmaster
                                                         where 
                                                         svagtidi is not null
                                                        --  and
                                                        --  cids = 1009
                                                         and (svagtidi = $empcode )
                                                          AND  svdti <= current_date + current_time AND svdti >= current_date + 00-00-00 group by svagtidi,lmid ");
                                                        //  echo $this->db->last_query(); 
                                                        $yesterday = $this->db->query(" SELECT * FROM public.leadmaster
                                                         where 
                                                         svagtidi is not null
                                                        --  and
                                                        --  cids = 1009
                                                         and (svagtidi = $empcode ) AND svdti >= current_date - 1 AND svdti <= current_date");
                                                        
                                                        //  echo  "YESTERDAY :  ".$yesterday->num_rows()."<br><br>";
                                                         echo "TODAY : ". $today->num_rows();
                                                         $saveone= $today;
                                                        // $query = $this->db->query("SELECT * FROM leadmaster where (stagtidi = $empid OR stagtidi = $empcode ) AND  svdti >= now()::date + interval '1h'");
                                                        // echo $query->num_rows();
                                                        ?>
                                                        </td>
                                                        <td style="background-color: hsl(120, 60%, 70%);"><?php  $startdate =  date('Y-m-d 00:00:00');  $enddate =  date('Y-m-d H:i:s'); //'stdti >=', date('Y-m-d 00:00:00') 'stdti <=', date('Y-m-d H:i:s')
                                                        $today = $this->db->query("SELECT * FROM leadmaster where (dvagtidi = $empcode ) AND  dvdti <= current_date + current_time AND dvdti >= current_date + 00-00-00 ");
                                                        $yesterday = $this->db->query("SELECT * FROM leadmaster where (dvagtidi = $empcode ) AND dvdti >= current_date - 1 AND dvdti <= current_date");
                                                        // echo  "YESTERDAY :  ".$yesterday->num_rows()."<br><br>";
                                                        echo "TODAY : ". $today->num_rows();
                                                        // $today1staccepted = $today->num_rows();
                                                        $accone =  $today;
                                                        ?>
                                                        </td>
                                                        </td>
                                                        <td style="background-color: hsl(120, 60%, 70%);"><?php  $startdate =  date('Y-m-d 00:00:00');  $enddate =  date('Y-m-d H:i:s'); //'stdti >=', date('Y-m-d 00:00:00') 'stdti <=', date('Y-m-d H:i:s')
                                                        $today = $this->db->query("SELECT * FROM leadmaster where (dvragtidi = $empcode ) AND  dvrdti <= current_date + current_time AND dvrdti >= current_date + 00-00-00 ");
                                                        $yesterday = $this->db->query("SELECT * FROM leadmaster where (dvragtidi = $empcode ) AND dvrdti >= current_date - 1 AND dvrdti <= current_date");
                                                        // echo  "YESTERDAY :  ".$yesterday->num_rows()."<br><br>";
                                                        echo "TODAY : ". $today->num_rows();
                                                        $rejone =  $today;
                                                        ?>
                                                        </td>
                                                    </tr>
                                                   
                                                    <tr>
                                                        <td><b>2nd Iteration</b></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="background-color: rgba(255, 0, 0, 0.3);"><?php 
                                                         $startdate =  date('Y-m-d 00:00:00');  $enddate =  date('Y-m-d H:i:s'); //'stdti >=', date('Y-m-d 00:00:00') 'stdti <=', date('Y-m-d H:i:s')
                                                        $today = $this->db->query("SELECT * FROM leadmaster where (stagtidii = $empid OR stagtidii = $empcode ) AND  stdtii <= current_date + current_time AND stdtii >= current_date + 00-00-00 ");
                                                       
                                                        $yesterday = $this->db->query("SELECT * FROM leadmaster where (stagtidii = $empid OR stagtidii = $empcode ) AND stdtii >= current_date - 1 AND stdtii <= current_date");
                                                    //    echo  "YESTERDAY :  ".$yesterday->num_rows()."<br><br>";
                                                        echo "TODAY : ". $today->num_rows();
                                                        $subtwo= $today;
                                                        ?>
                                                        </td>
                                                        <!-- <td><?php //echo $this->session -> userdata('username')?></td><td> -->
                                                        <td style="background-color: rgba(255, 0, 0, 0.3);">
                                                        <?php 
                                                        //  $today = $this->db->query("SELECT * FROM leadmaster where (stagtidii = $empid OR stagtidii = $empcode ) AND  ((svdti <= current_date + current_time AND svdti >= current_date + 00-00-00) OR (svdti <= current_date + current_time AND svdti >= current_date + 00-00-00)) ");
                                                        //  $yesterday = $this->db->query("SELECT * FROM leadmaster where (stagtidii = $empid OR stagtidii = $empcode ) AND ((svdti >= current_date - 1 AND svdti <= current_date) OR (svdti >= current_date - 1 AND svdti <= current_date))");
                                                         $today = $this->db->query("SELECT * FROM leadmaster where  (svagtidi = $empcode) AND  ((svdti <= current_date + current_time AND svdti >= current_date + 00-00-00) OR (svdti <= current_date + current_time AND svdti >= current_date + 00-00-00)) ");
                                                        //  echo $this->db->last_query(); 
                                                         $yesterday = $this->db->query("SELECT * FROM leadmaster where (stagtidii = $empid OR stagtidii = $empcode ) AND ((svdti >= current_date - 1 AND svdti <= current_date) OR (svdti >= current_date - 1 AND svdti <= current_date))");
                                                        //  echo  "YESTERDAY :  ".$yesterday->num_rows()."<br><br>";
                                                        
                                                        // echo "TODAY : ". $today->num_rows();
                                                         $savetwo = $today;
                                                        // $query = $this->db->query("SELECT * FROM leadmaster where (stagtidi = $empid OR stagtidi = $empcode ) AND  svdti >= now()::date + interval '1h'");
                                                        // echo $query->num_rows();
                                                        ?>
                                                        </td>
                                                        <td style="background-color: hsl(120, 60%, 70%);"><?php  $startdate =  date('Y-m-d 00:00:00');  $enddate =  date('Y-m-d H:i:s'); //'stdti >=', date('Y-m-d 00:00:00') 'stdti <=', date('Y-m-d H:i:s')
                                                        $today = $this->db->query("SELECT * FROM leadmaster where (dvagtidii = $empcode ) AND  dvdtii <= current_date + current_time AND dvdtii >= current_date + 00-00-00 ");
                                                        $yesterday = $this->db->query("SELECT * FROM leadmaster where (dvagtidii = $empcode ) AND dvdtii >= current_date - 1 AND dvdtii <= current_date");
                                                        // echo  "YESTERDAY :  ".$yesterday->num_rows()."<br><br>";
                                                        echo "TODAY : ". $today->num_rows();
                                                        // echo  "Total Accepted Today (1st): ". $today1staccepted+$today->num_rows();
                                                        $acctwo =  $today;
                                                       ?>
                                                        </td>
                                                        
                                                        <td style="background-color: hsl(120, 60%, 70%);"><?php  $startdate =  date('Y-m-d 00:00:00');  $enddate =  date('Y-m-d H:i:s'); //'stdti >=', date('Y-m-d 00:00:00') 'stdti <=', date('Y-m-d H:i:s')
                                                        $today = $this->db->query("SELECT * FROM leadmaster where (dvragtidii = $empcode ) AND  dvrdtii <= current_date + current_time AND dvrdtii >= current_date + 00-00-00 ");
                                                        $yesterday = $this->db->query("SELECT * FROM leadmaster where (dvragtidii = $empcode ) AND dvrdtii >= current_date - 1 AND dvrdtii <= current_date");
                                                        // echo  "YESTERDAY :  ".$yesterday->num_rows()."<br><br>";
                                                        echo "TODAY : ". $today->num_rows();

                                                        $rejtwo =  $today;
                                                      
                                                        ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="background-color: rgba(255, 0, 0, 0.3);"><b> Total Submitted:</b>
                                                        <?php  $totalsub = $subtwo->num_rows()+ $subone->num_rows();
                                                        echo $totalsub; ?></td>
                                                         <td style="background-color: rgba(255, 0, 0, 0.3);"><b> Total Saved:</b>
                                                        <?php  $totalsaved = $saveone->num_rows();
                                                        echo $totalsaved; ?></td>
                                                        <td style="background-color: hsl(120, 60%, 70%);"><b> Total Accepted:</b>
                                                        <?php  $totalacc = $acctwo->num_rows()+ $accone->num_rows();
                                                        echo $totalacc; ?></td>
                                                        <td style="background-color: hsl(120, 60%, 70%);"><b> Total rejected:</b>
                                                        <?php  $totalrej= $rejtwo->num_rows()+ $rejone->num_rows();
                                                        echo $totalrej; ?></td>
                                                         
                                                        
                                                    </tr>
                                                    
                                                </tbody>
                                            </table>
                                            <style>
                                            #accept_report td {
                                                border-top: 1px solid #000;
                                                border-bottom: 1px solid #000;
                                                border-left: 1px solid #000;
                                                border-right: 1px solid #000;
                                            }
                                            #accept_report th {
                                                border-top: 1px solid #000;
                                                border-bottom: 1px solid #000;
                                                border-left: 1px solid #000;
                                                border-right: 1px solid #000;
                                            }
                                           
                                            </style>
                                            <h5 style="padding:10px;"><b>Accepted Lead Record [Last 15 Days]</b></h5>
                                            <table class="table" id="accept_report" style="padding-top:10px;">
                                            <tr>
                                            <!-- <th>Total Submited</th> -->

                                            <th><?php echo date('d/m',strtotime("-14 days"));?></th>
                                            <th><?php echo date('d/m',strtotime("-13 days"));?></th>
                                            <th><?php echo date('d/m',strtotime("-12 days"));?></th>
                                            <th><?php echo date('d/m',strtotime("-11 days"));?></th>
                                            <th><?php echo date('d/m',strtotime("-10 days"));?></th>
                                            <th><?php echo date('d/m',strtotime("-9 days"));?></th>
                                            <th><?php echo date('d/m',strtotime("-8 days"));?></th>
                                            <th><?php echo date('d/m',strtotime("-7 days"));?></th>
                                            <th><?php echo date('d/m',strtotime("-6 days"));?></th>
                                            <th><?php echo date('d/m',strtotime("-5 days"));?></th>
                                            <th><?php echo date('d/m',strtotime("-4 days"));?></th>
                                            <th><?php echo date('d/m',strtotime("-3 days"));?></th>
                                            <th><?php echo date('d/m',strtotime("-2 days"));?></th>
                                            <th><?php echo date('d/m',strtotime("-1 days"));?></th>
                                            <th><?php echo date('d/m',strtotime("-0 days"));?></th>
                                            </tr>
                                            <tr>
                                            <td>
                                            <?php 
                                            $day15_1 = $this->db->query("select * from leadmaster where ontag = 1
                                            and rlc = 0
                                            and pload = 0
                                            and (stagtidi = '".$empcode."')
                                            and dvagtidi is not null
                                            and dvagtidii is null
                                            
                                            and (dvsbtg = 0 OR dvsbtg = 1 OR dvsbtg = 2)
                                            and dvload = 1 and leadmaster.stdti > current_date - 14 and leadmaster.stdti < current_date - 13 ");
                                            $day15_1 = $day15_1->num_rows();
                                            $day15_2 = $this->db->query("select * from leadmaster where ontag = 1
                                            and rlc = 0
                                            and pload = 0
                                            and (stagtidii = '".$empcode."')
                                            and dvagtidi is not null
                                            and dvagtidii is not null
                                            
                                            and (dvsbtg = 0 OR dvsbtg = 1 OR dvsbtg = 2)
                                            and dvload = 1 and leadmaster.stdtii > current_date - 14 and leadmaster.stdtii < current_date - 13 ");
                                            $day15_2 = $day15_2->num_rows();
                                            echo $day15 = $day15_1 + $day15_2;
                                             ?>
                                            </td>
                                            <td>
                                            <?php 
                                            $day14_1 = $this->db->query("select * from leadmaster where ontag = 1
                                            and rlc = 0
                                            and pload = 0
                                            and (stagtidi = '".$empcode."')
                                            and dvagtidi is not null
                                            and dvagtidii is null
                                            
                                            and (dvsbtg = 0 OR dvsbtg = 1 OR dvsbtg = 2)
                                            and dvload = 1 and leadmaster.stdti > current_date - 13 and leadmaster.stdti < current_date - 12 ");
                                            $day14_1 = $day14_1->num_rows();
                                            $day14_2 = $this->db->query("select * from leadmaster where ontag = 1
                                            and rlc = 0
                                            and pload = 0
                                            and (stagtidii = '".$empcode."')
                                            and dvagtidi is not null
                                            and dvagtidii is not null
                                            
                                            and (dvsbtg = 0 OR dvsbtg = 1 OR dvsbtg = 2)
                                            and dvload = 1 and leadmaster.stdtii > current_date - 13 and leadmaster.stdtii < current_date - 12 ");
                                            $day14_2 = $day14_2->num_rows();
                                            echo $day14 = $day14_1 + $day14_2;
                                             ?>
                                            </td>
                                            <td>
                                            <?php 
                                            $day13_1 = $this->db->query("select * from leadmaster where ontag = 1
                                            and rlc = 0
                                            and pload = 0
                                            and (stagtidi = '".$empcode."')
                                            and dvagtidi is not null
                                            and dvagtidii is null
                                            
                                            and (dvsbtg = 0 OR dvsbtg = 1 OR dvsbtg = 2)
                                            and dvload = 1 and leadmaster.stdti > current_date - 12 and leadmaster.stdti < current_date - 11 ");
                                            $day13_1 = $day13_1->num_rows();
                                            $day13_2 = $this->db->query("select * from leadmaster where ontag = 1
                                            and rlc = 0
                                            and pload = 0
                                            and (stagtidii = '".$empcode."')
                                            and dvagtidi is not null
                                            and dvagtidii is not null
                                            
                                            and (dvsbtg = 0 OR dvsbtg = 1 OR dvsbtg = 2)
                                            and dvload = 1 and leadmaster.stdtii > current_date - 12 and leadmaster.stdtii < current_date - 11 ");
                                            $day13_2 = $day13_2->num_rows();
                                            echo $day13 = $day13_1 + $day13_2;
                                             ?>
                                            </td>
                                            <td>
                                            <?php 
                                            $day12_1 = $this->db->query("select * from leadmaster where ontag = 1
                                            and rlc = 0
                                            and pload = 0
                                            and (stagtidi = '".$empcode."')
                                            and dvagtidi is not null
                                            and dvagtidii is null
                                            
                                            and (dvsbtg = 0 OR dvsbtg = 1 OR dvsbtg = 2)
                                            and dvload = 1 and leadmaster.stdti > current_date - 11 and leadmaster.stdti < current_date - 10 ");
                                            $day12_1 = $day12_1->num_rows();
                                            $day12_2 = $this->db->query("select * from leadmaster where ontag = 1
                                            and rlc = 0
                                            and pload = 0
                                            and (stagtidii = '".$empcode."')
                                            and dvagtidi is not null
                                            and dvagtidii is not null
                                            
                                            and (dvsbtg = 0 OR dvsbtg = 1 OR dvsbtg = 2)
                                            and dvload = 1 and leadmaster.stdtii > current_date - 11 and leadmaster.stdtii < current_date - 10 ");
                                            $day12_2 = $day12_2->num_rows();
                                            echo $day12 = $day12_1 + $day12_2;
                                             ?>
                                            </td>
                                            <td>
                                            <?php 
                                            $day11_1 = $this->db->query("select * from leadmaster where ontag = 1
                                            and rlc = 0
                                            and pload = 0
                                            and (stagtidi = '".$empcode."')
                                            and dvagtidi is not null
                                            and dvagtidii is null
                                            
                                            and (dvsbtg = 0 OR dvsbtg = 1 OR dvsbtg = 2)
                                            and dvload = 1 and leadmaster.stdti > current_date - 10 and leadmaster.stdti < current_date - 9 ");
                                            $day11_1 = $day11_1->num_rows();
                                            $day11_2 = $this->db->query("select * from leadmaster where ontag = 1
                                            and rlc = 0
                                            and pload = 0
                                            and (stagtidii = '".$empcode."')
                                            and dvagtidi is not null
                                            and dvagtidii is not null
                                            
                                            and (dvsbtg = 0 OR dvsbtg = 1 OR dvsbtg = 2)
                                            and dvload = 1 and leadmaster.stdtii > current_date - 10 and leadmaster.stdtii < current_date - 9 ");
                                            $day11_2 = $day11_2->num_rows();
                                            echo $day11 = $day11_1 + $day11_2;
                                             ?>
                                            </td>
                                            <td>
                                            <?php 
                                            $day10_1 = $this->db->query("select * from leadmaster where ontag = 1
                                            and rlc = 0
                                            and pload = 0
                                            and (stagtidi = '".$empcode."')
                                            and dvagtidi is not null
                                            and dvagtidii is null
                                            
                                            and (dvsbtg = 0 OR dvsbtg = 1 OR dvsbtg = 2)
                                            and dvload = 1 and leadmaster.stdti > current_date - 9 and leadmaster.stdti < current_date - 8 ");
                                            $day10_1 = $day10_1->num_rows();
                                            $day10_2 = $this->db->query("select * from leadmaster where ontag = 1
                                            and rlc = 0
                                            and pload = 0
                                            and (stagtidii = '".$empcode."')
                                            and dvagtidi is not null
                                            and dvagtidii is not null
                                            
                                            and (dvsbtg = 0 OR dvsbtg = 1 OR dvsbtg = 2)
                                            and dvload = 1 and leadmaster.stdtii > current_date - 9 and leadmaster.stdtii < current_date - 8 ");
                                            $day10_2 = $day10_2->num_rows();
                                            echo $day10 = $day10_1 + $day10_2;
                                             ?>
                                            </td>
                                            <td>
                                            <?php 
                                            $day9_1 = $this->db->query("select * from leadmaster where ontag = 1
                                            and rlc = 0
                                            and pload = 0
                                            and (stagtidi = '".$empcode."')
                                            and dvagtidi is not null
                                            and dvagtidii is null
                                            
                                            and (dvsbtg = 0 OR dvsbtg = 1 OR dvsbtg = 2)
                                            and dvload = 1 and leadmaster.stdti > current_date - 8 and leadmaster.stdti < current_date - 7 ");
                                            $day9_1 = $day9_1->num_rows();
                                            $day9_2 = $this->db->query("select * from leadmaster where ontag = 1
                                            and rlc = 0
                                            and pload = 0
                                            and (stagtidii = '".$empcode."')
                                            and dvagtidi is not null
                                            and dvagtidii is not null
                                            
                                            and (dvsbtg = 0 OR dvsbtg = 1 OR dvsbtg = 2)
                                            and dvload = 1 and leadmaster.stdtii > current_date - 8 and leadmaster.stdtii < current_date - 7 ");
                                            $day9_2 = $day9_2->num_rows();
                                            echo $day9 = $day9_1 + $day9_2;
                                             ?>
                                            </td>
                                            <td>
                                            <?php 
                                            $monday_1 = $this->db->query("select * from leadmaster where ontag = 1
                                            and rlc = 0
                                            and pload = 0
                                            and (stagtidi = '".$empcode."')
                                            and dvagtidi is not null
                                            and dvagtidii is null
                                            
                                            and (dvsbtg = 0 OR dvsbtg = 1 OR dvsbtg = 2)
                                            and dvload = 1 and leadmaster.stdti > current_date - 7 and leadmaster.stdti < current_date - 6 ");
                                            $monday_1 = $monday_1->num_rows();
                                            $monday_2 = $this->db->query("select * from leadmaster where ontag = 1
                                            and rlc = 0
                                            and pload = 0
                                            and (stagtidii = '".$empcode."')
                                            and dvagtidi is not null
                                            and dvagtidii is not null
                                            
                                            and (dvsbtg = 0 OR dvsbtg = 1 OR dvsbtg = 2)
                                            and dvload = 1 and leadmaster.stdtii > current_date - 7 and leadmaster.stdtii < current_date - 6 ");
                                            $monday_2 = $monday_2->num_rows();
                                            echo $monday_total = $monday_1 + $monday_2;
                                             ?>
                                            </td>
                                            <td>
                                            <?php
                                            $tuesday_1 = $this->db->query("select * from leadmaster where ontag = 1
                                            and rlc = 0
                                            and pload = 0
                                            and (stagtidi = '".$empcode."')
                                            and dvagtidi is not null
                                            and dvagtidii is null
                                            
                                            and (dvsbtg = 0 OR dvsbtg = 1 OR dvsbtg = 2)
                                            and dvload = 1 and leadmaster.stdti > current_date - 6 and leadmaster.stdti < current_date - 5 ");
                                            $tuesday_1 = $tuesday_1->num_rows();
                                            $tuesday_2 = $this->db->query("select * from leadmaster where ontag = 1
                                            and rlc = 0
                                            and pload = 0
                                            and (stagtidii = '".$empcode."')
                                            and dvagtidi is not null
                                            and dvagtidii is not null
                                            
                                            and (dvsbtg = 0 OR dvsbtg = 1 OR dvsbtg = 2)
                                            and dvload = 1 and leadmaster.stdtii > current_date - 6 and leadmaster.stdtii < current_date - 5 ");
                                            $tuesday_2 = $tuesday_2->num_rows();
                                            echo $tuesday_total = $tuesday_1 + $tuesday_2;
                                             ?>
                                            </td>
                                            <td>
                                            <?php 
                                            $wed_1 = $this->db->query("select * from leadmaster where ontag = 1
                                            and rlc = 0
                                            and pload = 0
                                            and (stagtidi = '".$empcode."')
                                            and dvagtidi is not null
                                            and dvagtidii is null
  
                                            and (dvsbtg = 0 OR dvsbtg = 1 OR dvsbtg = 2)
                                            and dvload = 1 and leadmaster.stdti > current_date - 5 and leadmaster.stdti < current_date - 4 ");
                                            $wed_1 = $wed_1->num_rows();
                                            $wed_2 = $this->db->query("select * from leadmaster where ontag = 1
                                            and rlc = 0
                                            and pload = 0
                                            and (stagtidii = '".$empcode."')
                                            and dvagtidi is not null
                                            and dvagtidii is not null
                                            
                                            and (dvsbtg = 0 OR dvsbtg = 1 OR dvsbtg = 2)
                                            and dvload = 1 and leadmaster.stdtii > current_date - 5 and leadmaster.stdtii < current_date - 4 ");
                                            $wed_2 = $wed_2->num_rows();
                                            echo $wed_total = $wed_1 + $wed_2;
                                             ?>
                                            </td>
                                            <td>
                                            <?php 
                                            $thursday_1 = $this->db->query("select * from leadmaster where ontag = 1
                                            and rlc = 0
                                            and pload = 0
                                            and dvagtidi is not null
                                            and dvagtidii is null
                                            and (stagtidi = '".$empcode."')
                                            and (dvsbtg = 0 OR dvsbtg = 1 OR dvsbtg = 2)
                                            and dvload = 1 and leadmaster.stdti > current_date - 4 and leadmaster.stdti < current_date - 3 ");
                                            $thursday_1 = $thursday_1->num_rows();
                                            $thursday_2 = $this->db->query("select * from leadmaster where ontag = 1
                                            and rlc = 0
                                            and pload = 0
                                            and dvagtidi is not null
                                            and dvagtidii is not null
                                            and (stagtidii = '".$empcode."')
                                            and (dvsbtg = 0 OR dvsbtg = 1 OR dvsbtg = 2)
                                            and dvload = 1 and leadmaster.stdtii > current_date - 4 and leadmaster.stdtii < current_date - 3 ");
                                            $thursday_2 = $thursday_2->num_rows();
                                            echo $thursday_total = $thursday_1+$thursday_2;
                                             ?>
                                            </td>
                                            <td>
                                            <?php 
                                            $friday_1 = $this->db->query("select * from leadmaster where ontag = 1
                                            and rlc = 0
                                            and pload = 0
                                            and (stagtidi = '".$empcode."')
                                            and dvagtidi is not null
                                            and dvagtidii is null
                                            and (dvsbtg = 0 OR dvsbtg = 1 OR dvsbtg = 2)
                                            and dvload = 1 and leadmaster.stdti > current_date - 3 and leadmaster.stdti < current_date - 2 ");
                                            $friday_1 = $friday_1->num_rows();
                                            $friday_2 = $this->db->query("select * from leadmaster where ontag = 1
                                            and rlc = 0
                                            and pload = 0
                                            and (stagtidii = '".$empcode."')
                                            and dvagtidi is not null
                                            and dvagtidii is not null
                                            and (dvsbtg = 0 OR dvsbtg = 1 OR dvsbtg = 2)
                                            and dvload = 1 and leadmaster.stdtii > current_date - 3 and leadmaster.stdtii < current_date - 2 ");
                                            $friday_2 = $friday_2->num_rows();
                                            echo $friday_total = $friday_1+$friday_2;
                                             ?>
                                            </td>
                                            <td>
                                            <?php 
                                            $sat_1 = $this->db->query("select * from leadmaster where ontag = 1
                                            and rlc = 0
                                            and pload = 0
                                            and (stagtidi = '".$empcode."')
                                            and dvagtidi is not null
                                            and dvagtidii is null
                                            and (dvsbtg = 0 OR dvsbtg = 1 OR dvsbtg = 2)
                                            and dvload = 1 and leadmaster.stdti > current_date - 2 and leadmaster.stdti < current_date - 1 ");
                                            $sat_1 = $sat_1->num_rows();
                                            $sat_2 = $this->db->query("select * from leadmaster where ontag = 1
                                            and rlc = 0
                                            and pload = 0
                                            and (stagtidii = '".$empcode."')
                                            and dvagtidi is not null
                                            and dvagtidii is not null
                                            and (dvsbtg = 0 OR dvsbtg = 1 OR dvsbtg = 2)
                                            and dvload = 1 and leadmaster.stdtii > current_date - 2 and leadmaster.stdtii < current_date - 1 ");
                                            $sat_2 = $sat_2->num_rows();
                                            echo $sat_total = $sat_1+$sat_2;
                                             ?>
                                            </td>
                                            <td>
                                            <?php 
                                            $sun_1 = $this->db->query("select * from leadmaster where ontag = 1
                                            and rlc = 0
                                            and pload = 0
                                            and (stagtidi = '".$empcode."')
                                            and dvagtidi is not null
                                            and dvagtidi is null
                                            and (dvsbtg = 0 OR dvsbtg = 1 OR dvsbtg = 2)
                                            and dvload = 1 and leadmaster.stdti > current_date - 1 and leadmaster.stdti < current_date - 0 ");
                                            $sun_1 = $sun_1->num_rows();
                                            $sun_2 = $this->db->query("select * from leadmaster where ontag = 1
                                            and rlc = 0
                                            and pload = 0
                                            and (stagtidii = '".$empcode."')
                                            and dvagtidi is not null
                                            and dvagtidii is not null
                                            and (dvsbtg = 0 OR dvsbtg = 1 OR dvsbtg = 2)
                                            and dvload = 1 and leadmaster.stdtii > current_date - 1 and leadmaster.stdtii < current_date - 0 ");
                                            $sun_2 = $sun_2->num_rows();
                                            echo $sun_total = $sun_1+$sun_2;
                                             ?>
                                            </td>
                                            <td>
                                            <?php 
                                            $today_1 = $this->db->query("select * from leadmaster where ontag = 1
                                            and rlc = 0
                                            and pload = 0
                                            and (stagtidi = '".$empcode."')
                                            and dvagtidi is not null
                                            and dvagtidi is null
                                            and (dvsbtg = 0 OR dvsbtg = 1 OR dvsbtg = 2)
                                            and dvload = 1 and leadmaster.stdti = current_date");
                                            $today_1 = $today_1->num_rows();
                                            $today_2 = $this->db->query("select * from leadmaster where ontag = 1
                                            and rlc = 0
                                            and pload = 0
                                            and (stagtidii = '".$empcode."')
                                            and dvagtidi is not null
                                            and dvagtidii is not null
                                            and (dvsbtg = 0 OR dvsbtg = 1 OR dvsbtg = 2)
                                            and dvload = 1 and leadmaster.stdtii = current_date");
                                            $today_2 = $today_2->num_rows();
                                            echo $today_total = $today_1+$today_2;
                                             ?>
                                            </td>
                                            
                                            </tr>
                                            </table>
                                            <div>
                                            <div style="padding:10px;float:left;"><b>Total Submited: <?php
                                            $date_start = strtotime('-' . date('w') . ' days');
                                             $submit1_total = $this->db->query("select * from leadmaster where  leadmaster.stdti > current_date - 14 AND leadmaster.stagtidi = '".$empcode."' ");
                                             $submit1 = $submit1_total->num_rows();
                                             $submit2_total = $this->db->query("select * from leadmaster where  leadmaster.stdtii > current_date - 14 AND stagtidii = '".$empcode."' ");
                                             echo $submit1 + $submit2_total->num_rows();
                                            
                                            ?>
                                            </div>
                                            <div style="float:right;">
                                             Total Accepted: <?php echo $day15+$day14+$day13+$day12+$day11+$day10+$day9+$monday_total +$tuesday_total+$wed_total+$thursday_total+$friday_total+$sat_total+$sun_total+$today_total;?></b></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                         
                        </div>
                        
                    </div>
                    <?php } ?>
                   
                </div>
            </div>
           
          
<!-- <link rel="stylesheet"  
 href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"> -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">
</script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.min.js">
</script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js">
</script> -->
            <?php 
                                // // $stmt = pg_query("SELECT language, nos  FROM chart_data");
                                // $stmt_bar_bar_countries = pg_query("SELECT countryname, COUNT(lmid) as counts
                                // FROM country
                                //     JOIN leadmaster on leadmaster.country= country.countrycd
                                // GROUP BY countryname
                                // ORDER BY  COUNT(lmid) DESC LIMIT 5;");
                                // // echo "No of records : ".pg_num_rows($stmt_bar)."<br>";		


                                // $php_data_array_bar_countries = Array(); // create PHP array
                                ?>
                             
                                <?php 
                                   // while ($row_bar_countries = pg_fetch_object($stmt_bar_bar_countries)) {
                                    ?>
                              
                                <?php// $php_data_array_bar_countries[] = $row_bar_countries; // Adding to array
                                }?>
                              
                                <?php  //json_encode($php_data_array_bar_countries); 

                                // Transfor PHP array to JavaScript two dimensional array 
                                // echo "<script>
                                //         var my_2d_bar_countries = ".json_encode($php_data_array_bar_countries)."
                               
                                //         </script>";
                                ?>

       <script>

       
 $(document).ready(function(){

    // var language = [];
    // var nos = [];

    // for(var i in my_2d_bar) {
    //     language.push(my_2d_bar[i].language);
    //     nos.push(my_2d_bar[i].nos);
    // }

    // var chartdata = {
    //     labels: language,
    //     datasets : [
    //     {
    //     label: 'Countries Count:',
    //     backgroundColor: '#68a3ed',
    //     borderColor: 'rgba(200, 200, 200, 0.75)',
    //     hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
    //     hoverBorderColor: 'rgba(200, 200, 200, 1)',
    //     data: nos
    //     }
    //     ]
    // };
   

    
    // var bar_canvas = $("#bar_canvas");
   
    
    // var barGraph = new Chart(bar_canvas, {
    //     type: 'bar',
    //     data: chartdata
    // });
//ENd


    // var countryname = [];
    // var counts = [];

    // for(var i in my_2d_bar_countries) {
        
        
       
    //     countryname.push(my_2d_bar_countries[i].countryname);
    //     counts.push(parseInt(my_2d_bar_countries[i].counts));
     
    // }

    // var chartdata_countries = {
    //     labels: countryname,
    //     datasets : [
    //     {
    //     label: 'Countries Count:',
    //     backgroundColor: '#68a3ed',
    //     borderColor: 'rgba(200, 200, 200, 0.75)',
    //     hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
    //     hoverBorderColor: 'rgba(200, 200, 200, 1)',
    //     data: counts
    //     }
    //     ]
    // };
   

    
    // var bar_canvas_countries = $("#bar_canvas_countries");
   
    
    // var barGraph1 = new Chart(bar_canvas_countries, {
    //     type: 'bar',
    //     data: chartdata_countries
    // });
   

          

});
 </script>






 