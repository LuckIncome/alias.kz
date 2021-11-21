<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/* Models */
use App\Models\Category;
use App\Models\ContactEmail;
use App\Models\Footer;
use App\Models\Header;
use App\Models\ContactPhone;
use App\Models\Contacts;
use App\Models\Certificates;
use App\Models\Products;
use App\Models\News;
use App\Models\Promotions;
use App\Models\Reviews;
use App\Models\SocialNetworks;
use App\Models\Subcategory;
use App\Models\User;
use App\Models\SEO;
use App\Models\Application;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\Mail\SendApplication;
use App\Http\Requests\Application\EmailRequest;

class PagesController extends Controller
{
    public function index()
    {
        $category = Category::where('hide', 0)->get();
        $categories = Category::where('hide', 0)->where('popular', 1)->get();
        $header = Header::where('hide', 0)->get();
        $footer = Footer::where('hide', 0)->get();
        $social_networks = SocialNetworks::where('hide', 0)->get();
        $seo = SEO::where('page', 'main')->first();

        // ПОПУЛЯРНЫЕ ТОВАРЫ 1 2 3
        $products_categoty = Products::where('hide', 0)->where('popular', 1)->with('imagePath')->limit(4)->get();
        $review = Reviews::where('hide', 0)->limit(3)->get();
        $news = News::where('hide', 0)->with('imagePath')->limit(4)->get();

        return view('main')->with('products_categoty', $products_categoty)
                           ->with('review', $review)
                           ->with('news', $news)
                           ->with('categories', $categories)
                           ->with('category', $category)
                           ->with('header', $header)
                           ->with('footer', $footer)
                           ->with('social_networks', $social_networks)
                           ->with('seo', $seo);
    }

    // public function catalogs()
    // {
    //     $category = Category::where('hide', 0)->get();
    //     $header = Header::where('hide', 0)->get();
    //     $footer = Footer::where('hide', 0)->get();
    //     $social_networks = SocialNetworks::where('hide', 0)->get();

    //     return view('catalogs')->with('category', $category)
    //                            ->with('header', $header)
    //                            ->with('footer', $footer)
    //                            ->with('social_networks', $social_networks);
    // }

    public function products()
    {
        $category = Category::where('hide', 0)->with('subcategory')->get();
        $header = Header::where('hide', 0)->get();
        $footer = Footer::where('hide', 0)->get();
        $social_networks = SocialNetworks::where('hide', 0)->get();
        $seo = SEO::where('page', 'products')->first();

        $data = Products::where('hide', 0)->with('imagePath')->paginate(9);
        return view('products')->with('data', $data)
                               ->with('category', $category)
                               ->with('header', $header)
                               ->with('footer', $footer)
                               ->with('social_networks', $social_networks)
                               ->with('seo', $seo);
    }

    public function productsCategory($category_id)
    {
        $category = Category::where('hide', 0)->with('subcategory', 'products')->get();
        $header = Header::where('hide', 0)->get();
        $footer = Footer::where('hide', 0)->get();
        $social_networks = SocialNetworks::where('hide', 0)->get();
        $seo = SEO::where('page', 'products')->first();

        $category_slug_id = Category::where('slug', $category_id)->firstOrFail()->id;
        $data = Products::where('hide', 0)->where('category_id', $category_slug_id)->with('imagePath')->paginate(9);
        return view('products')->with('data', $data)
                               ->with('category', $category)
                               ->with('header', $header)
                               ->with('footer', $footer)
                               ->with('social_networks', $social_networks)
                               ->with('seo', $seo);
    }

    public function productsSubcategory($category_id, $subcategory_id)
    {
        $category = Category::where('hide', 0)->with('subcategory')->get();
        $header = Header::where('hide', 0)->get();
        $footer = Footer::where('hide', 0)->get();
        $social_networks = SocialNetworks::where('hide', 0)->get();
        $seo = SEO::where('page', 'products')->first();

        $category_slug_id = Category::where('slug', $category_id)->firstOrFail()->id;
        $subcategory_slug_id = Subcategory::where('slug', $subcategory_id)->firstOrFail()->id;

        $data = Products::where('hide', 0)->where('category_id', $category_slug_id)->where('subcategory_id', $subcategory_slug_id)->with('imagePath')->paginate(9);
        return view('products')->with('data', $data)
                               ->with('category', $category)
                               ->with('header', $header)
                               ->with('footer', $footer)
                               ->with('social_networks', $social_networks)
                               ->with('seo', $seo);
    }

