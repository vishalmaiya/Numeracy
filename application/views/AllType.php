<div id="content-wrapper">

		<div class="page-header">
			<h1>Question Type</h1>
		</div> <!-- / .page-header -->

		<div class="row">
			<div class="col-sm-12">
            <div class="col-sm-6">
                   <div class="panel">
    					<div class="panel-heading">
    						<span class="panel-title">All Type / Sub Type</span>
    					</div>
    					<div class="panel-body">
    						<table class="table table-hover">
    							<thead>
    								<tr>
    									<th>#</th>
    									<th>Name</th>
    								</tr>
    							</thead>
    							<tbody>
    								<tr>
    									<td>1</td>
    									<td>Mark</td>
    								</tr>
                                    <tr>
    									<td>2</td>
    									<td>James</td>
    								</tr>
    							</tbody>
    						</table>
    					</div>
    				</div>
            </div>
            <div class="col-sm-6">

<!-- 8. $BORDERED_FORM =============================================================================

				Bordered form
-->
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
                            <div class="note note-info">Record Added Successfully !</div>
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
						</div>
					</div>
					<div class="panel-footer text-right">
						<button class="btn btn-primary">Submit</button>
					</div>
				</form>
<!-- /8. $BORDERED_FORM -->
			</div>
            </div>
    </div>
</div>