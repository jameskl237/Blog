<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function index_api()
    {
        $arr = Post::get();
        return response()->json([
            $arr
        ]);
    }

    public function index()
    {
        $arr = Post::orderBy('created_at', 'desc')->get();
        return view('Blog.welcome', compact('arr'));
    }

    public function store_api(Request $request)
    {
        $validated = validator::make($request->all(),[
            'title'=>'required',

        ]);

        if($validated->fails()){
            return response()->json($validated->errors(), 400);
        }

        $post= Post::create($request->all());
        return response()->json([
            'new post'=>$post,
            'message'=>'valeur creee avec succes'
        ],201);
    }

    public function store(Request $request)
    {
        try{
            if(
                empty($request->input('title'))
            ){
                return redirect()->back()->with('message','Remplissez ce champ');
            }
            $post = new Post();
            $post->title = $request->title;
            $post->user_id = 1;
            $post->description = $request->description ? $request->description : null;
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('blog'), $imageName);
                $post->image = $imageName;
            }
            $post->save();
            return redirect()->back()->with('message','');

        }catch (\Exception $e) {
            // toastr()->error('Message', 'Une Erreur c\'est produite');
            dd($e->getMessage());
            return redirect()->back()->with('message','Une erreur produite');
        }

    }

    public function update_api(Request $request,$id){

        $post = Post::find($id);
        if (is_null($post)) {
            return response()->json([
                'message'=>'post not found'
            ],404);
        }
        $post -> update($request->all());
        return response()->json([
            'post'=>$post,
            'message'=> 'modification effectuee'
        ],200);
    }

    public function destroy_api($id){

        $post = Post::find($id);
        if (is_null($post)) {
            return response()->json([
                'message'=>'post not found'
            ],404);
        }
        $copiepost = $post;
        $post->delete();
        return response()->json([
            'post'=>$copiepost,
            'message'=>'valeur supprimee'
         ]);
  }

  public function show_api( $id){
    $post = Post::find($id);
    return response()->json(
        $post
    ,200);

  }

  public function postAndTag($id){
   $post = Post::find($id);
    $post->tags = Tag::where('post_id',$id)->get();
    return response()->json([
        $post
    ]);
  }

  public function post_AndTag(){
    $arr = Post::get();
        foreach ($arr as $key => $value) {
            $value->tags = Tag::where('post_id',$value->id)->get();
        }

        return response()->json([
            $arr
        ]);
  }

  public function search(Request $request){

    $query = $request->query;
    $posts = Post::where('title','like','%'.$query.'%')->get();
    return response()->json($posts);
  }
}
