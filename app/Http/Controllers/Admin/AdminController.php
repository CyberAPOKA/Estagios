<?php

namespace App\Http\Controllers\Admin;

use App\Core\Constants\RequestStatus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\City;
use App\Models\District;
use App\Models\Courses;
use App\Models\Education;
use App\Models\Progress;
use Illuminate\Support\Facades\Auth;
use App\Models\Requests;
use Illuminate\Support\Facades\DB;
use App\Models\Resume;

class AdminController extends Controller
{

    public function index()
    {
        return view('admin.pages.index');
    }

    public function users()
    {
        $cities     = City::all();
        $districts  = District::all();
        $courses    = Courses::all();
        $educations = Education::all();
        // dd($cities);
        return view('admin.pages.users', compact('cities', 'districts', 'courses', 'educations'));
    }

    public function login()
    {
        return view('admin.auth.login');
    }

    public function auth(Request $request)
    {
        if (auth('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {

            return redirect()->route('admin.index');
        } else {
            return redirect()->back()->with('danger', 'E-mail ou senha inválida.');
        }
    }

    public function getUsers(Request $request)
    {
        $users = User::with('profile', 'address', 'formation')
            ->when($request->email, function ($query, $email) {
                return $query->where('email', 'LIKE', '%' . $email . '%');
            })
            ->when($request->name, function ($query, $name) {
                return $query->join('user_profiles', 'users.id', '=', 'user_profiles.user_id')
                    ->where('user_profiles.name', 'LIKE', '%' . $name . '%');
            })
            ->when($request->city, function ($query, $city) {
                return $query->join('user_addresses', 'users.id', '=', 'user_addresses.user_id')
                    ->where('user_addresses.city', 'LIKE', '%' . $city . '%');
            })
            ->when($request->course, function ($query, $course) {
                return $query->join('user_formations', 'users.id', '=', 'user_formations.user_id')
                    ->where('user_formations.course', 'LIKE', '%' . $course . '%');
            })
            ->when($request->semester, function ($query, $semester) {
                return $query->join('user_formations', 'users.id', '=', 'user_formations.user_id')
                    ->where('user_formations.semester', 'LIKE', '%' . $semester . '%');
            })
            ->when($request->shift, function ($query, $shift) {
                return $query->join('user_formations', 'users.id', '=', 'user_formations.user_id')
                    ->where('user_formations.shift', 'LIKE', '%' . $shift . '%');
            })
            ->orderBy('users.id')
            ->paginate(10);

        return [
            'users' => $users
        ];
    }

    public function getUsersInResumes(Request $request)
    {

        $users = User::with('profile', 'address', 'formation')
            ->when($request->email, function ($query, $email) {
                return $query->where('email', 'LIKE', '%' . $email . '%');
            })
            ->when($request->name, function ($query, $name) {
                return $query->join('user_profiles', 'users.id', '=', 'user_profiles.user_id')
                    ->where('user_profiles.name', 'LIKE', '%' . $name . '%');
            })
            ->when($request->city, function ($query, $city) {
                return $query->join('user_addresses', 'users.id', '=', 'user_addresses.user_id')
                    ->where('user_addresses.city', 'LIKE', '%' . $city . '%');
            })
            ->when($request->course, function ($query, $course) {
                return $query->join('user_formations', 'users.id', '=', 'user_formations.user_id')
                    ->where('user_formations.course', 'LIKE', '%' . $course . '%');
            })
            ->when($request->semester, function ($query, $semester) {
                return $query->join('user_formations', 'users.id', '=', 'user_formations.user_id')
                    ->where('user_formations.semester', 'LIKE', '%' . $semester . '%');
            })
            ->when($request->shift, function ($query, $shift) {
                return $query->join('user_formations', 'users.id', '=', 'user_formations.user_id')
                    ->where('user_formations.shift', 'LIKE', '%' . $shift . '%');
            })
            ->whereNotIn('id', function ($query) use ($request) {
                $query->select('user_id')
                    ->from('resumes')
                    ->where('request_id', $request->id);
            })
            ->orderBy('users.id')
            ->paginate(10);

        return [
            'users' => $users
        ];
    }


    public function saveUsersInResumes(Request $request)
    {
        $admin = auth('admin')->user();
        $adminType = $admin->type;
        $users = $request->input('users');
        $requestId = $request->input('requestId');

        $req = Requests::findOrFail($requestId);
        if ($adminType === 'rh') {
            $req->status = RequestStatus::ResumesSentByHR;
            $req->save();
        }

        Progress::updateOrInsert(
            ['admin_id' => $admin->id, 'request_id' => $requestId],
            ['observation' => $request->input('observation')]
        );

        if (!$req) {
            return response()->json(['success' => false, 'message' => 'Request not found'], 404);
        }
        $selectedUsers = User::whereIn('id', $users)->get();

        // $resume = $req->resumes()->createMany($selectedUsers->map(function ($user) {
        //     return ['user_id' => $user->id];
        // })->toArray());

        $userObservations = [];
        foreach ($selectedUsers as $user) {
            $userObservations[] = [
                'user_id' => $user->id,
            ];
        }
        $resume = $req->resumes()->createMany($userObservations);

        return redirect()->back();
        // return response()->json(['success' => true, 'resume' => $resume]);
    }


    public function logout()
    {
        Auth::guard('admin')->logout();

        return redirect()->route('admin.login');
    }

    // public function downloadFile($user_id, $filename)
    // {
    //     $path = storage_path('app/curriculums/' . $user_id . '/' . $filename);

    //     if (file_exists($path)) {
    //         return response()->download($path, $filename);
    //     } else {
    //         return abort(404, 'File not found');
    //     }
    // }

    public function downloadFile($user_id, $file_path, $file_original_name)
    {
        $path = storage_path('app/curriculums/' . $user_id . '/' . $file_path);

        // dd('path' . $path, 'file_path' . $file_path, 'original_name' . $file_original_name);

        if (file_exists($path)) {
            return response()->download($path, $file_original_name);
        } else {
            return abort(404, 'File not found');
        }
    }
}
