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


    public function validateUser()
    {
      // Validating fields.
      $validatorRules = [
        'photo' => 'required|string|max:255',
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'pseudo' => 'required|string|unique:users,pseudo',
        'avatar' => 'required|string|max:255',
        'email' => 'required|string|email|unique:users,email'
      ];

      return $validatorRules;
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

    public function addUser(Request $request)
        {
            try {
                //Step 1: validate field
                $this->validatorService->validateFields($request->all(), $this->validateUser());

                // Step 2: creat user
                $user = new user;
                $user->photo = $request->input('photo');
                $user->first_name = $request->input('first_name');
                $user->last_name = $request->inptu('last_name');
                $user->pseudo = $request->input('pseudo');
                $user->email = $request->input('email');
                $user->password = $request->input('password');
                $user->save();

                // Step 3: return user
                return $user;

            }

            catch(Exception $e) {

                throw new ApiException("il y a eu une erreur lors de la création de l'utilisateur");
            }
        }


}
