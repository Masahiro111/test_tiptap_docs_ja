---
description: Left, right, center, whatever! Align the text however you like.
icon: align-left
---

# TextAlign

[![Version](https://img.shields.io/npm/v/@tiptap/extension-text-align.svg?label=version)](https://www.npmjs.com/package/@tiptap/extension-text-align)
[![Downloads](https://img.shields.io/npm/dm/@tiptap/extension-text-align.svg)](https://npmcharts.com/compare/@tiptap/extension-text-align?minimal=true)

<!-- This extension adds a text align attribute to a specified list of nodes. The attribute is used to align the text. -->

この拡張機能は、指定されたノードのリストにテキスト整列属性を追加します。この属性は、テキストを揃えるために使用されます。

<!-- :::warning Firefox bug
`text-align: justify` doesn't work together with `white-space: pre-wrap` in Firefox, [that’s a known issue](https://bugzilla.mozilla.org/show_bug.cgi?id=1253840).
::: -->

> **Firefoxのバグを警告する**
`text-align: justify` は Firefox の` white-space: pre-wrap` と一緒に機能しません。[これは既知の問題です](https://bugzilla.mozilla.org/show_bug.cgi?id=1253840)

## インストール

```bash
npm install @tiptap/extension-text-align
```

## 設定

### types

<!-- A list of nodes where the text align attribute should be applied to. Usually something like `['heading', 'paragraph']`. -->

テキスト整列属性を適用する必要があるノードのリスト。通常、`['heading', 'paragraph']` のようなものです。

Default: `[]`

```js
TextAlign.configure({
  types: ['heading', 'paragraph'],
})
```

### alignments

<!-- A list of available options for the text align attribute. -->

テキスト整列属性で使用可能なオプションのリスト。

Default: `['left', 'center', 'right', 'justify']`

```js
TextAlign.configure({
  alignments: ['left', 'right'],
})
```

### defaultAlignment

<!-- The default text align. -->

デフォルトのテキスト整列。

Default: `'left'`

```js
TextAlign.configure({
  defaultAlignment: 'right',
})
```


## コマンド

### setTextAlign()

<!-- Set the text align to the specified value. -->

テキストを指定された値に揃えます。

```js
editor.commands.setTextAlign('right')
```

### unsetTextAlign()

<!-- Remove the text align value. -->

テキスト整列値を削除します。

```js
editor.commands.unsetTextAlign()
```

## キーボード ショートカット

| コマンド                 | Windows/Linux                | macOS                       |
| ----------------------- | ---------------------------- | --------------------------- |
| setTextAlign('left')    | `Ctrl` + `Shift` + `L` | `Cmd` + `Shift` + `L` |
| setTextAlign('center')  | `Ctrl` + `Shift` + `E` | `Cmd` + `Shift` + `E` |
| setTextAlign('right')   | `Ctrl` + `Shift` + `R` | `Cmd` + `Shift` + `R` |
| setTextAlign('justify') | `Ctrl` + `Shift` + `J` | `Cmd` + `Shift` + `J` |

## ソースコード

[packages/extension-text-align/](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-text-align/)

## 使い方

https://embed.tiptap.dev/preview/Extensions/TextAlign
