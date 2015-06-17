<div id="content-wrapper">

		<div class="page-header">
			<h1><span class="text-light-gray"><a href="<?php site_url(); ?>all-exam">Test Manager</a>/ </span><a href="<?php echo site_url(); ?>add-exam" >Exam Status</a></h1>
		</div> <!-- / .page-header -->

		<div class="row">
			<div class="col-sm-12">

<!-- 1. ADD Test Body =============================================================================			
-->


					
				<div class="panel">
					<div class="panel-heading">
						<span class="panel-title"><a href="<?php echo site_url(); ?>add-test" >Exam Status</a></span>
					</div>
					<div class="panel-body">
		      	<!-- / Javascript -->
                <?php 
               	$errors = validation_errors();
                if(!empty($errors)): ?>
                    <div class="alert alert-danger">
    					<button type="button" class="close" data-dismiss="alert"><i class="fa fa-times"></i></button>
    					<strong>Error</strons>  <?php echo validation_errors(); ?></strong>
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
                                <label for="type1" class="text-semibold text-md">Type 1</label>
                                <div  style="text-align: left;">
                                
            	                   <select class="form-control" name="test_type1">
										<option value="">-- Select Test Type --</option>
                                        <?php foreach($results as $test){
                                            if($test->test_type == 1){
                                                if($exam_status['test_type1'] ==$test->id )
                                                {
                                                 echo "<option value='".$test->id."' selected>".$test->name."</option>";   
                                                }
                                                else
                                                {
                                                echo "<option value='".$test->id."'>".$test->name."</option>";
                                                }
                                            }
                                            
                                        } ?>    
                                        </select>
                                 </div>
            				</div>
                            <div class="form-group">
                                <label for="type2" class="text-semibold text-md">Type 2</label>
                                <div  style="text-align: left;">
            	                   <select class="form-control" name="test_type2">
										<option value="">-- Select Test Type --</option>
                                        <?php foreach($results as $test){
                                            if($test->test_type == 2){
                                                if($exam_status['test_type2'] ==$test->id )
                                                {
                                                 echo "<option value='".$test->id."' selected>".$test->name."</option>";   
                                                }
                                                else
                                                {
                                                echo "<option value='".$test->id."'>".$test->name."</option>";
                                                }
                                            }
                                            
                                        } ?> 
                                    </select>
                                 </div>
            				</div>
            		      <div class="form-group">
                                <div class="">
                                    <input type="submit" class="btn btn-primary" value="Save Status" />
                                    
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
      