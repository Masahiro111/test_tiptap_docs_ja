---
description: Ping all your people @marijn @kevin
icon: at-line
---

# Mention
[![Version](https://img.shields.io/npm/v/@tiptap/extension-mention.svg?label=version)](https://www.npmjs.com/package/@tiptap/extension-mention)
[![Downloads](https://img.shields.io/npm/dm/@tiptap/extension-mention.svg)](https://npmcharts.com/compare/@tiptap/extension-mention?minimal=true)

Honestly, the mention node is amazing. It adds support for `@mentions`, for example to ping users, *and* provides full control over the rendering.

Literally everything can be customized. You can pass a custom component for the rendering.  All examples use `.filter()` to search through items, but feel free to send async queries to an API or add a more advanced library like [fuse.js](https://fusejs.io/) to your project.

正直なところ、`Mention` ノードは素晴らしいです。たとえば、 ping ユーザーに `@mentions` のサポートを追加するなど、レンダリングを完全に制御します。

文字通りすべてをカスタマイズすることができます。レンダリング用のカスタムコンポーネントを渡すことができます。すべての例で `.filter()` を使用してアイテムを検索しますが、非同期クエリをAPIに送信するか、[fuse.js](https://fusejs.io/) などのより高度なライブラリをプロジェクトに追加してください。

## インストール
```bash
npm install @tiptap/extension-mention
```

## 依存関係
<!-- To place the popups correctly, we’re using [tippy.js](https://atomiks.github.io/tippyjs/) in all our examples. You are free to bring your own library, but if you’re fine with it, just install what we use: -->

ポップアップを正しく配置するために、すべての例で [tippy.js](https://atomiks.github.io/tippyjs/) を使用しています。自分のライブラリを自由に持参できますが、問題がなければ、使用しているものをインストールするだけです。

```bash
npm install tippy.js
```

## 設定

### HTMLAttributes
<!-- Custom HTML attributes that should be added to the rendered HTML tag. -->

レンダリングされた HTML タグに追加する必要があるカスタム HTML 属性。

```js
Mention.configure({
  HTMLAttributes: {
    class: 'my-custom-class',
  },
})
```

### renderLabel
<!-- Define how a mention label should be rendered. -->

メンションラベルのレンダリング方法を定義します。

```js
Mention.configure({
  renderLabel({ options, node }) {
    return `${options.suggestion.char}${node.attrs.label ?? node.attrs.id}`
  }
})
```

### 提案
[参照](/api/utilities/suggestion)

```js
Mention.configure({
  suggestion: {
    // …
  },
})
```

## Source code
[packages/extension-mention/](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-mention/)

## Usage
https://embed.tiptap.dev/preview/Nodes/Mention
