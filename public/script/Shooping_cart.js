var sl = 0;
var remove_cart = document.getElementsByClassName("header__cart-item-remove");
for (var i = 0; i < remove_cart.length; i++) {
    var button = remove_cart[i]
    button.addEventListener("click", function() {
        var button_remove = event.target
        button_remove.parentElement.parentElement.remove()
        updatecart();
    }
    )
}
function gg() {
    sl--
    document.getElementById('header__cart-notice').value=sl;
    
}

// update cart 
function updatecart() {
    var cart_item = document.getElementsByClassName("header__cart-list-item")[0];
    var cart_rows = cart_item.getElementsByClassName("header__cart-item-info");
    var total = 0;
    for (var i = 0; i < cart_rows.length; i++) {
        var cart_row = cart_rows[i]
        var price_item = cart_item.getElementsByClassName("header__cart-item-price")[0]
        var quantity_item = cart_row.getElementsByClassName("cart-quantity-input")[0]
        var price =parseFloat(price_item.innerText) // chuyển một chuổi string sang number để tính tổng tiền.
        var quantity = quantity_item.value // lấy giá trị trong thẻ input
        total = total + (price * quantity)
        total = Math.round(total * 100 + Number.EPSILON) / 100 +'0.000đ'
    }
    document.getElementsByClassName("cart-total-price")[0].innerText = total 
}

// thay đổi số lượng sản phẩm
var quantity_input = document.getElementsByClassName("cart-quantity-input");
for (var i = 0; i < quantity_input.length; i++) {
    var input = quantity_input[i];
    input.addEventListener("change", function(event) {
        var input = event.target
        if (isNaN(input.value) || input.value <= 0) {
            input.value = 1;
        }
        updatecart()
    })
}

var add_cart = document.getElementsByClassName("home-product-item__btn");
for (var i = 0; i < add_cart.length; i++) {
    var add = add_cart[i];
    add.addEventListener("click", function(event) {
        var button = event.target;
        var product = button.parentElement.parentElement;
        var link = product.getElementsByClassName('home-product-item')[0]
        var img = product.getElementsByClassName("img__src")[0].src
        var title = product.getElementsByClassName("home-product-item__name")[0].innerText
        var description = product.getElementsByClassName("home-product-item__origin-name")[0].innerText
        var price = product.getElementsByClassName("home-product-item__price-current")[0].innerText
        addItemToCart(link,title, price, img, description)
        updatecart()
    })
}

function addItemToCart(link,title, price, img, description) {
    sl++;
    document.getElementById('header__cart-notice').value=sl;
    var cartRow = document.createElement('li')
    cartRow.classList.add('header__cart-item-info')
    var cartItems = document.getElementsByClassName('header__cart-list-item')[0]
    var carttt = cartItems.getElementsByClassName('header__cart-item-name')
    for (var i = 0; i < carttt.length; i++) {
        if (carttt[i].innerText == title) {
            sl--;
    document.getElementById('header__cart-notice').value=sl;
            alert('Sản phẩm đã có trong giỏ hàng');
            return ;
        }
    }
    var cartRowContents = `
    <a class="header__cart-item-link-href" href="${link}"><div class="header__cart-item-head ">
    <img src="${img}" alt="myphamohui " class="header__cart-img "></a>
    <a class="header__cart-item-link-href" href="${link}"><span class="header__cart-item-name ">${title}</span></a>
        <div class="header__cart-item-price-wrap ">
            <span class="header__cart-item-price ">${price}</span>
            <span  class="header__cart-item-multiply">x</span>
            <span class="cart-quantity cart-column ">
                <input class="cart-quantity-input" type="number" value="1">
            </span>
        </div>
    </div>
    <div class="header__cart-item-body ">
        <span class="header__cart-item-description ">${description}</span>
        <span onclick="gg()" class="header__cart-item-remove ">Xóa</span>
    </div>`
    cartRow.innerHTML = cartRowContents
    cartItems.append(cartRow)
    cartRow.getElementsByClassName('header__cart-item-remove')[0].addEventListener('click', function() {
        var button_remove = event.target
        button_remove.parentElement.parentElement.remove()
        updatecart()
    })
    cartRow.getElementsByClassName('cart-quantity-input')[0].addEventListener('change', function(event) {
        var input = event.target
        if (isNaN(input.value) || input.value <= 0) {
            input.value = 1;
        }
        updatecart()
    })
}
function tt () {
    alert('Chúc mừng bạn thanh toán thành công')
}