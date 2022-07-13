# unsetMark

<!-- `unsetMark` will remove the mark from the current selection. Can also remove all marks across the current selection. -->

`unsetMark` は、現在の選択からマークを削除します。 現在の選択範囲全体のすべてのマークを削除することもできます。

## パラメーター

`typeOrName: string | MarkType`

<!-- The type of mark that should be removed. -->

削除する必要のあるマークのタイプ。

`options?: Record<string, any>`

<!-- * `extendEmptyMarkRange?: boolean` - Removes the mark even across the current selection. Defaults to `false` -->

* `extendEmptyMarkRange?:boolean` - 現在の選択範囲全体でもマークを削除します。 デフォルトは `false` です

## 使い方

```js
// removes a bold mark
editor.commands.unsetMark('bold')

// removes a bold mark across the current selection
editor.commands.unsetMark('bold', { extendEmptyMarkRange: true })
```
