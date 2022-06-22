<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User as model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Datatables;


class UserController extends Controller
{
    public string $folder = 'user';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = model::select('*');
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row) { 
                        $btn = '<a href="'.route($this->folder.'.show', $row).'" class="edit btn btn-primary btn-sm">View</a>'; 
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('pages.'.$this->folder.'.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = [];
        return view('pages.'.$this->folder.'.create', compact('model'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model = new model();
        $this->validate($request, $model->rules());
        $model->loadModel($request->all());
        $model->password = Hash::make($request->password);
        try {
            $model->save();
        } catch (\Throwable $th) {
            return redirect()->back()->with($this->get_set_message_crud(false, 'create', null, $th->getMessage()));
        }
        return redirect()->route($this->folder.'.index')->with($this->get_set_message_crud(true, 'create'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = model::findOrFail($id);
        return view('pages.'.$this->folder.'.show', compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = model::findOrFail($id);
        return view('pages.'.$this->folder.'.edit', compact('model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $new_model = new model();
        $this->validate($request, $new_model->rules('update', $id));

        $model = model::findOrFail($id);
        $model->loadModel($request->all());
        if ($request->password) $model->password = Hash::make($request->password);
        try {
            $model->save();
        } catch (\Throwable $th) {
            return redirect()->back()->with($this->get_set_message_crud(false, 'edit', null, $th->getMessage()));
        }
        return redirect()->route($this->folder.'.index')->with($this->get_set_message_crud(true, 'edit'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = model::findOrFail($id);

        try {
            $model->delete();
        } catch (\Throwable $th) {
            return redirect()->back()->with($this->get_set_message_crud(false, 'delete', null, $th->getMessage()));
        }
        return redirect()->route($this->folder.'.index')->with($this->get_set_message_crud(true, 'delete'));
    }
}
