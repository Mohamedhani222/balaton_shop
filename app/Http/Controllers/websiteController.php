<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\Category;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class websiteController extends Controller
{
    public function index(){
        $data['route']='index_page';
        $data['categories']=Category::where('is_popular',1)->select('id','name','meta_title','meta_description','image','slug')->get();
        $data['products']=product::where('trend',1)->select('id','name','meta_title','meta_description','price','selling_price','image','slug','category_id')->with('category')->get();
        return view('website.index',$data);
    }
    public function getCategories(){
        $data['route']='categories_page';
        $data['categories']=Category::where('is_showing',1)->get();
        return view('website.categories',$data);

    }
    public function getCategoryBySlug($slug){
        if (Category::where('slug',$slug)->exists()){
            $data['route']='categories_page';
            $data['category']=Category::with('products')->where('slug',$slug)->where('is_showing',1)->first();
            return view('website.category',$data);

        }else{
            return redirect('/')->with('error','there is wrong slug');
        }

    }

    public function getProductBySlug($category_product,$product_category){
        if (Category::where('slug',$category_product)->exists()){
            if (product::where('slug',$product_category)->exists()){
                $data['route']='categories_page';
                $data['product']=product::with('category')->where('slug',$product_category)->first();
                $data['keywords']=explode(',',$data['product']->meta_keywords);
                return view('website.product',$data);
            }else{
            return redirect('/')->with('error','there is no product ');

            }
        }else{
            return redirect('/')->with('error','there is no category ');

        }

    }
    public function about(){
        $data['route']='about_page';
        return view('website.about',$data);
    }
        public function categori(){
        return view('website.categori');
    }



    public function contact(){
        $data['route']='contact_page';
        return view('website.contact',$data);
    }
    public function sendEmail(Request $request){
        $details=[
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'subject'=>$request->subject,
            'msg'=>$request->msg
        ];
        Mail::to('grafik.dezayn.abod@gmail.com')->send(new ContactMail($details));
        return back()->with('success','your message has been sent successfully');
    }
}
