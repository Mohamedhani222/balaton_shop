@extends('admin.master')
@section('title')
    {{trans('admin_title_page_trans.show_product')}}
@endsection
@section('css')

@endsection
@section('title_page')
    {{trans('admin_title_page_trans.show_product')}}
@endsection
@section('content')


    <!-- Content Wrapper. Contains page content -->

        <div class="card-body">
            @if(session('error_catch'))
                <div class="bg-danger">{{session('error-catch')}}</div>
            @endif
            <form >

                <div class="row">
                    <label for="category">{{trans('product_trans.category')}}</label>
                    <input   type="text" class="form-control "  readonly value="{{$product->category->name}}">
                </div>
                <br>

                <div class="row">
                    <div class="col">
                        <label for="name_ar">{{trans('product_trans.name_ar')}}</label>
                        <div class="input-group mb-3">
                            <input  name="name_ar" type="text" class="form-control "   value="{{$product->getTranslation('name','ar')}}" readonly>
                        </div>


                    </div>


                    <div class="col">
                        <label for="name_tr">{{trans('product_trans.name_tr')}}</label>
                        <div class="input-group mb-3">
                            <input name="name_tr"  type="text" class="form-control " readonly value="{{$product->getTranslation('name','tr')}}" >
                        </div>


                    </div>
                </div>

                <div class="row">
            <div class="col">
                <label for="slug">{{trans('product_trans.slug')}}</label>
                <div class="input-group mb-3">
                    <input name="slug" type="text" class="form-control  " readonly value="{{$product->slug}}">
                </div>

            </div>

                <div class="col">
                    <label for="image">{{trans('product_trans.image')}}</label>
                    <div class="input-group mb-3 col">
                        <img src="{{Storage::url($product->image)}}" alt="" class="img-size-64 img-bordered">
                    </div>

                </div>
        </div>

                <div class="row">
                    <div class="col">
                        <label for="short_description_ar">{{trans('product_trans.short_description_ar')}}</label>
                        <div class="input-group  mb-3">
                            <textarea name="short_description_ar" rows="3" cols="3" class="form-control  " readonly> {{$product->getTranslation('short_description','ar')}}</textarea>
                        </div>

                    </div>
                    <div class="col">
                        <label for="short_description_tr">{{trans('product_trans.short_description_tr')}}</label>
                        <div class="input-group  mb-3">
                            <textarea name="short_description_tr" rows="3" cols="3" class="form-control  " readonly>{{$product->getTranslation('short_description','tr')}}</textarea>
                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <label for="description_ar">{{trans('product_trans.description_ar')}}</label>
                        <div class="input-group  mb-3">
                            <textarea name="description_ar" rows="3" cols="3" class="form-control " readonly>{{$product->getTranslation('description','ar')}}</textarea>
                        </div>

                    </div>
                    <div class="col">
                        <label for="description_tr">{{trans('product_trans.description_tr')}}</label>
                        <div class="input-group  mb-3">
                            <textarea name="description_tr" rows="3" cols="3" class="form-control  " readonly>{{$product->getTranslation('description','tr')}}</textarea>
                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <label for="showing">{{trans('product_trans.status')}}</label>
                        <div class="input-group mb-3 col" >
                            @if($product->status==1)
                                <span class=" badge badge-success">{{trans('product_trans.showing')}}</span>

                            @else
                                <span class="badge badge-danger">{{trans('product_trans.hidden')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col">
                        <label for="trend">{{trans('product_trans.trend')}}</label>
                        <div class="input-group mb-3 col" >
                            @if($product->trend==1)
                                <span class="badge badge-success">{{trans('product_trans.trend')}}</span>

                            @else
                                <span class="badge badge-danger">{{trans('product_trans.not-trend')}}</span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <label for="price">{{trans('product_trans.price')}}</label>
                        <div class="input-group mb-3 " >
                            <input type="number" name="price" class="form-control "  readonly value="{{$product->price}}" >
                        </div>

                    </div>
                    <div class="col">
                        <label for="selling_price">{{trans('product_trans.selling_price')}}</label>
                        <div class="input-group mb-3 " >
                            <input type="number" name="selling_price" class="form-control " readonly value="{{$product->selling_price}}" >
                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <label for="qty">{{trans('product_trans.qty')}}</label>
                        <div class="input-group  mb-3">
                            <input type="number" name="qty"
                                   class="form-control " readonly value="{{$product->qty}}">

                        </div>

                    </div>
                    <div class="col">
                        <label for="tax">{{trans('product_trans.tax')}}</label>
                        <div class="input-group  mb-3">
                            <input type="number" name="tax"
                                   class="form-control "  readonly value="{{$product->tax}}">

                        </div>


                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <label for="meta_title">{{trans('product_trans.meta_title')}}</label>
                        <div class="input-group  mb-3">
                           <input type="text" name="meta_title" rows="3" cols="3" class="form-control  " readonly value="{{$product->meta_title}}">
                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <label for="meta_description_ar">{{trans('product_trans.meta_description_ar')}}</label>
                        <div class="input-group mb-3 " >
                            <textarea rows="3" cols="3"  name="meta_description_ar" class="form-control " readonly >{{$product->getTranslation('meta_description','ar')}}</textarea>
                        </div>

                    </div>
                    <div class="col">
                        <label for="meta_description_tr">{{trans('product_trans.meta_description_tr')}}</label>
                        <div class="input-group mb-3 " >
                            <textarea rows="3" cols="3"   name="meta_description_tr" class="form-control" readonly>{{$product->getTranslation('meta_description','tr')}}</textarea>
                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <label for="meta_keywords">{{trans('product_trans.meta_keyword')}}</label>
                        <spa class="text-danger">{{trans('product_trans.meta_keyword_note')}}</spa>
                        <div class="input-group  mb-3">
                            <textarea name="meta_keywords" rows="3" cols="3"
                                      class="form-control  " readonly >{{$product->meta_keywords}}</textarea>
                        </div>

                    </div>
                </div>

                <button type="submit" class="btn btn-outline-primary">{{trans('buttons_trans.save')}}</button>
        </form>
    </div>

@endsection
@section('js')

@endsection

