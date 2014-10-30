<div class=" row" style="padding:1% 0;">
	<div class="col-md-12">
	
		<a class="btn btn-primary pull-right"  href="<?php echo site_url('site/createproduct'); ?>"><i class="icon-plus"></i>Create </a> &nbsp; 
	</div>
	
</div>
<div class="row">
	<div class="col-lg-12">
		<section class="panel">
			<header class="panel-heading">
                Product Details
            </header>
            <?php 
//print_r($table);
            ?>
			<table class="table table-striped table-hover fpTable lcnp" cellpadding="0" cellspacing="0" width="100%">
			<thead>
				<tr>
					<!--<th>Id</th>-->
					<th>Product Name</th>
					<th>Alias</th>
					<th>Shop Name</th>
					<th>Meta Title</th>
					<th>Meta Description</th>
					<th>Stock</th>
					<th>EAN</th>
					<th>Tax</th>
					<th> Actions </th>
				</tr>
			</thead>
			<tbody>
			   <?php foreach($table as $row) { ?>
					<tr>
						<!--<td><?php echo $row->id;?></td>-->
						<td><?php echo $row->productname;?></td>
						<td><?php echo $row->alias;?></td>
						<td><?php echo $row->shopname;?></td>
						<td><?php echo $row->metatitle;?></td>
						<td><?php echo $row->metadescription;?></td>
						<td><?php echo $row->stock;?></td>
						<td><?php echo $row->ean;?></td>
						<td><?php echo $row->tax;?></td>
						
						<td>
							<a href="<?php echo site_url('site/editproduct?id=').$row->id;?>" class="btn btn-primary btn-xs">
								<i class="icon-pencil"></i>
							</a>
							<a href="<?php echo site_url('site/deleteproduct?id=').$row->id; ?>" class="btn btn-danger btn-xs">
								<i class="icon-trash "></i>
							</a> 
							
						</td>
					</tr>
					<?php } ?>
			</tbody>
			</table>
		</section>
	</div>
</div>