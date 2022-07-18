---
description: Quoting other people will make you look clever.
icon: double-quotes-l
---

# Blockquote

[![Version](https://img.shields.io/npm/v/@tiptap/extension-blockquote.svg?label=version)](https://www.npmjs.com/package/@tiptap/extension-blockquote)
[![Downloads](https://img.shields.io/npm/dm/@tiptap/extension-blockquote.svg)](https://npmcharts.com/compare/@tiptap/extension-blockquote?minimal=true)

<!-- The Blockquote extension enables you to use the `<blockquote>` HTML tag in the editor. This is great to … show quotes in the editor, you know? -->

<!-- Type <code>>&nbsp;</code> at the beginning of a new line and it will magically transform to a blockquote. -->

Blockquote 拡張機能を使用すると、エディターで `<blockquote>` HTML タグを使用できます。エディタで引用符を表示するのに最適です。

新しい行の先頭に `>` と入力するとブロック引用符に変換されます。

## インストール

```bash
npm install @tiptap/extension-blockquote
```

## 設定

### HTMLAttributes

<!-- Custom HTML attributes that should be added to the rendered HTML tag. -->

レンダリングされた HTML タグに追加する必要があるカスタム HTML 属性。

```js
Blockquote.configure({
  HTMLAttributes: {
    class: 'my-custom-class',
  },
})
```

## コマンド

### setBlockquote()
<!-- Wrap content in a blockquote. -->

コンテンツをブロッククォートでラップします。

```js
editor.commands.setBlockquote()
```

### toggleBlockquote()
<!-- Wrap or unwrap a blockquote. -->

ブロッククォートをラップまたはアンラップします。

```js
editor.commands.toggleBlockquote()
```

### unsetBlockquote()
<!-- Unwrap a blockquote. -->

ブロッククォートをアンラップします。

```js
editor.commands.unsetBlockquote()
```

## キーボード ショートカット
| コマンド           | Windows/Linux                   | macOS                       |
| ----------------- | ------------------------------- | --------------------------- |
| Toggle Blockquote | `Ctrl` + `Shift` + `B` | `Cmd` + `Shift` + `B` |

## ソースコード
[packages/extension-blockquote/](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-blockquote/)

## 使い方
https://embed.tiptap.dev/preview/Nodes/Blockquote
