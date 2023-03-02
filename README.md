# Magento 2 Module Jonatanrdsantos_Email
[![Latest Stable Version](http://poser.pugx.org/jonatanrdsantos/magento2-module-email/v)](https://packagist.org/packages/jonatanrdsantos/magento2-module-email)
[![Latest Unstable Version](http://poser.pugx.org/jonatanrdsantos/magento2-module-email/v/unstable)](https://packagist.org/packages/jonatanrdsantos/magento2-module-email)
[![License](http://poser.pugx.org/jonatanrdsantos/magento2-module-email/license)](https://packagist.org/packages/jonatanrdsantos/magento2-module-email)
[![codecov](https://codecov.io/github/jonatanrdsantos/magento2-module-email/branch/main/graph/badge.svg?token=LR083LNHU5)](https://codecov.io/github/jonatanrdsantos/magento2-module-email)
![Maintenance](https://img.shields.io/maintenance/yes/2023)
![Packagist PHP Version](https://img.shields.io/packagist/dependency-v/jonatanrdsantos/magento2-module-email/php)
![Packagist PHP Version](https://img.shields.io/badge/magento-%202.5-brightgreen.svg?logo=magento&longCache=true)
![GitHub Workflow Status (with event)](https://img.shields.io/github/actions/workflow/status/jonatanrdsantos/magento2-module-email/code_quality.yml)


    jonatanrdsantos/magento2-module-email

- [Main Functionalities](#markdown-header-main-functionalities)
- [Installation](#markdown-header-installation)


## Main Functionalities
The ultimate solution for your store's email functionality with this powerful Magento 2 SMTP Email Extension! Effortlessly configure your email settings to work with a variety of SMTP servers like Gmail, Sendinblue, Mailgun and more for fast and reliable delivery. Take complete control of your email communications with easy installation and configuration.

## Installation
**In production please use the `--keep-generated` option**

### Type 1: Zip file

- Unzip the zip file in `app/code/Jonatanrdsantos/Email`
- Enable the module by running `php bin/magento module:enable Jonatanrdsantos_Email`
- Apply database updates by running `php bin/magento setup:upgrade`
- Flush the cache by running `php bin/magento cache:flush`

### Type 2: Composer

- Install the module with composer by running `composer require jonatanrdsantos/magento2-module-email`
- Enable the module by running `php bin/magento module:enable Jonatanrdsantos_Email`
- Apply database updates by running `php bin/magento setup:upgrade`
- Flush the cache by running `php bin/magento cache:flush`



