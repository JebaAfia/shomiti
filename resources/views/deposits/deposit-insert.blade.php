@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Insert Deposit Date And Amount') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('deposit-insert') }}">
                        @csrf
                        @if($loan_id)
                            <input type="hidden" name="loan_id" value="{{$loan_id}}">
                        @else
                            <div class="row mb-3">
                                <label for="loan_id" class="col-md-4 col-form-label text-md-end">{{ __('Loan ID') }}</label>
                                <div class="col-md-6">
                                    <select name="loan_id" class='form-control'>
                                        <option value="">Select User</option>
                                        @foreach ($loans as $key => $loan)
                                            <option value="{{ $loan->id }}">{{ $loan->user->name .' - '. $loan->amount}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        @endif

                        <div class="row mb-3">
                            <label for="instalment_date" class="col-md-4 col-form-label text-md-end">{{ __('Instalment Date') }}</label>

                            <div class="col-md-6">
                                <input id="instalment_date" type="text" class="form-control @error('instalment_date') is-invalid @enderror" name="instalment_date" value="{{ old('instalment_date') }}">

                                @error('instalment_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="instalment_rate" class="col-md-4 col-form-label text-md-end">{{ __('Instalment Rate') }}</label>

                            <div class="col-md-6">
                                <input id="instalment_rate" type="text" class="form-control @error('instalment_rate') is-invalid @enderror" name="instalment_rate" value="{{ old('instalment_rate') }}">

                                @error('instalment_rate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Push') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
