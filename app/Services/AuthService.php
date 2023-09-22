<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\Contracts\IUserRepository;
use App\Services\Core\BaseService;
use Exception;
use Illuminate\Support\Facades\Auth;

class AuthService extends BaseService
{
    protected $userRepository;

    public function __construct(IUserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Auth service method.
     *
     * @param array $data validated data from UI
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(array $data)
    {
        try {
            $user = User::query()
                        ->where('username', '=', $data['username'])
                        ->first();

            if (!$user) {
                return $this->redirectWith('Такого номера телефона не найдено!', 'error');
            }

            $credentials = [
                'username' => $data['username'],
                'password' => $data['password'],
            ];

            if (!Auth::attempt($credentials, $data['remember'])) {
                return $this->redirectWith('Ошибка входа или пароля! Попробуйте еще раз!', 'error');
            }

            return redirect()->route('dashboard');
        } catch (Exception $e) {
            return $this->redirectWith(
                env_dependend_error($e->getMessage()),
                'error'
            );
        }
    }
}
