<div class="row">
	<div class="col-lg-12">
	    <section class="panel">
		    <header class="panel-heading">
				 Topic Details
			</header>
			<div class="panel-body">
				<form class="form-horizontal row-fluid" method="post" action="<?php echo site_url('site/createoffersubmit');?>" enctype= "multipart/form-data">
					<div class="form-group">
						<label class="col-sm-2 control-label">Header</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="header" value="<?php echo set_value('header');?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Description</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="description" value="<?php echo set_value('description');?>">
						</div>
					</div>		
					
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">From</label>
				  <div class="col-sm-4">
					<input type="text" id="dp1" class="form-control" name="from" value="<?php echo set_value('from');?>">
				  </div>
				</div>
				
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">To</label>
				  <div class="col-sm-4">
					<input type="text" id="dp2" class="form-control" name="to" value="<?php echo set_value('to');?>">
				  </div>
				</div>
				
					<div class="form-group">
						<label class="col-sm-2 control-label">Brand</label>
						<div class="col-sm-4">
						   <?php 
								echo form_dropdown('brand',$brand,set_value('brand'),'id="select2" onChange="changestore()" class="form-control populate placeholder select2-offscreen"');
								 
							?>
						</div>
					</div>
					
					<div id="store" class="form-group">
                <label class="col-sm-2 control-label">Store Name</label>
                <div class="col-sm-4">
                    </div></div>
				
					<div class="form-group">
						<label class="col-sm-2 control-label">&nbsp;</label>
						<div class="col-sm-4">	
							<button type="submit" class="btn btn-info">Submit</button>
						</div>
					</div>
				</form>
			</div>
		</section>
    </div>
</div>
<script>
                    function changestore(){
                       //alert($('#select3').val());
                        
                        $.get( 
                             "<?php echo base_url(); ?>index.php/site/getstore/"+$('#select2').val(),
                             { id: "123" },
                             function(data) {
                             //  alert(data);
                                $("#store").html(data);
                             }

                          );
                        
                        }
//     
//                    function changechp(){
//                        alert($('#select1').val());
//                    $.get( 
//                             "<?php echo base_url(); ?>index.php/center/getchapter/"+$('#select1').val(),
//                             { id: "123" },
//                             function(data) {
//                             //  alert(data);
//                                $("#chapter").html(data);
//                             }
//
//                          );
//                    
//                    }
 </script>