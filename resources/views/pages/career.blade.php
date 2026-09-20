@extends('layouts.app')

@section('content')
<section class="career-hero">
    <div class="container">
        <span class="career-hero__kicker">{{ __('site.menu_career') }}</span>
        <h1>{{ __('site.career_join_title') }}</h1>
        <p>{{ __('site.career_join_sub') }}</p>
    </div>
</section>

<section class="career-section">
    <div class="container">
        <form class="card career-form" method="post" action="{{ route('career.submit') }}" enctype="multipart/form-data">
            @csrf

            @if ($errors->any())
                <div class="error-box">{{ $errors->first() }}</div>
            @endif

            {{-- Basic info --}}
            <div class="career-form__grid">
                <label>{{ __('site.position') }}
                    <select name="position" required>
                        <option value="" disabled {{ old('position') ? '' : 'selected' }}>{{ __('site.position_select_default') }}</option>
                        <option value="Telemarketing Executive" {{ old('position') === 'Telemarketing Executive' ? 'selected' : '' }}>{{ __('site.position_telemarketing') }}</option>
                        <option value="Online Marketing Executive" {{ old('position') === 'Online Marketing Executive' ? 'selected' : '' }}>{{ __('site.position_online_marketing') }}</option>
                    </select>
                </label>
                <label>{{ __('site.name') }}<input type="text" name="name" value="{{ old('name') }}" required></label>
                <label>{{ __('site.phone') }}<input type="text" name="phone" value="{{ old('phone') }}" required></label>
                <label>{{ __('site.email') }}<input type="email" name="email" value="{{ old('email') }}" required></label>
                <label class="career-form__full">{{ __('site.address') }}<input type="text" name="address" value="{{ old('address') }}" required></label>
            </div>

            {{-- Sales experience --}}
            <div class="career-form__q">
                <span class="career-form__q-label">{{ __('site.has_sales_experience') }}</span>
                <div class="radio-row">
                    <label class="radio"><input type="radio" name="has_sales_experience" value="yes" {{ old('has_sales_experience') === 'yes' ? 'checked' : '' }}>{{ __('site.yes') }}</label>
                    <label class="radio"><input type="radio" name="has_sales_experience" value="no" {{ old('has_sales_experience') === 'no' ? 'checked' : '' }}>{{ __('site.no') }}</label>
                </div>
            </div>
            <div class="career-form__grid career-cond" data-cond-field="has_sales_experience" data-cond-show="yes">
                <label>{{ __('site.years_experience') }}<input type="text" name="years_experience" value="{{ old('years_experience') }}"></label>
                <label>{{ __('site.software_experience') }}<input type="text" name="software_experience" value="{{ old('software_experience') }}"></label>
            </div>

            {{-- Work type --}}
            <div class="career-form__q">
                <span class="career-form__q-label">{{ __('site.work_type') }}</span>
                <div class="radio-row">
                    <label class="radio"><input type="radio" name="work_type" value="full_time" {{ old('work_type') === 'full_time' ? 'checked' : '' }}>{{ __('site.full_time') }}</label>
                    <label class="radio"><input type="radio" name="work_type" value="part_time" {{ old('work_type') === 'part_time' ? 'checked' : '' }}>{{ __('site.part_time') }}</label>
                </div>
            </div>

            {{-- Work from home --}}
            <div class="career-form__q">
                <span class="career-form__q-label">{{ __('site.work_from_home') }}</span>
                <div class="radio-row">
                    <label class="radio"><input type="radio" name="work_from_home" value="yes" {{ old('work_from_home') === 'yes' ? 'checked' : '' }}>{{ __('site.yes') }}</label>
                    <label class="radio"><input type="radio" name="work_from_home" value="no" {{ old('work_from_home') === 'no' ? 'checked' : '' }}>{{ __('site.no') }}</label>
                </div>
            </div>
            <div class="career-form__grid career-cond" data-cond-field="work_from_home" data-cond-show="yes">
                <label class="career-form__full">{{ __('site.home_address') }}<input type="text" name="home_address" value="{{ old('home_address') }}"></label>
            </div>

            {{-- Commission --}}
            <div class="career-form__q">
                <span class="career-form__q-label">{{ __('site.commission_based') }}</span>
                <div class="radio-row">
                    <label class="radio"><input type="radio" name="commission_based" value="yes" {{ old('commission_based') === 'yes' ? 'checked' : '' }}>{{ __('site.yes') }}</label>
                    <label class="radio"><input type="radio" name="commission_based" value="no" {{ old('commission_based') === 'no' ? 'checked' : '' }}>{{ __('site.no') }}</label>
                </div>
            </div>
            <div class="career-form__grid career-cond" data-cond-field="commission_based" data-cond-show="no">
                <label>{{ __('site.expected_salary') }}<input type="text" name="expected_salary" value="{{ old('expected_salary') }}"></label>
            </div>

            {{-- Photo --}}
            <div class="career-form__q">
                <label>{{ __('site.photo') }}
                    <input type="file" name="photo" accept="image/*">
                    <span class="field-note">{{ __('site.photo_hint') }}</span>
                </label>
            </div>

            <button class="btn btn-primary career-form__submit" type="submit">{{ __('site.apply_now') }}</button>
        </form>
    </div>
</section>

<script>
    document.querySelectorAll('.career-cond').forEach(function (block) {
        var field = block.getAttribute('data-cond-field');
        var showValue = block.getAttribute('data-cond-show');
        var radios = document.querySelectorAll('input[name="' + field + '"]');

        function update() {
            var checked = document.querySelector('input[name="' + field + '"]:checked');
            var show = checked && checked.value === showValue;
            block.classList.toggle('is-visible', !!show);
            block.querySelectorAll('input').forEach(function (inp) {
                inp.required = !!show;
            });
        }

        radios.forEach(function (r) { r.addEventListener('change', update); });
        update();
    });
</script>
@endsection
