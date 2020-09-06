@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('formulario') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('text') ? ' has-error' : '' }}">
                            <label for="text" class="col-md-4 control-label">nombre</label>

                            <div class="col-md-6">
                                <input id="text" type="text" class="form-control" name="text" value="{{ Cliente.nombre }}" required autofocus>

                                @if ($errors->has('text'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('text') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('text') ? ' has-error' : '' }}">
                            <label for="text" class="col-md-4 control-label">Email</label>

                            <div class="col-md-6">
                                <input id="text" type="text" class="form-control" name="text" value="{{ Cliente.email }}" required>

                                @if ($errors->has('text'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('text') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('text') ? ' has-error' : '' }}">
                            <label for="text" class="col-md-4 control-label">Delegacion</label>

                            <div class="col-md-6">
                                <input id="text" type="text" class="form-control" name="text" value="{{ Cliente.delegacion }}" required>

                                @if ($errors->has('text'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('text') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                   

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit"  class="btn btn-primary">
                                    Generar pdf
                                </button>
                                

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection