@extends('frontend.main_master')
@section('content')
@section('title')
  Mycart Page
@endsection

    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="home.html">Home</a></li>
                    <li class='active'>My Cart</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->

    <div class="body-content">
        <div class="container">
            <div class="row ">
                <div class="shopping-cart">
                    <div class="shopping-cart-table ">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th class="cart-romove item">Product Image</th>
                        <th class="cart-description item">Product Name</th>
                        <th class="cart-product-name item">Product Color</th>
                        <th class="cart-edit item">Product Size</th>
                        <th class="cart-qty item">Quantity</th>
                        <th class="cart-sub-total item">Subtotal</th>
                        <th class="cart-total last-item">Removed</th>
                    </tr>
                </thead><!-- /thead -->
                <tbody id="cartPage">
                    
                </tbody>
            </table>
        </div>
    </div>			
    </div><!-- /.row -->
</div><!-- /.sigin-in-->
<br>
@include('frontend.body.brands')
</div>
@endsection