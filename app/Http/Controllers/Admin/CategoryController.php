<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\storeCategoryRequest;
use App\Http\Requests\UbdateCategoryRequest;
use App\Models\Category;
use Illuminate\Support\Facades\File;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['route'] = 'categories';
        $data['categories'] = Category::select('id', 'name', 'image', 'is_showing', 'is_popular')->get();


        return view('admin.category.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['route'] = 'categories';
        return view('admin.Category.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(storeCategoryRequest $request)
    {
        try {

            $validate = $request->validated();


            $image = $request->file('image')->store('images/Category');

            $category = new category();
            $category->name = ['ar' => $request->name_ar, 'tr' => $request->name_tr];
            $category->slug = $request->slug;
            $category->description = ['ar' => $request->description_ar, 'tr' => $request->description_tr];
            $category->is_showing = $request->is_showing ? '1' : '0';
            $category->is_popular = $request->is_popular ? '1' : '0';
            $category->meta_title = ['ar' => $request->meta_title_ar, 'tr' => $request->meta_title_tr];
            $category->meta_description = ['ar' => $request->meta_description_ar, 'tr' => $request->meta_description_tr];
            $category->meta_keywords = $request->meta_keywords;
            $category->image = $image;
            $category->save();

            toastr()->success(trans("messages_trans.success_save"), 'Congrats', ['timeOut' => 5000]);
            return redirect()->route('categories.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        $data['route'] = 'categories';
        $data['category'] = $category;
        return view('admin.category.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {

        $data['route'] = 'categories';
        $data['category'] = $category;
        return view('admin.category.edit', $data);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UbdateCategoryRequest $request, Category $category)
    {
        try {

            $validate = $request->validated();
            $image = $category->image;
            if ($request->hasFile('image')) {
                $image_path = public_path($category->image);
                if (file_exists($image_path)) {
                    File::delete($image_path);
                }
                $image = $request->file('image')->store('images/Category');
            }

            $category->update([
                'name' => ['ar' => $request->name_ar, 'tr' => $request->name_tr],
                'slug' => $request->slug,
                'description' => ['ar' => $request->description_ar, 'tr' => $request->description_tr],
                'is_showing' => $request->is_showing ? '1' : '0',
                'is_popular' => $request->is_popular ? '1' : '0',
                'meta_title' => ['ar' => $request->meta_title_ar, 'tr' => $request->meta_title_tr],
                'meta_description' => ['ar' => $request->meta_description_ar, 'tr' => $request->meta_description_tr],
                'meta_keywords' => $request->meta_keywords,
                'image' => $image,
            ]);
            toastr()->success(trans("messages_trans.success_update"), 'Congrats', ['timeOut' => 5000]);
            return redirect()->route('categories.index');
        } catch (\Exception $e) {
            return redirect()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)

    {
        $image_path = public_path($category->image);
        if (file_exists($image_path)) {
            File::delete($image_path);
        }
        $category->delete();
        return redirect()->route('categories.index')->with('success', trans("messages_trans.success_delete"));


    }
}
