<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{

    public function index()
    {
        if (Auth::user()->isAbleTo('category')) {
            $categories = Category::all();
            return view('category.index', compact('categories'));
        } else {
            abort(403);
        }
    }


    public function store(Request $request)
    {
        if (Auth::user()->isAbleTo('category')) {
            $request->validate([
                'name' => 'required|unique:categories,name',
            ]);
            DB::beginTransaction();
            try {
                $c = new Category;
                $c->name = $request->name;
                $c->description = $request->description;
                $c->save();
//            Cache::forget('all');
//            if (Cache::has('video_categories')) {
//                Cache::forget('video_categories');
//                $a = VideoCategory::all();
//                Cache::put('video_categories', $a, now()->addMonths(1));
//            }
                $sc = new SubCategory;
                $sc->category_id = $c->id;
                $sc->name = 'Default';
                $sc->save();
                DB::commit();
                $success = true;
            } catch (\Exception $e) {
                $success = false;
                DB::rollback();
            }
            if ($success) {
                Session::flash('success', "The Category has been created successfully.");
                return redirect()->back();
            } else {
                Session::flash('unSuccess', "Something went wrong :(");
                return redirect()->back();
            }
        } else {
            abort(403);
        }
    }


    public function edit($cid)
    {
        if (Auth::user()->isAbleTo('category')) {
            $cedit = Category::find($cid);
            if ($cedit) {
                $categories = Category::all();
                return view('category.edit', compact('categories', 'cedit'));
            } else {
                abort(404);
            }
        } else {
            abort(403);
        }
    }


    public function update(Request $request, $cid)
    {
        if (Auth::user()->isAbleTo('category')) {
            $request->validate([
                'name' => 'required',
            ]);
            $cedit = Category::find($cid);
            if ($cedit) {
                if ($cedit->name != $request->name) {
                    $request->validate([
                        'name' => 'unique:categories,name',
                    ]);
                }
                $cedit->name = $request->name;
                $cedit->description = $request->description;
                $cedit->update();
//                Cache::forget('all');
//                if (Cache::has('video_categories')) {
//                    Cache::forget('video_categories');
//                    $a = VideoCategory::all();
//                    Cache::put('video_categories', $a, now()->addMonths(1));
//                }
                Session::flash('success', "The Category has been updated successfully.");
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
        if (Auth::user()->isAbleTo('category')) {
            $cedit = Category::find($cid);
            if ($cedit) {
                dd('VideoCategoryController destroy()');
            } else {
                abort(404);
            }
        } else {
            abort(403);
        }
    }
}