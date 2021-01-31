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
                'is_menu' => 'required',
            ]);
            if (($request->is_menu * 1) == 1) {
                $request->validate([
                    'thumb_image' => 'required|file',
                    'background_image' => 'required|file',
                ]);
            }
            $sc1 = new SubCategory;
            $sc1->category_id = $request->category_id;
            $sc1->name = $request->name;
            $sc1->description = $request->description;
            $sc1->is_menu = $request->is_menu;
            if ($request->hasFile('thumb_image') && $request->hasFile('background_image')) {
                $imgThumb = $request->thumb_image;
                $imgOne = $request->background_image;
                $img_name = time() . urlencode(str_replace(" ", "_", $imgThumb->getClientOriginalName()));
                $a = $imgThumb->move('uploads/subCategory', $img_name);
                $d = 'uploads/subCategory/' . $img_name;
                $sc1->image_thumb = $d;
                if ($imgThumb->getClientOriginalName() == $imgOne->getClientOriginalName()) {
                    sleep(1);
                }
                $img_name1 = time() . urlencode(str_replace(" ", "_", $imgOne->getClientOriginalName()));
                $a = $imgOne->move('uploads/subCategory', $img_name1);
                $d1 = 'uploads/subCategory/' . $img_name1;
                $sc1->image_background = $d1;
            }
            $sc1->save();
//            Cache::forget('all');
            if (($sc1->is_menu * 1) == 1) {
                $this->menuCache();
            }
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
                if (($request->is_menu * 1) == 1) {
                    if ($cedit->image_thumb == null) {
                        $request->validate([
                            'thumb_image' => 'required|file',
                        ]);
                    }
                    if ($cedit->image_background == null) {
                        $request->validate([
                            'background_image' => 'required|file',
                        ]);
                    }
                }
                $cedit->category_id = $request->category_id;
                $cedit->name = $request->name;
                $cedit->description = $request->description;
                $cedit->is_menu = $request->is_menu;
                if ($request->hasFile('thumb_image')) {
                    if ($cedit->image_thumb != null) {
                        unlink($cedit->image_thumb);
                    }
                    $imgThumb = $request->thumb_image;
                    $img_name = time() . urlencode(str_replace(" ", "_", $imgThumb->getClientOriginalName()));
                    $a = $imgThumb->move('uploads/subCategory', $img_name);
                    $d = 'uploads/subCategory/' . $img_name;
                    $cedit->image_thumb = $d;
                }
                if ($request->hasFile('background_image')) {
                    if ($cedit->image_background != null) {
                        unlink($cedit->image_background);
                    }
                    $imgOne = $request->background_image;
                    if ($request->hasFile('thumb_image')) {
                        $imgThumb = $request->thumb_image;
                        if ($imgThumb->getClientOriginalName() == $imgOne->getClientOriginalName()) {
                            sleep(1);
                        }
                    }
                    $img_name1 = time() . urlencode(str_replace(" ", "_", $imgOne->getClientOriginalName()));
                    $a = $imgOne->move('uploads/subCategory', $img_name1);
                    $d1 = 'uploads/subCategory/' . $img_name1;
                    $cedit->image_background = $d1;
                }
                $cedit->update();
//                Cache::forget('all');
                $this->menuCache();
                $this->imageScidCache($cid);

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
