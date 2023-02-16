@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('DEPOSITS') }}</div>
                @if (Session::get('user_name'))
                    Deposit is taken from {{ Session::get('user_name') }}
                @endif  
                <table>
                        <tr>
                            <th>User Name</th>
                            <th>Instalment Date</th>
                            <th>Instalment Rate</th>
                        </tr>
                    @foreach($deposits as $deposit)

                        <?php// $deposit = (array) $deposit;?>
                        <tr> 
                            <th>{{ $deposit->name }}</th>
                            <th>{{ $deposit->instalment_date }}</th>
                            <th>{{ $deposit->instalment_rate }}</th>             
                            <th>
                                <a href={{ "deposit/edit/".$deposit->id }}>EDIT</a>
                                <a href={{ "deposit/delete/".$deposit->id }}>DELETE</a>
                            </th>                
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
