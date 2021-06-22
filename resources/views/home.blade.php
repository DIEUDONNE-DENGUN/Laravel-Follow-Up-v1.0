@extends("layout.master")
@section("content")

    {{--define a div for the add product form--}}
    <div class=" row" id="product_form">
        <div class="col-md-3"></div>
        {{--add product form panel--}}
        <div class="col-md-8">
            <div class="panel panel-primary ">
                <div class="panel-heading">
                    <h3 class="panel-title text-center">Add a new product to the catalogue</h3>
                </div>
                <div class="panel-body">
                    {{--error div to display error for the add product action--}}
                    <div class="alert alert-danger" style="display: none;" id="error_general_msg">
                        <p>Please fill all the fields before saving the product </p>
                    </div>

                    <form class="form" id="add-product-form">
                        <div class="form-group mb-3">
                            <label for="username">Product Name</label>
                            <input type="text" id="product_name" name="username" class="form-control"
                                   placeholder="Enter a product name">
                        </div>
                        <div class="form-group mb-3">
                            <label for="password">Product Quantity</label>
                            <input type="number" id="product_qty" name="username" class="form-control"
                                   placeholder="Enter the quantity available">
                        </div>

                        <div class="form-group mb-3">
                            <label for="password">Price per Product</label>
                            <input type="number" id="product_price" name="username" class="form-control"
                                   placeholder="Enter price for the product in USD ">
                        </div>
                        <div class="form-group mb-3">
                            <button type="button" onclick="add_product()" class="btn btn-primary">Save Product</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
    {{--Display Product list for added products--}}
    <div class="row" id="product_list">
        <div class="col-md-3"></div>
        <div class="col-md-8 panel panel-primary">
            <div class="panel-body">
                <div class=" table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Product Name</th>
                            <th>Product Quantity</th>
                            <th>Product Price/USD</th>
                            <th>Product Date Submitted</th>
                            <th>Total value number</th>
                        </tr>
                        </thead>
                        <tbody id="product_list_body">
                        @if($products->count()>0)
                            @php $counter=0; $total_value_number=0; @endphp
                            @foreach($products as $product)
                                @php
                                    $product_value_number=$product->product_quantity*$product->product_price ;
                                    $total_value_number +=$product_value_number;
                                @endphp
                                <tr>
                                    <td>{{++$counter}}</td>
                                    <td>{{$product->product_name}}</td>
                                    <td>{{$product->product_price}}</td>
                                    <td>{{$product->product_date}}</td>
                                    <td>{{$product_value_number}}</td>
                                    <td>{{$product_value_number}}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="4">Total Value Numbers</td>
                                <td>{{$total_value_number}}</td>
                            </tr>
                        @else
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
@stop
{{--include custom javascript file handling production submission and saving--}}
@section('scripts')
    <script src="{{ asset('js/products/manage_products.js') }}"></script>
@stop
