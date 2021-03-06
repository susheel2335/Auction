@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">My auctions</div>
                    <div class="card-body">
                        <table class="table table-bordered text-sm-center">
                            <tr>
                                <th>Name</th>
                                <th>Initial price</th>
                                <th>Due date</th>
                                <th>Product status</th>
                                <th></th>
                            </tr>
                            @if(count($products)>0)
                                @foreach ($products as $product)
                                    @if(Auth::user()->id == $product -> userId)
                                        <tr>
                                            <td>{{ $product-> name }}</td>
                                            <td>{{ $product-> starter_price }}</td>
                                            <td>{{ $product-> due_date }}</td>
                                            <td>
                                                @if( !empty($product))
                                                    @if($product -> sold)
                                                        {{'Sold'}}
                                                    @else
                                                        {{'Active'}}
                                                    @endif
                                                @else
                                                    {{'Active'}}
                                                @endif
                                            </td>
                                            <td>
                                                <a class="btn btn-success" href="{{route('product-bids',$product->id)}}">View Bids
                                                    <i class="glyphicon glyphicon-pencil"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            @else
                                <p>Go for "Make Auction" tab for your first one!</p>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
