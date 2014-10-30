	    <section class="panel">
		    <header class="panel-heading">
				 User Details
			</header>
			<div class="panel-body">
			  <form class="form-horizontal tasi-form" method="post" action="<?php echo site_url('site/editusersubmit');?>">
				<input type="hidden" id="normal-field" class="form-control" name="id" value="<?php echo set_value('id',$before->id);?>" style="display:none;">
				<div class="form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Email</label>
				  <div class="col-sm-4">
					<?php echo $before->email; ?>
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label" for="normal-field">First Name</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="firstname" value="<?php echo set_value('firstname',$before->firstname);?>">
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Last Name</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="lastname" value="<?php echo set_value('lastname',$before->lastname);?>">
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label" for="description-field">Password</label>
				  <div class="col-sm-4">
					<input type="password" id="description-field" class="form-control" name="password" value="">
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label" for="description-field">Confirm Password</label>
				  <div class="col-sm-4">
					<input type="password" id="description-field" class="form-control" name="confirmpassword" value="">
				  </div>
				</div>
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Street Name</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="streetname" value="<?php echo set_value('streetname',$before->streetname);?>">
				  </div>
				</div>
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Area</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="area" value="<?php echo set_value('area',$before->area);?>">
				  </div>
				</div>
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">City</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="city" value="<?php echo set_value('city',$before->city);?>">
				  </div>
				</div>
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Pin Code</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="pincode" value="<?php echo set_value('pincode',$before->pincode);?>">
				  </div>
				</div>
				
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Contact</label>
				  <div class="col-sm-4">
					<input type="numeric" id="normal-field" class="form-control" name="contact" value="<?php echo set_value('contact',$before->contact);?>">
				  </div>
				</div>
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">State</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="state" value="<?php echo set_value('state',$before->state);?>">
				  </div>
				</div>
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">IP</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="ip" value="<?php echo set_value('ip',$before->ip);?>">
				  </div>
				</div>
				<div class="form-group">
                        <label class="col-sm-2 control-label" for="normal-field">Add Logins</label>
                          <div class="col-sm-4">
                          <?php 
                                        echo form_dropdown('logins[]', $logins,$selectedlogins,'id="select5" class="form-control populate placeholder " multiple="multiple"');

                                    ?>

                          </div>
                          <div class="col-md-4">
                            <input type="checkbox" id="checkbox" >Select All
                          </div>
                    </div>
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Loyalty Points</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="loyaltypoints" value="<?php echo set_value('loyaltypoints',$before->loyaltypoints);?>">
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label">Select Accesslevel</label>
				  <div class="col-sm-4">
					<?php  	 echo form_dropdown('accesslevel',$accesslevel,set_value('accesslevel',$before->accesslevel),'class="chzn-select form-control" 	data-placeholder="Choose a Accesslevel..."');
					?>
				  </div>
				</div>
				
				<div class="form-group">
				  <label class="col-sm-2 control-label">Status</label>
				  <div class="col-sm-4">
					<?php
						
						echo form_dropdown('status',$status,set_value('status',$before->status),'class="chzn-select form-control" 	data-placeholder="Choose a Accesslevel..."');
					?>
				  </div>
				</div>
				<div class="form-group">
                        <label class="col-sm-2 control-label" for="normal-field">Customer Of</label>
                          <div class="col-sm-4">
                          <?php 
                                        echo form_dropdown('shops[]', $shops,$selectedshops,'id="select1" class="form-control populate placeholder " multiple="multiple"');

                                    ?>

                          </div>
                          <div class="col-md-4">
                            <input type="checkbox" id="checkbox1" >Select All
                          </div>
                    </div>
				<div class=" form-group">
				  <label class="col-sm-2 control-label">&nbsp;</label>
				  <div class="col-sm-4">
				  <button type="submit" class="btn btn-primary">Save</button>
				  <a href="<?php echo site_url('site/viewusers'); ?>" class="btn btn-secondary">Cancel</a>
				</div>
				</div>
			  </form>
			</div>
		</section>
<script>
    $(document).ready(function() { 
//$("#e1").select2();
$("#checkbox").click(function(){
    if($("#checkbox").is(':checked') ){
        $("#select5 > option").prop("selected","selected");
        $("#select5").trigger("change");
    }else{
        $("#select5 > option").removeAttr("selected");
         $("#select5").trigger("change");
     }
});

$("#button").click(function(){
       alert($("#select5").val());
});
   $("#checkbox1").click(function(){
    if($("#checkbox1").is(':checked') ){
        $("#select1 > option").prop("selected","selected");
        $("#select1").trigger("change");
    }else{
        $("#select1 > option").removeAttr("selected");
         $("#select1").trigger("change");
     }
});

$("#button").click(function(){
       alert($("#select1").val());
});
    })
</script>