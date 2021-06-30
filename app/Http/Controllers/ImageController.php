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
            $categories = Category::where('id', '<', 4)->get();
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
            ]);
            if ($request->category != 1) {
                $request->validate([
                    'image_placeholder' => 'required|file',
                ]);
            }

            $i = new Image;
            $i->sub_category_id = $request->sub_category;
            if ((($request->sub_category * 1) == 2) || (($request->sub_category * 1) == 4)) {
                $i->category_id = 4;
            } elseif (($request->sub_category * 1) == 3) {
                $i->category_id = 5;
            } else {
                $i->category_id = $request->category;
            }

            $imgThumb = $request->image_thumb;
            $imgOne = $request->image_main;
            $img_name = time() . str_replace(" ", "_", $imgThumb->getClientOriginalName());
            $a = $imgThumb->move('uploads/images', $img_name);
            $d = 'uploads/images/' . $img_name;
            $i->image_thumb = $d;
            if ($imgThumb->getClientOriginalName() == $imgOne->getClientOriginalName()) {
                sleep(1);
            }
            $img_name1 = time() . str_replace(" ", "_", $imgOne->getClientOriginalName());
            $a = $imgOne->move('uploads/images', $img_name1);
            $d1 = 'uploads/images/' . $img_name1;
            $i->image_1 = $d1;

            if ($request->category == 1) {
                $i->image_2 = null;
            } else {
                $imgTwo = $request->image_placeholder;
                if ($imgThumb->getClientOriginalName() == $imgTwo->getClientOriginalName()) {
                    sleep(1);
                }
                if ($imgOne->getClientOriginalName() == $imgTwo->getClientOriginalName()) {
                    sleep(1);
                }
                $img_name2 = time() . str_replace(" ", "_", $imgTwo->getClientOriginalName());
                $a = $imgTwo->move('uploads/images', $img_name2);
                $d2 = 'uploads/images/' . $img_name2;
                $i->image_2 = $d2;
            }


            $i->save();
//            $this->imageCidCache($i->category_id);
//            $this->imageScidCache($i->sub_category_id);
            $this->homeCache();
            $this->homeCache_v2();
            Session::flash('success', "The image has been uploaded successfully.");
            return redirect()->back();
        } else {
            abort(403);
        }
    }


    public function listImage()
    {
        if (Auth::user()->isAbleTo('image')) {
            $categories = Category::all();
            foreach ($categories as $c) {
                $c['total_images'] = Image::where('category_id', $c->id)->count();
            }
            $images = Image::orderBy('id', 'DESC')->paginate(20);
            foreach ($images as $v) {
                $cname = Category::find($v->category_id)->name;
                $scname = SubCategory::find($v->sub_category_id)->name;
                $v['category_name'] = $cname;
                $v['sub_category_name'] = $scname;
            }
            return view('images.list', compact('images', 'categories'));
        } else {
            abort(403);
        }
    }


    public function deleteImage($iid)
    {
        if (Auth::user()->isAbleTo('image')) {
            $i = Image::find($iid);
            if ($i) {
                $cid = $i->category_id;
                $scid = $i->sub_category_id;
                if (file_exists($i->image_thumb)) {
                    unlink($i->image_thumb);
                }
                if (file_exists($i->image_1)) {
                    unlink($i->image_1);
                }
                if (file_exists($i->image_2)) {
                    unlink($i->image_2);
                }
                $i->delete();
//                $this->imageCidCache($cid);
//                $this->imageScidCache($scid);
                $this->homeCache();
                $this->homeCache_v2();
                Session::flash('success', "The image has been deleted successfully.");
                return redirect()->back();
            } else {
                abort(404);
            }
        } else {
            abort(403);
        }
    }


//    public function test()
//    {
//        $subcs = SubCategory::where('id', 2)->get();
//        foreach ($subcs as $s) {
//            $images = Image::where('sub_category_id', 2)->orderBy('id', 'DESC')->limit(40)->get();
//            $images = $this->manupulateImages($images);
//            $s['images'] = $images;
//        }
//        $categories = Category::all();
//        foreach ($categories as $c) {
//            $images = Image::where('category_id', $c->id)->orderBy('id', 'DESC')->limit(40)->get();
//            $images = $this->manupulateImages($images);
//            $c['images'] = $images;
//        }
//
//        $collection = collect($subcs);
//        $merged     = $collection->merge($categories);
//        $result[]   = $merged->all();
//
//        dd($merged->all());
//    }


}
