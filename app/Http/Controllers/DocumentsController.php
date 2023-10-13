<?php

namespace App\Http\Controllers;

use App\Models\Documents;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DocumentsController extends Controller
{
    public function index()
    {        
        $documents = DB::Table('documents')
            ->get();

        return view('welcome', ['documents' => $documents]);
    }

    public function openDocument(Request $request)
    {

        $login = DB::table('documents')
            ->where('document', $request->inputdocument)
            ->where('password', $request->password)
            ->count();
        
        if ($login > 0) {

            $document = DB::table('documents')
            ->where('document', $request->inputdocument)
            ->first();
          
            session([
                'userlogin' => 'true',
                'document_id' => $document->id,
                'document_name' => $document->document,
            ]);
            
            return redirect()
            ->route('folders');

        } else {
            return back()
            ->withInput()
            ->with([
                    'warning' => 'Password incorrect! Please try again'
            ]);
        }
    }
    
    public function store(Request $request)
    {

        if ($request->password == env('SECRET_KEY')) {
            
            if ($request->document_password == $request->confirmation_document_password) {
                
                $post = Documents::create([
                    'document' => strtoupper($request->document),
                    'password' => $request->document_password,
                    'total_folders' => 0,
                    'total_files' => 0,
                ]);

                return back()
                ->withInput()
                ->with([
                        'success' => 'New document has been create successfully'
                ]);

            } else {
                return back()
                ->withInput()
                ->with([
                        'warning' => 'The document password and confirmation document password do not match'
                ]);
            }

        } else {
            return back()
            ->withInput()
            ->with([
                    'warning' => 'Incorrect admin password!'
            ]);
        }
    }
}
