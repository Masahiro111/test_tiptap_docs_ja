# toggleMark

<!-- The `toggleMark` command toggles a specific mark on and off at the current selection. -->

`toggleList` は、異なるタイプのリストを切り替えます。

## パラメーター

`typeOrName: string | MarkType`

<!-- The type of mark that should be toggled. -->

切り替える必要のあるマークのタイプ。

`attributes?: Record<string, any>`

<!-- The attributes that should be applied to the mark. **This is optional.** -->

マークに適用する必要のある属性。 **これはオプションです。**

`options?: Record<string, any>`

* `extendEmptyMarkRange: boolean` - 現在の選択範囲全体でもマークを削除します。 デフォルトは `false` です

<!-- `options?: Record<string, any>` -->
<!-- * `extendEmptyMarkRange: boolean` - Removes the mark even across the current selection. Defaults to `false` -->

## 使い方

```js
// toggles a bold mark
editor.commands.toggleMark('bold')

// toggles bold mark with a color attribute
editor.commands.toggleMark('bold', { color: 'red' })

// toggles a bold mark with a color attribute and removes the mark across the current selection
editor.commands.toggleMark('bold', { color: 'red' }, { extendEmptyMarkRange: true })
```
