	    <section class="panel">
		    <header class="panel-heading">
				 User Details
			</header>
			<div class="panel-body">
			  <form class="form-horizontal tasi-form" method="post" action="<?php echo site_url('site/editcompanysubmit');?>">
				<input type="hidden" id="normal-field" class="form-control" name="id" value="<?php echo set_value('id',$before->id);?>" style="display:none;">
				
				<div class="form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Name</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="name" value="<?php echo set_value('name',$before->name);?>">
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
                    <div class="form-group">
						<label class="col-sm-2 control-label">User</label>
						<div class="col-sm-4">
						   <?php 
								echo form_dropdown('user',$user,set_value('user',$before->user),'id="select3" class="form-control populate placeholder select2-offscreen"');
								 
							?>
						</div>
					</div>
				<div class=" form-group">
				  <label class="col-sm-2 control-label">&nbsp;</label>
				  <div class="col-sm-4">
				  <button type="submit" class="btn btn-primary">Save</button>
				  <a href="<?php echo site_url('site/viewcompany'); ?>" class="btn btn-secondary">Cancel</a>
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