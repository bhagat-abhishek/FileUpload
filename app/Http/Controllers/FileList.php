<?php

namespace App\Http\Controllers;

use App\Models\FileList as ModelsFileList;
use App\Models\TemporaryFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileList extends Controller
{
    protected function submit(Request $request) {
        $fileList = new ModelsFileList;
        $fileList->name = $request->name;
        
        $temporayFile = TemporaryFile::where('folder', $request->file)->first();

        if($temporayFile) {
            $extistingPath = 'public/upload/tmp/'.$request->file.'/' . $temporayFile->filename;
            $newPath = 'public/upload/'.$request->file.'/' . $temporayFile->filename;
            Storage::copy($extistingPath, $newPath);
            Storage::deleteDirectory('public/upload/tmp/'. $request->file);
            $temporayFile->delete();

            $fileList->path = $newPath;
        }

        $fileList->save();

        return back()->with('msg', 'Complete');
    }
}
