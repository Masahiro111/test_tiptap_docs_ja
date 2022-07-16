---
description: Configure a helpful placeholder to fill the emptyness.
icon: ghost-line
---

# プレースホルダー

[![Version](https://img.shields.io/npm/v/@tiptap/extension-placeholder.svg?label=version)](https://www.npmjs.com/package/@tiptap/extension-placeholder)
[![Downloads](https://img.shields.io/npm/dm/@tiptap/extension-placeholder.svg)](https://npmcharts.com/compare/@tiptap/extension-placeholder?minimal=true)

<!-- This extension provides placeholder support. Give your users an idea what they should write with a tiny hint. There is a handful of things to customize, if you feel like it. -->

この拡張機能は、プレースホルダーのサポートを提供します。小さなヒントを使って、ユーザーに何を書くべきかを考えさせます。必要に応じて、カスタマイズできるものがいくつかあります。


## インストール

```bash
npm install @tiptap/extension-placeholder
```

## 設定

### emptyEditorClass

<!-- The added CSS class if the editor is empty. -->

エディターが空の場合に追加された CSS クラス。

Default: `'is-editor-empty'`

```js
Placeholder.configure({
  emptyEditorClass: 'is-editor-empty',
})
```

### emptyNodeClass

<!-- The added CSS class if the node is empty. -->

ノードが空の場合に追加された CSS クラス。

Default: `'is-empty'`

```js
Placeholder.configure({
  emptyNodeClass: 'my-custom-is-empty-class',
})
```

### placeholder

<!-- The placeholder text added as `data-placeholder` attribute. -->

`data-placeholder` 属性として追加されたプレースホルダーテキスト。

Default: `'Write something …'`

```js
Placeholder.configure({
  placeholder: 'My Custom Placeholder',
})
```

<!-- You can even use a function to add placeholder depending on the node: -->

ノードに応じて、関数を使用してプレースホルダーを追加することもできます。

```js
Placeholder.configure({
  placeholder: ({ node }) => {
    if (node.type.name === 'heading') {
      return 'What’s the title?'
    }

    return 'Can you add some further context?'
  },
})
```

### showOnlyWhenEditable

<!-- Show decorations only when editor is editable. -->

エディターが編集可能な場合にのみ装飾を表示します。

Default: `true`

```js
Placeholder.configure({
  showOnlyWhenEditable: false,
})
```

### showOnlyCurrent

<!-- Show decorations only in currently selected node. -->

現在選択されているノードにのみ装飾を表示します。

Default: `true`

```js
Placeholder.configure({
  showOnlyCurrent: false
})
```

### includeChildren

<!-- Show decorations also for nested nodes. -->

ネストされたノードの装飾も表示します。

Default: `false`

```js
Placeholder.configure({
  includeChildren: true
})
```

## ソースコード

[packages/extension-placeholder/](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-placeholder/)

## 使い方

https://embed.tiptap.dev/preview/Extensions/Placeholder
