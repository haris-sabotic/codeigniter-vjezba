<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';

    protected $allowedFields = ["first_name", "last_name"];

    public function getUsers()
    {
        return $this->findAll();
    }

    public function addUser(string $firstName, string $lastName)
    {
        return $this->save([
            'first_name' => $firstName,
            'last_name' => $lastName,
        ]);
    }

    public function deleteUser(int $id)
    {
        return $this->delete($id);
    }
}
