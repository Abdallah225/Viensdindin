<?php include 'header_page.php';?>

<div class="container" style="margin-top: 90px;">
	<div class="row">
		<div class="col-lg-12">
			<h3 class="text-white"><?php echo get_phrase('Historique de payement');?></h3>
			<hr>
		</div>
		<div class="col-lg-12">
			<table class="table table-striped table-hover" style="color: #000;">
				<tbody>
					<tr style="background-color: rgb(243, 243, 243); color: #999; border-bottom: 1px solid #ddd;">
						<td><?php echo get_phrase('date');?></td>
						<td><?php echo get_phrase('package');?></td>
						<td><?php echo get_phrase('Période de service');?></td>
						<td><?php echo get_phrase('méthode de_payement');?></td>
						<td><?php echo get_phrase('total');?></td>
					</tr>
				</tbody>
			</table>
			<a href="<?php echo base_url();?>index.php?page/youraccount" class="btn btn-default"><?php echo get_phrase('Retour');?></a>
		</div>
	</div>
	<hr>
</div>


