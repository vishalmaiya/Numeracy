<div id="content-wrapper">

		<div class="page-header">
			<h1><span class="text-light-gray"><a href="<?php site_url(); ?>all-exam">Test Manager</a>/ </span><a href="<?php echo site_url(); ?>add-exam" >Add New Test</a></h1>
		</div> <!-- / .page-header -->

		<div class="row">
			<div class="col-sm-12">

<!-- 1. ADD Test Body =============================================================================			
-->


					
				<div class="panel">
					<div class="panel-heading">
						<span class="panel-title"><a href="<?php echo site_url(); ?>add-test" >Add New Test</a></span>
					</div>
					<div class="panel-body">
		      	<!-- / Javascript -->
                <?php 
               	$errors = validation_errors();
                if(!empty($errors)): ?>
                    <div class="alert alert-danger">
    					<button type="button" class="close" data-dismiss="alert"><i class="fa fa-times"></i></button>
    					<strong>Error</strong>  <?php echo validation_errors(); ?>
    				</div>
                <?php endif; 
                if(!empty($message)): ?>
                    <div class="alert alert-success">
    					<button type="button" class="close" data-dismiss="alert"><i class="fa fa-times"></i></button>
    					<strong></strong>  <?php echo $message; ?>
    				</div>
                <?php endif;
                $attributes = array('class' => 'form-horizontal', 'id' => 'myForm');
                echo form_open('',$attributes); ?>
                            <div class="form-group">
                                <label for="tname" class="text-semibold text-md">Test Name</label>
                                <div  style="text-align: left;">
            	                   <input type="text" name="tname" <?php 
                                   if(isset($_POST['tname']))
                                   { echo "value='".$_POST['tname']."'";} else { echo "value=''"; } ?>  class="form-control" required=""/></label>
                               </div>
            				</div>
                            <div class="form-group">
                                <label for="tname" class="text-semibold text-md">Test Type</label>
                                <div  style="text-align: left;">
                                   	<select class="form-control" name="test_type">
										<option>-- Select Test Type --</option>
                                        <option value="1">Type 1</option>
                                        <option value="2">Type 2</option>
                                    </select>
                                     
                               </div>
            			</div>
                            <div class="form-group">
                            <label for="tquestions" class="text-semibold text-md" >Choose Question</label>
                            
                            <div class="choose_wrapper">
                            <table class="table">
							<thead>
								<tr>
                                    <th>#</th>
									<th>Question</th>
									<th>Type</th>
									<th>Subtype</th>
                                    <th>Difficulty Level</th>
								</tr>
							</thead>
							<tbody>
                            <?php
                            if(is_array($allquestions)){
                                
                                    if(isset($_POST['tquestions']))
                                    {
                                        foreach($allquestions as $key=>$val)
                                        { 
                                            if (in_array($val->id, $_POST['tquestions'])) {
                                                $class = "active_tupple";
                                                $chk = "checked";
                                            }
                                            else
                                            {
                                                $class = "";
                                                $chk = "";
                                            }
                                            ?>
                                            <tr class="<?php echo $class; ?>">
                                                <td><label class="px-single">
                                                    <input type="checkbox" class="sel_que" name="tquestions[]" value="<?php echo $val->id; ?>" <?php echo $chk; ?> />
                                                    <span class="lbl"></span>
                                                    </label>
                                                </td>
        										<td><?php echo $val->question; ?></td>
        										<td><?php echo $val->type_name; ?></td>
        										<td class="center"><?php echo $val->subtype_name; ?></td>
        										<td class="center"><?php echo $val->difficulty_level; ?></td>
        									</tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                       foreach($allquestions as $key=>$val)
                                        {
                                            ?>
                                            <tr>
                                                <td><label class="px-single"><input type="checkbox" class="sel_que" name="tquestions[]" value="<?php echo $val->id; ?>"><span class="lbl"></span></label></td>
        										<td><?php echo $val->question; ?></td>
        										<td><?php echo $val->type_name; ?></td>
        										<td class="center"><?php echo $val->subtype_name; ?></td>
        										<td class="center"><?php echo $val->difficulty_level; ?></td>
        									</tr>
                                     <?php
                                        }
                                    }    
                                }
                            ?>
							</tbody>
						   </table>
                        </div>
                        </div>
                        
                            
                       	<div class="form-group">
								<div class="">
									<input type="submit" class="btn btn-primary" value="Add Test" />
                                    <input type="reset" class="btn btn-default" value="Cancel" />
								</div>
							</div>
						</form>
					</div>
				</div>
<!-- /5. $JQUERY_VALIDATION -->

<!-- /10. $FORM_EXAMPLE -->

			</div>
		</div>
        
                           
 </div>
      