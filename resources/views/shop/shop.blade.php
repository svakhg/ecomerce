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
				</table>><hr>
				
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

	</div>
@stop