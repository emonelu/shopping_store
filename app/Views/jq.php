<script>
    $(document).ready(function() {


        fetchCheckoutItems()

        function fetchCheckoutItems() {
            var total_cost = 0
            var amount_available = Wallet();
            var balance = 0
            var details = {
                'user': $('#userid').val()
            };
            console.log(details);
            $("#checkout-items").html("");
            $.ajax({
                url: "<?php echo base_url('Items/fetchCart') ?>",
                method: 'post',
                data: details,
                success: function(response) {
                    if (response.cart_items.length !== 0) {
                        $('.empty').css('display', 'none');
                        $.each(response.cart_items, function(key, value) {
                            $("#checkout-items").append(
                                '<tr data-id="' + value.order_number + '">' +
                                '<td data-product_id=' + value.product_id + '>' + value.product_name + '</td>' +
                                '<td>' + value.product_description + '</td>' +
                                '<td>' + value.unit_price + '</td>' +
                                '<td>' + value.order_quantity + '</td>' +
                                '<td>' + Number(value.order_quantity) * Number(value.unit_price) + '</td>' +
                                '</tr>'
                            )
                            total_cost += Number(value.unit_price) * Number(value.order_quantity)
                        })
                        $(".calc.amount-available").html(
                            "<span>Amount Available(wallet):</span><span class='amount'>" + amount_available + "</span>"
                        )

                        $(".calc.total").html(
                            "<span>Total Cost:</span><span class='amount'>" + total_cost + "</span>"
                        )
                        balance = (Number(amount_available) - Number(total_cost))
                        if (balance >= 0) {
                            $(".calc.balance").html(
                                "<span>Balance:</span><span class='amount'>" + balance + "</span>"
                            )
                        } else {
                            $(".calc.balance").html(
                                "<span>Balance:</span><span class='amount'>" + 0 + "</span>"
                            )
                        }

                    } else {
                        // console.log(response.cart_items.length)
                        $('.no-items.checkout-info').css('display', 'block');
                        $('.calc').css('display', 'none')
                        $('#checkout-btn').css('display', 'none');
                    }
                }
            })
        }

        function Wallet() {

            $.ajax({
                method: 'post',
                url: "<?php echo base_url('Items/Wallet') ?>",
                data: {
                    customer_id: $("#customerid").val()
                },
                success: function(response) {}
            })

            if (bal == null) {
                return 0;
            } else {
                return bal['amount_available'];
            }

        }
    })
</script>