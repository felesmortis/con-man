@extends('web::layouts.grids.3-9')

@section('title', trans('conman::seat.conman'))
@section('page_header', trans('conman::seat.conman'))

@section('left')

<script>

function searchChange() {
    
}

</script>

<input type="text" class="form-control" placeholder="Search for...">
<span class="input-group-btn">
    <button class="btn btn-default" type="button">Search!</button>
</span>
<div class="list-group">
    @foreach($posts as $post)
    <a href="#" class="list-group-item active">
        <h4 class="list-group-item-heading">@post->title</h4>
    </a>
    @endforeach
</div>

@stop

@section('right')

right

@stop