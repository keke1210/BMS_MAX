@extends('layouts.app')
@extends('layouts.dashboard')
@role('menaxher|admin')
@section('dash-title')
     <h2>
        <div class="m-l-lg">Menaxher</div>
     </h2> 
@endsection
@section('content')
    {{--     <h1>Menaxher</h1>
    <a href="/products" class="btn btn-primary">
        Menaxho Produkte
    </a>

    <a href="/users" class="btn btn-primary">
        Menaxho Usera
    </a> --}}
    
            <div class="wrapper wrapper-content ng-scope" style="">
                    <a href="/products" class="btn btn-primary">
                        Menaxho Produkte
                    </a>
                
                    <a href="/users" class="btn btn-primary">
                        Menaxho Usera
                    </a> 
            </div>
      
@endsection
@endrole
