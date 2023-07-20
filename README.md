# portalium-site

<p>

<h1 align="center">Yii Email Verify</h1>

This module allows you to create a new user and enables an existing user to log in.
- Login and signup.
- Getting currently logged in identity.
- Active-passive user control
- E-mail verification
- Resending the verification email
- E-mail confirmation settings

## Requirements

-PHP 7.4 or higher

## Installation
The package could be installed with composer :<br/>
1.Open the composer.json file of your root project.<br/>
2.Add the link of the module to the repositories section 
```shell
https://github.com/portalium/yii2-site.git 
```
3.Include the module in your current project in the require section.<br/>

After performing these steps, you can add the module to your project via Composer by going to the directory where your project is located in the terminal and running the composer update command.



## General usage

#### Login
The login method checks whether the mail control settings are enabled after verifying the user information.

```php
if ($this->validate())
{
 if($user->status===User::STATUS_ACTIVE)
 {
 
 }else
 {
 
 }
} else {

 }
```
### E-mail verification


### Code Contributors

This project exists thanks to all the people who contribute.

<a href="https://github.com/portalium/yii2-site/graphs/contributors"><img src="https://opencollective.com/yii2-grid/contributors.svg?width=890&button=false" /></a>

## Package development

Once you have created your package, you can create the components, controllers, models, database migrations, and views within the package.

Here are some links with more information about components, controllers, models, database migrations, and views:

- [Creating a component](https://www.yiiframework.com/doc/guide/2.0/en/concept-components)
- [Creating a controller](https://www.yiiframework.com/doc/guide/2.0/en/structure-controllers)
- [Creating a model](https://www.yiiframework.com/doc/guide/2.0/en/structure-models)
- [Creating a database migration](https://www.yiiframework.com/doc/guide/2.0/en/db-migrations)
- [Creating a view](https://www.yiiframework.com/doc/guide/2.0/en/structure-views)

## License
The Portalium  is free software. It is released under the terms of the BSD License.
Please see [`LICENSE`](./LICENSE.md) for more information.

Maintained by [Portalium Software](https://www.yiiframework.com/).

## Follow updates
[![Linkedin](https://img.shields.io/badge/linkedin-join-1DA1F2?style=flat&logo=linkedin)](https://www.linkedin.com/company/diginova-informatics/)