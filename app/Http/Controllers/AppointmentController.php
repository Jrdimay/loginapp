<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function create()
    {
        return view('appointments.create');
    }

    // Show all appointments
    public function index()
    {
        $appointments = Appointment::all();
        return view('create', compact('appointments'));
    }

    // Store appointment (with duplicate check)
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author1' => 'required|string|max:255',
            'author2' => 'nullable|string|max:255',
            'author3' => 'nullable|string|max:255',
            'author4' => 'nullable|string|max:255',
            'author5' => 'nullable|string|max:255',
            'date_of_appointment' => 'required|date',
        ]);
    
        // Check for duplicate title + any author match + same date
        $exists = Appointment::where('title', $validated['title'])
            ->where('date_of_appointment', $validated['date_of_appointment'])
            ->where(function ($query) use ($validated) {
                $authors = [
                    $validated['author1'],
                    $validated['author2'] ?? null,
                    $validated['author3'] ?? null,
                    $validated['author4'] ?? null,
                    $validated['author5'] ?? null,
                ];
    
                foreach ($authors as $author) {
                    if ($author) {
                        $query->orWhere('author1', $author)
                              ->orWhere('author2', $author)
                              ->orWhere('author3', $author)
                              ->orWhere('author4', $author)
                              ->orWhere('author5', $author);
                    }
                }
            })
            ->exists();
    
        if ($exists) {
            return back()->withErrors([
                'title' => 'An appointment with the same title, any matching author, and date already exists.',
            ])->withInput();
        }
    
        // Create the appointment
        Appointment::create($validated);
    
        return redirect()->route('schedule')->with('success', 'Appointment created successfully.');
    }

    public function destroy($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->delete();

        return redirect()->route('schedule')->with('success', 'Appointment deleted successfully.');
    }

}
