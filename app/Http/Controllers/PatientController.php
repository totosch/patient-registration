<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Mail\PatientRegistered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PatientController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:patients,email',
            'phone' => 'required|string|max:20',
            'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('photos', 'public');
            $validatedData['photo'] = $path;
        }

        $patient = Patient::create($validatedData);

        Mail::to($patient->email)->queue(new PatientRegistered($patient));

        return response()->json([
            'message' => 'Paciente registrado correctamente',
            'data'    => $patient
        ], 201);
    }
}
