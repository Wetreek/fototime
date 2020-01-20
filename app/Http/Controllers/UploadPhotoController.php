<?php

namespace App\Http\Controllers;
//namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Photo;
use App\Models\Category;

class UploadPhotoController extends Controller
{
    public function addPhoto(Request $data){

        /*$photo= Photo::create([
            'user_id'=> Auth::user()->id,
            'category_id'=> $data['category_id'],
            'age_category_id' => 1,
            'allowed' =>1,
            'photo_name'=> 'name',
            'photo_description'=>'kkjkhs',
            'dirname'=>'hhh',
            'filename'=>'test',
            'filename_original'=>'test',
            'filename_prefix'=>'test',
            'photo_ratio_id'=>2,
            
        ]);*/
        $category = [];
        $categoryData = Category::where('id', $data['category_id'])->get();
        if (isset($categoryData[0])) {
            $category['min_height'] = $categoryData[0]->min_height;
            $category['min_width'] = $categoryData[0]->min_width;
        }
        dd($categoryData[0]->min_height);

        $this->storeImage();

        return view('photoGallery');
    }
    private function storeImage(){
        if (request()->has('photo')){
   //         $photo->update([
           //     'filename'=> 
               $test= request()->photo->store('uploads', 'public');
               dd($test);
    //        ]);
        }
    }
}
