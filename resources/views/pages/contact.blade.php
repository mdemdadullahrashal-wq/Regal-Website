@extends('layouts.app')

@section('content')
<section class="page-section">
    <div class="container form-grid">
        <div>
            <h1>{{ $title }}</h1>
            <p class="lead">{{ $body }}</p>
            <p><strong>{{ __('site.phone') }}:</strong> {{ config('regal.phone') }}</p>
            <p><strong>{{ __('site.email') }}:</strong> {{ config('regal.email') }}</p>
            <p>{{ config('regal.office_address') }}</p>
        </div>
        <form class="card" method="post" action="{{ route('contact.submit') }}">
            @csrf
            <label>{{ __('site.name') }}<input type="text" name="name" value="{{ old('name') }}" required></label>
            <label>{{ __('site.email') }}<input type="email" name="email" value="{{ old('email') }}" required></label>
            <label>{{ __('site.phone') }}<input type="text" name="phone" value="{{ old('phone') }}" required></label>
            <label>{{ __('site.subject') }}<input type="text" name="subject" value="{{ old('subject') }}" required></label>
            <label>{{ __('site.message') }}<textarea name="message" rows="5" required>{{ old('message') }}</textarea></label>
            <button class="btn btn-primary" type="submit">{{ __('site.send_message') }}</button>
            @if ($errors->any())
                <div class="error-box">{{ $errors->first() }}</div>
            @endif
        </form>
    </div>
</section>
@endsection
