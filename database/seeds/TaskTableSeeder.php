<?php

use Illuminate\Database\Seeder;


class TaskTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table("tasks")->insert([
            'project_id' => 1, 
            'name' => 'Task as an example',
            'user_id' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'due_time' => date('Y-m-d', strtotime('+5 day', time())),
            'assignee' => 2
        ]);
    }
}
