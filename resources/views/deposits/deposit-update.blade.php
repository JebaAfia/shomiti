@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Deposit Tk: ' . $loan->amount . ' For: ' . $loan->user->name) }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('deposit-update') }}">
                        @csrf
                        <input type="hidden" name="loan_id" value="{{$deposit->loan_id}}">
                        <div class="row mb-3">
                            <label for="instalment_date" class="col-md-4 col-form-label text-md-end">{{ __('Instalment Date') }}</label>

                            <div class="col-md-6">
                                <input id="instalment_date" type="text" class="form-control @error('instalment_date') is-invalid @enderror" name="instalment_date" value="{{ $deposit['instalment_date'] }}">

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
                                <input id="instalment_rate" type="text" class="form-control @error('instalment_rate') is-invalid @enderror" name="instalment_rate" value="{{ $deposit['instalment_rate'] }}">

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
                                    {{ __('Update') }}
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
