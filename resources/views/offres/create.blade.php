@extends('layouts.app', ['title' => __('offre Management')])

@section('content')
    @include('layouts.headers.cards', ['title' => __('Ajouter Offre')])   

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Offre Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('offre.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('offre.store') }}" autocomplete="off">
                            @csrf
                            
                            <h6 class="heading-small text-muted mb-4">{{ __('cahier information') }}</h6>
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('annee') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-annee">{{ __('annee') }}</label>
                                    <input type="number" name="annee" id="input-annee" class="form-control form-control-alternative{{ $errors->has('annee') ? ' is-invalid' : '' }}" placeholder="{{ __('annee') }}" value="{{ old('annee') }}" required autofocus>

                                    @if ($errors->has('annee'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('annee') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-title">{{ __('title') }}</label>
                                    <input type="text" name="title" id="input-title" class="form-control form-control-alternative{{ $errors->has('title') ? ' is-invalid' : '' }}" placeholder="{{ __('title') }}" value="{{ old('title') }}" required>

                                    @if ($errors->has('title'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('numero_cahier') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-numero_cahier">{{ __('numero_cahier') }}</label>
                                    <select class="browser-default custom-select form-control form-control-alternative{{ $errors->has('numero_cahier') ? ' is-invalid' : '' }}" name="numero_cahier" id="input-numero_cahier" value="" required>
                                           <option selected>Open this select menu</option>
                                           @foreach ($cahiers as $cahier)
                                           <option value="{{$cahier->id}}">{{$cahier->id}}</option>
                                        
                                           @endforeach
                                   </select>
                                    
                                    @if ($errors->has('numero_cahier'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('numero_cahier') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        @include('layouts.footers.auth')
    </div>
@endsection