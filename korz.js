async function plus(idtovar, userid) {
    let data = {
        idtovar: idtovar,
        userid: userid
    };

    let response = await fetch('./php/plus.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json;charset=utf-8'
        },
        body: JSON.stringify(data)
    });
    location.reload();
}
async function minus(idtovar, userid,kol) {
    let data = {
        idtovar: idtovar,
        userid: userid,
        kol: kol
    };

    let response = await fetch('./php/minus.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json;charset=utf-8'
        },
        body: JSON.stringify(data)
    });
    location.reload();
}
document.addEventListener('DOMContentLoaded', function() {
    function calculateTotalPrice() {
        var items = document.querySelectorAll('.tovar_info_korz');
        var totalPrice = 0;
        items.forEach(function(item) {
            var priceElement = item.querySelector('#price');
            var quantityElement = item.querySelector('.buttonkorz p');
            if (priceElement && quantityElement) {
                var price = parseFloat(priceElement.textContent.replace('Цена: ', ''));
                var quantity = parseInt(quantityElement.textContent);
                totalPrice += price * quantity;
            }
        });
        var allPriceElement = document.getElementById('allprice');
        if (allPriceElement) {
            allPriceElement.textContent = 'Итоговая цена: ' + totalPrice.toFixed(2) + ' руб.';
        }
    }
    calculateTotalPrice();
});
