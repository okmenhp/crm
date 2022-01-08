<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use File;


class BaseController extends Controller
{
    public function __construct()
    {
    }

    public static function uploadImage($image) {
        $file = $image;
        $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
        $file->move('./upload/images/', $fileName);
        $url = "/upload/images/".$fileName;
        return $url; 
    }

    public static function uploadImages($image) {
        $file = $image;
        $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
        $file->move('./upload/avatar/', $fileName);
        $url = "/upload/avatar/".$fileName;
        return $url; 
    }

    protected function test(){
        dd(\App\Helpers\StringHelper::formatDate('12-12-1997'));
    }


}
