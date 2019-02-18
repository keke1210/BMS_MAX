@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div id="example"></div>
                            </div>   
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
</div>
@endsection
