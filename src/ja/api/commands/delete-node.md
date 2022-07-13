# deleteNode

<!-- The `deleteNode` command deletes a node inside the current selection. It requires a `typeOrName` argument, which can be a string or a `NodeType` to find the node that needs to be deleted. After deleting the node, the view will automatically scroll to the cursors position. -->

`deleteNode` コマンドは、現在の選択範囲内のノードを削除します。 削除する必要のあるノードを見つけるには、文字列または `NodeType` の `typeOrName` 引数が必要です。 ノードを削除すると、ビューは自動的にカーソル位置までスクロールします。

## パラメータ

`typeOrName: string | NodeType`

## 使い方

```js
// deletes a paragraph node
editor.commands.deleteNode('paragraph')

// or

// deletes a custom node
editor.commands.deleteNode(MyCustomNode)
```
