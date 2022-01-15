@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Proveedores</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                
            
                        @can('crear-proveedor')
                        <a class="btn btn-warning" href="{{ route('proveedores.create') }}">Nuevo</a>
                        @endcan
            
                        <table class="table table-striped mt-2">
                                <thead style="background-color:#6777ef">                                     
                                    <th style="display: none;">ID</th>
                                    <th style="color:#fff;">Proveedor</th>
                                    <th style="color:#fff;">Tipo</th>                                    
                                    <th style="color:#fff;">Acciones</th>                                    
              
                              </thead>
                              <tbody>
                            @foreach ($proveedores as $proveedor)
                            <tr>
                                <td style="display: none;">{{ $proveedor->id }}</td>                                
                                <td>{{ $proveedor->proveedor }}</td>
                                <td>{{ $proveedor->tipo }}</td>
                                

                                <td>
                                    <form action="{{ route('proveedores.destroy',$proveedor->id) }}" method="POST">                                        
                                        @can('editar-proveedor')
                                        <a class="btn btn-info" href="{{ route('proveedores.edit',$proveedor->id) }}">Editar</a>
                                        @endcan

                                        @csrf
                                        @method('DELETE')
                                        @can('borrar-proveedor')
                                        <button type="submit" class="btn btn-danger">Borrar</button>
                                        @endcan
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <!-- Ubicamos la paginacion a la derecha -->
                        <div class="pagination justify-content-end">
                            {!! $proveedores->links() !!}
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection