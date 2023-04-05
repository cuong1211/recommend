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

                    <input type="hidden" name="id" value="">
                    <!--begin::Input group-->
                    <div class="fv-row mb-7">
                        <!--begin::Label-->
                        <label class="required fs-6 fw-bold mb-2">Tên sản phẩm</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="text" class="form-control form-control-solid" placeholder="" name="name"
                            value="" />
                        <!--end::Input-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="fv-row mb-7">
                        <!--begin::Label-->
                        <label class="fs-6 fw-bold mb-2">Mô tả</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="text" class="form-control form-control-solid" placeholder=""
                            name="description" />
                        <!--end::Input-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="fv-row mb-7">
                        <!--begin::Label-->
                        <label class="fs-6 fw-bold mb-2">Giá</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="number" class="form-control form-control-solid" placeholder="" name="price" />
                        <!--end::Input-->
                    </div>
                    <div class="fv-row mb-7">
                        <!--begin::Label-->
                        <label class="fs-6 fw-bold mb-2">Loại hàng</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <select name="category_id" id="select_cateid" autofocus class="form-select form-select-solid"
                            tabindex="-1" aria-hidden="true">
                            @foreach ($cate as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        <!--end::Input-->
                    </div>
                    <!--end::Input group-->
                    <div class="fv-row mb-7">
                        <label class="fs-6 fw-bold mb-2">Ảnh sản phẩm</label>
                        <br>
                        <input type="file" class="form-control form-control-solid"
                            onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])"
                            name="img">
                        <br>
                        <img id="blah" width="530" height="246" />
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
