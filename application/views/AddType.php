            <div class="panel-heading">
						<span class="panel-title">Add Question Type</span>
            </div>
                    
             <div class="panel-body">
						<ul id="uidemo-tabs-default-demo" class="nav nav-tabs">
							<li class="active">
								<a href="#uidemo-tabs-default-demo-main" data-toggle="tab">Add Main Type</a>
							</li>
							<li class="">
								<a href="#uidemo-tabs-default-demo-subtype" data-toggle="tab">Add Subtype</a>
							</li>
						</ul>

						<div class="tab-content">
							<div class="tab-pane fade active in" id="uidemo-tabs-default-demo-main">
								   <?php
                 $attributes = array('class' => 'panel form-horizontal form-bordered', 'id' => 'jq-validation-form');
                 echo form_open('',$attributes); 
                 ?>    
					<div class="panel-body no-padding-hr">
						<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
                         <?php if(isset($err) && $err != ''): ?>
                    <div class="alert alert-danger">
							<button type="button" class="close" data-dismiss="alert">X</button>
							<?php echo validation_errors(); ?>
                    </div>
                   <?php endif; ?> 
                        <?php if(isset($message) && $message != "")
                        {
                            ?>
                            <div class="alert alert-success">Question Type Added Successfully !</div>
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
					<div class="panel-footer text-right">
                        <input type="hidden" name="qparent" value="0"/>
                        <input type="hidden" name="taction" value="addtype"/>
						<input type="submit" class="btn btn-primary" value="Submit"/>
					</div>
				</form>
							</div> <!-- / .tab-pane -->
							<div class="tab-pane fade" id="uidemo-tabs-default-demo-subtype">
								   <?php
                 $attributes = array('class' => 'panel form-horizontal', 'id' => 'jq-validation-form');
                 echo form_open('',$attributes); 
                  $err = validation_errors();
                ?>
					<div class="panel-body no-padding-hr">
						<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
                        <?php if(isset($err) && $err != ''): ?>
                    <div class="alert alert-danger">
							<button type="button" class="close" data-dismiss="alert">X</button>
							<?php echo validation_errors(); ?>
                    </div>
                   <?php endif; ?> 
                        <?php if(isset($message) && $message != "")
                        {
                            ?>
                            <div class="alert alert-success">Question Type Added Successfully !</div>
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
							</div> <!-- / .tab-pane -->
						</div> <!-- / .tab-content -->
					</div>
                 
                    
                    
