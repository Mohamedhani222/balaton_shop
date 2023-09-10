@extends('admin.master')
@section('title')
    {{trans('admin_title_page_trans.Category')}}
@endsection
@section('css')

@endsection
@section('title_page')
    {{trans('admin_title_page_trans.Category')}}
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->

    <div class="card-header">
        <a href="{{route('categories.create')}}" class="btn btn-sm btn-outline-primary">{{trans('buttons_trans.create')}}</a>
    </div>
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>id</th>
                <th>{{trans('category_trans.name')}}</th>
                <th>{{trans('category_trans.image')}}</th>
                <th>{{trans('category_trans.hidden')}}</th>
                <th>{{trans('category_trans.is-popular')}}</th>
                <th>{{trans('category_trans.action')}}</th>
            </tr>
            </thead>
            <tbody>
            @php $i=1; @endphp
            @foreach($categories as $category)
            <tr>
                <td>{{$i++}}</td>
                <td> {{$category->name}}</td>
                <td><img src="{{Storage::url($category->image)}}" alt="" class="img-size-64 img-bordered"></td>
                <td>@if($category->is_showing==1)
                        <span class=" badge badge-success">{{trans('category_trans.showing')}}</span>

                    @else
                        <span class="badge badge-danger">{{trans('category_trans.hidden')}}</span>
                @endif
                </td>
                <td>@if($category->is_popular==1)
                        <span class="badge badge-success">{{trans('category_trans.popular')}}</span>

                    @else
                        <span class="badge badge-danger">{{trans('category_trans.not popular')}}</span>
                    @endif
                </td>
                <td>
                    <a href="{{route('categories.show',$category->id)}}" class="btn btn-sm btn-outline-success">{{trans('buttons_trans.show')}}</a>
                    <a href="{{route('categories.edit',$category->id)}}" class="btn btn-sm btn-outline-warning">{{trans('buttons_trans.edit')}}</a>
                    @include('admin.includes.delete_modal',['type'=>'category','data'=>$category])
                </td>
            </tr>
            @endforeach
            </tbody>

        </table>
    </div>
    <!-- /.card-body -->
    </div>

@endsection
@section('js')
    <script src="{{asset('assets/plugins/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
    <script>
        $(function () {
            $("#example1").DataTable();
            // $('#example2').DataTable({
            //     "paging": true,
            //     "lengthChange": false,
            //     "searching": false,
            //     "ordering": true,
            //     "info": true,
            //     "autoWidth": false,
            // });
        });
    </script>
@endsection

