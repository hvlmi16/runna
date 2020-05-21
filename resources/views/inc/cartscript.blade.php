<script type="text/javascript">

    $(".update-cart").click(function (e) {
        e.preventDefault();

        var ele = $(this);

        var parent_row = ele.parents("tr");

        var quantity = parent_row.find(".quantity").val();

        var product_subtotal = parent_row.find("span.product-subtotal");

        var cart_total = $(".cart-total");

        var loading = parent_row.find(".btn-loading");

        loading.show();

        $.ajax({
            url: '{{ url('update-cart') }}',
            method: "patch",
            data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"), quantity: quantity},
            dataType: "json",
            success: function (response) {

                loading.hide();

                $("span#status").html('<div class="alert alert-success">'+response.msg+'</div>');

                $("#header-bar").html(response.data);

                product_subtotal.text(response.subTotal);

                cart_total.text(response.total);
            }
        });
    });

    $(".remove-from-cart").click(function (e) {
        e.preventDefault();

        var ele = $(this);

        var parent_row = ele.parents("tr");

        var cart_total = $(".cart-total");

        if(confirm("Are you sure")) {
            $.ajax({
                url: '{{ url('remove-from-cart') }}',
                method: "DELETE",
                data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                dataType: "json",
                success: function (response) {

                    parent_row.remove();

                    $("span#status").html('<div class="alert alert-success">'+response.msg+'</div>');

                    $("#header-bar").html(response.data);

                    cart_total.text(response.total);
                }
            });
        }
    });

</script>