<?php

namespace App\Http\Controllers\Admin;

use App\Department;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::paginate(4);

        return view('admin.department.index', ['departments'=>$departments]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::pluck('name', 'id')->all();

        return view('admin.department.create', compact(
            'users'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' =>'required',
            'description'   =>  'required',
            'logo' =>  'nullable|image'
        ]);

        $department = Department::add($request->all());
        $department->uploadLogo($request->file('logo'));
        $department->setUsers($request->get('users'));

        return redirect()->route('department.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $department = Department::find($id);
        $users = User::pluck('name', 'id')->all();
        $selectedUsers = $department->users->pluck('id')->all();

        return view('admin.department.edit', compact(
            'users',
            'department',
            'selectedUsers'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param         $id
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' =>'required',
            'description'   =>  'required',
            'logo' =>  'nullable|image'
        ]);

        $department = Department::find($id);
        $department->edit($request->all());
        $department->uploadLogo($request->file('logo'));
        $department->setUsers($request->get('users'));

        return redirect()->route('department.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Department::find($id)->remove();

        return redirect()->route('department.index');
    }
}
