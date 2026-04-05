<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'home');
Route::view('/contact', 'contact');
Route::view('/about', 'about');


Route::get('/form', function () {
    $forms = session()->get('forms', []);

    return view('form', [
        'forms' => $forms
    ]);
});

Route::post('/form', function () {
    request()->validate([
        'email' => [
            'required',
            'email'
        ]
    ]);

    $email = request('email');
    $emails = session()->get('forms', []);

    if (count($emails) >= 5) {
        return redirect('/form')->with('error', 'You have reached the maximum number of forms allowed.');
    }

    if (!in_array($email, $emails)) {
        session()->push('forms', $email);
        return redirect('/form')->with('success', 'Form submitted successfully.');
    }

   return redirect('/form')->with('error', 'Email already exists');
});

Route::delete('/form/{index}', function ($index) {
    $emails = session()->get('forms', []);
    unset($emails[$index]);
    session()->put('forms', array_values($emails));
    return redirect('/form');
});

Route::get('/delete-forms', function () {
    session()->forget('forms');

    return redirect('/form');
});