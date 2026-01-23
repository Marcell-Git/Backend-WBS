<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Modules\User\Services\UserService;

class UserController extends Controller
{
    public function __construct(
        protected UserService $service
    ) {}

    public function index()
    {
        return $this->service->getAll();
    }

    public function store(Request $request)
    {
        return $this->service->create($request->all());
    }

    public function show($id)
    {
        return $this->service->findById($id);
    }

    public function showUser(Request $request)
    {
        return $this->service->showUser($request);
    }

    public function search($id)
    {
        return $this->service->findById($id);
    }

    public function updatePassword(Request $request, $id)
    {
        return $this->service->updatePassword($id, $request);
    }

    public function destroy($id)
    {
        return $this->service->delete($id);
    }
}
