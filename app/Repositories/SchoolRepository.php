<?php

namespace App\Repositories;

use App\Models\School;

class SchoolRepository
{
    public function getAll()
    {
        return School::latest()->paginate(25);
    }

    public function getItems()
    {
        return School::get();
    }

    public function create(array $r)
    {
        return School::create($r);
    }

    public function getById($id)
    {
        return School::findOrFail($id);
    }

    public function update($id,array $data)
    {
        School::whereId($id)->update($data);
    }

    public function destroy($id)
    {
        return School::findOrFail($id)->delete();
    }
}
