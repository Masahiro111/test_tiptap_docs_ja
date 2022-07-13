# setTextSelection

<!-- If you think of selection in the context of an editor, you’ll probably think of a text selection. With `setTextSelection` you can control that text selection and set it to a specified range or position. -->

エディターのコンテキストでの選択について考える場合、おそらくテキストの選択について考えるでしょう。`setTextSelection` を使用すると、そのテキスト選択を制御し、指定した範囲または位置に設定できます。

参照 : [focus](/api/commands/focus), [setNodeSelection](/api/commands/set-node-selection), [deleteSelection](/api/commands/delete-selection), [selectAll](/api/commands/select-all)

## パラメーター

`position: number | Range`

<!-- Pass a number, or a Range, for example `{ from: 5, to: 10 }`. -->

数値または範囲を渡します（例：`{from：5 to：10}`）。

## 使い方

```js
// Set the cursor to the specified position
editor.commands.setTextSelection(10)

// Set the text selection to the specified range
editor.commands.setTextSelection({ from: 5, to: 10 })
```

