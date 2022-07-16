---
description: If I could just go back and make everything undone … you can.
icon: history-line
---

# History

[![Version](https://img.shields.io/npm/v/@tiptap/extension-history.svg?label=version)](https://www.npmjs.com/package/@tiptap/extension-history)
[![Downloads](https://img.shields.io/npm/dm/@tiptap/extension-history.svg)](https://npmcharts.com/compare/@tiptap/extension-history?minimal=true)

<!-- This extension provides history support. All changes to the document will be tracked and can be removed with `undo`. Undone changes can be applied with `redo` again. -->

この拡張機能は、履歴サポートを提供します。ドキュメントへのすべての変更は追跡され、`undo` で削除できます。取り消された変更は、`redo` で再度適用できます。

## インストール

```bash
npm install @tiptap/extension-history
```

## 設定

### depth

<!-- The amount of history events that are collected before the oldest events are discarded. Defaults to 100. -->

最も古いイベントが破棄される前に収集された履歴イベントの量。デフォルトは「100」となります。

Default: `100`

```js
History.configure({
  depth: 10,
})
```

### newGroupDelay

<!-- The delay between changes after which a new group should be started (in milliseconds). When changes aren’t adjacent, a new group is always started. -->

新しいグループを開始する必要がある変更間の遅延（ミリ秒単位）。変更が隣接していない場合、新しいグループが常に開始されます。

Default: `500`

```js
History.configure({
  newGroupDelay: 1000,
})
```

## Commands

### undo()

<!-- Undo the last change. -->

最後の変更を元に戻します。

```js
editor.commands.undo()
```
### redo()

<!-- Redo the last change. -->

最後の変更をやり直します。

```js
editor.commands.redo()
```

## キーボード ショートカット

| Command | Windows/Linux                                                                            | macOS                                                                        |
| ------- | ---------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------- |
| undo()  | `Control` + `Z`<br>`Control` + `R`                                                 | `Cmd` + `Z`<br>`Cmd` + `R`                                             |
| redo()  | `Shift` + `Control` + `Z`<br>`Control` + `Y`<br>`Shift` + `Control` + `R` | `Shift` + `Cmd` + `Z`<br>`Cmd` + `Y`<br>`Shift` + `Cmd` + `R` |

## ソースコード

[packages/extension-history/](https://github.com/ueberdosis/tiptap/blob/main/packages/extension-history/)

## 使い方

https://embed.tiptap.dev/preview/Extensions/History
