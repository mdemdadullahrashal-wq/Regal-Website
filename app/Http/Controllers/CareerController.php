<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreJobApplicationRequest;
use App\Models\JobApplication;

class CareerController extends Controller
{
    public function store(StoreJobApplicationRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('job-applications', 'public');
        }

        JobApplication::query()->create($data);

        return redirect()->route('career')->with('success', __('site.career_success'));
    }
}
