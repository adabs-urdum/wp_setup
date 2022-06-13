<?php
session_start();

// ACF
function acf_cookiebox_init()
{

  // Check function exists.
  if (function_exists('acf_add_options_sub_page')) {

    $languages = ['de'];
    if (function_exists('pll_languages_list')) {
      $languages = pll_languages_list();
    }

    // Add parent.
    $parent = acf_add_options_page([
      'page_title' => __('Cookiebox'),
      'menu_title' => __('Cookiebox'),
      'menu_slug' => 'cookiebox',
      'capability' => 'edit_posts',
      'position' => '',
      'icon_url' => '',
      'redirect' => false,
      'post_id' => 'cookiebox'
    ]);

    if (function_exists('acf_add_local_field_group')) {

      acf_add_local_field_group([
        'key' => 'cookieboxsettings',
        'title' => 'Cookie Box Einstellungen',
        'fields' => [
          [
            'key' => 'showcookiebox',
            'label' => 'Cookie Box anzeigen?',
            'name' => 'showcookiebox',
            'type' => 'true_false',
          ],
        ],
        'location' => [[[
          'param' => 'options_page',
          'operator' => '==',
          'value' => "cookiebox",
        ]]],
      ]);
    }

    $pages = [];
    foreach ($languages as $language) {
      $child = acf_add_options_sub_page([
        'page_title'  => $language,
        'menu_title'  => $language,
        'parent_slug' => $parent['menu_slug'],
        'menu_slug' => "cookiebox_{$language}",
        'post_id' => "cookiebox_{$language}",
      ]);

      $pages[] = [[
        'param' => 'options_page',
        'operator' => '==',
        'value' => "cookiebox_{$language}",
      ]];
    }

    if (function_exists('acf_add_local_field_group')) {

      acf_add_local_field_group([
        'key' => 'cookieboxcontent',
        'title' => 'Cookie Box Inhalte',
        'fields' => [
          [
            'key' => 'general',
            'label' => 'Allgemein',
            'name' => 'general',
            'type' => 'group',
            'sub_fields' => [
              [
                'key' => 'generaltitle',
                'label' => 'Titel',
                'name' => 'generaltitle',
                'type' => 'text',
                'default_value' => 'Privacy Einstellungen',
                'wrapper' => ['width' => '50%',],
              ],
              [
                'key' => 'generalintro',
                'label' => 'Beschrieb',
                'name' => 'generalintro',
                'type' => 'textarea',
                'default_value' => 'Für ein optimales Website-Erlebnis nutzen wir Cookies und weitere Online-Technologien, um personalisierte Inhalte zu zeigen, Funktionen anzubieten und Statistiken zu erheben. Ihr Klick auf „Akzeptieren“ erlaubt uns diese Datenverarbeitung sowie die Weitergabe an Drittanbieter (auch in Drittländern) gemäss unserer Datenschutzerklärung. Cookies lassen sich jederzeit ablehnen oder in den Einstellungen anpassen.',
                'wrapper' => ['width' => '50%',],
              ],
              [
                'key' => 'showdetailsbuttontext',
                'label' => 'Details-anzeigen-Buttontext',
                'name' => 'showdetailsbuttontext',
                'type' => 'text',
                'default_value' => 'Details anzeigen',
                'wrapper' => ['width' => '33%',],
              ],
              [
                'key' => 'acceptallbuttontext',
                'label' => 'Alles-akzeptieren-Buttontext',
                'name' => 'acceptallbuttontext',
                'type' => 'text',
                'default_value' => 'Alles akzeptieren',
                'wrapper' => ['width' => '33%',],
              ],
              [
                'key' => 'acceptminimumbuttontext',
                'label' => 'Minimum-akzeptieren-Buttontext',
                'name' => 'acceptminimumbuttontext',
                'type' => 'text',
                'default_value' => 'Minimum akzeptieren',
                'wrapper' => ['width' => '33%',],
              ],
            ]
          ],
          [
            'key' => 'details',
            'label' => 'Detail',
            'name' => 'detail',
            'type' => 'group',
            'sub_fields' => [
              [
                'key' => 'detailstitle',
                'label' => 'Titel',
                'name' => 'detailstitle',
                'type' => 'text',
                'default_value' => 'Privatsphäre Einstellungen',
                'wrapper' => ['width' => '50%',],
              ],
              [
                'key' => 'intro',
                'label' => 'Einleitung',
                'name' => 'intro',
                'type' => 'textarea',
                'default_value' => 'Dieses Tool hilft Ihnen verschiedene Tags, Tracker und Analyse-Tools auf dieser Webseite auszuwählen oder zu deaktivieren.',
                'wrapper' => ['width' => '50%',],
              ],
              [
                'key' => 'options',
                'label' => 'Optionen',
                'name' => 'options',
                'type' => 'repeater',
                'sub_fields' => [
                  [
                    'key' => 'optionislocked',
                    'label' => 'Pflicht',
                    'name' => 'optionislocked',
                    'type' => 'true_false',
                    'wrapper' => ['width' => '10%',],
                  ],
                  [
                    'key' => 'optionstitle',
                    'label' => 'Titel',
                    'name' => 'optionstitle',
                    'type' => 'text',
                    'default_value' => 'Essentiell | Funktional | Marketing',
                    'wrapper' => ['width' => '10%',],
                  ],
                  [
                    'key' => 'optionstext',
                    'label' => 'Text',
                    'name' => 'optionstext',
                    'type' => 'textarea',
                    'default_value' => 'Diese Technologien sind erforderlich um die Kernfunktionalität der Webseite zu aktivieren. | Diese Technologien ermöglichen es uns die Nutzung der Webseite zu analysieren, die Leistung zu messen und zu verbessern. | Diese Technologien werden von Werbetreibenden verwendet um Anzeigen zu schalten, die für Ihre Interessen relevant sind.',
                    'wrapper' => ['width' => '20%',],
                  ],
                  [
                    'key' => 'optionssnippet',
                    'label' => 'Code / Analytics Snippet',
                    'name' => 'optionssnippet',
                    'type' => 'textarea',
                    'default_value' => "
                      <!-- Global site tag (gtag.js) - Google Analytics -->
                      <script async src='https://www.googletagmanager.com/gtag/js?id=G-WH7MGRP98H'></script>

                      <script>
                        window.dataLayer = window.dataLayer || [];
                        function gtag(){dataLayer.push(arguments);}
                        gtag('js', new Date());

                        gtag('config', 'G-WH7MGRP98H', { 'anonymize_ip': true });
                      </script>
                      <script>
                      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
                      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
                      ga('create', 'G-WH7MGRP98H', 'auto');
                      </script>",
                    'wrapper' => ['width' => '60%',],
                  ],
                ],
              ],
              [
                'key' => 'detailssavebuttontext',
                'label' => 'Speichern-Buttontext',
                'name' => 'detailssavebuttontext',
                'type' => 'text',
                'default_value' => 'Einstellungen speichern',
                'wrapper' => ['width' => '50%',],
              ],
              [
                'key' => 'detailsprivacypolicypage',
                'label' => 'Datenschutz-Seite',
                'name' => 'detailsprivacypolicypage',
                'type' => 'post_object',
                'post_type' => 'page',
                'allow_null' => 1,
                'multiple' => 0,
                'description' => 'Optional. Wenn ausgefüllt, wird ein Link zu dieser Seite angezeigt.',
                'default_value' => '',
                'wrapper' => ['width' => '50%',],
              ],
            ]
          ],
        ],
        'location' => $pages,
      ]);
    }
  }
}
add_action('acf/init', 'acf_cookiebox_init');
// END ACF

