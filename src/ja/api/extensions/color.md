---
description: Add text color support to your editor (comes with unlimited colors).
icon: paint-brush-line
---

# Color
[![Version](https://img.shields.io/npm/v/@tiptap/extension-color.svg?label=version)](https://www.npmjs.com/package/@tiptap/extension-color)
[![Downloads](https://img.shields.io/npm/dm/@tiptap/extension-color.svg)](https://npmcharts.com/compare/@tiptap/extension-color?minimal=true)

<!-- This extension enables you to set the font color in the editor. It uses the [`TextStyle`](/api/marks/text-style) mark, which renders a `<span>` tag (and only that). The font color is applied as inline style then, for example `<span style="color: #958DF1">`. -->

この拡張機能を使用すると、エディターでフォントの色を設定できます。 [`TextStyle`](/api/marks/text-style) マークを使用して、`<span>`タグ（およびそれのみ）をレンダリングします。次に、フォントの色がインラインスタイルとして適用されます（例：`<span style="color: #958DF1">`）。

## インストール

```bash
npm install @tiptap/extension-text-style @tiptap/extension-color
```

This extension requires the [`TextStyle`](/api/marks/text-style) mark.

この拡張機能には、[`TextStyle`](/api/marks/text-style) マークが必要です。

## 設定

### types

<!-- A list of marks to which the color attribute should be applied to. -->

color 属性を適用する必要があるマークのリスト。

Default: `['textStyle']`

```js
Color.configure({
  types: ['textStyle'],
})
```

## コマンド

### setColor()

<!-- Applies the given font color as inline style. -->

指定されたフォントの色をインラインスタイルとして適用します。

```js
editor.commands.setColor('#ff0000')
```

### unsetColor()

<!-- Removes any font color. -->

フォントの色を削除します。

```js
editor.commands.unsetColor()
```

## ソースコード

[packages/extension-color/](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-color/)

## 使い方

https://embed.tiptap.dev/preview/Extensions/Color
