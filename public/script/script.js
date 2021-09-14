let perPage = 20;
let currentPage = 1;
let idPage = 1;
let start = 0;
let end = perPage;
const product = [
    { id: "/dssp/sp1.html", image: "https://img.abaha.vn/photos/resized/320x/83-1587707764-myphamohui-lgvina.png", title: "Set phấn phủ Ohui Ultimate Brightening Varnishing Pact", price_old: "1.200.000đ", price_current: "1.080.000đ", item_sold: " 8 đã bán", brand: "Su:m37", origin_name:"Hàn Quốc", like:"Yêu thích", sale_off_percent: "10%", sale_off_label: "GIẢM",ngaydang:"2020-2-1" },
    { id: "/dssp/sp2.html", image: "https://img.abaha.vn/photos/resized/320x/83-1586781803-myphamohui-lgvina.png", title: "Set kem mắt tái sinh Ohui The First Geniture Eye Cream Edition Grand Blue", price_old: "4.600.000đ", price_current: "4.140.000đ", item_sold: "18 đã bán", brand: "Su:m37", origin_name:"Hàn Quốc", like:"Yêu thích", sale_off_percent: "10%", sale_off_label: "GIẢM",ngaydang:"2020-1-5" },
    { id: "/dssp/sp3.html", image: "https://img.abaha.vn/photos/resized/320x/83-1580888419-myphamohui-lgvina.png", title: "Bộ kem đặc trị vùng mắt Ohui Age Recovery Wrinkle Cut Serum.", price_old: "2.300.000đ", price_current: "2.070.000đ", item_sold: "12 đã bán", brand: "Su:m37", origin_name:"Hàn Quốc", like:"Yêu thích", sale_off_percent: "10%", sale_off_label: "GIẢM",ngaydang:"2020-2-29" },
    { id: "/dssp/sp4.html", image: "https://img.abaha.vn/photos/resized/320x/83-1586336630-myphamohui-lgvina.png", title: " Set sữa rửa mặt  Ohui Prime Gel Cleanser", price_old: "1.160.000đ", price_current: "1.040.00đ", item_sold: " 9 đã bán", brand: "Su:m37", origin_name:"Hàn Quốc", like:"Yêu thích", sale_off_percent: "10%", sale_off_label: "GIẢM",ngaydang:"2020-7-9" },
    { id: "/dssp/sp5.html", image: "https://img.abaha.vn/photos/resized/320x/83-1576146597-myphamohui-lgvina.png", title: "Set tinh chất  Ohui xanh Prime Advancer Ampoule Serum phiên bản 90ml", price_old: "3.300.000đ", price_current: "2.970.000đ", item_sold: "53 đã bán", brand: "Su:m37", origin_name:"Hàn Quốc", like:"Yêu thích", sale_off_percent: "10%", sale_off_label: "GIẢM",ngaydang:"2020-1-27" },
    { id: "/dssp/sp6.html", image: "https://img.abaha.vn/photos/resized/320x/83-1575812225-myphamohui-lgvina.png", title: "Set Ohui chống lão hóa Age recovery", price_old: "3.100.000đ", price_current: "2.710.000đ", item_sold: "43 đã bán", brand: "Su:m37", origin_name:"Hàn Quốc", like:"Yêu thích", sale_off_percent: "10%", sale_off_label: "GIẢM",ngaydang:"2020-9-1" },
    { id: "/dssp/sp7.html", image: "https://img.abaha.vn/photos/resized/320x/83-1575704558-myphamohui-lgvina.png", title: "Set tinh chất  Ohui Age Recovery", price_old: "3.300.000đ", price_current: "2.970.000đ", item_sold: "71 đã bán", brand: "Su:m37", origin_name:"Hàn Quốc", like:"Yêu thích", sale_off_percent: "10%", sale_off_label: "GIẢM",ngaydang:"2020-4-19" },
    { id: "/dssp/sp8.html", image: "https://img.abaha.vn/photos/resized/320x/83-1575351507-myphamohui-lgvina.png", title: "Set phấn nước cushion Ohui hoa hồng 15g x 3 ( 3 lõi )", price_old: "2.700.000đ", price_current: "2.520.000đ", item_sold: "82 đã bán", brand: "Su:m37", origin_name:"Hàn Quốc", like:"Yêu thích", sale_off_percent: "10%", sale_off_label: "GIẢM",ngaydang:"2020-8-20" },
    { id: "/dssp/sp9.html", image: "https://img.abaha.vn/photos/resized/320x/83-1574870992-myphamohui-lgvina.png", title: "Tinh chất cô đặc chuyên phục hồi da khô và da nhờn thiếu nước Ampoule 777", price_old: "1.500.000đ", price_current: "1.350.000đ", item_sold: "67 đã bán", brand: "Su:m37", origin_name:"Hàn Quốc", like:"Yêu thích", sale_off_percent: "10%", sale_off_label: "GIẢM",ngaydang:"2020-10-1" },
    { id: "/dssp/sp10.html", image: "https://img.abaha.vn/photos/resized/320x/83-1574868315-myphamohui-lgvina.png", title: "Cushion Ohui thefirst ampoule advanced", price_old: "4.200.000đ", price_current: "3.780.000đ", item_sold: "83 đã bán", brand: "Su:m37", origin_name:"Hàn Quốc", like:"Yêu thích", sale_off_percent: "10%", sale_off_label: "GIẢM",ngaydang:"2010-5-5" },
    { id: "/dssp/sp11.html", image: "https://img.abaha.vn/photos/resized/320x/73-1573637136-myohui.png", title: "Son dưỡng môi với màu sắc trong suốt Ohui Lip Tint Balm", price_old: "8.700.000đ", price_current: "7.830.000đ", item_sold: "69 đã bán", brand: "Su:m37", origin_name:"Hàn Quốc", like:"Yêu thích", sale_off_percent: "10%", sale_off_label: "GIẢM",ngaydang:"2020-3-14" },
    { id: "/dssp/sp12.html", image: "https://img.abaha.vn/photos/resized/320x/73-1573640831-myohui.png", title: "Son lì Ohui Rouge Real Lipstick ", price_old: "1.400.000đ", price_current: "1.260.000đ", item_sold: "58 đã bán", brand: "Su:m37", origin_name:"Hàn Quốc", like:"Yêu thích", sale_off_percent: "10%", sale_off_label: "GIẢM",ngaydang:"2020-6-15" },
    { id: "/dssp/sp13.html", image: "https://img.abaha.vn/photos/resized/320x/83-1586846437-myphamohui-lgvina.png", title: "Son Ohui The First Geniture Lipstick ", price_old: "2.100.000đ", price_current: "1.890.000đ", item_sold: "65 đã bán", brand: "Su:m37", origin_name:"Hàn Quốc", like:"Yêu thích", sale_off_percent: "10%", sale_off_label: "GIẢM",ngaydang:"2020-4-12" },
    { id: "/dssp/sp14.html", image: "https://img.abaha.vn/photos/resized/320x/73-1573207057-myohui.png", title: "Kem Chống Nắng  nâng tông da Ohui DAY SHIELD PERFECT SUN RADIANCE ", price_old: "1.300.000đ", price_current: "1.170.000đ", item_sold: "76 đã bán", brand: "Su:m37", origin_name:"Hàn Quốc", like:"Yêu thích", sale_off_percent: "10%", sale_off_label: "GIẢM",ngaydang:"2020-4-18" },
    { id: "/dssp/sp15.html", image: "https://img.abaha.vn/photos/resized/320x/73-1573210435-myohui.png", title: " Kem chống nắng Ohui dành cho da bị sạm đen Day Shield Perfect Sun Black SPF50+", price_old: "1.200.000đ", price_current: "1.080.00đ", item_sold: "26 đã bán", brand: "Su:m37", origin_name:"Hàn Quốc", like:"Yêu thích", sale_off_percent: "10%", sale_off_label: "GIẢM",ngaydang:"2020-5-12" },
    { id: "/dssp/sp16.html", image: "https://img.abaha.vn/photos/resized/320x/73-1572863519-myohui.png", title: "Nước Hoa Hồng Ohui Prime Advancer Skin Softener 150ml", price_old: "8.300.000đ", price_current: "7.470.000đ", item_sold: "64 đã bán", brand: "Su:m37", origin_name:"Hàn Quốc", like:"Yêu thích", sale_off_percent: "10%", sale_off_label: "GIẢM",ngaydang:"2020-6-11" },
    { id: "/dssp/sp17.html", image: "https://img.abaha.vn/photos/resized/320x/83-1576213241-myphamohui-lgvina.png", title: "Set dưỡng trắng Ohui Extreme White", price_old: "1.200.000đ", price_current: "1.080.00đ", item_sold: "22 đã bán", brand: "Su:m37", origin_name:"Hàn Quốc", like:"Yêu thích", sale_off_percent: "10%", sale_off_label: "GIẢM",ngaydang:"2020-7-22" },
    { id: "/dssp/sp18.html", image: "https://img.abaha.vn/photos/resized/320x/83-1574919130-myphamohui-lgvina.png", title: "Set nước sữa tái sinh Ohui thefirst ", price_old: "2.000.000đ", price_current: "1.800.000đ", item_sold: "38 đã bán", brand: "Su:m37", origin_name:"Hàn Quốc", like:"Yêu thích", sale_off_percent: "10%", sale_off_label: "GIẢM",ngaydang:"2020-3-19" },
    { id: "/dssp/sp19.html", image: "https://img.abaha.vn/photos/resized/320x/83-1574763221-myphamohui-lgvina.png", title: "Set Tinh chất Vàng 24k Ohui The first tăng Gấp Đôi Thể Tích Bản Limited ", price_old: "2.500.000đ", price_current: "2.250.000đ", item_sold: "46 đã bán", brand: "Su:m37", origin_name:"Hàn Quốc", like:"Yêu thích", sale_off_percent: "10%", sale_off_label: "GIẢM",ngaydang:"2020-6-6" },
    { id: "/dssp/sp20.html", image: "https://img.abaha.vn/photos/resized/320x/83-1586773435-myphamohui-lgvina.png", title: "Set sữa rửa mặt Ohui Thefirst tái sinh", price_old: "3.000.000đ", price_current: "2.700.000đ", item_sold: "14 đã bán", brand: "Su:m37", origin_name:"Hàn Quốc", like:"Yêu thích", sale_off_percent: "10%", sale_off_label: "GIẢM",ngaydang:"2020-6-1" },
    { id: "/dssp/sp21.html", image: "https://img.abaha.vn/photos/resized/320x/73-1572945575-myohui.png", title: "Set Phấn nước  OHUI X Jane Packer ", price_old: "4.300.000đ", price_current: "3.870.000đ", item_sold: "78 đã bán", brand: "Su:m37", origin_name:"Hàn Quốc", like:"Yêu thích", sale_off_percent: "10%", sale_off_label: "GIẢM",ngaydang:"2020-7-7" },
    { id: "/dssp/sp22.html", image: "https://img.abaha.vn/photos/resized/320x/83-1574768095-myphamohui-lgvina.png", title: "Sữa rửa mặt dưỡng trắng Ohui Extreme White Foam Snow vitamin", price_old: "8.100.000đ", price_current: "7.290.000đ", item_sold: "49 đã bán", brand: "Su:m37", origin_name:"Hàn Quốc", like:"Yêu thích", sale_off_percent: "10%", sale_off_label: "GIẢM",ngaydang:"2020-4-23" },
    { id: "/dssp/sp23.html", image: "https://img.abaha.vn/photos/resized/320x/73-1572602872-myohui.png", title: "Nước hoa hồng tái sinh Ohui Thefirstl", price_old: "2.2000.000đ", price_current: "1.980.000đ", item_sold: "51 đã bán", brand: "Su:m37", origin_name:"Hàn Quốc", like:"Yêu thích", sale_off_percent: "10%", sale_off_label: "GIẢM",ngaydang:"2020-10-5" },
    { id: "/dssp/sp24.html", image: "https://img.abaha.vn/photos/resized/320x/73-1573635248-myohui.png", title: "Phấn nén dưỡng trắng chống lão hóa Ultimate Brightening Varnishing Pact", price_old: "2.600.000đ", price_current: "2.340.000đ", item_sold: "72 đã bán", brand: "Su:m37", origin_name:"Hàn Quốc", like:"Yêu thích", sale_off_percent: "10%", sale_off_label: "GIẢM",ngaydang:"2020-1-16" },
    { id: "/dssp/sp25.html", image: "https://img.abaha.vn/photos/resized/320x/73-1573185322-myohui.png", title: "Phấn nước dành cho da thường Ohui  Cushion Metal", price_old: "1.900.000đ", price_current: "1.710.000đ", item_sold: "20 đã bán", brand: "Su:m37", origin_name:"Hàn Quốc", like:"Yêu thích", sale_off_percent: "10%", sale_off_label: "GIẢM",ngaydang:"2020-7-9" },
    { id: "/dssp/sp26.html", image: "https://img.abaha.vn/photos/resized/320x/73-1572600180-myohui.png", title: "Sữa rửa mặt tái sinh Ohui thefirst", price_old: "1.400.000đ", price_current: "1.260.000đ", item_sold: "14 đã bán", brand: "Su:m37", origin_name:"Hàn Quốc", like:"Yêu thích", sale_off_percent: "10%", sale_off_label: "GIẢM",ngaydang:"2020-9-13" },
    { id: "/dssp/sp27.html", image: "https://img.abaha.vn/photos/resized/320x/73-1574229479-myohui.png", title: "Kem dưỡng ẩm Prime Advancer Ampoule Capture Cream", price_old: "2.800.000đ", price_current: "2.520.000đ", item_sold: "56 đã bán", brand: "Su:m37", origin_name:"Hàn Quốc", like:"Yêu thích", sale_off_percent: "10%", sale_off_label: "GIẢM",ngaydang:"2020-4-1" },
    { id: "/dssp/sp28.html", image: "https://img.abaha.vn/photos/resized/320x/73-1572841983-myohui.png", title: "Sữa dưỡng trắng da Ohui Extreme White Emulsion Snow vitamin", price_old: "3.000.000đ", price_current: "2.700.000đ", item_sold: "45 đã bán", brand: "Su:m37", origin_name:"Hàn Quốc", like:"Yêu thích", sale_off_percent: "10%", sale_off_label: "GIẢM",ngaydang:"2020-4-1" },
    { id: "/dssp/sp29.html", image: "https://img.abaha.vn/photos/resized/320x/73-1573204263-myohui.png", title: "Kem dưỡng vùng mắt Ohui Age Recovery Eye Cream Baby Collagen", price_old: "3.900.000đ", price_current: "3.510.000đ", item_sold: "78 đã bán", brand: "Su:m37", origin_name:"Hàn Quốc", like:"Yêu thích", sale_off_percent: "10%", sale_off_label: "GIẢM",ngaydang:"2020-4-1" },
    { id: "/dssp/sp30.html", image: "https://img.abaha.vn/photos/resized/320x/73-1572847971-myohui.png", title: "Mặt nạ dưỡng trắng da Ohui Extreme White 3D Black Mask Snow vitamin", price_old: "5.500.000đ", price_current: "4.950.000đ", item_sold: "35 đã bán", brand: "Su:m37", origin_name:"Hàn Quốc", like:"Yêu thích", sale_off_percent: "10%", sale_off_label: "GIẢM",ngaydang:"2020-4-1" },
]
let productArr = [];
function highlightText() {
    const title = document.querySelectorAll('.home-product-item h4');
    title.forEach((title, index) => {
        let titleText = title.innerHTML;
        let indexOf = Number(titleText.toLocaleLowerCase().indexOf(searchText.value.toLocaleLowerCase()));
        let searchTextLength = searchText.value.length;
        titleText = titleText.substring(0, indexOf) + "<span class='highlight'>" + titleText.substring(indexOf, indexOf + searchTextLength) + "</span>" +
         titleText.substring(indexOf + searchTextLength, titleText.length);
        title.innerHTML = titleText;
        console.log(titleText);
    })
}
productArr = product;
const countTotalPage = document.querySelector('.total-page');
const countTotalProduct = document.querySelector('.total-item');
const totalPage = Math.ceil(product.length / perPage);
const searchText = document.querySelector('.header__search-input-wrap input');
const searchBtn = document.getElementById('search-btn');

