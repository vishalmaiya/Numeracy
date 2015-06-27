    <main>
            
            
            <div class="breadcrumbs">
                <div class="green darken-2 white-text">
                    
                    
                </div>
            </div>
            
            
            
<div class="row">
    <div class="col s12 offset-m3 m6">
        <div class="card">
            <div class="card-content">
                <span class="card-title black-text">Test 1</span></br></br></br>
                <div>
                    <span>
                        <?php echo $qdata->question; ?>
                    </span>
                </div>
                </br></br>

                <div >
                <?php 
                $attributes = array('class' => 'form-horizontal', 'id' => 'usertest');
                echo form_open('',$attributes);
                ?>
                 <form action="usertest" method="post" id="login-form">
                 <input type="hidden" name="que_id" value="<?php echo $qdata->id; ?>">
                  
                    <?php
                   foreach(json_decode($qdata->option) as $key=>$option)
                    {
                    ?>    
                    <p>
                      <input class="with-gap" name="answer" value="<?php echo $key; ?>" type="radio" id="<?php echo $qdata->id."_".$key; ?>" />
                      <label for="<?php echo $qdata->id."_".$key; ?>"><?php echo $option; ?></label>
                    </p>
                    <?php
                    }
                    ?>
                 </div> 
                    <div class="card-action right-align">
                    
                    <input type="hidden" name="submit_ans" value="submit_ans"/>
                    <button type="submit" class="btn btn-primary">Next</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

        </main>