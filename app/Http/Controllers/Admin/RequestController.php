<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Requests;
use App\Models\Courses;
use App\Models\Departament;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\RequestCourses;
use App\Core\Constants\RequestStatus;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Core\Constants\AdminTypes;
use App\Models\Progress;
use App\Models\City;
use App\Models\District;
use App\Models\Education;
use App\Models\Resume;

class RequestController extends Controller
{
    public function create()
    {
        $courses = Courses::all();
        $departament = Departament::all();


        if (auth('admin')->check() && auth('admin')->user()->type == AdminTypes::RECRUITER) {
            return view('admin.request.create-request', compact('courses', 'departament'));
        }

        return redirect()->route('admin.index');
    }


    public function store(Request $request)
    {
        $request->validate(
            [
                'level' => 'required',
                'secretary_phone' => ['required', 'regex:/^\(\d{2}\) \d{1} \d{4}-\d{4}$/'],
                'responsible' => 'required',
                'hiring_type' => 'required',
                'information' => 'required',
                'departament_id' => 'required',
            ],
            [
                'required' => 'O campo é obrigatório.',
                'secretary_phone.regex' => 'O formato do telefone está inválido.',
            ]
        );
        $req = Requests::create(
            [
                'level' => $request->input('level'),
                'hiring_amount' => $request->input('hiring_amount'),
                'secretary_phone' => $request->input('secretary_phone'),
                'responsible' => $request->input('responsible'),
                'hiring_type' => $request->input('hiring_type'),
                'trainee_name' => $request->input('trainee_name'),
                'information' => $request->input('information'),
                'departament_id' => $request->input('departament_id'),
            ]
        );

        $admin = auth('admin')->user();
        Progress::create(
            [
                'admin_id' => $admin->id,
                'request_id' => $req->id,
                'observation' => $request->input('observation'),
            ]
        );

        $courses = json_decode($request->input('course'));
        foreach ($courses as $course) {
            RequestCourses::create([
                'course_id' => $course,
                'request_id' => $req->id
            ]);
        }

        return redirect()->back()->with('success_solicitacao', 'Solicitação criada com sucesso!');
    }


    public function requests()
    {
        return view('admin.request.requests');
    }

    public function requestsCourses($id)
    {
        $request = Requests::findOrFail($id);
        $courses = $request->courses()->with('course')->get()->pluck('course.course', 'course.id')->toArray();
        $coursesJson = json_encode($courses);

        return view('admin.request.requests-courses', compact('request', 'coursesJson'));
    }


    public function show($id)
    {
        $request = Requests::findOrFail($id);
        $courses = $request->courses()->with('course')->get()->pluck('course.id', 'course.course');
        $allCourses = Courses::all();
        $departaments = Departament::all();
        $admin = auth('admin')->user();
        $progress = Progress::where('request_id', $request->id)
            ->with('admin')
            ->orderBy('created_at', 'desc')
            ->get();

        $resumes = Resume::where('request_id', $request->id)
            ->with('user', 'user.profile', 'user.formation')
            ->orderBy('id')
            ->paginate(10);

        // ->get();

        $cities     = City::all();
        $districts  = District::all();
        $educations = Education::all();

        return view(
            'admin.request.show-request',
            compact(
                'request',
                'courses',
                'allCourses',
                'departaments',
                'admin',
                'progress',
                'cities',
                'districts',
                'courses',
                'educations',
                'resumes'
            )
        );
    }

    public function getResumes(Request $request, $id)
    {
        $resumes = Resume::where('request_id', $id)
            ->when($request->input('name'), function ($query, $name) {
                $query->whereHas('user.profile', function ($query) use ($name) {
                    $query->where('name', 'LIKE', '%' . $name . '%');
                });
            })
            ->with('user', 'user.profile', 'user.formation')
            ->orderBy('id')
            ->paginate(10);

        return [
            'resumes' => $resumes
        ];
    }

    public function getRequests(Request $request)
    {
        $requests = Requests::with('departament')
            ->when($request->level, function ($query, $level) {
                return $query->where('level', 'LIKE', '%' . $level . '%');
            })
            ->when($request->hiring_type, function ($query, $hiring_type) {
                return $query->where('hiring_type', 'LIKE', '%' . $hiring_type . '%');
            })
            ->when($request->secretary_phone, function ($query, $secretary_phone) {
                return $query->where('secretary_phone', 'LIKE', '%' . $secretary_phone . '%');
            })
            ->when($request->responsible, function ($query, $responsible) {
                return $query->where('responsible', 'LIKE', '%' . $responsible . '%');
            })
            ->when($request->status, function ($query, $status) {
                return $query->where('status', 'LIKE', '%' . $status . '%');
            })
            ->when($request->trainee_name, function ($query, $trainee_name) {
                return $query->where('trainee_name', 'LIKE', '%' . $trainee_name . '%');
            })
            ->when($request->hiring_amount, function ($query, $hiring_amount) {
                return $query->where('hiring_amount', 'LIKE', '%' . $hiring_amount . '%');
            })
            ->when($request->departament, function ($query, $departament) {
                return $query->whereHas('departament', function ($q) use ($departament) {
                    $q->where('title', 'LIKE', '%' . $departament . '%');
                });
            })
            ->orderBy('id')
            ->paginate(10);

        return [
            'requests' => $requests
        ];
    }

    public function update(Request $request, $id)
    {
        // $request->validate(
        //     [
        //         'level' => 'required',
        //         'secretary_phone' => ['required', 'regex:/^\(\d{2}\) \d{1} \d{4}-\d{4}$/'],
        //         'responsible' => 'required',
        //         'hiring_type' => 'required',
        //         'information' => 'required',
        //         'departament_id' => 'required',
        //     ],
        //     [
        //         'required' => 'O campo é obrigatório.',
        //         'secretary_phone.regex' => 'O formato do telefone está inválido.',
        //     ]
        // );

        $admin = auth('admin')->user();
        $adminType = $admin->type;

        try {
            $req = Requests::find($id);
            $req->level = $request->input('level');
            $req->hiring_amount = $request->input('hiring_amount');
            $req->secretary_phone = $request->input('secretary_phone');
            $req->responsible = $request->input('responsible');
            $req->hiring_type = $request->input('hiring_type');
            $req->trainee_name = $request->input('trainee_name');
            $req->information = $request->input('information');
            $req->departament_id = $request->input('departament_id');
            if ($adminType === 'recruiter') {
                $req->status = RequestStatus::COMPLETED;
            } else if ($adminType === 'administrative') {
                $req->status = RequestStatus::AuthorizedByAdministrative;
            } else if ($adminType === 'secretary') {
                $req->status = RequestStatus::AuthorizedBySecretary;
            }
            $req->save();



            $req->courses()->delete();
            $courses = json_decode($request->input('courseNames'));
            foreach ($courses as $course) {
                RequestCourses::create([
                    'course_id' => $course->value,
                    'request_id' => $req->id
                ]);
            }

            return redirect()->back()->with('success', 'Perfil atualizado!');
        } catch (\Exception $e) {

            return redirect()->back()->with('error', 'Ocorreu um erro!');
        }
    }

    public function updateProgress(Request $request, $id)
    {
        try {

            $progress = Progress::findOrFail($id);
            $progress->observation = $request->input('observation');
            $progress->save();

            return redirect()->back()->with('success', 'Perfil atualizado!');
        } catch (\Exception $e) {

            return redirect()->back()->with('error', 'Ocorreu um erro!');
        }
    }

    public function createProgress(Request $request, $id)
    {
        $admin = auth('admin')->user();
        $req = Requests::findOrFail($id);
        try {
            $progress = Progress::create([
                'admin_id' => $admin->id,
                'request_id' => $req->id,
                'observation' => $request->input('observation'),
            ]);

            return response()->json(['success' => true, 'progress' => $progress]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => 'Ocorreu um erro!']);
        }
    }

    public function authorizeRequest($id)
    {
        $admin = auth('admin')->user();
        $adminType = $admin->type;

        try {
            $req = Requests::findOrFail($id);
            if ($adminType === 'administrative') {
                $req->status = RequestStatus::AuthorizedByAdministrative;
            } else if ($adminType === 'secretary') {
                $req->status = RequestStatus::AuthorizedBySecretary;
            }
            $req->save();

            return response()->json(['success' => true, 'req' => $req]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => 'Ocorreu um erro!']);
        }
    }
    public function showProfile($id)
    {
        $user = User::find($id);
        $profile = $user->profile;
        $social = $user->social;
        $formation = $user->formation;
        $address = $user->address;
        $experience = $user->experience;
        return view('admin.request.show-profile', compact('user', 'profile', 'social', 'formation', 'address', 'experience'));
    }

    public function resumeDelete($id)
    {
        $resume = Resume::findOrFail($id);

        $resume->delete();
    }

    public function requestUsers($id)
    {
        $request = Requests::findOrFail($id);
        $courses = $request->courses()->with('course')->get()->pluck('course.id', 'course.course');
        $allCourses = Courses::all();
        $departaments = Departament::all();
        $admin = auth('admin')->user();
        $progress = Progress::where('request_id', $request->id)
            ->with('admin')
            ->orderBy('created_at', 'desc')
            ->get();

        $resumes = Resume::where('request_id', $request->id)
            ->with(
                'user',
                'user.profile',
                'user.address',
                'user.formation',
                'user.experience',
                'user.social',
                'user.files'
            )
            ->get();

        $cities     = City::all();
        $districts  = District::all();
        $educations = Education::all();

        return view(
            'admin.request.request-users',
            compact(
                'request',
                'courses',
                'allCourses',
                'departaments',
                'admin',
                'progress',
                'cities',
                'districts',
                'courses',
                'educations',
                'resumes'
            )
        );
    }

    public function requestUsersUpdate(Request $request, $id)
    {
        foreach ($request->progress as $progressData) {
            $progress = Progress::findOrFail($progressData['id']);
            $progress->observation = $progressData['observation'];
            $progress->save();
        }

        foreach ($request->resumes as $resumeData) {
            $resume = Resume::findOrFail($resumeData['id']);
            $resume->observation = $resumeData['observation'];
            $resume->selected = $resumeData['selected'];
            $resume->save();
        }
        // return response()->json(['message' => 'Dados atualizados com sucesso!']);
        return redirect()->back();
    }
}
