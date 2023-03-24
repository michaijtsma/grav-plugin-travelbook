<?php
namespace Grav\Plugin\Shortcodes;

use Grav\Common\Page\Media;
use Thunder\Shortcode\Shortcode\ProcessedShortcode;
use Thunder\Shortcode\Shortcode\ShortcodeInterface;

class TravelbookRoutemapShortcode extends Shortcode
{
    public function init()
    {
        $this->shortcode->getHandlers()->add('travelbook-routemap', function(ShortcodeInterface $sc) {

            $file_location = $this->grav['shortcode']->getPage()->route() . '/' . $sc->getParameter('filename');

            return '<a href="'. $file_location .'" class="btn btn-secondary btn-sm glightbox" role="button" aria-pressed="true">'. $sc->getParameter('name', 'routemap').'</a>';
        });
    }
}