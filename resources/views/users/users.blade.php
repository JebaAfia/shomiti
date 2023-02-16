@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card"> 
                <table>
                        <tr>
                            <th>User Name</th>
                            <th>Phone Number</th>
                            <th>Address</th>
                            <th>Email</th>
                        </tr>
                    @foreach($users as $user)
                        <tr> 
                            <th>{{ $user['name'] }}</th>
                            <th>{{ $user['phone_number'] }}</th>
                            <th>{{ $user['address'] }}</th>
                            <th>{{ $user['email'] }}</th>              
                            <th>
                                <a href={{"user/edit/".$user['id']}}>EDIT</a>
                                <a href={{"user/delete/".$user['id']}}>DELETE</a>
                            </th>                
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
