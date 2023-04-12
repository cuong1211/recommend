@extends('layout.frontend.index')
@section('content')
    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                <form action="#" id="form_add_order">
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <h6 class="checkout__title">Chi tiết đơn hàng</h6>
                            <input type="hidden" name="product_id" value="{{ $product }}">
                            @if ($user != null)
                                <input type="hidden" name="user_id" value="{{ $user->id }}">
                            @else
                                <input type="hidden" name="user_id" value="">
                            @endif
                            <div class="checkout__input">
                                <p>Họ và tên<span>*</span></p>
                                @if ($user != null)
                                    <input type="text" name="name" value="{{ $user->name }}">
                                @else
                                    <input type="text" name="name" value="">
                                @endif  
                            </div>
                            <div class="checkout__input">
                                <p>Địa chỉ<span>*</span></p>
                                <input type="text" class="checkout__input__add" name="address">
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Số điện thoại<span>*</span></p>
                                        <input type="number" name="phone">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Email<span>*</span></p>
                                        @if ($user != null)
                                            <input type="email" name="email" value="{{ $user->email }}">
                                        @else
                                            <input type="email" name="email" value="">
                                        @endif
                                    </div>
                                </div>

                            </div>

                            <div class="checkout__input">
                                <p>Ghi chú<span>*</span></p>
                                <textarea style="height: 168px; width: -webkit-fill-available" name="note"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h6 class="order__title">Đơn hàng của bạn</h6>
                                <div class="checkout__order__products">Sản phẩm <span>Số lượng</span></div>
                                <ul class="checkout__total__products">
                                    <li>{{ $name }}<span>{{ $quantity }}</span></li>
                                </ul>
                                <ul class="checkout__total__all">
                                    <li>Phí vận chuyển <span>50.000 VNĐ</span></li>
                                    <li>Tổng tiền
                                        <span>{{ number_format($total = $price * $quantity + 50000, 0, '.', '.') }} VNĐ</span></li>
                                </ul>
                                <input type="hidden" name="total" value="{{ $total }}">
                                <input type="hidden" name="soluong" id="soluong" value="{{ $quantity }}">
                                <input type="hidden" name="status" value="2">
                                <button type="submit" class="site-btn">Đặt hàng</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
@push('jscustom')
    <script>

        //hiển thị thông báo
        $('#form_add_order').on('submit', function(e) {
            e.preventDefault();
            let data = $(this).serialize(),
                type = 'POST',
                url = "{{ route('order.store') }}"
            console.log(data);
            $.ajax({
                url: url,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: type,
                data: data,
                success: function(data) {
                    console.log(data.type);
                    // console.log(data);
                    if (data.type == 'success') {
                        setTimeout(function() {
                            window.location.href = "{{ route('home') }}";
                        }, 1000);
                        var child = document.createElement('p');
                        child.textContent = "Đặt hàng thành công";
                        child.classList.add('alert', 'alert-success');
                        // Select the parent element based on its class name
                        var parent = document.querySelector('.parent');

                        // Add the child element to the parent element
                        parent.appendChild(child);
                    }else{
                        var child = document.createElement('p');
                        child.textContent = "Đặt hàng không thành công";
                        child.classList.add('alert', 'alert-dark');
                        // Select the parent element based on its class name
                        var parent = document.querySelector('.parent');
    
                        // Add the child element to the parent element
                        parent.appendChild(child);
    
                        setTimeout(function() {
    
    
                            const elementsToDelete = document.querySelectorAll(".alert");
    
                            // Loop through the NodeList and remove each element
                            elementsToDelete.forEach((element) => {
                                element.remove();
                            });
                        }, 1000)
                    }

                },
                error: function(data) {
                    let errors = data.responseJSON.errors;
                    console.log(errors);
                    $.each(errors, function(key, value) {
                        toastr[data.type](value, 'Error');
                    });

                }
            });
        });
    </script>
@endpush
