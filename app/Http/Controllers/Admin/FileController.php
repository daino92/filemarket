<?php

namespace App\Http\Controllers\Admin;

use App\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FileController extends Controller
{
    public function show(File $file)
    {
    	$file = $this->replaceFilePropertiesWithUnnapprovedChanges($file);

        return view('files.show', [
            'file' => $file,
            'uploads' => $file->uploads
        ]);
    }

    public function replaceFilePropertiesWithUnnapprovedChanges(File $file)
    {
    	if ($file->approvals->count()) {
    		$file->fill($file->approvals->first()->toArray());
    	}

    	return $file;
    }
}
