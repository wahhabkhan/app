angular-validation 1.4.5
=========================
[![NPM version](https://badge.fury.io/js/angular-validation.svg)](http://badge.fury.io/js/angular-validation)
[![Build Status](https://travis-ci.org/hueitan/angular-validation.png?branch=master)](https://travis-ci.org/hueitan/angular-validation)
[![Code Climate](https://codeclimate.com/github/hueitan/angular-validation/badges/gpa.svg)](https://codeclimate.com/github/hueitan/angular-validation)
[![Coverage Status](https://coveralls.io/repos/hueitan/angular-validation/badge.svg?branch=master&service=github)](https://coveralls.io/github/hueitan/angular-validation?branch=master)
[![devDependency Status](https://david-dm.org/hueitan/angular-validation/dev-status.png)](https://david-dm.org/hueitan/angular-validation#info=devDependencies)
[![Gitter chat](https://badges.gitter.im/hueitan/angular-validation.png)](https://gitter.im/hueitan/angular-validation)

Client-side Validation should be simple and clean.
<br/>Don't let Client-side Validation dirty your controller.

Setup your Validation on config phase by using some rules [(example)](https://github.com/hueitan/angular-validation/blob/master/dist/angular-validation-rule.js)
<br/>If you prefer schema over html attributes , try [angular-validation-schema
](https://github.com/thetutlage/angular-validation-schema) [(Demo)](http://plnkr.co/edit/X56HEsDYgYoY8gbSj7cu?p=preview)
<br/>And add Validation in your view only.

angularjs 1.2.x support to version [angular-validation 1.2.x](https://github.com/hueitan/angular-validation/tree/v1.2.x) <br/>
angularjs 1.3.x support after version [angular-validation 1.3.x](https://github.com/hueitan/angular-validation/tree/v1.3.x) <br/>
angularjs 1.4.x support after version angular-validation 1.4.x

Requirement
-----
[AngularJS](http://angularjs.org) 1.2.x (for [angular-validation 1.2.x](https://github.com/hueitan/angular-validation/tree/v1.2.x)) <br/>
[AngularJS](http://angularjs.org) 1.3.x (for [angular-validation 1.3.x](https://github.com/hueitan/angular-validation/tree/v1.3.x)) <br/>
[AngularJS](http://angularjs.org) 1.4.x (for [angular-validation 1.4.x](https://github.com/hueitan/angular-validation/tree/master))

DEMO
-----
http://hueitan.github.io/angular-validation/

Install
-----
Install with npm

```
npm install angular-validation
```

or with bower

```
bower install angular-validation
```

Using angular-validation
---
```html
<script src="dist/angular-validation.js"></script>
<script src="dist/angular-validation-rule.js"></script>
```
```js
angular.module('yourApp', ['validation']);

// OR including your validation rule
angular.module('yourApp', ['validation', 'validation.rule']);
```

Writing your First Code
====
```html
<form name="Form">
    <div class="row">
        <div>
            <label>Required</label>
            <input type="text" name="required" ng-model="form.required" validator="required">
        </div>
        <div>
            <label>Url</label>
            <input type="text" name="url" ng-model="form.url" validator="required, url">
        </div>
        <button validation-submit="Form" ng-click="next()">Submit</button>
        <button validation-reset="Form">Reset</button>
    </div>
</form>
```

[Documentation API](https://github.com/hueitan/angular-validation/blob/master/API.md)

Built-in validation <small>in angular-validation-rule</small>
===

1. Required
2. Url
3. Email
4. Number
5. Min length
6. Max length

5 and 6 require you to pass an inline parameter to set the length limit. Eg, `maxlength=6`.

Anyone can give a `PR` for this angular-validation for more `built-in validation`


Integrating with Twitter Bootstrap
=====

To integrate this package with Bootstrap you should do the following.


Add the following LESS to your project

```css
.ng-invalid.ng-dirty{
    .has-error .form-control;
}

label.has-error.control-label {
    .has-error .control-label;
}

```

Change the Error HTML to something like:

```javascript
$validationProvider.setErrorHTML(function (msg) {
       return  "<label class=\"control-label has-error\">" + msg + "</label>";
});
```

You can add the bootstrap class `.has-success` in a similar fashion.

To toggle `.has-error` class on bootstrap `.form-group` wrapper for labels and controls, add:

```javascript
angular.extend($validationProvider, {
    validCallback: function (element){
        $(element).parents('.form-group:first').removeClass('has-error');
    },
    invalidCallback: function (element) {
        $(element).parents('.form-group:first').addClass('has-error');
    }
});
```

License
-----
MIT

CHANGELOG
=====
See [release](https://github.com/hueitan/angular-validation/releases)

CONTRIBUTORS
=====
Thank you for your contribution [@lvarayut](https://github.com/lvarayut) and [@Nazanin1369](https://github.com/Nazanin1369) :heart: <br/>
Thanks for all [contributors](https://github.com/hueitan/angular-validation/graphs/contributors)
