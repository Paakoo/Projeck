<?php

namespace Database\Seeders;

use App\Models\Division;
use App\Models\Employee;
use App\Models\Alert;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TalentManagementSeeder extends Seeder
{
    /**
     * Run the database seeder.
     */
    public function run(): void
    {
        // Create Divisions
        $sales = Division::create([
            'name' => 'Sales',
            'code' => 'SALES',
            'description' => 'Sales Division',
        ]);

        $marketing = Division::create([
            'name' => 'Marketing',
            'code' => 'MKT',
            'description' => 'Marketing Division',
        ]);

        $engineering = Division::create([
            'name' => 'Engineering',
            'code' => 'ENG',
            'description' => 'Engineering Division',
        ]);

        $hr = Division::create([
            'name' => 'HR',
            'code' => 'HR',
            'description' => 'Human Resources Division',
        ]);

        $finance = Division::create([
            'name' => 'Finance',
            'code' => 'FIN',
            'description' => 'Finance Division',
        ]);

        // Create Employees for Sales Division (6 total: 1 HP, 2 Promotable, 1 NT, 2 Regular)
        $this->createEmployees($sales, 1, 'High Potential');
        $this->createEmployees($sales, 2, 'Promotable');
        $this->createEmployees($sales, 1, 'Non Talent');
        $this->createEmployees($sales, 2, 'Regular');

        // Create Employees for Marketing Division (6 total: 1 HP, 2 Promotable, 1 NT, 2 Regular)
        $this->createEmployees($marketing, 1, 'High Potential');
        $this->createEmployees($marketing, 2, 'Promotable');
        $this->createEmployees($marketing, 1, 'Non Talent');
        $this->createEmployees($marketing, 2, 'Regular');

        // Create Employees for Engineering Division (10 total: 2 HP, 4 Promotable, 1 NT, 3 Regular)
        $this->createEmployees($engineering, 2, 'High Potential');
        $this->createEmployees($engineering, 4, 'Promotable');
        $this->createEmployees($engineering, 1, 'Non Talent');
        $this->createEmployees($engineering, 3, 'Regular');

        // Create Employees for HR Division (4 total: 1 HP, 2 Promotable, 0 NT, 1 Regular)
        $this->createEmployees($hr, 1, 'High Potential');
        $this->createEmployees($hr, 2, 'Promotable');
        $this->createEmployees($hr, 0, 'Non Talent');
        $this->createEmployees($hr, 1, 'Regular');

        // Create Employees for Finance Division (4 total: 1 HP, 2 Promotable, 1 NT, 0 Regular)
        $this->createEmployees($finance, 1, 'High Potential');
        $this->createEmployees($finance, 2, 'Promotable');
        $this->createEmployees($finance, 1, 'Non Talent');
        $this->createEmployees($finance, 0, 'Regular');

        // Create Alerts
        Alert::create([
            'type' => 'vacancy',
            'title' => 'Vacant Position Alert',
            'message' => 'Senior Software Engineer position in Engineering Division has been vacant for 45 days.',
            'division_id' => $engineering->id,
        ]);

        Alert::create([
            'type' => 'promotion',
            'title' => 'Promotion Readiness',
            'message' => 'Aisha Rahman (BOD-3 Manager) is ready for promotion in BOD-2.',
            'division_id' => $hr->id,
        ]);

        Alert::create([
            'type' => 'assessment',
            'title' => 'Incomplete Assessment Data',
            'message' => '3 employees in Sales Division have incomplete Q3 performance assessments.',
            'division_id' => $sales->id,
        ]);

        Alert::create([
            'type' => 'talent_entry',
            'title' => 'New Talent Pool Entry',
            'message' => '9 new candidates added to the Talent Pool for future leadership roles.',
        ]);
    }

    private function createEmployees(Division $division, int $count, string $talentCategory): void
    {
        $jobLevels = ['BOD-1', 'BOD-2', 'BOD-3', 'BOD-4'];
        $positions = [
            'Manager', 'Senior Manager', 'Director', 'Senior Director',
            'VP', 'Senior VP', 'Executive', 'Chief Officer'
        ];

        for ($i = 0; $i < $count; $i++) {
            Employee::create([
                'name' => fake()->name(),
                'email' => fake()->unique()->safeEmail(),
                'division_id' => $division->id,
                'job_level' => $jobLevels[array_rand($jobLevels)],
                'talent_category' => $talentCategory,
                'position' => $positions[array_rand($positions)],
                'performance_score' => rand(60, 100),
                'potential_score' => rand(60, 100),
                'is_promotable' => $talentCategory === 'Promotable' || $talentCategory === 'High Potential',
                'notes' => fake()->sentence(),
            ]);
        }
    }
}
