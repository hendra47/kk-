@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Pasiens
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($pasiens, ['route' => ['pasiens.update', $pasiens->id], 'method' => 'patch']) !!}

                        @include('pasiens.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection