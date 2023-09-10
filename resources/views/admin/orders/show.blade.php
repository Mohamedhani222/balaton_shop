@extends('admin.master')
@section('title')
    {{trans('admin_sidebar_trans.order')}}
@endsection
@section('css')
@endsection
@section('title_page')
    {{trans('admin_sidebar_trans.order')}}
@endsection
@section('content')
    <style>
        body {
            background: #eee;
        }

        .card {
            box-shadow: 0 20px 27px 0 rgb(0 0 0 / 5%);
        }

        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 0 solid rgba(0, 0, 0, .125);
            border-radius: 1rem;
        }

        .text-reset {
            --bs-text-opacity: 1;
            color: inherit !important;
        }

        a {
            color: #5465ff;
            text-decoration: none;
        }
    </style>
    <div class="container-fluid">

        <div class="container">
            <!-- Title -->
            <div class="d-flex justify-content-between align-items-center py-3">
                <h2 class="h5 mb-0"><a href="#" class="text-muted"></a> Order #{{$order_info->id}}</h2>
            </div>

            <!-- Main content -->
            <div class="row">
                <div class="col-lg-8">
                    <!-- Details -->
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="mb-3 d-flex justify-content-between">
                                <div>
                                    <span class="me-3">22-11-2021</span>
                                    <span class="me-3">#16123222</span>
                                    <span class="me-3">Visa -1234</span>
                                    <span class="badge rounded-pill bg-info">SHIPPING</span>
                                </div>
                                <div class="d-flex">
                                    <button class="btn btn-link p-0 me-3 d-none d-lg-block btn-icon-text"><i
                                            class="bi bi-download"></i> <span class="text">Invoice</span></button>
                                    <div class="dropdown">
                                        <button class="btn btn-link p-0 text-muted" type="button"
                                                data-bs-toggle="dropdown">
                                            <i class="bi bi-three-dots-vertical"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a class="dropdown-item" href="#"><i class="bi bi-pencil"></i> Edit</a>
                                            </li>
                                            <li><a class="dropdown-item" href="#"><i class="bi bi-printer"></i>
                                                    Print</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <table class="table table-borderless">
                                <tbody>

                                @foreach($order_items as $item)
                                    <tr>
                                        <td>
                                            <div class="d-flex mb-2">
                                                <div class="flex-shrink-0">
                                                    <img src="{{asset($item->image)}}" alt=""
                                                         width="35" class="img-fluid">
                                                </div>
                                                <div class="flex-lg-grow-1 ms-3">
                                                    <h6 class="small mb-0"><a
                                                            href="{{route('get_product_slug' , [$item->category->slug , $item->slug])}}"
                                                            class="text-reset">{{$item->name}}</a>
                                                    </h6>
                                                    <span class="small">{{$item->description}}</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{$item->pivot->quantity}}</td>
                                        <td class="text-end">   tl {{$item->pivot->total_price}}</td>
                                    </tr>
                                @endforeach


                                </tbody>
                                <tfoot>
                                <tr class="fw-bold">
                                    <td colspan="2">TOTAL</td>
                                    <td class="text-end">{{$order_info->total_price}} tl</td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <!-- Payment -->
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <h3 class="h6">Payment Method</h3>
                                    <p>{{$order_info->payment_method}} <br>
                                        Total:{{$order_info->total_price}}
                                        @if($order_info->is_paid)
                                            <span class="badge bg-success rounded-pill">PAID</span></p>
                                    @else
                                        <span class="badge bg-danger rounded-pill">UNPAID</span></p>

                                    @endif

                                </div>


                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <!-- Customer Notes -->
                    <div class="card mb-4">
                        <div class="card-body">
                            <h3 class="h6">Customer Notes</h3>
                            <p>{{$order_info->address->delivery_notes}}</p>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <!-- Shipping information -->
                        <div class="card-body">
                            <h3 class="h6">Shipping Information</h3>
                            <hr>
                            <h3 class="h6">Address</h3>
                            <address>
                                <strong>{{$order_info->address->country->name}}</strong><br>
                                {{$order_info->address->address1}}<br>
                                {{$order_info->address->address2}}<br>
                                <abbr title="Phone">Phone:</abbr> {{$order_info->address->phone}}
                            </address>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('js')
@endsection

