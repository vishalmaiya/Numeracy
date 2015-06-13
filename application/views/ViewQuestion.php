<div id="content-wrapper">

        <div class="page-header">
            <h1><span class="text-light-gray"><a href="<?php echo site_url(); ?>all-questions">Question Bank<a>/ </span>
            View Question</h1>
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
                        <span class="panel-title">View Question</span>
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
            $attributes = array('class' => 'form-horizontal', 'id' => 'jq-validation-form');
            echo form_open('edit-question?qid='.$_GET['qid'],$attributes); ?>
            <!-- / Javascript -->
             
                   <div class="form-group">
                            <label for="jq-validation-question" class="col-sm-3 control-label">Question</label>
                            <div class="col-sm-9">
                                <div class="customelable">
                                    <label><?php echo $data->question; ?></label>

                                 </div>
                                
                            </div>
                    </div>
                    
                    <div class="choices_wrapper">   
                    <?php
                    
                    $i = 1;
                    $options = json_decode($data->option);
                    foreach($options as $option)
                    {
                        ?>
                        <div class="form-group">
                            <label for="jq-validation-choice1" class="col-sm-3 control-label">Choice <span class="indexno"><?php echo $i; ?></span></label>
                            <div class="col-sm-9">
                                

                            <?php
                            if ($i==$data->answer){

                            ?>
                             <div class="customelable" style="color:green;  text-decoration: underline;"  ><strong> <?php  echo  $option; ?> </strong></div>

                             <?php

                             } 
                             else{

                               ?> <div class="customelable"  ><strong> <?php  echo  $option; ?></strong></div> <?php
                             }

                            $i++;

                                 ?>


                            
                                
                            </div>
                        </div>
                        <?php
                    }?>
                    </div>
                    
                    <!-- <div class="form-group" id="addmorechoices">
                            <label class="col-sm-3 control-label"> </label>
                            <div class="col-sm-9">
                            <a id="addmoreoption" class="btn btn-outline btn-md btn-labeled" i>
                                <span class="btn-label icon fa fa-plus"></span>Add A Choice
                            </a>
                            </div>
                     </div>
                     
                       <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-9">
                                    <input type="hidden" name="qid" value="<?php echo $_GET['qid']; ?>"/>
                                    <input type="submit" class="btn btn-primary" value="Update Question" />
                                </div>
                            </div>
                        </form>
                    </div> -->
                </div>
<!-- /5. $JQUERY_VALIDATION -->


<!-- /10. $FORM_EXAMPLE -->

            </div>
        </div>
        
                           
 </div>
      