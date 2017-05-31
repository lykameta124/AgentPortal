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
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-user fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?php echo $totalEmployees?></div>
                            <div>Total Employees!</div>
                        </div>
                    </div>
                </div>
                <a href="<?php echo base_url();?>admin/employees">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-ticket fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?php echo $totalTickets?></div>
                            <div>Total Tickets!</div>
                        </div>
                    </div>
                </div>
                <a href="<?php echo base_url();?>admin/tickets">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-warning">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-building fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?php echo $totalDepartment?></div>
                            <div>Total Department!</div>
                        </div>
                    </div>
                </div>
                <a href="<?php echo base_url();?>admin/department">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-users fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?php echo $totalTeam?></div>
                            <div>Total Teams!</div>
                        </div>
                    </div>
                </div>
                <a href="<?php echo base_url();?>admin/team">
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

    <div class="row">
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
                            text: 'Monthly Total Number of Tickets'
                        },

                        subtitle: {
                            text: <?php echo $year; ?>
                        },
                        xAxis: {
                            categories: <?php echo $months;?>
                        },

                        yAxis: {
                            title: {
                                text: 'Number of Tickets'
                            }
                        },
                        legend: {
                            layout: 'vertical',
                            align: 'right',
                            verticalAlign: 'middle'
                        },


                        series: <?php echo $ticketsTotal;?>
                        

                    });
                    </script>
                </div>
            </div>
        </div>
    </div>

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
                        <a href="<?php echo base_url();?>admin/tickets">View Details <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
        

        <div class="col-lg-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-ticket fa-fw"></i> Transactions Panel</h3>
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
                                <tr>
                                    <td><?php echo $row->ticket_id; ?></td>
                                    <td><?php echo date('F d, y h:i A', strtotime($row->ticket_send)); ?></td>
                                    <td><?php echo mb_strimwidth($row->subject, 0, 30, "...");;?></td>
                                    <td><?php echo $row->priority; ?></td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="text-right">
                        <a href="<?php echo base_url();?>admin/tickets">View All Tickets <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->

</div>
<!-- /.container-fluid -->