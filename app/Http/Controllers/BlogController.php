<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public $blog, $image, $imageName, $dircetory, $imgUrl;

    public function index(){
        return view('welcome');
    }

    public function saveBlog(Request $request){
        //        return $request->file('image');
        $this->blog = new Blog();
        $this->blog->blog_title = $request->blog_title;
        $this->blog->author = $request->author;
        $this->blog->category = $request->category;
        $this->blog->description = $request->description;
        $this->blog->image = $this->saveImage($request);
        $this->blog->save();
        return redirect('all-blog')->with('message', 'Data Inserted Successfully');
    }

    private function saveImage($request){
        $this->image = $request->file('image');
        $this->imageName = rand().'.'.$this->image->getClientOriginalExtension();
        $this->dircetory = 'assets/upload-image/';
        $this->imgUrl = $this->dircetory.$this->imageName;
        $this->image->move($this->dircetory,$this->imageName);
        return $this->imgUrl;
    }

    public function allBlog(){
        return view('all-blog',[
          'blogs' =>  Blog::all()
        ]);
    }

    public function editBlog($id){
        return view('edit-blog',[
            'blog' =>Blog::find($id)
        ]);
    }

    public function updateBlog(Request $request){
        $this->blog = Blog::find($request->blog_id);
        $this->blog->blog_title = $request->blog_title;
        $this->blog->author = $request->author;
        $this->blog->category = $request->category;
        $this->blog->description = $request->description;
        if ($request->file('image')){
            if ($this->blog->image){
                unlink($this->blog->image);
            }
            $this->blog->image = $this->saveImage($request);
        }
        $this->blog->save();
        return redirect('all-blog')->with('message', 'Data Updated Successfully');
    }

    public function deleteBlog(Request $request){
        $this->blog = Blog::find($request->blog_id);
        if ($this->blog->image){
            unlink($this->blog->image);
        }
        $this->blog->delete();
        return redirect('all-blog')->with('message', 'Data Deleted Successfully');
    }



}
