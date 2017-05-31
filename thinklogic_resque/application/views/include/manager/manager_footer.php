        

        </div>
        <!-- /#main-->

    </div>
    <!-- /#wrapper -->
	<script src="<?php echo base_url();?>assets/vendor/jquery/jquery.min.js"></script>
	<script src="<?php echo base_url();?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url();?>assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="<?php echo base_url();?>assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
	<script src="<?php echo base_url();?>assets/vendor/chartist/js/chartist.min.js"></script>
	<script src="<?php echo base_url();?>assets/scripts/klorofil-common.js"></script>
    <!-- jQuery -->
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
   
    
    <?php if($this->session->flashdata('invalid_email') != NULL){ ?>
        <script type="text/javascript">
            $(window).on('load',function(){
            $('#addNewUser').modal('show');
        });
        </script>
    <?php } ?>

    <script>
        $(document).ready(function () {
            $('.dropdown-toggle').dropdown();
        });
    </script>

    <script>  
          $(document).ready(function(){  
               $('.update_TicketStatusToPending').click(function(){  
                    var id = $(this).attr("id");  
                     window.location="<?php echo base_url(); ?>manager/update_TicketStatusToPending/"+id; 
               });  
          });  
    </script>
	 <script>  
          $(document).ready(function(){  
               $('.confirmation').click(function(){  
                    if(confirm("Are you sure with this action?"))  
                    {  
                      return true;
                    }  
                    else  
                    {  
                         return false;  
                    }  
               });  
          });  
    </script>

</body>

</html>
