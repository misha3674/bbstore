function Modal(){
  // var modal = $('#modal');
}
Modal.prototype.filter = function() {
  // console.log(modal);
  $.ajax({
    url: '/modal/filter',
    success: function(data){
      $('#modal .modal-content').html(data);
      $('#modal').modal('show');
    }
  });
}
var modal = new Modal();

function basketShow(){
  $('#modal-basket').modal('show');
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
          $('#modal .modal-content').html(data);
          $('#modal').modal('show');
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
      autoplay: true,
      slidesToScroll: 1,
      responsive: [
        {
          breakpoint: 760,
          settings: {
            slidesToShow: 2,
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
    var btnFilter = $('.filter > a'),
      header = $('header');
    window.onscroll = function() {scrollFunction()};
    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            document.getElementById("scrollup").style.display = "block";
        } else {
            document.getElementById("scrollup").style.display = "none";
        }

        if(document.body.scrollTop > header.height() || document.documentElement.scrollTop > header.height()) {
          btnFilter.css('position', 'fixed')
            .css('top', '25px');
        } else {
          btnFilter.css('position', 'static');
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

    $(document).on('click', '#filter-apply', function(e){
      e.preventDefault();
      var data = [];
      $('.filter-option:checked').each(function(index){
        data.push(this.value);
      });
      $.ajax({
        type: 'GET',
        url: '/catalog',
        data: {
          data: JSON.stringify(data)
        },
        beforeSend: function(){
          $(e).html('<i class="fa fa-spinner fa-pulse fa-3x fa-fw">');
        },
        success: function(data){
          $('#content').html(data);
          $('#modal').modal('hide');
          $('#scrollup').click();
        },
        complete: function(){
          $(e).html('Показати');
        }
      });
    });
  }); // end document ready
