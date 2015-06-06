<div id="content-wrapper">

		<div class="page-header">
			<h1><a href="<?php echo site_url(); ?>all-questions/">Question Bank</a></h1>
		</div> <!-- / .page-header -->

<!-- 5. $FONT_AWESOME_ICONS =============================================================================

		Font-Awesome Icons
-->
		<!-- Styles -->
			<style>
				#font-awesome-icons [class*="col-"] {
					padding-bottom: 8px;
					padding-top: 8px;
				}
				#font-awesome-icons [class*="col-"]:hover {
					color: #000 !important;
				}
				#font-awesome-icons .fa {
					font-size: 14px;
					width: 20px;
					text-align: center;
				}
				#font-awesome-icons h4 {
					font-weight: 300;
					margin-bottom: 25px;
				}
			</style>
		<!-- / Styles -->

		<div class="panel" id="font-awesome-icons">	
				
				<script>
					init.push(function () {
						$('#jq-datatables-example').dataTable();
						$('#jq-datatables-example_wrapper .table-caption').text('Manage Questions');
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
										<th>Question</th>
										<th>Type</th>
										<th>Sub Type</th>
										<th>Difficulty Level</th>
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
                                  ?>
                                  <tr class="<?php echo $class; ?> gradeX">
										<td><?php echo $key+1; ?></td>
										<td><?php echo $val->question; ?></td>
										<td><?php echo $val->type_name; ?></td>
										<td class="center"><?php echo $val->subtype_name; ?></td>
										<td class="center"><?php echo $val->difficulty_level; ?></td>
                                        <td><a href="<?php echo site_url();?>edit-question?qid=<?php echo $val->id;?>" class="btn btn-labeled btn-sm btn-outline" >Edit</a>
                                        <form method="post" action="">
                                            <input type="hidden" name="qaction" value="delque"/>
                                            <input type="hidden" name="qid" value="<?php echo $val->id; ?>"/>
                                            <input type="submit" class="btn btn-danger btn-sm btn-outline qdelete" value="Delete"/>
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

