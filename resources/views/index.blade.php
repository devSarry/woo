@extends('layouts.master')
@section('content')
       <section class="content-header">
          <h1>
            Page Header
            <small>Optional description</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
            <li class="active">Here</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Your Page Content Here -->
            @if (Auth::check())
             <h1><span class="text-success">Authenticated</span></h1>
             <pre>
               {!! var_dump(Auth::user()->name) !!}
             </pre>
            @endif
        </section><!-- /.content -->
@endsection

@section('custom-js')

@endsection