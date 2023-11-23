/*---função para o hambúrguer---*/
function menuShow() {
    let menuMobile = document.querySelector('.mobile-menu');
    if (menuMobile.classList.contains('open')) {
        menuMobile.classList.remove('open');
        document.querySelector('.icon');    
    } else {
        menuMobile.classList.add('open');
        document.querySelector('.icon');
    }
}
/*---função para o hambúrguer---*/


/*---função do carrossel---*/
var radio = document.querySelector('.manual-btn');
var count = 1;

document.getElementById('radio1').checked = true;

setInterval(() => {
    proximaImg()
}, 5000);

function proximaImg() {
    count++;

    if (count > 3) {
        count = 1;
    }

    document.getElementById('radio' + count).checked = true;

}
/*---função do carrossel---*/


/*------função do carrossel comunidade------*/
$(document).ready(function(){
    $('.customer-logos').slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2500,
        arrows: false,
        dots: false,
        pauseOnHover: false,
        responsive: [{
            breakpoint: 760,
            settings: {
                slidesToShow: 3
            }
        }, {
            breakpoint: 520,
            settings: {
                slidesToShow: 2
            }
        }]
    });
});
/*------função do carrossel comunidade------*/
