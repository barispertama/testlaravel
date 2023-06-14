<?php

namespace App\Http\Controllers;

use DataTables;
use Validator;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Contact::select('id','nama','email','no_hp')->get();
            return Datatables::of($data)->addIndexColumn()
                ->addColumn('action', function($data){
                    $button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm"> <i class="bi bi-pencil-square"></i>Edit</button>';
                    $button .= '   <button type="button" name="edit" id="'.$data->id.'" class="delete btn btn-danger btn-sm"> <i class="bi bi-backspace-reverse-fill"></i> Delete</button>';
                    return $button;
                })
                ->make(true);
        }
 
        return view('dashboard/index');
    }
 
    public function store(Request $request)
    {
        $rules = array(
            'nama'    =>  'required',
            'email'     => 'required',
            'no_hp'    => 'required'
        );
 
        $error = Validator::make($request->all(), $rules);
 
        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

 
        $form_data = array(
            'nama'        =>  $request->nama,
            'email'         =>  $request->email,
            'no_hp'         =>  $request->no_hp
        );
 
        Contact::create($form_data);
 
        return response()->json(['success' => 'Data Added successfully.']);
    }
 
    public function edit($id)
    {
        if(request()->ajax())
        {
            $data = Contact::findOrFail($id);
            return response()->json(['result' => $data]);
        }
    }
 
    public function update(Request $request)
    {
        $rules = array(
            'nama'        =>  'required',
            'email'         =>  'required'
        );
 
        $error = Validator::make($request->all(), $rules);
 
        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }
 
        $form_data = array(
            'nama'    =>  $request->nama,
            'email'     =>  $request->email
        );
 
        Contact::whereId($request->hidden_id)->update($form_data);
 
        return response()->json(['success' => 'Data is successfully updated']);
    }
 
    public function destroy($id)
    {
        $data = Contact::findOrFail($id);
        $data->delete();
    }

    use AuthorizesRequests,ValidatesRequests;
}
