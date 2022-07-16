# setMark

<!-- The `setMark` command will add a new mark at the current selection. -->

`setMark` コマンドは、現在の選択に新しいマークを追加します。

## パラメーター

`typeOrName: string | MarkType`

<!-- The type of a mark to add. Can be a string or a MarkType. -->

追加するマークのタイプ。 文字列または MarkType にすることができます。

`attributes: Record<string, any>`

<!-- The attributes that should be applied to the mark. **This is optional.** -->

マークに適用する必要のある属性。**これはオプションです。**

## 使い方

```js
editor.commands.setMark("bold", { class: 'bold-tag' })
```
