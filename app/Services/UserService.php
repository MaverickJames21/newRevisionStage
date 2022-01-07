<?php
namespace App\Services;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use App\Exceptions\ApiException;

class UserService {

    private $validatorService;

    public function __construct(ValidatorService $validatorService) {
        $this->validatorService = $validatorService;
    }

    public function getUser($id)
    {
        // Get a single user
        $user = User::findOrFail($id);
        $user->posts;

        // Return a single user as a resource
        return $user;

        //return User::all();
    }
    public function allUser()
    {
        $users = User::paginate(10);
        return $users;
        // Return collection of posts as a resource


    }

}
