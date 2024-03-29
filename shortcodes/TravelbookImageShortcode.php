<?php
namespace Grav\Plugin\Shortcodes;

use Grav\Common\Page\Media;
use Grav\Common\Page\Medium\GlobalMedia;
use Grav\Common\Page\Medium\MediumFactory;
use Thunder\Shortcode\Shortcode\ProcessedShortcode;
use Thunder\Shortcode\Shortcode\ShortcodeInterface;

class TravelbookImageShortcode extends Shortcode
{
    public function init()
    {
        $this->shortcode->getHandlers()->add('travelbook-image', function(ShortcodeInterface $sc) {

            $image_path = $this->grav['shortcode']->getPage()->path();
            $crop_resize = $sc->getParameter('cropResize');
            $force_resize = $sc->getParameter('forceResize');
            $image_width = $sc->getParameter('image-width');
            $image = MediumFactory::fromFile($image_path . '/' . urldecode($sc->getParameter('image')), []);


            if($image === null) {
                throw new \Exception('The image file is ' . $sc->getParameter('image') . ' is not found.');
            }

            if($image->get('type') == 'video') {
                return $this->twig->processTemplate(
                    'partials/travelbook-video.html.twig',
                    [
                        'page' => $this->grav['page'], // used for image resizing
                        'align' => $sc->getParameter('align') ?? '',
                        'slug' => $this->grav['shortcode']->getPage()->route(),
                        'image' => $image,
                        'image_width' => $image_width,
                        'caption' => $sc->getParameter('caption') ?? '',
                        'gallery_id' => bin2hex(random_bytes(20))
                    ]
                );
            }

            if($crop_resize) {
                $size = explode(',',$crop_resize);
                $image->cropResize($size[0],$size[1]);
            }

            if($force_resize) {
                $size = explode(',',$force_resize);
                $image->forceResize($size[0],$size[1]);
            }

            return $this->twig->processTemplate(
                'partials/travelbook-image.html.twig',
                [
                    'page' => $this->grav['page'], // used for image resizing
                    'align' =>  $sc->getParameter('align') ?? '',
                    'slug' => $this->grav['shortcode']->getPage()->route(),
                    'image' => $image,
                    'caption' => $sc->getParameter('caption') ?? '',
                    'gallery_id' => bin2hex(random_bytes(20))
                ]
            );

        });
    }
}