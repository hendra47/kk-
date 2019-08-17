@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Daftars
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($daftars, ['route' => ['daftars.update', $daftars->id], 'method' => 'patch']) !!}

                        @include('daftars.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection