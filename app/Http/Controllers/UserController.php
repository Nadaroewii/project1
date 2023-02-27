<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class UserController extends Controller
{
    public function register(Request $request)
    {
        $cari = $request->query('cari');
        if(!empty($cari)) {
            $datauser = User::sortable()->where('name', 'LIKE', '%' . $cari .'%')
            ->orWhere('username', 'LIKE', '%' . $cari.'%')->paginate(5)->onEachSide(1)->fragment('user');
        } else {
            $datauser = User::sortable()->paginate(5)->onEachSide(1)->fragment('user');
        }
        //$data['title'] = 'Register';
        return view('user/register') ->with([
            'datauser' => $datauser,
            'cari' => $cari
        ]);
    }
    public function register_action(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'gender' => 'required',
            'hobby' => 'required',
            'email'=> 'required',
            'telp' => 'required',
            'username' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required|same:password'
        ]);

        $user = new User([
            'name' => Str::title($request -> name),
            'gender' => $request -> gender,
            'hobby' => implode(', ', $request-> hobby),
            'email'=> $request -> email,
            'telp' => $request -> telp,
            'username' => $request -> username,
            'password' => Hash::make($request -> password),

        ]);
        $user->save();
        return redirect() ->route('register')->with('success', 'Data Berhasil Di Simpan!');
    }

    public function delete($user_id){
        $data = User::find($user_id);
        $data->delete();
        return redirect() ->route('register')->with('success', 'Data Berhasil di Hapus!');

    }
}
