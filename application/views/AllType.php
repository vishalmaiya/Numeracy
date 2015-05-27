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
                                    <?php
                                    $i = 1;
                                     foreach($alltypes as $type)
                                        {
                                            ?>
                                            <tr>
            									<td><?php echo $i++; ?></td>
            									<td><?php echo $type->type; ?></td>
            								</tr>
                                            <?php
                                            $subtypes = (array)$type->sub_type;
                                            if (!empty($subtypes))
                                            {
                                                foreach($type->sub_type as $subtype):
                                                ?>
                                                <tr>
                									<td></td>
         									        <td>- <?php echo $subtype->type; ?></td>
            								    </tr>
                                                <?php
                                                endforeach;
                                            }
                                        }
                                        ?>
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
						<button class="btn btn-primary">Submit</button>
					</div>
				</form>
<!-- /8. $BORDERED_FORM -->
			</div>
            </div>
    </div>
</div>