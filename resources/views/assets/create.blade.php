@extends('dashboard')

@section('content')
    <main class="login-form">
        <div class="cotainer">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card">
                        <h3 class="card-header text-center">Create asset</h3>
                        <div class="card-body">
                            <form method="POST" action="{{ url('/asset') }}">
                                @csrf
                                <div class="form-group mb-3">
                                    <input type="text" placeholder="label" id="label" class="form-control" name="label" required
                                           autofocus>
                                    @if ($errors->has('label'))
                                        <span class="text-danger">{{ $errors->first('label') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <input type="number" placeholder="value" id="value" class="form-control" name="value" required
                                           autofocus>
                                    @if ($errors->has('value'))
                                        <span class="text-danger">{{ $errors->first('value') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" placeholder="currency" id="currency" class="form-control" name="currency" required
                                           autofocus>
                                    @if ($errors->has('currency'))
                                        <span class="text-danger">{{ $errors->first('currency') }}</span>
                                    @endif
                                </div>

                                <div class="d-grid mx-auto">
                                    <button type="submit" class="btn btn-dark btn-block">Create</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
