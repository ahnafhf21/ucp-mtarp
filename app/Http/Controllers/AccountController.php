<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use Alert;
use App\User;
use App\Shop;
use App\Character;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      if (!Auth::guest()) {
        # code...

      $user = Auth::user();
      $account = User::where('username', $user->username)->get()->first();
      $characters = Character::where('account', $account->id)->get();
      return view('account.single', compact('account', 'characters'));
      }
      // Alert::warning('Anda harus login untuk melanjutkan.','Oops!')->persistent('Tutup');
      return Redirect::route('login');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($username)
    {
      if (!Auth::guest()) {
      $account = User::where('username', $username)->get()->first();
      $characters = Character::where('account', $account->id)->get();
      return view('account.single', compact('account', 'characters'));
      }

      Alert::warning('Anda harus login untuk melanjutkan.','Oops!')->persistent('Tutup');
      return Redirect::route('login');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function edit($username)
     {
       $account = User::where('username', $username)->get()->first();
       if($username != Auth::user()->username){
         if(Auth::user()->admin >= 6){

           return view('account.edit-profile', compact('account'));
         }
         abort(404);
       }
       return view('account.edit-profile', compact('account'));
     }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function update(Request $request, $username)
      {
        $this->validate($request, [
        'name' => 'required|max:255',
        ]);
        $user = User::where('username', $username)->update($request->except(['_method','_token']));
        Alert::success('Profil anda berhasil di update.','Selamat!')->persistent('Tutup');
        return Redirect::route('account.show', $username);
      }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    /**
      * changePassword Function
    */
 
    public function changePassword($username)
    {
      $user = User::where('username', $username)->get()->first();
      if($username != Auth::user()->username){
        if(Auth::user()->admin >= 6){
          return view('account.change-password', compact('user'));
        }
        abort(404);
      }
      return view('account.change-password', compact('user'));
    }

    public function updatePassword(Request $request, $username)
    {
      $this->validate($request, [
      'current_password' => 'required|max:255',
      'password'  => 'required|min:6|max:255',
      'password_confirmation' => 'required|min:6|max:255|same:password'
      ]);
      $user = User::where('username', $username)->get()->first();

      if (!(md5(md5($request->current_password) . $user->salt) == $user->getAuthPassword()))
      {
        Alert::error('Password anda yang sekarang tidak cocok.','Oops!')->persistent('Tutup');
        return Redirect::route('password.edit', $username);
      }
      $user->password = md5(md5($request->password) . $user->salt);
      $user->save();
      Alert::success('Password anda berhasil diganti.','Selamat!')->persistent('Tutup');
      return Redirect::route('account.show', $username);
    }

    /**
      * changeEmail Function
    */

    public function changeEmail($username)
    {
      $user = User::where('username', $username)->get()->first();
      if($username != Auth::user()->username){
        if(Auth::user()->admin >= 6){
          return view('account.change-email', compact('user'));
        }
        abort(404);
      }
      return view('account.change-email', compact('user'));
    }

    public function updateEmail(Request $request, $username)
    {
      $this->validate($request, [
      'email' => 'required|email|unique:accounts|max:255',
      ]);
      $user = User::where('username', $username)->get()->first();
      $user->email = $request->email;
      //$user->token = str_random(30);
      $user->save();

      //Mail::to($user->email)->queue(new ChangeEmail($user));
      Alert::success('Email anda berhasil diganti.','Selamat!')->persistent('Tutup');
      return Redirect::route('account.index');
    }

    public function verifyChangeEmail($user, $token)
    {
      $userDB = User::where('username', $user)->get()->first();
      if ($userDB->token == $token)
      {
        $newEmail = $userDB->reset_email;
        $userDB->email = $newEmail;
        $userDB->reset_email = '';
        $userDB->save();
        Alert::success('Email anda berhasil ganti.','Selamat!')->persistent('Tutup');
        return Redirect::route('account.show', $user);
      }else
      {
        Alert::error('Token anda tidak cocok.','Oops!')->persistent('Tutup');
        return Redirect::route('account.show', $user);
      }
    }

    public function transferAccount($user)
    {
      $user = User::where('username', $user)->get()->first();
      $user->token = str_random(30);
      $user->save();
      Mail::to($user->email)->queue(new TransferAccount($user));

      Alert::info('Cek email baru anda untuk konfirmasi.','Info!')->persistent('Tutup');
      return Redirect::route('account.show', $user->username);
    }

    public function verifyTransferAccount($user, $token)
    {
      $user = User::where('username', $user)->get()->first();
      if ($user->token == $token) {
        Alert::success('Akun anda berhasil di transfer.','Selamat!')->persistent('Tutup');
        $user->transfer_account = 1;
        $user->save();
      }else {
        Alert::error('Token anda tidak cocok.','Oops!')->persistent('Tutup');
      }
      return Redirect::route('account.show', $user->username);
    }

    public function activation($user)
    {
      $user = User::where('username', $user)->get()->first();
      $user->activated = 1;
      $user->save();
      //Mail::to($user->email)->queue(new Activation($user));

      Alert::success('Akun anda berhasil di aktivasi.','Selamat!')->persistent('Tutup');
      return Redirect::route('account.index');
    }

    public function verifyActivation($user, $token)
    {
      $user = User::where('username', $user)->get()->first();
      if ($user->token == $token) {
        Alert::success('Akun anda aktif.','Selamat!')->persistent('Tutup');
        $user->activated = 1;
        $user->save();
      }else {
        Alert::error('Token anda tidak cocok.','Oops!')->persistent('Tutup');
      }
      return Redirect::route('account.show', $user->username);
    }
}
