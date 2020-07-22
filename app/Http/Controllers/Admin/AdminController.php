<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Lib\Repositories\BanRepository;
use App\Lib\Repositories\UserRepository;
use App\Lib\Repositories\SettingRepository;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        return view('admin/admin-home');
    }

    public function users()
    {
        $users = (new UserRepository)->allWithBans();
        return view('admin/admin-users', compact('users'));
    }

    public function settings()
    {
        $settings = (new SettingRepository)->all();
        return view('admin/admin-settings', compact('settings'));;
    }

    public function store(Request $request)
    {
        foreach($request->except(['_token']) as $name => $value){
            Setting::where('setting', $name)->update(['value' => $value]);
        }
        return redirect()->back();
    }

    public function ban(Request $request)
    {
        $result = (new BanRepository)->ban($request);
        return response()->json([
            'ban' => $request->has('user') && $result ? $request->user : null
        ]);
    }
    public function unban(Request $request)
    {
        $result = (new BanRepository)->unban($request);
        return response()->json([
            'unban' => $request->has('user') && $result ? $request->user : null
        ]);
    }
}
