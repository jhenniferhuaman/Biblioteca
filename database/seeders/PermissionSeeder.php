<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;


class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'Author.index'])->syncRoles(['Admin', 'Librarian', 'Customer']);
        Permission::create(['name' => 'Author.show'])->syncRoles(['Admin', 'Librarian', 'Customer']);
        Permission::create(['name' => 'Author.create'])->syncRoles(['Admin']);
        Permission::create(['name' => 'Author.edit'])->syncRoles(['Admin']);
        Permission::create(['name' => 'Author.delete'])->syncRoles(['Admin']);


        Permission::create(['name' => 'Book.index'])->syncRoles(['Admin', 'Librarian', 'Customer']);
        Permission::create(['name' => 'Book.show'])->syncRoles(['Admin', 'Librarian', 'Customer']);
        Permission::create(['name' => 'Book.create'])->syncRoles(['Admin']);
        Permission::create(['name' => 'Book.edit'])->syncRoles(['Admin']);
        Permission::create(['name' => 'Book.delete'])->syncRoles(['Admin']);


        Permission::create(['name' => 'Category.index'])->syncRoles(['Admin', 'Librarian', 'Customer']);
        Permission::create(['name' => 'Category.show'])->syncRoles(['Admin', 'Librarian', 'Customer']);
        Permission::create(['name' => 'Category.create'])->syncRoles(['Admin']);
        Permission::create(['name' => 'Category.edit'])->syncRoles(['Admin']);
        Permission::create(['name' => 'Category.delete'])->syncRoles(['Admin']);


        Permission::create(['name' => 'Partner.index'])->syncRoles(['Admin', 'Librarian', 'Partner']);
        Permission::create(['name' => 'Partner.show'])->syncRoles(['Admin', 'Librarian', 'Partner']);
        Permission::create(['name' => 'Partner.create'])->syncRoles(['Admin']);
        Permission::create(['name' => 'Partner.edit'])->syncRoles(['Admin']);
        Permission::create(['name' => 'Partner.delete'])->syncRoles(['Admin']);
    }
}
