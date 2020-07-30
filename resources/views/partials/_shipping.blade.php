    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <div class="float-right">
        <form method="GET" action="{{ route('shipping-address.create') }}">
            <input type="button" class= "shipping-address-page-button" value="{{ trans('customer.create') }}" class="btn btn-primary" data-toggle="modal" data-target="#rv-Modal-shipping">
        </form>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>{{ trans('customer.sno') }}</th>
                        <th>{{ trans('customer.ship_add') }}</th>
                        <th>{{ trans('customer.action') }}</th>
                    </tr>
                </thead> 
                <tfoot>
                    <tr>
                        <th>{{ trans('customer.sno') }}</th>
                        <th>{{ trans('customer.ship_add') }}</th>
                        <th>{{ trans('customer.action') }}</th> 
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($shipping as $index => $ship)
                        <tr>
                            <td>{{ $index +1 }}</td>
                            <td>{{$ship->first_name .' '. $ship->last_name . 
                                ($ship->company_name == '' ? '': ", $ship->company_name")
                            .', '. $ship->street .' '. $ship->house_no .', '. $ship->zip_code 
                            .' '. $ship->city .', '. $ship->state}}
                            </td>
                            <td class="form-inline">
                                <form method="GET" action="{{ route('shipping-address.edit' , $ship->id) }}">
                                    <input type="button" value="{{ trans('customer.edit') }}" class="btn btn-success" data-toggle="modal" data-target="#rv-Modal-shipping-edit">
                                </form>
                                <form method="POST" action="{{ route('shipping-address.destroy' , $ship->id) }}"class="ml-2">
                                    @method('DELETE')
                                    @csrf
                                    <input type="submit" value="{{ trans('customer.delete') }}" class="btn btn-danger">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
