---
description: Adds support for tasks (doesn’t make sure you actually complete them though).
icon: list-check
---

# TaskList
[![Version](https://img.shields.io/npm/v/@tiptap/extension-task-list.svg?label=version)](https://www.npmjs.com/package/@tiptap/extension-task-list)
[![Downloads](https://img.shields.io/npm/dm/@tiptap/extension-task-list.svg)](https://npmcharts.com/compare/@tiptap/extension-task-list?minimal=true)

<!-- This extension enables you to use task lists in the editor. They are rendered as `<ul data-type="taskList">`. This implementation doesn’t require any framework, it’s using Vanilla JavaScript only. -->

<!-- Type <code>[ ]&nbsp;</code> or <code>[x]&nbsp;</code> at the beginning of a new line and it will magically transform to a task list. -->

この拡張機能を使用すると、エディターでタスクリストを使用できます。それらは `<ul data-type="taskList">` としてレンダリングされます。この実装にはフレームワークは必要ありません。Vanilla JavaScript のみを使用しています。

新しい行の先頭に <code>[ ]&nbsp;</code> or <code>[x]&nbsp;</code> と入力すると、魔法のようにタスクリストに変換されます。

## インストール
```bash
npm install @tiptap/extension-task-list @tiptap/extension-task-item
```

<!-- This extension requires the [`TaskItem`](/api/nodes/task-item) extension. -->

この拡張機能には、[`TaskItem`](/api/nodes/task-item) 拡張機能が必要です。


## 設定

### HTMLAttributes
<!-- Custom HTML attributes that should be added to the rendered HTML tag. -->

レンダリングされたHTMLタグに追加する必要があるカスタムHTML属性。

```js
TaskList.configure({
  HTMLAttributes: {
    class: 'my-custom-class',
  },
})
```

### itemTypeName
<!-- Specify the list item name. -->

リスト項目名を指定します。

Default: `'taskItem'`

```js
TaskList.configure({
  itemTypeName: 'taskItem',
})
```

## コマンド

# toggleTaskList()
<!-- Toggle a task list -->

タスクリストを切り替えます。.

```js
editor.commands.toggleTaskList()
```

## ショートカットキー
| コマンド          | Windows/Linux                   | macOS                       |
| ---------------- | ------------------------------- | --------------------------- |
| toggleTaskList() | `Control`&nbsp;`Shift`&nbsp;`9` | `Cmd`&nbsp;`Shift`&nbsp;`9` |

## ソースコード
[packages/extension-task-list/](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-task-list/)

## 使い方
https://embed.tiptap.dev/preview/Nodes/TaskList
