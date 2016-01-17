@extends('layout')

@section('content')
    
    <section id="theater">
            <div class="container" style="height:auto;">
                <div class="row">
                    <p>Thanks for signing up <b>{{ Auth::user()->email }}</b>!</p></br>
                    
                    <!--if theaters are comming -->
                    <?php if (count($closestTheaters)>0) {  ?>
                    <p>The next step is to please select your preferred theater:</p>
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
                    <?php } 
                    else{  ?>
                            <h1> We Don't provide our services in your area. </h1>

                    <?php } 
                    ?>
                </div>
            </div>
    </section>

@endsection