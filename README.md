## NOTE THIS MODULE IS CURRENTLY IN DEVELOPMENT AND NOT READY TO USE, IT WILL PROVIDE AS IS

# Greyfenix_Animatedcatalog
Magento catalog image animation looping based on image sequence

## Installation.
This extension can be installed a few different ways:

### Using modman

    modman clone git@github.com:dimasdwika/Greyfenix_Animatedcatalog.git

### Using composer

add a composer.json file to your project directory

    {
        "minimum-stability":"dev",
        "repositories": [
            {
              "type":"composer",
              "url":"http://packages.firegento.com"
            },
            {
                "type": "git",
                "url": "git@github.com:dimasdwika/Greyfenix_Animatedcatalog.git"
            }
        ],
        "require": {
            "greyfenix/animatedcatalog" : "*"
        }
    }

then

    composer.phar update

### Download and install manually.

[https://github.com/dimasdwika/Greyfenix_Animatedcatalog/archive/master.zip](https://github.com/dimasdwika/Greyfenix_Animatedcatalog/archive/master.zip)

## Configuration

### Additional Configuration
To use in custom template, please add this code on catalog/product/list.phtml on img loading product images
```
data-animate="<?php echo Mage::getModel('greyfenix_animatedcatalog/product')->getAnimateImage($_product); ?>"
```
NOTE $_product is the product model loaded

## Licence
License Under Greyfenix adapting MIT and OSL license