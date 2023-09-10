<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\storeProductRequest;
use App\Http\Requests\updateProductRequest;
use App\Models\Category;
use App\Models\product;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['route'] = 'products';
        $data['products'] = product::select('id', 'category_id', 'name', 'image', 'status', 'trend')->get();

        return view('admin.product.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['route'] = 'products';
        $data['categories'] = category::select('id', 'name')->get();
        return view('admin.product.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(storeProductRequest $request)
    {

        try {
            $validate = $request->validated();
            $image = $request->file('image')->store('images/product');
            $product = new product();
            $product->category_id = $request->category_id;
            $product->name = ['ar' => $request->name_ar, 'tr' => $request->name_tr];
            $product->slug = $request->slug;
            $product->short_description = ['ar' => $request->short_description_ar, 'tr' => $request->short_description_tr];
            $product->description = ['ar' => $request->description_ar, 'tr' => $request->description_tr];
            $product->status = $request->status ? '1' : '0';
            $product->trend = $request->trend ? '1' : '0';
            $product->price = $request->price;
            $product->selling_price = $request->selling_price;
            $product->qty = $request->qty;
            $product->tax = $request->tax;
            $product->meta_title = $request->meta_title;
            $product->meta_description = ['ar' => $request->meta_description_ar, 'tr' => $request->meta_description_tr];
            $product->meta_keywords = $request->meta_keywords;
            $product->image = $image;
            $product->save();

            return redirect()->route('products.index')->with('success', trans('messages_trans.success_save'));

        } catch (\Exception $e) {
            flash($e->getMessage());
            return redirect()->back()->with(['error_catch' => $e->getMessage()]);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(product $product)
    {
        $data['route'] = 'products';
        $data['product'] = $product;
        return view('admin.product.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(product $product)
    {
        $data['route'] = 'products';
        $data['product'] = $product;
        $data['categories'] = category::select('id', 'name')->get();
        return view('admin.product.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(updateProductRequest $request, product $product)
    {
        try {

            $validate = $request->validated();
            $image = $product->image;
            if ($request->hasFile('image')) {
//                Storage::delete($image);
                $image_path = public_path($product->image);
                if (file_exists($image_path)) {
                    File::delete($image_path);
                }

                $image = $request->file('image')->store('images/product');
            }

            $product->update([
                'category_id' => $request->category_id,
                'name' => ['ar' => $request->name_ar, 'tr' => $request->name_tr],
                'slug' => $request->slug,
                'short_description' => ['ar' => $request->short_description_ar, 'tr' => $request->short_description_tr],
                'description' => ['ar' => $request->description_ar, 'tr' => $request->description_tr],
                'status' => $request->status ? '1' : '0',
                'trend' => $request->trend ? '1' : '0',
                'price' => $request->price,
                'selling_price' => $request->selling_price,
                'qty' => $request->qty,
                'tax' => $request->tax,
                'meta_title' => $request->meta_title,
                'meta_description' => ['ar' => $request->meta_description_ar, 'tr' => $request->meta_description_tr],
                'meta_keywords' => $request->meta_keywords,
                'image' => $image,
            ]);
            flash(trans("messages_trans.success_update"), 'Congrats', ['timeOut' => 5000]);
            return redirect()->route('products
            .index');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error_catch' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(product $product)

    {
        $image_path = public_path($product->image);
        if (file_exists($image_path)) {
            File::delete($image_path);
        }
        $product->delete();
        return redirect()->route('products.index')->with('success',trans("messages_trans.success_delete"));
    }
}
