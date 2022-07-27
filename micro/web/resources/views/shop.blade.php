@extends('layouts.main')
@section('content')

<section>
    <div class="container">
        @if (session('status') == true)
        <div class="alert alert-success">
            {{ session('msg') }}
        </div>
        @elseif (session('status') == true && session('status')!=null)
        <div class="alert alert-danger">
            {{ session('msg') }}
        </div>
        @endif
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Category</h2>
                    <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordian" href="#sportswear">
                                        <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                        Lorem Ipsum
                                    </a>
                                </h4>
                            </div>
                            <div id="sportswear" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <ul>
                                        <li><a href="">Lorem Ipsum 1 </a></li>
                                        <li><a href="">Lorem Ipsum 2 </a></li>
                                        <li><a href="">Lorem Ipsum 3 </a></li>
                                        <li><a href="">Lorem Ipsum 4</a></li>
                                        <li><a href="">Lorem Ipsum 5 </a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordian" href="#mens">
                                        <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                        Lorem Ipsum 1
                                    </a>
                                </h4>
                            </div>
                            <div id="mens" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <ul>
                                        <li><a href="">Lorem Ipsum 6</a></li>
                                        <li><a href="">Lorem Ipsum 7</a></li>
                                        <li><a href="">Lorem Ipsum 8</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordian" href="#womens">
                                        <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                        Lorem Ipsum 2
                                    </a>
                                </h4>
                            </div>
                            <div id="womens" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <ul>
                                        <li><a href="">Lorem Ipsum 9</a></li>
                                        <li><a href="">Lorem Ipsum 10</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="#">Lorem Ipsum 3</a></h4>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="#">Lorem Ipsum 4</a></h4>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="#">Lorem Ipsum 5</a></h4>
                            </div>
                        </div>
                    </div><!--/category-productsr-->

                    <div class="brands_products"><!--brands_products-->
                        <h2>Brands</h2>
                        <div class="brands-name">
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href=""> <span class="pull-right">(50)</span>Brand 1</a></li>
                                <li><a href=""> <span class="pull-right">(56)</span>Brand 2</a></li>
                                <li><a href=""> <span class="pull-right">(27)</span>Brand 3</a></li>
                                <li><a href=""> <span class="pull-right">(32)</span>Brand 4</a></li>
                            </ul>
                        </div>
                    </div><!--/brands_products-->

                    <div class="price-range"><!--price-range-->
                        <h2>Price Range</h2>
                        <div class="well">
                             <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
                             <b>$ 0</b> <b class="pull-right">$ 600</b>
                        </div>
                    </div><!--/price-range-->

                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">Features Items</h2>
                    @foreach ($product as $item)
                    <div class="col-sm-4">
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

                    <ul class="pagination">
                        <li class="active"><a href="">1</a></li>
                        <li><a href="">2</a></li>
                        <li><a href="">3</a></li>
                        <li><a href="">&raquo;</a></li>
                    </ul>
                </div><!--features_items-->
            </div>
        </div>
    </div>
</section>

@endsection
