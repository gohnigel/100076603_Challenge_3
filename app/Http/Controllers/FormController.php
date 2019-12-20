<?php

namespace App\Http\Controllers;

use App\Form;
use App\Location;
use Illuminate\Http\Request;

class FormController extends Controller
{
    // Show all formsform
    public function index()
    {
        $forms = Form::get();
        return view('index', compact('forms'));
    }

    // Choose form version
    public function choose()
    {
        return view('choose');
    }

    // Create form version 1
    public function createV1()
    {
        return view('v1/create');
    }

    // Store form version 1
    public function storeV1()
    {
        $this->validateFormV1();

        Form::create($this->createFormV1());

        return redirect('/');
    }

    // Edit form version 1
    public function editV1(Form $form)
    {
        return view('v1.edit', compact('form'));
    }

    // Store form version 1
    public function updateV1(Form $form)
    {
        $this->validateFormV1();

        $form->update($this->createFormV1());

        return redirect('/');
    }

    // Create form version 2
    public function createV2()
    {
        return view('v2/create');
    }

    // Store form version 2
    public function storeV2()
    {
        $this->validateFormV2();

        Form::create($this->createFormV2());

        return redirect('/');
    }

    // Edit form version 1
    public function editV2(Form $form)
    {
        return view('v2.edit', compact('form'));
    }

    // Store form version 1
    public function updateV2(Form $form)
    {
        $this->validateFormV2();

        $form->update($this->createFormV2());

        return redirect('/');
    }

    // Create form version 1
    public function createV3()
    {
        return view('v3/create');
    }

    // Store form version 3
    public function storeV3()
    {
        $this->validateFormV3();

        Form::create($this->createFormV3());

        $form = Form::latest()->firstOrFail();

        foreach(request('location') as $r)
        {
            Location::create($this->createLocation($form, $r));
        }

        return redirect('/');
    }

    // Store form version 1
    public function updateV3(Form $form)
    {
        $this->validateFormV3();

        $form->update($this->createFormV3());

        foreach(request('location') as $r)
        {
            $location = Location::where('form_id', $form->id);
            $location->update($this->createLocation($form, $r));
        }

        return redirect('/');
    }

    // Edit form version 1
    public function editV3(Form $form)
    {
        return view('v3.edit', compact('form'));
    }

    // Delete form
    public function destroy(Form $form)
    {
        $form->delete();

        return redirect('/');
    }

    // Validation for Form Version 1
    protected function validateFormV1()
    {
        return request()->validate([
            'name' => 'required|max:255',
            'dob' => 'required|date',
            'gender' => 'required|max:255',
            'address' => 'required|max:255'
        ]);
    }

    // Values to be added into Form Version 1
    protected function createFormV1()
    {
        return [
            'name' => request('name'),
            'dob' => request('dob'),
            'gender' => request('gender'),
            'address' => request('address'),
            'version' => 1
        ];
    }

    // Validation for Form Version 2
    protected function validateFormV2()
    {
        return request()->validate([
            'name' => 'required|max:255',
            'dob' => 'required|date',
            'gender' => 'required|max:255',
            'address' => 'required|max:255',
            'email' => 'required|max:255',
            'phone' => 'required|max:255'
        ]);
    }

    // Values to be added into Form Version 2
    protected function createFormV2()
    {
        return [
            'name' => request('name'),
            'dob' => request('dob'),
            'gender' => request('gender'),
            'address' => request('address'),
            'email' => request('email'),
            'phone' => request('phone'),
            'version' => 2
        ];
    }

    // Validation for Form Version 2
    protected function validateFormV3()
    {
        return request()->validate([
            'name' => 'required|max:255',
            'location' => 'required|array',
            'location.*' => 'required|max:255'
        ]);
    }

    // Values to be added into Form Version 2
    protected function createFormV3()
    {
        return [
            'name' => request('name'),
            'version' => 3
        ];
    }

    // Values to be added into location
    protected function createLocation($form, $r)
    {
        return [
            'form_id' => $form->id,
            'address' => $r['address'],
            'phone' => $r['phone'],
            'email' => $r['email'],
        ];
    }
}
