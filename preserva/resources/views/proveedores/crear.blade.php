@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Crear proveedor</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">     
                                                                      
                        @if ($errors->any())                                                
                            <div class="alert alert-dark alert-dismissible fade show" role="alert">
                            <strong>¡Revise los campos!</strong>                        
                                @foreach ($errors->all() as $error)                                    
                                    <span class="badge badge-danger">{{ $error }}</span>
                                @endforeach                        
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                        @endif

                    <form action="{{ route('proveedores.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                   <label for="proveedor">Proveedor</label>
                                   <input type="text" name="proveedor" class="form-control">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                   <label for="tipo">Tipo de proveedor</label>
                                   <select name="tipo">
                                    <option value="Comercio">Comercio</option>
                                    <option value="Institución">Institución</option>
                                    <option value="Recolector">Recolector</option>
                                    <option value="Municipalidad">Municipalidad</option>

                                </select>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                   <label for="cuitdni">CUIT / DNI</label>
                                   <input type="text" name="cuitdni" class="form-control">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="condicioniva">Condición IVA</label>
                                    <select name="condicioniva">
                                     <option value="Responsable inscripto">Responsable inscripto</option>
                                     <option value="Monotributista">Monotributista</option>
                                     <option value="Exento">Exento</option>
                                     <option value="Consumidor final">Consumidor final</option>
 
                                 </select>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                   <label for="telefono">Teléfono</label>
                                   <input type="text" name="telefono" class="form-control">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                   <label for="domicilio">Domicilio</label>
                                   <input type="text" name="domicilio" class="form-control">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                   <label for="ciudad">Ciudad</label>
                                   <input type="text" name="ciudad" class="form-control">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                   <label for="provincia">Provincia</label>
                                   <input type="text" name="provincia" class="form-control">
                                </div>
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Guardar</button>                            
                        </div>
                    </form>
                    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection