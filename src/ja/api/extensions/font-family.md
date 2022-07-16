---
description: Doesn’t have support for Comic Sans, but for all other fonts.
---

# フォントファミリー

[![Version](https://img.shields.io/npm/v/@tiptap/extension-font-family.svg?label=version)](https://www.npmjs.com/package/@tiptap/extension-font-family)
[![Downloads](https://img.shields.io/npm/dm/@tiptap/extension-font-family.svg)](https://npmcharts.com/compare/@tiptap/extension-font-family?minimal=true)

<!-- This extension enables you to set the font family in the editor. It uses the [`TextStyle`](/api/marks/text-style) mark, which renders a `<span>` tag. The font family is applied as inline style, for example `<span style="font-family: Arial"`. -->

この拡張機能を使用すると、エディターでフォントファミリーを設定できます。[`TextStyle`](/api/marks/text-style) マークを使用して、`<span>` タグをレンダリングします。フォントファミリーはインラインスタイルとして適用されます（例：`<span style="font-family: Arial">`）。

## インストール

```bash
npm install @tiptap/extension-text-style @tiptap/extension-font-family
```

<!-- This extension requires the [`TextStyle`](/api/marks/text-style) mark. -->

この拡張機能には、[`TextStyle`](/api/marks/text-style) マークが必要です。

## 設定

### types

<!-- A list of marks to which the font family attribute should be applied to. -->

フォントファミリー属性を適用するマークのリスト。

Default: `['textStyle']`

```js
FontFamily.configure({
  types: ['textStyle'],
})
```

## コマンド

### setFontFamily()

<!-- Applies the given font family as inline style. -->

指定されたフォントファミリをインラインスタイルとして適用します。

```js
editor.commands.setFontFamily('Inter')
```

### unsetFontFamily()

<!-- Removes any font family. -->

フォントファミリーを削除します。

```js
editor.commands.unsetFontFamily()
```

## ソースコード

[packages/extension-font-family/](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-font-family/)

## 使い方

https://embed.tiptap.dev/preview/Extensions/FontFamily
