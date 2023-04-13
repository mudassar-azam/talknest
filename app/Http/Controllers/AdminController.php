<?php

namespace App\Http\Controllers;

use App\Models\blog;
use App\Models\category;
use App\Models\onesection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function store(Request $request)
    {

        // Validate the form data
        $validatedData = $request->validate([
            'id' => 'nullable',
            'heading' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Check if section exists in the database
        $section = onesection::find($request->id);

        if ($section) {
            // Update the section fields
            $section->heading = $request->heading;
            $section->description = $request->description;

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('image'), $imageName);
                $section->image = $imageName;
            }

            $section->save();
        } else {
            // Create a new section
            $section = new onesection;
            $section->id = $request->id;
            $section->heading = $request->heading;
            $section->description = $request->description;

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('image'), $imageName);
                $section->image = $imageName;
            }

            $section->save();
        }

        // Redirect back to the form with a success message
        return redirect('/homepage')->with('success', 'Post added successfully.');
    }

public function category(Request $request)
{

    // Validate the form data
    $validatedData = $request->validate([
        'name' => 'required',
        'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    // Store the post in the database
    $category = new category;
    $category->name = $request->name;

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('catimage'), $imageName);
        $category->image = $imageName;
    }

    $category->save();

    // Redirect back to the form with a success message
    return redirect('/category')->with('success', 'Post added successfully.');
}

public function editCategory(Request $request, $id)
{
    $category = Category::find($id);
    $category->name = $request->name;

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('catimage'), $imageName);
        $category->image = $imageName;
    }

    $category->save();
    return redirect('/category')->with('success', 'Category deleted successfully.');
}





public function destroycategory($id)
{
    $category = Category::findOrFail($id);
    $category->delete();

    return redirect('/category')->with('success', 'Category deleted successfully.');
}



public function blog(Request $request)
{
    // Validate the form data
    $validatedData = $request->validate([
        'heading' => 'required|string|max:255',
        'feature_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'detail' => 'required|string',
        'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'posted_by' => 'required|string|max:255',
    ]);

    // Save the blog post to the database

    $blog = new blog;
    $blog->heading = $request->heading;
    $blog->detail = $request->detail;
    $blog->posted_by = $request->posted_by;
    $blog->category_id = $request->input('category');

    // Save the feature image
    $featureImage = $request->file('feature_image');
    $featureImageName = time() . '_' . $featureImage->getClientOriginalName();
    $featureImage->move(public_path('blogimage'), $featureImageName);
    $blog->feature_image = $featureImageName;

    // Save the content images
    $contentImages = $request->file('images');
    foreach ($contentImages as $contentImage) {
        $contentImageName = time() . '_' . $contentImage->getClientOriginalName();
        $contentImage->move(public_path('blogimage'), $contentImageName);
        $blog->images .= $contentImageName . ',';
    }
    $blog->images = rtrim($blog->images, ',');

    $blog->save();

    return redirect('/blog')->with('success', 'Post added successfully.');

}
public function deleteblog($id)
{
    $post = blog::findOrFail($id);
    $post->delete();
    return redirect('/blog')->with('success', 'Category deleted successfully.');
}


}
