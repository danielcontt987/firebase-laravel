@extends('firebase.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Crear contactos
                        <a href="{{ url('/contacts') }}" class="btn btn-sm btn-warning float-end"><i class="fas fa-arrow-left"></i> Regresar</a>
                    </h4>
                </div>
                <div class="card-body">
                   <form action="{{ url('add-contact') }}" method="POST">
                    @csrf
                        <div class="form-group mb-3">
                            <label>Nombre</label>
                            <input type="text" name="first_name" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label>Apellidos</label>
                            <input type="text" name="last_name" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label>Número de telefono</label>
                            <input type="text" name="phone" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
