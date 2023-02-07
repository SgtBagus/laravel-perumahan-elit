@extends('admin.layouts.layouts')

@section('content')
<div class="card">
    <div class="card-header">
      <div class="row align-items-center">
        <div class="col-md-6">
          <h2 class="card-title">Payment List</h2>
        </div>
        <div class="col-md-6">
          <div class="float-right">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-xl">
              <i class="fas fa-plus mr-2"></i>
                Add Data
            </button>
          </div>
        </div>
      
        @include('components.formWaterPaymet')
      </div>
    </div>

    @include('components.tableWaterPayment')
  </div>
@endsection
