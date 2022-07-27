@extends('layouts.main')
@section('content')

<section>
    <div class="container">
        <div class="row">

            <div class="col-sm-12 padding-right">
                <div class="features_items">
                    <!--features_items-->
                    <h2 class="title text-center">Latest Items</h2>
                    @foreach ($product as $item)
                    <div class="col-sm-3">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <form action="{{ route('addCart') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="ProductId" value="{{ $item->id }}">
                                    <div class="productinfo text-center">
                                        <img src="images/product/{{ $item->img }}" alt="" />
                                        <h2>${{ $item->price }}</h2>
                                        <p>{{ $item->name }}</p>
                                        <button type="submit" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                        {{-- <a href="#" type="submit" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a> --}}
                                    </div>
                                    <div class="product-overlay">
                                        <div class="overlay-content">
                                            <h2>${{ $item->price }}</h2>
                                            <p>{{ $item->name }}</p>
                                            <button type="submit" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                            {{-- <a href="#" type="submit" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a> --}}
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="choose">
                                <ul class="nav nav-pills nav-justified">
                                    <li>
                                        <form action="{{ route('addWishlist') }}" method="post" id="formAdd">
                                            @csrf
                                            <input type="hidden" name="ProductId" value="{{ $item->id }}">
                                            <button type="submit" class="btn btn-sm btn-default" style="background: none;border:none;color: #B3AFA8;">
                                                <i class="fa fa-plus-square"></i> Add to wishlist
                                            </button>
                                            {{-- <a href="#">
                                            </a> --}}
                                        </form>
                                    </li>
                                    <li><a href="#"><i class="fa fa-eye"></i>view item</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>

                <!--features_items-->

            </div>
        </div>
    </div>
</section>

@endsection
