	    <section class="panel">
		    <header class="panel-heading">
				 Product Details
			</header>
			<?php 
//print_r($before);
            ?>
			<div class="panel-body">
			  <form class="form-horizontal tasi-form" method="post" action="<?php echo site_url('site/editproductsubmit');?>" enctype= "multipart/form-data">
				<input type="hidden" id="normal-field" class="form-control" name="id" value="<?php echo set_value('id',$before['product']->id);?>" style="display:none;">
				
				<div class="form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Name</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="name" value="<?php echo set_value('name',$before['product']->name);?>">
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Alias</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="alias" value="<?php echo set_value('alias',$before['product']->alias);?>">
				  </div>
				</div>
				
				
				<div class=" form-group">
				  <label class="col-sm-2 control-label">Shop</label>
				  <div class="col-sm-4">
					<?php
						
						echo form_dropdown('shop',$shop,set_value('shop',$before['product']->shop),'id="select4" class="chzn-select form-control"');
					?>
				  </div>
				</div>
				
	            <div class="form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Add Shop Navigation</label>
                      <div class="col-sm-4">
                      <?php 
                                    echo form_dropdown('shopnavigation[]', $shopnavigation,$selectedshopnavigation,'id="select1" class="form-control populate placeholder " multiple="multiple"');

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
                                    echo form_dropdown('tags[]', $tags,$selectedtags,'id="select5" class="form-control populate placeholder " multiple="multiple"');

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
                                    echo form_dropdown('attribute[]', $attribute,$selectedattribute,'id="select2" class="form-control populate placeholder " multiple="multiple"');

                                ?>

                      </div>
                      <div class="col-md-4">
                            <input type="checkbox" id="checkbox2" >Select All
                        </div>
				</div>
				
				<div class="form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Meta Title</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="metatitle" value="<?php echo set_value('metatitle',$before['product']->metatitle);?>">
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Meta Description</label>
				  <div class="col-sm-4">
<!--				  <textarea name="description" form="usrform"  rows="20" cols="5"><?php echo set_value('description');?></textarea>-->
					<input type="text" id="normal-field" class="form-control" name="metadescription" value="<?php echo set_value('metadescription',$before['product']->metadescription);?>">
				  </div>
				</div>

				
				<div class="form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Stock</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="stock" value="<?php echo set_value('stock',$before['product']->stock);?>">
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label" for="normal-field">EAN</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="ean" value="<?php echo set_value('ean',$before['product']->ean);?>">
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Tax</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="tax" value="<?php echo set_value('tax',$before['product']->tax);?>">
				  </div>
				</div>
				
				<div class=" form-group">
				  <label class="col-sm-2 control-label">&nbsp;</label>
				  <div class="col-sm-4">
				  <button type="submit" class="btn btn-primary">Save</button>
				  <a href="<?php echo site_url('site/viewshop'); ?>" class="btn btn-secondary">Cancel</a>
				</div>
				</div>
			  </form>
			</div>
		</section>
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