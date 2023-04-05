@extends('layout.frontend.index')
@section('title', 'Sản phẩm')
@section('content')
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="breadcrumb__text">
                        <h2>Sản phẩm</h2>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="breadcrumb__links">
                        <a href="{{route('home')}}">Trang chủ</a>
                        <span>Sản phẩm</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Shop Section Begin -->
    <section class="shop spad">
        <div class="container">
            <div class="shop__option">
                <div class="row">
                    <div class="col-lg-7 col-md-7">
                        <div class="shop__option__search">
                            {{-- <form id="filter"
                                action="{{ route('frontend.category', ['category_id' => $category_id, 'id' => $id]) }}"
                                method="GET">
                                <input type="text" name="search" placeholder="Search">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </form>
                            <select>
                                @foreach ($type as $item)
                                    <a
                                        href="{{ route('frontend.category', ['category_id' => $category_id, 'id' => $item->id]) }}">
                                        <option value="{{ $item->id }}">
                                            {{ $item->name }}
                                        </option>
                                    </a>
                                @endforeach
                                
                                
                            </select> --}}
                        </div>
                    </div>
                    {{-- <div class="col-lg-5 col-md-5">
                        <div class="shop__option__right">
                            <select>
                                <option value="">Default sorting</option>
                                <option value="">A to Z</option>
                                <option value="">1 - 8</option>
                                <option value="">Name</option>
                            </select>
                            <a href="#"><i class="fa fa-list"></i></a>
                            <a href="#"><i class="fa fa-reorder"></i></a>
                        </div>
                    </div> --}}
                </div>
            </div>
            <div class="row">
                @foreach ($product_search as $item)
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="{{ route('image', ['id' => $item->img]) }}">
                                <div class="product__label">
                                    <span>
                                        @if (App\models\in_product::where('product_id', $item->id)->sum('quantity') == 0)
                                            Hết hàng
                                        @else
                                            Còn hàng
                                        @endif
                                    </span>
                                </div>
                            </div>
                            <div class="product__item__text">
                                <h6>{{ $item->name }}</h6>
                                <div class="product__item__price">{{ $item->price }} VNĐ</div>
                                @if (App\models\in_product::where('product_id', $item->id)->sum('quantity') == 0)
                                    <div class="cart_add">
                                        <div data-data="{{ $item }}" disabled>Hết
                                            hàng</div>
                                    </div>
                                @else
                                    <div class="cart_add">
                                        <a href="#" class="order" data-data="{{ $item }}">Đặt hàng</a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
            <div class="shop__last__option">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div>
                            {{ $product_search->render('pages.frontend.paginate') }}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- Shop Section End -->
    @include('pages.frontend.modal')
@endsection
@push('jscustom')
    <script>
        $(document).ready(function() {
            $('.order').click(function(e) {
                e.preventDefault();
                $('.detail').modal('show');
                var data = $(this).data('data');
                let modal = $('#form-product-detail');
                modal.find('#id-product').val(data.id);
                modal.find('input[name="name-product"]').val(data.name);
                modal.find('input[name="price-product"]').val(data.price);
                modal.find('#name-product').text(data.name);
                modal.find('#price-product').text(data.price);
                modal.find('#image-product').attr('src', "{{ route('image', '') }}" + '/' + data.img, );

            });
            $
        });
    </script>
@endpush
