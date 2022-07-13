# deleteRange

<!-- The `deleteRange` command deletes everything in a given range. It requires a `range` attribute of type `Range`. -->

`deleteRange` コマンドは、指定された範囲内のすべてを削除します。 タイプ `Range` の `range` 属性が必要です。

## パラメータ

`range: Range`

## 使い方

```js
editor.commands.deleteRange({ from: 0, to: 12 })
```
