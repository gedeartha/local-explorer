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

        $fileSuccess = [];
        $fileError = [];

        if ($request->file_input1 != null) {
            
            $folder = DB::table('folders')
                ->where('id', $id)
                ->first();
            
            $document = DB::table('documents')
                ->where('id', $folder->document_id)
                ->first();

            $randomNumber = random_int(1000, 9999);

            // Upload file
            $file = $request->file('file_input1');

            // dd($file->getSize());

            // if max file > 200 MB
            if ($file->getSize() > 200000000) {
                $fileError[0] = 1;
            } else {
                $fileSuccess[0] = 1;

                $fileNameExt = $file->getClientOriginalName();
                $fileName = pathinfo($fileNameExt, PATHINFO_FILENAME) . '_'.$randomNumber;
                $fileType = $file->getClientOriginalExtension();

                $fileNameSave = pathinfo($fileNameExt, PATHINFO_FILENAME).'_'.$randomNumber.'.'.$fileType;

                $save_as = 'documents/'.$folder->document_name.'/'.$folder->folder_name.'/';

                $file->storeAs($save_as, $fileNameSave);

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
        }

        if ($request->file_input2 != null) {
            
            $folder = DB::table('folders')
                ->where('id', $id)
                ->first();
            
            $document = DB::table('documents')
                ->where('id', $folder->document_id)
                ->first();

            $randomNumber = random_int(1000, 9999);

            // Upload file
            $file = $request->file('file_input2');
            
            // if max file > 200 MB
            if ($file->getSize() > 200000000) {
                $fileError[1] = 2;
            } else {
                $fileSuccess[1] = 2;

                $fileNameExt = $file->getClientOriginalName();
                $fileName = pathinfo($fileNameExt, PATHINFO_FILENAME) . '_'.$randomNumber;
                $fileType = $file->getClientOriginalExtension();

                $fileNameSave = pathinfo($fileNameExt, PATHINFO_FILENAME).'_'.$randomNumber.'.'.$fileType;

                $save_as = 'documents/'.$folder->document_name.'/'.$folder->folder_name.'/';

                $file->storeAs($save_as, $fileNameSave);

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
        }
        
        if ($request->file_input3 != null) {
            
            $folder = DB::table('folders')
                ->where('id', $id)
                ->first();
            
            $document = DB::table('documents')
                ->where('id', $folder->document_id)
                ->first();

            $randomNumber = random_int(1000, 9999);

            // Upload file
            $file = $request->file('file_input3');
            
            // if max file > 200 MB
            if ($file->getSize() > 200000000) {
                $fileError[2] = 3;
            } else {
                $fileSuccess[2] = 3;

                $fileNameExt = $file->getClientOriginalName();
                $fileName = pathinfo($fileNameExt, PATHINFO_FILENAME) . '_'.$randomNumber;
                $fileType = $file->getClientOriginalExtension();

                $fileNameSave = pathinfo($fileNameExt, PATHINFO_FILENAME).'_'.$randomNumber.'.'.$fileType;

                $save_as = 'documents/'.$folder->document_name.'/'.$folder->folder_name.'/';

                $file->storeAs($save_as, $fileNameSave);

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
        }
        
        if ($request->file_input4 != null) {
            
            $folder = DB::table('folders')
                ->where('id', $id)
                ->first();
            
            $document = DB::table('documents')
                ->where('id', $folder->document_id)
                ->first();

            $randomNumber = random_int(1000, 9999);

            // Upload file
            $file = $request->file('file_input4');
            
            // if max file > 200 MB
            if ($file->getSize() > 200000000) {
                $fileError[3] = 4;
            } else {
                $fileSuccess[3] = 4;

                $fileNameExt = $file->getClientOriginalName();
                $fileName = pathinfo($fileNameExt, PATHINFO_FILENAME) . '_'.$randomNumber;
                $fileType = $file->getClientOriginalExtension();

                $fileNameSave = pathinfo($fileNameExt, PATHINFO_FILENAME).'_'.$randomNumber.'.'.$fileType;

                $save_as = 'documents/'.$folder->document_name.'/'.$folder->folder_name.'/';

                $file->storeAs($save_as, $fileNameSave);

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
        }
        
        if ($request->file_input5 != null) {
            
            $folder = DB::table('folders')
                ->where('id', $id)
                ->first();
            
            $document = DB::table('documents')
                ->where('id', $folder->document_id)
                ->first();

            $randomNumber = random_int(1000, 9999);

            // Upload file
            $file = $request->file('file_input5');
            
            // if max file > 200 MB
            if ($file->getSize() > 200000000) {
                $fileError[4] = 5;
            } else {
                $fileSuccess[4] = 5;

                $fileNameExt = $file->getClientOriginalName();
                $fileName = pathinfo($fileNameExt, PATHINFO_FILENAME) . '_'.$randomNumber;
                $fileType = $file->getClientOriginalExtension();

                $fileNameSave = pathinfo($fileNameExt, PATHINFO_FILENAME).'_'.$randomNumber.'.'.$fileType;

                $save_as = 'documents/'.$folder->document_name.'/'.$folder->folder_name.'/';

                $file->storeAs($save_as, $fileNameSave);

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
        }

        $getSuccessFile = implode(',', $fileSuccess);
        $getErrorFile = implode(',', $fileError);
        
        if (count($fileError) > 0) {
            return back()
            ->withInput()
            ->with([
                'success' => 'Files: '.$getSuccessFile.' have been uploaded successfully',
                'warning' => 'Failed to upload files: '.$getErrorFile.'! (limit file size)'
            ]);
        } else {
            return back()
            ->withInput()
            ->with([
                'success' => 'Files: '.$getSuccessFile.' have been uploaded successfully',
            ]);
        }

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
        // $fileNameDateExt = $file->files_name .' '. $getDate .'_'. $getTime .'.'. $file->files_type;
        $fileNameExt = $file->files_name .'.'. $file->files_type;

        return response()->download(storage_path($storagePath.$fileNameExt));
    }
}
