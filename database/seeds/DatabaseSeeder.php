<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Typestudents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $admin = new User();
        $admin->name = "Admin";
        $admin->email = "admin@admin.estudent";
        $admin->password = Hash::make("admin1234");
        $admin->save();

        $type1 = new Typestudents();
        $type1->name = "กูยืมรายใหม่";
        $type1->save();
        $type2 = new Typestudents();
        $type2->name = "กูยืมรายเก่าเลื่อนชั้นปี";
        $type2->save();
        $type3 = new Typestudents();
        $type3->name = "กูยืมรายเก่า";
        $type3->save();
        $type4 = new Typestudents();
        $type4->name = "ยกเลิกจากระบบ";
        $type4->save();
    }
}
