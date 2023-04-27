<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Users;
use Illuminate\Http\Request;
use App\Helpers\FingerprintHelper;

class MessageController extends Controller
{
    public function index(Request $request, $generate_link)
    {   
        $fingerprint = FingerprintHelper::generate($request);
        $user = Users::where('generate_link', $generate_link)->first();
        $is_user = $user ? $user->generate_link : null;
        $is_user_account_device = $user ? $user->user_account_device : null;
        if($user === null || $is_user === null || $is_user_account_device!==$fingerprint){
            $user = Users::where('generate_link', $generate_link)->first();
            $username = $user->username;
            $messages = $user->messages()->with('comments')->latest()->paginate(10);
            return view('secretme.visitor', compact('generate_link','username','messages'));
        }
        $this_user = Users::with(['messages' => function($query) {
                $query->with('comments')->latest();
            }])->where('generate_link', $generate_link)->firstOrFail();
        $username = $this_user->username;
        $messages = $this_user->messages()->with('comments')->latest()->paginate(10);
        return view('secretme.profile', compact('username','generate_link','messages'));
    }

    public function store(Request $request, $generate_link)
    {
        $user = Users::where('generate_link', $generate_link)->first();
        $user_id = $user->id;
        $request->validate([
            'message' => 'required',
        ]);
        $message = new Message();
        $message->user_id = $user_id;
        $message->message = $request->message;
        $message->save();
        return redirect()->back()->with('message_success', 'Message sent successfully!');
    }

    public function destroy(Request $request, $id)
    {
        $message = Message::findOrFail($id);
        $message->delete();
        return redirect()->back()->with('message_success', 'Message deleted successfully!');
    }
}
