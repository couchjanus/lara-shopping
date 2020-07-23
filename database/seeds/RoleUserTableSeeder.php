<?php

use Illuminate\Database\Seeder;
use App\Admin;

class RoleUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::findOrFail(1)->roles()->sync(1);
    }
}
