<div class="row" style="padding:1% 0">
	<div class="col-md-12">
		<div class="pull-right">
			<a href="<?php echo site_url('site/viewproduct'); ?>" class="btn btn-primary pull-right"><i class="icon-long-arrow-left"></i>&nbsp;Back</a>
		</div>
	</div>
</div>
<?php    // print_r($user);
//echo $user[1];
?>
<div class="row">
	<div class="col-lg-12">
	    <section class="panel">
		    <header class="panel-heading">
				 Product Details
			</header>
			<div class="panel-body">
			  <form class="form-horizontal tasi-form" method="post" action="<?php echo site_url('site/createproductsubmit');?>" enctype= "multipart/form-data">
	            
				
				
				
				<div class="form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Name</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="name" value="<?php echo set_value('name');?>">
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Alias</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="alias" value="<?php echo set_value('alias');?>">
				  </div>
				</div>
				
				
				<div class=" form-group">
				  <label class="col-sm-2 control-label">Shop</label>
				  <div class="col-sm-4">
					<?php
						
						echo form_dropdown('shop',$shop,set_value('shop'),'id="select4" class="chzn-select form-control"');
					?>
				  </div>
				</div>
				
	            <div class="form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Add Shop Navigation</label>
                      <div class="col-sm-4">
                      <?php 
                                    echo form_dropdown('shopnavigation[]', $shopnavigation,$shopnavigation,'id="select1" class="form-control populate placeholder " multiple="multiple"');

                                ?>

                      </div>
                      <div class="col-md-4">
                            <input type="checkbox" id="checkbox1" >Select All
                        </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Add Tags</label>
                      <div class="col-sm-4">
                      <?php 
                                    echo form_dropdown('tags[]', $tags,$tags,'id="select5" class="form-control populate placeholder " multiple="multiple"');

                                ?>

                      </div>
                      <div class="col-md-4">
                            <input type="checkbox" id="checkbox" >Select All
                        </div>
				</div>
				
	            <div class="form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Add Attribute</label>
                      <div class="col-sm-4">
                      <?php 
                                    echo form_dropdown('attribute[]', $attribute,$attribute,'id="select2" class="form-control populate placeholder " multiple="multiple"');

                                ?>

                      </div>
                      <div class="col-md-4">
                            <input type="checkbox" id="checkbox2" >Select All
                        </div>
				</div>
				
				<div class="form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Meta Title</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="metatitle" value="<?php echo set_value('metatitle');?>">
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Meta Description</label>
				  <div class="col-sm-4">
<!--				  <textarea name="description" form="usrform"  rows="20" cols="5"><?php echo set_value('description');?></textarea>-->
					<input type="text" id="normal-field" class="form-control" name="metadescription" value="<?php echo set_value('metadescription');?>">
				  </div>
				</div>

				
				<div class="form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Stock</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="stock" value="<?php echo set_value('stock');?>">
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label" for="normal-field">EAN</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="ean" value="<?php echo set_value('ean');?>">
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Tax</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="tax" value="<?php echo set_value('tax');?>">
				  </div>
				</div>
				
                    <div class=" form-group">
                        <label class="col-sm-2 control-label">Is Default</label>
                        <div class="col-sm-4">
                            <?php echo form_dropdown( 'isdefault',$isdefault,set_value( 'isdefault'), 'id="select3" class="form-control populate placeholder select2-offscreen"'); ?>
                        </div>
                    </div>
            
				<div class=" form-group">
				  <label class="col-sm-2 control-label">&nbsp;</label>
				  <div class="col-sm-4">
				  <button type="submit" class="btn btn-primary">Save</button>
				  <a href="<?php echo site_url('site/viewmall'); ?>" class="btn btn-secondary">Cancel</a>
				</div>
				</div>
			  </form>
			</div>
		</section>
	</div>
</div>
<!--
<script>
    $(document).ready(function() { 
$("#select5").select2();
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
    })
</script>
-->
<script>
    $(document).ready(function() {
        $("#select5").select2();
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
        
$("#select1").select2();
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
        $("#select2").select2();
$("#checkbox2").click(function(){
    if($("#checkbox2").is(':checked') ){
        $("#select2 > option").prop("selected","selected");
        $("#select2").trigger("change");
    }else{
        $("#select2 > option").removeAttr("selected");
         $("#select2").trigger("change");
     }
});

$("#button").click(function(){
       alert($("#select2").val());
});
    })
</script>
<!--
<script>
    $(document).ready(function() { 
$("#select2").select2();
$("#checkbox2").click(function(){
    if($("#checkbox2").is(':checked') ){
        $("#select2 > option").prop("selected","selected");
        $("#select2").trigger("change");
    }else{
        $("#select2 > option").removeAttr("selected");
         $("#select2").trigger("change");
     }
});

$("#button").click(function(){
       alert($("#select2").val());
});
    })
</script>-->
