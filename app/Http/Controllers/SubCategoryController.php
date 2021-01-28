<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class SubCategoryController extends Controller
{

    public function index()
    {
        if (Auth::user()->isAbleTo('sub_category')) {
            $subCategories = SubCategory::where('name', '!=', 'Default')->get();
            foreach ($subCategories as $sb) {
                $sb['category_name'] = Category::find($sb->category_id)->name;
            }
            $categories = Category::all();
            return view('subCategory.index', compact('subCategories','categories'));
        } else {
            abort(403);
        }
    }


    public function store(Request $request)
    {
        if (Auth::user()->isAbleTo('sub_category')) {
            $request->validate([
                'category_id' => 'required',
                'name' => 'required',
            ]);
            $sc1 = new SubCategory;
            $sc1->category_id = $request->category_id;
            $sc1->name = $request->name;
            $sc1->description = $request->description;
            $sc1->save();
//            Cache::forget('all');
//            if (Cache::has('video_sub_categories_one'."$sc1->category_id")) {
//                Cache::forget('video_sub_categories_one'."$sc1->category_id");
//                $a = VideoSubCategoryOne::where('category_id', $sc1->category_id)->get();
//                Cache::put('video_sub_categories_one'."$sc1->category_id", $a, now()->addMonths(1));
//            }
            Session::flash('success', "The Sub Category has been created successfully.");
            return redirect()->back();
        } else {
            abort(403);
        }
    }


    public function edit($cid)
    {
        if (Auth::user()->isAbleTo('sub_category')) {
            $scOneedit = SubCategory::find($cid);
            if ($scOneedit) {
                $subCategories = SubCategory::where('name', '!=', 'Default')->get();;
                foreach ($subCategories as $sb) {
                    $sb['category_name'] = Category::find($sb->category_id)->name;
                }
                $categories = Category::all();
                return view('subCategory.edit', compact('categories', 'scOneedit', 'subCategories'));
            } else {
                abort(404);
            }
        } else {
            abort(403);
        }
    }


    public function update(Request $request, $cid)
    {
        if (Auth::user()->isAbleTo('sub_category')) {
            $request->validate([
                'category_id' => 'required',
                'name' => 'required',
            ]);
            $cedit = SubCategory::find($cid);
            if ($cedit) {
                $cedit->category_id = $request->category_id;
                $cedit->name = $request->name;
                $cedit->description = $request->description;
                $cedit->update();
//                Cache::forget('all');
//                if (Cache::has('video_sub_categories_one'."$cedit->category_id")) {
//                    Cache::forget('video_sub_categories_one'."$cedit->category_id");
//                    $a = VideoSubCategoryOne::where('category_id', $cedit->category_id)->get();
//                    Cache::put('video_sub_categories_one'."$cedit->category_id", $a, now()->addMonths(1));
//                }
                Session::flash('success', "The Sub Category has been updated successfully.");
                return redirect()->back();
            } else {
                abort(404);
            }
        } else {
            abort(403);
        }
    }


    public function destroy($cid)
    {
        if (Auth::user()->isAbleTo('sub_category')) {
            $cedit = SubCategory::find($cid);
            if ($cedit) {
                dd('VideoSubCategoryOneController destroy()');
            } else {
                abort(404);
            }
        } else {
            abort(403);
        }
    }
}
