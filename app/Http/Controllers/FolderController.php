<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FolderController extends Controller
{
    public function index()
    {
        $document_id = session()->get('document_id');
        
        $document = DB::table('documents')
            ->where('id', $document_id)
            ->first();
        
        $folders = DB::Table('folders')
            ->where('document_id', $document_id)
            ->get();

        return view('folders', ['folders' => $folders, 'document' => $document]);
    }

    public function addFolder(Request $request, $id)
    {

        $document = DB::table('documents')
            ->where('id', $id)
            ->first();
        
        if ($request->password == env('SECRET_KEY')) {
            $post = Folder::create([
                'folder_name' => strtoupper($request->folder),
                'document_id' => $document->id,
                'document_name' => $document->document,
                'total_files' => 0,
            ]);

            $total_folder = DB::table('folders')
                ->where('document_id', $document->id)
                ->count();

            $update = DB::table('documents')
                ->where('id', $id)
                ->update([
                    'total_folders' => $total_folder,
                    'updated_at' =>now(),
                ]);

            return back()
            ->withInput()
            ->with([
                    'success' => 'New folder has been create successfully'
            ]);
        } else {
            return back()
            ->withInput()
            ->with([
                    'warning' => 'Incorrect admin password!'
            ]);
        }
    }
}