// REST API
function cookiebox(WP_REST_Request $request)
{
  $data = json_decode($request->get_body());

  $values = $data->cookiebox;
  $vals = [];
  foreach ($values as $value) {
    $vals[$value[0]] = $value[1];
  }
  $_SESSION['cookiebox'] = $vals;

  return [
    'data' => $data,
    'session' => $_SESSION,
  ];
}
add_action('rest_api_init', function ($server) {
  register_rest_route('api', '/cookiebox/', [
    'methods' => 'POST',
    'callback' => 'cookiebox',
  ]);
});
// END REST API

// Add Markup
function add_cookiebox_markup()
{
  $showcookiebox = get_field('showcookiebox', "cookiebox");

  if ($showcookiebox) {
    $language = 'de';
    if (function_exists('pll_current_language')) {
      $language = pll_current_language();
    }
    $general = get_field('general', "cookiebox_{$language}");
    $details = get_field('details', "cookiebox_{$language}");
    $privacyPage = $details['detailsprivacypolicypage'];
?>
    <?php if ($privacyPage && get_the_ID() !== $privacyPage->ID) : ?>
      <div class="cookiebox">
        <div class="cookiebox__box">

          <div class="cookiebox__tabWrapper">
            <input type="radio" name="cookiebox" id="cookiebox_general" checked="checked">
            <div class="cookiebox__tab">
              <p class="cookiebox__title"><?= $general['generaltitle'] ?></p>
              <p class="cookiebox__text"><?= $general['generalintro'] ?></p>
              <div class="cookiebox__buttonWrapper">
                <label for="cookiebox_detail" class="button button--tertiary"><?= $general['showdetailsbuttontext'] ?></label>
              </div>
              <div class="cookiebox__buttonWrapper">
                <button id="cookieboxAcceptAllButton" class="button button--primary"><?= $general['acceptallbuttontext'] ?></button>
                <button id="cookieboxAcceptMinimumButton" class="button button--tertiary"><?= $general['acceptminimumbuttontext'] ?></button>
              </div>
              <?php if ($privacyPage) : ?>
                <p class="cookiebox__text cookiebox__text--privacy">
                  <a href="<?= get_permalink($privacyPage) ?>" target="_blank" rel="noopener"><?= get_the_title($privacyPage) ?></a>
                </p>
              <?php endif; ?>
            </div>

            <input type="radio" name="cookiebox" id="cookiebox_detail">
            <div class="cookiebox__tab">
              <p class="cookiebox__title"><?= $details['detailstitle'] ?></p>
              <p class="cookiebox__text"><?= $details['intro'] ?></p>
              <div class="cookiebox__options">
                <?php foreach ($details['options'] as $key => $option) : ?>
                  <p class="cookiebox__option">
                    <span>
                      <input class="cookiebox__input" type="checkbox" name="" value="<?= sanitize_title($option['optionstitle']) ?>" id="cookiebox<?= sanitize_title($option['optionstitle']) . $key ?>" <?= $option['optionislocked'] ? 'checked="checked" disabled data-locked="true"' : 'data-locked="false"' ?>>
                    </span>
                    <label for="cookiebox<?= sanitize_title($option['optionstitle']) . $key ?>">
                      <span><?= $option['optionstitle'] ?></span>
                      <span><?= $option['optionstext'] ?></span>
                    </label>
                  </p>
                <?php endforeach; ?>
              </div>
              <div class="cookiebox__buttonWrapper">
                <button id="cookieboxSaveButton" class="button button--primary"><?= $details['detailssavebuttontext'] ?></button>
              </div>
              <?php if ($privacyPage) : ?>
                <p class="cookiebox__text cookiebox__text--privacy">
                  <a href="<?= get_permalink($privacyPage) ?>" target="_blank" rel="noopener"><?= get_the_title($privacyPage) ?></a>
                </p>
              <?php endif; ?>
            </div>
          </div>

        </div>
      </div>
    <?php endif; ?>
<?php
  }
}
add_action('wp_footer', 'add_cookiebox_markup');
// END Add Markup

// Add Snippets to Head
function add_cookiebox_snippets()
{

  if (array_key_exists('cookiebox', $_SESSION)) {
    $values = $_SESSION['cookiebox'];

    $language = 'de';
    if (function_exists('pll_current_language')) {
      $language = pll_current_language();
    }
    $options = get_field('details', "cookiebox_{$language}")['options'];
    if (is_array($options)) {
      $options = array_filter($options, function ($option) use ($values) {
        $title = sanitize_title($option['optionstitle']);
        return $values[$title];
      });
    } else {
      $options = [];
    }

    foreach ($options as $option) {
      echo $option['optionssnippet'];
    }

    remove_action('wp_footer', 'add_cookiebox_markup');
  }
}
add_action('wp_head', 'add_cookiebox_snippets', 1);
// END Add Snippets to Head
