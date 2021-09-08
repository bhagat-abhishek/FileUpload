<?php

namespace App\Http\Controllers;

use App\Models\TemporaryFile;
use Illuminate\Http\Request;

class FileUploader extends Controller
{
    protected function upload(Request $request) {
        if($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = $file->getClientOriginalName();
            $folder = uniqid() . '-' .now()->timestamp;
            $file->storeAs('public/upload/tmp/' . $folder, $filename);

            // Adding To Temporary Upload Table
            TemporaryFile::create([
                'folder' => $folder,
                'filename' => $filename
            ]);

            return $folder;
        }

        return '';
    }
}
