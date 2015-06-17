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
                echo form_open('edit-exam1?tid='.$_GET['tid'],$attributes); ?>
                            <div class="form-group">
                                <label for="tname" class="text-semibold text-md">Test Name</label>
                                <div  style="text-align: left;">
            	                   <input type="text" name="tname"value="<?php echo $data->name; ?>"  class="form-control" required=""/></label>
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
                                $ansdatas = json_decode($data->question_data);
                                        foreach($allquestions as $key=>$val)
                                        { 
                                            
                                            foreach($ansdatas as $adata)
                                            { 
                                            if($adata->qid == $val->id)
                                               {
                                                   $class = "active_tupple";
                                                    $chk = "checked"; 
                                                    break;
                                               }
                                               else
                                               {
                                                     $class = "";
                                                     $chk = "";
                                               }
                                            }
                                            ?>
                                            <tr class="<?php echo $class; ?>">
                                                <td><label class="px-single">
                                                    <input type="checkbox" class="sel_que" name="tquestions[]" value="<?php echo $val->id; ?>" <?php echo $chk; ?> />
                                                    <span class="lbl"></span>
                                                    </label>
                                                </td>
        										<td><?php echo $val->question;?></td>
                                                <td>
                                                
                                                    <select class="qtype" name="qtype_<?php echo $val->id; ?>">
                                                    <option>--Select Type--</option><?php
                                                  
                                                    foreach($allparentns as $type)
                                                    {
                                                          foreach($ansdatas as $adata)
                                                          {
                                                            if($adata->qid == $val->id && $adata->type == $type->id)
                                                            {
                                                                $seldata = "selected";
                                                                $temp_parent = $adata->type;
                                                                break;
                                                            }
                                                            else
                                                            {
                                                                $seldata = "";
                                                            }
                                                          }
                                                        echo "<option value='".$type->id."' $seldata>".$type->type."</option>";
                                                    }?>
                                                        </select>
                                                </td>
        										<td class="center">
                                                    <select class="jquery-select-subtype" name="qsubtype_<?php echo $val->id; ?>">
                                                    <option>-- SubType --</option>
                                                    <?php 
                                                        $allsub =  $this->questiontypemodel->get_sub_type($temp_parent);
                                                        foreach($allsub as $sub)
                                                        {
                                                            
                                                            foreach($ansdatas as $subdata)
                                                            {
                                                               if($subdata->qid == $val->id && $subdata->subtype == $sub->id)
                                                                {
                                                                    $seldata = "selected";
                                                                    break;
                                                                }
                                                                else
                                                                {
                                                                    $seldata = "";
                                                                }
                                                            }
                                                        echo "<option value='".$sub->id."' $seldata>".$sub->type."</option>";
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
                                                        foreach($ansdatas as $sdata)
                                                            {
                                                                if($sdata->qid == $val->id && $sdata->difficulty == $i)
                                                                {
                                                                    $seldata = "selected";
                                                                    break;
                                                                }
                                                                else
                                                                {
                                                                    $seldata = "";
                                                                }
                                                                
                                                            }
                                                            echo "<option value='".$i."' $seldata>".$i."</option>";
                                                    }?>
                                                    </select>
                                                </td>
                                                
                                                
        									</tr>
                                            <?php
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
                                    <input type="hidden" name="test_id" value="<?php echo $_GET['tid']; ?>"/>
									<input type="submit" class="btn btn-primary" value="Add Test" />
                                    <input type="reset" class="btn btn-default" value="Cancel" />
								</div>
							</div>
						</form>
                 </div>    
			</div>
		</div>                    
 </div>          