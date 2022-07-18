---
description: "Tables don’t require a header, but let’s be honest: They look better with it."
icon: t-box-line
---

# TableHeader
[![Version](https://img.shields.io/npm/v/@tiptap/extension-table-header.svg?label=version)](https://www.npmjs.com/package/@tiptap/extension-table-header)
[![Downloads](https://img.shields.io/npm/dm/@tiptap/extension-table-header.svg)](https://npmcharts.com/compare/@tiptap/extension-table-header?minimal=true)

<!-- Table headers are optional. But come on, you want them, don’t you? If you don’t want them, update the `content` attribute of the [`TableRow`](/api/nodes/table-row) extension, like this: -->

テーブルヘッダーはオプションです。でもさあ、あなたはそれらが欲しいですよね？それらが不要な場合は、[`TableRow`](/api/nodes/table-row) 拡張機能の `content` 属性を次のように更新します。

```js
// Table rows without table headers
TableRow.extend({
  content: 'tableCell*',
})
```

<!-- This is the default, which allows table headers: -->

これはデフォルトであり、テーブルヘッダーを許可します。

```js
// Table rows with table headers (default)
TableRow.extend({
  content: '(tableCell | tableHeader)*',
})
```

## インストール
```bash
npm install @tiptap/extension-table @tiptap/extension-table-row @tiptap/extension-table-header @tiptap/extension-table-cell
```

<!-- This extension requires the [`Table`](/api/nodes/table), [`TableRow`](/api/nodes/table-row) and [`TableCell`](/api/nodes/table-cell) nodes. -->

この拡張機能には、[`Table`](/api/nodes/table), [`TableRow`](/api/nodes/table-row) 及び [`TableCell`](/api/nodes/table-cell) ノードが必要です。

## ソースコード
[packages/extension-table-header/](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-table-header/)

## 使い方
https://embed.tiptap.dev/preview/Nodes/Table
