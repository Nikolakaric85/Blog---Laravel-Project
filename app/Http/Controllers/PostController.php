<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Arr;

use DB;


class PostController extends Controller
{
    
    public function index()
    {
        
        if (Auth::check()) 
        {
            $roleid = Auth::user()->role_id;
    
            if ($roleid==1) {
                   $posts =Post::orderBy('created_at','desc')->get();
               
            } else
            {
                   $posts =Post::where('approved', true)->orderBy('created_at','desc')->get();       
            }
    
            return view('posts.index')
            ->with('posts' , $posts);
            
        }
        $posts =Post::where('approved', true)->get();

        return view('posts.index')
        ->with('posts' , $posts);

    }

    public function show($id)
    {
        //vraca 403 kada se klikne na update a nije tvoj post

        if (Auth::check()) {
            $post = Post::find($id);
            $roleid = Auth::user()->role_id;
       
            return view('posts.show')->with('post', $post);
        } else
        return view('auth.login');
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    { 
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:1999'
        ]);
        // dd($request->title, $request->body, $request->image);

        if ($request->hasFile('image')) {
            
            //Original name of the uploaded file with the extension
            $name = $request->file('image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($name, PATHINFO_FILENAME);
    
            //Get the file extension of the uploaded file
            $extension = $request->file('image')->extension();
            
            $fileNameToStore =  $filename.'_'.time().'.'.$extension;
    
            //Upload Image 
            $path = $request->file('image')->storeAs('public/images',$fileNameToStore);
           
        }
        if (auth()->user()->role_id==2) {
            
            $post = new Post;
            $post->user_id = auth()->user()->id;
            $post->title = $request->title;
            $post->body = $request->body;
            $post->image = $fileNameToStore;
            $post->approved = false;
            $post->save();
        }
        return redirect()->route('posts');
    }

  
    public function edit($id)
    {
        $post = Post::find($id);
        $this->authorize('update', $post);
        return view('posts.edit')->with('posts',$post);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
            ]);
            
            $post = Post::find($id);
            $this->authorize('update', $post);
      
        if ($request->hasFile('image')) {
            
            //Original name of the uploaded file with the extension
            $name = $request->file('image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($name, PATHINFO_FILENAME);
    
            //Get the file extension of the uploaded file
            $extension = $request->file('image')->extension();
            
            $fileNameToStore =  $filename.'_'.time().'.'.$extension;
    
            //Upload Image in
            $path = $request->file('image')->storeAs('public/images',$fileNameToStore);
               // Delete file if exists
            Storage::delete('public/images/'.$post->image);
           
        }
        
          // Update Post
          $post->title = $request->input('title');
          $post->body = $request->input('body');
          if($request->hasFile('image')){
              $post->image = $fileNameToStore;
          }
          $post->save();
  
          return redirect('/posts');
    }

    public function approved(Request $request,$id)
    {
        $post = Post::find($id);

        if($request->input('check') =='on' ){
            $post->approved = $request->input('check');
            $post->save();
        } else  {
            $post->approved ='false';
            $post->save();
        }        
        return back();
    }

    public function destroy(Post $post)
    {
        
        $this->authorize('delete', $post);

        $post->delete();

        return redirect('/posts');
    }
}
