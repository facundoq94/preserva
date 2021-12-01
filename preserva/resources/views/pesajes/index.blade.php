@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Pesajes</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                
            
                        @can('crear-pesaje')
                        <a class="btn btn-warning" href="{{ route('pesajes.create') }}">Nuevo</a>
                        @endcan
            
                        <table class="table table-striped mt-2">
                                <thead style="background-color:#6777ef">                                     
                                    <th style="display: none;">ID</th>
                                    <th style="color:#fff;">Material</th>
                                    <th style="color:#fff;">Kg</th>                                    
                                    <th style="color:#fff;">Acciones</th>                                                                   
                              </thead>
                              <tbody>
                            @foreach ($pesajes as $pesaje)
                            <tr>
                                <td style="display: none;">{{ $pesaje->id }}</td>                                
                                <td>{{ $pesaje->material }}</td>
                                <td>{{ $pesaje->kg }}</td>
                                <td>
                                    <form action="{{ route('pesajes.destroy',$pesaje->id) }}" method="POST">                                        
                                        @can('editar-pesaje')
                                        <a class="btn btn-info" href="{{ route('pesajes.edit',$pesaje->id) }}">Editar</a>
                                        @endcan

                                        @csrf
                                        @method('DELETE')
                                        @can('borrar-pesaje')
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
                            {!! $pesajes->links() !!}
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection