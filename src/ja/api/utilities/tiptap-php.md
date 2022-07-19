# Tiptap for PHP
[![Latest Version on Packagist](https://img.shields.io/packagist/v/ueberdosis/tiptap-php.svg)](https://packagist.org/packages/ueberdosis/tiptap-php)
[![Total Downloads](https://img.shields.io/packagist/dt/ueberdosis/tiptap-php.svg)](https://packagist.org/packages/ueberdosis/tiptap-php)

## はじめに
A PHP package to work with [Tiptap](https://tiptap.dev/) content. You can transform Tiptap-compatible JSON to HTML, and the other way around, sanitize your content, or just modify it.

[Tiptap]（https://tiptap.dev/）コンテンツを処理するためのPHPパッケージ。 Tiptap互換のJSONをHTMLに変換したり、その逆を行ったり、コンテンツをサニタイズしたり、単に変更したりすることができます。

## インストール
You can install the package via composer:

パッケージはcomposerを介してインストールできます。

```bash
composer require ueberdosis/tiptap-php
```

## 使い方
The PHP package mimics large parts of the JavaScript package. If you know your way around Tiptap, the PHP syntax will feel familiar to you. Here is an easy example:

PHPパッケージは、JavaScriptパッケージの大部分を模倣しています。 Tiptapの使い方を知っているなら、PHP構文はあなたに馴染みがあると感じるでしょう。簡単な例を次に示します。

```php
(new Tiptap\Editor)
    ->setContent('<p>Example Text</p>')
    ->getDocument();

// Returns:
// ['type' => 'doc', 'content' => …]
```

## ドキュメンテーション
There’s a lot more the PHP package can do. Check out the [repository on GitHub](https://github.com/ueberdosis/tiptap-php).

PHPパッケージでできることは他にもたくさんあります。 [GitHubのリポジトリ]（https://github.com/ueberdosis/tiptap-php）を確認してください。

