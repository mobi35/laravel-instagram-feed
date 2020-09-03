@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"></div>

                <div class="card-body">

                    @if (session()->has('message'))
                <div class="alert alert-success">{{session()->get('message')}}</div>
                      @elseif(session()->has('error'))
                    <div class="alert alert-danger">{{session()->get('error')}}</div>

                    @endif


                    <form action="upload" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="image"/>
                        <input type="submit" >
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
