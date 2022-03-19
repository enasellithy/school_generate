<?php

namespace App\Console\Commands;

use App\Models\School;
use App\Models\Student;
use Illuminate\Console\Command;

class UpdateAutoGenerateCommand extends Command
{
    protected $signature = 'auto:number';

    protected $description = 'Update Order Student';

    public function handle()
    {
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
        return $this->info('Update order for students');
    }
}
