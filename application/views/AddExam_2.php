<div id="content-wrapper">
        <div class="page-header">
			<h1><span class="text-light-gray"><a href="<?php site_url(); ?>all-exam">Test Manager</a>/ </span><a href="<?php echo site_url(); ?>add-exam" >Add New Test</a></h1>
		</div> <!-- / .page-header -->

		<div class="row">
			<div class="col-sm-12">
            <div class="panel-heading">
				<span class="panel-title"><a href="<?php echo site_url(); ?>add-exam2" >Add New Test (Type 2)</a></span>
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
    				     <?php echo $message; ?>
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
                            <div class="choose_wrapper">
                            	<script>
					init.push(function () {
						$('#jq-datatables').dataTable({ "bPaginate": false,});
						$('#jq-datatables_wrapper .table-caption').text('Choose Question');
						$('#jq-datatables_wrapper .dataTables_filter input').attr('placeholder', 'Search...');
					});
				</script>
                
                           
                            <table class="table table-bordered jq-datatables" id="jq-datatables">
							<thead>
								<tr>
                                    <th>#</th>
									<th>Question</th>
                                    <th>Type</th>
                                    <th>Sub Type</th>
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
                                                <td><?php 
                                                foreach($alltype as $typ)
                                                {
                                                    if($typ->id ==$val->type)echo $typ->type; 
                                                } ?></td>
                                                <td><?php foreach($alltype as $typ)
                                                {
                                                    if($typ->id ==$val->subtype)echo $typ->type; 
                                                } ?></td>
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
                                                	<td>
                                                <?php 
                                                foreach($alltype as $typ)
                                                {
                                                    if($typ->id ==$val->type)echo $typ->type; 
                                                } ?></td>
                                                <td><?php foreach($alltype as $typ)
                                                {
                                                    if($typ->id ==$val->subtype)echo $typ->type; 
                                                } ?></td>
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
                                     <input type="hidden" name="test_type" value="2"/>
									<input type="submit" class="btn btn-primary" value="Add Test" />
                                    <input type="reset" class="btn btn-default" value="Cancel" />
								</div>
							</div>
						</form>
                        
    </div>    
			</div>
		</div>                    
 </div>          