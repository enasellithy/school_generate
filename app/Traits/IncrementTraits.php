<?php

namespace App\Traits;

use App\Models\School;
use App\Models\Student;

trait IncrementTraits
{
    public function auto_generate()
    {
        foreach(School::get() as $v){
            $count = Student::where('school_id',$v->id)->orderBy('id','asc')->get();
            for($i = 1; $i<$count->count(); $i++){
                foreach ($count as $item){
                    Student::where('id',$item->id)->update([
                        'order' => $i++
                    ]);
                }
            }
        }
    }

    public function remove_order($id){
        return Student::where('id',$id)->update([
            'order' => 0.0
        ]);
    }
}
