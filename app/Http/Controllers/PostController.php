<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use App\Http\Requests\CreatePostRequest;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        $posts = Post::latest()->get();
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        
        if($file = $request->file('file')){
            $name = $file->getClientOriginalName();
            $file->move('image', $name);
            $input['path'] = $name;

        }

        // Post::create($input);
        // $file = $request->file('file');
        // echo $file."<br>";
        // echo $file->getClientOriginalName()."<br>";
        // echo $file->getFilename()."<br>";
        // echo $file->getFileInfo()."<br>";
        // echo $file->getMaxFilesize()."<br>";


        $this->validate($request, [
            'title'=>'required',
            'content'=>'required'
        ]);

        // $title = $request->title;
        // $conent = $request->content;
        
        // $validator = Validator::make($request->all(), [
        //     'title' => 'required|unique:posts|max:255',
        //     'content' => 'required',
        // ]);
 
        // if ($validator->fails()) {
        //     return redirect('posts/create')
        //                 ->withErrors($validator)
        //                 ->withInput();
        // }

        $post = Post::create($input);
        $post->save();
        return redirect(route('posts.show', $post->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $post = Post::findOrFail($id);
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $post = Post::findOrFail($id);
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $title = $request->title;
        $conent = $request->content;

        $post->update([
            'title' => $title,
            'content' => $conent,
            'user_id' => $post->user_id
        ]);

        return redirect(route('posts.show', $post->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->forcedelete();
        return redirect('posts');
    }

    public function contact_view(){
        return view('contact');
    }

    public function show_view($name, $number){
        return view('show', compact('name','number'));
    }
}
