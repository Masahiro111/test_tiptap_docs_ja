---
description: Simply does its job. Doesn’t even care if it’s part of a bullet list or an ordered list.
icon: asterisk
---

# ListItem
[![Version](https://img.shields.io/npm/v/@tiptap/extension-list-item.svg?label=version)](https://www.npmjs.com/package/@tiptap/extension-list-item)
[![Downloads](https://img.shields.io/npm/dm/@tiptap/extension-list-item.svg)](https://npmcharts.com/compare/@tiptap/extension-list-item?minimal=true)

<!-- The ListItem extension adds support for the `<li>` HTML tag. It’s used for bullet lists and ordered lists and can’t really be used without them. -->

ListItem 拡張機能は、`<li>` HTML タグのサポートを追加します。箇条書きと順序付きリストに使用され、それらなしでは実際には使用できません。

## インストール
```bash
npm install @tiptap/extension-list-item
```

<!-- This extension requires the [`BulletList`](/api/nodes/bullet-list) or [`OrderedList`](/api/nodes/ordered-list) node. -->

この拡張機能には、[`BulletList`](/api/nodes/bullet-list) または [`OrderedList`](/api/nodes/ordered-list) ノードが必要です。

## 設定

### HTMLAttributes
<!-- Custom HTML attributes that should be added to the rendered HTML tag. -->

レンダリングされた HTML タグに追加する必要があるカスタム HTML 属性。

```js
ListItem.configure({
  HTMLAttributes: {
    class: 'my-custom-class',
  },
})
```

## キーボード ショートカット
| コマンド         | Windows/Linux      | macOS              |
| --------------- | ------------------ | ------------------ |
| splitListItem() | `Enter`            | `Enter`            |
| sinkListItem()  | `Tab`              | `Tab`              |
| liftListItem()  | `Shift` + `Tab` | `Shift` + `Tab` |

## ソースコード
[packages/extension-list-item/](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-list-item/)

## 使い方
https://embed.tiptap.dev/preview/Nodes/ListItem
