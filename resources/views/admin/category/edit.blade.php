@extends('admin.master')
@section('title')
    {{trans('admin_title_page_trans.edit_category')}}
@endsection
@section('css')

@endsection
@section('title_page')
    {{trans('admin_title_page_trans.edit_category')}}
@endsection
@section('content')


    <!-- Content Wrapper. Contains page content -->

        <div class="card-body">
            <form action="{{route('categories.update',$category->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col">
                        <label for="name_ar">{{trans('category_trans.name_ar')}}</label>
                        <div class="input-group mb-3">
                            <input  name="name_ar" type="text" class="form-control @error('name_ar') is-invalid @enderror " value="{{$category->getTranslation('name','ar')}}">
                        </div>
                        @error('name_ar')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                    </div>


                    <div class="col">
                        <label for="name_tr">{{trans('category_trans.name_tr')}}</label>
                        <div class="input-group mb-3">
                            <input name="name_tr"  type="text" class="form-control @error('name_tr') is-invalid @enderror" value="{{$category->getTranslation('name','tr')}}">
                        </div>
                        @error('name_tr')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                    </div>
                </div>
        <div class="row">
            <div class="col">
                <label for="slug">{{trans('category_trans.slug')}}</label>
                <div class="input-group mb-3">
                    <input name="slug" type="text" class="form-control  @error('slug') is-invalid @enderror" value="{{$category->slug}}" >
                </div>
                @error('slug')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

                <div class="col">
                    <label for="image">{{trans('category_trans.image')}}</label>
                    <div class="input-group mb-3 col">
                        <img src="{{Storage::url($category->image)}}" alt="" class="img-size-64 img-bordered">
                        <input name="image" type="file" class="form-control  "  >
                    </div>
                    @error('image')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
        </div>

                <div class="row">
                    <div class="col">
                        <label for="description_ar">{{trans('category_trans.description_ar')}}</label>
                        <div class="input-group  mb-3">
                            <textarea name="description_ar" rows="3" cols="3" class="form-control  @error('description_ar') is-invalid @enderror" > {{$category->getTranslation('description','ar')}}</textarea>
                        </div>
                        @error('description_ar')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="description_tr">{{trans('category_trans.description_tr')}}</label>
                        <div class="input-group  mb-3">
                            <textarea name="description_tr" rows="3" cols="3" class="form-control  @error('description_tr') is-invalid @enderror" > {{$category->getTranslation('description','tr')}}</textarea>
                        </div>
                        @error('description_tr')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <label for="is_showing">{{trans('category_trans.is-showing')}}</label>
                        <div class="input-group mb-3 col" >
                            <input type="checkbox"  id="is_showing" name="is_showing"  {{($category->is_showing == 1) ?'checked':''}}>
                        </div>
                    </div>
                    <div class="col">
                        <label for="is_popular">{{trans('category_trans.is-popular')}}</label>
                        <div class="input-group mb-3 col" >
                            <input type="checkbox"  id="is_popular" name="is_popular"{{($category->is_popular == 1) ?'checked':''}}>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <label for="meta_title_ar">{{trans('category_trans.meta_title_ar')}}</label>
                        <div class="input-group mb-3 col" >
                            <input type="text" name="meta_title_ar" class="form-control @error('meta_title_ar') is-invalid @enderror"   value="{{$category->getTranslation('meta_title','ar')}}">
                        </div>
                        @error('meta_title_ar')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="meta_title_tr">{{trans('category_trans.meta_title_tr')}}</label>
                        <div class="input-group mb-3 col" >
                            <input type="text" name="meta_title_tr" class="form-control @error('meta_title_tr') is-invalid @enderror"  value="{{$category->getTranslation('meta_title','tr')}}" >
                        </div>
                        @error('meta_title_tr')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <label for="meta_description_ar">{{trans('category_trans.meta_description_ar')}}</label>
                        <div class="input-group  mb-3">
                            <textarea name="meta_description_ar" rows="3" cols="3"
                                      class="form-control @error('meta_description_ar') is-invalid @enderror">{{$category->getTranslation('meta_description','ar')}}</textarea>
                        </div>
                        @error('meta_description_ar')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="meta_description_tr">{{trans('category_trans.meta_description_tr')}}</label>
                        <div class="input-group  mb-3">
                            <textarea name="meta_description_tr" rows="3" cols="3" class="form-control  @error('meta_description_tr') is-invalid @enderror">{{$category->getTranslation('meta_description','tr')}}</textarea>
                        </div>
                        @error('meta_description_tr')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="meta_keywords">{{trans('category_trans.meta_keyword')}}</label><spa class="text-danger">{{trans('category_trans.meta_keyword_note')}}</spa>
                        <div class="input-group  mb-3">
                            <textarea name="meta_keywords" rows="3" cols="3" class="form-control  @error('meta_keywords') is-invalid @enderror">{{$category->meta_keywords}}</textarea>
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

