@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="POST" action="{{ route('blog.admin.categories.store') }}">
            @csrf

            @if ($errors->any())
                @foreach ($errors->all() as $err)
                    <div class="row justify-content-center">
                        <div class="col-md-11">
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&#x2715;</span>
                                </button>
                                {{ $err }}
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif

            @if (session()->has('success'))
                <div class="row justify-content-center">
                    <div class="col-md-11">
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&#x2715;</span>
                            </button>
                            {{ session()->get('success') }}
                        </div>
                    </div>
                </div>
            @endif

        
            <div class="row justify-content-center">
                <div class="col-md-8">
                    @include('blog.admin.categories.includes.item_edit_main_col')
                </div>
                <div class="col-md-3">
                    @include('blog.admin.categories.includes.item_edit_add_col')
                </div>
            </div>
        </form>
    </div>
@endsection