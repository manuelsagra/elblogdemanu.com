<?php
$GLOBALS['content_width'] = 640;
if (function_exists('add_theme_support')) {
	add_theme_support('post-thumbnails'); 
}
update_option('image_default_link_type' , '');

/* -----------------------------
MODIFIED WPAUTOP - Allow HTML5 block elements in wordpress posts
----------------------------- */

function html5autop($pee, $br = 1) {
   if ( trim($pee) === '' )
      return '';
   $pee = $pee . "\n"; // just to make things a little easier, pad the end
   $pee = preg_replace('|<br />\s*<br />|', "\n\n", $pee);
   // Space things out a little
// *insertion* of section|article|aside|header|footer|hgroup|figure|details|figcaption|summary
   $allblocks = '(?:table|thead|tfoot|caption|col|colgroup|tbody|tr|td|th|div|dl|dd|dt|ul|ol|li|pre|select|form|map|area|blockquote|address|math|style|input|p|h[1-6]|hr|fieldset|legend|section|article|aside|header|footer|hgroup|figure|details|figcaption|summary)';
   $pee = preg_replace('!(<' . $allblocks . '[^>]*>)!', "\n$1", $pee);
   $pee = preg_replace('!(</' . $allblocks . '>)!', "$1\n\n", $pee);
   $pee = str_replace(array("\r\n", "\r"), "\n", $pee); // cross-platform newlines
   if ( strpos($pee, '<object') !== false ) {
      $pee = preg_replace('|\s*<param([^>]*)>\s*|', "<param$1>", $pee); // no pee inside object/embed
      $pee = preg_replace('|\s*</embed>\s*|', '</embed>', $pee);
   }
   $pee = preg_replace("/\n\n+/", "\n\n", $pee); // take care of duplicates
   // make paragraphs, including one at the end
   $pees = preg_split('/\n\s*\n/', $pee, -1, PREG_SPLIT_NO_EMPTY);
   $pee = '';
   foreach ( $pees as $tinkle )
      $pee .= '<p>' . trim($tinkle, "\n") . "</p>\n";
   $pee = preg_replace('|<p>\s*</p>|', '', $pee); // under certain strange conditions it could create a P of entirely whitespace
// *insertion* of section|article|aside
   $pee = preg_replace('!<p>([^<]+)</(div|address|form|section|article|aside)>!', "<p>$1</p></$2>", $pee);
   $pee = preg_replace('!<p>\s*(</?' . $allblocks . '[^>]*>)\s*</p>!', "$1", $pee); // don't pee all over a tag
   $pee = preg_replace("|<p>(<li.+?)</p>|", "$1", $pee); // problem with nested lists
   $pee = preg_replace('|<p><blockquote([^>]*)>|i', "<blockquote$1><p>", $pee);
   $pee = str_replace('</blockquote></p>', '</p></blockquote>', $pee);
   $pee = preg_replace('!<p>\s*(</?' . $allblocks . '[^>]*>)!', "$1", $pee);
   $pee = preg_replace('!(</?' . $allblocks . '[^>]*>)\s*</p>!', "$1", $pee);
   if ($br) {
      $pee = preg_replace_callback('/<(script|style).*?<\/\\1>/s', create_function('$matches', 'return str_replace("\n", "<WPPreserveNewline />", $matches[0]);'), $pee);
      $pee = preg_replace('|(?<!<br />)\s*\n|', "<br />\n", $pee); // optionally make line breaks
      $pee = str_replace('<WPPreserveNewline />', "\n", $pee);
   }
   $pee = preg_replace('!(</?' . $allblocks . '[^>]*>)\s*<br />!', "$1", $pee);
// *insertion* of img|figcaption|summary
   $pee = preg_replace('!<br />(\s*</?(?:p|li|div|dl|dd|dt|th|pre|td|ul|ol|img|figcaption|summary)[^>]*>)!', '$1', $pee);
   if (strpos($pee, '<pre') !== false)
      $pee = preg_replace_callback('!(<pre[^>]*>)(.*?)</pre>!is', 'clean_pre', $pee );
   $pee = preg_replace( "|\n</p>$|", '</p>', $pee );

   return $pee;
}

// remove the original wpautop function
remove_filter('the_excerpt', 'wpautop');
remove_filter('the_content', 'wpautop');

// add our new html5autop function
add_filter('the_excerpt', 'html5autop');
add_filter('the_content', 'html5autop');

class fixImageMargins{
	public $xs=0;

	public function __construct(){
		add_filter('img_caption_shortcode', array(&$this, 'fixme'), 10, 3);
	}
	public function fixme($x=null, $attr, $content){
		extract(shortcode_atts(array(
		'id' => '',
		'align' => 'alignnone',
		'width' => '',
		'caption' => ''
		), $attr));

		if (1>(int)$width||empty($caption)) {
			return $content;
		}

		if ($id) $id='id="'.$id .'" ';

		return '<figure ' .$id. 'class="' . $align . '">' . $content . '<figcaption>'. $caption . '</figcaption></figure>';
	}
}
$fixImageMargins = new fixImageMargins();

function comentario($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment; ?>
				<article class="clearfix" id="comment-<?php comment_ID() ?>">
					<?php echo get_avatar($comment,$size='64'); ?>
					<header class="clearfix">
						<h1><?php comment_author_link(); ?></h1>
						<time datetime="<?php comment_date('c'); ?>"><i class="fa fa-calendar-o"></i>  <?php comment_date('j \d\e F \d\e Y \a \l\a\s H:i'); ?></time>
					</header>
					<?php 
					comment_text();
					if ($comment->comment_approved == '0') { ?>
					<p><em><?php echo "Tu comentario debe ser aprobado..." ?></em></p>
					<?php } ?>
				</article>
<?php
}

?>