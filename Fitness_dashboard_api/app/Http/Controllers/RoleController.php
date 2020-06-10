<?php

namespace App\Http\Controllers;

class RoleController extends Controller
{
    //
    public function setupRoles()
    {
//        for ($i = 1; $i < 2; $i++) {
//            $user = User::find($i)->first();
//            $user->assignRole('coach');
//        }
//        for ($i = 3; $i < 10; $i++) {
//            $user = User::find($i)->first();
//            $user->assignRole('trainee');
//        }
//        $user = User::find(11)->first();
//        $user->assignRole('admin');
//        $trainee = Role::create(['name' => 'trainee']);
//        $coach = Role::create(['name' => 'coach']);
//        $admin = Role::create(['name' => 'admin']);
//
//        $edit1 = Permission::create(['name' => 'edit trainee']);
//        $edit2 = Permission::create(['name' => 'edit coach']);
//        $use1 = Permission::create(['name' => 'use dashboard']);
//        $use2 = Permission::create(['name' => 'use app']);
//        $edit3 = Permission::create(['name' => 'edit regimes']);
//        $edit4 = Permission::create(['name' => 'edit exercises']);
//
//        $trainee->givePermissionTo($edit1);
//        $trainee->givePermissionTo($use2);
//
//        $coach->givePermissionTo($edit1);
//        $coach->givePermissionTo($edit2);
//        $coach->givePermissionTo($use1);
//        $coach->givePermissionTo($edit3);
//        $coach->givePermissionTo($edit4);
//
//        $admin->givePermissionTo($edit2);
//        $admin->givePermissionTo($use1);
//        $admin->givePermissionTo($edit3);
//        $admin->givePermissionTo($edit4);

        return redirect('/');
    }
}
