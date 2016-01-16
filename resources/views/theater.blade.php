@extends('layout')

@section('content')
    dd($user,$closestTheaters);
    Thanks for signing up <b>{{ Auth::user()->email }}</b>!</br>
    The next step is to please select your preferred theater:
    <p>
        <form method="POST" action="theater">
            {!! csrf_field() !!}
            @foreach($closestTheaters as $theater)
                <div class="form-group">
                    <div class="radio">
                        <label>
                            <input type="radio" name="theater_id" value="{{ $theater->theater_id }}"
                            @if (!empty($theater->checked)) 
                                checked
                            @endif
                            >{{ $theater->name }}
                        </label>
                    </div>
                </div>
            @endforeach

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>

@endsection