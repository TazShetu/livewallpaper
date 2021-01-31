<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Image;
use App\Models\SubCategory;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Cache;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function menuCache()
    {
        if (Cache::has('menu')) {
            Cache::forget('menu');
        }
        $cc = [];
        $categories = Category::all();
        foreach ($categories as $c) {
            $c['subCategory'] = SubCategory::where('category_id', $c->id)->where('is_menu', 1)->get();
            if (count($c['subCategory']) > 0) {
                $cc[] = $c;
            }
        }
        Cache::put('menu', $cc, now()->addMonths(1));
    }


    public function homeCache()
    {
        if (Cache::has('home')) {
            Cache::forget('home');
        }
        $categories = Category::all();
        foreach ($categories as $c) {
            $c['images'] = Image::where('category_id', $c->id)->orderBy('id', 'DESC')->get();
        }
        Cache::put('home', $categories, now()->addMonths(1));
    }


    public function imageCidCache($cid)
    {
        if (Cache::has('imageC'.$cid)) {
            Cache::forget('imageC'.$cid);
        }
        $a = [];
        $images = Image::where('category_id', $cid)->orderBy('id', 'DESC')->get();
        foreach ($images as $i) {
            if (($i->category_id * 1) == 3) {
                // cid 3 is for theme
                $i['image_lockScreen'] = $i->image_1;
                $i['image_homeScreen'] = $i->image_2;
            } else {
                $i['image_main'] = $i->image_1;
                $i['image_placeholder'] = $i->image_2;
            }
            unset($i['image_1']);
            unset($i['image_2']);
            $a[] = $i;
        }
        Cache::put('imageC'.$cid, $a, now()->addMonths(1));
    }


    public function imageScidCache($scid)
    {
        if (Cache::has('imageSC'.$scid)) {
            Cache::forget('imageSC'.$scid);
        }
        $a = [];
        $images = Image::where('sub_category_id', $scid)->orderBy('id', 'DESC')->get();
        foreach ($images as $i) {
            if (($i->category_id * 1) == 3) {
                // cid 3 is for theme
                $i['image_lockScreen'] = $i->image_1;
                $i['image_homeScreen'] = $i->image_2;
            } else {
                $i['image_main'] = $i->image_1;
                $i['image_placeholder'] = $i->image_2;
            }
            unset($i['image_1']);
            unset($i['image_2']);
            $a[] = $i;
        }
        Cache::put('imageSC'.$scid, $a, now()->addMonths(1));
    }


}
