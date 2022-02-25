<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use phpDocumentor\Reflection\Types\Null_;

class CategoryController extends Controller
{
    //Categories
    public function categories()
    {
        $categories = Category::orderBy('id', 'desc')->get();
        return view('admin.category.categories.categories', compact('categories'));
    }
    //Add Category
    public function add_category()
    {
        return view('admin.category.categories.add-category');
    }
    //Added Category
    public function added_category(Request $request)
    {
        if ($request->ajax()) {
            $request->all();
            $image = $request->file('image');
            if ($image) {
                //including image
                $image_random       = sha1(time());
                $image_extension    = strtolower($image->getClientOriginalExtension());
                $image_fullname     = $image_random . "." . $image_extension;
                $image_path         = "public/images/category/";
                $image_move         = $image->move($image_path, $image_fullname);
                $image_lastname     = $image_path . $image_fullname;
                $added_category     = Category::create([
                    'name'          => $request->name,
                    'status'    => $request->status,
                    'image'     => $image_lastname,
                    'meta_title' => $request->meta_title,
                    'meta_description' => $request->meta_description,
                ]);
                if ($added_category) {
                    return response()->json([
                        'status' => 200,
                        'message' => 'Category Added Successfully!'
                    ]);
                } else {
                    return response()->json([
                        'status' => 404,
                        'message' => 'Sorry! Something went wrong!'
                    ]);
                }
            } else {
                //without image
                $added_category     = Category::create([
                    'name'      => $request->name,
                    'status'    => $request->status,
                    'meta_title' => $request->meta_title,
                    'meta_description' => $request->meta_description,
                ]);
                return response()->json([
                    'status' => 200,
                    'message' => 'Category Added Successfully!'
                ]);
            }
        }

        //Success

    }
    //Delete Category
    public function delete_category(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();
            $category = Category::where('id', $data['id'])->first();
            if ($category->image) {
                unlink($category->image);
            }
            $category_delete = Category::where('id', $data['id'])->delete();
            if ($category_delete) {
                return response()->json([
                    'status' => 200,
                    'id'     => $data['id'],
                    'message' => 'Category Deleted Successfully!'
                ]);
            }
        }
    }
    //Brands
    public function brands()
    {
        $brands = Brand::orderBy('id', 'desc')->get();
        return view('admin.category.brands.brands', compact('brands'));
    }
    //Add Brand
    public function add_brand()
    {
        return view('admin.category.brands.add-brand');
    }
    //Added Brand
    public function added_brand(Request $request)
    {
        if ($request->ajax()) {
            $request->all();
            $image = $request->file('image');
            if ($image) {
                //including image
                $image_random       = sha1(time());
                $image_extension    = strtolower($image->getClientOriginalExtension());
                $image_fullname     = $image_random . "." . $image_extension;
                $image_path         = "public/images/brand/";
                $image_move         = $image->move($image_path, $image_fullname);
                $image_lastname     = $image_path . $image_fullname;
                $added_brand     = Brand::create([
                    'name'      => $request->name,
                    'status'    => $request->status,
                    'image'     => $image_lastname,
                ]);
                if ($added_brand) {
                    return response()->json([
                        'status' => 200,
                        'message' => 'Category Added Successfully!'
                    ]);
                } else {
                    return response()->json([
                        'status' => 404,
                        'message' => 'Sorry! Something went wrong!'
                    ]);
                }
            } else {
                //without image
                $added_brand     = Brand::create([
                    'name'      => $request->name,
                    'status'    => $request->status,
                ]);
                return response()->json([
                    'status'    => 200,
                    'message'   => 'Category Added Successfully!'
                ]);
            }
        }
    }
    //Update Brand Status
    public function update_brand_status(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();
            if ($data['status'] == 1) {
                $status = 0;
            } else {
                $status = 1;
            }
            $update_brand_status = Brand::where('id', $data['id'])->update([
                'status' => $status
            ]);
            return response()->json([
                'message' => 'updated',
                'id'      => $data['id']
            ]);
        }
    }
    //Delete Brand
    public function delete_brand(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();
            $brand = Brand::where('id', $data['id'])->first();
            if ($brand->image) {
                unlink($brand->image);
            }
            $brand_delete = Brand::where('id', $data['id'])->delete();
            if ($brand_delete) {
                return response()->json([
                    'status' => 200,
                    'id'     => $data['id'],
                    'message' => 'Brand Deleted Successfully!'
                ]);
            }
        }
    }
    //Sub Categories
    public function sub_categories()
    {
        return view('admin.category.sub-categories');
    }
    //Add Sub Category
    public function add_sub_category()
    {
        return view('admin.category.sub-categories.add-sub-categories');
    }
    //Added Sub Category
    public function added_sub_category(Request $request)
    {
    }
    //Delete Sub Category
    public function delete_sub_category()
    {
    }
}