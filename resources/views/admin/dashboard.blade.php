@extends('layouts.masteradmin')

@section('content')
<div class= "card-body">
   @if(session('error'))
   <script>
       Swal.fire({
           icon: 'error',
           title: 'Aceso denegado',
           text: "{{session('error') }}",
           confirmButtonText: 'Entendido'
       });
   </script>
 </div>
       
   @endif 
@endsection