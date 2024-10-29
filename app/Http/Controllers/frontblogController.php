<?php

namespace App\Http\Controllers;

use App\Models\blog;
use App\Models\Image;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;
use Illuminate\Http\Request;

class frontblogController extends Controller
{
    public function index($id)
    {


        return view('front.blogcreate')->with('id', $id);
    }

    public function store(Request $request)
    {
//        dd($request->all());
        $validaor = Validator::make($request->all(), [
            'title' => 'required',
            'feature_image' => 'required',
            'detail' => 'required',
        ]);

        if ($validaor->fails()) {
            return resonse()->json([
                'status' => false,
                'errors' => $validaor->errors()
            ]);
        } else {
            $blog = new blog;
            $blog->category_id = $request->category_id;
            $blog->user_id = Auth::user()->id;
            $blog->heading = $request->title;
            $blog->detail = $request->detail;
            $blog->posted_by = Auth::user()->name;

            if ($request->hasFile('feature_image')) {

                $photo = $request->file('feature_image');

                $fileName = uniqid() . '.' . $photo->getClientOriginalExtension();

                $destinationPath = public_path('blogphotos');

                $photo->move($destinationPath, $fileName);
                $blog->feature_image = $fileName;
            }




            $blog->save();




            $blog = blog::latest()->first();
            $blogid = $blog->id;


            //   Upload Photos here
            $imagePaths = [];

            if ($request->hasFile('photo')) {


                foreach ($request->file('photo') as $file) {
                    // Store each file in storage/app/public directory
                    $destinationPath = public_path('blogphotos');

                    $fileName = uniqid() . '.' . $file->getClientOriginalExtension();

                    $path = $file->move($destinationPath , $fileName);
                    // Get the file path without the 'public/' prefix
                    $imagePath = str_replace(public_path(), '', $destinationPath) . '/' . $fileName;
                    $imagePaths[] = $imagePath;


                    $images = new Image;
                    $images->blog_id = $blogid;
                    $images->image = $fileName;
                    $images->save();


                }

            }


            return response()->json([
                'status' => true,
                'message' => 'Blog Created Successfully',
                'blog_id' => $blogid,
            ]);

        }


    }

    public function update($id)
    {
        $blog = blog::find($id);
        $image  = Image::where('blog_id' , $blog->id)->get();




        $data['image'] = $blog;
        $data['blog'] = $blog;




        return view('front.blogupdate', $data);
    }


    public function storeUpdate($id, Request $request)
    {


        $validaor = Validator::make($request->all(), [
            'title' => 'required',
            'detail' => 'required',
        ]);

        if ($validaor->fails()) {

            return resonse()->json([
                'status' => false,
                'errors' => $validaor->errors()
            ]);

        } else {


            $blog = blog::find($id);



            $blog->heading = $request->title;
            $blog->detail = $request->detail;
            if ($request->hasFile('feature_image')) {


                if (file_exists(public_path('blogphotos/' . $blog->feature_image))) {
                    unlink(public_path('blogphotos/' . $blog->feature_image));
                }


                $photo = $request->file('feature_image');

                $fileName = uniqid() . '.' . $photo->getClientOriginalExtension();

                $destinationPath = public_path('blogphotos');

                $photo->move($destinationPath, $fileName);
                $blog->feature_image = $fileName;

            }






            //   Upload Photos here
            $imagePaths = [];

            if ($request->hasFile('photo')) {
                $images = Image::where('blog_id', $blog->id)->get();

                foreach ($images as $image){

                    if (file_exists(public_path('blogphotos/' . $image->image))) {
                        unlink(public_path('blogphotos/' . $image->image));
                    }
                    $image->delete();
                }

                foreach ($request->file('photo') as $file) {
                    // Store each file in storage/app/public directory
                    $destinationPath = public_path('blogphotos');

                    $fileName = uniqid() . '.' . $file->getClientOriginalExtension();

                    $path = $file->move($destinationPath , $fileName);
                    // Get the file path without the 'public/' prefix
                    $imagePath = str_replace(public_path(), '', $destinationPath) . '/' . $fileName;
                    $imagePaths[] = $imagePath;


                    $images = new Image;
                    $images->blog_id = $blog->id;
                    $images->image = $fileName;
                    $images->save();


                }

            }


            $blog->save();





            $blog = blog::find($id);
            $blogid = $blog->id;


            return response()->json([
                'status' => true,
                'message' => 'Blog Created Successfully',
                'blog_id' => $blogid,
            ]);


        }
    }



    public function destroy($id){



        $blog = blog::find($id);
        $images = Image::where('blog_id', $blog->id)->get();



        if(!$blog){
            return redirect('/stock');
        }

        if (file_exists(public_path('blogphotos/' . $blog->feature_image))) {
            unlink(public_path('blogphotos/' . $blog->feature_image));
        }
        foreach ($images as $image){

            if (file_exists(public_path('blogphotos/' . $image->image))) {
                unlink(public_path('blogphotos/' . $image->image));
            }
            $image->delete();
        }


        $categoryId = $blog->category_id;

        // Delete the blog entry
        $blog->delete();



        return redirect('frontblog/'.$categoryId);
    }
}