function initRender(productAr, totalPages) {
    renderProduct(productAr);
    renderListPage(totalPages);
}
initRender(productArr, totalPage);


function getCurrentPage(currentPage) {
    start = (currentPage - 1) * perPage;
    end = currentPage * perPage;
    totalPages = Math.ceil(productArr.length / perPage);
}
searchBtn.addEventListener('click', () => {
    idPage = 1;
    productArr = [];
    product.forEach((item, index) => {
        if (item.title.toLocaleLowerCase().indexOf(searchText.value.toLocaleLowerCase()) != -1) {
            productArr.push(item);
        }
    });
    if (productArr.length === 0) {
        $('.no-result').css('display', 'block')
    } else {
        $('.no-result').css('display', 'none')
    }
    getCurrentPage(idPage);
    initRender(productArr, totalPages);
    changePage();
    if (perPage <= 1) {
        $('.btn-prev').addClass('btn-active');
        $('.btn-next').addClass('btn-active');
    } else {
        $('.btn-next').removeClass('btn-active');
    }
});

searchText.addEventListener("keyup", (event) => {
    if (event.keyCode === 13) {
        event.preventDefault();
        searchBtn.click();
    }
});


const btnNext = document.querySelector('.btn-next');
const btnPrev = document.querySelector('.btn-prev');
function renderProduct(product) {
   var html = '';
    const content = product.map((item, index) => {
        if (index >= start && index < end) {
            html += `<div id="product-item" class="col l-2-4 m-4 c-6">
            <a class="home-product-item" href="${item.id}">
                <div class="home-product-item__img">
                    <img class="img__src" src="${item.image}" alt=" ">
                </div>
                <h4 class="home-product-item__name">${item.title}</h4>
                <div class="home-product-item__price">
                    <span class="home-product-item__price-old">${item.price_old}</span>
                    <span class="home-product-item__price-current">${item.price_current}</span>
                </div>
                <div class="home-product-item__action">
                    <span class="home-product-item__like home-product-item__like--liked">
                        <i class="home-product-item__like-icon-empty far fa-heart"></i>
                        <i class="home-product-item__like-icon-fill fas fa-heart"></i>
                    </span>
                    <div class="home-product-item__rating">
                        <i class="home-product-item__star-gold fas fa-star"></i>
                        <i class="home-product-item__star-gold fas fa-star"></i>
                        <i class="home-product-item__star-gold fas fa-star"></i>
                        <i class="home-product-item__star-gold fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <span class="home-product-item__sold">${item.item_sold}</span>
                </div>
                <div class="home-product-item__origin">
                    <span class="home-product-item__brand">${item.brand}</span>
                    <sapn class="home-product-item__origin-name">${item.origin_name}</sapn>
                </div>
                <div class="home-product-item__favourite">
                    <i class="fas fa-check"></i>
                    <span>${item.like}</span>
                </div>
                <div class="home-product-item__sale-off">
                    <span class="home-product-item__sale-off-percent">${item.sale_off_percent}</span>
                    <span class="home-product-item__sale-off-label">${item.sale_off_label}</span>
                </div>
            </a>
            <div class="home-product-item__btn" >
                    <button type = "button" class="home-product-item__btn-add">Thêm vào giỏ hàng</button>
            </div>
        </div>`
        return html;
        }
    });
    document.getElementById('product').innerHTML=html;
    highlightText();
    
}

