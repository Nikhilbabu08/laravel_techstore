<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TechPosts;

class TechPostsController extends Controller
{
    public function createPost(Request $request)
    {
        $request->validate([
            'author' => 'required|max:255|string',
            'topic' => 'required|max:225|string',
            'description' => 'required|max:500|string',
        ]);

        TechPosts::create([
            'author' => $request->author,
            'topic' => $request->topic,
            'description' => $request->description,
            'image' => $request->image,
        ]);

        return response()->json([
            'message' => 'post details saved',
            'status' => 200,
        ]);
    }

    public function getPosts(Request $request)
    {
        $posts = TechPosts::orderByDesc('created_at')->get();

        return response()->json([
            'message' => 'All product details',
            'posts' => $posts,
            'status' => 200,
        ]);
    }

    public function getPostById($id)
    {
        $post = TechPosts::find($id);

        return response()->json([
            'message' => 'post details',
            'post' => $post,
            'status' => 200,
        ]);
    }

    public function updatepost(Request $request, $id)
    {
        TechPosts::find($id)->update([
            'author' => $request->author,
            'topic' => $request->topic,
            'description' => $request->description,
            'image' => $request->image,
        ]);

        $updated_post = TechPosts::find($id);

        return response()->json([
            'message' => 'post details updated',
            'updated_post' => $updated_post,
            'status' => 200,
        ]);
    }

    public function deletePost($id)
    {
        TechPosts::find($id)->delete();

        return response()->json([
            'message' => 'post deleted',
            'status' => 200,
        ]);
    }
}
