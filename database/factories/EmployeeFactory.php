<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /*
     * This function returns a new employee with the correct avatar depending on the $randomGender.
     * */
    private function newEmployee($employee, $randomGender)
    {
        if ($randomGender == 1) {
            $employee['avatar'] = 'images/avatars/male.png';
        } else if ($randomGender == 2) {
            $employee['avatar'] = 'images/avatars/female.png';
        }

        return $employee;
    }
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Employee::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $faker = $this->faker;
        $dateTime = $faker->dateTimeThisMonth()->format('Y-m-d H:i:s');

        $genders = [
            1 => 'male',
            2 => 'female'
        ];

        $randomGender = rand(1, count($genders));

        $employee =  [
            'name' => $faker->name(),
            'gender' => $genders[$randomGender],
            'avatar' => NULL,
            'available' => $faker->boolean(100),
            'rating' => NULL,
            'employee_type_id' => rand(1, 2),
            'created_at' => $dateTime,
            'updated_at' => $dateTime
        ];

        return $this->newEmployee($employee, $randomGender);
    }
}