renderProduct(product);
renderListPage(totalPage);
function renderListPage(totalPage) {
    let html = '';
    html += `
    <li class="pagination-item pagination-item--active ">
        <a  class="pagination__link ">
            ${1}
        </a>
    </li>`;
    for (let i = 2; i <= totalPage; i++) {
        html += `
        <li class="pagination-item ">
            <a  class="pagination__link ">
                ${i}
            </a>
        </li>`;
    }
    document.getElementById('number-page').innerHTML = html;
}

function changePage() {
    const currentPages = document.querySelectorAll('.number-page li');
    for(let i = 0; i< currentPages.length; i++)
    {
        currentPages[i].addEventListener('click', () =>{
            let value = i + 1;
            currentPage = value;
            if (currentPage === 1) {
                $('.btn-prev').addClass('btn-active');
            }   
            else {
                $('.btn-prev').removeClass('btn-active');
            }
            if (currentPage === totalPage) {
                $('.btn-next').addClass('btn-active');
            }   
            else {
                $('.btn-next').removeClass('btn-active');
            }
            $('.number-page li').removeClass('pagination-item--active ');
            currentPages[i].classList.add('pagination-item--active') ;
            getCurrentPage(currentPage);
            renderProduct(productArr);
        })
    }
}
changePage();
    btnNext.addEventListener('click',()=>{
    currentPage++;
    
    if(currentPage>totalPage)
    {
        currentPage = totalPage;
    }
    if (currentPage === totalPage) {
        $('.btn-next').addClass('btn-active');
    }
    $('.btn-prev').removeClass('btn-active');
    $('.number-page li').removeClass('pagination-item--active');
    $(`.number-page li:eq(${currentPage - 1})`).addClass('pagination-item--active');
    getCurrentPage(currentPage);
    renderProduct(productArr);
})
btnPrev.addEventListener('click',()=>{
    currentPage--;
    if(currentPage<=1)
    {
        currentPage = 1;
    }
    if (currentPage === 1) {
        $('.btn-prev').addClass('btn-active');
    }
    $('.btn-next').removeClass('btn-active');
    $('.number-page li').removeClass('pagination-item--active');
    $(`.number-page li:eq(${currentPage - 1})`).addClass('pagination-item--active');
    getCurrentPage(currentPage);
    renderProduct(productArr);
})
function compareValues(key, order='asc') {
    return function(a, b) {
      if(!a.hasOwnProperty(key) || !b.hasOwnProperty(key)) {
          return 0; 
      }
    
      const varA = (typeof a[key] === 'string') ? 
        a[key].toUpperCase() : a[key];
      const varB = (typeof b[key] === 'string') ? 
        b[key].toUpperCase() : b[key];
    
      let comparison = 0;
      if (varA > varB) {
        comparison = 1;
      } else if (varA < varB) {
        comparison = -1;
      }
      return (
        (order == 'desc') ? (comparison * -1) : comparison
      );
    };
}
;










