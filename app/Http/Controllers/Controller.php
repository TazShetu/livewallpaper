<?php

namespace App\Http\Controllers;

use App\Models\BannerImage;
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


    public function manupulateImages($images)
    {
        foreach ($images as $i) {
            if (($i->category_id * 1) == 3) {
                // cid 3 is for theme
                $i['image_lockScreen'] = $i->image_1;
                $i['image_homeScreen'] = $i->image_2;
                $i['image_main'] = null;
                $i['image_placeholder'] = null;
            } else {
                $i['image_main'] = $i->image_1;
                $i['image_placeholder'] = $i->image_2;
                $i['image_lockScreen'] = null;
                $i['image_homeScreen'] = null;
            }
            unset($i['image_1']);
            unset($i['image_2']);
        }
        return $images;
    }


    public function newCache()
    {
        if (Cache::has('new')) {
            Cache::forget('new');
        }
        $this->newCacheMain();
    }
    public function newCacheMain()
    {
        $a = Category::where('is_new', 1)->get();
        Cache::put('new', $a, now()->addMonths(1));
        return $a;
    }


    public function bannerCache()
    {
        if (Cache::has('banner')) {
            Cache::forget('banner');
        }
        $this->bannerCacheMain();
    }
    public function bannerCacheMain()
    {
        $a = BannerImage::all();
        Cache::put('banner', $a, now()->addMonths(1));
        return $a;
    }


    public function menuCache()
    {
        if (Cache::has('menu')) {
            Cache::forget('menu');
        }
        $this->menuCacheManin();
    }
    public function menuCacheManin()
    {
        $cc = [];
        $categories = Category::all();
        foreach ($categories as $c) {
            $c['subCategory'] = SubCategory::where('category_id', $c->id)->where('is_menu', 1)->orderBy('name')->get();
            if (count($c['subCategory']) > 0) {
                $cc[] = $c;
            }
        }
        Cache::put('menu', $cc, now()->addMonths(1));
        return $cc;
    }


    public function homeCache()
    {
        if (Cache::has('home')) {
            Cache::forget('home');
        }
        $this->homeCacheMain();
    }
    public function homeCacheMain()
    {
        $categories = Category::all();
        foreach ($categories as $c) {
            $images = Image::where('category_id', $c->id)->orderBy('id', 'DESC')->limit(50)->get();
            $images = $this->manupulateImages($images);
            $c['images'] = $images;
        }
        Cache::put('home', $categories, now()->addMonths(1));
        return $categories;
    }

/////////////////////////////////////////////////////// CAN NOT CACHE PAGINATION
//    public function imageCidCache($cid)
//    {
//        if (Cache::has('imageC'.$cid)) {
//            Cache::forget('imageC'.$cid);
//        }
//        $this->imageCidCacheMain($cid);
//    }
//    public function imageCidCacheMain($cid)
//    {
//        $images = Image::where('category_id', $cid)->orderBy('id', 'DESC')->paginate(1);
//        $images = $this->manupulateImages($images);
//        Cache::put('imageC'.$cid, $images, now()->addMonths(1));
//        return $images;
//    }


/////////////////////////////////////////////////////// CAN NOT CACHE PAGINATION
//    public function imageScidCache($scid)
//    {
//        if (Cache::has('imageSC'.$scid)) {
//            Cache::forget('imageSC'.$scid);
//        }
//        $this->imageScidCacheMain($scid);
//    }
//    public function imageScidCacheMain($scid)
//    {
//        $images = Image::where('sub_category_id', $scid)->orderBy('id', 'DESC')->get();
//        $images = $this->manupulateImages($images);
//        Cache::put('imageSC'.$scid, $images, now()->addMonths(1));
//        return $images;
//    }



}
