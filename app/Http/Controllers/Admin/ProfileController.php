<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\User;


class ProfileController extends Controller
{
    public function __construct(){

        $this->middleware('auth');
    }

    public function index() {
        $loggedId = intval(Auth::id());
        $user = User::find($loggedId);

        if($user){
            return view('admin.profile.index', [
                'user' => $user,
            ]);
        }
        return redirect()->route('admin');
    }
    public function save(Request $request)
    {
        $loggedId = intval(Auth::id());
        $user = User::find($loggedId);
        if ($user) {
            $data = $request->only([
                'name',
                'email',
                'password',
                'password_confirmation'
            ]);
            $validator = Validator::make([
                'name' => $data['name'],
                'email' => $data['email']
            ], [
                    'name' => ['required', 'string', 'max:100'],
                    'email' => ['required', 'string', 'email', 'max:100']
                ]
            );
            //  if ($validator->fails()) {
            //      return redirect()->route('users.edit', [
            //          'user' => $id
            //      ])->withErrors($validator);
            //  }
            //ALTERAR NOME:
            $user->name = $data['name'];
            //ALTERAR O EMAIL:
            //VERIFICA SE O EMAIL FOI ALTERADO
            if ($user->email != $data['email']) {
                //VERIFICA SE O EMAIL JÁ EXISTE NO BANCO COM ALGUM USUÁRIO
                $hasEmail = User::where('email', $data['email'])->get();
                //SE NÃO EXISTIR, ALTERA
                if (count($hasEmail) === 0) {
                    $user->email = $data['email'];
                } else {
                    //email tem que ser único
                    $validator->errors()->add('email', __('validation.unique', [
                        'attribute' => 'email'
                    ]));
                }
            }
            if(!empty($data['password'])) {
                if(strlen($data['password']) >= 4) {
                    if($data['password'] === $data['password_confirmation']) {
                        $user->password = Hash::make($data['password']);
                    } else {
                        $validator->errors()->add('password', __('validation.confirmed', [
                            'attribute'=> 'passwordphp'
                        ]));
                    }
                } else {
                    $validator->errors()->add('password', __('validation.min.string', [
                        'attribute' => 'password',
                        'min' => 4
                    ]));
                }
            }
            //SE TIVER ERROS:
            if(count($validator->errors()) > 0) {
                return redirect()->route('profile', [
                    'user' => $loggedId,
                ])->withErrors($validator);
            }
            $user->save();

            return redirect()->route('profile')
                ->with('warning', 'Alteração realizada com sucesso!');

        }
        return redirect()->route('profile');
    }



}
