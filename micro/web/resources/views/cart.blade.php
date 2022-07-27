@extends('layouts.main')
@section('content')

<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Shopping Cart</li>
            </ol>
        </div>

        @if (session('status') == true)
        <div class="alert alert-success">
            {{ session('msg') }}
        </div>
        @elseif (session('status') == true && session('status')!=null)
        <div class="alert alert-danger">
            {{ session('msg') }}
        </div>
        @endif
        <!-- Content -->

        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Item</td>
                        <td class="description"></td>
                        <td class="price">Price</td>
                        <td></td>
                    </tr>
                </thead>

                @php $subTotal = 0 @endphp
                @foreach ($cart as $item)
                <tbody>
                    <tr>
                        <td class="cart_product">
                            <a href=""><img src='images/product/{{ $item->img }}' height="150px" width="150px" alt=""></a>
                        </td>
                        <td class="cart_description">
                            <p style="visibility: hidden;"><a href="">{{ $item->productId }}</a></p>
                            <h4><a href="">{{ $item->name }}</a></h4>
                        </td>
                        <td class="cart_price">
                            <p>${{ $item->price }}</p>
                        </td>
                        <td class="cart_delete">
                            <form action="{{ url('cart/'.$item->id) }}" method="post">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="cart_quantity_delete">
                                    <i class="fa fa-times"></i>
                                </button>
                            </form>
                            {{-- <a class="cart_quantity_delete" href="/cart/id={{ $item->id }}"><i class="fa fa-times"></i></a> --}}
                        </td>
                    </tr>
                </tbody>
                @php $subTotal += $item->price @endphp
                @endforeach
            </table>
        </div>

        <!-- Content -->

    </div>
</section> <!--/#cart_items-->

<section id="do_action">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">

            </div>
            <div class="col-sm-6">
                <div class="total_area">
                    <ul>
                        <li>Cart Sub Total <span>${{ $subTotal }}</span></li>
                        <li>Shipping Cost <span>Free</span></li>
                        <li>Total <span>${{ $subTotal }}</span></li>
                    </ul>

                    <a class="btn btn-default check_out" href="{{ route('checkout') }}">Check Out</a>
                </div>

            </div>
        </div>
    </div>
</section><!--/#do_action-->

@endsection
