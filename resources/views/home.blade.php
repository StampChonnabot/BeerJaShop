@extends('layout.head')
@section('title', 'BeerJA')

@section('content')

<div class="content" style="padding: 20px;">

    <div class="container-fluid">
        <div class="row">
            @foreach($id as $item)
            <div class="col-3">
                <div class="card card-block" style="padding: 5%; margin:5%;">
                    <img src="{{$item->image_url}}" style="height: 16rem; width: 6rem;" class="rounded mx-auto d-block" alt="Card image">
                    <div class="card-body">
                        <b>{{$item->name}} </b>
                        <p class="d-none d-lg-block" aria-expanded="false">{{Str::limit($item->description, 150)}}</p>
                        <a role="button" class="collapsed" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample"></a>
                        <div class="row">
                            <div class="col-4">
                                <a href="#"><i class="material-icons" style="font-size:36px;color:#BEBEBE">help_outline</i></a>
                            </div>
                            <div class="col-4">
                                <a href="#"><i class="material-icons" style="font-size:36px;color:#8B795E">shopping_cart</i></a>
                            </div>
                            <div class="col-4">
                                <div><i onclick="approveGameRequests()" class="material-icons" style="font-size:36px;color:#BEBEBE">favorite</i></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

</div>
<div>
    <ul class="pagination justify-content-center">
        {{ $id->links() }}
    </ul>
</div>
@stop