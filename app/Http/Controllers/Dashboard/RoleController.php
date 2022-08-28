<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use DB;
use DataTables;

class RoleController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index','store']]);
         $this->middleware('permission:role-create', ['only' => ['create','store']]);
         $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    }
    
    public function index()
    {
        $title = 'Roles';
        // $roles = Role::orderBy('id','DESC')->get();

        return view('dashboard.roles.index', compact('title'));
    }

    public function getJsonRoles(Request $request)
    {
        if ($request->ajax()) {
			$data = Role::select('*');
            
            return Datatables::of($data)
                ->addIndexColumn()
                ->filter(function ($instance) use ($request) {
                    if (!empty($request->get('search'))) {
                            $instance->where(function($w) use($request){
                            $search = $request->get('search');
                            $w->orWhere('roles.name', 'LIKE', "%$search%");
                        });
                    }
                })

                ->addColumn('action', function($row){
                    $btn = '<a href="roles/'.$row->id.'" class="btn btn-icon btn-info"><i class="fas fa-info-circle"></i></a>';
					$btn = $btn.' <a href="roles/'.$row->id.'/edit" class="btn btn-icon btn-primary"><i class="fas fa-edit"></i></a>';
                    $btn = $btn.' <button type="button" href="roles/destroy/'.$row->id.'" class="btn btn-icon btn-danger btn-hapus"><i class="fas fa-trash"></i></button>';
                    return $btn;
                })

                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }

        return response()->json(true);
    }

    public function create()
    {
        $title = 'Create Role';
        $permission = Permission::get();

        return view('dashboard.roles.create',compact('permission','title'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'permission' => 'required',
        ]);
    
        $role = Role::create(['name' => $request->input('name')]);
        $role->syncPermissions($request->input('permission'));
    
        return redirect()->route('roles.index')->with('success','Role created successfully');
    }

    public function show($id)
    {
        $title = 'Detail Role';
        $role = Role::find($id);
        $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")->where("role_has_permissions.role_id",$id)->get();
    
        return view('dashboard.roles.show',compact('role','rolePermissions','title'));
    }

    public function edit($id)
    {
        $title = 'Edit Role';
        $role = Role::find($id);
        $permission = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();
    
        return view('dashboard.roles.edit',compact('role','permission','rolePermissions','title'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'permission' => 'required',
        ]);
    
        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();
    
        $role->syncPermissions($request->input('permission'));
    
        return redirect()->route('roles.index')
                        ->with('success','Role updated successfully');
    }

    public function destroy($id)
    {
        DB::table("roles")->where('id',$id)->delete();
        return redirect()->route('roles.index')
                        ->with('success','Role deleted successfully');
    }
}
