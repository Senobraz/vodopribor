function init_catalog_element_front(container)
{
    $(container).find('.add-item-to-basket').click(function(e) {
        BX.showWait();
        var $id = $(this).attr('data-num');
        var $el = $(this).attr('data-num');
        var $q = $(container).find('.quantity-item').val();
        $.post("/ajax/basket.php", {p: $id, q: $q, action: "add_to_basket"}, function(res) {
            $('.ajax-basket-line').html(res.basket_line);
            $('.ajax-cart-fixed-products').text(res.basket.NUM_PRODUCTS);
            $('.ajax-cart-fixed-price').text(res.basket.TOTAL_PRICE);
            $('.added-in').html(res.popup);
            show_popup();
            BX.closeWait();
        }, 'json')
        e.preventDefault();
    })   
    
    $(container).find('.offer-item').change(function(){	
        BX.showWait();
        $(container).find('.quantity-item').val(1);	
        var $available = $(container).find('.offer-item:checked').attr('data-available');
        $(container).find('.quantity-item').attr('data-max', $available);
        $(container).find('.quantity-item').spinedit('setMaximum', $available);
        BX.closeWait();
    });
    $(container).find('.offer-item, .quantity-offer-item').change(function(){
        BX.showWait();
        var $id = $(container).find('.offer-item:checked').attr('data-num');		
        var $q = $(container).find('.quantity-item').val();
      
        $(container).find('.add-item-to-basket').attr('data-num', $id);
        $.post('/ajax/pricebase.php', { PRODUCT: $id, Q: $q}, function(data) {
            $(container).find('.ajax-item-price').html(data);
            BX.closeWait();
        });		
    });	
	
}

BX.ready(function() {
    init_catalog_element_front('.catalog-element');    
});
