---
description: Useless extension, just adds <span> tags (required by other extensions though).
icon: palette-line
---

# TextStyle
[![Version](https://img.shields.io/npm/v/@tiptap/extension-text-style.svg?label=version)](https://www.npmjs.com/package/@tiptap/extension-text-style)
[![Downloads](https://img.shields.io/npm/dm/@tiptap/extension-text-style.svg)](https://npmcharts.com/compare/@tiptap/extension-text-style?minimal=true)

<!-- This mark renders a `<span>` HTML tag and enables you to add a list of styling related attributes, for example font-family, font-size, or color. The extension doesn’t add any styling attribute by default, but other extensions use it as the foundation, for example [`FontFamily`](/api/extensions/font-family) or [`Color`](/api/extensions/color). -->

このマークは `<span>` HTML タグをレンダリングし、フォントファミリ、フォントサイズ、色などのスタイル関連の属性のリストを追加できるようにします。拡張機能はデフォルトでスタイリング属性を追加しませんが、他の拡張機能はそれを基盤として使用します。たとえば、[`FontFamily`](/api/extensions/font-family) や [`Color`](/api/extensions/color) 。

## インストール

```bash
npm install @tiptap/extension-text-style
```

## コマンド

### removeEmptyTextStyle()
<!-- Remove `<span>` tags without an inline style. -->

インラインスタイルなしで `<span>` タグを削除します。

```js
editor.command.removeEmptyTextStyle()
```

## ソースコード

[packages/extension-text-style/](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-text-style/)

## 使い方

https://embed.tiptap.dev/preview/Marks/TextStyle
