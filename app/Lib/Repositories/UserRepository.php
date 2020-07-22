<?php

namespace App\Lib\Repositories;

use App\Models\Mine;
use App\Models\User;
use App\Support\Collection;
use App\Lib\Traits\UserData;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Lib\Traits\SettingsTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Lib\Helpers\Validators\UserValidator;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserRepository
{
    use UserData;
    use SoftDeletes;
    use SettingsTrait;

    public function find($userId = null)
    {
        $this->setUserId($userId)
             ->setUserDataModel();

        return $this->userDataModel;
    }

    public function all()
    {
        $users = User::with('moderator')
            ->get()
            ->reject(function ($user) {
                return $user->moderator && $user->moderator->type == 'admin';
            });
        
        return (new Collection($users))->paginate(10);
    }

    public function allWithBans()
    {
        $users = User::with('moderator', 'bans')
            ->get()
            ->reject(function ($user) {
                return $user->moderator && $user->moderator->type == 'admin';
            });
        return (new Collection($users))->paginate(10);
    }

    public function getUsersWithMines()
    {
        $users = $this->getUsersByLevel(10);
        $columnsNames = Mine::getAllMines();
        foreach($users as &$user)
        {
            $sumOfMines = $user->mine
                ->where('user_id', $user->id)
                ->sum(...$columnsNames);
            if(empty($sumOfMines))
            {
                unset($user);
            }
        }
        return $users;
    }

    public function getUserMineAmount($userId)
    {
        $user = User::find($userId);
        $columnsNames = Mine::getAllMines();
        $sumOfMines = $user->mine
            ->where('user_id', $user->id)
            ->sum(...$columnsNames);
        if(empty($sumOfMines))
        {
            return 0;
        }
        return $sumOfMines;
    }

    public function getUsersByLevel($levelMin = 1, $levelMax = false)
    {
        $query = User::where('level', '>=', $levelMin);
        if($levelMax)
        {
            $query->where('level', '<=', $levelMax);
        }
        return $query->get();
    }

    public function getBestUserByExp()
    {
        return User::orderBy('exp', 'desc')
            ->take(10)
            ->get();
    }

    public function getBestUserByCoins()
    {
        return User::orderBy('coins', 'desc')
            ->take(10)
            ->get();
    }

    public function getUserWithMinerals()
    {
        $this->setUserId()
             ->setUserModels();
        $basicMinerals = $this->getSettings('basicMineralCost');
        $advancedMinerals = $this->getSettings('advancedMineralCost');
        foreach ($basicMinerals as $mineral => $value) {
            $this->userDataModel->$mineral = $this->basicMineralUserModel->$mineral;
        }
        foreach ($advancedMinerals as $mineral => $value) {
            $this->userDataModel->$mineral = $this->advancedMineralUserModel->$mineral;
        }
        return $this->userDataModel;
    }

    public function updateUserNickame(Request $request, $user = null, $userId = null)
    {
        $this->setUserId($userId)
             ->setUserDataModel();

        $this->userDataModel->user = UserValidator::nicknameRequestValidator($request, $user);
        $result = $this->userDataModel->save();

        return $this->responseUserUpdate($request->ajax(), 'updateUserSuccess', $result);
    }

    public function updateUserPassword(Request $request, $password = null, $userId = null)
    {
        $this->setUserId($userId)
             ->setUserDataModel();

        $password = Hash::make(UserValidator::passwordRequestValidator($request, $password));
        $this->userDataModel->password = $password;
        $result = $this->userDataModel->save();

        return  $this->responseUserUpdate($request->ajax(), 'updatePasswordSuccess', $result);
    }

    public function updateUserPremium(Request $request, $premium = null, $userId = null)
    {
        $this->setUserId($userId)
             ->setUserDataModel();
        
        $premium =  UserValidator::premiumRequestValidator($request, $premium);
        $this->userDataModel->premium_end = Carbon::createFromFormat('Y-m-d H:i:s', $this->userDataModel->premium_end);
        $this->userDataModel->premium_end->addDays($premium);
        $result = $this->userDataModel->save();

        return $this->responseUserUpdate($request->ajax(), 'updatePremiumSuccess', $result);
    }

    public function updateUserCoins(Request $request, $coins = null, $userId = null)
    {
        $this->setUserId($userId)
             ->setUserDataModel();

        $result = $this->userDataModel->increment('coins', UserValidator::coinsRequestValidator($request, $coins));

        return $this->responseUserUpdate($request->ajax(), 'updateCoinsSuccess', $result);
    }


    public function checkPassword(Request $request)
    {
        $this->setUserId()
             ->setUserDataModel();
        
        Auth::attempt(['email'=>$this->userDataModel->email,'password' => $request->password]) ? $confirmed = true : $confirmed = false;

        return response()->json([
            'confirmed' => $confirmed
        ]);
    }

    public function deleteUser(Request $request, $userId = null)
    {
        $this->setUserId($userId)
             ->setUserDataModel();

        Auth::logout();
        
        $result = $this->userDataModel->delete();

        if($result && $request->has('deleteUser')){
            return redirect('home')->with('deleteSuccess', true);
        }
    }

    private function responseUserUpdate($isAjax, $successMessage, $result)
    {
        if ($isAjax) {
            return response()->json([
                'userDataModel' => $this->userDataModel,
                $successMessage => $result
            ]);
        }
        return redirect()->back()->with([$successMessage => $result]);
    }
}
