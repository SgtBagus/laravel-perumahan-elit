@extends('admin.layouts.layouts')

@section('content')
<div class="card">
    <div class="card-header">
      <div class="row align-items-center">
        <div class="col-md-6">
          <h2 class="card-title">Payment List</h2>
        </div>
        @include('components.formWaterPayment')
      </div>
    </div>

    @include('components.tableWaterPayment')
  </div>
@endsection
