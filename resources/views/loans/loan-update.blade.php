@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Update') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('loan-update') }}">
                        @csrf
                        <input type="hidden" name="id" value="{{ $loan['id'] }}">
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                            <div class="col-md-6">
                                <select name="user_id" class='form-control'>
                                    <option value="">Select User</option>
                                    @foreach ($users as $key => $user)
                                        <option 
                                        @if($user->id == $loan['user_id']) 
                                        selected
                                        @endif
                                        value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="amount" class="col-md-4 col-form-label text-md-end">{{ __('Amount') }}</label>

                            <div class="col-md-6">
                                <input id="amount" type="text" class="form-control @error('amount') is-invalid @enderror" name="amount" value="{{ $loan['amount'] }}">

                                @error('amount')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="interest_rate" class="col-md-4 col-form-label text-md-end">{{ __('Interest Rate') }}</label>

                            <div class="col-md-6">
                                <input id="interest_rate" type="text" class="form-control @error('interest_rate') is-invalid @enderror" name="interest_rate" value="{{ $loan['interest_rate'] }}">

                                @error('interest_rate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="frequency" class="col-md-4 col-form-label text-md-end">{{ __('Frequency') }}</label>

                            <div class="col-md-6">
                                <input id="frequency" type="text" class="form-control @error('frequency') is-invalid @enderror" name="frequency" value="{{ $loan['frequency'] }}">

                                @error('frequency')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="start_date" class="col-md-4 col-form-label text-md-end">{{ __('Starting Date') }}</label>

                            <div class="col-md-6">
                                <input id="start_date" type="text" class="form-control @error('start_date') is-invalid @enderror" name="start_date" value="{{ $loan['start_date'] }}">

                                @error('start_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="handover_date" class="col-md-4 col-form-label text-md-end">{{ __('Handover date') }}</label>

                            <div class="col-md-6">
                                <input id="handover_date" type="text" class="form-control @error('handover_date') is-invalid @enderror" name="handover_date" value="{{$loan['handover_date']}}">

                                @error('handover_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Granter Name') }}</label>
                            <div class="col-md-6">
                                <select name="granter_name" class='form-control'>
                                    <option value="">Select User</option>
                                    @foreach ($users as $key => $user)
                                        <option 
                                        @if ($user->id==$loan['granter_name'])
                                            selected
                                        @endif
                                        value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
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
