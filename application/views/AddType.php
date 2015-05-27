<?php
                 $attributes = array('class' => 'panel form-horizontal form-bordered', 'id' => 'jq-validation-form');
                 echo form_open('',$attributes); 
                 echo validation_errors();
                ?>
                    <div class="panel-heading">
						<span class="panel-title">Add Question Type</span>
					</div>
                    
					<div class="panel-body no-padding-hr">
						<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
                        <?php if(isset($message) && $message != "")
                        {
                            ?>
                            <div class="alert alert-success">Question Type Updated Successfully !</div>
                            <?php
                        }
                        ?>
                            
							<div class="row">
								<label class="col-sm-4 control-label">Name:</label>
								<div class="col-sm-8">
									<input type="text" name="qtype" class="form-control">
								</div>
							</div>
						</div>
						<div class="form-group no-margin-hr no-margin-b panel-padding-h">
							<div class="row">
								<label class="col-sm-4 control-label">Parent:</label>
								<div class="col-sm-8">
									<select class="form-control" id="jq-validation-difficulty" name="qparent">
										<option value="0">None</option>
                                        <?php foreach($alltypes as $type)
                                            {
                                                echo "<option value='".$type->id."'>".$type->type."</option>";
                                            }
                                        ?>
                                    </select>
								</div>
							</div>
						</div>
					</div>
					<div class="panel-footer text-right">
                        <input type="hidden" name="taction" value="addtype"/>
						<input type="submit" class="btn btn-primary" value="Submit"/>
					</div>
				</form>