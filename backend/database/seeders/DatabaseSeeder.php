<?php

namespace Database\Seeders;
// Prerequisite
use Illuminate\Database\Seeder;
use Database\Seeders\Prerequisite\RoleS;
use Database\Seeders\Prerequisite\Surnames;
use Database\Seeders\Prerequisite\Levels;
use Database\Seeders\Prerequisite\Sections;
use Database\Seeders\Prerequisite\Subjects;
use Database\Seeders\Prerequisite\RoomSeeder;
use Database\Seeders\Prerequisite\Faculty;
use Database\Seeders\Prerequisite\users;
use Database\Seeders\Prerequisite\Students;
use Database\Seeders\Prerequisite\AccessSeeder;
use Database\Seeders\Prerequisite\DepartmentSeeder;

// classroom
use Database\Seeders\Classroom\Advisories;
use Database\Seeders\Classroom\ClassroomSeeder;
use Database\Seeders\Classroom\RegistrySeeder;
// use Database\Seeders\Classroom\Loads;

// Enrollment
use Database\Seeders\Enrollment\Loads;

//Headquarter
use Database\Seeders\Headquarter\Specialization\SpecializationSeeder;
use Database\Seeders\Headquarter\Specialization\StrandSeeder;
use Database\Seeders\Headquarter\AspirantSeeder;
use Database\Seeders\Headquarter\CalendarSeeder;
use Database\Seeders\Headquarter\Batches;
use Database\Seeders\Headquarter\Schools;
use Database\Seeders\Headquarter\SchoolDetailSeeder;
use Database\Seeders\Headquarter\Event\DesignationSeeder;

// Tracking
use Database\Seeders\Tracking\DocumentSeeder;
use Database\Seeders\Tracking\ReflectionSeeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleS::class,
            Surnames::class,
            Schools::class,
            SchoolDetailSeeder::class,
            Levels::class,
            Sections::class,
            Subjects::class,
            RoomSeeder::class,
            users::class,
            Faculty::class,
            Students::class,
            Batches::class,
            Loads::class,
            Advisories::class,
            DepartmentSeeder::class,
            // classrooms
            ClassroomSeeder::class,
            RegistrySeeder::class,
            // Loads::class,
            // features
            AspirantSeeder::class,

            // Tracking
            DocumentSeeder::class,

            //Headquarter
            DesignationSeeder::class,
        ]);
    }
}
