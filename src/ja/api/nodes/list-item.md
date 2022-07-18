---
description: Simply does its job. Doesn’t even care if it’s part of a bullet list or an ordered list.
icon: asterisk
---

# ListItem
[![Version](https://img.shields.io/npm/v/@tiptap/extension-list-item.svg?label=version)](https://www.npmjs.com/package/@tiptap/extension-list-item)
[![Downloads](https://img.shields.io/npm/dm/@tiptap/extension-list-item.svg)](https://npmcharts.com/compare/@tiptap/extension-list-item?minimal=true)

The ListItem extension adds support for the `<li>` HTML tag. It’s used for bullet lists and ordered lists and can’t really be used without them.

ListItem拡張機能は、`<li>`HTMLタグのサポートを追加します。箇条書きと順序付きリストに使用され、それらなしでは実際には使用できません。

## Installation
```bash
npm install @tiptap/extension-list-item
```

This extension requires the [`BulletList`](/api/nodes/bullet-list) or [`OrderedList`](/api/nodes/ordered-list) node.

この拡張機能には、[`BulletList`]（/ api / nodes / bullet-list）または[` OrderedList`]（/ api / ノード/ordered-list）ノードが必要です。

## Settings

### HTMLAttributes
Custom HTML attributes that should be added to the rendered HTML tag.

レンダリングされたHTMLタグに追加する必要があるカスタムHTML属性。

```js
ListItem.configure({
  HTMLAttributes: {
    class: 'my-custom-class',
  },
})
```

## Keyboard shortcuts
| Command         | Windows/Linux      | macOS              |
| --------------- | ------------------ | ------------------ |
| splitListItem() | `Enter`            | `Enter`            |
| sinkListItem()  | `Tab`              | `Tab`              |
| liftListItem()  | `Shift`&nbsp;`Tab` | `Shift`&nbsp;`Tab` |

## Source code
[packages/extension-list-item/](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-list-item/)

## Usage
https://embed.tiptap.dev/preview/Nodes/ListItem
