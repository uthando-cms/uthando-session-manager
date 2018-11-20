<?php
/**
 * Uthando CMS (http://www.shaunfreeman.co.uk/)
 *
 * @package   UthandoSessionManager\Form
 * @author    Shaun Freeman <shaun@shaunfreeman.co.uk>
 * @copyright Copyright (c) 2018 Shaun Freeman. (http://www.shaunfreeman.co.uk)
 * @license   see LICENSE
 */

declare(strict_types=1);


namespace UthandoSessionManager\Form;


use TwbBundle\Form\View\Helper\TwbBundleForm;
use Zend\Form\Form;

class SessionOptionsForm extends Form
{
    public function init()
    {
        $this->add([
            'type' => SessionConfigOptionsFieldSet::class,
            'name' => 'config_options',
            'options' => [
                'label' => 'Session Config Options',
                'twb-layout' => TwbBundleForm::LAYOUT_HORIZONTAL,
            ],
            'attributes' => [
                'class' => 'col-md-6',
            ],
        ]);

        $this->add([
            'type' => SessionOptionsFieldSet::class,
            'name' => 'options',
            'options' => [
                'label' => 'Session Options',
                'twb-layout' => TwbBundleForm::LAYOUT_HORIZONTAL,
            ],
            'attributes' => [
                'class' => 'col-md-6',
            ],
        ]);
    }
}