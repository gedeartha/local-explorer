<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FileController extends Controller
{
    public function index($id)
    {
        $document_id = session()->get('document_id');
        
        $document = DB::table('documents')
            ->where('id', $document_id)
            ->first();
        
        $folder = DB::table('folders')
            ->where('document_id', $document_id)
            ->where('id', $id)
            ->first();
        
        $files = DB::table('files')
            ->where('document_id', $document_id)
            ->where('folder_id', $id)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('files', ['files' => $files, 'folder' => $folder, 'document' => $document]);
    }

    public function upload(Request $request, $id)
    {
        if ($request->file_input != null) {

            $folder = DB::table('folders')
                ->where('id', $id)
                ->first();
            
            $document = DB::table('documents')
                ->where('id', $folder->document_id)
                ->first();

            // Upload file
            $file = $request->file('file_input');
            $fileNameExt = $file->getClientOriginalName();
            $fileName = pathinfo($fileNameExt, PATHINFO_FILENAME);
            // $fileNameDate = pathinfo($fileNameExt, PATHINFO_FILENAME).' - '.date('H:i:s d-m-Y');
            $fileType = $file->getClientOriginalExtension();
            $fileNameDate = pathinfo($fileNameExt, PATHINFO_FILENAME).' '.date('Y-m-d_His').'.'.$fileType;

            $save_as = 'documents/'.$folder->document_name.'/'.$folder->folder_name.'/';

            $file->storeAs($save_as, $fileNameDate);

            // Save
            $post = File::create([
                'document_id' => $document->id,
                'document_name' => $document->document,
                'folder_id' => $id,
                'folder_name' => $folder->folder_name,
                'files_name' => $fileName,
                'files_type' => $fileType,
            ]);

            $total_files = DB::table('files')
                ->where('document_id', $document->id)
                ->where('folder_id', $id)
                ->count();

            $update = DB::table('folders')
                ->where('id', $id)
                ->update([
                    'total_files' => $total_files,
                    'updated_at' =>now(),
                ]);

            $update = DB::table('documents')
                ->where('id', $document->id)
                ->update([
                    'total_files' => $total_files,
                    'updated_at' =>now(),
                ]);

        }

        return back()
        ->withInput()
        ->with([
                'success' => 'Your files have been uploaded succeccfully'
        ]);
    }

    public function download($id)
    {
        $file = DB::table('files')
            ->where('id', $id)
            ->first();
        
        $date = $file->created_at;

        $getDate = date('Y-m-d', strtotime($date));
        $getTime = date('His', strtotime($date));

        
        $storagePath = 'app/documents/'.$file->document_name.'/'.$file->folder_name.'/';
        $fileNameDateExt = $file->files_name .' '. $getDate .'_'. $getTime .'.'. $file->files_type;

        return response()->download(storage_path($storagePath.$fileNameDateExt));
    }
}
