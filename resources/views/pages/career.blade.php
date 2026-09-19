@extends('layouts.app')

@section('content')
<section class="page-section">
    <div class="container form-grid">
        <div>
            <h1>{{ $title }}</h1>
            <p class="lead">{{ $body }}</p>
        </div>
        <form class="card" method="post" action="{{ route('career.submit') }}">
            @csrf
            <label>{{ __('site.name') }}<input type="text" name="name" value="{{ old('name') }}" required></label>
            <label>{{ __('site.email') }}<input type="email" name="email" value="{{ old('email') }}" required></label>
            <label>{{ __('site.phone') }}<input type="text" name="phone" value="{{ old('phone') }}" required></label>
            <label>{{ __('site.position') }}<input type="text" name="position" value="{{ old('position') }}" required></label>
            <label>{{ __('site.cover_letter') }}<textarea name="cover_letter" rows="6" required>{{ old('cover_letter') }}</textarea></label>
            <button class="btn btn-primary" type="submit">{{ __('site.apply_now') }}</button>
            @if ($errors->any())
                <div class="error-box">{{ $errors->first() }}</div>
            @endif
        </form>
    </div>
</section>
@endsection
