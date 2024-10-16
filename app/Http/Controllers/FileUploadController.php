<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;

class FileUploadController extends Controller
{
    public function fileUpload()
    {
        return view('uploadFiles');
    }

    public function fileSave(Request $request)
{
    $request->validate([
        'images.*' => 'required|mimes:pdf,xlx,csv,png,jpg|max:2048',
    ]);

    if ($request->hasFile('images')) {
        $uploadedFiles = $request->file('images');
        $imageNames = [];

        foreach ($uploadedFiles as $image) {
            $imageName = time() . '_' . $image->getClientOriginalName();

            try {
                $image->move(public_path('img'), $imageName);
            } catch (\Exception $e) {
                return back()->withErrors(['error' => 'File upload failed: ' . $e->getMessage()]);
            }

            $imgModel = new Image();
            $imgModel->file_name = $imageName;
            $imgModel->save();

            $imageNames[] = $imageName; 
        }

        return back()
            ->with('success', 'Files have been uploaded.')
            ->with('files', $imageNames);
    }

    return back()->withErrors(['error' => 'No files were uploaded.']);
}

public function showFile()
{
    $images = Image::all();
    return view('showFile', compact('images'));
}

public function destroy($id)
{
    try {
        $image = Image::findOrFail($id);
        $image->delete();
        return back()->with('success', 'File deleted successfully.');
    } catch (\Exception $e) {
        return response()->json(['message' => 'Error deleting file.'], 500);
    }
}

}
