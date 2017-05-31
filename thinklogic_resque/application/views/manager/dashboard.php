<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Dashboard <small>Statistics Overview</small>
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> Dashboard
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->
    <!-- /.row -->

    <div class="row">
        <div class="col-lg-6 col-md-6">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-tasks fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><p><big style="font-size: 50px"><?php echo $totalAssignedTickets; ?></big> <small style="font-size:20px">New Task!</small></p></div>
                            
                        </div>
                    </div>
                </div>
                <a href="<?php echo base_url();?>manager/task">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-ticket fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><p><big style="font-size: 50px"><?php echo $totalTickets; ?></big> <small style="font-size:20px">Total Dept. Tickets</small></p></div>
                        </div>
                    </div>
                </div>
                <a href="<?php echo base_url();?>manager/tickets">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        
    </div>
    <!-- /.row -->

    
    

    <!-- <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i> Area Chart</h3>
                </div>
                <div class="panel-body">
                    <script src="https://code.highcharts.com/highcharts.js"></script>
                    <script src="https://code.highcharts.com/modules/exporting.js"></script>
                    <style type="text/css">
                        #container {
                            width:100%;
                            height: 500px;
                            margin: 0 auto
                        }
                    </style>
                    <div id="container"></div>
                    <script>
                        Highcharts.chart('container', {

                        title: {
                            text: 'Solar Employment Growth by Sector, 2010-2016'
                        },

                        subtitle: {
                            text: 'Source: thesolarfoundation.com'
                        },
                        xAxis: {
                            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
                        },

                        yAxis: {
                            title: {
                                text: 'Number of Employees'
                            }
                        },
                        legend: {
                            layout: 'vertical',
                            align: 'right',
                            verticalAlign: 'middle'
                        },


                        series: [{
                            name: 'Installation',
                            data: [1, 2, 3, 4, 5, 6, 7, 8]
                        }]
                        

                    });
                    </script>
                </div>
            </div>
        </div>
    </div> -->


    <!-- /.row -->

    <div class="row">
        <div class="col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-long-arrow-right fa-fw"></i> Ticket Summary</h3>
                </div>
                <div class="panel-body">
                    <center><div id="morris-donut-chart"></div></center>
                    <?php if($graph_data == FALSE){?>
                       No Tickets!!
                    <?php }else{ ?>
                    <script type="text/javascript">
                        new Morris.Donut({
                          // ID of the element in which to draw the chart.
                          element: 'morris-donut-chart',
                          // Chart data records -- each entry in this array corresponds to a point on
                          // the chart.
                          data: <?php echo $graph_data ?>
                        });
                    </script>
                    <?php }?>
                    <div class="text-right">
                        <a href="<?php echo base_url();?>manager/tickets">View Details <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>

        

        <div class="col-lg-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-tasks fa-fw"></i> 
                        <?php echo $this->session->userdata('department_name')?> Dept. Tickets Panel
                    </h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Ticket ID</th>
                                    <th>Request Date</th>
                                    <th>Subject</th>
                                    <th>Priority</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach($transaction as $row){ ?>
                            <?php if($this->session->userdata('department_name') == $row->department ){ ?> 
                                <tr>
                                    <td><?php echo $row->ticket_id; ?></td>
                                    <td><?php echo date('F d, y h:i A', strtotime($row->ticket_send)); ?></td>
                                    <td><?php echo mb_strimwidth($row->subject, 0, 30, "...");;?></td>
                                    <td><?php echo $row->priority; ?></td>
                                </tr>
                            <?php } ?>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="text-right">
                        <a href="<?php echo base_url();?>manager/tickets">View All Tickets <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->

</div>
<!-- /.container-fluid -->