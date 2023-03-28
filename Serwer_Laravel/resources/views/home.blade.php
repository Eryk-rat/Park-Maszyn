@extends('layouts.app')

@include('item.sidebar')

@section('content')
<div class="container">




    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                

                <div class="card-body" style="text-align: center; 
                padding-top:20px">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <ul style="text-align: center; 
                    list-style-type: none;">
                        <li >
                            <div >

                            <a href="{{ route('users.index') }}" >
                            <img src="{{ url('/ikons/users.png') }}" alt="USER_NAME" width="250" height="200">
                            </a>

                            </div> 
                        </li>

                        <li>Pracownicy</li>

                        <li>
                            <div style="float: clear;
                            padding-top:20px">

                            <a href="{{ route('users.index') }}" style="float: clear;
                            padding-top:20px">

                                <img src="{{ url('/ikons/maszyny.png') }}" alt="USER_NAME" width="250" height="200">
                            </a>
        
                            </div> 
                        </li>

                        <li>Maszyny</li>

                        <li>
                            <div style="float: clear;
                            padding-top:20px">

                            <a href="{{ route('users.index') }}" style="float: clear;
                            padding-top:20px"> 
                                <img src="{{ url('/ikons/przegląd.png') }}" alt="USER_NAME" width="300" height="200"> 
                            </a>

                            </div> 
                        </li>

                        <li>Przeglądy</li>
                    </ul>
                </div>
           
        </div>
    </div>
</div>
@endsection
