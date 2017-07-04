# productAttributeAutoBlock_magento2
Add a static block to a product page (for instance an extra description) based on an attribute value. Multiple attributes with multiple values are supported. 

Tested and working on magento 2.1.7 & Luma (other themes can and will vary).

# Installation
- Extract over your magento installation.
- php bin/magento setup:upgrade
- php bin/magento setup:di:compile
- php bin/magento setup:static-content:deploy

# Usage
Go to `Stores/Configuration/thousandmonkeys/Product Attribute Auto Block` and enter a comma separated list of attribute ids (for instance `color,size`). 

The module adds another description block to the product page. It attempts to load a list of static blocks using identifiers in the format `attributeid_attributevalue` (lowercase). So for an item with the `color` attribute set to `green` then identifier of your block should be `color_green`. If a block is not found then nothing is shown.
