<?php

namespace App\Http\Controllers;

use Log;
use App\Models\Contact;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function showAll()
    {
        $contacts = auth()->user()->contacts;
        return view('/contacts/main', compact('contacts'));
    }

    public function createForm()
    {
        return view('/contacts/crud/create');
    }

    public function store(Request $request)
    {
        $fields = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'address' => ['nullable', 'string', 'max:255'],
            'company' => ['nullable', 'string', 'max:255'],
            'job_title' => ['nullable', 'string', 'max:255'],
            'note' => ['nullable', 'string', 'max:255'],
            'profile' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'phones.*' => ['required', 'string'],
            'emails.*' => ['required', 'email'],
            'connections.*' => ['nullable', 'string'],
        ]);

        if ($request->hasFile('profile')) {
            $filenameWithExt = $request->file('profile')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('profile')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $request->file('profile')->storeAs('public/profile_pictures', $fileNameToStore);
        } else {
            $randomNumber = rand(1, 5);
            $fileNameToStore = "avatar{$randomNumber}.png";
        }

        $fields['user_id'] = auth()->id();
        $fields['profile'] = $fileNameToStore;

        $contact = Contact::create($fields);
        if ($request->phones)
        foreach ($request->input('phones') as $index => $phone) {
            $phoneType = $request->input('phone_type')[$index] ?? 'Other';

            $contact->phones()->create([
                'phone_type' => $phoneType,
                'phones' => $phone,
            ]);
        }
        if ($request->emails)
        foreach ($request->input('emails') as $index => $email) {
            $emailType = $request->input('email_type')[$index] ?? 'Other';
            $contact->emails()->create([
                'email_type' => $emailType,
                'emails' => $email,
            ]);
        }
        if ($request->connections)
        foreach ($request->input('connections') as $index => $connection) {
            $connectionPlatform = $request->input('connection_platform')[$index] ?? 'Other';
            $contact->connections()->create([
                'connection_platform' => $connectionPlatform,
                'connections' => $connection,
            ]);
        }

        return redirect('/contacts')->with('success', 'Contact created successfully!');
    }

    public function editForm(Contact $contact)
    {
        if ($contact->user_id !== auth()->id()) {
            return redirect('/contacts')->with('error', 'Unauthorized action!');
        }
        return view('/contacts/crud/edit', compact('contact'));
    }

    public function show(Contact $contact)
    {
        if ($contact->user_id !== auth()->id()) {
            return redirect('/contacts')->with('error', 'Unauthorized action!');
        }
        $isDefaultAvatar = Str::is('avatar*.png', $contact->profile);

        return view('/contacts/crud/view', compact('contact', 'isDefaultAvatar'));
    }

    public function update(Request $request, Contact $contact)
    {
        if ($contact->user_id !== auth()->id()) {
            return redirect('/contacts')->with('error', 'Unauthorized action!');
        }
        $fields = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'address' => ['nullable', 'string', 'max:255'],
            'company' => ['nullable', 'string', 'max:255'],
            'job_title' => ['nullable', 'string', 'max:255'],
            'note' => ['nullable', 'string', 'max:255'],
            'profile' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'phones.*' => ['required', 'string'],
            'emails.*' => ['required', 'email'],
            'connections.*' => ['nullable', 'string'],
        ]);

        if ($request->hasFile('profile')) {
            $filenameWithExt = $request->file('profile')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('profile')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $request->file('profile')->storeAs('public/profile_pictures', $fileNameToStore);
        } else {
            $fileNameToStore = $contact->profile;
        }

        $fields['profile'] = $fileNameToStore;

        $contact->update($fields);
        $contact->phones()->delete();
        $contact->emails()->delete();
        $contact->connections()->delete();

        if ($request->has('phones')) {
            foreach ($request->phones as $i => $phone) {
                $contact->phones()->create([
                    'phone_type' => $request->phone_type[$i] ?? 'Other',
                    'phones' => $phone,
                ]);
            }
        }

        if ($request->has('emails')) {
            foreach ($request->emails as $i => $email) {
                $contact->emails()->create([
                    'email_type' => $request->email_type[$i] ?? 'Other',
                    'emails' => $email,
                ]);
            }
        }

        if ($request->has('connections')) {
            foreach ($request->connections as $i => $connection) {
                $contact->connections()->create([
                    'connection_platform' => $request->connection_platform[$i] ?? 'Other',
                    'connections' => $connection,
                ]);
            }
        }
        return redirect('/contacts')->with('success', 'Contact updated successfully!');
    }

    public function delete(Contact $contact)
    {
        if ($contact->user_id !== auth()->id()) {
            return redirect('/contacts')->with('error', 'Unauthorized action!');
        }
        $contact->delete();
        return redirect('/contacts')->with('success', 'Contact deleted successfully!');
    }
}
