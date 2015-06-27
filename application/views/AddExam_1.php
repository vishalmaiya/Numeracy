<div id="content-wrapper">
        <div class="page-header">
			<h1><span class="text-light-gray"><a href="<?php site_url(); ?>all-exam">Test Manager</a>/ </span><a href="<?php echo site_url(); ?>add-exam" >Add New Test</a></h1>
		</div> <!-- / .page-header -->

		<div class="row">
			<div class="col-sm-12">
            <div class="panel-heading">
				<span class="panel-title"><a href="<?php echo site_url(); ?>add-exam1" >Add New Test (Type 1)</a></span>
			</div>
              <div class="panel-body">
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
                                <label for="tname" class="text-semibold text-md">Test Name</label>
                                <div  style="text-align: left;">
            	                   <input type="text" name="tname" <?php 
                                   if(isset($_POST['tname']))
                                   { echo "value='".$_POST['tname']."'";} else { echo "value=''"; } ?>  class="form-control" required=""/></label>
                               </div>
            				</div>
                    
                            <div class="form-group">
                            <label for="tquestions" class="text-semibold text-md" >Choose Question</label>
                            
                            <div class="choose_wrapper">
                            <table class="table">
							<thead>
								<tr>
                                    <th>#</th>
									<th>Question</th>
									<th>Type</th>
									<th>Subtype</th>
                                    <th>Difficulty Level</th>
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
                                                <td>
                                                    <select class="qtype" name="qtype_<?php echo $val->id; ?>">
                                                    <option>--Select Type--</option><?php
                                                    foreach($allparentrs as $type)
                                                    {
                                                        if ($_POST['qtype_'.$val->id] != "" && $_POST['qtype_'.$val->id] == $type->id)
                                                        {
                                                            echo "<option value='".$type->id."' selected>".$type->type."</option>";
                                                        }else
                                                        {
                                                             echo "<option value='".$type->id."'>".$type->type."</option>";
                                                        }
                                                    } ?></select>
                                                </td>
        										<td class="center">
                                                    <select class="jquery-select-subtype" name="qsubtype_<?php echo $val->id; ?>">
                                                    <option>-- SubType --</option>
                                                    <?php 
                                                    if($_POST['qtype_'.$val->id] != "" && $_POST['qtype_'.$val->id])
                                                    {
                                                        foreach($alltype as $stype)
                                                        {
                                                            if($stype->parent_id == $_POST['qtype_'.$val->id] )
                                                            {
                                                                if ($_POST['qsubtype_'.$val->id] != "" && $_POST['qsubtype_'.$val->id] == $stype->id)
                                                                {
                                                                    echo "<option value='".$stype->id."' selected>".$stype->type."</option>";
                                                                }
                                                                else
                                                                {
                                                                    echo "<option value='".$stype->id."'>".$stype->type."</option>";
                                                                }
                                                            }
                                                        }
                                                    }
                                                    
                                                    ?>
                                                    </select>
                                                </td>
        										<td class="center">
                                                    <select name="qdiff_<?php echo $val->id; ?>">
                                                    <option value="">-- Select --</option>
                                                    <?php
                                                    for($i=1;$i<10;$i++)
                                                    {
                                                        if ($_POST['qdiff_'.$val->id] != "" && $_POST['qdiff_'.$val->id] == $i)
                                                        {
                                                            echo "<option value='".$i."' selected>".$i."</option>";
                                                        }
                                                        else
                                                        {
                                                            echo "<option value='".$i."'>".$i."</option>";
                                                        }
                                                    }?>
                                                    </select>
                                                </td>
                                                
                                                
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
                                                <select class="qtype" name="qtype_<?php echo $val->id; ?>">
                                                <option>--Select Type--</option><?php
                                                foreach($allparentrs as $type)
                                                {
                                                    echo "<option value='".$type->id."'>".$type->type."</option>";
                                                } ?></select>
                                                </td>
        										<td class="center">
                                                <select class="jquery-select-subtype" name="qsubtype_<?php echo $val->id; ?>">
                                                <option>-- SubType --</option></select>
                                                </td>
        										<td class="center">
                                                <select name="qdiff_<?php echo $val->id; ?>">
                                                <option value="">-- Select --</option>
                                                <?php
                                                for($i=1;$i<10;$i++)
                                                {
                                                    echo "<option value='".$i."'>".$i."</option>";
                                                }?>
                                                </select>
                                                </td>
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
                                    <input type="hidden" name="test_type" value="1"/>
									<input type="submit" class="btn btn-primary" value="Add Test" />
                                    <input type="reset" class="btn btn-default" value="Cancel" />
								</div>
							</div>
						</form>
                 </div>    
			</div>
		</div>                    
 </div>          