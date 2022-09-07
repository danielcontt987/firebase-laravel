<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Database;

class ContactController extends Controller
{
    public function __construct(Database $database)
    {
        $this->database = $database;
        $this->tablename = "contrats";
    }
    public function index()
    {
        $contacts = $this->database->getReference($this->tablename)->getValue();
        return view('firebase.contact.index', compact('contacts'));
    }

    public function create()
    {
        return view('firebase.contact.create');
    }

    public function store(Request $request)
    {
       //params
        $postData = [
            "fname" =>$request->first_name,
            "lname" =>$request->last_name,
            "phone" =>$request->phone,
            "email" =>$request->email,
        ];

        $postRef = $this->database->getReference($this->tablename)->push($postData);
        if ($postRef) {
            return redirect('contacts')->with("status", 'Contacto agregado con exito');
        }else{
            return redirect('contacts')->with("status", ':(');
        }
    }

    public function edit($id)
    {
        $key = $id;
        $editData = $this->database->getReference($this->tablename)->getChild($key)->getValue();
        if ($editData) {
            return view('firebase.contact.edit', compact('editData', 'key'));
        }else{
            return redirect('contacts')->with("status", 'No se actualizó');
        }
    }

    public function update(Request $request, $id)
    {
        $key = $id;
        $updateData = [
            "fname" =>$request->first_name,
            "lname" =>$request->last_name,
            "phone" =>$request->phone,
            "email" =>$request->email,
        ];

        $update = $this->database->getReference($this->tablename.'/'.$key)->update($updateData);
        if ($update) {
            return redirect('contacts')->with("status", 'Contacto actualizado con exito');
        }else{
            return redirect('contacts')->with("status", ':(');
        }
    }

    public function destroy($id)
    {
        $key = $id;
        $delete_data = $this->database->getReference($this->tablename.'/'.$key)->remove();
        if ($delete_data) {
            return redirect('contacts')->with("status", 'Contacto eliminado con exito');
        }else{
            return redirect('contacts')->with("status", ':(');
        }
    }
}
