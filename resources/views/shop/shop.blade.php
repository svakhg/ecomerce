@extends('Plantilla.principal')
@section('content')
	<div class="container text-center">
		<div class="page-header">
		  <h1><i class="fa fa-shopping-cart"></i> Carrito de compras</h1>
		</div>

		<div class="table-cart">
			@if(count($cart))

			<p>
				<a href="/cart/clear" class="btn btn-danger">
					Vaciar carrito <i class="fa fa-trash"></i>
				</a>
			</p>

			<div class="table-responsive">
				<table class="table table-striped table-hover table-bordered">
				    <thead>
				        <tr>
				            <th>Producto</th>
				            <th>Cantidad</th>
				            <th>Precio</th>
				            <th>Subtotal</th>
				        </tr>
				    </thead>

				    <tbody>

				        <?php foreach(Cart::content() as $row) :?>

				            <tr>
				                <td>
				                    <p><strong><?php echo $row->name; ?></strong></p>
				                    <p><?php echo ($row->options->has('size') ? $row->options->size : ''); ?></p>
				                </td>
				                <td>
				                	<a href="/cart/delete/<?php echo $row->rowId;?>" class="btn btn-danger">
										<i class="fa fa-remove"></i>
									</a>
				                	<input type="number"
										min="1"
										max="100"
										id="product_<?php echo $row->rowId; ?>"
										value="<?php echo $row->qty; ?>">
				                	<a
										href="#"
										class="btn btn-warning btn-update-item"
										data-href="#"
										data-id="<?php echo $row->rowId;?>"
									>
									<i class="fa fa-refresh"></i></a>
								</td>
				                <td>$<?php echo $row->price; ?></td>
				                <td>$<?php echo $row->total; ?></td>
				            </tr>

				        <?php endforeach;?>

				    </tbody>

				    <tfoot>
				        <tr>
				            <td colspan="2">&nbsp;</td>
				            <td>Subtotal</td>
				            <td><?php echo Cart::subtotal(); ?></td>
				        </tr>
				        <tr>
				            <td colspan="2">&nbsp;</td>
				            <td>Total</td>
				            <td><?php echo Cart::total(); ?></td>
				        </tr>
				    </tfoot>
				</table><hr>

				<h3>
					<span class="label label-success">

					</span>
				</h3>

			</div>
			@else
				<h3><span class="label label-warning">No hay productos en el carrito :(</span></h3>
			@endif
			<hr>
			<p>
				<a href="/" class="btn btn-primary">
					<i class="fa fa-chevron-circle-left"></i> Seguir comprando
				</a>

				<a href="{{route('payment')}}" class="btn btn-primary">
				 Pagar con Paypal <i class="fa fa-chevron-circle-right"></i>
				</a>
				<a href="/test" class="btn btn-primary">
				 Pagar con Tarjeta de credio o debito <i class="fa fa-chevron-circle-right"></i>
				</a>
			</p>
		</div>

	</div><br><br><br>



	<div class="container">
		<div class="row col-md-12  custyle">
			<table class="table custab">
				<thead>
					<tr>
						<th class="text-center">Action</th>
						<th class="text-center">Producto</th>
						<th class="text-center">Cantidad</th>
						<th class="text-center">Image</th>
						<th class="text-center">Total</th>
						<th class="text-center">Subtotal</th>

					</tr>
				</thead>

		{{-- INICIO PRIMERA FILA --}}
				<tr class="rowcart-style">
					<td class="tdCart-style text-center" >
						<a href="/cart/delete/" class="btn btn-danger">
							<i class="fa fa-remove"></i>
						</a>

						<a
						href="#"
						class="btn btn-warning btn-update-item"
						data-href="#"
						data-id=""
						>
						<i class="fa fa-refresh"></i></a></td>
						<td class="tdCart-style text-center" >Báscula</td>
						<td class="tdCart-style text-center" ><div class="row">
							<div class="col-md-12">
								<div class="input-group number-spinner">
									<span class="input-group-btn">
										<button class="btn btn-default" data-dir="dwn"><span class="glyphicon glyphicon-minus"></span></button>
									</span>
									<input type="text" class="form-control text-center" value="1">
									<span class="input-group-btn">
										<button class="btn btn-default" data-dir="up"><span class="glyphicon glyphicon-plus"></span></button>
									</span>
								</div>
							</div>
						</div></td>
						<td class="tdCart-style text-center"  class="text-center">
							<div class="col-md-12">
								<div class="row">

									<div class="col-xs-12  col-sm-12 col-md-12 col-wpading" style="height:100%;background-color:white">
										<div class="" style="height:100%;width:100%;text-align:center">
											<img src="/img/torrey.png" class="img-responsive img-fit img-thumbnail" alt="">


										</div>

									</div>

								</div>


							</div>
						</td>
						<td class="tdCart-style text-center" >$1231.00</td>
						<td class="tdCart-style text-center" >$12345.00</td>
					</tr>
		{{-- FIN PRIMERA FILA --}}



					<tr class="rowcart-style">
						<td class="tdCart-style text-center" >
							<a href="/cart/delete/" class="btn btn-danger">
							<i class="fa fa-remove"></i>
						</a>

						<a
						href="#"
						class="btn btn-warning btn-update-item"
						data-href="#"
						data-id=""
						>
						<i class="fa fa-refresh"></i></a></td>
						<td class="tdCart-style text-center" >Products</td>
						<td class="tdCart-style text-center" >
							<div class="row">
								<div class="col-md-12">
									<div class="input-group number-spinner">
										<span class="input-group-btn">
											<button class="btn btn-default" data-dir="dwn"><span class="glyphicon glyphicon-minus"></span></button>
										</span>
										<input type="text" class="form-control text-center" value="1">
										<span class="input-group-btn">
											<button class="btn btn-default" data-dir="up"><span class="glyphicon glyphicon-plus"></span></button>
										</span>
									</div>
								</div>
							</div>
						</td>
					</td>
					<td class="tdCart-style text-center"  class="text-center">
						<div class="col-md-12">
							<div class="row">

								<div class="col-xs-12  col-sm-12 col-md-12 col-wpading" style="height:100%;background-color:white">
									<div class="" style="height:100%;width:100%;text-align:center">
										<img src="/img/torrey.png" class="img-responsive img-fit img-thumbnail" alt="">


									</div>

								</div>

							</div>


						</div>
					</td>						<td class="tdCart-style text-center" >$1231.00</td>
					<td class="tdCart-style text-center" >$12345.00</td>
					</tr>
					<tr class="rowcart-style">
						<td class="tdCart-style text-center" >
							<a href="/cart/delete/" class="btn btn-danger">
								<i class="fa fa-remove"></i>
							</a>

							<a
							href="#"
							class="btn btn-warning btn-update-item"
							data-href="#"
							data-id=""
							>
							<i class="fa fa-refresh"></i></a>
						</td>
						<td class="tdCart-style text-center" >Blogs</td>
						<td class="tdCart-style text-center" >
							<div class="row">
								<div class="col-md-12">
									<div class="input-group number-spinner">
										<span class="input-group-btn">
											<button class="btn btn-default" data-dir="dwn"><span class="glyphicon glyphicon-minus"></span></button>
										</span>
										<input type="text" class="form-control text-center" value="1">
										<span class="input-group-btn">
											<button class="btn btn-default" data-dir="up"><span class="glyphicon glyphicon-plus"></span></button>
										</span>
									</div>
								</div>
							</div>
						</td>
					</td>
					<td class="tdCart-style text-center"  class="text-center">
						<div class="col-md-12">
							<div class="row">

								<div class="col-xs-12  col-sm-12 col-md-12 col-wpading" style="height:100%;background-color:white">
									<div class="" style="height:100%;width:100%;text-align:center">
										<img src="/img/testimg3.jpg" class="img-responsive img-fit img-thumbnail" alt="">


									</div>

								</div>

							</div>


						</div>
					</td>						<td class="tdCart-style text-center" >$1231.00</td>
					<td class="tdCart-style text-center" >$12345.00</td>
					</tr>

				</table>
			</div>
		</div>
		<br><br><br><br><br>

	<style>

	.rowcart-style{
		height: 90px;


	}
	.tdCart-style{
		vertical-align: middle !important;
		max-width: 60px;
		font-weight: bold;

	}

	.custab{
    /*border: 1px solid #ccc;*/
    padding: 5px;
    margin: 0 auto;
    box-shadow: 3px 3px 2px #ccc;
    transition: 0.5s;
	border-radius: 5px;
    }
/*.custab:hover{
    box-shadow: 3px 3px 0px transparent;
    transition: 0.5s;
    }*/
	#cart-table {
		font-family: arial, sans-serif;
		border-collapse: collapse;
		width: 100%;
		border-radius: 20px;
	}

	td, th {
		/*border: 1px solid #dddddd;*/
		padding: 8px;

	}

	tr:nth-child(even) {
		background-color: white;
	}
	</style>
	<script>
	$(document).on('click', '.number-spinner button', function () {
		var btn = $(this),
		oldValue = btn.closest('.number-spinner').find('input').val().trim(),
		newVal = 0;

		if (btn.attr('data-dir') == 'up') {
			newVal = parseInt(oldValue) + 1;
		} else {
			if (oldValue > 1) {
				newVal = parseInt(oldValue) - 1;
			} else {
				newVal = 1;
			}
		}
		btn.closest('.number-spinner').find('input').val(newVal);
	});

	</script>
@stop
