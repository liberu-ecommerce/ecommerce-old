<?php

namespace Database\Factories;

use App\Models\User;
use LaravelEnso\People\Models\Person;
use LaravelEnso\Roles\Models\Role;
use LaravelEnso\UserGroups\Models\UserGroup;
use LaravelEnso\Users\Database\Factories\UserFactory as CoreUserFactory;

class UserFactory extends CoreUserFactory
{
    protected $model = User::class;

    public function definition()
    {
        return [
            'person_id' => Person::factory(),
            'group_id' => UserGroup::factory(),
            'email' => function ($attributes) {
                return Person::find($attributes['person_id'])->email;
            },
            'role_id' => Role::factory(),
            'is_active' => $this->faker->boolean,
        ];
    }
}
