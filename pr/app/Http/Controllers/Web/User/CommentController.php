<?php

namespace App\Http\Controllers\Web\User;

use App\Comment;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function AddComment(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
//             echo "<pre>";
//             print_r($data);
//             die;
            $comment = new Comment();
            $comment->body = $request->get('comment_body');
            $comment->user()->associate($request->user());
            $product = Product::find($request->get('product_id'));
            $product->comments()->save($comment);
            return back();
        }
    }
    public function replyStore(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            $reply = new Comment();
            $reply->body = $request->get('comment_body');
            $reply->user()->associate($request->user());
            $reply->parent_id = $request->get('comment_id');
            $product = Product::find($request->get('product_id'));
            $product->comments()->save($reply);
            return back();
        }
    }
}
