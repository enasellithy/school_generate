<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\School\AddRequest;
use App\Http\Requests\Admin\School\EditRequest;
use App\Repositories\SchoolRepository;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    private $school;

    public function __construct(SchoolRepository $schoolRepository)
    {
        $this->school = $schoolRepository;
    }

    public function index()
    {
        $schools = $this->school->getAll();
        return view('admin.school.index',compact('schools'));
    }

    public function create()
    {
        return view('admin.school.create');
    }

    public function store(AddRequest $r)
    {
        $this->school->create($r->all());
        toast('Add !','success');
        return redirect('/admin/school');
    }

    public function edit($id)
    {
        $schools = $this->school->getById($id);
        return view('admin.school.edit',compact('schools'));
    }

    public function update($id,EditRequest $r)
    {
        $this->school->update($id,$r->except('_token','_method'));
        toast('Update !','success');
        return redirect('/admin/school');
    }

    public function destroy($id)
    {
        $this->school->destroy($id);
        toast('Delete !','success');
        return redirect('/admin/school');
    }
}
