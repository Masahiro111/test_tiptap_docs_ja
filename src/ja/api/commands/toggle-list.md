# toggleList

<!-- `toggleList` will toggle between different types of lists. -->

`toggleList`は、異なるタイプのリストを切り替えます。

## パラメーター

`listTypeOrName: string | NodeType`

<!-- The type of node that should be used for the wrapping list -->

ラッピングリストに使用する必要があるノードのタイプ

`itemTypeOrName: string | NodeType`

<!-- The type of node that should be used for the list items -->

リストアイテムに使用する必要があるノードのタイプ

## 使い方

```js
// toggle a bullet list with list items
editor.commands.toggleList('bullet_list', 'list_item')

// toggle a numbered list with list items
editor.commands.toggleList('ordered_list', 'list_item')
```
