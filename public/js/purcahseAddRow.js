 
        $('form').on('click', '.addRow', function(){

            let $newRow = $('div.addd:first').clone();
            
            // $newRow.find('select.purchaseVendor').val('');
            $newRow.find('select.purchaseCat').val('');
            $newRow.find('select.productNameforpurchase').val('');
            $newRow.find('input.company_price').val('');
            $newRow.find('input.sell_price').val('');
            $newRow.find('input.mrp').val('');
            $newRow.find('input.quantity').val('');
            $newRow.find('input.sale_total').val('');

            $('.invoice_table').append($newRow);
        });

        // $(document).on("keyup change click", ".quantity", function() {
        //     jQuery('#oiHgu').removeClass('productNameforpurchase');  
        // });