<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Student\AddRequest;
use App\Http\Requests\Admin\Student\EditRequest;
use App\Models\School;
use App\Models\Student;
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
        return view('admin.student.index',compact('students'));
    }

    public function create()
    {
        $schools = $this->school->getItems();
        return view('admin.student.create',compact('schools'));
    }

    public function store(AddRequest $r)
    {
        $this->student->create($r->all());
        toast('Add !','success');
        return redirect('/admin/student');
    }

    public function edit($id)
    {
        $students = $this->student->getById($id);
        $schools = $this->school->getItems();
        return view('admin.student.edit',compact('students','schools'));
    }

    public function update($id,EditRequest $r)
    {
        $this->student->update($id,$r->except('_token','_method'));
        toast('Update !','success');
        return redirect('/admin/student');
    }

    public function destroy($id)
    {
        $this->student->destroy($id);
        toast('Delete !','success');
        return redirect('/admin/student');
    }
}
