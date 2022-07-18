---
description: Add some colorful syntax highlighting to your code blocks.
icon: terminal-box-fill
---

# CodeBlockLowlight
[![Version](https://img.shields.io/npm/v/@tiptap/extension-code-block-lowlight.svg?label=version)](https://www.npmjs.com/package/@tiptap/extension-code-block-lowlight)
[![Downloads](https://img.shields.io/npm/dm/@tiptap/extension-code-block-lowlight.svg)](https://npmcharts.com/compare/@tiptap/extension-code-block-lowlight?minimal=true)

<!-- With the CodeBlockLowlight extension you can add fenced code blocks to your documents. It’ll wrap the code in `<pre>` and `<code>` HTML tags. -->

<!-- ::: warning Syntax highlight dependency
This extension relies on the [lowlight](https://github.com/wooorm/lowlight) library to apply syntax highlight to the code block’s content.
::: -->

<!-- Type <code>&grave;&grave;&grave;&nbsp;</code> (three backticks and a space) or <code>&Tilde;&Tilde;&Tilde;&nbsp;</code> (three tildes and a space) and a code block is instantly added for you. You can even specify the language, try writing <code>&grave;&grave;&grave;css&nbsp;</code>. That should add a `language-css` class to the `<code>`-tag. -->

CodeBlockLowlight 拡張機能を使用すると、フェンスで囲まれたコードブロックをドキュメントに追加できます。コードを `<pre>` および `<code>` HTML タグでラップします。

> 警告：**構文ハイライト依存関係**
この拡張機能は、[lowlight](https://github.com/wooorm/lowlight) ライブラリに依存して、コードブロックのコンテンツに構文の強調表示を適用します。

<code>&grave;&grave;&grave;&nbsp;</code>（3つのチルダとスペース）または <code>&Tilde;&Tilde;&Tilde;&nbsp;</code>（3つのチルダとスペース）とコードブロックを入力しますすぐに追加されます。言語を指定することもできます。<code>&grave;&grave;&grave;css&nbsp;</code> を書いてみてください。これにより、`language-css` クラスが `<code>` タグに追加されます。

## インスト―ル
```bash
npm install lowlight @tiptap/extension-code-block-lowlight
```

## 設定

### lowlight

<!-- You should provide the `lowlight` module to this extension. Decoupling the `lowlight` package from the extension allows the client application to control which version of lowlight it uses and which programming language packages it needs to load. -->

この拡張機能に `lowlight` モジュールを提供する必要があります。 `lowlight` パッケージを拡張機能から切り離すことで、クライアントアプリケーションは、使用する lowlight のバージョンと、ロードする必要のあるプログラミング言語パッケージを制御できます。

```js
import { lowlight } from 'lowlight/lib/core'

CodeBlockLowlight.configure({
  lowlight,
})
```

### HTMLAttributes

<!-- Custom HTML attributes that should be added to the rendered HTML tag. -->

レンダリングされた HTML タグに追加する必要があるカスタムHTML属性。

```js
CodeBlockLowlight.configure({
  HTMLAttributes: {
    class: 'my-custom-class',
  },
})
```

### languageClassPrefix
<!-- Adds a prefix to language classes that are applied to code tags. -->

コードタグに適用される言語クラスにプレフィックスを追加します。

Default: `'language-'`

```js
CodeBlockLowlight.configure({
  languageClassPrefix: 'language-',
})
```

### defaultLanguage
<!-- Define a default language instead of the automatic detection of lowlight. -->

ローライトの自動検出ではなく、デフォルトの言語を定義します。

Default: `null`

```js
CodeBlockLowlight.configure({
  defaultLanguage: 'plaintext',
})
```

## コマンド

### setCodeBlock()
<!-- Wrap content in a code block. -->

コンテンツをコードブロックでラップします。

```js
editor.commands.setCodeBlock()
```

### toggleCodeBlock()
<!-- Toggle the code block. -->

コードブロックを切り替えます。

```js
editor.commands.toggleCodeBlock()
```

## キーボードショートカット
| コマンド         | Windows/Linux                 | macOS                     |
| --------------- | ----------------------------- | ------------------------- |
| toggleCodeBlock | `Control` + `Alt` + `C` | `Cmd` + `Alt` + `C` |

## ソースコード

[packages/extension-code-block-lowlight/](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-code-block-lowlight/)

## 使い方

https://embed.tiptap.dev/preview/Nodes/CodeBlockLowlight
