<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\SubCategory;

use File;

use Illuminate\Support\Str;

use Illuminate\Support\Facades\Validator;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('backend/admin-add-category',compact('categories'));     
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'catname' => 'required|unique:categories,name',
            'catimg' => 'image',
            'status' => 'required',
        ], [
            'catname.required' => 'The category name is required.',
            'catname.unique' => 'The category name must be unique.',
            'catimg.required' => 'The category image is required.',
            'catimg.image' => 'The category image must be a valid image file.',
            'status.required' => 'The status field is required.',
        ]);
    

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }


        $category = new Category();
        $subcategory = new SubCategory();

        if($request->pcat == 0){
            $imageName = "";

            if($image = $request->file('catimg')){
                $imageName = time().uniqid().'.'.$image->getClientOriginalExtension();
                $image->move('frontend/imgs/categories',$imageName);
            }

            $slug = Str::slug($request->catname);

            $category->name = $request->catname;
            $category->slug = $slug;
            $category->image = $imageName;
            $category->isactive = boolval($request->status);


            if ($category->save()) {
                // Category created successfully
                $message = 'Category created successfully.';
                $type = 'success';
            } else {
                // Failed to create category
                $message = 'Failed to create category.';
                $type = 'error';
            }
        }else{
            $slug = Str::slug($request->catname);

            $subcategory->name = $request->catname;
            $subcategory->slug = $slug;
            $subcategory->parent_cat = $request->pcat;
            $subcategory->isactive = boolval($request->status);


            if ($subcategory->save()) {
                // Category created successfully
                $message = 'Sub Category created successfully.';
                $type = 'success';
            } else {
                // Failed to create category
                $message = 'Failed to create category.';
                $type = 'error';
            }
        }

    
        return redirect()->route('admin.add-cat')->with($type, $message);
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $categories = Category::all();
        return view('backend/admin-show-category',compact('categories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        $category = Category::where('slug', $slug)->first();

        $imageName = "frontend/imgs/categories".$category->image;

        return view('backend/admin-edit-category',compact('category','imageName'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $slug)
    {
        $category = Category::where('slug', $slug)->first();

        $validator = Validator::make($request->all(), [
            'catname' => 'required|unique:categories,name,' . $category->id,
            'catimg' => 'image',
            'status' => 'required',
        ], [
            'catname.required' => 'The category name is required.',
            'catname.unique' => 'The category name must be unique.',
            'catimg.required' => 'The category image is required.',
            'catimg.image' => 'The category image must be a valid image file.',
            'status.required' => 'The status field is required.',
        ]);
    

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $imageName = $category->image;

        if ($request->hasFile('catimg')) {
            $image = $request->file('catimg');
            $imageName = time() . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move('frontend/imgs/categories', $imageName);

            if ($category->image && file_exists(public_path('frontend/imgs/categories/' . $category->image))) {
                unlink(public_path('frontend/imgs/categories/' . $category->image));
            }
        }


        $slug = Str::slug($request->catname);

        $category->name = $request->catname;
        $category->slug = $slug;
        $category->image = $imageName;
        $category->isactive = boolval($request->status);


        if ($category->update()) {

            $message = 'Category updated successfully.';
            $type = 'success';
        } else {

            $message = 'Failed to update category.';
            $type = 'error';
        }
    
        return redirect()->route('admin.edit-cat',['slug' => $slug])->with($type, $message);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {
        $category = Category::where('slug', $slug)->first();


        if ($category->delete()) {
            
            $message = 'Category deleted successfully.';
            $type = 'success';
        } else {
            // Failed to create category
            $message = 'Failed to delete category.';
            $type = 'error';
        }

        if ($category->image && file_exists(public_path('frontend/imgs/categories/' . $category->image))) {
            unlink(public_path('frontend/imgs/categories/' . $category->image));
        }

        return back()->with($type, $message);
    }


    public function analytics(string $slug){
        $category = Category::where('slug', $slug)->first();
        $subcategories = SubCategory::all();

        return view('backend/admin-category-analytics',compact('category','subcategories'));
    }
}
