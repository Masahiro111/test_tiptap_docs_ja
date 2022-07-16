---
description: Keep track of where the cursor is, and let the user know you know it.
icon: focus-line
---

# フォーカス

[![Version](https://img.shields.io/npm/v/@tiptap/extension-focus.svg?label=version)](https://www.npmjs.com/package/@tiptap/extension-focus)
[![Downloads](https://img.shields.io/npm/dm/@tiptap/extension-focus.svg)](https://npmcharts.com/compare/@tiptap/extension-focus?minimal=true)

<!-- The Focus extension adds a CSS class to focused nodes. By default it adds `.has-focus`, but you can change that. -->

<!-- Note that it’s only a class, the styling is totally up to you. The usage example below has some CSS for that class. -->

Focus 拡張機能は、フォーカスされたノードに CSS クラスを追加します。デフォルトでは `.has-focus` が追加されますが、これは変更できます。

これはクラスにすぎないことに注意してください。スタイリングは完全にあなた次第です。以下の使用例には、そのクラスの CSS がいくつかあります。

## インストール

```bash
npm install @tiptap/extension-focus
```

## 設定

### className

<!-- The class that is applied to the focused element. -->

フォーカスされた要素に適用されるクラス。

Default: `'has-focus'`

```js
Focus.configure({
  className: 'focus',
})
```

### mode

<!-- Apply the class to `'all'`, the `'shallowest'` or the `'deepest'` node. -->

クラスを `'all'`、`'shallowest'`、または `'deepest'` ノードに適用します。

Default: `'all'`

```js
Focus.configure({
  mode: 'deepest',
})
```

## ソースコード

[packages/extension-focus/](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-focus/)

## 使い方

https://embed.tiptap.dev/preview/Extensions/Focus
