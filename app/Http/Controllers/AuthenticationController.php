<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Services\ValidatorService;

class AuthenticationController extends Controller
{
    private $validatorService;

    public function __construct(ValidatorService $validatorService) {
        $this->validatorService = $validatorService;
    }

    /**
     * This method adds new users.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createAccount(Request $request)
    {
        $attr = $this->validatorService->validateFields($request->all(), [
            'photo' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'pseudo' => 'required|string|unique:users,pseudo',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|min:6'
        ]);

        $user = User::create([
            'photo' => $attr['photo'],
            'first_name' => $attr['first_name'],
            'last_name' => $attr['last_name'],
            'pseudo' => $attr['pseudo'],
            'email' => $attr['email'],
            'password' => bcrypt($attr['password'])

        ]);

        return $this->success([
            'token' => $user->createToken('tokens')->plainTextToken
        ]);
    }

    /**
     * Use this method to signin users.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


}
