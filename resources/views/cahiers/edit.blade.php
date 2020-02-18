@extends('layouts.app', ['title' => __('cahier Management')])

@section('content')
    @include('users.partials.header', ['title' => __('Edit Cahier')])   

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Cahier Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('cahier.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('cahier.update', $cahier) }}" autocomplete="off">
                            @csrf
                            @method('put')

                            <h6 class="heading-small text-muted mb-4">{{ __('Cahier information') }}</h6>
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('annee') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-annee">{{ __('annee') }}</label>
                                    <input type="number" name="annee" id="input-annee" class="form-control form-control-alternative{{ $errors->has('annee') ? ' is-invalid' : '' }}" placeholder="{{ __('annee') }}" value="{{ old('annee', $cahier->annee) }}" required autofocus>

                                    @if ($errors->has('annee'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('annee') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('Chef_projet') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-Chef_projet">{{ __('Chef de projet') }}</label>
                                    <input type="text" name="Chef_projet" id="input-Chef_projet" class="form-control form-control-alternative{{ $errors->has('Chef_projet') ? ' is-invalid' : '' }}" placeholder="{{ __('chef de projet') }}" value="{{ old('Chef_projet', $cahier->Chef_projet) }}" required>

                                    @if ($errors->has('Chef_projet'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('Chef_projet') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('fournisseur') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-fournisseur">{{ __('Fournisseur') }}</label>
                                    <select class="browser-default custom-select form-control form-control-alternative{{ $errors->has('fournisseur') ? ' is-invalid' : '' }}" name="fournisseur" id="input-fournisseur" value="{{ $cahier->fournisseur }}" required>
                                           <option selected>{{ $cahier->fournisseur }}</option>
                                           @foreach ($fournisseurs as $fournisseur)
                                           <option value="{{$fournisseur->id}}">{{$fournisseur->id}} : {{$fournisseur->name}}</option>
                                        
                                           @endforeach
                                   </select>
                                    
                                    @if ($errors->has('fournisseur'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('fournisseur') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label class="form-control-label" for="input-date_lancement">{{ __('date de lancement') }}</label>
                                    <input type="date" name="date_lancement" id="input-date_lancement" class="form-control form-control-alternative{{ $errors->has('date_lancement') ? ' is-invalid' : '' }}" placeholder="{{ __('date_lancement') }}" value="{{ $cahier->date_lancement }}" required>
                                
                                    @if ($errors->has('date_lancement'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('date_lancement') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label class="form-control-label" for="input-observation">{{ __('Observation') }}</label>
                                    <input type="text" name="observation" id="input-observation" class="form-control form-control-alternative{{ $errors->has('observation') ? ' is-invalid' : '' }}" placeholder="{{ __('observation') }}" value="{{ $cahier->observation }}" required>
                                
                                    @if ($errors->has('observation'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('observation') }}</strong>
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