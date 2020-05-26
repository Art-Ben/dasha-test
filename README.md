# Привет, всем кто будет это читать :)
# Затраченное время 
Скрин называется SpendTime.jpeg. Скажу честно как-то сделать это за 2 часа не кажется особо реальным с учётом вёртски футера / хедера / заполнения 50 + записями и прчими мелочами. Тем более маккеты сайтов на предложенном ресурсе в PSD их так долго резать ещё на картинки, почему не фигма :(

# Выбранный шаблон для вёрстки футер / хедера
https://www.graphberry.com/item/bondi-psd-landing-page - на вкус и цвет все шаблоны разные ))) 

# Каким образом я использовал Ajax для постов: 
1) в шаблоне куда выводятся все записи я вставил вот такой код (смотри ниже), который получает глобальную переменную текущего запроса. После чего я делаю проверку на то, что страниц в пагинации (10 постов на одной) больше чем 1 (то есть больше 10 записей суммарно), то показываю кнопку загрузки постов
```sh
global $wp_query;
    if (  $wp_query->max_num_pages > 1 ) {
    echo '<div class="load_more_btn_cont"><a href="javascript:void(0);" rel="nofollow" class="ajax_load_more_posts">Load more posts</a></div>';
}
```
2) После это нужно написать код для обработчика кнопки и привязать (локализовать) даные wp запроса (наш wp запрос с записями) на странцие к нашему скрипту, так как этот код у меня будет в основном файле скриптов , то для этого локализуем основной файл. Здесь будет УРЛ куда будеn ссылаться наш ajax по сути некий ендпоинт, текущая страница пагинации, номер максимальной страницы пагинации, данные текущих постов в wp запросе. 
```sh
global $wp_query;
        wp_register_script('main-js', get_template_directory_uri().'/dist/scripts/main.min.js', array(), null, true);
        
        wp_localize_script( 'main-js', 'ajax_posts_object', array(
            'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php', 
            'posts' => json_encode( $wp_query->query_vars ),
            'current_page' => get_query_var( 'paged' ) ? get_query_var('paged') : 1,
            'max_page' => $wp_query->max_num_pages
        ) );

        wp_enqueue_script('main-js');
```
3) Далее пишим джс код для обработчика клика по кнопке. Аякс запрос будет ссылаться на наш ендпоинт и использовать наш обработчик яакс запроса (экшен) , который будет описан в 4 пунтке, также в даные для запроса необходимо передать текущею страницу пагинации она понадобится нам в 4 пункте для возврата записей со следующей страницы пагинации. После успешной обработки запроса мы просто вставим содержимое нашего ответа перед кнопкой, в случае неудачного ajax запроса я не выводил никаких ошибок , обычно можно это сделать при помощи error: function(){} и передать стандартный обработчки ошибки и вывести в консоль.
```sh
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
```
4) Теперь нужно написать обработчки для wp_ajax_. В нём мы должны увеличть страницу пагинации на еденицу , взять только опубликованные записи, мы можем добавить какие-то ещё параметры страндартного запроса , но этого в здании нету. Далее просто вернём список записей с помощью query_posts с нашими аргументами запроса, потом пройдём циклом по полученным записям и офрмим их с помощью нашего шаблона вывода. Также следует не забыть объявить ajax обработчки доступным и для неавторизированых пользователей.  
```sh
if( !function_exists('ajax_load_more_posts')) {
	function ajax_load_more_posts(){
	
		$args = json_decode( stripslashes( $_POST['query'] ), true );
		$args['paged'] = $_POST['page'] + 1;
		$args['post_status'] = 'publish';
	
		query_posts( $args );
	
		if( have_posts() ) {

			while( have_posts() ) {
				the_post();
	
				get_template_part( 'template-parts/content', 'blog-mini' );

			}
		}
		die(); 
	}
} 
 ```
add_action('wp_ajax_loadmore_posts', 'ajax_load_more_posts');
add_action('wp_ajax_nopriv_loadmore_posts', 'ajax_load_more_posts');