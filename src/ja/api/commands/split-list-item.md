# splitListItem

<!-- `splitListItem` splits one list item into two separate list items. If this is a nested list, the wrapping list item should be split. -->

`splitListItem` は、1つのリストアイテムを2つの別々のリストアイテムに分割します。 これがネストされたリストである場合、ラッピングリストアイテムは分割する必要があります。

## パラメーター

`typeOrName: string | NodeType`

<!-- The type of node that should be split into two separate list items. -->

2つの別々のリスト項目に分割する必要があるノードのタイプ。

## 使い方

```js
editor.commands.splitListItem('bullet_list')
```
