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
                <?php if( $type['rolenm'] == "Administrator" || $this->session->userdata('role') == 0){?>
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
                                                <?php $query = $this->db->query('SELECT * FROM users');
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
                                                <?php $query = $this->db->query("SELECT * FROM users where cid_type='TMB'");
                                                    echo $query->num_rows();?>
                                                </h5>
                                                <span>TMB</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="">
                                <div class="row-table">
                                    <div class="col-sm-6 card-block-big br">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <i class="icofont icofont-user text-info"></i>
                                            </div>
                                            <div class="col-sm-8 text-center">  
                                                <h5>
                                                <?php $query = $this->db->query("SELECT * FROM users where cid_type='ME'");
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
                                                <?php $query = $this->db->query("SELECT * FROM users where cid_type='HP'");
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
                                                <div id="barchart" style="height:40px;width:40px;"></div>
                                            </div>
                                            <div class="col-sm-8 text-center">
                                                <h5>
                                                <?php $query = $this->db->query("SELECT * FROM campaign ");
                                                    echo $query->num_rows();?>
                                                </h5>
                                                </h5>
                                                <span>Campaigns</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 card-block-big">
                                        <div class="row ">
                                            <div class="col-sm-4">
                                                <i class="icofont icofont-network text-primary"></i>
                                            </div>
                                            <div class="col-sm-8 text-center">
                                                <h5>600</h5>
                                                <span>Network</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="">
                                <div class="row-table">
                                    <div class="col-sm-6 card-block-big br">
                                        <div class="row ">
                                            <div class="col-sm-4">
                                                <div id="barchart2" style="height:40px;width:40px;"></div>
                                            </div>
                                            <div class="col-sm-8 text-center">
                                                <h5>
                                                <?php $query = $this->db->query("SELECT * FROM leadmaster ");
                                                    echo $query->num_rows();?>
                                                </h5>
                                                </h5>
                                                <span>Leads</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 card-block-big">
                                        <div class="row ">
                                            <div class="col-sm-4">
                                                <i class="icofont icofont-network-tower text-primary"></i>
                                            </div>
                                            <div class="col-sm-8 text-center">
                                                <h5>100%</h5>
                                                <span>Connections</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- table card end -->
                    </div>
                    <div class="col-md-12 col-xl-4">
                        <!-- widget primary card start -->
                        <div class="card table-card widget-primary-card">
                            <div class="">
                                <div class="row-table">
                                    <div class="col-sm-3 card-block-big">
                                        <i class="icofont icofont-star"></i>
                                    </div>
                                    <div class="col-sm-9">
                                        <h4>1000 +</h4>
                                        <h6>Campaigns Completed</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- widget primary card end -->
                        <!-- widget-success-card start -->
                        <div class="card table-card widget-success-card">
                            <div class="">
                                <div class="row-table">
                                    <div class="col-sm-3 card-block-big">
                                        <i class="icofont icofont-trophy-alt"></i>
                                    </div>
                                    <div class="col-sm-9">
                                        <h4>150000+</h4>
                                        <h6>Leads Delivered</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                     
                       
                        <!-- widget-success-card end -->
                     


                    </div>
                    
                    <!-- <div class="col-md-12 col-lg-4">
                        <div class="card">
                            <div class="card-header">
                                <h5>Total</h5>
                            </div>
                            <div class="card-block">
                            <div class="card table-card widget-primary-card">
                            <div class="">
                                <div class="row-table">
                                    <div class="col-sm-3 card-block-big">
                                    <i class="icofont icofont-fast-delivery"></i>
                                    </div>
                                    <div class="col-sm-9">
                                        <h4>Total Leads <?php $query = $this->db->query("SELECT * FROM leadmaster ");
                                                    // echo $query->num_rows();?>
                                        <h6>Ready to deliver
                                        <?php $querydel = $this->db->query("select * from leadmaster
                                            where 
                                            qaload = 1
                                            and qaacpt = 1
                                            and qastat = 'qualified'
                                            and evload = 1
                                            and (dytg = 0 OR dytg is null)
                                            and cdcsb <=4 
			                                and cdcrjt <=4 ");
                                        //   echo $querydel->num_rows();?>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        </div>
                        </div>
                     </div> -->
                            
                    <!-- <div class="col-md-12 col-lg-4">
                        <div class="card">
                            <div class="card-header">
                                <h5>Top 10 Leads Countries</h5>
                            </div>
                            <div class="card-block"  id="chart_div">
                                <div id="chart_div"></div> -->
                                <?php 
                                // $stmt = pg_query("SELECT language, nos  FROM chart_data");
                                $stmt = pg_query("SELECT countryname, COUNT(lmid)
                                FROM country
                                    JOIN leadmaster on leadmaster.country= country.countrycd
                                GROUP BY countrycd,countryname
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


                                

                                <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                                <script>
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
                                    var options = {title:'How the leads are distributed',
                                                    // width:600,
                                                    // height:500
                                                };

                                        // Instantiate and draw the chart
                                        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
                                        chart.draw(data, options);
                                    }
                                </script>

                            <!-- </div>
                        </div> 
                    </div> -->
                   
          
                  


                    <div class="col-md-12 col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h5>Top 10 Countries</h5>
                            </div>
                            <div class="card-block">
                            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
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
                            // height: 900,
                            legend: { position: 'none' },
                            chart: { title: 'How the leads are distributed',
                                    subtitle: '' },
                            bars: 'horizontal', // Required for Material Bar Charts.
                            axes: {
                                x: {
                                0: { side: 'top', label: 'Numbers'} // Top x-axis.
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
                                        data_desi_bar.addColumn('number', 'Nos');
                                        for(i = 0; i < my_2d_desi_bar.length; i++)
                                        data_desi_bar.addRow([my_2d_desi_bar[i][0], parseInt(my_2d_desi_bar[i][1])]);
                                // above row adds the JavaScript two dimensional array data into required chart format
                                    var options_desi_bar = {
                                                        title: 'Chess opening moves',
                                                        // width: 900,
                                                        legend: { position: 'none' },
                                                        chart: { 
                                                            title: 'How the leads are distributed',
                                                            subtitle: '' },
                                                        bars: 'horizontal', // Required for Material Bar Charts.
                                                        axes: {
                                                            x: {
                                                            0: { side: 'top', label: 'Numbers'} // Top x-axis.
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
                                                        title: 'How the leads are distributed',
                                                        // width: 900,
                                                        legend: { position: 'none' },
                                                        chart: { 
                                                            title: 'How the leads are distributed',
                                                            subtitle: '' },
                                                        bars: 'horizontal', // Required for Material Bar Charts.
                                                        axes: {
                                                            x: {
                                                            0: { side: 'top', label: 'Numbers'} // Top x-axis.
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
                                    var options = {title:'How the leads are distributed',
                                                    // width:600,
                                                    // height:500
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


                                <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                               

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


                                <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                               

                            </div>
                        </div>
                    </div>
                 
    <div class="col-md-12 col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h5>Job Leveles on Pie Chart </h5>
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
                                                        <th>Lead Added / Updated</th>
                                                        <!-- <th>User Name</th> -->
                                                       
                                                        <th>Lead Saved</th>
                                                        <th>Lead Verified-Accepted</th>
                                                        <th>Lead Verified-Rejected</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><?php  $startdate =  date('Y-m-d 00:00:00');  $enddate =  date('Y-m-d H:i:s'); //'stdti >=', date('Y-m-d 00:00:00') 'stdti <=', date('Y-m-d H:i:s')
                                                        $today = $this->db->query("SELECT * FROM leadmaster where (stagtidi = $empid OR stagtidi = $empcode ) AND  stdti <= current_date + current_time AND stdti >= current_date + 00-00-00 ");
                                                        $yesterday = $this->db->query("SELECT * FROM leadmaster where (stagtidi = $empid OR stagtidi = $empcode ) AND stdti >= current_date - 1 AND stdti <= current_date");
                                                        // echo  "YESTERDAY :  ".$yesterday->num_rows()."<br><br>";
                                                        echo "TODAY : ". $today->num_rows();
                                                        $subone= $today;
                                                        ?>
                                                        </td>
                                                        <!-- <td><?php //echo $this->session -> userdata('username')?></td><td> -->
                                                        <td>
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
                                                        <td><?php  $startdate =  date('Y-m-d 00:00:00');  $enddate =  date('Y-m-d H:i:s'); //'stdti >=', date('Y-m-d 00:00:00') 'stdti <=', date('Y-m-d H:i:s')
                                                        $today = $this->db->query("SELECT * FROM leadmaster where (dvagtidi = $empcode ) AND  dvdti <= current_date + current_time AND dvdti >= current_date + 00-00-00 ");
                                                        $yesterday = $this->db->query("SELECT * FROM leadmaster where (dvagtidi = $empcode ) AND dvdti >= current_date - 1 AND dvdti <= current_date");
                                                        // echo  "YESTERDAY :  ".$yesterday->num_rows()."<br><br>";
                                                        echo "TODAY : ". $today->num_rows();
                                                        // $today1staccepted = $today->num_rows();
                                                        $accone =  $today;
                                                        ?>
                                                        </td>
                                                        </td>
                                                        <td><?php  $startdate =  date('Y-m-d 00:00:00');  $enddate =  date('Y-m-d H:i:s'); //'stdti >=', date('Y-m-d 00:00:00') 'stdti <=', date('Y-m-d H:i:s')
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
                                                        <td><?php 
                                                         $startdate =  date('Y-m-d 00:00:00');  $enddate =  date('Y-m-d H:i:s'); //'stdti >=', date('Y-m-d 00:00:00') 'stdti <=', date('Y-m-d H:i:s')
                                                        $today = $this->db->query("SELECT * FROM leadmaster where (stagtidii = $empid OR stagtidii = $empcode ) AND  stdtii <= current_date + current_time AND stdtii >= current_date + 00-00-00 ");
                                                       
                                                        $yesterday = $this->db->query("SELECT * FROM leadmaster where (stagtidii = $empid OR stagtidii = $empcode ) AND stdtii >= current_date - 1 AND stdtii <= current_date");
                                                    //    echo  "YESTERDAY :  ".$yesterday->num_rows()."<br><br>";
                                                        echo "TODAY : ". $today->num_rows();
                                                        $subtwo= $today;
                                                        ?>
                                                        </td>
                                                        <!-- <td><?php //echo $this->session -> userdata('username')?></td><td> -->
                                                        <td>
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
                                                        <td><?php  $startdate =  date('Y-m-d 00:00:00');  $enddate =  date('Y-m-d H:i:s'); //'stdti >=', date('Y-m-d 00:00:00') 'stdti <=', date('Y-m-d H:i:s')
                                                        $today = $this->db->query("SELECT * FROM leadmaster where (dvagtidii = $empcode ) AND  dvdtii <= current_date + current_time AND dvdtii >= current_date + 00-00-00 ");
                                                        $yesterday = $this->db->query("SELECT * FROM leadmaster where (dvagtidii = $empcode ) AND dvdtii >= current_date - 1 AND dvdtii <= current_date");
                                                        // echo  "YESTERDAY :  ".$yesterday->num_rows()."<br><br>";
                                                        echo "TODAY : ". $today->num_rows();
                                                        // echo  "Total Accepted Today (1st): ". $today1staccepted+$today->num_rows();
                                                        $acctwo =  $today;
                                                       ?>
                                                        </td>
                                                        </td>
                                                        <td><?php  $startdate =  date('Y-m-d 00:00:00');  $enddate =  date('Y-m-d H:i:s'); //'stdti >=', date('Y-m-d 00:00:00') 'stdti <=', date('Y-m-d H:i:s')
                                                        $today = $this->db->query("SELECT * FROM leadmaster where (dvragtidii = $empcode ) AND  dvrdtii <= current_date + current_time AND dvrdtii >= current_date + 00-00-00 ");
                                                        $yesterday = $this->db->query("SELECT * FROM leadmaster where (dvragtidii = $empcode ) AND dvrdtii >= current_date - 1 AND dvrdtii <= current_date");
                                                        // echo  "YESTERDAY :  ".$yesterday->num_rows()."<br><br>";
                                                        echo "TODAY : ". $today->num_rows();

                                                        $rejtwo =  $today;
                                                      
                                                        ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><b> Total Submitted:</b>
                                                        <?php  $totalsub = $subtwo->num_rows()+ $subone->num_rows();
                                                        echo $totalsub; ?></td>
                                                         <td><b> Total Saved:</b>
                                                        <?php  $totalsaved = $saveone->num_rows();
                                                        echo $totalsaved; ?></td>
                                                        <td><b> Total Accepted:</b>
                                                        <?php  $totalacc = $acctwo->num_rows()+ $accone->num_rows();
                                                        echo $totalacc; ?></td>
                                                        <td><b> Total rejected:</b>
                                                        <?php  $totalrej= $rejtwo->num_rows()+ $rejone->num_rows();
                                                        echo $totalrej; ?></td>
                                                         
                                                        
                                                    </tr>
                                                    
                                                </tbody>
                                            </table>
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
   
   





            /*Doughnut chart - Working*/
    var ctx = document.getElementById("myChart");
    var chartdata1 = {
        labels: [
            "U.S.A.", "U.K.", "China", "Australia and New Zealand"
            // language
        ],
        datasets: [{
            // data: nos,
            data: [40, 50, 10, 30],
            backgroundColor: [
                "#68a3ed",
                "#FCC9BA",
                "#B8EDF0",
                "#B4C1D7"
            ],
            borderWidth: [
                "0px",
                "0px",
                "0px",
                "0px"
            ],
            borderColor: [
                "#1ABC9C",
                "#FCC9BA",
                "#B8EDF0",
                "#B4C1D7"

            ]
        }]
    };

    var myDoughnutChart = new Chart(ctx, {
        type: 'doughnut',
        data: chartdata1
    });
    /*Doughnut chart*/

});
 </script>






 