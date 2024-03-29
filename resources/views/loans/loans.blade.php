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
                            <th>Total Payable</th>
                            <th>Starting Date</th>
                            <th>Action</th>
                        </tr>
                    @foreach($loans as $loan)
                        <tr> 
                            <th>{{$loan->user->name}}</th>
                            <th>{{$loan['amount']}}</th>
                            <th>{{$loan['interest_rate']}}</th>
                            <th>{{$loan['frequency']}}</th>
                            <th>{{  $loan['total_payable'] }}</th>
                            <th>{{$loan['start_date']}}</th>                
                            <th>
                                <a href={{"loan/edit/".$loan['id']}}>EDIT</a>
                                <a href={{"loan/delete/".$loan['id']}}>DELETE</a>
                                <a href={{"deposit/insert/".$loan['id']}}>DEPOSIT</a>
                            </th>                
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
