@extends('layout.source')
@section('title')
    Sản phẩm trong kho
@endsection
@extends('layout.header')
@section('breadcrumb')
    <div class="page-title d-flex flex-column me-5">
        <!--begin::Title-->
        <h1 class="d-flex flex-column text-dark fw-bolder fs-3 mb-0">Sản phẩm trong kho</h1>
        <!--end::Title-->
        <!--begin::Breadcrumb-->
        <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 pt-1">
            <!--begin::Item-->
            <li class="breadcrumb-item text-muted">
                <a href="{{ route('admin') }}" class="text-muted text-hover-primary">Trang chủ</a>
            </li>
            <!--end::Item-->
            <!--begin::Item-->
            <li class="breadcrumb-item">
                <span class="bullet bg-gray-200 w-5px h-2px"></span>
            </li>
            <!--end::Item-->
            <!--begin::Item-->
            <li class="breadcrumb-item text-dark">Sản phẩm trong kho</li>
            <!--end::Item-->
        </ul>
        <!--end::Breadcrumb-->
    </div>
@endsection
@extends('layout.index')
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Post-->
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container-xxl">
                <!--begin::Card-->
                <div class="card">
                    <!--begin::Card header-->
                    <div class="card-header border-0 pt-6">
                        <!--begin::Card title-->


                        <!--begin::Card title-->
                        <!--begin::Card toolbar-->
                        <div class="card-toolbar">
                            <!--begin::Toolbar-->
                            <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                                <!--begin::Filter-->

                                <!--end::Menu 1-->
                                <!--end::Filter-->
                                <!--begin::Add customer-->

                                <!--end::Add customer-->
                            </div>
                            <!--end::Toolbar-->
                            <!--begin::Group actions-->
                            <div class="d-flex justify-content-end align-items-center d-none"
                                data-kt-customer-table-toolbar="selected">
                                <div class="fw-bolder me-5">
                                    <span class="me-2" data-kt-customer-table-select="selected_count"></span>Selected
                                </div>
                                <button type="button" class="btn btn-danger"
                                    data-kt-customer-table-select="delete_selected">Delete Selected</button>
                            </div>
                            <!--end::Group actions-->
                        </div>
                        <!--end::Card toolbar-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-0">
                        <!--begin::Table-->
                        <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_customers_table">
                            <!--begin::Table head-->
                            <thead>
                                <!--begin::Table row-->
                                <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                    <th class="ps-4 min-w-325px rounded-start">Sản phẩm</th>
                                    <th class="min-w-125px">Giá</th>
                                    <th class="min-w-125px">Số lượng mua</th>
                                    <th class="min-w-200px">Số lương bán</th>
                                    <th class="min-w-150px">Số hàng còn lại</th>
                                </tr>
                                <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody>
                                @foreach ($product as $item)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="symbol symbol-50px me-5">
                                                    <img src="{{ route('image', ['id' => $item->img]) }}" class=""
                                                        alt="" />
                                                </div>
                                                <div class="d-flex justify-content-start flex-column">
                                                    <span
                                                        class="text-dark fw-bolder text-hover-primary mb-1 fs-6">{{ $item->name }}</span>

                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span
                                                class="text-dark fw-bolder text-hover-primary d-block mb-1 fs-6">{{ $item->price }}</span>

                                        </td>
                                        <td>
                                            <span
                                                class="text-dark fw-bolder text-hover-primary d-block mb-1 fs-6">{{ $buy = App\models\in_product::query()->where('product_id', $item->id)->get()->sum('quantity') }}</span>

                                        </td>
                                        <td>
                                            <span
                                                class="text-dark fw-bolder text-hover-primary d-block mb-1 fs-6">{{ $sale = App\models\Order::query()->where('product_id', $item->id)->get()->where('status', App\Enums\StatusType::Accept)->sum('quantity') }}</span>

                                        </td>
                                        <td>
                                            <span
                                                class="text-dark fw-bolder text-hover-primary d-block mb-1 fs-6">{{ $buy - $sale }}</span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <!--end::Table body-->
                        </table>
                        <!--end::Table-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->
                <!--begin::Modals-->
                <!--begin::Modal - Customers - Add-->
                <!--end::Modal - Customers - Add-->
                <!--end::Modals-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Post-->
    </div>
@endsection
