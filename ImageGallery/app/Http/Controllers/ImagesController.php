<?php
/**
 * Created by PhpStorm.
 * User: ans_g
 * Date: 8/10/2018
 * Time: 04:10 PM
 */

namespace App\Http\Controllers;

use App\Thumbnail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ImagesController extends Controller
{
    public function home(){
        $thumbnails = Thumbnail::orderBy('user_id','asc')->get();
        return view('home')->with('thumbnails',$thumbnails);
    }
    public function delete($id){
        $path = DB::select('select imageUrl from thumbnail where id = ?', [$id]);
        DB::delete('delete from thumbnail where id = ?', [$id]);

        // delete the image from storage directory.
        Storage::delete('public/images/'.$path[0]->imageUrl);
        return redirect('/home');
    }
}