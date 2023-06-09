<div class="modal fade detail bd-example-modal-lg" id="exampleModalCenter">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <form action="{{route('cart.checkout')}}" id="form-product-detail">
                <div class="modal-body">
                    <section class="">
                        <div class="container">
                            <input type="hidden" name="id-product" id="id-product">
                            <input type="hidden" name="name-product">
                            <input type="hidden" name="price-product">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="product__details__img">
                                        <div class="product__details__big__img">
                                            <img class="big_img" id="image-product">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="product__details__text">
                                        <div>
                                            <h4>
                                                Sản phẩm:
                                            </h4>
                                            <h4 id='name-product'></h4>
                                        </div>
                                        <div>
                                            <h5>
                                                Giá:
                                            </h5>
                                            <h5 id='price-product'></h5>

                                        </div>
                                        <div>
                                            <label for="quantity-product">Số lượng:</label>
                                            <div class="product__details__option">
                                                <div class="quantity">
                                                    <div class="pro-qty">
                                                        <input id="quantity-product" name="quantity-product" type="text" value="1">
                                                    </div>
                                                </div>
                                                <button type="submit" class="primary-btn">Đặt hàng</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </form>
            <section class="related-products spad">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <div class="section-title">
                                <h2>Sản phẩm liên quan</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="related__products__slider owl-carousel">
                            <div class="col-lg-3">
                                <div class="product__item">
                                    <div class="product__item__pic set-bg" data-setbg="img/shop/product-1.jpg">
                                        <div class="product__label">
                                            <span>Cupcake</span>
                                        </div>
                                    </div>
                                    <div class="product__item__text">
                                        <h6><a href="#">Dozen Cupcakes</a></h6>
                                        <div class="product__item__price">$32.00</div>
                                        <div class="cart_add">
                                            <a href="#">Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
