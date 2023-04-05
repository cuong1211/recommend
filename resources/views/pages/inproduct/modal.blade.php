<div class="modal fade" id="kt_modal_add_customer" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Form-->
            <form class="form" id="kt_modal_add_customer_form" enctype="multipart/form-data">
                @csrf
                <!--begin::Modal header-->
                <div class="modal-header" id="kt_modal_add_customer_header">
                    <!--begin::Modal title-->

                    <h2 class="fw-bolder modal-title"></h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div id="kt_modal_add_customer_close" class="btn btn-icon btn-sm btn-active-icon-primary btn-close">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                        <span class="svg-icon svg-icon-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2"
                                    rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                                <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                    transform="rotate(45 7.41422 6)" fill="black" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </div>
                    <!--end::Close-->
                </div>
                <!--end::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body py-10 px-lg-17">
                    <!--begin::Scroll-->
                    <div class="alert alert-danger" style="display:none">

                    </div>
                    <div class="scroll-y me-n7 pe-7" id="kt_modal_add_customer_scroll" data-kt-scroll="true"
                        data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto"
                        data-kt-scroll-dependencies="#kt_modal_add_customer_header"
                        data-kt-scroll-wrappers="#kt_modal_add_customer_scroll" data-kt-scroll-offset="300px">
                        <input type="hidden" name="id" value="">
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="fs-6 fw-bold mb-2">Sản phẩm</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <select name="product_id" id="select_price" autofocus data-placeholder="Select a Country..."
                                class="form-select form-select-solid value" tabindex="-1" aria-hidden="true">
                                @foreach ($product as $item)
                                    <option id="value" value="{{ $item->id }}"
                                        data-description="{{ $item->price }}">
                                        {{ $item->name }}</option>
                                @endforeach
                            </select>
                            <!--end::Input-->
                        </div>
                        <label class="fs-6 fw-bold mb-2">Giá tiền</label>
                        <input type="text" id="price" class="form-control form-control-solid test" placeholder=""
                            readonly></td>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="fs-6 fw-bold mb-2">Nhà cung cấp</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <select name="company_id" id="select_cateid"autofocus data-placeholder="Select a Country..."
                                class="form-select form-select-solid" tabindex="-1" aria-hidden="true">
                                @foreach ($company as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                            <!--end::Input-->
                        </div>
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="fs-6 fw-bold mb-2">Số lượng</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="number" id="quantity" class="form-control form-control-solid" placeholder=""
                                name="quantity" />
                            <!--end::Input-->
                        </div>
                        <label class="fs-6 fw-bold mb-2">Tổng tiền</label>
                        <input type="text" id="total_money" class="form-control form-control-solid" placeholder=""
                            name="total" readonly />
                        <!--end::Input group-->
                    </div>
                    <!--end::Scroll-->
                </div>
                <!--end::Modal body-->
                <!--begin::Modal footer-->
                <div class="modal-footer flex-center">
                    <!--begin::Button-->
                    <button type="reset" id="kt_modal_add_customer_cancel" class="btn btn-light me-3">Mặc định</button>
                    <!--end::Button-->
                    <!--begin::Button-->
                    <button type="submit" id="kt_modal_add_customer_submit" class="btn btn-primary">
                        <span class="indicator-label">Xác nhận</span>
                        <span class="indicator-progress">Please wait...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </button>
                    <!--end::Button-->
                </div>
                <!--end::Modal footer-->
            </form>
            <!--end::Form-->
        </div>
    </div>
</div>
@push('jscustom')
    <script>
        $('#select_price').change(function() {
            var element = $(this).find('option:selected');
            var desc = element.data("description");
            $("#price").val(desc);
            // $('#total_money').val(desc);
            $('#quantity').on('keyup', function(e) {
                quantity = e.target.value
                // console.log(a)
                $('#total_money').val(desc * quantity);
            });
        });
    </script>
@endpush
