<div id="content-wrapper">

		<div class="page-header">
			<h1><a href="<?php echo site_url(); ?>all-questions/">Question Bank</a></h1>
		</div> <!-- / .page-header -->



		<div class="panel" id="font-awesome-icons">	
				
				<script>
					init.push(function () {
						$('#jq-datatables-example').dataTable();
                        <?php

                        if(isset($_GET['sid'])){

                            
                        ?>
						$('#jq-datatables-example_wrapper .table-caption').text('Questions Type :<?php echo $results[0]->subtype_name; ?>  ');

                        <?php }
                        else {

                           ?> $('#jq-datatables-example_wrapper .table-caption').text('Manage Questions');

                        <?php }

                         ?>
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
										<th style="width: 70%;"  >Question</th>
										<th>Type</th>
										<th>Sub Type</th>
										<!-- <th>Difficulty Level</th> -->
                                        <th>Exam</th>                       
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
									<!--	<td class="center"><?php echo $val->difficulty_level; ?></td> -->
                                        <td><?php 
                                        $tcount = 0;
                                        if(!empty($val->tests))
                                        {
                                            foreach($val->tests as $t)
                                            {
                                                $tcount++;
                                                $tid = $t['test_id'];
                                                $tname = $t['test_name'];
                                                echo "- <a href='".site_url()."edit-exam?tid=$tid' target='_blank'>".$tname."</a><br/>";
                                            }
                                        }
                                         ?></td>
                                        <td class="action_td"><a href="<?php echo site_url();?>edit-question?qid=<?php echo $val->id;?>" class="btn btn-labeled btn-sm btn-outline" >Edit</a>
                                            <a href="<?php echo site_url();?>view-question?qid=<?php echo $val->id;?>" class="btn btn-labeled btn-sm btn-outline" >View</a>
                                        <?php if($tcount == 0){ ?> 
                                        <form method="post" action="">
                                            <input type="hidden" name="qaction" value="delque"/>
                                            <input type="hidden" name="qid" value="<?php echo $val->id; ?>"/>
                                            <input type="submit" class="btn btn-danger btn-sm btn-outline qdelete" value="Delete"/>
                                        </form>
                                        <?php } ?>
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

<?php
 if(isset($_GET['sid'])){

    $qid = $_GET['sid'];
    echo $qid ;

 }
        
 ?>