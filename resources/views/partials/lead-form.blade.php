<form class="lead-form card" method="post" action="{{ route('leads.store') }}">
    @csrf
    {{-- Honeypot (hidden from humans, filled by bots) --}}
    <div class="hp-field" aria-hidden="true">
        <label>Website<input type="text" name="website" tabindex="-1" autocomplete="off"></label>
    </div>

    <label>{{ __('site.name') }}<input type="text" name="name" value="{{ old('name') }}" required maxlength="120"></label>
    <label>{{ __('site.phone') }}<input type="text" name="phone" value="{{ old('phone') }}" required maxlength="30"></label>
    <label>{{ __('site.email') }}<input type="email" name="email" value="{{ old('email') }}" maxlength="150"></label>
    <label>{{ __('site.product') }}
        <select name="product_id">
            <option value="">{{ __('site.product_select_default') }}</option>
            @foreach ($navProducts ?? [] as $p)
                <option value="{{ $p->id }}" @selected(old('product_id') == $p->id)>{{ $p->localizedName() }}</option>
            @endforeach
        </select>
    </label>
    <label>{{ __('site.message') }}<textarea name="message" rows="3" maxlength="2000">{{ old('message') }}</textarea></label>

    @if (config('regal.recaptcha_enabled') && config('regal.recaptcha_site_key'))
        <div class="g-recaptcha" data-sitekey="{{ config('regal.recaptcha_site_key') }}"></div>
    @endif

    <button class="btn btn-primary" type="submit">{{ __('site.lead_submit') }}</button>
    @if ($errors->any())
        <div class="error-box">{{ $errors->first() }}</div>
    @endif
</form>
