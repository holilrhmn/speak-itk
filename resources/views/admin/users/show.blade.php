@extends('admin.templates.default')
@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Detail User</h3>
      <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-right">

                <a class="btn btn-primary" href="{{ route('admin.users.index') }}"> Back</a>

            </div>

        </div>

    </div>
      <!-- /.card-tools -->
    </div>
    <!-- /.card-header -->
    <div class="card-body">



        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Name:</strong>

                    {{ $user->name }}

                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Email:</strong>

                    {{ $user->email }}

                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Roles:</strong>

                    @if(!empty($user->getRoleNames()))

                        @foreach($user->getRoleNames() as $v)
                            @if ($v === 'Admin')
                            <label class="badge badge-primary">{{ $v }}</label>
                            @elseif ($v === 'Unit-Kerja')
                                <label class="badge badge-success">{{ $v }}</label>
                            @else
                                <span class="badge badge-info">{{ $v }}</span>
                            @endif

                        @endforeach

                    @endif

                </div>

            </div>

        </div>
    </div>
    <!-- /.card-footer -->
  </div>

@endsection
