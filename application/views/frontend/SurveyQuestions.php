    <main>
            
            
            <div class="breadcrumbs">
                <div class="green darken-2 white-text">
                    
                    
                </div>
            </div>
            
            
         
<div class="row">
    <div class="col s12 offset-m3 m6">
        <div class="card">
            <div class="card-content">
                <span class="card-title black-text">Survey</span></br></br></br>
             
                    <?php 

                      foreach ($results as $res) { ?>


                    <div>
                      <span>
                         <p> <?php echo ($res->question); ?><p>
                      </span>

                    </div>

                    <div >
                      <?php  
                      $options = json_decode($res->option);
                      //print_r($options);

                      foreach ($options as $key=>$option) { ?>
                       
                        
                        <p>
                          <input class="with-gap" value="<?php echo ($res->id)."_".$key ; ?>" name="sque_<?php echo ($res->id); ?>" type="radio" id="sans_<?php echo $key; ?>" />
                          <label for="sans_<?php echo $key; ?>"><?php echo $option; ?></label>

                        </p>             



                        
                        
                     <?php } } ?> 


              


                <form action="usertest" method="post" id="login-form"><input type="hidden" name="csrfmiddlewaretoken" value="QEAMzFwrIqwU4Rv1gxuTdFD2czIiYJAv">
                                    
<div class="card-action center-align">
    <button type="submit" class="btn btn-primary">Submit</button>
</div>
                </form>
            </div>
        </div>
    </div>
</div>

        </main>

