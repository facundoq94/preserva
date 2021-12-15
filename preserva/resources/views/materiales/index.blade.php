@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Material</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                
            
                        @can('crear-material')
                        <a class="btn btn-warning" href="{{ route('materiales.create') }}">Nuevo</a>
                        @endcan
            
                        <table class="table table-striped mt-2">
                                <thead style="background-color:#6777ef">                                     
                                    <th style="display: none;">ID</th>
                                    <th style="color:#fff;">Material</th>
                                    <th style="color:#fff;">Kg</th>                                    
                                    <th style="color:#fff;">Acciones</th>                                                                   
                              </thead>
                              <tbody>
                            @foreach ($materiales as $material)
                            <tr>
                                <td style="display: none;">{{ $material->id }}</td>                                
                                <td>{{ $material->material }}</td>
                                <td>{{ $material->presentacion }}</td>
                                <td>{{ $material->precio }}</td>

                                <td>
                                    <form action="{{ route('materiales.destroy',$material->id) }}" method="POST">                                        
                                        @can('editar-material')
                                        <a class="btn btn-info" href="{{ route('materiales.edit',$material->id) }}">Editar</a>
                                        @endcan

                                        @csrf
                                        @method('DELETE')
                                        @can('borrar-material')
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
                            {!! $materiales->links() !!}
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection