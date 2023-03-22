<?php
namespace Grav\Plugin\Shortcodes;

use Grav\Common\Page\Media;
use Thunder\Shortcode\Shortcode\ProcessedShortcode;
use Thunder\Shortcode\Shortcode\ShortcodeInterface;

class TravelbookClearfixShortcode extends Shortcode
{
    public function init()
    {
        $this->shortcode->getHandlers()->add('travelbook-clearfix', function(ShortcodeInterface $sc) {
            return "<span style='' class='clearfix'></span>";
        });
    }
}