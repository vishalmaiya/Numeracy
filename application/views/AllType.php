<div id="content-wrapper">

		<div class="page-header">
			<h1><a href="<?php echo site_url(); ?>question-type">Manage Question Type</a></h1>
		</div> <!-- / .page-header -->

		<div class="row">
			<div class="col-sm-12">
            <div class="col-sm-6">
                   <div class="panel">
    					<div class="panel-heading">
    						<span class="panel-title">Question Type - Sub Type</span>
    					</div>
    					<div class="panel-body">
    						<table class="table table-hover">
    							<thead>
    								<tr>
    									<th>#</th>
    									<th>Name</th>
                                        <th>Questions</th>
                                        <th>Action</th>
    								</tr>
    							</thead>
    							<tbody>
                                    <?php
                                    $i = 1;
                                    if(!empty($alltypes)){
                                     foreach($alltypes as $type)
                                        {
                                            $subtypes = $type->sub_type;
                                            ?>
                                            <tr>
            									<td><strong><?php echo $i++; ?></strong></td>
            									<td><strong><?php echo $type->type; ?></strong></td>
                                                <td></td>
                                                <td>
                                                <span style="float: left;">
                                                    <a href="<?php echo site_url(); ?>edit-type?tid=<?php echo $type->id; ?>" class="btn btn-labeled  btn-sm btn-outline">Edit</a>&nbsp;</span> 
                                                <?php if(empty($subtypes)): ?>
                                                 <span style="float: left;">
                                                  <form method="post" action="">
                                                        <input type="hidden" name="qtype" value="deltype"/>
                                                        <input type="hidden" name="tid" value="<?php echo $type->id; ?>"/>
                                                        <input type="submit" class="btn btn-danger btn-sm btn-outline qdelete" value="Delete"/>
                                                  </form>
                                                  </span>
                                                  <?php endif; ?>
                                        </td>
            								</tr>
                                            <?php
                                            if (!empty($subtypes))
                                            {
                                                foreach($type->sub_type as $subtype):
                                                ?>
                                                <tr>
                									<td></td>
         									        <td>- <?php echo $subtype->type; ?></td>
                                                    <td><?php echo $subtype->total_questions; ?></td>
                                                    <td>
                                                        <span style="float: left;">
                                                            <a href="<?php echo site_url(); ?>edit-type?tid=<?php echo $subtype->id; ?>" class="btn btn-labeled  btn-sm btn-outline">Edit</a>&nbsp;</span> 
                                                        <?php if($subtype->total_questions == 0): ?>
                                                        <span style="float: left;">
                                                        
                                                        <form method="post" action="">
                                                            <input type="hidden" name="qtype" value="deltype"/>
                                                            <input type="hidden" name="tid" value="<?php echo $subtype->id; ?>"/>
                                                            <input type="submit" class="btn btn-danger btn-sm btn-outline qdelete" value="Delete"/>
                                                         </form>
                                                         </span>
                                                         <?php endif; ?>
                                                  </td>
            								    </tr>
                                                <?php
                                                endforeach;
                                            }
                                        }
                                        }
                                        ?>
    							</tbody>
    						</table>
    					</div>
    				</div>
            </div>
            <div class="col-sm-6">

                    <?php 
                    if($content == "AddType")
                    {
                        include("Addtype.php");
                    }
                    if($content == "EditType")
                    {
                        include("Edittype.php");
                    }
                    ?>
			</div>
            </div>
    </div>
</div>