<!-- Create Modal -->
<div class="modal fade rv-modalFormCustom" id="rv-Modal-shipping" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button> 
                <h4 class="modal-title">{{ trans('customer.add_ship_add') }}</h4>
            </div>
            <div class="modal-body">
                <div class="cart-form-shop w-100">
                    <form method = "POST" action="{{route('shipping-address.store')}}" id = "shippingForm">
                    @csrf
                        <div class="form-group"> 
                            <label for="text">{{ trans('customer.first_name') }}*</label>
                            <input type="text" class="form-control" placeholder="enter here" value="{{ old('first_name') }}" name="first_name" id="first_name">
                            <p class="error" id="error_first_name"></p>
                        </div>
                        <div class="form-group">
                          <label for="text">{{ trans('customer.last_name') }}*</label>
                          <input type="text"  class="form-control" placeholder="enter here" value="{{ old('last_name') }}" name="last_name" id="last_name">
                           <p class="error" id="error_last_name"></p>
                        </div>
                        <div class="form-group w-100">
                            <label for="text">{{ trans('customer.company') }}</label>
                            <input type="text"  class="form-control" placeholder="enter here" value="{{ old('company_name') }}" name = "company_name" id = "company_name">
                            <p class="error" id="error_company_name"></p>
                        </div>
                        <div class="form-group">
                            <label for="text">{{ trans('customer.street') }}*</label>
                            <input type="text"  class="form-control" placeholder="enter here" value="{{ old('street') }}" name = "street"  id = "street">
                            <p class="error" id="error_street"></p>
                        </div>
                        <div class="form-group">
                            <label for="text">{{ trans('customer.house_no') }}*</label>
                            <input type="text"  class="form-control" placeholder="enter here" value="{{ old('house_no') }}" name = "house_no" id = "house_no">
                            <p class="error" id="error_house_no"></p>
                        </div>
                        
                        <div class="form-group">
                            <label for="text">{{ trans('customer.zip_code') }}*</label>
                            <input type="text"  class="form-control" placeholder="Zip Code" value="{{ old('zip_code') }}" name="zip_code" id="zip_code">
                            <p class="error" id="error_zip_code"></p>
                        </div>
                        <div class="form-group">
                            <label for="text">{{ trans('customer.city') }}*</label>
                            <input type="text"  class="form-control" placeholder="enter here" value="{{ old('city') }}" name="city" id="city">
                            <p class="error" id="error_city"></p>
                        </div>
                        <div class="form-group">
                            <label for="text">{{ trans('customer.state') }}*</label>
                            <input type="text"  class="form-control" placeholder="enter here" value="{{ old('state') }}" name="state" id="state">
                            <p class="error" id="error_state"></p>
                        </div>
                        <div class="form-group">
                            <label for="text">{{ trans('customer.add_to_address') }}</label>
                            <input type="text"  class="form-control" placeholder="enter here" value="{{ old('addition') }}" name = "addition" id = "addition">
                            <p class="error" id="error_addition"></p>
                        </div>

                        <div class="text-right">
                            <button type= "submit" class="continue_btn">{{ trans('customer.add') }}</button>
                        </div>
                </form>
                </div>   
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade rv-modalFormCustom" id="rv-Modal-shipping-edit" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button> 
                <h4 class="modal-title">{{ trans('customer.edit_ship_add') }}</h4>
            </div>
            <div class="modal-body">
                <div class="cart-form-shop w-100">
                    <form method = "POST" action="{{route('shipping-address.update', (isset($ship->id)) ? $ship->id : 0  )}}" id = "shippingForm">
                    @method('PUT')
                    @csrf
                        <div class="form-group"> 
                            <label for="text">{{ trans('customer.first_name') }}*</label>
                            <input type="text" class="form-control" placeholder="enter here" value="{{ (isset($ship->first_name)) ? $ship->id :  '' }}" name="first_name" id="first_name">
                            <p class="error" id="error_first_name"></p>
                        </div> 
                        <div class="form-group">
                            <label for="text">{{ trans('customer.last_name') }}*</label>
                            <input type="text"  class="form-control" placeholder="enter here" value="{{ (isset($ship->last_name)) ? $ship->id :  ''  }}" name="last_name" id="last_name">
                            <p class="error" id="error_last_name"></p>
                        </div>
                        <div class="form-group w-100">
                            <label for="text">{{ trans('customer.company') }}</label>
                            <input type="text"  class="form-control" placeholder="enter here" value="{{ (isset($ship->company_name)) ? $ship->id :  '' }}" name = "company_name" id = "company_name">
                            <p class="error" id="error_company_name"></p>
                        </div>
                        <div class="form-group">
                            <label for="text">{{ trans('customer.street') }}*</label>
                            <input type="text"  class="form-control" placeholder="enter here" value="{{ (isset($ship->street)) ? $ship->id :  '' }}" name = "street"  id = "street">
                            <p class="error" id="error_street"></p>
                        </div>
                        <div class="form-group">
                            <label for="text">{{ trans('customer.house_no') }}*</label>
                            <input type="text"  class="form-control" placeholder="enter here" value="{{ (isset($ship->house_no)) ? $ship->id :  '' }}" name = "house_no" id = "house_no">
                            <p class="error" id="error_house_no"></p>
                        </div>
                        
                        <div class="form-group">
                            <label for="text">{{ trans('customer.zip_code') }}*</label>
                            <input type="text"  class="form-control" placeholder="Zip Code" value="{{ (isset($ship->zip_code)) ? $ship->id :  '' }}" name="zip_code" id="zip_code">
                            <p class="error" id="error_zip_code"></p>
                        </div>
                        <div class="form-group">
                            <label for="text">{{ trans('customer.city') }}*</label>
                            <input type="text"  class="form-control" placeholder="enter here" value="{{ (isset($ship->city)) ? $ship->id :  '' }}" name="city" id="city">
                            <p class="error" id="error_city"></p>
                        </div>
                        <div class="form-group">
                            <label for="text">{{ trans('customer.state') }}*</label>
                            <input type="text"  class="form-control" placeholder="enter here" value="{{ (isset($ship->state)) ? $ship->id :  '' }}" name="state" id="state">
                            <p class="error" id="error_state"></p>
                        </div>
                        <div class="form-group">
                            <label for="text">{{ trans('customer.add_to_address') }}</label>
                            <input type="text"  class="form-control" placeholder="enter here" value="{{ (isset($ship->addition)) ? $ship->id :  '' }}" name = "addition" id = "addition">
                            <p class="error" id="error_addition"></p>
                        </div>

                        <div class="text-right">
                            <button type= "submit" class="continue_btn">{{ trans('customer.update') }}</button>
                        </div>
                </form>
                </div>   
            </div>
        </div>
    </div>
</div>
