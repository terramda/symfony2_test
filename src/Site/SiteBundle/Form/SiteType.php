<?php

namespace Site\SiteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class SiteType extends AbstractType {

    public function buildForm(FormBuilder $builder, array $options) {
        $builder->add('name', 'text', array('required' => true));
        $builder->add('url', 'url', array('required' => true));
        $builder->add('is_active', 'checkbox', array('required' => false));
    }

    public function getName() {
        return 'site';
    }

}