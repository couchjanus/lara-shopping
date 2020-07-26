<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Picture;

class DropboxController extends Controller
{
    public function __construct()
    {
        $this->dropbox = Storage::disk('dropbox')->getDriver()->getAdapter()->getClient();   
    }

    public function index()
    {
        $pictures = Picture::all();
        return view('dropbox', compact('pictures'));
    }
    
    public function store()
    {
    	$data = request()->validate([
            'picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:1024',    
        ]); 

        $picture = $data['picture'];
        $namePicture = uniqid().'.'.$picture->getClientOriginalExtension();
        $picture->storeAs('/public/pictures/', $namePicture, 'dropbox');
        $response = $this->dropbox->createSharedLinkWithSettings('/public/pictures/'.$namePicture); 
        
        Picture::create([
            'name' => $namePicture,
            'ext' => $picture->getClientOriginalExtension(),
            'size' => $picture->getSize()
        ]);

        return redirect()->back()->with('success', 'Picture uploaded To dropbox');
    }

    public function view($picture)
    {
    	try {
    	    
            $link = $this->dropbox->listSharedLinks('public/pictures/'.$picture);
            $raw = explode("?", $link[0]['url']);
            $store = $raw[0].'?raw=1';
            $tempStore = tempnam(sys_get_temp_dir(), $picture);
            copy($store, $tempStore);
	        return response()->file($tempStore);
    			
    	} catch (Exception $e) {   		
 	        return abort(404);
    	}
    }

    public function download($picture)
    {
    	try {  		
    	    return Storage::disk('dropbox')->download('public/pictures/'.$picture);
    	} catch (Exception $e) {	
    	    return abort(404);
    	}
    }

    public function delete(Picture $picture)
    {	
    	$this->dropbox->delete('public/pictures/'.$picture->name);
    	$picture->delete();
    	return redirect()->back()->with('success', 'Picture Deleted Successfully');
    }
}
