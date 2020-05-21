@extends ('layout.app')

@section('content')



<span id="status"></span>

<table id="cart" class="table table-hover table-condensed">
    <thead>
    <tr>
        <th style="width:50%">Event</th>
        <th style="width:10%">Price</th>
        <th style="width:8%">Quantity</th>
        <th style="width:22%" class="text-center">Subtotal</th>
        <th style="width:10%"></th>
    </tr>
    </thead>
    <tbody>

    <?php $total = 0 ?>

    @if(session('cart'))
        @foreach((array) session('cart') as $id => $posts)

            <?php $total += $posts['cat_fee'] * $posts['quantity'] ?>

            <tr>
                <td data-th="Post">
                    <div class="row">
                        <div class="col-sm-3 hidden-xs"><img src = "../storage/storage/event_images/{{$post->event_image}}" width="100" height="100" class="img-responsive"/></div>
                        <div class="col-sm-9">
                            <h4 class="nomargin">{{ $posts->title }}</h4>
                        </div>
                    </div>
                </td>

                @foreach($post->categories as $category)
                    {{-- <td data-th="Price">${{ $category->cat_fee }}</td> --}}
                    <td data-th="Quantity">
                        <input type="number" value="{{ $posts->quantity }}" class="form-control quantity" />
                    </td>
                    {{-- <td data-th="Subtotal" class="text-center">$<span class="product-subtotal">{{ $category->cat_fee * $posts->quantity }}</span></td> --}}
                    <td class="actions" data-th="">
                        <button class="btn btn-info btn-sm update-cart" data-id="{{ $post_id }}"><i class="fa fa-refresh"></i></button>
                        <button class="btn btn-danger btn-sm remove-from-cart" data-id="{{ $post_id }}"><i class="fa fa-trash-o"></i></button>
                        <i class="fa fa-circle-o-notch fa-spin btn-loading" style="font-size:24px; display: none"></i>
                    </td>
                @endforeach
            </tr>
        @endforeach
    @endif

    </tbody>
    <tfoot>
    <tr class="visible-xs">
        <td class="text-center"><strong>Total RM<span class="cart-total">{{ $total }}</span></strong></td>
    </tr>
    <tr>
        {{-- <td><a href="{{ url('/') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td> --}}
        <td colspan="2" class="hidden-xs"></td>
        <td class="hidden-xs text-center"><strong>Total RM<span class="cart-total">{{ $total }}</span></strong></td>
    </tr>
    </tfoot>
</table>

@include('inc.cartscript')
@endsection