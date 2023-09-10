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

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th>السعر</th>
            <th>حالة الاوردر</th>
            <th>التوصيل</th>
            <th>تم دفع الاوردر</th>
            <th>طريقة الدفع</th>
            <th>الوقت</th>
            <th>العمليات</th>
        </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)
            <tr>
                <td>{{$order->id}}</td>
                <td>{{$order->total_price}}</td>
                <td>{{$order->status}}</td>
                <td>{{$order->delivery_status}}</td>
                <td><p class="badge badge-{{$order->is_paid ?'success':'danger'}}">{{$order->is_paid ?'Yes':'No'}}</p>
                </td>
                <td>{{$order->payment_method}}</td>
                <td>{{$order->created_at}}</td>
                <td class="d-flex">
                    @if(!$order->is_paid)
                        <form method="post" action="{{route('confirm-order' ,$order->id)}}">
                            @csrf
                            <button type="submit" title="make order paid" class="btn btn-sm btn-success">
                                <ion-icon style="color: white" name="checkmark"></ion-icon>
                            </button>
                        </form>
                    @endif

                    <a  href="{{route('orders.show' ,$order->id)}} " title="show order details" class="btn btn-sm btn-success ml-2">
                        <ion-icon class="font-md" name="eye-outline"></ion-icon>
                    </a>

                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
@endsection
@section('js')
    <script src="{{asset('assets/plugins/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

@endsection

