<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index(Request $request){
        // dd($request->search);
        $title = "velu11";
        // $posts = $this->getposts();
        // $posts = Post::all();
        // $posts = Post::paginate(5);
        $query = Post::query();
        if($request->has('search') && !empty($request->search)){
            $query->where('title', 'like', '%'.$request->search.'%')
            ->orWhere('content', 'like', '%'.$request->search.'%');

        }
        $posts = $query->paginate(5);


        return view('index', compact('title', 'posts'));
    }

    // private function getposts(){
    //     return json_decode(json_encode([
    //     ['id'=>1,'title' => 'post 1', 'content' => 'content of post 1'],
    //     ['id'=>2,'title' => 'post 2', 'content' => 'content of post 2'],
    // ]));
    // }
    
    public function detail($slug){
        // $posts = $this->getposts();
       
        // $post = collect($posts)->firstWhere('id', $id);
        try{
            $post = Post::where('slug', $slug)->first();
            if(!$post){
                throw new \Illuminate\Database\Eloquent\ModelNotFoundException;
            }  
            $category = $post->category;
        $related_posts = Post::where('category_id', $category->id)
                            ->where('id', '!=', $post->id)
                            ->take(5)
                            ->get();
            return view('detail', compact('post', 'related_posts'));

        }catch(\Illuminate\Database\Eloquent\ModelNotFoundException $ex){
            return response()->view('errors.404', [], 404);
        }
       
    }
    //redirect method
    // public function oldurl(){
    //     return redirect('/new-url');
    // }
    public function oldurl(){
        return redirect()->route('new_url');
    }
    public function newurl(){
        return '<h1>new url page</h1>';
    }

}
