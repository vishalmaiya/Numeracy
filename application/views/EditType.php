<?php
                 $attributes = array('class' => 'panel form-horizontal form-bordered', 'id' => 'jq-validation-form');
                 $tid = $_GET['tid'];
                 echo form_open('edit-type?tid='.$tid,$attributes); 
                 echo validation_errors();
                ?>
                    <div class="panel-heading">
						<span class="panel-title">Update Question Type</span>
					</div>
                    
					<div class="panel-body no-padding-hr">
						<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
                        <?php if(isset($message) && $message != "")
                        {
                            ?>
                            <div class="alert alert-success">Question Type Updted Successfully !</div>
                            <?php
                        }
                        ?>
                            
							<div class="row">
								<label class="col-sm-4 control-label">Type:</label>
								<div class="col-sm-8">
                                    <input type="text" name="qtype" class="form-control" value="<?php echo $single_record[0]->type; ?>"/>
                                   
								</div>
							</div>
						</div>	
					</div>
					<div class="panel-footer text-right">
                        <input type="hidden" name="taction" value="edittype"/>
						<input type="submit" class="btn btn-primary" value="Update"/>
					</div>
				</form>