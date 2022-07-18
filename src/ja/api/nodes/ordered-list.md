---
description: If a bullet list doesn’t look serious enough, put some numbers in front of it.
icon: list-ordered
---

# OrderedList
[![Version](https://img.shields.io/npm/v/@tiptap/extension-ordered-list.svg?label=version)](https://www.npmjs.com/package/@tiptap/extension-ordered-list)
[![Downloads](https://img.shields.io/npm/dm/@tiptap/extension-ordered-list.svg)](https://npmcharts.com/compare/@tiptap/extension-ordered-list?minimal=true)

<!-- This extension enables you to use ordered lists in the editor. They are rendered as `<ol>` HTML tags. -->

<!-- Type <code>1.&nbsp;</code> (or any other number followed by a dot) at the beginning of a new line and it will magically transform to a ordered list. -->

この拡張機能を使用すると、エディターで順序付きリストを使用できます。それらは `<ol>` HTMLタグとしてレンダリングされます。

新しい行の先頭に <code>1.&nbsp;</code>（または他の数字の後にドットが続く）と入力すると、魔法のように順序付きリストに変換されます。

## インストール
```bash
npm install @tiptap/extension-ordered-list @tiptap/extension-list-item
```

<!-- This extension requires the [`ListItem`](/api/nodes/list-item) node. -->

この拡張機能には、[`ListItem`](/api/nodes/list-item) ノードが必要です。

## 設定

### HTMLAttributes
<!-- Custom HTML attributes that should be added to the rendered HTML tag. -->

レンダリングされた HTML タグに追加する必要があるカスタム HTML 属性。

```js
OrderedList.configure({
  HTMLAttributes: {
    class: 'my-custom-class',
  },
})
```

### itemTypeName
<!-- Specify the list item name. -->

リスト項目名を指定します。

Default: `'listItem'`

```js
OrderedList.configure({
  itemTypeName: 'listItem',
})
```

## コマンド

### toggleOrderedList()
<!-- Toggle an ordered list. -->

順序付きリストを切り替えます。

```js
editor.commands.toggleOrderedList()
```

## キーボード ショートカット
| コマンド | Windows/Linux                   | macOS                       |
| ----------------- | ------------------------------- | --------------------------- |
| toggleOrderedList | `Ctrl` + `Shift` + `7` | `Cmd` + `Shift` + `7` |

## ソースコード
[packages/extension-ordered-list/](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-ordered-list/)

## 使い方
https://embed.tiptap.dev/preview/Nodes/OrderedList
