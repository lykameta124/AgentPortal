		<div id="page-wrapper">

            <div class="container-fluid">
				
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            The Team
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i> Dashboard
                            </li>
                            <li class="active">
                                <i class="fa fa-users"></i> Team
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
				
                
                    
                
            
                <?php 
                    $count = 1;
                foreach( $teamUnder as $row ) 
                {
                    if ($count%4 == 1)
                    {  
                         echo "<div class='row'>";
                    }
                ?>
                    <div class="col-md-3 col-sm-6" style="margin-bottom:2em;">
                        <div class="our-team">
                            <div class="pic">
                                <img src="<?php echo base_url() . '' . $row->image ?>" alt="" >
                                <div class="social_media_team">
                                    <ul class="team_social">
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="team-prof">
                                <h3 class="post-title"><?php echo $row->first_name . " " . $row->last_name;?></h3>
                            </div>
                        </div>
                    </div>
                <?php
                    if ($count%4 == 0)
                    {
                        echo "</div>";
                    }
                    $count++; 
                }
                if ($count%4 != 1) echo "</div>"
                ?>
                
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
	