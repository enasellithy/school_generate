<?php

namespace Database\Seeders;

use App\Models\School;
use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        School::factory(10)->create()->each(function ($school) {
            $student = Student::factory(25)->make();
            $school->students()->saveMany($student);
        });

        foreach (School::get() as $v){
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
}
