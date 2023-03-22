<?php
namespace Grav\Plugin\Shortcodes;

use Grav\Common\Page\Media;
use Thunder\Shortcode\Shortcode\ShortcodeInterface;

class TravelbookGalleryShortcode extends Shortcode
{
    public function init()
    {
        $this->shortcode->getHandlers()->add('travelbook-gallery', function(ShortcodeInterface $sc) {
            $image_directory = $sc->getParameter('directory');
            $width = $sc->getParameter('width', 100);
            $image_width = $sc->getParameter('image-size', 25);
            $align = $sc->getParameter('align');
            $style = $sc->getParameter('style', 'masonry');

            $image_route = $this->grav['shortcode']->getPage()->route();
            $image_path = $this->grav['shortcode']->getPage()->path() . '/' . $image_directory;

            $bytes = random_bytes(20);
            $gallery_id = bin2hex($bytes);

            return $this->twig->processTemplate(
                'partials/travelbook-gallery.html.twig',
                [
                    'page' => $this->grav['page'], // used for image resizing
                    'gallery_images' => new Media($image_path),
                    'slug' => "$image_route/$image_directory",
                    'gallery_id' => $gallery_id,
                    'width' => $width,
                    'align' => $align,
                    'style' => $style,
                    'image_width' => $image_width
                ]
            );

        });
    }
}