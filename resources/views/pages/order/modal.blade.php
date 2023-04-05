<!--begin::Modal - Customers - Add-->
<div class="modal fade" id="kt_modal_add_customer" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Form-->
            <form class="form" id="kt_modal_add_customer_form">
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
                    <div class="scroll-y me-n7 pe-7" id="kt_modal_add_customer_scroll" data-kt-scroll="true"
                        data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto"
                        data-kt-scroll-dependencies="#kt_modal_add_customer_header"
                        data-kt-scroll-wrappers="#kt_modal_add_customer_scroll" data-kt-scroll-offset="300px">
                        <input type="hidden" name="id" value="">
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fs-6 fw-bold mb-2">Tên khách hàng</label>
                            <!--end::Label-->

                            <!--begin::Input-->
                            <input type="text" class="form-control form-control-solid" placeholder=""
                                name="name" />
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="fs-6 fw-bold mb-2">Địa chỉ</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" class="form-control form-control-solid" placeholder=""
                                name="address" />
                            <!--end::Input-->
                        </div>
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="fs-6 fw-bold mb-2">Số điện thoại</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="number" class="form-control form-control-solid" placeholder=""
                                name="phone" />
                            <!--end::Input-->
                        </div>
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="fs-6 fw-bold mb-2">Email:</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="email" class="form-control form-control-solid" placeholder=""
                                name="email" />
                            <!--end::Input-->
                        </div>
                        
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="fs-6 fw-bold mb-2">Sản phẩm:</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <select name="product_id" id="select_product" autofocus
                                class="form-select form-select-solid" tabindex="-1" aria-hidden="true">
                                @foreach ($product as $item)
                                    <option value="{{ $item->id }}" data-price="{{ $item->price }}">
                                        {{ $item->name }}</option>
                                @endforeach
                            </select>
                            <!--end::Input-->
                        </div>
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="fs-6 fw-bold mb-2">Số lượng:</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="number" class="form-control form-control-solid" placeholder="" id="quantity"
                                name="soluong" />
                            <!--end::Input-->
                        </div>
                        {{-- <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="fs-6 fw-bold mb-2">Ngày giao</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="date" class="form-control form-control-solid" placeholder=""
                                name="date" value=""/>
                            <!--end::Input-->
                        </div> --}}
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="fs-6 fw-bold mb-2">Ghi chú</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" class="form-control form-control-solid" placeholder=""
                                name="note" />
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="fs-6 fw-bold mb-2">Tổng tiền</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" id="total" class="form-control form-control-solid" placeholder=""
                                name="total" readonly />
                            <!--end::Input-->
                        </div>
                        
                        <input type="hidden" name="status" value="1">
                        <!--end::Input group-->
                    </div>
                    <!--end::Scroll-->
                </div>
                <!--end::Modal body-->
                <!--begin::Modal footer-->
                <div class="modal-footer flex-center">
                    <!--begin::Button-->
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
<div class="modal fade" id="kt_modal_status" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Form-->
            <form class="form" id="kt_modal_status_form">
                @csrf
                <!--begin::Modal header-->
                <div class="modal-header" id="kt_modal_add_customer_header">
                    <!--begin::Modal title-->
                    <h2 class="fw-bolder modal-title">Thay đổi trạng thái đơn hàng</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div id="kt_modal_add_customer_close"
                        class="btn btn-icon btn-sm btn-active-icon-primary btn-close">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                        <span class="svg-icon svg-icon-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none">
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
                    <div class="scroll-y me-n7 pe-7" id="kt_modal_add_customer_scroll">
                        <p><input type="hidden" placeholder="" name="id" value="">
                        </p>
                        <p><input type="hidden" placeholder="" name="name"></p>
                        <p><input type="hidden" placeholder=""name="email" hidden></p>
                        <p><input type="hidden" placeholder=""name="address" hidden></p>
                        <p><input type="hidden" placeholder=""name="phone" hidden></p>
                        <p><input type="hidden" placeholder="" name="note" hidden></p>
                        <input type="hidden" placeholder="" name="product_id" value="" hidden>
                        <input type="hidden" placeholder="" name="soluong" value="" hidden>
                        <input type="hidden" placeholder="" name="total" value="" hidden>
                        <select name="status" id="select_cateid" autofocus class="form-select form-select-solid"
                            tabindex="-1" aria-hidden="true">
                            @foreach (App\Enums\StatusType::toSelectArray() as $item => $value)
                                <option value="{{ $item }}">
                                    @if ($item == 0)
                                        {{ __('Huỷ') }}
                                    @elseif($item == 1)
                                        {{ __('Xác nhận') }}
                                    @elseif($item == 2)
                                        {{ __('Chờ') }}
                                        
                                    @endif
                                    </option>
                            
                            @endforeach
                        </select>
                        <!--end::Input group-->
                    </div>
                    <!--end::Scroll-->
                </div>
                <!--end::Modal body-->
                <!--begin::Modal footer-->
                <div class="modal-footer flex-center">
                    <!--begin::Button-->
                    <!--end::Button-->
                    <!--begin::Button-->
                    <button type="submit" id="kt_modal_status_submit" class="btn btn-primary">
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
<div class="modal fade" id="kt_modal_detail" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-900px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                <!--begin::Post-->
                <div class="post d-flex flex-column-fluid" id="kt_post">
                    <!--begin::Container-->
                    <div id="kt_content_container" class="container-xxl">
                        <!--begin::Invoice 2 main-->
                        <div class="card">
                            <!--begin::Body-->
                            <div class="card-body p-lg-20">
                                <!--begin::Layout-->
                                <div class="d-flex flex-column flex-xl-row">
                                    <!--begin::Content-->
                                    <div class="flex-lg-row-fluid me-xl-18 mb-10 mb-xl-0">
                                        <!--begin::Invoice 2 content-->
                                        <div class="mt-n1">
                                            <!--begin::Top-->
                                            <div class="d-flex flex-stack pb-10">
                                                <!--begin::Logo-->
                                                {{-- <a href="#">
                                                    <img alt="Logo" src="{{ asset('frontend/assets/img/logo_asus.png') }}"
                                                        style="padding: 5px;
                                                    width: 150px;" />
                                                </a> --}}
                                                <!--end::Logo-->
                                                <!--begin::Action-->
                                                <button type="button" class="btn btn-success my-1 me-12"
                                                    onclick="functionPrint()" data-dismiss="modal">In hoá đơn</button>
                                                <!--end::Action-->
                                            </div>
                                            <!--end::Top-->
                                            <!--begin::Wrapper-->
                                            <div class="m-0">
                                                <!--begin::Label-->
                                                <div class="fw-bolder fs-3 text-gray-800 mb-8" id="order_id"></div>
                                                <!--end::Label-->
                                                <!--begin::Row-->
                                                <div class="row g-5 mb-11">
                                                    <!--end::Col-->
                                                    <div class="col-sm-6">
                                                        <!--end::Label-->
                                                        <div class="fw-bold fs-7 text-gray-600 mb-1">Ngày giao:</div>
                                                        <!--end::Label-->
                                                        <!--end::Col-->
                                                        <div class="fw-bolder fs-6 text-gray-800" id="date">
                                                        </div>
                                                        <!--end::Col-->
                                                    </div>
                                                    <!--end::Col-->
                                                </div>
                                                <!--end::Row-->
                                                <!--begin::Row-->
                                                <div class="row g-5 mb-12">
                                                    <!--end::Col-->
                                                    <div class="col-sm-6">
                                                        <!--end::Label-->
                                                        <div class="fw-bold fs-7 text-gray-600 mb-1">Thông tin khách
                                                            hàng:</div>
                                                        <!--end::Label-->
                                                        <!--end::Text-->
                                                        <div class="fw-bolder fs-6 text-gray-800" id="name">
                                                        </div>
                                                        <!--end::Text-->
                                                        <!--end::Description-->
                                                        <div class="fw-bold fs-7 text-gray-600" id="address"></div>
                                                        <div class="fw-bold fs-7 text-gray-600" id="phone"></div>
                                                        <div class="fw-bold fs-7 text-gray-600" id="email"></div>
                                                        <div class="fw-bold fs-7 text-gray-600" id="note"></div>
                                                        <!--end::Description-->
                                                    </div>
                                                    <!--end::Col-->
                                                </div>
                                                <!--end::Row-->
                                                <!--begin::Content-->
                                                <div class="flex-grow-1">
                                                    <!--begin::Table-->
                                                    <div class="table-responsive border-bottom mb-9">
                                                        <table class="table mb-3">
                                                            <thead>
                                                                <tr class="border-bottom fs-6 fw-bolder text-muted">
                                                                    <th class="min-w-175px pb-2">Sản phẩm</th>
                                                                    <th class="min-w-70px text-end pb-2">Số lượng</th>
                                                                    <th class="min-w-100px text-end pb-2">Giá</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr class="fw-bolder text-gray-700 fs-5 text-end">
                                                                    <td class="d-flex align-items-center pt-6"
                                                                        id="product">
                                                                        <i
                                                                            class="fa fa-genderless text-danger fs-2 me-2"></i>
                                                                    </td>
                                                                    <td class="pt-6" id="quantity"></td>
                                                                    <td class="pt-6 text-dark fw-boldest"
                                                                        id="price"></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <!--end::Table-->
                                                    <!--begin::Container-->
                                                    <div class="d-flex justify-content-end">
                                                        <!--begin::Section-->
                                                        <div class="mw-300px">
                                                            <!--begin::Item-->
                                                            <div class="d-flex flex-stack mb-3">
                                                                <!--begin::Accountname-->
                                                                <div class="fw-bold pe-10 text-gray-600 fs-7">Phí vận
                                                                    chuyển</div>
                                                                <!--end::Accountname-->
                                                                <!--begin::Label-->
                                                                <div class="text-end fw-bolder fs-6 text-gray-800">
                                                                    50.000 VNĐ</div>
                                                                <!--end::Label-->
                                                            </div>
                                                            <!--end::Item-->
                                                            <!--begin::Item-->
                                                            <div class="d-flex flex-stack">
                                                                <!--begin::Code-->
                                                                <div class="fw-bold pe-10 text-gray-600 fs-7">Tổng tiền
                                                                </div>
                                                                <!--end::Code-->
                                                                <!--begin::Label-->
                                                                <div class="text-end fw-bolder fs-6 text-gray-800"
                                                                    id="price_total"></div>
                                                                <!--end::Label-->
                                                            </div>
                                                            <!--end::Item-->
                                                        </div>
                                                        <!--end::Section-->
                                                    </div>
                                                    <!--end::Container-->
                                                </div>
                                                <!--end::Content-->
                                            </div>
                                            <!--end::Wrapper-->
                                        </div>
                                        <!--end::Invoice 2 content-->
                                    </div>
                                    <!--end::Content-->
                                    <!--begin::Sidebar-->
                                    <!--end::Sidebar-->
                                </div>
                                <!--end::Layout-->
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Invoice 2 main-->
                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Post-->
            </div>
        </div>
    </div>
</div>
<!--end::Modal - Customers - Add-->
@push('jscustom')
    <script>
        function functionPrint() {
            document.getElementById("nonPrintable").className += "noPrint";
            window.print();
        }
    </script>
@endpush