    public function productDetails($id)
    {
        $category = Category::where('hide', 0)->get();
        $header = Header::where('hide', 0)->get();
        $footer = Footer::where('hide', 0)->get();
        $social_networks = SocialNetworks::where('hide', 0)->get();

        $get_slug_id = Products::where('slug', $id)->firstOrFail()->id;
        $data = Products::where('hide', 0)->where('id', $get_slug_id)->with('imagePath')->first();
        return view('products_details')->with('data', $data)
                                       ->with('category', $category)
                                       ->with('header', $header)
                                       ->with('footer', $footer)
                                       ->with('social_networks', $social_networks);
    }

    public function search(Request $request)
    {
        $category = Category::where('hide', 0)->get();
        $header = Header::where('hide', 0)->get();
        $footer = Footer::where('hide', 0)->get();
        $social_networks = SocialNetworks::where('hide', 0)->get();
        $seo = SEO::where('page', 'search')->first();

        $search = $request->input('search');

        if ($search == null) {
            $data = null;
            $data = Products::where('hide', 0)->where('name', 'LIKE', "%{$search}%")->with('imagePath')->take(0)->get();
            return view('search')->with('data', $data)->with('search', $search)
                                 ->with('category', $category)
                                 ->with('header', $header)
                                 ->with('footer', $footer)
                                 ->with('social_networks', $social_networks)
                                 ->with('seo', $seo);
        } else {
            $data = Products::where('hide', 0)->where('name', 'LIKE', "%{$search}%")->with('imagePath')->get();
            return view('search')->with('data', $data)->with('search', $search)
                                 ->with('category', $category)
                                 ->with('header', $header)
                                 ->with('footer', $footer)
                                 ->with('social_networks', $social_networks)
                                 ->with('seo', $seo);
        }
    }

    public function news()
    {
        $category = Category::where('hide', 0)->get();
        $header = Header::where('hide', 0)->get();
        $footer = Footer::where('hide', 0)->get();
        $social_networks = SocialNetworks::where('hide', 0)->get();
        $seo = SEO::where('page', 'news')->first();

        $data = News::where('hide', 0)->with('imagePath')->paginate(9);
        return view('news')->with('data', $data)
                           ->with('category', $category)
                           ->with('header', $header)
                           ->with('footer', $footer)
                           ->with('social_networks', $social_networks)
                           ->with('seo', $seo);
    }

    public function newsDetails($id)
    {
        $category = Category::where('hide', 0)->get();
        $header = Header::where('hide', 0)->get();
        $footer = Footer::where('hide', 0)->get();
        $social_networks = SocialNetworks::where('hide', 0)->get();

        $get_slug_id = News::where('slug', $id)->firstOrFail()->id;
        $data = News::where('hide', 0)->where('id', $get_slug_id)->with('imagePath')->first();
        return view('news_details')->with('data', $data)
                                   ->with('category', $category)
                                   ->with('header', $header)
                                   ->with('footer', $footer)
                                   ->with('social_networks', $social_networks);
    }

    public function promotions()
    {
        $category = Category::where('hide', 0)->get();
        $header = Header::where('hide', 0)->get();
        $footer = Footer::where('hide', 0)->get();
        $social_networks = SocialNetworks::where('hide', 0)->get();
        $seo = SEO::where('page', 'promotions')->first();

        $data = Promotions::where('hide', 0)->with('imagePath')->paginate(9);
        return view('promotions')->with('data', $data)
                                 ->with('category', $category)
                                 ->with('header', $header)
                                 ->with('footer', $footer)
                                 ->with('social_networks', $social_networks)
                                 ->with('seo', $seo);
    }

