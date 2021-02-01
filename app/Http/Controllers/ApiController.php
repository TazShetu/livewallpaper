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
            $a = $this->newCacheMain();
        }
        $responseArray['new'] = $a;
        if (Cache::has('menu')) {
            $cc = Cache::get('menu');
        } else {
            $cc = $this->menuCacheManin();
        }
        $responseArray['menu'] = $cc;
        return response()->json($responseArray, 200);
    }


//    public function getBanners()
//    {
//        $responseArray = [];
//        if (Cache::has('banner')) {
//            $a = Cache::get('banner');
//        } else {
//            $a = $this->bannerCacheMain();
//        }
//        $responseArray['banner'] = $a;
//        return response()->json($responseArray, 200);
//    }


    public function home()
    {
        $responseArray = [];
        if (Cache::has('banner')) {
            $a = Cache::get('banner');
        } else {
            $a = $this->bannerCacheMain();
        }
        $responseArray['banner'] = $a;
        if (Cache::has('home')) {
            $categories = Cache::get('home');
        } else {
            $categories = $this->homeCacheMain();
        }
        $responseArray['categories'] = $categories;
        return response()->json($responseArray, 200);
    }


    public function imageFromCategory($cid)
    {
        $responseArray = [];
//        if (Cache::has('imageC'.$cid)) {
//            $a = Cache::get('imageC'.$cid);
//        } else {
//            $a = $this->imageCidCacheMain($cid);
//        }
        $images = Image::where('category_id', $cid)->orderBy('id', 'DESC')->paginate(50);
        $images = $this->manupulateImages($images);
        foreach ($images as $i) {
            $i['subCategory'] = SubCategory::find($i->sub_category_id);
        }
        $responseArray['images'] = $images;
        return response()->json($responseArray, 200);
    }



    public function imageFromSubCategory($scid)
    {
        $responseArray = [];
//        if (Cache::has('imageSC'.$scid)) {
//            $a = Cache::get('imageSC'.$scid);
//        } else {
//            $a = $this->imageScidCacheMain($scid);
//        }
        $images = Image::where('sub_category_id', $scid)->orderBy('id', 'DESC')->paginate(50);
        $images = $this->manupulateImages($images);
        $responseArray['images'] = $images;
        return response()->json($responseArray, 200);
    }


}
