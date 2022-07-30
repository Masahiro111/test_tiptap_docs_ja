# Tiptap for PHP
[![Latest Version on Packagist](https://img.shields.io/packagist/v/ueberdosis/tiptap-php.svg)](https://packagist.org/packages/ueberdosis/tiptap-php)
[![Total Downloads](https://img.shields.io/packagist/dt/ueberdosis/tiptap-php.svg)](https://packagist.org/packages/ueberdosis/tiptap-php)

## はじめに
<!-- A PHP package to work with [Tiptap](https://tiptap.dev/) content. You can transform Tiptap-compatible JSON to HTML, and the other way around, sanitize your content, or just modify it. -->

[Tiptap](https://tiptap.dev/) コンテンツを処理するための PHP パッケージ。 Tiptap 互換の JSON を HTML に変換したり、その逆を行ったり、コンテンツをサニタイズしたり、単に変更したりすることができます。

## インストール
<!-- You can install the package via composer: -->

パッケージは composer を経由でインストールできます。

```bash
composer require ueberdosis/tiptap-php
```

## 使い方
<!-- The PHP package mimics large parts of the JavaScript package. If you know your way around Tiptap, the PHP syntax will feel familiar to you. Here is an easy example: -->

PHP パッケージは、JavaScript パッケージの大部分を模倣しています。 Tiptap の使い方を知っているなら、PHP 構文はあなたに馴染みがあると感じるでしょう。簡単な例を次に示します。

```php
(new Tiptap\Editor)
    ->setContent('<p>Example Text</p>')
    ->getDocument();

// Returns:
// ['type' => 'doc', 'content' => …]
```

## ドキュメンテーション
<!-- There’s a lot more the PHP package can do. Check out the [repository on GitHub](https://github.com/ueberdosis/tiptap-php). -->

PHP パッケージでできることは他にもたくさんあります。 [GitHub のリポジトリ](https://github.com/ueberdosis/tiptap-php) を確認してください。

