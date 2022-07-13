# wrapInList

`wrapInList` will wrap a node in the current selection in a list.

`wrapInList` は、リスト内の現在の選択のノードをラップします。

## パラメーター

`typeOrName: string | NodeType`

<!-- The type of node that should be wrapped in a list. -->

リストにラップする必要があるノードのタイプ。

`attributes?: Record<string, any>`

<!-- The attributes that should be applied to the list. **This is optional.** -->

リストに適用する必要のある属性。**これはオプションです。**

## 使い方

```js
// wrap a paragraph in a bullet list
editor.commands.wrapInList('paragraph')
```
