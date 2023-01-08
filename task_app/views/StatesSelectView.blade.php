{{--
Here you will have access to :



1 - "$data" (data from controller) and
2 - "$params" (data passed to @widget('name', $params) call).

try : {!! dd($data, $params) !!} to see what you have.
--}}
@php(extract($data))
<div class="row mb-3">
    <label for="status" class="col-md-4 col-form-label text-md-end">{{ __('Status') }}</label>

    <div class="col-md-6">
        {!! Form::select('status', $states, 'not_started', ['class' => 'form-control']) !!}
        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>
