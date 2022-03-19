<?php

namespace App\Repositories;

use App\Models\Student;
use App\Traits\IncrementTraits;

class StudentRepository
{
    use IncrementTraits;

    public function getAll()
    {
        return Student::latest()->paginate(25);
    }

    public function create(array $r)
    {
        Student::create($r);
        return $this->auto_generate();
    }

    public function getById($id)
    {
        return Student::findOrFail($id);
    }

    public function update($id,array $r)
    {
        return Student::whereId($id)->update($r);
    }

    public function destroy($id)
    {
        $this->remove_order($id);
        Student::findOrFail($id)->delete();
        return $this->auto_generate();
    }
}
