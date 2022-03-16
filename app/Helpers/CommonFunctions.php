<?php

namespace App\Helpers;

use App\AgencyRanking;
use App\News;
use App\NewsCategory;
use App\Notification;
use App\UserNotification;
use Carbon\Carbon;
use Illuminate\Support\Facades\Config;

class CommonFunctions
{

    /**
     * Check time expire
     *
     * @param $time
     * @return bool
     */
    public static function checkExpireTime($time)
    {
        return isset($time) ? \Carbon\Carbon::parse($time)->addHours(Config::get('constants.PASSWORD_USER_EXPIRE'))->isPast() : true;
    }

    /**
     * Get html button edit and delete
     *
     * @param $id
     * @param $urlEdit
     * @param $urlDelete
     * @param $editMethod
     * @param $deleteMethod
     * @param $deleteTitle
     * @param $isView
     * @return string
     *
     */
    public static function getHtmlEditAndDelete($id, $urlEdit, $urlDelete, $editMethod = 'PUT', $deleteMethod = 'DELETE', $deleteTitle = '', $isView = false, $target = "#edit-Record", $classRemove = 'removeRecord')
    {
        $html = '<div class="btn-group btn-group-xs">';
        if ($isView == true) {
            $html .= '<a href="#" title="Xem chi tiết" class="btn btn-warning viewRecordDetail" data-toggle="modal" data-target="#viewRecordDetail" data-id="' . $id . '"><i class="fa fa-eye icon-only"></i></a>';
        }
        if ($urlEdit != 'NONE') {
            $html .= '<a href="#" title="Sửa" class="btn btn-inverse editRecord" data-toggle="modal" data-target="' . $target . '" data-method="' . $editMethod . '" data-url="' . $urlEdit . '" data-id="' . $id . '"><i class="fa fa-pencil icon-only"></i></a>';
        }
        if ($urlDelete != 'NONE') {
            $html .= '<a href="javascript:void(0)" class="btn btn-danger ' . $classRemove . '" title="Xóa" data-method="' . $deleteMethod . '" data-url="' . $urlDelete . '" data-id="' . $id . '" data-delete-title="' . $deleteTitle . '"><i class="fa fa-times icon-only"></i></a>';
        }
        $html .= '</div>';
        return $html;
    }
    /**
     * Get html button edit and delete
     */
    public static function getHtmlEdit($id, $urlEdit, $editMethod = 'PUT', $deleteTitle = '')
    {
        $html = '<div class="btn-group btn-group-xs"><a href="#" title="Sửa" class="btn btn-inverse editRecord" data-toggle="modal" data-target="#edit-Record" data-method="' . $editMethod . '" data-url="' . $urlEdit . '" data-id="' . $id . '"><i class="fa fa-pencil icon-only"></i></a></div>';
        return $html;
    }
    /**
     * Get html button edit and delete
     */
    public static function getHtmlDelete($id, $urlDelete, $deleteMethod = 'DELETE', $deleteTitle = '')
    {
        $html = '<div class="btn-group btn-group-xs"><a href="javascript:void(0)" class="btn btn-danger removeRecord" title="Xóa" data-method="' . $deleteMethod . '" data-url="' . $urlDelete . '" data-id="' . $id . '" data-delete-title="' . $deleteTitle . '"><i class="fa fa-times icon-only"></i></a></div>';
        return $html;
    }

    /**
     * Create key random
     */

    public static function rand_string($length)
    {
        $chars = "0123456789";
        $size = strlen($chars);
        $str = '';
        for ($i = 0; $i < $length; $i++) {
            $str .= $chars[rand(0, $size - 1)];
        }
        return $str;
    }

    /**
     * menu
     */

    public static function menu($data, $parent = 0, $str = "", $select = 0)
    {
        foreach ($data as $value) {
            $id = $value["id"];
            $name = $value["name"];
            if ($value["category_parent_id"] == $parent) {
                if ($select != 0 && $id == $select) {
                    echo '<option value="' . $id . '" selected>' . $str . $name . '</option>';
                } else {
                    echo '<option value="' . $id . '">' . $str . $name . '</option>';
                }
                self::menu($data, $id, $str . "__", $select);
            }
        }
    }

