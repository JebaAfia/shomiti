@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('LOANS') }}</div>
                @if (Session::get('user_name'))
                    Loan is given to {{ Session::get('user_name') }}
                @endif  
                <table>
                        <tr>
                            <th>User Name</th>
                            <th>Amount</th>
                            <th>Interest Rate</th>
                            <th>Frequency</th>
                            <th>Starting Date</th>
                        </tr>
                    @foreach($loans as $loan)
                        <tr> 
                            <th>{{$loan['user_id']}}</th>
                            <th>{{$loan['amount']}}</th>
                            <th>{{$loan['interest_rate']}}</th>
                            <th>{{$loan['frequency']}}</th>
                            <th>{{$loan['start_date']}}</th>                
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
