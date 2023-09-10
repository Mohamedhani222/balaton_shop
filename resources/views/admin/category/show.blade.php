@extends('admin.master')
@section('title')
    {{trans('admin_title_page_trans.show_category')}}
@endsection
@section('css')

@endsection
@section('title_page')
    {{trans('admin_title_page_trans.show_category')}}
@endsection
@section('content')


    <!-- Content Wrapper. Contains page content -->

        <div class="card-body">
            <form>

                <div class="row">
                    <div class="col">
                        <label for="name_ar">{{trans('category_trans.name_ar')}}</label>
                        <div class="input-group mb-3">
                            <input  name="name_ar" type="text" class="form-control  " value="{{$category->getTranslation('name','ar')}}" readonly>
                        </div>


                    </div>


                    <div class="col">
                        <label for="name_tr">{{trans('category_trans.name_tr')}}</label>
                        <div class="input-group mb-3">
                            <input name="name_tr"  type="text" class="form-control " value="{{$category->getTranslation('name','tr')}}" readonly>
                        </div>


                    </div>
                </div>
        <div class="row">
            <div class="col">
                <label for="slug">{{trans('category_trans.slug')}}</label>
                <div class="input-group mb-3">
                    <input name="slug" type="text" class="form-control  " value="{{$category->slug}}" readonly>
                </div>

            </div>

                <div class="col">
                    <label for="image">{{trans('category_trans.image')}}</label>
                    <div class="input-group mb-3 col">
                        <img src="{{Storage::url($category->image)}}" alt="" class="img-size-64 img-bordered">

                    </div>

                </div>
        </div>

                <div class="row">
                    <div class="col">
                        <label for="description_ar" >{{trans('category_trans.description_ar')}} </label>
                        <div class="input-group  mb-3">
                            <textarea name="description_ar" rows="3" cols="3" class="form-control  " readonly > {{$category->getTranslation('description','ar')}}</textarea>
                        </div>

                    </div>
                    <div class="col">
                        <label for="description_tr">{{trans('category_trans.description_tr')}}</label>
                        <div class="input-group  mb-3">
                            <textarea name="description_tr" rows="3" cols="3" class="form-control  " readonly> {{$category->getTranslation('description','tr')}}</textarea>
                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <label for="is_showing">{{trans('category_trans.is-showing')}}</label>
                        <div class="input-group mb-3 col" >
                            @if($category->is_showing==1)
                                <span class=" badge badge-success">{{trans('category_trans.showing')}}</span>

                            @else
                                <span class="badge badge-danger">{{trans('category_trans.hidden')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col">
                        <label for="is_popular">{{trans('category_trans.is-popular')}}</label>
                        <div class="input-group mb-3 col" >
                            @if($category->is_popular==1)
                                <span class="badge badge-success">{{trans('category_trans.popular')}}</span>

                            @else
                                <span class="badge badge-danger">{{trans('category_trans.not popular')}}</span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <label for="meta_title_ar">{{trans('category_trans.meta_title_ar')}}</label>
                        <div class="input-group mb-3 col" >
                            <input type="text" name="meta_title_ar" class="form-control "   value="{{$category->getTranslation('meta_title','ar')}}" readonly>
                        </div>

                    </div>
                    <div class="col">
                        <label for="meta_title_tr">{{trans('category_trans.meta_title_tr')}}</label>
                        <div class="input-group mb-3 col" >
                            <input type="text" name="meta_title_tr" class="form-control "  value="{{$category->getTranslation('meta_title','tr')}}" readonly >
                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <label for="meta_description_ar">{{trans('category_trans.meta_description_ar')}}</label>
                        <div class="input-group  mb-3">
                            <textarea name="meta_description_ar" rows="3" cols="3"
                                      readonly  class="form-control ">{{$category->getTranslation('meta_description','ar')}}</textarea>
                        </div>

                    </div>
                    <div class="col">
                        <label for="meta_description_tr">{{trans('category_trans.meta_description_tr')}}</label>
                        <div class="input-group  mb-3">
                            <textarea   name="meta_description_tr" rows="3" cols="3" class="form-control " readonly >{{$category->getTranslation('meta_description','tr')}}</textarea>
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="meta_keywords">{{trans('category_trans.meta_keyword')}}</label>
                        <div class="input-group  mb-3">
                            <textarea  readonly name="meta_keywords" rows="3" cols="3" class="form-control  ">{{$category->meta_keywords}}</textarea>
                        </div>

                    </div>
                </div>

        </form>
    </div>

@endsection
@section('js')

@endsection

