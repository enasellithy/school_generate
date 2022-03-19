<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Student\AddRequest;
use App\Http\Requests\Api\Student\DeleteRequest;
use App\Http\Requests\Api\Student\EditRequest;
use App\Repositories\SchoolRepository;
use App\Repositories\StudentRepository;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    private $student;

    private $school;

    public function __construct(StudentRepository $studentRepository, SchoolRepository $schoolRepository)
    {
        $this->student = $studentRepository;
        $this->school = $schoolRepository;
    }

    public function index()
    {
        $students = $this->student->getAll();
        return response()->json([
            'status' => true,
            'data' => $students,
        ]);
    }

    public function store(AddRequest $r)
    {
        $this->student->create($r->all());
        return response()->json([
            'status' => true,
            'data' => '',
        ]);
    }

    public function update(EditRequest $r)
    {
        $students = $this->student->update($r['student_id'],$r->except('student_id'));
        return response()->json([
            'status' => true,
            'data' => '',
        ]);
    }

    public function destroy(DeleteRequest $r)
    {
        $this->student->destroy($r['student_id']);
        return response()->json([
            'status' => true,
            'data' => '',
        ]);
    }
}