    public function promotionsDetails($id)
    {
        $category = Category::where('hide', 0)->get();
        $header = Header::where('hide', 0)->get();
        $footer = Footer::where('hide', 0)->get();
        $social_networks = SocialNetworks::where('hide', 0)->get();

        $get_slug_id = Promotions::where('slug', $id)->firstOrFail()->id;
        $data = Promotions::where('hide', 0)->where('id', $get_slug_id)->with('imagePath')->first();
        return view('promotions_details')->with('data', $data)
                                         ->with('category', $category)
                                         ->with('header', $header)
                                         ->with('footer', $footer)
                                         ->with('social_networks', $social_networks);
    }

    public function about()
    {
        $category = Category::where('hide', 0)->get();
        $header = Header::where('hide', 0)->get();
        $footer = Footer::where('hide', 0)->get();
        $social_networks = SocialNetworks::where('hide', 0)->get();
        $seo = SEO::where('page', 'about')->first();

        $data = Certificates::where('hide', 0)->with('image')->take(4)->get();
        return view('about')->with('data', $data)
                            ->with('category', $category)
                            ->with('header', $header)
                            ->with('footer', $footer)
                            ->with('social_networks', $social_networks)
                            ->with('seo', $seo);
    }

    public function branches()
    {
        $category = Category::where('hide', 0)->get();
        $header = Header::where('hide', 0)->get();
        $footer = Footer::where('hide', 0)->get();
        $social_networks = SocialNetworks::where('hide', 0)->get();
        $seo = SEO::where('page', 'branches')->first();

        return view('branches')->with('category', $category)
                               ->with('header', $header)
                               ->with('footer', $footer)
                               ->with('social_networks', $social_networks)
                               ->with('seo', $seo);
    }

    public function reviews()
    {
        $category = Category::where('hide', 0)->get();
        $header = Header::where('hide', 0)->get();
        $footer = Footer::where('hide', 0)->get();
        $social_networks = SocialNetworks::where('hide', 0)->get();
        $seo = SEO::where('page', 'reviews')->first();

        $data = Reviews::where('hide', 0)->paginate(9);
        return view('reviews')->with('data', $data)
                              ->with('category', $category)
                              ->with('header', $header)
                              ->with('footer', $footer)
                              ->with('social_networks', $social_networks)
                              ->with('seo', $seo);
    }

    public function contacts()
    {
        $category = Category::where('hide', 0)->get();
        $header = Header::where('hide', 0)->get();
        $footer = Footer::where('hide', 0)->get();
        $social_networks = SocialNetworks::where('hide', 0)->get();
        $seo = SEO::where('page', 'contacts')->first();

        $data = Contacts::where('hide', 0)->with('contactPhone', 'contactEmail', 'contactAddress')->get();
        return view('contacts')->with('data', $data)
                               ->with('category', $category)
                               ->with('header', $header)
                               ->with('footer', $footer)
                               ->with('social_networks', $social_networks)
                               ->with('seo', $seo);
    }

    public function certificates()
    {
        $category = Category::where('hide', 0)->get();
        $header = Header::where('hide', 0)->get();
        $footer = Footer::where('hide', 0)->get();
        $social_networks = SocialNetworks::where('hide', 0)->get();
        $seo = SEO::where('page', 'certificates')->first();

        $data = Certificates::where('hide', 0)->with('image')->paginate(9);
        return view('certificates')->with('data', $data)
                                   ->with('category', $category)
                                   ->with('header', $header)
                                   ->with('footer', $footer)
                                   ->with('social_networks', $social_networks)
                                   ->with('seo', $seo);
    }

    public function application(Request $request, EmailRequest $email_request)
    {
        try {
            if ($request->check == 'on') {
                Mail::to(env("MAIL_TO", "to@example.com"))->send(new SendApplication($request->company, $request->phone, $request->email));
                Application::updateOrCreate(array_merge($email_request->validated()));

                Session::flash('message');
            } else {
                Session::flash('message-checkbox');
            }

            return redirect('/');
        } catch (\Throwable $th) {
            Session::flash('message-error');
            return redirect('/');
        }

    }
}
