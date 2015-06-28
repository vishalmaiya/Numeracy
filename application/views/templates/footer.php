	<div id="main-menu-bg"></div>
</div> <!-- / #main-wrapper -->

<!-- Get jQuery from Google CDN -->
<!--[if !IE]> -->
	<script type="text/javascript"> window.jQuery || document.write('<script src="<?php echo base_url();?>public/js/jquery.min.js">'+"<"+"/script>"); </script>
<!-- <![endif]-->
<!--[if lte IE 9]>
	<script type="text/javascript"> window.jQuery || document.write('<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js">'+"<"+"/script>"); </script>
<![endif]-->


<!-- LanderApp's javascripts -->
<script src="<?php echo base_url();?>public/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>public/js/landerapp.min.js"></script>


<!-- Jquery for validation  -->
<script type="text/javacsript" src="<?php echo base_url();?>public/js/jquery.js"></script>
<script type="text/javacsript" src="<?php echo base_url();?>public/js/jquery.validate.js"></script>


<script type="text/javascript">

jQuery('.qtype').on('change', function() {
   var parentid = jQuery(this).val();
    var tobj = jQuery(this);
                    var formData = {parent_id:parentid}; //Array 
                     
                        jQuery.ajax({
                            url : "<?php echo site_url(); ?>questions/ajaxget_subtype",
                            type: "POST",
                            data : formData,
                            success: function(data, textStatus, jqXHR)
                            {
                                var htmloption = '';
                                var count = 0;
                                var json = jQuery.parseJSON(data);
                                var count = json.length;
                                if(count > 0)
                                {
                                    htmloption = "<option>-- Select --</option>";
                                }
                                else
                                {
                                    htmloption = "<option disabled>-- No Subtype Available --</option>";
                                }
                                 $.each(json, function(index, element) {
                                 htmloption += '<option value="' + element.id+ '">' + element.type + '</option>';
                                  });
                                 tobj.closest('td').next('td').find(".jquery-select-subtype").html(htmloption);
                              //  $(this).find(".jquery-select-subtype").html(htmloption);
                            
                            
                            },
                            error: function (jqXHR, textStatus, errorThrown)
                            {
                         
                            }
                        });
    
});

	window.LanderApp.start(init);
    jQuery("#jquery-select-type").on("change",function(){

                    var parentid = jQuery(this).val();
                    var formData = {parent_id:parentid}; //Array 
                     
                        jQuery.ajax({
                            url : "<?php echo site_url(); ?>questions/ajaxget_subtype",
                            type: "POST",
                            data : formData,
                            success: function(data, textStatus, jqXHR)
                            {
                                var htmloption = '';
                                var count = 0;
                                var json = jQuery.parseJSON(data);
                                var count = json.length;
                                if(count > 0)
                                {
                                    htmloption = "<option>-- Select --</option>";
                                }
                                else
                                {
                                    htmloption = "<option disabled>-- No Subtype Available --</option>";
                                }
                                 $.each(json, function(index, element) {
                                 htmloption += '<option value="' + element.id+ '">' + element.type + '</option>';
                                  });
                                $('#jquery-select-subtype').html(htmloption);
                            
                            
                            },
                            error: function (jqXHR, textStatus, errorThrown)
                            {
                         
                            }
                        });
                    });
          $(document).ready(function(){
            $(".qdelete").click(function(){
                 if (confirm("Are you sure want to delete?")) {
                    return true;
                }
                return false;
            });
            
            $("#addmoreoption").click(function(){
                var indexnumber = $(".choices_wrapper .form-group").length +1;	
                if(indexnumber >= 10)
                {
                    jQuery("#addmorechoices").hide();
                }
                else
                {
                    jQuery("#addmorechoices").show();
                }
                var content = "<div class='form-group'><label for=\"jq-validation-choice4\" class=\"col-sm-3 control-label\">Choice <span class=\"indexno\">"+indexnumber+"</span></label>";
                    content += "<div class=\"col-sm-9\">";
                    content += "<span class=\"input-group-addon custome-ans\"><label class=\"px-single\">";
                    content += "<input type=\"radio\" name=\"qanswer\" class=\"px\" value='"+indexnumber+"'><span class=\"lbl\"></span></label></span>";
                    content += "<input type=\"text\" class=\"form-control custom-input\" id=\"jq-validation-choice4\" name=\"choice[]\" placeholder=\"Required\">";
                   // content += "";
                $(".choices_wrapper").append(content+ "<span class=\"input-group-addon bg-danger no-border removeoption\"><a class=\"bg-danger\" href='javascript:void(0);' ><i class=\"fa fa-times\"></i></a></span></div></div>"); 
            });
            $(document).on("click", ".removeoption" , function() {
                var indexnumber = $(".choices_wrapper .form-group").length;
                
                if(indexnumber > 10)
                {
                    jQuery("#addmorechoices").hide();
                }
                else
                {
                    jQuery("#addmorechoices").show();
                }
                $(this).closest(".form-group").remove();
                $( ".choices_wrapper .form-group .indexno" ).each(function( index ) {
                  console.log( ++index + ": " + $( this ).text() );
                $(this).text(index);
                });
            });
            
            jQuery(".choose_wrapper .sel_que").click(function(){ 
    
                if(this.checked) {
                 var selval = jQuery(this).closest("tr").addClass( "active_tupple" );
            } else {
                 var selval = jQuery(this).closest("tr").removeClass("active_tupple" );
            }
             });
        });
</script>

</body>
</html>