<script>
    getWalletbalance()



    function getWalletbalance() {
        $.ajax({
            url: "<?php echo base_url('User/getWalletbalance') ?>",
            method: 'POST',
            data: {
                customer_id: $("#userid").val()
            },
            success: function(response) {
                if (response == null) {
                    $('#balance').html('Ksh 00.00')
                } else {
                    $('#balance').html("")
                    $('#balance').html(response.amount_available)

                }

            }
        })
    }
    $('#submit').click(function() {
        updateWalletbalance()
    });

    function updateWalletbalance() {
        data = {
            customer_id: $("#userid").val(),
            amount_available: parseInt($('#balance').html()) + parseInt($('#deposit_amount').val()),
        };
        $.ajax({
            method: 'post',
            url: "<?php echo base_url('User/updateWalletbalance') ?>",
            data: data,
            success: function(response) {
                getWalletbalance()
            }
        })

    }

    function clearCart() {
        data = {
            user_id: $("#customerid").val()
        };
        $.ajax({
            method: 'post',
            url: "<?php echo base_url('ProductHandler/clearCart') ?>",
            data: data,
            success: function(response) {
                // console.log(response);
            }

        })


    }
</script>