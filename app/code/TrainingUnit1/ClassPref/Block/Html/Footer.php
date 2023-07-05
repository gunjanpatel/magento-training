<?php declare(strict_types = 1);

namespace TrainingUnit1\ClassPref\Block\Html;

class Footer extends \Magento\Theme\Block\Html\Footer
{
    public function getCopyright()
    {
        return parent::getCopyright().' Gunjan Patel';
    }
}

