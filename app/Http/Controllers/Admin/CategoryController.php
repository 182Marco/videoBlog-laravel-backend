<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{

    public function index(Request $request){

        $categories = Category::orderBy('id')->paginate(10);

        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {   
        $request->validate([
            'name' => 'required|unique:categories|min:2',
            'img' => 'image'
        ],
          config('app.validation_messagges')
        );

        $data = $request->all();

        $img_path = Storage::put('categories-images', $data['img']);
        
        $new_category = new Category;
        $new_category->fill($data);
        $new_category->img = $img_path;
        $new_category->slug = Str::slug( $new_category->name, '-');
        $new_category->save();

        return redirect()->route('showCategory', $new_category->slug);
    }

    public function show($slug)
    {
        $category = Category::where('slug', $slug)->with('videos')->first();

        if(!$category){
            return abort(404);
        }
        return view('admin.categories.show', compact('category'));
    }

    public function edit($slug)
    {
        $category = Category::where('slug', $slug)->with('videos')->first();

        if(!$category){
            return abort(404);
        }
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => [
                'required',
                Rule::unique('categories')->ignore($id),
                'min:2',
            ],
            'img' => 'image'
        ],
          config('app.validation_messagges')
        );

        $data = $request->all();
        
        $category = Category::find($id);

        if(array_key_exists('img', $data)) {
            // delete previus
            if($category->img){
               Storage::delete($category->img);
            }
            // set new
            $img_path = Storage::put('categories-images', $data['img']);
        }
        
        $category['slug'] = Str::slug($category->slug, '-');
        $category['img'] = $img_path;
        $category->update($data);
        
        return redirect()->route('showCategory', $category->slug);
    }

    public function destroy($id)
    {
        $category = Category::find($id);

        if($category->img) {
            Storage::delete($category->img);
        }

        $category->delete();

        return redirect()->route('categories')->with('deleted', $category->name);

    }

}
