<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        if (session()->get('is_logged_in')) {
            return redirect()->to('/tasks');
        }

        return view('auth/login');
    }

    public function attemptLogin()
    {
        $rules = [
            'username' => 'required',
            'password' => 'required',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $userModel = new UserModel();
        $user = $userModel->findByUsername(
            trim((string) $this->request->getPost('username'))
        );

        $password = (string) $this->request->getPost('password');

        if ($user === null || ! password_verify($password, $user['password'])) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Invalid username or password.');
        }

        session()->regenerate(true);

        session()->set([
            'user_id'      => $user['id'],
            'username'     => $user['username'],
            'full_name'    => $user['full_name'],
            'is_logged_in' => true,
        ]);

        return redirect()->to('/tasks')
            ->with('success', 'You are now logged in.');
    }

    public function logout()
    {
        session()->destroy();

        return redirect()->to('/login')
            ->with('success', 'You have been logged out.');
    }
}