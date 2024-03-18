@extends('layouts.app')

@section('template_title')
    {{ $xuxemon->name ?? "{{ __('Show Xuxemon') }}"
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Xuxemon</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('xuxemons.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $xuxemon->name }}
                        </div>
                        <div class="form-group">
                            <strong>Type:</strong>
                            {{ $xuxemon->type }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
