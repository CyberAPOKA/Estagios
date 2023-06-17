<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Requests;
use App\Models\RequestCourses;
use App\Models\Courses;

class RequestCourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Busca todas as instâncias do modelo Requests
        $requests = Requests::all();

        // Percorre cada instância do modelo Requests e atribui aleatoriamente pelo menos 3 instâncias do modelo Courses
        foreach ($requests as $request) {
            $courseCount = rand(3, 5); // número aleatório entre 3 e 5
            $courses = Courses::inRandomOrder()->limit($courseCount)->get();

            // Percorre cada instância do modelo Courses e as vincula com a instância do modelo Requests atual
            foreach ($courses as $course) {
                $requestCourse = RequestCourses::create([
                    'request_id' => $request->id,
                    'course_id' => $course->id,
                ]);
            }
        }
    }
}
