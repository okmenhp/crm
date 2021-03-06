<?php

namespace App\Helpers;
use Illuminate\Support\Str;

class StringHelper {

    public static function getSelectTitleOptions($options, $selected = '') {
        $html = '<option></option>';
        foreach ($options as $option) {
            $html .= '<option value="' . $option->id . '"' . ((is_array($selected) ? in_array($option->id, $selected) : $selected == $option->id) ? 'selected' : '') . '>' . $option->title . '</option>';
        }
        return $html;
    }
    public static function getSelectNameOptions($options, $selected = '') {
        $html = '';
        foreach ($options as $option) {
            $html .= '<option value="' . $option->id . '"' . ((is_array($selected) ? in_array($option->id, $selected) : $selected == $option->id) ? 'selected' : '') . '>' . $option->name . '</option>';
        }
        return $html;
    }
    public static function getSelectFullNameOptions($options, $selected = '') {
        $html = '';
        foreach ($options as $option) {
            $html .= '<option value="' . $option->id . '"' . ((is_array($selected) ? in_array($option->id, $selected) : $selected == $option->id) ? 'selected' : '') . '>' . $option->full_name . '</option>';
        }
        return $html;
    }
    public static function getSelectRoleOptions($options, $selected = '') {
        $html = '<option></option>';
        foreach ($options as $option) {
            $html .= '<option value="' . $option->id . '"' . ((is_array($selected) ? in_array($option->id, $selected) : $selected == $option->id) ? 'selected' : '') . '>' . $option->name . '</option>';
        }
        return $html;
    }
    public static function getSelectOptionsNormal($options, $selected = '') {
        $html = '';
        foreach ($options as $option) {
            $html .= '<option value="' . $option->id . '"' . ((is_array($selected) ? in_array($option->id, $selected) : $selected == $option->id) ? 'selected' : '') . '>' . $option->title . '</option>';
        }
        return $html;
    }

    public static function formatDate($data){
        return date('d-m-Y', strtotime($data));
    }

    public static function formatDateTime($data){
        return date('d-m-Y H:i:s', strtotime($data));
    }



    public static function slug($str) {
        $str = trim(mb_strtolower($str));
        $str = preg_replace('/(??|??|???|???|??|??|???|???|???|???|???|??|???|???|???|???|???)/', 'a', $str);
        $str = preg_replace('/(??|??|???|???|???|??|???|???|???|???|???)/', 'e', $str);
        $str = preg_replace('/(??|??|???|???|??)/', 'i', $str);
        $str = preg_replace('/(??|??|???|???|??|??|???|???|???|???|???|??|???|???|???|???|???)/', 'o', $str);
        $str = preg_replace('/(??|??|???|???|??|??|???|???|???|???|???)/', 'u', $str);
        $str = preg_replace('/(???|??|???|???|???)/', 'y', $str);
        $str = preg_replace('/(??)/', 'd', $str);
        $str = preg_replace('/[^a-z0-9-\s]/', '', $str);
        $str = preg_replace('/([\s]+)/', '-', $str);
        $str = preg_replace('/---/', '-', $str);
        return $str;
    }

    public static function removeVietnameseSign($str) {
        $str = preg_replace("/(??|??|???|???|??|??|???|???|???|???|???|??|???|???|???|???|???)/", 'a', $str);
        $str = preg_replace("/(??|??|???|???|???|??|???|???|???|???|???)/", 'e', $str);
        $str = preg_replace("/(??|??|???|???|??)/", 'i', $str);
        $str = preg_replace("/(??|??|???|???|??|??|???|???|???|???|???|??|???|???|???|???|???)/", 'o', $str);
        $str = preg_replace("/(??|??|???|???|??|??|???|???|???|???|???)/", 'u', $str);
        $str = preg_replace("/(???|??|???|???|???)/", 'y', $str);
        $str = preg_replace("/(??)/", 'd', $str);
        $str = preg_replace("/(??|??|???|???|??|??|???|???|???|???|???|??|???|???|???|???|???)/", 'A', $str);
        $str = preg_replace("/(??|??|???|???|???|??|???|???|???|???|???)/", 'E', $str);
        $str = preg_replace("/(??|??|???|???|??)/", 'I', $str);
        $str = preg_replace("/(??|??|???|???|??|??|???|???|???|???|???|??|???|???|???|???|???)/", 'O', $str);
        $str = preg_replace("/(??|??|???|???|??|??|???|???|???|???|???)/", 'U', $str);
        $str = preg_replace("/(???|??|???|???|???)/", 'Y', $str);
        $str = preg_replace("/(??)/", 'D', $str);
        return $str;
    }

    public static function getAlias($str) {
        $str = strip_tags($str);
        $str = self::removeVietnameseSign($str);
        $allowed = "/[^A-Za-z0-9- ]/i";
        $str = preg_replace($allowed, '', $str);
        $str = trim($str);
        while (strpos($str, '  ') !== FALSE) {
            $str = str_replace('  ', ' ', $str);
        }
        $str = str_replace(' ', '-', $str);
        while (strpos($str, '--') !== FALSE) {
            $str = str_replace('--', '-', $str);
        }
        $str = strtolower($str);
        return $str;
    }

    public static function getTextInput($name, $value, $options = null) {
        return '
			<div class="form-group col-md-12">
				<input type="text" name="' . $name . '" class="form-control" placeholder="" value="' . $value . '"/>
            </div>';
    }

    public static function getNumberInput($name, $value, $options = null) {
        return '
			<div class="form-group col-md-12">
				<input type="number" name="' . $name . '" class="form-control" placeholder="" value="' . $value . '"/>
            </div>';
    }

    public static function getHtmlInput($name, $value, $options = null) {
        return '
			<div class="form-group col-md-12">
				<textarea class="ckeditor" rows="5" cols="5" name="' . $name . '">' . $value . '</textarea>
			</div>';
    }

    public static function getRadioInput($name, $value, $options = null) {
        return '<div class="form-group col-md-12">
					<label class="radio-inline">
						<input type="radio" name="' . $name . '" class="styled" value="1" ' . ($value ? 'checked' : '') . '>
						Hi???n th???
					</label>

					<label class="radio-inline">
						<input type="radio" name="' . $name . '" value="0" class="styled"' . (!$value ? 'checked' : '') . '>
						???n
					</label>
				</div>';
    }

    public static function getColorInput($name, $value, $options = null) {
        return '
			<div class="form-group col-md-12">
                <input type="text"class="form-control colorpicker-show-input" data-preferred-format="hex" name="' . $name . '" value="' . $value . '">
			</div>';
    }

     public static function getImageInput($name,$value,$options=null){
        $guid = '';
        if (!empty($options['guid'])) $guid = $options['guid'];
        $id = $guid.'_'.$name;
        return '			
            <div class="form-group col-md-12">
				<div class="div-image">
					<input type="file" data-guid="'.$guid.'" multiple="" id="'.$id.'"data-value="'.$value.'" data-field="'.$name.'" class="file-input-overwrite" data-show-upload="false" data-show-remove="true" onclick="BrowseServer(\''.$id.'\',\''.$guid.'\')"/>
					<input type="hidden" class="image_data" data-guid="'.$guid.'" value="'.$value.'" name="'.$name.'"/>
                    <span class="help-block">Ch??? cho ph??p c??c file ???nh c?? ??u??i <code>jpg</code>, <code>gif</code> v?? <code>png</code></span>
                </div>
            </div>';
    }

}
