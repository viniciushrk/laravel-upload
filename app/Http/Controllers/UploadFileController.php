<?php

namespace App\Http\Controllers;

use App\Models\Arquivo;
use Illuminate\Http\Request;

class UploadFileController extends Controller
{
    public function index() {
        return view('uploadfile');
    }
    public function showUploadFile(Request $request) {
        $file = $request->file('image');

        //Display File Name
        echo 'File Name: '.$file->getClientOriginalName();
        echo '<br>';

        //Display File Extension
        echo 'File Extension: '.$file->getClientOriginalExtension();
        echo '<br>';

        //Display File Real Path
        echo 'File Real Path: '.$file->getRealPath();
        echo '<br>';

        //Display File Size
        echo 'File Size: '.$file->getSize();
        echo '<br>';

        //Display File Mime Type
        echo 'File Mime Type: '.$file->getMimeType();
        echo '<br>';
        //Move Uploaded File
        $destinationPath = 'uploads';
        $file->move($destinationPath,$file->getClientOriginalName());
        $file = $destinationPath.'/'.$file->getClientOriginalName();
        $file;
        \DB::beginTransaction();
            $gravar = new Arquivo();
            $gravar->fill($request->all());
            $gravar->caminho =  $file;
            $gravar->push();

        \DB::commit();

    }
}
