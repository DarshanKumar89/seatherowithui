@extends('layout')

@section('content')

 <section id="friends">
            <div class="container" style="height:auto;">
                <div class="row">

                            <p>Your theater is : <b>{{ $theater->name }}</b></p><br>
                            <p>Do you have any friends that would be interested in SeatHero?</p><br/>
                          

                                @include('errors_display')

                                <form method="POST" action="friends">
                                    {!! csrf_field() !!}
                                    <div class="form-group">
                                        <label for="email1">Friend's Email:</label>
                                        <input type="text" name="friend[1][email]" id="email1" class="form-control" value="{{ old('email1') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="email2">Friend's Email:</label>
                                        <input type="text" name="friend[2][email]" id="email2" class="form-control" value="{{ old('email2') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="email3">Friend's Email:</label>
                                        <input type="text" name="friend[3][email]" id="email3" class="form-control" value="{{ old('email3') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="email4">Friend's Email:</label>
                                        <input type="text" name="friend[4][email]" id="email4" class="form-control" value="{{ old('email4') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="email5">Friend's Email:</label>
                                        <input type="text" name="friend[5][email]" id="email5" class="form-control" value="{{ old('email5') }}">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </p>


                </div>
            </div>
</section>
@endsection