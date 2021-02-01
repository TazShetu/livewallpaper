<?php

namespace App\Http\Controllers;

use App\Models\BannerImage;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class BannerImageController extends Controller
{
    public function index()
    {
        if (Auth::user()->isAbleTo('image')) {
            $categories = Category::all();
            $bImages = BannerImage::all();
            foreach ($bImages as $bi) {
                $bi['category_name'] = Category::find($bi->category_id)->name;
            }
            return view('images.banner', compact('categories', 'bImages'));
        } else {
            abort(403);
        }
    }


    public function store(Request $request)
    {
        if (Auth::user()->isAbleTo('image')) {
            $request->validate([
                'category' => 'required',
                'banner' => 'required|file',
            ]);
            $i = new BannerImage;
            $i->category_id = $request->category;
            $imgThumb = $request->banner;
            $img_name = time() . urlencode(str_replace(" ", "_", $imgThumb->getClientOriginalName()));
            $a = $imgThumb->move('uploads/images/banner', $img_name);
            $d = 'uploads/images/banner/' . $img_name;
            $i->image = $d;
            $i->save();
//            Cache::forget('all');
            $this->bannerCache();
            Session::flash('success', "The banner image has benn uploaded successfully.");
            return redirect()->back();
        } else {
            abort(403);
        }
    }


    public function destroy($bid)
    {
        if (Auth::user()->isAbleTo('image')) {
            $i = BannerImage::find($bid);
            if ($i) {
//                $vsc2id = $v->sub_category_two_id;
                unlink($i->image);
                $i->delete();
//                Cache::forget('all');
                $this->bannerCache();
                Session::flash('success', "The banner image has benn deleted successfully.");
                return redirect()->back();
            } else {
                abort(404);
            }
        } else {
            abort(403);
        }
    }




}
