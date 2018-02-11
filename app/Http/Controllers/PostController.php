<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sort_by = $request->input('sort_by');
        $ls_postdetail = \App\PostDetail::all()->where('user_id','=',Auth::user()->id);


        if ($sort_by != null && $sort_by != "") {
            $ls_post = \App\Post::where('user_id','=',Auth::user()->id)
                    ->where('is_using', '=', $sort_by)
                    ->paginate(5);

        } else {
            $ls_post = \App\Post::where('user_id','=',Auth::user()->id)->paginate(5);
        }


        return view('post.list_post')->with('ls_post', $ls_post)->with('sort_by',$sort_by)->with('ls_postdetail', $ls_postdetail);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ls_tag = \App\Tag::where('user_id','=',Auth::user()->id)->get();
        return view('post.add_post')->with('ls_tag',$ls_tag);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'Required|max:191',
            'content' => 'Required',
            'img' => 'Required'
        ]);

        $title = $request->input('title');
        $content = $request->input('content');
        $tags = $request->input('tag');
        $is_using = $request->input('is_using');
       
        $fileImg = $request->file('img');
        $directory = public_path("images");
        $imgName = time().'_post_'.Auth::user()->id.'.'.$fileImg->getClientOriginalExtension();
        $fileImg->move($directory, $imgName);

        $new_post = new \App\Post();
        $new_post->title = $title;
        $new_post->content = $content;
        $new_post->img = 'images/'.$imgName;
        $new_post->user_id = Auth::user()->id;
        $new_post->is_using = ($is_using == 1) ? 1 : 0;
        $new_post->save();

        if ($tags != null && $tags != "") {
            foreach ($tags as $tag_id) {
                $new_post_detail = new \App\PostDetail();
                $new_post_detail->post_id = $new_post->id;
                $new_post_detail->tag_id = $tag_id;
                $new_post_detail->user_id = Auth::user()->id;
                $tag = \App\Tag::find($tag_id);
                $new_post_detail->tag_name = $tag->name;
                $tag->number_of_posts++;
                $tag->save();
                $new_post_detail->save();
            }
        }
        
        $request->session()->flash("success_msg", "Successful add a post.");
        return redirect("/home/post");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ls_tag = \App\Tag::where('user_id','=',Auth::user()->id)->get();
        $post = \App\Post::find($id);
        $ls_postdetail = \App\PostDetail::where('user_id','=',Auth::user()->id)->where('post_id','=',$id)->get();
        $exist_tags = array();
        if ($ls_postdetail != null && $ls_postdetail != "") {
            foreach ($ls_postdetail as $postdetail) {
                $exist_tags[] = $postdetail->tag_id;
            }
        }
        return view('post.edit_post')->with('post',$post)->with('exist_tags',$exist_tags)->with('ls_tag',$ls_tag);
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
        $this->validate($request, [
            'title' => 'Required|max:191',
            'content' => 'Required'
        ]);

        $title = $request->input('title');
        $content = $request->input('content');
        $tags = $request->input('tag');
        $is_using = $request->input('is_using');
        $new_post = \App\Post::find($id);
       
        $fileImg = $request->file('img');
        if ($fileImg != null && $fileImg != '') {
            $directory = public_path("images");
            $imgName = time().'_post_'.Auth::user()->id.'.'.$fileImg->getClientOriginalExtension();
            $fileImg->move($directory, $imgName);        
            unlink(public_path($new_post->img));
            Storage::delete(public_path($new_post->img));
            $new_post->img = 'images/'.$imgName;
        } else {
            $new_post->img = $new_post->img;
        }

        $new_post->title = $title;
        $new_post->content = $content;
        
        $new_post->user_id = Auth::user()->id;
        $new_post->is_using = ($is_using == 1) ? 1 : 0;
        $new_post->save();

        $postdetails = \App\PostDetail::where('user_id','=',Auth::user()->id)->where('post_id', '=', $id)->get();
        $ls_tag = \App\Tag::where('user_id','=',Auth::user()->id)->get();
        foreach ($postdetails as $postdetail) {
            foreach ($ls_tag as $tag) {
                if ($postdetail->tag_id == $tag->id) {
                    $tag->number_of_posts--;
                    $tag->save();
                }
            }
            $postdetail->delete();
        }

        foreach ($tags as $tag_id) {
            $new_post_detail = new \App\PostDetail();
            $new_post_detail->post_id = $new_post->id;
            $new_post_detail->tag_id = $tag_id;
            $new_post_detail->user_id = Auth::user()->id;
            $tag = \App\Tag::find($tag_id);
            $new_post_detail->tag_name = $tag->name;
            $tag->number_of_posts++;
            $tag->save();
            $new_post_detail->save();
        }
        
        $request->session()->flash("success_msg", "Successful edit a post.");
        return redirect("/home/post");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = \App\Post::find($id);
        unlink(public_path($post->img));
        Storage::delete(public_path($post->img));
        $post->delete();

        $postdetails = \App\PostDetail::where('user_id','=',Auth::user()->id)->where('post_id', '=', $id)->get();
        $tags = \App\Tag::where('user_id','=',Auth::user()->id)->get();
        foreach ($postdetails as $postdetail) {
            foreach ($tags as $tag) {
                if ($postdetail->tag_id == $tag->id) {
                    $tag->number_of_posts--;
                    $tag->save();
                }
            }
            $postdetail->delete();
        }


        Session::flash("success_msg", "Successful delete a post");

        return back();
    }

    public function change($id) {
        $post = \App\Post::find($id);
        $post->is_using = ($post->is_using == 1) ? 0 : 1;
        $post->save();

        Session::flash("success_msg", "Successful change the state of a post");

        return back();
    }
}