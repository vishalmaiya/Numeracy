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
	           <?php echo validation_errors(); ?>
                <div class="form-group">
                    <label for="jq-select-type" class="col-sm-3 control-label">Question Type</label>
                    
	                <div class="col-sm-9">
	                   <select id="jquery-select-type" class="form-control" name="qtype">
							<option></option>
							<optgroup label="Alaskan/Hawaiian Time Zone">
								<option value="1">Alaska</option>
								<option value="2">Hawaii</option>
							</optgroup>
							<optgroup label="Pacific Time Zone">
								<option value="CA">California</option>
								<option value="NV">Nevada</option>
								<option value="OR">Oregon</option>
								<option value="WA">Washington</option>
							</optgroup>
							<optgroup label="Mountain Time Zone">
								<option value="AZ">Arizona</option>
								<option value="CO">Colorado</option>
								<option value="ID">Idaho</option>
								<option value="MT">Montana</option>
								<option value="NE">Nebraska</option>
								<option value="NM">New Mexico</option>
								<option value="ND">North Dakota</option>
								<option value="UT">Utah</option>
								<option value="WY">Wyoming</option>
							</optgroup>
							<optgroup label="Central Time Zone">
								<option value="AL">Alabama</option>
								<option value="AR">Arkansas</option>
								<option value="IL">Illinois</option>
								<option value="IA">Iowa</option>
								<option value="KS">Kansas</option>
								<option value="KY">Kentucky</option>
								<option value="LA">Louisiana</option>
								<option value="MN">Minnesota</option>
								<option value="MS">Mississippi</option>
								<option value="MO">Missouri</option>
								<option value="OK">Oklahoma</option>
								<option value="SD">South Dakota</option>
								<option value="TX">Texas</option>
								<option value="TN">Tennessee</option>
								<option value="WI">Wisconsin</option>
							</optgroup>
							<optgroup label="Eastern Time Zone">
								<option value="CT">Connecticut</option>
								<option value="DE">Delaware</option>
								<option value="FL">Florida</option>
								<option value="GA">Georgia</option>
								<option value="IN">Indiana</option>
								<option value="ME">Maine</option>
								<option value="MD">Maryland</option>
								<option value="MA">Massachusetts</option>
								<option value="MI">Michigan</option>
								<option value="NH">New Hampshire</option>
								<option value="NJ">New Jersey</option>
								<option value="NY">New York</option>
								<option value="NC">North Carolina</option>
								<option value="OH">Ohio</option>
								<option value="PA">Pennsylvania</option>
								<option value="RI">Rhode Island</option>
								<option value="SC">South Carolina</option>
								<option value="VT">Vermont</option>
								<option value="VA">Virginia</option>
								<option value="WV">West Virginia</option>
							 </optgroup>
						     </select>
	                       </div>
						</div>
                        
                    <div class="form-group">
						<label for="jq-select-subtype" class="col-sm-3 control-label">SubType</label>
						<div class="col-sm-9">
	                       <select id="jquery-select-subtype" class="form-control" name="qsubtype">
							<option></option>
							<optgroup label="Alaskan/Hawaiian Time Zone">
								<option value="4">Alaska</option>
								<option value="5">Hawaii</option>
							</optgroup>
							<optgroup label="Pacific Time Zone">
								<option value="CA">California</option>
								<option value="NV">Nevada</option>
								<option value="OR">Oregon</option>
								<option value="WA">Washington</option>
							</optgroup>
							<optgroup label="Mountain Time Zone">
								<option value="AZ">Arizona</option>
								<option value="CO">Colorado</option>
								<option value="ID">Idaho</option>
								<option value="MT">Montana</option>
								<option value="NE">Nebraska</option>
								<option value="NM">New Mexico</option>
								<option value="ND">North Dakota</option>
								<option value="UT">Utah</option>
								<option value="WY">Wyoming</option>
							</optgroup>
							<optgroup label="Central Time Zone">
								<option value="AL">Alabama</option>
								<option value="AR">Arkansas</option>
								<option value="IL">Illinois</option>
								<option value="IA">Iowa</option>
								<option value="KS">Kansas</option>
								<option value="KY">Kentucky</option>
								<option value="LA">Louisiana</option>
								<option value="MN">Minnesota</option>
								<option value="MS">Mississippi</option>
								<option value="MO">Missouri</option>
								<option value="OK">Oklahoma</option>
								<option value="SD">South Dakota</option>
								<option value="TX">Texas</option>
								<option value="TN">Tennessee</option>
								<option value="WI">Wisconsin</option>
							</optgroup>
							<optgroup label="Eastern Time Zone">
								<option value="CT">Connecticut</option>
								<option value="DE">Delaware</option>
								<option value="FL">Florida</option>
								<option value="GA">Georgia</option>
								<option value="IN">Indiana</option>
								<option value="ME">Maine</option>
								<option value="MD">Maryland</option>
								<option value="MA">Massachusetts</option>
								<option value="MI">Michigan</option>
								<option value="NH">New Hampshire</option>
								<option value="NJ">New Jersey</option>
								<option value="NY">New York</option>
								<option value="NC">North Carolina</option>
								<option value="OH">Ohio</option>
								<option value="PA">Pennsylvania</option>
								<option value="RI">Rhode Island</option>
								<option value="SC">South Carolina</option>
								<option value="VT">Vermont</option>
								<option value="VA">Virginia</option>
								<option value="WV">West Virginia</option>
							    </optgroup>
    						  </select>
    						</div>
    	                   </div>
                        <div class="form-group">
								<label for="jq-validation-question" class="col-sm-3 control-label">Question</label>
								<div class="col-sm-9">
									<textarea class="form-control" name="question" id="jq-validation-question"></textarea>
								</div>
						</div>
                        
                        <div class="form-group">
								<label for="jq-validation-choice1" class="col-sm-3 control-label">Choice 1:</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="jq-validation-choice1" name="choice[]" placeholder="Required">
								</div>
						</div>
                        
                        <div class="form-group">
								<label for="jq-validation-choice2" class="col-sm-3 control-label">Choice 2:</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="jq-validation-choice1" name="choice[]" placeholder="Required">
								</div>
						</div>
                        
                        <div class="form-group">
								<label for="jq-validation-choice3" class="col-sm-3 control-label">Choice 3:</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="jq-validation-choice1" name="choice[]" placeholder="Required">
								</div>
						</div>
                        
                        <div class="form-group">
								<label for="jq-validation-choice4" class="col-sm-3 control-label">Choice 4:</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="jq-validation-choice4" name="choice[]" placeholder="Required">
								</div>
						</div>
                        
                        <div class="form-group">
								<label for="jq-validation-answer" class="col-sm-3 control-label">Answer: </label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="jq-validation-answer" name="answer" placeholder="Required">
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
      