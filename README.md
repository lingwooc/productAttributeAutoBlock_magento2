# productAttributeAutoBlock_magento2
Add a static block to a product page (for instance an extra description) based on an attribute value. Only one attribute is currently supported.

Tested and working on magento 2.1.6 & Luma (other themes can and will vary).

# Installation
- composer require thousandmonkeys/m2-productattributeautoblock-module
- php bin/magento setup:upgrade
- php bin/magento setup:di:compile
- php bin/magento setup:static-content:deploy

# Usage
Go to Stores/Configuration/ThousandMonkeys/Product Attribute Auto Block and enter the id of the attribute (for instance "color"). The module adds another description block to the product page. It attempts to load a static block using and identifier in the format attributeid_attributevalue. So for an item with the color attribute color set to green then identifier of your block should be color_green. If a block is not found then nothing is shown.
