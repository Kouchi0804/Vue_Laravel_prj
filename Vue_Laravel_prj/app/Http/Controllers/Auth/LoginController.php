<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Requests\Auth\LoginRequest;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * このコンストラクタは、LoginControllerクラスのインスタンスが生成される際に、特定のミドルウェアを適用することで、アクセス制御を行っています。
     * これにより、ログインページには未認証のユーザーのみがアクセスでき、ログアウト機能は認証されたユーザーのみが利用できるようになります。
     * 
     * @return void
     */
    public function __construct()
    {
        //このミドルウェアは、ユーザーがゲスト（未認証）であることを要求します。つまり、認証されていないユーザーのみがアクセスできるようにします。
        //ただし、logoutメソッドは例外として扱われ、認証されたユーザーもアクセスできます。
        $this->middleware('guest')->except('logout');

        //このミドルウェアは、ユーザーが認証されていることを要求します。つまり、認証されたユーザーのみがアクセスできるようにします。
        //この設定により、logoutメソッドは認証されたユーザーのみが実行できるようになります。
        $this->middleware('auth')->only('logout');
    }
}
