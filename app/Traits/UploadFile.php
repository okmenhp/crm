<?php

namespace App\Traits;
use Illuminate\Support\Facades\Storage;
use File;
use Auth;
use App\User;

trait UploadFile
{

    public static function uploadImage($image) {
        $file = $image;
        $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
        $file->move('./upload/images/', $fileName);
        $url = "/upload/images/".$fileName;
        return $url; 
    }

    protected function uploadFile(Request $request, $file)
    {
        
        $request->validate([
            'file'=> ['required','max:2000'] 
        ]);

        $user = User::findOrFail(auth()->user()->id);

        // Handle file Upload
        if($request->hasFile('file')){

            //Storage::delete('/public/avatars/'.$user->avatar);

            // Get filename with the extension
            $filenameWithExt = $request->file('file')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('file')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('file')->storeAs('public/avatars',$fileNameToStore);

            $user->avatar = $fileNameToStore ;

            $user->save(); 
        } 
        return $user;
    }

    protected function deleteFile(Request $request, $file)
    {
        
        $request->validate([
            'file'=> ['required','max:200'] 
        ]);

        $user = User::findOrFail(auth()->user()->id);

        // Handle file Upload
        if($request->hasFile('file')){
            //Storage::delete('/public/avatars/'.$user->avatar);
            // Get filename with the extension
            $filenameWithExt = $request->file('file')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('file')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('file')->storeAs('public/avatars',$fileNameToStore);

            $user->avatar = $fileNameToStore ;

            $user->save(); 
        } 
        return $user;
    }

}