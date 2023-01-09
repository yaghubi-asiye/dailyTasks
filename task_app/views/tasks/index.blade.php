@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                        @if($errors->any())
                            @foreach($errors->all() as $error)
                                <div class="alert alert-danger" role="alert">
                                    {{ $error }}
                                </div>
                            @endforeach
                        @endif
                    <div class="card-header">{{ __('List Tasks') }}</div>

                    <div class="card-body">
                      <table>
                          <tr>
                              <td>all</td>
                              <td>not Started</td>
                              <td>doing</td>
                              <td>done</td>
                              <td>failed</td>
                              <td>skipped</td>
                          </tr>
                      </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