    public static function getImage($value)
    {
        $base_url = url('/');
        $value = str_replace($base_url, '', $value);
        return $value;
    }
    public static function getImageAray($value)
    {
        if ($value) {
            foreach ($value as $item) {
                $base_url = url('/');
                $val = str_replace($base_url, '', $item);
                $row[] = $val;
            }
        } else {
            $row = null;
        }
        return $row;
    }

    public static function route($name, $parameters = [])
    {
        if ($parameters[0] == env('APP_LOCALE')) {
            unset($parameters[0]);
        }
        return route($name, $parameters);
    }

    public static function dochangchuc($so, $daydu)
    {
        $mangso = array('không', 'một', 'hai', 'ba', 'bốn', 'năm', 'sáu', 'bảy', 'tám', 'chín');
        $chuoi = "";
        $chuc = floor($so / 10);
        $donvi = $so % 10;
        if ($chuc > 1) {
            $chuoi = " " . $mangso[$chuc] . " mươi";
            if ($donvi == 1) {
                $chuoi .= " mốt";
            }
        } else if ($chuc == 1) {
            $chuoi = " mười";
            if ($donvi == 1) {
                $chuoi .= " một";
            }
        } else if ($daydu && $donvi > 0) {
            $chuoi = " lẻ";
        }
        if ($donvi == 5 && $chuc > 1) {
            $chuoi .= " lăm";
        } else if ($donvi > 1 || ($donvi == 1 && $chuc == 0)) {
            $chuoi .= " " . $mangso[$donvi];
        }
        return $chuoi;
    }

    public static function docblock($so, $daydu)
    {
        $mangso = array('không', 'một', 'hai', 'ba', 'bốn', 'năm', 'sáu', 'bảy', 'tám', 'chín');
        $chuoi = "";
        $tram = floor($so / 100);
        $so = $so % 100;
        if ($daydu || $tram > 0) {
            $chuoi = " " . $mangso[$tram] . " trăm";
            $chuoi .= self::dochangchuc($so, true);
        } else {
            $chuoi = self::dochangchuc($so, false);
        }
        return $chuoi;
    }

    public static function dochangtrieu($so, $daydu)
    {
        $chuoi = "";
        $trieu = floor($so / 1000000);
        $so = $so % 1000000;
        if ($trieu > 0) {
            $chuoi = self::docblock($trieu, $daydu) . " triệu";
            $daydu = true;
        }
        $nghin = floor($so / 1000);
        $so = $so % 1000;
        if ($nghin > 0) {
            $chuoi .= self::docblock($nghin, $daydu) . " nghìn";
            $daydu = true;
        }
        if ($so > 0) {
            $chuoi .= self::docblock($so, $daydu);
        }
        return $chuoi;
    }

    public static function docso($so)
    {
        $mangso = array('không', 'một', 'hai', 'ba', 'bốn', 'năm', 'sáu', 'bảy', 'tám', 'chín');
        if ($so == 0)
            return $mangso[0];
        $chuoi = "";
        $hauto = "";
        do {
            $ty = $so % 1000000000;
            $so = floor($so / 1000000000);
            if ($so > 0) {
                $chuoi = self::dochangtrieu($ty, true) . $hauto . $chuoi;
            } else {
                $chuoi = self::dochangtrieu($ty, false) . $hauto . $chuoi;
            }
            $hauto = " tỷ";
        } while ($so > 0);
        return ucfirst(trim($chuoi));
    }

    public static function replaceSpaceImg($input)
    {
        $pattern = '/src=[\'\"](.*?)[\'\"]/';
        $result = preg_replace_callback($pattern, function ($matches) {
            return "src='" . str_replace(" ", "%20", $matches[1]) . "'";
        }, $input);
        return $result;
    }
}
