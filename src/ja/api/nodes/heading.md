---
description: Structure the content with headings (comes with 6 different levels or less).
icon: h-1
---

# Heading
[![Version](https://img.shields.io/npm/v/@tiptap/extension-heading.svg?label=version)](https://www.npmjs.com/package/@tiptap/extension-heading)
[![Downloads](https://img.shields.io/npm/dm/@tiptap/extension-heading.svg)](https://npmcharts.com/compare/@tiptap/extension-heading?minimal=true)

<!-- The Heading extension adds support for headings of different levels. Headings are rendered with `<h1>`, `<h2>`, `<h3>`, `<h4>`, `<h5>` or `<h6>` HTML tags. By default all six heading levels (or styles) are enabled, but you can pass an array to only allow a few levels. Check the usage example to see how this is done. -->

Type <code>#&nbsp;</code> at the beginning of a new line and it will magically transform to a heading, same for <code>##&nbsp;</code>, <code>###&nbsp;</code>, <code>####&nbsp;</code>, <code>#####&nbsp;</code> and <code>######&nbsp;</code>.

見出し拡張機能は、さまざまなレベルの見出しのサポートを追加します。見出しは、`<h1>`、`<h2>`、`<h3>`、`<h4>`、`<h5>`、または `<h6>` HTML タグでレンダリングされます。デフォルトでは、6つの見出しレベル（またはスタイル）すべてが有効になっていますが、配列を渡して、いくつかのレベルのみを許可することができます。使用例をチェックして、これがどのように行われるかを確認してください。

新しい行の先頭に `#(スペース)` と入力すると魔法のように見出しに変換されます。同じように <code>##&nbsp;</code>, <code>###&nbsp;</code>, <code>####&nbsp;</code>, <code>#####&nbsp;</code>, <code>######&nbsp;</code> も同様となります。

## インストール
```bash
npm install @tiptap/extension-heading
```

## 設定

### HTMLAttributes
<!-- Custom HTML attributes that should be added to the rendered HTML tag. -->

レンダリングされたHTMLタグに追加する必要があるカスタムHTML属性。

```js
Heading.configure({
  HTMLAttributes: {
    class: 'my-custom-class',
  },
})
```

### levels
<!-- Specifies which heading levels are supported. -->

サポートされる見出しレベルを指定します。

Default: `[1, 2, 3, 4, 5, 6]`

```js
Heading.configure({
  levels: [1, 2],
})
```

## コマンド

### setHeading()
<!-- Creates a heading node with the specified level. -->

指定されたレベルで見出しノードを作成します。

```js
editor.commands.setHeading({ level: 1 })
```

### toggleHeading()
<!-- Toggles a heading node with the specified level. -->

指定されたレベルで見出しノードを切り替えます。

```js
editor.commands.toggleHeading({ level: 1 })
```

## キーボードショートカット
| コマンド                     | Windows/Linux                 | macOS                     |
| --------------------------- | ----------------------------- | ------------------------- |
| toggleHeading({ level: 1 }) | `Ctrl` + `Alt` + `1` | `Cmd` + `Alt` + `1` |
| toggleHeading({ level: 2 }) | `Ctrl` + `Alt` + `2` | `Cmd` + `Alt` + `2` |
| toggleHeading({ level: 3 }) | `Ctrl` + `Alt` + `3` | `Cmd` + `Alt` + `3` |
| toggleHeading({ level: 4 }) | `Ctrl` + `Alt` + `4` | `Cmd` + `Alt` + `4` |
| toggleHeading({ level: 5 }) | `Ctrl` + `Alt` + `5` | `Cmd` + `Alt` + `5` |
| toggleHeading({ level: 6 }) | `Ctrl` + `Alt` + `6` | `Cmd` + `Alt` + `6` |

## ソースコード
[packages/extension-heading/](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-heading/)

## 使い方
https://embed.tiptap.dev/preview/Nodes/Heading
