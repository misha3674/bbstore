
function basketShow(){
  $('#modal-basket').modal('show');
  // read from session
  $.ajax({
    type: 'GET',
    url: 'readsession.php',
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
        url: 'removeitem.php',
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
        url: 'checkout.php',
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
      url: 'savesession.php',
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
      url: 'countitem.php',
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

    $(".scroll-advice").click(function() {
      $('html, body').animate({
          scrollTop: $("#advice").offset().top
      }, 500);
    });

    api = $("#gallery").unitegallery({
      tiles_type:"justified"
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
        url: 'consult.php',
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