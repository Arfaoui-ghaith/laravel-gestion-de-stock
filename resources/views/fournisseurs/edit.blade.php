@extends('layouts.app', ['title' => __('Fournisseur Management')])

@section('content')
    @include('users.partials.header', ['title' => __('Edit Fournisseur')])   

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Fournisseur Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('fournisseur.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('fournisseur.update', $fournisseur) }}" autocomplete="off">
                            @csrf
                            @method('put')

                            <h6 class="heading-small text-muted mb-4">{{ __('Fournisseur information') }}</h6>
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Name') }}</label>
                                    <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', $fournisseur->name) }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-email">{{ __('Email') }}</label>
                                    <input type="text" name="email" id="input-email" class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('email') }}" value="{{ old('email', $fournisseur->email) }}" required autofocus>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('numero') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-numero">{{ __('Numero de telephone') }}</label>
                                    <input type="text" name="numero" id="input-numero" class="form-control form-control-alternative{{ $errors->has('numero') ? ' is-invalid' : '' }}" placeholder="{{ __('numero') }}" value="{{ old('numero', $fournisseur->name) }}" required autofocus>

                                    @if ($errors->has('numero'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('numero') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('adresse') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-adresse">{{ __('Adresse') }}</label>
                                    <input type="text" name="adresse" id="input-adresse" class="form-control form-control-alternative{{ $errors->has('adresse') ? ' is-invalid' : '' }}" placeholder="{{ __('adresse') }}" value="{{ old('adresse', $fournisseur->adresse) }}" required autofocus>

                                    @if ($errors->has('adresse'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('adresse') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('code_postal') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-code_postal">{{ __('Code Postal') }}</label>
                                    <input type="text" name="code_postal" id="input-code_postal" class="form-control form-control-alternative{{ $errors->has('code_postal') ? ' is-invalid' : '' }}" placeholder="{{ __('code_postal') }}" value="{{ old('code_postal', $fournisseur->code_postal) }}" required autofocus>

                                    @if ($errors->has('code_postal'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('code_postal') }}</strong>
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