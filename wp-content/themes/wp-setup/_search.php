<?php get_header(); ?>

<main>

  <?php
  $pageID = get_the_ID();
  global $query_string;
  $query_args = explode("&", $query_string);
  $args = array();

  foreach ($query_args as $key => $string) {
    $query_split = explode("=", $string);
    $args[$query_split[0]] = urldecode($query_split[1]);
  }

  $args['post_type'] = ['page', 'employee', 'download', 'neubau', 'news'];
  $args['posts_per_page'] = -1;
  $searchfields = [
    'text',
    'lead',
    'title',
    'name',
    'firstname',
    'lastname',
  ];

  $the_query = new WP_Query($args);
  $searchTerm = $args['s'];

  function remove_html_comments($content = '')
  {
    return (json_decode(
      str_replace(
        '},]',
        '}]',
        '[' .
          preg_replace(
            '/acf\/.*\s{/',
            '{',
            preg_replace(
              '/^[^{]+/',
              '',
              strip_tags(
                str_replace(['<!--', '-->', 'wp:'], '', str_replace([' /'], ',', $content))
              )
            )
          )
          . ']'
      )
    )
    );
  }

  function truncateString($string, $searchTerm)
  {
    $count = 128;
    $length = strlen($searchTerm);
    $buffer = round(($count - $length) / 2);
    $start = stripos($string, $searchTerm);
    $offset = $start >= $buffer ? $start - $buffer : 0;
    if (strlen($string) > $count) {
      $string = '...' . substr($string, $offset, $count) . '...';
    }
    $string = preg_replace("/" . $searchTerm . "/i", "<strong>\\0</strong>", $string);
    return $string;
  }

  ?>
  <section class="text form">
    <div class="text__wrapper contentwidth contentwidth--narrow">
      <h1>Suche</h1>
      <form role="search" method="get" id="searchform" class="form__form" action="<?= get_home_url() ?>">
        <div class="form__searchInputWrapper">
          <input type="text" value="<?= $searchTerm ?>" placeholder="Suchbegriff" name="s" id="s">
          <button class="button" type="submit">
            <span class="form__searchIconWrapper">
              <canvas width="18" height="18"></canvas>
              <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12.8017 11.5148C13.8195 10.1714 14.2895 8.4918 14.1166 6.8153C13.9437 5.1388 13.1408 3.59043 11.8703 2.48306C10.5998 1.37569 8.95623 0.791886 7.27183 0.849609C5.58743 0.907333 3.98774 1.60228 2.79599 2.79403C1.60423 3.98578 0.909286 5.58548 0.851562 7.26988C0.793839 8.95428 1.37765 10.5978 2.48502 11.8683C3.59238 13.1389 5.14075 13.9417 6.81725 14.1146C8.49375 14.2875 10.1734 13.8176 11.5167 12.7998L15.9297 17.2118L17.2127 15.9278L12.8017 11.5148ZM7.51675 12.3648C6.55751 12.3648 5.61981 12.0803 4.82223 11.5474C4.02465 11.0145 3.40302 10.257 3.03593 9.37081C2.66885 8.48459 2.5728 7.50941 2.75994 6.56861C2.94708 5.6278 3.40899 4.76361 4.08728 4.08533C4.76556 3.40704 5.62975 2.94512 6.57056 2.75798C7.51137 2.57085 8.48654 2.66689 9.37276 3.03398C10.259 3.40106 11.0164 4.0227 11.5494 4.82028C12.0823 5.61786 12.3667 6.55555 12.3667 7.51479C12.3652 8.80061 11.8537 10.0333 10.9445 10.9425C10.0353 11.8517 8.80256 12.3632 7.51675 12.3648Z" fill="#3595D2" />
              </svg>
            </span>
          </button>
        </div>
      </form>
    </div>
  </section>

  <?php if (strlen($searchTerm)) : ?>
    <section class="text search">
      <div class="text__wrapper contentwidth contentwidth--narrow">
        <h2>Treffer zum Begriff «<?= $searchTerm ?>»</h2>
        <?php if (count($the_query->posts)) : ?>
          <ul class="search__results">
            <?php foreach ($the_query->posts as $result) : ?>
              <?php
              $blocks = parse_blocks($post->post_content);
              $blocksString = array_map(function ($block) {
                return $block['attrs'];
              }, $blocks);
              $hits = remove_html_comments($result->post_content);
              $hits = is_array($hits) ? $hits : [];
              $hitCount = 0;
              $hitContent = '';

              switch ($result->post_type) {
                case ('employee'):
                  $pageType = 'Mitarbeiter';
                  break;
                case ('news'):
                  $pageType = 'News';
                  break;
                case ('neubau'):
                  $pageType = 'Neubau';
                  break;
                case ('download'):
                  $pageType = 'Download';
                  break;
                default:
                  $pageType = 'Seite';
              }

              if (stripos($result->post_title, $searchTerm) >= 0) {
                $hitCount += 1;
                $hitContent .= '<li>' . truncateString($result->post_title, $searchTerm) . '</li>';
              }
              foreach ($hits as $hit) :
                foreach ($hit->data as $dataKey => $data) :
                  if ((str_replace($searchfields, '', $dataKey) != $dataKey)) :
                    if (is_string($data)) :
                      if (stripos($data, $searchTerm) !== false) :
                        $hitCount += 1;
                        $hitContent .= '<li>' . truncateString($data, $searchTerm) . '</li>';
                      endif;
                    endif;
                  endif;
                endforeach;
              endforeach;
              ?>
              <?php if ($hitCount > 0) : ?>
                <?php
                $url = get_permalink($result->ID);

                if ($result->post_type == 'download') {
                  $url = get_permalink(154);
                  $languages = get_field('language', $result->ID);
                  if (!in_array(5, $languages)) {
                    continue;
                  }
                } elseif ($result->post_type == 'employee') {
                  $url = get_permalink(23);
                }
                ?>
                <li class="search__result">
                  <a href="<?= $url ?>" target="_self">
                    <h3 class="search__pagetitle"><?= $pageType ?>: <strong><?= get_the_title($result->ID) ?></strong></h3>
                    <div class="search__hits">
                      <h5>Treffer: <?= $hitCount ?></h5>
                      <ul>
                        <?= $hitContent ?>
                      </ul>
                    </div>
                  </a>
                </li>
              <?php endif; ?>
            <?php endforeach; ?>
          </ul>
        <?php else : ?>
          <h3>Leider ergab die Suche keine Treffer.</h3>
        <?php endif; ?>
      </div>
    </section>
  <?php endif; ?>

</main>

<?php get_footer(); ?>
