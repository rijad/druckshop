			<div class="rv-searchHead">
			@if(isset($details))
			<h2> The Search results for <b> {{ $query }} </b> are following:</h2>
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Product</th>
						</tr>
					</thead>
					<tbody>
						@foreach($details as $product)
						<tr>
							<td><a href = "{{route('product-information') }}#{{$product->title_english}}">{{$product->title_english}}</a></td>
						</tr>
						@endforeach
					</tbody>
				</table>	
			
			@elseif(isset($message))
				<h3>{{ $message }}</h3>
			@endif
			</div>