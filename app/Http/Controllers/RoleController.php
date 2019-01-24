<?php

namespace departamento\Http\Controllers;

use Illuminate\Http\Request;
use Caffeinated\Shinobi\Models\Role;
use Caffeinated\Shinobi\Models\Permission;
class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $roles= Role::all();
      return view('roles.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $permissions = Permission::get();
        return view('roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $role = Role::create($request->all());

      $role->permissions()->sync($request->get('permissions'));
      return redirect()->route('roles.index', $role->id)
      ->with('status', 'Rol Guardado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \departamento\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \departamento\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $permissions = Permission::get();
        return view('roles.edit', compact('role','permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \departamento\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
      //Actualizar Rol
      $role->update($request->all());
      //Actualizar permisos
      $role->permissions()->sync($request->get('permissions'));
      return redirect()->route('roles.index', $role->id)
      ->with('status', 'Rol Actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \departamento\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
      $role->delete();
      return redirect()->route('roles.index',[$role])->with('status','Rol Eliminada');
    }
}
