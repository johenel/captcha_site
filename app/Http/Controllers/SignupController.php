<?php

namespace App\Http\Controllers;

use App\Models\Transactions;
use Illuminate\Http\Request;
use Hash;

use App\Models\Users;

class SignupController extends Controller
{

    public function index(Request $request)
    {
        return view('pages.signup');
    }

    public function attempt(Request $request)
    {
        $draft = (object)[];
        $draft->first_name = $request->first_name;
        $draft->last_name = $request->last_name;
        $draft->email = $request->email;

        $request->session()->flash('draft', $draft);

        $referrer = $this->checkIfReferred($request->ref);

        $this->validate($request, [
            'email' => 'required|email|unique:users',
            'first_name' => 'required|min:3',
            'last_name' => 'required|min:3',
            'password' => 'required|min:6|confirmed'
        ]);

        $user = new Users;

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();

        if($referrer) {
            $transaction = new Transactions();
            $transaction->users_id = $referrer->id;
            $transaction->value = 40;
            $transaction->type_id = 3;
            $transaction->status_id = 3;
            $transaction->source_token = $user->id;
            $transaction->save();
        }

        $request->session()->put('user', $user);

        return redirect('/');
    }

    private function checkIfReferred($ref)
    {
        $email = decrypt(decodeURIComponent($ref));

        $result = Users::where('email', $email)->get();

        if(count($result) == 1) {
            return $result[0];
        }

        return false;
    }
}
