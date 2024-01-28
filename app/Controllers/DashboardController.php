<?php

namespace App\Controllers;

use App\Models\UserModel;

class DashboardController extends BaseController
{
    public function index(): string
    {
        $model = model(UserModel::class);

        return view('dashboard', ['users' => $model->getUsers()]);
    }

    public function create()
    {
        $model = model(UserModel::class);

        $firstName = $this->request->getVar("firstName");
        $lastName = $this->request->getVar("lastName");

        $model->addUser($firstName, $lastName);

        return view('dashboard', ['users' => $model->getUsers()]);
    }

    public function delete($id)
    {
        $model = model(UserModel::class);

        $model->deleteUser($id);

        return view('dashboard', ['users' => $model->getUsers()]);
    }
}
