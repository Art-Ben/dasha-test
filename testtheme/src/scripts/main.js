/**
 * set a really device height ( vh in css)
 */
let vh = window.innerHeight * 0.01;
document.documentElement.style.setProperty('--vh', `${vh}px`);

window.addEventListener('resize', () => {
  let vh = window.innerHeight * 0.01;
  document.documentElement.style.setProperty('--vh', `${vh}px`);
});

jQuery(document).ready(function ($) {
  // load more posts ajax
  jQuery('.ajax_load_more_posts').click(function (e) {
    var button = jQuery(this),
      data = {
        'action': 'loadmore_posts',
        'query': ajax_posts_object.posts,
        'page': ajax_posts_object.current_page
      };

    if (button.hasClass('disable')) {
      return false;
    } else {
      $.ajax({
        url: ajax_posts_object.ajaxurl,
        data: data,
        type: 'POST',
        beforeSend: function (xhr) {
          button.addClass('loading');
        },
        success: function (data) {
          if (data) {

            setTimeout(() => {
              button.removeClass('loading').parent().before(data);
            }, 1000);

            ajax_posts_object.current_page++;

            if (ajax_posts_object.current_page == ajax_posts_object.max_page) {
              button.addClass('disable');
            }
          } else {
            button.addClass('disable');
          }
        }
      });
    }
  });


  $('.mobileMenu__close, .cst-header__mobileBurger').click(function(e){
    $('.mobileMenu').toggleClass('active');
  });
})