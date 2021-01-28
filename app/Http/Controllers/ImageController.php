<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Image;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ImageController extends Controller
{

    public function upload()
    {
        if (Auth::user()->isAbleTo('image')) {
            $categories = Category::all();
            $subCategories = SubCategory::all();
            foreach ($subCategories as $sb) {
                $sb['category_name'] = Category::find($sb->category_id)->name;
            }
            return view('images.upload', compact('categories', 'subCategories'));
        } else {
            abort(403);
        }
    }


    public function uploadStore(Request $request)
    {
        if (Auth::user()->isAbleTo('image')) {
            $request->validate([
                'category' => 'required',
                'sub_category' => 'required',
                'image_thumb' => 'required|file',
                'image_main' => 'required|file',
                'image_placeholder' => 'required|file',
            ]);
            $i = new Image;
            $i->category_id = $request->category;
            $i->sub_category_id = $request->sub_category;

            $imgThumb = $request->image_thumb;
            $imgOne = $request->image_main;
            $imgTwo = $request->image_placeholder;
            $img_name = time() . urlencode(str_replace(" ", "_", $imgThumb->getClientOriginalName()));
            $a = $imgThumb->move('uploads/images', $img_name);
            $d = 'uploads/images/' . $img_name;
            $i->image_thumb = $d;
            if (($imgThumb->getClientOriginalName() == $imgOne->getClientOriginalName())
                || ($imgThumb->getClientOriginalName() == $imgTwo->getClientOriginalName())) {
                sleep(1);
            }
            $img_name1 = time() . urlencode(str_replace(" ", "_", $imgOne->getClientOriginalName()));
            $a = $imgOne->move('uploads/images', $img_name1);
            $d1 = 'uploads/images/' . $img_name1;
            $i->image_1 = $d1;
            if ($imgOne->getClientOriginalName() == $imgTwo->getClientOriginalName()) {
                sleep(1);
            }
            $img_name2 = time() . urlencode(str_replace(" ", "_", $imgTwo->getClientOriginalName()));
            $a = $imgTwo->move('uploads/images', $img_name2);
            $d2 = 'uploads/images/' . $img_name2;
            $i->image_2 = $d2;

            $i->save();
//            Cache::forget('all');
//            if (Cache::has('video' . "$v->sub_category_two_id")) {
//                Cache::forget('video' . "$v->sub_category_two_id");
//                $a = Video::where('sub_category_two_id', $v->sub_category_two_id)->get();
//                Cache::put('video' . "$v->sub_category_two_id", $a, now()->addMonths(1));
//            }
            Session::flash('success', "The image has benn uploaded successfully.");
            return redirect()->back();
        } else {
            abort(403);
        }
    }


    public function listImage()
    {
        if (Auth::user()->isAbleTo('image')) {

            $images = Image::paginate(2);
            foreach ($images as $v) {
                $cname = Category::find($v->category_id)->name;
                $scname = SubCategory::find($v->sub_category_id)->name;
                $v['category_name'] = $cname;
                $v['sub_category_name'] = $scname;
            }
            return view('images.list', compact('images'));
        } else {
            abort(403);
        }
    }


    public function deleteImage($iid)
    {
        if (Auth::user()->isAbleTo('image')) {
            $i = Image::find($iid);
            if ($i) {
//                $vsc2id = $v->sub_category_two_id;
                unlink($i->image_thumb);
                unlink($i->image_1);
                unlink($i->image_2);
                $i->delete();
//                Cache::forget('all');
//                if (Cache::has('video' . "$vsc2id")) {
//                    Cache::forget('video' . "$vsc2id");
//                    $a = Video::where('sub_category_two_id', $vsc2id)->get();
//                    Cache::put('video' . "$vsc2id", $a, now()->addMonths(1));
//                }
                Session::flash('success', "The image has benn deleted successfully.");
                return redirect()->back();
            } else {
                abort(404);
            }
        } else {
            abort(403);
        }
    }


}