// Animating the carousel's captions
var carouselContainer = $('.carousel');
var slideInterval = 5000;

function toggleH(){
    $('.toggleHeading').hide()
    var caption = carouselContainer.find('.active').find('.toggleHeading').addClass('animated flipInX').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend',
        function (){
            $(this).removeClass('animated flipInX')});
    caption.slideToggle();
}

function toggleC(){
    $('.toggleCaption').hide()
    var caption = carouselContainer.find('.active').find('.toggleCaption').addClass('animated fadeInUp').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend',
        function (){
            $(this).removeClass('animated fadeInUp')
        });
    caption.slideToggle();
}
carouselContainer.carousel({
    interval: slideInterval, cycle: true, pause: "hover"})
    .on('slide.bs.carousel slid.bs.carousel', toggleH).trigger('slide.bs.carousel')
    .on('slide.bs.carousel slid.bs.carousel', toggleC).trigger('slide.bs.carousel');
