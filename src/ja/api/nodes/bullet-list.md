---
description: Everything looks more serious with a few bullet points.
icon: list-unordered
---

# BulletList
[![Version](https://img.shields.io/npm/v/@tiptap/extension-bullet-list.svg?label=version)](https://www.npmjs.com/package/@tiptap/extension-bullet-list)
[![Downloads](https://img.shields.io/npm/dm/@tiptap/extension-bullet-list.svg)](https://npmcharts.com/compare/@tiptap/extension-bullet-list?minimal=true)

<!-- This extension enables you to use bullet lists in the editor. They are rendered as `<ul>` HTML tags. -->

<!-- Type <code>*&nbsp;</code>, <code>-&nbsp;</code> or <code>+&nbsp;</code> at the beginning of a new line and it will magically transform to a bullet list. -->

この拡張機能を使用すると、エディターで箇条書きを使用できます。それらは `<ul>` HTML タグとしてレンダリングされます。

新しい行の先頭に `*`、`-`、または `+` と入力すると、魔法のように箇条書きに変換されます。

## インストール

```bash
npm install @tiptap/extension-bullet-list @tiptap/extension-list-item
```

<!-- This extension requires the [`ListItem`](/api/nodes/list-item) node. -->

この拡張機能には、[`ListItem`](/api/nodes/list-item) ノードが必要で

## 設定

### HTMLAttributes
<!-- Custom HTML attributes that should be added to the rendered HTML tag. -->

レンダリングされたHTMLタグに追加する必要があるカスタムHTML属性。

```js
BulletList.configure({
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
BulletList.configure({
  itemTypeName: 'listItem',
})
```

## コマンド

### toggleBulletList()
<!-- Toggles a bullet list. -->

箇条書きを切り替えます。

```js
editor.commands.toggleBulletList()
```

## キーボードショートカット

| コマンド          | Windows/Linux                   | macOS                       |
| ---------------- | ------------------------------- | --------------------------- |
| toggleBulletList | `Ctrl` + `Shift` + `8` | `Cmd` + `Shift` + `8` |

## ソースコード

[packages/extension-bullet-list/](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-bullet-list/)

## 使い方

https://embed.tiptap.dev/preview/Nodes/BulletList
