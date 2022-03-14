<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        return view('posts', [
            'posts' => Post::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View|RedirectResponse|Redirector
     */
    public function create()
    {
        if (!Auth::check()) {
            return redirect('/login');
        }
        return view('post-form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return RedirectResponse|Response|Redirector
     */
    public function store(Request $request)
    {
        //TODO something goes wrong with validation
//        $validated = $request->validate([
//            'title' => 'required|max:255',
//            'image' => 'required|mimes:jpg,png,jpeg',
//            'text' => 'required|max:3000',
//        ]);

        $post = new Post;

        $post->title = $request->title;
        $post->text = $request->text;
        $uploadFileUrl = Cloudinary::upload($request->file('image')->getRealPath(), [
            'folder' => 'test-laravel-app',
        ])->getSecurePath();
        $post->image = $uploadFileUrl;
        $post->user_id = Auth::id();
        $post->setCreatedAt(date('Y-m-d H:i:s'));

        $post->save();

        return redirect('/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Post $post
     * @return Factory|View|Response
     */
    public function show(Post $post)
    {
        return view('post', [
            'post' => $post
        ]);
    }

    public function showUserPosts(Request $request) {
        return view('posts', [
            'posts' => Post::query()->where('user_id', $request->id)->get(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Post $post
     * @return Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Post $post
     * @return Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Post $post
     * @return Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
