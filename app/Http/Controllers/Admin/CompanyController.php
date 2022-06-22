<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company as model;
use Illuminate\Http\Request;
use Yajra\DataTables\Datatables;

class CompanyController extends Controller
{
    public string $folder = 'company';
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
        return view('pages.'.$this->folder.'.index',);
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

        if ($request->hasFile('siup')) {
            $model->siup = $this->upload_file($request->file('siup'), 'company/siup');
        }
        if ($request->hasFile('npwp')) {
            $model->npwp = $this->upload_file($request->file('npwp'), 'company/npwp');
        }
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
        $this->validate($request, $new_model->rules('update'));

        $model = model::findOrFail($id);
        $old_siup = $model->siup;
        $old_npwp = $model->npwp;
        $model->loadModel($request->all());

        if ($request->hasFile('siup')) {
            $this->delete_file($old_siup);
            $model->siup = $this->upload_file($request->file('siup'), 'company/siup');
        }
        if ($request->hasFile('npwp')) {
            $this->delete_file($old_npwp);
            $model->npwp = $this->upload_file($request->file('npwp'), 'company/npwp');
        }

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
