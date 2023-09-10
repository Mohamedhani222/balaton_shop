@extends('admin.master')
@section('title')
    {{trans('admin_title_page_trans.create_product')}}
@endsection
@section('css')

@endsection
@section('title_page')
    {{trans('admin_title_page_trans.create_product')}}
@endsection
@section('content')


    <!-- Content Wrapper. Contains page content -->

        <div class="card-body">
            @if(session('error_catch'))
                <div class="bg-danger">{{session('error-catch')}}</div>
            @endif
            <form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <label for="category_id">{{trans('product_trans.category')}}</label>
                         <select name="category_id" id="category_id" class="form-control">
                            <option>{{trans('product_trans.please_select')}}</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                         </select>

                </div>
                <br>

                <div class="row">
                    <div class="col">
                        <label for="name_ar">{{trans('product_trans.name_ar')}}</label>
                        <div class="input-group mb-3">
                            <input  name="name_ar" type="text" class="form-control @error('name_ar') is-invalid @enderror">
                        </div>
                        @error('name_ar')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                    </div>


                    <div class="col">
                        <label for="name_tr">{{trans('product_trans.name_tr')}}</label>
                        <div class="input-group mb-3">
                            <input name="name_tr"  type="text" class="form-control @error('name_tr') is-invalid @enderror"  >
                        </div>
                        @error('name_tr')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                    </div>
                </div>

                <div class="row">
            <div class="col">
                <label for="slug">{{trans('product_trans.slug')}}</label>
                <div class="input-group mb-3">
                    <input name="slug" type="text" class="form-control  @error('slug') is-invalid @enderror" >
                </div>
                @error('slug')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

                <div class="col">
                    <label for="image">{{trans('product_trans.image')}}</label>
                    <div class="input-group mb-3 col">
                        <input name="image" type="file" class="form-control  @error('image') is-invalid @enderror">
                    </div>
                    @error('image')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
        </div>

                <div class="row">
                    <div class="col">
                        <label for="short_description_ar">{{trans('product_trans.short_description_ar')}}</label>
                        <div class="input-group  mb-3">
                            <textarea name="short_description_ar" rows="3" cols="3" class="form-control  @error('short_description_ar') is-invalid @enderror"></textarea>
                        </div>
                        @error('short_description_ar')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="short_description_tr">{{trans('product_trans.short_description_tr')}}</label>
                        <div class="input-group  mb-3">
                            <textarea name="short_description_tr" rows="3" cols="3" class="form-control  @error('short_description_tr') is-invalid @enderror"></textarea>
                        </div>
                        @error('short_description_tr')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <label for="description_ar">{{trans('product_trans.description_ar')}}</label>
                        <div class="input-group  mb-3">
                            <textarea name="description_ar" rows="3" cols="3" class="form-control  @error('description_ar') is-invalid @enderror"></textarea>
                        </div>
                        @error('description_ar')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="description_tr">{{trans('product_trans.description_tr')}}</label>
                        <div class="input-group  mb-3">
                            <textarea name="description_tr" rows="3" cols="3" class="form-control  @error('description_tr') is-invalid @enderror"></textarea>
                        </div>
                        @error('description_tr')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <label for="status">{{trans('product_trans.status')}}</label>
                        <div class="input-group  mb-3">
                            <input type="checkbox" class="" id="status" name="status" >
                        </div>

                    </div>
                    <div class="col">
                        <label for="trend">{{trans('product_trans.trend')}}</label>
                        <div class="input-group  mb-3">
                            <input type="checkbox" class="" id="trend" name="trend">
                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <label for="price">{{trans('product_trans.price')}}</label>
                        <div class="input-group mb-3 " >
                            <input type="number" name="price" class="form-control @error('price') is-invalid @enderror" >
                        </div>
                        @error('price')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="selling_price">{{trans('product_trans.selling_price')}}</label>
                        <div class="input-group mb-3 " >
                            <input type="number" name="selling_price" class="form-control @error('selling_price') is-invalid @enderror" >
                        </div>
                        @error('selling_price')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <label for="qty">{{trans('product_trans.qty')}}</label>
                        <div class="input-group  mb-3">
                            <input type="number" name="qty"
                                   class="form-control @error('qty') is-invalid @enderror" >

                        </div>
                        @error('qty')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="tax">{{trans('product_trans.tax')}}</label>
                        <div class="input-group  mb-3">
                            <input type="number" name="tax"
                                   class="form-control @error('tax') is-invalid @enderror" >

                        </div>
                        @error('tax')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <label for="meta_title">{{trans('product_trans.meta_title')}}</label>
                        <div class="input-group  mb-3">
                           <input type="text" name="meta_title" rows="3" cols="3" class="form-control  @error('meta_title') is-invalid @enderror">
                        </div>
                        @error('meta_title')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <label for="meta_description_ar">{{trans('product_trans.meta_description_ar')}}</label>
                        <div class="input-group mb-3 " >
                            <textarea rows="3" cols="3"  name="meta_description_ar" class="form-control @error('meta_description_ar') is-invalid @enderror"></textarea>
                        </div>
                        @error('meta_title_ar')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="meta_description_tr">{{trans('product_trans.meta_description_tr')}}</label>
                        <div class="input-group mb-3 " >
                            <textarea rows="3" cols="3"   name="meta_description_tr" class="form-control @error('meta_description_tr') is-invalid @enderror"></textarea>
                        </div>
                        @error('meta_title_tr')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <label for="meta_keywords">{{trans('product_trans.meta_keyword')}}</label>
                        <spa class="text-danger">{{trans('product_trans.meta_keyword_note')}}</spa>
                        <div class="input-group  mb-3">
                            <textarea name="meta_keywords" rows="3" cols="3"
                                      class="form-control  @error('meta_keywords') is-invalid @enderror"></textarea>
                        </div>
                        @error('meta_keywords')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <button type="submit" class="btn btn-outline-primary">{{trans('buttons_trans.save')}}</button>
        </form>
    </div>

@endsection
@section('js')

@endsection

