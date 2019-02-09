<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    protected $redirectTo = '/commande/adresse';

    /**
     * Create a new controller instance.
     *
     * @return void
     *
     */
    //ce middleware va vérifier qui l’utilisateur ‘auth’ est identifié ou pas.
//Middlewrae : c’est ce qui se situe entre ma requête http (ma question) et la réponse http.
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function loginMonProduit(Request $request)
    {
//        Vérifier si l'user qui est en train de se logger est admin ou pas
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            //si l’user est == à 1 sur la table users, dans la colonne role_id
            if ($user->role_id == 1) {
                //si oui == 1 alors redirige vers la page admin
                return redirect(route('login_admin_connect'));
                //sinon
            } else {
                //redirige vers la page adresse
                return redirect(route('commande_adresse'));
            }
        }
        //en cas d'erreur redirige vers la page login
        return redirect(route('login'));
    }
}
