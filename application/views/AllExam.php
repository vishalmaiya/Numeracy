<div id="content-wrapper">

		<div class="page-header">
			<h1><a href="<?php echo site_url(); ?>all-questions/">Test Manager</a></h1>
		</div> <!-- / .page-header -->



		<div class="panel" id="font-awesome-icons">	
				
				<script>
					init.push(function () {
						$('#jq-datatables-example').dataTable();
						$('#jq-datatables-example_wrapper .table-caption').text('Manage Test');
						$('#jq-datatables-example_wrapper .dataTables_filter input').attr('placeholder', 'Search...');
					});
				</script>
				<!-- / Javascript -->

				<div class="panel">
					
						<div class="table-primary">
							<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="jq-datatables-example">
								<thead>
									<tr>
										<th>#</th>
										<th>Test Name</th>
										<th>Type</th>
                                        <th>Action</th>
									</tr>
								</thead>
								<tbody>
                                <?php 
                                if(is_array($results)){
                                foreach($results as $key=>$val)
                                {
                                    if($key%2 == 0)
                                    {
                                        $class = "even";
                                    }
                                    else
                                    {
                                        $class = "odd";
                                    }

                                if($exam_status['test_type1'] == $val->id || $exam_status['test_type2'] == $val->id )
                                        {
                                            $active_tupple = "active_tupple active_cell";
                                        }
                                        else
                                        {
                                            $active_tupple = "";
                                        }
                                ?>
                                  
                                  <tr class="<?php echo $class; ?> gradeX <?php echo $active_tupple; ?>">
										<td><?php echo $key+1; 
                                        if($exam_status['test_type1'] == $val->id || $exam_status['test_type2'] == $val->id )
                                        {
                                        echo '<br /><span class="livestatus"><i class="fa fa-check-circle-o"></i> LIVE</style>';
                                        }
                                       ?>
                                        </td>
										<td><?php echo $val->name; ?></td>
										<td><?php if($val->test_type == 1)
                                        {
                                            $tt = 1;
                                            echo "Type 1";
                                        } else
                                        {
                                            $tt = 2;
                                            echo "Type 2";
                                        } ?></td>
                                        <td><a href="<?php echo site_url();?>edit-exam<?php echo $tt; ?>?tid=<?php echo $val->id;?>" class="btn btn-labeled btn-sm btn-outline btnedit" >Edit</a>
                                        <?php
                                        if($exam_status['test_type1'] == $val->id || $exam_status['test_type2'] == $val->id )
                                        {
                                            $btnd = "disabled";
                                        }else { $btnd = ""; }?>
                                        <form method="post" action="" class="<?php echo $btnd; ?> btndel">
                                            <input type="hidden" name="qaction" value="delque"/>
                                            <input type="hidden" name="qid" value="<?php echo $val->id; ?>"/>
                                            <input type="submit" <?php echo $btnd; ?> class="btn btn-danger btn-sm btn-outline qdelete <?php echo $btnd; ?>" value="Delete"/>
                                        </form>
                                        </td>
									</tr>
                                  <?php  
                                }
                                }
                                
                                ?>
									
								</tbody>
							</table>
						</div>
					
<!-- /11. $JQUERY_DATA_TABLES -->

		</div>
<!-- /5. $FONT_AWESOME_ICONS -->

	</div>

