@extends('firebase.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if (session('status'))
                <h4 class="alert alert-warning mb-2">{{ session('status') }}</h4>
            @endif
            <div class="card">
                <div class="card-header">
                    <h4>Listado de contactos
                        <a href="{{ url('add-contact') }}" class="btn btn-sm btn-primary float-end"><i class="fa-solid fa-plus"></i> Agragar</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">ID</th>
                                <th class="text-center">Nombre</th>
                                <th class="text-center">Apellido</th>
                                <th class="text-center">Telefono</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Eliminar</th>
                                <th class="text-center">Editar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i = 1 @endphp
                            @forelse  ($contacts as $key => $item)
                            <tr>
                                    {{-- <td class="text-center">{{ $key }}</td> --}}
                                    <td class="text-center">{{ $i++ }}</td>
                                    <td class="text-center">{{ $item['fname'] }}</td>
                                    <td class="text-center">{{ $item['lname'] }}</td>
                                    <td class="text-center">{{ $item['phone'] }}</td>
                                    <td class="text-center">{{ $item['email'] }}</td>
                                    <td>
                                        <form action="{{ url('delete-contact/'.$key)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash-can"></i></button>
                                        </form>
                                    </td>
                                    <td class="text-center"><a href="{{ url('edit-contact/'.$key) }}" class="btn btn-sm btn-warning"><i class="fas fa-pencil text-white"></i></a></td>
                            </tr>
                            @empty
                            <td>"No hay datos"</td>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
