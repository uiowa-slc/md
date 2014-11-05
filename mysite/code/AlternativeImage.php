<?php
class AlternativeImage extends Image {

    private static $has_one = array(

        'PortfolioPost' => 'PortfolioPost'

    );    
}