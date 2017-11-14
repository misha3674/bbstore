
function basketShow(){
  $('#modal-basket').modal('show');
  // read from session
  $.ajax({
    type: 'GET',
    url: '/cart/getBack',
    data: '',
    success: function(data){
      $('#list-order').html(data);
    }
  });
}
function Cart(){

}
Cart.prototype.remove = function(id){
  $.ajax({
        type: 'GET',
        url: '/cart/removeItem',
        data: {"id": id},
        success: function(data){
          $('#count-offer').html(data);
          window.basketShow();
        }
      });
}

Cart.prototype.submit = function(){
  var name = $('[name="namechekout"]').val(), 
      phone = $('[name="phonechekout"]').val(),
      //regExpName= /^[Є-ЇІЙa-zа-я'` ]{5,40}$/iu,
      regExpPhone= /^((\d|\+)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$/u;

  if(name.length<3)
  {
    $('[name="namechekout"]').addClass('alert-danger');
    return 0;  
  }
  

  if(!regExpPhone.test(phone))
  {
      $('[name="phonechekout"]').addClass('alert-danger');
      return 0;
  }
 
  
  $('#modal-basket').modal('hide');

  $.ajax({
        type: 'POST',
        url: '/cart/checkout',
        data: {
                "phone": phone,
                "name": name
              },
        success: function(data){
          $('[name="namechekout"]').val("");
          $('[name="phonechekout"]').val("");
          $('#modal-thanks .modal-body').html(data);
          $('#modal-thanks').modal('show');
          $('#count-offer').html(0);
        }
      });
}
Cart.prototype.add = function(name,price){
    $.ajax({
      type: 'GET',
      url: '/cart/addItem',
      data: {
        name: name,
        price: price,
        qty: "1"
      },
      success: function(data){
        $('#count-offer').html(data);
        basketShow();
      }
    });
}

var cart = new Cart();

$(document).ready(function(){

    $.ajax({
      type: 'GET',
      url: '/cart/countitem',
      data: "",
      success: function(data){
        $('#count-offer').html(data);
      }
    });

    $('.reviews-items').slick({
      infinite: true,
      lazyLoad: 'ondemand',
      slidesToShow: 3,
      centerPadding: '25px',
      slidesToScroll: 1,
      responsive: [
        {
          breakpoint: 760,
          settings: {
            slidesToShow: 2,
          }
        }
      ]
    });

    $('#slider-popular').slick({
      infinite: true,
      slidesToShow: 3,
      slidesToScroll: 3,
      dots: true,
      autoplay: true,
      arrows: false,
      adaptiveHeight: true,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2,
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
          }
        }
      ]
    });

    window.onscroll = function() {scrollFunction()};
    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            document.getElementById("scrollup").style.display = "block";
        } else {
            document.getElementById("scrollup").style.display = "none";
        }
    }
    $('#scrollup').on('click', function(e){
        e.stopPropagation();
        document.body.scrollTop = 0; // For Chrome, Safari and Opera 
        document.documentElement.scrollTop = 0; // For IE and Firefox
    });

    $('#shop-basket').on('click', function(e){
      e.stopPropagation();
      basketShow();
    });
    
    $('#modal-basket').on('hidden.bs.modal',function(){
      $('#list-order').html('<tr><td><h1 class="text-center"><i class="fa fa-spinner fa-spin fa-2x fa-fw" aria-hidden="true"></i></h1></td></tr>');
    });

    $('.calladvice').on('click',function(e){
      
      e.preventDefault();
      e.stopPropagation();
      var el = $(this).parent().prev().find('input[type=text]'), 
          regExp = /^((\d|\+)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$/u,
          phone;
      phone = el.val();

      if( !regExp.test(phone) ){
        el.addClass('alert-danger');
        return 0;
      }

      $.ajax({
        type: 'POST',
        url: '/cart/consult',
        data: "phone="+phone,
        beforeSend: function(){
          $(e).html('<i class="fa fa-spinner fa-pulse fa-3x fa-fw">');
        },
        success: function(data){
          $('#modal-thanks .modal-body').html(data);
          $('#modal-thanks').modal('show');
        },
        complete: function(){
          $(e).html('Оставить заявку');
          el.val("");
        }
      });
    });

    $('input[type="text"]').focusout(function(e){
      $(this).removeClass('alert-danger');
    });


    $('.nav-subitem').on('click', function(e){
       $(this).next().fadeToggle( "fast", "linear" );
    });

  }); // end document ready

// timer

function getTimeRemaining(endtime) {
  var t = Date.parse(endtime) - Date.parse(new Date());
  var seconds = Math.floor((t / 1000) % 60);
  var minutes = Math.floor((t / 1000 / 60) % 60);
  var hours = Math.floor((t / (1000 * 60 * 60)) % 24);
  var days = Math.floor(t / (1000 * 60 * 60 * 24));
  return {
    'total': t,
    'days': days,
    'hours': hours,
    'minutes': minutes,
    'seconds': seconds
  };
}

function initializeClock(id, endtime) {
  var clock = document.getElementById(id);
  var daysSpan = clock.querySelector('.days');
  var hoursSpan = clock.querySelector('.hours');
  var minutesSpan = clock.querySelector('.minutes');
  var secondsSpan = clock.querySelector('.seconds');

  function updateClock() {
    var t = getTimeRemaining(endtime);

    daysSpan.innerHTML = t.days;
    hoursSpan.innerHTML = ('0' + t.hours).slice(-2);
    minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);
    secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);

    if (t.total <= 0) {
      clearInterval(timeinterval);
    }
  }

  updateClock();
  var timeinterval = setInterval(updateClock, 1000);
}

var deadline = new Date(Date.parse(new Date()) + 15 * 24 * 60 * 60 * 1000);
initializeClock('clockdiv', deadline);