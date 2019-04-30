@extends('layouts.app')
@extends('layouts.dashboard')
@section('dash-title')
<h2>
    <div class="m-l-lg">API</div>
</h2>
@endsection
@section('content')
<div class="container">
        <div class="col-md-8">
            <div class="card text-black bg-white">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="container">
                            <div class="col-md-8">
                                <div id="example"></div>
                            </div>   
                    </div>   
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div id="orders"></div>
                            </div>   
                        </div>   
                    </div>   
                     <div id="createuser"></div>
                    <script type="text/javascript" src="/js/app.js"></script>
                </div>
            </div>
        </div>
</div>
@endsection
