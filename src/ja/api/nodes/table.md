---
description: You’re working on something really serious if you need tables inside a text editor.
icon: table-line
tableOfContents: true
---

# Table

## Introduction
[![Version](https://img.shields.io/npm/v/@tiptap/extension-table.svg?label=version)](https://www.npmjs.com/package/@tiptap/extension-table)
[![Downloads](https://img.shields.io/npm/dm/@tiptap/extension-table.svg)](https://npmcharts.com/compare/@tiptap/extension-table?minimal=true)

<!-- Nothing is as much fun as a good old HTML table. The `Table` extension enables you to add this holy grail of WYSIWYG editing to your editor. -->

<!-- Don’t forget to add a `spacer.gif`. (Just joking. If you don’t know what that is, don’t listen.) -->

古き良き HTML テーブルほど楽しいものはありません。`Table` 拡張機能を使用すると、この WYSIWYG 編集の聖杯をエディターに追加できます。

`spacer.gif` を追加することを忘れないでください。（冗談です。それが何であるかわからない場合は、聞いてはいけません。）

## インストール

```bash
npm install @tiptap/extension-table @tiptap/extension-table-row @tiptap/extension-table-header @tiptap/extension-table-cell
```

<!-- This extension requires the [`TableRow`](/api/nodes/table-row), [`TableHeader`](/api/nodes/table-header) and [`TableCell`](/api/nodes/table-cell) nodes. -->

この拡張機能には、[`TableRow`](/api/nodes/table-row), [`TableHeader`](/api/nodes/table-header) and [`TableCell`](/api/nodes/table-cell) の各種ノードが必要です。

## 設定

### HTMLAttributes
<!-- Custom HTML attributes that should be added to the rendered HTML tag. -->

レンダリングされた HTML タグに追加する必要があるカスタム HTML 属性。

```js
Table.configure({
  HTMLAttributes: {
    class: 'my-custom-class',
  },
})
```

### resizable
Default: `false`

### handleWidth
Default: `5`

### cellMinWidth
Default: `25`

### View
Default: `TableView`

### lastColumnResizable
Default: `true`

### allowTableNodeSelection
Default: `false`

## コマンド

### insertTable()
<!-- Creates a new table, with the specified number of rows and columns, and with a header row (if you tell it to). -->

指定された行数と列数、およびヘッダー行（指示された場合）を使用して、新しいテーブルを作成します。

```js
editor.commands.insertTable()
editor.commands.insertTable({ rows: 3, cols: 3, withHeaderRow: true })
```

### addColumnBefore()
<!-- Adds a column before the current column. -->

現在の列の前に列を追加します。

```js
editor.commands.addColumnBefore()
```

### addColumnAfter()
<!-- Adds a column after the current column. -->

現在の列の後に列を追加します。

```js
editor.commands.addColumnAfter()
```

### deleteColumn()
<!-- Deletes the current column. -->

現在の列を削除します。

```js
editor.commands.deleteColumn()
```

### addRowBefore()
<!-- Adds a row above the current row. -->

現在の行の上に行を追加します。

```js
editor.commands.addRowBefore()
```

### addRowAfter()
<!-- Adds a row below the current row. -->

現在の行の下に行を追加します。

```js
editor.commands.addRowAfter()
```

### deleteRow()
<!-- Deletes the current row. -->

現在の行を削除します。

```js
editor.commands.deleteRow()
```

### deleteTable()
<!-- Deletes the whole table. -->

テーブル全体を削除します。

```js
editor.commands.deleteTable()
```

### mergeCells()
<!-- Merge all selected cells to a single cell. -->

選択したすべてのセルを1つのセルに結合します。

```js
editor.commands.mergeCells()
```

### splitCell()
<!-- Splits the current cell. -->

現在のセルを分割します。

```js
editor.commands.splitCell()
```

### toggleHeaderColumn()
<!-- Makes the current column a header column. -->

現在の列をヘッダー列にします。

```js
editor.commands.toggleHeaderColumn()
```

### toggleHeaderRow()
<!-- Makes the current row a header row. -->

現在の行をヘッダー行にします。

```js
editor.commands.toggleHeaderRow()
```

### toggleHeaderCell()
<!-- Makes the current cell a header cell. -->

現在のセルをヘッダーセルにします。

```js
editor.commands.toggleHeaderCell()
```

### mergeOrSplit()
<!-- If multiple cells are selected, they are merged. If a single cell is selected, the cell is splitted into two cells. -->

複数のセルが選択されている場合、それらはマージされます。単一のセルが選択されている場合、セルは2つのセルに分割されます。

```js
editor.commands.mergeOrSplit()
```

### setCellAttribute()
<!-- Sets the given attribute for the current cell. Can be whatever you define on the [`TableCell`](/api/nodes/table-cell) extension, for example a background color. Just make sure to register [your custom attribute](/guide/custom-extensions#attributes) first. -->

現在のセルに指定された属性を設定します。[`TableCell`](/api/nodes/table-cell) 拡張機能で定義するものなら何でもかまいません。たとえば、背景色などです。必ず最初に [カスタム属性](/guide/custom-extensions#attributes) を登録してください。

```js
editor.commands.setCellAttribute('customAttribute', 'value')
editor.commands.setCellAttribute('backgroundColor', '#000')
```

### goToNextCell()
<!-- Go the next cell. -->

次のセルに移動します。

```js
editor.commands.goToNextCell()
```

### goToPreviousCell()
<!-- Go to the previous cell. -->

前のセルに移動します。

```js
editor.commands.goToPreviousCell()
```

### fixTables()
<!-- Inspects all tables in the document and fixes them, if necessary. -->

ドキュメント内のすべてのテーブルを検査し、必要に応じて修正します。

```js
editor.commands.fixTables()
```

## ソースコード
[packages/extension-table/](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-table/)

## 使い方
https://embed.tiptap.dev/preview/Nodes/Table
