<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /* ---------------------------------------------------
            Roles
        ----------------------------------------------------- */ 

            $admin = Role::create(['name' => 'admin']);
            $editor = Role::create(['name' => 'editor']);
            $consultor = Role::create(['name' => 'consultor']);

        /* ---------------------------------------------------
            /Roles
        ----------------------------------------------------- */ 


        /* ---------------------------------------------------
            Permisos
        ----------------------------------------------------- */ 

            /* ----------------- UNIVERSIDADES ----------------- */
                // CREATE, STORE
                Permission::create(['name' => 'create_universidades'])->syncRoles([$admin, $editor]);
                // INDEX, SHOW
                Permission::create(['name' => 'read_universidades'])->syncRoles([$admin, $editor, $consultor]);
                // EDIT, UPDATE
                Permission::create(['name' => 'update_universidades'])->syncRoles([$admin, $editor]);
                // DESTROY
                Permission::create(['name' => 'delete_universidades'])->syncRoles([$admin, $editor]);
            /* ------------------------------------------------- */


            /* -------------------- CARRERAS ------------------- */
                // CREATE, STORE
                Permission::create(['name' => 'create_carreras'])->syncRoles([$admin, $editor]);
                // INDEX, SHOW
                Permission::create(['name' => 'read_carreras'])->syncRoles([$admin, $editor, $consultor]);
                // EDIT, UPDATE
                Permission::create(['name' => 'update_carreras'])->syncRoles([$admin, $editor]);
                // DESTROY
                Permission::create(['name' => 'delete_carreras'])->syncRoles([$admin, $editor]);
            /* ------------------------------------------------- */


            /* -------------------- MATERIAS ------------------- */
                // CREATE, STORE
                Permission::create(['name' => 'create_materias'])->syncRoles([$admin, $editor]);
                // INDEX, SHOW
                Permission::create(['name' => 'read_materias'])->syncRoles([$admin, $editor, $consultor]);
                // EDIT, UPDATE
                Permission::create(['name' => 'update_materias'])->syncRoles([$admin, $editor]);
                // DESTROY
                Permission::create(['name' => 'delete_materias'])->syncRoles([$admin, $editor]);
            /* ------------------------------------------------- */


            /* -------------------- OPTATIVAS ------------------- */
                // CREATE, STORE
                Permission::create(['name' => 'create_optativas'])->syncRoles([$admin, $editor]);
                // INDEX, SHOW
                Permission::create(['name' => 'read_optativas'])->syncRoles([$admin, $editor, $consultor]);
                // EDIT, UPDATE
                Permission::create(['name' => 'update_optativas'])->syncRoles([$admin, $editor]);
                // DESTROY
                Permission::create(['name' => 'delete_optativas'])->syncRoles([$admin, $editor]);
            /* ------------------------------------------------- */


            /* ------------------ UABJO CARRERAS --------------- */
                // CREATE, STORE
                Permission::create(['name' => 'create_uabjo_carreras'])->syncRoles([$admin, $editor]);
                // INDEX, SHOW
                Permission::create(['name' => 'read_uabjo_carreras'])->syncRoles([$admin, $editor, $consultor]);
                // EDIT, UPDATE
                Permission::create(['name' => 'update_uabjo_carreras'])->syncRoles([$admin, $editor]);
                // DESTROY
                Permission::create(['name' => 'delete_uabjo_carreras'])->syncRoles([$admin, $editor]);
            /* ------------------------------------------------- */


            /* ------------------ UABJO MATERIAS ---------------- */
                // CREATE, STORE
                Permission::create(['name' => 'create_uabjo_materias'])->syncRoles([$admin, $editor]);
                // INDEX, SHOW
                Permission::create(['name' => 'read_uabjo_materias'])->syncRoles([$admin, $editor, $consultor]);
                // EDIT, UPDATE
                Permission::create(['name' => 'update_uabjo_materias'])->syncRoles([$admin, $editor]);
                // DESTROY
                Permission::create(['name' => 'delete_uabjo_materias'])->syncRoles([$admin, $editor]);
            /* ------------------------------------------------- */


            /* ----------------- UABJO OPTATIVAS ---------------- */
                // CREATE, STORE
                Permission::create(['name' => 'create_uabjo_optativas'])->syncRoles([$admin, $editor]);
                // INDEX, SHOW
                Permission::create(['name' => 'read_uabjo_optativas'])->syncRoles([$admin, $editor, $consultor]);
                // EDIT, UPDATE
                Permission::create(['name' => 'update_uabjo_optativas'])->syncRoles([$admin, $editor]);
                // DESTROY
                Permission::create(['name' => 'delete_uabjo_optativas'])->syncRoles([$admin, $editor]);
            /* ------------------------------------------------- */


            /* --------------------- ALUMNOS ------------------- */
                // CREATE, STORE
                Permission::create(['name' => 'create_alumnos'])->syncRoles([$admin, $editor]);
                // INDEX, SHOW
                Permission::create(['name' => 'read_alumnos'])->syncRoles([$admin, $editor, $consultor]);
                // EDIT, UPDATE
                Permission::create(['name' => 'update_alumnos'])->syncRoles([$admin, $editor]);
                // DESTROY
                Permission::create(['name' => 'delete_alumnos'])->syncRoles([$admin, $editor]);
            /* ------------------------------------------------- */


            /* -------------------- PREDICTAMEN ----------------- */
                // CREATE, STORE
                Permission::create(['name' => 'create_dictamen'])->syncRoles([$admin, $editor]);
                // INDEX, SHOW
                Permission::create(['name' => 'read_dictamen'])->syncRoles([$admin, $editor, $consultor]);
                // EDIT, UPDATE
                Permission::create(['name' => 'update_dictamen'])->syncRoles([$admin, $editor]);
                // DESTROY
                Permission::create(['name' => 'delete_dictamen'])->syncRoles([$admin, $editor]);
            /* ------------------------------------------------- */


            /* ------------------- REVALIDACIÓN ---------------- */
                // CREATE, STORE
                Permission::create(['name' => 'create_revalidacion'])->syncRoles([$admin, $editor]);
                // INDEX, SHOW
                Permission::create(['name' => 'read_revalidacion'])->syncRoles([$admin, $editor, $consultor]);
                // EDIT, UPDATE
                Permission::create(['name' => 'update_revalidacion'])->syncRoles([$admin, $editor]);
                // DESTROY
                Permission::create(['name' => 'delete_revalidacion'])->syncRoles([$admin, $editor]);
            /* ------------------------------------------------- */




        /* ---------------------------------------------------
            /Permisos
        ----------------------------------------------------- */ 



        /* ---------------------------------------------------
            Usuarios
        ----------------------------------------------------- */ 
        
            User::create([
                'name' => 'Administrador',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('password'),
            ])->assignRole('admin');
            User::create([
                'name' => 'Editor',
                'email' => 'editor@gmail.com',
                'password' => bcrypt('password'),
            ])->assignRole('editor');
            User::create([
                'name' => 'Consultor',
                'email' => 'consultor@gmail.com',
                'password' => bcrypt('password'),
            ])->assignRole('consultor');

        /* ---------------------------------------------------
            /Usuarios
        ----------------------------------------------------- */ 
    }
}
