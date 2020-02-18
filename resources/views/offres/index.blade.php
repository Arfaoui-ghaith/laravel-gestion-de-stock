@extends('layouts.app', ['title' => __('Offres')])

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Offres') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('offre.create') }}" class="btn btn-sm btn-primary">{{ __('Ajouter Offre') }}</a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-12">
                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('status') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                    </div>

                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">{{ __('ID') }}</th>
                                    <th scope="col">{{ __('Title') }}</th>
                                    <th scope="col">{{ __('Annee') }}</th>
                                    <th scope="col">{{ __('Numero Cahier') }}</th>
                                    <th scope="col">{{ __('Etat') }}</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($offres as $offre)
                                    <tr>
                                        <td>{{ $offre->id }}</td>
                                        <td>
                                            {{ $offre->title }}
                                        </td>
                                        <td>{{ $offre->annee }}</td>
                                        <td>{{ $offre->numero_cahier }}</td>
                                        @if ( $offre->etat == 1)

                                        <td ><span style="color:#4fd69c">Active</span></td>

                                        @else
                                        <td ><span style="color:red">Inactive</span></td>
                                        @endif

                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    
                                                        <form action="{{ route('offre.destroy', $offre) }}" method="post">
                                                            @csrf
                                                            @method('delete')
                                            
                                                            <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to delete this fournisseur?") }}') ? this.parentElement.submit() : ''">
                                                                {{ __('Delete') }}
                                                            </button>
                                                        </form> 
                                                        <form action="{{ route('offre.update', $offre) }}" method="post">
                                                            @csrf
                                                            @method('put')
                                            
                                                            <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to change this etat?") }}') ? this.parentElement.submit() : ''">
                                                                {{ __('Change Etat') }}
                                                            </button>
                                                        </form>    
                                                  
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">
                            {{ $offres->links() }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>
            
        @include('layouts.footers.auth')
    </div>
@endsection