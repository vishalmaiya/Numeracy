<div id="content-wrapper">

		<div class="page-header">
			<h1><a href="<?php site_url(); ?>add-question">Add New Question</a></h1>
		</div> <!-- / .page-header -->

		<div class="row">
			<div class="col-sm-12">

<!-- 1. ADD Question Body =============================================================================			
-->

				<!-- Javascript -->
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
							ignore: '',
							focusInvalid: true,
							rules: {
							     'jq-vsdfalidation-vishal': {
									required: true
								},
								'qsutype': {
								  required: true,
								  email: true
								},
								'jq-validation-password': {
									required: true,
									minlength: 6,
									maxlength: 20
								},
								'jq-validation-password-confirmation': {
									required: true,
									minlength: 6,
									equalTo: "#jq-validation-password"
								},
								'jq-validation-url': {
									required: true,
									url: true
								},
								'jq-validation-phone': {
									required: true,
									phone_format: true
								},
								'qtype': {
									required: true
								},
								'jq-validation-multiselect': {
									required: true,
									minlength: 2
								},
								'quetype': {
									required: true
								},
								'jq-validation-select2-multi': {
									required: true,
									minlength: 2
								},
								'choice': {
									required: true
								},
								'jq-validation-simple-error': {
									required: true
								},
								'jq-validation-dark-error': {
									required: true
								},
								'qanswer': {
									required: true
								},
								'jq-validation-checkbox1': {
									require_from_group: [1, 'input[name="jq-validation-checkbox1"], input[name="jq-validation-checkbox2"]']
								},
								'jq-validation-checkbox2': {
									require_from_group: [1, 'input[name="jq-validation-checkbox1"], input[name="jq-validation-checkbox2"]']
								},
								'jq-validation-policy': {
									required: true
								}
							},
							messages: {
								'jq-validation-policy': 'You must check it!'
							}
						});
					});
				</script>
				<!-- / Javascript -->


					
				<div class="panel">
					<div class="panel-heading">
						<span class="panel-title">Add New Question</span>
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
                    <label for="quetype" class="col-sm-3 control-label">Question Type</label>
                    <div class="col-sm-9">
	                   <select class="form-control" id="jquery-select-type"  name="qtype">
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
								<label for="jq-validation-question" class="col-sm-3 control-label">Question</label>
								<div class="col-sm-9">
									<textarea class="form-control" name="question" id="question" placeholder="Enter Question here"><?php if(isset($_POST['question']) && $errors)echo $_POST['question']; ?></textarea>
								</div>
						</div>
                        
                        <div class="choices_wrapper">
                         <?php
                 if(isset($_POST['choice']) && $errors)
                 { 
                         $i = 1;
                    $options = $_POST['choice'];
                    foreach($options as $option)
                    {
                        ?>
                        <div class="form-group">
							<label for="jq-validation-choice1" class="col-sm-3 control-label">Choice <span class="indexno"><?php echo $i; ?></span></label>
							<div class="col-sm-9">
                                <?php if($i>4)
                                {
                                    ?>
                              <span class="input-group-addon custome-ans">
								<label class="px-single">
                                    <input type="radio" name="qanswer" value="<?php echo $option; ?>" class="px"/>
                                        <span class="lbl"></span></label>
							 </span>
                                    <input type="text" value="<?php echo $option; ?>" class="form-control custom-input" id="jq-validation-choice1" name="choice[]" placeholder="Required" />
                                    <span class="input-group-addon bg-danger no-border removeoption">
                                        <span class="bg-danger" href="javascript:void(0);" >
                                            <i class="fa fa-times"></i>
                                        </span>
                                    </span>
                                    <?php
                                }
                                else
                                {
                                    ?>
                                    <span class="input-group-addon custome-ans">
        								<label class="px-single">
                                            <input type="radio" name="qanswer" value="<?php echo $i; ?>" class="px"/><span class="lbl"></span></label>
        							 </span>
                                    <input type="text" value="<?php echo $option; ?>" class="form-control custom-input" id="jq-validation-choice1" name="choice[]" placeholder="Required">
                                    <?php
                                }
                                $i++;
                                ?>
								
							</div>
				       	</div>
                        <?php
                    }
                        
                    }else{
                       for($i=1;$i<5;$i++)
                        {
                        ?>
                                    <div class="form-group">
            							<label for="jq-validation-choice1" class="col-sm-3 control-label">Choice <span class="indexno"><?php echo $i; ?></span></label>
            							<div class="col-sm-9">
                                                <span class="input-group-addon custome-ans">
                    								<label class="px-single"><input type="radio" id="qanswer" name="qanswer" class="px" value="<?php echo $i-1; ?>"><span class="lbl"></span></label>
                    							 </span>
                                                <input type="text" class="form-control custom-input" name="choice[]" placeholder="Required" />
            							</div>
            				       	</div>
                                    <?php
                        } 
                    }    
                   
                        ?>
                          </div>                      

                        <div class="form-group">
                            <label class="col-sm-3 control-label"> </label>
                            <div class="col-sm-9">
                            <a id="addmoreoption" class="btn btn-outline btn-md btn-labeled">
                                <span class="btn-label icon fa fa-plus"></span>Add More Choices
                            </a>
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
      