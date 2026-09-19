<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreJobApplicationRequest;
use App\Models\JobApplication;

class CareerController extends Controller
{
    public function store(StoreJobApplicationRequest $request)
    {
        JobApplication::query()->create($request->validated());

        return redirect()->route('career')->with('success', __('site.career_success'));
    }
}
