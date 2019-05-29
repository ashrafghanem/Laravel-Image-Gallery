<?php

namespace App\Http\Controllers;

use App\Thumbnail;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // Show dashboard only to logged in users.

    }
    public function index(){
        return view('dashboard');
    }
    public function upload(Request $request){
        $this->validate($request, [
            'desc' => 'required',
            'url' => 'image|required|max:1999'
            // maximum image size = 2MB
        ]);

        if ($request->hasFile('url')) {
            // Get filename with the extension
            $filenameWithExt = $request->file('url')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('url')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            // Upload Image
            // this will save the picture inside the storage/app/public/images
            $path = $request->file('url')->storeAs('/public/images', $fileNameToStore);

            // Create Thumbnail
            $thumbnail = new Thumbnail();
            $thumbnail->imageDesc = $request->input('desc');
            $thumbnail->user_id = auth()->user()->id;
            $thumbnail->imageUrl = $fileNameToStore;
            $thumbnail->save();

            // Run the command: php artisan storage:link
            // to create a shortcut of storage inside public directory
        }
        return redirect('/home');
    }
}
