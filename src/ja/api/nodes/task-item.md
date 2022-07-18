---
description: The actually task, without it the task list would be nothing.
icon: task-line
---

# TaskItem

[![Version](https://img.shields.io/npm/v/@tiptap/extension-task-item.svg?label=version)](https://www.npmjs.com/package/@tiptap/extension-task-item)
[![Downloads](https://img.shields.io/npm/dm/@tiptap/extension-task-item.svg)](https://npmcharts.com/compare/@tiptap/extension-task-item?minimal=true)

<!-- This extension renders a task item list element, which is a `<li>` tag with a `data-type` attribute set to `taskItem`. It also renders a checkbox inside the list element, which updates a `checked` attribute. -->

<!-- This extension doesn’t require any JavaScript framework, it’s based on Vanilla JavaScript. -->

この拡張機能は、タスクアイテムリスト要素をレンダリングします。これは、`data-type` 属性が `taskItem` に設定された `<li>` タグです。また、list要素内にチェックボックスをレンダリングし、`checked` 属性を更新します。

この拡張機能は JavaScript フレームワークを必要とせず、Vanilla JavaScript に基づいています。

## インストール

```bash
npm install @tiptap/extension-task-list @tiptap/extension-task-item
```

<!-- This extension requires the [`TaskList`](/api/nodes/task-list) node. -->

この拡張機能には、[`TaskList`](/api/nodes/task-list) ノードが必要です。

## 設定

### HTMLAttributes

<!-- Custom HTML attributes that should be added to the rendered HTML tag. -->

レンダリングされた HTML タグに追加する必要があるカスタム HTML 属性。

```js
TaskItem.configure({
  HTMLAttributes: {
    class: 'my-custom-class',
  },
})
```

### nested

<!-- Whether the task items are allowed to be nested within each other. -->

タスクアイテムを相互にネストできるかどうか。

```js
TaskItem.configure({
  nested: true,
})
```

### onReadOnlyChecked

<!-- A handler for when the task item is checked or unchecked while the editor is set to `readOnly`. -->

<!-- If this is not supplied, the task items are immutable while the editor is `readOnly`. -->

<!-- If this function returns false, the check state will be preserved (`readOnly`). -->

エディターが `readOnly` に設定されているときに、タスク項目がオンまたはオフになっている場合のハンドラー。

これが指定されていない場合、エディターが `readOnly` である間、タスク項目は不変です。

この関数が false を返す場合、チェック状態は保持されます（ `readOnly`）。

```js
TaskItem.configure({
  onReadOnlyChecked: (node, checked) => {
    // do something
  },
})
```

## ショートカットキー

| コマンド         | Windows/Linux      | macOS              |
| --------------- | ------------------ | ------------------ |
| splitListItem() | `Enter`            | `Enter`            |
| sinkListItem()  | `Tab`              | `Tab`              |
| liftListItem()  | `Shift` + `Tab` | `Shift` + `Tab` |

## ソースコード

[packages/extension-task-item/](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-task-item/)

## 使い方

https://embed.tiptap.dev/preview/Nodes/TaskItem
