<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Users;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Helpers\FingerprintHelper;

class CommentController extends Controller
{
    public function store(Request $request, $id)
    {
        $fingerprint = FingerprintHelper::generate($request);
        $user = Users::where('user_account_device', $fingerprint)->first();
        $generate_link = $user ? $user->generate_link : null;
        $message = Message::where('id', $id)->first();
        $message_id = $message->id;
        $request->validate([
            'comment' => 'required',
        ]);
        $comment = new Comment();
        $comment->message_id = $message_id;
        $comment->comment = $request->comment;
        $comment->save();
        return redirect()->back()->with('comment_success', 'Comment added successfully!');
    }

    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'comment' => 'required',
        ]);
        $comment = Comment::findOrFail($id);
        $comment->comment = $request->comment;
        $comment->save();
        return redirect()->back()->with('success', 'Comment updated successfully.');
    }

    public function edit($id)
    {
        $comment = Comment::findOrFail($id);
        return response()->json(['comment' => $comment]);
    }

    public function destroy(Request $request, $id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();
        return redirect()->back()->with('comment_success', 'Comment deleted successfully!');
    }
}
