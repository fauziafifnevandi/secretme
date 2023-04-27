<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use App\Helpers\FingerprintHelper;

class UserController extends Controller
{
    public function index(Request $request)
    {   
        $fingerprint = FingerprintHelper::generate($request);
        $user = Users::where('user_account_device', $fingerprint)->first();
        $generate_link = $user ? $user->generate_link : null;
        if($user === null && $generate_link === null){
            return view('secretme.index');
        }
        return redirect()->route('messages.index', ['generate_link' => $generate_link]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required',
        ]);
        $username = $request->username;
        $fingerprint = FingerprintHelper::generate($request);
        $generate_link = $this->generatelink($username);
        Users::create([
            'username' => $request->username,
            'user_account_device' => $fingerprint,
            'generate_link' => $generate_link
        ]);
        return redirect()->route('users.index');
    }

    public function generatelink($username)
    {
        $date = date('Ymd');
        $uniqueString = substr(uniqid($username . $date), -6);
        return $uniqueString;
    }
}
