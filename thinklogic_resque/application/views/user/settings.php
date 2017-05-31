<div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Account Settings
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-user"></i>  <a href="#">Account</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-cog"></i> Settings
                            </li>
                        </ol>
                    </div>
                    <style type="text/css">
                        .settings-containter{
                            padding-left: 18em;
                            padding-right: 18em;
                            padding-top: 15em;
                        }

                        .settings-input{
                             padding-left: 3.5em;
                            padding-right: 3.5em;
                        }

                    </style>
                    <div class="settings-containter">
                    <?php if($this->session->flashdata('flash') != ''){?>
                     <div class="alert alert-danger">
                        <?php echo $this->session->flashdata('flash');?>
                    </div>
                    <?php } ?>
                        <div class="col-lg-12">
                            <table>
                                <tr>
                                    <td>
                                    <div style="padding-left: 2em;padding-right: 20.3em">
                                        <h3><i class="fa fa-user"></i> Change username</h3>
                                    </div>
                                    </td>
                                   
                                    <td >
                                     <div style="margin-top: 1em;">
                                        <script type="text/javascript">
                                          if ($.trim($(this).text()) === 'Show Answer') {
                                              $(this).text('Hide Answer');
                                          } else {
                                              $(this).text('Show Answer');        
                                          }
                                        </script>
                                        <input type='submit' onclick="$('#edit_username').toggle();this.value=this.value=='Edit'?'Close':'Edit';" value="Edit"></button>
                                    </div>
                                    </td>
                                </tr>
                            </table>
                            <hr/>
                        </div>

                        <div class="settings-input col-lg-12" style="display:none;" id="edit_username">
                            <form method="POST" class="form-horizontal" action="update_username">
                              <div class="form-group">
                                <label class="col-sm-3 control-label">New username</label>
                                <div class="col-sm-6">
                                  <input type="text" class="form-control" name="new_username" required>
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="col-sm-3 control-label" value="" required>Password</label>
                                <div class="col-sm-6">
                                  <input type="password" class="form-control" name="password">
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-7">
                                  <button type="submit" class="btn btn-default pull-right">Save Changes</button>
                                </div>
                              </div>
                            </form>
                            <hr/>
                        </div>



                        <div class="col-lg-12">
                            <table>
                                <tr>
                                    <td>
                                    <div style="padding-left: 2em;padding-right: 20em">
                                        <h3><i class="fa fa-key"></i> Change password</h3>
                                    </div>
                                    </td>
                                   
                                    <td >
                                     <div style="margin-top: 1em;">
                                        <script type="text/javascript">
                                          if ($.trim($(this).text()) === 'Show Answer') {
                                              $(this).text('Hide Answer');
                                          } else {
                                              $(this).text('Show Answer');        
                                          }
                                        </script>
                                        <input type='submit' onclick="$('#edit_pass').toggle();this.value=this.value=='Edit'?'Close':'Edit';" value="Edit"></button>
                                    </div>
                                    </td>
                                </tr>
                            </table>
                            <hr />
                        </div>

                        
    

                        <div class="settings-input col-lg-12" style="display:none;" id="edit_pass">
                            <form class="form-horizontal" action="update_password" method="post">
                              <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Current</label>
                                <div class="col-sm-6">
                                  <input type="password" class="form-control" name="password" required>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="inputPassword3" class="col-sm-3 control-label">New</label>
                                <div class="col-sm-6">
                                  <input type="password" class="form-control" name="new_password" required>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Re-type new</label>
                                <div class="col-sm-6">
                                  <input type="password" class="form-control" name="retype_password" required>
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-7">
                                  <button type="submit" class="btn btn-default pull-right">Save Changes</button>
                                </div>
                              </div>
                            </form>
                            <hr/>
                        </div>               
                    </div>

                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->