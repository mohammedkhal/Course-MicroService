<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Services\V1\GateWayRequest\GateWayRequest;

class CoursesLookupTableSeeder extends Seeder
{
    const TABLE_NAME = 'courses_lookup';

    private $data;

    public function __construct(gateWayRequest $gateWayRequest)
    {
        $this->data = $gateWayRequest->obtainDepartments();
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table(self::TABLE_NAME)->count() == 0) {
            DB::table(self::TABLE_NAME)->insert([
                'uuid' => Str::uuid(),
                'faculty_uuid' => $this->data->where('name', 'Coumputer Scince')->first()->faculty_uuid,
                'department_uuid' => $this->data->where('name', 'Coumputer Scince')->first()->uuid,
                'name' => "Algorithem",
                'credit_hour' => 3,
                'course_code' => "ALGO_202",
            ]);
            DB::table(self::TABLE_NAME)->insert([
                'uuid' => Str::uuid(),
                'faculty_uuid' => $this->data->where('name', 'Mangment Information System')->first()->faculty_uuid,
                'department_uuid' => $this->data->where('name', 'Mangment Information System')->first()->uuid,
                'name' => "Information System",
                'credit_hour' => 3,
                'course_code' => "IS_101",
            ]);
        }
    }
}
