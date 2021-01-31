<?php

namespace App\Http\Controllers;

use App\Models\BannerImage;
use App\Models\Category;
use App\Models\Image;
use App\Models\Music;
use App\Models\SubCategory;
use App\Models\Video;
use App\Models\VideoCategory;
use App\Models\VideoSubCategoryOne;
use App\Models\VideoSubCategoryTwo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;
use Laravel\Passport\Passport;

class ApiController extends Controller
{

    public function loginFail()
    {
        return response()->json([
            'error' => 'Token Error'
        ], 401);
    }


    public function loginu(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_name' => 'required',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 401);
        } elseif (Auth::attempt(['user_name' => $request->user_name, 'password' => $request->password])) {
            $user = Auth::user();
            if ($user->is_app == 1) {
                $responseArray = [];
//            Passport::personalAccessTokensExpireIn(now()->addHour(1));
//            Passport::personalAccessTokensExpireIn(now()->addWeeks(1));
//            Passport::personalAccessTokensExpireIn(now()->addMonths(1));
                Passport::personalAccessTokensExpireIn(now()->addDays(365));
                $responseArray['token'] = $user->createToken('userToken', ['user'])->accessToken;
                $responseArray['expire'] = "365 days from now";
                return response()->json($responseArray, 200);
            } else {
                return response()->json([
                    'error' => 'unauthorized'
                ], 401);
            }
        } else {
            return response()->json([
                'error' => 'unauthorized'
            ], 401);
        }
    }


    public function getMenus()
    {
        $responseArray = [];
        if (Cache::has('new')) {
            $a = Cache::get('new');
        } else {
            $a = Category::where('is_new', 1)->get();
            Cache::put('new', $a, now()->addMonths(1));
        }
        if (Cache::has('menu')) {
            $cc = Cache::get('menu');
        } else {
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
        $responseArray['new'] = $a;
        $responseArray['menu'] = $cc;
        return response()->json($responseArray, 200);
    }


    public function getBanners()
    {
        $responseArray = [];
        if (Cache::has('banner')) {
            $a = Cache::get('banner');
        } else {
            $a = BannerImage::all();
            Cache::put('banner', $a, now()->addMonths(1));
        }
        $responseArray['banner'] = $a;
        return response()->json($responseArray, 200);
    }


    public function home()
    {
        $responseArray = [];


        if (Cache::has('home')) {
            $categories = Cache::get('home');
        } else {
            $categories = Category::all();
            foreach ($categories as $c) {
                $c['images'] = Image::where('category_id', $c->id)->orderBy('id', 'DESC')->get();
            }
            Cache::put('home', $categories, now()->addMonths(1));
        }
        $responseArray['images'] = $categories;
        return response()->json($responseArray, 200);
    }


    public function imageFromCategory($cid)
    {
        $responseArray = [];
        if (Cache::has('imageC'.$cid)) {
            $a = Cache::get('imageC'.$cid);
        } else {
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
        $responseArray['images'] = $a;
        return response()->json($responseArray, 200);
    }



    public function imageFromSubCategory($scid)
    {
        $responseArray = [];
        if (Cache::has('imageSC'.$scid)) {
            $a = Cache::get('imageSC'.$scid);
        } else {
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
        $responseArray['images'] = $a;
        return response()->json($responseArray, 200);
    }


}
