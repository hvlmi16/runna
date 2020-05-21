<?php

use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = \App\Role::where('name', 'eventDirector')->firstOrFail();

        $permissions = [
            'create:posts' => 'Create Posts',
            'update:posts' => 'Update Posts',
            'delete:posts' => 'Delete Posts',
            'restore:posts' => 'Restore Posts',
            'create:categories' => 'Create Categories',
            'update:categories' => 'Update Categories',
            'delete:categories' => 'Delete Categories',
            'restore:categories' => 'Restore Categories',
            'create:merchandise' => 'Create Merchandise',
            'update:merchandise' => 'Update Merchandise',
            'delete:merchandise' => 'Delete Merchandises',
            'restore:merchandise' => 'Restore Merchandise',
            'view:participants' => 'View Participants',
            'add:participants' => 'Add Participants',
            'remove:participants' => 'Remove Participants',
        ];

        foreach($permissions as $name => $label){
            $permission = \App\Permission::create(['name' => $name, 'label' => $label]);
            $permission->roles()->attach($role);
        }
    }
}
