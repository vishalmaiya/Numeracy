<div id="content-wrapper">

		<div class="page-header">
			<h1><span class="text-light-gray">Question Bank/ </span>Add Question</h1>
		</div> <!-- / .page-header -->

		<div class="row">
			<div class="col-sm-12">

<!-- 1. ADD Question Body =============================================================================			
-->

				<!-- Javascript -->
				<script>
					init.push(function () {
						$("#jq-validation-phone").mask("(999) 999-9999");
						$('#jq-validation-select2').select2({ allowClear: true, placeholder: 'Select a country...' }).change(function(){
							$(this).valid();
						});
						$('#jq-validation-select2-multi').select2({ placeholder: 'Select gear...' }).change(function(){
							$(this).valid();
						});

						// Add phone validator
						$.validator.addMethod(
							"phone_format",
							function(value, element) {
								var check = false;
								return this.optional(element) || /^\(\d{3}\)[ ]\d{3}\-\d{4}$/.test(value);
							},
							"Invalid phone number."
						);

						// Setup validation
						$("#jq-validation-form").validate({
							ignore: '.ignore, .select2-input',
							focusInvalid: false,
							rules: {
							     'jquery-select-type': {
							        required: true, 
							     },
                                 'jquery-select-subtype':{
                                    required: true, 
                                 },
                                 'jq-validation-question':{
                                    requred: true,
                                    maxlength: 500
                                 },
                                 
								'jq-validation-answer': {
								  required: true,
								},
                                						
								'jq-validation-difficulty': {
									required: true,
								},
							},
						});
					});
				</script>
				<!-- / Javascript -->

				<div class="panel">
					<div class="panel-heading">
						<span class="panel-title">Add Question</span>
					</div>
					<div class="panel-body">
		   <?php 
            $attributes = array('class' => 'form-horizontal', 'id' => 'jq-validation-form');
            echo form_open('',$attributes); ?>
                        
				
				<!-- / Javascript -->
                <?php $error = validation_errors(); 
                if(!empty($error)): ?>
                <div class="alert alert-danger">
							<button type="button" class="close" data-dismiss="alert"><i class="fa fa-times"></i></button>
							<strong>Error</strong>  <?php echo validation_errors(); ?>
				</div>
	           <?php endif; ?>
                <div class="form-group">
                    <label for="jq-select-type" class="col-sm-3 control-label">Question Type</label>
                    
	                <div class="col-sm-9">
	                   <select id="jquery-select-type" class="form-control" name="qtype">
							<option>-- Select --</option>
							<?php
                            foreach($all_parents as $parent)
                            {
                                echo "<option value='".$parent->id."'>".$parent->type."</option>";
                            
                            }
                            ?>
						     </select>
	                       </div>
						</div>
                        
                    <div class="form-group">
						<label for="jq-select-subtype" class="col-sm-3 control-label">SubType</label>
						<div class="col-sm-9">
	                       <select id="jquery-select-subtype" class="form-control" name="qsubtype">
                            </select>
    						</div>
    	                   </div>
                        <div class="form-group">
								<label for="jq-validation-question" class="col-sm-3 control-label">Question</label>
								<div class="col-sm-9">
									<textarea class="form-control" name="question" id="jq-validation-question" placeholder="Enter Question here"></textarea>
								</div>
						</div>
                        
                        <div class="choices_wrapper">
                         <?php 
                        for($i=1;$i<5;$i++)
                        {
                        ?>
                                    <div class="form-group">
            							<label for="jq-validation-choice1" class="col-sm-3 control-label">Choice <span class="indexno"><?php echo $i; ?></span></label>
            							<div class="col-sm-9">
                                                <span class="input-group-addon custome-ans">
                    								<label class="px-single"><input type="radio" name="qanswer" class="px" value="<?php echo $i-1; ?>"><span class="lbl"></span></label>
                    							 </span>
                                                <input type="text" class="form-control custom-input" id="jq-validation-choice1" name="choice[]" placeholder="Required" />
            							</div>
            				       	</div>
                                    <?php
                        }?>
                          </div>                      

                        <div class="form-group">
                            <label class="col-sm-3 control-label"> </label>
                            <div class="col-sm-9">
                            <a id="addmoreoption" class="btn btn-outline btn-md btn-labeled">
                                <span class="btn-label icon fa fa-plus"></span>Add More Choice
                            </a>
                            </div>
                        </div>
                      
                        <div class="form-group">
								<label for="jq-validation-difficulty" class="col-sm-3 control-label">Difficulty Level</label>
								<div class="col-sm-9">
									<select class="form-control" id="jq-validation-difficulty" name="difficultylevel">
										<option value="">Select Difficulty Level...</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                    </select>
								</div>
				        </div>
                                
						

							<div class="form-group">
								<div class="col-sm-offset-3 col-sm-9">
									<input type="submit" class="btn btn-primary" value="Add Question" />
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
      